import React, { useEffect, useState } from "react";
import CodeEditor from "@uiw/react-textarea-code-editor";
import { Interweave } from "interweave";

import { get } from "../api";

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

    console.log(problem);

    return (
        <>
            {problem ? (
                <div className="grid grid-cols-3">
                    <div className="col-span-2">
                        <Interweave content={problem.description} />;
                    </div>
                    <div className="col-span-1">
                        <CodeEditor
                            className="rounded-md"
                            value={problem.description}
                            language="java"
                            placeholder="Please enter java code."
                            padding={15}
                        />
                    </div>
                </div>
            ) : null}
        </>
    );
};

export { Playground };
