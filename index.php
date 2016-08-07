<?php
//session_start();

//require('inicio.php');
require('header.php');
require('./model/db/Conexao.class.php');

$ordem_servico = isset($_POST['ordem_servico']) ? $_POST['ordem_servico'] : '';
$nomeCliente = isset($_POST['cliente']) ? $_POST['cliente'] : '';


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

          <div class="form-group">
                <input id="cliente" name="cliente" type="text" value="<?=$nomeCliente; ?>" placeholder="Cliente" class="form-control">
          </div>

          <div class="form-group" >
                <input class="form-control" id="ordem_servico" name="ordem_servico" type="text" placeholder="Ordem Serviço" value="<?=$ordem_servico; ?>" >
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

$qordem_servico = ($ordem_servico != '')  ? "and os_manual = {$ordem_servico} " : '';
$qCliente = ($nomeCliente != '') ? "and nome like '%{$nomeCliente}%' " : '';

$queryN = "select * from ordem_servico
            where 1 = 1
            {$qordem_servico}
            {$qCliente}
";

echo "   
    <table border='1' class='table table-hover'>
        <thead>
        <tr>
            <th>Ordem Serviço</th>
            <th>Cliente</th>
            <th>Valor</th>
            <th>Data Venda</th>
            <th>Data Retirada</th>
            <th>Detalhes</th>
        </tr>
        </thead>
        <tbody>";


    $conn = Conexao::getInstace();
    $q = mysqli_query($conn, $queryN);
    $hoje = date('d/m/Y');

    while($t = mysqli_fetch_assoc($q)){
        //$conc = $t['concluido'] == 0 ? 'Não' : 'Sim';
        $val = 'R$ ' . $t['valor'];


        
        //echo "dt_venda[2]" . $dt_venda[2]. "<br>" . "dt_venda[1]" . $dt_venda[1]. "<br>" . "dt_venda[0]" . $dt_venda[0]. "<br>";
        
        $dt_venda = $t['data_venda'];
        if(!strstr($t['data_venda'], "/")){
            $dt_venda = explode('-', $t['data_venda']);
            $dt_venda = $dt_venda[2].'/'. $dt_venda[1] .'/'. $dt_venda[0];
        }

        $dt_retirada = $t['data_retirada'];
        if(!strstr($t['data_retirada'], "/")){
            $dt_retirada = explode('-', $t['data_retirada']);
            $dt_retirada = $dt_retirada[2] .'/'. $dt_retirada[1] .'/'. $dt_retirada[0];  
        }

     


        echo "<tr>";
        echo "<td>{$t['os_manual']}</td>";
        echo "<td>{$t['nome']}</td>";
        echo "<td>{$val}</td>";
        echo "<td>{$dt_venda}</td>";
        echo "<td>{$dt_retirada}</td>";
        echo "<td><a href='/detalhesServico.php?id={$t['id']}'>Selecionar</a></td>";
        echo "</tr>";

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