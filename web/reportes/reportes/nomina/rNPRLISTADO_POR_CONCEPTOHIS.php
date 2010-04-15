<?

	require_once("pdfNPRLISTADO_POR_CONCEPTOHIS.php");
	require_once("anchoNPRLISTADO_POR_CONCEPTOHIS.php");

	$objrep=new mysreportes();

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
	    alert('No hay informacion para procesar este reporte...');
		location=("NPRLISTADO_POR_CONCEPTOHIS.php");
		</script>
      <?
	}
?>