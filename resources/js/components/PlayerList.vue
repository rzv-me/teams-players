<template>
    <div>
        <table class="text-left w-full border-collapse">
            <tbody>
                <player v-for="player in players" :player="player" :key="player.id" @updated="updated"></player>
            </tbody>
        </table>
        <div class="w-full text-center bg-gray-300 text-gray-700 text-xs py-2">{{ playersCountFooter }}</div>
    </div>
</template>
<script>
    export default {
        props: ['players'],
        computed: {
            playersCountFooter() {
                return this.players.length + " player(s)";
            }
        },
        methods: {
            updated() {
                this.$emit("updated");
            }

        }

    }
</script>
