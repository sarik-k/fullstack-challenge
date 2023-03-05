<script setup lang="ts">
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <div class="mx-3">
    <header>
      <div class="wrapper">
        <nav class="flex justify-center py-3">
          <RouterLink to="/">Home</RouterLink>
        </nav>
      </div>
    </header>
    <RouterView />
  </div>
</template>

<style scoped>

</style>
