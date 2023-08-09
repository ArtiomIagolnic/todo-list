<template>
  <div class="bg-gray-100 min-h-screen">
    <!-- Hero Section -->

    <section class="py-20 bg-white">
      <div class="container mx-auto text-center">
        <h3 v-if="authStore.user">Hello {{ authStore.user.name }}</h3>
        <h1 class="text-4xl font-semibold text-gray-800 mb-4">
          Welcome to My Todo App
        </h1>
        <p class="text-gray-600 text-lg">
          Stay organized and manage your tasks with ease.
        </p>
        <a
          href="#"
          class="mt-6 inline-block bg-indigo-500 text-white py-3 px-6 rounded-lg font-semibold shadow-md hover:bg-indigo-600 transition-colors duration-300"
        >
          Get Started
        </a>
      </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-200">
      <div class="container mx-auto">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">
          Key Features
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
              <svg
                class="w-8 h-8 text-indigo-500 mr-4"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M2 7a3 3 0 013-3h10a3 3 0 110 6H5a3 3 0 01-3-3zm3-3a1 1 0 100 2h10a1 1 0 100-2H5z"
                  clip-rule="evenodd"
                ></path>
                <path
                  d="M3 13a3 3 0 003 3h8a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v5z"
                ></path>
              </svg>
              <h3 class="text-xl font-semibold text-gray-800">
                Easy Task Management
              </h3>
            </div>
            <p class="text-gray-600">
              Effortlessly organize and prioritize your tasks with our intuitive
              task management system.
            </p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
              <svg
                class="w-8 h-8 text-indigo-500 mr-4"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm9-6a1 1 0 00-1 1v4.586l-2.293-2.293a1 1 0 10-1.414 1.414l4 4a1 1 0 001.414 0l4-4a1 1 0 00-1.414-1.414L12 9.586V5a1 1 0 00-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <h3 class="text-xl font-semibold text-gray-800">
                Deadline Reminders
              </h3>
            </div>
            <p class="text-gray-600">
              Never miss a deadline again. Receive timely reminders and stay on
              top of your tasks.
            </p>
          </div>
          <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex items-center mb-4">
              <svg
                class="w-8 h-8 text-indigo-500 mr-4"
                viewBox="0 0 20 20"
                fill="currentColor"
              >
                <path
                  fill-rule="evenodd"
                  d="M7 2a1 1 0 011-1h4a1 1 0 011 1v3h4a1 1 0 011 1v10a1 1 0 01-1 1h-4v3a1 1 0 01-1 1H8a1 1 0 01-1-1v-3H3a1 1 0 01-1-1V6a1 1 0 011-1h4V2zm5 3H8v2h4V5zM8 8v2h4V8H8zm0 4v2h4v-2H8z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <h3 class="text-xl font-semibold text-gray-800">Collaboration</h3>
            </div>
            <p class="text-gray-600">
              Work together with your team and share tasks, ensuring everyone
              stays on the same page.
            </p>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { useAuthStore } from '../../stores/auth'

export default {
  computed: {
    authStore() {
      return useAuthStore()
    },
  },

  async mounted() {
    if (this.authStore.auth) {
      await this.authStore.getUser()
    }
  }
}
</script>
