<template>
    <form action="post" @submit.prevent="submit">
        <div v-if="state">{{ state }}</div>

        <div>
            <label for="email">Email:</label>
            <input id="email" v-model="form.email" />
            <span v-if="errors.email">{{ errors.email[0] }}</span>
        </div>

        <button type="submit">Reset Password</button>
    </form>
</template>

<script>
export default {
    props: [
        'errors',
        'state'
    ],
    data() {
        return {
            form: {
                email: null
            }
        }
    },

    methods: {
        submit() {
            this.$inertia.post('/forgot-password', this.form)
            .then(res => {
                this.form.email = null
            })
            .catch(err => {
                console.log(err);
            })
        }
    },
}
</script>

<style>

</style>
