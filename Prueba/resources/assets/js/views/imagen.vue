<template>
  <div class="hero-body">
     <div class="container">
       <div class="columns is-vcentered">
         <div class="column is-8 is-offset-2">
           <h1 class="title">
             New Publication
           </h1>
           <div class="box">
              <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                <label class="label">Title</label>
                <p class="control">
                  <input class="input" type="text" placeholder="Text input" v-model="form.title">
                </p>

                <label class="label">Description</label>
                <p class="control">
                  <textarea class="textarea" placeholder="Textarea" v-model="form.description"></textarea>
                </p>

                <div v-if="!image">
					        <input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" @change="onFileChange" data-multiple-caption="{count} files selected" multiple="">
                  <label for="file-1">
                      <strong>
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                      Choose a image
                    </strong>
                  </label>
                </div>
                <div v-else>
                  <img :src="image" />
                  <button class="button is-danger" @click="removeImage">Remove image</button>
                </div>


                <div class="field is-grouped">
                  <p class="control">
                    <button class="button is-success">Submit</button>
                  </p>
                  <p class="control">
                    <router-link  to="/home" exact>
                      <button class="button is-link">Cancel</button>
                    </router-link>
                  </p>
                </div>
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
      form: new Form({
         title: '',
         description: '',
       }),
      image: ''
    };
  },
  methods: {
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.createImage(files[0]);
    },
    createImage(file) {
      var image = new Image();
      var reader = new FileReader();
      var vm = this;

      reader.onload = (e) => {
        vm.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    removeImage: function (e) {
      this.image = '';
    },
    onSubmit() {
      this.form
        .post('/publication');
      //  .then(publication => this.$emit('completed', publication));
    }
  }
}
</script>

<style>
  img {
    width: 30%;
    display: block;
    margin-bottom: 10px;
    margin-top: 10px;
  }

  button {
    margin-bottom: 10px;
  }

  strong{
    color: #fff;
  }

  .inputfile-1 + label {
    background-color: #3273dc;
  }

  .inputfile + label {
      display: inline-block;
      padding: 0.5rem 1rem;
      border-radius: 3px;
      margin-bottom: 10px;
      margin-top: 10px;
  }

  .inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
    color: #fff;
  }

  .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }

  .textarea:focus{
    border: 1px solid #3273dc;
  }
</style>
