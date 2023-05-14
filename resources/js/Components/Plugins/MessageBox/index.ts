import { ComponentInternalInstance, h, render } from "vue";
import MessageBoxTemplate from "./MessageBox.vue";

interface MessageBoxProps {
    title?: string,
    okText?: string,
    showCancelButton: boolean,
    cancelText: string,
    message: string
}

interface MessageBoxOptions extends MessageBoxProps {
    onClosed(): void,
    onConfirmed?(): void,
    onCancel?(): void
}

const node = document.createElement('div') as HTMLElement;

const instance = (options: any): ComponentInternalInstance => {
    const template = h(MessageBoxTemplate, options);

    render(template, node);

    document.body.appendChild(node.firstChild);

    return template.component;
}

export const showMessageBox = (options: MessageBoxOptions) => {
    options.onClosed = () => {
        setTimeout(() => {
            render(null, node);
        }, 1000);
    }

    instance(options);
}