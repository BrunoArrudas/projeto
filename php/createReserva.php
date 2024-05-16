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
class ClasseReserva {
    public $curso;
    public $ofertas;
    public $sigla;
    public $cod_turma;
    public $dt_inicio;
    public $dt_fim;
    public $subarea;
    public $docente;
    public $sala_lab;
    public $capacidade;

    public function Reserva($reserva) {
        $this->curso = $reserva['cursos'];
        $this->ofertas = $reserva['ofertas'];
        $this->sigla = $reserva['sigla'];
        $this->cod_turma = $reserva['cod-turma'];
        $this->dt_inicio = $reserva['dt-inicio'];
        $this->dt_fim = $reserva['dt-fim'];
        $this->subarea = $reserva['subarea'];
        $this->docente = $reserva['docente'];
        $this->sala_lab = $reserva['sala-lab'];
        $this->capacidade = $reserva['capacidade'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar ao banco de dados
    $conexao = mysqli_connect("localhost", "", "", "sistemas_reserva");

    // Verificar conexão
    if (mysqli_connect_errno()) {
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
        exit();
    }

    $reserva = new ClasseReserva;
    $reserva->Reserva($_POST);

    $curso = $reserva->curso;
    $ofertas = $reserva->ofertas;
    $sigla = $reserva->sigla;
    $cod_turma = $reserva->cod_turma;
    $dt_inicio = $reserva->dt_inicio;
    $dt_fim = $reserva->dt_fim;
    $subarea = $reserva->subarea;
    $docente = $reserva->docente;
    $sala_lab = $reserva->sala_lab;
    $capacidade = $reserva->capacidade;

    $query = "INSERT INTO reserva (Cursos, Ofertas, Sigla, Codigo_turma, Data_inicio, Data_fim, Subarea, Docente, Sala_lab, Capacidade) VALUES ('$curso', '$ofertas', '$sigla', '$cod_turma', '$dt_inicio', '$dt_fim', '$subarea', '$docente', '$sala_lab', '$capacidade')";

    if (mysqli_query($conexao, $query)) {
        echo "Reserva feita com sucesso.";
    } else {
        echo "Erro ao fazer reserva: " . mysqli_error($conexao);
    }

    mysqli_close($conexao);
}