<template>

    <div  class="rounded w-64 h-24  text-black bg-gray-50 dark:bg-gray-800">
        <div class="flex relative">
            <img class=" mr-3  p-1 h-6 sm:h-9 rounded-full" :src="require('~/images/avatar-svgrepo-com.svg')">
            <img v-on:click="deleteUserFromGroup" class="h-5 w-5 absolute right-0 m-1 cursor-pointer" :src="require('~/images/delete-icon.svg')" />
            <div>
                <h6> {{user.name}}</h6>
                <h6> {{user.email}}</h6>
            </div>
        </div>
    </div>


</template>



<script>

export default{
props:{
  user:{
      required:true,
      type:Object,
  }
},

    methods:{
        deleteUserFromGroup(){
          this.$emit('delete-user' , this.user)
}
    }
}

</script>


<style scoped>


</style>
