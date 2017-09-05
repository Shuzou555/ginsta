<?php
// echo 'routes.phpを通りました';
// echo '<br/>';

//1.GETパラメータを取得
//explode関数：第2引数の文字列を、第１引数の文字列を分解し、配列で返す関数

// echo $_GET['url'];
$params = explode('/', $_GET['url']);

//.htaccessの性能でリソース名から読み込むことにしている
//そして、リソース名を最初の段、アクションを2段目　オプションを3段目にする。

// var_dump($params);

//2.パラメータの分解（リソース名、アクション名、オプションを取得） これ全体が配列の棚とイメージする
$resource = $params[0];
$action = $params[1];
$id = 0;
//オプションに入った文字はidとする。
if (isset($params[2])) {
	$id = $params[2];
}
//3.コントローラの呼び出し　リソース名を読みアクセスする
require('controllers/' . $resource . '_controller.php');

?>