<?php


abstract class BaseCcrecaud extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomrec;


	
	protected $desrec;


	
	protected $alias;

	
	protected $collCcreccres;

	
	protected $lastCcreccreCriteria = null;

	
	protected $collCcrecdess;

	
	protected $lastCcrecdesCriteria = null;

	
	protected $collCcrecpros;

	
	protected $lastCcrecproCriteria = null;

	
	protected $collCcrecprocres;

	
	protected $lastCcrecprocreCriteria = null;

	
	protected $collCcrecsols;

	
	protected $lastCcrecsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomrec()
  {

    return trim($this->nomrec);

  }
  
  public function getDesrec()
  {

    return trim($this->desrec);

  }
  
  public function getAlias()
  {

    return trim($this->alias);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrecaudPeer::ID;
      }
  
	} 
	
	public function setNomrec($v)
	{

    if ($this->nomrec !== $v) {
        $this->nomrec = $v;
        $this->modifiedColumns[] = CcrecaudPeer::NOMREC;
      }
  
	} 
	
	public function setDesrec($v)
	{

    if ($this->desrec !== $v) {
        $this->desrec = $v;
        $this->modifiedColumns[] = CcrecaudPeer::DESREC;
      }
  
	} 
	
	public function setAlias($v)
	{

    if ($this->alias !== $v) {
        $this->alias = $v;
        $this->modifiedColumns[] = CcrecaudPeer::ALIAS;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomrec = $rs->getString($startcol + 1);

      $this->desrec = $rs->getString($startcol + 2);

      $this->alias = $rs->getString($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrecaud object", $e);
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
			$con = Propel::getConnection(CcrecaudPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrecaudPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrecaudPeer::DATABASE_NAME);
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
					$pk = CcrecaudPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrecaudPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcreccres !== null) {
				foreach($this->collCcreccres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecdess !== null) {
				foreach($this->collCcrecdess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecpros !== null) {
				foreach($this->collCcrecpros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecprocres !== null) {
				foreach($this->collCcrecprocres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecsols !== null) {
				foreach($this->collCcrecsols as $referrerFK) {
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


			if (($retval = CcrecaudPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcreccres !== null) {
					foreach($this->collCcreccres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecdess !== null) {
					foreach($this->collCcrecdess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecpros !== null) {
					foreach($this->collCcrecpros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecprocres !== null) {
					foreach($this->collCcrecprocres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecsols !== null) {
					foreach($this->collCcrecsols as $referrerFK) {
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
		$pos = CcrecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomrec();
				break;
			case 2:
				return $this->getDesrec();
				break;
			case 3:
				return $this->getAlias();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecaudPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomrec(),
			$keys[2] => $this->getDesrec(),
			$keys[3] => $this->getAlias(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecaudPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomrec($value);
				break;
			case 2:
				$this->setDesrec($value);
				break;
			case 3:
				$this->setAlias($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecaudPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomrec($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesrec($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlias($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrecaudPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrecaudPeer::ID)) $criteria->add(CcrecaudPeer::ID, $this->id);
		if ($this->isColumnModified(CcrecaudPeer::NOMREC)) $criteria->add(CcrecaudPeer::NOMREC, $this->nomrec);
		if ($this->isColumnModified(CcrecaudPeer::DESREC)) $criteria->add(CcrecaudPeer::DESREC, $this->desrec);
		if ($this->isColumnModified(CcrecaudPeer::ALIAS)) $criteria->add(CcrecaudPeer::ALIAS, $this->alias);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrecaudPeer::DATABASE_NAME);

		$criteria->add(CcrecaudPeer::ID, $this->id);

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

		$copyObj->setNomrec($this->nomrec);

		$copyObj->setDesrec($this->desrec);

		$copyObj->setAlias($this->alias);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcreccres() as $relObj) {
				$copyObj->addCcreccre($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecdess() as $relObj) {
				$copyObj->addCcrecdes($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecpros() as $relObj) {
				$copyObj->addCcrecpro($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecprocres() as $relObj) {
				$copyObj->addCcrecprocre($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecsols() as $relObj) {
				$copyObj->addCcrecsol($relObj->copy($deepCopy));
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
			self::$peer = new CcrecaudPeer();
		}
		return self::$peer;
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

				$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

				CcreccrePeer::addSelectColumns($criteria);
				$this->collCcreccres = CcreccrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

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

		$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

		return CcreccrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcreccre(Ccreccre $l)
	{
		$this->collCcreccres[] = $l;
		$l->setCcrecaud($this);
	}


	
	public function getCcreccresJoinCcusuint($criteria = null, $con = null)
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

				$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

				$this->collCcreccres = CcreccrePeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
				$this->collCcreccres = CcreccrePeer::doSelectJoinCcusuint($criteria, $con);
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

				$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

				$this->collCcreccres = CcreccrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcreccrePeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcreccreCriteria) || !$this->lastCcreccreCriteria->equals($criteria)) {
				$this->collCcreccres = CcreccrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcreccreCriteria = $criteria;

		return $this->collCcreccres;
	}

	
	public function initCcrecdess()
	{
		if ($this->collCcrecdess === null) {
			$this->collCcrecdess = array();
		}
	}

	
	public function getCcrecdess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecdesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecdess === null) {
			if ($this->isNew()) {
			   $this->collCcrecdess = array();
			} else {

				$criteria->add(CcrecdesPeer::CCRECAUD_ID, $this->getId());

				CcrecdesPeer::addSelectColumns($criteria);
				$this->collCcrecdess = CcrecdesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecdesPeer::CCRECAUD_ID, $this->getId());

				CcrecdesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecdesCriteria) || !$this->lastCcrecdesCriteria->equals($criteria)) {
					$this->collCcrecdess = CcrecdesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecdesCriteria = $criteria;
		return $this->collCcrecdess;
	}

	
	public function countCcrecdess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecdesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecdesPeer::CCRECAUD_ID, $this->getId());

		return CcrecdesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecdes(Ccrecdes $l)
	{
		$this->collCcrecdess[] = $l;
		$l->setCcrecaud($this);
	}


	
	public function getCcrecdessJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecdesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecdess === null) {
			if ($this->isNew()) {
				$this->collCcrecdess = array();
			} else {

				$criteria->add(CcrecdesPeer::CCRECAUD_ID, $this->getId());

				$this->collCcrecdess = CcrecdesPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecdesPeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcrecdesCriteria) || !$this->lastCcrecdesCriteria->equals($criteria)) {
				$this->collCcrecdess = CcrecdesPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcrecdesCriteria = $criteria;

		return $this->collCcrecdess;
	}

	
	public function initCcrecpros()
	{
		if ($this->collCcrecpros === null) {
			$this->collCcrecpros = array();
		}
	}

	
	public function getCcrecpros($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecpros === null) {
			if ($this->isNew()) {
			   $this->collCcrecpros = array();
			} else {

				$criteria->add(CcrecproPeer::CCRECAUD_ID, $this->getId());

				CcrecproPeer::addSelectColumns($criteria);
				$this->collCcrecpros = CcrecproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecproPeer::CCRECAUD_ID, $this->getId());

				CcrecproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecproCriteria) || !$this->lastCcrecproCriteria->equals($criteria)) {
					$this->collCcrecpros = CcrecproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecproCriteria = $criteria;
		return $this->collCcrecpros;
	}

	
	public function countCcrecpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecproPeer::CCRECAUD_ID, $this->getId());

		return CcrecproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecpro(Ccrecpro $l)
	{
		$this->collCcrecpros[] = $l;
		$l->setCcrecaud($this);
	}


	
	public function getCcrecprosJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecpros === null) {
			if ($this->isNew()) {
				$this->collCcrecpros = array();
			} else {

				$criteria->add(CcrecproPeer::CCRECAUD_ID, $this->getId());

				$this->collCcrecpros = CcrecproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecproPeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcrecproCriteria) || !$this->lastCcrecproCriteria->equals($criteria)) {
				$this->collCcrecpros = CcrecproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcrecproCriteria = $criteria;

		return $this->collCcrecpros;
	}

	
	public function initCcrecprocres()
	{
		if ($this->collCcrecprocres === null) {
			$this->collCcrecprocres = array();
		}
	}

	
	public function getCcrecprocres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
			   $this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

				CcrecprocrePeer::addSelectColumns($criteria);
				$this->collCcrecprocres = CcrecprocrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

				CcrecprocrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
					$this->collCcrecprocres = CcrecprocrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;
		return $this->collCcrecprocres;
	}

	
	public function countCcrecprocres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

		return CcrecprocrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecprocre(Ccrecprocre $l)
	{
		$this->collCcrecprocres[] = $l;
		$l->setCcrecaud($this);
	}


	
	public function getCcrecprocresJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
				$this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;

		return $this->collCcrecprocres;
	}


	
	public function getCcrecprocresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
				$this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecprocrePeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;

		return $this->collCcrecprocres;
	}

	
	public function initCcrecsols()
	{
		if ($this->collCcrecsols === null) {
			$this->collCcrecsols = array();
		}
	}

	
	public function getCcrecsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecsols === null) {
			if ($this->isNew()) {
			   $this->collCcrecsols = array();
			} else {

				$criteria->add(CcrecsolPeer::CCRECAUD_ID, $this->getId());

				CcrecsolPeer::addSelectColumns($criteria);
				$this->collCcrecsols = CcrecsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecsolPeer::CCRECAUD_ID, $this->getId());

				CcrecsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecsolCriteria) || !$this->lastCcrecsolCriteria->equals($criteria)) {
					$this->collCcrecsols = CcrecsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecsolCriteria = $criteria;
		return $this->collCcrecsols;
	}

	
	public function countCcrecsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecsolPeer::CCRECAUD_ID, $this->getId());

		return CcrecsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecsol(Ccrecsol $l)
	{
		$this->collCcrecsols[] = $l;
		$l->setCcrecaud($this);
	}


	
	public function getCcrecsolsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecsols === null) {
			if ($this->isNew()) {
				$this->collCcrecsols = array();
			} else {

				$criteria->add(CcrecsolPeer::CCRECAUD_ID, $this->getId());

				$this->collCcrecsols = CcrecsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecsolPeer::CCRECAUD_ID, $this->getId());

			if (!isset($this->lastCcrecsolCriteria) || !$this->lastCcrecsolCriteria->equals($criteria)) {
				$this->collCcrecsols = CcrecsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcrecsolCriteria = $criteria;

		return $this->collCcrecsols;
	}

} 