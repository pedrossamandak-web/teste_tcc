<?php
//dturma.php - serve para deletar uma turma
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$id = $data['id'];
$sql = "delete from turmas where turid = ?; ";
$prp = $pdo->prepare($sql);
$prp->execute([$id]);
Conexao::desconectar();


//http://localhost/TCC/teste1/api/turmas/dturma.php?jsn={"id":3}
//localhost/TCC/teste1/api/turmas/dturma.php?jsn={"id":3}