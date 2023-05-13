import { App, render, h } from "vue";
import NotificationTemplate from "@/Components/Plugins/Notification.vue";
import { NotificationProps } from "@/Components/Plugins/notification";

export const Notification = {
    install(app: App) {
        const $notify = {
            show(options: NotificationProps) {

                let template = h(NotificationTemplate, options);
                const container = document.body as HTMLTemplateElement;
                const el = document.createElement('div');

                render(template, el)

                container.appendChild(el.firstChild);

                return () => {
                    render(null, el);
                    template = null;
                }
            }
        }
        app.provide('anotification', $notify);
    }
}