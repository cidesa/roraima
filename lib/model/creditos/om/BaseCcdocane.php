<?php


abstract class BaseCcdocane extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomdocane;


	
	protected $desdocane;

	
	protected $collCcsolliqdocanes;

	
	protected $lastCcsolliqdocaneCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomdocane()
  {

    return trim($this->nomdocane);

  }
  
  public function getDesdocane()
  {

    return trim($this->desdocane);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdocanePeer::ID;
      }
  
	} 
	
	public function setNomdocane($v)
	{

    if ($this->nomdocane !== $v) {
        $this->nomdocane = $v;
        $this->modifiedColumns[] = CcdocanePeer::NOMDOCANE;
      }
  
	} 
	
	public function setDesdocane($v)
	{

    if ($this->desdocane !== $v) {
        $this->desdocane = $v;
        $this->modifiedColumns[] = CcdocanePeer::DESDOCANE;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomdocane = $rs->getString($startcol + 1);

      $this->desdocane = $rs->getString($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdocane object", $e);
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
			$con = Propel::getConnection(CcdocanePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdocanePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdocanePeer::DATABASE_NAME);
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
					$pk = CcdocanePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdocanePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcsolliqdocanes !== null) {
				foreach($this->collCcsolliqdocanes as $referrerFK) {
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


			if (($retval = CcdocanePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcsolliqdocanes !== null) {
					foreach($this->collCcsolliqdocanes as $referrerFK) {
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
		$pos = CcdocanePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomdocane();
				break;
			case 2:
				return $this->getDesdocane();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdocanePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomdocane(),
			$keys[2] => $this->getDesdocane(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdocanePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomdocane($value);
				break;
			case 2:
				$this->setDesdocane($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdocanePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomdocane($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesdocane($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdocanePeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdocanePeer::ID)) $criteria->add(CcdocanePeer::ID, $this->id);
		if ($this->isColumnModified(CcdocanePeer::NOMDOCANE)) $criteria->add(CcdocanePeer::NOMDOCANE, $this->nomdocane);
		if ($this->isColumnModified(CcdocanePeer::DESDOCANE)) $criteria->add(CcdocanePeer::DESDOCANE, $this->desdocane);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdocanePeer::DATABASE_NAME);

		$criteria->add(CcdocanePeer::ID, $this->id);

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

		$copyObj->setNomdocane($this->nomdocane);

		$copyObj->setDesdocane($this->desdocane);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcsolliqdocanes() as $relObj) {
				$copyObj->addCcsolliqdocane($relObj->copy($deepCopy));
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
			self::$peer = new CcdocanePeer();
		}
		return self::$peer;
	}

	
	public function initCcsolliqdocanes()
	{
		if ($this->collCcsolliqdocanes === null) {
			$this->collCcsolliqdocanes = array();
		}
	}

	
	public function getCcsolliqdocanes($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqdocanePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqdocanes === null) {
			if ($this->isNew()) {
			   $this->collCcsolliqdocanes = array();
			} else {

				$criteria->add(CcsolliqdocanePeer::CCDOCANE_ID, $this->getId());

				CcsolliqdocanePeer::addSelectColumns($criteria);
				$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolliqdocanePeer::CCDOCANE_ID, $this->getId());

				CcsolliqdocanePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolliqdocaneCriteria) || !$this->lastCcsolliqdocaneCriteria->equals($criteria)) {
					$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolliqdocaneCriteria = $criteria;
		return $this->collCcsolliqdocanes;
	}

	
	public function countCcsolliqdocanes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqdocanePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolliqdocanePeer::CCDOCANE_ID, $this->getId());

		return CcsolliqdocanePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolliqdocane(Ccsolliqdocane $l)
	{
		$this->collCcsolliqdocanes[] = $l;
		$l->setCcdocane($this);
	}


	
	public function getCcsolliqdocanesJoinCcsolliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolliqdocanePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolliqdocanes === null) {
			if ($this->isNew()) {
				$this->collCcsolliqdocanes = array();
			} else {

				$criteria->add(CcsolliqdocanePeer::CCDOCANE_ID, $this->getId());

				$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolliqdocanePeer::CCDOCANE_ID, $this->getId());

			if (!isset($this->lastCcsolliqdocaneCriteria) || !$this->lastCcsolliqdocaneCriteria->equals($criteria)) {
				$this->collCcsolliqdocanes = CcsolliqdocanePeer::doSelectJoinCcsolliq($criteria, $con);
			}
		}
		$this->lastCcsolliqdocaneCriteria = $criteria;

		return $this->collCcsolliqdocanes;
	}

} 