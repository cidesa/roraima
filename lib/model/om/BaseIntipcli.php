<?php


abstract class BaseIntipcli extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipcli;


	
	protected $destipcli;


	
	protected $id;

	
	protected $collIndestipclis;

	
	protected $lastIndestipcliCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipcli()
  {

    return trim($this->codtipcli);

  }
  
  public function getDestipcli()
  {

    return trim($this->destipcli);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipcli($v)
	{

    if ($this->codtipcli !== $v) {
        $this->codtipcli = $v;
        $this->modifiedColumns[] = IntipcliPeer::CODTIPCLI;
      }
  
	} 
	
	public function setDestipcli($v)
	{

    if ($this->destipcli !== $v) {
        $this->destipcli = $v;
        $this->modifiedColumns[] = IntipcliPeer::DESTIPCLI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IntipcliPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipcli = $rs->getString($startcol + 0);

      $this->destipcli = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Intipcli object", $e);
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
			$con = Propel::getConnection(IntipcliPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IntipcliPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IntipcliPeer::DATABASE_NAME);
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
					$pk = IntipcliPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IntipcliPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collIndestipclis !== null) {
				foreach($this->collIndestipclis as $referrerFK) {
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


			if (($retval = IntipcliPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collIndestipclis !== null) {
					foreach($this->collIndestipclis as $referrerFK) {
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
		$pos = IntipcliPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipcli();
				break;
			case 1:
				return $this->getDestipcli();
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
		$keys = IntipcliPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipcli(),
			$keys[1] => $this->getDestipcli(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IntipcliPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipcli($value);
				break;
			case 1:
				$this->setDestipcli($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IntipcliPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipcli($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IntipcliPeer::DATABASE_NAME);

		if ($this->isColumnModified(IntipcliPeer::CODTIPCLI)) $criteria->add(IntipcliPeer::CODTIPCLI, $this->codtipcli);
		if ($this->isColumnModified(IntipcliPeer::DESTIPCLI)) $criteria->add(IntipcliPeer::DESTIPCLI, $this->destipcli);
		if ($this->isColumnModified(IntipcliPeer::ID)) $criteria->add(IntipcliPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IntipcliPeer::DATABASE_NAME);

		$criteria->add(IntipcliPeer::ID, $this->id);

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

		$copyObj->setCodtipcli($this->codtipcli);

		$copyObj->setDestipcli($this->destipcli);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getIndestipclis() as $relObj) {
				$copyObj->addIndestipcli($relObj->copy($deepCopy));
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
			self::$peer = new IntipcliPeer();
		}
		return self::$peer;
	}

	
	public function initIndestipclis()
	{
		if ($this->collIndestipclis === null) {
			$this->collIndestipclis = array();
		}
	}

	
	public function getIndestipclis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndestipcliPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndestipclis === null) {
			if ($this->isNew()) {
			   $this->collIndestipclis = array();
			} else {

				$criteria->add(IndestipcliPeer::INTIPCLI_ID, $this->getId());

				IndestipcliPeer::addSelectColumns($criteria);
				$this->collIndestipclis = IndestipcliPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IndestipcliPeer::INTIPCLI_ID, $this->getId());

				IndestipcliPeer::addSelectColumns($criteria);
				if (!isset($this->lastIndestipcliCriteria) || !$this->lastIndestipcliCriteria->equals($criteria)) {
					$this->collIndestipclis = IndestipcliPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIndestipcliCriteria = $criteria;
		return $this->collIndestipclis;
	}

	
	public function countIndestipclis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIndestipcliPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IndestipcliPeer::INTIPCLI_ID, $this->getId());

		return IndestipcliPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIndestipcli(Indestipcli $l)
	{
		$this->collIndestipclis[] = $l;
		$l->setIntipcli($this);
	}


	
	public function getIndestipclisJoinIndefdes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndestipcliPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndestipclis === null) {
			if ($this->isNew()) {
				$this->collIndestipclis = array();
			} else {

				$criteria->add(IndestipcliPeer::INTIPCLI_ID, $this->getId());

				$this->collIndestipclis = IndestipcliPeer::doSelectJoinIndefdes($criteria, $con);
			}
		} else {
									
			$criteria->add(IndestipcliPeer::INTIPCLI_ID, $this->getId());

			if (!isset($this->lastIndestipcliCriteria) || !$this->lastIndestipcliCriteria->equals($criteria)) {
				$this->collIndestipclis = IndestipcliPeer::doSelectJoinIndefdes($criteria, $con);
			}
		}
		$this->lastIndestipcliCriteria = $criteria;

		return $this->collIndestipclis;
	}

} 