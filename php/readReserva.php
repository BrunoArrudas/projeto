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

$query = "SELECT * FROM reserva";

$resultado = mysqli_query($conexao, $query);

if (mysqli_num_rows($resultado) > 0) {
    
    echo "<table border='1'>
            <tr>
                <th>Cursos</th>
                <th>Ofertas</th>
                <th>Sigla</th>
                <th>Código Turma</th>
                <th>Data de Início</th>
                <th>Data de Fim</th>
                <th>Subárea</th>
                <th>Docente</th>
                <th>Sala/Laboratório</th>
                <th>Capacidade</th>
            </tr>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>".$linha['Cursos']."</td>
                <td>".$linha['Ofertas']."</td>
                <td>".$linha['Sigla']."</td>
                <td>".$linha['Codigo_turma']."</td>
                <td>".$linha['Data_inicio']."</td>
                <td>".$linha['Data_fim']."</td>
                <td>".$linha['Subarea']."</td>
                <td>".$linha['Docente']."</td>
                <td>".$linha['Sala_lab']."</td>
                <td>".$linha['Capacidade']."</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Não há reservas cadastradas.";
}

mysqli_close($conexao);
?>