module.exports = {
  productList: {
    query:
      "select tp.*  , ti.`path` , tc.category1 , tc.category2 , tc.category3 from t_product tp , t_image ti , t_category tc  where tp.id =ti.product_id and ti.`type` = 1 and tp.category_id =tc.id ",
  },

  productDetail: {
    query:
      "select tp.*  , ti.`path` , tc.category1 , tc.category2 , tc.category3 from t_product tp , t_image ti , t_category tc where tp.id = ? and tp.id = ti.product_id and ti.`type` = 3 and tp.category_id = tc.id",
  },

  productMainImages: {
    query: "select * from t_image ti where ti.product_id = ? and ti.`type` = 2",
  },

  productInsert: {
    //권한 있는 유저만 등록할수 있도록 쿼리 추가해야함
    query:
      "insert into t_product(product_name, product_price, delivery_price, add_delivery_price, tags, outbound_days, seller_id, category_id) values (?, ?, ?, ?, ?, ?, ?, ?)",
  },

  productImageInsert: {
    //권한 있는 유저만 등록할수 있도록 쿼리 추가해야함
    query: "insert into t_image (product_id, `type`, `path`) values (?, ?, ?)",
  },

  sellerList: {
    query: "select * from t_seller",
  },
};
