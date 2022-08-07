<template>
    <div>
        <NavBar v-bind:is-logged-in="IsLoggedIn" v-bind:user-email="UserEmail" v-bind:user-name="UserName">

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
}

</script>


<style scoped>

</style>
