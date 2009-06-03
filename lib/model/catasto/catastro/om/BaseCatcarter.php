<?php


abstract class BaseCatcarter extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $tertip;


	
	protected $dester;


	
	protected $id;

	
	protected $collCatcarterinms;

	
	protected $lastCatcarterinmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getTertip()
  {

    return trim($this->tertip);

  }
  
  public function getDester()
  {

    return trim($this->dester);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setTertip($v)
	{

    if ($this->tertip !== $v) {
        $this->tertip = $v;
        $this->modifiedColumns[] = CatcarterPeer::TERTIP;
      }
  
	} 
	
	public function setDester($v)
	{

    if ($this->dester !== $v) {
        $this->dester = $v;
        $this->modifiedColumns[] = CatcarterPeer::DESTER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatcarterPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->tertip = $rs->getString($startcol + 0);

      $this->dester = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catcarter object", $e);
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
			$con = Propel::getConnection(CatcarterPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatcarterPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatcarterPeer::DATABASE_NAME);
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
					$pk = CatcarterPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatcarterPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatcarterinms !== null) {
				foreach($this->collCatcarterinms as $referrerFK) {
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


			if (($retval = CatcarterPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatcarterinms !== null) {
					foreach($this->collCatcarterinms as $referrerFK) {
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
		$pos = CatcarterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getTertip();
				break;
			case 1:
				return $this->getDester();
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
		$keys = CatcarterPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getTertip(),
			$keys[1] => $this->getDester(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatcarterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setTertip($value);
				break;
			case 1:
				$this->setDester($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatcarterPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setTertip($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDester($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatcarterPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatcarterPeer::TERTIP)) $criteria->add(CatcarterPeer::TERTIP, $this->tertip);
		if ($this->isColumnModified(CatcarterPeer::DESTER)) $criteria->add(CatcarterPeer::DESTER, $this->dester);
		if ($this->isColumnModified(CatcarterPeer::ID)) $criteria->add(CatcarterPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatcarterPeer::DATABASE_NAME);

		$criteria->add(CatcarterPeer::ID, $this->id);

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

		$copyObj->setTertip($this->tertip);

		$copyObj->setDester($this->dester);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatcarterinms() as $relObj) {
				$copyObj->addCatcarterinm($relObj->copy($deepCopy));
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
			self::$peer = new CatcarterPeer();
		}
		return self::$peer;
	}

	
	public function initCatcarterinms()
	{
		if ($this->collCatcarterinms === null) {
			$this->collCatcarterinms = array();
		}
	}

	
	public function getCatcarterinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarterinms === null) {
			if ($this->isNew()) {
			   $this->collCatcarterinms = array();
			} else {

				$criteria->add(CatcarterinmPeer::CATCARTER_ID, $this->getId());

				CatcarterinmPeer::addSelectColumns($criteria);
				$this->collCatcarterinms = CatcarterinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatcarterinmPeer::CATCARTER_ID, $this->getId());

				CatcarterinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatcarterinmCriteria) || !$this->lastCatcarterinmCriteria->equals($criteria)) {
					$this->collCatcarterinms = CatcarterinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatcarterinmCriteria = $criteria;
		return $this->collCatcarterinms;
	}

	
	public function countCatcarterinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatcarterinmPeer::CATCARTER_ID, $this->getId());

		return CatcarterinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatcarterinm(Catcarterinm $l)
	{
		$this->collCatcarterinms[] = $l;
		$l->setCatcarter($this);
	}


	
	public function getCatcarterinmsJoinCatreginm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatcarterinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatcarterinms === null) {
			if ($this->isNew()) {
				$this->collCatcarterinms = array();
			} else {

				$criteria->add(CatcarterinmPeer::CATCARTER_ID, $this->getId());

				$this->collCatcarterinms = CatcarterinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatcarterinmPeer::CATCARTER_ID, $this->getId());

			if (!isset($this->lastCatcarterinmCriteria) || !$this->lastCatcarterinmCriteria->equals($criteria)) {
				$this->collCatcarterinms = CatcarterinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		}
		$this->lastCatcarterinmCriteria = $criteria;

		return $this->collCatcarterinms;
	}

} 