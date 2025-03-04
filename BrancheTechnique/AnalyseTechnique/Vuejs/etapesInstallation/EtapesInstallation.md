
## Install VueJs :

-  npm install vue@latest vue-loader@latest vue-router@latest @vitejs/plugin-vue --save-dev


- configure "vite.config.js" : 

     - import { defineConfig } from 'vite';
        import laravel from 'laravel-vite-plugin';

        import vue from '@vitejs/plugin-vue'

        export default defineConfig({
            plugins: [
                laravel({
                    input: ['resources/css/app.css', 'resources/js/app.js'],
                    refresh: true,
                }),
                vue()
            ],
        });



- resources/Components/App.vue
