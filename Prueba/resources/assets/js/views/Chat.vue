<template>
  <div class="container chat">
      <div class="columns">
          <div class="column is-8 is-offset-2">
            <div class="message-header">
              <p>Chat window</p>
              <span>{{ usersInRoom.length }}</span>
            </div>
            <div class="message-body">
              <chat-log :messages="messages"></chat-log>
              <chat-composer v-on:messagesent="addMessage"></chat-composer>
            </div>
          </div>
      </div>
  </div>
</template>


<script>
    import ChatLog from '../components/ChatLog.vue';
    import ChatComposer from '../components/ChatComposer.vue'

    export default {
      data() {
        return{
          messages: [],
          usersInRoom: []
        }
      },

      components: {
        ChatLog,
        ChatComposer
      },

      methods: {
        addMessage(message) {
          //Add to existing messageses
          this.messages.push(message);
          //Persist to the database etc
          axios.post('/messages', message)
        }
      },

      created() {
        axios.get('/messages').then(response => {
          this.messages = response.data;
        });

        Echo.join('chatroom')
          .here((users) => {
            this.usersInRoom = users;
          })
          .joining((user) => {
            this.usersInRoom.push(user);
          })
          .leaving((user) => {
            this.usersInRoom = this.usersInRoom.filter(u => u != user);
          })
          .listen('MessagePosted', (e) => {
            this.messages.push({
              message: e.message.message,
              user: e.user //here I pass all user object
            });
            //  console.log(e)
          });
      }
    }
</script>

<style media="screen">
  .message-body{
    padding: 0;
    border: 0;
  }
</style>
