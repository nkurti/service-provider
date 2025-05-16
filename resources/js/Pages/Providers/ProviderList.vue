<template>
  <div class="max-w-[1000px] mx-auto p-8">
    <h2>Service Providers</h2>
    <CategoryFilter @select="filterByCategory" />

    <div class="grid grid-cols-2 gap-6" v-if="ready">
      <ProviderCard
        v-for="provider in providers"
        :key="provider.id"
        :provider="provider"
        @click="goToProfile(provider.id)"
      />
    </div>

    <div v-if="!providers.length && ready" class="text-center text-gray-500 mt-8">No providers found.</div>

    <div class="pagination mt-8 text-center" v-if="pagination.last > 1">
      <button
        class="nav"
        :disabled="pagination.current === 1"
        @click="goToPage(pagination.current - 1)"
      >
        ← Prev
      </button>

      <button
        v-for="page in pagination.last"
        :key="page"
        :class="{ active: page === pagination.current }"
        @click="goToPage(page)"
      >
        {{ page }}
      </button>

      <button
        class="nav"
        :disabled="pagination.current === pagination.last"
        @click="goToPage(pagination.current + 1)"
      >
        Next →
      </button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import ProviderCard from './ProviderCard.vue'
import CategoryFilter from './CategoryFilter.vue'
import { useRouter } from 'vue-router'

const providers = ref([])
const pagination = ref({ current: 1, last: 1 })
const selectedCategory = ref(null)
const ready = ref(false)
const router = useRouter()

const fetchProviders = async (category_id = null, page = 1) => {
  ready.value = false
  const { data } = await axios.get('/api/providers', {
    params: {
      category_id: category_id || undefined,
      page
    }
  })
  providers.value = data.data
  pagination.value = {
    current: data.meta.current_page,
    last: data.meta.last_page
  }

  ready.value = true
}

const filterByCategory = (category_id) => {
  selectedCategory.value = category_id
  fetchProviders(category_id, 1)
}

const goToPage = (page) => {
  fetchProviders(selectedCategory.value, page)
}

const goToProfile = (id) => {
  router.push(`/providers/${id}`)
}

onMounted(() => {
  fetchProviders()
})
</script>


<style scoped>

.pagination button {
  margin: 0 0.25rem;
  padding: 0.5rem 1rem;
  border: 1px solid #ddd;
  background: #f9f9f9;
  cursor: pointer;
  border-radius: 4px;
}
.pagination button.active {
  background-color: #333;
  color: #fff;
  border-color: #333;
}
.pagination button.nav {
  font-weight: bold;
}
.pagination button:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}
</style>
