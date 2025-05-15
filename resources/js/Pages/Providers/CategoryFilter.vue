<template>
  <div class="filter-wrapper">
    <label for="category-select">Filter by Category:</label>
    <select id="category-select" @change="$emit('select', $event.target.value)">
      <option value="">All Categories</option>
      <option
        v-for="category in categories"
        :key="category.id"
        :value="category.id"
      >
        {{ category.name }}
      </option>
    </select>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const categories = ref([])

const fetchCategories = async () => {
  const { data } = await axios.get('/api/categories')
  categories.value = data
}

onMounted(fetchCategories)
</script>

<style scoped>
.filter-wrapper {
  margin-bottom: 1.5rem;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  flex-wrap: wrap;
}

label {
  font-weight: 500;
  font-size: 16px;
}

select {
  padding: 0.5rem 1rem;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 15px;
  background-color: #fff;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
  cursor: pointer;
  transition: border-color 0.2s;
}

select:focus {
  outline: none;
  border-color: #666;
}
</style>
