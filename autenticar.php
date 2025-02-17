<?php

// Captura os dados do formulário preenchido pelo usuario 

$usuario = $_POST["usuario"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$linhas = file("confidencial.txt", FILE_IGNORE_NEW_LINES);

$autenticado = false;


foreach ($linhas as $linha) {
	list($user,$email,$pass) = explode("," , $linha);

	if (($user == $usuario || $email == $usuario) && $pass == $senha) {
		$autenticado = true;
		break;
	}
}



if($autenticado){
	header("Location: bemvindo.html");
} else{
	echo "<script>alert('Usuário ou senha incorretos!');</script>";
	echo "<a href=LOGIN.html>Clique Aqui para Voltar para o site principal</a>";

}

?>