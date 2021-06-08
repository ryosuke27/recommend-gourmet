<template>
  <div>
    <i
      v-on:click="storeOrDelete"
      :class="[isActiveTrue === true ? 'far fa-star ml-3' : 'fas fa-star ml-3']"
    ></i>
  </div>
</template>

<script>
export default {
  props: ["dishId", "data"],
  data() {
    return {
      isActiveTrue: this.data.includes(this.dishId) ? false : true
    };
  },
  methods: {
    change() {
      this.isActiveTrue = !this.isActiveTrue;
    },
    storeDishId() {
      axios
        .post("favorite/" + this.dishId + "/add", {
          dishId: this.dishId
        })
        .then(response => {
          console.log("success");
        })
        .catch(err => {
          console.log("error");
        });
    },
    deleteDishId() {
      axios
        .delete("favorite/" + this.dishId + "/delete", {
          data: {
            dishId: this.dishId
          }
        })
        .then(response => {
          console.log("success");
        })
        .catch(err => {
          console.log("error");
        });
    },
    storeOrDelete() {
      const isTrue = this.likedData.includes(this.dishId);
      if (isTrue === true) {
        this.deleteDishId();
        this.change();
      } else {
        this.storeDishId();
        this.change();
      }
    }
  }
};
</script>
