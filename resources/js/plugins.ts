import { App } from "vue";
import { notify } from "@/Components/Plugins/notification";
import { showMessageBox } from "@/Components/Plugins/MessageBox";

export const Notification = {
    install(app: App) {
        const $notify = {
            show: notify
        }

        app.provide('anotification', $notify);
    }
}

export const MessageBox = {
    install(app: App) {
        const $messageBox = {
            show: showMessageBox
        }

        app.provide('amessage-box', $messageBox);
    }
}