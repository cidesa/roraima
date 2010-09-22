<?php


abstract class BaseTsuniadm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduniadm;


	
	protected $desuniadm;


	
	protected $id;

	
	protected $collTsdeffonants;

	
	protected $lastTsdeffonantCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoduniadm()
  {

    return trim($this->coduniadm);

  }
  
  public function getDesuniadm()
  {

    return trim($this->desuniadm);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoduniadm($v)
	{

    if ($this->coduniadm !== $v) {
        $this->coduniadm = $v;
        $this->modifiedColumns[] = TsuniadmPeer::CODUNIADM;
      }
  
	} 
	
	public function setDesuniadm($v)
	{

    if ($this->desuniadm !== $v) {
        $this->desuniadm = $v;
        $this->modifiedColumns[] = TsuniadmPeer::DESUNIADM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsuniadmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coduniadm = $rs->getString($startcol + 0);

      $this->desuniadm = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsuniadm object", $e);
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
			$con = Propel::getConnection(TsuniadmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsuniadmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsuniadmPeer::DATABASE_NAME);
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
					$pk = TsuniadmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsuniadmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTsdeffonants !== null) {
				foreach($this->collTsdeffonants as $referrerFK) {
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


			if (($retval = TsuniadmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTsdeffonants !== null) {
					foreach($this->collTsdeffonants as $referrerFK) {
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
		$pos = TsuniadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduniadm();
				break;
			case 1:
				return $this->getDesuniadm();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsuniadmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduniadm(),
			$keys[1] => $this->getDesuniadm(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsuniadmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduniadm($value);
				break;
			case 1:
				$this->setDesuniadm($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsuniadmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduniadm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesuniadm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsuniadmPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsuniadmPeer::CODUNIADM)) $criteria->add(TsuniadmPeer::CODUNIADM, $this->coduniadm);
		if ($this->isColumnModified(TsuniadmPeer::DESUNIADM)) $criteria->add(TsuniadmPeer::DESUNIADM, $this->desuniadm);
		if ($this->isColumnModified(TsuniadmPeer::ID)) $criteria->add(TsuniadmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsuniadmPeer::DATABASE_NAME);

		$criteria->add(TsuniadmPeer::ID, $this->id);

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

		$copyObj->setCoduniadm($this->coduniadm);

		$copyObj->setDesuniadm($this->desuniadm);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTsdeffonants() as $relObj) {
				$copyObj->addTsdeffonant($relObj->copy($deepCopy));
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
			self::$peer = new TsuniadmPeer();
		}
		return self::$peer;
	}

	
	public function initTsdeffonants()
	{
		if ($this->collTsdeffonants === null) {
			$this->collTsdeffonants = array();
		}
	}

	
	public function getTsdeffonants($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdeffonants === null) {
			if ($this->isNew()) {
			   $this->collTsdeffonants = array();
			} else {

				$criteria->add(TsdeffonantPeer::CODUNIADM, $this->getCoduniadm());

				TsdeffonantPeer::addSelectColumns($criteria);
				$this->collTsdeffonants = TsdeffonantPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsdeffonantPeer::CODUNIADM, $this->getCoduniadm());

				TsdeffonantPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsdeffonantCriteria) || !$this->lastTsdeffonantCriteria->equals($criteria)) {
					$this->collTsdeffonants = TsdeffonantPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsdeffonantCriteria = $criteria;
		return $this->collTsdeffonants;
	}

	
	public function countTsdeffonants($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsdeffonantPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsdeffonantPeer::CODUNIADM, $this->getCoduniadm());

		return TsdeffonantPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsdeffonant(Tsdeffonant $l)
	{
		$this->collTsdeffonants[] = $l;
		$l->setTsuniadm($this);
	}

} 