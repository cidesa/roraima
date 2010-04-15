<?
session_start();
require($_SESSION["x"].'lib/bd/basedatosAdo.php');
require($_SESSION["x"].'lib/general/funciones.php');
$sesion_usuario=session_id();		

	$loguse=strtoupper(trim($_POST["loguse"]));
	$pasuse=strtoupper(trim($_POST["pasuse"]));	
	$datos=split("-",$_POST["codemp"]);
	$codemp=$_SESSION["codemp"]=$datos[0];   //codigo empresa
	$nomemp=$_SESSION["nomemp"]=$datos[1]; 	//nombre empresa
	
$bd=new basedatosAdo($codemp);
	
	$sql="select * from ".chr(34)."SIMA_USER".chr(34).".usuarios where upper(trim(loguse))='$loguse' and upper(trim(pasuse))='$pasuse'";
	$tb=$bd->select($sql);
	if (!$tb->EOF){
         $_SESSION["nomusu"]=$tb->fields["nomuse"];
         $_SESSION["dpto"]=$tb->fields["numuni"];
         $_SESSION["loguse"]=$loguse;
		$sql="select * from ".chr(34)."SIMA_USER".chr(34).".APLI_USER Where CODAPL='CI0' AND upper(trim(LOGUSE))='$loguse'";
			//''CP0 pregntar d dnd viene el cpo
			$tb=$bd->select($sql);
			if (!$tb->EOF){   //BIEN
					$_SESSION["sesion_usuario"]=$sesion_usuario; ?>
					<script>location='../../aplicaciones/presupuesto/index.php'</script>
			<? }else{ ?>
			<script>location='../../login.php';alert("Aplicación no Autorizada");</script>
			<? }

		
	}else { ?> <script>location='../../login.php';alert("Usuario No Registrado");</script> <? }
	
?>
