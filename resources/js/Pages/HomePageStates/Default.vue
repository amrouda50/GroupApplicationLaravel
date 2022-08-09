<template>
    <div class="grid grid-cols-3 grid-flow-row gap-4 pb-6 pr-6 ">
        <UserBox :key="user.id" v-for="user in users" :user="user"/>
    </div>

</template>


<script>
import UserBox from "../Components/UserBox"
export default{
    components:{
        UserBox,
    },
    props:{
      users:{
          required:true,
          type:Array,
      }
    },
}

</script>


<style scoped>


</style>
