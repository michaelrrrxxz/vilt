<template>
    <div class="flex justify-center items-center overflow-hidden">
      <img :src="imageUrl" alt="Logo" style="width: 150%; height: auto;" class="inline-block max-w-xs" />
    </div>
  </template>


<script setup>
const imageUrl = `${window.location.origin}/images/logo.png`;
</script>
