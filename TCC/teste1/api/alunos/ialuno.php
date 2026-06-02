<?php
// ialuno.php - cadastrar aluno
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
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
$senha = $data['senha'];
$csenha = $data['csenha'];
if ($senha != $csenha) {
    echo json_encode(["erro" => "Senhas não conferem"]);
    exit;
}
$sql = "insert into alunos(alusexo, alunome, aluemail, alutelefone, alucpf, aludatanasc, alualtura, alupeso, alucidade, aluuf, aluendereco, alunumero, alupsf, alusenha ) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$prp = $pdo->prepare($sql);
$prp->execute([$sexo, $nome, $email, $telefone, $cpf, $datanasc, $altura, $peso, $cidade, $uf, $endereco, $numero, $psf, $senha]);
Conexao::desconectar();



//http://localhost/TCC/teste1/api/alunos/ialuno.php?jsn={"sexo":"M","nome":"Pedro","email":"pedro@gmail.com","telefone":"14999999999","cpf":"12345678900","datanasc":"2005-01-01","altura":"175","peso":"70","cidade":"Piraju","uf":"SP","endereco":"Rua A","numero":"123","psf":"Posto Central","senha":"453","csenha":"453"}

//localhost/TCC/teste1/api/alunos/ialuno.php?jsn={"sexo":"M","nome":"Pedro","email":"pedro@gmail.com","telefone":"14999999999","cpf":"12345678900","datanasc":"2005-01-01","altura":"175","peso":"70","cidade":"Piraju","uf":"SP","endereco":"Rua A","numero":"123","psf":"Posto Central","senha":"453","csenha":"453"}