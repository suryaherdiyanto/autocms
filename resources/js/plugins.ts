import { App, createVNode, render, defineProps, withDefaults, provide } from "vue";
import NotificationTemplate from "@/Components/Plugins/Notification.vue";
import { NotificationProps } from "@/Components/Plugins/notification";

export const Notification = {
    install(app: App) {
        const $notify = {
            show(options: NotificationProps): void {
                const props = withDefaults(defineProps<NotificationProps>(), {
                    title: options.title,
                    message: options.message
                });

                const template = createVNode(NotificationTemplate, props);
                const container = document.body as HTMLTemplateElement;
                const el = document.createElement('div');

                render(template, el);
                container.appendChild(el.firstElementChild);
            }
        }
        app.provide('anotification', $notify);
    }
}