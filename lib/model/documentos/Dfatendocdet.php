<?php

/**
 * Subclass for representing a row from the 'dfatendocdet' table.
 *
 *
 *
 * @package lib.model
 */
class Dfatendocdet extends BaseDfatendocdet
{
  protected $coddoc = '';
  protected $nomuse = '';
  protected $nomunio = '';
  protected $nomunid = '';
  protected $dias = 0;
  protected $diadoc = 0;

  public function afterHydrate(){

    $c = new Criteria();
    $c->add(DfatendocPeer::ID,$this->getIdDfatendoc());
    $dfatendoc = DfatendocPeer::doSelectOne($c);
    if($dfatendoc) $this->coddoc = $dfatendoc->getCoddoc();

    $acunidadori = $this->getAcunidadRelatedByIdAcunidadOri();
    if($acunidadori) $this->nomunio = $acunidadori->getNomuni();
    else $this->nomunio = 'Sin Unidad';

    $acunidaddes = $this->getAcunidadRelatedByIdAcunidadDes();
    if($acunidaddes) $this->nomunid = $acunidaddes->getNomuni();
    else $this->nomunid = 'Sin Unidad';

    $usuario = UsuariosPeer::retrieveByPK($this->getIdUsuario());
    if($usuario) $this->nomuse = $usuario->getNomuse();
    else $this->nomuse = 'Sin Usuario';

    $fecate = $this->getFecate();
    $fecrec = $this->getFecrec();

    $this->dias =  Documentos::ContDiasFecha($fecrec,$fecate);

    $dfrutadoc = $this->getDfrutadoc();
    if($dfrutadoc) $this->diadoc = $dfrutadoc->getDiadoc();
    else $this->diadoc = 99;

  }
  
  public function getFecate($format = 'Y-m-d H:i:s')
  {
    $fecate = parent::getFecate($format);
    if($fecate=='1969-12-31 20:00:00') return null;
    else return $fecate;
  }

  public function getFecrec($format = 'Y-m-d H:i:s')
  {
    $fecrec = parent::getFecrec($format);
    if($fecrec=='1969-12-31 20:00:00') return null;
    else return $fecrec;
  }


}
