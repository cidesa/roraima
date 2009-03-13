<?php


abstract class BaseInmunicipio extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $inestado_id;


	
	protected $codmun;


	
	protected $nommun;


	
	protected $id;

	
	protected $aInestado;

	
	protected $collInparroquias;

	
	protected $lastInparroquiaCriteria = null;

	
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
  
  public function getCodmun()
  {

    return trim($this->codmun);

  }
  
  public function getNommun()
  {

    return trim($this->nommun);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setInestadoId($v)
	{

    if ($this->inestado_id !== $v) {
        $this->inestado_id = $v;
        $this->modifiedColumns[] = InmunicipioPeer::INESTADO_ID;
      }
  
		if ($this->aInestado !== null && $this->aInestado->getId() !== $v) {
			$this->aInestado = null;
		}

	} 
	
	public function setCodmun($v)
	{

    if ($this->codmun !== $v) {
        $this->codmun = $v;
        $this->modifiedColumns[] = InmunicipioPeer::CODMUN;
      }
  
	} 
	
	public function setNommun($v)
	{

    if ($this->nommun !== $v) {
        $this->nommun = $v;
        $this->modifiedColumns[] = InmunicipioPeer::NOMMUN;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InmunicipioPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->inestado_id = $rs->getInt($startcol + 0);

      $this->codmun = $rs->getString($startcol + 1);

      $this->nommun = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inmunicipio object", $e);
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
			$con = Propel::getConnection(InmunicipioPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InmunicipioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InmunicipioPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = InmunicipioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InmunicipioPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aInestado !== null) {
				if (!$this->aInestado->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInestado->getValidationFailures());
				}
			}


			if (($retval = InmunicipioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = InmunicipioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getInestadoId();
				break;
			case 1:
				return $this->getCodmun();
				break;
			case 2:
				return $this->getNommun();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InmunicipioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getInestadoId(),
			$keys[1] => $this->getCodmun(),
			$keys[2] => $this->getNommun(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InmunicipioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setInestadoId($value);
				break;
			case 1:
				$this->setCodmun($value);
				break;
			case 2:
				$this->setNommun($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InmunicipioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setInestadoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodmun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNommun($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InmunicipioPeer::DATABASE_NAME);

		if ($this->isColumnModified(InmunicipioPeer::INESTADO_ID)) $criteria->add(InmunicipioPeer::INESTADO_ID, $this->inestado_id);
		if ($this->isColumnModified(InmunicipioPeer::CODMUN)) $criteria->add(InmunicipioPeer::CODMUN, $this->codmun);
		if ($this->isColumnModified(InmunicipioPeer::NOMMUN)) $criteria->add(InmunicipioPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(InmunicipioPeer::ID)) $criteria->add(InmunicipioPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InmunicipioPeer::DATABASE_NAME);

		$criteria->add(InmunicipioPeer::ID, $this->id);

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

		$copyObj->setCodmun($this->codmun);

		$copyObj->setNommun($this->nommun);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new InmunicipioPeer();
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

				$criteria->add(InparroquiaPeer::INMUNICIPIO_ID, $this->getId());

				InparroquiaPeer::addSelectColumns($criteria);
				$this->collInparroquias = InparroquiaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InparroquiaPeer::INMUNICIPIO_ID, $this->getId());

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

		$criteria->add(InparroquiaPeer::INMUNICIPIO_ID, $this->getId());

		return InparroquiaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInparroquia(Inparroquia $l)
	{
		$this->collInparroquias[] = $l;
		$l->setInmunicipio($this);
	}


	
	public function getInparroquiasJoinInestado($criteria = null, $con = null)
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

				$criteria->add(InparroquiaPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInparroquias = InparroquiaPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InparroquiaPeer::INMUNICIPIO_ID, $this->getId());

			if (!isset($this->lastInparroquiaCriteria) || !$this->lastInparroquiaCriteria->equals($criteria)) {
				$this->collInparroquias = InparroquiaPeer::doSelectJoinInestado($criteria, $con);
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

				$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

				InprofesPeer::addSelectColumns($criteria);
				$this->collInprofess = InprofesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

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

		$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

		return InprofesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInprofes(Inprofes $l)
	{
		$this->collInprofess[] = $l;
		$l->setInmunicipio($this);
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

				$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInestado($criteria, $con);
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

				$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInparroquia($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

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

				$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInespeci($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INMUNICIPIO_ID, $this->getId());

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

				$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

				InempresaPeer::addSelectColumns($criteria);
				$this->collInempresas = InempresaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

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

		$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

		return InempresaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInempresa(Inempresa $l)
	{
		$this->collInempresas[] = $l;
		$l->setInmunicipio($this);
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

				$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinIntipemp($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

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

				$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInestado($criteria, $con);
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

				$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

				$this->collInempresas = InempresaPeer::doSelectJoinInparroquia($criteria, $con);
			}
		} else {
									
			$criteria->add(InempresaPeer::INMUNICIPIO_ID, $this->getId());

			if (!isset($this->lastInempresaCriteria) || !$this->lastInempresaCriteria->equals($criteria)) {
				$this->collInempresas = InempresaPeer::doSelectJoinInparroquia($criteria, $con);
			}
		}
		$this->lastInempresaCriteria = $criteria;

		return $this->collInempresas;
	}

} 