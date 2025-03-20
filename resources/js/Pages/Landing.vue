<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<template>
    <div class="bg-white">
        <!-- Mobile menu -->
        <TransitionRoot as="template" :show="open">
            <Dialog class="relative z-40 lg:hidden" @close="open = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-black bg-opacity-25" />
                </TransitionChild>

                <div class="fixed inset-0 z-40 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full" enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                        leave-to="-translate-x-full">
                        <DialogPanel
                            class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                            <div class="flex px-4 pb-2 pt-5">
                                <button type="button"
                                    class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400"
                                    @click="open = false">
                                    <span class="absolute -inset-0.5" />
                                    <span class="sr-only">Close menu</span>
                                    <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                                </button>
                            </div>

                            <!-- Links -->
                            <TabGroup as="div" class="mt-2">
                                <div class="border-b border-gray-200">
                                    <TabList class="-mb-px flex space-x-8 px-4">
                                        <Tab as="template" v-for="category in navigation.categories"
                                            :key="category.name" v-slot="{ selected }">
                                            <button
                                                :class="[selected ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-900', 'flex-1 whitespace-nowrap border-b-2 px-1 py-4 text-base font-medium']">{{
                                                category.name }}</button>
                                        </Tab>
                                    </TabList>
                                </div>
                                <TabPanels as="template">
                                    <TabPanel v-for="category in navigation.categories" :key="category.name"
                                        class="space-y-10 px-4 pb-8 pt-10">
                                        <div class="grid grid-cols-2 gap-x-4">
                                            <div v-for="item in category.featured" :key="item.name"
                                                class="group relative text-sm">
                                                <div
                                                    class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                                    <img :src="item.imageSrc" :alt="item.imageAlt"
                                                        class="object-cover object-center" />
                                                </div>
                                                <a :href="item.href" class="mt-6 block font-medium text-gray-900">
                                                    <span class="absolute inset-0 z-10" aria-hidden="true" />
                                                    {{ item.name }}
                                                </a>
                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                            </div>
                                        </div>
                                        <div v-for="section in category.sections" :key="section.name">
                                            <p :id="`${category.id}-${section.id}-heading-mobile`"
                                                class="font-medium text-gray-900">{{ section.name }}</p>
                                            <ul role="list"
                                                :aria-labelledby="`${category.id}-${section.id}-heading-mobile`"
                                                class="mt-6 flex flex-col space-y-6">
                                                <li v-for="item in section.items" :key="item.name" class="flow-root">
                                                    <a :href="item.href" class="-m-2 block p-2 text-gray-500">{{
                                                        item.name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </TabPanel>
                                </TabPanels>
                            </TabGroup>

                            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                                <div v-for="page in navigation.pages" :key="page.name" class="flow-root">
                                    <a :href="page.href" class="-m-2 block p-2 font-medium text-gray-900">{{ page.name
                                        }}</a>
                                </div>
                            </div>

                            <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                                <div class="flow-root">
                                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                                </div>
                                <div class="flow-root">
                                    <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create account</a>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6">
                                <a href="#" class="-m-2 flex items-center p-2">
                                    <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                        class="block h-auto w-5 flex-shrink-0" />
                                    <span class="ml-3 block text-base font-medium text-gray-900">CAD</span>
                                    <span class="sr-only">, change currency</span>
                                </a>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <header class="relative bg-white">
            <p
                class="flex h-10 items-center justify-center bg-indigo-600 px-4 text-sm font-medium text-white sm:px-6 lg:px-8">
                Get free delivery on orders over $100</p>

            <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="border-b border-gray-200">
                    <div class="flex h-16 items-center">
                        <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden"
                            @click="open = true">
                            <span class="absolute -inset-0.5" />
                            <span class="sr-only">Open menu</span>
                            <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                        </button>

                        <!-- Logo -->
                        <div class="ml-4 flex lg:ml-0">
                            <a href="#">
                                <span class="sr-only">Your Company</span>
                                <img class="h-8 w-auto"
                                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="" />
                            </a>
                        </div>

                        <!-- Flyout menus -->
                        <PopoverGroup class="hidden lg:ml-8 lg:block lg:self-stretch">
                            <div class="flex h-full space-x-8">
                                <Popover v-for="category in navigation.categories" :key="category.name" class="flex"
                                    v-slot="{ open }">
                                    <div class="relative flex">
                                        <PopoverButton
                                            :class="[open ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-700 hover:text-gray-800', 'relative z-10 -mb-px flex items-center border-b-2 pt-px text-sm font-medium transition-colors duration-200 ease-out']">
                                            {{ category.name }}</PopoverButton>
                                    </div>

                                    <transition enter-active-class="transition ease-out duration-200"
                                        enter-from-class="opacity-0" enter-to-class="opacity-100"
                                        leave-active-class="transition ease-in duration-150"
                                        leave-from-class="opacity-100" leave-to-class="opacity-0">
                                        <PopoverPanel class="absolute z-10 inset-x-0 top-full text-sm text-gray-500">
                                            <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                            <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true" />

                                            <div class="relative bg-white">
                                                <div class="mx-auto max-w-7xl px-8">
                                                    <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                                                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                                                            <div v-for="item in category.featured" :key="item.name"
                                                                class="group relative text-base sm:text-sm">
                                                                <div
                                                                    class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                                                    <img :src="item.imageSrc" :alt="item.imageAlt"
                                                                        class="object-cover object-center" />
                                                                </div>
                                                                <a :href="item.href"
                                                                    class="mt-6 block font-medium text-gray-900">
                                                                    <span class="absolute inset-0 z-10"
                                                                        aria-hidden="true" />
                                                                    {{ item.name }}
                                                                </a>
                                                                <p aria-hidden="true" class="mt-1">Shop now</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                                                            <div v-for="section in category.sections"
                                                                :key="section.name">
                                                                <p :id="`${section.name}-heading`"
                                                                    class="font-medium text-gray-900">{{ section.name }}
                                                                </p>
                                                                <ul role="list"
                                                                    :aria-labelledby="`${section.name}-heading`"
                                                                    class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                                    <li v-for="item in section.items" :key="item.name"
                                                                        class="flex">
                                                                        <a :href="item.href"
                                                                            class="hover:text-gray-800">{{ item.name
                                                                            }}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </PopoverPanel>
                                    </transition>
                                </Popover>

                                <a v-for="page in navigation.pages" :key="page.name" :href="page.href"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">{{
                                    page.name }}</a>
                            </div>
                        </PopoverGroup>

                        <div class="ml-auto flex items-center">
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true" />
                                <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Create
                                    account</a>
                            </div>

                            <div class="hidden lg:ml-8 lg:flex">
                                <a href="#" class="flex items-center text-gray-700 hover:text-gray-800">
                                    <img src="https://tailwindui.com/img/flags/flag-canada.svg" alt=""
                                        class="block h-auto w-5 flex-shrink-0" />
                                    <span class="ml-3 block text-sm font-medium">CAD</span>
                                    <span class="sr-only">, change currency</span>
                                </a>
                            </div>

                            <!-- Search -->
                            <div class="flex lg:ml-6">
                                <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <MagnifyingGlassIcon class="h-6 w-6" aria-hidden="true" />
                                </a>
                            </div>

                            <!-- Cart -->
                            <div class="ml-4 flow-root lg:ml-6">
                                <a href="#" class="group -m-2 flex items-center p-2">
                                    <ShoppingBagIcon
                                        class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                        aria-hidden="true" />
                                    <span
                                        class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                    <span class="sr-only">items in cart, view bag</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <div class="bg-white z-0">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div v-for="product in products" :key="product.id" class="group relative">
                    <div
                        class=" z-0 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                        <img :src="product.imageSrc" :alt="product.imageAlt"
                            class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a :href="product.href">
                                    <span aria-hidden="true" class="absolute inset-0" />
                                    {{ product.name }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ product.color }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1"
                        patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path
                        d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="text-base font-semibold leading-7 text-indigo-600">Deploy faster</p>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">A better workflow
                        </h1>
                        <p class="mt-6 text-xl leading-8 text-gray-700">Aliquet nec orci mattis amet quisque ullamcorper
                            neque, nibh sem. At arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae
                            feugiat egestas.</p>
                    </div>
                </div>
            </div>
            <div
                class="-ml-12 -mt-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                <img class="w-[48rem] max-w-none rounded-xl ring-1 ring-gray-400/10 sm:w-[85rem]"
                    src="http://127.0.0.1:8000/images/lycaon.png" alt="" />
            </div>
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">
                        <p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper
                            sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra
                            tellus varius sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed
                            eget risus enim. Mattis mauris semper sed amet vitae sed turpis id.</p>
                        <ul role="list" class="mt-8 space-y-8 text-gray-600">
                            <li class="flex gap-x-3">
                                <CloudArrowUpIcon class="mt-1 h-5 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                <span><strong class="font-semibold text-gray-900">Push to deploy.</strong> Lorem ipsum,
                                    dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit
                                    eaque, iste dolor cupiditate blanditiis ratione.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <LockClosedIcon class="mt-1 h-5 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                <span><strong class="font-semibold text-gray-900">SSL certificates.</strong> Anim aute
                                    id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat
                                    commodo.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <ServerIcon class="mt-1 h-5 w-5 flex-none text-indigo-600" aria-hidden="true" />
                                <span><strong class="font-semibold text-gray-900">Database backups.</strong> Ac
                                    tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi
                                    lobortis.</span>
                            </li>
                        </ul>
                        <p class="mt-8">Et vitae blandit facilisi magna lacus commodo. Vitae sapien duis odio id et. Id
                            blandit molestie auctor fermentum dignissim. Lacus diam tincidunt ac cursus in vel. Mauris
                            varius vulputate et ultrices hac adipiscing egestas. Iaculis convallis ac tempor et ut. Ac
                            lorem vel integer orci.</p>
                        <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">No server? No problem.</h2>
                        <p class="mt-6">Id orci tellus laoreet id ac. Dolor, aenean leo, ac etiam consequat in.
                            Convallis arcu ipsum urna nibh. Pharetra, euismod vitae interdum mauris enim, consequat
                            vulputate nibh. Maecenas pellentesque id sed tellus mauris, ultrices mauris. Tincidunt enim
                            cursus ridiculus mi. Pellentesque nam sed nullam sed diam turpis ipsum eu a sed convallis
                            diam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
            alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center" />
        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
            aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" />
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Work with us</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui
                    irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
                <div
                    class="grid grid-cols-1 gap-x-8 gap-y-6 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                    <a v-for="link in links" :key="link.name" :href="link.href">{{ link.name }} <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
                <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                    <div v-for="stat in stats" :key="stat.name" class="flex flex-col-reverse">
                        <dt class="text-base leading-7 text-gray-300">{{ stat.name }}</dt>
                        <dd class="text-2xl font-bold leading-9 tracking-tight text-white">{{ stat.value }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'

import {
    Dialog,
    DialogPanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    Tab,
    TabGroup,
    TabList,
    TabPanel,
    TabPanels,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'

import { Bars3Icon, MagnifyingGlassIcon, ShoppingBagIcon, XMarkIcon } from '@heroicons/vue/24/outline'


const products = [
    {
        id: 1,
        name: 'Basic Tee',
        href: '#',
        imageSrc: 'http://127.0.0.1:8000/images/lycaon.png',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    {
        id: 1,
        name: 'Basic Tee',
        href: '#',
        imageSrc: 'http://127.0.0.1:8000/images/lycaon.png',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    {
        id: 1,
        name: 'Basic Tee',
        href: '#',
        imageSrc: 'http://127.0.0.1:8000/images/lycaon.png',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    {
        id: 1,
        name: 'Basic Tee',
        href: '#',
        imageSrc: 'http://127.0.0.1:8000/images/lycaon.png',
        imageAlt: "Front of men's Basic Tee in black.",
        price: '$35',
        color: 'Black',
    },
    // More products...
]


const links = [
    { name: 'Open roles', href: '#' },
    { name: 'Internship program', href: '#' },
    { name: 'Our values', href: '#' },
    { name: 'Meet our leadership', href: '#' },
]

const stats = [
    { name: 'Offices worldwide', value: '12' },
    { name: 'Full-time colleagues', value: '300+' },
    { name: 'Hours per week', value: '40' },
    { name: 'Paid time off', value: 'Unlimited' },
]

const navigation = {
    categories: [
        {
            id: 'women',
            name: 'Women',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg',
                    imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.',
                },
                {
                    name: 'Basic Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg',
                    imageAlt: 'Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees.',
                },
            ],
            sections: [
                {
                    id: 'clothing',
                    name: 'Clothing',
                    items: [
                        { name: 'Tops', href: '#' },
                        { name: 'Dresses', href: '#' },
                        { name: 'Pants', href: '#' },
                        { name: 'Denim', href: '#' },
                        { name: 'Sweaters', href: '#' },
                        { name: 'T-Shirts', href: '#' },
                        { name: 'Jackets', href: '#' },
                        { name: 'Activewear', href: '#' },
                        { name: 'Browse All', href: '#' },
                    ],
                },
                {
                    id: 'accessories',
                    name: 'Accessories',
                    items: [
                        { name: 'Watches', href: '#' },
                        { name: 'Wallets', href: '#' },
                        { name: 'Bags', href: '#' },
                        { name: 'Sunglasses', href: '#' },
                        { name: 'Hats', href: '#' },
                        { name: 'Belts', href: '#' },
                    ],
                },
                {
                    id: 'brands',
                    name: 'Brands',
                    items: [
                        { name: 'Full Nelson', href: '#' },
                        { name: 'My Way', href: '#' },
                        { name: 'Re-Arranged', href: '#' },
                        { name: 'Counterfeit', href: '#' },
                        { name: 'Significant Other', href: '#' },
                    ],
                },
            ],
        },
        {
            id: 'men',
            name: 'Men',
            featured: [
                {
                    name: 'New Arrivals',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/product-page-04-detail-product-shot-01.jpg',
                    imageAlt: 'Drawstring top with elastic loop closure and textured interior padding.',
                },
                {
                    name: 'Artwork Tees',
                    href: '#',
                    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-06.jpg',
                    imageAlt:
                        'Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt.',
                },
            ],
            sections: [
                {
                    id: 'clothing',
                    name: 'Clothing',
                    items: [
                        { name: 'Tops', href: '#' },
                        { name: 'Pants', href: '#' },
                        { name: 'Sweaters', href: '#' },
                        { name: 'T-Shirts', href: '#' },
                        { name: 'Jackets', href: '#' },
                        { name: 'Activewear', href: '#' },
                        { name: 'Browse All', href: '#' },
                    ],
                },
                {
                    id: 'accessories',
                    name: 'Accessories',
                    items: [
                        { name: 'Watches', href: '#' },
                        { name: 'Wallets', href: '#' },
                        { name: 'Bags', href: '#' },
                        { name: 'Sunglasses', href: '#' },
                        { name: 'Hats', href: '#' },
                        { name: 'Belts', href: '#' },
                    ],
                },
                {
                    id: 'brands',
                    name: 'Brands',
                    items: [
                        { name: 'Re-Arranged', href: '#' },
                        { name: 'Counterfeit', href: '#' },
                        { name: 'Full Nelson', href: '#' },
                        { name: 'My Way', href: '#' },
                    ],
                },
            ],
        },
    ],
    pages: [
        { name: 'Company', href: '#' },
        { name: 'Stores', href: '#' },
    ],
}

const open = ref(false)
</script>
