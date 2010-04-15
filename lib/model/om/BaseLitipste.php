<?php


abstract class BaseLitipste extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desste;


	
	protected $id;

	
	protected $collLidatstes;

	
	protected $lastLidatsteCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesste()
  {

    return trim($this->desste);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesste($v)
	{

    if ($this->desste !== $v) {
        $this->desste = $v;
        $this->modifiedColumns[] = LitipstePeer::DESSTE;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LitipstePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desste = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Litipste object", $e);
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
			$con = Propel::getConnection(LitipstePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LitipstePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LitipstePeer::DATABASE_NAME);
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
					$pk = LitipstePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LitipstePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLidatstes !== null) {
				foreach($this->collLidatstes as $referrerFK) {
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


			if (($retval = LitipstePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLidatstes !== null) {
					foreach($this->collLidatstes as $referrerFK) {
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
		$pos = LitipstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesste();
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
		$keys = LitipstePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesste(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LitipstePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesste($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LitipstePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesste($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LitipstePeer::DATABASE_NAME);

		if ($this->isColumnModified(LitipstePeer::DESSTE)) $criteria->add(LitipstePeer::DESSTE, $this->desste);
		if ($this->isColumnModified(LitipstePeer::ID)) $criteria->add(LitipstePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LitipstePeer::DATABASE_NAME);

		$criteria->add(LitipstePeer::ID, $this->id);

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

		$copyObj->setDesste($this->desste);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLidatstes() as $relObj) {
				$copyObj->addLidatste($relObj->copy($deepCopy));
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
			self::$peer = new LitipstePeer();
		}
		return self::$peer;
	}

	
	public function initLidatstes()
	{
		if ($this->collLidatstes === null) {
			$this->collLidatstes = array();
		}
	}

	
	public function getLidatstes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLidatstePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLidatstes === null) {
			if ($this->isNew()) {
			   $this->collLidatstes = array();
			} else {

				$criteria->add(LidatstePeer::LITIPSTE_ID, $this->getId());

				LidatstePeer::addSelectColumns($criteria);
				$this->collLidatstes = LidatstePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LidatstePeer::LITIPSTE_ID, $this->getId());

				LidatstePeer::addSelectColumns($criteria);
				if (!isset($this->lastLidatsteCriteria) || !$this->lastLidatsteCriteria->equals($criteria)) {
					$this->collLidatstes = LidatstePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLidatsteCriteria = $criteria;
		return $this->collLidatstes;
	}

	
	public function countLidatstes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLidatstePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LidatstePeer::LITIPSTE_ID, $this->getId());

		return LidatstePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLidatste(Lidatste $l)
	{
		$this->collLidatstes[] = $l;
		$l->setLitipste($this);
	}

} 