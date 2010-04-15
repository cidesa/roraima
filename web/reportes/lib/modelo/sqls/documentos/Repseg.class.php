<?php

require_once("../../lib/modelo/baseClases.class.php");

class Repseg extends baseClases {

  function sqlp($tipo, $fechades, $fechahas, $codigodes, $codigohas, $estado, $anulado, $fechaatedes, $fechaatehas)
  {
    //0=>Nuevo, 1=>Atendido, 2=>Anulado, 3=>Culminado, 4=>Todos
    if($tipo!='0') $tipo = " a.id = ".$tipo." and ";
    else  $tipo = '  ';

    if($estado!='99') $estado = " and b.staate >= ('".$estado."') ";
    else  $estado = ' ';

    if($anulado!='99') $anulado = " and b.anuate <= ('".$anulado."') and ";
    else  $anulado = ' ';

    $sql="select a.tipdoc, b.coddoc, c.totdia, 
            (case when b.staate= '0' then 'Nuevo' else (case when b.staate= '1' then 'Atendido' else (case when b.staate= '2' then 'Anulado' else (case when b.staate= '3' then 'Culminado' end) end) end) end) as estado,
            b.fecdoc, min(c.fecrec) as fecrec, c.id_acunidad_ori as origen, c.id_acunidad_des as destino,
            c.fecate, d.diadoc, d.rutdoc
            from
            dftabtip a, dfatendoc b, dfatendocdet c, dfrutadoc d
            where
            ".$tipo."
            c.fecrec >= ('".$fechades."') and 
            c.fecrec <= ('".$fechahas."') and 
            c.fecate >= ('".$fechaatedes."') and 
            c.fecate <= ('".$fechaatehas."') and 
            b.coddoc >= '".$codigodes."' and 
            b.coddoc <= '".$codigohas."'
            ".$estado."
            ".$anulado."
            and a.id = b.id_dftabtip
            and b.id = c.id_dfatendoc
            and c.id_dfrutadoc = d.id
            group BY
            a.tipdoc, b.coddoc, c.totdia, b.staate, b.fecdoc, c.id_acunidad_ori, c.id_acunidad_des,c.fecate, d.diadoc, d.rutdoc order by a.tipdoc asc, b.coddoc , d.rutdoc asc";
//print '<pre>'; print ($sql); exit();
    return $this->select($sql);
  }
}
?>