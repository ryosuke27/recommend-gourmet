<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <router-link v-bind:to="{ name: 'home' }">
                    <span class="navbar-brand mb-0 h1">RecommendGourmet</span>
                </router-link>
                <div>
                    <router-link v-bind:to="{ name: 'favorite' }">
                        <button class="btn btn-success">Favorite</button>
                    </router-link>
                    <button class="btn btn-success">Mypage</button>
                    <RouterLink class="btn btn-success" to="/login">
                        Login / Register
                    </RouterLink>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {};
</script>
