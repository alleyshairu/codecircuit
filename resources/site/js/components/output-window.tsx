import React from "react";

const OutputWindow = ({ outputDetails }) => {
    const getOutput = () => {
        let statusId = outputDetails?.status?.id;

        if (statusId === 6) {
            // compilation error
            return (
                <pre className="px-2 py-1 font-normal text-xs text-red-500">
                    {outputDetails?.compile_output}
                </pre>
            );
        } else if (statusId === 3) {
            return (
                <pre className="px-2 py-1 font-normal text-xs text-green-500">
                    {outputDetails.stdout !== null
                        ? `${outputDetails.stdout}`
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
                    {outputDetails?.stderr}
                </pre>
            );
        }
    };
    return (
        <>
            <fieldset className="rounded-lg border p-4">
                <legend className="-ml-1 px-1 text-sm font-medium">
                    Output
                </legend>

                {outputDetails ? (
                    <pre className="px-2 py-1 font-normal text-xs text-red-500">
                        {outputDetails.message}
                    </pre>
                ) : null}
                {outputDetails ? <>{getOutput()}</> : null}
            </fieldset>
        </>
    );
};

export default OutputWindow;
