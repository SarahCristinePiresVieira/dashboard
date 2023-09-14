<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="img/senaidois.PNG">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header class="headernav">
        <figure>
            <a href="index.html"><img src="img/senai.png" alt=""></a>
        </figure>

        <nav class="NavHeader">
            <a href="cadastro.php">Criar uma conta</a>
        </nav>
    </header>
    <script src="https://kit.fontawesome.com/8eabb72de4.js" crossorigin="anonymous"></script>

    <main>
        <section class="formulario">
            <div class="formulario-title">
                <h1>Por favor, inscreva-se</h1>
            </div>
            <div class="formulario-form">
                <form action="" method="POST">
                    <div>
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" placeholder="Informe seu login" required>
                    </div>
                    <div>
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required
                        >
                    </div>
                    <div>
                        <button type="submit" class="logar">Entrar</button>
                        <a href="cadastro.php">
                            <button type="button" class="cadastro">Ainda não cadastrado? Cadastra-se</button>
                        </a>

                    </div>
                </form>
                <?php
                    include("../bd/conexao.php");

                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $login = $_POST["login"];
                        $senha = $_POST["senha"];
    
                        $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
                            $stmt = $conexao->prepare($sql);
                            $stmt->bindValue(":login", $login);
                            $stmt->bindValue(":senha", $senha);
                            $stmt->execute();

                            if($stmt-> rowCount() > 0){
                                echo "Pode logar";
                            }else{
                                echo "Não pode logar";
                            }
                        }
                    ?>
            </div>
        </section>
    </main>
</body>

</html>