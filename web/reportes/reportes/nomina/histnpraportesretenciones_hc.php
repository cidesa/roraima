<?
require_once("../../lib/general/fpdf/fpdf.php");
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
    $pru=  new fpdf();
	$codempdes=H::GetPost("codempdes");
	$codemphas=H::GetPost("codemphas");
	$tipnom=H::GetPost("tipnom");
	$codcatdes =H::GetPost("codcatdes");
	$codcathas = H::GetPost("codcathas");
    $especial =H::GetPost("especial");
    $tipnomesp=H::GetPost("tipnomesp");
    $codtipapodes=H::GetPost("codtipapodes");
    $fecreg1=H::GetPost("fec1");
    $fecreg2=H::GetPost("fec2");

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
						SUM(A.monto) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,trim(B.nacemp) as nacemp,B.staemp,
						B.CODNIV, cast(REPLACE(B.CEDEMP,'.', '') as int ),coalesce(to_char(b.fecret,'dd/mm/yyyy'),'') as  FECEGR
						FROM
						   nphiscon  A,NPHOJINT B, npdefcpt e, npconsalint d
						 WHERE
						 ".$especial."
						B.CODEMP = A.CODEMP and A.codcon = d.codcon and A.codnom = d.codnom
						--AND e.opecon='A'
						AND  A.CODNOM = '".$tipnom."'
						AND  B.CODEMP >=  ('".$codempdes."')
						AND  B.CODEMP <= ('".$codemphas."')
						and a.codcat >= ('".$codcatdes."')
						and a.codcat <= ('".$codcathas."') AND
						A.fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND A.fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') and
                        a.codcon=e.codcon  and montorethist('".$codtipapodes."','A',A.CODNOM,B.CODEMP,A.CODCAR,'".$fecreg1."','".$fecreg2."') > 0
						GROUP BY A.CODEMP, B.CEDEMP, A.CODNOM, A.CODCAR, to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') ,
	                    B.NOMEMP , B.NACEMP, to_char(B.FECNAC,'dd/mm/yyyy') , B.SEXEMP ,B.CODNIV, a.codcat,
	                    montorethist('".$codtipapodes."','A',A.CODNOM,B.CODEMP,A.CODCAR,'".$fecreg1."','".$fecreg2."'), B.staemp,b.fecret
						ORDER BY cast(REPLACE(B.CEDEMP,'.', '') as int ),a.codcar
						";
				//  print $sql; exit;
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
						SUM(A.monto) as MONTO,
						to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') as  FECING,
						B.NOMEMP as nomemp,
						B.NACEMP,
						to_char(B.FECNAC,'dd/mm/yyyy') as fecnac,
						B.SEXEMP as sexemp,
						B.CODNIV, cast(REPLACE(B.CEDEMP,'.', '') as int )
					     FROM
						   nphiscon  A,NPHOJINT B, npdefcpt e, npconsalint d
						 WHERE
						 ".$especial."
						B.CODEMP = A.CODEMP and A.codcon = d.codcon and A.codnom = d.codnom
						--AND e.opecon='A'
						AND  A.CODNOM = '".$tipnom."'
						AND  B.CODEMP >=  ('".$codempdes."')
						AND  B.CODEMP <= ('".$codemphas."')
						and a.codcat >= ('".$codcatdes."')
						and a.codcat <= ('".$codcathas."') AND
						A.fecnom >= to_date('".$fecreg1."','dd/mm/yyyy') AND A.fecnom <= to_date('".$fecreg2."','dd/mm/yyyy') and
                        a.codcon=e.codcon  and montorethist('".$codtipapodes."','A',A.CODNOM,B.CODEMP,A.CODCAR,'".$fecreg1."','".$fecreg2."') > 0
						GROUP BY A.CODEMP, B.CEDEMP, A.CODNOM, A.CODCAR, to_char(coalesce(FECREI,FECING),'dd/mm/yyyy') ,
	                    B.NOMEMP , B.NACEMP, to_char(B.FECNAC,'dd/mm/yyyy') , B.SEXEMP ,B.CODNIV, a.codcat,
	                    montorethist('".$codtipapodes."','A',A.CODNOM,B.CODEMP,A.CODCAR,'".$fecreg1."','".$fecreg2."')
						ORDER BY cast(REPLACE(B.CEDEMP,'.', '') as int ),a.codcar";
						//print '<pre>'; print $sql; exit;
			}//fin de 0004 or 0010

