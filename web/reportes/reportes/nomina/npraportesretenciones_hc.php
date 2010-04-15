<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");
if(H::GetPost("codtipapodes")=="0004" or H::GetPost("codtipapodes")=="0010" )
{
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/fondo_".date('d/m/Y').".txt");


    //header ("Content-Type: application/force-download");
}
if(H::GetPost("codtipapodes")=="0003" or H::GetPost("codtipapodes")=="0009")
{
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/faov_".date('d/m/Y').".txt");
}

    $bd= new basedatosAdo();
	$codempdes=H::GetPost("codempdes");
	$codemphas=H::GetPost("codemphas");
	$tipnom=H::GetPost("tipnom");
	$codcatdes =H::GetPost("codcatdes");
	$codcathas = H::GetPost("codcathas");
    $especial =H::GetPost("especial");
    $tipnomesp=H::GetPost("tipnomesp");
    $codtipapodes=H::GetPost("codtipapodes");

       	   if ($especial == 'S')
            {
            	$especial = " a.especial = 'S' AND 	(A.CODNOMESP) = TRIM('".$tipnomesp."') AND  ";
                $especial2 = " a.especial = 'S' AND 	(A.CODNOMESP) = TRIM('".$tipnomesp."') AND  ";
            }
            else
            {
            	if ($especial == 'N') {
            		$especial = " a.especial = 'N' AND A.CODCON<>'A03' AND";}
            	else
            	    if ($especial == 'T')
            	       $especial = "A.CODCON<>'A03' AND";
            }

            if($codtipapodes=='0003' or $codtipapodes=='0009')
			{
				$sql="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,trim(B.nacemp) as nacemp,B.staemp,
						B.CODNIV,
						C.CODCAT
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND ".$especial."
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'
						AND  A.CODNOM = '".$tipnom."'
						AND  B.CODEMP >=  ('".$codempdes."')
						AND  B.CODEMP <= ('".$codemphas."')
						and c.codcat >= ('".$codcatdes."')
						and c.codcat <= ('".$codcathas."')
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING),B.staemp
						ORDER BY c.codcat,a.codcar,A.CODEMP  ";
				//   print '<pre>'; print $sql; exit;
               }//fin de 0003 or 0009

				if($codtipapodes=='0004' or $codtipapodes=='0010')
			{
				$cond="";
				if ($tipnom=='002' and $especial == 'N'){

					$cond="and (A.CODCON='A48' or A.CODCON='A42' )";
				}
				$sql="SELECT
						DISTINCT
						A.CODEMP as codemp,
						B.CEDEMP as cedemp,
						A.CODNOM,
						A.CODCAR as codcar,
						SUM(A.SALDO) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV,
						C.CODCAT,to_char(E.profec,'dd/mm/yyyy') as profec
						 FROM
						   NPNOMCAL  A join npconsalint d on (A.codcon = d.codcon and A.codnom = d.codnom),NPHOJINT B,NPASICAREMP C, NPNOMINA E
						 WHERE
						C.CODNOM = A.CODNOM AND
						C.CODCAR = A.CODCAR AND
						C.CODEMP = A.CODEMP AND ".$especial."
						B.CODEMP = A.CODEMP
						AND A.ASIDED='A'
						AND  A.CODNOM = '".$tipnom."' AND a.codnom=E.codnom
						AND  B.CODEMP >=  ('".$codempdes."')
						AND  B.CODEMP <= ('".$codemphas."')
						and c.codcat >= ('".$codcatdes."')
						and c.codcat <= ('".$codcathas."')
						AND A.CODCON<>'A02' AND A.CODCON<>'A08' AND A.CODCON<>'A09' $cond
						GROUP BY A.CODEMP,B.CEDEMP,A.CODNOM,A.CODCAR,B.NOMEMP,B.NACEMP,B.CODNIV,C.CODCAT, E.profec,
						B.FECNAC,B.SEXEMP,coalesce(FECREI,FECING)
						ORDER BY c.codcat,a.codcar,A.CODEMP  ";
					//	print '<pre>'; print $sql; exit;
			}//fin de 0004 or 0010

