<template>
<div>
    <div v-if="state">{{ state }}</div>

      <form @submit.prevent="submit">
        <div>
            <label for="email">Email:</label>
            <input id="email" v-model="form.email" />
            <span v-if="errors.email">{{ errors.email[0] }}</span>
        </div>
        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" v-model="form.password" />
            <span v-if="errors.password">{{ errors.password[0] }}</span>
        </div>
        <button type="submit">Submit</button>
    </form>

    <inertia-link href="/forgot-password">Forgot password</inertia-link>

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
