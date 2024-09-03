<?php

$erro=null;
if($_GET){
    if($_GET['erro']){
        $erro = $_GET['erro'];
    }
}
?>
<html>


    <head>  
        <title>login | Medify</title>
        <link rel="stylesheet" href="index.css">
        <meta charset="utf-8" >
    </head>
    <body>
      
        <section class="container" >
            <form action="backend/login/login.php" method="post">
<header id="cabecalho">
            <span>
              <h1>Medify</h1>
              <p>farmácia digital</p>
            </span>  
          
            
            <section class="quadrado" >                      
            <article>
              
                <div class="linha"><input type="text" placeholder="Nome de Usuário" name="usuario"></div>
                 <div class="linha"><input type="password" placeholder="Senha" name="senha"></div>
                 <a href="esqueceu a senha?">esqueceu a senha?</a> 
                 <button type="submit">entrar</button>
               
                 <section class="botao2"> 
                 <button>criar conta</button>
            </article>
            </section>
            </section>
            </form>
            <?php

            if($erro !=null){
                switch($erro){
                    case'401':
                    echo("<p class=\"erro\">Usuário ou senha inválido</p>");
                        break;
                    case'500';
                    echo("<p class=\"erro\">Erro no servidor , tente novamente, mais tarde</p>");
                    break;    
          }
         }

         ?>
 ></section>             
   </section>
        </body>
</html>