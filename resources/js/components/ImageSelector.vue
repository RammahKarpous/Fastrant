<template>
    <div id="image-selector">
        <picture-input
            ref="pictureInput"
            @change="onChanged"
            @remove="onRemoved"
            :width="250"
            :removable="true"
            removeButtonClass="button button--error"
            :height="250"
            accept="image/jpeg, image/png, image/gif"
            buttonClass="button button--danger"
            :customStrings="{
                upload: '<h1>Upload it!</h1>',
                drag: 'Drag and drop your image here'}"
        ></picture-input>
    </div>
</template>

<script>
    export default {
        name: "ImageSelector",

        methods: {
            onChanged() {
                this.file = this.$refs.pictureInput.file;
            },
            onRemoved() {
                this.file = null;
            }
        }
    }
</script>

<style scoped>

</style>
