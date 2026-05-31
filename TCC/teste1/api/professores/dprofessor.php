<?php
//dprofessor.php - serve para deletar um professor
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$sql = "delete from professores where proid = ?; ";
$prp = $pdo->prepare($sql);
$prp->execute([$id]);
Conexao::desconectar();


//http://localhost/TCC/teste1/api/professores/dprofessor.php?jsn={"nome":"SALES","login":"sales@gmail.com","tel":"14997872497","senha":"123","id":15}
//localhost/TCC/teste1/api/professores/dprofessor.php?jsn={"id":16}