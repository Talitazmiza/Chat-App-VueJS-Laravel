<template>
    <div class="card card-default chat-box">
      <div class="card-header">
        <b :class="{'text-danger': session_blocked}">
          {{ friend.name }}
          <span v-if="session_blocked">(Blocked)</span>
        </b>

        <a href="" @click.prevent="close" >
          <i class="fa fa-times float-right" style="color : red"></i>
        </a>
        <div class="dropdown float-right mr-4">
          <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="" @click.prevent="unblock" v-if="session_blocked">Unblock</a>
            <a class="dropdown-item" href="" @click.prevent="block" v-else>Block</a>
            <a class="dropdown-item" href=""  @click.prevent="clear">Clear Chat</a>
          </div>
        </div>
      </div>
        <div class="card-body" v-chat-scroll>
            <p class="card-text" v-for="chat in chats" :key="chat.message">
                {{chat.message}}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" :disabled="session_blocked" class="form-control" placeholder="Write an message">
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props : ['friend'],
        data() {
            return {
                chats: [],
                session_blocked : false,
            }
        },
        methods: {
            send() {
                console.log("yeea");
            },
            close(){
              this.$emit('close')
            },
            clear(){
              this.chats = [];
            },
            block(){
              this.session_blocked = true
            },
            unblock(){
              this.session_blocked = false
            }

        },
        created(){
            this.chats.push(
                {message: 'werrrrrrrrr r u'},
                {message: 'bottom'}
            )
        }
    }
</script>

<style>
    .chat-box {
        height: 400px;
    }

    .card-body {
        overflow-y: scroll
    }
</style>

