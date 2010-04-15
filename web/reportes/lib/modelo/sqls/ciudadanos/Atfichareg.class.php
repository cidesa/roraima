<?php
require_once("../../lib/modelo/baseClases.class.php");
class Atfichareg extends baseClases
{
	function Sqlp($numexpdes,$numexphas,$fechades,$fechahas){
	  if($fechades!=''){
  		$sql="select a.*, b.desayu from atayudas a, attipayu b where a.nroexp>='".$numexpdes."' and a.nroexp<='".$numexphas."' and a.fecsol>=to_date('$fechades','dd/mm/YYYY')
          and a.fecsol<=to_date('$fechahas','dd/mm/YYYY') and a.attipayu_id=b.id ";
	  }else{
  		$sql="select a.*, b.desayu from atayudas a, attipayu b where a.nroexp>='".$numexpdes."' and a.nroexp<='".$numexphas."'
          and a.attipayu_id=b.id ";
	  }
    //print $sql; exit;
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

	function Sqlmedicotratante($id){
		$sql="select a.* from atmedico a where a.id='".$id."'";
		return $this->select($sql);
	}
}