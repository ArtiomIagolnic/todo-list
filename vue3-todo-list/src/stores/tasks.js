import { defineStore } from 'pinia'
import axios from 'axios'

export const useTasksStore = defineStore('tasks', {
    state: () => ({
        tasks: [],
        tasksErrors: [],
        task: []
    }),
    getters: {
        all: (state) => state.tasks,
        errors: (state) => state.tasksErrors,
        one: (state) => id => state.tasks.find(task => task.id === id)
    },
    actions: {
        async getToken() {
            await axios.get('/sanctum/csrf-cookie')
        },
        async getTasks(userId) {
            await this.getToken()
            try {
                const response = await axios.get(`/api/${userId}/tasks`)
                this.tasks = response.data
            } catch (error) {
                console.error(error.message)
            }
        },
        async getOne(userId, taskId) {
            await this.getToken()
            try {
                const response = await axios.get(`/api/${userId}/tasks/${taskId}`)
                this.task = response.data
            } catch (error) {
                console.error(error.message)
            }
        },
        async createTask(userId, data) {
            await this.getToken()
            try {
                const response = await axios.post(`/api/${userId}/tasks`, data)
                this.tasks.push(response.data.newTask)

            } catch (error) {
                if (error.response.status === 422) {
                    this.tasksErrors = error.response.data.errors
                }
            }
        },
        async deleteTask(userId, taskId) {
            await this.getToken()
            const response = await axios.delete(`/api/${userId}/tasks/${taskId}`)
            this.tasks = this.tasks.filter((task) => task.id !== taskId);
        },
        async updateTask(userId, data, taskId) {
            await this.getToken()
            try {
                const response = await axios.put(`/api/${userId}/tasks/${taskId}`, data)
                console.log('Task updated successfully');
                this.router.push({ name: 'tasks' })
            } catch (error) {
                if (error.response.status === 422) {
                    this.tasksErrors = error.response.data.errors
                } else {
                    console.error('Failed to update task:', error.message);
                }
            }
        }
    }

})