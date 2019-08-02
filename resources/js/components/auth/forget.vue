<template>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-5">
        <form class="login100-form validate-form">
          <div class="logo-img text-center pb-3">
            <!-- <img src="assets/img/brand/logo-dark1.png" alt="logo-img" /> -->
          </div>
          <span class="login100-form-title">Forgot PassWord</span>
          <div
            class="wrap-input100 validate-input"
            data-validate="Valid email is required: ex@abc.xyz"
          >
            <input class="input100" type="email" name="email" placeholder="Email" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fas fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">Submit</button>
          </div>
          <div class="text-center pt-2">
            <span class="txt1">Forget it</span>

            <router-link to="/" class="txt2">Send me Back</router-link>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>
<style lang="">
</style>