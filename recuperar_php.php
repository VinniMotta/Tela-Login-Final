
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) { 
    $emailDigitado = $_POST["email"];

    if (!file_exists("confidencial.txt")) {
        echo "<script>
                alert('Erro: Arquivo de usuários não encontrado.');
                window.history.back();
              </script>";
        exit;
    }

    $linhas = file("confidencial.txt", FILE_IGNORE_NEW_LINES);
    $usuarioEncontrado = false;
    $novaSenha = substr(md5(time()), 0, 8); // Gera uma nova senha aleatória

    foreach ($linhas as $index => $linha) {
        list($user, $email, $senha) = explode(",", $linha);

        if (trim($email) == trim($emailDigitado)) {
            $usuarioEncontrado = true;
            $linhas[$index] = "$user,$email,$novaSenha"; // Atualiza a senha no array
            break;
        }
    }

    if ($usuarioEncontrado) {
        file_put_contents("confidencial.txt", implode("\n", $linhas)); // Salva as alterações

        echo "<script>
                alert('Sua nova senha foi gerada: $novaSenha. Use-a para acessar sua conta.');
                window.location.href = 'LOGIN.html';
              </script>";
    } else {
        echo "<script>
                alert('E-mail não encontrado. Tente novamente.');
                window.history.back();
              </script>";
    }
}
?>
