<?php
    //include_once '../Dashio/topo.php';//template
?>

<html>
    <head>
        <title>LOGIN</title>
    </head>
    <fieldset>
    <body>
        <h1><b>LOGIN</b></h1>

        <form method="POST" action="RformLogin.php">
            <label>Email:</label>
            <input type="email" name="Email"/> <br><br>
            <label>Senha:</label>
            <input type="password" name="Senha"/> <br><br>
            <button type="submit">Entrar</button>
            <button><a href="../cruds/Tusuarios/usuarioCadastro.php">Fazer cadastro</a></button>
        </form>
        
    </body>
    </fieldset>
</html>
