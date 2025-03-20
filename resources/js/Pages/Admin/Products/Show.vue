<template>
    <div>
        <Head title="Create Product" />
        <div class="max-w-6xl mx-auto relative">
            {{ message }}
            <div class="flex flex-wrap">
                <div class="w-full p-2 sticky top-[65px] z-50">
                    <div class="min-h-[75px] bg-white shadow-md rounded-md flex items-center justify-between p-4">
                        <div class="font-bold text-lg">Add a Product</div>
                        <div class="flex">
                            <Link
                                :href="route('products.index')"
                                class="bg-white font-bold text-red-500 py-1.5 px-4 mr-2"
                            >
                                Discard
                            </Link>
                            <button
                                class="bg-blue-500 font-bold text-white py-1.5 px-4 rounded-md"
                                @click.prevent="validate.product"
                            >
                                {{ product?.id ? 'Update Record' : 'Save Record' }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="shrink-0 grow-0 basis-auto w-full md:w-3/4 p-2">
                    <div class="flex flex-wrap">
                        <div class="shrink-0 grow-0 basis-auto w-full">
                            <div class="bg-white shadow-sm rounded-md border border-solid border-gray-100 mb-4">
                                <div class="flex flex-col">
                                    <div class="bg-gray-50 font-bold rounded-t-md p-4">
                                        Banners
                                    </div>
                                    <div class="flex flex-wrap p-2">
                                        <div class="shrink-0 grow-0 basis-auto w-full p-2">
                                            <div class="flex flex-wrap">
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <div class="flex items-center justify-center w-full">
                                                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                                </svg>
                                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                                    <span class="font-semibold">Click to upload</span> or drag and drop
                                                                </p>
                                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                                    SVG, PNG, JPG or GIF (MAX. 800x400px)
                                                                </p>
                                                            </div>
                                                            <input
                                                                id="dropzone-file"
                                                                type="file"
                                                                class="hidden"
                                                                @input="form.banner.file = $event.target.files[0]"
                                                            />
                                                        </label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <progress v-if="form.banner.progress" :value="form.banner.progress.percentage" max="100">
                                                    {{ form.banner.progress.percentage }}%
                                                    </progress>
                                                </div>
                                                <button @click.prevent="validate.banner" class="bg-blue-500 font-bold text-white py-1.5 px-4 rounded-md">
                                                    Upload File
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white shadow-sm rounded-md border border-solid border-gray-100 mb-4">
                                <div class="flex flex-col">
                                    <div class="bg-gray-50 font-bold rounded-t-md p-4">
                                        Basic Informations
                                    </div>
                                    <div class="flex flex-wrap p-2">
                                        <div class="shrink-0 grow-0 basis-auto w-full md:w-1/2 p-2">
                                            <div class="flex flex-wrap">
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <InputLabel
                                                        for="productName"
                                                        value="Product Name"
                                                    />
                                                </div>
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <TextInput
                                                        v-model="form.product.product_name"
                                                        id="productName"
                                                        class="w-full"
                                                        placeholder="enter here"
                                                    />
                                                </div>
                                                <div class="">
                                                    <InputError
                                                        :message="form.product.errors.product_name"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shrink-0 grow-0 basis-auto w-full md:w-1/4 p-2">
                    <div class="flex flex-wrap sticky top-[100px] z-10">
                        <div class="shrink-0 grow-0 basis-auto w-full">
                            <div class="bg-white shadow-sm rounded-md border border-solid border-gray-100 mb-4">
                                <div class="flex flex-col">
                                    <div class="bg-gray-50 font-bold rounded-t-md p-2">
                                        Type
                                    </div>
                                    <div class="flex flex-wrap p-2">
                                        <!-- <div class="shrink-0 grow-0 basis-auto w-full p-2">
                                            <div class="flex flex-wrap">
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <InputLabel
                                                        for="product_name"
                                                        value="Product Name"
                                                    />
                                                </div>
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <TextInput
                                                        id="product_name"
                                                        class="w-full"
                                                        placeholder="enter here"
                                                    />
                                                </div>
                                                <div class="">
                                                    <InputError
                                                        message=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shrink-0 grow-0 basis-auto w-full p-2">
                                            <div class="flex flex-wrap">
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <select class="w-full border-gray-300 text-gray-600 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                                        <option>select here</option>
                                                        <option>select 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>

    import { Head, Link, useForm  } from '@inertiajs/vue3';

    import AppFullLayout from '@/Layouts/FullLayout.vue'
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';

    defineOptions({
        layout: AppFullLayout
    })

    const { product, message } = defineProps({
        product: {
            type: Object,
            default: () => {}
        },
        message: {
            type: String,
            default: () => ''
        }
    });

    const form = {
        product: useForm({
            product_name: product?.product_name || '',
        }),
        banner: useForm({
            product: product?.id,
            file: null,
        })
    }

    const validate = {
        product: () => {
            if (product?.id) {
                return form.product.put(route('products.update', product.id), {
                    preserveScroll: true,
                    onSuccess: () => form.product.reset(),
                    onError: () => {

                    },
                });
            }

            return form.product.post(route('products.store'), {
                preserveScroll: true,
                onSuccess: () => form.product.reset(),
                onError: () => {

                },
            });
        },
        banner: () => {
            return form.banner.put(route('products.upload', product.id), {
                forceFormData: true
            })
        }
    }

    console.log({
        product,
        message,
        form
    })
</script>
