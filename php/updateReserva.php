<?php


$host = "localhost";
$usuario = "root";
$senha = ""; 
$banco = "sistemas_reserva"; 

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
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

    // Verificar se existe um registro com a mesma sigla
    $query_select = "SELECT * FROM reserva WHERE Sigla = '$sigla'";
    $result_select = mysqli_query($conexao, $query_select);

    if (mysqli_num_rows($result_select) > 0) {
        // Se houver um registro com a mesma sigla, atualize os dados
        $query_update = "UPDATE reserva SET Cursos = '$curso', Ofertas = '$ofertas', Codigo_turma = '$cod_turma', Data_inicio = '$dt_inicio', Data_fim = '$dt_fim', Subarea = '$subarea', Docente = '$docente', Sala_lab = '$sala_lab', Capacidade = '$capacidade' WHERE Sigla = '$sigla'";
        
        if (mysqli_query($conexao, $query_update)) {
            echo "Reserva atualizada com sucesso.";
        } else {
            echo "Erro ao atualizar reserva: " . mysqli_error($conexao);
        }
    } else {
        // Se não houver um registro com a mesma sigla, insira um novo registro
        $query_insert = "INSERT INTO reserva (Cursos, Ofertas, Sigla, Codigo_turma, Data_inicio, Data_fim, Subarea, Docente, Sala_lab, Capacidade) VALUES ('$curso', '$ofertas', '$sigla', '$cod_turma', '$dt_inicio', '$dt_fim', '$subarea', '$docente', '$sala_lab', '$capacidade')";

        if (mysqli_query($conexao, $query_insert)) {
            echo "Reserva feita com sucesso.";
        } else {
            echo "Erro ao fazer reserva: " . mysqli_error($conexao);
        }
    }

    // Fechar a conexão
    mysqli_close($conexao);
}
?>