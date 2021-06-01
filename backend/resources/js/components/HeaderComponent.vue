<template>
    <div class="container-fluid bg-dark mb-3">
        <div class="container">
            <nav class="navbar navbar-dark">
                <span class="navbar-brand mb-0 h1">RecommendGourmet</span>
                <div>
                    <router-link v-bind:to="{name: 'favorite'}">
                        <button class="btn btn-success">Favorite</button>
                    </router-link>
                    <button class="btn btn-success">Mypage</button>
                </div>
            </nav>
        </div>
    </div>
</template>

<script>
export default {};
</script>
