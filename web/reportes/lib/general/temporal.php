<?php
/*
 * Created on 01/11/2007
 *
 * VIENE DEL REPORT
 *
 CREATE OR REPLACE PROCEDURE Temporal(Mascara in Number,PerDesde in Char,PerHasta in Char,CodPreDesde in char,CodPreHasta in char,Comodin in char)IS
  FecIniEje Date;
  FecCieEje Date;

cursor Niri is
 SELECT substr(A.codpre,1,Mascara) codpre,
 sum(A.MonAsi) Monasi,
 (sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) Modificacion,
 (sum(A.MonAsi)+sum(A.Montra)+sum(A.MonAdi)-sum(A.Montrn)-sum(A.MonDim)) AsigActual,
  sum(A.MonPrc) Monprc,
  sum(A.MonCom) moncom,
  sum(A.MonDis) mondis,
  sum(A.MonCau) moncau,
  sum(A.MonPag) monpag,
  (sum(A.MonCau)-sum(A.MonPag))  Deuda
FROM CPASIINI A,
     CPDEFNIV B
WHERE
   B.CodEmp = '001' AND
   A.PerPre >= PerDesde AND
   A.PerPre <= PerHasta AND
   A.AnoPre >= RTRIM(TO_CHAR(B.FecIni,'YYYY')) And
   A.AnoPre <= RTRIM(TO_CHAR(B.FecCie,'YYYY')) And
   RTRIM(A.codpre) >= CodPreDesde AND
   RTRIM(A.codpre) <= CodPreHasta AND
   substr(A.codpre,1,Mascara) LIKE substr(A.codpre,1,Mascara)||'%' AND
   RTRIM(A.codpre) LIKE Comodin
   group by substr(A.codpre,1,Mascara);

BEGIN
  for Reg in Niri loop
      insert into cpdisniv(codpre,monasi,modificacion,asigactual,monprc,moncom,mondis,moncau,monpag,deuda) values (reg.codpre,reg.monasi,reg.modificacion,reg.asigactual,reg.monprc,reg.moncom,reg.mondis,reg.moncau,reg.monpag,reg.deuda);
      commit;
  end loop;

  END;


 */

//$this->aleatorio=rand(1,1000);

  require_once("../../lib/bd/basedatosAdo.php");

  function TablaTemporal($tabla,$sql){
    $bd = new basedatosAdo();
    $create_sql = "CREATE TEMPORARY TABLE ".$tabla." AS ".$sql;
    $tbT2 = $bd->bd->select($create_sql);
    return $tbT2;
  }



?>
