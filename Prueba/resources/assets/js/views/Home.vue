<template>
    <div class="container">
        <div class="columns">
            <div class="column">
              <table class="table is-striped" >
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody class="table is-striped" v-for="user in users">
                  <tr>
                    <td>{{ user.id }}</td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
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
          users: []
        }
      },

      created() {
        axios.get('/home')
          .then(response => this.users = response.data);
      }

      // methods: {
      //   addUser(user) {
      //     //this.users.unshift(user); //si queremos ponerlo el primero de la lista
      //     this.users.push(user);
      //
      //     alert('You are Registered!');
      //   }
      // }
    }
</script>
