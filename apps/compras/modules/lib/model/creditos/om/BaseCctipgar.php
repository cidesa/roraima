<?php


abstract class BaseCctipgar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomtipgar;


	
	protected $destipgar;

	
	protected $collCcgarants;

	
	protected $lastCcgarantCriteria = null;

	
	protected $collCcgarsols;

	
	protected $lastCcgarsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomtipgar()
  {

    return trim($this->nomtipgar);

  }
  
  public function getDestipgar()
  {

    return trim($this->destipgar);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CctipgarPeer::ID;
      }
  
	} 
	
	public function setNomtipgar($v)
	{

    if ($this->nomtipgar !== $v) {
        $this->nomtipgar = $v;
        $this->modifiedColumns[] = CctipgarPeer::NOMTIPGAR;
      }
  
	} 
	
	public function setDestipgar($v)
	{

    if ($this->destipgar !== $v) {
        $this->destipgar = $v;
        $this->modifiedColumns[] = CctipgarPeer::DESTIPGAR;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomtipgar = $rs->getString($startcol + 1);

      $this->destipgar = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cctipgar object", $e);
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
			$con = Propel::getConnection(CctipgarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CctipgarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CctipgarPeer::DATABASE_NAME);
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
					$pk = CctipgarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CctipgarPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = CctipgarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipgarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomtipgar();
				break;
			case 2:
				return $this->getDestipgar();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipgarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomtipgar(),
			$keys[2] => $this->getDestipgar(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipgarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomtipgar($value);
				break;
			case 2:
				$this->setDestipgar($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipgarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipgar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestipgar($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CctipgarPeer::DATABASE_NAME);

		if ($this->isColumnModified(CctipgarPeer::ID)) $criteria->add(CctipgarPeer::ID, $this->id);
		if ($this->isColumnModified(CctipgarPeer::NOMTIPGAR)) $criteria->add(CctipgarPeer::NOMTIPGAR, $this->nomtipgar);
		if ($this->isColumnModified(CctipgarPeer::DESTIPGAR)) $criteria->add(CctipgarPeer::DESTIPGAR, $this->destipgar);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CctipgarPeer::DATABASE_NAME);

		$criteria->add(CctipgarPeer::ID, $this->id);

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

		$copyObj->setNomtipgar($this->nomtipgar);

		$copyObj->setDestipgar($this->destipgar);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcgarants() as $relObj) {
				$copyObj->addCcgarant($relObj->copy($deepCopy));
			}

			foreach($this->getCcgarsols() as $relObj) {
				$copyObj->addCcgarsol($relObj->copy($deepCopy));
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
			self::$peer = new CctipgarPeer();
		}
		return self::$peer;
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

				$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

				CcgarantPeer::addSelectColumns($criteria);
				$this->collCcgarants = CcgarantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

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

		$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

		return CcgarantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarant(Ccgarant $l)
	{
		$this->collCcgarants[] = $l;
		$l->setCctipgar($this);
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

				$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

				$this->collCcgarants = CcgarantPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

			if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
				$this->collCcgarants = CcgarantPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgarantCriteria = $criteria;

		return $this->collCcgarants;
	}


	
	public function getCcgarantsJoinCcparroq($criteria = null, $con = null)
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

				$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

				$this->collCcgarants = CcgarantPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarantPeer::CCTIPGAR_ID, $this->getId());

			if (!isset($this->lastCcgarantCriteria) || !$this->lastCcgarantCriteria->equals($criteria)) {
				$this->collCcgarants = CcgarantPeer::doSelectJoinCcparroq($criteria, $con);
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

				$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

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

		$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

		return CcgarsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarsol(Ccgarsol $l)
	{
		$this->collCcgarsols[] = $l;
		$l->setCctipgar($this);
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

				$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCcparroq($criteria = null, $con = null)
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

				$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcparroq($criteria, $con);
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

				$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCTIPGAR_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}

} 