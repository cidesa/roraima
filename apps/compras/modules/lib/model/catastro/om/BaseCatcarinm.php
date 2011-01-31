<?php


abstract class BaseCatcarinm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $descar;


	
	protected $id;

	
	protected $collCatinmcars;

	
	protected $lastCatinmcarCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getDescar()
  {

    return trim($this->descar);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setDescar($v)
	{

    if ($this->descar !== $v) {
        $this->descar = $v;
        $this->modifiedColumns[] = CatcarinmPeer::DESCAR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatcarinmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->descar = $rs->getString($startcol + 0);

      $this->id = $rs->getInt($startcol + 1);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 2; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catcarinm object", $e);
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
			$con = Propel::getConnection(CatcarinmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatcarinmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatcarinmPeer::DATABASE_NAME);
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
					$pk = CatcarinmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatcarinmPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatinmcars !== null) {
				foreach($this->collCatinmcars as $referrerFK) {
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


			if (($retval = CatcarinmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatinmcars !== null) {
					foreach($this->collCatinmcars as $referrerFK) {
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
		$pos = CatcarinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDescar();
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
		$keys = CatcarinmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDescar(),
			$keys[1] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatcarinmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDescar($value);
				break;
			case 1:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatcarinmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDescar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatcarinmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatcarinmPeer::DESCAR)) $criteria->add(CatcarinmPeer::DESCAR, $this->descar);
		if ($this->isColumnModified(CatcarinmPeer::ID)) $criteria->add(CatcarinmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatcarinmPeer::DATABASE_NAME);

		$criteria->add(CatcarinmPeer::ID, $this->id);

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

		$copyObj->setDescar($this->descar);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatinmcars() as $relObj) {
				$copyObj->addCatinmcar($relObj->copy($deepCopy));
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
			self::$peer = new CatcarinmPeer();
		}
		return self::$peer;
	}

	
	public function initCatinmcars()
	{
		if ($this->collCatinmcars === null) {
			$this->collCatinmcars = array();
		}
	}

	
	public function getCatinmcars($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatinmcarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatinmcars === null) {
			if ($this->isNew()) {
			   $this->collCatinmcars = array();
			} else {

				$criteria->add(CatinmcarPeer::CATCARINM_ID, $this->getId());

				CatinmcarPeer::addSelectColumns($criteria);
				$this->collCatinmcars = CatinmcarPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatinmcarPeer::CATCARINM_ID, $this->getId());

				CatinmcarPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatinmcarCriteria) || !$this->lastCatinmcarCriteria->equals($criteria)) {
					$this->collCatinmcars = CatinmcarPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatinmcarCriteria = $criteria;
		return $this->collCatinmcars;
	}

	
	public function countCatinmcars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatinmcarPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatinmcarPeer::CATCARINM_ID, $this->getId());

		return CatinmcarPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatinmcar(Catinmcar $l)
	{
		$this->collCatinmcars[] = $l;
		$l->setCatcarinm($this);
	}

} 