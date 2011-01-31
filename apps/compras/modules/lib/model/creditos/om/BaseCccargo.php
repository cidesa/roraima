<?php


abstract class BaseCccargo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomcar;


	
	protected $descar;

	
	protected $collCcbenefis;

	
	protected $lastCcbenefiCriteria = null;

	
	protected $collCcperbens;

	
	protected $lastCcperbenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomcar()
  {

    return trim($this->nomcar);

  }
  
  public function getDescar()
  {

    return trim($this->descar);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CccargoPeer::ID;
      }
  
	} 
	
	public function setNomcar($v)
	{

    if ($this->nomcar !== $v) {
        $this->nomcar = $v;
        $this->modifiedColumns[] = CccargoPeer::NOMCAR;
      }
  
	} 
	
	public function setDescar($v)
	{

    if ($this->descar !== $v) {
        $this->descar = $v;
        $this->modifiedColumns[] = CccargoPeer::DESCAR;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomcar = $rs->getString($startcol + 1);

      $this->descar = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cccargo object", $e);
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
			$con = Propel::getConnection(CccargoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CccargoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CccargoPeer::DATABASE_NAME);
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
					$pk = CccargoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CccargoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbenefis !== null) {
				foreach($this->collCcbenefis as $referrerFK) {
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


			if (($retval = CccargoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbenefis !== null) {
					foreach($this->collCcbenefis as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccargoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomcar();
				break;
			case 2:
				return $this->getDescar();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccargoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomcar(),
			$keys[2] => $this->getDescar(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CccargoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomcar($value);
				break;
			case 2:
				$this->setDescar($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CccargoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescar($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CccargoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CccargoPeer::ID)) $criteria->add(CccargoPeer::ID, $this->id);
		if ($this->isColumnModified(CccargoPeer::NOMCAR)) $criteria->add(CccargoPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(CccargoPeer::DESCAR)) $criteria->add(CccargoPeer::DESCAR, $this->descar);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CccargoPeer::DATABASE_NAME);

		$criteria->add(CccargoPeer::ID, $this->id);

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

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setDescar($this->descar);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbenefis() as $relObj) {
				$copyObj->addCcbenefi($relObj->copy($deepCopy));
			}

			foreach($this->getCcperbens() as $relObj) {
				$copyObj->addCcperben($relObj->copy($deepCopy));
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
			self::$peer = new CccargoPeer();
		}
		return self::$peer;
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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				CcbenefiPeer::addSelectColumns($criteria);
				$this->collCcbenefis = CcbenefiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

		$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

		return CcbenefiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbenefi(Ccbenefi $l)
	{
		$this->collCcbenefis[] = $l;
		$l->setCccargo($this);
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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcestciv($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcsececo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcorimatpri($criteria, $con);
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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcubiadm($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbenefiPeer::CCCARGO_ID, $this->getId());

			if (!isset($this->lastCcbenefiCriteria) || !$this->lastCcbenefiCriteria->equals($criteria)) {
				$this->collCcbenefis = CcbenefiPeer::doSelectJoinCcciudad($criteria, $con);
			}
		}
		$this->lastCcbenefiCriteria = $criteria;

		return $this->collCcbenefis;
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

				$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

				CcperbenPeer::addSelectColumns($criteria);
				$this->collCcperbens = CcperbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

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

		$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

		return CcperbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcperben(Ccperben $l)
	{
		$this->collCcperbens[] = $l;
		$l->setCccargo($this);
	}


	
	public function getCcperbensJoinCcperpre($criteria = null, $con = null)
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

				$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcperpre($criteria, $con);
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

				$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

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

				$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

				$this->collCcperbens = CcperbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcperbenPeer::CCCARGO_ID, $this->getId());

			if (!isset($this->lastCcperbenCriteria) || !$this->lastCcperbenCriteria->equals($criteria)) {
				$this->collCcperbens = CcperbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcperbenCriteria = $criteria;

		return $this->collCcperbens;
	}

} 