import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { svelte } from "@sveltejs/vite-plugin-svelte";

export default defineConfig(({ command }) => {
    const isBuild = command === "build";
    return {
        base: isBuild ? "/public/build/" : "/",
        plugins: [
            laravel({
                publicDirectory: "storage/public",
                input: [
                    "storage/inertia/css/app.css",
                    "storage/inertia/js/app.js",
                ],
                ssr: "storage/inertia/js/ssr.js",
                refresh: true,
            }),
            svelte({
                compilerOptions: {
                    hydratable: true,
                },
            }),
        ],
    };
});
