<template>
  <div class="card" @click="$emit('click')">
    <img :src="provider.logo" alt="Logo" class="logo" loading="lazy" />
    <div class="info">
      <h3 class="name">{{ provider.name }}</h3>
      <p class="desc">{{ provider.description }}</p>
      <span class="category">{{ provider.category.name }}</span>
    </div>
  </div>
</template>

<script setup>
defineProps({
  provider: Object
})
</script>

<style scoped>
.card {
  display: flex;
  gap: 1rem;
  background: white;
  border-radius: 10px;
  padding: 1rem;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  transition: transform 0.2s ease;
}
.card:hover {
  transform: scale(1.02);
}
.logo {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 10px;
  border: 1px solid #eee;
}
.info {
  flex: 1;
}
.name {
  font-size: 18px;
  font-weight: 600;
  margin: 0;
}
.desc {
  color: #666;
  margin: 0.5rem 0;
}
.category {
  font-size: 13px;
  color: #999;
}
</style>
