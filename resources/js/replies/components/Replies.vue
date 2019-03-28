<template>
    <div>
        <div class="card horizontal" v-for="data in replies" :class="{ 'lime lighten-4': data.highlighted }">
            <div class="card-images">
                <img class="img" :src="data.user.photo_url" alt="">
            </div>

            <div class="card-stacked">
                <div class="card-content">
                    <span class="card-title">{{ data.user.name }} {{ replied }}</span>

                    <blockquote>
                        {{ data.body }}
                    </blockquote>
                </div>
            </div>

            <div class="card-action" v-if="logged.role === 'admin'">
                <a :href="'/reply/highligth/' + data.id" id="btnBestAnswer">{{ bestAnswer }}</a>
            </div>
        </div>

        <div class="card grey lighten-4" v-if="is_closed == 0">
            <div class="card-content">
                <span class="card-title">{{ reply }}</span>

                <form @submit.prevent="save()">
                    <div class="input-field">
                        <textarea id="idInputYourAnswer" cols="30" rows="10" class="materialize-textarea" :placeholder="yourAnswer" v-model="reply_to_save.body"></textarea>
                    </div>
                    <button type="submit" class="btn red accent-2" id="btnSaveReply">{{ submit }}</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'replied',
            'reply',
            'yourAnswer',
            'submit',
            'threadId',
            'bestAnswer',
            'isClosed'
        ],
        data() {
            return {
                replies: [],
                logged: window.user || {},
                thread_id: this.threadId,
                is_closed: this.isClosed,
                reply_to_save: {
                    body: '',
                    thread_id: this.threadId
                }
            }
        },
        methods: {
            save() {
                window.axios.post('/replies', this.reply_to_save).then(() => {
                    this.getReplies();
                })
            },

            getReplies() {
                window.axios.get('/replies/' + this.thread_id).then((response) =>{
                    this.replies = response.data;
                });
            }
        },
        mounted() {
            this.getReplies();

            Echo.channel('new.reply.' + this.thread_id).listen('NewReply', (e) => {
                console.log(e);
                if (e.reply) {
                    this.getReplies();
                }
            });
        }
    }
</script>

<style>
    .img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
    }
</style>
