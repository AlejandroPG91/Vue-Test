<template>
   <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column is-4 is-offset-4">
            <h1 class="title">
              Login
            </h1>
            <div class="box">
              <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                  <label class="label">Email</label>
                  <p class="control">
                    <input class="input" type="text" placeholder="jsmith@example.org" v-model="form.email" required autofocus>
                    <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                  </p>
                  <label class="label">Password</label>
                  <p class="control">
                    <input class="input" type="password" placeholder="●●●●●●●"  v-model="form.password" required>
                    <span class="help is-danger" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                  </p>
                  <hr>
                  <p class="control">
                    <button type="submit" class="button is-success" :disabled="form.errors.any()">Login</button>
                    <router-link  to="/home" exact>
                      <button class="button is-link">Cancel</button>
                    </router-link>
                  </p>
              </form>
            </div>
            <p class="has-text-centered is-success">
              <router-link  to="/register" exact>
                <a>Register an Account</a>
              </router-link>
              |
              <a href="#">Forgot password</a>
              |
              <a href="#">Need help?</a>
            </p>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {

      data() {
        return  {
          form: new Form({
            email: '',
            password: ''
          })
        };
      },

      methods: {
          onSubmit() {
              this.form.post('/login').then(user => alert('You are login!'));
          }
      }
    }
</script>
<style>
  a {
    color: #3273dc;
  }
  .input:focus {
    border: 1px solid #3273dc;
  }

</style>
