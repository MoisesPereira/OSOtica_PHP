<?php
require('inicio.php');
require('./model/db/Conexao.class.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="well well-sm">
        <fieldset>
            <legend class="text-center header">Encontre Cliente</legend>
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
            <label for="celular">Celular:</label>
            <input type="text" class="form-control" id="celular" name="celular">
          </div>  

          <p id="submit-cliente" class="btn btn-default">Submit</p>
        </form>

        </div>
        </div>
    </div>

    <table border="1" id="rstable" class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Escolha o Cliente</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

<script>
//Chama o ajax que retorna os clientes
$('#submit-cliente').click(function(event) {

    $('#rstable tbody').html('');

    var nome = $('#nome').val();
    var email = $('#email').val();
    var celular = $('#celular').val();

    $.ajax({
        url: "<?=URL?>Ajax/getClientes.ajax.php?nome="+nome+"&email="+email+"&celular="+celular,
        success: function(response){

            var parse = JSON.parse(response);

            var count = Object.keys(parse).length;

            for (var i = 0; i < count; i++) {
                var table = "<tr><td>" + parse[i].nome + "</td>";
                table += "<td>" + parse[i].email + "</td>"; 
                table += "<td>" + parse[i].celular + "</td>";  
                table += "<td><a href='/cadastrarServico.php?id=" + parse[i].id_cliente + "&nome="+
                     parse[i].nome + "&email=" + parse[i].email + "&celular=" + parse[i].celular +"'>Selecionar</a></td></tr>";  

                $('#rstable tbody').append(table);
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