<?php
    $nome1 = $_POST['nome-1'];
    $data1 = $_POST['data-1'];
    $posi1 = $_POST['posi-1'];
    $obs1 = $_POST['obs-1'];
    $nsus1 = $_POST['nSUS-1'];

    echo $nome1, $data1, $posi1, $obs1, $nsus1;

    //Config file
    $config_file = file_get_contents("config.json");
    $config = json_decode($config_file, true);
    
    //Getting data from config file
    $host = $config['host'];
    $database = $config['database'];
    #Tabela do cartAo vacinal
    $username = $config['username'];
    $password = $config['password'];

    #para estabelecer conexao com banco de dados
    $conexao = mysqli_connect($host, $username, $password, $database);
    if(!$conexao){
        die("Conexão Falhou");
    }
    #Criar a consulta sql de insercao de dados
    $sql = "INSERT INTO Dependentes VALUES ('$nsus1', '$nome1', '$data1', '$posi1', '$obs1')";
    if(mysqli_query($conexao,  $sql)){
        echo "Inserido !";
    }else{
        echo "Falha";
    }
    #Encerrar a conexao com o BD
    mysqli_close($conexao);

    //header('Location:cadastro.html');