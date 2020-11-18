<template>
  <app>
      <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
                <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Register New USer</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="submit">
                        <div class="mb-3 row">
                            <label for="name" class="col-md-4">Name</label>
                            <div class="col-md-8">
                                <input class="form-control" id="name" v-model="form.name" />
                                <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4" for="email">Email</label>
                            <div class="col-md-8">
                                <input class="form-control" id="email" v-model="form.email" />
                                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-md-4" for="role">Role</label>
                            <div class="col-md-8">
                                <select class="form-control" id="role" v-model="form.role" >
                                    <option disabled selected>Select user role</option>
                                    <option v-for="role in roles" :key="role.id">{{ role.name }}</option>
                                </select>
                                <span class="text-danger" v-if="errors.role">{{ errors.role[0] }}</span>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Update</button>
                        <a class="float-right mt-3 btn btn-danger" href="javascript:void(0)" @click="destroy" method="put">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </app>
</template>

<script>
import App from '@/Pages/Layouts/App.vue'
export default {

    props: [
        'errors', 'user', 'roles'
    ],

    components: {
        app: App
    },

    data() {
        return {
            form: {
                name: this.user.name,
                email: this.user.email,
                role: this.user.role,
            }
        }
    },

    methods: {
        submit () {
            this.$inertia.put(this.route('user.update', this.user), this.form)
            .then( res => {

            })
            .catch(error => {
                console.log(error);
            })
        },

        destroy() {
            if (confirm('Delete this user?')) {
                this.$inertia.delete(this.route('user.destroy', this.user), this.form)
                .then( res => {

                })
                .catch(error => {
                    console.log(error);
                })
            }
        }
    },

}
</script>

<style>

</style>
