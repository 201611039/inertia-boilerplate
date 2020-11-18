<template>
<div class="row justify-content-center mt-5">
    <div class="alert mt-3 alert-success" v-if="state">{{ state }}</div>
    <div class="col-sm-6">
            <div class="card">
            <div class="card-header">
                <h4 class="text-center">LOGIN</h4>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div class="mb-3 row">
                        <label class="col-md-4" for="email">Email</label>
                        <div class="col-md-8">
                            <input class="form-control" id="email" v-model="form.email" />
                            <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4">Password</label>
                        <div class="col-md-8">
                            <input class="form-control" id="password" type="password" v-model="form.password" />
                        </div>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Submit</button>
                    <inertia-link class="float-right mt-4" href="/forgot-password">Forgot password</inertia-link>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
  props: ['errors', 'state'],

  data() {
    return {
      form: {
        password: null,
        email: null,
      },
    }
  },
  methods: {
    submit() {
        axios.get('/sanctum/csrf-cookie').then(response => {
            this.$inertia.post('/login', this.form)
        });
    },
  },
}
</script>
