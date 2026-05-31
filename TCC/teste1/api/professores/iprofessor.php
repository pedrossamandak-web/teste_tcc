<?php
//iprofessor.php - serve para cadastrar um novo professor
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = strtoupper($data['nome']);
$email = $data['email'];
$tel = $data['tel'];
$senha = $data['senha'];
$sql = "insert into professores (pronome,proemail,protelefone,prosenha) values (?,?,?,?);";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$email,$tel,$senha]);
Conexao::desconectar();

//http://localhost/TCC/teste1/api/professores/iprofessor.php?jsn={"nome":"SALES","email":"sales@gmail.com","tel":"14997872497","senha":"123"}

//localhost/TCC/teste1/api/professores/iprofessor.php?jsn={"nome":"SALES","email":"sales@gmail.com","tel":"14997872497","senha":"123"}
