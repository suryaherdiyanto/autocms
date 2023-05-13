import { App } from "vue";
import { notify } from "@/Components/Plugins/notification";

export const Notification = {
    install(app: App) {
        const $notify = {
            show: notify
        }

        app.provide('anotification', $notify);
    }
}