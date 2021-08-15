<style type="text/css">
.button {
  display       : inline-block;
  border-radius : 13%;          /* 角丸       */
  font-size     : 31pt;        /* 文字サイズ */
  text-align    : center;      /* 文字位置   */
  cursor        : pointer;     /* カーソル   */
  padding       : 28px 45px;   /* 余白       */
  background    : rgba(102, 102, 255, 0.90);     /* 背景色     */
  color         : #ffffff;     /* 文字色     */
  line-height   : 1em;         /* 1行の高さ  */
  transition    : .3s;         /* なめらか変化 */
  box-shadow    : 16px 16px 11px #666666;  /* 影の設定 */
  border        : 2px solid rgba(102, 102, 255, 0.90);    /* 枠の指定 */
}
.button:hover {
  box-shadow    : none;        /* カーソル時の影消去 */
  color         : rgba(102, 102, 255, 0.90);     /* 背景色     */
  background    : #ffffff;     /* 文字色     */
}
</style>

<body style="background:url(https://devpla.s3.ap-northeast-1.amazonaws.com/devpla/DevPla_LandingPage.png); 
background-size:cover;">

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h3 style='color:blue;'> 　　　仲間と開発をしたい人あつまれ！ </h3>

<form action='/homechat' method='GET'>
    @csrf
    <button type='submit' class='button' style='position: absolute; left: 40px; background-color:green'>さあ始めよう！</button>
</form>