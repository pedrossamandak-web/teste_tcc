<?php
//uprofessor.php - serve para alterar um professor
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$nome = strtoupper($data['nome']);
$email = $data['email'];
$tel = $data['tel'];
$senha = $data['senha'];
$sql = "update  professores set pronome = ?,  proemail = ? ,protelefone = ? , prosenha = ? where proid = ?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$email,$tel,$senha,$id]);
Conexao::desconectar();
//{"nome":"valor"}
//http://localhost/TCC/teste1/api/professores/uprofessor.php?jsn={"nome":"laranja","email":"laranja@gmail.com","tel":"14997872497","senha":"1234","id":18}