<script setup>
</script>

<template>
  <header>
    <div class="max-w-7xl mx-auto">
      <nav>
        <RouterLink class="px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 text-white" to="/">
          Home
        </RouterLink>
        <RouterLink to="/currency">
          Currency
        </RouterLink>
      </nav>
    </div>
  </header>

  <main class="max-w-7xl mx-auto min-h-scree">
    <RouterView />
  </main>
</template>
