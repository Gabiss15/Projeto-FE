<?php
    $nome1 = $_POST['nome-1'];
    $data1 = $_POST['data-1'];
    $posi1 = $_POST['posi-1'];
    $obs1 = $_POST['obs-1'];
    $nsus1 = $_POST['nSUS-1'];

    $host = "localhost";
    $database = "projeto_integrador";
    #Tabela do cartAo vacinal
    $username = "root";
    $password = "";

    #para estabelecer conexao com banco de dados
    $conexao = mysqli_connect($host, $username, $password, $database);
    if(!$conexao){
        die("Conexão Falhou");
    }
    #Criar a consulta sql de insercao de dados
    $sql = "INSERT INTO dependentes VALUES ('$nsus1', '$nome1', '$data1', '$posi1', '$obs1')";
    if(mysqli_query($conexao,  $sql)){
        echo "Inserido !";
    }
    #Encerrar a conexao com o BD
    mysqli_close($conexao);

    header('Location:cadastro.html');