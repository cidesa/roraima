<?php


abstract class BaseNpincapa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codinc;


	
	protected $desinc;


	
	protected $obsinc;


	
	protected $id;

	
	protected $collNphojintincs;

	
	protected $lastNphojintincCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodinc()
  {

    return trim($this->codinc);

  }
  
  public function getDesinc()
  {

    return trim($this->desinc);

  }
  
  public function getObsinc()
  {

    return trim($this->obsinc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodinc($v)
	{

    if ($this->codinc !== $v) {
        $this->codinc = $v;
        $this->modifiedColumns[] = NpincapaPeer::CODINC;
      }
  
	} 
	
	public function setDesinc($v)
	{

    if ($this->desinc !== $v) {
        $this->desinc = $v;
        $this->modifiedColumns[] = NpincapaPeer::DESINC;
      }
  
	} 
	
	public function setObsinc($v)
	{

    if ($this->obsinc !== $v) {
        $this->obsinc = $v;
        $this->modifiedColumns[] = NpincapaPeer::OBSINC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpincapaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codinc = $rs->getString($startcol + 0);

      $this->desinc = $rs->getString($startcol + 1);

      $this->obsinc = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npincapa object", $e);
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
			$con = Propel::getConnection(NpincapaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpincapaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpincapaPeer::DATABASE_NAME);
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
					$pk = NpincapaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpincapaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collNphojintincs !== null) {
				foreach($this->collNphojintincs as $referrerFK) {
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


			if (($retval = NpincapaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNphojintincs !== null) {
					foreach($this->collNphojintincs as $referrerFK) {
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
		$pos = NpincapaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodinc();
				break;
			case 1:
				return $this->getDesinc();
				break;
			case 2:
				return $this->getObsinc();
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
		$keys = NpincapaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodinc(),
			$keys[1] => $this->getDesinc(),
			$keys[2] => $this->getObsinc(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpincapaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodinc($value);
				break;
			case 1:
				$this->setDesinc($value);
				break;
			case 2:
				$this->setObsinc($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpincapaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodinc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesinc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setObsinc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpincapaPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpincapaPeer::CODINC)) $criteria->add(NpincapaPeer::CODINC, $this->codinc);
		if ($this->isColumnModified(NpincapaPeer::DESINC)) $criteria->add(NpincapaPeer::DESINC, $this->desinc);
		if ($this->isColumnModified(NpincapaPeer::OBSINC)) $criteria->add(NpincapaPeer::OBSINC, $this->obsinc);
		if ($this->isColumnModified(NpincapaPeer::ID)) $criteria->add(NpincapaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpincapaPeer::DATABASE_NAME);

		$criteria->add(NpincapaPeer::ID, $this->id);

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

		$copyObj->setCodinc($this->codinc);

		$copyObj->setDesinc($this->desinc);

		$copyObj->setObsinc($this->obsinc);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getNphojintincs() as $relObj) {
				$copyObj->addNphojintinc($relObj->copy($deepCopy));
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
			self::$peer = new NpincapaPeer();
		}
		return self::$peer;
	}

	
	public function initNphojintincs()
	{
		if ($this->collNphojintincs === null) {
			$this->collNphojintincs = array();
		}
	}

	
	public function getNphojintincs($criteria = null, $con = null)
	{
				include_once 'lib/model/nomina/om/BaseNphojintincPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNphojintincs === null) {
			if ($this->isNew()) {
			   $this->collNphojintincs = array();
			} else {

				$criteria->add(NphojintincPeer::CODINC, $this->getCodinc());

				NphojintincPeer::addSelectColumns($criteria);
				$this->collNphojintincs = NphojintincPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NphojintincPeer::CODINC, $this->getCodinc());

				NphojintincPeer::addSelectColumns($criteria);
				if (!isset($this->lastNphojintincCriteria) || !$this->lastNphojintincCriteria->equals($criteria)) {
					$this->collNphojintincs = NphojintincPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNphojintincCriteria = $criteria;
		return $this->collNphojintincs;
	}

	
	public function countNphojintincs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/nomina/om/BaseNphojintincPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NphojintincPeer::CODINC, $this->getCodinc());

		return NphojintincPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNphojintinc(Nphojintinc $l)
	{
		$this->collNphojintincs[] = $l;
		$l->setNpincapa($this);
	}


	
	public function getNphojintincsJoinNphojint($criteria = null, $con = null)
	{
				include_once 'lib/model/nomina/om/BaseNphojintincPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNphojintincs === null) {
			if ($this->isNew()) {
				$this->collNphojintincs = array();
			} else {

				$criteria->add(NphojintincPeer::CODINC, $this->getCodinc());

				$this->collNphojintincs = NphojintincPeer::doSelectJoinNphojint($criteria, $con);
			}
		} else {
									
			$criteria->add(NphojintincPeer::CODINC, $this->getCodinc());

			if (!isset($this->lastNphojintincCriteria) || !$this->lastNphojintincCriteria->equals($criteria)) {
				$this->collNphojintincs = NphojintincPeer::doSelectJoinNphojint($criteria, $con);
			}
		}
		$this->lastNphojintincCriteria = $criteria;

		return $this->collNphojintincs;
	}

} 