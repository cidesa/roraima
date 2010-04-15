<?php

require_once("../../lib/modelo/baseClases.class.php");

class Carordser extends baseClases
{

  function sqlp($ordcomdes,$ordcomhas,$codprodes,$codprohas,$codartdes,$codarthas,$fecorddes,$fecordhas,$status,$despacho)
  {
        if ($status=="Activas")
  {
    $condicion=" a.staord='A' AND ";
  }
  elseif ($status=="Ambos" or $status=="" )
  {
    $condicion=" (a.staord='A' or a.staord='N') AND ";
  }
  else
  {
    $condicion=" a.staord='N' AND ";
  }

  if (trim($despacho)=="Todos" or trim($despacho)=="")
  {
    $condicionD=" ";
  }
  else
  {
    $condicionD=" a.lugent ='".$despacho."' AND";
  }
  if ($tipcom!="")
  {
    $tipcom="AND A.DOCCOM=trim('".$tipcom."')";
  }
  else
  {
    $tipcom=" ";
  }

  $sql="SELECT DISTINCT A.ORDCOM,
      to_char(a.fecord,'DD/MM/YYYY') as fecord,
      A.CODPRO,
      A.DTOORD,
      E.NOMPRO,
      E.RIFPRO,
      E.NITPRO,
      E.DIRPRO,
      E.NROCEI,
      B.CODCAT,
      A.DESORD,
      (CASE WHEN A.CRECON='CT' THEN 'Contado' WHEN A.CRECON='CR' THEN 'Credito' ELSE 'Desconocido' END) AS CRECON,
      A.MONORD,
      (CASE WHEN A.STAORD='A' THEN 'Activo' WHEN A.STAORD='N' THEN 'Anulado' ELSE 'Desconocido' END) AS STAORD,
      A.TIPORD,
      B.CODART,
      C.UNIMED,
      C.CODPAR,
	  C.CODPAR as CODPAR1,
      F.CANORD AS CANTOT,
      F.COSTO AS PREART,
      F.TOTART AS TOTART,
      RTRIM(F.DESRES) AS DESRES,
        A.DOCCOM AS DOCCOM,
        E.TELPRO AS TELPRO, b.dtoart as dcto,a.notord as obs
      FROM CAORDCOM A, CAARTORD B, CAREGART C,CAPROVEE E, CARESORDCOM F
      WHERE
      A.ORDCOM>='".$ordcomdes."' AND
      A.ORDCOM<='".$ordcomhas."' AND
      E.CODPRO >='".$codprodes."' AND
      E.CODPRO <='".$codprohas."' AND
      ".$condicionD."
      A.FECORD >=TO_DATE('".$fecorddes."','DD/MM/YYYY') AND
      A.FECORD <=TO_DATE('".$fecordhas."','DD/MM/YYYY') AND
      ".$condicion."
      C.CODART >='".$codartdes."' AND
      C.CODART <='".$codarthas."' AND
      A.ORDCOM = B.ORDCOM AND
      B.CODART = F.CODART and
      A.ORDCOM = F.ORDCOM AND
      A.CODPRO = E.CODPRO AND
      B.CODART  = C.CODART
      ORDER BY A.ORDCOM,to_char(a.fecord,'DD/MM/YYYY'),B.CODCAT";

//print '<pre>';print $sql;exit;
   return $this->select($sql);
  }

  function sql_nompre($codcat)
  {
   $sql="select a.nompre as nombre
  from cpdeftit a
  where rtrim(a.codpre)=rtrim('".$codcat."')";
   return $this->select($sql);
  }

  function sql_req($ordcom)
  {
   $sql="SELECT to_char(B.fecreq,'dd/mm/yyyy') as fecha, A.refsol as req
  FROM CAORDCOM A, CASOLART B
         WHERE A.ORDCOM='".$ordcom."' AND B.reqart=A.REFSOL;";
   return $this->select($sql);
  }

  function sql_ent($ordcom)
  {
   $sql="SELECT A.DESFORENT
  FROM CAFORENT A, CAORDFORENT B
         WHERE B.ORDCOM='".$ordcom."' AND B.CODFORENT=A.CODFORENT;";
   return $this->select($sql);
  }

  function sql_conpag($ordcom)
  {
   $sql="SELECT A.DESCONPAG
  FROM CACONPAG A, CAORDCONPAG B
         WHERE B.ORDCOM='".$ordcom."' AND B.CODCONPAG=A.CODCONPAG;";
        //print $this->sql; exit;
   return $this->select($sql);
  }

  function sql_unidad($ordcom)
  {
   $sql="select b.desubi as desubi FROM CAORDCOM a, bnubica b where a.coduni=b.codubi and a.ordcom='".$ordcom."'";
        //print $sql; exit;
   return $this->select($sql);
  }
  
  



  function sql_imp($ordcom)
  {
   $sql="SELECT distinct codpre as codigo,substr(B.codpre,1,2) as se,
  substr(B.codpre,4,2) as pg,
  substr(B.codpre,7,2) as sp,
  substr(B.codpre,10,6) as ac,
  substr(B.codpre,17,3) as part,
  substr(B.codpre,21,2) as ge,
  substr(B.codpre,24,2) as es,
  substr(B.codpre,27,2) as Subespe,
  substr(B.codpre,30,2) as aux,
  A.coduni as coduni,
  monimp as monto
  FROM CAORDCOM A, CPIMPCOM B
         WHERE A.ORDCOM = '".$ordcom."' AND B.refcom=A.refcom";
      //   print $sql; exit;
   return $this->select($sql);
  }

  function sql_cpniveles($tip='C')
  {
   $sql="select nomabr, nomext from cpniveles where catpar='".$tip."' and staniv='A' order by consec";
   return $this->select($sql);
  }

}
?>
