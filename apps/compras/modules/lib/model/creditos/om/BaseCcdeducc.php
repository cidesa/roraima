<?php


abstract class BaseCcdeducc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomded;


	
	protected $unided;


	
	protected $codcta;


	
	protected $monded;

	
	protected $collCcdedcres;

	
	protected $lastCcdedcreCriteria = null;

	
	protected $collCcparpros;

	
	protected $lastCcparproCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomded()
  {

    return trim($this->nomded);

  }
  
  public function getUnided()
  {

    return trim($this->unided);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getMonded($val=false)
  {

    if($val) return number_format($this->monded,2,',','.');
    else return $this->monded;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdeduccPeer::ID;
      }
  
	} 
	
	public function setNomded($v)
	{

    if ($this->nomded !== $v) {
        $this->nomded = $v;
        $this->modifiedColumns[] = CcdeduccPeer::NOMDED;
      }
  
	} 
	
	public function setUnided($v)
	{

    if ($this->unided !== $v) {
        $this->unided = $v;
        $this->modifiedColumns[] = CcdeduccPeer::UNIDED;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = CcdeduccPeer::CODCTA;
      }
  
	} 
	
	public function setMonded($v)
	{

    if ($this->monded !== $v) {
        $this->monded = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdeduccPeer::MONDED;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomded = $rs->getString($startcol + 1);

      $this->unided = $rs->getString($startcol + 2);

      $this->codcta = $rs->getString($startcol + 3);

      $this->monded = $rs->getFloat($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdeducc object", $e);
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
			$con = Propel::getConnection(CcdeduccPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdeduccPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdeduccPeer::DATABASE_NAME);
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
					$pk = CcdeduccPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdeduccPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdedcres !== null) {
				foreach($this->collCcdedcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparpros !== null) {
				foreach($this->collCcparpros as $referrerFK) {
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


			if (($retval = CcdeduccPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdedcres !== null) {
					foreach($this->collCcdedcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparpros !== null) {
					foreach($this->collCcparpros as $referrerFK) {
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
		$pos = CcdeduccPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomded();
				break;
			case 2:
				return $this->getUnided();
				break;
			case 3:
				return $this->getCodcta();
				break;
			case 4:
				return $this->getMonded();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdeduccPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomded(),
			$keys[2] => $this->getUnided(),
			$keys[3] => $this->getCodcta(),
			$keys[4] => $this->getMonded(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdeduccPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomded($value);
				break;
			case 2:
				$this->setUnided($value);
				break;
			case 3:
				$this->setCodcta($value);
				break;
			case 4:
				$this->setMonded($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdeduccPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomded($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUnided($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonded($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdeduccPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdeduccPeer::ID)) $criteria->add(CcdeduccPeer::ID, $this->id);
		if ($this->isColumnModified(CcdeduccPeer::NOMDED)) $criteria->add(CcdeduccPeer::NOMDED, $this->nomded);
		if ($this->isColumnModified(CcdeduccPeer::UNIDED)) $criteria->add(CcdeduccPeer::UNIDED, $this->unided);
		if ($this->isColumnModified(CcdeduccPeer::CODCTA)) $criteria->add(CcdeduccPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CcdeduccPeer::MONDED)) $criteria->add(CcdeduccPeer::MONDED, $this->monded);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdeduccPeer::DATABASE_NAME);

		$criteria->add(CcdeduccPeer::ID, $this->id);

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

		$copyObj->setNomded($this->nomded);

		$copyObj->setUnided($this->unided);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setMonded($this->monded);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdedcres() as $relObj) {
				$copyObj->addCcdedcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcparpros() as $relObj) {
				$copyObj->addCcparpro($relObj->copy($deepCopy));
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
			self::$peer = new CcdeduccPeer();
		}
		return self::$peer;
	}

	
	public function initCcdedcres()
	{
		if ($this->collCcdedcres === null) {
			$this->collCcdedcres = array();
		}
	}

	
	public function getCcdedcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdedcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdedcres === null) {
			if ($this->isNew()) {
			   $this->collCcdedcres = array();
			} else {

				$criteria->add(CcdedcrePeer::CCDEDUCC_ID, $this->getId());

				CcdedcrePeer::addSelectColumns($criteria);
				$this->collCcdedcres = CcdedcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdedcrePeer::CCDEDUCC_ID, $this->getId());

				CcdedcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdedcreCriteria) || !$this->lastCcdedcreCriteria->equals($criteria)) {
					$this->collCcdedcres = CcdedcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdedcreCriteria = $criteria;
		return $this->collCcdedcres;
	}

	
	public function countCcdedcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdedcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdedcrePeer::CCDEDUCC_ID, $this->getId());

		return CcdedcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdedcre(Ccdedcre $l)
	{
		$this->collCcdedcres[] = $l;
		$l->setCcdeducc($this);
	}


	
	public function getCcdedcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdedcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdedcres === null) {
			if ($this->isNew()) {
				$this->collCcdedcres = array();
			} else {

				$criteria->add(CcdedcrePeer::CCDEDUCC_ID, $this->getId());

				$this->collCcdedcres = CcdedcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdedcrePeer::CCDEDUCC_ID, $this->getId());

			if (!isset($this->lastCcdedcreCriteria) || !$this->lastCcdedcreCriteria->equals($criteria)) {
				$this->collCcdedcres = CcdedcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcdedcreCriteria = $criteria;

		return $this->collCcdedcres;
	}

	
	public function initCcparpros()
	{
		if ($this->collCcparpros === null) {
			$this->collCcparpros = array();
		}
	}

	
	public function getCcparpros($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
			   $this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
					$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparproCriteria = $criteria;
		return $this->collCcparpros;
	}

	
	public function countCcparpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

		return CcparproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparpro(Ccparpro $l)
	{
		$this->collCcparpros[] = $l;
		$l->setCcdeducc($this);
	}


	
	public function getCcparprosJoinContabb($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcperiod($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCDEDUCC_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}

} 