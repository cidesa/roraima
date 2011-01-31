<?php


abstract class BaseCatnivcat extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catpar;


	
	protected $lonniv;


	
	protected $nomabr;


	
	protected $forcodcat;


	
	protected $essector;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatpar()
  {

    return trim($this->catpar);

  }
  
  public function getLonniv()
  {

    return trim($this->lonniv);

  }
  
  public function getNomabr()
  {

    return trim($this->nomabr);

  }
  
  public function getForcodcat()
  {

    return trim($this->forcodcat);

  }
  
  public function getEssector()
  {

    return trim($this->essector);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatpar($v)
	{

    if ($this->catpar !== $v) {
        $this->catpar = $v;
        $this->modifiedColumns[] = CatnivcatPeer::CATPAR;
      }
  
	} 
	
	public function setLonniv($v)
	{

    if ($this->lonniv !== $v) {
        $this->lonniv = $v;
        $this->modifiedColumns[] = CatnivcatPeer::LONNIV;
      }
  
	} 
	
	public function setNomabr($v)
	{

    if ($this->nomabr !== $v) {
        $this->nomabr = $v;
        $this->modifiedColumns[] = CatnivcatPeer::NOMABR;
      }
  
	} 
	
	public function setForcodcat($v)
	{

    if ($this->forcodcat !== $v) {
        $this->forcodcat = $v;
        $this->modifiedColumns[] = CatnivcatPeer::FORCODCAT;
      }
  
	} 
	
	public function setEssector($v)
	{

    if ($this->essector !== $v) {
        $this->essector = $v;
        $this->modifiedColumns[] = CatnivcatPeer::ESSECTOR;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatnivcatPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catpar = $rs->getString($startcol + 0);

      $this->lonniv = $rs->getString($startcol + 1);

      $this->nomabr = $rs->getString($startcol + 2);

      $this->forcodcat = $rs->getString($startcol + 3);

      $this->essector = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catnivcat object", $e);
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
			$con = Propel::getConnection(CatnivcatPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatnivcatPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatnivcatPeer::DATABASE_NAME);
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
					$pk = CatnivcatPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatnivcatPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = CatnivcatPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatnivcatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatpar();
				break;
			case 1:
				return $this->getLonniv();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getForcodcat();
				break;
			case 4:
				return $this->getEssector();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatnivcatPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatpar(),
			$keys[1] => $this->getLonniv(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getForcodcat(),
			$keys[4] => $this->getEssector(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatnivcatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatpar($value);
				break;
			case 1:
				$this->setLonniv($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setForcodcat($value);
				break;
			case 4:
				$this->setEssector($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatnivcatPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatpar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLonniv($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setForcodcat($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setEssector($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatnivcatPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatnivcatPeer::CATPAR)) $criteria->add(CatnivcatPeer::CATPAR, $this->catpar);
		if ($this->isColumnModified(CatnivcatPeer::LONNIV)) $criteria->add(CatnivcatPeer::LONNIV, $this->lonniv);
		if ($this->isColumnModified(CatnivcatPeer::NOMABR)) $criteria->add(CatnivcatPeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(CatnivcatPeer::FORCODCAT)) $criteria->add(CatnivcatPeer::FORCODCAT, $this->forcodcat);
		if ($this->isColumnModified(CatnivcatPeer::ESSECTOR)) $criteria->add(CatnivcatPeer::ESSECTOR, $this->essector);
		if ($this->isColumnModified(CatnivcatPeer::ID)) $criteria->add(CatnivcatPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatnivcatPeer::DATABASE_NAME);

		$criteria->add(CatnivcatPeer::ID, $this->id);

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

		$copyObj->setCatpar($this->catpar);

		$copyObj->setLonniv($this->lonniv);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setForcodcat($this->forcodcat);

		$copyObj->setEssector($this->essector);


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
			self::$peer = new CatnivcatPeer();
		}
		return self::$peer;
	}

} 