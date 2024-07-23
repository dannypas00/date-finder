<template>
  <FormInput
    id="duration"
    :label="$t('components.time_picker.duration.label')"
    :explanation="$t('components.time_picker.duration.explanation')"
    :placeholder="$t('components.time_picker.duration.placeholder')"
    v-model="duration"
  />

  <FormInput
    id="start"
    :label="$t('components.time_picker.start.label')"
    :placeholder="$t('components.time_picker.start.placeholder')"
    type="time"
    v-model="start"
  />

</template>

<script setup lang="ts">
import FormInput from '../../../Components/Form/FormInput.vue';
import { Ref, ref } from 'vue';

const duration: Ref<null | number> = ref(null);
const start: Ref<null | Date> = ref(null);
</script>
