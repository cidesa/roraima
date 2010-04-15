<?php


abstract class BaseInespeci extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codespeci;


	
	protected $desespeci;


	
	protected $id;

	
	protected $collInprofess;

	
	protected $lastInprofesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodespeci()
  {

    return trim($this->codespeci);

  }
  
  public function getDesespeci()
  {

    return trim($this->desespeci);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodespeci($v)
	{

    if ($this->codespeci !== $v) {
        $this->codespeci = $v;
        $this->modifiedColumns[] = InespeciPeer::CODESPECI;
      }
  
	} 
	
	public function setDesespeci($v)
	{

    if ($this->desespeci !== $v) {
        $this->desespeci = $v;
        $this->modifiedColumns[] = InespeciPeer::DESESPECI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InespeciPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codespeci = $rs->getString($startcol + 0);

      $this->desespeci = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inespeci object", $e);
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
			$con = Propel::getConnection(InespeciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InespeciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InespeciPeer::DATABASE_NAME);
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
					$pk = InespeciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InespeciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInprofess !== null) {
				foreach($this->collInprofess as $referrerFK) {
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


			if (($retval = InespeciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInprofess !== null) {
					foreach($this->collInprofess as $referrerFK) {
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
		$pos = InespeciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodespeci();
				break;
			case 1:
				return $this->getDesespeci();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InespeciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodespeci(),
			$keys[1] => $this->getDesespeci(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InespeciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodespeci($value);
				break;
			case 1:
				$this->setDesespeci($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InespeciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodespeci($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesespeci($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InespeciPeer::DATABASE_NAME);

		if ($this->isColumnModified(InespeciPeer::CODESPECI)) $criteria->add(InespeciPeer::CODESPECI, $this->codespeci);
		if ($this->isColumnModified(InespeciPeer::DESESPECI)) $criteria->add(InespeciPeer::DESESPECI, $this->desespeci);
		if ($this->isColumnModified(InespeciPeer::ID)) $criteria->add(InespeciPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InespeciPeer::DATABASE_NAME);

		$criteria->add(InespeciPeer::ID, $this->id);

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

		$copyObj->setCodespeci($this->codespeci);

		$copyObj->setDesespeci($this->desespeci);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInprofess() as $relObj) {
				$copyObj->addInprofes($relObj->copy($deepCopy));
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
			self::$peer = new InespeciPeer();
		}
		return self::$peer;
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

				$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

				InprofesPeer::addSelectColumns($criteria);
				$this->collInprofess = InprofesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

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

		$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

		return InprofesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInprofes(Inprofes $l)
	{
		$this->collInprofess[] = $l;
		$l->setInespeci($this);
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

				$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInestado($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInestado($criteria, $con);
			}
		}
		$this->lastInprofesCriteria = $criteria;

		return $this->collInprofess;
	}


	
	public function getInprofessJoinInmunicipio($criteria = null, $con = null)
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

				$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInmunicipio($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInmunicipio($criteria, $con);
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

				$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

				$this->collInprofess = InprofesPeer::doSelectJoinInparroquia($criteria, $con);
			}
		} else {
									
			$criteria->add(InprofesPeer::INESPECI_ID, $this->getId());

			if (!isset($this->lastInprofesCriteria) || !$this->lastInprofesCriteria->equals($criteria)) {
				$this->collInprofess = InprofesPeer::doSelectJoinInparroquia($criteria, $con);
			}
		}
		$this->lastInprofesCriteria = $criteria;

		return $this->collInprofess;
	}

} 