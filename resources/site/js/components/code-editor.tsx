import React, { useState } from "react";

import Editor from "@monaco-editor/react";

interface CodeEditor {
    code: string;
    language: string;
    onChange: (code: string) => void;
}

const CodeEditor = ({ onChange, language, code }) => {
    const [value, setValue] = useState(code || "");

    const handleEditorChange = (value: string | undefined) => {
        setValue(value);
        onChange(value);
    };

    return (
        <Editor
            height="65vh"
            width={`100%`}
            language={language || "javascript"}
            value={value}
            defaultValue="// Enter your code here"
            onChange={handleEditorChange}
        />
    );
};
export { CodeEditor };
