<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$host = "localhost";
$database = "projeto_integrador";
$user = "root";
$password = "";

$conexao = mysqli_connect($host, $user, $password, $database);

if(!$conexao){
    die("Conexão Falhou");
}

$sql = "SELECT usuario FROM funcionarios WHERE usuario = '$usuario'";
$sqltwo = "SELECT * FROM funcionarios WHERE usuario = '$usuario' AND senha = '$senha'";

$result = mysqli_query($conexao, $sql);
$result_s = mysqli_query($conexao, $sqltwo);


if(mysqli_num_rows($result)>0){
    if(mysqli_num_rows($result_s) > 0){
        #header('Location:login.html');
        echo "Entrou";
    }
    else{
        echo "Senha incorreta";
    }
}
else{
    echo "Usuário não encontrado";
}
#Encerrar a conexao com o BD
mysqli_close($conexao);

?>