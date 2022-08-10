<template>
    <div >
        <article>
            <h1 class=" mb-6 text-xl text-white/80">
                <span class="font-bold">Current User:</span>
            </h1>
            <div class="divider my-8" />
            <img draggable="false" class=" mr-3  mb-4 p-1 h-12 sm:h-12 rounded-full" :src="require('~/images/avatar-svgrepo-com.svg')">
            <h1 class=" mb-6 text-xl text-white/80">
                <span class="font-bold">Name:</span>
                <span>{{CurrentUser.name}}</span>
            </h1>
            <h1 class=" mb-6 text-xl text-white/80">
                <span class="font-bold">Email:</span>
                <span>{{CurrentUser.email}}</span> </h1>
        </article>
    </div>
</template>



<script>
export default {
    props:{
      CurrentUser:{
          required:true,
          type: Object,
      }  ,
    },


}

</script>


<style scoped>

</style>
