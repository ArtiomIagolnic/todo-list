<template>
  <div class="flex items-center justify-center h-screen">
    <div class="w-1/2 h-6/10 p-12 bg-white shadow-md">
      <h2 class="text-3xl font-bold mb-4">Reset Password</h2>
      <form @submit.prevent="authStore.handleResetPassword(resetData)">
        <div class="mb-6">
          <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
            Email
          </label>
          <input
            id="email"
            type="email"
            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"
            v-model="resetData.email"
            disabled
          />
        </div>
        <div class="mb-6">
          <label
            for="password"
            class="block text-gray-700 text-sm font-bold mb-2"
          >
            New Password
          </label>
          <input
            id="password"
            type="password"
            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"
            v-model="resetData.password"
          />
          <span
            class="text-red-500 text-xs italic"
            v-if="authStore.errors.password"
          >
            {{ authStore.errors.password[0] }}
          </span>
        </div>
        <div class="mb-6">
          <label
            for="confirmPassword"
            class="block text-gray-700 text-sm font-bold mb-2"
          >
            Confirm Password
          </label>
          <input
            id="confirmPassword"
            type="password"
            class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"
            v-model="resetData.password_confirmation"
          />
          <span
            class="text-red-500 text-xs italic"
            v-if="authStore.errors.password_confirmation"
          >
            {{ authStore.errors.password_confirmation[0] }}
          </span>
        </div>
        <div class="flex items-center justify-between">
          <button
            class="mb-3 bg-indigo-500 h-10 w-full text-white rounded-md px-4 py-2 hover:bg-indigo-600"
            type="submit"
          >
            Reset Password
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from '../../stores/auth'
export default {
  data() {
    return {
      resetData: {
        email: this.$route.query.email,
        token: this.$route.params.token,
        password: '',
        password_confirmation: '',
      },
      authStore: useAuthStore()
    }
  }
}
</script>

