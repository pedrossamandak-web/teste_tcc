<?php
// daluno.php - serve para deletar um aluno
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);
$id = $data['id'];
$sql = "delete from alunos where aluid = ?; ";
$prp = $pdo->prepare($sql);
$prp->execute([$id]);
Conexao::desconectar();


//http://localhost/TCC/teste1/api/alunos/daluno.php?jsn={"id":3}
//localhost/TCC/teste1/api/alunos/daluno.php?jsn={"id":3}