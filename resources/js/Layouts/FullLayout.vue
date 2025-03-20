<template>
    <div class="h-screen w-full bg-blue-100">
        <AppHeader />
        <AppSidebar />
        <AppContent>
            <slot />
        </AppContent>
        <AppFooter />
    </div>
</template>
<script setup>
import AppHeader from '@/Layouts/core/Header.vue'
import AppSidebar from '@/Layouts/core/Sidebar.vue'
import AppContent from '@/Layouts/core/Content.vue'
import AppFooter from '@/Layouts/core/Footer.vue'

</script>