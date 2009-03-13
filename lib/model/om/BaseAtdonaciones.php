<?php


abstract class BaseAtdonaciones extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coddon;


	
	protected $desdon;


	
	protected $unidon;


	
	protected $id;

	
	protected $collAtdetayus;

	
	protected $lastAtdetayuCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCoddon()
  {

    return trim($this->coddon);

  }
  
  public function getDesdon()
  {

    return trim($this->desdon);

  }
  
  public function getUnidon()
  {

    return trim($this->unidon);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCoddon($v)
	{

    if ($this->coddon !== $v) {
        $this->coddon = $v;
        $this->modifiedColumns[] = AtdonacionesPeer::CODDON;
      }
  
	} 
	
	public function setDesdon($v)
	{

    if ($this->desdon !== $v) {
        $this->desdon = $v;
        $this->modifiedColumns[] = AtdonacionesPeer::DESDON;
      }
  
	} 
	
	public function setUnidon($v)
	{

    if ($this->unidon !== $v) {
        $this->unidon = $v;
        $this->modifiedColumns[] = AtdonacionesPeer::UNIDON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtdonacionesPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->coddon = $rs->getString($startcol + 0);

      $this->desdon = $rs->getString($startcol + 1);

      $this->unidon = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atdonaciones object", $e);
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
			$con = Propel::getConnection(AtdonacionesPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtdonacionesPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtdonacionesPeer::DATABASE_NAME);
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
					$pk = AtdonacionesPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtdonacionesPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtdetayus !== null) {
				foreach($this->collAtdetayus as $referrerFK) {
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


			if (($retval = AtdonacionesPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtdetayus !== null) {
					foreach($this->collAtdetayus as $referrerFK) {
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
		$pos = AtdonacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoddon();
				break;
			case 1:
				return $this->getDesdon();
				break;
			case 2:
				return $this->getUnidon();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdonacionesPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoddon(),
			$keys[1] => $this->getDesdon(),
			$keys[2] => $this->getUnidon(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtdonacionesPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoddon($value);
				break;
			case 1:
				$this->setDesdon($value);
				break;
			case 2:
				$this->setUnidon($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtdonacionesPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoddon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesdon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnidon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtdonacionesPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtdonacionesPeer::CODDON)) $criteria->add(AtdonacionesPeer::CODDON, $this->coddon);
		if ($this->isColumnModified(AtdonacionesPeer::DESDON)) $criteria->add(AtdonacionesPeer::DESDON, $this->desdon);
		if ($this->isColumnModified(AtdonacionesPeer::UNIDON)) $criteria->add(AtdonacionesPeer::UNIDON, $this->unidon);
		if ($this->isColumnModified(AtdonacionesPeer::ID)) $criteria->add(AtdonacionesPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtdonacionesPeer::DATABASE_NAME);

		$criteria->add(AtdonacionesPeer::ID, $this->id);

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

		$copyObj->setCoddon($this->coddon);

		$copyObj->setDesdon($this->desdon);

		$copyObj->setUnidon($this->unidon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtdetayus() as $relObj) {
				$copyObj->addAtdetayu($relObj->copy($deepCopy));
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
			self::$peer = new AtdonacionesPeer();
		}
		return self::$peer;
	}

	
	public function initAtdetayus()
	{
		if ($this->collAtdetayus === null) {
			$this->collAtdetayus = array();
		}
	}

	
	public function getAtdetayus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetayus === null) {
			if ($this->isNew()) {
			   $this->collAtdetayus = array();
			} else {

				$criteria->add(AtdetayuPeer::ATDONACIONES_ID, $this->getId());

				AtdetayuPeer::addSelectColumns($criteria);
				$this->collAtdetayus = AtdetayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetayuPeer::ATDONACIONES_ID, $this->getId());

				AtdetayuPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetayuCriteria) || !$this->lastAtdetayuCriteria->equals($criteria)) {
					$this->collAtdetayus = AtdetayuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetayuCriteria = $criteria;
		return $this->collAtdetayus;
	}

	
	public function countAtdetayus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetayuPeer::ATDONACIONES_ID, $this->getId());

		return AtdetayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetayu(Atdetayu $l)
	{
		$this->collAtdetayus[] = $l;
		$l->setAtdonaciones($this);
	}


	
	public function getAtdetayusJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetayus === null) {
			if ($this->isNew()) {
				$this->collAtdetayus = array();
			} else {

				$criteria->add(AtdetayuPeer::ATDONACIONES_ID, $this->getId());

				$this->collAtdetayus = AtdetayuPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetayuPeer::ATDONACIONES_ID, $this->getId());

			if (!isset($this->lastAtdetayuCriteria) || !$this->lastAtdetayuCriteria->equals($criteria)) {
				$this->collAtdetayus = AtdetayuPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtdetayuCriteria = $criteria;

		return $this->collAtdetayus;
	}

} 