<script setup>
import { ref, onMounted } from 'vue';
import { useWMO } from "@/composables/useWMO.js";
import IconBox from "@/components/IconBox.vue";
import UserModal from "@/components/UserModal.vue";

const { getDescription } = useWMO();

const showModal = ref(false);
const selectedUser = ref({});
const users = ref([]);
const index = new Date().getHours();

onMounted(() => {
  fetchData();
})

const fetchData = async () => {
  const url = 'http://localhost/'
  let data = await (await fetch(url)).json()

  users.value = data.users;
}
const openModal = (user) => {
  selectedUser.value = user;
  showModal.value = true;
}
const closeModal = () => {
  showModal.value = false;
}
</script>

<template>
  <div class="mx-auto">
    <div v-if="!users.length">
      Fetching users
    </div>

    <template v-for="user in users" :key="user.id">
      <div class="max-w-md p-3 mx-auto mb-3 border-2 border-gray-100 cursor-pointer hover:border-gray-300"
        @click="openModal(user)">
        <div class="mb-3">
          <div class="font-bold">{{ user.name }}</div>
          <div class="text-sm font-normal">{{ getDescription(user.weather_report.report.hourly.weathercode[index])
          }}</div>
        </div>
        <div class="flex justify-between">
          <IconBox>
            <template #icon>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3" viewBox="0 0 384 512">
                <path
                  d="M192 512C86 512 0 426 0 320C0 228.8 130.2 57.7 166.6 11.7C172.6 4.2 181.5 0 191.1 0h1.8c9.6 0 18.5 4.2 24.5 11.7C253.8 57.7 384 228.8 384 320c0 106-86 192-192 192zM96 336c0-8.8-7.2-16-16-16s-16 7.2-16 16c0 61.9 50.1 112 112 112c8.8 0 16-7.2 16-16s-7.2-16-16-16c-44.2 0-80-35.8-80-80z" />
              </svg>
            </template>
            {{ user.weather_report.report.hourly.rain[index] }}{{ user.weather_report.report.hourly_units.rain }}
          </IconBox>
          <IconBox>
            <template #icon>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-3">
                <path
                  d="M224 0c17.7 0 32 14.3 32 32V62.1l15-15c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-49 49v70.3l61.4-35.8 17.7-66.1c3.4-12.8 16.6-20.4 29.4-17s20.4 16.6 17 29.4l-5.2 19.3 23.6-13.8c15.3-8.9 34.9-3.7 43.8 11.5s3.8 34.9-11.5 43.8l-25.3 14.8 21.7 5.8c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17l-67.7-18.1L287.5 256l60.9 35.5 67.7-18.1c12.8-3.4 26 4.2 29.4 17s-4.2 26-17 29.4l-21.7 5.8 25.3 14.8c15.3 8.9 20.4 28.5 11.5 43.8s-28.5 20.4-43.8 11.5l-23.6-13.8 5.2 19.3c3.4 12.8-4.2 26-17 29.4s-26-4.2-29.4-17l-17.7-66.1L256 311.7v70.3l49 49c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V449.9l-15 15c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l49-49V311.7l-61.4 35.8-17.7 66.1c-3.4 12.8-16.6 20.4-29.4 17s-20.4-16.6-17-29.4l5.2-19.3L48.1 395.6c-15.3 8.9-34.9 3.7-43.8-11.5s-3.7-34.9 11.5-43.8l25.3-14.8-21.7-5.8c-12.8-3.4-20.4-16.6-17-29.4s16.6-20.4 29.4-17l67.7 18.1L160.5 256 99.6 220.5 31.9 238.6c-12.8 3.4-26-4.2-29.4-17s4.2-26 17-29.4l21.7-5.8L15.9 171.6C.6 162.7-4.5 143.1 4.4 127.9s28.5-20.4 43.8-11.5l23.6 13.8-5.2-19.3c-3.4-12.8 4.2-26 17-29.4s26 4.2 29.4 17l17.7 66.1L192 200.3V129.9L143 81c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l15 15V32c0-17.7 14.3-32 32-32z" />
              </svg>
            </template>
            {{ user.weather_report.report.hourly.snowfall[index] }}{{ user.weather_report.report.hourly_units.snowfall }}
          </IconBox>
          <IconBox>
            <template #icon>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-3">
                <path
                  d="M144 64c-26.5 0-48 21.5-48 48V276.5c0 17.3-7.1 31.9-15.3 42.5C70.2 332.6 64 349.5 64 368c0 44.2 35.8 80 80 80s80-35.8 80-80c0-18.5-6.2-35.4-16.7-48.9c-8.2-10.6-15.3-25.2-15.3-42.5V112c0-26.5-21.5-48-48-48zM32 112C32 50.2 82.1 0 144 0s112 50.1 112 112V276.5c0 .1 .1 .3 .2 .6c.2 .6 .8 1.6 1.7 2.8c18.9 24.4 30.1 55 30.1 88.1c0 79.5-64.5 144-144 144S0 447.5 0 368c0-33.2 11.2-63.8 30.1-88.1c.9-1.2 1.5-2.2 1.7-2.8c.1-.3 .2-.5 .2-.6V112zM192 368c0 26.5-21.5 48-48 48s-48-21.5-48-48c0-20.9 13.4-38.7 32-45.3V208c0-8.8 7.2-16 16-16s16 7.2 16 16V322.7c18.6 6.6 32 24.4 32 45.3z" />
              </svg>
            </template>
            {{ user.weather_report.report.hourly.temperature_2m[index] }}{{
              user.weather_report.report.hourly_units.temperature_2m }}
          </IconBox>
          <IconBox>
            <template #icon>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-3">
                <path
                  d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
              </svg>
            </template>
            {{ user.weather_report.report.hourly.visibility[index] }}{{ user.weather_report.report.hourly_units.visibility
            }}
          </IconBox>
        </div>
      </div>

    </template>
  </div>
  <UserModal :user="selectedUser" :showModal="showModal" :index="index" @close="closeModal" />
</template>