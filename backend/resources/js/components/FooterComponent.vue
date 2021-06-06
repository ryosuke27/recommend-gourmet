<template>
    <div class="container-fluid bg-dark mb-3">
        <footer class="footer">
            <button v-if="isLogin" class="button button--link" @click="logout">
                Logout
            </button>
            <RouterLink v-else class="button button--link" to="/login">
                Login / Register
            </RouterLink>
        </footer>
    </div>
</template>

<script>
export default {
    methods: {
        async logout() {
            await this.$store.dispatch("auth/logout");

            this.$router.push("/login");
        }
    },
    computed: {
        isLogin() {
            return this.$store.getters["auth/check"];
        }
    }
};
</script>
