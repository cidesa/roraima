<?
	
	require_once("pdfpreproexcejefis.php");	
	
	$obj= new pdfreporte();

	
			
	$tb=$obj->bd->select($obj->sql);
	 if (!$tb->EOF) 
	 { //HAY DATOS
			$obj->AliasNbPages(); 
			$obj->AddPage();
			$obj->Cuerpo();
			$obj->Output();
	}		
	else
	{ //NO HAY DATOS
	  ?> 
	   <script>
	    alert('No hay información para procesar éste reporte...');
		location=("oprordpre.php");
		</script>
      <?
	 }
			

	
?>