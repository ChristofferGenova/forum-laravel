<template>
    <div>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Christoffer {{ replied }}</span>

                <blockquote>
                    Proin ut massa tempor, sagittis enim non, tempus arcu.
                    Sed faucibus pharetra auctor. Ut tellus massa, sagittis et efficitur ut, semper et dui.
                    Duis varius purus nec enim finibus pretium. Pellentesque eu pellentesque libero. Vivamus
                    nec neque sed risus mattis commodo id vitae leo. Praesent sagittis gravida tortor, a ultrices
                    neque hendrerit vitae. Curabitur tempor lacus vitae erat feugiat pretium. Cras tellus orci,
                    vehicula vel viverra sed, porttitor ac orci. Integer id magna vel sem semper luctus in sed urna.
                </blockquote>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Christoffer {{ replied }}</span>

                <blockquote>
                    Proin ut massa tempor, sagittis enim non, tempus arcu.
                    Sed faucibus pharetra auctor. Ut tellus massa, sagittis et efficitur ut, semper et dui.
                    Duis varius purus nec enim finibus pretium. Pellentesque eu pellentesque libero. Vivamus
                    nec neque sed risus mattis commodo id vitae leo. Praesent sagittis gravida tortor, a ultrices
                    neque hendrerit vitae. Curabitur tempor lacus vitae erat feugiat pretium. Cras tellus orci,
                    vehicula vel viverra sed, porttitor ac orci. Integer id magna vel sem semper luctus in sed urna.
                </blockquote>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <span class="card-title">Christoffer {{ replied }}</span>

                <blockquote>
                    Proin ut massa tempor, sagittis enim non, tempus arcu.
                    Sed faucibus pharetra auctor. Ut tellus massa, sagittis et efficitur ut, semper et dui.
                    Duis varius purus nec enim finibus pretium. Pellentesque eu pellentesque libero. Vivamus
                    nec neque sed risus mattis commodo id vitae leo. Praesent sagittis gravida tortor, a ultrices
                    neque hendrerit vitae. Curabitur tempor lacus vitae erat feugiat pretium. Cras tellus orci,
                    vehicula vel viverra sed, porttitor ac orci. Integer id magna vel sem semper luctus in sed urna.
                </blockquote>
            </div>
        </div>

        <div class="card grey lighten-4">
            <div class="card-content">
                <span class="card-title">{{ reply }}</span>

                <form action="">
                    <div class="input-field">
                        <textarea name="" id="" cols="30" rows="10" class="materialize-textarea" :placeholder="yourAnswer"></textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">{{ submit }}</button>
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
            'submit'
        ]
    }
</script>

<style scoped>

</style>
