<template>
  <div>
    <header>
      <h1>Service Provider Directory</h1>
    </header>
    <main>
      <router-view />
    </main>
  </div>
</template>

<script setup>
</script>

<style scoped>
header {
  background-color: #f5f5f5;
  padding: 1rem;
  text-align: center;
  border-bottom: 1px solid #ddd;
}
main {
  padding: 2rem;
}
</style>
