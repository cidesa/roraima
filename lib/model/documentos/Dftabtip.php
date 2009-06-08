<?php

/**
 * Subclass for representing a row from the 'dftabtip' table.
 *
 *
 *
 * @package lib.model
 */
class Dftabtip extends BaseDftabtip
{
  public function __toString()
  {
    return $this->tipdoc.' - '.Documentos::getDesDoc($this->tipdoc);
  }

  public function getDestipdoc()
  {
    return $this->tipdoc.' - '.Documentos::getDesDoc($this->tipdoc);
  }

}
