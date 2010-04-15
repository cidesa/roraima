<?php


abstract class BaseCadefalm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codalm;


	
	protected $nomalm;


	
	protected $codcat;


	
	protected $catipalm_id;


	
	protected $id;

	
	protected $aCatipalm;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodalm()
  {

    return trim($this->codalm);

  }
  
  public function getNomalm()
  {

    return trim($this->nomalm);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCatipalmId()
  {

    return $this->catipalm_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodalm($v)
	{

    if ($this->codalm !== $v) {
        $this->codalm = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODALM;
      }
  
	} 
	
	public function setNomalm($v)
	{

    if ($this->nomalm !== $v) {
        $this->nomalm = $v;
        $this->modifiedColumns[] = CadefalmPeer::NOMALM;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CadefalmPeer::CODCAT;
      }
  
	} 
	
	public function setCatipalmId($v)
	{

    if ($this->catipalm_id !== $v) {
        $this->catipalm_id = $v;
        $this->modifiedColumns[] = CadefalmPeer::CATIPALM_ID;
      }
  
		if ($this->aCatipalm !== null && $this->aCatipalm->getId() !== $v) {
			$this->aCatipalm = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CadefalmPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codalm = $rs->getString($startcol + 0);

      $this->nomalm = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->catipalm_id = $rs->getInt($startcol + 3);

      $this->id = $rs->getInt($startcol + 4);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 5; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Cadefalm object", $e);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CadefalmPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CadefalmPeer::DATABASE_NAME);
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


												
			if ($this->aCatipalm !== null) {
				if ($this->aCatipalm->isModified()) {
					$affectedRows += $this->aCatipalm->save($con);
				}
				$this->setCatipalm($this->aCatipalm);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CadefalmPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CadefalmPeer::doUpdate($this, $con);
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


												
			if ($this->aCatipalm !== null) {
				if (!$this->aCatipalm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatipalm->getValidationFailures());
				}
			}


			if (($retval = CadefalmPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodalm();
				break;
			case 1:
				return $this->getNomalm();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCatipalmId();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefalmPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodalm(),
			$keys[1] => $this->getNomalm(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCatipalmId(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CadefalmPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodalm($value);
				break;
			case 1:
				$this->setNomalm($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCatipalmId($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CadefalmPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodalm($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomalm($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCatipalmId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		if ($this->isColumnModified(CadefalmPeer::CODALM)) $criteria->add(CadefalmPeer::CODALM, $this->codalm);
		if ($this->isColumnModified(CadefalmPeer::NOMALM)) $criteria->add(CadefalmPeer::NOMALM, $this->nomalm);
		if ($this->isColumnModified(CadefalmPeer::CODCAT)) $criteria->add(CadefalmPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CadefalmPeer::CATIPALM_ID)) $criteria->add(CadefalmPeer::CATIPALM_ID, $this->catipalm_id);
		if ($this->isColumnModified(CadefalmPeer::ID)) $criteria->add(CadefalmPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CadefalmPeer::DATABASE_NAME);

		$criteria->add(CadefalmPeer::ID, $this->id);

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

		$copyObj->setCodalm($this->codalm);

		$copyObj->setNomalm($this->nomalm);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCatipalmId($this->catipalm_id);


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
			self::$peer = new CadefalmPeer();
		}
		return self::$peer;
	}

	
	public function setCatipalm($v)
	{


		if ($v === null) {
			$this->setCatipalmId(NULL);
		} else {
			$this->setCatipalmId($v->getId());
		}


		$this->aCatipalm = $v;
	}


	
	public function getCatipalm($con = null)
	{
		if ($this->aCatipalm === null && ($this->catipalm_id !== null)) {
						include_once 'lib/model/om/BaseCatipalmPeer.php';

			$this->aCatipalm = CatipalmPeer::retrieveByPK($this->catipalm_id, $con);

			
		}
		return $this->aCatipalm;
	}

} 