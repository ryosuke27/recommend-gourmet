<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <img
                    :src="dish[0].image_path"
                    style="width: 400px; height: 300px"
                />
                <div class="card-body">
                    <h5 class="card-title">{{ dish[0].name }}</h5>
                    <router-link v-bind:to="{ name: 'map' }">
                        <button type="button" class="btn btn-success">
                            Go
                        </button>
                    </router-link>
                    <router-link v-bind:to="{ name: 'favorite.add' }">
                        <button
                            type="button"
                            class="btn btn-warning"
                            v-on:click="addFavorite(dish[0].id)"
                        >
                            Favorite
                        </button>
                    </router-link>
                    <p class="card-text">
                        {{ dish[0].description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        dishId: String,
        image_path: String
    },
    data: function() {
        return {
            dish: []
        };
    },
    methods: {
        getDish() {
            axios.get("/api/dish/" + this.dishId).then(res => {
                this.dish = res.data;
            });
        },
        addFavorite(id) {
            axios.get("/api/dish/" + id).then(res => {
                this.$router.push({ name: "dish" });
            });
        }
    },
    mounted() {
        this.getDish();
    }
};
</script>
