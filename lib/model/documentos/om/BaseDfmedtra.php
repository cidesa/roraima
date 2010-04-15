<?php


abstract class BaseDfmedtra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $destra;


	
	protected $id;

	
	protected $collDfatendocdets;

	
	protected $lastDfatendocdetCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDestra()
  {

    return trim($this->destra);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDestra($v)
	{

    if ($this->destra !== $v) {
        $this->destra = $v;
        $this->modifiedColumns[] = DfmedtraPeer::DESTRA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DfmedtraPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->destra = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dfmedtra object", $e);
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
			$con = Propel::getConnection(DfmedtraPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfmedtraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfmedtraPeer::DATABASE_NAME);
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
					$pk = DfmedtraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DfmedtraPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocdets !== null) {
				foreach($this->collDfatendocdets as $referrerFK) {
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


			if (($retval = DfmedtraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocdets !== null) {
					foreach($this->collDfatendocdets as $referrerFK) {
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
		$pos = DfmedtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDestra();
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
		$keys = DfmedtraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDestra(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfmedtraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDestra($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfmedtraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDestra($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfmedtraPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfmedtraPeer::DESTRA)) $criteria->add(DfmedtraPeer::DESTRA, $this->destra);
		if ($this->isColumnModified(DfmedtraPeer::ID)) $criteria->add(DfmedtraPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfmedtraPeer::DATABASE_NAME);

		$criteria->add(DfmedtraPeer::ID, $this->id);

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

		$copyObj->setDestra($this->destra);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocdets() as $relObj) {
				$copyObj->addDfatendocdet($relObj->copy($deepCopy));
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
			self::$peer = new DfmedtraPeer();
		}
		return self::$peer;
	}

	
	public function initDfatendocdets()
	{
		if ($this->collDfatendocdets === null) {
			$this->collDfatendocdets = array();
		}
	}

	
	public function getDfatendocdets($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
			   $this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_DFMEDTRA, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocdetPeer::ID_DFMEDTRA, $this->getId());

				DfatendocdetPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
					$this->collDfatendocdets = DfatendocdetPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;
		return $this->collDfatendocdets;
	}

	
	public function countDfatendocdets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocdetPeer::ID_DFMEDTRA, $this->getId());

		return DfatendocdetPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocdet(Dfatendocdet $l)
	{
		$this->collDfatendocdets[] = $l;
		$l->setDfmedtra($this);
	}


	
	public function getDfatendocdetsJoinDfatendoc($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocdetPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocdets === null) {
			if ($this->isNew()) {
				$this->collDfatendocdets = array();
			} else {

				$criteria->add(DfatendocdetPeer::ID_DFMEDTRA, $this->getId());

				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		} else {
									
			$criteria->add(DfatendocdetPeer::ID_DFMEDTRA, $this->getId());

			if (!isset($this->lastDfatendocdetCriteria) || !$this->lastDfatendocdetCriteria->equals($criteria)) {
				$this->collDfatendocdets = DfatendocdetPeer::doSelectJoinDfatendoc($criteria, $con);
			}
		}
		$this->lastDfatendocdetCriteria = $criteria;

		return $this->collDfatendocdets;
	}

} 