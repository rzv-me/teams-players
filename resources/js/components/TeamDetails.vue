<template>
    <div class="w-1/3 bg-white rounded-lg shadow-lg overflow-hidden">
        <div v-if="loading" class="text-gray-500 py-8">
            <loading></loading>
        </div>
        <div v-else class="p-4 flex items-center content-center">
            <div class="w-auto flex items-center content-center">
                <router-link :to="'/teams'" class="text-gray-600 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="18px" id="Layer_1" x="0px" y="0px" viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" fill="currentColor" xml:space="preserve"><g><g><path d="M464.344,207.418l0.768,0.168H135.888l103.496-103.724c5.068-5.064,7.848-11.924,7.848-19.124    c0-7.2-2.78-14.012-7.848-19.088L223.28,49.538c-5.064-5.064-11.812-7.864-19.008-7.864c-7.2,0-13.952,2.78-19.016,7.844    L7.844,226.914C2.76,231.998-0.02,238.77,0,245.974c-0.02,7.244,2.76,14.02,7.844,19.096l177.412,177.412    c5.064,5.06,11.812,7.844,19.016,7.844c7.196,0,13.944-2.788,19.008-7.844l16.104-16.112c5.068-5.056,7.848-11.808,7.848-19.008    c0-7.196-2.78-13.592-7.848-18.652L134.72,284.406h329.992c14.828,0,27.288-12.78,27.288-27.6v-22.788    C492,219.198,479.172,207.418,464.344,207.418z"/></g></g></svg>
                </router-link>
                <span class="text-xl">{{team.name}}</span>
            </div>
            <div class="w-auto flex-grow items-end text-right">
                <button class="rounded bg-green-500 hover:bg-green-600 hover:shadow-lg py-2 px-2 text-white font-normal" @click="showModal">Add Player</button>
            </div>
        </div>
        <player-list :players="team.players" @updated="updatedPlayer"></player-list>
        <portal-target name="modals" multiple></portal-target>
        <portal to="modals">
            <transition name="fade">
                <div v-if="addingPlayer" class="fixed inset-0 flex items-center z-10">
                    <div class="fixed inset-0 bg-gray-700 opacity-75 z-20"></div>

                    <div class="relative mx-6 md:mx-auto w-full md:w-1/2 lg:w-1/3 z-20 m-8">
                        <add-player-form :team="team" @cancel="hideModal" @submit="addedPlayer"></add-player-form>
                    </div>
                </div>
            </transition>
        </portal>
    </div>
</template>
<script>
    export default {
        data: () => ({
            team: {players:[]},
            loading: true,
            addingPlayer: false,
        }),
        created() {
            this.getTeam(this.$route.params.id);
        },
        methods: {
            getTeam(id) {
                this.loading = true;
                axios.get(`/api/teams/${id}/players`, { headers: { Authorization: `Bearer ${window.token}` }})
                    .then( ({ data }) => {
                        this.team = data;
                        this.loading = false;
                    });
            },
            showModal() {
                this.addingPlayer = true;
            },
            hideModal() {
                this.addingPlayer = false;
            },
            addedPlayer() {
                this.addingPlayer = false;
                this.getTeam(this.$route.params.id);
            },
            updatedPlayer() {
                this.getTeam(this.$route.params.id);
            }

        }
    }
</script>
<style>
    .fade-enter-active, .fade-leave-active {
        transition: all .3s;
        /*transition: all .3s ease;*/
    }
    .fade-enter /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
        transform: scale(1.05) translateY(30px);
    }
    .fade-leave-to {
        opacity: 0;
        transform: scale(1.05) translateY(-30px);
    }
</style>
