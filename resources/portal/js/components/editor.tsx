import React, { useState } from "react";
import { common, createLowlight } from "lowlight";
import { EditorContent, ReactNodeViewRenderer, useEditor } from "@tiptap/react";
import StarterKit from "@tiptap/starter-kit";
import Document from "@tiptap/extension-document";
import Paragraph from "@tiptap/extension-paragraph";
import Link from "@tiptap/extension-link";
import Highlight from "@tiptap/extension-highlight";
import TextAlign from "@tiptap/extension-text-align";
import ListItem from "@tiptap/extension-list-item";
import Underline from "@tiptap/extension-underline";
import CodeBlockLowlight from "@tiptap/extension-code-block-lowlight";
import { MenuBar } from "./editormenu";

const lowlight = createLowlight(common);
CodeBlockLowlight.configure({
    lowlight: lowlight,
});

interface EditorInputProps {
    name: string;
    html: string;
}

const EditorInput = (props: EditorInputProps) => {
    const [html, setHtml] = useState<string>(props.html);
    const editor = useEditor({
        editorProps: {
            attributes: {
                class: "prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto border border-gray-200 focus:outline-none min-h-16 overflow-y-auto p-4",
            },
        },
        extensions: [
            StarterKit.configure({
                bulletList: {
                    keepMarks: true,
                    keepAttributes: false,
                },
                orderedList: {
                    keepMarks: true,
                    keepAttributes: false,
                },
                codeBlock: false,
            }),
            TextAlign.configure({
                types: ["heading", "paragraph"],
            }),
            Highlight,
            Underline,
            Document,
            Paragraph,
            ListItem,
            Link.configure({
                openOnClick: true,
                validate: (href) => /^https?:\/\//.test(href),
                HTMLAttributes: {
                    class: "link",
                },
            }),
            CodeBlockLowlight.configure({ lowlight }),
        ],
        content: props.html,
        onUpdate({ editor }) {
            console.log(editor.getHTML());
            setHtml(editor.getHTML());
        },
    });

    return (
        <div className="w-full lg:flex md:flex flex-col">
            <MenuBar editor={editor} />
            <EditorContent editor={editor} className="" />
            <input type="hidden" name={props.name} value={html} />
        </div>
    );
};

export { EditorInput };
