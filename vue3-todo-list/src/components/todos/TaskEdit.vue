<template>
  <div class="container mx-auto py-4">
    <h2 class="text-2xl font-semibold mb-4">Edit Task</h2>
    <div class="container bg-gray-100 shadow-md rounded-md p-4">
      <form @submit.prevent="tasksStore.updateTask(id, taskEdit)">
        <div class="mb-4">
          <label for="title" class="block text-gray-700">Task Title</label>

          <input
            type="text"
            id="title"
            placeholder="Enter task title"
            class="border rounded-md px-4 py-2 w-full"
            v-model="taskEdit.title"
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
            placeholder="Enter task description"
            rows="3"
            class="border rounded-md px-4 py-2 w-full"
            v-model="taskEdit.description"
          ></textarea>
          <span
            class="text-red-500 text-xs italic"
            v-if="tasksStore.errors && tasksStore.errors.description"
          >
            {{ tasksStore.errors.description[0] }}
          </span>
        </div>
        <div class="text-right">
          <button
            type="submit"
            class="bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-700"
          >
            Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { useTasksStore } from '../../stores/tasks'
export default {
  data() {
    return {
      taskEdit: {
        title: '',
        description: '',
      },
      tasksStore: useTasksStore()
    }
  },
  async mounted() {
    await this.tasksStore.getOne(this.id)
    this.taskEdit.title = this.tasksStore.task.title
    this.taskEdit.description = this.tasksStore.task.description
  },
  computed: {
    id() {
      return parseInt(this.$route.params.task)
    }
  }
}
</script>
