<template>
    <div class="bg-slate-600/80 background flex content">
        <NavBar v-bind:is-logged-in="true" v-bind:user-email="UserEmail" v-bind:user-name="UserName" />
        <SideNavBar
            v-bind:groups="groups"
            v-on:go-to-add-group="stats = 'addGroup'"
        />
        <AddGroup v-if="isAddGroup" />
        <GroupDetails v-if="isGroupDetails" />
        <UserDetails v-if="isUserDetails"/>
    </div>
</template>



<script>
import NavBar from './nav/NavBar'
import SideNavBar from './nav/SideNavBar'
import AddGroup from './HomePageStates/AddGroup'
import GroupDetails from './HomePageStates/GroupDetails'
import UserDetails from './HomePageStates/UserDetails'

export default {
    components:{
        SideNavBar,
        NavBar,
        GroupDetails,
        UserDetails,
        AddGroup,
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
          groups:[],
          stats:'default',
      }
    },
   async created() {
       const response = await fetch('./api/groups')
       this.groups = await response.json()
    },
    computed:{
        isDefault(){
            return this.stats === 'default'
        },
        isAddGroup(){
            return this.stats === 'addGroup'
        }
        ,
        isUserDetails(){
            return this.stats === 'userDetails'

        },
        isGroupDetails(){
            return this.stats === 'groupDetails'
        }
    },
}

</script>


<style scoped>
.background{
    height: 100vh;
}
</style>
