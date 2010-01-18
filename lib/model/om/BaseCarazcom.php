<?php


abstract class BaseCarazcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrazcom;


	
	protected $desrazcom;


	
	protected $id;

	
	protected $collCasolrazs;

	
	protected $lastCasolrazCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodrazcom()
  {

    return trim($this->codrazcom);

  }
  
  public function getDesrazcom()
  {

    return trim($this->desrazcom);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodrazcom($v)
	{

    if ($this->codrazcom !== $v) {
        $this->codrazcom = $v;
        $this->modifiedColumns[] = CarazcomPeer::CODRAZCOM;
      }
  
	} 
	
	public function setDesrazcom($v)
	{

    if ($this->desrazcom !== $v) {
        $this->desrazcom = $v;
        $this->modifiedColumns[] = CarazcomPeer::DESRAZCOM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CarazcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codrazcom = $rs->getString($startcol + 0);

      $this->desrazcom = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Carazcom object", $e);
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
			$con = Propel::getConnection(CarazcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CarazcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CarazcomPeer::DATABASE_NAME);
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
					$pk = CarazcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CarazcomPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCasolrazs !== null) {
				foreach($this->collCasolrazs as $referrerFK) {
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


			if (($retval = CarazcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCasolrazs !== null) {
					foreach($this->collCasolrazs as $referrerFK) {
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
		$pos = CarazcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrazcom();
				break;
			case 1:
				return $this->getDesrazcom();
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
		$keys = CarazcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrazcom(),
			$keys[1] => $this->getDesrazcom(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarazcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrazcom($value);
				break;
			case 1:
				$this->setDesrazcom($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarazcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrazcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesrazcom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarazcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarazcomPeer::CODRAZCOM)) $criteria->add(CarazcomPeer::CODRAZCOM, $this->codrazcom);
		if ($this->isColumnModified(CarazcomPeer::DESRAZCOM)) $criteria->add(CarazcomPeer::DESRAZCOM, $this->desrazcom);
		if ($this->isColumnModified(CarazcomPeer::ID)) $criteria->add(CarazcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarazcomPeer::DATABASE_NAME);

		$criteria->add(CarazcomPeer::ID, $this->id);

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

		$copyObj->setCodrazcom($this->codrazcom);

		$copyObj->setDesrazcom($this->desrazcom);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCasolrazs() as $relObj) {
				$copyObj->addCasolraz($relObj->copy($deepCopy));
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
			self::$peer = new CarazcomPeer();
		}
		return self::$peer;
	}

	
	public function initCasolrazs()
	{
		if ($this->collCasolrazs === null) {
			$this->collCasolrazs = array();
		}
	}

	
	public function getCasolrazs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCasolrazPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCasolrazs === null) {
			if ($this->isNew()) {
			   $this->collCasolrazs = array();
			} else {

				$criteria->add(CasolrazPeer::CODRAZCOM, $this->getCodrazcom());

				CasolrazPeer::addSelectColumns($criteria);
				$this->collCasolrazs = CasolrazPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CasolrazPeer::CODRAZCOM, $this->getCodrazcom());

				CasolrazPeer::addSelectColumns($criteria);
				if (!isset($this->lastCasolrazCriteria) || !$this->lastCasolrazCriteria->equals($criteria)) {
					$this->collCasolrazs = CasolrazPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCasolrazCriteria = $criteria;
		return $this->collCasolrazs;
	}

	
	public function countCasolrazs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCasolrazPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CasolrazPeer::CODRAZCOM, $this->getCodrazcom());

		return CasolrazPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCasolraz(Casolraz $l)
	{
		$this->collCasolrazs[] = $l;
		$l->setCarazcom($this);
	}

} 