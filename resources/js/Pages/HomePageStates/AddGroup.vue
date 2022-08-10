<template>
    <div>
       <GroupInput v-bind:functionality="functionality" v-on:submit="submit"/>
    </div>
</template>



<script>
import GroupInput from "../Components/GroupInput"
export default {
    components: {
      GroupInput,
    },
    data(){
        return{
            functionality:['Create Group' , 'Add Group']
        }
    },
    methods:{
        //Overridden form submit method
        submit(form){
            this.$inertia.post('/api/groups', form, {
                onSuccess: () => {
                    this.$emit('update')
                }
            })
        }
        ,
    },

}
</script>


<style scoped>

</style>
