<template>
  <!-- 메인 -->
  <main class="mt-3">
    <div class="container">
      <div class="row">
        <!-- 화면 좌측 -->
        <div class="col-md-5">
          <div
            id="carouselExampleIndicators"
            class="carousel slide carousel-dark"
          >
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
            </div>
            <div class="carousel-inner">
              <div
                :class="`carousel-item ${i == 0 ? 'active' : ''}`"
                :key="i"
                v-for="(p_img, i) in productImage"
              >
                <img :src="p_img.path" class="d-block w-100" alt="..." />
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <!-- 화면 우측 -->
        <div class="col-md-7">
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title">{{ productDetail.product_name }}</h5>
              <h5 class="card-title pt-3 pb-3 border-top">
                {{ ChangeNumberWithCommas(productDetail.product_price) }}원
              </h5>
              <p class="card-text border-top pt-3">
                <span class="badge bg-dark me-1">{{
                  productDetail.category1
                }}</span>
                <span class="badge bg-dark me-1">{{
                  productDetail.category2
                }}</span>
                <span class="badge bg-dark">{{ productDetail.category3 }}</span>
              </p>
              <p class="card-text pb-3">
                배송비
                {{ ChangeNumberWithCommas(productDetail.delivery_price) }}원 |
                도서산간(제주도) 배송비 추가
                {{ ChangeNumberWithCommas(productDetail.add_delivery_price) }}원
                | {{ productDetail.outbound_days }}일 이내 출고(주말, 공휴일
                제외)
              </p>
              <div class="card-text border-top pb-3">
                <div class="row">
                  <div class="col-auto">
                    <label class="col-form-label">구매수량</label>
                  </div>
                  <div class="col-auto">
                    <div class="input-group">
                      <span
                        class="input-group-text"
                        style="cursor: pointer"
                        @click="calculatePrice(-1)"
                        >-</span
                      >
                      <input
                        type="text"
                        class="form-control"
                        style="width: 40px"
                        v-model="total"
                      />
                      <span
                        class="input-group-text"
                        style="cursor: pointer"
                        @click="calculatePrice(1)"
                        >+</span
                      >
                    </div>
                  </div>
                </div>
              </div>
              <!-- 총 상품 금액 -->
              <div class="row pt-3 pb-3 border-top">
                <div class="col-6">
                  <h3>총 상품 금액</h3>
                </div>
                <div class="col-6" style="text-align: right">
                  <h3>{{ ChangeNumberWithCommas(totalPrice) }}원</h3>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center">
                <div class="col-6 d-grid p-1">
                  <button type="button" class="btn btn-dark btn-lg">
                    장바구니 담기
                  </button>
                </div>
                <div class="col-6 d-grid p-1">
                  <button type="button" class="btn btn-danger btn-lg">
                    주문하기
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 상세이미지 -->
      <div class="row">
        <div class="col-12">
          <img :src="productDetail.path" alt="" class="img-fluid" />
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      productId: 0,
      productDetail: {},
      productImage: [],
      total: 1,
      totalPrice: 0,
    };
  },
  created() {
    this.productId = this.$route.query.product_id;
    this.getProductDetail();
    this.getProductImage();
  },
  methods: {
    calculatePrice(cnt) {
      let total = this.total + cnt;
      if (total < 1) total = 1;
      this.total = total;
      this.totalPrice = this.productDetail.product_price * this.total;
    },

    ChangeNumberWithCommas(input) {
      return this.$numberWithCommas(input);
    },

    async getProductDetail() {
      let productDetail = await this.$api("/api/productDetail", {
        param: [this.productId],
      });
      if (productDetail.length > 0) {
        this.productDetail = productDetail[0];
        this.totalPrice = this.productDetail.product_price * this.total; //처음 화면 뿌려줄때 총금액 나와야해서 넣음
      }
      console.log(this.productDetail);
    },

    async getProductImage() {
      this.productImage = await this.$api("/api/productMainImages", {
        param: [this.productId],
      });
    },
  },
};
</script>