$arrp=$bd->select($sql);
$pri=true;
while(!$arrp->EOF)
{
	 if($codtipapodes=='0003' or $codtipapodes=='0009')//FAOV
	{
			$sql4=("SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$codtipapodes."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP and ".$especial2 ."
										 B.CODEMP='".$arrp->fields["codemp"]."'
										");
	        $tb4=$bd->select($sql4);

        	$sql5="SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
									 WHERE
									 C.CODTIPAPO='".$codtipapodes."' AND
									 A.CODNOM=C.CODNOM AND
									 A.CODCON=C.CODCON AND
									 C.TIPO='A' AND
									 B.CODEMP=A.CODEMP and  ".$especial2 ."
									 B.CODEMP='".$arrp->fields["codemp"]."' ";

		$tb5=$bd->select($sql5);
        $montoaporte=number_format($tb4->fields["elmonto"],2,'.',',')+number_format($tb5->fields["elmonto"],2,'.',',');
        $montoaporte=number_format($montoaporte,2,'.',',');
		$auxfecha=split("/",$arrp->fields["fecnac"]);
		if ($arrp->fields["staemp"]=='A'){
		$staemp='0';
		}else
		$staemp='1';
		//condicion para quitar a los trabajadore que tengan retencion igual a cero
        if (number_format($tb4->fields["elmonto"],2,'.',',')>0){
		echo 'G200002395'.'00'.$arrp->fields["nacemp"].str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))),10,"0",STR_PAD_LEFT).str_pad(trim(substr($arrp->fields["nomemp"],0,30)),30," ",STR_PAD_RIGHT).str_pad(trim($auxfecha[2]),4,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[1]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[0]),2,"0",STR_PAD_LEFT).$arrp->fields["sexemp"].$staemp.str_pad(str_replace(".","",$montoaporte),10,"0",STR_PAD_LEFT).'0309'.chr(10);
        }
	}//fin del codigo de aporte 0003 y 0009

   	  if($codtipapodes=='0004' or $codtipapodes=='0010')//FONDO
	{
		if ($pri){
		   $auxfecha=split("/",$arrp->fields["profec"]);
		  echo str_pad(trim($auxfecha[0]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[1]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[2]),4,"0",STR_PAD_LEFT).chr(10);
		  $pri=false;
		}
		//RETENCION
			$sql4=("SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$codtipapodes."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP and ".$especial2 ."
										 B.CODEMP='".$arrp->fields["codemp"]."'
										");
	        $tb4=$bd->select($sql4);
	//APORTE
        	$sql5="SELECT SUM(SALDO) as ELMONTO FROM NPNOMCAL A, NPHOJINT B, NPCONTIPAPORET C
									 WHERE
									 C.CODTIPAPO='".$codtipapodes."' AND
									 A.CODNOM=C.CODNOM AND
									 A.CODCON=C.CODCON AND
									 C.TIPO='A' AND
									 B.CODEMP=A.CODEMP and  ".$especial2 ."
									 B.CODEMP='".$arrp->fields["codemp"]."' ";

		$tb5=$bd->select($sql5);
		//condicion para quitar a los trabajadore que tengan retencion igual a cero
        if (number_format($tb4->fields["elmonto"],2,'.',',')>0){
		 echo trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))).'|'.$arrp->fields["profec"].'|'.trim(substr($arrp->fields["nomemp"],0,30)).'|'.number_format($arrp->fields["monto"],2,'.',',').'|'.number_format($tb4->fields["elmonto"],2,'.',',').'|'.number_format($tb5->fields["elmonto"],2,'.',',').chr(10);
        }
	}//fin del codigo de aporte 0004 y 0010
     $arrp->MoveNext();
}
$bd->closed();
?>
