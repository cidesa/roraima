<?
session_start();
//require_once($_SESSION["x"].'adodb/adodb-exceptions.inc.php'); 
//require_once($_SESSION["x"].'lib/bd/basedatosAdo.php');
//require_once($_SESSION["x"].'lib/general/funciones.php');

//$bd=new basedatosAdo($codemp);

class tools
{
	var $codigo;
	var $descripcion;
	var $fecha;
	var $tipcom;
	var $asientos=array(0 => array("cuenta" => " ","descripcion" => " ","referencia" => " ","debecre" => " ","monasi" => 0));
	var $numAsientos;
	var $sql;
	var $contabb;
	function inicializar()
	{
		$this->numAsientos=0;
	}
	function tools()
	{
	}

	function eliminarRegistroDetalle($tabla,$cod,$like)
	{
		global $bd;
		
		try
			{
		
					$bd->startTransaccion();
					$sql="SELECT * FROM ".strtoupper($tabla)." WHERE RTRIM(".strtoupper($cod).")=RTRIM('".$like."')";
					$tb=$bd->select($sql);
					
					if (!$tb->EOF)
					{
						$sql2="DELETE FROM ".strtoupper($tabla)." WHERE RTRIM(".strtoupper($cod).")=RTRIM('".$like."')";
						$bd->actualizar($sql2);
						$bd->completeTransaccion();
						return true;
					}
					else
					{
						return false;
					}
					 
			}
			catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
			}

	}
	
	function buscar_datos($sql)
	{
		global $bd;
		try
			{		
				$tb=$bd->select($sql);
				if (!$tb->EOF)
				{
					//$tb->MoveFirst();	
					return $tb;
				}
				else
				{
					return false;
				}
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function buscar_codigoHijo($codigo)
	{
		$x=new tools();
		global $bd;
		$codigo= strtoupper(trim($codigo));
		
		try
			{		
				$sql="Select count(codcta) as codcta from CONTABB where codcta like '".$codigo."%' ";
				if ($tb=$x->buscar_datos($sql))
				{
					if ($tb->fields["codcta"]>1)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function primerRegistro($nombreTabla,$campoClave)
	{
		$x=new tools();
		global $bd;
		try
			{
				$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla.")";
				if ($tb=$x->buscar_datos($sql))
				{
					return $tb;
				}
				else
				{
					return false;
				}
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function primerRegistroAsi($nombreTabla,$campoClave)
	{
		$x=new tools();
		global $bd;
		try
			{
				$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." where perpre='00')";
				if ($tb=$x->buscar_datos($sql))
				{
					return $tb;
				}
				else
				{
					return false;
				}
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function ultimoRegistro($nombreTabla,$campoClave)
	{
		$x=new tools();
		global $bd;
		try
			{
				$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla.")";
				if ($tb=$x->buscar_datos($sql))
				{
					return $tb;
				}
				else
				{
					return false;
				}
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function ultimoRegistroAsi($nombreTabla,$campoClave)
	{
		$x=new tools();
		global $bd;
		try
			{
				$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." where perpre='00')";
				if ($tb=$x->buscar_datos($sql))
				{
					return $tb;
				}
				else
				{
					return false;
				}
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function anteriorRegistro($nombreTabla,$campoClave,$valorCampoClave,$fecha)
	{
		$x=new tools();
		global $bd;
		try
			{
				if (!$valorCampoClave=="")
				{
					if ($fecha=="S")
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
					}
					else
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < TRIM('".$valorCampoClave."'))";
					}
						if ($tb=$x->buscar_datos($sql))
						{
							return $tb;
						}
						else
						{
							return false;
						}
				}
				else
				{
					if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
					{
						return $tb;
					}
					else
					{
						return false;
					}
				}	
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function anteriorRegistroAsi($nombreTabla,$campoClave,$valorCampoClave,$fecha)
	{
		$x=new tools();
		global $bd;
		try
			{
				if (!$valorCampoClave=="")
				{
					if ($fecha=="S")
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
					}
					else
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MAX(".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") < TRIM('".$valorCampoClave."') and perpre='00')";
					}
						if ($tb=$x->buscar_datos($sql))
						{
							return $tb;
						}
						else
						{
							return false;
						}
				}
				else
				{
					if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
					{
						return $tb;
					}
					else
					{
						return false;
					}
				}	
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function proximoRegistro($nombreTabla,$campoClave,$valorCampoClave,$fecha)
	{
		$x=new tools();
		global $bd;
		try
			{
				if (!$valorCampoClave=="")
				{
					if ($fecha=="S")
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") > to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
					}
					else
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") > TRIM('".$valorCampoClave."'))";
					}
						if ($tb=$x->buscar_datos($sql))
						{
							return $tb;
						}
						else
						{
							return false;
						}
				}
				else
				{
					if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
					{
						return $tb;
					}
					else
					{
						return false;
					}
				}	
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function proximoRegistroAsi($nombreTabla,$campoClave,$valorCampoClave,$fecha)
	{
		$x=new tools();
		global $bd;
		try
			{
				if (!$valorCampoClave=="")
				{
					if ($fecha=="S")
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN (".$campoClave.") FROM ".$nombreTabla." WHERE RTRIM(".$campoClave.") > to_date('".(string)$valorCampoClave."','dd/mm/yyyy'))";
					}
					else
					{
						$sql="SELECT * FROM ".$nombreTabla." WHERE ".$campoClave."=(SELECT MIN(".$campoClave.") FROM ".$nombreTabla." WHERE (".$campoClave.") >'".$valorCampoClave."' and perpre='00')";
						
					}
						if ($tb=$x->buscar_datos($sql))
						{
							return $tb;
						}
						else
						{
							return false;
						}
				}
				else
				{
					if ($tb=$x->primerRegistro($nombreTabla,$campoClave))
					{
						return $tb;
					}
					else
					{
						return false;
					}
				}	
				
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
	
	function validarFechaPresup($fecha)
	{
	$x=new tools();
	global $bd;
	
		if (strlen($fecha)==10)
		{
			//chekea periodo cerrado
			$sql="select estper from cppereje where to_date('".$fecha."','DD/MM/YYYY') between fecdes and fechas";						
			if ($tb=$x->buscar_datos($sql))
			{
				if ($tb->fields["estper"]=='C')	
				{
					Mensaje("El Periodo en Presupuesto fue Cerrado");
					return false;
				}
				else
				{
					return true;
				}
			}
			else
			{
				Mensaje("La fecha del período no existe");
				return false;
			}
		}
		else
		{
			Mensaje("Formato de Fecha Inválido");
			return false;
		}
		
	}
	
	function formar_nivelDisponibilidad($codigo,$niveldisp)
	{
		$x=new tools();
		global $bd;
		
			$sql="select sum(lonniv) as total from cpniveles where to_char(consec,9) <= '".$nivel."' ";
			if ($tb=$x->buscar_datos($sql))
			{
				if ($tb->fields["total"]>0)
				{
					$nroguiones=intval($niveldisp) - 1;
					$res=substr($codigo,0,$tb->fields["total"] + $nroguiones);
					return $res;
				}
				else
				{
					return $res="";
				}
			}
			else
			{
				return $res="";			
			}			
	}


}
// FIN CLASS






	function validar()
	{
	if (!empty($_SESSION["sesion_usuario"])):
		$sesion_usuario=$_SESSION["sesion_usuario"];
	else:
			$sesion_usuario=0;
	endif;	
	
	if (session_id()==$sesion_usuario):
			if (empty($_SESSION["loguse"])):
				?>
				<script language="javascript1.1" type="text/javascript">
					alert("Su Acceso Denegado")										
					location=("../../login.php")
				</script>
				<?		
			endif;

	else:
							?>
							<script language="javascript1.1" type="text/javascript">
								alert("Acceso Denegado")										
								location=("../../login.php")
							</script>}
							<?
	endif;						
	}
	
	

 	function Mensaje($msg)
	{ ?> 
	<script>alert('<? echo $msg; ?>');</script>
	<? }

 	function Regresar($txt)
	{ ?> 
	<script>//txt = "<? echo $txt; ?>";
	//alert(txt); 
	 location=("<? echo $txt; ?>");</script>
	<? }
	
	function instr($palabra,$busqueda,$comienzo,$concurrencia){
		
		$tamano=strlen($palabra);
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
	

	function digitos($i)
		{
			if ($i<10)
			{	
			$i="0".$i;
			}
			return $i;			
		}

	
		//////////////// FUNCIONES DEL MODULO DE PRESUPUESTO /////////////

	function pre_VerificarFormatoPadre($codigo,$mascara)
	{
		if (strlen($codigo)<strlen($mascara))
		{
		echo $codigo;
			echo instr($codigo," ",0,1);
		}
	}
	
	
	function pre_buscar_codigoHijo($codigo)
	{	
		global $bd;
		$tools=new tools();
		$codigo= strtoupper(trim($codigo));
		try
			{		
				$sql="select count(codpre) as codpre from cpdeftit where codpre like '".$codigo."%' ";
				if ($tb=$tools->buscar_datos($sql))
				{
					if ($tb->fields["codpre"]>1)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
				else
				{
					return false;
				}
			}
		catch(Exception $e)
			{
					print "Excepcion Obtenida: ".$e->getMessage()."\n";
					return false;
			}
	}
		
		//////////////////////////////////////////////////////////////////


	function buscar_codigo_padre($codigo)
	{
	global $codigopadre; 
	global $bd;
	//$bd=new basedatosAdo($_SESSION["codemp"]);
	
		$codigo=strtoupper(trim($codigo));
 	    $pos = 0;
	    $nivel = 1;
	    while ($pos <= strlen($codigo)){
		  if (substr($codigo, $pos, 1) == '-'){
			$nivel = $pos; }
		  $pos = $pos + 1;
	   }
		
		if ($nivel <> 1)
		{
/*		echo "codigo: ".$codigo;
		echo "<br>"."nivel:".$nivel;
 		echo "<br> codigopadre: ".$codigopadre = substr($codigo, 0, $nivel);*/
	 	  $codigopadre = substr($codigo, 0, $nivel);
	      $sql="select * from contabb where trim(codcta)='$codigopadre'";
 		  $tb=$bd->select($sql);
		  if (!$tb->EOF){ return true; } else { return false; }
		  
	    }else{ return true; }	
	}
	

?>