<?php


abstract class BaseIngruprec extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgrup;


	
	protected $desgrup;


	
	protected $id;

	
	protected $collInrecauds;

	
	protected $lastInrecaudCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgrup()
  {

    return trim($this->codgrup);

  }
  
  public function getDesgrup()
  {

    return trim($this->desgrup);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgrup($v)
	{

    if ($this->codgrup !== $v) {
        $this->codgrup = $v;
        $this->modifiedColumns[] = IngruprecPeer::CODGRUP;
      }
  
	} 
	
	public function setDesgrup($v)
	{

    if ($this->desgrup !== $v) {
        $this->desgrup = $v;
        $this->modifiedColumns[] = IngruprecPeer::DESGRUP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IngruprecPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgrup = $rs->getString($startcol + 0);

      $this->desgrup = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ingruprec object", $e);
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
			$con = Propel::getConnection(IngruprecPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IngruprecPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IngruprecPeer::DATABASE_NAME);
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
					$pk = IngruprecPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IngruprecPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInrecauds !== null) {
				foreach($this->collInrecauds as $referrerFK) {
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


			if (($retval = IngruprecPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInrecauds !== null) {
					foreach($this->collInrecauds as $referrerFK) {
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
		$pos = IngruprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgrup();
				break;
			case 1:
				return $this->getDesgrup();
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
		$keys = IngruprecPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgrup(),
			$keys[1] => $this->getDesgrup(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IngruprecPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgrup($value);
				break;
			case 1:
				$this->setDesgrup($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IngruprecPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgrup($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesgrup($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IngruprecPeer::DATABASE_NAME);

		if ($this->isColumnModified(IngruprecPeer::CODGRUP)) $criteria->add(IngruprecPeer::CODGRUP, $this->codgrup);
		if ($this->isColumnModified(IngruprecPeer::DESGRUP)) $criteria->add(IngruprecPeer::DESGRUP, $this->desgrup);
		if ($this->isColumnModified(IngruprecPeer::ID)) $criteria->add(IngruprecPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IngruprecPeer::DATABASE_NAME);

		$criteria->add(IngruprecPeer::ID, $this->id);

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

		$copyObj->setCodgrup($this->codgrup);

		$copyObj->setDesgrup($this->desgrup);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInrecauds() as $relObj) {
				$copyObj->addInrecaud($relObj->copy($deepCopy));
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
			self::$peer = new IngruprecPeer();
		}
		return self::$peer;
	}

	
	public function initInrecauds()
	{
		if ($this->collInrecauds === null) {
			$this->collInrecauds = array();
		}
	}

	
	public function getInrecauds($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInrecaudPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInrecauds === null) {
			if ($this->isNew()) {
			   $this->collInrecauds = array();
			} else {

				$criteria->add(InrecaudPeer::INGRUPREC_ID, $this->getId());

				InrecaudPeer::addSelectColumns($criteria);
				$this->collInrecauds = InrecaudPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InrecaudPeer::INGRUPREC_ID, $this->getId());

				InrecaudPeer::addSelectColumns($criteria);
				if (!isset($this->lastInrecaudCriteria) || !$this->lastInrecaudCriteria->equals($criteria)) {
					$this->collInrecauds = InrecaudPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInrecaudCriteria = $criteria;
		return $this->collInrecauds;
	}

	
	public function countInrecauds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInrecaudPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InrecaudPeer::INGRUPREC_ID, $this->getId());

		return InrecaudPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInrecaud(Inrecaud $l)
	{
		$this->collInrecauds[] = $l;
		$l->setIngruprec($this);
	}

} 