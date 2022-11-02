<?php
        // Conexão com banco
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "contato";

        // Variaveis que vem do frontend
        $nome = strval($_GET['nome']);
        $email = strval($_GET['email']);
        $telefone = strval($_GET['telefone']);
        $mensagem = strval($_GET['mensagem']);

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM contato WHERE email = '$email'";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
                echo "Email já registrado";
        } else {
                $sql = "INSERT INTO contato (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

                if ($conn->query($sql) === TRUE) {
                        echo "Cadastrado com sucesso";
                } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }

        $conn->close();
?>