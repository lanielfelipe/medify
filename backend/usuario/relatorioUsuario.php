<?php


//requer conexao com banco
require_once '../../backend/database/conexao.php';

$mensagem_erro = ' ';


try{

    $preparo = $conexao->prepare("
        select
        u.id,
        u.nome,
        u.sobrenome,
        u.telefone,
        u.login,
        u.cargo,
        t.descricao
        from tb_usuario u
        inner join tb_tipo t on t.id = u.cargo
    ");
    //executa a query
    $preparo->execute();

    //coloca o resultado em um array usando fetch_assoc
    $relatorio = $preparo->fetchALL();

    //###TESTAR se deu certo remover dps#####
    //foreach($relatorio as $linha)
    //print_r($linha);

}catch(PDOException $erro){
    //imprime o erro na tela
    print_r($erro);

}