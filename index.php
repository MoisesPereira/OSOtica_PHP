<?php
//session_start();

//require('inicio.php');
require('header.php');
require('./model/db/Conexao.class.php');

$ordem_servico = isset($_POST['ordem_servico']) ? $_POST['ordem_servico'] : '';
$nomeCliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';
$dt_ini = isset($_POST['dt_inicial']) ? $_POST['dt_inicial'] : '';
$dt_fim = isset($_POST['dt_final']) ? $_POST['dt_final'] : '';
$concluido = isset($_POST['concluido']) ? $_POST['concluido'] : '';

/*echo "Ordem Serviço: ";
print_r($ordem_servico);
echo "<br><br>";
echo "Cliente: ";
print_r($nomeCliente);
echo "<br><br>";
echo "Dt Ini: ";
print_r($dt_ini);
echo "<br><br>";
echo "Dt Fim: ";
print_r($dt_fim);
echo "<br><br>";
echo "Concluido: ";
print_r($concluido);
*/

?>

<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre o Serviço Por:</legend>
        </fieldset>

        <form class="form-inline" action="#" method="post" role="form">


          <div class="form-group" >
                <input class="form-control" id="ordem_servico" name="ordem_servico" type="text" placeholder="Ordem Serviço" value="<?=$ordem_servico; ?>" >
          </div>

          <div class="form-group">
                <input id="cliente" name="cliente" type="text" value="<?=$nomeCliente; ?>" placeholder="Cliente" class="form-control">
          </div>


          <div class="form-group">
            <input type="text" class="form-control" placeholder="Data Venda Inicial" id="datepicker" name="dt-ini">
            <input type="hidden" id="dt_inicial" placeholder="data inicial" name="dt_inicial" class="form-control">
          </div>  

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Data Venda Final" id="datepicker2" name="dt_fim">
            <input type="hidden" id="dt_final" name="dt_final" class="form-control">
          </div>           

          <div class="form-group">
            <select id="concluido" name="concluido" class="form-control"> 
                <option value="">Concluído</option> 
                <option value="0">Não</option> 
                <option value="1">Sim</option> 
            </select>
          </div>  
            
            <button type='submit' class='btn btn-default'>Pesquisar</button>

        </form>

        </div>
        </div>
    </div>


<script>

// Popula o Combo Box de Serviços
$(document).ready(function(){
        $.ajax({
        url: "<?=URL?>Ajax/getServicos.ajax.php",
        success: function(response){

            var parse = JSON.parse(response);
            var count = Object.keys(parse).length;

            for (var i = 0; i < count; i++) {

                var option = "<option value="+parse[i].id_tipo_servico+">"+parse[i].descricao+"</option>";
                $('#tp_servico').append(option);
            };
        },
        error: function( response ) {
            console.log( 'Deu merda', response ); 
        }
    });

    // Busca os funcionarios cadastrados
        $.ajax({
            url: "<?=URL?>Ajax/getFuncionario.ajax.php",
            success: function(response){

                var parse = JSON.parse(response);
                var count = Object.keys(parse).length;

                for (var i = 0; i < count; i++) {

                    var option = "<option value="+parse[i].id_funcionario+">"+parse[i].nome+"</option>";
                    
                    $('#funcionario').append(option);
                };

            },
            error: function( response ) {
                console.log( 'Deu merda', response ); 
            }
    });        
});

$('#datepicker').change(function(){
    var dt_ini = $('#datepicker').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#dt_inicial').attr("value", dt_ini));
});

$('#datepicker2').change(function(){
    var dt_final = $('#datepicker2').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#dt_final').attr("value", dt_final));
});


</script>


<?php

$qordem_servico = ($ordem_servico != '')  ? "and id = {$ordem_servico} " : '';
$qCliente = ($nomeCliente != '') ? "and nome like '%{$nomeCliente}%' " : '';
$qdata = ($dt_ini != '') ? "and data_venda between '{$dt_ini}' and '{$dt_fim}' " : '';
$qconcluido = ($concluido != '') ? "and concluido = '{$concluido}' " : '';

/*$queryN =  "select format(ss.valor,2,'de_DE') valor_total, ss.observacao obs, ss.*, tf.*, tc.* from tb_servico ss
                 inner join tb_funcionario tf 
                    on ss.funcionario = tf.id_funcionario
                 inner join tb_cliente tc
                    on ss.tb_cliente_id_cliente = tc.id_cliente
            where 1 = 1
            {$qid}
            {$qordem_servico}
            {$qfuncionario}
            {$qdata}
            {$qconcluido};";    

    ?>*/

//print_r($qordem_servico);    
    
   
    $queryN = "select * from ordem_servico
                where 1 = 1
                {$qordem_servico}
                {$qCliente}
    ";

//echo "query: " . $queryN;    

/*print_r($ordem_servico);
print_r($nomeCliente);
print_r($dt_ini);
print_r($dt_fim);
print_r($concluido);
*/

echo "   
    <table border='1' class='table table-hover'>
        <thead>
        <tr>
            <th>Ordem Serviço</th>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Data Venda</th>
            <th>Data Retirada</th>
            <th>Concluido</th>
            <th>Detalhes</th>
        </tr>
        </thead>
        <tbody>";


    $conn = Conexao::getInstace();
    $q = mysqli_query($conn, $queryN);
    $hoje = date('d/m/Y');

    while($t = mysqli_fetch_assoc($q)){
        $conc = $t['concluido'] == 0 ? 'Não' : 'Sim';
        $val = 'R$ ' . $t['valor'];

        $tabela = ($dt_fim <= $hoje && $conc == 'Não') ?  "<tr style='color:red'>" :  "<tr>";
        echo $tabela;
        echo "<td>{$t['id']}</td>";
        echo "<td>{$t['nome']}</td>";
        echo "<td>{$val}</td>";
        echo "<td>{$t['data_venda']}</td>";
        echo "<td>{$t['data_retirada']}</td>";
        echo "<td>{$conc}</td>";
        echo "<td><a href='/detalhesServico.php?id={$t['id']}'>Selecionar</a></td>";
        echo "</tr>";

        //print_r($t);
    }

    

    

    /*while($t = mysqli_fetch_assoc($q)){

        $conc = $t['concluido'] == 0 ? 'Não' : 'Sim';
        $dt_entrega = explode('-', $t['dt_entrega']);
        $dt_entrega = $dt_entrega[2] .'/'. $dt_entrega[1] .'/'. $dt_entrega[0];

        $tabela = ($dt_entrega <= $hoje && $conc == 'Não') ?  "<tr style='color:red'>" :  "<tr>";
        echo $tabela;
        echo "<td>{$t['nome']}</td>";
        echo "<td>{$t['valor_total']}</td>";
        echo "<td>{$dt_entrega}</td>";
        echo "<td>{$conc}</td>";
        echo "<td>{$t['obs']}</td>";
        echo "<td><a href='/detalhesServico.php?id={$t['id_servico']}'>Selecionar</a></td>";
        echo "</tr>";
    }*/

?>

        </tbody>
    </table>
<?php    
//}
?>
</body>
</html>