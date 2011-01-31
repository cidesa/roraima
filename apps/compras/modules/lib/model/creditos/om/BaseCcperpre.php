<?php


abstract class BaseCcperpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $prefijo;


	
	protected $descripcion;

	
	protected $collCcamopags;

	
	protected $lastCcamopagCriteria = null;

	
	protected $collCcanaliss;

	
	protected $lastCcanalisCriteria = null;

	
	protected $collCcavaliss;

	
	protected $lastCcavalisCriteria = null;

	
	protected $collCcbenefis;

	
	protected $lastCcbenefiCriteria = null;

	
	protected $collCcconbens;

	
	protected $lastCcconbenCriteria = null;

	
	protected $collCcestados;

	
	protected $lastCcestadoCriteria = null;

	
	protected $collCcpagos;

	
	protected $lastCcpagoCriteria = null;

	
	protected $collCcpagters;

	
	protected $lastCcpagterCriteria = null;

	
	protected $collCcperbens;

	
	protected $lastCcperbenCriteria = null;

	
	protected $collCcrepbens;

	
	protected $lastCcrepbenCriteria = null;

	
	protected $collCcusuarios;

	
	protected $lastCcusuarioCriteria = null;

	
	protected $collCcusuints;

	
	protected $lastCcusuintCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPrefijo()
  {

    return trim($this->prefijo);

  }
  
  public function getDescripcion()
  {

    return trim($this->descripcion);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcperprePeer::ID;
      }
  
	} 
	
	public function setPrefijo($v)
	{

    if ($this->prefijo !== $v) {
        $this->prefijo = $v;
        $this->modifiedColumns[] = CcperprePeer::PREFIJO;
      }
  
	} 
	
	public function setDescripcion($v)
	{

    if ($this->descripcion !== $v) {
        $this->descripcion = $v;
        $this->modifiedColumns[] = CcperprePeer::DESCRIPCION;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->prefijo = $rs->getString($startcol + 1);

      $this->descripcion = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccperpre object", $e);
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
			$con = Propel::getConnection(CcperprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcperprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcperprePeer::DATABASE_NAME);
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
					$pk = CcperprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcperprePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcamopags !== null) {
				foreach($this->collCcamopags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcanaliss !== null) {
				foreach($this->collCcanaliss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcavaliss !== null) {
				foreach($this->collCcavaliss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbenefis !== null) {
				foreach($this->collCcbenefis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcconbens !== null) {
				foreach($this->collCcconbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestados !== null) {
				foreach($this->collCcestados as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagos !== null) {
				foreach($this->collCcpagos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcpagters !== null) {
				foreach($this->collCcpagters as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcperbens !== null) {
				foreach($this->collCcperbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrepbens !== null) {
				foreach($this->collCcrepbens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcusuarios !== null) {
				foreach($this->collCcusuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcusuints !== null) {
				foreach($this->collCcusuints as $referrerFK) {
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


			if (($retval = CcperprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcamopags !== null) {
					foreach($this->collCcamopags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcanaliss !== null) {
					foreach($this->collCcanaliss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcavaliss !== null) {
					foreach($this->collCcavaliss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbenefis !== null) {
					foreach($this->collCcbenefis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcconbens !== null) {
					foreach($this->collCcconbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestados !== null) {
					foreach($this->collCcestados as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagos !== null) {
					foreach($this->collCcpagos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcpagters !== null) {
					foreach($this->collCcpagters as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcperbens !== null) {
					foreach($this->collCcperbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrepbens !== null) {
					foreach($this->collCcrepbens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcusuarios !== null) {
					foreach($this->collCcusuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcusuints !== null) {
					foreach($this->collCcusuints as $referrerFK) {
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
		$pos = CcperprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPrefijo();
				break;
			case 2:
				return $this->getDescripcion();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPrefijo(),
			$keys[2] => $this->getDescripcion(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcperprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPrefijo($value);
				break;
			case 2:
				$this->setDescripcion($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPrefijo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcperprePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcperprePeer::ID)) $criteria->add(CcperprePeer::ID, $this->id);
		if ($this->isColumnModified(CcperprePeer::PREFIJO)) $criteria->add(CcperprePeer::PREFIJO, $this->prefijo);
		if ($this->isColumnModified(CcperprePeer::DESCRIPCION)) $criteria->add(CcperprePeer::DESCRIPCION, $this->descripcion);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcperprePeer::DATABASE_NAME);

		$criteria->add(CcperprePeer::ID, $this->id);

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

		$copyObj->setPrefijo($this->prefijo);

		$copyObj->setDescripcion($this->descripcion);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamopags() as $relObj) {
				$copyObj->addCcamopag($relObj->copy($deepCopy));
			}

			foreach($this->getCcanaliss() as $relObj) {
				$copyObj->addCcanalis($relObj->copy($deepCopy));
			}

			foreach($this->getCcavaliss() as $relObj) {
				$copyObj->addCcavalis($relObj->copy($deepCopy));
			}

			foreach($this->getCcbenefis() as $relObj) {
				$copyObj->addCcbenefi($relObj->copy($deepCopy));
			}

			foreach($this->getCcconbens() as $relObj) {
				$copyObj->addCcconben($relObj->copy($deepCopy));
			}

			foreach($this->getCcestados() as $relObj) {
				$copyObj->addCcestado($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagos() as $relObj) {
				$copyObj->addCcpago($relObj->copy($deepCopy));
			}

			foreach($this->getCcpagters() as $relObj) {
				$copyObj->addCcpagter($relObj->copy($deepCopy));
			}

			foreach($this->getCcperbens() as $relObj) {
				$copyObj->addCcperben($relObj->copy($deepCopy));
			}

			foreach($this->getCcrepbens() as $relObj) {
				$copyObj->addCcrepben($relObj->copy($deepCopy));
			}

			foreach($this->getCcusuarios() as $relObj) {
				$copyObj->addCcusuario($relObj->copy($deepCopy));
			}

			foreach($this->getCcusuints() as $relObj) {
				$copyObj->addCcusuint($relObj->copy($deepCopy));
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
			self::$peer = new CcperprePeer();
		}
		return self::$peer;
	}

	
	public function initCcamopags()
	{
		if ($this->collCcamopags === null) {
			$this->collCcamopags = array();
		}
	}

	
	public function getCcamopags($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
			   $this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
					$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamopagCriteria = $criteria;
		return $this->collCcamopags;
	}

	
	public function countCcamopags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

		return CcamopagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamopag(Ccamopag $l)
	{
		$this->collCcamopags[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcamopagsJoinCcamoact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpago($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}

	
	public function initCcanaliss()
	{
		if ($this->collCcanaliss === null) {
			$this->collCcanaliss = array();
		}
	}

	
	public function getCcanaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
			   $this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

				CcanalisPeer::addSelectColumns($criteria);
				$this->collCcanaliss = CcanalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

				CcanalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
					$this->collCcanaliss = CcanalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcanalisCriteria = $criteria;
		return $this->collCcanaliss;
	}

	
	public function countCcanaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

		return CcanalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcanalis(Ccanalis $l)
	{
		$this->collCcanaliss[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcanalissJoinCctipana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCctipana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCctipana($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}


	
	public function getCcanalissJoinCcareger($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcareger($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcareger($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}


	
	public function getCcanalissJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcanaliss === null) {
			if ($this->isNew()) {
				$this->collCcanaliss = array();
			} else {

				$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcanalisPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcanalisCriteria) || !$this->lastCcanalisCriteria->equals($criteria)) {
				$this->collCcanaliss = CcanalisPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcanalisCriteria = $criteria;

		return $this->collCcanaliss;
	}

	
	public function initCcavaliss()
	{
		if ($this->collCcavaliss === null) {
			$this->collCcavaliss = array();
		}
	}

	
	public function getCcavaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavaliss === null) {
			if ($this->isNew()) {
			   $this->collCcavaliss = array();
			} else {

				$criteria->add(CcavalisPeer::CCPERPRE_ID, $this->getId());

				CcavalisPeer::addSelectColumns($criteria);
				$this->collCcavaliss = CcavalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcavalisPeer::CCPERPRE_ID, $this->getId());

				CcavalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcavalisCriteria) || !$this->lastCcavalisCriteria->equals($criteria)) {
					$this->collCcavaliss = CcavalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcavalisCriteria = $criteria;
		return $this->collCcavaliss;
	}

	
	public function countCcavaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcavalisPeer::CCPERPRE_ID, $this->getId());

		return CcavalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcavalis(Ccavalis $l)
	{
		$this->collCcavaliss[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcavalissJoinCcgarant($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavaliss === null) {
			if ($this->isNew()) {
				$this->collCcavaliss = array();
			} else {

				$criteria->add(CcavalisPeer::CCPERPRE_ID, $this->getId());

				$this->collCcavaliss = CcavalisPeer::doSelectJoinCcgarant($criteria, $con);
			}
		} else {
									
			$criteria->add(CcavalisPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcavalisCriteria) || !$this->lastCcavalisCriteria->equals($criteria)) {
				$this->collCcavaliss = CcavalisPeer::doSelectJoinCcgarant($criteria, $con);
			}
		}
		$this->lastCcavalisCriteria = $criteria;

		return $this->collCcavaliss;
	}

	
	public function initCcbenefis()
	{
		if ($this->collCcbenefis === null) {
			$this->collCcbenefis = array();
		}
	}

	
	public function getCcbenefis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
			   $this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
					$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbenefiCriteria = $criteria;
		return $this->collCcbenefis;
	}

	
	public function countCcbenefis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

		return CcbenefiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbenefi(Ccbenefi $l)
	{
		$this->collCcbenefis[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcbenefisJoinCcestciv($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcsececo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcorimatpri($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCccargo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcubiadm($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}


	
	public function getCcbenefisJoinCcciudad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbenefis === null) {
			if ($this->isNew()) {
				$this->collCcbenefis = array();
			} else {

				$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}

	
	public function initCcconbens()
	{
		if ($this->collCcconbens === null) {
			$this->collCcconbens = array();
		}
	}

	
	public function getCcconbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconbens === null) {
			if ($this->isNew()) {
			   $this->collCcconbens = array();
			} else {

				$criteria->add(CcconbenPeer::CCPERPRE_ID, $this->getId());

				CcconbenPeer::addSelectColumns($criteria);
				$this->collCcconbens = CcconbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconbenPeer::CCPERPRE_ID, $this->getId());

				CcconbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconbenCriteria) || !$this->lastCcconbenCriteria->equals($criteria)) {
					$this->collCcconbens = CcconbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconbenCriteria = $criteria;
		return $this->collCcconbens;
	}

	
	public function countCcconbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconbenPeer::CCPERPRE_ID, $this->getId());

		return CcconbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconben(Ccconben $l)
	{
		$this->collCcconbens[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcconbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconbens === null) {
			if ($this->isNew()) {
				$this->collCcconbens = array();
			} else {

				$criteria->add(CcconbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcconbens = CcconbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcconbenCriteria) || !$this->lastCcconbenCriteria->equals($criteria)) {
				$this->collCcconbens = CcconbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcconbenCriteria = $criteria;

		return $this->collCcconbens;
	}

	
	public function initCcestados()
	{
		if ($this->collCcestados === null) {
			$this->collCcestados = array();
		}
	}

	
	public function getCcestados($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestados === null) {
			if ($this->isNew()) {
			   $this->collCcestados = array();
			} else {

				$criteria->add(CcestadoPeer::CCPERPRE_ID, $this->getId());

				CcestadoPeer::addSelectColumns($criteria);
				$this->collCcestados = CcestadoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestadoPeer::CCPERPRE_ID, $this->getId());

				CcestadoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestadoCriteria) || !$this->lastCcestadoCriteria->equals($criteria)) {
					$this->collCcestados = CcestadoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestadoCriteria = $criteria;
		return $this->collCcestados;
	}

	
	public function countCcestados($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestadoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestadoPeer::CCPERPRE_ID, $this->getId());

		return CcestadoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestado(Ccestado $l)
	{
		$this->collCcestados[] = $l;
		$l->setCcperpre($this);
	}

	
	public function initCcpagos()
	{
		if ($this->collCcpagos === null) {
			$this->collCcpagos = array();
		}
	}

	
	public function getCcpagos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
			   $this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
					$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagoCriteria = $criteria;
		return $this->collCcpagos;
	}

	
	public function countCcpagos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

		return CcpagoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpago(Ccpago $l)
	{
		$this->collCcpagos[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcpagosJoinCcperparamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagos === null) {
			if ($this->isNew()) {
				$this->collCcpagos = array();
			} else {

				$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}

	
	public function initCcpagters()
	{
		if ($this->collCcpagters === null) {
			$this->collCcpagters = array();
		}
	}

	
	public function getCcpagters($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
			   $this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

				CcpagterPeer::addSelectColumns($criteria);
				$this->collCcpagters = CcpagterPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

				CcpagterPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
					$this->collCcpagters = CcpagterPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcpagterCriteria = $criteria;
		return $this->collCcpagters;
	}

	
	public function countCcpagters($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

		return CcpagterPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpagter(Ccpagter $l)
	{
		$this->collCcpagters[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcpagtersJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}


	
	public function getCcpagtersJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}


	
	public function getCcpagtersJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcpagterPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcpagters === null) {
			if ($this->isNew()) {
				$this->collCcpagters = array();
			} else {

				$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

				$this->collCcpagters = CcpagterPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagterPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcpagterCriteria) || !$this->lastCcpagterCriteria->equals($criteria)) {
				$this->collCcpagters = CcpagterPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcpagterCriteria = $criteria;

		return $this->collCcpagters;
	}

	
	public function initCcperbens()
	{
		if ($this->collCcperbens === null) {
			$this->collCcperbens = array();
		}
	}

	
	public function getCcperbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
			   $this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
					$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcperbenCriteria = $criteria;
		return $this->collCcperbens;
	}

	
	public function countCcperbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

		return CcperbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcperben(Ccperben $l)
	{
		$this->collCcperbens[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcperbensJoinCccargo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCccargo($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}


	
	public function getCcperbensJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}


	
	public function getCcperbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcperbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcperbens === null) {
			if ($this->isNew()) {
				$this->collCcperbens = array();
			} else {

				$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}

	
	public function initCcrepbens()
	{
		if ($this->collCcrepbens === null) {
			$this->collCcrepbens = array();
		}
	}

	
	public function getCcrepbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
			   $this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
					$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrepbenCriteria = $criteria;
		return $this->collCcrepbens;
	}

	
	public function countCcrepbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

		return CcrepbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrepben(Ccrepben $l)
	{
		$this->collCcrepbens[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcrepbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcparent($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparent($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparent($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}

	
	public function initCcusuarios()
	{
		if ($this->collCcusuarios === null) {
			$this->collCcusuarios = array();
		}
	}

	
	public function getCcusuarios($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusuarios === null) {
			if ($this->isNew()) {
			   $this->collCcusuarios = array();
			} else {

				$criteria->add(CcusuarioPeer::CCPERPRE_ID, $this->getId());

				CcusuarioPeer::addSelectColumns($criteria);
				$this->collCcusuarios = CcusuarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcusuarioPeer::CCPERPRE_ID, $this->getId());

				CcusuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcusuarioCriteria) || !$this->lastCcusuarioCriteria->equals($criteria)) {
					$this->collCcusuarios = CcusuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcusuarioCriteria = $criteria;
		return $this->collCcusuarios;
	}

	
	public function countCcusuarios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcusuarioPeer::CCPERPRE_ID, $this->getId());

		return CcusuarioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcusuario(Ccusuario $l)
	{
		$this->collCcusuarios[] = $l;
		$l->setCcperpre($this);
	}


	
	public function getCcusuariosJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusuarios === null) {
			if ($this->isNew()) {
				$this->collCcusuarios = array();
			} else {

				$criteria->add(CcusuarioPeer::CCPERPRE_ID, $this->getId());

				$this->collCcusuarios = CcusuarioPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcusuarioPeer::CCPERPRE_ID, $this->getId());

			if (!isset($this->lastCcusuarioCriteria) || !$this->lastCcusuarioCriteria->equals($criteria)) {
				$this->collCcusuarios = CcusuarioPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcusuarioCriteria = $criteria;

		return $this->collCcusuarios;
	}

	
	public function initCcusuints()
	{
		if ($this->collCcusuints === null) {
			$this->collCcusuints = array();
		}
	}

	
	public function getCcusuints($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuintPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusuints === null) {
			if ($this->isNew()) {
			   $this->collCcusuints = array();
			} else {

				$criteria->add(CcusuintPeer::CCPERPRE_ID, $this->getId());

				CcusuintPeer::addSelectColumns($criteria);
				$this->collCcusuints = CcusuintPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcusuintPeer::CCPERPRE_ID, $this->getId());

				CcusuintPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcusuintCriteria) || !$this->lastCcusuintCriteria->equals($criteria)) {
					$this->collCcusuints = CcusuintPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcusuintCriteria = $criteria;
		return $this->collCcusuints;
	}

	
	public function countCcusuints($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusuintPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcusuintPeer::CCPERPRE_ID, $this->getId());

		return CcusuintPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcusuint(Ccusuint $l)
	{
		$this->collCcusuints[] = $l;
		$l->setCcperpre($this);
	}

} 