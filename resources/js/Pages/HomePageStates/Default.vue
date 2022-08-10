<template>
    <div class="grid grid-cols-3 grid-flow-row gap-4 pb-6 pr-6 ">
        <UserBox
            :can-delete-user="false"
            :key="user.id"
            v-for="user in users"
            :user="user"
            :draggable="true"
            v-on:dragstart.native="onDragStart($event, user)"
        />
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
    methods: {
        onDragStart(e, user) {
            this.$emit('drag-user', user)
        },
    }
}

</script>


<style scoped>


</style>
