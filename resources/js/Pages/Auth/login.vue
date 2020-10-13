<template>
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
</template>

<script>
export default {
  props: ['errors'],

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
