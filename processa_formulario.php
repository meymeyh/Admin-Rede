<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['nome'];

    $email = $_POST['email'];

    $curriculo = $_FILES['curriculo'];



    // Verifica se o arquivo é um PDF 

    if ($curriculo['type'] != "application/pdf") {

        die("Por favor, envie um arquivo PDF.");

    }



    // Salva o arquivo PDF no servidor 

    $target_dir = "uploads/";

    if (!is_dir($target_dir)) {

        mkdir($target_dir, 0777, true); // Cria o diretório se não existir 

    }

    $target_file = $target_dir . basename($curriculo["name"]);



    if (!move_uploaded_file($curriculo["tmp_name"], $target_file)) {

        die("Desculpe, houve um erro ao enviar seu arquivo.");

    }



    // Conecta ao banco de dados 

    $servername = "localhost";

    $username = "mey";

    $password = "saory2311";

    $dbname = "teste";



    // Cria a conexão 

    $conn = new mysqli($servername, $username, $password, $dbname);



    // Verifica a conexão 

    if ($conn->connect_error) {

        die("Falha na conexão: " . $conn->connect_error);

    }



    // Prepara e executa a inserção 

    $sql = "INSERT INTO contatos   (nome, email, curriculo) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $nome, $email, $target_file);



    if ($stmt->execute()) {

        echo "Dados enviados com sucesso!";

    } else {

        echo "Erro: " . $stmt->error;

    }



    // Fecha a conexão 

    $stmt->close();

    $conn->close();

}
?>

<!-- <!DOCTYPE html> -->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- FIM GOOGLE FONTES -->
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- FIM BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="style.css">

    <script src="menu.js" defer></script>
    <link rel="icon" href="images\logo1.png" type="image/x-icon">
    <title>Adminstrador de Redes</title>
</head>
<body>
    
    <header>
        <div class="interface">
            <div class="logo">
                <a href="#">
                    <img src="images/logo.png" width="40%" alt="Adminstrador de Redes">
                </a>
            </div><!--logo-->

            

            <div class="btn-contato">
                <p style="font-size: 30px;">
                <a href="index.html">
                    <button>Voltar</button>
                </a>
                </p>
            </div><!--btn-contato-->

            <div class="btn-abrir-menu" id="btn-menu">
                <i class="bi bi-list"></i>
            </div>

            <div class="menu-mobile" id="menu-mobile">
                <div class="btn-fechar">
                    <i class="bi bi-x-lg"></i>
                </div>

                <nav>
                    <ul>
                        <li><a href="#">Início</a></li>
                        <li><a href="#">Especialidades</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Projetos</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </nav>

            </div><!--menu-mobile-->
            <div class="overlay-menu" id="overlay-menu"></div>
        </div><!--interface-->
    </header>

    <main>
        <section class="topo-do-site">
            <div class="interface">
                <div class="flex">
                    <div class="txt-topo-site">
                        <h1>Seus dados foram enviados <span>.</span></h1>
                        
                    <
                </div><!--flex-->
            </div><!--interface-->
        </section><!--topo-do-site-->

       
     
    </main>
    
    <footer>
        <div class="interface">
            <div class="line-footer">
                <div class="flex">
                    <div class="logo-footer">
                        <img src="images/logo.png" width="40%" alt="Logotipo Agência BRN">
                    </div><!--logo-footer-->
                   
                </div>
            </div><!--line-footer-->

            <div class="line-footer borda">
               <p style="font-size: 20px;"> <a href="ref.html">Referência</a></p>
              
                
            </div><!--line-footer-->
        </div><!--interface-->
        <center><span style="color: rgb(255, 255, 255);">Atividade Acadêmica - sem fins lucrativos. Emily e Pietro &copyTodos os direitos reservados</span></center>
    </footer>

</body>
</html>