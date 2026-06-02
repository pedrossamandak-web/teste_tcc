<?php
//uturma.php - serve para alterar uma turma
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$nome = strtoupper($data['nome']);
$pro = $data['pro'];
$sql = "update turmas set turnome = ?,  turproid = ?  where turid = ?;";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$pro,$id]);
Conexao::desconectar();
//{"nome":"valor"}
//http://localhost/TCC/teste1/api/turmas/uturma.php?jsn={"nome":"sub18","pro":1,"id":3}
//localhost/TCC/teste1/api/turmas/uturma.php?jsn={"nome":"sub18","pro":1,"id":3}