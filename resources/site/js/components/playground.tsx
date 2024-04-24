import React, { useEffect, useState } from "react";
import { Interweave } from "interweave";

import { get, post } from "../api";
import { CodeEditor } from "./code-editor";
import OutputWindow from "./output-window";

interface PlaygroundProps {
    id: string;
}

interface ProblemResponse {
    problem: Problem;
}

interface Problem {
    problem_id: string;
    description: string;
    starting_code: string;
    instructions: string;
}

interface Token {
    token: string;
}

const Playground = (props: PlaygroundProps) => {
    const [code, setCode] = useState<string>("");
    const [loading, setLoading] = useState<boolean>(false);
    const [processing, setProcessing] = useState<boolean>(false);
    const [problem, setProblem] = useState<Problem | null>(null);
    const [outputDetails, setOutputDetails] = useState(null);

    useEffect(() => {
        get<ProblemResponse>(`/problems/${props.id}`)
            .then((res) => {
                setProblem(res.problem);
                setCode(res.problem.starting_code);
            })
            .catch((res) => {
                console.log(res);
            });
    }, []);

    const handleProcessing = async () => {
        setProcessing(true);

        const res = post<Token>(`/problems/${props.id}/process`, {
            code: code,
            problem_id: problem?.problem_id,
        })
            .then(async (res: Token) => {
                await checkStatus(res.token);
            })
            .catch((res) => {
                setProcessing(false);
                alert("Something went wrong");
            });
    };

    const checkStatus = async (token: string) => {
        const response = await get<any>(`/process/${token}/status`, {});
        const statusId = response.status?.id;
        if (statusId === 1 || statusId === 2) {
            setTimeout(async () => {
                console.log("called again");
                await checkStatus(token);
            }, 2000);
            return;
        }

        console.log(response);
        setOutputDetails(response);
        setProcessing(false);
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
                                        code={code}
                                        onChange={(code: string) => {
                                            setCode(code);
                                        }}
                                    />
                                </div>
                            </div>
                        </div>
                        <div className="grid gap-2 col-span-2">
                            <OutputWindow outputDetails={outputDetails} />
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
