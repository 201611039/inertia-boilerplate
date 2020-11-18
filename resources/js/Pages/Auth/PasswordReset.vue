<template>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="alert mt-3 alert-success" v-if="state">{{ state }}</div>
            <div class="card mt-5">
                <div class="card-body">
                    <form action="post" @submit.prevent="submit">

                    <div class="mb-3 col-md-8">
                        <label for="email">Email:</label>
                        <input id="email" class="form-control" v-model="form.email" />
                        <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                    </div>

                    <button class="btn btn-danger" type="submit">Reset Password</button>
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
