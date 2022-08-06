<template>
    <div>
        <NavBar v-bind:is-logged-in="IsLoggedIn"/>
        <figure class="md:flex bg-slate-100 rounded-xl p-8 dark:bg-slate-800 content">
            <img class="w-24 h-24 rounded-full mx-auto" :src="require('~/images/OmarImage.jpg')" alt="" width="384" height="512">
            <div class="pt-6 text-center space-y-4">
                <blockquote>
                    <p class="text-lg font-medium">
                        “Trust is hard to obtain , but easy to be broken .
                        Our website connects you with group of people that you can trust, work with ,
                        and have a great time under our supervision.Together we can!“
                    </p>

                </blockquote>
                <figcaption class="font-medium">
                    <div class="text-sky-500 dark:text-sky-400">
                        Omar Ashour
                    </div>
                    <div class="text-slate-700 dark:text-slate-500">
                        Love Mentor, Egypt
                    </div>
                </figcaption>
            </div>
        </figure>
        <figure class="md:flex bg-slate-100 rounded-xl p-8 dark:bg-slate-800 contentOne">
            <img class=" w-28 h-24 rounded-full mx-auto" :src="require('~/images/AndreiImage.jpg')" alt="" width="384" height="512">
            <div class="pt-6 text-center space-y-4">
                <blockquote>
                    <p class="text-lg font-medium">
                        “Unity gave me a lots of new experiences I never imagined to have. Using good software is like drinking nice pile of wine, never gets old. “
                    </p>

                </blockquote>
                <figcaption class="font-medium">
                    <div class="text-sky-500 dark:text-sky-400">
                        Andrei Cristea
                    </div>
                    <div class="text-slate-700 dark:text-slate-500">
                        Love Client, Moldova
                    </div>
                </figcaption>
            </div>
        </figure>
    </div>
</template>



<script>
import NavBar from './nav/NavBar'
export default {
    components: {
        NavBar,
    },
    props:{
        IsLoggedIn: {
            required: true,
        },
    },

}

</script>


<style scoped>
.content{
   height: 200px;
}
.contentOne{
    height:calc(100vh - 272px);
}
</style>
