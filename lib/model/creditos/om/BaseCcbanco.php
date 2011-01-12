<?php


abstract class BaseCcbanco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomban;


	
	protected $abrban;


	
	protected $dirban;


	
	protected $nompercon;


	
	protected $telpercon;


	
	protected $codaretel;


	
	protected $codsudeban;


	
	protected $ccparroq_id;

	
	protected $aCcparroq;

	
	protected $collCcagencis;

	
	protected $lastCcagenciCriteria = null;

	
	protected $collCccodtras;

	
	protected $lastCccodtraCriteria = null;

	
	protected $collCccredits;

	
	protected $lastCccreditCriteria = null;

	
	protected $collCccuebans;

	
	protected $lastCccuebanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomban()
  {

    return trim($this->nomban);

  }
  
  public function getAbrban()
  {

    return trim($this->abrban);

  }
  
  public function getDirban()
  {

    return trim($this->dirban);

  }
  
  public function getNompercon()
  {

    return trim($this->nompercon);

  }
  
  public function getTelpercon()
  {

    return trim($this->telpercon);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodsudeban()
  {

    return $this->codsudeban;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbancoPeer::ID;
      }
  
	} 
	
	public function setNomban($v)
	{

    if ($this->nomban !== $v) {
        $this->nomban = $v;
        $this->modifiedColumns[] = CcbancoPeer::NOMBAN;
      }
  
	} 
	
	public function setAbrban($v)
	{

    if ($this->abrban !== $v) {
        $this->abrban = $v;
        $this->modifiedColumns[] = CcbancoPeer::ABRBAN;
      }
  
	} 
	
	public function setDirban($v)
	{

    if ($this->dirban !== $v) {
        $this->dirban = $v;
        $this->modifiedColumns[] = CcbancoPeer::DIRBAN;
      }
  
	} 
	
	public function setNompercon($v)
	{

    if ($this->nompercon !== $v) {
        $this->nompercon = $v;
        $this->modifiedColumns[] = CcbancoPeer::NOMPERCON;
      }
  
	} 
	
	public function setTelpercon($v)
	{

    if ($this->telpercon !== $v) {
        $this->telpercon = $v;
        $this->modifiedColumns[] = CcbancoPeer::TELPERCON;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcbancoPeer::CODARETEL;
      }
  
	} 
	
	public function setCodsudeban($v)
	{

    if ($this->codsudeban !== $v) {
        $this->codsudeban = $v;
        $this->modifiedColumns[] = CcbancoPeer::CODSUDEBAN;
      }
  
	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcbancoPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomban = $rs->getString($startcol + 1);

      $this->abrban = $rs->getString($startcol + 2);

      $this->dirban = $rs->getString($startcol + 3);

      $this->nompercon = $rs->getString($startcol + 4);

      $this->telpercon = $rs->getString($startcol + 5);

      $this->codaretel = $rs->getString($startcol + 6);

      $this->codsudeban = $rs->getInt($startcol + 7);

      $this->ccparroq_id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbanco object", $e);
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
			$con = Propel::getConnection(CcbancoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbancoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbancoPeer::DATABASE_NAME);
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


												
			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbancoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbancoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcagencis !== null) {
				foreach($this->collCcagencis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccodtras !== null) {
				foreach($this->collCccodtras as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccredits !== null) {
				foreach($this->collCccredits as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccuebans !== null) {
				foreach($this->collCccuebans as $referrerFK) {
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


												
			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}


			if (($retval = CcbancoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcagencis !== null) {
					foreach($this->collCcagencis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccodtras !== null) {
					foreach($this->collCccodtras as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccredits !== null) {
					foreach($this->collCccredits as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccuebans !== null) {
					foreach($this->collCccuebans as $referrerFK) {
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
		$pos = CcbancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomban();
				break;
			case 2:
				return $this->getAbrban();
				break;
			case 3:
				return $this->getDirban();
				break;
			case 4:
				return $this->getNompercon();
				break;
			case 5:
				return $this->getTelpercon();
				break;
			case 6:
				return $this->getCodaretel();
				break;
			case 7:
				return $this->getCodsudeban();
				break;
			case 8:
				return $this->getCcparroqId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbancoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomban(),
			$keys[2] => $this->getAbrban(),
			$keys[3] => $this->getDirban(),
			$keys[4] => $this->getNompercon(),
			$keys[5] => $this->getTelpercon(),
			$keys[6] => $this->getCodaretel(),
			$keys[7] => $this->getCodsudeban(),
			$keys[8] => $this->getCcparroqId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbancoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomban($value);
				break;
			case 2:
				$this->setAbrban($value);
				break;
			case 3:
				$this->setDirban($value);
				break;
			case 4:
				$this->setNompercon($value);
				break;
			case 5:
				$this->setTelpercon($value);
				break;
			case 6:
				$this->setCodaretel($value);
				break;
			case 7:
				$this->setCodsudeban($value);
				break;
			case 8:
				$this->setCcparroqId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbancoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomban($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAbrban($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDirban($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNompercon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelpercon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodaretel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodsudeban($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcparroqId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbancoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbancoPeer::ID)) $criteria->add(CcbancoPeer::ID, $this->id);
		if ($this->isColumnModified(CcbancoPeer::NOMBAN)) $criteria->add(CcbancoPeer::NOMBAN, $this->nomban);
		if ($this->isColumnModified(CcbancoPeer::ABRBAN)) $criteria->add(CcbancoPeer::ABRBAN, $this->abrban);
		if ($this->isColumnModified(CcbancoPeer::DIRBAN)) $criteria->add(CcbancoPeer::DIRBAN, $this->dirban);
		if ($this->isColumnModified(CcbancoPeer::NOMPERCON)) $criteria->add(CcbancoPeer::NOMPERCON, $this->nompercon);
		if ($this->isColumnModified(CcbancoPeer::TELPERCON)) $criteria->add(CcbancoPeer::TELPERCON, $this->telpercon);
		if ($this->isColumnModified(CcbancoPeer::CODARETEL)) $criteria->add(CcbancoPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcbancoPeer::CODSUDEBAN)) $criteria->add(CcbancoPeer::CODSUDEBAN, $this->codsudeban);
		if ($this->isColumnModified(CcbancoPeer::CCPARROQ_ID)) $criteria->add(CcbancoPeer::CCPARROQ_ID, $this->ccparroq_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbancoPeer::DATABASE_NAME);

		$criteria->add(CcbancoPeer::ID, $this->id);

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

		$copyObj->setNomban($this->nomban);

		$copyObj->setAbrban($this->abrban);

		$copyObj->setDirban($this->dirban);

		$copyObj->setNompercon($this->nompercon);

		$copyObj->setTelpercon($this->telpercon);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodsudeban($this->codsudeban);

		$copyObj->setCcparroqId($this->ccparroq_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcagencis() as $relObj) {
				$copyObj->addCcagenci($relObj->copy($deepCopy));
			}

			foreach($this->getCccodtras() as $relObj) {
				$copyObj->addCccodtra($relObj->copy($deepCopy));
			}

			foreach($this->getCccredits() as $relObj) {
				$copyObj->addCccredit($relObj->copy($deepCopy));
			}

			foreach($this->getCccuebans() as $relObj) {
				$copyObj->addCccueban($relObj->copy($deepCopy));
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
			self::$peer = new CcbancoPeer();
		}
		return self::$peer;
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

	
	public function initCcagencis()
	{
		if ($this->collCcagencis === null) {
			$this->collCcagencis = array();
		}
	}

	
	public function getCcagencis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcagenciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcagencis === null) {
			if ($this->isNew()) {
			   $this->collCcagencis = array();
			} else {

				$criteria->add(CcagenciPeer::CCBANCO_ID, $this->getId());

				CcagenciPeer::addSelectColumns($criteria);
				$this->collCcagencis = CcagenciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcagenciPeer::CCBANCO_ID, $this->getId());

				CcagenciPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcagenciCriteria) || !$this->lastCcagenciCriteria->equals($criteria)) {
					$this->collCcagencis = CcagenciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcagenciCriteria = $criteria;
		return $this->collCcagencis;
	}

	
	public function countCcagencis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcagenciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcagenciPeer::CCBANCO_ID, $this->getId());

		return CcagenciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcagenci(Ccagenci $l)
	{
		$this->collCcagencis[] = $l;
		$l->setCcbanco($this);
	}


	
	public function getCcagencisJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcagenciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcagencis === null) {
			if ($this->isNew()) {
				$this->collCcagencis = array();
			} else {

				$criteria->add(CcagenciPeer::CCBANCO_ID, $this->getId());

				$this->collCcagencis = CcagenciPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcagenciPeer::CCBANCO_ID, $this->getId());

			if (!isset($this->lastCcagenciCriteria) || !$this->lastCcagenciCriteria->equals($criteria)) {
				$this->collCcagencis = CcagenciPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcagenciCriteria = $criteria;

		return $this->collCcagencis;
	}

	
	public function initCccodtras()
	{
		if ($this->collCccodtras === null) {
			$this->collCccodtras = array();
		}
	}

	
	public function getCccodtras($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccodtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccodtras === null) {
			if ($this->isNew()) {
			   $this->collCccodtras = array();
			} else {

				$criteria->add(CccodtraPeer::CCBANCO_ID, $this->getId());

				CccodtraPeer::addSelectColumns($criteria);
				$this->collCccodtras = CccodtraPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccodtraPeer::CCBANCO_ID, $this->getId());

				CccodtraPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccodtraCriteria) || !$this->lastCccodtraCriteria->equals($criteria)) {
					$this->collCccodtras = CccodtraPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccodtraCriteria = $criteria;
		return $this->collCccodtras;
	}

	
	public function countCccodtras($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccodtraPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccodtraPeer::CCBANCO_ID, $this->getId());

		return CccodtraPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccodtra(Cccodtra $l)
	{
		$this->collCccodtras[] = $l;
		$l->setCcbanco($this);
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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

		$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

		return CccreditPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccredit(Cccredit $l)
	{
		$this->collCccredits[] = $l;
		$l->setCcbanco($this);
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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcagenci($criteria = null, $con = null)
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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

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

				$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCBANCO_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}

	
	public function initCccuebans()
	{
		if ($this->collCccuebans === null) {
			$this->collCccuebans = array();
		}
	}

	
	public function getCccuebans($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuebans === null) {
			if ($this->isNew()) {
			   $this->collCccuebans = array();
			} else {

				$criteria->add(CccuebanPeer::CCBANCO_ID, $this->getId());

				CccuebanPeer::addSelectColumns($criteria);
				$this->collCccuebans = CccuebanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccuebanPeer::CCBANCO_ID, $this->getId());

				CccuebanPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccuebanCriteria) || !$this->lastCccuebanCriteria->equals($criteria)) {
					$this->collCccuebans = CccuebanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccuebanCriteria = $criteria;
		return $this->collCccuebans;
	}

	
	public function countCccuebans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccuebanPeer::CCBANCO_ID, $this->getId());

		return CccuebanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccueban(Cccueban $l)
	{
		$this->collCccuebans[] = $l;
		$l->setCcbanco($this);
	}


	
	public function getCccuebansJoinCctipcue($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuebanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuebans === null) {
			if ($this->isNew()) {
				$this->collCccuebans = array();
			} else {

				$criteria->add(CccuebanPeer::CCBANCO_ID, $this->getId());

				$this->collCccuebans = CccuebanPeer::doSelectJoinCctipcue($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuebanPeer::CCBANCO_ID, $this->getId());

			if (!isset($this->lastCccuebanCriteria) || !$this->lastCccuebanCriteria->equals($criteria)) {
				$this->collCccuebans = CccuebanPeer::doSelectJoinCctipcue($criteria, $con);
			}
		}
		$this->lastCccuebanCriteria = $criteria;

		return $this->collCccuebans;
	}

} 