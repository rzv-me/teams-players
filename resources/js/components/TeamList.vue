<template>
    <div class="w-1/3">
        <h2 class="py-2">Teams</h2>
        <div class="bg-white rounded-lg shadow-lg my-6 overflow-hidden">
            <div v-if="loading" class="text-gray-500 py-8">
                <loading></loading>
            </div>
            <div v-else>
                <table class="text-left w-full border-collapse">
                    <tbody>
                        <tr v-for="team in teams" class="hover:bg-gray-100">
                            <td class="py-4 px-6 border-b border-gray-200">{{team.name}}</td>
                            <td class="py-4 px-6 border-b border-gray-200 text-right">
                                <router-link :to="'/teams/'+team.id" class="no-underline text-gray-200 font-regular py-2 px-4 rounded text-sm bg-blue-500 hover:bg-blue-700">View</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="w-full text-center bg-gray-300 text-gray-700 text-xs py-2">{{ teamsCountFooter }}</div>
            </div>

        </div>
    </div>
</template>
<script>
    export default {
        data: () => ({
            loading: true,
            teams: [],
        }),
        created() {
            this.getTeams();
        },
        computed: {
            teamsCountFooter() {
                return this.teams.length + " team(s)";
            }
        },
        methods: {
            getTeams() {
                this.loading = true;
                axios.get("/api/teams", { headers: { Authorization: `Bearer ${window.token}` }})
                    .then( ({ data }) => {
                        this.teams = data;
                        this.loading = false;
                    });
            }
        }
    }
</script>
<style>

</style>
