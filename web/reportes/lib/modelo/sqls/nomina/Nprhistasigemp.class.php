<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprhistasigemp extends BaseClases {

	public function asignaciones($tipnom)
    {
    	$sql="select a.codcon as codcon, b.nomcon as nomcon from npconsalint a,npdefcpt b where a.codnom=('".$tipnom."') and a.codcon=b.codcon";
    	return $this->select($sql);
    }

	public function montoasignaciones($codemp,$tipnom,$asig)
    {
    	$sql="select sum(G.MONTO) as monto
			 from nphiscon G
			 where
			 g.fecnom>=to_date('01/07/2009','dd/mm/yyyy') and
             g.fecnom<=to_date('31/07/2009','dd/mm/yyyy') and
             G.CODEMP=('".$codemp."') and G.CODCON=('".$asig."') and G.codnom=('".$tipnom."')";

            //print '<pre>'; print $sql;exit;
    	return $this->select($sql);
    }


  public function sqlp($tipnom,$codempdes,$codemphas,$codcardes,$codcarhas,$codnivdes,$codnivhas,$codcondes,$codconhas,$fechades,$fechahas,$especial,$tipnomesp1,$tipnomesp2)
    {
	   if ($especial == 'S')
            {
                $especial = " G.especial = 'S' AND
        (G.CODNOMESP) >= TRIM('".$tipnomesp1."') AND
        (G.CODNOMESP) <= TRIM('".$tipnomesp2."') AND ";
             }
            else
            {  if ($especial == 'N')           $especial = " G.especial = 'N' AND";
            }
            if ($especial == 'T')           $especial = "";


			$sql="SELECT DISTINCT
							C.CODEMP as codemp,
							to_char(C.FECRET,'dd/mm/yyyy') as fecret,
							C.NOMEMP as nomemp,
							to_char(C.FECING,'dd/mm/yyyy') as fecing,
							C.NUMCUE as CUENTA_BANCO,
							C.CODNIV as codniv,
							C.CEDEMP as cedemp,
							LTRIM(RTRIM(B.CODCAR)) as CODCAR,
							B.NOMCAR as nomcar,
							E.DESNIV as desniv,
							(CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
							G.CODCAR as codcargo, cast(REPLACE(c.cedemp,'.', '') as int )
						FROM
							NPHOJINT C,
							NPASICAREMP B,
							NPESTORG E,
							nphiscon G,
							NPDEFCPT H
						WHERE
							(B.CODNOM) = ('".$tipnom."') AND
							E.CODNIV=C.CODNIV AND
							B.CODEMP=C.CODEMP AND ".$especial."
							C.CODEMP>= ('".$codempdes."') AND
							C.CODEMP <= ('".$codemphas."') AND
							B.CODCAR>= ('".$codcardes."') AND
							B.CODCAR <= ('".$codcarhas."') AND
							C.CODNIV >= ('".$codnivdes."') AND
							C.CODNIV <= ('".$codnivhas."') AND
							B.STATUS='V' AND
							G.CODCON=H.CODCON AND
							G.CODCON>='".$codcondes."' AND
							G.CODCON<='".$codconhas."' AND
							(G.CODNOM) = ('".$tipnom."') AND
							G.CODCAR=B.CODCAR AND
							G.CODEMP=C.CODEMP and  g.fecnom>=to_date('".$fechades."','dd/mm/yyyy') and
			                g.fecnom<=to_date('".$fechahas."','dd/mm/yyyy')
						 ORDER BY
							cast(REPLACE(c.cedemp,'.', '') as int )";
       //  print '<pre>'; print $sql;exit;
	      return $this->select($sql);

    }


}
?>