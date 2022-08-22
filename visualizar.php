<?php
$numero = $_POST['searchNumero'];

$host = "localhost";
$database = "projeto_integrador";
$user = "root";
$password = "";

$conexao = mysqli_connect($host, $user, $password, $database);

if(!$conexao){
    die("Conexão Falhou");
}

$sql = "SELECT * FROM prontuario_familiar WHERE numero = $numero";
#$sql_n = "SELECT responsável FROM prontuario_familiar WHERE responsável like '$nome%' ";

$result = mysqli_query($conexao, $sql);

$nLinhas = mysqli_num_rows($result);

    for ($i = 0; $i < $nLinhas; $i++){
        $linha = mysqli_fetch_row($result);

        echo "Número de prontuário: ".$linha[0]."<br> Telefone: ".$linha[1]."<br>Ano: ".$linha[2]."<br>Responsável Familiar: ".$linha[3]."<br>Município: ".$linha[4]."<br>Unidade: ".$linha[5]."<br>Data: ".$linha[6]."<br>Endereço: ".$linha[7]."<hr>";

    }
?>
