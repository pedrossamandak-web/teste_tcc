<?php
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "
select 
aluid as id,
alusexo as sexo,
alunome as nome,
aluemail as email,
alutelefone as telefone,
alucpf as cpf,
aludatanasc as datanasc,
alualtura as altura,
alupeso as peso,
alucidade as cidade,
aluuf as uf,
aluendereco as endereco,
alunumero as numero,
alupsf as psf
from alunos;
";
$prp = $pdo->prepare($sql);
$prp->execute();
$data = $prp->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();

//http://localhost/TCC/teste1/api/alunos/saluno.php/
//localhost/TCC/teste1/api/alunos/saluno.php/