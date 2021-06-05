<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-3">
                    <svg
                        class="bd-placeholder-img card-img-top"
                        width="100%"
                        height="500"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid slice"
                        focusable="false"
                        role="img"
                        aria-label="Placeholder: Image cap"
                    >
                        <title>Placeholder</title>
                        <rect fill="#868e96" width="100%" height="100%" />
                        <text fill="#dee2e6" dy=".3em" x="50%" y="50%">
                            {{ dish[0].name }}
                            {{ $route.params.dishId }}
                        </text>
                    </svg>
                    <div class="card-body">
                        <h5 class="card-title">{{ dish[0].name }}</h5>
                        <router-link v-bind:to="{ name: 'map' }">
                            <button type="button" class="btn btn-success">
                                Go
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
            dishId: String
    },
    data: function() {
        return {
            dish: []
        };
    },
    methods: {
        getDish() {
            axios.get("/api/dish").then(res => {
                this.dish = res.data;
            });
        }
    },
    mounted() {
        this.getDish();
    }
};
</script>
