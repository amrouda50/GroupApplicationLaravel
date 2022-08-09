<template>
    <div class="background  flex content">
        <NavBar v-bind:is-logged-in="true" v-bind:user-email="UserEmail" v-bind:user-name="UserName" />
        <SideNavBar
            v-on:open-users-page="stats = 'default'"
            v-bind:groups="groups"
            v-on:go-to-add-group="stats = 'addGroup'"
            v-on:select-group="selectgroup"
            v-on:delete-group="deletegroup"
        />
        <div class="pl-20 bg-slate-600/80 pt-20 w-full">
            <AddGroup v-if="isAddGroup" v-on:update="onAddUpdate()"/>
            <GroupDetails
                v-if="isGroupDetails"
                v-bind:Group="currentGroup"
                v-on:update="onAddUpdate()"
                v-on:remove-user="onRemoveUserFromCurrent"
            />
            <UserDetails v-if="isUserDetails"/>
            <Default v-if="isDefault" :users="users"/>
        </div>
    </div>
</template>



<script>
import NavBar from './nav/NavBar'
import SideNavBar from './nav/SideNavBar'
import AddGroup from './HomePageStates/AddGroup'
import GroupDetails from './HomePageStates/GroupDetails'
import UserDetails from './HomePageStates/UserDetails'
import Default from './HomePageStates/Default'

export default {
    components:{
        SideNavBar,
        NavBar,
        GroupDetails,
        UserDetails,
        AddGroup,
        Default,
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
          users:[],
      }
    },
   async created() {
       this.fetchNewGroups()
       this.getAllUsers()
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
        async getAllUsers(){
            const response = await fetch('./api/users')
            this.users = await response.json()
            this.stats = 'default'
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
        onRemoveUserFromCurrent(userId) {
            const users = this.currentGroup.users.filter(u => u.id !== userId)
            this.currentGroup.users = [...users]
        }
    }
}

</script>


<style scoped>
.background{
    min-height: 100vh;
}
</style>
