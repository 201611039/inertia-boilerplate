<template>
    <app>
        <h3><span style="border-bottom:1px solid red;">{{ role.name }} permissions</span></h3>
        <form @submit.prevent="submit" method="post">
            <div v-for="(permission, index) in permissions" :key="index" style="padding-bottom:30px;">
                <h4>{{ index }}</h4>

                <span v-for="(p, index) in permission" :key="index" style="margin-right:15px;">
                    <input type="checkbox" :name="p.name" :value="p.id" v-model="form.ids">
                    <label :for="p.name">{{ p.name }}</label>
                </span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">Grant</button>
            </div>
        </form>
    </app>
</template>

<script>
import App from '@/Pages/Layouts/App.vue'

export default {
    components: {
        app: App
    },

    props: [
        'errors', 'permissions', 'role', 'oldInputs'
    ],

    data () {
      return {
          perms: this.permissions,
          form: {
              ids: []
          }
      }
    },

    methods: {
        submit () {
            this.$inertia.post(this.route('role.grant-permission', this.role.id), this.form)
            .then(res => {

            })
            .catch(err => {
                console.log(err);
            })
        },

        getOldInputs() {
            if (this.oldInputs.length) {
                this.form.ids = this.oldInputs
            }
            else {
                return []
            }
        },

    },

    created () {
        this.getOldInputs()
    }
}
</script>

<style>

</style>
