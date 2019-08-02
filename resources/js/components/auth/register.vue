<template>
  <div>
    <div class="limiter">
      <div class="container-login100">
        <div class="wrap-login100 p-5">
          <form class="login100-form validate-form" @submit.prevent="register">
            <div class="logo-img text-center pb-3">
              <!-- <img src="assets/img
              /brand/logo-dark1.png" alt="logo-img"> -->
            </div>
            <span class="login100-form-title">Member Register</span>

            <div
              class="wrap-input100 validate-input"
              data-validate="Valid email is required: ex@abc.xyz"
            >
              <input
                class="input100"
                type="text"
                name="name"
                placeholder="Full Name"
                v-model="form.name"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
            <span class="text-danger" v-if="errors.name">{{errors.name[0]}}</span>
            <div
              class="wrap-input100 validate-input"
              data-validate="Valid email is required: ex@abc.xyz"
            >
              <input
                class="input100"
                type="email"
                name="email"
                placeholder="Email"
                v-model="form.email"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
              </span>
            </div>
           <span class="text-danger" v-if="errors.email">{{errors.email[0]}}</span>
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
            
            <div class="wrap-input100 validate-input" data-validate="Password is required">
              <input
                class="input100"
                type="password"
                name="pass"
                placeholder="Confirm Password"
                v-model="form.password_confirmation"
              />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
              </span>
            </div>
             <span class="text-danger" v-if="errors.password">{{errors.password[0]}}</span>
            <div class="container-login100-form-btn">
              <button class="login100-form-btn btn-primary" type="submit">Register</button>
            </div>

            <div class="text-center pt-1">
              <router-link to="/" class="txt2">
                Allready Have And Account ?
                <i
                  class="fa fa-long-arrow-right m-l-5"
                  aria-hidden="true"
                ></i>
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
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      errors:{}
    };
  },
  methods: {
    register() {
      axios
        .post("/api/auth/signup", this.form)
       
        .then(res => {
          User.responseAfterLogin(res),
          this.$router.push({ name : 'home'})
          Toast.fire({
          type: 'success',
          title: 'Signed in successfully'
         })
        
        }
       
         )
       .catch(error => this.errors = error.response.data.errors)
    }
  }
};
</script>
<style lang="">
</style>