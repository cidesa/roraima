<?php


abstract class BaseCcresban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numcue;


	
	protected $fecha;


	
	protected $monto;


	
	protected $totreg;


	
	protected $monnocob;


	
	protected $fecreg;

	
	protected $collCcrespues;

	
	protected $lastCcrespueCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getTotreg()
  {

    return $this->totreg;

  }
  
  public function getMonnocob($val=false)
  {

    if($val) return number_format($this->monnocob,2,',','.');
    else return $this->monnocob;

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

	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcresbanPeer::ID;
      }
  
	} 
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = CcresbanPeer::NUMCUE;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = CcresbanPeer::FECHA;
    }

	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcresbanPeer::MONTO;
      }
  
	} 
	
	public function setTotreg($v)
	{

    if ($this->totreg !== $v) {
        $this->totreg = $v;
        $this->modifiedColumns[] = CcresbanPeer::TOTREG;
      }
  
	} 
	
	public function setMonnocob($v)
	{

    if ($this->monnocob !== $v) {
        $this->monnocob = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcresbanPeer::MONNOCOB;
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
      $this->modifiedColumns[] = CcresbanPeer::FECREG;
    }

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numcue = $rs->getString($startcol + 1);

      $this->fecha = $rs->getDate($startcol + 2, null);

      $this->monto = $rs->getFloat($startcol + 3);

      $this->totreg = $rs->getInt($startcol + 4);

      $this->monnocob = $rs->getFloat($startcol + 5);

      $this->fecreg = $rs->getDate($startcol + 6, null);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccresban object", $e);
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
			$con = Propel::getConnection(CcresbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcresbanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcresbanPeer::DATABASE_NAME);
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
					$pk = CcresbanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcresbanPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcrespues !== null) {
				foreach($this->collCcrespues as $referrerFK) {
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


			if (($retval = CcresbanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcrespues !== null) {
					foreach($this->collCcrespues as $referrerFK) {
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
		$pos = CcresbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumcue();
				break;
			case 2:
				return $this->getFecha();
				break;
			case 3:
				return $this->getMonto();
				break;
			case 4:
				return $this->getTotreg();
				break;
			case 5:
				return $this->getMonnocob();
				break;
			case 6:
				return $this->getFecreg();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcresbanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumcue(),
			$keys[2] => $this->getFecha(),
			$keys[3] => $this->getMonto(),
			$keys[4] => $this->getTotreg(),
			$keys[5] => $this->getMonnocob(),
			$keys[6] => $this->getFecreg(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcresbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumcue($value);
				break;
			case 2:
				$this->setFecha($value);
				break;
			case 3:
				$this->setMonto($value);
				break;
			case 4:
				$this->setTotreg($value);
				break;
			case 5:
				$this->setMonnocob($value);
				break;
			case 6:
				$this->setFecreg($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcresbanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecha($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMonto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTotreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonnocob($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecreg($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcresbanPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcresbanPeer::ID)) $criteria->add(CcresbanPeer::ID, $this->id);
		if ($this->isColumnModified(CcresbanPeer::NUMCUE)) $criteria->add(CcresbanPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(CcresbanPeer::FECHA)) $criteria->add(CcresbanPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(CcresbanPeer::MONTO)) $criteria->add(CcresbanPeer::MONTO, $this->monto);
		if ($this->isColumnModified(CcresbanPeer::TOTREG)) $criteria->add(CcresbanPeer::TOTREG, $this->totreg);
		if ($this->isColumnModified(CcresbanPeer::MONNOCOB)) $criteria->add(CcresbanPeer::MONNOCOB, $this->monnocob);
		if ($this->isColumnModified(CcresbanPeer::FECREG)) $criteria->add(CcresbanPeer::FECREG, $this->fecreg);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcresbanPeer::DATABASE_NAME);

		$criteria->add(CcresbanPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setFecha($this->fecha);

		$copyObj->setMonto($this->monto);

		$copyObj->setTotreg($this->totreg);

		$copyObj->setMonnocob($this->monnocob);

		$copyObj->setFecreg($this->fecreg);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcrespues() as $relObj) {
				$copyObj->addCcrespue($relObj->copy($deepCopy));
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
			self::$peer = new CcresbanPeer();
		}
		return self::$peer;
	}

	
	public function initCcrespues()
	{
		if ($this->collCcrespues === null) {
			$this->collCcrespues = array();
		}
	}

	
	public function getCcrespues($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrespuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrespues === null) {
			if ($this->isNew()) {
			   $this->collCcrespues = array();
			} else {

				$criteria->add(CcrespuePeer::CCRESBAN_ID, $this->getId());

				CcrespuePeer::addSelectColumns($criteria);
				$this->collCcrespues = CcrespuePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrespuePeer::CCRESBAN_ID, $this->getId());

				CcrespuePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrespueCriteria) || !$this->lastCcrespueCriteria->equals($criteria)) {
					$this->collCcrespues = CcrespuePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrespueCriteria = $criteria;
		return $this->collCcrespues;
	}

	
	public function countCcrespues($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrespuePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrespuePeer::CCRESBAN_ID, $this->getId());

		return CcrespuePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrespue(Ccrespue $l)
	{
		$this->collCcrespues[] = $l;
		$l->setCcresban($this);
	}

} 