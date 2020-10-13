<template>
    <form action="post" @submit.prevent="submit">
        <div>
            <label for="email">Email:</label>
            <input id="email" v-model="form.email" />
            <span v-if="errors.email">{{ errors.email[0] }}</span>
        </div>

        <div>
            <label for="password">New Password:</label>
            <input type="password" id="password" v-model="form.password" />
            <span v-if="errors.password">{{ errors.password[0] }}</span>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation" />
            <span v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
        </div>

        <button type="submit">Reset Password</button>

        <inertia-link href="/">Back to Login</inertia-link>

    </form>
</template>

<script>
export default {
    props: [
        'errors',
        'email',
        'token'
    ],
    data() {
        return {
            form: {
                email: this.email,
                password: null,
                password_confirmation: null,
                token: this.token,
            }
        }
    },

    methods: {
        submit() {
            this.$inertia.post('/reset-password', this.form)
            .then(res => {
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
