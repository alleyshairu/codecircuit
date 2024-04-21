import React from "react";

const OutputWindow = ({ outputDetails }) => {
    const getOutput = () => {
        let statusId = outputDetails?.status?.id;

        if (statusId === 6) {
            // compilation error
            return (
                <pre className="px-2 py-1 font-normal text-xs text-red-500">
                    {atob(outputDetails?.compile_output)}
                </pre>
            );
        } else if (statusId === 3) {
            return (
                <pre className="px-2 py-1 font-normal text-xs text-green-500">
                    {atob(outputDetails.stdout) !== null
                        ? `${atob(outputDetails.stdout)}`
                        : null}
                </pre>
            );
        } else if (statusId === 5) {
            return (
                <pre className="px-2 py-1 font-normal text-xs text-red-500">
                    {`Time Limit Exceeded`}
                </pre>
            );
        } else {
            return (
                <pre className="px-2 py-1 font-normal text-xs text-red-500">
                    {atob(outputDetails?.stderr)}
                </pre>
            );
        }
    };
    return (
        <>
            <div className="card">
                <div className="card-header">
                    <h3 className="font-semibold leading-none tracking-tight">
                        Output
                    </h3>
                    <p className="text-sm text-muted-foreground">
                        Output Of your Program
                    </p>
                </div>
                <div className="card-body">
                    {outputDetails ? <>{getOutput()}</> : null}
                </div>
            </div>
        </>
    );
};

export default OutputWindow;
