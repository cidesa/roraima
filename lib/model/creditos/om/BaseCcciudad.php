<?php


abstract class BaseCcciudad extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomciu;


	
	protected $ccestado_id;


	
	protected $ccregion_id;

	
	protected $aCcestado;

	
	protected $aCcregion;

	
	protected $collCcbenefis;

	
	protected $lastCcbenefiCriteria = null;

	
	protected $collCcsolicis;

	
	protected $lastCcsoliciCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getCcestadoId()
  {

    return $this->ccestado_id;

  }
  
  public function getCcregionId()
  {

    return $this->ccregion_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcciudadPeer::ID;
      }
  
	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = $v;
        $this->modifiedColumns[] = CcciudadPeer::NOMCIU;
      }
  
	} 
	
	public function setCcestadoId($v)
	{

    if ($this->ccestado_id !== $v) {
        $this->ccestado_id = $v;
        $this->modifiedColumns[] = CcciudadPeer::CCESTADO_ID;
      }
  
		if ($this->aCcestado !== null && $this->aCcestado->getId() !== $v) {
			$this->aCcestado = null;
		}

	} 
	
	public function setCcregionId($v)
	{

    if ($this->ccregion_id !== $v) {
        $this->ccregion_id = $v;
        $this->modifiedColumns[] = CcciudadPeer::CCREGION_ID;
      }
  
		if ($this->aCcregion !== null && $this->aCcregion->getId() !== $v) {
			$this->aCcregion = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomciu = $rs->getString($startcol + 1);

      $this->ccestado_id = $rs->getInt($startcol + 2);

      $this->ccregion_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccciudad object", $e);
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
			$con = Propel::getConnection(CcciudadPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcciudadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcciudadPeer::DATABASE_NAME);
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


												
			if ($this->aCcestado !== null) {
				if ($this->aCcestado->isModified()) {
					$affectedRows += $this->aCcestado->save($con);
				}
				$this->setCcestado($this->aCcestado);
			}

			if ($this->aCcregion !== null) {
				if ($this->aCcregion->isModified()) {
					$affectedRows += $this->aCcregion->save($con);
				}
				$this->setCcregion($this->aCcregion);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcciudadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcciudadPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbenefis !== null) {
				foreach($this->collCcbenefis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolicis !== null) {
				foreach($this->collCcsolicis as $referrerFK) {
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


												
			if ($this->aCcestado !== null) {
				if (!$this->aCcestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestado->getValidationFailures());
				}
			}

			if ($this->aCcregion !== null) {
				if (!$this->aCcregion->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcregion->getValidationFailures());
				}
			}


			if (($retval = CcciudadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbenefis !== null) {
					foreach($this->collCcbenefis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolicis !== null) {
					foreach($this->collCcsolicis as $referrerFK) {
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
		$pos = CcciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomciu();
				break;
			case 2:
				return $this->getCcestadoId();
				break;
			case 3:
				return $this->getCcregionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcciudadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomciu(),
			$keys[2] => $this->getCcestadoId(),
			$keys[3] => $this->getCcregionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcciudadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomciu($value);
				break;
			case 2:
				$this->setCcestadoId($value);
				break;
			case 3:
				$this->setCcregionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcciudadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomciu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcestadoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcregionId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcciudadPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcciudadPeer::ID)) $criteria->add(CcciudadPeer::ID, $this->id);
		if ($this->isColumnModified(CcciudadPeer::NOMCIU)) $criteria->add(CcciudadPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(CcciudadPeer::CCESTADO_ID)) $criteria->add(CcciudadPeer::CCESTADO_ID, $this->ccestado_id);
		if ($this->isColumnModified(CcciudadPeer::CCREGION_ID)) $criteria->add(CcciudadPeer::CCREGION_ID, $this->ccregion_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcciudadPeer::DATABASE_NAME);

		$criteria->add(CcciudadPeer::ID, $this->id);

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

		$copyObj->setNomciu($this->nomciu);

		$copyObj->setCcestadoId($this->ccestado_id);

		$copyObj->setCcregionId($this->ccregion_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbenefis() as $relObj) {
				$copyObj->addCcbenefi($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolicis() as $relObj) {
				$copyObj->addCcsolici($relObj->copy($deepCopy));
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
			self::$peer = new CcciudadPeer();
		}
		return self::$peer;
	}

	
	public function setCcestado($v)
	{


		if ($v === null) {
			$this->setCcestadoId(NULL);
		} else {
			$this->setCcestadoId($v->getId());
		}


		$this->aCcestado = $v;
	}


	
	public function getCcestado($con = null)
	{
		if ($this->aCcestado === null && ($this->ccestado_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestadoPeer.php';

      $c = new Criteria();
      $c->add(CcestadoPeer::ID,$this->ccestado_id);
      
			$this->aCcestado = CcestadoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestado;
	}

	
	public function setCcregion($v)
	{


		if ($v === null) {
			$this->setCcregionId(NULL);
		} else {
			$this->setCcregionId($v->getId());
		}


		$this->aCcregion = $v;
	}


	
	public function getCcregion($con = null)
	{
		if ($this->aCcregion === null && ($this->ccregion_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcregionPeer.php';

      $c = new Criteria();
      $c->add(CcregionPeer::ID,$this->ccregion_id);
      
			$this->aCcregion = CcregionPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcregion;
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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

		$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

		return CcbenefiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbenefi(Ccbenefi $l)
	{
		$this->collCcbenefis[] = $l;
		$l->setCcciudad($this);
	}


	
	public function getCcbenefisJoinCcperpre($criteria = null, $con = null)
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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccargo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
	}

	
	public function initCcsolicis()
	{
		if ($this->collCcsolicis === null) {
			$this->collCcsolicis = array();
		}
	}

	
	public function getCcsolicis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
			   $this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
					$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsoliciCriteria = $criteria;
		return $this->collCcsolicis;
	}

	
	public function countCcsolicis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

		return CcsoliciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolici(Ccsolici $l)
	{
		$this->collCcsolicis[] = $l;
		$l->setCcciudad($this);
	}


	
	public function getCcsolicisJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcmunici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcmunici($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccircuito($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolicis === null) {
			if ($this->isNew()) {
				$this->collCcsolicis = array();
			} else {

				$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}

} 