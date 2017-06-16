<template>
   <div class="hero-body">
      <div class="container">
        <div class="columns is-vcentered">
          <div class="column is-4 is-offset-4">
            <h1 class="title">
              Register
            </h1>
            <div class="box">
              <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                <label class="label">Name</label>
                <p class="control">
                  <!-- <input class="input" type="text" placeholder="manolo" v-bind:class="classObject" v-model="form.name"> -->
                  <input class="input" type="text" placeholder="manolo"  v-model="form.name">
                  <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </p>
                <label class="label">Email</label>
                <p class="control">
                  <input class="input" type="text" placeholder="jsmith@example.org" v-model="form.email">
                  <span class="help is-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                </p>
                <label class="label">Password</label>
                <p class="control">
                  <input class="input" type="password" placeholder="●●●●●●●" v-model="form.password">
                  <span class="help is-danger" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                </p>
                <label class="label">Confirm Password</label>
                <p class="control">
                  <input class="input" type="password" placeholder="●●●●●●●" v-model="form.password_confirmation">
                  <span class="help is-danger" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
                </p>
                <hr>
                <p class="control">
                  <button class="button is-success" :disabled="form.errors.any()">Login</button>
                  <router-link  to="/home" exact>
                    <button class="button is-link">Cancel</button>
                  </router-link>
                </p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {

  data() {

    return  {
      // classObject: {
      //     active: true,
      //     'is-success':true,
      //     'is-danger': false
      // },

      form: new Form({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      })
    };

  },


  methods: {
      onSubmit() {
          this.form.post('/register').then(user => alert('All done!'));
      }
  }
}
</script>
