<?
require_once("../../lib/bd/basedatosAdo.php");
require_once("../../lib/general/Herramientas.class.php");


	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=/tmp/TXT_CESTATIKET_".date('d/m/Y').".txt");


            $bd= new basedatosAdo();
    		$codnomdes = H::GetPost("codnomdes");
            $especial = H::GetPost("especial");
            $tipnomesp=H::GetPost("tipnomesp");
            $nomminesp=H::GetPost("nomminesp");
            $codcondes=H::GetPost("codcondes");
            $monto=H::GetPost("monto");
            $cliente = H::GetPost("cliente");
            $producto=H::GetPost("producto");
            $punto=H::GetPost("punto");
            $pedido=H::GetPost("pedido");
            $cesta=H::GetPost("cesta");

           if ($especial == 'S')
            {
            	$especial = " a.especial = 'S' AND 		(A.CODNOMESP) = TRIM('".$tipnomesp."') AND  ";
            }
            else
            {
            	if ($especial == 'N')       	$especial = " a.especial = 'N' AND"; else
            	if ($especial == 'T')         $especial = "";
            }


	    	$sql="select b.cedemp, b.nomemp ,a.saldo
						from
						NPNOMCAL a,NPHOJINT B
						where
						B.CODEMP = A.CODEMP and $especial
						a.codcon='".$codcondes."' and A.CODNOM = '".$codnomdes."'
						order by cast(REPLACE(b.cedemp,'.', '') as int ) ";

			//print '<pre>'; print $sql;

$arrp=$bd->select($sql);
while(!$arrp->EOF)
{
         echo $cliente.';'.$producto.';'.$arrp->fields["cedemp"].';'.$arrp->fields["nomemp"].';'.$punto.';'.$pedido.';'.H::FormatoMonto($arrp->fields["saldo"]).';'.number_format((($arrp->fields["saldo"]/$monto)),0,'.',',').';'.H::FormatoMonto($monto).';'.chr(10);


     $arrp->MoveNext();
}
$bd->closed();
?>
