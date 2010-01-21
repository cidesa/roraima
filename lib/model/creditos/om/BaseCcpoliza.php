<?php


abstract class BaseCcpoliza extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numpol;


	
	protected $nomase;


	
	protected $anoseg;


	
	protected $montoseg;


	
	protected $ccvehicu_id;

	
	protected $aCcvehicu;

	
	protected $collCcsiniess;

	
	protected $lastCcsiniesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumpol()
  {

    return trim($this->numpol);

  }
  
  public function getNomase()
  {

    return trim($this->nomase);

  }
  
  public function getAnoseg()
  {

    return $this->anoseg;

  }
  
  public function getMontoseg($val=false)
  {

    if($val) return number_format($this->montoseg,2,',','.');
    else return $this->montoseg;

  }
  
  public function getCcvehicuId()
  {

    return $this->ccvehicu_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcpolizaPeer::ID;
      }
  
	} 
	
	public function setNumpol($v)
	{

    if ($this->numpol !== $v) {
        $this->numpol = $v;
        $this->modifiedColumns[] = CcpolizaPeer::NUMPOL;
      }
  
	} 
	
	public function setNomase($v)
	{

    if ($this->nomase !== $v) {
        $this->nomase = $v;
        $this->modifiedColumns[] = CcpolizaPeer::NOMASE;
      }
  
	} 
	
	public function setAnoseg($v)
	{

    if ($this->anoseg !== $v) {
        $this->anoseg = $v;
        $this->modifiedColumns[] = CcpolizaPeer::ANOSEG;
      }
  
	} 
	
	public function setMontoseg($v)
	{

    if ($this->montoseg !== $v) {
        $this->montoseg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcpolizaPeer::MONTOSEG;
      }
  
	} 
	
	public function setCcvehicuId($v)
	{

    if ($this->ccvehicu_id !== $v) {
        $this->ccvehicu_id = $v;
        $this->modifiedColumns[] = CcpolizaPeer::CCVEHICU_ID;
      }
  
		if ($this->aCcvehicu !== null && $this->aCcvehicu->getId() !== $v) {
			$this->aCcvehicu = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numpol = $rs->getString($startcol + 1);

      $this->nomase = $rs->getString($startcol + 2);

      $this->anoseg = $rs->getInt($startcol + 3);

      $this->montoseg = $rs->getFloat($startcol + 4);

      $this->ccvehicu_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccpoliza object", $e);
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
			$con = Propel::getConnection(CcpolizaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcpolizaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcpolizaPeer::DATABASE_NAME);
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


												
			if ($this->aCcvehicu !== null) {
				if ($this->aCcvehicu->isModified()) {
					$affectedRows += $this->aCcvehicu->save($con);
				}
				$this->setCcvehicu($this->aCcvehicu);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcpolizaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcpolizaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcsiniess !== null) {
				foreach($this->collCcsiniess as $referrerFK) {
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


												
			if ($this->aCcvehicu !== null) {
				if (!$this->aCcvehicu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcvehicu->getValidationFailures());
				}
			}


			if (($retval = CcpolizaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcsiniess !== null) {
					foreach($this->collCcsiniess as $referrerFK) {
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
		$pos = CcpolizaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumpol();
				break;
			case 2:
				return $this->getNomase();
				break;
			case 3:
				return $this->getAnoseg();
				break;
			case 4:
				return $this->getMontoseg();
				break;
			case 5:
				return $this->getCcvehicuId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpolizaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumpol(),
			$keys[2] => $this->getNomase(),
			$keys[3] => $this->getAnoseg(),
			$keys[4] => $this->getMontoseg(),
			$keys[5] => $this->getCcvehicuId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpolizaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumpol($value);
				break;
			case 2:
				$this->setNomase($value);
				break;
			case 3:
				$this->setAnoseg($value);
				break;
			case 4:
				$this->setMontoseg($value);
				break;
			case 5:
				$this->setCcvehicuId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpolizaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumpol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomase($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnoseg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMontoseg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcvehicuId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcpolizaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcpolizaPeer::ID)) $criteria->add(CcpolizaPeer::ID, $this->id);
		if ($this->isColumnModified(CcpolizaPeer::NUMPOL)) $criteria->add(CcpolizaPeer::NUMPOL, $this->numpol);
		if ($this->isColumnModified(CcpolizaPeer::NOMASE)) $criteria->add(CcpolizaPeer::NOMASE, $this->nomase);
		if ($this->isColumnModified(CcpolizaPeer::ANOSEG)) $criteria->add(CcpolizaPeer::ANOSEG, $this->anoseg);
		if ($this->isColumnModified(CcpolizaPeer::MONTOSEG)) $criteria->add(CcpolizaPeer::MONTOSEG, $this->montoseg);
		if ($this->isColumnModified(CcpolizaPeer::CCVEHICU_ID)) $criteria->add(CcpolizaPeer::CCVEHICU_ID, $this->ccvehicu_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcpolizaPeer::DATABASE_NAME);

		$criteria->add(CcpolizaPeer::ID, $this->id);

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

		$copyObj->setNumpol($this->numpol);

		$copyObj->setNomase($this->nomase);

		$copyObj->setAnoseg($this->anoseg);

		$copyObj->setMontoseg($this->montoseg);

		$copyObj->setCcvehicuId($this->ccvehicu_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcsiniess() as $relObj) {
				$copyObj->addCcsinies($relObj->copy($deepCopy));
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
			self::$peer = new CcpolizaPeer();
		}
		return self::$peer;
	}

	
	public function setCcvehicu($v)
	{


		if ($v === null) {
			$this->setCcvehicuId(NULL);
		} else {
			$this->setCcvehicuId($v->getId());
		}


		$this->aCcvehicu = $v;
	}


	
	public function getCcvehicu($con = null)
	{
		if ($this->aCcvehicu === null && ($this->ccvehicu_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcvehicuPeer.php';

      $c = new Criteria();
      $c->add(CcvehicuPeer::ID,$this->ccvehicu_id);
      
			$this->aCcvehicu = CcvehicuPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcvehicu;
	}

	
	public function initCcsiniess()
	{
		if ($this->collCcsiniess === null) {
			$this->collCcsiniess = array();
		}
	}

	
	public function getCcsiniess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsiniesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsiniess === null) {
			if ($this->isNew()) {
			   $this->collCcsiniess = array();
			} else {

				$criteria->add(CcsiniesPeer::CCPOLIZA_ID, $this->getId());

				CcsiniesPeer::addSelectColumns($criteria);
				$this->collCcsiniess = CcsiniesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsiniesPeer::CCPOLIZA_ID, $this->getId());

				CcsiniesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsiniesCriteria) || !$this->lastCcsiniesCriteria->equals($criteria)) {
					$this->collCcsiniess = CcsiniesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsiniesCriteria = $criteria;
		return $this->collCcsiniess;
	}

	
	public function countCcsiniess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsiniesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsiniesPeer::CCPOLIZA_ID, $this->getId());

		return CcsiniesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsinies(Ccsinies $l)
	{
		$this->collCcsiniess[] = $l;
		$l->setCcpoliza($this);
	}

} 