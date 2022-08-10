<template>
    <div>
        <form class="pb-6" @submit.prevent="submit()">
            <h1 class="mb-6 text-xl font-bold text-white/80">{{ functionality[0] }}</h1>
            <div class="divider my-8"/>
            <slot name="group-properties"></slot>
            <div>
                <label class="text-white/80">Group name</label>
                <input
                    v-model="form.name"
                    placeholder="Write the group name"
                    class="max-w-sm placeholder:text-sm form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded-lg transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                />
            </div>
            <label class="text-white/80">Group Description</label>

            <div
                class="max-w-sm mt-4 w-full   bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                    <textarea v-model="form.description" id="comment" rows="5" cols="60"
                              class="px-0 outline-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                              placeholder="Write the group description"></textarea>
                </div>

            </div>
            <button type="submit"
                    class="mt-8 bg-blue-50 	text-black py-2 px-4 text-sm flex-1 font-medium items-center text-white/60  rounded border border-white/60 hover:bg-white-100">
                {{ functionality[1] }}
            </button>
        </form>
    </div>
</template>


<script>
export default {
    props: {
        functionality: {
            required: true,
            type: Array,
        },
        group: {
            required: false,
            type: Object,
            default() {
                return {
                    name: '',
                    description: ''
                }
            }
        }
    },
    data() {
        return {
            form: this.$inertia.form(this.group),
        }
    },
    methods: {
        //Overridden form submit method
        submit() {
            this.$emit('submit', this.form)
        }
        ,
    },
    watch: {
        group: {
            handler() {
                this.form = this.$inertia.form(this.group)
            },
            deep: true,
        }
    }

}
</script>


<style scoped>
textarea {
    resize: none;
}

</style>
