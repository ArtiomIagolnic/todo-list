<template>
  <div class="flex items-center justify-center h-screen">
    <div class="w-1/2 h-6/10 p-12 bg-white shadow-md">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Login</h2>

      <form @submit.prevent="authStore.handleLogin(user)">
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input
            v-model="user.email"
            type="email"
            id="email"
            class="mt-1 p-2 block h-10 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
          />
          <span
            class="text-red-500 text-xs italic"
            v-if="authStore.errors && authStore.errors.email"
          >
            {{ authStore.errors.email[0] }}
          </span>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-700">Password</label>
          <input
            v-model="user.password"
            type="password"
            id="password"
            class="mt-1 p-2 h-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
          />
          <span
            class="text-red-500 text-xs italic"
            v-if="authStore.errors && authStore.errors.password"
          >
            {{ authStore.errors.password[0] }}
          </span>
        </div>
        <div class="flex items-center justify-between mb-3">
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input
                id="remember"
                aria-describedby="remember"
                type="checkbox"
                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                required=""
              />
            </div>
            <div class="ml-3 text-sm">
              <label for="remember" class="text-gray-500 dark:text-gray-300">
                Remember me
              </label>
            </div>
          </div>

          <router-link
            :to="{ name: 'forgot-password' }"
            class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500"
          >
            Forgot password?
          </router-link>
        </div>

        <button
          type="submit"
          class="mb-3 bg-indigo-500 h-10 w-full text-white rounded-md px-4 py-2 hover:bg-indigo-600"
        >
          Login
        </button>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
          Don’t have an account yet?

          <router-link
            :to="{ name: 'register' }"
            class="font-medium text-primary-600 hover:underline dark:text-primary-500"
          >
            Sign up
          </router-link>
        </p>
      </form>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from '../../stores/auth'

export default {
  data() {
    return {
      user: {
        email: '',
        password: '',
      },
      authStore: useAuthStore()
    }
  }
}
</script>
