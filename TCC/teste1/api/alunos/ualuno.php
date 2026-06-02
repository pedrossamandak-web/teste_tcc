<?php 
require '../../app/conexao.php';

$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);

// ID
$id = $data['id'];

// Dados
$sexo = $data['sexo'];
$nome = strtoupper($data['nome']);
$email = $data['email'];
$telefone = $data['telefone'];
$cpf = $data['cpf'];
$datanasc = $data['datanasc'];
$altura = $data['altura'];
$peso = $data['peso'];
$cidade = $data['cidade'];
$uf = $data['uf'];
$endereco = $data['endereco'];
$numero = $data['numero'];
$psf = $data['psf'];

// Senha com proteção
$senha = $data['senha'];

// Só valida csenha se tiver senha
if (!empty($senha)) {
    $csenha = $data['csenha'];

    if ($senha != $csenha) {
        echo json_encode(["erro" => "Senhas não conferem"]);
        exit;
    }
}

// Se NÃO tiver senha → não atualiza senha
if (empty($senha)) {

    $sql = "UPDATE alunos SET 
    alusexo = ?, alunome = ?, aluemail = ?, alutelefone = ?, 
    alucpf = ?, aludatanasc = ?, alualtura = ?, alupeso = ?, 
    alucidade = ?, aluuf = ?, aluendereco = ?, alunumero = ?, 
    alupsf = ?
    WHERE aluid = ?";

    $prp = $pdo->prepare($sql);
    $prp->execute([
        $sexo, $nome, $email, $telefone, $cpf, $datanasc,
        $altura, $peso, $cidade, $uf, $endereco, $numero,
        $psf, $id
    ]);

} else {

    // Com senha → atualiza senha também
    $sql = "UPDATE alunos SET 
    alusexo = ?, alunome = ?, aluemail = ?, alutelefone = ?, 
    alucpf = ?, aludatanasc = ?, alualtura = ?, alupeso = ?, 
    alucidade = ?, aluuf = ?, aluendereco = ?, alunumero = ?, 
    alupsf = ?, alusenha = (?)
    WHERE aluid = ?";

    $prp = $pdo->prepare($sql);
    $prp->execute([
        $sexo, $nome, $email, $telefone, $cpf, $datanasc,
        $altura, $peso, $cidade, $uf, $endereco, $numero,
        $psf, $senha, $id
    ]);
}

Conexao::desconectar();

//http://localhost/TCC/teste1/api/alunos/ualuno.php?jsn={"id":1,"sexo":"F","nome":"Yasmim","email":"yasmim@gmail.com","telefone":"14999999999","cpf":"12345678900","datanasc":"2005-01-01","altura":"165","peso":"50","cidade":"Piraju","uf":"SP","endereco":"Rua B","numero":"123","psf":"Posto Central","senha":"","csenha":""}

//localhost/TCC/teste1/api/alunos/ualuno.php?jsn={"id":1,"sexo":"F","nome":"Yasmim","email":"yasmim@gmail.com","telefone":"14999999999","cpf":"12345678900","datanasc":"2005-01-01","altura":"165","peso":"50","cidade":"Piraju","uf":"SP","endereco":"Rua B","numero":"123","psf":"Posto Central","senha":"","csenha":""}



//"senha":"123","csenha":"123" (se for alterar senha) 