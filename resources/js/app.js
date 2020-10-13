require('./bootstrap');

import { app, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'

Vue.use(plugin)

const el = document.getElementById('app')



InertiaProgress.init()

new Vue({
    render: h => h(app, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(el)
