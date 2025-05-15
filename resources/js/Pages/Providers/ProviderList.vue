<template>
  <div class="container">
    <h2 class="title">Service Providers</h2>
    <CategoryFilter @select="filterByCategory" />

    <div class="grid">
      <ProviderCard
        v-for="provider in providers"
        :key="provider.id"
        :provider="provider"
        @click="goToProfile(provider.id)"
      />
    </div>

    <div v-if="!providers.length" class="empty">No providers found.</div>

    <div class="pagination" v-if="pagination.last > 1">
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
const router = useRouter()

const fetchProviders = async (category_id = null, page = 1) => {
  const { data } = await axios.get('/api/providers', {
    params: {
      category_id: category_id || undefined,
      page
    }
  })
  providers.value = data.data
  pagination.value = {
    current: data.current_page,
    last: data.last_page
  }
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
.container {
  max-width: 1000px;
  margin: 0 auto;
  padding: 2rem;
}
.title {
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 1rem;
}
.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
}
.empty {
  text-align: center;
  color: #888;
  margin-top: 2rem;
}

.pagination {
  margin-top: 2rem;
  text-align: center;
}
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
