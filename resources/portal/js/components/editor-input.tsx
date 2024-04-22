import React from "react";
import { Editor } from "@tinymce/tinymce-react";

interface EditorInputProps {
    name: string;
    content: string | null;
}

const TOOLBAR = [
    "undo redo | link hr numlist bullist image table | outdent indent | print visualchars visualblocks code preview fullscreen",
    "blocks fontsize | bold italic underline strikethrough superscript subscript | forecolor backcolor | alignleft aligncenter alignright alignjustify removeformat",
];

const PLUGINS = [
    "advlist",
    "anchor",
    "autolink",
    "autoresize",
    "autosave",
    "charmap",
    "code",
    "fullscreen",
    "image",
    "link",
    "lists",
    "nonbreaking",
    "preview",
    "quickbars",
    "table",
    "visualblocks",
    "visualchars",
];

function EditorInput(props: EditorInputProps) {
    return (
        <>
            <Editor
                textareaName={props.name}
                initialValue={props.content ?? ""}
                init={{
                    menubar: false,
                    min_height: 300,
                    max_height: 500,
                    branding: false,
                    promotion: false,
                    statusbar: false,
                    hidden_input: true,
                    convert_urls: false,
                    skin_url: "/tinymce/skins/ui/oxide",
                    theme_url: "/tinymce/theme.min.js",
                    model_url: "/tinymce/model.min.js",
                    quickbars_selection_toolbars:
                        "bold italic strikethrough superscript subscript| h2 h3 h4 blockquote | quicklink image bullist quicktable",
                    toolbar_mode: "wrap",
                    font_size_formats: "10px 12px 14px 16px",
                }}
                plugins={PLUGINS}
                toolbar={TOOLBAR}
            />
        </>
    );
}

export { EditorInput };
