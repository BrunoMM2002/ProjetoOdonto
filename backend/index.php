<?php
        // Conexão com banco
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "contato";

        $conexaodb = new mysqli($servername, $username, $password, $dbname);

        if ($conexaodb->connect_error) {
                die("Connection failed: " . $conexaodb->connect_error);
        }

         // Variaveis que vem do frontend
         $nome = strval($_GET['nome']);
         $email = strval($_GET['email']);
         $telefone = strval($_GET['telefone']);
         $mensagem = strval($_GET['mensagem']);

        $sql = "SELECT * FROM contato WHERE email = '$email'";

        $result = $conexaodb->query($sql);

        if($result->num_rows > 0){
                echo "Email já registrado";
        } else {
                $sql = "INSERT INTO contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

                if ($conexaodb->query($sql) === TRUE) {
                        echo "Cadastrado com sucesso";
                } else {
                        echo "Error: " . $sql . "<br>" . $conexaodb->error;
                }
        }

        $conexaodb->close();
?>