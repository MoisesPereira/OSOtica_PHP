<?php

$email = isset($_POST['email']) ? $_POST['email'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';


if($email && $senha){
require('./model/db/Conexao.class.php');

	$sql = "select * from tb_login where email = '{$email}' and senha = '{$senha}'";

	$conn = Conexao::getInstace();
	$q = mysqli_query($conn, $sql);

	if($t = mysqli_fetch_row($q)){

		session_start();

		$_SESSION['user'] = $t[2];
		$_SESSION['pass'] = $t[3];

		//die('alko');
		header('Location: http://fidophp.com.br/listagemServicos.php');

	}else{
		Echo "Usuário ou senha Errados";
	}

}

require('header2.php');


?>
<div class="container">

      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">Acessa ai....</h2>
        <input type="email" id="email" name="email" class="form-control" placeholder="Digite o Email" required="" autofocus="">
        <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite a Senha" required="">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Loga ai Man!!!</button>
      </form>

</div>

</body>
</html>    