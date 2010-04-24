<?php


abstract class BaseContabc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $descom;


	
	protected $moncom;


	
	protected $stacom;


	
	protected $tipcom;


	
	protected $reftra;


	
	protected $id;

	
	protected $collContabc1s;

	
	protected $lastContabc1Criteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDescom()
  {

    return trim($this->descom);

  }
  
  public function getMoncom($val=false)
  {

    if($val) return number_format($this->moncom,2,',','.');
    else return $this->moncom;

  }
  
  public function getStacom()
  {

    return trim($this->stacom);

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
  
  public function getReftra()
  {

    return trim($this->reftra);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = ContabcPeer::NUMCOM;
      }
  
	} 
	
	public function setFeccom($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = ContabcPeer::FECCOM;
    }

	} 
	
	public function setDescom($v)
	{

    if ($this->descom !== $v) {
        $this->descom = $v;
        $this->modifiedColumns[] = ContabcPeer::DESCOM;
      }
  
	} 
	
	public function setMoncom($v)
	{

    if ($this->moncom !== $v) {
        $this->moncom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ContabcPeer::MONCOM;
      }
  
	} 
	
	public function setStacom($v)
	{

    if ($this->stacom !== $v) {
        $this->stacom = $v;
        $this->modifiedColumns[] = ContabcPeer::STACOM;
      }
  
	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = ContabcPeer::TIPCOM;
      }
  
	} 
	
	public function setReftra($v)
	{

    if ($this->reftra !== $v) {
        $this->reftra = $v;
        $this->modifiedColumns[] = ContabcPeer::REFTRA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ContabcPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcom = $rs->getString($startcol + 0);

      $this->feccom = $rs->getDate($startcol + 1, null);

      $this->descom = $rs->getString($startcol + 2);

      $this->moncom = $rs->getFloat($startcol + 3);

      $this->stacom = $rs->getString($startcol + 4);

      $this->tipcom = $rs->getString($startcol + 5);

      $this->reftra = $rs->getString($startcol + 6);

      $this->id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Contabc object", $e);
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
			$con = Propel::getConnection(ContabcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContabcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ContabcPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContabcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContabcPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collContabc1s !== null) {
				foreach($this->collContabc1s as $referrerFK) {
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


			if (($retval = ContabcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collContabc1s !== null) {
					foreach($this->collContabc1s as $referrerFK) {
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
		$pos = ContabcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcom();
				break;
			case 1:
				return $this->getFeccom();
				break;
			case 2:
				return $this->getDescom();
				break;
			case 3:
				return $this->getMoncom();
				break;
			case 4:
				return $this->getStacom();
				break;
			case 5:
				return $this->getTipcom();
				break;
			case 6:
				return $this->getReftra();
				break;
			case 7:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcom(),
			$keys[1] => $this->getFeccom(),
			$keys[2] => $this->getDescom(),
			$keys[3] => $this->getMoncom(),
			$keys[4] => $this->getStacom(),
			$keys[5] => $this->getTipcom(),
			$keys[6] => $this->getReftra(),
			$keys[7] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContabcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcom($value);
				break;
			case 1:
				$this->setFeccom($value);
				break;
			case 2:
				$this->setDescom($value);
				break;
			case 3:
				$this->setMoncom($value);
				break;
			case 4:
				$this->setStacom($value);
				break;
			case 5:
				$this->setTipcom($value);
				break;
			case 6:
				$this->setReftra($value);
				break;
			case 7:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContabcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFeccom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoncom($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStacom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReftra($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContabcPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContabcPeer::NUMCOM)) $criteria->add(ContabcPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(ContabcPeer::FECCOM)) $criteria->add(ContabcPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(ContabcPeer::DESCOM)) $criteria->add(ContabcPeer::DESCOM, $this->descom);
		if ($this->isColumnModified(ContabcPeer::MONCOM)) $criteria->add(ContabcPeer::MONCOM, $this->moncom);
		if ($this->isColumnModified(ContabcPeer::STACOM)) $criteria->add(ContabcPeer::STACOM, $this->stacom);
		if ($this->isColumnModified(ContabcPeer::TIPCOM)) $criteria->add(ContabcPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(ContabcPeer::REFTRA)) $criteria->add(ContabcPeer::REFTRA, $this->reftra);
		if ($this->isColumnModified(ContabcPeer::ID)) $criteria->add(ContabcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContabcPeer::DATABASE_NAME);

		$criteria->add(ContabcPeer::ID, $this->id);

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

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setDescom($this->descom);

		$copyObj->setMoncom($this->moncom);

		$copyObj->setStacom($this->stacom);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setReftra($this->reftra);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getContabc1s() as $relObj) {
				$copyObj->addContabc1($relObj->copy($deepCopy));
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
			self::$peer = new ContabcPeer();
		}
		return self::$peer;
	}

	
	public function initContabc1s()
	{
		if ($this->collContabc1s === null) {
			$this->collContabc1s = array();
		}
	}

	
	public function getContabc1s($criteria = null, $con = null)
	{
				include_once 'lib/model/contabilidad/om/BaseContabc1Peer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContabc1s === null) {
			if ($this->isNew()) {
			   $this->collContabc1s = array();
			} else {

				$criteria->add(Contabc1Peer::NUMCOM, $this->getNumcom());

				Contabc1Peer::addSelectColumns($criteria);
				$this->collContabc1s = Contabc1Peer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(Contabc1Peer::NUMCOM, $this->getNumcom());

				Contabc1Peer::addSelectColumns($criteria);
				if (!isset($this->lastContabc1Criteria) || !$this->lastContabc1Criteria->equals($criteria)) {
					$this->collContabc1s = Contabc1Peer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContabc1Criteria = $criteria;
		return $this->collContabc1s;
	}

	
	public function countContabc1s($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/contabilidad/om/BaseContabc1Peer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(Contabc1Peer::NUMCOM, $this->getNumcom());

		return Contabc1Peer::doCount($criteria, $distinct, $con);
	}

	
	public function addContabc1(Contabc1 $l)
	{
		$this->collContabc1s[] = $l;
		$l->setContabc($this);
	}


	
	public function getContabc1sJoinContabb($criteria = null, $con = null)
	{
				include_once 'lib/model/contabilidad/om/BaseContabc1Peer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContabc1s === null) {
			if ($this->isNew()) {
				$this->collContabc1s = array();
			} else {

				$criteria->add(Contabc1Peer::NUMCOM, $this->getNumcom());

				$this->collContabc1s = Contabc1Peer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(Contabc1Peer::NUMCOM, $this->getNumcom());

			if (!isset($this->lastContabc1Criteria) || !$this->lastContabc1Criteria->equals($criteria)) {
				$this->collContabc1s = Contabc1Peer::doSelectJoinContabb($criteria, $con);
			}
		}
		$this->lastContabc1Criteria = $criteria;

		return $this->collContabc1s;
	}

} 