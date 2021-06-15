<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <img
                    :src="'/' + dish[0].image_path"
                    style="width: 500px; height: 400px"
                />
                <div class="card-body">
                    <h5 class="card-title">{{ dish[0].name }}</h5>
                    <div class="row">
                        <div class="mx-auto">
                            <router-link v-bind:to="{ name: 'map' }">
                                <button type="button" class="btn btn-success">
                                    Go
                                </button>
                            </router-link>
                        </div>
                        <div class="float-right col-2">
                            <FavoriteButtonComponent
                                v-bind:dishId="dish[0].id"
                            ></FavoriteButtonComponent>
                        </div>
                    </div>
                    <p class="card-text">
                        {{ dish[0].description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FavoriteButtonComponent from "./FavoriteButtonComponent.vue";

export default {
    components: {
        FavoriteButtonComponent
    },
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
        addFavorite() {
            axios.post("/api/dish/" + this.dishId).then(res => {
                this.$router.push({ name: "dish" });
            });
        }
    },
    mounted() {
        this.getDish();
    }
};
</script>
