import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

// postcss, and laravel files paths relative to package.json
export default defineConfig({
    css: {
        postcss: "resources/site/postcss.config.js",
    },
    plugins: [
        laravel({
            hotFile: "public/site/hot",
            buildDirectory: "site",
            input: [
                "resources/site/css/site.css",
                "resources/site/js/site.js",
                "resources/site/css/highlight.css",
                "resources/site/js/highlight.js",
                "resources/site/js/components.tsx",
            ],
            refresh: ["resources/views/site/**", "resources/site/**"],
        }),
    ],
});
