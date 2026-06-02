<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "
select 
turid as id, 
turnome as nome, 
turproid as pro
from turmas;
";
// select 
// turid as id, 
// turnome as nome, 
// pronome as pronome
// from turmas,professores
// where proid=turproid;
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();

//http://localhost/TCC/teste1/api/turmas/sturma.php/
//localhost/TCC/teste1/api/turmas/sturma.php/