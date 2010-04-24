<?php


abstract class BaseFatippag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $destippag;


	
	protected $tipcan;


	
	protected $genmov;


	
	protected $gening;


	
	protected $id;

	
	protected $collCobdetfors;

	
	protected $lastCobdetforCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDestippag()
  {

    return trim($this->destippag);

  }
  
  public function getTipcan()
  {

    return trim($this->tipcan);

  }
  
  public function getGenmov()
  {

    return trim($this->genmov);

  }
  
  public function getGening()
  {

    return trim($this->gening);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDestippag($v)
	{

    if ($this->destippag !== $v) {
        $this->destippag = $v;
        $this->modifiedColumns[] = FatippagPeer::DESTIPPAG;
      }
  
	} 
	
	public function setTipcan($v)
	{

    if ($this->tipcan !== $v) {
        $this->tipcan = $v;
        $this->modifiedColumns[] = FatippagPeer::TIPCAN;
      }
  
	} 
	
	public function setGenmov($v)
	{

    if ($this->genmov !== $v) {
        $this->genmov = $v;
        $this->modifiedColumns[] = FatippagPeer::GENMOV;
      }
  
	} 
	
	public function setGening($v)
	{

    if ($this->gening !== $v) {
        $this->gening = $v;
        $this->modifiedColumns[] = FatippagPeer::GENING;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FatippagPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->destippag = $rs->getString($startcol + 0);

      $this->tipcan = $rs->getString($startcol + 1);

      $this->genmov = $rs->getString($startcol + 2);

      $this->gening = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fatippag object", $e);
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
			$con = Propel::getConnection(FatippagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FatippagPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FatippagPeer::DATABASE_NAME);
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
					$pk = FatippagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FatippagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCobdetfors !== null) {
				foreach($this->collCobdetfors as $referrerFK) {
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


			if (($retval = FatippagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCobdetfors !== null) {
					foreach($this->collCobdetfors as $referrerFK) {
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
		$pos = FatippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDestippag();
				break;
			case 1:
				return $this->getTipcan();
				break;
			case 2:
				return $this->getGenmov();
				break;
			case 3:
				return $this->getGening();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatippagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDestippag(),
			$keys[1] => $this->getTipcan(),
			$keys[2] => $this->getGenmov(),
			$keys[3] => $this->getGening(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FatippagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDestippag($value);
				break;
			case 1:
				$this->setTipcan($value);
				break;
			case 2:
				$this->setGenmov($value);
				break;
			case 3:
				$this->setGening($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FatippagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDestippag($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipcan($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setGenmov($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGening($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FatippagPeer::DATABASE_NAME);

		if ($this->isColumnModified(FatippagPeer::DESTIPPAG)) $criteria->add(FatippagPeer::DESTIPPAG, $this->destippag);
		if ($this->isColumnModified(FatippagPeer::TIPCAN)) $criteria->add(FatippagPeer::TIPCAN, $this->tipcan);
		if ($this->isColumnModified(FatippagPeer::GENMOV)) $criteria->add(FatippagPeer::GENMOV, $this->genmov);
		if ($this->isColumnModified(FatippagPeer::GENING)) $criteria->add(FatippagPeer::GENING, $this->gening);
		if ($this->isColumnModified(FatippagPeer::ID)) $criteria->add(FatippagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FatippagPeer::DATABASE_NAME);

		$criteria->add(FatippagPeer::ID, $this->id);

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

		$copyObj->setDestippag($this->destippag);

		$copyObj->setTipcan($this->tipcan);

		$copyObj->setGenmov($this->genmov);

		$copyObj->setGening($this->gening);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCobdetfors() as $relObj) {
				$copyObj->addCobdetfor($relObj->copy($deepCopy));
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
			self::$peer = new FatippagPeer();
		}
		return self::$peer;
	}

	
	public function initCobdetfors()
	{
		if ($this->collCobdetfors === null) {
			$this->collCobdetfors = array();
		}
	}

	
	public function getCobdetfors($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCobdetforPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCobdetfors === null) {
			if ($this->isNew()) {
			   $this->collCobdetfors = array();
			} else {

				$criteria->add(CobdetforPeer::FATIPPAG_ID, $this->getId());

				CobdetforPeer::addSelectColumns($criteria);
				$this->collCobdetfors = CobdetforPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CobdetforPeer::FATIPPAG_ID, $this->getId());

				CobdetforPeer::addSelectColumns($criteria);
				if (!isset($this->lastCobdetforCriteria) || !$this->lastCobdetforCriteria->equals($criteria)) {
					$this->collCobdetfors = CobdetforPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCobdetforCriteria = $criteria;
		return $this->collCobdetfors;
	}

	
	public function countCobdetfors($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCobdetforPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CobdetforPeer::FATIPPAG_ID, $this->getId());

		return CobdetforPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCobdetfor(Cobdetfor $l)
	{
		$this->collCobdetfors[] = $l;
		$l->setFatippag($this);
	}

} 