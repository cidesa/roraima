<?php

/**
 * Subclase para representar una fila de la tabla 'dfatendocdet'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.documentos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Dfatendocdet extends BaseDfatendocdet
{
  protected $coddoc = '';
  protected $nomuse = '';
  protected $nomunio = '';
  protected $nomunid = '';
  protected $dias = '';
  protected $diadoc = 0;
  protected $fecent = '';

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
    
    if($fecate=='') $fecate=date('Y-m-d');

    $dias =  Documentos::ContDiasFecha($fecrec,$fecate);
    
    $dfrutadoc = $this->getDfrutadoc();
    if($dfrutadoc) $this->diadoc = $dfrutadoc->getDiadoc();
    else $this->diadoc = 99;
    
    if($dias>$this->diadoc) $this->dias = "<font color=\"#FF0000\">$dias</font>";
    else $this->dias = "<font color=\"#000080\">$dias</font>";        
    
    $this->fecent = Documentos::AddDaysDate($fecrec, $this->diadoc);

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
  
  public function getFecent($format = 'Y-m-d H:i:s')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }
  

}
