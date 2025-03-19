<script>
import { Link, Head } from '@inertiajs/vue3'
import Navbar from '@/Components/Navbar.vue'

export default {
    components: {
        Link,
        Head,
        Navbar
    }
}
</script>

<template>
    <Head title="Contact Page" />

    <div class="min-h-screen bg-gray-100">
        <!-- Navbar -->
        <Navbar />

        <main class="p-4">
            <h1 class="text-2xl font-bold">Contact Vue</h1>
        </main>
    </div>
</template>
