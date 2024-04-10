import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    css: {
        postcss: "resources/portal/postcss.config.js",
    },
    plugins: [
        laravel({
            hotFile: "public/portal/hot",
            buildDirectory: "portal",
            input: [
                "resources/portal/css/portal.css",
                "resources/portal/css/editor.css",
                "resources/portal/js/app.js",
                "resources/portal/js/portal.js",
                "resources/portal/js/components.tsx",
            ],
            refresh: ["resources/views/portal/**", "resources/portal/**"],
        }),
    ],
});
