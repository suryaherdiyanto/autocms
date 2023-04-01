<template>
    <div :class="styles" class="relative">
        <table-loading v-if="isLoading"></table-loading>
        <table v-if="!isLoading" :class="styles" class="w-full table-auto">
            <thead class="text-sm font-semibold border-y border-y-gray-200">
                <tr>
                    <td v-for="(heading,index) in table.headings" :key="index" class="py-2">
                        {{ uppercaseWord(heading) }}
                    </td>
                </tr>
            </thead>
            <tbody class="text-sm">
                <tr v-for="(item, index) in table.data" :key="index" :class="(index%2 === 0) ? {'bg-gray-200': true}:{'bg-gray-200': false}" class="border-b border-b-gray-200">
                    <td v-for="(heading,key) in table.headings" :key="key" class="py-2 px-1">{{ item[heading] }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import TableLoading from './Table/TableLoading.vue';
import { reactive,computed,watch } from 'vue';

export default {
    props: {
        items: {
            type: Array,
            default: () => {
                return [];
            },
            required: true
        },
        headings: {
            type: Array,
            default: () => {
                return [];
            }
        },
        isLoading: {
            type: Boolean,
            default: false
        }
    },
    components: {
        TableLoading
    },
    setup(props) {
        const table = reactive({
            headings: [],
            data: props.items
        });
        const styles = computed(() => {
            return { 'h-32': props.isLoading };
        });
        watch(table.data, () => {
            if (table.headings.length === 0 && table.data.length > 0) {
                table.headings = Object.keys(table.data[0]);
            }
        });

        function uppercaseWord(text) {
            return text.split('_').map((item) => {
                return item.charAt(0).toUpperCase() + item.slice(1);
            }).join(' ');
        }

        return { table, uppercaseWord, styles }
    },
}
</script>