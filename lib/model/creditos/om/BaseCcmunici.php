<?php


abstract class BaseCcmunici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nommun;


	
	protected $ccestado_id;

	
	protected $aCcestado;

	
	protected $collCcparroqs;

	
	protected $lastCcparroqCriteria = null;

	
	protected $collCcregnots;

	
	protected $lastCcregnotCriteria = null;

	
	protected $collCcsolicis;

	
	protected $lastCcsoliciCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNommun()
  {

    return trim($this->nommun);

  }
  
  public function getCcestadoId()
  {

    return $this->ccestado_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcmuniciPeer::ID;
      }
  
	} 
	
	public function setNommun($v)
	{

    if ($this->nommun !== $v) {
        $this->nommun = $v;
        $this->modifiedColumns[] = CcmuniciPeer::NOMMUN;
      }
  
	} 
	
	public function setCcestadoId($v)
	{

    if ($this->ccestado_id !== $v) {
        $this->ccestado_id = $v;
        $this->modifiedColumns[] = CcmuniciPeer::CCESTADO_ID;
      }
  
		if ($this->aCcestado !== null && $this->aCcestado->getId() !== $v) {
			$this->aCcestado = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nommun = $rs->getString($startcol + 1);

      $this->ccestado_id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccmunici object", $e);
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
			$con = Propel::getConnection(CcmuniciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcmuniciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcmuniciPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcmuniciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcmuniciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcparroqs !== null) {
				foreach($this->collCcparroqs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcregnots !== null) {
				foreach($this->collCcregnots as $referrerFK) {
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


			if (($retval = CcmuniciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcparroqs !== null) {
					foreach($this->collCcparroqs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcregnots !== null) {
					foreach($this->collCcregnots as $referrerFK) {
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
		$pos = CcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNommun();
				break;
			case 2:
				return $this->getCcestadoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcmuniciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNommun(),
			$keys[2] => $this->getCcestadoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcmuniciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNommun($value);
				break;
			case 2:
				$this->setCcestadoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcmuniciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNommun($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcestadoId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcmuniciPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcmuniciPeer::ID)) $criteria->add(CcmuniciPeer::ID, $this->id);
		if ($this->isColumnModified(CcmuniciPeer::NOMMUN)) $criteria->add(CcmuniciPeer::NOMMUN, $this->nommun);
		if ($this->isColumnModified(CcmuniciPeer::CCESTADO_ID)) $criteria->add(CcmuniciPeer::CCESTADO_ID, $this->ccestado_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcmuniciPeer::DATABASE_NAME);

		$criteria->add(CcmuniciPeer::ID, $this->id);

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

		$copyObj->setNommun($this->nommun);

		$copyObj->setCcestadoId($this->ccestado_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcparroqs() as $relObj) {
				$copyObj->addCcparroq($relObj->copy($deepCopy));
			}

			foreach($this->getCcregnots() as $relObj) {
				$copyObj->addCcregnot($relObj->copy($deepCopy));
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
			self::$peer = new CcmuniciPeer();
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

	
	public function initCcparroqs()
	{
		if ($this->collCcparroqs === null) {
			$this->collCcparroqs = array();
		}
	}

	
	public function getCcparroqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparroqs === null) {
			if ($this->isNew()) {
			   $this->collCcparroqs = array();
			} else {

				$criteria->add(CcparroqPeer::CCMUNICI_ID, $this->getId());

				CcparroqPeer::addSelectColumns($criteria);
				$this->collCcparroqs = CcparroqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparroqPeer::CCMUNICI_ID, $this->getId());

				CcparroqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparroqCriteria) || !$this->lastCcparroqCriteria->equals($criteria)) {
					$this->collCcparroqs = CcparroqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparroqCriteria = $criteria;
		return $this->collCcparroqs;
	}

	
	public function countCcparroqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparroqPeer::CCMUNICI_ID, $this->getId());

		return CcparroqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparroq(Ccparroq $l)
	{
		$this->collCcparroqs[] = $l;
		$l->setCcmunici($this);
	}

	
	public function initCcregnots()
	{
		if ($this->collCcregnots === null) {
			$this->collCcregnots = array();
		}
	}

	
	public function getCcregnots($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcregnotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcregnots === null) {
			if ($this->isNew()) {
			   $this->collCcregnots = array();
			} else {

				$criteria->add(CcregnotPeer::CCMUNICI_ID, $this->getId());

				CcregnotPeer::addSelectColumns($criteria);
				$this->collCcregnots = CcregnotPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcregnotPeer::CCMUNICI_ID, $this->getId());

				CcregnotPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcregnotCriteria) || !$this->lastCcregnotCriteria->equals($criteria)) {
					$this->collCcregnots = CcregnotPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcregnotCriteria = $criteria;
		return $this->collCcregnots;
	}

	
	public function countCcregnots($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcregnotPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcregnotPeer::CCMUNICI_ID, $this->getId());

		return CcregnotPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcregnot(Ccregnot $l)
	{
		$this->collCcregnots[] = $l;
		$l->setCcmunici($this);
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

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

				CcsoliciPeer::addSelectColumns($criteria);
				$this->collCcsolicis = CcsoliciPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

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

		$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

		return CcsoliciPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolici(Ccsolici $l)
	{
		$this->collCcsolicis[] = $l;
		$l->setCcmunici($this);
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

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

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

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}


	
	public function getCcsolicisJoinCcciudad($criteria = null, $con = null)
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

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCcciudad($criteria, $con);
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

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccircuito($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

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

				$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->getId());

			if (!isset($this->lastCcsoliciCriteria) || !$this->lastCcsoliciCriteria->equals($criteria)) {
				$this->collCcsolicis = CcsoliciPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCcsoliciCriteria = $criteria;

		return $this->collCcsolicis;
	}

} 