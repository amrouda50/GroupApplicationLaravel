<template>
    <div>
        <NavBar v-bind:is-logged-in="IsLoggedIn"/>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
                <h3 class="text-2xl font-bold text-center mb-4">In Unity We Believe</h3>
                <h3 class="text-2xl font-bold text-center text-blue-400">
                    Join Us </h3>
                <form @submit.prevent="submit()" action="">

                    <div class="mt-4">
                        <div>
                            <label class="block" for="name">Name</label>
                            <input v-model="form.name" v-bind:class="{'border-red-500': errors.name}" type="text"
                                   placeholder="Name"
                                   class="bg-slate-100 w-full px-4 py-2 mt-2 border  rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"

                            >
                            <div class="text-red-500 mt-2 text-sm " v-if="errors.name">
                                {{ errors.name }}
                            </div>

                        </div>
                        <div class="mt-4">
                            <label class="block" for="email">Email</label>
                            <input v-model="form.email" v-bind:class="{'border-red-500': errors.name}" type="text"
                                   placeholder="Email"
                                   class="bg-slate-100 w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            <div class="text-red-500 mt-2 text-sm" v-if="errors.email">{{ errors.email }}</div>
                        </div>
                        <div class="mt-4">
                            <label class="block" for="password">Password</label>
                            <input v-model="form.password" v-bind:class="{'border-red-500': errors.name}"
                                   type="password" placeholder="Password"
                                   class="bg-slate-100 w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            <div class="text-red-500 mt-2 text-sm" v-if="errors.password">{{ errors.password }}</div>
                        </div>
                        <div class="mt-4">
                            <label for="password_confirmation" class="block">Confirm Password</label>
                            <input v-model="form.password_confirmation" name="password_confirmation" type="password"
                                   placeholder="Password"
                                   class="bg-slate-100 w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <h5 class="text-xs mt-1 pointer-events-none text-gray-500 p-2">Password should have : atleast 1 special character , 1 upper case letter , 1 number
                            , and atleast to have length of 8</h5>
                        <div class="flex">
                            <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                                Create
                                Account
                            </button>
                        </div>
                        <div class="mt-6 text-grey-dark">
                            Already have an account?
                            <Link class="text-blue-600 hover:underline" :href="route('login')">
                                Log in
                            </Link>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
import NavBar from './nav/NavBar'
import {Link} from '@inertiajs/inertia-vue'

export default {
    props: {
        errors: Object,
        IsLoggedIn: {
            required: true,
        },
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
                password: null,
                password_confirmation: null,
                email: null,

            }),
        }
    },
    components: {
        NavBar,
        Link,
    },
    methods: {
        //Overridden form submit method
        submit() {
            this.$inertia.post(this.route('register'), this.form, {
                onError: () => {
                    this.form.reset('password', 'password_confirmation')
                },
            })
        }
        ,
    }
    ,
}

</script>


<style scoped>

</style>
