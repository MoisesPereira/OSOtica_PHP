<?php

class Conexao{

	private static $instance;

	public function Conexao()
	{
	}

	/*public static function getInstace()
	{
		if(! isset ( self::$instance )) {


			try {
				$dsn = 'mysql:dbname=Fido;host=localhost;charset=utf8';
				self::$instance = new PDO($dsn, 'root', '');
				//self::$instance = mysqli_connect('localhost', 'root', '', 'Fido');
				//mysqli_set_charset(self::$instance,"utf8");
				
			} catch (Exception $e) {
				print_r($e);
			}

			return self::$instance;
		}
	}*/

	public static function getInstace()
	{
		if(! isset ( self::$instance )) {


			try {
				self::$instance = mysqli_connect('localhost', 'root', '', 'osotica');
				mysqli_set_charset(self::$instance,"utf8");
				
			} catch (Exception $e) {
				print_r($e);
			}

			return self::$instance;
		}

	}

}