<?php


abstract class BaseCpprecom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refprc;


	
	protected $tipprc;


	
	protected $fecprc;


	
	protected $anoprc;


	
	protected $desprc;


	
	protected $desanu;


	
	protected $monprc;


	
	protected $salcom;


	
	protected $salcau;


	
	protected $salpag;


	
	protected $salaju;


	
	protected $staprc;


	
	protected $fecanu;


	
	protected $cedrif;


	
	protected $refsol;


	
	protected $id;

	
	protected $aCpdocprc;

	
	protected $aOpbenefi;

	
	protected $collCpcompros;

	
	protected $lastCpcomproCriteria = null;

	
	protected $collCpimpprcs;

	
	protected $lastCpimpprcCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefprc()
  {

    return trim($this->refprc);

  }
  
  public function getTipprc()
  {

    return trim($this->tipprc);

  }
  
  public function getFecprc($format = 'Y-m-d')
  {

    if ($this->fecprc === null || $this->fecprc === '') {
      return null;
    } elseif (!is_int($this->fecprc)) {
            $ts = adodb_strtotime($this->fecprc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecprc] as date/time value: " . var_export($this->fecprc, true));
      }
    } else {
      $ts = $this->fecprc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getAnoprc()
  {

    return trim($this->anoprc);

  }
  
  public function getDesprc()
  {

    return trim($this->desprc);

  }
  
  public function getDesanu()
  {

    return trim($this->desanu);

  }
  
  public function getMonprc($val=false)
  {

    if($val) return number_format($this->monprc,2,',','.');
    else return $this->monprc;

  }
  
  public function getSalcom($val=false)
  {

    if($val) return number_format($this->salcom,2,',','.');
    else return $this->salcom;

  }
  
  public function getSalcau($val=false)
  {

    if($val) return number_format($this->salcau,2,',','.');
    else return $this->salcau;

  }
  
  public function getSalpag($val=false)
  {

    if($val) return number_format($this->salpag,2,',','.');
    else return $this->salpag;

  }
  
  public function getSalaju($val=false)
  {

    if($val) return number_format($this->salaju,2,',','.');
    else return $this->salaju;

  }
  
  public function getStaprc()
  {

    return trim($this->staprc);

  }
  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getRefsol()
  {

    return trim($this->refsol);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefprc($v)
	{

    if ($this->refprc !== $v) {
        $this->refprc = $v;
        $this->modifiedColumns[] = CpprecomPeer::REFPRC;
      }
  
	} 
	
	public function setTipprc($v)
	{

    if ($this->tipprc !== $v) {
        $this->tipprc = $v;
        $this->modifiedColumns[] = CpprecomPeer::TIPPRC;
      }
  
		if ($this->aCpdocprc !== null && $this->aCpdocprc->getTipprc() !== $v) {
			$this->aCpdocprc = null;
		}

	} 
	
	public function setFecprc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecprc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecprc !== $ts) {
      $this->fecprc = $ts;
      $this->modifiedColumns[] = CpprecomPeer::FECPRC;
    }

	} 
	
	public function setAnoprc($v)
	{

    if ($this->anoprc !== $v) {
        $this->anoprc = $v;
        $this->modifiedColumns[] = CpprecomPeer::ANOPRC;
      }
  
	} 
	
	public function setDesprc($v)
	{

    if ($this->desprc !== $v) {
        $this->desprc = $v;
        $this->modifiedColumns[] = CpprecomPeer::DESPRC;
      }
  
	} 
	
	public function setDesanu($v)
	{

    if ($this->desanu !== $v) {
        $this->desanu = $v;
        $this->modifiedColumns[] = CpprecomPeer::DESANU;
      }
  
	} 
	
	public function setMonprc($v)
	{

    if ($this->monprc !== $v) {
        $this->monprc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpprecomPeer::MONPRC;
      }
  
	} 
	
	public function setSalcom($v)
	{

    if ($this->salcom !== $v) {
        $this->salcom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpprecomPeer::SALCOM;
      }
  
	} 
	
	public function setSalcau($v)
	{

    if ($this->salcau !== $v) {
        $this->salcau = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpprecomPeer::SALCAU;
      }
  
	} 
	
	public function setSalpag($v)
	{

    if ($this->salpag !== $v) {
        $this->salpag = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpprecomPeer::SALPAG;
      }
  
	} 
	
	public function setSalaju($v)
	{

    if ($this->salaju !== $v) {
        $this->salaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CpprecomPeer::SALAJU;
      }
  
	} 
	
	public function setStaprc($v)
	{

    if ($this->staprc !== $v) {
        $this->staprc = $v;
        $this->modifiedColumns[] = CpprecomPeer::STAPRC;
      }
  
	} 
	
	public function setFecanu($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = CpprecomPeer::FECANU;
    }

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CpprecomPeer::CEDRIF;
      }
  
		if ($this->aOpbenefi !== null && $this->aOpbenefi->getCedrif() !== $v) {
			$this->aOpbenefi = null;
		}

	} 
	
	public function setRefsol($v)
	{

    if ($this->refsol !== $v) {
        $this->refsol = $v;
        $this->modifiedColumns[] = CpprecomPeer::REFSOL;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CpprecomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refprc = $rs->getString($startcol + 0);

      $this->tipprc = $rs->getString($startcol + 1);

      $this->fecprc = $rs->getDate($startcol + 2, null);

      $this->anoprc = $rs->getString($startcol + 3);

      $this->desprc = $rs->getString($startcol + 4);

      $this->desanu = $rs->getString($startcol + 5);

      $this->monprc = $rs->getFloat($startcol + 6);

      $this->salcom = $rs->getFloat($startcol + 7);

      $this->salcau = $rs->getFloat($startcol + 8);

      $this->salpag = $rs->getFloat($startcol + 9);

      $this->salaju = $rs->getFloat($startcol + 10);

      $this->staprc = $rs->getString($startcol + 11);

      $this->fecanu = $rs->getDate($startcol + 12, null);

      $this->cedrif = $rs->getString($startcol + 13);

      $this->refsol = $rs->getString($startcol + 14);

      $this->id = $rs->getInt($startcol + 15);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 16; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cpprecom object", $e);
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
			$con = Propel::getConnection(CpprecomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CpprecomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CpprecomPeer::DATABASE_NAME);
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


												
			if ($this->aCpdocprc !== null) {
				if ($this->aCpdocprc->isModified()) {
					$affectedRows += $this->aCpdocprc->save($con);
				}
				$this->setCpdocprc($this->aCpdocprc);
			}

			if ($this->aOpbenefi !== null) {
				if ($this->aOpbenefi->isModified()) {
					$affectedRows += $this->aOpbenefi->save($con);
				}
				$this->setOpbenefi($this->aOpbenefi);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CpprecomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CpprecomPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCpcompros !== null) {
				foreach($this->collCpcompros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCpimpprcs !== null) {
				foreach($this->collCpimpprcs as $referrerFK) {
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


												
			if ($this->aCpdocprc !== null) {
				if (!$this->aCpdocprc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdocprc->getValidationFailures());
				}
			}

			if ($this->aOpbenefi !== null) {
				if (!$this->aOpbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpbenefi->getValidationFailures());
				}
			}


			if (($retval = CpprecomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCpcompros !== null) {
					foreach($this->collCpcompros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCpimpprcs !== null) {
					foreach($this->collCpimpprcs as $referrerFK) {
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
		$pos = CpprecomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefprc();
				break;
			case 1:
				return $this->getTipprc();
				break;
			case 2:
				return $this->getFecprc();
				break;
			case 3:
				return $this->getAnoprc();
				break;
			case 4:
				return $this->getDesprc();
				break;
			case 5:
				return $this->getDesanu();
				break;
			case 6:
				return $this->getMonprc();
				break;
			case 7:
				return $this->getSalcom();
				break;
			case 8:
				return $this->getSalcau();
				break;
			case 9:
				return $this->getSalpag();
				break;
			case 10:
				return $this->getSalaju();
				break;
			case 11:
				return $this->getStaprc();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getCedrif();
				break;
			case 14:
				return $this->getRefsol();
				break;
			case 15:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpprecomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefprc(),
			$keys[1] => $this->getTipprc(),
			$keys[2] => $this->getFecprc(),
			$keys[3] => $this->getAnoprc(),
			$keys[4] => $this->getDesprc(),
			$keys[5] => $this->getDesanu(),
			$keys[6] => $this->getMonprc(),
			$keys[7] => $this->getSalcom(),
			$keys[8] => $this->getSalcau(),
			$keys[9] => $this->getSalpag(),
			$keys[10] => $this->getSalaju(),
			$keys[11] => $this->getStaprc(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getCedrif(),
			$keys[14] => $this->getRefsol(),
			$keys[15] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CpprecomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefprc($value);
				break;
			case 1:
				$this->setTipprc($value);
				break;
			case 2:
				$this->setFecprc($value);
				break;
			case 3:
				$this->setAnoprc($value);
				break;
			case 4:
				$this->setDesprc($value);
				break;
			case 5:
				$this->setDesanu($value);
				break;
			case 6:
				$this->setMonprc($value);
				break;
			case 7:
				$this->setSalcom($value);
				break;
			case 8:
				$this->setSalcau($value);
				break;
			case 9:
				$this->setSalpag($value);
				break;
			case 10:
				$this->setSalaju($value);
				break;
			case 11:
				$this->setStaprc($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setCedrif($value);
				break;
			case 14:
				$this->setRefsol($value);
				break;
			case 15:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CpprecomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefprc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipprc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecprc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnoprc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDesprc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDesanu($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonprc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSalcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSalcau($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalpag($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setStaprc($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCedrif($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRefsol($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setId($arr[$keys[15]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CpprecomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CpprecomPeer::REFPRC)) $criteria->add(CpprecomPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CpprecomPeer::TIPPRC)) $criteria->add(CpprecomPeer::TIPPRC, $this->tipprc);
		if ($this->isColumnModified(CpprecomPeer::FECPRC)) $criteria->add(CpprecomPeer::FECPRC, $this->fecprc);
		if ($this->isColumnModified(CpprecomPeer::ANOPRC)) $criteria->add(CpprecomPeer::ANOPRC, $this->anoprc);
		if ($this->isColumnModified(CpprecomPeer::DESPRC)) $criteria->add(CpprecomPeer::DESPRC, $this->desprc);
		if ($this->isColumnModified(CpprecomPeer::DESANU)) $criteria->add(CpprecomPeer::DESANU, $this->desanu);
		if ($this->isColumnModified(CpprecomPeer::MONPRC)) $criteria->add(CpprecomPeer::MONPRC, $this->monprc);
		if ($this->isColumnModified(CpprecomPeer::SALCOM)) $criteria->add(CpprecomPeer::SALCOM, $this->salcom);
		if ($this->isColumnModified(CpprecomPeer::SALCAU)) $criteria->add(CpprecomPeer::SALCAU, $this->salcau);
		if ($this->isColumnModified(CpprecomPeer::SALPAG)) $criteria->add(CpprecomPeer::SALPAG, $this->salpag);
		if ($this->isColumnModified(CpprecomPeer::SALAJU)) $criteria->add(CpprecomPeer::SALAJU, $this->salaju);
		if ($this->isColumnModified(CpprecomPeer::STAPRC)) $criteria->add(CpprecomPeer::STAPRC, $this->staprc);
		if ($this->isColumnModified(CpprecomPeer::FECANU)) $criteria->add(CpprecomPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CpprecomPeer::CEDRIF)) $criteria->add(CpprecomPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CpprecomPeer::REFSOL)) $criteria->add(CpprecomPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(CpprecomPeer::ID)) $criteria->add(CpprecomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CpprecomPeer::DATABASE_NAME);

		$criteria->add(CpprecomPeer::ID, $this->id);

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

		$copyObj->setRefprc($this->refprc);

		$copyObj->setTipprc($this->tipprc);

		$copyObj->setFecprc($this->fecprc);

		$copyObj->setAnoprc($this->anoprc);

		$copyObj->setDesprc($this->desprc);

		$copyObj->setDesanu($this->desanu);

		$copyObj->setMonprc($this->monprc);

		$copyObj->setSalcom($this->salcom);

		$copyObj->setSalcau($this->salcau);

		$copyObj->setSalpag($this->salpag);

		$copyObj->setSalaju($this->salaju);

		$copyObj->setStaprc($this->staprc);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setRefsol($this->refsol);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCpcompros() as $relObj) {
				$copyObj->addCpcompro($relObj->copy($deepCopy));
			}

			foreach($this->getCpimpprcs() as $relObj) {
				$copyObj->addCpimpprc($relObj->copy($deepCopy));
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
			self::$peer = new CpprecomPeer();
		}
		return self::$peer;
	}

	
	public function setCpdocprc($v)
	{


		if ($v === null) {
			$this->setTipprc(NULL);
		} else {
			$this->setTipprc($v->getTipprc());
		}


		$this->aCpdocprc = $v;
	}


	
	public function getCpdocprc($con = null)
	{
		if ($this->aCpdocprc === null && (($this->tipprc !== "" && $this->tipprc !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdocprcPeer.php';

      $c = new Criteria();
      $c->add(CpdocprcPeer::TIPPRC,$this->tipprc);
      
			$this->aCpdocprc = CpdocprcPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdocprc;
	}

	
	public function setOpbenefi($v)
	{


		if ($v === null) {
			$this->setCedrif(NULL);
		} else {
			$this->setCedrif($v->getCedrif());
		}


		$this->aOpbenefi = $v;
	}


	
	public function getOpbenefi($con = null)
	{
		if ($this->aOpbenefi === null && (($this->cedrif !== "" && $this->cedrif !== null))) {
						include_once 'lib/model/om/BaseOpbenefiPeer.php';

      $c = new Criteria();
      $c->add(OpbenefiPeer::CEDRIF,$this->cedrif);
      
			$this->aOpbenefi = OpbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aOpbenefi;
	}

	
	public function initCpcompros()
	{
		if ($this->collCpcompros === null) {
			$this->collCpcompros = array();
		}
	}

	
	public function getCpcompros($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcompros === null) {
			if ($this->isNew()) {
			   $this->collCpcompros = array();
			} else {

				$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

				CpcomproPeer::addSelectColumns($criteria);
				$this->collCpcompros = CpcomproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

				CpcomproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpcomproCriteria) || !$this->lastCpcomproCriteria->equals($criteria)) {
					$this->collCpcompros = CpcomproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpcomproCriteria = $criteria;
		return $this->collCpcompros;
	}

	
	public function countCpcompros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

		return CpcomproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpcompro(Cpcompro $l)
	{
		$this->collCpcompros[] = $l;
		$l->setCpprecom($this);
	}


	
	public function getCpcomprosJoinCpdoccom($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcompros === null) {
			if ($this->isNew()) {
				$this->collCpcompros = array();
			} else {

				$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

				$this->collCpcompros = CpcomproPeer::doSelectJoinCpdoccom($criteria, $con);
			}
		} else {
									
			$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

			if (!isset($this->lastCpcomproCriteria) || !$this->lastCpcomproCriteria->equals($criteria)) {
				$this->collCpcompros = CpcomproPeer::doSelectJoinCpdoccom($criteria, $con);
			}
		}
		$this->lastCpcomproCriteria = $criteria;

		return $this->collCpcompros;
	}


	
	public function getCpcomprosJoinOpbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpcomproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpcompros === null) {
			if ($this->isNew()) {
				$this->collCpcompros = array();
			} else {

				$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

				$this->collCpcompros = CpcomproPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CpcomproPeer::REFPRC, $this->getRefprc());

			if (!isset($this->lastCpcomproCriteria) || !$this->lastCpcomproCriteria->equals($criteria)) {
				$this->collCpcompros = CpcomproPeer::doSelectJoinOpbenefi($criteria, $con);
			}
		}
		$this->lastCpcomproCriteria = $criteria;

		return $this->collCpcompros;
	}

	
	public function initCpimpprcs()
	{
		if ($this->collCpimpprcs === null) {
			$this->collCpimpprcs = array();
		}
	}

	
	public function getCpimpprcs($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpprcs === null) {
			if ($this->isNew()) {
			   $this->collCpimpprcs = array();
			} else {

				$criteria->add(CpimpprcPeer::REFPRC, $this->getRefprc());

				CpimpprcPeer::addSelectColumns($criteria);
				$this->collCpimpprcs = CpimpprcPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CpimpprcPeer::REFPRC, $this->getRefprc());

				CpimpprcPeer::addSelectColumns($criteria);
				if (!isset($this->lastCpimpprcCriteria) || !$this->lastCpimpprcCriteria->equals($criteria)) {
					$this->collCpimpprcs = CpimpprcPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCpimpprcCriteria = $criteria;
		return $this->collCpimpprcs;
	}

	
	public function countCpimpprcs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CpimpprcPeer::REFPRC, $this->getRefprc());

		return CpimpprcPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCpimpprc(Cpimpprc $l)
	{
		$this->collCpimpprcs[] = $l;
		$l->setCpprecom($this);
	}


	
	public function getCpimpprcsJoinCpdeftit($criteria = null, $con = null)
	{
				include_once 'lib/model/presupuesto/om/BaseCpimpprcPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCpimpprcs === null) {
			if ($this->isNew()) {
				$this->collCpimpprcs = array();
			} else {

				$criteria->add(CpimpprcPeer::REFPRC, $this->getRefprc());

				$this->collCpimpprcs = CpimpprcPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		} else {
									
			$criteria->add(CpimpprcPeer::REFPRC, $this->getRefprc());

			if (!isset($this->lastCpimpprcCriteria) || !$this->lastCpimpprcCriteria->equals($criteria)) {
				$this->collCpimpprcs = CpimpprcPeer::doSelectJoinCpdeftit($criteria, $con);
			}
		}
		$this->lastCpimpprcCriteria = $criteria;

		return $this->collCpimpprcs;
	}

} 