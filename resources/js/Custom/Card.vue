<template>
    <div
        :class="[
            'flex',
            'flex-col',
            'relative',
            'break-words',
            'bg-clip-border',
            'radius-lg',
            'shadow-md',
            'border border-solid border-gray-50',
            'min-h-[150px]',
            'min-w-0'
        ]"
    >
        <div class="p-2 mb-0 bg-gray-50">
            <slot name="header"></slot>
        </div>
        <div class="flex-auto p-2">
            <slot name="body"></slot>
        </div>
    </div>
</template>
<script setup>
    defineProps({
    })
</script>
