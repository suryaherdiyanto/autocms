<template>
    <div
        @blur="filterable ? false:deactivate()"
        @click="activate()"
        @focus="activate()"
        @keyup.esc="deactivate()"
        class="relative outline-none"
        :tabindex="0"
        ref="_select_wrap"
    >

        <div

            class="w-full h-8 p-1.5 font-sm border border-gray-400 rounded group-focus:border-gray-800 focus:border-gray-800 hover:border-gray-400"
        >
            <span v-if="!modelValue" class="text-gray-400 text-sm">{{ placeholder }}</span>
            <span v-if="modelValue && multiple" class="mr-1 bg-blue-500 text-white inline-block px-1 py-0.5 text-xs font-medium rounded-xl">
                {{ modelValue }} <a href="#" class="ml-0.5">&times;</a>
            </span>
            <span v-if="!multiple">{{ modelValue }}</span>
            <span
                class="relative right-1.5 w-5 h-5 text-center transition-transform float-right custom-border-color origin-center before:relative before:top-1/2 before:align-middle before:w-6 before:h-6 before:border-t-4 before:border-r-4 before:border-l-4 before:border-b-0"
                :class="{showItems, 'transform': showItems, 'rotate-180': showItems}"
                >
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
                        ref="_select_filter"
                        class="w-full h-8 font-light p-3 border border-gray-400 rounded font-sm focus:outline-none"
                        placeholder="Search...."
                        :class="{ 'border-green-500': isSuccess, 'border-red-500': isError, 'hover:border-gray-400': (!isError && !isSuccess), 'focus:border-gray-800': (!isError && !isSuccess) }"
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
export default {
    props: {
        isError: {
            type: Boolean,
            default: false
        },
        isSuccess: {
            type: Boolean,
            default: false
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
        }
    },
    computed: {
        filteredItems() {

            if (this.search === '') {
                return this.selectItems;
            }

            return this.selectItems.filter((item) => {
                return item.value.toLowerCase().indexOf(this.search.toLowerCase()) >= 0;
            });
        }
    },
    data() {
        return {
            selectItems: [],
            selectPosition: -1,
            selectedItem: null,
            showItems: false,
            search: ''
        }
    },
    methods: {
        selectItem($event) {

            if (this.selectPosition > -1) {
                this.selectItems[this.selectPosition].selected = false;
            }

            if ($event.code === 'ArrowDown' || $event.keyCode === 40) {
                if (this.selectPosition === this.selectItems.length-1) {
                    return;
                }

                this.selectPosition += 1;
                if (this.selectItems[this.selectPosition]) {
                    this.selectItems[this.selectPosition].selected = true;
                }
            }

            if ($event.code === 'ArrowUp' || $event.keyCode === 38) {

                if (this.selectPosition === -1) {
                    return;
                }

                this.selectPosition -= 1;
                if (this.selectItems[this.selectPosition]) {
                    this.selectItems[this.selectPosition].selected = true;
                }
            }
        },
        chooseItem(item = null) {
            if (item === null) {
                this.selectedItem = this.selectItems[this.selectPosition].value;
                this.selectItems[this.selectPosition].selected = false;
                this.selectPosition = -1;
            } else {
                this.selectedItem = item.value;
                this.selectPosition = -1;
            }

            if (!this.multiple || this.filterable) {
                this.deactivate();
                this.$refs._select_wrap.blur();
            }

            this.$emit('update:modelValue', this.selectedItem);
        },
        populateItems() {
            this.items.forEach((item) => {

                if (typeof(item) === "object") {
                    this.selectItems.push({ key: this.keyValue, value: this.items[this.keyValue], selected: false });
                } else {
                    this.selectItems.push({ key: item, value: item, selected: false });
                }
            });
        },
        deactivate() {

            if (this.$refs._select_filter) {
                this.$refs._select_filter.blur();
            }

            this.showItems = false;
        },
        activate() {

            if (this.filterable && this.$refs._select_filter) {
                this.$refs._select_filter.focus();
            }

            this.showItems = true;
        }
    },
    created() {
        this.populateItems();
    }
}
</script>

<style scoped>
.custom-border-color::before {
    border-color: #9CA3AF transparent;
}
</style>