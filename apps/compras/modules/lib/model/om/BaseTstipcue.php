<?php


abstract class BaseTstipcue extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtip;


	
	protected $destip;


	
	protected $id;

	
	protected $collTsdefbans;

	
	protected $lastTsdefbanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtip()
  {

    return trim($this->codtip);

  }
  
  public function getDestip()
  {

    return trim($this->destip);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtip($v)
	{

    if ($this->codtip !== $v) {
        $this->codtip = $v;
        $this->modifiedColumns[] = TstipcuePeer::CODTIP;
      }
  
	} 
	
	public function setDestip($v)
	{

    if ($this->destip !== $v) {
        $this->destip = $v;
        $this->modifiedColumns[] = TstipcuePeer::DESTIP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TstipcuePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtip = $rs->getString($startcol + 0);

      $this->destip = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tstipcue object", $e);
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
			$con = Propel::getConnection(TstipcuePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TstipcuePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TstipcuePeer::DATABASE_NAME);
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
					$pk = TstipcuePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TstipcuePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collTsdefbans !== null) {
				foreach($this->collTsdefbans as $referrerFK) {
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


			if (($retval = TstipcuePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collTsdefbans !== null) {
					foreach($this->collTsdefbans as $referrerFK) {
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
		$pos = TstipcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtip();
				break;
			case 1:
				return $this->getDestip();
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
		$keys = TstipcuePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtip(),
			$keys[1] => $this->getDestip(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TstipcuePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtip($value);
				break;
			case 1:
				$this->setDestip($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TstipcuePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestip($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TstipcuePeer::DATABASE_NAME);

		if ($this->isColumnModified(TstipcuePeer::CODTIP)) $criteria->add(TstipcuePeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(TstipcuePeer::DESTIP)) $criteria->add(TstipcuePeer::DESTIP, $this->destip);
		if ($this->isColumnModified(TstipcuePeer::ID)) $criteria->add(TstipcuePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TstipcuePeer::DATABASE_NAME);

		$criteria->add(TstipcuePeer::ID, $this->id);

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

		$copyObj->setCodtip($this->codtip);

		$copyObj->setDestip($this->destip);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getTsdefbans() as $relObj) {
				$copyObj->addTsdefban($relObj->copy($deepCopy));
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
			self::$peer = new TstipcuePeer();
		}
		return self::$peer;
	}

	
	public function initTsdefbans()
	{
		if ($this->collTsdefbans === null) {
			$this->collTsdefbans = array();
		}
	}

	
	public function getTsdefbans($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdefbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdefbans === null) {
			if ($this->isNew()) {
			   $this->collTsdefbans = array();
			} else {

				$criteria->add(TsdefbanPeer::TIPCUE, $this->getCodtip());

				TsdefbanPeer::addSelectColumns($criteria);
				$this->collTsdefbans = TsdefbanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TsdefbanPeer::TIPCUE, $this->getCodtip());

				TsdefbanPeer::addSelectColumns($criteria);
				if (!isset($this->lastTsdefbanCriteria) || !$this->lastTsdefbanCriteria->equals($criteria)) {
					$this->collTsdefbans = TsdefbanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTsdefbanCriteria = $criteria;
		return $this->collTsdefbans;
	}

	
	public function countTsdefbans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTsdefbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TsdefbanPeer::TIPCUE, $this->getCodtip());

		return TsdefbanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTsdefban(Tsdefban $l)
	{
		$this->collTsdefbans[] = $l;
		$l->setTstipcue($this);
	}


	
	public function getTsdefbansJoinTstipren($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTsdefbanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTsdefbans === null) {
			if ($this->isNew()) {
				$this->collTsdefbans = array();
			} else {

				$criteria->add(TsdefbanPeer::TIPCUE, $this->getCodtip());

				$this->collTsdefbans = TsdefbanPeer::doSelectJoinTstipren($criteria, $con);
			}
		} else {
									
			$criteria->add(TsdefbanPeer::TIPCUE, $this->getCodtip());

			if (!isset($this->lastTsdefbanCriteria) || !$this->lastTsdefbanCriteria->equals($criteria)) {
				$this->collTsdefbans = TsdefbanPeer::doSelectJoinTstipren($criteria, $con);
			}
		}
		$this->lastTsdefbanCriteria = $criteria;

		return $this->collTsdefbans;
	}

} 