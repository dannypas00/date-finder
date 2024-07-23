<template>
  <PageHeader
    :header="$t('pages.pick_single_date.header')"
    :title="$t('pages.pick_single_date.title')"
  />

  <div class="px-2 md:px-8 lg:px-14 xl:px-24">
    <MonthViewCalendar v-if="!date" @date-picked="onDateSelect" />
    <TimePicker v-else-if="!time" />
  </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import UnauthenticatedLayout from '../../Layouts/UnauthenticatedLayout.vue';
import MonthViewCalendar from './Partials/MonthViewCalendar.vue';
import PageHeader from '../../Components/Layout/PageHeader.vue';
import TimePicker from './Partials/TimePicker.vue';

export default defineComponent({
  components: {
    TimePicker,
    PageHeader,
    MonthViewCalendar,
  },

  layout: UnauthenticatedLayout,

  data() {
    return {
      // TODO: Set to undefined again when done with debugging
      date: new Date() as Date | undefined,
      time: undefined as Date | undefined,
      // date: undefined as Date | undefined,
      // time: undefined as Date | undefined,
    };
  },

  methods: {
    onDateSelect(date: Date) {
      this.date = date;
    },
  },

  computed: {
    dateTime() {
      return new Date(this.date).setTime(this.time?.getTime());
    },
  },
});
</script>
