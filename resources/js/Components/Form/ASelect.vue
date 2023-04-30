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
            class="w-full h-8 p-1.5 font-sm border border-gray-400 rounded group-focus:shadow group-focus:border-2 group-focus:border-accent-primary hover:border-accent-primary "
        >
            <span v-if="!modelValue" class="text-gray-400 text-sm">{{ placeholder }}</span>
            <div v-if="modelValue && multiple">
                <span v-for="(item, key) in selectedItems" :key="key" class="mr-1 bg-blue-500 text-white inline-block px-1 py-0.5 text-xs font-medium rounded">
                    {{ item }} <a href="#" class="ml-0.5">&times;</a>
                </span>
            </div>
            <span v-if="!multiple">{{ modelValue }}</span>
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
                        class="w-full h-8 font-light p-3 border border-gray-400 rounded font-sm focus:outline-none"
                        placeholder="Search...."
                        :class="{'border-gray-400': !errorMessage, 'border-red-400': errorMessage}"
                    >
                </li>
                <li
                    v-for="(item,index) in filteredItems"
                    @click.stop="chooseItem(item)"
                    :key="index"
                    class="block text-sm cursor-pointer py-1 px-2 hover:bg-gray-200"
                    :class="{ 'bg-gray-200': item.selected }"
                >
                    {{ item.value }}
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
import { computed, ref, onMounted, reactive } from 'vue';
export default {
    props: {
        errorMessage: {
            type: String,
        },
        placeholder: {
            type: String,
            default: 'Select item'
        },
        items: {
            type: Array,
            default() {
                return [];
            }
        },
        keyValue: {
            type: String,
            default: ''
        },
        multiple: {
            type: Boolean,
            default: false
        },
        filterable: {
            type: Boolean,
            default: false
        },
        modelValue: {
            type: [String, Array]
        },
        label: {
            type: String,
            default: ''
        },
        name: {
            type: String
        }
    },
    emits: ['update:modelValue'],
    setup(props, { emit }) {
        const search = ref('');
        const selectItems = reactive([]);
        const selectedItem = ref(null);
        const selectedItems = reactive([]);
        const selectPosition = ref(-1);
        const showItems = ref(false);

        const selectFilter = ref(null);
        const selectWrap = ref(null);

        const filteredItems = computed(() => {
            if (search === '') {
                return selectItems;
            }

            return selectItems.filter((item) => {
                return item.value.toLowerCase().indexOf(search.value.toLowerCase()) >= 0;
            });
        });

        function selectItem($event) {
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

        function chooseItem(item = null) {
            if (props.multiple) {
                selectedItems.push(item.value);
            } else {
                selectedItem.value = item.value;
            }

            selectPosition.value = -1;

            if (!props.multiple || props.filterable) {
                deactivate();
                selectWrap.value.blur();
            }

            emit('update:modelValue', (props.multiple) ? selectedItems : selectedItem);
        }

        function populateItems() {
            props.items.forEach((item) => {

                if (typeof(item) === "object") {
                    selectItems.push({ key: keyValue, value: props.items[keyValue], selected: false });
                } else {
                    selectItems.push({ key: item, value: item, selected: false });
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

        onMounted(() => {
            populateItems();
        });

        return {
            search,
            selectedItem,
            selectPosition,
            showItems,
            filteredItems,
            selectFilter,
            selectWrap,
            selectItem,
            chooseItem,
            populateItems,
            activate,
            deactivate,
            selectedItems
        }
    }
}
</script>

<style scoped>
.custom-border-color::before {
    border-color: #9CA3AF transparent;
}
</style>