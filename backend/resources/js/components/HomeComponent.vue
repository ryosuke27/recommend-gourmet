<template>
    <div class="container">
        <div class="row justify-content-center">
            <h2>一瞬で美味しい店を見つけよう</h2>
            <div class="d-flex flex-row mt-4">
                <div class="row">
                    <div
                        v-for="(dish, index) in dishes"
                        :key="index"
                        class="mr-4"
                    >
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
        <div class="container mt-5 px-5 py-5 border">
            <form @submit="search">
                <div class="row">
                    <div class="col">
                        <label for="area" class="form-label">Area</label>
                        <select
                            name="areas"
                            class="form-control"
                            id="area"
                            placeholder="area"
                        >
                            <option value="">--Please choose an Area--</option>
                            <option
                                v-for="area in areas"
                                v-bind:value="area.id"
                                >{{ area.name }}</option
                            >
                        </select>
                    </div>
                    <div class="col">
                        <label for="category" class="form-label"
                            >Category</label
                        >
                        <select
                            name="categories"
                            class="form-control"
                            id="category"
                            placeholder="category"
                        >
                            <option value=""
                                >--Please choose an Category--</option
                            >
                            <option
                                v-for="category in categories"
                                v-bind:value="category.id"
                                >{{ category.name }}</option
                            >
                        </select>
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
                    <button type="submit" class="btn btn-primary">
                        Search
                    </button>
                    <button type="clear" class="btn btn-outline-secondary">
                        Clear
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            dishes: [],
            areas: [],
            categories: [],
            results: []
        };
    },
    methods: {
        getDishes() {
            axios.get("/api/home").then(res => {
                this.dishes = res.data;
            });
        },
        getAreas() {
            axios.get("/api/home/area").then(res => {
                this.areas = res.data;
            });
        },
        getCategories() {
            axios.get("/api/home/category").then(res => {
                this.categories = res.data;
            });
        },
        search() {
            axios
                .get("/api/home/search", {
                    params: {
                        areas: this.areas,
                        categories: this.categories,
                    }
                })
                .then(res => {
                    this.posts = res.data;
                })
                .catch(error => {
                    console.log("データの取得に失敗しました。");
                });
        }
    },
    mounted() {
        this.getDishes();
        this.getAreas();
        this.getCategories();
    }
};
</script>
