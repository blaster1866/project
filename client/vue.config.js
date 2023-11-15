//const { defineConfig } = require("@vue/cli-service");
//const { proxy } = require("jquery");
/*
module.exports = defineConfig({
  transpileDependencies: true,
});
*/
//로컬호스트로 타겟설정
const target = "http://127.0.0.1:3000";

module.exports = {
  devServer: {
    port: 8080,

    proxy: {
      "^/api": {
        target,
        changeOrigin: true,
      },
    },
  },
};
