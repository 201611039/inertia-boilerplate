<template>
  <app>
        <section class="section">
            <inertia-link :href="create_url" class="btn btn-primary float-right">Create New User</inertia-link>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users" :key="user.id">
                        <td>{{ index+1 }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <inertia-link class="btn btn-danger" :href="user.edit_url">Edit</inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
  </app>
</template>

<script>
import App from '@/Pages/Layouts/App.vue'

export default {
    components: {
        app: App
    },

    props: [
        'users',
        'create_url'
    ],

    data() {
        return {

        }
    }
}
</script>

<style>

</style>
