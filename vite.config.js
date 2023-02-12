import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import { config } from "process";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/forms.js",
                "resources/css/login_styles.css",
                "resources/css/header_styles.css",
                "resources/css/main_background.css",
            ],
            refresh: [{
                paths: ["public/assets/**"], 
                config: { delay: 300 } 
            }],
        }),
    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
            "~bootstrap-icons": path.resolve(
                __dirname,
                "node_modules/bootstrap-icons"
            ),
            $: "jQuery",
        },
    },
});
