<template>
    <tr class="hover:bg-grey-lighter">
        <td class="py-2 px-6 border-b border-grey-lighter">{{player.first_name}} {{player.last_name}}</td>
        <td class="py-2 px-6 border-b border-grey-lighter text-right">
            <!--<a href="#" class="no-underline text-grey-lighter font-regular py-2 px-4 rounded text-sm bg-green hover:bg-green-dark">Edit</a>-->
            <button type="button" @click="showModal" class="no-underline text-grey-lighter font-regular py-2 px-4 rounded text-sm bg-blue hover:bg-blue-dark">Edit</button>
        </td>
        <!--<portal to="modals">-->
            <transition name="fade">
                <div v-if="editing" class="fixed pin flex items-center z-10">
                    <div class="fixed pin bg-grey-dark opacity-75 z-20"></div>

                    <div class="relative mx-6 md:mx-auto w-full md:w-1/2 lg:w-1/3 z-20 m-8">
                        <edit-player-form :player="player" @cancel="hideModal" @submit="saved"></edit-player-form>
                    </div>
                </div>
            </transition>
        <!--</portal>-->
    </tr>
</template>
<script>
    export default {
        props: ['player'],
        data: () => ({
            editing: false,
        }),
        methods: {
            showModal() {
                this.editing = true;
            },
            hideModal() {
                this.editing = false;
            },
            saved() {
                this.editing = false;
                this.$emit('updated');
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