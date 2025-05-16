<template>
  <div class="max-w-[800px] mx-auto my-8 p-4" v-if="provider">
    <button class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-md px-4 py-1.5 mb-6 text-sm cursor-pointer transition-all duration-200 ease-in-out" 
      @click="goBack">
      ← Back to list
    </button>

    <div class="bg-white border border-gray-200 shadow-md rounded-lg p-4 flex">
      <img :src="provider.logo" alt="Logo" class="logo object-cover rounded-xl border border-gray-200" />

      <div class="ml-4 text-gray-800 w-full flex-1">
        <h2 class="text-xl font-bold">{{ provider.name }}</h2>
        <p class="text-gray-600 text-base">{{ provider.description }}</p>
        <p class="text-gray-900 bg-gray-200 px-2 py-1 rounded text-sm"><strong>Category:</strong> {{ provider.category.name }}</p>
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
.logo {
  width: 120px;
  height: 120px;
}
.flex-1{
  flex: 1;
}
</style>
