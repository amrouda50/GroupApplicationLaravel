<template>
    <div>
        <h1 class=" mb-6 text-xl font-bold text-white/80">Current Users</h1>
        <div class="divider my-8" />
        <div class="grid grid-rows-4 grid-flow-col gap-4 pb-6 pr-6 ">

            <div v-for="(user , i) in Group.users" v-bind:key="i" class="rounded w-64 h-24  text-black bg-gray-50 dark:bg-gray-800">
                <div class="flex relative">
                    <img class=" mr-3  p-1 h-6 sm:h-9 rounded-full" :src="require('~/images/avatar-svgrepo-com.svg')">
                    <img v-on:click="deleteUserFromGroup(user.id)" class="h-5 w-5 absolute right-0 m-1 cursor-pointer" :src="require('~/images/delete-icon.svg')" />
                    <div>
                        <h6> {{user.name}}</h6>
                        <h6> {{user.email}}</h6>
                    </div>
                </div>


            </div>
        </div>

        <GroupInput
            class="pt-20"
            v-bind:group="Group"
            v-bind:functionality="functionality"
            v-on:submit="EditGroup"
        >
            <template #group-properties>
                <article>
                    <h1 class=" mb-6 text-xl text-white/80">
                        <span class="font-bold">Name:</span>
                        <span>{{Group.name}}</span>
                    </h1>
                    <h1 class=" mb-6 text-xl text-white/80">
                        <span class="font-bold">Description:</span>
                        <span>{{Group.description}}</span> </h1>
                </article>
            </template>
        </GroupInput>
    </div>
</template>



<script>
import GroupInput from "../Components/GroupInput"
export default {
    data(){
        return{
            functionality:['Edit Group' , 'Edit Group']
        }
    },
    components: {
        GroupInput
    },
    props:{
      Group:{
          required:true,
          type:Object,
      },
    },
    methods:{
        EditGroup(form){
        this.$inertia.put(`/api/groups/${this.Group.id}`, form , {
                    onSuccess: () => {this.$emit('update')}
            })
        },
        onRemoveUser(id){
            this.$emit('remove-user', id)
        },
        deleteUserFromGroup(id){
            this.$inertia.delete( `/api/groups/${this.Group.id}/users/${id}` , {
                onSuccess: () => this.onRemoveUser(id),
            })
        },
    },
    mounted() {
        console.log(this.Group.users[0].name)
    }
}

</script>


<style scoped>

</style>
