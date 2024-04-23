import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/site/js/**/*.{js,tsx,ts}",
        "./resources/views/site/**/**/*.blade.php",
        "./resources/views/auth/**/**/*.blade.php",
        "./resources/views/components/**/**/*.blade.php",
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

                "brand-yellow": "#fffaed",
            },
            fontFamily: {
                sans: [
                    "IBM Plex Mono",
                    "monospace",
                    ...defaultTheme.fontFamily.sans,
                ],
            },
        },
        container: {
            center: true,
        },
    },
    plugins: [require("flowbite/plugin"), require("@tailwindcss/typography")],
};
