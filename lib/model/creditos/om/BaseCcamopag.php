<?php


abstract class BaseCcamopag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $debmonint;


	
	protected $debmoncap;


	
	protected $debmonintmor;


	
	protected $debmonintgra;


	
	protected $debmonintcum;


	
	protected $pagmoncap;


	
	protected $pagmonint;


	
	protected $pagmonintmor;


	
	protected $pagmonintgra;


	
	protected $pagmonintcum;


	
	protected $salmoncap;


	
	protected $salmonint;


	
	protected $salmonintmor;


	
	protected $salmonintgra;


	
	protected $salmonintcum;


	
	protected $fecpag;


	
	protected $fecven;


	
	protected $cedrifcue;


	
	protected $estatu;


	
	protected $ccamoact_id;


	
	protected $ccpago_id;


	
	protected $cccredit_id;


	
	protected $ccperpre_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;

	
	protected $aCcamoact;

	
	protected $aCcpago;

	
	protected $aCccredit;

	
	protected $aCcperpre;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getDebmonint($val=false)
  {

    if($val) return number_format($this->debmonint,2,',','.');
    else return $this->debmonint;

  }
  
  public function getDebmoncap($val=false)
  {

    if($val) return number_format($this->debmoncap,2,',','.');
    else return $this->debmoncap;

  }
  
  public function getDebmonintmor($val=false)
  {

    if($val) return number_format($this->debmonintmor,2,',','.');
    else return $this->debmonintmor;

  }
  
  public function getDebmonintgra($val=false)
  {

    if($val) return number_format($this->debmonintgra,2,',','.');
    else return $this->debmonintgra;

  }
  
  public function getDebmonintcum($val=false)
  {

    if($val) return number_format($this->debmonintcum,2,',','.');
    else return $this->debmonintcum;

  }
  
  public function getPagmoncap($val=false)
  {

    if($val) return number_format($this->pagmoncap,2,',','.');
    else return $this->pagmoncap;

  }
  
  public function getPagmonint($val=false)
  {

    if($val) return number_format($this->pagmonint,2,',','.');
    else return $this->pagmonint;

  }
  
  public function getPagmonintmor($val=false)
  {

    if($val) return number_format($this->pagmonintmor,2,',','.');
    else return $this->pagmonintmor;

  }
  
  public function getPagmonintgra($val=false)
  {

    if($val) return number_format($this->pagmonintgra,2,',','.');
    else return $this->pagmonintgra;

  }
  
  public function getPagmonintcum($val=false)
  {

    if($val) return number_format($this->pagmonintcum,2,',','.');
    else return $this->pagmonintcum;

  }
  
  public function getSalmoncap($val=false)
  {

    if($val) return number_format($this->salmoncap,2,',','.');
    else return $this->salmoncap;

  }
  
  public function getSalmonint($val=false)
  {

    if($val) return number_format($this->salmonint,2,',','.');
    else return $this->salmonint;

  }
  
  public function getSalmonintmor($val=false)
  {

    if($val) return number_format($this->salmonintmor,2,',','.');
    else return $this->salmonintmor;

  }
  
  public function getSalmonintgra($val=false)
  {

    if($val) return number_format($this->salmonintgra,2,',','.');
    else return $this->salmonintgra;

  }
  
  public function getSalmonintcum($val=false)
  {

    if($val) return number_format($this->salmonintcum,2,',','.');
    else return $this->salmonintcum;

  }
  
  public function getFecpag($format = 'Y-m-d')
  {

    if ($this->fecpag === null || $this->fecpag === '') {
      return null;
    } elseif (!is_int($this->fecpag)) {
            $ts = adodb_strtotime($this->fecpag);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpag] as date/time value: " . var_export($this->fecpag, true));
      }
    } else {
      $ts = $this->fecpag;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrifcue()
  {

    return trim($this->cedrifcue);

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcamoactId()
  {

    return $this->ccamoact_id;

  }
  
  public function getCcpagoId()
  {

    return $this->ccpago_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcamopagPeer::ID;
      }
  
	} 
	
	public function setDebmonint($v)
	{

    if ($this->debmonint !== $v) {
        $this->debmonint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::DEBMONINT;
      }
  
	} 
	
	public function setDebmoncap($v)
	{

    if ($this->debmoncap !== $v) {
        $this->debmoncap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::DEBMONCAP;
      }
  
	} 
	
	public function setDebmonintmor($v)
	{

    if ($this->debmonintmor !== $v) {
        $this->debmonintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::DEBMONINTMOR;
      }
  
	} 
	
	public function setDebmonintgra($v)
	{

    if ($this->debmonintgra !== $v) {
        $this->debmonintgra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::DEBMONINTGRA;
      }
  
	} 
	
	public function setDebmonintcum($v)
	{

    if ($this->debmonintcum !== $v) {
        $this->debmonintcum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::DEBMONINTCUM;
      }
  
	} 
	
	public function setPagmoncap($v)
	{

    if ($this->pagmoncap !== $v) {
        $this->pagmoncap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::PAGMONCAP;
      }
  
	} 
	
	public function setPagmonint($v)
	{

    if ($this->pagmonint !== $v) {
        $this->pagmonint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::PAGMONINT;
      }
  
	} 
	
	public function setPagmonintmor($v)
	{

    if ($this->pagmonintmor !== $v) {
        $this->pagmonintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::PAGMONINTMOR;
      }
  
	} 
	
	public function setPagmonintgra($v)
	{

    if ($this->pagmonintgra !== $v) {
        $this->pagmonintgra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::PAGMONINTGRA;
      }
  
	} 
	
	public function setPagmonintcum($v)
	{

    if ($this->pagmonintcum !== $v) {
        $this->pagmonintcum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::PAGMONINTCUM;
      }
  
	} 
	
	public function setSalmoncap($v)
	{

    if ($this->salmoncap !== $v) {
        $this->salmoncap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::SALMONCAP;
      }
  
	} 
	
	public function setSalmonint($v)
	{

    if ($this->salmonint !== $v) {
        $this->salmonint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::SALMONINT;
      }
  
	} 
	
	public function setSalmonintmor($v)
	{

    if ($this->salmonintmor !== $v) {
        $this->salmonintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::SALMONINTMOR;
      }
  
	} 
	
	public function setSalmonintgra($v)
	{

    if ($this->salmonintgra !== $v) {
        $this->salmonintgra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::SALMONINTGRA;
      }
  
	} 
	
	public function setSalmonintcum($v)
	{

    if ($this->salmonintcum !== $v) {
        $this->salmonintcum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamopagPeer::SALMONINTCUM;
      }
  
	} 
	
	public function setFecpag($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpag] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpag !== $ts) {
      $this->fecpag = $ts;
      $this->modifiedColumns[] = CcamopagPeer::FECPAG;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = CcamopagPeer::FECVEN;
    }

	} 
	
	public function setCedrifcue($v)
	{

    if ($this->cedrifcue !== $v) {
        $this->cedrifcue = $v;
        $this->modifiedColumns[] = CcamopagPeer::CEDRIFCUE;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcamopagPeer::ESTATU;
      }
  
	} 
	
	public function setCcamoactId($v)
	{

    if ($this->ccamoact_id !== $v) {
        $this->ccamoact_id = $v;
        $this->modifiedColumns[] = CcamopagPeer::CCAMOACT_ID;
      }
  
		if ($this->aCcamoact !== null && $this->aCcamoact->getId() !== $v) {
			$this->aCcamoact = null;
		}

	} 
	
	public function setCcpagoId($v)
	{

    if ($this->ccpago_id !== $v) {
        $this->ccpago_id = $v;
        $this->modifiedColumns[] = CcamopagPeer::CCPAGO_ID;
      }
  
		if ($this->aCcpago !== null && $this->aCcpago->getId() !== $v) {
			$this->aCcpago = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcamopagPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcamopagPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcamopagPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcamopagPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->debmonint = $rs->getFloat($startcol + 1);

      $this->debmoncap = $rs->getFloat($startcol + 2);

      $this->debmonintmor = $rs->getFloat($startcol + 3);

      $this->debmonintgra = $rs->getFloat($startcol + 4);

      $this->debmonintcum = $rs->getFloat($startcol + 5);

      $this->pagmoncap = $rs->getFloat($startcol + 6);

      $this->pagmonint = $rs->getFloat($startcol + 7);

      $this->pagmonintmor = $rs->getFloat($startcol + 8);

      $this->pagmonintgra = $rs->getFloat($startcol + 9);

      $this->pagmonintcum = $rs->getFloat($startcol + 10);

      $this->salmoncap = $rs->getFloat($startcol + 11);

      $this->salmonint = $rs->getFloat($startcol + 12);

      $this->salmonintmor = $rs->getFloat($startcol + 13);

      $this->salmonintgra = $rs->getFloat($startcol + 14);

      $this->salmonintcum = $rs->getFloat($startcol + 15);

      $this->fecpag = $rs->getDate($startcol + 16, null);

      $this->fecven = $rs->getDate($startcol + 17, null);

      $this->cedrifcue = $rs->getString($startcol + 18);

      $this->estatu = $rs->getString($startcol + 19);

      $this->ccamoact_id = $rs->getInt($startcol + 20);

      $this->ccpago_id = $rs->getInt($startcol + 21);

      $this->cccredit_id = $rs->getInt($startcol + 22);

      $this->ccperpre_id = $rs->getInt($startcol + 23);

      $this->ccpartid_id = $rs->getInt($startcol + 24);

      $this->ccprogra_id = $rs->getInt($startcol + 25);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 26; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccamopag object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcamopagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcamopagPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcamopagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aCcamoact !== null) {
				if ($this->aCcamoact->isModified()) {
					$affectedRows += $this->aCcamoact->save($con);
				}
				$this->setCcamoact($this->aCcamoact);
			}

			if ($this->aCcpago !== null) {
				if ($this->aCcpago->isModified()) {
					$affectedRows += $this->aCcpago->save($con);
				}
				$this->setCcpago($this->aCcpago);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}

			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}

			if ($this->aCcprogra !== null) {
				if ($this->aCcprogra->isModified()) {
					$affectedRows += $this->aCcprogra->save($con);
				}
				$this->setCcprogra($this->aCcprogra);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcamopagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcamopagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aCcamoact !== null) {
				if (!$this->aCcamoact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcamoact->getValidationFailures());
				}
			}

			if ($this->aCcpago !== null) {
				if (!$this->aCcpago->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpago->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}

			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}

			if ($this->aCcprogra !== null) {
				if (!$this->aCcprogra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcprogra->getValidationFailures());
				}
			}


			if (($retval = CcamopagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamopagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getDebmonint();
				break;
			case 2:
				return $this->getDebmoncap();
				break;
			case 3:
				return $this->getDebmonintmor();
				break;
			case 4:
				return $this->getDebmonintgra();
				break;
			case 5:
				return $this->getDebmonintcum();
				break;
			case 6:
				return $this->getPagmoncap();
				break;
			case 7:
				return $this->getPagmonint();
				break;
			case 8:
				return $this->getPagmonintmor();
				break;
			case 9:
				return $this->getPagmonintgra();
				break;
			case 10:
				return $this->getPagmonintcum();
				break;
			case 11:
				return $this->getSalmoncap();
				break;
			case 12:
				return $this->getSalmonint();
				break;
			case 13:
				return $this->getSalmonintmor();
				break;
			case 14:
				return $this->getSalmonintgra();
				break;
			case 15:
				return $this->getSalmonintcum();
				break;
			case 16:
				return $this->getFecpag();
				break;
			case 17:
				return $this->getFecven();
				break;
			case 18:
				return $this->getCedrifcue();
				break;
			case 19:
				return $this->getEstatu();
				break;
			case 20:
				return $this->getCcamoactId();
				break;
			case 21:
				return $this->getCcpagoId();
				break;
			case 22:
				return $this->getCccreditId();
				break;
			case 23:
				return $this->getCcperpreId();
				break;
			case 24:
				return $this->getCcpartidId();
				break;
			case 25:
				return $this->getCcprograId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamopagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDebmonint(),
			$keys[2] => $this->getDebmoncap(),
			$keys[3] => $this->getDebmonintmor(),
			$keys[4] => $this->getDebmonintgra(),
			$keys[5] => $this->getDebmonintcum(),
			$keys[6] => $this->getPagmoncap(),
			$keys[7] => $this->getPagmonint(),
			$keys[8] => $this->getPagmonintmor(),
			$keys[9] => $this->getPagmonintgra(),
			$keys[10] => $this->getPagmonintcum(),
			$keys[11] => $this->getSalmoncap(),
			$keys[12] => $this->getSalmonint(),
			$keys[13] => $this->getSalmonintmor(),
			$keys[14] => $this->getSalmonintgra(),
			$keys[15] => $this->getSalmonintcum(),
			$keys[16] => $this->getFecpag(),
			$keys[17] => $this->getFecven(),
			$keys[18] => $this->getCedrifcue(),
			$keys[19] => $this->getEstatu(),
			$keys[20] => $this->getCcamoactId(),
			$keys[21] => $this->getCcpagoId(),
			$keys[22] => $this->getCccreditId(),
			$keys[23] => $this->getCcperpreId(),
			$keys[24] => $this->getCcpartidId(),
			$keys[25] => $this->getCcprograId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamopagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setDebmonint($value);
				break;
			case 2:
				$this->setDebmoncap($value);
				break;
			case 3:
				$this->setDebmonintmor($value);
				break;
			case 4:
				$this->setDebmonintgra($value);
				break;
			case 5:
				$this->setDebmonintcum($value);
				break;
			case 6:
				$this->setPagmoncap($value);
				break;
			case 7:
				$this->setPagmonint($value);
				break;
			case 8:
				$this->setPagmonintmor($value);
				break;
			case 9:
				$this->setPagmonintgra($value);
				break;
			case 10:
				$this->setPagmonintcum($value);
				break;
			case 11:
				$this->setSalmoncap($value);
				break;
			case 12:
				$this->setSalmonint($value);
				break;
			case 13:
				$this->setSalmonintmor($value);
				break;
			case 14:
				$this->setSalmonintgra($value);
				break;
			case 15:
				$this->setSalmonintcum($value);
				break;
			case 16:
				$this->setFecpag($value);
				break;
			case 17:
				$this->setFecven($value);
				break;
			case 18:
				$this->setCedrifcue($value);
				break;
			case 19:
				$this->setEstatu($value);
				break;
			case 20:
				$this->setCcamoactId($value);
				break;
			case 21:
				$this->setCcpagoId($value);
				break;
			case 22:
				$this->setCccreditId($value);
				break;
			case 23:
				$this->setCcperpreId($value);
				break;
			case 24:
				$this->setCcpartidId($value);
				break;
			case 25:
				$this->setCcprograId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamopagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDebmonint($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDebmoncap($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDebmonintmor($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDebmonintgra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDebmonintcum($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPagmoncap($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPagmonint($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPagmonintmor($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPagmonintgra($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setPagmonintcum($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSalmoncap($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSalmonint($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSalmonintmor($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSalmonintgra($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSalmonintcum($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFecpag($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFecven($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCedrifcue($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setEstatu($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCcamoactId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCcpagoId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCccreditId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCcperpreId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCcpartidId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCcprograId($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcamopagPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcamopagPeer::ID)) $criteria->add(CcamopagPeer::ID, $this->id);
		if ($this->isColumnModified(CcamopagPeer::DEBMONINT)) $criteria->add(CcamopagPeer::DEBMONINT, $this->debmonint);
		if ($this->isColumnModified(CcamopagPeer::DEBMONCAP)) $criteria->add(CcamopagPeer::DEBMONCAP, $this->debmoncap);
		if ($this->isColumnModified(CcamopagPeer::DEBMONINTMOR)) $criteria->add(CcamopagPeer::DEBMONINTMOR, $this->debmonintmor);
		if ($this->isColumnModified(CcamopagPeer::DEBMONINTGRA)) $criteria->add(CcamopagPeer::DEBMONINTGRA, $this->debmonintgra);
		if ($this->isColumnModified(CcamopagPeer::DEBMONINTCUM)) $criteria->add(CcamopagPeer::DEBMONINTCUM, $this->debmonintcum);
		if ($this->isColumnModified(CcamopagPeer::PAGMONCAP)) $criteria->add(CcamopagPeer::PAGMONCAP, $this->pagmoncap);
		if ($this->isColumnModified(CcamopagPeer::PAGMONINT)) $criteria->add(CcamopagPeer::PAGMONINT, $this->pagmonint);
		if ($this->isColumnModified(CcamopagPeer::PAGMONINTMOR)) $criteria->add(CcamopagPeer::PAGMONINTMOR, $this->pagmonintmor);
		if ($this->isColumnModified(CcamopagPeer::PAGMONINTGRA)) $criteria->add(CcamopagPeer::PAGMONINTGRA, $this->pagmonintgra);
		if ($this->isColumnModified(CcamopagPeer::PAGMONINTCUM)) $criteria->add(CcamopagPeer::PAGMONINTCUM, $this->pagmonintcum);
		if ($this->isColumnModified(CcamopagPeer::SALMONCAP)) $criteria->add(CcamopagPeer::SALMONCAP, $this->salmoncap);
		if ($this->isColumnModified(CcamopagPeer::SALMONINT)) $criteria->add(CcamopagPeer::SALMONINT, $this->salmonint);
		if ($this->isColumnModified(CcamopagPeer::SALMONINTMOR)) $criteria->add(CcamopagPeer::SALMONINTMOR, $this->salmonintmor);
		if ($this->isColumnModified(CcamopagPeer::SALMONINTGRA)) $criteria->add(CcamopagPeer::SALMONINTGRA, $this->salmonintgra);
		if ($this->isColumnModified(CcamopagPeer::SALMONINTCUM)) $criteria->add(CcamopagPeer::SALMONINTCUM, $this->salmonintcum);
		if ($this->isColumnModified(CcamopagPeer::FECPAG)) $criteria->add(CcamopagPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(CcamopagPeer::FECVEN)) $criteria->add(CcamopagPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcamopagPeer::CEDRIFCUE)) $criteria->add(CcamopagPeer::CEDRIFCUE, $this->cedrifcue);
		if ($this->isColumnModified(CcamopagPeer::ESTATU)) $criteria->add(CcamopagPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcamopagPeer::CCAMOACT_ID)) $criteria->add(CcamopagPeer::CCAMOACT_ID, $this->ccamoact_id);
		if ($this->isColumnModified(CcamopagPeer::CCPAGO_ID)) $criteria->add(CcamopagPeer::CCPAGO_ID, $this->ccpago_id);
		if ($this->isColumnModified(CcamopagPeer::CCCREDIT_ID)) $criteria->add(CcamopagPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcamopagPeer::CCPERPRE_ID)) $criteria->add(CcamopagPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcamopagPeer::CCPARTID_ID)) $criteria->add(CcamopagPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcamopagPeer::CCPROGRA_ID)) $criteria->add(CcamopagPeer::CCPROGRA_ID, $this->ccprogra_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcamopagPeer::DATABASE_NAME);

		$criteria->add(CcamopagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setDebmonint($this->debmonint);

		$copyObj->setDebmoncap($this->debmoncap);

		$copyObj->setDebmonintmor($this->debmonintmor);

		$copyObj->setDebmonintgra($this->debmonintgra);

		$copyObj->setDebmonintcum($this->debmonintcum);

		$copyObj->setPagmoncap($this->pagmoncap);

		$copyObj->setPagmonint($this->pagmonint);

		$copyObj->setPagmonintmor($this->pagmonintmor);

		$copyObj->setPagmonintgra($this->pagmonintgra);

		$copyObj->setPagmonintcum($this->pagmonintcum);

		$copyObj->setSalmoncap($this->salmoncap);

		$copyObj->setSalmonint($this->salmonint);

		$copyObj->setSalmonintmor($this->salmonintmor);

		$copyObj->setSalmonintgra($this->salmonintgra);

		$copyObj->setSalmonintcum($this->salmonintcum);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCedrifcue($this->cedrifcue);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcamoactId($this->ccamoact_id);

		$copyObj->setCcpagoId($this->ccpago_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);


		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CcamopagPeer();
		}
		return self::$peer;
	}

	
	public function setCcamoact($v)
	{


		if ($v === null) {
			$this->setCcamoactId(NULL);
		} else {
			$this->setCcamoactId($v->getId());
		}


		$this->aCcamoact = $v;
	}


	
	public function getCcamoact($con = null)
	{
		if ($this->aCcamoact === null && ($this->ccamoact_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';

      $c = new Criteria();
      $c->add(CcamoactPeer::ID,$this->ccamoact_id);
      
			$this->aCcamoact = CcamoactPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcamoact;
	}

	
	public function setCcpago($v)
	{


		if ($v === null) {
			$this->setCcpagoId(NULL);
		} else {
			$this->setCcpagoId($v->getId());
		}


		$this->aCcpago = $v;
	}


	
	public function getCcpago($con = null)
	{
		if ($this->aCcpago === null && ($this->ccpago_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';

      $c = new Criteria();
      $c->add(CcpagoPeer::ID,$this->ccpago_id);
      
			$this->aCcpago = CcpagoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpago;
	}

	
	public function setCccredit($v)
	{


		if ($v === null) {
			$this->setCccreditId(NULL);
		} else {
			$this->setCccreditId($v->getId());
		}


		$this->aCccredit = $v;
	}


	
	public function getCccredit($con = null)
	{
		if ($this->aCccredit === null && ($this->cccredit_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccreditPeer.php';

      $c = new Criteria();
      $c->add(CccreditPeer::ID,$this->cccredit_id);
      
			$this->aCccredit = CccreditPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccredit;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
	}

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
	}

	
	public function setCcprogra($v)
	{


		if ($v === null) {
			$this->setCcprograId(NULL);
		} else {
			$this->setCcprograId($v->getId());
		}


		$this->aCcprogra = $v;
	}


	
	public function getCcprogra($con = null)
	{
		if ($this->aCcprogra === null && ($this->ccprogra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcprograPeer.php';

      $c = new Criteria();
      $c->add(CcprograPeer::ID,$this->ccprogra_id);
      
			$this->aCcprogra = CcprograPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcprogra;
	}

} 