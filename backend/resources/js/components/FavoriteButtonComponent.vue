<template>
    <div>
        <i v-on:click="onFavoriteClick" :class="'far fa-star ml-3'"></i>
    </div>
</template>

<script>
export default {
    props: ["dishId", "data"],
    data: function() {
        return {
            dish: []
        };
    },
    computed: {
        isLogin() {
            return this.$store.getters["auth/check"];
        }
    },
    methods: {
        onFavoriteClick() {
            // if (!this.isLogin) {
            //     alert("いいね機能を使うにはログインしてください。");
            //     return false;
            // }

            // liked_by_userで条件分岐させる
            if (this.dish.liked_by_user) {
                this.unfavorite();
            } else {
                this.favorite();
            }
        },
        async favorite() {
            const response = await axios.put(`/api/favorite/${this.dishId}/add`);

            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
                this.dish.liked_by_user = true;
            }
        },
        async unfavorite() {
            const response = await axios.delete(`/api/favorite/${this.dishId}/delete`);

            if (response.status !== OK) {
                this.$store.commit("error/setCode", response.status);
                return false;
                this.dish.liked_by_user = false;
            }
        }
    }
};
</script>
