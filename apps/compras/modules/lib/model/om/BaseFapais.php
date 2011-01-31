<?php


abstract class BaseFapais extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nompai;


	
	protected $id;

	
	protected $collFaestados;

	
	protected $lastFaestadoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNompai()
  {

    return trim($this->nompai);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNompai($v)
	{

    if ($this->nompai !== $v) {
        $this->nompai = $v;
        $this->modifiedColumns[] = FapaisPeer::NOMPAI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FapaisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nompai = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fapais object", $e);
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
			$con = Propel::getConnection(FapaisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FapaisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FapaisPeer::DATABASE_NAME);
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
					$pk = FapaisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FapaisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFaestados !== null) {
				foreach($this->collFaestados as $referrerFK) {
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


			if (($retval = FapaisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFaestados !== null) {
					foreach($this->collFaestados as $referrerFK) {
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
		$pos = FapaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNompai();
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
		$keys = FapaisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNompai(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FapaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNompai($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FapaisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNompai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FapaisPeer::DATABASE_NAME);

		if ($this->isColumnModified(FapaisPeer::NOMPAI)) $criteria->add(FapaisPeer::NOMPAI, $this->nompai);
		if ($this->isColumnModified(FapaisPeer::ID)) $criteria->add(FapaisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FapaisPeer::DATABASE_NAME);

		$criteria->add(FapaisPeer::ID, $this->id);

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

		$copyObj->setNompai($this->nompai);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFaestados() as $relObj) {
				$copyObj->addFaestado($relObj->copy($deepCopy));
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
			self::$peer = new FapaisPeer();
		}
		return self::$peer;
	}

	
	public function initFaestados()
	{
		if ($this->collFaestados === null) {
			$this->collFaestados = array();
		}
	}

	
	public function getFaestados($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFaestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaestados === null) {
			if ($this->isNew()) {
			   $this->collFaestados = array();
			} else {

				$criteria->add(FaestadoPeer::FAPAIS_ID, $this->getId());

				FaestadoPeer::addSelectColumns($criteria);
				$this->collFaestados = FaestadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaestadoPeer::FAPAIS_ID, $this->getId());

				FaestadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastFaestadoCriteria) || !$this->lastFaestadoCriteria->equals($criteria)) {
					$this->collFaestados = FaestadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaestadoCriteria = $criteria;
		return $this->collFaestados;
	}

	
	public function countFaestados($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFaestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaestadoPeer::FAPAIS_ID, $this->getId());

		return FaestadoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaestado(Faestado $l)
	{
		$this->collFaestados[] = $l;
		$l->setFapais($this);
	}

} 