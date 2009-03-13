<?php


abstract class BaseInpais extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpai;


	
	protected $nompai;


	
	protected $id;

	
	protected $collInestados;

	
	protected $lastInestadoCriteria = null;

	
	protected $collInciudads;

	
	protected $lastInciudadCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpai()
  {

    return trim($this->codpai);

  }
  
  public function getNompai()
  {

    return trim($this->nompai);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpai($v)
	{

    if ($this->codpai !== $v) {
        $this->codpai = $v;
        $this->modifiedColumns[] = InpaisPeer::CODPAI;
      }
  
	} 
	
	public function setNompai($v)
	{

    if ($this->nompai !== $v) {
        $this->nompai = $v;
        $this->modifiedColumns[] = InpaisPeer::NOMPAI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InpaisPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpai = $rs->getString($startcol + 0);

      $this->nompai = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inpais object", $e);
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
			$con = Propel::getConnection(InpaisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InpaisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InpaisPeer::DATABASE_NAME);
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
					$pk = InpaisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InpaisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInestados !== null) {
				foreach($this->collInestados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInciudads !== null) {
				foreach($this->collInciudads as $referrerFK) {
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


			if (($retval = InpaisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInestados !== null) {
					foreach($this->collInestados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInciudads !== null) {
					foreach($this->collInciudads as $referrerFK) {
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
		$pos = InpaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpai();
				break;
			case 1:
				return $this->getNompai();
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
		$keys = InpaisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpai(),
			$keys[1] => $this->getNompai(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InpaisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpai($value);
				break;
			case 1:
				$this->setNompai($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InpaisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpai($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompai($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InpaisPeer::DATABASE_NAME);

		if ($this->isColumnModified(InpaisPeer::CODPAI)) $criteria->add(InpaisPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(InpaisPeer::NOMPAI)) $criteria->add(InpaisPeer::NOMPAI, $this->nompai);
		if ($this->isColumnModified(InpaisPeer::ID)) $criteria->add(InpaisPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InpaisPeer::DATABASE_NAME);

		$criteria->add(InpaisPeer::ID, $this->id);

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

		$copyObj->setCodpai($this->codpai);

		$copyObj->setNompai($this->nompai);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInestados() as $relObj) {
				$copyObj->addInestado($relObj->copy($deepCopy));
			}

			foreach($this->getInciudads() as $relObj) {
				$copyObj->addInciudad($relObj->copy($deepCopy));
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
			self::$peer = new InpaisPeer();
		}
		return self::$peer;
	}

	
	public function initInestados()
	{
		if ($this->collInestados === null) {
			$this->collInestados = array();
		}
	}

	
	public function getInestados($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInestados === null) {
			if ($this->isNew()) {
			   $this->collInestados = array();
			} else {

				$criteria->add(InestadoPeer::INPAIS_ID, $this->getId());

				InestadoPeer::addSelectColumns($criteria);
				$this->collInestados = InestadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InestadoPeer::INPAIS_ID, $this->getId());

				InestadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastInestadoCriteria) || !$this->lastInestadoCriteria->equals($criteria)) {
					$this->collInestados = InestadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInestadoCriteria = $criteria;
		return $this->collInestados;
	}

	
	public function countInestados($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InestadoPeer::INPAIS_ID, $this->getId());

		return InestadoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInestado(Inestado $l)
	{
		$this->collInestados[] = $l;
		$l->setInpais($this);
	}

	
	public function initInciudads()
	{
		if ($this->collInciudads === null) {
			$this->collInciudads = array();
		}
	}

	
	public function getInciudads($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInciudads === null) {
			if ($this->isNew()) {
			   $this->collInciudads = array();
			} else {

				$criteria->add(InciudadPeer::INPAIS_ID, $this->getId());

				InciudadPeer::addSelectColumns($criteria);
				$this->collInciudads = InciudadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InciudadPeer::INPAIS_ID, $this->getId());

				InciudadPeer::addSelectColumns($criteria);
				if (!isset($this->lastInciudadCriteria) || !$this->lastInciudadCriteria->equals($criteria)) {
					$this->collInciudads = InciudadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInciudadCriteria = $criteria;
		return $this->collInciudads;
	}

	
	public function countInciudads($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InciudadPeer::INPAIS_ID, $this->getId());

		return InciudadPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInciudad(Inciudad $l)
	{
		$this->collInciudads[] = $l;
		$l->setInpais($this);
	}


	
	public function getInciudadsJoinInestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInciudadPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInciudads === null) {
			if ($this->isNew()) {
				$this->collInciudads = array();
			} else {

				$criteria->add(InciudadPeer::INPAIS_ID, $this->getId());

				$this->collInciudads = InciudadPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InciudadPeer::INPAIS_ID, $this->getId());

			if (!isset($this->lastInciudadCriteria) || !$this->lastInciudadCriteria->equals($criteria)) {
				$this->collInciudads = InciudadPeer::doSelectJoinInestado($criteria, $con);
			}
		}
		$this->lastInciudadCriteria = $criteria;

		return $this->collInciudads;
	}

} 