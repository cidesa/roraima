<?php


abstract class BaseInarticulo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $desart;


	
	protected $id;

	
	protected $collIndetfacs;

	
	protected $lastIndetfacCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = InarticuloPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = InarticuloPeer::DESART;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = InarticuloPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->desart = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Inarticulo object", $e);
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
			$con = Propel::getConnection(InarticuloPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			InarticuloPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(InarticuloPeer::DATABASE_NAME);
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
					$pk = InarticuloPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += InarticuloPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collIndetfacs !== null) {
				foreach($this->collIndetfacs as $referrerFK) {
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


			if (($retval = InarticuloPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collIndetfacs !== null) {
					foreach($this->collIndetfacs as $referrerFK) {
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
		$pos = InarticuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getDesart();
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
		$keys = InarticuloPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getDesart(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = InarticuloPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setDesart($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = InarticuloPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(InarticuloPeer::DATABASE_NAME);

		if ($this->isColumnModified(InarticuloPeer::CODART)) $criteria->add(InarticuloPeer::CODART, $this->codart);
		if ($this->isColumnModified(InarticuloPeer::DESART)) $criteria->add(InarticuloPeer::DESART, $this->desart);
		if ($this->isColumnModified(InarticuloPeer::ID)) $criteria->add(InarticuloPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(InarticuloPeer::DATABASE_NAME);

		$criteria->add(InarticuloPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getIndetfacs() as $relObj) {
				$copyObj->addIndetfac($relObj->copy($deepCopy));
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
			self::$peer = new InarticuloPeer();
		}
		return self::$peer;
	}

	
	public function initIndetfacs()
	{
		if ($this->collIndetfacs === null) {
			$this->collIndetfacs = array();
		}
	}

	
	public function getIndetfacs($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndetfacPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndetfacs === null) {
			if ($this->isNew()) {
			   $this->collIndetfacs = array();
			} else {

				$criteria->add(IndetfacPeer::INARTICULO_ID, $this->getId());

				IndetfacPeer::addSelectColumns($criteria);
				$this->collIndetfacs = IndetfacPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IndetfacPeer::INARTICULO_ID, $this->getId());

				IndetfacPeer::addSelectColumns($criteria);
				if (!isset($this->lastIndetfacCriteria) || !$this->lastIndetfacCriteria->equals($criteria)) {
					$this->collIndetfacs = IndetfacPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIndetfacCriteria = $criteria;
		return $this->collIndetfacs;
	}

	
	public function countIndetfacs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseIndetfacPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(IndetfacPeer::INARTICULO_ID, $this->getId());

		return IndetfacPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addIndetfac(Indetfac $l)
	{
		$this->collIndetfacs[] = $l;
		$l->setInarticulo($this);
	}


	
	public function getIndetfacsJoinInfactura($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseIndetfacPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIndetfacs === null) {
			if ($this->isNew()) {
				$this->collIndetfacs = array();
			} else {

				$criteria->add(IndetfacPeer::INARTICULO_ID, $this->getId());

				$this->collIndetfacs = IndetfacPeer::doSelectJoinInfactura($criteria, $con);
			}
		} else {
									
			$criteria->add(IndetfacPeer::INARTICULO_ID, $this->getId());

			if (!isset($this->lastIndetfacCriteria) || !$this->lastIndetfacCriteria->equals($criteria)) {
				$this->collIndetfacs = IndetfacPeer::doSelectJoinInfactura($criteria, $con);
			}
		}
		$this->lastIndetfacCriteria = $criteria;

		return $this->collIndetfacs;
	}

} 