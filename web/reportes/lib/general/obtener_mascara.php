<?php
/*
 * Created on 01/11/2007
 *
 *
 *CREATE OR REPLACE FUNCTION OBTENER_MASCARA RETURN VARCHAR2 IS
  TIRA VARCHAR2(36);

  CURSOR MASCARA IS SELECT NOMABR FROM CPNIVELES ORDER BY CONSEC;
  CONTADOR NUMBER(2);
BEGIN
  CONTADOR:=1;
  TIRA:='';

  FOR REG IN MASCARA LOOP

     IF CONTADOR = 1 THEN
        TIRA := TIRA || REG.NOMABR;
     ELSE
        TIRA := TIRA || '-' || REG.NOMABR;
     END IF;
  CONTADOR:=CONTADOR+1;
  END LOOP;
  RETURN TIRA;
END;


 *
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

// mascara = tb
  require_once("../../lib/bd/basedatosAdo.php");

  function MASCARA()
  {
    $bd = new basedatosAdo();
    $sqlmas = "SELECT NOMABR as nomabr FROM CPNIVELES ORDER BY CONSEC";
    $tbmas = $bd->select($sqlmas);
    $cont = 1;
    $tira = "PR-AC-PAR-GE-ES-SE";
    while(!$tbmas->EOF)
    {
      if ($cont==1){
        $tira = $tbmas->fields["nomabr"];
      }
      else{
        $tira .= "-".$tbmas->fields["nomabr"];
      }
      $cont++;
      $tbmas->MoveNext();
    }
    return $tira;
  }

?>
