<?php


abstract class BaseCcriezona extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomriezona;


	
	protected $desriezona;

	
	protected $collCcdatsoecos;

	
	protected $lastCcdatsoecoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomriezona()
  {

    return trim($this->nomriezona);

  }
  
  public function getDesriezona()
  {

    return trim($this->desriezona);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcriezonaPeer::ID;
      }
  
	} 
	
	public function setNomriezona($v)
	{

    if ($this->nomriezona !== $v) {
        $this->nomriezona = $v;
        $this->modifiedColumns[] = CcriezonaPeer::NOMRIEZONA;
      }
  
	} 
	
	public function setDesriezona($v)
	{

    if ($this->desriezona !== $v) {
        $this->desriezona = $v;
        $this->modifiedColumns[] = CcriezonaPeer::DESRIEZONA;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomriezona = $rs->getString($startcol + 1);

      $this->desriezona = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccriezona object", $e);
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
			$con = Propel::getConnection(CcriezonaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcriezonaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcriezonaPeer::DATABASE_NAME);
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
					$pk = CcriezonaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcriezonaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdatsoecos !== null) {
				foreach($this->collCcdatsoecos as $referrerFK) {
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


			if (($retval = CcriezonaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdatsoecos !== null) {
					foreach($this->collCcdatsoecos as $referrerFK) {
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
		$pos = CcriezonaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomriezona();
				break;
			case 2:
				return $this->getDesriezona();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcriezonaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomriezona(),
			$keys[2] => $this->getDesriezona(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcriezonaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomriezona($value);
				break;
			case 2:
				$this->setDesriezona($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcriezonaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomriezona($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesriezona($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcriezonaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcriezonaPeer::ID)) $criteria->add(CcriezonaPeer::ID, $this->id);
		if ($this->isColumnModified(CcriezonaPeer::NOMRIEZONA)) $criteria->add(CcriezonaPeer::NOMRIEZONA, $this->nomriezona);
		if ($this->isColumnModified(CcriezonaPeer::DESRIEZONA)) $criteria->add(CcriezonaPeer::DESRIEZONA, $this->desriezona);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcriezonaPeer::DATABASE_NAME);

		$criteria->add(CcriezonaPeer::ID, $this->id);

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

		$copyObj->setNomriezona($this->nomriezona);

		$copyObj->setDesriezona($this->desriezona);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdatsoecos() as $relObj) {
				$copyObj->addCcdatsoeco($relObj->copy($deepCopy));
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
			self::$peer = new CcriezonaPeer();
		}
		return self::$peer;
	}

	
	public function initCcdatsoecos()
	{
		if ($this->collCcdatsoecos === null) {
			$this->collCcdatsoecos = array();
		}
	}

	
	public function getCcdatsoecos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
			   $this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

				CcdatsoecoPeer::addSelectColumns($criteria);
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

				CcdatsoecoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
					$this->collCcdatsoecos = CcdatsoecoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;
		return $this->collCcdatsoecos;
	}

	
	public function countCcdatsoecos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

		return CcdatsoecoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdatsoeco(Ccdatsoeco $l)
	{
		$this->collCcdatsoecos[] = $l;
		$l->setCcriezona($this);
	}


	
	public function getCcdatsoecosJoinCcorimatpri($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcestruc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcestruc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcestruc($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}

} 