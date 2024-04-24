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
    solution: Solution | null;
}

interface Problem {
    problem_id: string;
    description: string;
    starting_code: string;
    instructions: string;
    hint: string;
}

interface Solution {
    solution_id: string;
    code: string;
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
                if (res.solution?.code) {
                    setCode(res.solution.code);
                } else {
                    setCode(res.problem.starting_code);
                }
            })
            .catch((res) => {
                console.log(res);
            });
    }, []);

    const handleSaveSolution = async () => {
        const res = post<Token>(`/solutions`, {
            code: code,
            problem_id: problem?.problem_id,
        })
            .then((res) => {
                console.log("yeay");
            })
            .catch((res) => {});
    };

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
                await checkStatus(token);
            }, 2000);
            return;
        }

        setOutputDetails(response);
        setProcessing(false);
    };

    return (
        <>
            {problem ? (
                <div className="grid gap-3">
                    <div className="grid gap-3">
                        <fieldset className="rounded-lg border p-4">
                            <legend className="-ml-1 px-1 text-sm font-medium">
                                Code Editor
                            </legend>

                            <CodeEditor
                                language="java"
                                code={code}
                                onChange={(code: string) => {
                                    setCode(code);
                                }}
                            />
                        </fieldset>
                    </div>
                    <OutputWindow outputDetails={outputDetails} />

                    {problem.hint !== null ? (
                        <fieldset className="grid md:grid-cols-2 gap-6 rounded-lg border p-4">
                            <legend className="-ml-1 px-1 text-sm font-medium">
                                Hint
                            </legend>
                            <details>
                                <summary>Read</summary>
                                <div
                                    dangerouslySetInnerHTML={{
                                        __html: problem.hint,
                                    }}
                                />
                            </details>
                        </fieldset>
                    ) : null}

                    <div className="flex items-center gap-3">
                        <button
                            onClick={handleProcessing}
                            className="btn-primary"
                        >
                            {processing
                                ? "Processing..."
                                : "Compile and Execute"}
                        </button>
                        <button
                            onClick={handleSaveSolution}
                            className="btn-primary"
                        >
                            Save Solution
                        </button>
                    </div>
                </div>
            ) : null}
        </>
    );
};

export { Playground };
