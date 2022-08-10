<template>
    <div class="">
        <div class="w-64"></div>
        <aside style="top: 55px" class="w-64 fixed overflow-y-auto py-4 px-3 bg-gray-50 sideNav dark:bg-gray-800"
               aria-label="Sidebar">
            <ul class="space-y-2">
                <div class="flex justify-center rounded-md shadow-sm" role="group">
                    <button v-on:click="CreateGroup()" type="button"
                            class="py-2 px-4 text-sm flex-1 font-medium items-center text-gray-900 bg-transparent rounded border border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                        Add group
                    </button>

                </div>

                <button v-on:click="openUsersPage"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ 'All users' }}</span>
                </button>
                <SideNavBarGroups
                    v-on:drop-to-group="onDrop"
                    v-on:select-group="OpenGroup"
                    v-on:delete-group="DeleteGroup"
                    v-on:drag-user="dragUser"
                    v-on:drag-group="dragGroup"
                    v-on:open-user-page="openUserPage"
                    :groups="groups"/>
            </ul>
        </aside>
    </div>
</template>

<script>
import SideNavBarGroups from "./SideNavBarGroups"

export default {
    props: {
        groups: {
            required: true,
            type: Array,
            default: () => [],
        }
    },
    components: {
        SideNavBarGroups,
    },
    methods: {
        CreateGroup() {
            this.$emit('go-to-add-group')
        },
        OpenGroup(id) {
            this.$emit('select-group', id)
        },
        DeleteGroup(index) {
            this.$emit('delete-group', index)
        },
        openUsersPage() {
            this.$emit('open-users-page')
        },
        onDrop(group, dragState) {
            this.$emit('drop-to-group', group, dragState)
        },
        dragUser(group, user) {
            this.$emit('drag-user', group, user)
        },
        dragGroup(group, parent) {
            this.$emit('drag-group', group, parent)
        },
        openUserPage(user) {
            this.$emit('open-user-page', user)

        },

    },
}
</script>


<style scoped>
.sideNav {
    height: calc(100vh - 55px);
}


</style>
