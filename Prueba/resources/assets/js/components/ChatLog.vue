<template>
   <div class="chat-log">
     <!-- :message es para pasar 'mensaje' como propiedad, tambien se puede poner v-bin:message -->
    <chat-message v-for="message in messages" :message="message"></chat-message>
    <div class="empty" v-show="messages.length === 0">
      Nothing here yet!
    </div>
   </div>
</template>

<script>
import ChatMessage from '../components/ChatMessage.vue'

export default {

  props: ['messages'],

  components: {
    ChatMessage
  }

}
</script>

<style lang="css">
.chat-log .chat-message:nth-child(even) {
    background-color: #ccc;
    text-align: right;
}
.chat-log .chat-message:nth-child(odd) {
    background-color: #eee;
}
.empty {
  padding: 1rem;
  text-align: center;
}
</style>
