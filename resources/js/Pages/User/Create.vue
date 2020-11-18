<template>
  <app>
        <v-card
        elevation="2"
        >
            <v-card-title>Register new user</v-card-title>
            <v-card-text>
                    <form @submit.prevent="submit" method="post">
                    <div class="pb-5">
                        <v-text-field
                        label="Name"
                        outlined
                        v-model="form.name"
                        @input="clearInput('name')"
                        :error="errors.name? true: false"
                        :error-messages="errors.name?errors.name[0]:''"
                        hide-details="auto"
                        ></v-text-field>
                    </div>

                    <div class="pb-5">
                        <v-text-field
                        label="Email"
                        v-model="form.email"
                        @input="clearInput('email')"
                        :error="errors.email? true: false"
                        :error-messages="errors.email?errors.email[0]:''"
                        hide-details="auto"
                        ></v-text-field>
                    </div>

                    <div class="pb-5">
                        <v-select
                        v-model="form.role"
                        @input="clearInput('role')"
                        :items="roles"
                        item-text="name"
                        :error="errors.role? true: false"
                        :error-messages="errors.role?errors.role[0]:''"
                        label="Role"
                        required
                        ></v-select>
                    </div>

                    <v-btn
                    class="mr-4"
                    color="primary"
                    @click="submit"
                    :loading="loading"
                    >
                    submit
                    </v-btn>
                </form>
            </v-card-text>
        </v-card>
  </app>
</template>

<script>
import App from '@/Pages/Layouts/App.vue'
export default {

    props: [
        'errors', 'roles'
    ],

    components: {
        app: App
    },

    data() {
        return {
            form: {
                name: null,
                email: null,
                role: null,
            },
            loading: false
        }
    },

    methods: {
        submit () {
            this.loading = true
            this.$inertia.post(this.route('user.store'), this.form)
            .then( res => {
                this.loading = false
            })
            .catch(error => {
                this.loading = false
                console.log(error);
            })
        },

        clearInput(field) {
            if (this.errors[field]) {
                delete this.errors[field];
                // this.errors = this.errors.slice(0, field).concat(this.errors.slice(i + 1, this.errors.length))
            }
        }
    },

}
</script>

<style>

</style>
