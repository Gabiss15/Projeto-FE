<?php
$numero = $_POST['searchNumero'];

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

if (!$conexao) {
    die("Conexão Falhou");
}

$sql = "SELECT * FROM prontuario_familiar WHERE numero = $numero";
#$sql_n = "SELECT responsável FROM prontuario_familiar WHERE responsável like '$nome%' ";

$result = mysqli_query($conexao, $sql);

$nLinhas = mysqli_num_rows($result);

for ($i = 0; $i < $nLinhas; $i++) {
    $linha = mysqli_fetch_row($result);

    echo "Número do prontuário" . $linha[0] . "<br> Telefone: " . $linha[1] . "<br>Ano: " . $linha[2] . "<br>Responsável Familiar: " . $linha[3] . "<br>Município: " . $linha[4] . "<br>Unidade: " . $linha[5] . "<br>Data: " . $linha[7] . "<br>Endereço: " . $linha[6] . "<hr>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prontuário</title>
</head>

<body>
    <input type="text" value="<?php echo $linha[0]; ?>" </body>

</html>