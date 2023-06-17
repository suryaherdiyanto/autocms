<script setup lang="ts">
import TableLoading from './Table/TableLoading.vue';
import { computed, defineProps, withDefaults } from 'vue';

interface Table {
    items: Array<object>,
    headings: Array<string>,
    isLoading: boolean
}

const props = withDefaults(defineProps<Table>(), {
    items: () => [],
    headings: () => [],
    isLoading: false
});

const tableData = computed(() => {
    return props.items;
});
const tableHeadings = computed(() => {
    if (props.items.length > 0 && props.headings.length === 0) {
        return Object.keys(props.items[0]);
    }

    return props.headings;
});

const styles = computed(() => {
    return { 'h-64': props.isLoading };
});

function uppercaseWord(text: string) {
    return text.split('_').map((item: string) => {
        return item.charAt(0).toUpperCase() + item.slice(1);
    }).join(' ');
}
</script>

<template>
<div :class="styles" class="flex flex-col relative">
  <div class="-m-1.5 overflow-x-auto">
    <div class="p-1.5 min-w-full inline-block align-middle">
    <Transition name="fadeOut">
        <TableLoading v-if="isLoading" />
    </Transition>
      <div class="overflow-hidden">
        <Transition name="fadeIn">
            <table v-show="!isLoading" :class="styles" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th scope="col" v-for="(heading,index) in tableHeadings" :key="index" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                            {{ uppercaseWord(heading) }}
                        </th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr v-for="(item, index) in tableData" :key="index"  class="odd:bg-white even:bg-gray-100">
                        <td v-for="(heading,key) in tableHeadings" :key="key" class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">{{ item[heading] }}</td>
                    </tr>
                </tbody>
            </table>
        </Transition>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>
.fadeOut-enter-active,
.fadeOut-leave-active{
  transition: opacity 0.35s ease-out;
}

.fadeIn-enter-active, .fadeIn-leave-active {
    transition: opacity 0.400s ease-in;
    transition-delay: 100ms;
}

.fadeIn-enter-from {
    opacity: .12;
}
.fadeIn-leave-to {
  opacity: 1;
}

.fadeOut-enter-from {
    opacity: 1;
}
.fadeOut-leave-to {
  opacity: 0;
}
</style>