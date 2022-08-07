<template>
    <div class="bg-slate-600 background" >
        <div >
            <NavBar v-bind:is-logged-in="true" v-bind:user-email="UserEmail" v-bind:user-name="UserName">

            </NavBar>
            <SideNavBar v-bind:groups="[...groups, ...groups, ...groups, ...groups]">

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
    data(){
      return{
          groups:[]
      }
    },
   async created() {
       const response = await fetch('./api/groups')
       this.groups = await response.json()
    },
}

</script>


<style scoped>
.background{
    height: 100vh;
}
</style>
