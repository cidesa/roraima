<?php

require_once("../../lib/modelo/baseClases.class.php");

class Repdoc extends baseClases {

  function sqlp($tipo, $fechades, $fechahas, $codigodes, $codigohas, $estado, $anulado, $fechadocdes, $fechadochas, $fechaatedes, $fechaatehas)
  {
    //0=>Nuevo, 1=>Atendido, 2=>Anulado, 3=>Culminado, 4=>Todos
    if($tipo!='0') $tipo = " a.id = ".$tipo." and ";
    else  $tipo = '  ';

    if($estado!='99') $estado = " and b.staate >= ('".$estado."') ";
    else  $estado = ' ';

    if($anulado!='99') $anulado = " and b.anuate <= ('".$anulado."') and ";
    else  $anulado = ' ';

    $sql="select 
          	a.tipdoc, 
          	b.coddoc,
            b.desdoc,
            (case when b.staate= '0' then 'Nuevo' else (case when b.staate= '1' then 'Atendido' else (case when b.staate= '2' then 'Anulado' else (case when b.staate= '3' then 'Culminado' end) end) end) end) as estado,
            b.fecdoc, 
            b.id, 
            (select max(fecrec) from dfatendocdet where id_dfatendoc=b.id) as ultate,
            (select sum(totdia) from dfatendocdet where id_dfatendoc=b.id) as totdia,
	          (select sum(y.diadoc) from dfatendocdet x inner join dfrutadoc y on x.id_dfrutadoc=y.id where id_dfatendoc=b.id) as diadoc,
            (select g.nomuni from dfatendocdet x inner join (dfrutadoc w inner join acunidad g on w.id_acunidad=g.id)on x.id_dfrutadoc=w.id where x.id = (select max(x.id) from dfatendocdet x where id_dfatendoc=b.id)) as nomuni
          from
            dftabtip a, dfatendoc b
            where
            ".$tipo."
            b.fecdoc >= '".$fechadocdes."'
            and b.fecdoc <= '".$fechadochas."'
            and b.coddoc >= '".$codigodes."'
            and b.coddoc <= '".$codigohas."'
            ".$estado."
            ".$anulado."
            and a.id = b.id_dftabtip
          group BY
            a.tipdoc, 
          	b.coddoc, 
            b.desdoc,
          	b.staate, 
          	b.fecdoc, 
          	b.id
          order by 
            a.tipdoc asc, b.coddoc asc";
//print '<pre>'.$sql; exit();
    return $this->select($sql);
  }
}
?>