import Vue from 'vue'
import route from 'ziggy';
import { Ziggy } from '~/assets/js/ziggy';


// ziggy
Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
    },
});
