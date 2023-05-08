<script setup lang="ts">
import { computed, ref, onMounted, reactive, defineProps, withDefaults, defineEmits } from 'vue';

interface Item {
    key: string|number,
    value: string|number
}

interface Props {
    name: string,
    label: string,
    modelValue: Item|Array<Item>
    filterable: boolean,
    multiple: boolean,
    keyValue: string,
    items: Array<string>,
    placeholder: string,
    errorMessage: string
}

const props = withDefaults(defineProps<Props>(), {
    multiple: false,
    filterable: false,
    placeholder: 'Selected Items...'
});
const emit = defineEmits<{
    (e: 'update:modelValue', value: Item|Array<Item>): void
}>()

const search = ref<string>('');
const selectItems = reactive([]);
const selectedItem = ref<Item>(null);
const selectedItems = reactive<Array<Item>>([]);
const selectPosition = ref<number>(-1);
const showItems = ref<boolean>(false);

const selectFilter = ref(null);
const selectWrap = ref(null);

const filteredItems = computed(() => {
    if (search.value === '') {
        return selectItems;
    }

    return selectItems.filter((item) => {
        return item.value.toLowerCase().indexOf(search.value.toLowerCase()) >= 0;
    });
});

function selectItem($event: KeyboardEvent) {
    if (selectPosition.value > -1) {
        selectItems[selectPosition.value].selected = false;
    }

    if ($event.code === 'ArrowDown' || $event.keyCode === 40) {
        if (selectPosition.value === selectItems.length-1) {
            return;
        }

        selectPosition.value += 1;
        if (selectItems[selectPosition.value]) {
            selectItems[selectPosition.value].selected = true;
        }
    }

    if ($event.code === 'ArrowUp' || $event.keyCode === 38) {

        if (selectPosition.value === -1) {
            return;
        }

        selectPosition.value -= 1;
        if (selectItems[selectPosition.value]) {
            selectItems[selectPosition.value].selected = true;
        }
    }
}

function chooseItem(item: Item) {

    if (props.multiple) {
        const itemKey = selectedItems.findIndex(i => i.key === item.key);

        if (itemKey === -1) {
            selectedItems.push(item);
        }
    } else {
        selectedItem.value = item;
    }

    selectPosition.value = -1;

    if (!props.multiple || props.filterable) {
        deactivate();
        selectWrap.value.blur();
    }

    emit('update:modelValue', (props.multiple) ? selectedItems : selectedItem.value);
}

function populateItems() {
    props.items.forEach((item) => {

        if (typeof(item) === "object") {
            selectItems.push({ key: props.keyValue, value: props.items[props.keyValue] });
        } else {
            selectItems.push({ key: item, value: item });
        }
    });
}

function deactivate() {

    if (selectFilter.value) {
        selectFilter.value.blur();
    }

    showItems.value = false;
}

function activate() {

    if (props.filterable && selectFilter.value) {
        selectFilter.value.focus();
    }

    showItems.value = true;
}

function removeItem(item: Item) {
    const itemIndex = selectedItems.findIndex(i => i.key === item.key);
    selectedItems.splice(itemIndex, 1);
}

onMounted(() => {
    populateItems();
});
</script>

<template>
    <div
        @blur="filterable ? false:deactivate()"
        @click="activate()"
        @focus="activate()"
        @keyup.esc="deactivate()"
        class="relative outline-none"
        :tabindex="0"
        ref="selectWrap"
    >
        <label :for="name" class="text-sm font-bold font-cairo">{{ label }}</label>
        <div
            :id="name"
            class="w-full p-1.5 border border-gray-400 rounded group-focus:shadow group-focus:border-2 group-focus:border-accent-primary hover:border-accent-primary "
        >
            <span v-if="selectedItems.length === 0 && !selectedItem" class="text-gray-400 text-sm">{{ placeholder }}</span>
            <span v-for="(item, key) in selectedItems" :key="key" class="mr-1 bg-blue-500 text-white inline-block px-1 py-0.5 text-xs font-medium rounded">
                {{ item.value }} <a @click.prevent="removeItem(item)" href="#" class="ml-0.5">&times;</a>
            </span>
            <span class="text-sm font-semibold" v-if="selectedItem && !multiple">{{ selectedItem.value }}</span>
            <span
                class="flex justify-center items-center relative right-1.5 w-5 h-5 transition-transform duration-200 float-right text-gray-400"
                :class="{showItems, 'transform': showItems, 'rotate-180': showItems}"
                >
                <i class="fa-solid fa-caret-down"></i>
            </span>
        </div>

        <div v-show="showItems"
            @blur="!filterable ? false:deactivate()"
            class="w-full max-h-52 mt-1.5 bg-white border shadow-lg overflow-y-auto absolute rounded-md"
        >
            <ul class="w-full">
                <li class="p-2">
                    <input
                        @focus.prevent="activate()"
                        @blur.prevent="deactivate()"
                        @keyup.esc="deactivate()"
                        @keyup.prevent.up="selectItem"
                        @keyup.prevent.down="selectItem"
                        v-if="filterable"
                        v-model="search"
                        ref="selectFilter"
                        class="w-full h-8 p-3 border border-gray-400 rounded text-sm font-semibold focus:outline-none"
                        placeholder="Search...."
                        :class="{'border-gray-400': !errorMessage, 'border-red-400': errorMessage}"
                    >
                </li>
                <li
                    v-for="(item,index) in filteredItems"
                    @click.stop="chooseItem(item)"
                    :key="index"
                    class="block text-sm cursor-pointer py-1 px-2 hover:bg-gray-200"
                    :class="{ 'bg-gray-200': (selectedItems.findIndex(i => i.key === item.key) >= 0) }"
                >
                    {{ item.value }}
                </li>
            </ul>
        </div>
    </div>

</template>

<style scoped>
.custom-border-color::before {
    border-color: #9CA3AF transparent;
}
</style>