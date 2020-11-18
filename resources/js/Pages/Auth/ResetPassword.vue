<template>
<div class="row justify-content-center">
        <div class="col-6">
            <div class="card mt-5">
                <div class="card-body">
                    <form action="post" @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="email">Email:</label>
                            <input class="form-control" id="email" v-model="form.email" />
                            <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        </div>

                        <div class="mb-3">
                            <label for="password">New Password:</label>
                            <input class="form-control" type="password" id="password" v-model="form.password" />
                            <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input class="form-control" type="password" id="password_confirmation" v-model="form.password_confirmation" />
                            <span class="text-danger" v-if="errors.password_confirmation">{{ errors.password_confirmation[0] }}</span>
                        </div>

                        <button class="btn btn-primary" type="submit">Reset Password</button>

                        <inertia-link class="float-right" href="/">Back to Login</inertia-link>

                    </form>
                </div>
            </div>
        </div>
    </div>

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
