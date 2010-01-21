<?php

/**
 * Subclass for representing a row from the 'ccperparamo' table.
 *
 *
 *
 * @package lib.model
 */
class Ccperparamo extends BaseCcperparamo
{
  protected $obj = array();
  protected $monint = 0;
  protected $monintmor = 0;
  protected $monpri = 0;
  protected $monintgra = 0;
  protected $monintcum = 0;

  public function __toString(){
    return $this->getNomper();
  }

 public function hydrate(ResultSet $rs, $startcol = 1){
   parent::hydrate($rs, $startcol);

     $id=$this->getId();
     if ($this->getId()!=''){
     $sql= "select
     		primonintmor as primonintmor,
     		primonint as primonint,
     		primonpri as primonpri,
     		primonintgra as primonintgra,
     		primonintcum as primonintcum
     		from ccparamo where ccperparamo_id = $id ";
     Herramientas::BuscarDatos($sql,&$result);
     if ($result)
     foreach ($result as $valor){
     $this->monintmor = $valor['primonintmor'];
     $this->monint = $valor['primonint'];
     $this->monpri = $valor['primonpri'];
     $this->monintgra = $valor['primonintgra'];
     $this->monintcum = $valor['primonintcum'];
     }
     }
 }

}
