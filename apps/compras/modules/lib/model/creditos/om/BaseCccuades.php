<?php


abstract class BaseCccuades extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $orddes;


	
	protected $mondes;


	
	protected $estatu;


	
	protected $fecdes;


	
	protected $codusuaut;


	
	protected $aplded;


	
	protected $numcheded;


	
	protected $cccredit_id;


	
	protected $ccpartid_id;


	
	protected $ccprogra_id;

	
	protected $aCccredit;

	
	protected $aCcpartid;

	
	protected $aCcprogra;

	
	protected $collCcdetcuadess;

	
	protected $lastCcdetcuadesCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcparrecs;

	
	protected $lastCcparrecCriteria = null;

	
	protected $collCcrecdess;

	
	protected $lastCcrecdesCriteria = null;

	
	protected $collCcsoldescuadess;

	
	protected $lastCcsoldescuadesCriteria = null;

	
	protected $collCcsolliqs;

	
	protected $lastCcsolliqCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getOrddes()
  {

    return trim($this->orddes);

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getFecdes($format = 'Y-m-d')
  {

    if ($this->fecdes === null || $this->fecdes === '') {
      return null;
    } elseif (!is_int($this->fecdes)) {
            $ts = adodb_strtotime($this->fecdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdes] as date/time value: " . var_export($this->fecdes, true));
      }
    } else {
      $ts = $this->fecdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCodusuaut()
  {

    return $this->codusuaut;

  }
  
  public function getAplded()
  {

    return $this->aplded;

  }
  
  public function getNumcheded()
  {

    return $this->numcheded;

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
        $this->modifiedColumns[] = CccuadesPeer::ID;
      }
  
	} 
	
	public function setOrddes($v)
	{

    if ($this->orddes !== $v) {
        $this->orddes = $v;
        $this->modifiedColumns[] = CccuadesPeer::ORDDES;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CccuadesPeer::MONDES;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CccuadesPeer::ESTATU;
      }
  
	} 
	
	public function setFecdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdes !== $ts) {
      $this->fecdes = $ts;
      $this->modifiedColumns[] = CccuadesPeer::FECDES;
    }

	} 
	
	public function setCodusuaut($v)
	{

    if ($this->codusuaut !== $v) {
        $this->codusuaut = $v;
        $this->modifiedColumns[] = CccuadesPeer::CODUSUAUT;
      }
  
	} 
	
	public function setAplded($v)
	{

    if ($this->aplded !== $v) {
        $this->aplded = $v;
        $this->modifiedColumns[] = CccuadesPeer::APLDED;
      }
  
	} 
	
	public function setNumcheded($v)
	{

    if ($this->numcheded !== $v) {
        $this->numcheded = $v;
        $this->modifiedColumns[] = CccuadesPeer::NUMCHEDED;
      }
  
	} 
	
	public function setCccreditId($v)
	{

    if ($this->cccredit_id !== $v) {
        $this->cccredit_id = $v;
        $this->modifiedColumns[] = CccuadesPeer::CCCREDIT_ID;
      }
  
		if ($this->aCccredit !== null && $this->aCccredit->getId() !== $v) {
			$this->aCccredit = null;
		}

	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CccuadesPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
	
	public function setCcprograId($v)
	{

    if ($this->ccprogra_id !== $v) {
        $this->ccprogra_id = $v;
        $this->modifiedColumns[] = CccuadesPeer::CCPROGRA_ID;
      }
  
		if ($this->aCcprogra !== null && $this->aCcprogra->getId() !== $v) {
			$this->aCcprogra = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->orddes = $rs->getString($startcol + 1);

      $this->mondes = $rs->getFloat($startcol + 2);

      $this->estatu = $rs->getString($startcol + 3);

      $this->fecdes = $rs->getDate($startcol + 4, null);

      $this->codusuaut = $rs->getInt($startcol + 5);

      $this->aplded = $rs->getBoolean($startcol + 6);

      $this->numcheded = $rs->getInt($startcol + 7);

      $this->cccredit_id = $rs->getInt($startcol + 8);

      $this->ccpartid_id = $rs->getInt($startcol + 9);

      $this->ccprogra_id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccuades object", $e);
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
			$con = Propel::getConnection(CccuadesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccuadesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccuadesPeer::DATABASE_NAME);
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
					$pk = CccuadesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccuadesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdetcuadess !== null) {
				foreach($this->collCcdetcuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcliquids !== null) {
				foreach($this->collCcliquids as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparrecs !== null) {
				foreach($this->collCcparrecs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecdess !== null) {
				foreach($this->collCcrecdess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsoldescuadess !== null) {
				foreach($this->collCcsoldescuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolliqs !== null) {
				foreach($this->collCcsolliqs as $referrerFK) {
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


			if (($retval = CccuadesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdetcuadess !== null) {
					foreach($this->collCcdetcuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcliquids !== null) {
					foreach($this->collCcliquids as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparrecs !== null) {
					foreach($this->collCcparrecs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecdess !== null) {
					foreach($this->collCcrecdess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsoldescuadess !== null) {
					foreach($this->collCcsoldescuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolliqs !== null) {
					foreach($this->collCcsolliqs as $referrerFK) {
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
		$pos = CccuadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getOrddes();
				break;
			case 2:
				return $this->getMondes();
				break;
			case 3:
				return $this->getEstatu();
				break;
			case 4:
				return $this->getFecdes();
				break;
			case 5:
				return $this->getCodusuaut();
				break;
			case 6:
				return $this->getAplded();
				break;
			case 7:
				return $this->getNumcheded();
				break;
			case 8:
				return $this->getCccreditId();
				break;
			case 9:
				return $this->getCcpartidId();
				break;
			case 10:
				return $this->getCcprograId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccuadesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getOrddes(),
			$keys[2] => $this->getMondes(),
			$keys[3] => $this->getEstatu(),
			$keys[4] => $this->getFecdes(),
			$keys[5] => $this->getCodusuaut(),
			$keys[6] => $this->getAplded(),
			$keys[7] => $this->getNumcheded(),
			$keys[8] => $this->getCccreditId(),
			$keys[9] => $this->getCcpartidId(),
			$keys[10] => $this->getCcprograId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccuadesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setOrddes($value);
				break;
			case 2:
				$this->setMondes($value);
				break;
			case 3:
				$this->setEstatu($value);
				break;
			case 4:
				$this->setFecdes($value);
				break;
			case 5:
				$this->setCodusuaut($value);
				break;
			case 6:
				$this->setAplded($value);
				break;
			case 7:
				$this->setNumcheded($value);
				break;
			case 8:
				$this->setCccreditId($value);
				break;
			case 9:
				$this->setCcpartidId($value);
				break;
			case 10:
				$this->setCcprograId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccuadesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setOrddes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMondes($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEstatu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecdes($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodusuaut($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAplded($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcheded($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCccreditId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcpartidId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcprograId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccuadesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccuadesPeer::ID)) $criteria->add(CccuadesPeer::ID, $this->id);
		if ($this->isColumnModified(CccuadesPeer::ORDDES)) $criteria->add(CccuadesPeer::ORDDES, $this->orddes);
		if ($this->isColumnModified(CccuadesPeer::MONDES)) $criteria->add(CccuadesPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(CccuadesPeer::ESTATU)) $criteria->add(CccuadesPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CccuadesPeer::FECDES)) $criteria->add(CccuadesPeer::FECDES, $this->fecdes);
		if ($this->isColumnModified(CccuadesPeer::CODUSUAUT)) $criteria->add(CccuadesPeer::CODUSUAUT, $this->codusuaut);
		if ($this->isColumnModified(CccuadesPeer::APLDED)) $criteria->add(CccuadesPeer::APLDED, $this->aplded);
		if ($this->isColumnModified(CccuadesPeer::NUMCHEDED)) $criteria->add(CccuadesPeer::NUMCHEDED, $this->numcheded);
		if ($this->isColumnModified(CccuadesPeer::CCCREDIT_ID)) $criteria->add(CccuadesPeer::CCCREDIT_ID, $this->cccredit_id);
		if ($this->isColumnModified(CccuadesPeer::CCPARTID_ID)) $criteria->add(CccuadesPeer::CCPARTID_ID, $this->ccpartid_id);
		if ($this->isColumnModified(CccuadesPeer::CCPROGRA_ID)) $criteria->add(CccuadesPeer::CCPROGRA_ID, $this->ccprogra_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccuadesPeer::DATABASE_NAME);

		$criteria->add(CccuadesPeer::ID, $this->id);

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

		$copyObj->setOrddes($this->orddes);

		$copyObj->setMondes($this->mondes);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setFecdes($this->fecdes);

		$copyObj->setCodusuaut($this->codusuaut);

		$copyObj->setAplded($this->aplded);

		$copyObj->setNumcheded($this->numcheded);

		$copyObj->setCccreditId($this->cccredit_id);

		$copyObj->setCcpartidId($this->ccpartid_id);

		$copyObj->setCcprograId($this->ccprogra_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdetcuadess() as $relObj) {
				$copyObj->addCcdetcuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcparrecs() as $relObj) {
				$copyObj->addCcparrec($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecdess() as $relObj) {
				$copyObj->addCcrecdes($relObj->copy($deepCopy));
			}

			foreach($this->getCcsoldescuadess() as $relObj) {
				$copyObj->addCcsoldescuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolliqs() as $relObj) {
				$copyObj->addCcsolliq($relObj->copy($deepCopy));
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
			self::$peer = new CccuadesPeer();
		}
		return self::$peer;
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

	
	public function initCcdetcuadess()
	{
		if ($this->collCcdetcuadess === null) {
			$this->collCcdetcuadess = array();
		}
	}

	
	public function getCcdetcuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
			   $this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
					$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;
		return $this->collCcdetcuadess;
	}

	
	public function countCcdetcuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

		return CcdetcuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetcuades(Ccdetcuades $l)
	{
		$this->collCcdetcuadess[] = $l;
		$l->setCccuades($this);
	}


	
	public function getCcdetcuadessJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCpcausad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}

	
	public function initCcliquids()
	{
		if ($this->collCcliquids === null) {
			$this->collCcliquids = array();
		}
	}

	
	public function getCcliquids($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
			   $this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
					$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcliquidCriteria = $criteria;
		return $this->collCcliquids;
	}

	
	public function countCcliquids($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCccuades($this);
	}


	
	public function getCcliquidsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcsolliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

	
	public function initCcparrecs()
	{
		if ($this->collCcparrecs === null) {
			$this->collCcparrecs = array();
		}
	}

	
	public function getCcparrecs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparrecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparrecs === null) {
			if ($this->isNew()) {
			   $this->collCcparrecs = array();
			} else {

				$criteria->add(CcparrecPeer::CCCUADES_ID, $this->getId());

				CcparrecPeer::addSelectColumns($criteria);
				$this->collCcparrecs = CcparrecPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparrecPeer::CCCUADES_ID, $this->getId());

				CcparrecPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparrecCriteria) || !$this->lastCcparrecCriteria->equals($criteria)) {
					$this->collCcparrecs = CcparrecPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparrecCriteria = $criteria;
		return $this->collCcparrecs;
	}

	
	public function countCcparrecs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparrecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparrecPeer::CCCUADES_ID, $this->getId());

		return CcparrecPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparrec(Ccparrec $l)
	{
		$this->collCcparrecs[] = $l;
		$l->setCccuades($this);
	}


	
	public function getCcparrecsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparrecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparrecs === null) {
			if ($this->isNew()) {
				$this->collCcparrecs = array();
			} else {

				$criteria->add(CcparrecPeer::CCCUADES_ID, $this->getId());

				$this->collCcparrecs = CcparrecPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparrecPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcparrecCriteria) || !$this->lastCcparrecCriteria->equals($criteria)) {
				$this->collCcparrecs = CcparrecPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcparrecCriteria = $criteria;

		return $this->collCcparrecs;
	}

	
	public function initCcrecdess()
	{
		if ($this->collCcrecdess === null) {
			$this->collCcrecdess = array();
		}
	}

	
	public function getCcrecdess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecdesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecdess === null) {
			if ($this->isNew()) {
			   $this->collCcrecdess = array();
			} else {

				$criteria->add(CcrecdesPeer::CCCUADES_ID, $this->getId());

				CcrecdesPeer::addSelectColumns($criteria);
				$this->collCcrecdess = CcrecdesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecdesPeer::CCCUADES_ID, $this->getId());

				CcrecdesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecdesCriteria) || !$this->lastCcrecdesCriteria->equals($criteria)) {
					$this->collCcrecdess = CcrecdesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecdesCriteria = $criteria;
		return $this->collCcrecdess;
	}

	
	public function countCcrecdess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecdesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecdesPeer::CCCUADES_ID, $this->getId());

		return CcrecdesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecdes(Ccrecdes $l)
	{
		$this->collCcrecdess[] = $l;
		$l->setCccuades($this);
	}


	
	public function getCcrecdessJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecdesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecdess === null) {
			if ($this->isNew()) {
				$this->collCcrecdess = array();
			} else {

				$criteria->add(CcrecdesPeer::CCCUADES_ID, $this->getId());

				$this->collCcrecdess = CcrecdesPeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecdesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcrecdesCriteria) || !$this->lastCcrecdesCriteria->equals($criteria)) {
				$this->collCcrecdess = CcrecdesPeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcrecdesCriteria = $criteria;

		return $this->collCcrecdess;
	}

	
	public function initCcsoldescuadess()
	{
		if ($this->collCcsoldescuadess === null) {
			$this->collCcsoldescuadess = array();
		}
	}

	
	public function getCcsoldescuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldescuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldescuadess === null) {
			if ($this->isNew()) {
			   $this->collCcsoldescuadess = array();
			} else {

				$criteria->add(CcsoldescuadesPeer::CCCUADES_ID, $this->getId());

				CcsoldescuadesPeer::addSelectColumns($criteria);
				$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoldescuadesPeer::CCCUADES_ID, $this->getId());

				CcsoldescuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoldescuadesCriteria) || !$this->lastCcsoldescuadesCriteria->equals($criteria)) {
					$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoldescuadesCriteria = $criteria;
		return $this->collCcsoldescuadess;
	}

	
	public function countCcsoldescuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldescuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoldescuadesPeer::CCCUADES_ID, $this->getId());

		return CcsoldescuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsoldescuades(Ccsoldescuades $l)
	{
		$this->collCcsoldescuadess[] = $l;
		$l->setCccuades($this);
	}


	
	public function getCcsoldescuadessJoinCcsoldes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldescuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldescuadess === null) {
			if ($this->isNew()) {
				$this->collCcsoldescuadess = array();
			} else {

				$criteria->add(CcsoldescuadesPeer::CCCUADES_ID, $this->getId());

				$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoldescuadesPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcsoldescuadesCriteria) || !$this->lastCcsoldescuadesCriteria->equals($criteria)) {
				$this->collCcsoldescuadess = CcsoldescuadesPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		}
		$this->lastCcsoldescuadesCriteria = $criteria;

		return $this->collCcsoldescuadess;
	}

	
	public function initCcsolliqs()
	{
		if ($this->collCcsolliqs === null) {
			$this->collCcsolliqs = array();
		}
	}

	
	public function getCcsolliqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
					$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqCriteria = $criteria;
		return $this->collCcsolliqs;
	}

	
	public function countCcsolliqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

		return CcsolliqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliq(Ccsolliq $l)
	{
		$this->collCcsolliqs[] = $l;
		$l->setCccuades($this);
	}


	
	public function getCcsolliqsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCcsoldes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCCUADES_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}

} 