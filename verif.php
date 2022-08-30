<?php
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

    //Config file
$config_file = file_get_contents("config.json");
$config = json_decode($config_file, true);

//Getting data from config file
$host = $config['host'];
$database = $config['database'];
#Tabela do cartAo vacinal
$username = $config['username'];
$password = $config['password'];
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
        header('Location: intro.html');
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