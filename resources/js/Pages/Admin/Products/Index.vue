<template>
    <WhenVisible :data="['products']" :buffer="500">
        <template #fallback>
            <div class="w-full h-[100vh] flex justify-center items-center">
                <div>
                    Loading . . .
                </div>
            </div>
        </template>

        <div class="flex">
            <div class="w-full flex flex-wrap p-4">
                <div class="w-full shrink-0 grow-0 basis-auto p-2">
                    <div class="flex flex-wrap">
                        <div class="w-full shrink-0 grow-0 basis-auto mb-2 pr-2">
                            <InputLabel
                                for="refSearch"
                                value="Search"
                            />
                        </div>
                        <div class="w-full shrink-0 grow-0 basis-auto mb-2 pr-2">
                            <TextInput
                                v-model="refSearch"
                                id="refSearch"
                                class="w-full"
                                placeholder="search here"

                            />
                        </div>
                        <div class="shrink-0 grow-0 basis-auto flex flex-wrap items-end mb-2">
                            <Link
                                :href="route('products.show', 'create')"
                                class="transition ease-in-out delay-150 bg-blue-500 hover:scale-105 hover:bg-indigo-500 duration-300 font-bold text-white py-1.5 px-4 rounded-md"
                            >
                                Add
                            </Link>

                            <Link
                                :href="route('products.index')"
                                :only="['oops']"
                                class="transition ease-in-out delay-150 bg-blue-500 hover:scale-105 hover:bg-indigo-500 duration-300 font-bold text-white py-1.5 px-4 rounded-md"
                            >
                                Reload
                            </Link>
                        </div>
                    </div>
                </div>
                <div class="w-full shrink-0 grow-0 basis-auto p-2">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-1.5 w-[25px] text-center">#</th>
                                <th class="p-1.5 w-[75px] text-center">Action</th>
                                <th class="p-1.5 text-left">Product Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(row, key) in products.data">
                                <td class="p-2 text-center">
                                    {{ products.current_page * products.per_page - products.per_page + key + 1 }}
                                </td>
                                <td class="p-2 text-center">
                                    <Link
                                        :href="route('products.show', row.id)"
                                        class="bg-blue-500 font-bold text-white py-1.5 px-4 rounded-md"
                                    >
                                        Edit
                                    </Link>
                                </td>
                                <td class="p-2 text-left">
                                    {{ row.product_name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="shrink-0 grow-0 basis-auto flex flex-wrap justify-center md:justify-end w-full p-2">
                    <div class="flex flex-wrap gap-1">
                        <Link
                            v-for="(link, key) in products.links"
                            :href="link.url || ''"
                            :key="key"
                            :class="[
                                'rounded-full px-3 py-0.5 border border-2', {
                                    'bg-blue-500 text-white': link.active
                                }
                            ]"
                            v-text="link.label"
                            :data="{
                                search: refSearch
                            }"
                        />
                    </div>
                </div>
            </div>
        </div>
    </WhenVisible>
</template>
<script setup>
import { Link, WhenVisible } from '@inertiajs/vue3';
import { ref } from 'vue';

import AppFullLayout from '@/Layouts/FullLayout.vue'
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineOptions({
    layout: AppFullLayout
})

const { products, search, message, filters, oops } = defineProps({
    products: {
        type: Object,
        default: () => ({
            total: 0,
            per_page: 0,
            last_page: 0,
            current_page: 0,
            from: null,
            to: null,
            path: null,
            prev_page_url: null,
            first_page_url: null,
            links: [],
            last_page_url: null,
            next_page_url: null,
        }),
        required: true
    },
    message: {
        type: String,
        default: () => ''
    },
    search: {
        type: String,
        default: () => ''
    },
    filters: {
        type: Object,
        default: () => ({
            search: '',
            sort: 'id',
            order: 'asc'
        })
    }
})

console.log({ products, search, message, filters, oops })

const refSearch = ref(search)
</script>
