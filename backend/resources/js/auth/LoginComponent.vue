<template>
  <div class="container">
    <div class="card border-primary mb-3" v-show="tab === 1">
      <div class="card-header">Login</div>
      <form class="form card-body" @submit.prevent="login">
        <div v-if="loginErrors" class="errors">
          <ul
            class="list-unstyled border border-danger"
            v-if="loginErrors.email"
          >
            <li class="text-danger" v-for="msg in loginErrors.email" :key="msg">
              {{ msg }}
            </li>
          </ul>
          <ul
            class="list-unstyled border border-danger"
            v-if="loginErrors.password"
          >
            <li
              class="text-danger"
              v-for="msg in loginErrors.password"
              :key="msg"
            >
              {{ msg }}
            </li>
          </ul>
        </div>
        <div class="mb-3">
          <label for="login-email">Email</label>
          <input
            type="text"
            class="form-control"
            id="login-email"
            v-model="loginForm.email"
          />
        </div>
        <div class="mb-3">
          <label for="login-password">Password</label>
          <input
            type="password"
            class="form-control"
            id="login-password"
            v-model="loginForm.password"
          />
        </div>
        <div class="d-flex justify-content-center">
          <div class="">
            <button type="submit" class="btn btn-outline-secondary">
              login
            </button>
          </div>
          <div
            class="ml-2"
            :class="{ 'tab__item--active': tab === 2 }"
            @click="tab = 2"
          >
            Register
          </div>
        </div>
      </form>
    </div>
    <div class="card border-primary mb-3" v-show="tab === 2">
      <div class="card-header">Register</div>
      <form class="form card-body" @submit.prevent="register">
        <div v-if="registerErrors" class="errors">
          <ul v-if="registerErrors.name">
            <li v-for="msg in registerErrors.name" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.email">
            <li v-for="msg in registerErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.password">
            <li v-for="msg in registerErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <div class="mb-3">
          <label for="username">Name</label>
          <input
            type="text"
            class="form-control"
            id="username"
            v-model="registerForm.name"
          />
        </div>
        <div class="mb-3">
          <label for="email">Email</label>
          <input
            type="text"
            class="form-control"
            id="email"
            v-model="registerForm.email"
          />
        </div>
        <div class="mb-3">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="registerForm.password"
          />
        </div>
        <div class="mb-3">
          <label for="password-confirmation">Password (confirm)</label>
          <input
            type="password"
            class="form-control"
            id="password-confirmation"
            v-model="registerForm.password_confirmation"
          />
        </div>
        <div class="mb-3">
          <div class="d-flex justify-content-center">
            <div
              class="mr-2"
              :class="{ 'tab__item--active': tab === 1 }"
              @click="tab = 1"
            >
              Login
            </div>
            <button type="submit" class="btn btn-outline-secondary">
              register
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
export default {
  data() {
    return {
      tab: 1,
      loginForm: {
        email: "",
        password: "",
      },
      registerForm: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      },
    };
  },
  methods: {
    async login() {
      // authストアのloginアクションを呼び出す
      await this.$store.dispatch("auth/login", this.loginForm);

      if (this.apiStatus) {
        // トップページに移動する
        this.$router.push("/home");
      }
    },
    async register() {
      // authストアのresigterアクションを呼び出す
      await this.$store.dispatch("auth/register", this.registerForm);

      if (this.apiStatus) {
        // トップページに移動する
        this.$router.push("/home");
      }
    },
    clearError() {
      this.$store.commit("auth/setLoginErrorMessages", null);
      this.$store.commit("auth/setRegisterErrorMessages", null);
    },
  },
  created() {
    this.clearError();
  },
  computed: {
    ...mapState({
      apiStatus: (state) => state.auth.apiStatus,
      loginErrors: (state) => state.auth.loginErrorMessages,
      registerErrors: (state) => state.auth.registerErrorMessages,
    }),
  },
};
</script>
