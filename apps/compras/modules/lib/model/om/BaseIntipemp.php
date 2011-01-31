<?php


abstract class BaseIntipemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipemp;


	
	protected $destipemp;


	
	protected $id;

	
	protected $collInempresas;

	
	protected $lastInempresaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipemp()
  {

    return trim($this->codtipemp);

  }
  
  public function getDestipemp()
  {

    return trim($this->destipemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipemp($v)
	{

    if ($this->codtipemp !== $v) {
        $this->codtipemp = $v;
        $this->modifiedColumns[] = IntipempPeer::CODTIPEMP;
      }
  
	} 
	
	public function setDestipemp($v)
	{

    if ($this->destipemp !== $v) {
        $this->destipemp = $v;
        $this->modifiedColumns[] = IntipempPeer::DESTIPEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IntipempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipemp = $rs->getString($startcol + 0);

      $this->destipemp = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Intipemp object", $e);
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
			$con = Propel::getConnection(IntipempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IntipempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IntipempPeer::DATABASE_NAME);
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
					$pk = IntipempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IntipempPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInempresas !== null) {
				foreach($this->collInempresas as $referrerFK) {
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


			if (($retval = IntipempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInempresas !== null) {
					foreach($this->collInempresas as $referrerFK) {
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
		$pos = IntipempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipemp();
				break;
			case 1:
				return $this->getDestipemp();
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
		$keys = IntipempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipemp(),
			$keys[1] => $this->getDestipemp(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IntipempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipemp($value);
				break;
			case 1:
				$this->setDestipemp($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IntipempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDestipemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IntipempPeer::DATABASE_NAME);

		if ($this->isColumnModified(IntipempPeer::CODTIPEMP)) $criteria->add(IntipempPeer::CODTIPEMP, $this->codtipemp);
		if ($this->isColumnModified(IntipempPeer::DESTIPEMP)) $criteria->add(IntipempPeer::DESTIPEMP, $this->destipemp);
		if ($this->isColumnModified(IntipempPeer::ID)) $criteria->add(IntipempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IntipempPeer::DATABASE_NAME);

		$criteria->add(IntipempPeer::ID, $this->id);

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

		$copyObj->setCodtipemp($this->codtipemp);

		$copyObj->setDestipemp($this->destipemp);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInempresas() as $relObj) {
				$copyObj->addInempresa($relObj->copy($deepCopy));
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
			self::$peer = new IntipempPeer();
		}
		return self::$peer;
	}

	
	public function initInempresas()
	{
		if ($this->collInempresas === null) {
			$this->collInempresas = array();
		}
	}

	
	public function getInempresas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
			   $this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

				InempresaPeer::addSelectColumns($criteria);
				$this->collInempresas = InempresaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

				InempresaPeer::addSelectColumns($criteria);
				if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
					$this->collInempresas = InempresaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInempresaCriteria = $criteria;
		return $this->collInempresas;
	}

	
	public function countInempresas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

		return InempresaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInempresa(Inempresa $l)
	{
		$this->collInempresas[] = $l;
		$l->setIntipemp($this);
	}


	
	public function getInempresasJoinInestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
				$this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInestado($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}


	
	public function getInempresasJoinInmunicipio($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
				$this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}


	
	public function getInempresasJoinInparroquia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
				$this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInparroquia($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INTIPEMP_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInparroquia($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}

} 