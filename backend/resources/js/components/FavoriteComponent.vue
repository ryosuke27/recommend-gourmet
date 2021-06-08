<template>
    <div class="container">
        <div class="d-flex flex-row flex-wrap">
                <div class="row">
                    <div v-for="(dish, index) in dishes" :key="index" class="mr-4 mb-4">
                        <router-link
                            v-bind:to="{
                                name: 'dish',
                                params: { dishId: dish.id }
                            }"
                        >
                            <img
                                :src="dish.image_path"
                                style="width: 200px; height: 200px"
                            />
                        </router-link>
                    </div>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            dishes: []
        };
    },
    methods: {
        getDishes() {
            axios.get("/api/favorite").then(res => {
                this.dishes = res.data;
            });
        }
    },
    mounted() {
        this.getDishes();
    }
};
</script>
