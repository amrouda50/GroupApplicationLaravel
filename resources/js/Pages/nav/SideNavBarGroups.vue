<template>
<ul>
    <li
        v-for="(group, index) in localGroups"
        v-bind:key="group.id"
        v-on:drop="onDrop(index)"
        v-on:dragover="onDragOver"
        class="cursor-move"
    >
        <button v-on:click="OpenGroup(index)" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <img
                v-on:click="DeleteGroup($event, index)"
                class="h-5 w-5"
                :src="require('~/images/delete-icon.svg')"
            />
            <span class="flex-1 ml-3 whitespace-nowrap">{{group.name}}</span>
            <img
                v-if="localGroups[index].expandable"
                class="w-6 h-6"
                :class="{'arrow-right': !localGroups[index].expand  , 'arrow-up': localGroups[index].expand}"
                :src="require('~/images/arrow.svg')"
                v-on:click="openGroup($event, group)"
                alt="Arrow"
            >
        </button>
        <side-nav-bar-groups
            class="pl-4"
            v-on:drop-to-group="onDrop"
            v-on:select-group="OpenGroup"
            v-on:delete-group="DeleteGroup"
            v-if="localGroups[index].expandable && localGroups[index].expand"
            :groups="localGroups[index].groups"
        />
    </li>

</ul>
</template>


<script>
export default {
    name: 'side-nav-bar-groups',
    props:{
        groups:{
            required:true,
            type:Array,
            default: () => [],
        }
    },
    data() {
        return {
            localGroups:[],
        }
    },
    watch: {
        groups: {
            immediate: true,
            handler() {
                if (this.groups.length > 0) {
                    this.localGroups = this.groups.map(g => ({ expand: false, expandable: (g.groups && g.groups.length > 0)
                            || (g.users && g.users.length !== 0), ...g }))
                }
            }
        }
    },
methods:{
    onDrop(index) {
        this.$emit('drop-to-group', index)
    },
    onDragOver(event) {
        event.preventDefault()
        event.dataTransfer.dropEffect = 'move'
    },
    openGroup( event , group){
        event.stopPropagation()
        group.expand = !group.expand
    },
    OpenGroup(index){
        this.$emit('select-group' , index)
    },
    DeleteGroup(e, index){
        e.stopPropagation()
        this.$emit('delete-group' , index)
    },
}
}


</script>


<style scoped>
.arrow-right {
    transform: rotate(-90deg);
}
.arrow-up {
    transform: rotate(0deg);
}

</style>
