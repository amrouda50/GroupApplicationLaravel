<template>
    <div>
        <h1 class=" mb-6 text-xl font-bold text-white/80">Current Users</h1>
        <div class="divider my-8" />
        <div class="grid grid-cols-3 grid-flow-row gap-4 pb-6 pr-6 ">

       <UserBox
           v-for="user in Group.users"
           v-bind:user="user"
           v-bind:key="user.id"
           v-on:delete-user="onRemoveUser(user.id)"
       />
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
import UserBox from "../Components/UserBox"
export default {
    data(){
        return{
            functionality:['Edit Group' , 'Edit Group']
        }
    },
    components: {
        GroupInput,
        UserBox,
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
            this.$emit('remove-user', this.Group.id, id)
        },
    },
}

</script>


<style scoped>

</style>
