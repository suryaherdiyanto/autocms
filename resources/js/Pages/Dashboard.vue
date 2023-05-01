<template>
    <div class="flex">
        <div class="w-1/5">
            <the-sidebar />
        </div>
        <div class="w-4/5">
            <the-header />

            <div class="p-6">
                <div class="py-4">
                    <h2 class="font-cairo text-2xl font-bold">Dashboard</h2>
                    <p class="text-gray-500 text-sm">Lorem ipsum dolor.</p>
                </div>

                <a-row>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-2">
                        <a-box>
                            <div class="flex mb-4">
                                <div class="flex w-20 h-20 justify-center items-center mr-3">
                                    <i class="fa-solid fa-paste text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-4xl">12</h3>
                                    <p class="text-gray-500 text-xs my-2">Posts published</p>
                                </div>
                            </div>
                            <a-button>
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a-button>
                        </a-box>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-2">
                        <a-box>
                            <div class="flex mb-4">
                                <div class="flex w-20 h-20 justify-center items-center mr-3">
                                    <i class="fa-solid fa-envelope text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-4xl">13</h3>
                                    <p class="text-gray-500 text-xs my-2">Example Widget</p>
                                </div>
                            </div>
                            <a-button :loading="true">
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a-button>
                        </a-box>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-2">
                        <a-box>
                            <div class="flex mb-4">
                                <div class="flex w-20 h-20 justify-center items-center mr-3">
                                    <i class="fa-solid fa-comment text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-4xl">13</h3>
                                    <p class="text-gray-500 text-xs my-2">Example Widget</p>
                                </div>
                            </div>
                            <a-button>
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a-button>
                        </a-box>
                    </div>
                    <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-2">
                        <a-box>
                            <div class="flex mb-4">
                                <div class="flex w-20 h-20 justify-center items-center mr-3">
                                    <i class="fa-solid fa-envelope text-accent-primary text-4xl"></i>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <h3 class="font-cairo font-bold text-4xl">13</h3>
                                    <p class="text-gray-500 text-xs my-2">Example Widget</p>
                                </div>
                            </div>
                            <a-button>
                                View More <i class="fa-solid fa-angle-right"></i>
                            </a-button>
                        </a-box>
                    </div>
                </a-row>
                <a-row>
                    <div class="w-full md:pb-2 lg:w-1/2 lg:px-2">
                        <a-panel title="Example Panel" has-footer>
                            <template v-slot:content>
                                <p>The Panel Content</p>
                            </template>
                            <template v-slot:footer>
                                <p>The Panel Footer</p>
                            </template>
                        </a-panel>
                    </div>
                    <div class="w-full md:pb-2 lg:w-1/2 lg:px-2">
                        <a-panel title="Example Tabel">
                            <template v-slot:content>
                                <a-table :items="items" :is-loading="isLoading"></a-table>
                            </template>
                        </a-panel>
                    </div>
                </a-row>
                <a-row>
                    <div class="w-full lg:px-2 lg:pb-2">
                        <a-panel title="Example Form">
                            <template v-slot:content>
                                <a-row>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <a-input v-model="form.firstName" error-message="this value was invalid" placeholder="The First Name" label="First Name"></a-input>
                                    </div>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <a-input v-model="form.lastName" placeholder="The Last Name" label="Last Name"></a-input>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <a-input v-model="form.password" label="Password" type="password"></a-input>
                                    </div>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <a-input v-model="form.passwordConfirmation" label="Password Confirmation" type="password"></a-input>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full px-2">
                                        <a-radio-group v-model="form.option" label="Please select an option" :options="form.radioOptions" name="radio example"></a-radio-group>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full px-2">
                                        <a-checkbox v-model="form.isConfirmed" name="confirmation" label="Confirmed?"></a-checkbox>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full px-2">
                                        <a-checkbox-group v-model="form.hobbies" label="Please select your hobbies" :options="form.hobbyOptions" name="Check Multiple Example"></a-checkbox-group>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full px-2">
                                        <a-select v-model="form.selected" label="Example Select" :items="form.selectItems" filterable></a-select>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full px-2">
                                        <a-textarea v-model="form.address" label="Address" name="address"></a-textarea>
                                    </div>
                                </a-row>
                                <a-row>
                                    <div class="w-full px-2">
                                        <a-editor v-model="form.editor" label="Example editor" name="content" />
                                    </div>
                                </a-row>
                            </template>
                        </a-panel>
                    </div>
                    <div class="w-full lg:px-2">
                        <a-panel title="Example Alert">
                            <template v-slot:content>
                                <a-alert title="Hello World" message="Alert Content" />
                                <a-alert title="Hello World" message="Alert Content" type="warning" />
                                <a-alert title="Hello World" message="Alert Content" type="info" />
                                <a-alert title="Hello World" message="Alert Content" type="danger" />
                            </template>
                        </a-panel>
                    </div>
                </a-row>
            </div>
        </div>
    </div>

</template>

<script>
import { reactive, onMounted, ref } from 'vue';
import TheHeader from "../Templates/TheHeader.vue";
import TheSidebar from '../Templates/TheSidebar.vue';

export default {
    components: {
        TheHeader,
        TheSidebar
    },
    setup() {
        const items = reactive([]);
        const isLoading = ref(true);
        const form = reactive({
            firstName: '',
            lastName: '',
            password: '',
            passwordConfirmation: '',
            option: 'option_b',
            isConfirmed: false,
            hobbies: [],
            selected: '',
            editor: '',
            selectItems: ['Option A', 'Option B', 'Option C'],
            radioOptions: [
                {
                    value: 'option_a',
                    label: 'Option A'
                },
                {
                    value: 'option_b',
                    label: 'Option B'
                },
            ],
            hobbyOptions: [
                {
                    value: 'hiking',
                    label: 'Hiking'
                },
                {
                    value: 'cycling',
                    label: 'Cycling'
                },
                {
                    value: 'koding',
                    label: 'Koding'
                }
            ]
        });
        onMounted(() => {
            setTimeout(() => {
                items.push(...[{
                    email: 'johndoe@gmail.com',
                    first_name: 'John',
                    last_name: 'Doe'
                },
                {
                    email: 'melisaangel@gmail.com',
                    first_name: 'Mellisa',
                    last_name: 'Angel'
                }]);

                isLoading.value = false;
            }, 1000);
        })

        return { items, isLoading, form }
    },
}
</script>