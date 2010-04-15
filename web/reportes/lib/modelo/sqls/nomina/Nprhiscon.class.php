<?php
require_once("../../lib/modelo/baseClases.class.php");

class Nprhiscon extends baseClases
{
  function SQLp($codnomdes,$codempdes,$codemphas,$codcardes,$codcondes,$codconhas,$fecnomdes,$fecnomhas)
  {
    $sql="select a.codcon,b.nomcon,to_char(a.fecnom,'dd/mm/yyyy') as fecnom,a.monto,a.codemp from nphiscon a, npdefcpt b where a.codemp>='$codempdes' and a.codemp<='$codemphas' --and a.codnom='$codnomdes'
            and a.codcon=b.codcon and a.codcon>='$codcondes' and a.codcon<='$codconhas'
            and a.fecnom>=to_date('$fecnomdes','DD/MM/YYYY')
            and a.fecnom<=to_date('$fecnomhas','DD/MM/YYYY') order by a.codemp,a.codcon,a.fecnom";

        //  print '<pre>';             print_r($sql);              print '</pre>';            exit;

    return $this->select($sql);
  }

  function sqldatos($codemp)
  {
    $sql="select distinct  b.cedemp,
      d.nomcat as categoria, e.nomcar as cargo,
      b.nomemp,
      to_char(coalesce(b.fecrei,b.fecing),'dd/mm/yyyy') as fecing,
      to_char(c.feccor,'dd/mm/yyyy') as fecret,
      c.anotra,
      c.mestra,
      c.diatra
      from
        npasicaremp f, nphojint b, npcatpre d, npcargos e  ,nphiscon a  left outer join nppresoc c on  a.codemp=c.codemp
      where
      (a.codemp)=('$codemp') and
      a.codemp=b.codemp and
      a.codcat=d.codcat and
      a.codcar=e.codcar and
      f.codcat=d.codcat and
      b.codemp=f.codemp
      ";

//	print '<pre>';            print_r($sql);              print '</pre>';            exit;

    return $this->select($sql);
  }


}