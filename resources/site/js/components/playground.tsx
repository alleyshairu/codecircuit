import React, { useEffect, useState } from "react";
import { Interweave } from "interweave";

import { get } from "../api";
import { CodeEditor } from "./code-editor";
import OutputWindow from "./output-window";

interface PlaygroundProps {
    id: string;
}

interface Problem {
    id: string;
    description: string;
    starting_code: string;
    instructions: string;
}

const Playground = (props: PlaygroundProps) => {
    const [loading, setLoading] = useState<boolean>(false);
    const [processing, setProcessing] = useState<boolean>(false);
    const [problem, setProblem] = useState<Problem | null>(null);

    useEffect(() => {
        get<Problem>(`/problems/${props.id}`)
            .then((res) => {
                setProblem(res.problem);
            })
            .catch((res) => {
                console.log(res);
                setLoading(false);
            });
    }, []);

    const handleProcessing = () => {
        console.log("called");
    };

    return (
        <>
            {problem ? (
                <div className="grid gap-3">
                    <div className="grid gap-3 grid-cols-5">
                        <div className="col-span-3">
                            <div className="card">
                                <div className="card-header">
                                    <h3 className="font-semibold leading-none tracking-tight">
                                        Code Editor
                                    </h3>
                                </div>
                                <div className="card-body">
                                    <CodeEditor
                                        language="java"
                                        code=""
                                        onChange={(code: string) => {}}
                                    />
                                </div>
                            </div>
                        </div>
                        <div className="grid gap-2 col-span-2">
                            <OutputWindow outputDetails={null} />
                            <div className="flex justify-end">
                                <button
                                    onClick={handleProcessing}
                                    className="btn-primary"
                                >
                                    {processing
                                        ? "Processing..."
                                        : "Compile and Execute"}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            ) : null}
        </>
    );
};

export { Playground };
