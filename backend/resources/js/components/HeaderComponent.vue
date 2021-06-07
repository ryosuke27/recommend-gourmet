<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <router-link v-bind:to="{ name: 'home' }">
                    <span class="navbar-brand mb-0 h1">RecommendGourmet</span>
                </router-link>
                <div>
                    <div v-if="isLogin" class="navbar__item">
                        <router-link v-bind:to="{ name: 'favorite' }">
                            <button class="btn btn-success">Favorite</button>
                        </router-link>
                    </div>
                    <div v-else class="navbar__item">
                        <RouterLink class="btn btn-success" to="/login">
                            Login
                        </RouterLink>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        isLogin() {
            return this.$store.getters["auth/check"];
        },
        username() {
            return this.$store.getters["auth/username"];
        }
    }
};
</script>
