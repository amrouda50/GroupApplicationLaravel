<template>
<ul>
    <li
        v-for="(group, index) in localGroups"
        v-bind:key="group.id"
        class="cursor-move"
    >
        <div>
            <button
                draggable="true"
                v-on:dragstart="onGroupDragStart($event, group, 0)"
                v-on:drop="onDrop($event, group)"
                v-on:dragover="onDragOver"
                v-on:click="openGroup(group.id)"
                class="flex items-center text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 p-2"
            >
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
                    alt="Arrow"
                >
            </button>

            <div v-if="localGroups[index].expandable && localGroups[index].expand" class="pl-4">
                <div
                    draggable="true"
                     v-bind:key="user.id"
                     v-for="user in localGroups[index].users" class="text-left flex items-center text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 p-2"
                     v-on:dragstart="onUserDragStart($event, localGroups[index], user)"
                     v-on:click="openUserPage(user)"
                >
                    <img  alt="Avatar" class="mr-3 cursor-pointer h-4 sm:h-4 rounded-full" :src="require('~/images/avatar-svgrepo-com.svg')">
                    {{user.name}}
                </div>
                <div class="text-left">
                    <side-nav-bar-groups
                        v-on:drop-to-group="onDropChild"
                        v-on:select-group="selectGroup"
                        v-on:delete-group="DeleteGroup"
                        v-on:drag-user="onDragUser"
                        v-on:drag-group="onDragGroup"
                        v-on:open-user-page="openUserPage"
                        :groups="localGroups[index].groups"
                    />
                </div>

            </div>
        </div>

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
            dragState: 'default',
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
    onDrop(e, group) {
        e.stopPropagation()
        this.$emit('drop-to-group', group, e.dataTransfer.getData('drag-state'))
        this.dragState = 'default'
    },
    onDropChild(group, dragState) {
        this.$emit('drop-to-group', group, dragState)
    },
    onDragOver(event) {
        event.preventDefault()
        event.dataTransfer.dropEffect = 'move'
    },
    openGroup(id){
        const group =this.localGroups.find(l => l.id === id)
        group.expand = !group.expand
        this.$emit('select-group', id)
    },
    selectGroup(id) {
        this.$emit('select-group' , id)
    },
    DeleteGroup(e, index){
        e.stopPropagation()
        this.$emit('delete-group' , index)
    },
    onUserDragStart($event, user, group) {
        this.dragState = 'user-drag'
        $event.dataTransfer.setData('drag-state', this.dragState)
        this.onDragUser(user, group)
    },
    onGroupDragStart($event, group, counter) {
        this.dragState = 'group-drag'
        $event.dataTransfer.setData('drag-state', this.dragState)
        this.onDragGroup(group, counter)
    },
    onDragUser(group, user) {
        this.$emit('drag-user', group, user)
    },
    onDragGroup(group, counter) {
        if (typeof counter === 'number' && counter === 1) {
            const parentGroup = this.groups.find(g => g.groups && !!g.groups.find(gr => gr.id === group.id))
            this.$emit('drag-group', group, parentGroup)
        } else if (typeof counter === 'number') {
            this.$emit('drag-group', group, ++counter)
        } else {
            this.$emit('drag-group', group, counter)
        }
    },
    openUserPage(user){
        this.$emit('open-user-page' , user)
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
