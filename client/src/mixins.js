//mixins.js 뷰 컴포넌트 공통 모듈 설정하는 파일 (모든페이지에서 사용가능)
import axios from "axios";

export default {
  methods: {
    async $api(url, data) {
      return (
        await axios({
          method: "post",
          url,
          data,
        }).catch((e) => {
          console.log(e);
        })
      ).data;
    },
    //천단위 콤마 찍기
    $numberWithCommas(input) {
      if (typeof input === "number") {
        return input.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      } else {
        return input.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }
    },
  },
};
