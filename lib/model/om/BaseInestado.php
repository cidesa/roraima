<?php


abstract class BaseInestado extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codedo;


	
	protected $nomedo;


	
	protected $id;

	
	protected $collInmunicipios;

	
	protected $lastInmunicipioCriteria = null;

	
	protected $collInparroquias;

	
	protected $lastInparroquiaCriteria = null;

	
	protected $collInprofess;

	
	protected $lastInprofesCriteria = null;

	
	protected $collInempresas;

	
	protected $lastInempresaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodedo()
  {

    return trim($this->codedo);

  }
  
  public function getNomedo()
  {

    return trim($this->nomedo);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodedo($v)
	{

    if ($this->codedo !== $v) {
        $this->codedo = $v;
        $this->modifiedColumns[] = InestadoPeer::CODEDO;
      }
  
	} 
	
	public function setNomedo($v)
	{

    if ($this->nomedo !== $v) {
        $this->nomedo = $v;
        $this->modifiedColumns[] = InestadoPeer::NOMEDO;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InestadoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codedo = $rs->getString($startcol + 0);

      $this->nomedo = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inestado object", $e);
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
			$con = Propel::getConnection(InestadoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InestadoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InestadoPeer::DATABASE_NAME);
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
					$pk = InestadoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InestadoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInmunicipios !== null) {
				foreach($this->collInmunicipios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collInparroquias !== null) {
				foreach($this->collInparroquias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = InestadoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInmunicipios !== null) {
					foreach($this->collInmunicipios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collInparroquias !== null) {
					foreach($this->collInparroquias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = InestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodedo();
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
		$keys = InestadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodedo(),
			$keys[1] => $this->getNomedo(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InestadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodedo($value);
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
		$keys = InestadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodedo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomedo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InestadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(InestadoPeer::CODEDO)) $criteria->add(InestadoPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(InestadoPeer::NOMEDO)) $criteria->add(InestadoPeer::NOMEDO, $this->nomedo);
		if ($this->isColumnModified(InestadoPeer::ID)) $criteria->add(InestadoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InestadoPeer::DATABASE_NAME);

		$criteria->add(InestadoPeer::ID, $this->id);

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

		$copyObj->setCodedo($this->codedo);

		$copyObj->setNomedo($this->nomedo);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInmunicipios() as $relObj) {
				$copyObj->addInmunicipio($relObj->copy($deepCopy));
			}

			foreach($this->getInparroquias() as $relObj) {
				$copyObj->addInparroquia($relObj->copy($deepCopy));
			}

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
			self::$peer = new InestadoPeer();
		}
		return self::$peer;
	}

	
	public function initInmunicipios()
	{
		if ($this->collInmunicipios === null) {
			$this->collInmunicipios = array();
		}
	}

	
	public function getInmunicipios($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInmunicipioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInmunicipios === null) {
			if ($this->isNew()) {
			   $this->collInmunicipios = array();
			} else {

				$criteria->add(InmunicipioPeer::INESTADO_ID, $this->getId());

				InmunicipioPeer::addSelectColumns($criteria);
				$this->collInmunicipios = InmunicipioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InmunicipioPeer::INESTADO_ID, $this->getId());

				InmunicipioPeer::addSelectColumns($criteria);
				if (!isset($this->lastInmunicipioCriteria) || !$this->lastInmunicipioCriteria->equals($criteria)) {
					$this->collInmunicipios = InmunicipioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInmunicipioCriteria = $criteria;
		return $this->collInmunicipios;
	}

	
	public function countInmunicipios($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInmunicipioPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InmunicipioPeer::INESTADO_ID, $this->getId());

		return InmunicipioPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInmunicipio(Inmunicipio $l)
	{
		$this->collInmunicipios[] = $l;
		$l->setInestado($this);
	}

	
	public function initInparroquias()
	{
		if ($this->collInparroquias === null) {
			$this->collInparroquias = array();
		}
	}

	
	public function getInparroquias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInparroquiaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInparroquias === null) {
			if ($this->isNew()) {
			   $this->collInparroquias = array();
			} else {

				$criteria->add(InparroquiaPeer::INESTADO_ID, $this->getId());

				InparroquiaPeer::addSelectColumns($criteria);
				$this->collInparroquias = InparroquiaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InparroquiaPeer::INESTADO_ID, $this->getId());

				InparroquiaPeer::addSelectColumns($criteria);
				if (!isset($this->lastInparroquiaCriteria) || !$this->lastInparroquiaCriteria->equals($criteria)) {
					$this->collInparroquias = InparroquiaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInparroquiaCriteria = $criteria;
		return $this->collInparroquias;
	}

	
	public function countInparroquias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInparroquiaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InparroquiaPeer::INESTADO_ID, $this->getId());

		return InparroquiaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInparroquia(Inparroquia $l)
	{
		$this->collInparroquias[] = $l;
		$l->setInestado($this);
	}


	
	public function getInparroquiasJoinInmunicipio($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInparroquiaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInparroquias === null) {
			if ($this->isNew()) {
				$this->collInparroquias = array();
			} else {

				$criteria->add(InparroquiaPeer::INESTADO_ID, $this->getId());

				$this->collInparroquias = InparroquiaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InparroquiaPeer::INESTADO_ID, $this->getId());

			if (!isset($this->lastInparroquiaCriteria) || !$this->lastInparroquiaCriteria->equals($criteria)) {
				$this->collInparroquias = InparroquiaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		}
		$this->lastInparroquiaCriteria = $criteria;

		return $this->collInparroquias;
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

				$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

				InprofesPeer::addSelectColumns($criteria);
				$this->collInprofess = InprofesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

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

		$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

		return InprofesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInprofes(Inprofes $l)
	{
		$this->collInprofess[] = $l;
		$l->setInestado($this);
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

				$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		}
		$this->lastInprofesCriteria = $criteria;

		return $this->collInprofess;
	}


	
	public function getInprofessJoinInparroquia($criteria = null, $con = null)
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

				$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInparroquia($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInparroquia($criteria, $con);
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

				$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInespeci($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INESTADO_ID, $this->getId());

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

				$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

				InempresaPeer::addSelectColumns($criteria);
				$this->collInempresas = InempresaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

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

		$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

		return InempresaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInempresa(Inempresa $l)
	{
		$this->collInempresas[] = $l;
		$l->setInestado($this);
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

				$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinIntipemp($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinIntipemp($criteria, $con);
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

				$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}


	
	public function getInempresasJoinInparroquia($criteria = null, $con = null)
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

				$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInparroquia($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INESTADO_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInparroquia($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}

} 