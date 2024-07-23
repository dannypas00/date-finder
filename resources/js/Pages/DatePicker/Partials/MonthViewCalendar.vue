<template>
  <div class="lg:flex lg:h-full lg:flex-col">
    <header
      class="flex items-center justify-between border-b border-gray-200 px-6 py-4 lg:flex-none"
    >
      <h1 class="text-base font-semibold leading-6 text-gray-900">
        <time :datetime="moment().year(year).month(month).format('MMMM YYYY')">
          {{ moment().year(year).month(month).format('MMMM YYYY') }}
        </time>
      </h1>
      <div class="flex items-center">
        <!-- Month buttons -->
        <div
          class="relative flex items-center rounded-md bg-white shadow-sm md:items-stretch"
        >
          <button
            type="button"
            class="flex h-9 w-12 items-center justify-center rounded-l-md border-y border-l border-gray-300 pr-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pr-0 md:hover:bg-gray-50"
            @click="setMonth(month - 1)"
          >
            <span class="sr-only">{{
              $t('components.month_view.previous_month')
            }}</span>
            <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
          </button>

          <button
            type="button"
            class="hidden border-y border-gray-300 px-3.5 text-sm font-semibold text-gray-900 hover:bg-gray-50 focus:relative md:block"
            @click="setToday"
          >
            {{ $t('components.month_view.go_to_today') }}
          </button>

          <span class="relative -mx-px h-5 w-px bg-gray-300 md:hidden" />
          <button
            type="button"
            class="flex h-9 w-12 items-center justify-center rounded-r-md border-y border-r border-gray-300 pl-1 text-gray-400 hover:text-gray-500 focus:relative md:w-9 md:pl-0 md:hover:bg-gray-50"
            @click="setMonth(month + 1)"
          >
            <span class="sr-only">{{
              $t('components.month_view.next_month')
            }}</span>
            <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
          </button>
        </div>

        <!-- Type menu -->
        <div class="hidden md:ml-4 md:flex md:items-center">
          <Menu as="div" class="relative">
            <MenuButton
              type="button"
              class="flex items-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
            >
              Month view
              <ChevronDownIcon
                class="-mr-1 h-5 w-5 text-gray-400"
                aria-hidden="true"
              />
            </MenuButton>

            <transition
              enter-active-class="transition ease-out duration-100"
              enter-from-class="transform opacity-0 scale-95"
              enter-to-class="transform opacity-100 scale-100"
              leave-active-class="transition ease-in duration-75"
              leave-from-class="transform opacity-100 scale-100"
              leave-to-class="transform opacity-0 scale-95"
            >
              <MenuItems
                class="absolute right-0 z-10 mt-3 w-36 origin-top-right overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
              >
                <div class="py-1">
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Day view</a
                    >
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Week view</a
                    >
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Month view</a
                    >
                  </MenuItem>
                  <MenuItem v-slot="{ active }">
                    <a
                      href="#"
                      :class="[
                        active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                        'block px-4 py-2 text-sm',
                      ]"
                      >Year view</a
                    >
                  </MenuItem>
                </div>
              </MenuItems>
            </transition>
          </Menu>
          <div class="ml-6 h-6 w-px bg-gray-300" />
          <button
            type="button"
            class="ml-6 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
          >
            Add event
          </button>
        </div>
        <Menu as="div" class="relative ml-6 md:hidden">
          <MenuButton
            class="-mx-2 flex items-center rounded-full border border-transparent p-2 text-gray-400 hover:text-gray-500"
          >
            <span class="sr-only">Open menu</span>
            <EllipsisHorizontalIcon class="h-5 w-5" aria-hidden="true" />
          </MenuButton>

          <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
          >
            <MenuItems
              class="absolute right-0 z-10 mt-3 w-36 origin-top-right divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            >
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Create event</a
                  >
                </MenuItem>
              </div>
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Go to today</a
                  >
                </MenuItem>
              </div>
              <div class="py-1">
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Day view</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Week view</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Month view</a
                  >
                </MenuItem>
                <MenuItem v-slot="{ active }">
                  <a
                    href="#"
                    :class="[
                      active ? 'bg-gray-100 text-gray-900' : 'text-gray-700',
                      'block px-4 py-2 text-sm',
                    ]"
                    >Year view</a
                  >
                </MenuItem>
              </div>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </header>
    <div
      class="shadow ring-1 ring-black ring-opacity-5 lg:flex lg:flex-auto lg:flex-col"
    >
      <!-- Day of week header -->
      <div
        class="grid grid-cols-7 gap-px border-b border-gray-300 bg-gray-200 text-center text-xs font-semibold leading-6 text-gray-700 lg:flex-none"
      >
        <div class="bg-white py-2" v-for="day in 7">
          <span class="sr-only sm:not-sr-only">
            {{
              moment()
                .day(day - 1)
                .format('dddd')
            }}
          </span>
          <span class="not-sr-only sm:hidden">
            {{
              moment()
                .day(day - 1)
                .format('dddd')
                .substring(0, 1)
            }}
          </span>
        </div>
      </div>

      <!-- Desktop dates -->
      <div
        class="flex bg-gray-200 text-xs leading-6 text-gray-700 lg:flex-auto"
      >
        <div
          class="hidden w-full lg:grid lg:grid-cols-7 lg:grid-rows-6 lg:gap-px"
        >
          <button
            v-for="day in days"
            :key="day.date.toISOString()"
            :class="{
              'bg-white': day.isCurrentMonth,
              'bg-blue-50 text-brand-light': isCurrent(day),
              'font-semibold': isCurrent(day) || day.isToday,
              'text-indigo-600': !isCurrent(day) && day.isToday,
              'text-gray-900':
                !isCurrent(day) && day.isCurrentMonth && day.isToday,
              'text-gray-500':
                !isCurrent(day) && !day.isCurrentMonth && !day.isToday,
            }"
            class="flex h-20 flex-col px-3 py-2 hover:bg-gray-100 focus:z-10"
            @click="current = day"
          >
            <time
              :datetime="day.date.toISOString()"
              :class="
                day.isToday
                  ? 'flex h-6 w-6 items-center justify-center rounded-full bg-indigo-600 font-semibold text-white'
                  : undefined
              "
              >{{ day.date.date() }}
            </time>
          </button>
        </div>

        <!-- Mobile dates -->
        <div
          class="isolate grid w-full grid-cols-7 grid-rows-6 gap-px lg:hidden"
        >
          <button
            v-for="day in days"
            :key="day.date.toISOString()"
            type="button"
            :class="{
              'bg-white': day.isCurrentMonth,
              'text-brand-light': isCurrent(day),
              'font-semibold': isCurrent(day) || day.isToday,
              'text-indigo-600': !isCurrent(day) && day.isToday,
              'text-gray-900':
                !isCurrent(day) && day.isCurrentMonth && day.isToday,
              'text-gray-500':
                !isCurrent(day) && !day.isCurrentMonth && !day.isToday,
            }"
            class="flex h-14 flex-col px-3 py-2 hover:bg-gray-100 focus:z-10"
            @click="current = day"
          >
            <time
              :datetime="day.date.toISOString()"
              :class="[
                day === current &&
                  'flex h-6 w-6 items-center justify-center rounded-full',
                day === current && day.isToday && 'bg-indigo-600',
                day === current && !day.isToday && 'bg-gray-900',
                'ml-auto',
              ]"
              >{{ day.date.date() }}
            </time>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import {
  ChevronDownIcon,
  ChevronLeftIcon,
  ChevronRightIcon,
  EllipsisHorizontalIcon,
} from '@heroicons/vue/20/solid';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue';
import moment, { Moment } from 'moment';
import { computed, ComputedRef, nextTick, ref, Ref } from 'vue';

