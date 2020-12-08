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
            <p class="card-text" :class="{'text-right':chat.type == 0}" v-for="chat in chats" :key="chat.message">
                {{chat.message}}
            </p>
        </div>
        <form class="card-footer" @submit.prevent="send">
            <div class="form-group">
                <input type="text" :disabled="session_blocked" class="form-control" placeholder="Write an message" v-model="message">
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
                message: null,
                session_blocked : false,
            }
        },
        methods: {
            send() {
                if(this.message) {
                    this.pushToChats(this.message);
                    axios.post(`/send/${this.friend.session.id}`, {
                        isi: this.message,
                        to_user: this.friend.id
                    });
                    this.message = null;
                }
            },
            pushToChats(message) {
                this.chats.push({message: message, type:0, sent_at:"Just Now"});
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
            },
            getAllMessages(){
                axios
                    .post(`/session/${this.friend.session.id}/chats`)
                    .then(res => (this.chats = res.data.data));
            },
            read() {
                axios.post(`/session/${this.friend.session.id}/read`);
            }

        },
        created(){
            this.read();

            this.getAllMessages();

            Echo.private(`Chat.${this.friend.session.id}`).listen(
                "PrivateChatEvent",
                e => {
                    this.read();
                    this.chats.push({message: e.content, type:1, sent_at:"Just Now"});
            });
        }
    };
</script>

<style>
    .chat-box {
        height: 400px;
    }

    .card-body {
        overflow-y: scroll
    }
</style>

