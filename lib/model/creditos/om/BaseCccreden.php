<?php


abstract class BaseCccreden extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomcre;

	
	protected $collCccreusus;

	
	protected $lastCccreusuCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomcre()
  {

    return trim($this->nomcre);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccredenPeer::ID;
      }
  
	} 
	
	public function setNomcre($v)
	{

    if ($this->nomcre !== $v) {
        $this->nomcre = $v;
        $this->modifiedColumns[] = CccredenPeer::NOMCRE;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomcre = $rs->getString($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccreden object", $e);
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
			$con = Propel::getConnection(CccredenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccredenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccredenPeer::DATABASE_NAME);
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
					$pk = CccredenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccredenPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCccreusus !== null) {
				foreach($this->collCccreusus as $referrerFK) {
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


			if (($retval = CccredenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCccreusus !== null) {
					foreach($this->collCccreusus as $referrerFK) {
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
		$pos = CccredenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomcre();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccredenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomcre(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccredenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomcre($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccredenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcre($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccredenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccredenPeer::ID)) $criteria->add(CccredenPeer::ID, $this->id);
		if ($this->isColumnModified(CccredenPeer::NOMCRE)) $criteria->add(CccredenPeer::NOMCRE, $this->nomcre);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccredenPeer::DATABASE_NAME);

		$criteria->add(CccredenPeer::ID, $this->id);

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

		$copyObj->setNomcre($this->nomcre);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCccreusus() as $relObj) {
				$copyObj->addCccreusu($relObj->copy($deepCopy));
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
			self::$peer = new CccredenPeer();
		}
		return self::$peer;
	}

	
	public function initCccreusus()
	{
		if ($this->collCccreusus === null) {
			$this->collCccreusus = array();
		}
	}

	
	public function getCccreusus($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreusus === null) {
			if ($this->isNew()) {
			   $this->collCccreusus = array();
			} else {

				$criteria->add(CccreusuPeer::CCCREDEN_ID, $this->getId());

				CccreusuPeer::addSelectColumns($criteria);
				$this->collCccreusus = CccreusuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreusuPeer::CCCREDEN_ID, $this->getId());

				CccreusuPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreusuCriteria) || !$this->lastCccreusuCriteria->equals($criteria)) {
					$this->collCccreusus = CccreusuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreusuCriteria = $criteria;
		return $this->collCccreusus;
	}

	
	public function countCccreusus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreusuPeer::CCCREDEN_ID, $this->getId());

		return CccreusuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccreusu(Cccreusu $l)
	{
		$this->collCccreusus[] = $l;
		$l->setCccreden($this);
	}


	
	public function getCccreususJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreusuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccreusus === null) {
			if ($this->isNew()) {
				$this->collCccreusus = array();
			} else {

				$criteria->add(CccreusuPeer::CCCREDEN_ID, $this->getId());

				$this->collCccreusus = CccreusuPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreusuPeer::CCCREDEN_ID, $this->getId());

			if (!isset($this->lastCccreusuCriteria) || !$this->lastCccreusuCriteria->equals($criteria)) {
				$this->collCccreusus = CccreusuPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCccreusuCriteria = $criteria;

		return $this->collCccreusus;
	}

} 