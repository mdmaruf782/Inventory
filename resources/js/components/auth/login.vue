<template>
  <div>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 p-5">
          <form class="login100-form validate-form" @submit.prevent="login">
            <div class="logo-img text-center pb-3">
              <!-- <img src="assets/img/brand/logo-dark1.png" alt="logo-img"> -->
            </div>
            <span class="login100-form-title">Member Login</span>

            <div
              class="wrap-input100 validate-input"
              data-validate="Valid email is required: ex@abc.xyz"
            >
              <input
                class="input100"
                type="text"
                name="email"
                placeholder="Email"
                v-model="form.email"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
            <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>

            <div class="wrap-input100 validate-input" data-validate="Password is required">
              <input
                class="input100"
                type="password"
                name="pass"
                placeholder="Password"
                v-model="form.password"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
             <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn btn-primary" type="submit">Login</button>
            </div>

            <div class="text-center pt-2">
              <span class="txt1">Forgot</span>

              <router-link to="/forget" class="txt2">Username / Password?</router-link>
            </div>

            <div class="text-center pt-1">
              <router-link to="/register" class="txt2">
                Create Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </router-link>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  created() {
    if (User.loggedIn()) {
      this.$router.push({ name : 'home'})
    }
  },

  data() {
    return {
      form: {
        email: null,
        password: null
      },
      errors:{}
    };
  },

  methods: {
    login() {
      
      axios
        .post("/api/auth/login", this.form)
        .then(res => {
          User.responseAfterLogin(res),
          this.$router.push({ name : 'home'})
          Toast.fire({
          type: 'success',
          title: 'Signed in successfully'
         })
        
        }
       
         )
       .catch(error => this.errors = error.response.data.errors,
       
        Toast.fire({
          type: 'error',
          title: 'Email Or Password Not Match'
         })
       )
      

    }
  }
};
</script>
<style lang="">
</style>