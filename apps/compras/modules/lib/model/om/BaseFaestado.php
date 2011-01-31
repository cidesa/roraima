<?php


abstract class BaseFaestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $fapais_id;


	
	protected $nomedo;


	
	protected $id;

	
	protected $aFapais;

	
	protected $collFaciudads;

	
	protected $lastFaciudadCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getFapaisId()
  {

    return $this->fapais_id;

  }
  
  public function getNomedo()
  {

    return trim($this->nomedo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setFapaisId($v)
	{

    if ($this->fapais_id !== $v) {
        $this->fapais_id = $v;
        $this->modifiedColumns[] = FaestadoPeer::FAPAIS_ID;
      }
  
		if ($this->aFapais !== null && $this->aFapais->getId() !== $v) {
			$this->aFapais = null;
		}

	} 
	
	public function setNomedo($v)
	{

    if ($this->nomedo !== $v) {
        $this->nomedo = $v;
        $this->modifiedColumns[] = FaestadoPeer::NOMEDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaestadoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->fapais_id = $rs->getInt($startcol + 0);

      $this->nomedo = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faestado object", $e);
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
			$con = Propel::getConnection(FaestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaestadoPeer::DATABASE_NAME);
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


												
			if ($this->aFapais !== null) {
				if ($this->aFapais->isModified()) {
					$affectedRows += $this->aFapais->save($con);
				}
				$this->setFapais($this->aFapais);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FaestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collFaciudads !== null) {
				foreach($this->collFaciudads as $referrerFK) {
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


												
			if ($this->aFapais !== null) {
				if (!$this->aFapais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFapais->getValidationFailures());
				}
			}


			if (($retval = FaestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collFaciudads !== null) {
					foreach($this->collFaciudads as $referrerFK) {
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
		$pos = FaestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFapaisId();
				break;
			case 1:
				return $this->getNomedo();
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
		$keys = FaestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFapaisId(),
			$keys[1] => $this->getNomedo(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFapaisId($value);
				break;
			case 1:
				$this->setNomedo($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFapaisId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaestadoPeer::FAPAIS_ID)) $criteria->add(FaestadoPeer::FAPAIS_ID, $this->fapais_id);
		if ($this->isColumnModified(FaestadoPeer::NOMEDO)) $criteria->add(FaestadoPeer::NOMEDO, $this->nomedo);
		if ($this->isColumnModified(FaestadoPeer::ID)) $criteria->add(FaestadoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaestadoPeer::DATABASE_NAME);

		$criteria->add(FaestadoPeer::ID, $this->id);

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

		$copyObj->setFapaisId($this->fapais_id);

		$copyObj->setNomedo($this->nomedo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getFaciudads() as $relObj) {
				$copyObj->addFaciudad($relObj->copy($deepCopy));
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
			self::$peer = new FaestadoPeer();
		}
		return self::$peer;
	}

	
	public function setFapais($v)
	{


		if ($v === null) {
			$this->setFapaisId(NULL);
		} else {
			$this->setFapaisId($v->getId());
		}


		$this->aFapais = $v;
	}


	
	public function getFapais($con = null)
	{
		if ($this->aFapais === null && ($this->fapais_id !== null)) {
						include_once 'lib/model/om/BaseFapaisPeer.php';

			$this->aFapais = FapaisPeer::retrieveByPK($this->fapais_id, $con);

			
		}
		return $this->aFapais;
	}

	
	public function initFaciudads()
	{
		if ($this->collFaciudads === null) {
			$this->collFaciudads = array();
		}
	}

	
	public function getFaciudads($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFaciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFaciudads === null) {
			if ($this->isNew()) {
			   $this->collFaciudads = array();
			} else {

				$criteria->add(FaciudadPeer::FAESTADO_ID, $this->getId());

				FaciudadPeer::addSelectColumns($criteria);
				$this->collFaciudads = FaciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FaciudadPeer::FAESTADO_ID, $this->getId());

				FaciudadPeer::addSelectColumns($criteria);
				if (!isset($this->lastFaciudadCriteria) || !$this->lastFaciudadCriteria->equals($criteria)) {
					$this->collFaciudads = FaciudadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFaciudadCriteria = $criteria;
		return $this->collFaciudads;
	}

	
	public function countFaciudads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFaciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FaciudadPeer::FAESTADO_ID, $this->getId());

		return FaciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFaciudad(Faciudad $l)
	{
		$this->collFaciudads[] = $l;
		$l->setFaestado($this);
	}

} 