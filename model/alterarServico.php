<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require('./db/Conexao.class.php');
require('../WideImage/lib/WideImage.php');
require('../config.php');

$getUrl = URL;

$id = isset($_POST['id_servico']) ? $_POST['id_servico'] : '';
$nome = isset($_POST['fname']) ? $_POST['fname'] : '';

$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : '';
$valor = isset($_POST['valor']) ? $_POST['valor'] : '';
$valor = str_replace(',','.',str_replace('.','',$valor));
$forma_pagamento = isset($_POST['forma_pagamento']) ? $_POST['forma_pagamento'] : '';
$concluido = isset($_POST['concluido']) ? $_POST['concluido'] : '';

$dt_orcamento = isset($_POST['data_orcamento']) ? $_POST['data_orcamento'] : '';
if($dt_orcamento != ''){$dt_orcamento = explode('/', $dt_orcamento); $dt_orcamento = $dt_orcamento[2].'-'.$dt_orcamento[1].'-'.$dt_orcamento[0];}

$dt_entrada = isset($_POST['data_entrada']) ? $_POST['data_entrada'] : '';
if($dt_entrada != ''){$dt_entrada = explode('/', $dt_entrada); $dt_entrada = $dt_entrada[2].'-'.$dt_entrada[1].'-'.$dt_entrada[0];}

$dt_entrega = isset($_POST['data_entrega']) ? $_POST['data_entrega'] : '';
if($dt_entrega != ''){$dt_entrega = explode('/', $dt_entrega); $dt_entrega = $dt_entrega[2].'-'.$dt_entrega[1].'-'.$dt_entrega[0];}

$observacao = isset($_POST['observacao']) ? $_POST['observacao'] : '';
$gasto1 = isset($_POST['gasto1']) ? $_POST['gasto1'] : '';
$valor1 = isset($_POST['valor1']) ? $_POST['valor1'] : '';
$valor1 = str_replace(',','.',str_replace('.','',$valor1));

$gasto2 = isset($_POST['gasto2']) ? $_POST['gasto2'] : '';
$valor2 = isset($_POST['valor2']) ? $_POST['valor2'] : '';
$valor2 = str_replace(',','.',str_replace('.','',$valor2));

$gasto3 = isset($_POST['gasto3']) ? $_POST['gasto3'] : '';
$valor3 = isset($_POST['valor3']) ? $_POST['valor3'] : '';
$valor3 = str_replace(',','.',str_replace('.','',$valor3));

$gasto4 = isset($_POST['gasto4']) ? $_POST['gasto4'] : '';
$valor4 = isset($_POST['valor4']) ? $_POST['valor4'] : '';
$valor4 = str_replace(',','.',str_replace('.','',$valor4));

$gasto5 = isset($_POST['gasto5']) ? $_POST['gasto5'] : '';
$valor5 = isset($_POST['valor5']) ? $_POST['valor5'] : '';
$valor5 = str_replace(',','.',str_replace('.','',$valor5));

/* Tipos e Subtipos de Serviços */
$tp_reforma = isset($_POST['tp_reforma']) ? $_POST['tp_reforma'] : '';
$tp_confeccao = isset($_POST['tp_confeccao']) ? $_POST['tp_confeccao'] : '';
$tp_manutencao = isset($_POST['tp_manutencao']) ? $_POST['tp_manutencao'] : '';
$tp_venda = isset($_POST['tp_venda']) ? $_POST['tp_venda'] : '';

$sb_sofa = isset($_POST['sb_sofa']) ? $_POST['sb_sofa'] : '';
$sb_poltrona = isset($_POST['sb_poltrona']) ? $_POST['sb_poltrona'] : '';
$sb_bergere = isset($_POST['sb_bergere']) ? $_POST['sb_bergere'] : '';
$sb_cadeira = isset($_POST['sb_cadeira']) ? $_POST['sb_cadeira'] : '';
$sb_capa = isset($_POST['sb_capa']) ? $_POST['sb_capa'] : '';
$sb_almofada = isset($_POST['sb_almofada']) ? $_POST['sb_almofada'] : '';
$sb_puff = isset($_POST['sb_puff']) ? $_POST['sb_puff'] : '';
$sb_cabeceira = isset($_POST['sb_cabeceira']) ? $_POST['sb_cabeceira'] : '';
$sb_futon = isset($_POST['sb_futon']) ? $_POST['sb_futon'] : '';
$sb_cheise = isset($_POST['sb_cheise']) ? $_POST['sb_cheise'] : '';
$sb_outros = isset($_POST['sb_outros']) ? $_POST['sb_outros'] : '';
/** Tipos e Subtipos de Serviços **/

