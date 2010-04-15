<?php


abstract class BaseFatipcte extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomtipcte;


	
	protected $id;

	
	protected $collFadtoctes;

	
	protected $lastFadtocteCriteria = null;

	
	protected $collFaclientes;

	
	protected $lastFaclienteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNomtipcte()
  {

    return trim($this->nomtipcte);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNomtipcte($v)
	{

    if ($this->nomtipcte !== $v) {
        $this->nomtipcte = $v;
        $this->modifiedColumns[] = FatipctePeer::NOMTIPCTE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FatipctePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nomtipcte = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fatipcte object", $e);
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
			$con = Propel::getConnection(FatipctePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatipctePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatipctePeer::DATABASE_NAME);
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
					$pk = FatipctePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FatipctePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFadtoctes !== null) {
				foreach($this->collFadtoctes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFaclientes !== null) {
				foreach($this->collFaclientes as $referrerFK) {
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


			if (($retval = FatipctePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFadtoctes !== null) {
					foreach($this->collFadtoctes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFaclientes !== null) {
					foreach($this->collFaclientes as $referrerFK) {
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
		$pos = FatipctePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomtipcte();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatipctePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomtipcte(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatipctePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomtipcte($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatipctePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomtipcte($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatipctePeer::DATABASE_NAME);

		if ($this->isColumnModified(FatipctePeer::NOMTIPCTE)) $criteria->add(FatipctePeer::NOMTIPCTE, $this->nomtipcte);
		if ($this->isColumnModified(FatipctePeer::ID)) $criteria->add(FatipctePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatipctePeer::DATABASE_NAME);

		$criteria->add(FatipctePeer::ID, $this->id);

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

		$copyObj->setNomtipcte($this->nomtipcte);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFadtoctes() as $relObj) {
				$copyObj->addFadtocte($relObj->copy($deepCopy));
			}

			foreach($this->getFaclientes() as $relObj) {
				$copyObj->addFacliente($relObj->copy($deepCopy));
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
			self::$peer = new FatipctePeer();
		}
		return self::$peer;
	}

	
	public function initFadtoctes()
	{
		if ($this->collFadtoctes === null) {
			$this->collFadtoctes = array();
		}
	}

	
	public function getFadtoctes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFadtoctePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFadtoctes === null) {
			if ($this->isNew()) {
			   $this->collFadtoctes = array();
			} else {

				$criteria->add(FadtoctePeer::FATIPCTE_ID, $this->getId());

				FadtoctePeer::addSelectColumns($criteria);
				$this->collFadtoctes = FadtoctePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FadtoctePeer::FATIPCTE_ID, $this->getId());

				FadtoctePeer::addSelectColumns($criteria);
				if (!isset($this->lastFadtocteCriteria) || !$this->lastFadtocteCriteria->equals($criteria)) {
					$this->collFadtoctes = FadtoctePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFadtocteCriteria = $criteria;
		return $this->collFadtoctes;
	}

	
	public function countFadtoctes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFadtoctePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FadtoctePeer::FATIPCTE_ID, $this->getId());

		return FadtoctePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFadtocte(Fadtocte $l)
	{
		$this->collFadtoctes[] = $l;
		$l->setFatipcte($this);
	}

	
	public function initFaclientes()
	{
		if ($this->collFaclientes === null) {
			$this->collFaclientes = array();
		}
	}

	
	public function getFaclientes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFaclientePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaclientes === null) {
			if ($this->isNew()) {
			   $this->collFaclientes = array();
			} else {

				$criteria->add(FaclientePeer::FATIPCTE_ID, $this->getId());

				FaclientePeer::addSelectColumns($criteria);
				$this->collFaclientes = FaclientePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaclientePeer::FATIPCTE_ID, $this->getId());

				FaclientePeer::addSelectColumns($criteria);
				if (!isset($this->lastFaclienteCriteria) || !$this->lastFaclienteCriteria->equals($criteria)) {
					$this->collFaclientes = FaclientePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaclienteCriteria = $criteria;
		return $this->collFaclientes;
	}

	
	public function countFaclientes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFaclientePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaclientePeer::FATIPCTE_ID, $this->getId());

		return FaclientePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFacliente(Facliente $l)
	{
		$this->collFaclientes[] = $l;
		$l->setFatipcte($this);
	}

} 