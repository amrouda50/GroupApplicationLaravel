<template>
    <div class="bg-slate-600 background" >
        <div >
            <NavBar v-bind:is-logged-in="IsLoggedIn" v-bind:user-email="UserEmail" v-bind:user-name="UserName">

            </NavBar>
            <SideNavBar>

            </SideNavBar>
        </div>

    </div>
</template>



<script>
import NavBar from './nav/NavBar'
import SideNavBar from './nav/SideNavBar'
export default {
    components:{
        SideNavBar,
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
.background{
    height: 100vh;
}
</style>
