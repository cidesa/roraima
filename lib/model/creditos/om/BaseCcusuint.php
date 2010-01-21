<?php


abstract class BaseCcusuint extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomusuint;


	
	protected $contras;


	
	protected $cedusuint;


	
	protected $login;


	
	protected $ccperpre_id;

	
	protected $aCcperpre;

	
	protected $collCcasiganas;

	
	protected $lastCcasiganaCriteria = null;

	
	protected $collCcestcres;

	
	protected $lastCcestcreCriteria = null;

	
	protected $collCcestcreds;

	
	protected $lastCcestcredCriteria = null;

	
	protected $collCcgescobs;

	
	protected $lastCcgescobCriteria = null;

	
	protected $collCcreccres;

	
	protected $lastCcreccreCriteria = null;

	
	protected $collCcsolliqs;

	
	protected $lastCcsolliqCriteria = null;

	
	protected $collCcusugers;

	
	protected $lastCcusugerCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomusuint()
  {

    return trim($this->nomusuint);

  }
  
  public function getContras()
  {

    return trim($this->contras);

  }
  
  public function getCedusuint()
  {

    return trim($this->cedusuint);

  }
  
  public function getLogin()
  {

    return trim($this->login);

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcusuintPeer::ID;
      }
  
	} 
	
	public function setNomusuint($v)
	{

    if ($this->nomusuint !== $v) {
        $this->nomusuint = $v;
        $this->modifiedColumns[] = CcusuintPeer::NOMUSUINT;
      }
  
	} 
	
	public function setContras($v)
	{

    if ($this->contras !== $v) {
        $this->contras = $v;
        $this->modifiedColumns[] = CcusuintPeer::CONTRAS;
      }
  
	} 
	
	public function setCedusuint($v)
	{

    if ($this->cedusuint !== $v) {
        $this->cedusuint = $v;
        $this->modifiedColumns[] = CcusuintPeer::CEDUSUINT;
      }
  
	} 
	
	public function setLogin($v)
	{

    if ($this->login !== $v) {
        $this->login = $v;
        $this->modifiedColumns[] = CcusuintPeer::LOGIN;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcusuintPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomusuint = $rs->getString($startcol + 1);

      $this->contras = $rs->getString($startcol + 2);

      $this->cedusuint = $rs->getString($startcol + 3);

      $this->login = $rs->getString($startcol + 4);

      $this->ccperpre_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccusuint object", $e);
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
			$con = Propel::getConnection(CcusuintPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcusuintPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcusuintPeer::DATABASE_NAME);
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


												
			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcusuintPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcusuintPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcasiganas !== null) {
				foreach($this->collCcasiganas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcres !== null) {
				foreach($this->collCcestcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcreds !== null) {
				foreach($this->collCcestcreds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgescobs !== null) {
				foreach($this->collCcgescobs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcreccres !== null) {
				foreach($this->collCcreccres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolliqs !== null) {
				foreach($this->collCcsolliqs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcusugers !== null) {
				foreach($this->collCcusugers as $referrerFK) {
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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}


			if (($retval = CcusuintPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcasiganas !== null) {
					foreach($this->collCcasiganas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcres !== null) {
					foreach($this->collCcestcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcreds !== null) {
					foreach($this->collCcestcreds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgescobs !== null) {
					foreach($this->collCcgescobs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcreccres !== null) {
					foreach($this->collCcreccres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolliqs !== null) {
					foreach($this->collCcsolliqs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcusugers !== null) {
					foreach($this->collCcusugers as $referrerFK) {
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
		$pos = CcusuintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomusuint();
				break;
			case 2:
				return $this->getContras();
				break;
			case 3:
				return $this->getCedusuint();
				break;
			case 4:
				return $this->getLogin();
				break;
			case 5:
				return $this->getCcperpreId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcusuintPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomusuint(),
			$keys[2] => $this->getContras(),
			$keys[3] => $this->getCedusuint(),
			$keys[4] => $this->getLogin(),
			$keys[5] => $this->getCcperpreId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcusuintPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomusuint($value);
				break;
			case 2:
				$this->setContras($value);
				break;
			case 3:
				$this->setCedusuint($value);
				break;
			case 4:
				$this->setLogin($value);
				break;
			case 5:
				$this->setCcperpreId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcusuintPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomusuint($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setContras($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCedusuint($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLogin($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCcperpreId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcusuintPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcusuintPeer::ID)) $criteria->add(CcusuintPeer::ID, $this->id);
		if ($this->isColumnModified(CcusuintPeer::NOMUSUINT)) $criteria->add(CcusuintPeer::NOMUSUINT, $this->nomusuint);
		if ($this->isColumnModified(CcusuintPeer::CONTRAS)) $criteria->add(CcusuintPeer::CONTRAS, $this->contras);
		if ($this->isColumnModified(CcusuintPeer::CEDUSUINT)) $criteria->add(CcusuintPeer::CEDUSUINT, $this->cedusuint);
		if ($this->isColumnModified(CcusuintPeer::LOGIN)) $criteria->add(CcusuintPeer::LOGIN, $this->login);
		if ($this->isColumnModified(CcusuintPeer::CCPERPRE_ID)) $criteria->add(CcusuintPeer::CCPERPRE_ID, $this->ccperpre_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcusuintPeer::DATABASE_NAME);

		$criteria->add(CcusuintPeer::ID, $this->id);

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

		$copyObj->setNomusuint($this->nomusuint);

		$copyObj->setContras($this->contras);

		$copyObj->setCedusuint($this->cedusuint);

		$copyObj->setLogin($this->login);

		$copyObj->setCcperpreId($this->ccperpre_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcasiganas() as $relObj) {
				$copyObj->addCcasigana($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcres() as $relObj) {
				$copyObj->addCcestcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcreds() as $relObj) {
				$copyObj->addCcestcred($relObj->copy($deepCopy));
			}

			foreach($this->getCcgescobs() as $relObj) {
				$copyObj->addCcgescob($relObj->copy($deepCopy));
			}

			foreach($this->getCcreccres() as $relObj) {
				$copyObj->addCcreccre($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolliqs() as $relObj) {
				$copyObj->addCcsolliq($relObj->copy($deepCopy));
			}

			foreach($this->getCcusugers() as $relObj) {
				$copyObj->addCcusuger($relObj->copy($deepCopy));
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
			self::$peer = new CcusuintPeer();
		}
		return self::$peer;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
	}

	
	public function initCcasiganas()
	{
		if ($this->collCcasiganas === null) {
			$this->collCcasiganas = array();
		}
	}

	
	public function getCcasiganas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
			   $this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
					$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcasiganaCriteria = $criteria;
		return $this->collCcasiganas;
	}

	
	public function countCcasiganas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

		return CcasiganaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcasigana(Ccasigana $l)
	{
		$this->collCcasiganas[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcasiganasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}

	
	public function initCcestcres()
	{
		if ($this->collCcestcres === null) {
			$this->collCcestcres = array();
		}
	}

	
	public function getCcestcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
			   $this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

				CcestcrePeer::addSelectColumns($criteria);
				$this->collCcestcres = CcestcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

				CcestcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
					$this->collCcestcres = CcestcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcreCriteria = $criteria;
		return $this->collCcestcres;
	}

	
	public function countCcestcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

		return CcestcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcre(Ccestcre $l)
	{
		$this->collCcestcres[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcestcresJoinCcestatu($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
				$this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcres = CcestcrePeer::doSelectJoinCcestatu($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
				$this->collCcestcres = CcestcrePeer::doSelectJoinCcestatu($criteria, $con);
			}
		}
		$this->lastCcestcreCriteria = $criteria;

		return $this->collCcestcres;
	}


	
	public function getCcestcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcres === null) {
			if ($this->isNew()) {
				$this->collCcestcres = array();
			} else {

				$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcres = CcestcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcrePeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcreCriteria) || !$this->lastCcestcreCriteria->equals($criteria)) {
				$this->collCcestcres = CcestcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcestcreCriteria = $criteria;

		return $this->collCcestcres;
	}

	
	public function initCcestcreds()
	{
		if ($this->collCcestcreds === null) {
			$this->collCcestcreds = array();
		}
	}

	
	public function getCcestcreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
			   $this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				$this->collCcestcreds = CcestcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
					$this->collCcestcreds = CcestcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcredCriteria = $criteria;
		return $this->collCcestcreds;
	}

	
	public function countCcestcreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

		return CcestcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcred(Ccestcred $l)
	{
		$this->collCcestcreds[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcestcredsJoinCcestatuRelatedByCcestatuId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcgerencRelatedByCcgerencoriId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcgerencRelatedByCcgerencdesId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcestatuRelatedByCcestsigId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}

	
	public function initCcgescobs()
	{
		if ($this->collCcgescobs === null) {
			$this->collCcgescobs = array();
		}
	}

	
	public function getCcgescobs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
			   $this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				CcgescobPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
					$this->collCcgescobs = CcgescobPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgescobCriteria = $criteria;
		return $this->collCcgescobs;
	}

	
	public function countCcgescobs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

		return CcgescobPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgescob(Ccgescob $l)
	{
		$this->collCcgescobs[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcgescobsJoinCcclaact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcclaact($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcactana($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcactana($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCctiptra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCctiptra($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}


	
	public function getCcgescobsJoinCcestado($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgescobPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgescobs === null) {
			if ($this->isNew()) {
				$this->collCcgescobs = array();
			} else {

				$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgescobPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcgescobCriteria) || !$this->lastCcgescobCriteria->equals($criteria)) {
				$this->collCcgescobs = CcgescobPeer::doSelectJoinCcestado($criteria, $con);
			}
		}
		$this->lastCcgescobCriteria = $criteria;

		return $this->collCcgescobs;
	}

	
	public function initCcreccres()
	{
		if ($this->collCcreccres === null) {
			$this->collCcreccres = array();
		}
	}

	
	public function getCcreccres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcreccres === null) {
			if ($this->isNew()) {
			   $this->collCcreccres = array();
			} else {

				$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

				CcreccrePeer::addSelectColumns($criteria);
				$this->collCcreccres = CcreccrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

				CcreccrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
					$this->collCcreccres = CcreccrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcreccreCriteria = $criteria;
		return $this->collCcreccres;
	}

	
	public function countCcreccres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

		return CcreccrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcreccre(Ccreccre $l)
	{
		$this->collCcreccres[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcreccresJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcreccres === null) {
			if ($this->isNew()) {
				$this->collCcreccres = array();
			} else {

				$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

				$this->collCcreccres = CcreccrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
				$this->collCcreccres = CcreccrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcreccreCriteria = $criteria;

		return $this->collCcreccres;
	}


	
	public function getCcreccresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcreccrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcreccres === null) {
			if ($this->isNew()) {
				$this->collCcreccres = array();
			} else {

				$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

				$this->collCcreccres = CcreccrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcreccrePeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
				$this->collCcreccres = CcreccrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcreccreCriteria = $criteria;

		return $this->collCcreccres;
	}

	
	public function initCcsolliqs()
	{
		if ($this->collCcsolliqs === null) {
			$this->collCcsolliqs = array();
		}
	}

	
	public function getCcsolliqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

				CcsolliqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
					$this->collCcsolliqs = CcsolliqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqCriteria = $criteria;
		return $this->collCcsolliqs;
	}

	
	public function countCcsolliqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

		return CcsolliqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliq(Ccsolliq $l)
	{
		$this->collCcsolliqs[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcsolliqsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCcsoldes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCcsoldes($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}


	
	public function getCcsolliqsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqs === null) {
			if ($this->isNew()) {
				$this->collCcsolliqs = array();
			} else {

				$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcsolliqCriteria) || !$this->lastCcsolliqCriteria->equals($criteria)) {
				$this->collCcsolliqs = CcsolliqPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcsolliqCriteria = $criteria;

		return $this->collCcsolliqs;
	}

	
	public function initCcusugers()
	{
		if ($this->collCcusugers === null) {
			$this->collCcusugers = array();
		}
	}

	
	public function getCcusugers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusugerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusugers === null) {
			if ($this->isNew()) {
			   $this->collCcusugers = array();
			} else {

				$criteria->add(CcusugerPeer::CCUSUINT_ID, $this->getId());

				CcusugerPeer::addSelectColumns($criteria);
				$this->collCcusugers = CcusugerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcusugerPeer::CCUSUINT_ID, $this->getId());

				CcusugerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcusugerCriteria) || !$this->lastCcusugerCriteria->equals($criteria)) {
					$this->collCcusugers = CcusugerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcusugerCriteria = $criteria;
		return $this->collCcusugers;
	}

	
	public function countCcusugers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusugerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcusugerPeer::CCUSUINT_ID, $this->getId());

		return CcusugerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcusuger(Ccusuger $l)
	{
		$this->collCcusugers[] = $l;
		$l->setCcusuint($this);
	}


	
	public function getCcusugersJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcusugerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcusugers === null) {
			if ($this->isNew()) {
				$this->collCcusugers = array();
			} else {

				$criteria->add(CcusugerPeer::CCUSUINT_ID, $this->getId());

				$this->collCcusugers = CcusugerPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcusugerPeer::CCUSUINT_ID, $this->getId());

			if (!isset($this->lastCcusugerCriteria) || !$this->lastCcusugerCriteria->equals($criteria)) {
				$this->collCcusugers = CcusugerPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcusugerCriteria = $criteria;

		return $this->collCcusugers;
	}

} 