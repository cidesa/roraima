<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprnomdefniv extends BaseClases {

    function SQLp($tipnomdes,$empdes,$emphas,$cardes,$carhas,$condes,$conhas,$nivdes,$nivhas)
    {
    	$sql="SELECT DISTINCT(C.CODEMP) as codemp,
			 to_char(C.FECRET,'dd/mm/yyyy') as fecret,
			  to_char(C.FECING,'dd/mm/yyyy') as fecing,
			  C.NOMEMP as nomemp, d.codcat as codcta,
			   d.nomcat as nomcat,
			   C.NUMCUE as CUENTA_BANCO,C.CODNIV as codniv,
			   C.CEDEMP as cedemp, f.nomban as nomban,
			   B.NOMCAR as nomcar,
			   E.DESNIV as desniv,
			    G.CODCON as codcon,
			   LTRIM(RTRIM(B.CODCAR)) as CODCAR,
			   LTRIM(RTRIM(H.NOMCON)) AS NOMCON,
			   	G.SALDO as saldo,
			   (CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
			   (CASE WHEN G.ASIDED='A' THEN coalesce(G.SALDO,0) ELSE 0 END) as ASIGNA,
			   (CASE WHEN G.ASIDED='D' THEN coalesce(G.SALDO,0) ELSE 0 END) as DEDUC,
			   (CASE WHEN G.ASIDED='P' THEN coalesce(G.SALDO,0) ELSE 0 END) as APORTE,
				G.especial as especial
			   FROM NPASICAREMP B,
			   NPHOJINT C LEFT OUTER JOIN npbancos f ON (C.CODBAN=f.codban),
			    NPCATPRE D, NPESTORG E, NPNOMCAL G, NPDEFCPT H
			   WHERE
			   G.CODNOM= '".$tipnomdes."'
			   AND G.CODEMP>= '".$empdes."'
			   AND G.CODEMP <= '".$emphas."'
			   AND G.CODCAR>= '".$cardes."'
			   AND G.CODCAR <= '".$carhas."'
			   AND G.CODCON>='".$condes."'
			   AND G.CODCON<='".$conhas."'
			   AND G.CODEMP=C.CODEMP
			   AND C.CODNIV >= '".$nivdes."'
			   AND C.CODNIV <= '".$nivhas."'
			   AND B.STATUS='V'
			   AND G.CODEMP=B.CODEMP
			   AND G.CODCAR=B.CODCAR
			   AND G.CODNOM=B.CODNOM
			   AND H.IMPCPT='S'
			   AND G.CODCON=H.CODCON
			   AND D.CODCAT=B.CODCAT
			   AND G.SALDO > 0
			  AND  RTRIM(E.CODNIV)=RTRIM(C.CODNIV)
			   ORDER BY C.CODNIV,C.CODEMP";
			   return $this->select($sql);
    }
}
?>