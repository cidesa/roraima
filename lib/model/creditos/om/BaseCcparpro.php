<?php


abstract class BaseCcparpro extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $plazo;


	
	protected $permue;


	
	protected $pergra;


	
	protected $modali;


	
	protected $numcuo;


	
	protected $numcuofin;


	
	protected $tasint;


	
	protected $tasintmor;


	
	protected $fecdespp;


	
	protected $fechaspp;


	
	protected $coduni;


	
	protected $intgrava;


	
	protected $intcuminc;


	
	protected $contabb_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;


	
	protected $cctipint_id;


	
	protected $ccdeducc_id;


	
	protected $ccpergrava_id;

	
	protected $aContabb;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
	protected $aCctipint;

	
	protected $aCcdeducc;

	
	protected $aCcperiod;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPlazo()
  {

    return $this->plazo;

  }
  
  public function getPermue()
  {

    return $this->permue;

  }
  
  public function getPergra()
  {

    return $this->pergra;

  }
  
  public function getModali()
  {

    return $this->modali;

  }
  
  public function getNumcuo()
  {

    return $this->numcuo;

  }
  
  public function getNumcuofin()
  {

    return $this->numcuofin;

  }
  
  public function getTasint($val=false)
  {

    if($val) return number_format($this->tasint,2,',','.');
    else return $this->tasint;

  }
  
  public function getTasintmor($val=false)
  {

    if($val) return number_format($this->tasintmor,2,',','.');
    else return $this->tasintmor;

  }
  
  public function getFecdespp($format = 'Y-m-d')
  {

    if ($this->fecdespp === null || $this->fecdespp === '') {
      return null;
    } elseif (!is_int($this->fecdespp)) {
            $ts = adodb_strtotime($this->fecdespp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdespp] as date/time value: " . var_export($this->fecdespp, true));
      }
    } else {
      $ts = $this->fecdespp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFechaspp($format = 'Y-m-d')
  {

    if ($this->fechaspp === null || $this->fechaspp === '') {
      return null;
    } elseif (!is_int($this->fechaspp)) {
            $ts = adodb_strtotime($this->fechaspp);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fechaspp] as date/time value: " . var_export($this->fechaspp, true));
      }
    } else {
      $ts = $this->fechaspp;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getIntgrava($val=false)
  {

    if($val) return number_format($this->intgrava,2,',','.');
    else return $this->intgrava;

  }
  
  public function getIntcuminc($val=false)
  {

    if($val) return number_format($this->intcuminc,2,',','.');
    else return $this->intcuminc;

  }
  
  public function getContabbId()
  {

    return $this->contabb_id;

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
  
  public function getCcprograId()
  {

    return $this->ccprogra_id;

  }
  
  public function getCctipintId()
  {

    return $this->cctipint_id;

  }
  
  public function getCcdeduccId()
  {

    return $this->ccdeducc_id;

  }
  
  public function getCcpergravaId()
  {

    return $this->ccpergrava_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparproPeer::ID;
      }
  
	} 
	
	public function setPlazo($v)
	{

    if ($this->plazo !== $v) {
        $this->plazo = $v;
        $this->modifiedColumns[] = CcparproPeer::PLAZO;
      }
  
	} 
	
	public function setPermue($v)
	{

    if ($this->permue !== $v) {
        $this->permue = $v;
        $this->modifiedColumns[] = CcparproPeer::PERMUE;
      }
  
	} 
	
	public function setPergra($v)
	{

    if ($this->pergra !== $v) {
        $this->pergra = $v;
        $this->modifiedColumns[] = CcparproPeer::PERGRA;
      }
  
	} 
	
	public function setModali($v)
	{

    if ($this->modali !== $v) {
        $this->modali = $v;
        $this->modifiedColumns[] = CcparproPeer::MODALI;
      }
  
	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = $v;
        $this->modifiedColumns[] = CcparproPeer::NUMCUO;
      }
  
	} 
	
	public function setNumcuofin($v)
	{

    if ($this->numcuofin !== $v) {
        $this->numcuofin = $v;
        $this->modifiedColumns[] = CcparproPeer::NUMCUOFIN;
      }
  
	} 
	
	public function setTasint($v)
	{

    if ($this->tasint !== $v) {
        $this->tasint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparproPeer::TASINT;
      }
  
	} 
	
	public function setTasintmor($v)
	{

    if ($this->tasintmor !== $v) {
        $this->tasintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparproPeer::TASINTMOR;
      }
  
	} 
	
	public function setFecdespp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdespp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdespp !== $ts) {
      $this->fecdespp = $ts;
      $this->modifiedColumns[] = CcparproPeer::FECDESPP;
    }

	} 
	
	public function setFechaspp($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fechaspp] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fechaspp !== $ts) {
      $this->fechaspp = $ts;
      $this->modifiedColumns[] = CcparproPeer::FECHASPP;
    }

	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = CcparproPeer::CODUNI;
      }
  
	} 
	
	public function setIntgrava($v)
	{

    if ($this->intgrava !== $v) {
        $this->intgrava = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparproPeer::INTGRAVA;
      }
  
	} 
	
	public function setIntcuminc($v)
	{

    if ($this->intcuminc !== $v) {
        $this->intcuminc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcparproPeer::INTCUMINC;
      }
  
	} 
	
	public function setContabbId($v)
	{

    if ($this->contabb_id !== $v) {
        $this->contabb_id = $v;
        $this->modifiedColumns[] = CcparproPeer::CONTABB_ID;
      }
  
		if ($this->aContabb !== null && $this->aContabb->getId() !== $v) {
			$this->aContabb = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcparproPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcparproPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
	
	public function setCctipintId($v)
	{

    if ($this->cctipint_id !== $v) {
        $this->cctipint_id = $v;
        $this->modifiedColumns[] = CcparproPeer::CCTIPINT_ID;
      }
  
		if ($this->aCctipint !== null && $this->aCctipint->getId() !== $v) {
			$this->aCctipint = null;
		}

	} 
	
	public function setCcdeduccId($v)
	{

    if ($this->ccdeducc_id !== $v) {
        $this->ccdeducc_id = $v;
        $this->modifiedColumns[] = CcparproPeer::CCDEDUCC_ID;
      }
  
		if ($this->aCcdeducc !== null && $this->aCcdeducc->getId() !== $v) {
			$this->aCcdeducc = null;
		}

	} 
	
	public function setCcpergravaId($v)
	{

    if ($this->ccpergrava_id !== $v) {
        $this->ccpergrava_id = $v;
        $this->modifiedColumns[] = CcparproPeer::CCPERGRAVA_ID;
      }
  
		if ($this->aCcperiod !== null && $this->aCcperiod->getId() !== $v) {
			$this->aCcperiod = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->plazo = $rs->getInt($startcol + 1);

      $this->permue = $rs->getInt($startcol + 2);

      $this->pergra = $rs->getInt($startcol + 3);

      $this->modali = $rs->getBoolean($startcol + 4);

      $this->numcuo = $rs->getInt($startcol + 5);

      $this->numcuofin = $rs->getInt($startcol + 6);

      $this->tasint = $rs->getFloat($startcol + 7);

      $this->tasintmor = $rs->getFloat($startcol + 8);

      $this->fecdespp = $rs->getDate($startcol + 9, null);

      $this->fechaspp = $rs->getDate($startcol + 10, null);

      $this->coduni = $rs->getString($startcol + 11);

      $this->intgrava = $rs->getFloat($startcol + 12);

      $this->intcuminc = $rs->getFloat($startcol + 13);

      $this->contabb_id = $rs->getInt($startcol + 14);

      $this->ccpartid_id = $rs->getInt($startcol + 15);

      $this->ccprogra_id = $rs->getInt($startcol + 16);

      $this->cctipint_id = $rs->getInt($startcol + 17);

      $this->ccdeducc_id = $rs->getInt($startcol + 18);

      $this->ccpergrava_id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparpro object", $e);
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
			$con = Propel::getConnection(CcparproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparproPeer::DATABASE_NAME);
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


												
			if ($this->aContabb !== null) {
				if ($this->aContabb->isModified()) {
					$affectedRows += $this->aContabb->save($con);
				}
				$this->setContabb($this->aContabb);
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

			if ($this->aCctipint !== null) {
				if ($this->aCctipint->isModified()) {
					$affectedRows += $this->aCctipint->save($con);
				}
				$this->setCctipint($this->aCctipint);
			}

			if ($this->aCcdeducc !== null) {
				if ($this->aCcdeducc->isModified()) {
					$affectedRows += $this->aCcdeducc->save($con);
				}
				$this->setCcdeducc($this->aCcdeducc);
			}

			if ($this->aCcperiod !== null) {
				if ($this->aCcperiod->isModified()) {
					$affectedRows += $this->aCcperiod->save($con);
				}
				$this->setCcperiod($this->aCcperiod);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcparproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparproPeer::doUpdate($this, $con);
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


												
			if ($this->aContabb !== null) {
				if (!$this->aContabb->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContabb->getValidationFailures());
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

			if ($this->aCctipint !== null) {
				if (!$this->aCctipint->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctipint->getValidationFailures());
				}
			}

			if ($this->aCcdeducc !== null) {
				if (!$this->aCcdeducc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdeducc->getValidationFailures());
				}
			}

			if ($this->aCcperiod !== null) {
				if (!$this->aCcperiod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperiod->getValidationFailures());
				}
			}


			if (($retval = CcparproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPlazo();
				break;
			case 2:
				return $this->getPermue();
				break;
			case 3:
				return $this->getPergra();
				break;
			case 4:
				return $this->getModali();
				break;
			case 5:
				return $this->getNumcuo();
				break;
			case 6:
				return $this->getNumcuofin();
				break;
			case 7:
				return $this->getTasint();
				break;
			case 8:
				return $this->getTasintmor();
				break;
			case 9:
				return $this->getFecdespp();
				break;
			case 10:
				return $this->getFechaspp();
				break;
			case 11:
				return $this->getCoduni();
				break;
			case 12:
				return $this->getIntgrava();
				break;
			case 13:
				return $this->getIntcuminc();
				break;
			case 14:
				return $this->getContabbId();
				break;
			case 15:
				return $this->getCcpartidId();
				break;
			case 16:
				return $this->getCcprograId();
				break;
			case 17:
				return $this->getCctipintId();
				break;
			case 18:
				return $this->getCcdeduccId();
				break;
			case 19:
				return $this->getCcpergravaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparproPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPlazo(),
			$keys[2] => $this->getPermue(),
			$keys[3] => $this->getPergra(),
			$keys[4] => $this->getModali(),
			$keys[5] => $this->getNumcuo(),
			$keys[6] => $this->getNumcuofin(),
			$keys[7] => $this->getTasint(),
			$keys[8] => $this->getTasintmor(),
			$keys[9] => $this->getFecdespp(),
			$keys[10] => $this->getFechaspp(),
			$keys[11] => $this->getCoduni(),
			$keys[12] => $this->getIntgrava(),
			$keys[13] => $this->getIntcuminc(),
			$keys[14] => $this->getContabbId(),
			$keys[15] => $this->getCcpartidId(),
			$keys[16] => $this->getCcprograId(),
			$keys[17] => $this->getCctipintId(),
			$keys[18] => $this->getCcdeduccId(),
			$keys[19] => $this->getCcpergravaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPlazo($value);
				break;
			case 2:
				$this->setPermue($value);
				break;
			case 3:
				$this->setPergra($value);
				break;
			case 4:
				$this->setModali($value);
				break;
			case 5:
				$this->setNumcuo($value);
				break;
			case 6:
				$this->setNumcuofin($value);
				break;
			case 7:
				$this->setTasint($value);
				break;
			case 8:
				$this->setTasintmor($value);
				break;
			case 9:
				$this->setFecdespp($value);
				break;
			case 10:
				$this->setFechaspp($value);
				break;
			case 11:
				$this->setCoduni($value);
				break;
			case 12:
				$this->setIntgrava($value);
				break;
			case 13:
				$this->setIntcuminc($value);
				break;
			case 14:
				$this->setContabbId($value);
				break;
			case 15:
				$this->setCcpartidId($value);
				break;
			case 16:
				$this->setCcprograId($value);
				break;
			case 17:
				$this->setCctipintId($value);
				break;
			case 18:
				$this->setCcdeduccId($value);
				break;
			case 19:
				$this->setCcpergravaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparproPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPlazo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPermue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPergra($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setModali($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumcuo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNumcuofin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTasint($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTasintmor($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecdespp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFechaspp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCoduni($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIntgrava($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setIntcuminc($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setContabbId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCcpartidId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcprograId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCctipintId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCcdeduccId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCcpergravaId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparproPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparproPeer::ID)) $criteria->add(CcparproPeer::ID, $this->id);
		if ($this->isColumnModified(CcparproPeer::PLAZO)) $criteria->add(CcparproPeer::PLAZO, $this->plazo);
		if ($this->isColumnModified(CcparproPeer::PERMUE)) $criteria->add(CcparproPeer::PERMUE, $this->permue);
		if ($this->isColumnModified(CcparproPeer::PERGRA)) $criteria->add(CcparproPeer::PERGRA, $this->pergra);
		if ($this->isColumnModified(CcparproPeer::MODALI)) $criteria->add(CcparproPeer::MODALI, $this->modali);
		if ($this->isColumnModified(CcparproPeer::NUMCUO)) $criteria->add(CcparproPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(CcparproPeer::NUMCUOFIN)) $criteria->add(CcparproPeer::NUMCUOFIN, $this->numcuofin);
		if ($this->isColumnModified(CcparproPeer::TASINT)) $criteria->add(CcparproPeer::TASINT, $this->tasint);
		if ($this->isColumnModified(CcparproPeer::TASINTMOR)) $criteria->add(CcparproPeer::TASINTMOR, $this->tasintmor);
		if ($this->isColumnModified(CcparproPeer::FECDESPP)) $criteria->add(CcparproPeer::FECDESPP, $this->fecdespp);
		if ($this->isColumnModified(CcparproPeer::FECHASPP)) $criteria->add(CcparproPeer::FECHASPP, $this->fechaspp);
		if ($this->isColumnModified(CcparproPeer::CODUNI)) $criteria->add(CcparproPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(CcparproPeer::INTGRAVA)) $criteria->add(CcparproPeer::INTGRAVA, $this->intgrava);
		if ($this->isColumnModified(CcparproPeer::INTCUMINC)) $criteria->add(CcparproPeer::INTCUMINC, $this->intcuminc);
		if ($this->isColumnModified(CcparproPeer::CONTABB_ID)) $criteria->add(CcparproPeer::CONTABB_ID, $this->contabb_id);
		if ($this->isColumnModified(CcparproPeer::CCPARTID_ID)) $criteria->add(CcparproPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcparproPeer::CCPROGRA_ID)) $criteria->add(CcparproPeer::CCPROGRA_ID, $this->ccprogra_id);
		if ($this->isColumnModified(CcparproPeer::CCTIPINT_ID)) $criteria->add(CcparproPeer::CCTIPINT_ID, $this->cctipint_id);
		if ($this->isColumnModified(CcparproPeer::CCDEDUCC_ID)) $criteria->add(CcparproPeer::CCDEDUCC_ID, $this->ccdeducc_id);
		if ($this->isColumnModified(CcparproPeer::CCPERGRAVA_ID)) $criteria->add(CcparproPeer::CCPERGRAVA_ID, $this->ccpergrava_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparproPeer::DATABASE_NAME);

		$criteria->add(CcparproPeer::ID, $this->id);

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

		$copyObj->setPlazo($this->plazo);

		$copyObj->setPermue($this->permue);

		$copyObj->setPergra($this->pergra);

		$copyObj->setModali($this->modali);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setNumcuofin($this->numcuofin);

		$copyObj->setTasint($this->tasint);

		$copyObj->setTasintmor($this->tasintmor);

		$copyObj->setFecdespp($this->fecdespp);

		$copyObj->setFechaspp($this->fechaspp);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setIntgrava($this->intgrava);

		$copyObj->setIntcuminc($this->intcuminc);

		$copyObj->setContabbId($this->contabb_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);

		$copyObj->setCctipintId($this->cctipint_id);

		$copyObj->setCcdeduccId($this->ccdeducc_id);

		$copyObj->setCcpergravaId($this->ccpergrava_id);


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
			self::$peer = new CcparproPeer();
		}
		return self::$peer;
	}

	
	public function setContabb($v)
	{


		if ($v === null) {
			$this->setContabbId(NULL);
		} else {
			$this->setContabbId($v->getId());
		}


		$this->aContabb = $v;
	}


	
	public function getContabb($con = null)
	{
		if ($this->aContabb === null && ($this->contabb_id !== null)) {
						include_once 'lib/model/contabilidad/om/BaseContabbPeer.php';

      $c = new Criteria();
      $c->add(ContabbPeer::ID,$this->contabb_id);
      
			$this->aContabb = ContabbPeer::doSelectOne($c, $con);

			
		}
		return $this->aContabb;
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

	
	public function setCctipint($v)
	{


		if ($v === null) {
			$this->setCctipintId(NULL);
		} else {
			$this->setCctipintId($v->getId());
		}


		$this->aCctipint = $v;
	}


	
	public function getCctipint($con = null)
	{
		if ($this->aCctipint === null && ($this->cctipint_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctipintPeer.php';

      $c = new Criteria();
      $c->add(CctipintPeer::ID,$this->cctipint_id);
      
			$this->aCctipint = CctipintPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctipint;
	}

	
	public function setCcdeducc($v)
	{


		if ($v === null) {
			$this->setCcdeduccId(NULL);
		} else {
			$this->setCcdeduccId($v->getId());
		}


		$this->aCcdeducc = $v;
	}


	
	public function getCcdeducc($con = null)
	{
		if ($this->aCcdeducc === null && ($this->ccdeducc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdeduccPeer.php';

      $c = new Criteria();
      $c->add(CcdeduccPeer::ID,$this->ccdeducc_id);
      
			$this->aCcdeducc = CcdeduccPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdeducc;
	}

	
	public function setCcperiod($v)
	{


		if ($v === null) {
			$this->setCcpergravaId(NULL);
		} else {
			$this->setCcpergravaId($v->getId());
		}


		$this->aCcperiod = $v;
	}


	
	public function getCcperiod($con = null)
	{
		if ($this->aCcperiod === null && ($this->ccpergrava_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperiodPeer.php';

      $c = new Criteria();
      $c->add(CcperiodPeer::ID,$this->ccpergrava_id);
      
			$this->aCcperiod = CcperiodPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperiod;
	}

} 