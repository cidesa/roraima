<?php

/**
 * Subclass for representing a row from the 'ccusuint' table.
 *
 *
 *
 * @package lib.model
 */
class Ccusuint extends BaseCcusuint
{

protected $confirm = '';
protected $usuger = '';

 public function getCedulaAnalista(){
   return Herramientas::getX('id','ccanalis','cedana',self::getCcanalisid());
  }

  public function getNombreAnalista(){
   return Herramientas::getX('id','ccanalis','nomana',self::getCcanalisid());
  }

public function getNombreGer(){
   return Herramientas::getX('id','ccgerenc','nomger',self::getCcgerencid());
  }

  public function getDescripGer(){
   return Herramientas::getX('id','ccgerenc','desger',self::getCcgerencid());
  }

  public function __toString(){
    return $this->getNomusuint();
  }


/*public function hydrate(ResultSet $rs, $startcol = 1){
   parent::hydrate($rs, $startcol);

     $idger=$this->getCcgerencId();
     if ($this->getCcgerencId()!=''){
     $sql= "select nomare, desare from ccareger where ccgerenc_id = '".$idger."' ";
     Herramientas::BuscarDatos($sql,&$result);
     if ($result)
     {
     $this->nomare = $result[0]['nomare'];
     $this->desare = $result[0]['desare'];
     }else {
     	$this->nomare = '';
        $this->desare = '';
     }

     }
}*/

}
