import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css"; //node_modules 폴더 안에 있는 파일임.

createApp(App).use(router).mount("#app");
