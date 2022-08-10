<template>
    <div class="">
        <div class="w-64"></div>
        <aside style="top: 55px" class="w-64 fixed overflow-y-auto py-4 px-3 bg-gray-50 sideNav dark:bg-gray-800" aria-label="Sidebar">
            <ul class="space-y-2">
                <div class="flex justify-center rounded-md shadow-sm" role="group">
                    <button v-on:click="CreateGroup()" type="button" class="py-2 px-4 text-sm flex-1 font-medium items-center text-gray-900 bg-transparent rounded border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">                    Add group
                    </button>

                </div>
<!--                    <li>-->
<!--                        <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">-->
<!--                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>-->
<!--                            <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>E-commerce</span>-->
<!--                            <img  class="w-6 h-6" :src="require('~/images/arrow.svg')" alt="Arrow">                        </button>-->
<!--                        <ul id="dropdown-example" class="hidden py-2 space-y-2">-->
<!--                            <li>-->
<!--                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Products</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Billing</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Invoice</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->

                <button v-on:click="openUsersPage"  class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{'All users'}}</span>
                </button>
                <SideNavBarGroups
                    v-on:drop-to-group="onDrop"
                    v-on:select-group="OpenGroup"
                    v-on:delete-group="DeleteGroup"
                    :groups="groups"/>
                </ul>
        </aside>
    </div>
</template>

<script>
import SideNavBarGroups from "./SideNavBarGroups"
export default {
props:{
  groups:{
      required:true,
      type:Array,
      default: () => [],
  }
},
    components:{
        SideNavBarGroups,
    },
    methods:{
  CreateGroup(){
      this.$emit('go-to-add-group')
  }  ,
    OpenGroup(index){
      this.$emit('select-group' , index)
    },
    DeleteGroup(index){
        this.$emit('delete-group' , index)
    },
    openUsersPage(){
      this.$emit('open-users-page')
    },
    onDrop(index) {
        this.$emit('drop-to-group', index)
    },
},
}
</script>


<style scoped>
.sideNav{
    height: calc(100vh - 55px);
}


</style>
