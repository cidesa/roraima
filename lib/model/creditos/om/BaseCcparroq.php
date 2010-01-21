<?php


abstract class BaseCcparroq extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nompar;


	
	protected $ccmunici_id;

	
	protected $aCcmunici;

	
	protected $collCcagencis;

	
	protected $lastCcagenciCriteria = null;

	
	protected $collCcanaliss;

	
	protected $lastCcanalisCriteria = null;

	
	protected $collCcbancos;

	
	protected $lastCcbancoCriteria = null;

	
	protected $collCcbenefis;

	
	protected $lastCcbenefiCriteria = null;

	
	protected $collCcbieadqs;

	
	protected $lastCcbieadqCriteria = null;

	
	protected $collCcdircorbens;

	
	protected $lastCcdircorbenCriteria = null;

	
	protected $collCcfiadors;

	
	protected $lastCcfiadorCriteria = null;

	
	protected $collCcgarants;

	
	protected $lastCcgarantCriteria = null;

	
	protected $collCcgarsols;

	
	protected $lastCcgarsolCriteria = null;

	
	protected $collCcpagters;

	
	protected $lastCcpagterCriteria = null;

	
	protected $collCcperbens;

	
	protected $lastCcperbenCriteria = null;

	
	protected $collCcrepbens;

	
	protected $lastCcrepbenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNompar()
  {

    return trim($this->nompar);

  }
  
  public function getCcmuniciId()
  {

    return $this->ccmunici_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparroqPeer::ID;
      }
  
	} 
	
	public function setNompar($v)
	{

    if ($this->nompar !== $v) {
        $this->nompar = $v;
        $this->modifiedColumns[] = CcparroqPeer::NOMPAR;
      }
  
	} 
	
	public function setCcmuniciId($v)
	{

    if ($this->ccmunici_id !== $v) {
        $this->ccmunici_id = $v;
        $this->modifiedColumns[] = CcparroqPeer::CCMUNICI_ID;
      }
  
		if ($this->aCcmunici !== null && $this->aCcmunici->getId() !== $v) {
			$this->aCcmunici = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nompar = $rs->getString($startcol + 1);

      $this->ccmunici_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparroq object", $e);
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
			$con = Propel::getConnection(CcparroqPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparroqPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparroqPeer::DATABASE_NAME);
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


												
			if ($this->aCcmunici !== null) {
				if ($this->aCcmunici->isModified()) {
					$affectedRows += $this->aCcmunici->save($con);
				}
				$this->setCcmunici($this->aCcmunici);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcparroqPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparroqPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcagencis !== null) {
				foreach($this->collCcagencis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcanaliss !== null) {
				foreach($this->collCcanaliss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbancos !== null) {
				foreach($this->collCcbancos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbenefis !== null) {
				foreach($this->collCcbenefis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbieadqs !== null) {
				foreach($this->collCcbieadqs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdircorbens !== null) {
				foreach($this->collCcdircorbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcfiadors !== null) {
				foreach($this->collCcfiadors as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgarants !== null) {
				foreach($this->collCcgarants as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgarsols !== null) {
				foreach($this->collCcgarsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagters !== null) {
				foreach($this->collCcpagters as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcperbens !== null) {
				foreach($this->collCcperbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrepbens !== null) {
				foreach($this->collCcrepbens as $referrerFK) {
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


												
			if ($this->aCcmunici !== null) {
				if (!$this->aCcmunici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcmunici->getValidationFailures());
				}
			}


			if (($retval = CcparroqPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcagencis !== null) {
					foreach($this->collCcagencis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcanaliss !== null) {
					foreach($this->collCcanaliss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbancos !== null) {
					foreach($this->collCcbancos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbenefis !== null) {
					foreach($this->collCcbenefis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbieadqs !== null) {
					foreach($this->collCcbieadqs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdircorbens !== null) {
					foreach($this->collCcdircorbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcfiadors !== null) {
					foreach($this->collCcfiadors as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgarants !== null) {
					foreach($this->collCcgarants as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgarsols !== null) {
					foreach($this->collCcgarsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagters !== null) {
					foreach($this->collCcpagters as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcperbens !== null) {
					foreach($this->collCcperbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrepbens !== null) {
					foreach($this->collCcrepbens as $referrerFK) {
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
		$pos = CcparroqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNompar();
				break;
			case 2:
				return $this->getCcmuniciId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparroqPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNompar(),
			$keys[2] => $this->getCcmuniciId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparroqPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNompar($value);
				break;
			case 2:
				$this->setCcmuniciId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparroqPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcmuniciId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparroqPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparroqPeer::ID)) $criteria->add(CcparroqPeer::ID, $this->id);
		if ($this->isColumnModified(CcparroqPeer::NOMPAR)) $criteria->add(CcparroqPeer::NOMPAR, $this->nompar);
		if ($this->isColumnModified(CcparroqPeer::CCMUNICI_ID)) $criteria->add(CcparroqPeer::CCMUNICI_ID, $this->ccmunici_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparroqPeer::DATABASE_NAME);

		$criteria->add(CcparroqPeer::ID, $this->id);

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

		$copyObj->setNompar($this->nompar);

		$copyObj->setCcmuniciId($this->ccmunici_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcagencis() as $relObj) {
				$copyObj->addCcagenci($relObj->copy($deepCopy));
			}

			foreach($this->getCcanaliss() as $relObj) {
				$copyObj->addCcanalis($relObj->copy($deepCopy));
			}

			foreach($this->getCcbancos() as $relObj) {
				$copyObj->addCcbanco($relObj->copy($deepCopy));
			}

			foreach($this->getCcbenefis() as $relObj) {
				$copyObj->addCcbenefi($relObj->copy($deepCopy));
			}

			foreach($this->getCcbieadqs() as $relObj) {
				$copyObj->addCcbieadq($relObj->copy($deepCopy));
			}

			foreach($this->getCcdircorbens() as $relObj) {
				$copyObj->addCcdircorben($relObj->copy($deepCopy));
			}

			foreach($this->getCcfiadors() as $relObj) {
				$copyObj->addCcfiador($relObj->copy($deepCopy));
			}

			foreach($this->getCcgarants() as $relObj) {
				$copyObj->addCcgarant($relObj->copy($deepCopy));
			}

			foreach($this->getCcgarsols() as $relObj) {
				$copyObj->addCcgarsol($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagters() as $relObj) {
				$copyObj->addCcpagter($relObj->copy($deepCopy));
			}

			foreach($this->getCcperbens() as $relObj) {
				$copyObj->addCcperben($relObj->copy($deepCopy));
			}

			foreach($this->getCcrepbens() as $relObj) {
				$copyObj->addCcrepben($relObj->copy($deepCopy));
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
			self::$peer = new CcparroqPeer();
		}
		return self::$peer;
	}

	
	public function setCcmunici($v)
	{


		if ($v === null) {
			$this->setCcmuniciId(NULL);
		} else {
			$this->setCcmuniciId($v->getId());
		}


		$this->aCcmunici = $v;
	}


	
	public function getCcmunici($con = null)
	{
		if ($this->aCcmunici === null && ($this->ccmunici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcmuniciPeer.php';

      $c = new Criteria();
      $c->add(CcmuniciPeer::ID,$this->ccmunici_id);
      
			$this->aCcmunici = CcmuniciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcmunici;
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

				$criteria->add(CcagenciPeer::CCPARROQ_ID, $this->getId());

				CcagenciPeer::addSelectColumns($criteria);
				$this->collCcagencis = CcagenciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcagenciPeer::CCPARROQ_ID, $this->getId());

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

		$criteria->add(CcagenciPeer::CCPARROQ_ID, $this->getId());

		return CcagenciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcagenci(Ccagenci $l)
	{
		$this->collCcagencis[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcagencisJoinCcbanco($criteria = null, $con = null)
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

				$criteria->add(CcagenciPeer::CCPARROQ_ID, $this->getId());

				$this->collCcagencis = CcagenciPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcagenciPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcagenciCriteria) || !$this->lastCcagenciCriteria->equals($criteria)) {
				$this->collCcagencis = CcagenciPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCcagenciCriteria = $criteria;

		return $this->collCcagencis;
	}

	
	public function initCcanaliss()
	{
		if ($this->collCcanaliss === null) {
			$this->collCcanaliss = array();
		}
	}

	
	public function getCcanaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
			   $this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

				CcanalisPeer::addSelectColumns($criteria);
				$this->collCcanaliss = CcanalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

				CcanalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
					$this->collCcanaliss = CcanalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanalisCriteria = $criteria;
		return $this->collCcanaliss;
	}

	
	public function countCcanaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

		return CcanalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanalis(Ccanalis $l)
	{
		$this->collCcanaliss[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcanalissJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}


	
	public function getCcanalissJoinCctipana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCctipana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCctipana($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}


	
	public function getCcanalissJoinCcareger($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcareger($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcareger($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}

	
	public function initCcbancos()
	{
		if ($this->collCcbancos === null) {
			$this->collCcbancos = array();
		}
	}

	
	public function getCcbancos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbancoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbancos === null) {
			if ($this->isNew()) {
			   $this->collCcbancos = array();
			} else {

				$criteria->add(CcbancoPeer::CCPARROQ_ID, $this->getId());

				CcbancoPeer::addSelectColumns($criteria);
				$this->collCcbancos = CcbancoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbancoPeer::CCPARROQ_ID, $this->getId());

				CcbancoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbancoCriteria) || !$this->lastCcbancoCriteria->equals($criteria)) {
					$this->collCcbancos = CcbancoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbancoCriteria = $criteria;
		return $this->collCcbancos;
	}

	
	public function countCcbancos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbancoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbancoPeer::CCPARROQ_ID, $this->getId());

		return CcbancoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbanco(Ccbanco $l)
	{
		$this->collCcbancos[] = $l;
		$l->setCcparroq($this);
	}

	
	public function initCcbenefis()
	{
		if ($this->collCcbenefis === null) {
			$this->collCcbenefis = array();
		}
	}

	
	public function getCcbenefis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
			   $this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
					$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbenefiCriteria = $criteria;
		return $this->collCcbenefis;
	}

	
	public function countCcbenefis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

		return CcbenefiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbenefi(Ccbenefi $l)
	{
		$this->collCcbenefis[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcbenefisJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcestciv($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcsececo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcorimatpri($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCccargo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcubiadm($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}

	
	public function initCcbieadqs()
	{
		if ($this->collCcbieadqs === null) {
			$this->collCcbieadqs = array();
		}
	}

	
	public function getCcbieadqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
			   $this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

				CcbieadqPeer::addSelectColumns($criteria);
				$this->collCcbieadqs = CcbieadqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

				CcbieadqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
					$this->collCcbieadqs = CcbieadqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbieadqCriteria = $criteria;
		return $this->collCcbieadqs;
	}

	
	public function countCcbieadqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

		return CcbieadqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbieadq(Ccbieadq $l)
	{
		$this->collCcbieadqs[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcbieadqsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}


	
	public function getCcbieadqsJoinCcclabie($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcclabie($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcclabie($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}


	
	public function getCcbieadqsJoinCctipprobie($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCctipprobie($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCctipprobie($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}

	
	public function initCcdircorbens()
	{
		if ($this->collCcdircorbens === null) {
			$this->collCcdircorbens = array();
		}
	}

	
	public function getCcdircorbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdircorbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdircorbens === null) {
			if ($this->isNew()) {
			   $this->collCcdircorbens = array();
			} else {

				$criteria->add(CcdircorbenPeer::CCPARROQ_ID, $this->getId());

				CcdircorbenPeer::addSelectColumns($criteria);
				$this->collCcdircorbens = CcdircorbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdircorbenPeer::CCPARROQ_ID, $this->getId());

				CcdircorbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdircorbenCriteria) || !$this->lastCcdircorbenCriteria->equals($criteria)) {
					$this->collCcdircorbens = CcdircorbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdircorbenCriteria = $criteria;
		return $this->collCcdircorbens;
	}

	
	public function countCcdircorbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdircorbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdircorbenPeer::CCPARROQ_ID, $this->getId());

		return CcdircorbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdircorben(Ccdircorben $l)
	{
		$this->collCcdircorbens[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcdircorbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdircorbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdircorbens === null) {
			if ($this->isNew()) {
				$this->collCcdircorbens = array();
			} else {

				$criteria->add(CcdircorbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcdircorbens = CcdircorbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdircorbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcdircorbenCriteria) || !$this->lastCcdircorbenCriteria->equals($criteria)) {
				$this->collCcdircorbens = CcdircorbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcdircorbenCriteria = $criteria;

		return $this->collCcdircorbens;
	}

	
	public function initCcfiadors()
	{
		if ($this->collCcfiadors === null) {
			$this->collCcfiadors = array();
		}
	}

	
	public function getCcfiadors($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfiadorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcfiadors === null) {
			if ($this->isNew()) {
			   $this->collCcfiadors = array();
			} else {

				$criteria->add(CcfiadorPeer::CCPARROQ_ID, $this->getId());

				CcfiadorPeer::addSelectColumns($criteria);
				$this->collCcfiadors = CcfiadorPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcfiadorPeer::CCPARROQ_ID, $this->getId());

				CcfiadorPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcfiadorCriteria) || !$this->lastCcfiadorCriteria->equals($criteria)) {
					$this->collCcfiadors = CcfiadorPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcfiadorCriteria = $criteria;
		return $this->collCcfiadors;
	}

	
	public function countCcfiadors($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfiadorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcfiadorPeer::CCPARROQ_ID, $this->getId());

		return CcfiadorPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcfiador(Ccfiador $l)
	{
		$this->collCcfiadors[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcfiadorsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcfiadorPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcfiadors === null) {
			if ($this->isNew()) {
				$this->collCcfiadors = array();
			} else {

				$criteria->add(CcfiadorPeer::CCPARROQ_ID, $this->getId());

				$this->collCcfiadors = CcfiadorPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcfiadorPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcfiadorCriteria) || !$this->lastCcfiadorCriteria->equals($criteria)) {
				$this->collCcfiadors = CcfiadorPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcfiadorCriteria = $criteria;

		return $this->collCcfiadors;
	}

	
	public function initCcgarants()
	{
		if ($this->collCcgarants === null) {
			$this->collCcgarants = array();
		}
	}

	
	public function getCcgarants($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarants === null) {
			if ($this->isNew()) {
			   $this->collCcgarants = array();
			} else {

				$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

				CcgarantPeer::addSelectColumns($criteria);
				$this->collCcgarants = CcgarantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

				CcgarantPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
					$this->collCcgarants = CcgarantPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgarantCriteria = $criteria;
		return $this->collCcgarants;
	}

	
	public function countCcgarants($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

		return CcgarantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarant(Ccgarant $l)
	{
		$this->collCcgarants[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcgarantsJoinCctipgar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarants === null) {
			if ($this->isNew()) {
				$this->collCcgarants = array();
			} else {

				$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

				$this->collCcgarants = CcgarantPeer::doSelectJoinCctipgar($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
				$this->collCcgarants = CcgarantPeer::doSelectJoinCctipgar($criteria, $con);
			}
		}
		$this->lastCcgarantCriteria = $criteria;

		return $this->collCcgarants;
	}


	
	public function getCcgarantsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarants === null) {
			if ($this->isNew()) {
				$this->collCcgarants = array();
			} else {

				$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

				$this->collCcgarants = CcgarantPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarantPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
				$this->collCcgarants = CcgarantPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgarantCriteria = $criteria;

		return $this->collCcgarants;
	}

	
	public function initCcgarsols()
	{
		if ($this->collCcgarsols === null) {
			$this->collCcgarsols = array();
		}
	}

	
	public function getCcgarsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
			   $this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
					$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgarsolCriteria = $criteria;
		return $this->collCcgarsols;
	}

	
	public function countCcgarsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

		return CcgarsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarsol(Ccgarsol $l)
	{
		$this->collCcgarsols[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcgarsolsJoinCctipgar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCctipgar($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCctipgar($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}

	
	public function initCcpagters()
	{
		if ($this->collCcpagters === null) {
			$this->collCcpagters = array();
		}
	}

	
	public function getCcpagters($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
			   $this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

				CcpagterPeer::addSelectColumns($criteria);
				$this->collCcpagters = CcpagterPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

				CcpagterPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
					$this->collCcpagters = CcpagterPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagterCriteria = $criteria;
		return $this->collCcpagters;
	}

	
	public function countCcpagters($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

		return CcpagterPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpagter(Ccpagter $l)
	{
		$this->collCcpagters[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcpagtersJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}


	
	public function getCcpagtersJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}


	
	public function getCcpagtersJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}

	
	public function initCcperbens()
	{
		if ($this->collCcperbens === null) {
			$this->collCcperbens = array();
		}
	}

	
	public function getCcperbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
			   $this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
					$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcperbenCriteria = $criteria;
		return $this->collCcperbens;
	}

	
	public function countCcperbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

		return CcperbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcperben(Ccperben $l)
	{
		$this->collCcperbens[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcperbensJoinCccargo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCccargo($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}


	
	public function getCcperbensJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}


	
	public function getCcperbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}

	
	public function initCcrepbens()
	{
		if ($this->collCcrepbens === null) {
			$this->collCcrepbens = array();
		}
	}

	
	public function getCcrepbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
			   $this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
					$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrepbenCriteria = $criteria;
		return $this->collCcrepbens;
	}

	
	public function countCcrepbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

		return CcrepbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrepben(Ccrepben $l)
	{
		$this->collCcrepbens[] = $l;
		$l->setCcparroq($this);
	}


	
	public function getCcrepbensJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcparent($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparent($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparent($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}

} 