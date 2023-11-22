//웹서버 관련 프로그램 구축
const express = require("express");
const app = express();
const session = require("express-session");
const fs = require("fs"); //파일 시스템

app.use(
  session({
    secret: "secret code",
    resave: false, //요청이 왔을 때 세션에 수정사항이 없더라도 다시 저장할것인가? 아니오
    saveUninitaliazed: false, //세션에 저장할 것이 없더라도 항상 저장 할것인가? 아니오
    cookie: {
      secure: false, //로그인 세션데이터를 넣을려면 false로 해야함
      maxAge: 1000 * 60 * 60, //쿠키 유표시간 1시간
    },
  })
);

app.use(
  //웹서버에서 요청 데이터를 받으려면 제한 필요함
  express.json({
    limit: "50mb",
  })
);

//서버실행
const server = app.listen(3000, () => {
  console.log("server started. port 3000.");
});

//클라이언트에서 요청이 들어올때 데이터 받아오기
let sql = require("./sql.js");

//서버 리스타트 안해도 바로바로 수정 코드 적용
fs.watchFile(__dirname + "/sql.js", (curr, prev) => {
  console.log("sql 변경시 재시작 없이 반영되도록 함");
  delete require.cache[require.resolve("./sql.js")]; //캐시 삭제
  sql = require("./sql.js");
});

//DB 연결
const db = {
  database: "sqldb",
  connectionLimit: 10,
  host: "localhost",
  user: "root",
  password: "jkh2007!@#",
};

const dbPool = require("mysql").createPool(db);

//라우터 설정
app.post("/api/login", async (request, res) => {
  request.session["email"] = "blaster1866@gmail.com";
  res.send("ok");
});

app.post("/api/logout", async (request, res) => {
  request.session.destroy();
  res.send("ok");
});

//login logout이 아닌 그외는 모두 이곳으로 탐
app.post("/api/:alias", async (request, res) => {
  //로그인이 필요 없는 경우
  try {
    res.send(await req.db(request.params.alias, request.body.param));
  } catch (err) {
    res.status(500).send({
      error: err,
    });
  }
});

app.post("/api-login/:alias", async (request, res) => {
  //로그인이 필요한 경우
  if (!request.session.email) {
    return res.status(401).send({ error: "you need to login." });
  }

  try {
    res.send(await req.db(request.params.alias));
  } catch (err) {
    res.status(500).send({
      error: err,
    });
  }
});

const req = {
  async db(alias, param = [], where = "") {
    return new Promise((resolve, reject) =>
      dbPool.query(sql[alias].query + where, param, (error, rows) => {
        if (error) {
          if (error.code != "ER_DUP_ENTRY") console.log(error);
          resolve({
            error,
          });
        } else resolve(rows);
      })
    );
  },
};
