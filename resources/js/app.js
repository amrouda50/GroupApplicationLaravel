import route from "ziggy-js/src/js"

require('./bootstrap')

import Vue from 'vue'
import {createInertiaApp} from '@inertiajs/inertia-vue'
import {ZiggyVue} from 'ziggy'
import {Ziggy} from './ziggy'



const newRoute = (name, params, absolute) => route(name, params, absolute, Ziggy)

Vue.mixin({methods: {route: newRoute}})

Vue.component('side-nav-bar-groups', require('@/Pages/nav/SideNavBarGroups.vue'))

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({el, App, props, plugin}) {
        Vue.use(plugin)
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})
