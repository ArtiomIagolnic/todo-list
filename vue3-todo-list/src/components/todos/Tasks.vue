<template>
  <div class="container mx-auto py-4 min-h-screen">
    <h2 class="text-2xl font-semibold mb-4">Todos</h2>
    <div class="container mb-5 bg-grey shadow-md p-4">
      <form @submit.prevent="tasksStore.createTask(userId, newTask)">
        <div class="mb-4">
          <label for="title" class="block text-gray-700">Task Title</label>

          <input
            type="text"
            id="title"
            v-model="newTask.title"
            placeholder="Enter task title"
            class="border rounded-md px-4 py-2 w-full"
          />
          <span
            class="text-red-500 text-xs italic"
            v-if="tasksStore.errors && tasksStore.errors.title"
          >
            {{ tasksStore.errors.title[0] }}
          </span>
        </div>

        <div class="mb-4">
          <label for="description" class="block text-gray-700">
            Task Description
          </label>
          <textarea
            id="description"
            v-model="newTask.description"
            placeholder="Enter task description"
            rows="1"
            class="border rounded-md px-4 py-2 w-full"
          ></textarea>
          <span
            class="text-red-500 text-xs italic"
            v-if="tasksStore.errors && tasksStore.errors.description"
          >
            {{ tasksStore.errors.description[0] }}
          </span>
        </div>

        <button
          type="submit"
          class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-700"
        >
          Create Task
        </button>
      </form>
    </div>
    <div class="container mt-5 bg-grey shadow-md p-4">
      <ul v-for="task in tasksStore.all" :key="task.id">
        <li
          class="flex items-center justify-between py-2 px-4 bg-white shadow-md rounded-md mb-2"
        >
          <span class="text-gray-900">{{ task.title }}</span>
          <div>
            <router-link
              :to="{
                name: 'task-edit',
                params: { user: userId, task: task.id },
              }"
            >
              <button
                class="text-indigo-500 focus:outline-none hover:text-indigo-700 mr-3"
              >
                <span class="mdi mdi-pencil mdi-24px"></span>
              </button>
            </router-link>

            <button
              class="text-red-500 focus:outline-none hover:text-red-700"
              @click="tasksStore.deleteTask(userId, task.id)"
            >
              <span class="mdi mdi-delete mdi-24px"></span>
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { useTasksStore } from '../../stores/tasks'

export default {
  data() {
    return {
      newTask: {
        title: '',
        description: '',
      },
    }
  },
  computed: {
    tasksStore() {
      return useTasksStore()
    },
    userId() {
      return this.$route.params.user
    },

    all() {
      return this.tasksStore.getTasks()
    },
  },
  mounted() {
    this.tasksStore.getTasks()
  }
}
</script>
