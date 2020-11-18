<template>
    <app>
        <section class="">
            <div class="">
                {{ profile.user.name }}
            </div>

            <vue-editor :editorOptions="editorSettings" v-model="content" />
        </section>
    </app>
</template>

<script>
import App from '../Layouts/App'
// import { ImageDrop } from "quill-image-drop-module";
import ImageResize from "quill-image-resize";

// Quill.register("modules/imageDrop", ImageDrop);
Quill.register("modules/imageResize", ImageResize);

export default {
    components: {
        app: App,
    },

    props: [
        'profile'
    ],

    data () {
        return {
            content: '',
            editorSettings: {
            modules: {
                // imageDrop: true,
                imageResize: {}
            }
        }
        }
    }
}
</script>

<style>

</style>
