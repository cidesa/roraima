<?php


abstract class BaseCatdirvia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $desdir;


	
	protected $id;

	
	protected $collCattramos;

	
	protected $lastCattramoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDesdir()
  {

    return trim($this->desdir);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDesdir($v)
	{

    if ($this->desdir !== $v) {
        $this->desdir = $v;
        $this->modifiedColumns[] = CatdirviaPeer::DESDIR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatdirviaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->desdir = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catdirvia object", $e);
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
			$con = Propel::getConnection(CatdirviaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatdirviaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatdirviaPeer::DATABASE_NAME);
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
					$pk = CatdirviaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatdirviaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCattramos !== null) {
				foreach($this->collCattramos as $referrerFK) {
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


			if (($retval = CatdirviaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCattramos !== null) {
					foreach($this->collCattramos as $referrerFK) {
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
		$pos = CatdirviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDesdir();
				break;
			case 1:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatdirviaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDesdir(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatdirviaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDesdir($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatdirviaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDesdir($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatdirviaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatdirviaPeer::DESDIR)) $criteria->add(CatdirviaPeer::DESDIR, $this->desdir);
		if ($this->isColumnModified(CatdirviaPeer::ID)) $criteria->add(CatdirviaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatdirviaPeer::DATABASE_NAME);

		$criteria->add(CatdirviaPeer::ID, $this->id);

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

		$copyObj->setDesdir($this->desdir);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCattramos() as $relObj) {
				$copyObj->addCattramo($relObj->copy($deepCopy));
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
			self::$peer = new CatdirviaPeer();
		}
		return self::$peer;
	}

	
	public function initCattramos()
	{
		if ($this->collCattramos === null) {
			$this->collCattramos = array();
		}
	}

	
	public function getCattramos($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
			   $this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

				CattramoPeer::addSelectColumns($criteria);
				$this->collCattramos = CattramoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

				CattramoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
					$this->collCattramos = CattramoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCattramoCriteria = $criteria;
		return $this->collCattramos;
	}

	
	public function countCattramos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

		return CattramoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCattramo(Cattramo $l)
	{
		$this->collCattramos[] = $l;
		$l->setCatdirvia($this);
	}


	
	public function getCattramosJoinCatdivgeo($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
				$this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCatdivgeo($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}


	
	public function getCattramosJoinCattipvia($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
				$this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCattipvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCattipvia($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}


	
	public function getCattramosJoinCatsenvia($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCattramoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCattramos === null) {
			if ($this->isNew()) {
				$this->collCattramos = array();
			} else {

				$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

				$this->collCattramos = CattramoPeer::doSelectJoinCatsenvia($criteria, $con);
			}
		} else {
									
			$criteria->add(CattramoPeer::CATDIRVIA_ID, $this->getId());

			if (!isset($this->lastCattramoCriteria) || !$this->lastCattramoCriteria->equals($criteria)) {
				$this->collCattramos = CattramoPeer::doSelectJoinCatsenvia($criteria, $con);
			}
		}
		$this->lastCattramoCriteria = $criteria;

		return $this->collCattramos;
	}

} 