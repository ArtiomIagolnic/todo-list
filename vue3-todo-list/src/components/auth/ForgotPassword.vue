<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Forgot Password</h2>

      <form @submit.prevent="authStore.handleForgotPassword(email)">
        <div class="mb-4">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
            Email Address
          </label>
          <input
            type="email"
            id="email"
            v-model="email"
            class="w-full px-3 py-2 placeholder-gray-400 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter your email"
            required
          />
          <span
            class="text-red-500 text-xs italic"
            v-if="authStore.errors.email"
          >
            {{ authStore.errors.email[0] }}
          </span>
        </div>

        <button
          type="submit"
          class="mb-3 bg-indigo-500 h-10 w-full text-white rounded-md px-4 py-2 hover:bg-indigo-600"
        >
          Send Reset Link
        </button>
      </form>

      <div class="mt-4 text-center">
        <router-link
          :to="{ name: 'login' }"
          class="text-blue-500 hover:text-blue-700"
        >
          Back to Login
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from '../../stores/auth'
export default {
  data() {
    return {
      email: '',
      authStore: useAuthStore()
    }
  },
  methods: {
    submitForm() {
      // Implement the logic to handle the form submission (e.g., send reset password link)
      console.log('Email:', this.email)
      // Reset the email field
      this.email = ''
    }
  }
}
</script>
