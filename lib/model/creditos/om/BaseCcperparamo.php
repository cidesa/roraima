<?php


abstract class BaseCcperparamo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomper;


	
	protected $desper;

	
	protected $collCcpagos;

	
	protected $lastCcpagoCriteria = null;

	
	protected $collCcparamos;

	
	protected $lastCcparamoCriteria = null;

	
	protected $collCcparamopars;

	
	protected $lastCcparamoparCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomper()
  {

    return trim($this->nomper);

  }
  
  public function getDesper()
  {

    return trim($this->desper);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcperparamoPeer::ID;
      }
  
	} 
	
	public function setNomper($v)
	{

    if ($this->nomper !== $v) {
        $this->nomper = $v;
        $this->modifiedColumns[] = CcperparamoPeer::NOMPER;
      }
  
	} 
	
	public function setDesper($v)
	{

    if ($this->desper !== $v) {
        $this->desper = $v;
        $this->modifiedColumns[] = CcperparamoPeer::DESPER;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomper = $rs->getString($startcol + 1);

      $this->desper = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccperparamo object", $e);
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
			$con = Propel::getConnection(CcperparamoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcperparamoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcperparamoPeer::DATABASE_NAME);
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
					$pk = CcperparamoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcperparamoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcpagos !== null) {
				foreach($this->collCcpagos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparamos !== null) {
				foreach($this->collCcparamos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparamopars !== null) {
				foreach($this->collCcparamopars as $referrerFK) {
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


			if (($retval = CcperparamoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcpagos !== null) {
					foreach($this->collCcpagos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparamos !== null) {
					foreach($this->collCcparamos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparamopars !== null) {
					foreach($this->collCcparamopars as $referrerFK) {
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
		$pos = CcperparamoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomper();
				break;
			case 2:
				return $this->getDesper();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperparamoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomper(),
			$keys[2] => $this->getDesper(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcperparamoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomper($value);
				break;
			case 2:
				$this->setDesper($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcperparamoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomper($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesper($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcperparamoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcperparamoPeer::ID)) $criteria->add(CcperparamoPeer::ID, $this->id);
		if ($this->isColumnModified(CcperparamoPeer::NOMPER)) $criteria->add(CcperparamoPeer::NOMPER, $this->nomper);
		if ($this->isColumnModified(CcperparamoPeer::DESPER)) $criteria->add(CcperparamoPeer::DESPER, $this->desper);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcperparamoPeer::DATABASE_NAME);

		$criteria->add(CcperparamoPeer::ID, $this->id);

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

		$copyObj->setNomper($this->nomper);

		$copyObj->setDesper($this->desper);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcpagos() as $relObj) {
				$copyObj->addCcpago($relObj->copy($deepCopy));
			}

			foreach($this->getCcparamos() as $relObj) {
				$copyObj->addCcparamo($relObj->copy($deepCopy));
			}

			foreach($this->getCcparamopars() as $relObj) {
				$copyObj->addCcparamopar($relObj->copy($deepCopy));
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
			self::$peer = new CcperparamoPeer();
		}
		return self::$peer;
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

				$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

				CcpagoPeer::addSelectColumns($criteria);
				$this->collCcpagos = CcpagoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

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

		$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

		return CcpagoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcpago(Ccpago $l)
	{
		$this->collCcpagos[] = $l;
		$l->setCcperparamo($this);
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

				$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}


	
	public function getCcpagosJoinCcperpre($criteria = null, $con = null)
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

				$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCcperpre($criteria, $con);
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

				$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

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

				$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

				$this->collCcpagos = CcpagoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcpagoPeer::CCPERPARAMO_ID, $this->getId());

			if (!isset($this->lastCcpagoCriteria) || !$this->lastCcpagoCriteria->equals($criteria)) {
				$this->collCcpagos = CcpagoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcpagoCriteria = $criteria;

		return $this->collCcpagos;
	}

	
	public function initCcparamos()
	{
		if ($this->collCcparamos === null) {
			$this->collCcparamos = array();
		}
	}

	
	public function getCcparamos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparamos === null) {
			if ($this->isNew()) {
			   $this->collCcparamos = array();
			} else {

				$criteria->add(CcparamoPeer::CCPERPARAMO_ID, $this->getId());

				CcparamoPeer::addSelectColumns($criteria);
				$this->collCcparamos = CcparamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparamoPeer::CCPERPARAMO_ID, $this->getId());

				CcparamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparamoCriteria) || !$this->lastCcparamoCriteria->equals($criteria)) {
					$this->collCcparamos = CcparamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparamoCriteria = $criteria;
		return $this->collCcparamos;
	}

	
	public function countCcparamos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparamoPeer::CCPERPARAMO_ID, $this->getId());

		return CcparamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparamo(Ccparamo $l)
	{
		$this->collCcparamos[] = $l;
		$l->setCcperparamo($this);
	}

	
	public function initCcparamopars()
	{
		if ($this->collCcparamopars === null) {
			$this->collCcparamopars = array();
		}
	}

	
	public function getCcparamopars($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparamoparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparamopars === null) {
			if ($this->isNew()) {
			   $this->collCcparamopars = array();
			} else {

				$criteria->add(CcparamoparPeer::CCPERPARAMO_ID, $this->getId());

				CcparamoparPeer::addSelectColumns($criteria);
				$this->collCcparamopars = CcparamoparPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparamoparPeer::CCPERPARAMO_ID, $this->getId());

				CcparamoparPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparamoparCriteria) || !$this->lastCcparamoparCriteria->equals($criteria)) {
					$this->collCcparamopars = CcparamoparPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparamoparCriteria = $criteria;
		return $this->collCcparamopars;
	}

	
	public function countCcparamopars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparamoparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparamoparPeer::CCPERPARAMO_ID, $this->getId());

		return CcparamoparPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparamopar(Ccparamopar $l)
	{
		$this->collCcparamopars[] = $l;
		$l->setCcperparamo($this);
	}


	
	public function getCcparamoparsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparamoparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparamopars === null) {
			if ($this->isNew()) {
				$this->collCcparamopars = array();
			} else {

				$criteria->add(CcparamoparPeer::CCPERPARAMO_ID, $this->getId());

				$this->collCcparamopars = CcparamoparPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparamoparPeer::CCPERPARAMO_ID, $this->getId());

			if (!isset($this->lastCcparamoparCriteria) || !$this->lastCcparamoparCriteria->equals($criteria)) {
				$this->collCcparamopars = CcparamoparPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparamoparCriteria = $criteria;

		return $this->collCcparamopars;
	}

} 