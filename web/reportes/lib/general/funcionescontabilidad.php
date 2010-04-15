<?
		function instr($palabra,$busqueda,$comienzo,$concurrencia){
		/*echo $palabra. " ";
		echo $busqueda. " ";
		echo $comienzo. " ";
		echo $concurrencia. " ";*/
		//echo $palabra="#-##-##-##-##-###";
		//$concurrencia=6;
		//echo "   ,   ";
		
		$tamano=strlen($palabra);
		//echo "   ,   ";
		$cont=0;
		$cont_conc=0;
		
		for ($i=$comienzo;$i<=$tamano;$i++){
			$cont=$cont+1;
			if ($palabra[$i]==$busqueda):
				$cont_conc=$cont_conc+1;
				
				if ($cont_conc==$concurrencia): 
					$i=$tamano;
				endif;
			endif;
		}
			if ($concurrencia > $cont_conc ):
				 $cont=0;
			else:
				 $cont;
			endif;
		
		return $instr=$cont;
		}
?>