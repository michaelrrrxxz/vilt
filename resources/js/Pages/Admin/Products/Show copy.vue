<template>
    <div class="bg-blue-50">
        <div class="max-w-6xl mx-auto relative">
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
                            <button @click="validateProduct" class="bg-blue-500 font-bold text-white py-1.5 px-4 rounded-md">
                                {{ product ? 'Update Record' : 'Save Record' }}
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
                                        <div class="shrink-0 grow-0 basis-auto w-full md:w-1/2 p-2">
                                            <div class="flex flex-wrap">
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <InputLabel
                                                        for="refProductName"
                                                        value="Product Name"
                                                    />
                                                </div>
                                                <div class="shrink-0 grow-0 basis-auto w-full">
                                                    <input
                                                        type="file"
                                                        @input="formUpload.file = $event.target.files[0]" 
                                                        class="w-full border-gray-400"
                                                    />
                                                </div>
                                                <div>
                                                    <progress v-if="formUpload.progress" :value="formUpload.progress.percentage" max="100">
                                                    {{ formUpload.progress.percentage }}%
                                                    </progress>
                                                </div>
                                                <button @click="validateUpload" class="bg-blue-500 font-bold text-white py-1.5 px-4 rounded-md">
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
                                                        for="refProductName"
                                                        value="Product Name"
                                                    />
                                                </div>
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <TextInput
                                                        v-model="formProduct.product_name"
                                                        id="refProductName"
                                                        class="w-full"
                                                        placeholder="enter here"
                                                    />
                                                </div>
                                                <div class="">
                                                    <InputError
                                                        :message="formProduct.errors.product_name"
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
                                        <div class="shrink-0 grow-0 basis-auto w-full p-2">
                                            <div class="flex flex-wrap">
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <InputLabel
                                                        for="product_name"
                                                        value="Product Name"
                                                    />
                                                </div>
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <!-- <TextInput
                                                        id="product_name"
                                                        class="w-full"
                                                        placeholder="enter here"
                                                    /> -->
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
                                                    <InputLabel
                                                        for="product_name"
                                                        value="Product Name"
                                                    />
                                                </div>
                                                <div class="shrink-0 grow-0 basis-auto w-full mb-2">
                                                    <select class="w-full border-gray-300 text-gray-600 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                                                        <option>select here</option>
                                                        <option>select 2</option>
                                                    </select>
                                                </div>
                                                <div class="">
                                                    <InputError
                                                        message=""
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
            </div>
        </div>
    </div>
</template>
<script setup>

    import { Link, useForm } from '@inertiajs/vue3';

    import AppFullLayout from '@/Layouts/FullLayout.vue'
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';

    defineOptions({
        layout: AppFullLayout
    })

    const { product } = defineProps({
        product: {
            type: Object,
            default: () => {}
        }
    });

    const formProduct = useForm({
        product_name: product?.product_name || '',
    });

    const validateProduct = () => {
        if (product?.id) {
            return formProduct.put(route('products.update', product.id), {
                preserveScroll: true,
                onSuccess: () => formProduct.reset(),
                onError: () => {
                    if (formProduct.errors.product_name) {
                        refProductName.value.focus();
                    }
                },
            });
        }

        return formProduct.post(route('products.store'), {
            preserveScroll: true,
            onSuccess: () => formProduct.reset(),
            onError: () => {
                if (formProduct.errors.product_name) {
                    refProductName.value.focus();
                }
            },
        });
    }
    
    const formUpload = useForm({
        product: product?.id,
        file: null,
    });

    const validateUpload = () => {
        formUpload.post(route('products.upload'), {
            forceFormData: true,
        })
    }

</script>