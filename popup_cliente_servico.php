<?php
require('inicio.php');
require('./model/db/Conexao.class.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre Clientes</legend>
        </fieldset>

        <form class="form-inline" action="#" method="post" role="form">
          <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="telefone">Tel:</label>
            <input type="text" class="form-control" id="telefone" name="telefone">
          </div>  

          <button type="submit" class="btn btn-default">Submit</button>
        </form>

        </div>
        </div>
    </div>


<?php

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
$dtIni = isset($_POST['data-ini']) ? explode("/", $_POST['data-ini']) : '';
$dtFim = isset($_POST['data-fim']) ? explode("/", $_POST['data-fim']) : '';

if( $nome != '' || $email != '' || $telefone != '' || $dtIni != '' || $dtFim != '' ){

$qnome = ($nome != '')  ? "and nome like '%{$nome}%' " : '';
$qemail = ($email != '') ? "and email like '%{$email}%' " : '';
$qtelefone = ($telefone != '') ? "and telefone like '%{$telefone}%' " : '';
$qData = ( empty($dtIni) && empty($dtFim) ) ? "and STR_TO_DATE('dt_cadastro','%Y-%m-%d') BETWEEN '{$dtIni[2]}-{$dtIni[1]}-{$dtIni[0]}' AND '{$dtFim[2]}-{$dtFim[1]}-{$dtFim[0]}'" : '';

$queryN = "select * from tb_cliente where 1 = 1 {$qnome} {$qemail} {$qtelefone} {$qData} ";

    ?>
    <table border="1" class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Escolha o Cliente</th>
        </tr>
        </thead>
        <tbody>
    <?php

    
    $conn = Conexao::getInstace();
    $q = mysqli_query($conn, $queryN);

    while($t = mysqli_fetch_array($q)){
        echo "<tr>";
        echo "<td>$t[1]</td>";
        echo "<td>$t[2]</td>";
        echo "<td>$t[3]</td>";
        echo "<td><a href='/detalhes.php/?id={$t[0]}'>Selecionar</a></td>";
        echo "</tr>";
    }

?>

        </tbody>
    </table>
<?php    
}
?>
          
</div>
</body>
</html>