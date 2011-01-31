<?php


abstract class BaseIngruprub extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codgruprub;


	
	protected $desgruprub;


	
	protected $id;

	
	protected $collInrubros;

	
	protected $lastInrubroCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodgruprub()
  {

    return trim($this->codgruprub);

  }
  
  public function getDesgruprub()
  {

    return trim($this->desgruprub);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodgruprub($v)
	{

    if ($this->codgruprub !== $v) {
        $this->codgruprub = $v;
        $this->modifiedColumns[] = IngruprubPeer::CODGRUPRUB;
      }
  
	} 
	
	public function setDesgruprub($v)
	{

    if ($this->desgruprub !== $v) {
        $this->desgruprub = $v;
        $this->modifiedColumns[] = IngruprubPeer::DESGRUPRUB;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = IngruprubPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codgruprub = $rs->getString($startcol + 0);

      $this->desgruprub = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ingruprub object", $e);
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
			$con = Propel::getConnection(IngruprubPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			IngruprubPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(IngruprubPeer::DATABASE_NAME);
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
					$pk = IngruprubPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += IngruprubPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collInrubros !== null) {
				foreach($this->collInrubros as $referrerFK) {
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


			if (($retval = IngruprubPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collInrubros !== null) {
					foreach($this->collInrubros as $referrerFK) {
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
		$pos = IngruprubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodgruprub();
				break;
			case 1:
				return $this->getDesgruprub();
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
		$keys = IngruprubPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodgruprub(),
			$keys[1] => $this->getDesgruprub(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = IngruprubPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodgruprub($value);
				break;
			case 1:
				$this->setDesgruprub($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = IngruprubPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodgruprub($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesgruprub($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(IngruprubPeer::DATABASE_NAME);

		if ($this->isColumnModified(IngruprubPeer::CODGRUPRUB)) $criteria->add(IngruprubPeer::CODGRUPRUB, $this->codgruprub);
		if ($this->isColumnModified(IngruprubPeer::DESGRUPRUB)) $criteria->add(IngruprubPeer::DESGRUPRUB, $this->desgruprub);
		if ($this->isColumnModified(IngruprubPeer::ID)) $criteria->add(IngruprubPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(IngruprubPeer::DATABASE_NAME);

		$criteria->add(IngruprubPeer::ID, $this->id);

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

		$copyObj->setCodgruprub($this->codgruprub);

		$copyObj->setDesgruprub($this->desgruprub);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getInrubros() as $relObj) {
				$copyObj->addInrubro($relObj->copy($deepCopy));
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
			self::$peer = new IngruprubPeer();
		}
		return self::$peer;
	}

	
	public function initInrubros()
	{
		if ($this->collInrubros === null) {
			$this->collInrubros = array();
		}
	}

	
	public function getInrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseInrubroPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collInrubros === null) {
			if ($this->isNew()) {
			   $this->collInrubros = array();
			} else {

				$criteria->add(InrubroPeer::INGRUPRUB_ID, $this->getId());

				InrubroPeer::addSelectColumns($criteria);
				$this->collInrubros = InrubroPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(InrubroPeer::INGRUPRUB_ID, $this->getId());

				InrubroPeer::addSelectColumns($criteria);
				if (!isset($this->lastInrubroCriteria) || !$this->lastInrubroCriteria->equals($criteria)) {
					$this->collInrubros = InrubroPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastInrubroCriteria = $criteria;
		return $this->collInrubros;
	}

	
	public function countInrubros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseInrubroPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(InrubroPeer::INGRUPRUB_ID, $this->getId());

		return InrubroPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addInrubro(Inrubro $l)
	{
		$this->collInrubros[] = $l;
		$l->setIngruprub($this);
	}

} 