<?php


abstract class BaseCctipdes extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomtipdes;


	
	protected $destipdes;

	
	protected $collCcsoldess;

	
	protected $lastCcsoldesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomtipdes()
  {

    return trim($this->nomtipdes);

  }
  
  public function getDestipdes()
  {

    return trim($this->destipdes);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CctipdesPeer::ID;
      }
  
	} 
	
	public function setNomtipdes($v)
	{

    if ($this->nomtipdes !== $v) {
        $this->nomtipdes = $v;
        $this->modifiedColumns[] = CctipdesPeer::NOMTIPDES;
      }
  
	} 
	
	public function setDestipdes($v)
	{

    if ($this->destipdes !== $v) {
        $this->destipdes = $v;
        $this->modifiedColumns[] = CctipdesPeer::DESTIPDES;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomtipdes = $rs->getString($startcol + 1);

      $this->destipdes = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cctipdes object", $e);
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
			$con = Propel::getConnection(CctipdesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CctipdesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CctipdesPeer::DATABASE_NAME);
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
					$pk = CctipdesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CctipdesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcsoldess !== null) {
				foreach($this->collCcsoldess as $referrerFK) {
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


			if (($retval = CctipdesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcsoldess !== null) {
					foreach($this->collCcsoldess as $referrerFK) {
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
		$pos = CctipdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomtipdes();
				break;
			case 2:
				return $this->getDestipdes();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipdesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomtipdes(),
			$keys[2] => $this->getDestipdes(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipdesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomtipdes($value);
				break;
			case 2:
				$this->setDestipdes($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipdesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipdes($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDestipdes($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CctipdesPeer::DATABASE_NAME);

		if ($this->isColumnModified(CctipdesPeer::ID)) $criteria->add(CctipdesPeer::ID, $this->id);
		if ($this->isColumnModified(CctipdesPeer::NOMTIPDES)) $criteria->add(CctipdesPeer::NOMTIPDES, $this->nomtipdes);
		if ($this->isColumnModified(CctipdesPeer::DESTIPDES)) $criteria->add(CctipdesPeer::DESTIPDES, $this->destipdes);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CctipdesPeer::DATABASE_NAME);

		$criteria->add(CctipdesPeer::ID, $this->id);

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

		$copyObj->setNomtipdes($this->nomtipdes);

		$copyObj->setDestipdes($this->destipdes);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcsoldess() as $relObj) {
				$copyObj->addCcsoldes($relObj->copy($deepCopy));
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
			self::$peer = new CctipdesPeer();
		}
		return self::$peer;
	}

	
	public function initCcsoldess()
	{
		if ($this->collCcsoldess === null) {
			$this->collCcsoldess = array();
		}
	}

	
	public function getCcsoldess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldess === null) {
			if ($this->isNew()) {
			   $this->collCcsoldess = array();
			} else {

				$criteria->add(CcsoldesPeer::CCTIPDES_ID, $this->getId());

				CcsoldesPeer::addSelectColumns($criteria);
				$this->collCcsoldess = CcsoldesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoldesPeer::CCTIPDES_ID, $this->getId());

				CcsoldesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoldesCriteria) || !$this->lastCcsoldesCriteria->equals($criteria)) {
					$this->collCcsoldess = CcsoldesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoldesCriteria = $criteria;
		return $this->collCcsoldess;
	}

	
	public function countCcsoldess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoldesPeer::CCTIPDES_ID, $this->getId());

		return CcsoldesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsoldes(Ccsoldes $l)
	{
		$this->collCcsoldess[] = $l;
		$l->setCctipdes($this);
	}


	
	public function getCcsoldessJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoldesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsoldess === null) {
			if ($this->isNew()) {
				$this->collCcsoldess = array();
			} else {

				$criteria->add(CcsoldesPeer::CCTIPDES_ID, $this->getId());

				$this->collCcsoldess = CcsoldesPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoldesPeer::CCTIPDES_ID, $this->getId());

			if (!isset($this->lastCcsoldesCriteria) || !$this->lastCcsoldesCriteria->equals($criteria)) {
				$this->collCcsoldess = CcsoldesPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcsoldesCriteria = $criteria;

		return $this->collCcsoldess;
	}

} 