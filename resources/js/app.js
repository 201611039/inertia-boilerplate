require('./bootstrap');
require('./Plugins/index')
import Vue from 'vue'
import app from './Plugins/inertia'
import vuetify from '@/plugins/vuetify' // path to vuetify export



const el = document.getElementById('app')
new Vue({
    vuetify,
    render: h => h(app, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
    },
  }),
}).$mount(el)
