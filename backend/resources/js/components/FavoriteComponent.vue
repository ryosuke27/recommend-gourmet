<template>
    <div class="container">
        <div class="card-deck">
            <div class="card">
                <div class="row">
                    <div v-for="(favorite, index) in favorites" :key="index">
                       {{ favorite.id }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            favorites: []
        };
    },
    methods: {
        getFavorites() {
            axios.get("/api/favorite").then(res => {
                this.favorites = res.data;
            });
        }
    },
    mounted() {
        this.getFavorites();
    }
};
</script>
