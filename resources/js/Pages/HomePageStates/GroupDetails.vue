<template>
    <div>
    <div>
       {{Group.name}}
    </div>
    <div>
        {{Group.description}}
    </div>

</div>
</template>



<script>
export default {
    props:{
      Group:{
          required:true,
          type:Object,
      },
    },
}

</script>


<style scoped>

</style>
