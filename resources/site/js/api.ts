// @ts-nocheck
const token: string = document.head.querySelector(
    'meta[name="csrf-token"]',
).content;

if (!token) {
    console.error("CSRF token not found");
}

type ValidationError = {
    status: 422;
    message: string;
    errors: Array<string, Array<string>>;
};

type SimpleError = {
    status: 400 | 403;
    message: string;
};

type InternalError = {
    status: 500;
    message: string;
};

export type ServerError = ValidationError | InternalError | SimpleError;

export function csrf_token(): string {
    return token;
}

export async function http<T>(request: RequestInfo): Promise<T> {
    const response = await fetch(request);
    const json = await response.json();

    if (response.ok) {
        return json as T;
    }

    if (response.status == 422) {
        return Promise.reject({
            status: 422,
            message: json.message,
            errors: json.errors,
        });
    }

    if (response.status == 400 || response.status === 403) {
        return Promise.reject({
            status: response.status,
            message: json.message,
        });
    }

    return Promise.reject({
        status: response.status,
        body: "Something went wrong.",
    });
}

export async function get<T>(
    path: string,
    args: RequestInit = { method: "get" },
): Promise<T> {
    return await http<T>(new Request(path, args));
}

export async function post<T>(
    path: string,
    body: any,
    args: RequestInit = {
        method: "post",
        body: JSON.stringify(body),
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": token,
        },
    },
): Promise<T> {
    return await http<T>(new Request(path, args));
}

type LinkResponse = {
    link: string;
};

export async function postFile(file: File): Promise<LinkResponse> {
    var formData = new FormData();
    formData.append("file", file);
    let args = {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
            Accept: "application/json",
        },
        body: formData,
    };

    return await http<LinkResponse>(new Request(`/admin/files/upload`, args));
}

export async function postImg(file: File): Promise<LinkResponse> {
    var formData = new FormData();
    formData.append("file", file);
    let args = {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
            Accept: "application/json",
        },
        body: formData,
    };

    return await http<LinkResponse>(
        new Request(`/admin/files/image-upload`, args),
    );
}

// error is used for display errors to user which are returned from server
export function error(error: ServerError): string {
    if (error.status === 422) {
        const msg = Object.keys(error.errors).map((key: string) => {
            return error.errors[key];
        });

        return msg;
    }

    if (error.status == 400 || error.status == 403) {
        return error.message;
    }

    return "Something went wrong!";
}

export function error_from_xhr(xhr: XMLHttpRequest): string {
    if (xhr.status === 422) {
        const error = JSON.parse(xhr.responseText);
        const msg = Object.keys(error.errors).map((key: string) => {
            return error.errors[key];
        });

        return msg;
    }

    if (xhr.status == 400 || xhr.status == 403) {
        const error = JSON.parse(xhr.responseText);
        return error.message;
    }

    return "Something went wrong!";
}
