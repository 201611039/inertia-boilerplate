<template>
  <app>
      <div class="row justify-content-center mt-5">
        <div class="col-sm-6">
                <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Create New Role</h4>
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
                        <button class="btn btn-primary mt-3" type="submit">Create</button>
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
        'errors', 'roles'
    ],

    components: {
        app: App
    },

    data() {
        return {
            form: {
                name: null,
            }
        }
    },

    methods: {
        submit () {
            this.$inertia.post(this.route('role.store'), this.form)
            .then( res => {

            })
            .catch(error => {
                console.log(error);
            })
        }
    },

}
</script>

<style>

</style>
