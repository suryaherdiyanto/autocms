import NotificationTemplate from "./Notification.vue";
import { render,h } from "vue";

export interface NotificationProps {
    title?: string,
    message: string,
    offset?: number
}

export function notify(options: NotificationProps) {
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