<?php

//Requer conexão com banco de dados 
require_once '../database/conexao.php';
//Coloca todas as informações recebidas via post 
//em uma variavel para ser utilizada posteriormente

$requisicao = $_POST;
$senha = sha1('123Mudar!')

//utiliza uma estrutura de tentativa para tentar
//inserir as informações no banco de dados 
try{

    //utiliza o metodo prepare() da variavel conexão que esta disponivel
    //no arquivo por meio do require_once), para preparar ima instrução
    //sql (banco de dados)
    $preparacao = $conexao->prepare(`
        insert into tb_usuario(
            nome, sobrenome, endereco, telefone, login, senha, tipo

        ) values(
            :nome, :sobrenome, :endereco, :telefone, :login, :senha, :tipo
        )
    
    
    `);
    //utiliza o metodo bindParam da classe preparedStatement disponivel
    //na variavel preparação, que recebeu a preparação acima 
    //A função bindParam troca um dos parametros da instrução sql pelo
    //valor contido em uma variavel. Não esquecer de mudar o tipo no ultimo argumento.
    $preparecao->bindParam(':nome',$requisicao['nome'], PDO::PARAM_STR);
    $preparecao->bindParam(':sobrenome',$requisicao['sobrenome'], PDO::PARAM_STR);
    $preparecao->bindParam(':endereco',$requisicao['endereco'], PDO::PARAM_STR);
    $preparecao->bindParam(':telefone',$requisicao['telefone'], PDO::PARAM_STR) ;
    $preparecao->bindParam(':login',$requisicao['usuario'], PDO::PARAM_STR);
    $preparecao->bindParam(':senha',$senha, PDO::PARAM_STR);
    $preparecao->bindParam(':tipo',$requisicao['tipo'], PDO::PARAM_INT);
   //ao final da troca do parametros, estamos prontos para executar
   //a instrução, por isso utilizamos o metodo execute( ) da classe 
   //PreparedStatement
    $preparacao->execute();
    //Ao executar, precisamos verificar se o valor foi de fato 
    //inserido no banco de dados, para isso verificamos se o valor do 
    //rowCont() é ingual a 1 (quantidade de linhas inseridas)
    if($preparacao-rowCount()==1){
        //Caso isso seja positivo, retorna para a pagina de cadastro
        //com o status 201(created)
        header('location: ../../paginas/cad-usuario/usuario.php?status=201')
        //Morre a execução para evitar lacunas de segurança
        die();
}else{
    //Caso a quantidade não seja 1 retorna com o status
    //400 (bad request), informando que faltou algo
    header('location: ../../paginas/cad-usuario/usuario.php?status=400')
    //morre a execução para evitar lacunas de segurança

}



}    catch(PDOException $erro){
    $preparecao->bindParam(':nome',$requisicao['nome'],PDO::PARAM_STR)
       //executa caso receba algum erro
       //volta para a pagina de cadastro e apresenta
       //um erro do tipo 500(server erro)

       header('location: ../../paginas/cad-usuario/usuario.php?erro=500');



}

print_r($requisicao);









?>
