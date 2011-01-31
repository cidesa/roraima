<?php


abstract class BaseCadefubi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codubi;


	
	protected $nomubi;


	
	protected $id;

	
	protected $collCaartalmubis;

	
	protected $lastCaartalmubiCriteria = null;

	
	protected $collCaalmubis;

	
	protected $lastCaalmubiCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodubi()
  {

    return trim($this->codubi);

  }
  
  public function getNomubi()
  {

    return trim($this->nomubi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodubi($v)
	{

    if ($this->codubi !== $v) {
        $this->codubi = $v;
        $this->modifiedColumns[] = CadefubiPeer::CODUBI;
      }
  
	} 
	
	public function setNomubi($v)
	{

    if ($this->nomubi !== $v) {
        $this->nomubi = $v;
        $this->modifiedColumns[] = CadefubiPeer::NOMUBI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefubiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codubi = $rs->getString($startcol + 0);

      $this->nomubi = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefubi object", $e);
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
			$con = Propel::getConnection(CadefubiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefubiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefubiPeer::DATABASE_NAME);
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
					$pk = CadefubiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefubiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCaartalmubis !== null) {
				foreach($this->collCaartalmubis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCaalmubis !== null) {
				foreach($this->collCaalmubis as $referrerFK) {
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


			if (($retval = CadefubiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCaartalmubis !== null) {
					foreach($this->collCaartalmubis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCaalmubis !== null) {
					foreach($this->collCaalmubis as $referrerFK) {
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
		$pos = CadefubiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodubi();
				break;
			case 1:
				return $this->getNomubi();
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
		$keys = CadefubiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodubi(),
			$keys[1] => $this->getNomubi(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefubiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodubi($value);
				break;
			case 1:
				$this->setNomubi($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefubiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodubi($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomubi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefubiPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefubiPeer::CODUBI)) $criteria->add(CadefubiPeer::CODUBI, $this->codubi);
		if ($this->isColumnModified(CadefubiPeer::NOMUBI)) $criteria->add(CadefubiPeer::NOMUBI, $this->nomubi);
		if ($this->isColumnModified(CadefubiPeer::ID)) $criteria->add(CadefubiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefubiPeer::DATABASE_NAME);

		$criteria->add(CadefubiPeer::ID, $this->id);

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

		$copyObj->setCodubi($this->codubi);

		$copyObj->setNomubi($this->nomubi);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCaartalmubis() as $relObj) {
				$copyObj->addCaartalmubi($relObj->copy($deepCopy));
			}

			foreach($this->getCaalmubis() as $relObj) {
				$copyObj->addCaalmubi($relObj->copy($deepCopy));
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
			self::$peer = new CadefubiPeer();
		}
		return self::$peer;
	}

	
	public function initCaartalmubis()
	{
		if ($this->collCaartalmubis === null) {
			$this->collCaartalmubis = array();
		}
	}

	
	public function getCaartalmubis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaartalmubiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaartalmubis === null) {
			if ($this->isNew()) {
			   $this->collCaartalmubis = array();
			} else {

				$criteria->add(CaartalmubiPeer::CODUBI, $this->getCodubi());

				CaartalmubiPeer::addSelectColumns($criteria);
				$this->collCaartalmubis = CaartalmubiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaartalmubiPeer::CODUBI, $this->getCodubi());

				CaartalmubiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaartalmubiCriteria) || !$this->lastCaartalmubiCriteria->equals($criteria)) {
					$this->collCaartalmubis = CaartalmubiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaartalmubiCriteria = $criteria;
		return $this->collCaartalmubis;
	}

	
	public function countCaartalmubis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCaartalmubiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaartalmubiPeer::CODUBI, $this->getCodubi());

		return CaartalmubiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaartalmubi(Caartalmubi $l)
	{
		$this->collCaartalmubis[] = $l;
		$l->setCadefubi($this);
	}

	
	public function initCaalmubis()
	{
		if ($this->collCaalmubis === null) {
			$this->collCaalmubis = array();
		}
	}

	
	public function getCaalmubis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseCaalmubiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCaalmubis === null) {
			if ($this->isNew()) {
			   $this->collCaalmubis = array();
			} else {

				$criteria->add(CaalmubiPeer::CODUBI, $this->getCodubi());

				CaalmubiPeer::addSelectColumns($criteria);
				$this->collCaalmubis = CaalmubiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CaalmubiPeer::CODUBI, $this->getCodubi());

				CaalmubiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCaalmubiCriteria) || !$this->lastCaalmubiCriteria->equals($criteria)) {
					$this->collCaalmubis = CaalmubiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCaalmubiCriteria = $criteria;
		return $this->collCaalmubis;
	}

	
	public function countCaalmubis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseCaalmubiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CaalmubiPeer::CODUBI, $this->getCodubi());

		return CaalmubiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCaalmubi(Caalmubi $l)
	{
		$this->collCaalmubis[] = $l;
		$l->setCadefubi($this);
	}

} 