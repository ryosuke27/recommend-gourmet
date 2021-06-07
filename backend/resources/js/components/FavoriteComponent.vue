<template>
    <div class="container">
        <div class="card-deck">
            <div class="card">
                <div class="row">
                    <div v-for="(dish, index) in dishes" :key="index">
                       {{ dish.name }}
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
