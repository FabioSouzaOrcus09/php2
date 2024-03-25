<?php

class Curso {
    private $nome;
    private $coordenador;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCoordenador() {
        return $this->coordenador;
    }

    public function setCoordenador($coordenador) {
        $this->coordenador = $coordenador;
    }
}

class Aluno {
    private $nome;
    private $rm;
    private $dataNascimento;
    private $rg;
    private $curso;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getRm() {
        return $this->rm;
    }

    public function setRm($rm) {
        $this->rm = $rm;
    }

    public function getDataNascimento() {
        return $this->dataNascimento;
    }

    public function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    public function getRg() {
        return $this->rg;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }
}

// Vetor para armazenar os alunos
$alunos = array();
$mostrarFormulario = true;

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cria um novo objeto Aluno
    $aluno = new Aluno();
    $aluno->setNome($_POST["nome"]);
    $aluno->setRm($_POST["rm"]);
    $aluno->setDataNascimento($_POST["data_nascimento"]);
    $aluno->setRg($_POST["rg"]);

    // Cria um novo objeto Curso e define os dados
    $curso = new Curso();
    $curso->setNome($_POST["curso"]);
    $curso->setCoordenador($_POST["coordenador"]);

    // Associa o curso ao aluno
    $aluno->setCurso($curso);

    // Adiciona o aluno ao vetor de alunos
    $alunos[] = $aluno;
    
    // Esconder o formulário
    $mostrarFormulario = false;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php if ($mostrarFormulario): ?>
    <h1>Cadastro de Aluno</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nome">Nome do Aluno:</label><br>
        <input type="text" id="nome" name="nome"><br><br>
        
        <label for="rm">RM:</label><br>
        <input type="text" id="rm" name="rm"><br><br>

        <label for="data_nascimento">Data de Nascimento:</label><br>
        <input type="date" id="data_nascimento" name="data_nascimento"><br><br>

        <label for="rg">RG:</label><br>
        <input type="text" id="rg" name="rg"><br><br>

        <label for="curso">Nome do Curso:</label><br>
        <input type="text" id="curso" name="curso"><br><br>

        <label for="coordenador">Coordenador do Curso:</label><br>
        <input type="text" id="coordenador" name="coordenador"><br><br>

        <input type="submit" value="Cadastrar">
    </form>
<?php endif; ?>

<?php
// Exibe os alunos cadastrados
if (!empty($alunos)) {
    echo "<h2>Alunos Cadastrados:</h2>";
    foreach ($alunos as $aluno) {
        echo "<h3>Dados do Aluno:</h3>";
        echo "Nome: " . $aluno->getNome() . "<br>";
        echo "RM: " . $aluno->getRm() . "<br>";
        echo "Data de Nascimento: " . $aluno->getDataNascimento() . "<br>";
        echo "RG: " . $aluno->getRg() . "<br>";

        echo "<h3>Dados do Curso:</h3>";
        echo "Nome do Curso: " . $aluno->getCurso()->getNome() . "<br>";
        echo "Coordenador: " . $aluno->getCurso()->getCoordenador() . "<br>";
    }
}
?>

</body>
</html>
