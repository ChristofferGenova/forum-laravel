<template>
<div id="preloader" v-show="counter > 0">
    <div class="image">
        <img src="../../../public/img/nyan-cat.gif">
    </div>
</div>
</template>

<style>
    #preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.5);
    }

    #preloader .image{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        overflow: hidden;
    }
</style>

<script>
    export default {
        data() {
            return {
                counter: 0
            }
        },
        mounted() {
            axios.interceptors.request.use((config) => {
                this.counter++;
                return config;
            }, (error) => {
                return Promise.reject(error);
            });

            axios.interceptors.response.use((response) => {
                this.counter--;
                return response;
            }, (error) => {
                this.counter--;
                return Promise.reject(error);
            })
        }
    }
</script>
