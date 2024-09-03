


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
  <link rel="stylesheet" href="usuario.css">
  <link rel="stylesheet" href="../../componentes/menu/menu.php">
 </head>
 <body>
    <?php
    include_once '../../componentes/menu/menu.php' ;
    ?>
    <section class="pagina">
<header>
<h1>administração | LOGIN</h1>
</header>
<form action="../../backend/usuario/criarUsuario.php" method="post">
    <div class="inputs">
     <div class="linha">
    <input type="text" name="nome" placeholder="nome">
    <input type="text" name="sobrenome" placeholder="sobrenome">
   </div>
    <input type="text" placeholder="endereço">
    </div>

    <div class="linha">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="telefone" placeholder="telefone">
    </div>
    <div class="linha">
    <input type="text"  name="usuario" placeholder="usuário">
<select  name="tipo">
    <option value="">tipo de usuario</option>
    <option value="300">administrador</option>
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
   <th>Nome</th>
   <th>telefone</th>
   <th>login</th>
   <th>cargo</th>
    </tr>
    <tr>
        <td><button>Excluir</button></td>
        <td>1</td>
        <td>Tio do pave</td>
        <td>7070-7070</td>
        <td>pave_pacume</td>
        <td>piadista</td>
    </tr>
    <?php
    //Utilizar
    //para iterar entre os itens do array
    //que é nosso $relatorio

    foreach($relatorio  as $usuario){
        echo("
        <tr>
        <td><button>Excluir</button></td>
        <td>".$usuario['id']."</td>
        <td>".$usuario['nome']." ".$usuario['sobrenome']."</td>
        <td>".$usuario['telefone']."</td>
        <td>".$usuario['login']."</td>
        <td>".$usuario['descricao']."</td>
    </tr>
    ");
        
    }
        

 

   ?>
   </table>

   </div>    
   </section>
    <p></p>
    </body>
   </html>