<template>
    <div class="container">
        <div class="row justify-content-center">
            <h2>一瞬で美味しい店を見つけよう</h2>
            <div class="card-group">
                <div class="card">
                 <div class="row">
                    <div v-for="(dish, index) in dishes" :key="index">
                        <svg
                            class="bd-placeholder-img card-img-top"
                            width="100%"
                            height="200"
                            xmlns="http://www.w3.org/2000/svg"
                            preserveAspectRatio="xMidYMid slice"
                            focusable="false"
                            role="img"
                            aria-label="Placeholder: Image cap"
                        >
                            <title>Placeholder</title>
                            <rect fill="#868e96" width="100%" height="100%" />
                            <text fill="#dee2e6" dy=".3em" x="50%" y="50%">
                            <router-link
                                v-bind:to="{
                                    name: 'dish.show',
                                    params: { dishId: dish.id }
                                }"
                            >
                            {{ dish.name }}
                            </router-link>
                            </text>
                        </svg>
                    </div>
                 </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 px-5 py-5 border">
            <div class="row">
                <div class="col">
                    <label for="area" class="form-label">Area</label>
                    <input
                        type="area"
                        class="form-control"
                        id="area"
                        placeholder="area"
                    />
                </div>
                <div class="col">
                    <label for="category" class="form-label">Category</label>
                    <input
                        type="category"
                        class="form-control"
                        id="Category"
                        placeholder="category"
                    />
                </div>
                <div class="col">
                    <label for="hashtag" class="form-label">HashTag</label>
                    <input
                        type="hashtag"
                        class="form-control"
                        id="hashtag"
                        placeholder="hashtag"
                    />
                </div>
            </div>
            <div class="container mt-3">
                <button type="submit" class="btn btn-primary">Search</button>
                <button type="clear" class="btn btn-outline-secondary">
                    Clear
                </button>
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
            axios.get("/api/home").then(res => {
                this.dishes = res.data;
            });
        }
    },
    mounted() {
        this.getDishes();
    }
};
</script>
