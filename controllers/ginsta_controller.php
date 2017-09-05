<?php
	// echo'Ginstasコントローラーが呼ばれました<br>';
	//モデルを呼び出す
	require('models/ginsta.php');

	//コントローラーのクラスのインスタンス化
	$controller = new GinstasController();
	// $controller->index();

	//アクション名によって、呼び出すメソッドを変える
	switch ($action) {
		case 'index':
			 $controller->index();
			break;

		case 'create':

			$controller->create($_POST);

			break;

		case 'update':

			$controller->update($id,$_POST);

			break;

		case 'delete':

			$controller->delete($id);

			break;
		default:
			# code...
			break;
	}

	//Ginstas_controllerの処理はここまで

//以下はGinstasControllerはの設計図を描く

	class GinstasController {

		function index(){
			// echo 'コントローラのindex()が呼び出されました！<br>';
			//モデルを呼び出す
			$ginsta = new ginsta();

			$viewOptions = $ginsta->index();
			$action = 'index';
			// var_dump($viewOptions);
			require('views/layout/application.php');

		}


		function create($ginsta_data){
			// echo 'create()が呼び出されました。<br>';

			//モデルを呼び出す
			$ginsta = new ginsta();

			//モデルのcreateメソッドを実行する（モデルのcreateメソッドは、insert文を実行してブログを保存する）
			$return = $ginsta->create($ginsta_data);

			header('Location: /seed_ginsta/Ginstas/index');


		}


		function update($id,$ginsta_data){
			// echo 'updete()が呼び出されました。<br>';

			//モデルを呼び出す
			$ginsta = new ginsta();

			//モデルのupdeteメソッドを実行する（モデルのcreateメソッドは、updete文を実行してブログを保存する）
			$return = $ginsta->update($id,$ginsta_data);

			header('Location: /seed_ginsta/Ginstas/index');


		}

		function delete($id){
			// echo 'delete()が呼び出されました。<br>';

			//モデルを呼び出す
			$ginsta = new ginsta();

			//モデルのdeleteメソッドを実行する（モデルのcreateメソッドは、delete文を実行してブログを保存する）
			$return = $ginsta->delete($id);

			header('Location: /seed_ginsta/Ginstas/index');


		}


	}
?>
