<?php


abstract class BaseCcamoact extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $capini;


	
	protected $monint;


	
	protected $fecven;


	
	protected $estatu;


	
	protected $monpri;


	
	protected $monsalcap;


	
	protected $numcuo;


	
	protected $moncuo;


	
	protected $monintmor;


	
	protected $monintgra;


	
	protected $monintcum;


	
	protected $montotcuo;


	
	protected $tipcuo;


	
	protected $ccdefamo_id;


	
	protected $cccredit_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;

	
	protected $aCcdefamo;

	
	protected $aCccredit;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
	protected $collCcamodebcues;

	
	protected $lastCcamodebcueCriteria = null;

	
	protected $collCcamopags;

	
	protected $lastCcamopagCriteria = null;

	
	protected $collCcamoprins;

	
	protected $lastCcamoprinCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCapini($val=false)
  {

    if($val) return number_format($this->capini,2,',','.');
    else return $this->capini;

  }
  
  public function getMonint($val=false)
  {

    if($val) return number_format($this->monint,2,',','.');
    else return $this->monint;

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

  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getMonpri($val=false)
  {

    if($val) return number_format($this->monpri,2,',','.');
    else return $this->monpri;

  }
  
  public function getMonsalcap($val=false)
  {

    if($val) return number_format($this->monsalcap,2,',','.');
    else return $this->monsalcap;

  }
  
  public function getNumcuo()
  {

    return $this->numcuo;

  }
  
  public function getMoncuo($val=false)
  {

    if($val) return number_format($this->moncuo,2,',','.');
    else return $this->moncuo;

  }
  
  public function getMonintmor($val=false)
  {

    if($val) return number_format($this->monintmor,2,',','.');
    else return $this->monintmor;

  }
  
  public function getMonintgra($val=false)
  {

    if($val) return number_format($this->monintgra,2,',','.');
    else return $this->monintgra;

  }
  
  public function getMonintcum($val=false)
  {

    if($val) return number_format($this->monintcum,2,',','.');
    else return $this->monintcum;

  }
  
  public function getMontotcuo($val=false)
  {

    if($val) return number_format($this->montotcuo,2,',','.');
    else return $this->montotcuo;

  }
  
  public function getTipcuo()
  {

    return trim($this->tipcuo);

  }
  
  public function getCcdefamoId()
  {

    return $this->ccdefamo_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

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
        $this->modifiedColumns[] = CcamoactPeer::ID;
      }
  
	} 
	
	public function setCapini($v)
	{

    if ($this->capini !== $v) {
        $this->capini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::CAPINI;
      }
  
	} 
	
	public function setMonint($v)
	{

    if ($this->monint !== $v) {
        $this->monint = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONINT;
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
      $this->modifiedColumns[] = CcamoactPeer::FECVEN;
    }

	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcamoactPeer::ESTATU;
      }
  
	} 
	
	public function setMonpri($v)
	{

    if ($this->monpri !== $v) {
        $this->monpri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONPRI;
      }
  
	} 
	
	public function setMonsalcap($v)
	{

    if ($this->monsalcap !== $v) {
        $this->monsalcap = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONSALCAP;
      }
  
	} 
	
	public function setNumcuo($v)
	{

    if ($this->numcuo !== $v) {
        $this->numcuo = $v;
        $this->modifiedColumns[] = CcamoactPeer::NUMCUO;
      }
  
	} 
	
	public function setMoncuo($v)
	{

    if ($this->moncuo !== $v) {
        $this->moncuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONCUO;
      }
  
	} 
	
	public function setMonintmor($v)
	{

    if ($this->monintmor !== $v) {
        $this->monintmor = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONINTMOR;
      }
  
	} 
	
	public function setMonintgra($v)
	{

    if ($this->monintgra !== $v) {
        $this->monintgra = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONINTGRA;
      }
  
	} 
	
	public function setMonintcum($v)
	{

    if ($this->monintcum !== $v) {
        $this->monintcum = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONINTCUM;
      }
  
	} 
	
	public function setMontotcuo($v)
	{

    if ($this->montotcuo !== $v) {
        $this->montotcuo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcamoactPeer::MONTOTCUO;
      }
  
	} 
	
	public function setTipcuo($v)
	{

    if ($this->tipcuo !== $v) {
        $this->tipcuo = $v;
        $this->modifiedColumns[] = CcamoactPeer::TIPCUO;
      }
  
	} 
	
	public function setCcdefamoId($v)
	{

    if ($this->ccdefamo_id !== $v) {
        $this->ccdefamo_id = $v;
        $this->modifiedColumns[] = CcamoactPeer::CCDEFAMO_ID;
      }
  
		if ($this->aCcdefamo !== null && $this->aCcdefamo->getId() !== $v) {
			$this->aCcdefamo = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcamoactPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcamoactPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CcamoactPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->capini = $rs->getFloat($startcol + 1);

      $this->monint = $rs->getFloat($startcol + 2);

      $this->fecven = $rs->getDate($startcol + 3, null);

      $this->estatu = $rs->getString($startcol + 4);

      $this->monpri = $rs->getFloat($startcol + 5);

      $this->monsalcap = $rs->getFloat($startcol + 6);

      $this->numcuo = $rs->getInt($startcol + 7);

      $this->moncuo = $rs->getFloat($startcol + 8);

      $this->monintmor = $rs->getFloat($startcol + 9);

      $this->monintgra = $rs->getFloat($startcol + 10);

      $this->monintcum = $rs->getFloat($startcol + 11);

      $this->montotcuo = $rs->getFloat($startcol + 12);

      $this->tipcuo = $rs->getString($startcol + 13);

      $this->ccdefamo_id = $rs->getInt($startcol + 14);

      $this->cccredit_id = $rs->getInt($startcol + 15);

      $this->ccpartid_id = $rs->getInt($startcol + 16);

      $this->ccprogra_id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccamoact object", $e);
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
			$con = Propel::getConnection(CcamoactPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcamoactPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcamoactPeer::DATABASE_NAME);
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


												
			if ($this->aCcdefamo !== null) {
				if ($this->aCcdefamo->isModified()) {
					$affectedRows += $this->aCcdefamo->save($con);
				}
				$this->setCcdefamo($this->aCcdefamo);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
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
					$pk = CcamoactPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcamoactPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcamodebcues !== null) {
				foreach($this->collCcamodebcues as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamopags !== null) {
				foreach($this->collCcamopags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamoprins !== null) {
				foreach($this->collCcamoprins as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aCcdefamo !== null) {
				if (!$this->aCcdefamo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcdefamo->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
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


			if (($retval = CcamoactPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcamodebcues !== null) {
					foreach($this->collCcamodebcues as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamopags !== null) {
					foreach($this->collCcamopags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamoprins !== null) {
					foreach($this->collCcamoprins as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamoactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCapini();
				break;
			case 2:
				return $this->getMonint();
				break;
			case 3:
				return $this->getFecven();
				break;
			case 4:
				return $this->getEstatu();
				break;
			case 5:
				return $this->getMonpri();
				break;
			case 6:
				return $this->getMonsalcap();
				break;
			case 7:
				return $this->getNumcuo();
				break;
			case 8:
				return $this->getMoncuo();
				break;
			case 9:
				return $this->getMonintmor();
				break;
			case 10:
				return $this->getMonintgra();
				break;
			case 11:
				return $this->getMonintcum();
				break;
			case 12:
				return $this->getMontotcuo();
				break;
			case 13:
				return $this->getTipcuo();
				break;
			case 14:
				return $this->getCcdefamoId();
				break;
			case 15:
				return $this->getCccreditId();
				break;
			case 16:
				return $this->getCcpartidId();
				break;
			case 17:
				return $this->getCcprograId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamoactPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCapini(),
			$keys[2] => $this->getMonint(),
			$keys[3] => $this->getFecven(),
			$keys[4] => $this->getEstatu(),
			$keys[5] => $this->getMonpri(),
			$keys[6] => $this->getMonsalcap(),
			$keys[7] => $this->getNumcuo(),
			$keys[8] => $this->getMoncuo(),
			$keys[9] => $this->getMonintmor(),
			$keys[10] => $this->getMonintgra(),
			$keys[11] => $this->getMonintcum(),
			$keys[12] => $this->getMontotcuo(),
			$keys[13] => $this->getTipcuo(),
			$keys[14] => $this->getCcdefamoId(),
			$keys[15] => $this->getCccreditId(),
			$keys[16] => $this->getCcpartidId(),
			$keys[17] => $this->getCcprograId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcamoactPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCapini($value);
				break;
			case 2:
				$this->setMonint($value);
				break;
			case 3:
				$this->setFecven($value);
				break;
			case 4:
				$this->setEstatu($value);
				break;
			case 5:
				$this->setMonpri($value);
				break;
			case 6:
				$this->setMonsalcap($value);
				break;
			case 7:
				$this->setNumcuo($value);
				break;
			case 8:
				$this->setMoncuo($value);
				break;
			case 9:
				$this->setMonintmor($value);
				break;
			case 10:
				$this->setMonintgra($value);
				break;
			case 11:
				$this->setMonintcum($value);
				break;
			case 12:
				$this->setMontotcuo($value);
				break;
			case 13:
				$this->setTipcuo($value);
				break;
			case 14:
				$this->setCcdefamoId($value);
				break;
			case 15:
				$this->setCccreditId($value);
				break;
			case 16:
				$this->setCcpartidId($value);
				break;
			case 17:
				$this->setCcprograId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcamoactPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCapini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonint($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecven($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEstatu($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonpri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonsalcap($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcuo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMoncuo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMonintmor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonintgra($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonintcum($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMontotcuo($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipcuo($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCcdefamoId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCccreditId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcpartidId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCcprograId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcamoactPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcamoactPeer::ID)) $criteria->add(CcamoactPeer::ID, $this->id);
		if ($this->isColumnModified(CcamoactPeer::CAPINI)) $criteria->add(CcamoactPeer::CAPINI, $this->capini);
		if ($this->isColumnModified(CcamoactPeer::MONINT)) $criteria->add(CcamoactPeer::MONINT, $this->monint);
		if ($this->isColumnModified(CcamoactPeer::FECVEN)) $criteria->add(CcamoactPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcamoactPeer::ESTATU)) $criteria->add(CcamoactPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcamoactPeer::MONPRI)) $criteria->add(CcamoactPeer::MONPRI, $this->monpri);
		if ($this->isColumnModified(CcamoactPeer::MONSALCAP)) $criteria->add(CcamoactPeer::MONSALCAP, $this->monsalcap);
		if ($this->isColumnModified(CcamoactPeer::NUMCUO)) $criteria->add(CcamoactPeer::NUMCUO, $this->numcuo);
		if ($this->isColumnModified(CcamoactPeer::MONCUO)) $criteria->add(CcamoactPeer::MONCUO, $this->moncuo);
		if ($this->isColumnModified(CcamoactPeer::MONINTMOR)) $criteria->add(CcamoactPeer::MONINTMOR, $this->monintmor);
		if ($this->isColumnModified(CcamoactPeer::MONINTGRA)) $criteria->add(CcamoactPeer::MONINTGRA, $this->monintgra);
		if ($this->isColumnModified(CcamoactPeer::MONINTCUM)) $criteria->add(CcamoactPeer::MONINTCUM, $this->monintcum);
		if ($this->isColumnModified(CcamoactPeer::MONTOTCUO)) $criteria->add(CcamoactPeer::MONTOTCUO, $this->montotcuo);
		if ($this->isColumnModified(CcamoactPeer::TIPCUO)) $criteria->add(CcamoactPeer::TIPCUO, $this->tipcuo);
		if ($this->isColumnModified(CcamoactPeer::CCDEFAMO_ID)) $criteria->add(CcamoactPeer::CCDEFAMO_ID, $this->ccdefamo_id);
		if ($this->isColumnModified(CcamoactPeer::CCCREDIT_ID)) $criteria->add(CcamoactPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcamoactPeer::CCPARTID_ID)) $criteria->add(CcamoactPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CcamoactPeer::CCPROGRA_ID)) $criteria->add(CcamoactPeer::CCPROGRA_ID, $this->ccprogra_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcamoactPeer::DATABASE_NAME);

		$criteria->add(CcamoactPeer::ID, $this->id);

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

		$copyObj->setCapini($this->capini);

		$copyObj->setMonint($this->monint);

		$copyObj->setFecven($this->fecven);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setMonpri($this->monpri);

		$copyObj->setMonsalcap($this->monsalcap);

		$copyObj->setNumcuo($this->numcuo);

		$copyObj->setMoncuo($this->moncuo);

		$copyObj->setMonintmor($this->monintmor);

		$copyObj->setMonintgra($this->monintgra);

		$copyObj->setMonintcum($this->monintcum);

		$copyObj->setMontotcuo($this->montotcuo);

		$copyObj->setTipcuo($this->tipcuo);

		$copyObj->setCcdefamoId($this->ccdefamo_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamodebcues() as $relObj) {
				$copyObj->addCcamodebcue($relObj->copy($deepCopy));
			}

			foreach($this->getCcamopags() as $relObj) {
				$copyObj->addCcamopag($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoprins() as $relObj) {
				$copyObj->addCcamoprin($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new CcamoactPeer();
		}
		return self::$peer;
	}

	
	public function setCcdefamo($v)
	{


		if ($v === null) {
			$this->setCcdefamoId(NULL);
		} else {
			$this->setCcdefamoId($v->getId());
		}


		$this->aCcdefamo = $v;
	}


	
	public function getCcdefamo($con = null)
	{
		if ($this->aCcdefamo === null && ($this->ccdefamo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';

      $c = new Criteria();
      $c->add(CcdefamoPeer::ID,$this->ccdefamo_id);
      
			$this->aCcdefamo = CcdefamoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcdefamo;
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

	
	public function initCcamodebcues()
	{
		if ($this->collCcamodebcues === null) {
			$this->collCcamodebcues = array();
		}
	}

	
	public function getCcamodebcues($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamodebcuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamodebcues === null) {
			if ($this->isNew()) {
			   $this->collCcamodebcues = array();
			} else {

				$criteria->add(CcamodebcuePeer::CCAMOACT_ID, $this->getId());

				CcamodebcuePeer::addSelectColumns($criteria);
				$this->collCcamodebcues = CcamodebcuePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamodebcuePeer::CCAMOACT_ID, $this->getId());

				CcamodebcuePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamodebcueCriteria) || !$this->lastCcamodebcueCriteria->equals($criteria)) {
					$this->collCcamodebcues = CcamodebcuePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamodebcueCriteria = $criteria;
		return $this->collCcamodebcues;
	}

	
	public function countCcamodebcues($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamodebcuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamodebcuePeer::CCAMOACT_ID, $this->getId());

		return CcamodebcuePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamodebcue(Ccamodebcue $l)
	{
		$this->collCcamodebcues[] = $l;
		$l->setCcamoact($this);
	}


	
	public function getCcamodebcuesJoinCcdebcue($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamodebcuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamodebcues === null) {
			if ($this->isNew()) {
				$this->collCcamodebcues = array();
			} else {

				$criteria->add(CcamodebcuePeer::CCAMOACT_ID, $this->getId());

				$this->collCcamodebcues = CcamodebcuePeer::doSelectJoinCcdebcue($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamodebcuePeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamodebcueCriteria) || !$this->lastCcamodebcueCriteria->equals($criteria)) {
				$this->collCcamodebcues = CcamodebcuePeer::doSelectJoinCcdebcue($criteria, $con);
			}
		}
		$this->lastCcamodebcueCriteria = $criteria;

		return $this->collCcamodebcues;
	}

	
	public function initCcamopags()
	{
		if ($this->collCcamopags === null) {
			$this->collCcamopags = array();
		}
	}

	
	public function getCcamopags($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
			   $this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
					$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamopagCriteria = $criteria;
		return $this->collCcamopags;
	}

	
	public function countCcamopags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

		return CcamopagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamopag(Ccamopag $l)
	{
		$this->collCcamopags[] = $l;
		$l->setCcamoact($this);
	}


	
	public function getCcamopagsJoinCcpago($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}

	
	public function initCcamoprins()
	{
		if ($this->collCcamoprins === null) {
			$this->collCcamoprins = array();
		}
	}

	
	public function getCcamoprins($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoprinPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoprins === null) {
			if ($this->isNew()) {
			   $this->collCcamoprins = array();
			} else {

				$criteria->add(CcamoprinPeer::CCAMOACT_ID, $this->getId());

				CcamoprinPeer::addSelectColumns($criteria);
				$this->collCcamoprins = CcamoprinPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoprinPeer::CCAMOACT_ID, $this->getId());

				CcamoprinPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoprinCriteria) || !$this->lastCcamoprinCriteria->equals($criteria)) {
					$this->collCcamoprins = CcamoprinPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoprinCriteria = $criteria;
		return $this->collCcamoprins;
	}

	
	public function countCcamoprins($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoprinPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoprinPeer::CCAMOACT_ID, $this->getId());

		return CcamoprinPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoprin(Ccamoprin $l)
	{
		$this->collCcamoprins[] = $l;
		$l->setCcamoact($this);
	}


	
	public function getCcamoprinsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoprinPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoprins === null) {
			if ($this->isNew()) {
				$this->collCcamoprins = array();
			} else {

				$criteria->add(CcamoprinPeer::CCAMOACT_ID, $this->getId());

				$this->collCcamoprins = CcamoprinPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoprinPeer::CCAMOACT_ID, $this->getId());

			if (!isset($this->lastCcamoprinCriteria) || !$this->lastCcamoprinCriteria->equals($criteria)) {
				$this->collCcamoprins = CcamoprinPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoprinCriteria = $criteria;

		return $this->collCcamoprins;
	}

} 