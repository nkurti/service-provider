<template>
  <div class="profile-container" v-if="provider">
    <button class="back-btn" @click="goBack">← Back to list</button>

    <div class="card">
      <img :src="provider.logo" alt="Logo" class="logo" />

      <div class="info">
        <h2 class="name">{{ provider.name }}</h2>
        <p class="description">{{ provider.description }}</p>
        <p class="category"><strong>Category:</strong> {{ provider.category.name }}</p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRoute, useRouter } from 'vue-router'

const route = useRoute()
const router = useRouter()
const provider = ref(null)

const fetchProvider = async () => {
  const { data } = await axios.get(`/api/providers/${route.params.id}`)
  provider.value = data
}

const goBack = () => {
  router.push('/')
}

onMounted(fetchProvider)
</script>

<style scoped>
.profile-container {
  max-width: 800px;
  margin: 2rem auto;
  padding: 1rem;
}

.back-btn {
  background-color: #f3f3f3;
  border: 1px solid #ccc;
  border-radius: 6px;
  padding: 0.4rem 1rem;
  margin-bottom: 1.5rem;
  font-size: 14px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}
.back-btn:hover {
  background-color: #e2e2e2;
}

.card {
  display: flex;
  gap: 2rem;
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
  align-items: center;
}

.logo {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 12px;
  border: 1px solid #eee;
}

.info {
  flex: 1;
}

.name {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.description {
  font-size: 16px;
  color: #555;
  margin-bottom: 1rem;
}

.category {
  font-size: 14px;
  color: #777;
}
</style>
