<?php


abstract class BaseCcregion extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomreg;


	
	protected $desreg;

	
	protected $collCcciudads;

	
	protected $lastCcciudadCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomreg()
  {

    return trim($this->nomreg);

  }
  
  public function getDesreg()
  {

    return trim($this->desreg);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcregionPeer::ID;
      }
  
	} 
	
	public function setNomreg($v)
	{

    if ($this->nomreg !== $v) {
        $this->nomreg = $v;
        $this->modifiedColumns[] = CcregionPeer::NOMREG;
      }
  
	} 
	
	public function setDesreg($v)
	{

    if ($this->desreg !== $v) {
        $this->desreg = $v;
        $this->modifiedColumns[] = CcregionPeer::DESREG;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomreg = $rs->getString($startcol + 1);

      $this->desreg = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccregion object", $e);
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
			$con = Propel::getConnection(CcregionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcregionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcregionPeer::DATABASE_NAME);
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
					$pk = CcregionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcregionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcciudads !== null) {
				foreach($this->collCcciudads as $referrerFK) {
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


			if (($retval = CcregionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcciudads !== null) {
					foreach($this->collCcciudads as $referrerFK) {
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
		$pos = CcregionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomreg();
				break;
			case 2:
				return $this->getDesreg();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcregionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomreg(),
			$keys[2] => $this->getDesreg(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcregionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomreg($value);
				break;
			case 2:
				$this->setDesreg($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcregionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomreg($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesreg($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcregionPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcregionPeer::ID)) $criteria->add(CcregionPeer::ID, $this->id);
		if ($this->isColumnModified(CcregionPeer::NOMREG)) $criteria->add(CcregionPeer::NOMREG, $this->nomreg);
		if ($this->isColumnModified(CcregionPeer::DESREG)) $criteria->add(CcregionPeer::DESREG, $this->desreg);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcregionPeer::DATABASE_NAME);

		$criteria->add(CcregionPeer::ID, $this->id);

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

		$copyObj->setNomreg($this->nomreg);

		$copyObj->setDesreg($this->desreg);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcciudads() as $relObj) {
				$copyObj->addCcciudad($relObj->copy($deepCopy));
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
			self::$peer = new CcregionPeer();
		}
		return self::$peer;
	}

	
	public function initCcciudads()
	{
		if ($this->collCcciudads === null) {
			$this->collCcciudads = array();
		}
	}

	
	public function getCcciudads($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcciudads === null) {
			if ($this->isNew()) {
			   $this->collCcciudads = array();
			} else {

				$criteria->add(CcciudadPeer::CCREGION_ID, $this->getId());

				CcciudadPeer::addSelectColumns($criteria);
				$this->collCcciudads = CcciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcciudadPeer::CCREGION_ID, $this->getId());

				CcciudadPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcciudadCriteria) || !$this->lastCcciudadCriteria->equals($criteria)) {
					$this->collCcciudads = CcciudadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcciudadCriteria = $criteria;
		return $this->collCcciudads;
	}

	
	public function countCcciudads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcciudadPeer::CCREGION_ID, $this->getId());

		return CcciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcciudad(Ccciudad $l)
	{
		$this->collCcciudads[] = $l;
		$l->setCcregion($this);
	}


	
	public function getCcciudadsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcciudads === null) {
			if ($this->isNew()) {
				$this->collCcciudads = array();
			} else {

				$criteria->add(CcciudadPeer::CCREGION_ID, $this->getId());

				$this->collCcciudads = CcciudadPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcciudadPeer::CCREGION_ID, $this->getId());

			if (!isset($this->lastCcciudadCriteria) || !$this->lastCcciudadCriteria->equals($criteria)) {
				$this->collCcciudads = CcciudadPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcciudadCriteria = $criteria;

		return $this->collCcciudads;
	}

} 