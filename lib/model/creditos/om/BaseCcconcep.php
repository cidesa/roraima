<?php


abstract class BaseCcconcep extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomcon;


	
	protected $descon;


	
	protected $codpar;


	
	protected $ccpartid_id;

	
	protected $aCcpartid;

	
	protected $collCcconcres;

	
	protected $lastCcconcreCriteria = null;

	
	protected $collCcdetcuadess;

	
	protected $lastCcdetcuadesCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcparcrecons;

	
	protected $lastCcparcreconCriteria = null;

	
	protected $collCcparsols;

	
	protected $lastCcparsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomcon()
  {

    return trim($this->nomcon);

  }
  
  public function getDescon()
  {

    return trim($this->descon);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getCcpartidId()
  {

    return $this->ccpartid_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcconcepPeer::ID;
      }
  
	} 
	
	public function setNomcon($v)
	{

    if ($this->nomcon !== $v) {
        $this->nomcon = $v;
        $this->modifiedColumns[] = CcconcepPeer::NOMCON;
      }
  
	} 
	
	public function setDescon($v)
	{

    if ($this->descon !== $v) {
        $this->descon = $v;
        $this->modifiedColumns[] = CcconcepPeer::DESCON;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = CcconcepPeer::CODPAR;
      }
  
	} 
	
	public function setCcpartidId($v)
	{

    if ($this->ccpartid_id !== $v) {
        $this->ccpartid_id = $v;
        $this->modifiedColumns[] = CcconcepPeer::CCPARTID_ID;
      }
  
		if ($this->aCcpartid !== null && $this->aCcpartid->getId() !== $v) {
			$this->aCcpartid = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomcon = $rs->getString($startcol + 1);

      $this->descon = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->ccpartid_id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccconcep object", $e);
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
			$con = Propel::getConnection(CcconcepPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcconcepPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcconcepPeer::DATABASE_NAME);
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


												
			if ($this->aCcpartid !== null) {
				if ($this->aCcpartid->isModified()) {
					$affectedRows += $this->aCcpartid->save($con);
				}
				$this->setCcpartid($this->aCcpartid);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcconcepPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcconcepPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcconcres !== null) {
				foreach($this->collCcconcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdetcuadess !== null) {
				foreach($this->collCcdetcuadess as $referrerFK) {
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

			if ($this->collCcparcrecons !== null) {
				foreach($this->collCcparcrecons as $referrerFK) {
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


												
			if ($this->aCcpartid !== null) {
				if (!$this->aCcpartid->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcpartid->getValidationFailures());
				}
			}


			if (($retval = CcconcepPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcconcres !== null) {
					foreach($this->collCcconcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdetcuadess !== null) {
					foreach($this->collCcdetcuadess as $referrerFK) {
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

				if ($this->collCcparcrecons !== null) {
					foreach($this->collCcparcrecons as $referrerFK) {
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
		$pos = CcconcepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomcon();
				break;
			case 2:
				return $this->getDescon();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getCcpartidId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconcepPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomcon(),
			$keys[2] => $this->getDescon(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getCcpartidId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcconcepPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomcon($value);
				break;
			case 2:
				$this->setDescon($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setCcpartidId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcconcepPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcpartidId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcconcepPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcconcepPeer::ID)) $criteria->add(CcconcepPeer::ID, $this->id);
		if ($this->isColumnModified(CcconcepPeer::NOMCON)) $criteria->add(CcconcepPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(CcconcepPeer::DESCON)) $criteria->add(CcconcepPeer::DESCON, $this->descon);
		if ($this->isColumnModified(CcconcepPeer::CODPAR)) $criteria->add(CcconcepPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(CcconcepPeer::CCPARTID_ID)) $criteria->add(CcconcepPeer::CCPARTID_ID, $this->ccpartid_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcconcepPeer::DATABASE_NAME);

		$criteria->add(CcconcepPeer::ID, $this->id);

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

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDescon($this->descon);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setCcpartidId($this->ccpartid_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcconcres() as $relObj) {
				$copyObj->addCcconcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcdetcuadess() as $relObj) {
				$copyObj->addCcdetcuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcparcrecons() as $relObj) {
				$copyObj->addCcparcrecon($relObj->copy($deepCopy));
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
			self::$peer = new CcconcepPeer();
		}
		return self::$peer;
	}

	
	public function setCcpartid($v)
	{


		if ($v === null) {
			$this->setCcpartidId(NULL);
		} else {
			$this->setCcpartidId($v->getId());
		}


		$this->aCcpartid = $v;
	}


	
	public function getCcpartid($con = null)
	{
		if ($this->aCcpartid === null && ($this->ccpartid_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcpartidPeer.php';

      $c = new Criteria();
      $c->add(CcpartidPeer::ID,$this->ccpartid_id);
      
			$this->aCcpartid = CcpartidPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcpartid;
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

				$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

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

		$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

		return CcconcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconcre(Ccconcre $l)
	{
		$this->collCcconcres[] = $l;
		$l->setCcconcep($this);
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

				$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcpartid($criteria = null, $con = null)
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

				$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcpartid($criteria, $con);
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

				$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}

	
	public function initCcdetcuadess()
	{
		if ($this->collCcdetcuadess === null) {
			$this->collCcdetcuadess = array();
		}
	}

	
	public function getCcdetcuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
			   $this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				CcdetcuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
					$this->collCcdetcuadess = CcdetcuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;
		return $this->collCcdetcuadess;
	}

	
	public function countCcdetcuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

		return CcdetcuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdetcuades(Ccdetcuades $l)
	{
		$this->collCcdetcuadess[] = $l;
		$l->setCcconcep($this);
	}


	
	public function getCcdetcuadessJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
	}


	
	public function getCcdetcuadessJoinCpcausad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdetcuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdetcuadess === null) {
			if ($this->isNew()) {
				$this->collCcdetcuadess = array();
			} else {

				$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdetcuadesPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcdetcuadesCriteria) || !$this->lastCcdetcuadesCriteria->equals($criteria)) {
				$this->collCcdetcuadess = CcdetcuadesPeer::doSelectJoinCpcausad($criteria, $con);
			}
		}
		$this->lastCcdetcuadesCriteria = $criteria;

		return $this->collCcdetcuadess;
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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

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

		$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCcconcep($this);
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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpartid($criteria = null, $con = null)
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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

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

				$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

	
	public function initCcparcrecons()
	{
		if ($this->collCcparcrecons === null) {
			$this->collCcparcrecons = array();
		}
	}

	
	public function getCcparcrecons($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcreconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcrecons === null) {
			if ($this->isNew()) {
			   $this->collCcparcrecons = array();
			} else {

				$criteria->add(CcparcreconPeer::CCCONCEP_ID, $this->getId());

				CcparcreconPeer::addSelectColumns($criteria);
				$this->collCcparcrecons = CcparcreconPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparcreconPeer::CCCONCEP_ID, $this->getId());

				CcparcreconPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparcreconCriteria) || !$this->lastCcparcreconCriteria->equals($criteria)) {
					$this->collCcparcrecons = CcparcreconPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparcreconCriteria = $criteria;
		return $this->collCcparcrecons;
	}

	
	public function countCcparcrecons($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcreconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparcreconPeer::CCCONCEP_ID, $this->getId());

		return CcparcreconPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparcrecon(Ccparcrecon $l)
	{
		$this->collCcparcrecons[] = $l;
		$l->setCcconcep($this);
	}


	
	public function getCcparcreconsJoinCcparcre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcreconPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcrecons === null) {
			if ($this->isNew()) {
				$this->collCcparcrecons = array();
			} else {

				$criteria->add(CcparcreconPeer::CCCONCEP_ID, $this->getId());

				$this->collCcparcrecons = CcparcreconPeer::doSelectJoinCcparcre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcreconPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcparcreconCriteria) || !$this->lastCcparcreconCriteria->equals($criteria)) {
				$this->collCcparcrecons = CcparcreconPeer::doSelectJoinCcparcre($criteria, $con);
			}
		}
		$this->lastCcparcreconCriteria = $criteria;

		return $this->collCcparcrecons;
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

				$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

				CcparsolPeer::addSelectColumns($criteria);
				$this->collCcparsols = CcparsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

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

		$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

		return CcparsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparsol(Ccparsol $l)
	{
		$this->collCcparsols[] = $l;
		$l->setCcconcep($this);
	}


	
	public function getCcparsolsJoinCcpartid($criteria = null, $con = null)
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

				$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

				$this->collCcparsols = CcparsolPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
				$this->collCcparsols = CcparsolPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparsolCriteria = $criteria;

		return $this->collCcparsols;
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

				$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

				$this->collCcparsols = CcparsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparsolPeer::CCCONCEP_ID, $this->getId());

			if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
				$this->collCcparsols = CcparsolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcparsolCriteria = $criteria;

		return $this->collCcparsols;
	}

} 