<template>
  <nav class="bg-white shadow-md">
    <div class="container mx-auto py-4 flex items-center justify-between">
      <router-link
        :to="{ name: 'home' }"
        class="text-xl font-semibold text-gray-800 flex items-center"
      >
        My App
      </router-link>
      <div class="flex items-center space-x-6">
        <ul class="hidden md:flex items-center space-x-6">
          <li>
            <router-link
              :to="{ name: 'home' }"
              class="text-gray-600 hover:text-gray-800"
            >
              Home
            </router-link>
          </li>
          <li v-if="user">
            <router-link
              :to="{ name: 'tasks', params: { user: user.id } }"
              class="block py-1 text-gray-600 hover:text-gray-800"
            >
              My tasks
            </router-link>
          </li>
        
          <li>
            <router-link
              :to="{ name: 'about' }"
              class="text-gray-600 hover:text-gray-800"
            >
              About
            </router-link>
          </li>
          <div
            v-if="!user"
            class="text-gray-900 flex items-center md:space-x-4"
          >
            <router-link
              :to="{ name: 'login' }"
              class="text-gray-900 hover:text-gray-600"
            >
              Login
            </router-link>
            <router-link
              :to="{ name: 'register' }"
              class="text-gray-900 hover:text-gray-600"
            >
              Register
            </router-link>
          </div>

          <div v-else class="text-gray-900 flex items-center md:space-x-4">
            <li class="text-gray-900 hover:text-gray-800">
              <a
                @click="logout"
                class="text-gray-900 hover:text-gray-600"
                href=""
              >
                Logout
              </a>
            </li>
          </div>
        </ul>

        <button
          @click="toggleMobileMenu"
          type="button"
          class="md:hidden text-gray-600 hover:text-gray-800"
        >
          <svg
            class="w-6 h-6"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
      </div>
    </div>
    <div :class="mobileMenuOpen ? 'block' : 'hidden'" class="md:hidden">
      <ul class="py-2 px-4 bg-white">
        <li>
          <router-link
            :to="{ name: 'home' }"
            class="block py-1 text-gray-600 hover:text-gray-800"
          >
            Home
          </router-link>
        </li>
        <li v-if="user">
          <router-link
            :to="{ name: 'tasks', params: { user: user.id } }"
            class="block py-1 text-gray-600 hover:text-gray-800"
          >
            My tasks
          </router-link>
          
        </li>
        <li>
          <a href="#" class="block py-1 text-gray-600 hover:text-gray-800">
            About
          </a>
        </li>
        <div v-if="!user">
          <li>
            <router-link
              :to="{ name: 'login' }"
              class="block py-1 text-gray-600 hover:text-gray-800"
            >
              Login
            </router-link>
          </li>
          <li>
            <router-link
              :to="{ name: 'register' }"
              class="block py-1 text-gray-600 hover:text-gray-800"
            >
              Register
            </router-link>
          </li>
        </div>
        <div v-else class="text-gray-900 flex items-center md:space-x-4">
          <li class="text-gray-600 hover:text-gray-800">
            <a
              @click="logout"
              class="text-gray-900 hover:text-gray-600"
              href=""
            >
              Logout
            </a>
          </li>
        </div>
      </ul>
    </div>
  </nav>
</template>

<script>
import { useAuthStore } from '../../stores/auth'
export default {
  data() {
    return {
      mobileMenuOpen: false,
    }
  },
  computed: {
    authStore() {
      return useAuthStore()
    },

    user() {
      return this.authStore.user
    },
  },
  methods: {
    toggleMobileMenu() {
      this.mobileMenuOpen = !this.mobileMenuOpen
    },
    logout() {
      useAuthStore().handleLogout()
    }
  }
}
</script>
