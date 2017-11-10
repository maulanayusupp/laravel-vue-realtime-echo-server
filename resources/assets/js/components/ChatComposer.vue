<template>
	<div class="chat-composer">
		<input type="text" name="" placeholder="start typing your message.." v-model="messageText" v-on:keyup.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Send</button>
	</div>
</template>

<script>
    export default {
    	data () {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage () {
                // console.log(this.messageText);
                this.$emit('messagesent', {
                    message: this.messageText,
                    user: {
                        name: $('.navbar-right .dropdown-toggle').text()
                    }
                });

                this.messageText = '';
            }
        }
    }
</script>
<style type="text/css">
    .chat-composer {
        display: flex;
    }

    .chat-composer input {
        flex: 1 auto;
    }

    .chat-composer button {
        border-radius: 0;
    }
</style>