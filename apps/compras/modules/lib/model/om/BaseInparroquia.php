<?php


abstract class BaseInparroquia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $inestado_id;


	
	protected $inmunicipio_id;


	
	protected $codpar;


	
	protected $nompar;


	
	protected $id;

	
	protected $aInestado;

	
	protected $aInmunicipio;

	
	protected $collInprofess;

	
	protected $lastInprofesCriteria = null;

	
	protected $collInempresas;

	
	protected $lastInempresaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getInestadoId()
  {

    return $this->inestado_id;

  }
  
  public function getInmunicipioId()
  {

    return $this->inmunicipio_id;

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getNompar()
  {

    return trim($this->nompar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setInestadoId($v)
	{

    if ($this->inestado_id !== $v) {
        $this->inestado_id = $v;
        $this->modifiedColumns[] = InparroquiaPeer::INESTADO_ID;
      }
  
		if ($this->aInestado !== null && $this->aInestado->getId() !== $v) {
			$this->aInestado = null;
		}

	} 
	
	public function setInmunicipioId($v)
	{

    if ($this->inmunicipio_id !== $v) {
        $this->inmunicipio_id = $v;
        $this->modifiedColumns[] = InparroquiaPeer::INMUNICIPIO_ID;
      }
  
		if ($this->aInmunicipio !== null && $this->aInmunicipio->getId() !== $v) {
			$this->aInmunicipio = null;
		}

	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = InparroquiaPeer::CODPAR;
      }
  
	} 
	
	public function setNompar($v)
	{

    if ($this->nompar !== $v) {
        $this->nompar = $v;
        $this->modifiedColumns[] = InparroquiaPeer::NOMPAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InparroquiaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->inestado_id = $rs->getInt($startcol + 0);

      $this->inmunicipio_id = $rs->getInt($startcol + 1);

      $this->codpar = $rs->getString($startcol + 2);

      $this->nompar = $rs->getString($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inparroquia object", $e);
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
			$con = Propel::getConnection(InparroquiaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InparroquiaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InparroquiaPeer::DATABASE_NAME);
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


												
			if ($this->aInestado !== null) {
				if ($this->aInestado->isModified()) {
					$affectedRows += $this->aInestado->save($con);
				}
				$this->setInestado($this->aInestado);
			}

			if ($this->aInmunicipio !== null) {
				if ($this->aInmunicipio->isModified()) {
					$affectedRows += $this->aInmunicipio->save($con);
				}
				$this->setInmunicipio($this->aInmunicipio);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InparroquiaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InparroquiaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInprofess !== null) {
				foreach($this->collInprofess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInempresas !== null) {
				foreach($this->collInempresas as $referrerFK) {
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


												
			if ($this->aInestado !== null) {
				if (!$this->aInestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInestado->getValidationFailures());
				}
			}

			if ($this->aInmunicipio !== null) {
				if (!$this->aInmunicipio->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInmunicipio->getValidationFailures());
				}
			}


			if (($retval = InparroquiaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInprofess !== null) {
					foreach($this->collInprofess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInempresas !== null) {
					foreach($this->collInempresas as $referrerFK) {
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
		$pos = InparroquiaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getInestadoId();
				break;
			case 1:
				return $this->getInmunicipioId();
				break;
			case 2:
				return $this->getCodpar();
				break;
			case 3:
				return $this->getNompar();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InparroquiaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getInestadoId(),
			$keys[1] => $this->getInmunicipioId(),
			$keys[2] => $this->getCodpar(),
			$keys[3] => $this->getNompar(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InparroquiaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setInestadoId($value);
				break;
			case 1:
				$this->setInmunicipioId($value);
				break;
			case 2:
				$this->setCodpar($value);
				break;
			case 3:
				$this->setNompar($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InparroquiaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setInestadoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInmunicipioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNompar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InparroquiaPeer::DATABASE_NAME);

		if ($this->isColumnModified(InparroquiaPeer::INESTADO_ID)) $criteria->add(InparroquiaPeer::INESTADO_ID, $this->inestado_id);
		if ($this->isColumnModified(InparroquiaPeer::INMUNICIPIO_ID)) $criteria->add(InparroquiaPeer::INMUNICIPIO_ID, $this->inmunicipio_id);
		if ($this->isColumnModified(InparroquiaPeer::CODPAR)) $criteria->add(InparroquiaPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(InparroquiaPeer::NOMPAR)) $criteria->add(InparroquiaPeer::NOMPAR, $this->nompar);
		if ($this->isColumnModified(InparroquiaPeer::ID)) $criteria->add(InparroquiaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InparroquiaPeer::DATABASE_NAME);

		$criteria->add(InparroquiaPeer::ID, $this->id);

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

		$copyObj->setInestadoId($this->inestado_id);

		$copyObj->setInmunicipioId($this->inmunicipio_id);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setNompar($this->nompar);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInprofess() as $relObj) {
				$copyObj->addInprofes($relObj->copy($deepCopy));
			}

			foreach($this->getInempresas() as $relObj) {
				$copyObj->addInempresa($relObj->copy($deepCopy));
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
			self::$peer = new InparroquiaPeer();
		}
		return self::$peer;
	}

	
	public function setInestado($v)
	{


		if ($v === null) {
			$this->setInestadoId(NULL);
		} else {
			$this->setInestadoId($v->getId());
		}


		$this->aInestado = $v;
	}


	
	public function getInestado($con = null)
	{
		if ($this->aInestado === null && ($this->inestado_id !== null)) {
						include_once 'lib/model/om/BaseInestadoPeer.php';

			$this->aInestado = InestadoPeer::retrieveByPK($this->inestado_id, $con);

			
		}
		return $this->aInestado;
	}

	
	public function setInmunicipio($v)
	{


		if ($v === null) {
			$this->setInmunicipioId(NULL);
		} else {
			$this->setInmunicipioId($v->getId());
		}


		$this->aInmunicipio = $v;
	}


	
	public function getInmunicipio($con = null)
	{
		if ($this->aInmunicipio === null && ($this->inmunicipio_id !== null)) {
						include_once 'lib/model/om/BaseInmunicipioPeer.php';

			$this->aInmunicipio = InmunicipioPeer::retrieveByPK($this->inmunicipio_id, $con);

			
		}
		return $this->aInmunicipio;
	}

	
	public function initInprofess()
	{
		if ($this->collInprofess === null) {
			$this->collInprofess = array();
		}
	}

	
	public function getInprofess($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInprofesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInprofess === null) {
			if ($this->isNew()) {
			   $this->collInprofess = array();
			} else {

				$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

				InprofesPeer::addSelectColumns($criteria);
				$this->collInprofess = InprofesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

				InprofesPeer::addSelectColumns($criteria);
				if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
					$this->collInprofess = InprofesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInprofesCriteria = $criteria;
		return $this->collInprofess;
	}

	
	public function countInprofess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInprofesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

		return InprofesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInprofes(Inprofes $l)
	{
		$this->collInprofess[] = $l;
		$l->setInparroquia($this);
	}


	
	public function getInprofessJoinInestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInprofesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInprofess === null) {
			if ($this->isNew()) {
				$this->collInprofess = array();
			} else {

				$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInestado($criteria, $con);
			}
		}
		$this->lastInprofesCriteria = $criteria;

		return $this->collInprofess;
	}


	
	public function getInprofessJoinInmunicipio($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInprofesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInprofess === null) {
			if ($this->isNew()) {
				$this->collInprofess = array();
			} else {

				$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		}
		$this->lastInprofesCriteria = $criteria;

		return $this->collInprofess;
	}


	
	public function getInprofessJoinInespeci($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInprofesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInprofess === null) {
			if ($this->isNew()) {
				$this->collInprofess = array();
			} else {

				$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInespeci($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INPARROQUIA_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInespeci($criteria, $con);
			}
		}
		$this->lastInprofesCriteria = $criteria;

		return $this->collInprofess;
	}

	
	public function initInempresas()
	{
		if ($this->collInempresas === null) {
			$this->collInempresas = array();
		}
	}

	
	public function getInempresas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
			   $this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

				InempresaPeer::addSelectColumns($criteria);
				$this->collInempresas = InempresaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

				InempresaPeer::addSelectColumns($criteria);
				if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
					$this->collInempresas = InempresaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInempresaCriteria = $criteria;
		return $this->collInempresas;
	}

	
	public function countInempresas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

		return InempresaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInempresa(Inempresa $l)
	{
		$this->collInempresas[] = $l;
		$l->setInparroquia($this);
	}


	
	public function getInempresasJoinIntipemp($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
				$this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinIntipemp($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinIntipemp($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}


	
	public function getInempresasJoinInestado($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
				$this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInestado($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}


	
	public function getInempresasJoinInmunicipio($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInempresaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInempresas === null) {
			if ($this->isNew()) {
				$this->collInempresas = array();
			} else {

				$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INPARROQUIA_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}

} 