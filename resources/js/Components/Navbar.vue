<script setup>
import { ref } from 'vue'

const isOpen = ref(false)

const toggleMenu = () => {
  isOpen.value = !isOpen.value
}
</script>

<template>
  <nav class="bg-gray-800 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">
        <!-- Logo -->
        <div class="flex items-center">
          <a href="/" class="text-xl font-bold">MyApp</a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-6">
          <a href="/" class="hover:text-gray-300">Home</a>
          <a href="/about" class="hover:text-gray-300">About</a>
          <a href="/contact" class="hover:text-gray-300">Contact</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
          <button @click="toggleMenu" class="text-gray-400 hover:text-white focus:outline-none">
            <svg v-if="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg v-else class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div v-if="isOpen" class="md:hidden bg-gray-700">
      <a href="/" class="block px-4 py-2 text-white hover:bg-gray-600">Home</a>
      <a href="/about" class="block px-4 py-2 text-white hover:bg-gray-600">About</a>
      <a href="/contact" class="block px-4 py-2 text-white hover:bg-gray-600">Contact</a>
    </div>
  </nav>
</template>

<style scoped>
a {
  transition: color 0.3s;
}
</style>
