<?php
require('header.php');
require('./model/db/Conexao.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';

// Variaveis que vão receber os valors da query
$nome_cliente; $email; $telefone; $celular; $idade; $data_venda; $data_retirada;

$armacao; $lente; $grau_longe_od; $grau_longe_oe; $grau_perto_od; $grau_perto_oe; $forma_pagamento;
$valor; $concluido; $observacao; $tipo_armacao; $atraves_de; $dp; $altura; $endereco; $bairro;
// Variaveis que vão receber os valors da query

$conn = Conexao::getInstace();

$sql = "select format(os.valor,2,'de_DE')valor, os.* from ordem_servico os where id = {$id}";


$q = mysqli_query($conn, $sql);

    while($t = mysqli_fetch_assoc($q)){
        $nome_cliente = $t['nome']; $email = $t['email']; $telefone = $t['telefone'];
        $celular = $t['celular']; $idade = $t['idade']; $data_venda = $t['data_venda'];
        $data_retirada = $t['data_retirada']; $armacao = $t['armacao']; $lente = $t['lente'];
        $grau_longe_od = $t['grau_longe_od']; $grau_longe_oe = $t['grau_longe_oe']; $grau_perto_od = $t['grau_perto_od'];
        $grau_perto_oe = $t['grau_perto_oe']; $forma_pagamento = $t['forma_pagamento'];
        $valor = number_format($t['valor'],2,",","."); $concluido = $t['concluido']; $observacao = $t['observacao']; 
        $osmanual = $t['os_manual']; $tipo_armacao = $t['tipo_armacao']; $atraves_de = $t['atraves_de'];
        $dp = $t['dp']; $altura = $t['altura']; $endereco = $t['endereco']; $bairro = $t['bairro']; $vendedor = $t['vendedor']; 
    }



if(!strstr($data_venda, "/")){
    $data_venda = explode('-', $data_venda); 
    $data_venda = $data_venda[2].'/'.$data_venda[1].'/'.$data_venda[0];
}

if(!strstr($data_retirada, "/")){
    $data_retirada = explode('-', $data_retirada); 
    $data_retirada = $data_retirada[2].'/'.$data_retirada[1].'/'.$data_retirada[0];
}



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./model/alterarServico.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">Ordem de Serviço: <b style='color:red'><?=$osmanual; ?></b> </legend>

                        <p class="text-center header">Cliente</p>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Nome:</label>
                                <input id="id" name="id" type="hidden" value="<?php echo $id; ?>" class="form-control">
                                <input id="nome_cliente" name="nome_cliente" type="text" value="<?php echo $nome_cliente; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Endereço:</label>
                                <input id="endereco" name="endereco" type="text" value="<?php echo $endereco; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Bairro:</label>
                                <input id="bairro" name="bairro" type="text" value="<?php echo $bairro; ?>" class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Email:</label>
                                <input id="email" name="email" type="text" value="<?php echo $email; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Telefone:</label>
                                <input id="telefone" name="telefone" type="text" value="<?php echo $telefone; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Celular:</label>
                                <input id="celular" name="celular" type="text" value="<?php echo $celular; ?>" placeholder="Celular" class="form-control">
                            </div>
                        </div>



                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Através De:</label>
                                <select id="atraves_de" name="atraves_de" class="form-control"> 
                                    <option value="<?php echo $atraves_de ?>"><?php echo $atraves_de ?></option> 
                                    <option value="cliente">Cliente</option> 
                                    <option value="convenio">Convênio</option> 
                                    <option value="indicacao">Indicação</option> 
                                    <option value="passagem">Passagem</option> 
                                    <option value="propaganda">Propaganda</option> 
                                    <option value="outros">Outros</option> 
                                </select>
                            </div>
                        </div>   


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Idade:</label>
                                <input id="idade" name="idade" type="text" value="<?php echo $idade; ?>" placeholder="Idade" class="form-control">
                            </div>
                        </div>        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Data Venda:</label>
                                <input name="data_venda" type="text" id="datepicker" readonly='true' value="<?php echo $data_venda; ?>" placeholder="Data Venda" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Data Retirada:</label>
                                <input name="data_retirada" type="text" id="datepicker2" readonly='true' value="<?php echo $data_retirada; ?>" placeholder="Data Retirada" class="form-control">
                            </div>
                        </div>    


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Tipo Armação:</label>
                                <select id="tipo_armacao" name="tipo_armacao" class="form-control"> 
                                    <option value="<?php echo $tipo_armacao ?>"><?php echo $tipo_armacao ?></option> 
                                    <option value="acetato">Acetato</option> 
                                    <option value="balgriff">Balgriff</option> 
                                    <option value="lenteContato">Lente de Contato</option> 
                                    <option value="metal">Metal</option> 
                                    <option value="nylon">Nylon</option> 
                                    <option value="outros">Outros</option> 
                                </select>
                            </div>
                        </div>     
                                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Armação:</label>
                                <input id="armacao" name="armacao" type="text" value="<?php echo $armacao; ?>" placeholder="Armação" class="form-control">
                            </div>
                        </div>  

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Lente:</label>
                                <input id="lente" name="lente" type="text" value="<?php echo $lente; ?>" placeholder="Lente" class="form-control">
                            </div>
                        </div> 


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Grau Longe Olho Direito:</label>
                                <input id="grau_longe_od" name="grau_longe_od" type="text" value="<?php echo $grau_longe_od; ?>" placeholder="Grau Longe Olho Direito" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Grau Longe Olho Esquerdo:</label>
                                <input id="grau_longe_oe" name="grau_longe_oe" type="text" value="<?php echo $grau_longe_oe; ?>" placeholder="Grau Longe Olho Esquerdo" class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Grau Perto Olho Direito:</label>
                                <input id="grau_perto_od" name="grau_perto_od" type="text" value="<?php echo $grau_perto_od; ?>" placeholder="Grau Perto Olho Direito" class="form-control">
                            </div>
                        </div>  

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Grau Perto Olho Esquerdo:</label>
                                <input id="grau_perto_oe" name="grau_perto_oe" type="text" value="<?php echo $grau_perto_oe; ?>" placeholder="Grau Perto Olho Esquerdo" class="form-control">
                            </div>
                        </div>  

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>DP:</label>
                                <input id="dp" name="dp" type="text" value="<?php echo $dp; ?>" placeholder="DP"  class="form-control">
                                    
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Altura:</label>
                                <input id="altura" name="altura" type="text" value="<?php echo $altura; ?>"
                                    placeholder="Altura"  class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Valor:</label>
                                <input id="valor" name="valor" type="text" value="<?php echo $valor; ?>" class="form-control">
                            </div>
                        </div>   

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Forma de Pagamento:</label>
                                <input id="forma_pagamento" name="forma_pagamento" type="text" value="<?php echo $forma_pagamento; ?>" placeholder="Forma Pagamento" class="form-control">                            
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Vendedor:</label>
                                <input id="vendedor" name="vendedor" value="<?php echo $vendedor; ?>" type="text" placeholder="Vendedor" class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                            <label>Observação:</label>
                                <textarea class="form-control" id="observacao" name="observacao" rows="7" ><?php echo $observacao; ?></textarea>
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