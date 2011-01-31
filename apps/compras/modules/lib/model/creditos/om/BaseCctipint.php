<?php


abstract class BaseCctipint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomtipint;

	
	protected $collCcdefamos;

	
	protected $lastCcdefamoCriteria = null;

	
	protected $collCcparpros;

	
	protected $lastCcparproCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomtipint()
  {

    return trim($this->nomtipint);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CctipintPeer::ID;
      }
  
	} 
	
	public function setNomtipint($v)
	{

    if ($this->nomtipint !== $v) {
        $this->nomtipint = $v;
        $this->modifiedColumns[] = CctipintPeer::NOMTIPINT;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomtipint = $rs->getString($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cctipint object", $e);
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
			$con = Propel::getConnection(CctipintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CctipintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CctipintPeer::DATABASE_NAME);
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
					$pk = CctipintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CctipintPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcdefamos !== null) {
				foreach($this->collCcdefamos as $referrerFK) {
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


			if (($retval = CctipintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcdefamos !== null) {
					foreach($this->collCcdefamos as $referrerFK) {
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
		$pos = CctipintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomtipint();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomtipint(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CctipintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomtipint($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CctipintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomtipint($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CctipintPeer::DATABASE_NAME);

		if ($this->isColumnModified(CctipintPeer::ID)) $criteria->add(CctipintPeer::ID, $this->id);
		if ($this->isColumnModified(CctipintPeer::NOMTIPINT)) $criteria->add(CctipintPeer::NOMTIPINT, $this->nomtipint);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CctipintPeer::DATABASE_NAME);

		$criteria->add(CctipintPeer::ID, $this->id);

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

		$copyObj->setNomtipint($this->nomtipint);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcdefamos() as $relObj) {
				$copyObj->addCcdefamo($relObj->copy($deepCopy));
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
			self::$peer = new CctipintPeer();
		}
		return self::$peer;
	}

	
	public function initCcdefamos()
	{
		if ($this->collCcdefamos === null) {
			$this->collCcdefamos = array();
		}
	}

	
	public function getCcdefamos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
			   $this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
					$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdefamoCriteria = $criteria;
		return $this->collCcdefamos;
	}

	
	public function countCcdefamos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamo(Ccdefamo $l)
	{
		$this->collCcdefamos[] = $l;
		$l->setCctipint($this);
	}


	
	public function getCcdefamosJoinCcperiodRelatedByCcperiodId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcperiodRelatedByCcpergravaId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcperiodRelatedByFrecuoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
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

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

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

		$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

		return CcparproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparpro(Ccparpro $l)
	{
		$this->collCcparpros[] = $l;
		$l->setCctipint($this);
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

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

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

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

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

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcdeducc($criteria = null, $con = null)
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

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
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

				$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCTIPINT_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}

} 