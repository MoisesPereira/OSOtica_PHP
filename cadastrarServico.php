<?php
//require('inicio.php');
require('header.php');
require('./model/db/Conexao.class.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$celular = isset($_GET['celular']) ? $_GET['celular'] : '';
$telefone = isset($_GET['telefone']) ? $_GET['telefone'] : '';
$idade = isset($_GET['idade']) ? $_GET['idade'] : '';

?>

<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="./model/insertServico.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">Novo Serviço</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="id_servico" name="id_servico" type="hidden" value="<?=$id; ?>" class="form-control">
                                <input id="nome_cliente" name="nome_cliente" type="text"
                                    value="<?=$nome; ?>" placeholder="Nome Cliente" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" 
                                    value="<?=$email; ?>" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" 
                                    value="<?=$telefone; ?>" placeholder="Telefone" class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="telefone" name="telefone" type="text" 
                                    value="<?=$celular; ?>" placeholder="Celular / Whats" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="idade" name="idade" type="text" 
                                    value="<?=$idade; ?>" placeholder="Idade" class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="valor" name="valor" type="text" placeholder="R$ Valor" class="form-control">
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                 <select id="concluido" name="concluido" placeholder="Concluido" class="form-control"> 
                                    <option value="0">Concluido o Serviço</option> 
                                    <option value="0">Não</option> 
                                    <option value="1">Sim</option> 
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Data Venda" id="datepicker2" name="data-venda">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Data Retirada" id="datepicker" name="data-retirada">
                            </div>
                        </div> 

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="forma_pagamento" name="forma_pagamento" type="text" placeholder="Forma de Pagamento" class="form-control">
                            </div>
                        </div>

                                                                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="observacao" name="observacao" type="text" placeholder="Observação" class="form-control">
                            </div>
                        </div>

 
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



</body>

</html>