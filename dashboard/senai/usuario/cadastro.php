<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/senaidois.PNG">
    <link rel="stylesheet" href="../style.css">
    <title>Cadastro</title>
</head>

<body>
    <header class="headernav">
        <figure>
            <a href="index.html"><img src="img/senai.png" alt=""></a>
        </figure>

        <nav class="NavHeader">
            <a href="../index.html">Sair</a>
        </nav>
    
    </header>
    <main>
        <main>
            <section class="formulario">
                <div class="formulario-title">
                    <h1>Registre-se</h1>
                </div>
                <div class="formulario-form">
                    <form action="">
                        <div>
                            <label for="nome">Nome Completo</label>
                            <input type="nome" name="Nome Completo" id="nome">
                        </div>
                        <div>
                            <label for="email">E-mail</label>
                            <input type="email" name="E-mail" id="email">
                        </div>
                        <div>
                            <label for="nome">Nome de usuário</label>
                            <input type="nome" name="Nome de usuário" id="email">
                        </div>
                        <div>

                            <div>
                                <label for="senha">Criar senha</label>
                                <input type="senha" name="Criar senha" id="email" required minlength="8">
                            </div>
                            <div>
                                <label for="senha">Confirmar senha</label>
                                <input type="senha" name="Confirmar senha" id="email" required minlength="8">
                            </div>
                            <button type="submit">Registrar-se</button>
                            <a href="login" class="cadastro_link">Possuo cadastro>></a>
                        </div>
                    </form>
                    <?php
                        include("../bd/conexao.php");
                   
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                            $nome = $_POST["nome"];
                            $email = $_POST["email"];
                            $login = $_POST["login"];
                            $senha = $_POST["senha"];
                        
                            $sql = "INSERT INTO usuario(nome, email, login, senha) VALUES (:nome, :email, :login, :senha)";
                            $stmt = $conexao->prepare($sql);
                            $stmt->bindValue(":nome", $nome);
                            $stmt->bindValue(":email", $email);
                            $stmt->bindValue(":login", $login);
                            $stmt->bindValue(":senha", $senha);
                            $stmt->execute();

                            if($stmt-> rowCount() > 0){
                                echo "Registrado com sucesso";
                            }else{
                                echo "Falha ao registrar o usuário";
                            }
                        }
                    ?>
                </div>
            </section>
        </main>
        <script src="https://kit.fontawesome.com/8eabb72de4.js" crossorigin="anonymous"></script>
</body>

</html>