<template>

  <div class="chat-composer">

    <!-- @click, @keydown son events listing tag -->
    <input type="text" placeholder="Indroce el mensage ..." v-model="messageText" @keydown.enter="sendMessage">
    <button type="submit" class="button is-success" @click="sendMessage">Send</button>

  </div>


</template>

<script>
export default {
  data() {
    return{
      messageText: ''
    }
  },
  methods: {
    sendMessage() {
      this.$emit('messagesent', {
        message:this.messageText,
        user: {
          name: $('.menu-topbar .dropdown-toggle').text() // para cogerlo de la punta de arriba si usar auth
          // name: "Pepe"
        }
      });
      this.messageText = '';
    }
  }
}
</script>

<style lang="css">
  .chat-composer {
    display: flex;
  }
  .chat-composer input {
    flex: 1 auto;
    height: 35px;
  }
  .chat-composer button {
    border-radius: 0;
  }
</style>
