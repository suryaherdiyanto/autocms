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
    <div :class="styles" class="relative">
        <Transition name="fadeOut">
            <TableLoading v-if="isLoading" />
        </Transition>
        <Transition name="fadeIn">
            <table v-show="!isLoading" :class="styles" class="w-full table-auto">
                <thead class="text-sm font-semibold border-y border-y-gray-200">
                    <tr>
                        <td v-for="(heading,index) in tableHeadings" :key="index" class="py-2">
                            {{ uppercaseWord(heading) }}
                        </td>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr v-for="(item, index) in tableData" :key="index" :class="(index%2 === 0) ? {'bg-gray-200': true}:{'bg-gray-200': false}" class="border-b border-b-gray-200">
                        <td v-for="(heading,key) in tableHeadings" :key="key" class="py-2 px-1">{{ item[heading] }}</td>
                    </tr>
                </tbody>
            </table>
        </Transition>
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