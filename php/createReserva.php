<?php

// Conexão com o banco de dados
$host = "localhost"; 
$usuario = "root"; 
$senha = ""; 
$banco = "sistemas_reserva"; 

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $curso = $_POST['cursos'];
    $ofertas = $_POST['ofertas'];
    $sigla = $_POST['sigla'];
    $cod_turma = $_POST['cod-turma'];
    $dt_inicio = $_POST['dt-inicio'];
    $dt_fim = $_POST['dt-fim'];
    $subarea = $_POST['subarea'];
    $docente = $_POST['docente'];
    $sala_lab = $_POST['sala-lab'];
    $capacidade = $_POST['capacidade'];

    $query = "INSERT INTO reserva (Cursos, Ofertas, Sigla, Codigo_turma, Data_inicio, Data_fim, Subarea, Docente, Sala_lab, Capacidade) VALUES ('$curso', '$ofertas', '$sigla', '$cod_turma', '$dt_inicio', '$dt_fim', '$subarea', '$docente', '$sala_lab', '$capacidade')";

    if (mysqli_query($conexao, $query)) {
        echo "Reserva feita com sucesso.";
    } else {
        echo "Erro ao fazer reserva: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}
?>