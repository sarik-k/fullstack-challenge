<script setup>
import { useWMO } from "@/composables/useWMO.js";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from '@headlessui/vue'

const props = defineProps({
    user: Object,
    showModal: Boolean,
    index: Number
})

const emit = defineEmits(['close'])

const closeModal = () => {
    emit('close')
}

const { getDescription } = useWMO();


</script>

<template>
    <TransitionRoot appear :show="showModal" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100"
                leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div class="flex items-center justify-center min-h-full p-4 text-center">
                    <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100" leave="duration-200 ease-in" leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95">
                        <DialogPanel
                            class="w-full max-w-md p-6 overflow-hidden text-left align-middle transition-all transform bg-white shadow-xl rounded-2xl">
                            <DialogTitle as="h3" class="text-lg font-medium leading-6 text-gray-900">
                                {{ user.name }} <br>
                                <span class="text-sm">{{
                                    getDescription(user.weather_report.report.hourly.weathercode[index]) }}</span>
                            </DialogTitle>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                <div><span class="font-bold">Rain: </span> {{ user.weather_report.report.hourly.rain[index]
                                }}{{
    user.weather_report.report.hourly_units.rain }}</div>
                                <div><span class="font-bold">Snowfall: </span> {{
                                    user.weather_report.report.hourly.snowfall[index] }}{{
        user.weather_report.report.hourly_units.snowfall }}</div>
                                <div><span class="font-bold">Temperature: </span> {{
                                    user.weather_report.report.hourly.temperature_2m[index] }}{{
        user.weather_report.report.hourly_units.temperature_2m }}</div>
                                <div><span class="font-bold">Visibility: </span> {{
                                    user.weather_report.report.hourly.visibility[index] }}{{
        user.weather_report.report.hourly_units.visibility }}</div>
                                </p>
                            </div>

                            <div class="mt-4">
                                <button type="button"
                                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-blue-900 bg-blue-100 border border-transparent rounded-md hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    @click="closeModal">
                                    Close
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>    