<?php

require_once("../../lib/modelo/baseClases.class.php");

class Caregauxexi extends baseClases
{

  function sqlp($almdes,$almhas)
  {
  	 $sql="select codalm,nomalm from cadefalm where codalm>='".$almdes."' and codalm<='".$almhas."'";
	//H::printR($sql);exit;
   	 return $this->select($sql);
  }

function sqlentradas($coddes,$codhas,$fecdes,$fechas,$almacen)
  {
  	 $sql="	select to_char(b.fecrcp,'dd/mm/yyyy') as fecha,a.codart as codigo,a.codalm as almacen,c.desart as descod,
  	 	 	c.unimed as unimed,b.tipmov as tipmov,d.destipent as desmov,a.canrec as cantidad,a.cosart as costo,
  	 	 	a.montot as montot,c.exitot as existencia,	c.cospro as cospro from cadetent a,caentalm b,
  	 	 	caregart c,catipent d where a.rcpart=b.rcpart and a.codart=c.codart and b.tipmov=d.codtipent
			and b.fecrcp>=to_date('".$fecdes."','dd/mm/yyyy') and b.fecrcp<=to_date('".$fechas."','dd/mm/yyyy') and a.codalm='".$almacen."'
			and a.codart>='".$coddes."' and a.codart<='".$codhas."' order by b.fecrcp";

   //H::printR($sql);exit;
   return $this->select($sql);
  }


  function sqlsalidas($coddes,$codhas,$fecdes,$fechas,$almacen)
  {
  	 $sql="	select to_char(b.fecsal,'dd/mm/yyyy') as fecha,a.codart as codigo,a.codalm as almacen,
  	 		c.desart as descod,c.unimed as unimed,b.tipmov as tipmov,d.destipent as desmov,
  	 		a.cantot as cantidad,a.cosart as costo,a.totart as montot,c.exitot as existencia,
  	 		c.cospro as costo from cadetsal a,casalalm b,caregart c,catipent d
			where a.codsal=b.codsal and a.codart=c.codart and b.tipmov=d.codtipent and b.fecsal>=to_date('".$fecdes."','dd/mm/yyyy')
			and b.fecsal<=to_date('".$fechas."','dd/mm/yyyy') and a.codalm='".$almacen."' and a.codart>='".$coddes."'
			and a.codart<='".$codhas."' order by b.fecsal";

	//H::printR($sql);exit;
   return $this->select($sql);
  }

    function sqlrecepcion($coddes,$codhas,$fecdes,$fechas,$almacen)
  {
  	 $sql="	select to_char(b.fecrcp,'dd/mm/yyyy') as fecha,a.codart as codigo,a.codalm as almacen,
  	 		c.desart as descod,c.unimed as unimed,
  	 		a.canrec as cantidad,c.cosult as costo,a.canrec*c.cosult as montot,c.exitot as existencia
  	 		from caartrcp a,carcpart b,caregart c
			where a.rcpart=b.rcpart and a.codart=c.codart and b.fecrcp>=to_date('".$fecdes."','dd/mm/yyyy')
			and b.fecrcp<=to_date('".$fechas."','dd/mm/yyyy') and a.codalm='".$almacen."' and a.codart>='".$coddes."'
			and a.codart<='".$codhas."' order by b.fecrcp";

	//H::printR($sql);exit;
   return $this->select($sql);
  }

  function sqldespachos($coddes,$codhas,$fecdes,$fechas,$almacen)
  {
  	 $sql="	select to_char(b.fecdph,'dd/mm/yyyy') as fecha,a.codart as codigo,a.codalm as almacen,
  	 		c.desart as descod,c.unimed as unimed,
  	 		a.candph as cantidad,c.cosult as costo,a.candph*c.cosult as montot,c.exitot as existencia
  	 		from caartdph a,cadphart b,caregart c
			where a.dphart=b.dphart and a.codart=c.codart and b.fecdph>=to_date('".$fecdes."','dd/mm/yyyy')
			and b.fecdph<=to_date('".$fechas."','dd/mm/yyyy') and a.codalm='".$almacen."' and a.codart>='".$coddes."'
			and a.codart<='".$codhas."' order by b.fecdph";

	//H::printR($sql);exit;
   return $this->select($sql);
  }


}

?>