type CalendarDay = {
  date: Moment;
  isCurrentMonth: boolean;
  isToday: boolean;
};

const year: Ref<number> = ref(moment().year());
const month: Ref<number> = ref(moment().month());

const days: ComputedRef<CalendarDay[]> = computed(() => {
  let days: CalendarDay[] = [];
  const startOfMonth = moment()
    .clone()
    .year(year.value)
    .month(month.value)
    .startOf('month');

  // Calendar starts at first day of first week of the month, even if that day is in the previous month
  let current = startOfMonth.clone().startOf('week');

  console.log(startOfMonth.toLocaleString());

  // 42 days in 6 weeks
  for (let i = 0; i < 42; i++) {
    days.push({
      date: current.clone(),
      isCurrentMonth: current.month() === month.value,
      isToday: current.toDate() == new Date(),
    });
    current.add(1, 'day');
  }
  return days;
});

const current: Ref<CalendarDay> = ref(getToday());

function isCurrent(day: CalendarDay): boolean {
  return current.value?.date?.toISOString() === day.date.toISOString();
}

function setMonth(newMonth: number): void {
  if (newMonth > 11) {
    month.value = 0;
    year.value += 1;
    return;
  }
  if (newMonth < 0) {
    month.value = 11;
    year.value -= 1;
    return;
  }

  month.value = newMonth;
}

function setToday(): void {
  month.value = moment().month();
  year.value = moment().year();
  nextTick().then(() => {
    current.value = getToday();
  });
}

function getToday(): CalendarDay {
  const today = moment().toDate().toDateString();
  return days.value.find(day => day.date.toDate().toDateString() === today);
}
</script>