$arrp=$bd->select($sql);
$pri=true;
while(!$arrp->EOF)
{
	//echo $arrp->fields["codemp"].'aqui';
	 if($codtipapodes=='0003' or $codtipapodes=='0009')//FAOV
	{
			$sql4=("SELECT SUM(monto) as ELMONTO FROM nphiscon A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$codtipapodes."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP and ".$especial2 ."
										 B.CODEMP='".$arrp->fields["codemp"]."' and
								         a.FECNOM>=to_date('".$fecreg1."','dd/mm/yyyy') AND
								         a.FECNOM<=to_date('".$fecreg2."','dd/mm/yyyy')
										");
					//					print $sql4;
	        $tb4=$bd->select($sql4);

        	$sql5=("SELECT SUM(MONTO) as  ELMONTO
										 FROM NPCONTIPAPORET C, NPHOJINT B, NPHISCON A
										 WHERE
										 C.CODTIPAPO='".$codtipapodes."' AND
										 B.CODEMP='".$arrp->fields["codemp"]."' AND
										 FECNOM>=to_date('".$fecreg1."','dd/mm/yyyy') AND
								  		 FECNOM<=to_date('".$fecreg2."','dd/mm/yyyy') AND
										 A.CODCAR='".$arrp->fields["codcar"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='A' AND
										 B.CODEMP=A.CODEMP ");

		$tb5=$bd->select($sql5);
        $montoaporte=number_format($tb4->fields["elmonto"],2,'.',',')+number_format($tb5->fields["elmonto"],2,'.',',');
             //$montoaporte=number_format($tb4->fields["elmonto"],2,'.',',')+number_format($tb5->fields["elmonto"],2,'.',',');
        $montoaporte=number_format($montoaporte,2,'.',',');
        //FECING
		$auxfecha=split("/",$arrp->fields["fecing"]);
		$auxfecha2=split("/",$arrp->fields["fecegr"]);
		$primernombre=$pru->getPrinom($arrp->fields["nomemp"]);
		$primerapellido=$pru->getPriape($arrp->fields["nomemp"]);
		//$auxfecha=split("/",$arrp->fields["fecnac"]);
		if ($arrp->fields["staemp"]=='A'){
		$staemp='0';
		}else
		$staemp='1';
		//condicion para quitar a los trabajadore que tengan retencion igual a cero
        if (number_format($tb4->fields["elmonto"],2,'.',',')>0){
		//echo 'G200002395'.'00'.$arrp->fields["nacemp"].str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))),10,"0",STR_PAD_LEFT).str_pad(trim(substr($arrp->fields["nomemp"],0,30)),30," ",STR_PAD_RIGHT).str_pad(trim($auxfecha[2]),4,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[1]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[0]),2,"0",STR_PAD_LEFT).$arrp->fields["sexemp"].$staemp.str_pad(str_replace(".","",$montoaporte),10,"0",STR_PAD_LEFT).'0309'.chr(10);
		echo $arrp->fields["nacemp"].','.trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))).','.$primernombre.', ,'.$primerapellido.', ,'.str_replace(".","",$arrp->fields["monto"]).','.str_pad(trim($auxfecha[0]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[1]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[2]),4,"0",STR_PAD_LEFT).','.trim($auxfecha2[0]).trim($auxfecha2[1]).trim($auxfecha2[2]).chr(10);
		//echo str_pad(trim(strtoupper(trim(str_replace(".","",str_replace("-","",$arrp->fields["cedemp"]))))),10,"0",STR_PAD_LEFT).'|'.str_pad(trim(substr($arrp->fields["nomemp"],0,30)),30," ",STR_PAD_RIGHT).'|'.number_format($arrp->fields["monto"],2,'.',',').'|'.str_pad(trim($auxfecha[2]),4,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[1]),2,"0",STR_PAD_LEFT).str_pad(trim($auxfecha[0]),2,"0",STR_PAD_LEFT).chr(10);
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
		$sql4=("SELECT SUM(monto) as ELMONTO FROM nphiscon A, NPHOJINT B, NPCONTIPAPORET C
										 WHERE
										 C.CODTIPAPO='".$codtipapodes."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='R' AND
										 B.CODEMP=A.CODEMP and ".$especial2 ."
										 B.CODEMP='".$arrp->fields["codemp"]."' and
								         a.FECNOM>=to_date('".$fecreg1."','dd/mm/yyyy') AND
								         a.FECNOM<=to_date('".$fecreg2."','dd/mm/yyyy')
										");
	        $tb4=$bd->select($sql4);
	//APORTE
        		$sql5="SELECT SUM(MONTO) as  ELMONTO
										 FROM NPCONTIPAPORET C, NPHOJINT B, NPHISCON A
										 WHERE
										 C.CODTIPAPO='".$codtipapodes."' AND
										 B.CODEMP='".$arrp->fields["codemp"]."' AND
										 FECNOM>=to_date('".$fecreg1."','dd/mm/yyyy') AND
								  		 FECNOM<=to_date('".$fecreg2."','dd/mm/yyyy') AND
										 A.CODCAR='".$arrp->fields["codcar"]."' AND
										 A.CODNOM=C.CODNOM AND
										 A.CODCON=C.CODCON AND
										 C.TIPO='A' AND
										 B.CODEMP=A.CODEMP ";

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
