
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import { config } from "process";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //
                "resources/js/app.js",
                "resources/js/forms.js",
                "resources/js/views/user.js",
                "resources/js/views/person.js",
                "resources/js/views/institution.js",
                "resources/js/views/institution_person.js",
                "resources/js/views/ubigeo.js",
                
                //
                "resources/css/login_styles.css",
                "resources/css/main_background.css",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
            "~bootstrap-icons": path.resolve(__dirname,"node_modules/bootstrap-icons"),
            $: "jQuery",
            "~admin-lte":path.resolve(__dirname, "node_modules/admin-lte"),
            "~fa":path.resolve(__dirname, "node_modules/@fortawesome/fontawesome-free/scss"),
        },
    },
});
