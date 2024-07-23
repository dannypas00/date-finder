<template>
  <div class="px-2 md:px-8 lg:px-14 xl:px-24">
    <MonthViewCalendar />
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import UnauthenticatedLayout from '../../Layouts/UnauthenticatedLayout.vue';
import MonthViewCalendar from './Partials/MonthViewCalendar.vue';

export default defineComponent({
  components: { MonthViewCalendar },
  layout: UnauthenticatedLayout,
});
</script>
