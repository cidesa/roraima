<?php


abstract class BaseCcparent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomparent;


	
	protected $desparent;

	
	protected $collCcrepbens;

	
	protected $lastCcrepbenCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomparent()
  {

    return trim($this->nomparent);

  }
  
  public function getDesparent()
  {

    return trim($this->desparent);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcparentPeer::ID;
      }
  
	} 
	
	public function setNomparent($v)
	{

    if ($this->nomparent !== $v) {
        $this->nomparent = $v;
        $this->modifiedColumns[] = CcparentPeer::NOMPARENT;
      }
  
	} 
	
	public function setDesparent($v)
	{

    if ($this->desparent !== $v) {
        $this->desparent = $v;
        $this->modifiedColumns[] = CcparentPeer::DESPARENT;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomparent = $rs->getString($startcol + 1);

      $this->desparent = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccparent object", $e);
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
			$con = Propel::getConnection(CcparentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcparentPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcparentPeer::DATABASE_NAME);
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
					$pk = CcparentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcparentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcrepbens !== null) {
				foreach($this->collCcrepbens as $referrerFK) {
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


			if (($retval = CcparentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcrepbens !== null) {
					foreach($this->collCcrepbens as $referrerFK) {
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
		$pos = CcparentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomparent();
				break;
			case 2:
				return $this->getDesparent();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomparent(),
			$keys[2] => $this->getDesparent(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcparentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomparent($value);
				break;
			case 2:
				$this->setDesparent($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcparentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomparent($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesparent($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcparentPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcparentPeer::ID)) $criteria->add(CcparentPeer::ID, $this->id);
		if ($this->isColumnModified(CcparentPeer::NOMPARENT)) $criteria->add(CcparentPeer::NOMPARENT, $this->nomparent);
		if ($this->isColumnModified(CcparentPeer::DESPARENT)) $criteria->add(CcparentPeer::DESPARENT, $this->desparent);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcparentPeer::DATABASE_NAME);

		$criteria->add(CcparentPeer::ID, $this->id);

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

		$copyObj->setNomparent($this->nomparent);

		$copyObj->setDesparent($this->desparent);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcrepbens() as $relObj) {
				$copyObj->addCcrepben($relObj->copy($deepCopy));
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
			self::$peer = new CcparentPeer();
		}
		return self::$peer;
	}

	
	public function initCcrepbens()
	{
		if ($this->collCcrepbens === null) {
			$this->collCcrepbens = array();
		}
	}

	
	public function getCcrepbens($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
			   $this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

				CcrepbenPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
					$this->collCcrepbens = CcrepbenPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrepbenCriteria = $criteria;
		return $this->collCcrepbens;
	}

	
	public function countCcrepbens($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

		return CcrepbenPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrepben(Ccrepben $l)
	{
		$this->collCcrepbens[] = $l;
		$l->setCcparent($this);
	}


	
	public function getCcrepbensJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}


	
	public function getCcrepbensJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrepbenPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrepbens === null) {
			if ($this->isNew()) {
				$this->collCcrepbens = array();
			} else {

				$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrepbenPeer::CCPARENT_ID, $this->getId());

			if (!isset($this->lastCcrepbenCriteria) || !$this->lastCcrepbenCriteria->equals($criteria)) {
				$this->collCcrepbens = CcrepbenPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcrepbenCriteria = $criteria;

		return $this->collCcrepbens;
	}

} 