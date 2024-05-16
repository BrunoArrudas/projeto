<?php
// Conexão com o banco de dados
$host = "localhost"; // Altere para o seu host
$usuario = "root"; // Altere para o seu usuário
$senha = ""; // Altere para a sua senha
$banco = "sistemas_reserva"; // Altere para o nome do seu banco de dados

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verificar a conexão
if (mysqli_connect_errno()) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Query SQL para selecionar os dados da tabela
$query = "SELECT * FROM reserva";

// Executar a query
$resultado = mysqli_query($conexao, $query);

// Verificar se há resultados
if (mysqli_num_rows($resultado) > 0) {
    // Exibir os dados em uma tabela HTML
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

    // Loop através dos resultados e exibir cada linha da tabela
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

// Fechar a conexão
mysqli_close($conexao);
?>