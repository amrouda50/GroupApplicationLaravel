<template>
    <div>
        <GroupInput
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
        }
    }
}

</script>


<style scoped>

</style>
