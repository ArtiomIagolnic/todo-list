<template>
  <div class="flex flex-col items-center justify-center h-screen">
    <h1 class="text-6xl font-bold text-gray-800">404</h1>
    <p class="text-xl text-gray-600">Oops! Page not found.</p>
    <router-link
      to="/"
      class="mt-4 px-6 py-3 text-white bg-indigo-500 rounded-lg shadow hover:bg-indigo-600"
    >
      Go Back to TodoList
    </router-link>
  </div>
</template>

<script>
export default {}
</script>
