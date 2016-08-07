<?php
//require('inicio.php');
require('header.php');
require('./model/db/Conexao.class.php');

/*$id = isset($_GET['id']) ? $_GET['id'] : '';
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$celular = isset($_GET['celular']) ? $_GET['celular'] : '';
$telefone = isset($_GET['telefone']) ? $_GET['telefone'] : '';
$idade = isset($_GET['idade']) ? $_GET['idade'] : '';
*/
?>

<script>
    jQuery(function($){
       $("#celular").mask("(99) 99999-9999");
       $("#telefone").mask("(99) 9999-9999");
    });

</script>

<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" id="cadastroServico" method="post" action="./model/insertServico.php" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center header">Novo Serviço</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="osmanual" name="osmanual" type="text" placeholder="Número da OS" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nome_cliente" name="nome_cliente" type="text" placeholder="Nome Cliente" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="endereco" name="endereco" type="text" placeholder="Endereço" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="bairro" name="bairro" type="text" placeholder="Bairro" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" minlength="5" type="text" placeholder="Email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="telefone" name="telefone" type="text" placeholder="Telefone" class="form-control">
                            </div>
                        </div>                        

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="celular" name="celular" type="text" placeholder="Celular / Whats" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                 <select id="atraves" name="atraves" class="form-control"> 
                                    <option value="">Através De:</option> 
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
                                <input id="idade" name="idade" type="text" placeholder="Idade" class="form-control">
                            </div>
                        </div>                        


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required placeholder="Data Venda" readonly='true' id="datepicker" name="data_venda">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" class="form-control" required placeholder="Data Retirada" readonly='true' id="datepicker2" name="data_retirada">
                            </div>
                        </div> 


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <select id="tipo_armacao" name="tipo_armacao" class="form-control"> 
                                    <option value="">Tipo da Armação:</option> 
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
                                <input id="armacao" name="armacao" type="text" placeholder="Armação" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lente" name="lente" type="text" placeholder="Lente" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="grau_longe_od" name="grau_longe_od" type="text" 
                                    placeholder="Grau Longe Olho Direito"  class="form-control">
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="grau_longe_oe" name="grau_longe_oe" type="text" 
                                    placeholder="Grau Longe Olho Esquerdo"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="grau_perto_od" name="grau_perto_od" type="text" 
                                    placeholder="Grau Perto Olho Direito"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="grau_perto_oe" name="grau_perto_oe" type="text" 
                                    placeholder="Grau Perto Olho Esquerdo"  class="form-control">
                            </div>
                        </div>                        


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="dp" name="dp" type="text" 
                                    placeholder="DP"  class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="altura" name="altura" type="text" 
                                    placeholder="Altura"  class="form-control">
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
                                <input id="forma_pagamento" name="forma_pagamento" type="text" placeholder="Forma de Pagamento" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="vendedor" name="vendedor" type="text" placeholder="Vendedor" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="observacao" name="observacao" placeholder="Observação" rows="7" ></textarea>
                            </div>
                        </div>                        

 
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Salvar</button>
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