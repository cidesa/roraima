<?php


abstract class BaseAtparroquias extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atmunicipios_id;


	
	protected $despar;


	
	protected $id;

	
	protected $aAtmunicipios;

	
	protected $collAtciudadanos;

	
	protected $lastAtciudadanoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtmunicipiosId()
  {

    return $this->atmunicipios_id;

  }
  
  public function getDespar()
  {

    return trim($this->despar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtmunicipiosId($v)
	{

    if ($this->atmunicipios_id !== $v) {
        $this->atmunicipios_id = $v;
        $this->modifiedColumns[] = AtparroquiasPeer::ATMUNICIPIOS_ID;
      }
  
		if ($this->aAtmunicipios !== null && $this->aAtmunicipios->getId() !== $v) {
			$this->aAtmunicipios = null;
		}

	} 
	
	public function setDespar($v)
	{

    if ($this->despar !== $v) {
        $this->despar = $v;
        $this->modifiedColumns[] = AtparroquiasPeer::DESPAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtparroquiasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atmunicipios_id = $rs->getInt($startcol + 0);

      $this->despar = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atparroquias object", $e);
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
			$con = Propel::getConnection(AtparroquiasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtparroquiasPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtparroquiasPeer::DATABASE_NAME);
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


												
			if ($this->aAtmunicipios !== null) {
				if ($this->aAtmunicipios->isModified()) {
					$affectedRows += $this->aAtmunicipios->save($con);
				}
				$this->setAtmunicipios($this->aAtmunicipios);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtparroquiasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtparroquiasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aAtmunicipios !== null) {
				if (!$this->aAtmunicipios->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtmunicipios->getValidationFailures());
				}
			}


			if (($retval = AtparroquiasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = AtparroquiasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtmunicipiosId();
				break;
			case 1:
				return $this->getDespar();
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
		$keys = AtparroquiasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtmunicipiosId(),
			$keys[1] => $this->getDespar(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtparroquiasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtmunicipiosId($value);
				break;
			case 1:
				$this->setDespar($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtparroquiasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtmunicipiosId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDespar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtparroquiasPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtparroquiasPeer::ATMUNICIPIOS_ID)) $criteria->add(AtparroquiasPeer::ATMUNICIPIOS_ID, $this->atmunicipios_id);
		if ($this->isColumnModified(AtparroquiasPeer::DESPAR)) $criteria->add(AtparroquiasPeer::DESPAR, $this->despar);
		if ($this->isColumnModified(AtparroquiasPeer::ID)) $criteria->add(AtparroquiasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtparroquiasPeer::DATABASE_NAME);

		$criteria->add(AtparroquiasPeer::ID, $this->id);

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

		$copyObj->setAtmunicipiosId($this->atmunicipios_id);

		$copyObj->setDespar($this->despar);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new AtparroquiasPeer();
		}
		return self::$peer;
	}

	
	public function setAtmunicipios($v)
	{


		if ($v === null) {
			$this->setAtmunicipiosId(NULL);
		} else {
			$this->setAtmunicipiosId($v->getId());
		}


		$this->aAtmunicipios = $v;
	}


	
	public function getAtmunicipios($con = null)
	{
		if ($this->aAtmunicipios === null && ($this->atmunicipios_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtmunicipiosPeer.php';

      $c = new Criteria();
      $c->add(AtmunicipiosPeer::ID,$this->atmunicipios_id);
      
			$this->aAtmunicipios = AtmunicipiosPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtmunicipios;
	}

	
	public function initAtciudadanos()
	{
		if ($this->collAtciudadanos === null) {
			$this->collAtciudadanos = array();
		}
	}

	
	public function getAtciudadanos($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				AtciudadanoPeer::addSelectColumns($criteria);
				$this->collAtciudadanos = AtciudadanoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

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
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

		return AtciudadanoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtciudadano(Atciudadano $l)
	{
		$this->collAtciudadanos[] = $l;
		$l->setAtparroquias($this);
	}


	
	public function getAtciudadanosJoinAtestados($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtestados($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtmunicipios($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmunicipios($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmunicipios($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttiping($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttiping($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtinsrefier($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtinsrefier($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttipproviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAttipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}


	
	public function getAtciudadanosJoinAtmisiones($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtciudadanoPeer.php';
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

				$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmisiones($criteria, $con);
			}
		} else {
									
			$criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->getId());

			if (!isset($this->lastAtciudadanoCriteria) || !$this->lastAtciudadanoCriteria->equals($criteria)) {
				$this->collAtciudadanos = AtciudadanoPeer::doSelectJoinAtmisiones($criteria, $con);
			}
		}
		$this->lastAtciudadanoCriteria = $criteria;

		return $this->collAtciudadanos;
	}

} 