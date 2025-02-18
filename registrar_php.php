<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $usuario = trim($_POST["usuario"]);
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);


    if (!file_exists("confidencial.txt")) {
        echo "<script>
                alert('Erro: Arquivo de usuários não encontrado.');
                window.history.back();
              </script>";
        exit;
    }



  if ($emailExistente) {
        echo "<script>
                alert('Este e-mail já está cadastrado!');
                window.history.back();
              </script>";
    } 
    else {
        // Adiciona o novo usuário ao arquivo
        $novoUsuario = "$usuario,$email,$senha\n";
        file_put_contents("confidencial.txt", $novoUsuario, FILE_APPEND);

        echo "<script>
                alert('Usuário registrado com sucesso!');
                window.location.href = 'LOGIN.html';
              </script>";
    }
}
?>