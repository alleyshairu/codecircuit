import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/portal/**/*.blade.php",
        "./resources/portal/js/**/*.js",
        "./resources/portal/js/**/*.ts",
        "./resources/portal/components/*.tsx",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                background: "hsl(var(--background))",
                foreground: "hsl(var(--foreground))",

                muted: "hsl(var(--muted))",
                "muted-foreground": "hsl(var(--muted-foreground))",

                card: "hsl(var(--card))",
                "card-foreground": "hsl(var(--card-foreground))",

                popover: "hsl(var(--popover))",
                "popover-foreground": "hsl(var(--popover-foreground))",

                border: "hsl(var(--border))",

                input: "hsl(var(--input))",
                ring: "hsl(var(--ring))",
                radius: "hsl(var(--radius))",

                primary: "hsl(var(--primary))",
                "primary-foreground": "hsl(var(--primary-foreground))",

                secondary: "hsl(var(--secondary))",
                "secondary-foreground": "hsl(var(--secondary-foreground))",

                accent: "hsl(var(--accent))",
                "accent-foreground": "hsl(var(--accent-foreground))",

                destructive: "hsl(var(--destructive))",
                "destructive-foreground": "hsl(var(--destructive-foreground))",
            },
            fontFamily: {
                sans: [
                    "IBM Plex Mono",
                    "monospace",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
    },

    plugins: [
        forms,
        require("flowbite/plugin"),
        require("@tailwindcss/typography"),
    ],
};
