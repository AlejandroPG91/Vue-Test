<template>
    <div class="container">
        <div class="columns">
            <div class="column">
              <table class="table is-striped" >
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>

                  </tr>
                </thead>
                <tbody class="table is-striped" v-for="publi in publication">
                  <tr>
                    <td>{{ publi.title }}</td>
                    <td>{{ publi.description }}</td>
                    <td><img src="/uploads/images/default.jpg" style="width:50px; height:50px;"></img></td>
                    <!-- <td><img src="/uploads/images/{{ publication.image }}" style="width:50px; height:50px;"></img></td> -->
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

      data() {
        return {
          publication: []
        }
      },

      created() {
        axios.get('/publication')
          .then(response => this.publication = response.data);
      }
    }
</script>
