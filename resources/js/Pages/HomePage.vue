<template>
    <div>
        <NavBar v-bind:is-logged-in="IsLoggedIn">

        </NavBar>
    </div>
</template>



<script>
import NavBar from './nav/NavBar'
export default {
    components:{
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

</style>
