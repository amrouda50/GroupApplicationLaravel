<template>
    <div class="bg-slate-600/80 background flex content">
        <NavBar v-bind:is-logged-in="true" v-bind:user-email="UserEmail" v-bind:user-name="UserName" />
        <SideNavBar
            v-bind:groups="groups"
            v-on:go-to-add-group="stats = 'addGroup'"
            v-on:select-group="selectgroup"
            v-on:delete-group="deletegroup"
        />
        <AddGroup v-if="isAddGroup" v-on:update=" onAddUpdate()"/>
        <GroupDetails v-if="isGroupDetails"  v-bind:Group="currentGroup"/>
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
          currentGroup:null,
          currentDeletedGroup:null,
      }
    },
   async created() {
       this.fetchNewGroups()
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

    methods:{
        async fetchNewGroups() {
            const response = await fetch('./api/groups')
            this.groups = await response.json()
            this.stats = 'default'
        },
        onAddUpdate(){
            this.fetchNewGroups()
        },
        selectgroup(index){
           this.currentGroup =  this.groups[index]
            this.stats = 'groupDetails'
        },
         deletegroup(index){
            this.currentDeletedGroup =  this.groups[index]
            this.$inertia.delete( `/api/groups/${this.currentDeletedGroup.id}` , {
                onBefore: () => confirm('Are you sure you want to delete this user?'),
                onSuccess: () => this.onAddUpdate(),
            })
        },
    }
}

</script>


<style scoped>
.background{
    height: 100vh;
}
</style>
