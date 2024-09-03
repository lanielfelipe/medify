



<?php
include_once '../../backend/usuario/relatorioUsuario.php';



//inicializa uma variavel com nome de mensagem com o valor null
$mensagem = null;
//verifica se recebeu alguma informação por meio do GET
if($_GET){
    //verifica se essa informação é um status
    if($_GET['status']){
        switch($_GET['status']){
            //utiliza a estrutura de decisão switch para verificar qual
            //status foi recebido e atribuir uma mensagem conforme necessario
           case 201:
            //criado
            $mensagem = 'Adicionado com sucesso!';
            break;
            case 400:
                //bad request
                $mensagem = 'inserção não funcionou';
                break;
            case 500:
                //erro do servidor
                $mensagem = 'Erro ao tentar inserir informações';
                break;





        }
    }
}




?>













<html>
 <head>
     <title>usuario | Medify</title>
  <link rel="stylesheet" href="medicamento.css">
  <link rel="stylesheet" href="../../componentes/menu/menu.php">
 </head>
 <body>
    <?php
    include_once '../../componentes/menu/menu.php' ;
    ?>
    <section class="pagina">
<header>
<h1>administração | Medicamento</h1>
</header>
<form action="../../backend/usuario/criarUsuario.php" method="post">
    <div class="inputs">
     <div class="linha">
    <input type="text" name="nome do medicamento" placeholder="nome do medicamento">
    <input type="text" name="preço" placeholder="preço">
   </div>
    <input type="text" placeholder="quantidade">
    </div>

    
<select  name="tipo">
    <option value="">tipo de medicamento</option>
    <option value="300">restrito</option>
    <option value="301">normal</option>
</select>
    </div>
<div class="controles">
    <button type="submit" class="salvar">salvar</button>
    <button type="reset" class="cancelar">cancelar</button>
<?php
  echo('');
?>

</div>

</form>

<div class="relatorio">
<h1>Relatório</h1>
<table>
    <tr>
        <th>Ação</th>
   <th>id</th>
   <th>medicamento</th>
   <th>preço</th>
   <th>quantidade</th>
   <th>tipo</th>
    </tr>
    <tr>
        <td><button>Excluir</button></td>
        <td>1223</td>
        <td>dipirona</td>
        <td>25</td>
        <td>100</td>
        <td>normal</td>
    </tr>
    <tr>
        <td><button>Excluir</button></td>
        <td>12222</td>
        <td>paracetamol</td>
        <td>15</td>
        <td>150</td>
        <td>normal</td>
    </tr>
    <?php
    //Utilizar
    //para iterar entre os itens do array
    //que é nosso $relatorio

    foreach($relatorio  as $medicamento){
     echo("
      
    ");
        
    }
        

 

   ?>
   </table>

   </div>    
   </section>
    <p></p>
    </body>
   </html>