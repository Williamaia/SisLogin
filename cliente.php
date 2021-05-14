<?php
//-----------------------------------------------------------------------
	//CÓDIGO COM FALHA SQLINJECTION
	// session_start();
	// include_once("conexao.php");
	// echo "Usuario: ". $_SESSION['usuarioNome'];	
	// echo "<br/>Nivel de acesso: ". $_SESSION['usuarioNiveisAcessoId'];
	// echo "<br/>Email: ". $_SESSION['usuarioEmail'];	
	
	// $usuario = $_GET['user'];

	// $result_usuario = "SELECT nome FROM usuarios WHERE id = '$usuario'";
	// $resultado_usuario = mysqli_query($conn, $result_usuario);
	// $resultado = mysqli_fetch_assoc($resultado_usuario);

	// echo "<br/><br/>Usuario no BD: ".$resultado['nome']
//-----------------------------------------------------------------------

//CÓDIGO SEM FALHA SQLINJECTION
	session_start();
	include_once("conexao.php");
	echo "Usuario: ". $_SESSION['usuarioNome'];	
	echo "<br/>Nivel de acesso: ". $_SESSION['usuarioNiveisAcessoId'];
	echo "<br/>Email: ". $_SESSION['usuarioEmail'];		
	
	$usuario = $_GET['user'];

	$stmt = $conn->prepare("SELECT nome FROM usuarios WHERE id = ?");
	$stmt->bind_param("si", $usuario);
	$stmt->execute();
	$resultado = $stmt->get_result();

	echo "<br/><br/>Usuario no BD: ".$resultado['nome']
	
//-----------------------------------------------------------------------
?>
<br>
<a href="sair.php">Sair</a>

