<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
</script>

<template>
  <div>
    <header class="flex items-center justify-center bg-gray-100 p-4">
      <img src="/images/logo.webp" alt="Logo" class="h-12 w-12 mr-2" />
      <h1>Service Provider Directory</h1>
    </header>
    <main class="p-2">
      <router-view />
    </main>
  </div>
</template>
