<?php


abstract class BaseCcpago extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $montot;


	
	protected $numtra;


	
	protected $fecpag;


	
	protected $fecreg;


	
	protected $numcue;


	
	protected $cedrifcue;


	
	protected $ccperparamo_id;


	
	protected $cccueban_id;


	
	protected $ccperpre_id;


	
	protected $cctiptra_id;


	
	protected $cccredit_id;


	
	protected $resamocap;

	
	protected $aCcperparamo;

	
	protected $aCccueban;

	
	protected $aCcperpre;

	
	protected $aCctiptra;

	
	protected $aCccredit;

	
	protected $collCcamopags;

	
	protected $lastCcamopagCriteria = null;

	
	protected $collCcpagress;

	
	protected $lastCcpagresCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getMontot($val=false)
  {

    if($val) return number_format($this->montot,2,',','.');
    else return $this->montot;

  }
  
  public function getNumtra()
  {

    return trim($this->numtra);

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

  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getCedrifcue()
  {

    return trim($this->cedrifcue);

  }
  
  public function getCcperparamoId()
  {

    return $this->ccperparamo_id;

  }
  
  public function getCccuebanId()
  {

    return $this->cccueban_id;

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCctiptraId()
  {

    return $this->cctiptra_id;

  }
  
  public function getCccreditId()
  {

    return $this->cccredit_id;

  }
  
  public function getResamocap()
  {

    return trim($this->resamocap);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcpagoPeer::ID;
      }
  
	} 
	
	public function setMontot($v)
	{

    if ($this->montot !== $v) {
        $this->montot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcpagoPeer::MONTOT;
      }
  
	} 
	
	public function setNumtra($v)
	{

    if ($this->numtra !== $v) {
        $this->numtra = $v;
        $this->modifiedColumns[] = CcpagoPeer::NUMTRA;
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
      $this->modifiedColumns[] = CcpagoPeer::FECPAG;
    }

	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = CcpagoPeer::FECREG;
    }

	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CcpagoPeer::NUMCUE;
      }
  
	} 
	
	public function setCedrifcue($v)
	{

    if ($this->cedrifcue !== $v) {
        $this->cedrifcue = $v;
        $this->modifiedColumns[] = CcpagoPeer::CEDRIFCUE;
      }
  
	} 
	
	public function setCcperparamoId($v)
	{

    if ($this->ccperparamo_id !== $v) {
        $this->ccperparamo_id = $v;
        $this->modifiedColumns[] = CcpagoPeer::CCPERPARAMO_ID;
      }
  
		if ($this->aCcperparamo !== null && $this->aCcperparamo->getId() !== $v) {
			$this->aCcperparamo = null;
		}

	} 
	
	public function setCccuebanId($v)
	{

    if ($this->cccueban_id !== $v) {
        $this->cccueban_id = $v;
        $this->modifiedColumns[] = CcpagoPeer::CCCUEBAN_ID;
      }
  
		if ($this->aCccueban !== null && $this->aCccueban->getId() !== $v) {
			$this->aCccueban = null;
		}

	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcpagoPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCctiptraId($v)
	{

    if ($this->cctiptra_id !== $v) {
        $this->cctiptra_id = $v;
        $this->modifiedColumns[] = CcpagoPeer::CCTIPTRA_ID;
      }
  
		if ($this->aCctiptra !== null && $this->aCctiptra->getId() !== $v) {
			$this->aCctiptra = null;
		}

	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CcpagoPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setResamocap($v)
	{

    if ($this->resamocap !== $v) {
        $this->resamocap = $v;
        $this->modifiedColumns[] = CcpagoPeer::RESAMOCAP;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->montot = $rs->getFloat($startcol + 1);

      $this->numtra = $rs->getString($startcol + 2);

      $this->fecpag = $rs->getDate($startcol + 3, null);

      $this->fecreg = $rs->getDate($startcol + 4, null);

      $this->numcue = $rs->getString($startcol + 5);

      $this->cedrifcue = $rs->getString($startcol + 6);

      $this->ccperparamo_id = $rs->getInt($startcol + 7);

      $this->cccueban_id = $rs->getInt($startcol + 8);

      $this->ccperpre_id = $rs->getInt($startcol + 9);

      $this->cctiptra_id = $rs->getInt($startcol + 10);

      $this->cccredit_id = $rs->getInt($startcol + 11);

      $this->resamocap = $rs->getString($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccpago object", $e);
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
			$con = Propel::getConnection(CcpagoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcpagoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcpagoPeer::DATABASE_NAME);
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


												
			if ($this->aCcperparamo !== null) {
				if ($this->aCcperparamo->isModified()) {
					$affectedRows += $this->aCcperparamo->save($con);
				}
				$this->setCcperparamo($this->aCcperparamo);
			}

			if ($this->aCccueban !== null) {
				if ($this->aCccueban->isModified()) {
					$affectedRows += $this->aCccueban->save($con);
				}
				$this->setCccueban($this->aCccueban);
			}

			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCctiptra !== null) {
				if ($this->aCctiptra->isModified()) {
					$affectedRows += $this->aCctiptra->save($con);
				}
				$this->setCctiptra($this->aCctiptra);
			}

			if ($this->aCccredit !== null) {
				if ($this->aCccredit->isModified()) {
					$affectedRows += $this->aCccredit->save($con);
				}
				$this->setCccredit($this->aCccredit);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcpagoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcpagoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcamopags !== null) {
				foreach($this->collCcamopags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagress !== null) {
				foreach($this->collCcpagress as $referrerFK) {
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


												
			if ($this->aCcperparamo !== null) {
				if (!$this->aCcperparamo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperparamo->getValidationFailures());
				}
			}

			if ($this->aCccueban !== null) {
				if (!$this->aCccueban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccueban->getValidationFailures());
				}
			}

			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCctiptra !== null) {
				if (!$this->aCctiptra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctiptra->getValidationFailures());
				}
			}

			if ($this->aCccredit !== null) {
				if (!$this->aCccredit->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccredit->getValidationFailures());
				}
			}


			if (($retval = CcpagoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcamopags !== null) {
					foreach($this->collCcamopags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagress !== null) {
					foreach($this->collCcpagress as $referrerFK) {
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
		$pos = CcpagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMontot();
				break;
			case 2:
				return $this->getNumtra();
				break;
			case 3:
				return $this->getFecpag();
				break;
			case 4:
				return $this->getFecreg();
				break;
			case 5:
				return $this->getNumcue();
				break;
			case 6:
				return $this->getCedrifcue();
				break;
			case 7:
				return $this->getCcperparamoId();
				break;
			case 8:
				return $this->getCccuebanId();
				break;
			case 9:
				return $this->getCcperpreId();
				break;
			case 10:
				return $this->getCctiptraId();
				break;
			case 11:
				return $this->getCccreditId();
				break;
			case 12:
				return $this->getResamocap();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpagoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMontot(),
			$keys[2] => $this->getNumtra(),
			$keys[3] => $this->getFecpag(),
			$keys[4] => $this->getFecreg(),
			$keys[5] => $this->getNumcue(),
			$keys[6] => $this->getCedrifcue(),
			$keys[7] => $this->getCcperparamoId(),
			$keys[8] => $this->getCccuebanId(),
			$keys[9] => $this->getCcperpreId(),
			$keys[10] => $this->getCctiptraId(),
			$keys[11] => $this->getCccreditId(),
			$keys[12] => $this->getResamocap(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpagoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMontot($value);
				break;
			case 2:
				$this->setNumtra($value);
				break;
			case 3:
				$this->setFecpag($value);
				break;
			case 4:
				$this->setFecreg($value);
				break;
			case 5:
				$this->setNumcue($value);
				break;
			case 6:
				$this->setCedrifcue($value);
				break;
			case 7:
				$this->setCcperparamoId($value);
				break;
			case 8:
				$this->setCccuebanId($value);
				break;
			case 9:
				$this->setCcperpreId($value);
				break;
			case 10:
				$this->setCctiptraId($value);
				break;
			case 11:
				$this->setCccreditId($value);
				break;
			case 12:
				$this->setResamocap($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpagoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMontot($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumtra($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecpag($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumcue($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCedrifcue($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcperparamoId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCccuebanId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcperpreId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCctiptraId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCccreditId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setResamocap($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcpagoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcpagoPeer::ID)) $criteria->add(CcpagoPeer::ID, $this->id);
		if ($this->isColumnModified(CcpagoPeer::MONTOT)) $criteria->add(CcpagoPeer::MONTOT, $this->montot);
		if ($this->isColumnModified(CcpagoPeer::NUMTRA)) $criteria->add(CcpagoPeer::NUMTRA, $this->numtra);
		if ($this->isColumnModified(CcpagoPeer::FECPAG)) $criteria->add(CcpagoPeer::FECPAG, $this->fecpag);
		if ($this->isColumnModified(CcpagoPeer::FECREG)) $criteria->add(CcpagoPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CcpagoPeer::NUMCUE)) $criteria->add(CcpagoPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CcpagoPeer::CEDRIFCUE)) $criteria->add(CcpagoPeer::CEDRIFCUE, $this->cedrifcue);
		if ($this->isColumnModified(CcpagoPeer::CCPERPARAMO_ID)) $criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->ccperparamo_id);
		if ($this->isColumnModified(CcpagoPeer::CCCUEBAN_ID)) $criteria->add(CcpagoPeer::CCCUEBAN_ID, $this->cccueban_id);
		if ($this->isColumnModified(CcpagoPeer::CCPERPRE_ID)) $criteria->add(CcpagoPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcpagoPeer::CCTIPTRA_ID)) $criteria->add(CcpagoPeer::CCTIPTRA_ID, $this->cctiptra_id);
		if ($this->isColumnModified(CcpagoPeer::CCCREDIT_ID)) $criteria->add(CcpagoPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CcpagoPeer::RESAMOCAP)) $criteria->add(CcpagoPeer::RESAMOCAP, $this->resamocap);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcpagoPeer::DATABASE_NAME);

		$criteria->add(CcpagoPeer::ID, $this->id);

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

		$copyObj->setMontot($this->montot);

		$copyObj->setNumtra($this->numtra);

		$copyObj->setFecpag($this->fecpag);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setNumcue($this->numcue);

		$copyObj->setCedrifcue($this->cedrifcue);

		$copyObj->setCcperparamoId($this->ccperparamo_id);

		$copyObj->setCccuebanId($this->cccueban_id);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCctiptraId($this->cctiptra_id);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setResamocap($this->resamocap);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamopags() as $relObj) {
				$copyObj->addCcamopag($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagress() as $relObj) {
				$copyObj->addCcpagres($relObj->copy($deepCopy));
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
			self::$peer = new CcpagoPeer();
		}
		return self::$peer;
	}

	
	public function setCcperparamo($v)
	{


		if ($v === null) {
			$this->setCcperparamoId(NULL);
		} else {
			$this->setCcperparamoId($v->getId());
		}


		$this->aCcperparamo = $v;
	}


	
	public function getCcperparamo($con = null)
	{
		if ($this->aCcperparamo === null && ($this->ccperparamo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperparamoPeer.php';

      $c = new Criteria();
      $c->add(CcperparamoPeer::ID,$this->ccperparamo_id);
      
			$this->aCcperparamo = CcperparamoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperparamo;
	}

	
	public function setCccueban($v)
	{


		if ($v === null) {
			$this->setCccuebanId(NULL);
		} else {
			$this->setCccuebanId($v->getId());
		}


		$this->aCccueban = $v;
	}


	
	public function getCccueban($con = null)
	{
		if ($this->aCccueban === null && ($this->cccueban_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';

      $c = new Criteria();
      $c->add(CccuebanPeer::ID,$this->cccueban_id);
      
			$this->aCccueban = CccuebanPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccueban;
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

	
	public function setCctiptra($v)
	{


		if ($v === null) {
			$this->setCctiptraId(NULL);
		} else {
			$this->setCctiptraId($v->getId());
		}


		$this->aCctiptra = $v;
	}


	
	public function getCctiptra($con = null)
	{
		if ($this->aCctiptra === null && ($this->cctiptra_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctiptraPeer.php';

      $c = new Criteria();
      $c->add(CctiptraPeer::ID,$this->cctiptra_id);
      
			$this->aCctiptra = CctiptraPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctiptra;
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

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

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

		$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

		return CcamopagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamopag(Ccamopag $l)
	{
		$this->collCcamopags[] = $l;
		$l->setCcpago($this);
	}


	
	public function getCcamopagsJoinCcamoact($criteria = null, $con = null)
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

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
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

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

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

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

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

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

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

				$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPAGO_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}

	
	public function initCcpagress()
	{
		if ($this->collCcpagress === null) {
			$this->collCcpagress = array();
		}
	}

	
	public function getCcpagress($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagress === null) {
			if ($this->isNew()) {
			   $this->collCcpagress = array();
			} else {

				$criteria->add(CcpagresPeer::CCPAGO_ID, $this->getId());

				CcpagresPeer::addSelectColumns($criteria);
				$this->collCcpagress = CcpagresPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagresPeer::CCPAGO_ID, $this->getId());

				CcpagresPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagresCriteria) || !$this->lastCcpagresCriteria->equals($criteria)) {
					$this->collCcpagress = CcpagresPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagresCriteria = $criteria;
		return $this->collCcpagress;
	}

	
	public function countCcpagress($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagresPeer::CCPAGO_ID, $this->getId());

		return CcpagresPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpagres(Ccpagres $l)
	{
		$this->collCcpagress[] = $l;
		$l->setCcpago($this);
	}


	
	public function getCcpagressJoinCcrespue($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagresPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagress === null) {
			if ($this->isNew()) {
				$this->collCcpagress = array();
			} else {

				$criteria->add(CcpagresPeer::CCPAGO_ID, $this->getId());

				$this->collCcpagress = CcpagresPeer::doSelectJoinCcrespue($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagresPeer::CCPAGO_ID, $this->getId());

			if (!isset($this->lastCcpagresCriteria) || !$this->lastCcpagresCriteria->equals($criteria)) {
				$this->collCcpagress = CcpagresPeer::doSelectJoinCcrespue($criteria, $con);
			}
		}
		$this->lastCcpagresCriteria = $criteria;

		return $this->collCcpagress;
	}

} 