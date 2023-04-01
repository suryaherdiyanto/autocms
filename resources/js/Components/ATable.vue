<template>
    <table class="w-full table-auto">
        <table class="w-full table-auto">
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
    </table>
</template>

<script>
import { reactive } from 'vue';

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
        }
    },
    setup(props) {
        const table = reactive({
            headings: [],
            data: []
        });

        if (props.headings.length === 0) {
            table.headings = Object.keys(props.items[0]);
        }

        table.data.push(...props.items);

        function uppercaseWord(text) {
            return text.split('_').map((item) => {
                return item.charAt(0).toUpperCase() + item.slice(1);
            }).join(' ');
        }

        return { table, uppercaseWord }
    },
}
</script>