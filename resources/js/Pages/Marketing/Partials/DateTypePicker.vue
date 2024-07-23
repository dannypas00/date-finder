<template>
  <div class="mx-auto flex justify-center max-w-7xl px-6 lg:px-8">
    <div class="mt-20 flow-root">
      <div
        class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 divide-y divide-gray-100 sm:mx-auto md:-mx-8 md:max-w-none md:grid-cols-3 md:divide-x md:divide-y-0 lg:mt-0 xl:-mx-4"
      >
        <div
          v-for="tier in tiers"
          :key="tier.id"
          class="align-content-center flex flex-col gap-4 pt-16 text-center text-gray-900 md:px-8 md:pt-0 xl:px-14"
        >
          <div>
            <Component class="h-auto w-14" :is="tier.icon" />
          </div>
          <h3 :id="tier.id" class="text-base font-semibold leading-7">
            {{ tier.name }}
          </h3>
          <a
            :href="tier.href"
            :aria-describedby="tier.id"
            class="block rounded-md bg-brand px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-brand-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
          >
            {{
              $t('pages.homepage.date_type_picker.pick_date_button', {
                date: tier.name,
              })
            }}
          </a>
          <p class="text-sm font-semibold leading-6">{{ tier.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import I18n from '../../../i18n';
import RecurringDatesIcon from '../../../Components/Icons/RecurringDatesIcon.vue';
import MultipleDatesIcon from '../../../Components/Icons/MultipleDatesIcon.vue';
import SingleDateIcon from '../../../Components/Icons/SingleDateIcon.vue';

const tiers = [
  {
    name: I18n.global.t('pages.homepage.types.single.name'),
    description: I18n.global.t('pages.homepage.types.single.description'),
    id: 'single',
    href: route('date-picker.single') as string,
    icon: SingleDateIcon,
  },
  {
    name: I18n.global.t('pages.homepage.types.multiple.name'),
    description: I18n.global.t('pages.homepage.types.multiple.description'),
    id: 'multiple',
    href: route('date-picker.multiple') as string,
    icon: MultipleDatesIcon,
  },
  {
    name: I18n.global.t('pages.homepage.types.recurring.name'),
    description: I18n.global.t('pages.homepage.types.recurring.description'),
    id: 'recurring',
    href: route('date-picker.recurring') as string,
    icon: RecurringDatesIcon,
  },
];
</script>
