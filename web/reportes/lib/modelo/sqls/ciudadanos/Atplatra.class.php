<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atplatra extends baseClases
{
	function Sqlp($numexpdes,$numexphas,$fechades,$fechahas){
	  if($fechades!=''){
  		$sql="select a.*, a.desayu as obsayu, b.desayu from atayudas a, attipayu b where a.nroexp>='".$numexpdes."' and a.nroexp<='".$numexphas."' and a.fecsol>=to_date('$fechades','dd/mm/YYYY')
          and a.fecsol<=to_date('$fechahas','dd/mm/YYYY') and a.attipayu_id=b.id ";
	  }else{
  		$sql="select a.*, a.desayu as obsayu, b.desayu from atayudas a, attipayu b where a.nroexp>='".$numexpdes."' and a.nroexp<='".$numexphas."' and a.attipayu_id=b.id ";
	  }
     //   print $sql; exit;
		return $this->select($sql);
	}


	function Sqltrabajadorsocial($id){
		$sql="select * from attrasoc  where id='".$id."'";
		return $this->select($sql);
	}

	function Sqlbenefi_solici($id){
		$sql="select a.*,b.desinsref, Extract(year from age(now(),a.fecnac)) as edad from atciudadano a left join atinsrefier b  on a.atinsrefier_id=b.id where a.id='".$id."'";
		return $this->select($sql);
	}
	
	function Sqlpresupuesto($id){
		$sql="select 
			a.*,
			(select b.nompro from atprovee b where b.id=a.atprovee1) as nompro1,
			(select b.telpro from atprovee b where b.id=a.atprovee1) as telpro1,
			(select b.nompro from atprovee b where b.id=a.atprovee2) as nompro2,
			(select b.telpro from atprovee b where b.id=a.atprovee2) as telpro2,
			(select b.nompro from atprovee b where b.id=a.atprovee3) as nompro3,
			(select b.telpro from atprovee b where b.id=a.atprovee3) as telpro3,	
			(select b.nompro from atprovee b where b.id=a.atprovee4) as nompro4,
			(select b.telpro from atprovee b where b.id=a.atprovee4) as telpro4,
			(select b.nompro from atprovee b where b.id=a.atprovee5) as nompro5,
			(select b.telpro from atprovee b where b.id=a.atprovee5) as telpro5,
			(select b.nompro from atprovee b where b.id=a.atprovee6) as nompro6,
			(select b.telpro from atprovee b where b.id=a.atprovee6) as telpro6
		from 
			atpresupuesto a 
		where 
			atayudas_id='".$id."'";
     //   print $sql; exit;			
		return $this->select($sql);
	}
}