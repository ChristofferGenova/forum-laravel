<template>
    <div class="card">
        <div class="card-content">
            <span class="card-title">{{ title }}</span>

            <table>
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ threads }}</th>
                    <th>{{ replies }}</th>
                    <th>{{ action }}</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="thread in threads_response.data" :class="{ 'lime lighten-4': thread.fixed, 'red lighten-4': thread.closed }">
                    <td>{{ thread.id }}</td>
                    <td>{{ thread.title }}</td>
                    <td>{{ thread.replies_count }}</td>
                    <td>
                        <a :href="'/threads/' + thread.id" id="btnOpenThread">{{ open }}</a>
                        <a :href="'/thread/pin/' + thread.id" id="btnPinThread" v-if="logged.role === 'admin'">{{ pin }}</a>
                        <a :href="'/thread/close/' + thread.id" id="btnCloseThread" v-if="logged.role === 'admin'">{{ close }}</a>
                    </td>
                    <td v-if="thread.fixed">
                        {{ threadFixed }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="card-content">
            <span class="card-title">{{ newThread }}</span>

            <form @submit.prevent="save()">
                <div class="input-field">
                    <input type="text" id="idInputTitleThread" :placeholder="nameTitle" v-model="threads_to_save.title">
                </div>

                <div class="input-field">
                    <textarea id="idInputBodyThread" cols="30" rows="10" class="materialize-textarea" :placeholder="body" v-model="threads_to_save.body"></textarea>
                </div>

                <button type="submit" class="btn red accent-2" id="btnSaveThread">{{ submit }}</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'title',
            'threads',
            'replies',
            'action',
            'open',
            'newThread',
            'nameTitle',
            'body',
            'submit',
            'pin',
            'threadFixed',
            'close'
        ],
        data() {
            return {
                threads_response: [],
                logged: window.user || {},
                threads_to_save: {
                    title: '',
                    body: ''
                }
            }
        },
        methods: {
            save() {
                window.axios.post('/threads', this.threads_to_save).then(() => {
                    this.getThreads();
                });
            },
            getThreads() {
                window.axios.get('/threads').then((response) => {
                    this.threads_response = response.data;
                })
            }
        },
        mounted() {
            this.getThreads();
            Echo.channel('new.thread').listen('NewThread', (e) => {
                    console.log(e);
                    if (e.thread) {
                        this.threads_response.data.splice(0, 0, e.thread);
                    }
            });
        }
    }
</script>

<style scoped>

</style>
