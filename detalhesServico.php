<?php
//session_start();

require('header.php');
require('./model/db/Conexao.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';



$conn = Conexao::getInstace();

/*
$query = "select tc.nome cliente, tc.email, tc.telefone, tc.celular, tc.celular2, tc.endereco, 
        tc.bairro, tc.cidade, tc.estado, tc.cep, tc.referencia, format(ss.valor,2,'de_DE') valor, 
        ss.concluido, ss.dt_cadastro dt_entrada, ss.dt_entrega, ss.observacao, ss.gasto1, format(ss.valor1,2,'de_DE') valor1, 
        ss.gasto2, format(ss.valor2,2,'de_DE') valor2, ss.gasto3, format(ss.valor3,2,'de_DE') valor3, 
        ss.gasto4, format(ss.valor4,2,'de_DE') valor4, ss.gasto5, format(ss.valor5,2,'de_DE') valor5, 
        ss.dt_orcamento, ss.tp_reforma, ss.tp_confeccao, ss.tp_manutencao, ss.tp_venda, ss.sb_sofa, ss.sb_poltrona,
        ss.sb_bergere, ss.sb_cadeira, ss.sb_capa, ss.sb_almofada, ss.sb_puff, ss.sb_cabeceira, ss.sb_futon,
        ss.sb_cheise, ss.sb_outros,
        tf.id_funcionario, tf.nome funcionario, tfp.id_forma_pagamento, tfp.descricao 
from tb_servico ss 
        inner join tb_cliente tc on ss.tb_cliente_id_cliente = tc.id_cliente 
        inner join tb_funcionario tf on ss.funcionario = tf.id_funcionario 
        inner join tb_forma_pagamento tfp on ss.forma_pagamento = tfp.id_forma_pagamento
    where ss.id_servico = {$id}";

$queryImg = "select * from tb_imagem where tb_servico_id_servico = {$id}";

$rstQuery = mysqli_query($conn, $query);
$rstImage = mysqli_query($conn, $queryImg);

$t = mysqli_fetch_assoc($rstQuery);

$data_orcamento = explode('-', $t['dt_orcamento']);
$data_orcamento = $data_orcamento[2].'/'.$data_orcamento[1].'/'.$data_orcamento[0];

$data_entrada = explode('-', $t['dt_entrada']);
$data_entrada = $data_entrada[2].'/'.$data_entrada[1].'/'.$data_entrada[0];

$data_entrega = explode('-', $t['dt_entrega']);
$data_entrega = $data_entrega[2].'/'.$data_entrega[1].'/'.$data_entrega[0];

$imagens = array();
$i = 0;

while($img = mysqli_fetch_assoc($rstImage)){
    $imagens[$i] = $img['descricao'];
    $i++;
}

*/

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./model/alterarServico.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">Ordem de Serviço: <b style='color:red'><?=$id; ?></b> </legend>

                        <p class="text-center header">Cliente</p>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Nome:</label>
                                <input id="id_servico" name="id_servico" type="hidden" value="<?=$id; ?>" class="form-control">
                                <input id="fname" name="fname" type="text" value="<?php 'echo $t["cliente"]'; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Email:</label>
                                <input id="email" name="email" type="text" value="<?php 'echo $t["email"]'; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Telefone:</label>
                                <input id="phone" name="phone" type="text" value="<?php 'echo $t["telefone"]'; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Celular:</label>
                                <input id="celular" name="celular" type="text" value="<?php 'echo $t["celular"]'; ?>" placeholder="Celular" class="form-control">
                            </div>
                        </div>

        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Valor:</label>
                                <input id="valor" name="valor" type="text" value="<?php 'echo $t["valor"]'; ?>" class="form-control">
                            </div>
                        </div>       

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Forma de Pagamento:</label>
                                <select id="forma_pagamento" name="forma_pagamento" placeholder="Forma Pagamento" class="form-control"> 
                                    <option value="<?php 'echo $t["id_forma_pagamento"]'; ?>" selected><?php 'echo $t["descricao"]'; ?></option> 
                                </select>                                
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Concluido:</label>
                                 <select id="concluido" name="concluido" placeholder="Concluido" class="form-control"> 
                                    <!--<option <?= $t['concluido'] == 0 ? 'selected' : ''; ?> value="0">Não</option> 
                                    <option <?= $t['concluido'] == 1 ? 'selected' : ''; ?> value="1">Sim</option> -->
                                </select>                                
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Data de Entrada:</label>
                                <input id="datepicker" name="dt_entrada" type="text" value="<?php echo '$data_entrada'; ?>" class="form-control">
                                <input type="hidden" id="data_entrada" value="<?php echo '$data_entrada'; ?>" name="data_entrada" class="form-control">
                            </div>
                        </div>                         

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Data de Entrega:</label>
                                <input id="datepicker2" name="dt_entrega" type="text" value="<?php echo '$data_entrega'; ?>" class="form-control">
                                <input type="hidden" id="data_entrega" value="<?php echo '$data_entrega'; ?>" name="data_entrega" class="form-control">
                            </div>
                        </div> 



                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Observação:</label>
                                <textarea class="form-control" id="observacao" name="observacao" rows="7" ><?php echo '$t[observacao]'; ?></textarea>
                            </div>
                        </div>


                  

                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">Fechar</button>
                        </div>
                        <div class="modal-body">
                        </div>
                       </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Alterar</button>
                            <a href="/orcamento.php?id=<?=$id?>" class="btn btn-primary btn-lg" >Orçamento<a>
                        </div>
                    </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

$('#datepicker').change(function(){
    var dt_entrega = $('#datepicker').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#data_entrega').attr("value", dt_entrega));
});

$('#datepicker2').change(function(){
    var dt_entrada = $('#datepicker2').datepicker({dateFormat: 'dd,MM,YYYY'}).val();
    $('input').append($('#data_entrada').attr("value", dt_entrada));
});


$(document).ready(function(){

        // Busca os Serviços
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

        // Busca as formas de pagamento
        $.ajax({
            url: "<?=URL?>Ajax/getFormaPagamento.ajax.php",
            success: function(response){

                var parse = JSON.parse(response);
                var count = Object.keys(parse).length;

                for (var i = 0; i < count; i++) {

                    var option = "<option value="+parse[i].id_forma_pagamento+">"+parse[i].descricao+"</option>";
                    
                    $('#forma_pagamento').append(option);
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
</script>

</body>

</html>