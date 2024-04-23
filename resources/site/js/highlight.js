import hljs from "highlight.js/lib/core";
import java from "highlight.js/lib/languages/java";
import php from "highlight.js/lib/languages/php";
import python from "highlight.js/lib/languages/python";
import r from "highlight.js/lib/languages/r";

hljs.registerLanguage("java", java);
hljs.registerLanguage("php", php);
hljs.registerLanguage("python", python);
hljs.registerLanguage("r", r);

document.addEventListener("DOMContentLoaded", (event) => {
    document.querySelectorAll("pre code").forEach((block) => {
        hljs.highlightElement(block);
    });
});