$sql = "update tb_servico
         set
         funcionario = {$funcionario},
         valor = '{$valor}',
         forma_pagamento = {$forma_pagamento},
         concluido = {$concluido},
         dt_orcamento = '{$dt_orcamento}',
         dt_cadastro = '{$dt_entrada}',
         dt_entrega = '{$dt_entrega}',
         observacao = '{$observacao}',
         gasto1 = '{$gasto1}',
         valor1 = '{$valor1}',
         gasto2 = '{$gasto2}',
         valor2 = '{$valor2}',
         gasto3 = '{$gasto3}',
         valor3 = '{$valor3}',
         gasto4 = '{$gasto4}',
         valor4 = '{$valor4}',
         gasto5 = '{$gasto5}',
         valor5 = '{$valor5}',
         tp_reforma = '{$tp_reforma}',
         tp_confeccao = '{$tp_confeccao}',
         tp_manutencao = '{$tp_manutencao}',
         tp_venda = '{$tp_venda}',
         sb_sofa = '{$sb_sofa}',
         sb_poltrona = '{$sb_poltrona}',
         sb_bergere = '{$sb_bergere}',
         sb_cadeira = '{$sb_cadeira}',
         sb_capa = '{$sb_capa}',
         sb_almofada = '{$sb_almofada}',
         sb_puff = '{$sb_puff}',
         sb_cabeceira = '{$sb_cabeceira}',
         sb_futon = '{$sb_futon}',
         sb_cheise = '{$sb_cheise}',
         sb_outros = '{$sb_outros}'
         where id_servico = {$id};";

/*echo "<pre>";
print_r($sql);
die('fim');*/

$conn = Conexao::getInstace();
$q = mysqli_query($conn, $sql);

   if(isset($_FILES['imagem']))
   {
      date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

      $name = $_FILES['imagem']['name']; // Atribui um array com os nomes dos arquivos à variavel

      $tmp_name = $_FILES['imagem']['tmp_name']; // Atribui um array com os nomes temporarios


      $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); // Extensões permitidas

      $dir = '../uploads/'; //Diretório para uploads

      for($i = 0; $i < count($tmp_name); $i++){

         $ext = strtolower(substr($name[$i],-4));

         if(in_array($ext, $allowedExts)){ // Verifica se a extensão é permitida

            $new_name = date("Y.m.d-H.i.s") . "-" . $i . $ext;

            $image = WideImage::load($tmp_name[$i]);  //Carrega imagem utilizando o WideImage

            $image = $image->resize(800, 600, 'outside'); //Redimensiona a imagem para 170 width e 180 height, mantendo a proporção original

            $image = $image->crop('center', 'center', 800, 600); //Corta a imagem do centro forçando sua altura e largura

            $image->saveToFile($dir.$new_name); //Salva a imagem

         $sqlImg = "insert into tb_imagem (descricao, dt_cadastro, tb_servico_id_servico) values ('{$new_name}', now(), '{$id}');";

            try {

               $qImg = mysqli_query($conn, $sqlImg);

               //var_dump($sqlImg);
               //die('55');

               if($qImg){
                  echo "cadastro realizado com sucesso!";
                  echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL={$getUrl}detalhesServico.php?id={$id}'>";
               }
               
            } catch (Exception $e) {
               
               print_r($e);
            }
            
         } 

      }
   }     

   if($q){
      echo "Alteração realizada com sucesso!";
      echo "<meta http-equiv='refresh' content='2;url={$getUrl}detalhesServico.php?id={$id}'/>";
   }

?>