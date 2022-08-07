
<template>
    <div>
<nav class="bg-white fixed w-full border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900 top-0">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <Link href="/" class="flex items-center">
            <img :src="require('~/images/handshake-deal-svgrepo-com.svg')" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Unity</span>
        </Link>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="items-center flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <Link href="/"  :class="{'text-blue-700' : $page.url === '/' , 'text-gray-700' : $page.url !== '/' }" class="block py-2 pr-4 pl-3 bg-blue-700 rounded md:bg-transparent  md:p-0 dark:text-white" aria-current="page">Home</Link>
                </li>
                <li v-if="!IsLoggedIn" >
                    <Link :href="route('login')"  :class="{'text-blue-700' : $page.url === '/login' , 'text-gray-700' : $page.url !== '/login' }" class="block py-2 pr-4 pl-3  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</Link>
                </li>
                <li v-if="!IsLoggedIn">
                    <Link  :href="route('register')" :class="{'text-blue-700' : $page.url === '/register' , 'text-gray-700' : $page.url !== '/register' }" class="block py-2 pr-4 pl-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</Link>
                </li>
                <li>
                    <Link :href="route('AboutUs')"  :class="{'text-blue-700' : $page.url === '/aboutUs' , 'text-gray-700' : $page.url !== '/aboutUs' }" class="block py-2 pr-4 pl-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About us</Link>
                </li>

                <li v-if="IsLoggedIn">
                    <img v-on:click="showStatus()"  :src="require('~/images/avatar-svgrepo-com.svg')" alt="Avatar" class="mr-3 h-6 sm:h-9 rounded-full">

                </li>
            </ul>
        </div>
        <transition v-if="IsLoggedIn" name="fade">
            <div v-if="this.TabOpened"  class="box-border right-20 absolute top-16 bg-white h-48 w-48 status rounded">
                <div class="h-14 bg-gray-200 flex flex-col items-center rounded-t">
                    <div class="font-bold text-xs mt-2">
                        Welcome
                    </div>
                    <div class="text-xs" >
                        {{UserName}}
                    </div>

                </div>
                <div  class="p-4 flex flex-col items-center text-xs">
                    <img :src="require('~/images/avatar-svgrepo-com.svg')" alt="Avatar" class=" absolute top-12 h-6 sm:h-9 rounded-full">
                    <div class="mt-6">
                        {{UserEmail}}
                    </div>
                    <form @submit.prevent="logout()">
                        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                            Sign out
                        </button>
                    </form>
                </div>

            </div>
        </transition>
    </div>
</nav>
<div style="margin-top: 5.5rem" />
</div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue'

export default {
    data(){
        return {
            TabOpened: false,
        }
    },
   props:{
       IsLoggedIn: {
           required: false,
           type: Boolean,
           default:false,
       }
       ,
       UserName:{
           required:false,
           type: String,
           default:null,
       },

       UserEmail:{
           required:false,
           type: String,
           default:null,
       },


   },
    components:{
        Link,
    },
 methods:{
       logout(){
        this.$inertia.post(this.route('logout'))
       },
       showStatus(){
           this.TabOpened = !this.TabOpened
     },
 },
}

</script>


<style scoped>
.status{
    box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.07);
}
.fade-enter-active, .fade-leave-active {
    transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
}
</style>
