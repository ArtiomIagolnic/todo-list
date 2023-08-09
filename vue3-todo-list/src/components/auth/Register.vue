<template>
  <div class="flex justify-center items-center h-screen">
    <div class="w-3/4 bg-white shadow-md p-8">
      <h2 class="text-3xl font-semibold mb-8">Registration Form</h2>
      <form @submit.prevent="authStore.handleRegister(userData)">
        <div class="space-y-4">
          <!-- Name field -->
          <div>
            <label for="name" class="block text-gray-700">Name</label>
            <input
              v-model="userData.name"
              type="text"
              id="name"
              class="w-full p-2 h-10 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            />
            <span
              class="text-red-500 text-xs italic"
              v-if="authStore.errors && authStore.errors.name"
            >
              {{ authStore.errors.name[0] }}
            </span>
          </div>
          <!-- Email field -->
          <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input
              v-model="userData.email"
              type="email"
              id="email"
              class="w-full p-2 h-10 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            />
            <span
              class="text-red-500 text-xs italic"
              v-if="authStore.errors && authStore.errors.email"
            >
              {{ authStore.errors.email[0] }}
            </span>
          </div>
          <!-- Password field -->
          <div>
            <label for="password" class="block text-gray-700">Password</label>
            <input
              v-model="userData.password"
              type="password"
              id="password"
              class="w-full p-2 h-10 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            />
            <span
              class="text-red-500 text-xs italic"
              v-if="authStore.errors && authStore.errors.password"
            >
              {{ authStore.errors.password[0] }}
            </span>
          </div>
          <!-- Confirm Password field -->
          <div>
            <label for="confirm-password" class="block text-gray-700">
              Confirm Password
            </label>
            <input
              v-model="userData.password_confirmation"
              type="password"
              id="confirm-password"
              class="w-full p-2 h-10 rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            />
            <span
              class="text-red-500 text-xs italic"
              v-if="authStore.errors && authStore.errors.password_confirmation"
            >
              {{ authStore.errors.password_confirmation[0] }}
            </span>
          </div>
          <!-- Terms and Conditions checkbox -->
          <div class="flex items-center">
            <input
              type="checkbox"
              id="terms"
              class="form-checkbox text-indigo-500 rounded"
            />
            <label for="terms" class="ml-2 text-gray-700">
              I agree to the Terms and Conditions
            </label>
          </div>
          <!-- Register button -->
          <div class="flex justify-center">
            <button
              type="submit"
              class="py-3 w-full px-6 bg-indigo-500 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600"
            >
              Register
            </button>
          </div>
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
      userData: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      authStore: useAuthStore()
    }
  }
}
</script>
