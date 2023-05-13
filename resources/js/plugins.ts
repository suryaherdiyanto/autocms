import { App, render, h } from "vue";
import NotificationTemplate from "@/Components/Plugins/Notification.vue";
import { NotificationProps } from "@/Components/Plugins/notification";

export const Notification = {
    install(app: App) {
        const $notify = {
            notificationCount: 0,
            show(options: NotificationProps) {

                let template = h(NotificationTemplate, options);

                if (this.notificationCount > 0) {
                    const notifDOM = document.querySelector('.a-notification') as HTMLElement;

                    template.props.offset = (this.notificationCount * notifDOM.offsetHeight) + (16 * (this.notificationCount+1));
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