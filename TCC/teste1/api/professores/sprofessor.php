<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "
select 
proid as id, 
pronome as nome, 
proemail as login,
protelefone as tel,
prosenha as senha 
from professores;
";
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();

//http://localhost/TCC/teste1/api/professores/sprofessor.php/
//localhost/TCC/teste1/api/professores/sprofessor.php/