<template>
    <div class="shadow-lg bg-white rounded-lg p-8">
        <h1 class="text-left text-xl text-green-700">Add player to {{team.name}}</h1>

        <form class="pt-6 pb-2 my-2">
            <div class="mb-4">
                <label class="block text-sm font-bold mb-2" for="firstName">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-800" id="firstName" type="text" placeholder="John" v-model="first_name">
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold mb-2" for="lastName">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-800 mb-3" id="lastName" type="text" placeholder="Doe" v-model="last_name">
            </div>
            <div class="block md:flex items-center justify-between">
                <div class="mt-4 md:mt-0">
                    <a href="#" class="no-underline text-red-700 hover:text-red-900" @click="cancel">Cancel</a>
                </div>
                <div>
                    <button :disabled="!canSubmit"
                            class="text-white py-2 px-4 rounded"
                            :class="{'cursor-not-allowed bg-gray-500': !canSubmit, 'bg-green-500 hover:bg-green-600': canSubmit}"
                            @click="submit"
                            type="button"
                    >
                        <div v-if="loading" class="text-grey-200">
                            <loading></loading>
                        </div>
                        <span v-else>Add Player</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    export default {
        props: ['team'],
        data: () => ({
            first_name: '',
            last_name: '',
            loading: false
        }),
        computed: {
            canSubmit() {
                return this.first_name.length > 0 && this.last_name.length > 0;
            }
        },
        methods: {
            cancel() {
                this.$emit('cancel');
            },
            submit() {
                this.loading = true;
                axios.post(`/api/teams/${this.team.id}/players`, {'first_name': this.first_name, 'last_name': this.last_name}, { headers: { Authorization: `Bearer ${window.token}` }})
                    .then( ({ data }) => {
                        this.loading = false;
                        this.$emit('submit');
                    });

            },

        },

    }
</script>
