<?php


abstract class BaseCcpartid extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nompar;


	
	protected $codcon;

	
	protected $collCcamoacts;

	
	protected $lastCcamoactCriteria = null;

	
	protected $collCcamoactresps;

	
	protected $lastCcamoactrespCriteria = null;

	
	protected $collCcamopags;

	
	protected $lastCcamopagCriteria = null;

	
	protected $collCcconceps;

	
	protected $lastCcconcepCriteria = null;

	
	protected $collCcconcres;

	
	protected $lastCcconcreCriteria = null;

	
	protected $collCccuadess;

	
	protected $lastCccuadesCriteria = null;

	
	protected $collCcdefamos;

	
	protected $lastCcdefamoCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcparamopars;

	
	protected $lastCcparamoparCriteria = null;

	
	protected $collCcparcres;

	
	protected $lastCcparcreCriteria = null;

	
	protected $collCcparpros;

	
	protected $lastCcparproCriteria = null;

	
	protected $collCcparsols;

	
	protected $lastCcparsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNompar()
  {

    return trim($this->nompar);

  }
  
  public function getCodcon()
  {

    return $this->codcon;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcpartidPeer::ID;
      }
  
	} 
	
	public function setNompar($v)
	{

    if ($this->nompar !== $v) {
        $this->nompar = $v;
        $this->modifiedColumns[] = CcpartidPeer::NOMPAR;
      }
  
	} 
	
	public function setCodcon($v)
	{

    if ($this->codcon !== $v) {
        $this->codcon = $v;
        $this->modifiedColumns[] = CcpartidPeer::CODCON;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nompar = $rs->getString($startcol + 1);

      $this->codcon = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccpartid object", $e);
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
			$con = Propel::getConnection(CcpartidPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcpartidPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcpartidPeer::DATABASE_NAME);
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
					$pk = CcpartidPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcpartidPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcamoacts !== null) {
				foreach($this->collCcamoacts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamoactresps !== null) {
				foreach($this->collCcamoactresps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamopags !== null) {
				foreach($this->collCcamopags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcconceps !== null) {
				foreach($this->collCcconceps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcconcres !== null) {
				foreach($this->collCcconcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccuadess !== null) {
				foreach($this->collCccuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdefamos !== null) {
				foreach($this->collCcdefamos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcliquids !== null) {
				foreach($this->collCcliquids as $referrerFK) {
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

			if ($this->collCcparcres !== null) {
				foreach($this->collCcparcres as $referrerFK) {
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

			if ($this->collCcparsols !== null) {
				foreach($this->collCcparsols as $referrerFK) {
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


			if (($retval = CcpartidPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcamoacts !== null) {
					foreach($this->collCcamoacts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamoactresps !== null) {
					foreach($this->collCcamoactresps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamopags !== null) {
					foreach($this->collCcamopags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcconceps !== null) {
					foreach($this->collCcconceps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcconcres !== null) {
					foreach($this->collCcconcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccuadess !== null) {
					foreach($this->collCccuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdefamos !== null) {
					foreach($this->collCcdefamos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcliquids !== null) {
					foreach($this->collCcliquids as $referrerFK) {
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

				if ($this->collCcparcres !== null) {
					foreach($this->collCcparcres as $referrerFK) {
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

				if ($this->collCcparsols !== null) {
					foreach($this->collCcparsols as $referrerFK) {
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
		$pos = CcpartidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNompar();
				break;
			case 2:
				return $this->getCodcon();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpartidPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNompar(),
			$keys[2] => $this->getCodcon(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcpartidPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNompar($value);
				break;
			case 2:
				$this->setCodcon($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcpartidPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcon($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcpartidPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcpartidPeer::ID)) $criteria->add(CcpartidPeer::ID, $this->id);
		if ($this->isColumnModified(CcpartidPeer::NOMPAR)) $criteria->add(CcpartidPeer::NOMPAR, $this->nompar);
		if ($this->isColumnModified(CcpartidPeer::CODCON)) $criteria->add(CcpartidPeer::CODCON, $this->codcon);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcpartidPeer::DATABASE_NAME);

		$criteria->add(CcpartidPeer::ID, $this->id);

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

		$copyObj->setNompar($this->nompar);

		$copyObj->setCodcon($this->codcon);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamoacts() as $relObj) {
				$copyObj->addCcamoact($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoactresps() as $relObj) {
				$copyObj->addCcamoactresp($relObj->copy($deepCopy));
			}

			foreach($this->getCcamopags() as $relObj) {
				$copyObj->addCcamopag($relObj->copy($deepCopy));
			}

			foreach($this->getCcconceps() as $relObj) {
				$copyObj->addCcconcep($relObj->copy($deepCopy));
			}

			foreach($this->getCcconcres() as $relObj) {
				$copyObj->addCcconcre($relObj->copy($deepCopy));
			}

			foreach($this->getCccuadess() as $relObj) {
				$copyObj->addCccuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcdefamos() as $relObj) {
				$copyObj->addCcdefamo($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcparamopars() as $relObj) {
				$copyObj->addCcparamopar($relObj->copy($deepCopy));
			}

			foreach($this->getCcparcres() as $relObj) {
				$copyObj->addCcparcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcparpros() as $relObj) {
				$copyObj->addCcparpro($relObj->copy($deepCopy));
			}

			foreach($this->getCcparsols() as $relObj) {
				$copyObj->addCcparsol($relObj->copy($deepCopy));
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
			self::$peer = new CcpartidPeer();
		}
		return self::$peer;
	}

	
	public function initCcamoacts()
	{
		if ($this->collCcamoacts === null) {
			$this->collCcamoacts = array();
		}
	}

	
	public function getCcamoacts($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
			   $this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
					$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoactCriteria = $criteria;
		return $this->collCcamoacts;
	}

	
	public function countCcamoacts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

		return CcamoactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoact(Ccamoact $l)
	{
		$this->collCcamoacts[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcamoactsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}


	
	public function getCcamoactsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}


	
	public function getCcamoactsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}

	
	public function initCcamoactresps()
	{
		if ($this->collCcamoactresps === null) {
			$this->collCcamoactresps = array();
		}
	}

	
	public function getCcamoactresps($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
			   $this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
					$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;
		return $this->collCcamoactresps;
	}

	
	public function countCcamoactresps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

		return CcamoactrespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoactresp(Ccamoactresp $l)
	{
		$this->collCcamoactresps[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcamoactrespsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}


	
	public function getCcamoactrespsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}


	
	public function getCcamoactrespsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}

	
	public function initCcamopags()
	{
		if ($this->collCcamopags === null) {
			$this->collCcamopags = array();
		}
	}

	
	public function getCcamopags($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
			   $this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
					$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamopagCriteria = $criteria;
		return $this->collCcamopags;
	}

	
	public function countCcamopags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

		return CcamopagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamopag(Ccamopag $l)
	{
		$this->collCcamopags[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcamopagsJoinCcamoact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpago($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}

	
	public function initCcconceps()
	{
		if ($this->collCcconceps === null) {
			$this->collCcconceps = array();
		}
	}

	
	public function getCcconceps($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcepPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconceps === null) {
			if ($this->isNew()) {
			   $this->collCcconceps = array();
			} else {

				$criteria->add(CcconcepPeer::CCPARTID_ID, $this->getId());

				CcconcepPeer::addSelectColumns($criteria);
				$this->collCcconceps = CcconcepPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconcepPeer::CCPARTID_ID, $this->getId());

				CcconcepPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconcepCriteria) || !$this->lastCcconcepCriteria->equals($criteria)) {
					$this->collCcconceps = CcconcepPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconcepCriteria = $criteria;
		return $this->collCcconceps;
	}

	
	public function countCcconceps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcepPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconcepPeer::CCPARTID_ID, $this->getId());

		return CcconcepPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconcep(Ccconcep $l)
	{
		$this->collCcconceps[] = $l;
		$l->setCcpartid($this);
	}

	
	public function initCcconcres()
	{
		if ($this->collCcconcres === null) {
			$this->collCcconcres = array();
		}
	}

	
	public function getCcconcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
			   $this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
					$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconcreCriteria = $criteria;
		return $this->collCcconcres;
	}

	
	public function countCcconcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

		return CcconcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconcre(Ccconcre $l)
	{
		$this->collCcconcres[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcconcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}

	
	public function initCccuadess()
	{
		if ($this->collCccuadess === null) {
			$this->collCccuadess = array();
		}
	}

	
	public function getCccuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
			   $this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

				CccuadesPeer::addSelectColumns($criteria);
				$this->collCccuadess = CccuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

				CccuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
					$this->collCccuadess = CccuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccuadesCriteria = $criteria;
		return $this->collCccuadess;
	}

	
	public function countCccuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

		return CccuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccuades(Cccuades $l)
	{
		$this->collCccuadess[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCccuadessJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
				$this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

				$this->collCccuadess = CccuadesPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
				$this->collCccuadess = CccuadesPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCccuadesCriteria = $criteria;

		return $this->collCccuadess;
	}


	
	public function getCccuadessJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
				$this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

				$this->collCccuadess = CccuadesPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuadesPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
				$this->collCccuadess = CccuadesPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCccuadesCriteria = $criteria;

		return $this->collCccuadess;
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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

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

		$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamo(Ccdefamo $l)
	{
		$this->collCcdefamos[] = $l;
		$l->setCcpartid($this);
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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCctipint($criteria = null, $con = null)
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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

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

				$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}

	
	public function initCcliquids()
	{
		if ($this->collCcliquids === null) {
			$this->collCcliquids = array();
		}
	}

	
	public function getCcliquids($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
			   $this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
					$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcliquidCriteria = $criteria;
		return $this->collCcliquids;
	}

	
	public function countCcliquids($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcliquidsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcsolliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
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

				$criteria->add(CcparamoparPeer::CCPARTID_ID, $this->getId());

				CcparamoparPeer::addSelectColumns($criteria);
				$this->collCcparamopars = CcparamoparPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparamoparPeer::CCPARTID_ID, $this->getId());

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

		$criteria->add(CcparamoparPeer::CCPARTID_ID, $this->getId());

		return CcparamoparPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparamopar(Ccparamopar $l)
	{
		$this->collCcparamopars[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcparamoparsJoinCcperparamo($criteria = null, $con = null)
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

				$criteria->add(CcparamoparPeer::CCPARTID_ID, $this->getId());

				$this->collCcparamopars = CcparamoparPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparamoparPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparamoparCriteria) || !$this->lastCcparamoparCriteria->equals($criteria)) {
				$this->collCcparamopars = CcparamoparPeer::doSelectJoinCcperparamo($criteria, $con);
			}
		}
		$this->lastCcparamoparCriteria = $criteria;

		return $this->collCcparamopars;
	}

	
	public function initCcparcres()
	{
		if ($this->collCcparcres === null) {
			$this->collCcparcres = array();
		}
	}

	
	public function getCcparcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
			   $this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

				CcparcrePeer::addSelectColumns($criteria);
				$this->collCcparcres = CcparcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

				CcparcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
					$this->collCcparcres = CcparcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparcreCriteria = $criteria;
		return $this->collCcparcres;
	}

	
	public function countCcparcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

		return CcparcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparcre(Ccparcre $l)
	{
		$this->collCcparcres[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcparcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
				$this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

				$this->collCcparcres = CcparcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
				$this->collCcparcres = CcparcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcparcreCriteria = $criteria;

		return $this->collCcparcres;
	}


	
	public function getCcparcresJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
				$this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

				$this->collCcparcres = CcparcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcrePeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
				$this->collCcparcres = CcparcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcparcreCriteria = $criteria;

		return $this->collCcparcres;
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

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

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

		$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

		return CcparproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparpro(Ccparpro $l)
	{
		$this->collCcparpros[] = $l;
		$l->setCcpartid($this);
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

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
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

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

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

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
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

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

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

				$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}

	
	public function initCcparsols()
	{
		if ($this->collCcparsols === null) {
			$this->collCcparsols = array();
		}
	}

	
	public function getCcparsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparsols === null) {
			if ($this->isNew()) {
			   $this->collCcparsols = array();
			} else {

				$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

				CcparsolPeer::addSelectColumns($criteria);
				$this->collCcparsols = CcparsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

				CcparsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
					$this->collCcparsols = CcparsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparsolCriteria = $criteria;
		return $this->collCcparsols;
	}

	
	public function countCcparsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

		return CcparsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparsol(Ccparsol $l)
	{
		$this->collCcparsols[] = $l;
		$l->setCcpartid($this);
	}


	
	public function getCcparsolsJoinCcsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparsols === null) {
			if ($this->isNew()) {
				$this->collCcparsols = array();
			} else {

				$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

				$this->collCcparsols = CcparsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
				$this->collCcparsols = CcparsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcparsolCriteria = $criteria;

		return $this->collCcparsols;
	}


	
	public function getCcparsolsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparsols === null) {
			if ($this->isNew()) {
				$this->collCcparsols = array();
			} else {

				$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

				$this->collCcparsols = CcparsolPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparsolPeer::CCPARTID_ID, $this->getId());

			if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
				$this->collCcparsols = CcparsolPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcparsolCriteria = $criteria;

		return $this->collCcparsols;
	}

} 