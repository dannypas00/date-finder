<template>
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mt-20 flow-root">
      <div class="isolate -mt-16 grid max-w-sm grid-cols-1 gap-y-16 divide-y divide-gray-100 sm:mx-auto lg:-mx-8 lg:mt-0 lg:max-w-none lg:grid-cols-3 lg:divide-x lg:divide-y-0 xl:-mx-4">
        <div
          v-for="tier in tiers"
          :key="tier.id"
          class="pt-16 lg:px-8 lg:pt-0 xl:px-14 flex gap-4 flex-col justify-center text-center"
        >
          <FontAwesomeIcon class="w-12 h-12" :icon="tier.icon"/>
          <h3 :id="tier.id" class="text-base font-semibold leading-7 text-gray-900">{{ tier.name }}</h3>
          <a
            :href="tier.href"
            :aria-describedby="tier.id"
            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
          >
            {{ $t('pages.homepage.date_type_picker.pick_date_button', { date: tier.name }) }}
          </a>
          <p class="text-sm font-semibold leading-6 text-gray-900">{{ tier.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const tiers = [
  {
    name: 'Single Date',
    id: 'single',
    href: '#',
    description: 'Everything necessary to get started.',
    icon: ['far', 'calendar'],
  },
  {
    name: 'Multiple Dates',
    id: 'multiple',
    href: '#',
    description: 'Everything in Basic, plus essential tools for growing your business.',
    icon: ['far', 'calendar-days'],
  },
  {
    name: 'Recurring Dates',
    id: 'recurring',
    href: '#',
    description: 'Everything in Essential, plus collaboration tools and deeper insights.',
    icon: ['far', 'clock'],
  },
];
</script>
