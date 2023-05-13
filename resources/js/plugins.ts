import { App, render, h } from "vue";
import NotificationTemplate from "@/Components/Plugins/Notification.vue";
import { NotificationProps } from "@/Components/Plugins/notification";

export const Notification = {
    install(app: App) {
        const $notify = {
            show(options: NotificationProps) {

                let template = h(NotificationTemplate, options);
                const notifyDOM = document.querySelectorAll<HTMLElement>('.a-notification');

                if (notifyDOM.length > 0) {

                    template.props.offset = (notifyDOM.length * notifyDOM[0].offsetHeight) + (16 * (notifyDOM.length+1));
                }

                const container = document.body as HTMLTemplateElement;
                const el = document.createElement('div');

                render(template, el)

                container.appendChild(el.firstChild);
                this.notificationCount += 1;

                return () => {
                    render(null, el);
                    template = null;
                }
            }
        }
        app.provide('anotification', $notify);
    }
}