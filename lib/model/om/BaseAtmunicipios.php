<?php


abstract class BaseAtmunicipios extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atestados_id;


	
	protected $desmun;


	
	protected $id;

	
	protected $aAtestados;

	
	protected $collAtparroquiass;

	
	protected $lastAtparroquiasCriteria = null;

	
	protected $collAtciudadanos;

	
	protected $lastAtciudadanoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtestadosId()
  {

    return $this->atestados_id;

  }
  
  public function getDesmun()
  {

    return trim($this->desmun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtestadosId($v)
	{

    if ($this->atestados_id !== $v) {
        $this->atestados_id = $v;
        $this->modifiedColumns[] = AtmunicipiosPeer::ATESTADOS_ID;
      }
  
		if ($this->aAtestados !== null && $this->aAtestados->getId() !== $v) {
			$this->aAtestados = null;
		}

	} 
	
	public function setDesmun($v)
	{

    if ($this->desmun !== $v) {
        $this->desmun = $v;
        $this->modifiedColumns[] = AtmunicipiosPeer::DESMUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtmunicipiosPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atestados_id = $rs->getInt($startcol + 0);

      $this->desmun = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atmunicipios object", $e);
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
			$con = Propel::getConnection(AtmunicipiosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtmunicipiosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtmunicipiosPeer::DATABASE_NAME);
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


												
			if ($this->aAtestados !== null) {
				if ($this->aAtestados->isModified()) {
					$affectedRows += $this->aAtestados->save($con);
				}
				$this->setAtestados($this->aAtestados);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtmunicipiosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtmunicipiosPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtparroquiass !== null) {
				foreach($this->collAtparroquiass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtciudadanos !== null) {
				foreach($this->collAtciudadanos as $referrerFK) {
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


												
			if ($this->aAtestados !== null) {
				if (!$this->aAtestados->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtestados->getValidationFailures());
				}
			}


			if (($retval = AtmunicipiosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtparroquiass !== null) {
					foreach($this->collAtparroquiass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtciudadanos !== null) {
					foreach($this->collAtciudadanos as $referrerFK) {
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
		$pos = AtmunicipiosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtestadosId();
				break;
			case 1:
				return $this->getDesmun();
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
		$keys = AtmunicipiosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtestadosId(),
			$keys[1] => $this->getDesmun(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtmunicipiosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtestadosId($value);
				break;
			case 1:
				$this->setDesmun($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtmunicipiosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtestadosId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesmun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtmunicipiosPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtmunicipiosPeer::ATESTADOS_ID)) $criteria->add(AtmunicipiosPeer::ATESTADOS_ID, $this->atestados_id);
		if ($this->isColumnModified(AtmunicipiosPeer::DESMUN)) $criteria->add(AtmunicipiosPeer::DESMUN, $this->desmun);
		if ($this->isColumnModified(AtmunicipiosPeer::ID)) $criteria->add(AtmunicipiosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtmunicipiosPeer::DATABASE_NAME);

		$criteria->add(AtmunicipiosPeer::ID, $this->id);

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

		$copyObj->setAtestadosId($this->atestados_id);

		$copyObj->setDesmun($this->desmun);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtparroquiass() as $relObj) {
				$copyObj->addAtparroquias($relObj->copy($deepCopy));
			}

			foreach($this->getAtciudadanos() as $relObj) {
				$copyObj->addAtciudadano($relObj->copy($deepCopy));
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
			self::$peer = new AtmunicipiosPeer();
		}
		return self::$peer;
	}

	
	public function setAtestados($v)
	{


		if ($v === null) {
			$this->setAtestadosId(NULL);
		} else {
			$this->setAtestadosId($v->getId());
		}


		$this->aAtestados = $v;
	}


	
	public function getAtestados($con = null)
	{
		if ($this->aAtestados === null && ($this->atestados_id !== null)) {
						include_once 'lib/model/om/BaseAtestadosPeer.php';

			$this->aAtestados = AtestadosPeer::retrieveByPK($this->atestados_id, $con);

			
		}
		return $this->aAtestados;
	}

	
	public function initAtparroquiass()
	{
		if ($this->collAtparroquiass === null) {
			$this->collAtparroquiass = array();
		}
	}

	
	public function getAtparroquiass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtparroquiasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtparroquiass === null) {
			if ($this->isNew()) {
			   $this->collAtparroquiass = array();
			} else {

				$criteria->add(AtparroquiasPeer::ATMUNICIPIOS_ID, $this->getId());

				AtparroquiasPeer::addSelectColumns($criteria);
				$this->collAtparroquiass = AtparroquiasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtparroquiasPeer::ATMUNICIPIOS_ID, $this->getId());

				AtparroquiasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtparroquiasCriteria) || !$this->lastAtparroquiasCriteria->equals($criteria)) {
					$this->collAtparroquiass = AtparroquiasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtparroquiasCriteria = $criteria;
		return $this->collAtparroquiass;
	}

	
	public function countAtparroquiass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtparroquiasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtparroquiasPeer::ATMUNICIPIOS_ID, $this->getId());

		return AtparroquiasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtparroquias(Atparroquias $l)
	{
		$this->collAtparroquiass[] = $l;
		$l->setAtmunicipios($this);
	}

	
	public function initAtciudadanos()
	{
		if ($this->collAtciudadanos === null) {
			$this->collAtciudadanos = array();
		}
	}

	
	public function getAtciudadanos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
			   $this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
					$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;
		return $this->collAtciudadanos;
	}

	
	public function countAtciudadanos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

		return AtciudadanoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtciudadano(Atciudadano $l)
	{
		$this->collAtciudadanos[] = $l;
		$l->setAtmunicipios($this);
	}


	
	public function getAtciudadanosJoinAtestados($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtparroquias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtparroquias($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtparroquias($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttiping($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtinsrefier($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtciudadanos === null) {
			if ($this->isNew()) {
				$this->collAtciudadanos = array();
			} else {

				$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}

} 