<?php
//iturma.php - serve para cadastrar uma nova turma
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = strtoupper($data['nome']);
$pro = $data['pro'];
$sql = "insert into turmas (turnome,turproid) values (?,?);";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$pro]);
Conexao::desconectar();

//http://localhost/TCC/teste1/api/turmas/iturma.php?jsn={"nome":"sub16","pro":23}

//localhost/TCC/teste1/api/turmas/iturma.php?jsn={"nome":"sub16","pro":23}
