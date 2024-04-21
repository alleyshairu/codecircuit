import React from "react";
import { createRoot } from "react-dom/client";
import { EditorInput } from "./components/editor-input";

let elements = document.getElementsByClassName("js-editor-component");
for (var i = 0; i < elements.length; i++) {
    const element = elements[i] as HTMLElement;
    if (!element.dataset.name) {
        continue;
    }

    const root = createRoot(element);

    root.render(
        <EditorInput
            name={element.dataset.name}
            content={element.dataset.html ?? ""}
        />,
    );
}
