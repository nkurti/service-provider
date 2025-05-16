<template>
  <div class="bg-white border border-gray-200 shadow-md rounded-lg p-4 flex transition-transform duration-200 hover:scale-[1.02]" @click="$emit('click')">
    <img :src="provider.logo" alt="Logo" class="logo object-cover rounded-xl border border-gray-200" loading="lazy" />
    <div class="ml-4 text-gray-800 w-full flex-1">
      <h3 class="text-xl font-bold">{{ provider.name }}</h3>
      <p class="text-gray-600 text-base">{{ provider.description }}</p>
      <span class="text-gray-900 bg-gray-200 px-2 py-1 rounded text-sm">{{ provider.category.name }}</span>
    </div>
  </div>
</template>

<script setup>
defineProps({
  provider: Object
})
</script>

<style scoped>
.logo {
  width: 80px;
  height: 80px;
}
.flex-1{
  flex: 1;
}
</style>
