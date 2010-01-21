<?php


abstract class BaseCcagenci extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $codage;


	
	protected $dirage;


	
	protected $telage;


	
	protected $telage2;


	
	protected $faxage;


	
	protected $codaretel;


	
	protected $codaretel2;


	
	protected $codarefax;


	
	protected $ccbanco_id;


	
	protected $ccparroq_id;

	
	protected $aCcbanco;

	
	protected $aCcparroq;

	
	protected $collCccredits;

	
	protected $lastCccreditCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCodage()
  {

    return $this->codage;

  }
  
  public function getDirage()
  {

    return trim($this->dirage);

  }
  
  public function getTelage()
  {

    return trim($this->telage);

  }
  
  public function getTelage2()
  {

    return trim($this->telage2);

  }
  
  public function getFaxage()
  {

    return trim($this->faxage);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodaretel2()
  {

    return trim($this->codaretel2);

  }
  
  public function getCodarefax()
  {

    return trim($this->codarefax);

  }
  
  public function getCcbancoId()
  {

    return $this->ccbanco_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcagenciPeer::ID;
      }
  
	} 
	
	public function setCodage($v)
	{

    if ($this->codage !== $v) {
        $this->codage = $v;
        $this->modifiedColumns[] = CcagenciPeer::CODAGE;
      }
  
	} 
	
	public function setDirage($v)
	{

    if ($this->dirage !== $v) {
        $this->dirage = $v;
        $this->modifiedColumns[] = CcagenciPeer::DIRAGE;
      }
  
	} 
	
	public function setTelage($v)
	{

    if ($this->telage !== $v) {
        $this->telage = $v;
        $this->modifiedColumns[] = CcagenciPeer::TELAGE;
      }
  
	} 
	
	public function setTelage2($v)
	{

    if ($this->telage2 !== $v) {
        $this->telage2 = $v;
        $this->modifiedColumns[] = CcagenciPeer::TELAGE2;
      }
  
	} 
	
	public function setFaxage($v)
	{

    if ($this->faxage !== $v) {
        $this->faxage = $v;
        $this->modifiedColumns[] = CcagenciPeer::FAXAGE;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcagenciPeer::CODARETEL;
      }
  
	} 
	
	public function setCodaretel2($v)
	{

    if ($this->codaretel2 !== $v) {
        $this->codaretel2 = $v;
        $this->modifiedColumns[] = CcagenciPeer::CODARETEL2;
      }
  
	} 
	
	public function setCodarefax($v)
	{

    if ($this->codarefax !== $v) {
        $this->codarefax = $v;
        $this->modifiedColumns[] = CcagenciPeer::CODAREFAX;
      }
  
	} 
	
	public function setCcbancoId($v)
	{

    if ($this->ccbanco_id !== $v) {
        $this->ccbanco_id = $v;
        $this->modifiedColumns[] = CcagenciPeer::CCBANCO_ID;
      }
  
		if ($this->aCcbanco !== null && $this->aCcbanco->getId() !== $v) {
			$this->aCcbanco = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcagenciPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->codage = $rs->getInt($startcol + 1);

      $this->dirage = $rs->getString($startcol + 2);

      $this->telage = $rs->getString($startcol + 3);

      $this->telage2 = $rs->getString($startcol + 4);

      $this->faxage = $rs->getString($startcol + 5);

      $this->codaretel = $rs->getString($startcol + 6);

      $this->codaretel2 = $rs->getString($startcol + 7);

      $this->codarefax = $rs->getString($startcol + 8);

      $this->ccbanco_id = $rs->getInt($startcol + 9);

      $this->ccparroq_id = $rs->getInt($startcol + 10);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 11; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccagenci object", $e);
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
			$con = Propel::getConnection(CcagenciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcagenciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcagenciPeer::DATABASE_NAME);
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


												
			if ($this->aCcbanco !== null) {
				if ($this->aCcbanco->isModified()) {
					$affectedRows += $this->aCcbanco->save($con);
				}
				$this->setCcbanco($this->aCcbanco);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcagenciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcagenciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccredits !== null) {
				foreach($this->collCccredits as $referrerFK) {
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


												
			if ($this->aCcbanco !== null) {
				if (!$this->aCcbanco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbanco->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcagenciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccredits !== null) {
					foreach($this->collCccredits as $referrerFK) {
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
		$pos = CcagenciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCodage();
				break;
			case 2:
				return $this->getDirage();
				break;
			case 3:
				return $this->getTelage();
				break;
			case 4:
				return $this->getTelage2();
				break;
			case 5:
				return $this->getFaxage();
				break;
			case 6:
				return $this->getCodaretel();
				break;
			case 7:
				return $this->getCodaretel2();
				break;
			case 8:
				return $this->getCodarefax();
				break;
			case 9:
				return $this->getCcbancoId();
				break;
			case 10:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcagenciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCodage(),
			$keys[2] => $this->getDirage(),
			$keys[3] => $this->getTelage(),
			$keys[4] => $this->getTelage2(),
			$keys[5] => $this->getFaxage(),
			$keys[6] => $this->getCodaretel(),
			$keys[7] => $this->getCodaretel2(),
			$keys[8] => $this->getCodarefax(),
			$keys[9] => $this->getCcbancoId(),
			$keys[10] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcagenciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCodage($value);
				break;
			case 2:
				$this->setDirage($value);
				break;
			case 3:
				$this->setTelage($value);
				break;
			case 4:
				$this->setTelage2($value);
				break;
			case 5:
				$this->setFaxage($value);
				break;
			case 6:
				$this->setCodaretel($value);
				break;
			case 7:
				$this->setCodaretel2($value);
				break;
			case 8:
				$this->setCodarefax($value);
				break;
			case 9:
				$this->setCcbancoId($value);
				break;
			case 10:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcagenciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodage($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDirage($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelage($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTelage2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFaxage($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaretel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodaretel2($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodarefax($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcbancoId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcparroqId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcagenciPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcagenciPeer::ID)) $criteria->add(CcagenciPeer::ID, $this->id);
		if ($this->isColumnModified(CcagenciPeer::CODAGE)) $criteria->add(CcagenciPeer::CODAGE, $this->codage);
		if ($this->isColumnModified(CcagenciPeer::DIRAGE)) $criteria->add(CcagenciPeer::DIRAGE, $this->dirage);
		if ($this->isColumnModified(CcagenciPeer::TELAGE)) $criteria->add(CcagenciPeer::TELAGE, $this->telage);
		if ($this->isColumnModified(CcagenciPeer::TELAGE2)) $criteria->add(CcagenciPeer::TELAGE2, $this->telage2);
		if ($this->isColumnModified(CcagenciPeer::FAXAGE)) $criteria->add(CcagenciPeer::FAXAGE, $this->faxage);
		if ($this->isColumnModified(CcagenciPeer::CODARETEL)) $criteria->add(CcagenciPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcagenciPeer::CODARETEL2)) $criteria->add(CcagenciPeer::CODARETEL2, $this->codaretel2);
		if ($this->isColumnModified(CcagenciPeer::CODAREFAX)) $criteria->add(CcagenciPeer::CODAREFAX, $this->codarefax);
		if ($this->isColumnModified(CcagenciPeer::CCBANCO_ID)) $criteria->add(CcagenciPeer::CCBANCO_ID, $this->ccbanco_id);
		if ($this->isColumnModified(CcagenciPeer::CCPARROQ_ID)) $criteria->add(CcagenciPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcagenciPeer::DATABASE_NAME);

		$criteria->add(CcagenciPeer::ID, $this->id);

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

		$copyObj->setCodage($this->codage);

		$copyObj->setDirage($this->dirage);

		$copyObj->setTelage($this->telage);

		$copyObj->setTelage2($this->telage2);

		$copyObj->setFaxage($this->faxage);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodaretel2($this->codaretel2);

		$copyObj->setCodarefax($this->codarefax);

		$copyObj->setCcbancoId($this->ccbanco_id);

		$copyObj->setCcparroqId($this->ccparroq_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccredits() as $relObj) {
				$copyObj->addCccredit($relObj->copy($deepCopy));
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
			self::$peer = new CcagenciPeer();
		}
		return self::$peer;
	}

	
	public function setCcbanco($v)
	{


		if ($v === null) {
			$this->setCcbancoId(NULL);
		} else {
			$this->setCcbancoId($v->getId());
		}


		$this->aCcbanco = $v;
	}


	
	public function getCcbanco($con = null)
	{
		if ($this->aCcbanco === null && ($this->ccbanco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbancoPeer.php';

      $c = new Criteria();
      $c->add(CcbancoPeer::ID,$this->ccbanco_id);
      
			$this->aCcbanco = CcbancoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbanco;
	}

	
	public function setCcparroq($v)
	{


		if ($v === null) {
			$this->setCcparroqId(NULL);
		} else {
			$this->setCcparroqId($v->getId());
		}


		$this->aCcparroq = $v;
	}


	
	public function getCcparroq($con = null)
	{
		if ($this->aCcparroq === null && ($this->ccparroq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';

      $c = new Criteria();
      $c->add(CcparroqPeer::ID,$this->ccparroq_id);
      
			$this->aCcparroq = CcparroqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparroq;
	}

	
	public function initCccredits()
	{
		if ($this->collCccredits === null) {
			$this->collCccredits = array();
		}
	}

	
	public function getCccredits($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
			   $this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
					$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreditCriteria = $criteria;
		return $this->collCccredits;
	}

	
	public function countCccredits($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

		return CccreditPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccredit(Cccredit $l)
	{
		$this->collCccredits[] = $l;
		$l->setCcagenci($this);
	}


	
	public function getCccreditsJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcfuefin($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipcar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipmon($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcbanco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcprioridad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCAGENCI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}

} 