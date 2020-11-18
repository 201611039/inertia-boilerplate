<template>
  <app>
      <inertia-link :href="route('role.create')" class="btn btn-primary float-right">Create New Role</inertia-link>
      <table class="table">
          <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <tr v-for="(role, index) in roles" :key="role.id">
                  <td>{{ index+1 }}</td>
                  <td>{{ role.name }}</td>
                  <td>
                      <inertia-link class="btn btn-sm btn-success" :href="route('role.show', role.id)">Grant Permission</inertia-link>
                      <inertia-link class="btn btn-sm btn-danger" :href="route('role.edit', role.id)">Edit</inertia-link>
                  </td>
              </tr>
          </tbody>
      </table>
  </app>
</template>

<script>
import App from '@/Pages/Layouts/App.vue'

export default {
    components: {
        app: App
    },

    props: [
        'roles',
    ]
}
</script>

<style>

</style>
