import React from "react";
import { createRoot } from "react-dom/client";
import { Playground } from "./components/playground";

const element = document.getElementById("js-playground-component");
if (null !== element && undefined !== element.dataset.id) {
    const root = createRoot(element);
    root.render(<Playground id={element.dataset.id} />);
}
