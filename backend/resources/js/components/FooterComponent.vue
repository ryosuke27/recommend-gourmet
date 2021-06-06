<template>
    <div class="container-fluid bg-dark mb-3">
        <footer class="footer">
           <button class="button button--link" @click="logout">Logout</button>ƒ
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
    }
};
</script>