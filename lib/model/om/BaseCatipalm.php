<?php


abstract class BaseCatipalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nomtip;


	
	protected $id;

	
	protected $collCadefalms;

	
	protected $lastCadefalmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNomtip()
  {

    return trim($this->nomtip);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNomtip($v)
	{

    if ($this->nomtip !== $v) {
        $this->nomtip = $v;
        $this->modifiedColumns[] = CatipalmPeer::NOMTIP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatipalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nomtip = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catipalm object", $e);
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
			$con = Propel::getConnection(CatipalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatipalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatipalmPeer::DATABASE_NAME);
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
					$pk = CatipalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatipalmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCadefalms !== null) {
				foreach($this->collCadefalms as $referrerFK) {
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


			if (($retval = CatipalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCadefalms !== null) {
					foreach($this->collCadefalms as $referrerFK) {
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
		$pos = CatipalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNomtip();
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
		$keys = CatipalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNomtip(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatipalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNomtip($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatipalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNomtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatipalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatipalmPeer::NOMTIP)) $criteria->add(CatipalmPeer::NOMTIP, $this->nomtip);
		if ($this->isColumnModified(CatipalmPeer::ID)) $criteria->add(CatipalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatipalmPeer::DATABASE_NAME);

		$criteria->add(CatipalmPeer::ID, $this->id);

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

		$copyObj->setNomtip($this->nomtip);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCadefalms() as $relObj) {
				$copyObj->addCadefalm($relObj->copy($deepCopy));
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
			self::$peer = new CatipalmPeer();
		}
		return self::$peer;
	}

	
	public function initCadefalms()
	{
		if ($this->collCadefalms === null) {
			$this->collCadefalms = array();
		}
	}

	
	public function getCadefalms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCadefalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCadefalms === null) {
			if ($this->isNew()) {
			   $this->collCadefalms = array();
			} else {

				$criteria->add(CadefalmPeer::CATIPALM_ID, $this->getId());

				CadefalmPeer::addSelectColumns($criteria);
				$this->collCadefalms = CadefalmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CadefalmPeer::CATIPALM_ID, $this->getId());

				CadefalmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCadefalmCriteria) || !$this->lastCadefalmCriteria->equals($criteria)) {
					$this->collCadefalms = CadefalmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCadefalmCriteria = $criteria;
		return $this->collCadefalms;
	}

	
	public function countCadefalms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCadefalmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CadefalmPeer::CATIPALM_ID, $this->getId());

		return CadefalmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCadefalm(Cadefalm $l)
	{
		$this->collCadefalms[] = $l;
		$l->setCatipalm($this);
	}

} 