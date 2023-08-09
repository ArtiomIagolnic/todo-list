import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
    state: () => ({
        authToken: localStorage.getItem("authToken") || null,
        authUser: JSON.parse(localStorage.getItem("authUser")) || null,
        authErrors: [],
        isLoggedIn: false,
    }),
    getters: {
        token: (state) => state.authToken,
        user: (state) => state.authUser,
        errors: (state) => state.authErrors,
        auth: (state) => state.isLoggedIn,
    },
    actions: {
        async getToken() {
            await axios.get("/sanctum/csrf-cookie");
        },
        setAuthToken(token) {
            localStorage.setItem("authToken", token);
            this.authToken = token;
        },
        setAuthUser(user) {
            localStorage.setItem("authUser", JSON.stringify(user));
            this.authUser = user;
        },
        clearAuthToken() {
            localStorage.removeItem("authToken");
            this.authToken = null;
        },
        clearAuthUser() {
            localStorage.removeItem("authUser");
            this.authUser = null;
        },

        async getUser() {
            this.authErrors = [];
            await this.getToken();
            try {
                const response = await axios.get("/api/user");
                this.authUser = response.data;
                this.setAuthUser(response.data);
            } catch (error) {
                if (error.response.status === 401) {
                    this.authErrors = error.response.data.errors;
                }
            }
        },

        async handleLogin(data) {
            this.authErrors = [];
            await this.getToken();
            try {
                const response = await axios.post("/login", data);
                const token = response.data.auth_token;
                this.setAuthToken(token);
                this.setAuthUser(response.data.user);
                this.isLoggedIn = true;
                this.router.push("/");
            } catch (error) {
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            }
        },
        async handleRegister(data) {
            this.authErrors = [];
            await this.getToken();
            try {
                const response = await axios.post("/register", data);
                this.setAuthUser(response.data.user);
                this.isLoggedIn = true;
                this.router.push("/");
            } catch (error) {
                if (error.response.status === 422) {
                    this.authErrors = error.response.data.errors;
                }
            }
        },
        async handleLogout() {
            this.clearAuthToken();
            this.clearAuthUser();
            this.isLoggedIn = false;
            this.authUser = null;
            this.router.push("/");
            await axios.post("/logout");
        },

        async handleForgotPassword(email) {
            this.authErrors = [];
            await this.getToken();
            try {
                await axios.post("/forgot-password", {
                    email: email,
                });
            } catch (error) {
                this.authErrors = error.response.data.errors;
            }
        },
        async handleResetPassword(resetData) {
            this.authErrors = [];
            await this.getToken();
            try {
                await axios.post("/reset-password", resetData);
                this.router.push("/");
            } catch (error) {
                this.authErrors = error.response.data.errors;
            }
        }
    }
})
