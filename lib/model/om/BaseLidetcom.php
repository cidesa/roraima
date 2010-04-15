<?php


abstract class BaseLidetcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $licomlic_id;


	
	protected $codemp;


	
	protected $id;

	
	protected $aLicomlic;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLicomlicId()
  {

    return $this->licomlic_id;

  }
  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLicomlicId($v)
	{

    if ($this->licomlic_id !== $v) {
        $this->licomlic_id = $v;
        $this->modifiedColumns[] = LidetcomPeer::LICOMLIC_ID;
      }
  
		if ($this->aLicomlic !== null && $this->aLicomlic->getId() !== $v) {
			$this->aLicomlic = null;
		}

	} 
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LidetcomPeer::CODEMP;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidetcomPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->licomlic_id = $rs->getInt($startcol + 0);

      $this->codemp = $rs->getString($startcol + 1);

      $this->id = $rs->getInt($startcol + 2);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 3; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidetcom object", $e);
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
			$con = Propel::getConnection(LidetcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidetcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidetcomPeer::DATABASE_NAME);
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


												
			if ($this->aLicomlic !== null) {
				if ($this->aLicomlic->isModified()) {
					$affectedRows += $this->aLicomlic->save($con);
				}
				$this->setLicomlic($this->aLicomlic);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidetcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidetcomPeer::doUpdate($this, $con);
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


												
			if ($this->aLicomlic !== null) {
				if (!$this->aLicomlic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLicomlic->getValidationFailures());
				}
			}


			if (($retval = LidetcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLicomlicId();
				break;
			case 1:
				return $this->getCodemp();
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
		$keys = LidetcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLicomlicId(),
			$keys[1] => $this->getCodemp(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidetcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLicomlicId($value);
				break;
			case 1:
				$this->setCodemp($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidetcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLicomlicId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidetcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidetcomPeer::LICOMLIC_ID)) $criteria->add(LidetcomPeer::LICOMLIC_ID, $this->licomlic_id);
		if ($this->isColumnModified(LidetcomPeer::CODEMP)) $criteria->add(LidetcomPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LidetcomPeer::ID)) $criteria->add(LidetcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidetcomPeer::DATABASE_NAME);

		$criteria->add(LidetcomPeer::ID, $this->id);

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

		$copyObj->setLicomlicId($this->licomlic_id);

		$copyObj->setCodemp($this->codemp);


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
			self::$peer = new LidetcomPeer();
		}
		return self::$peer;
	}

	
	public function setLicomlic($v)
	{


		if ($v === null) {
			$this->setLicomlicId(NULL);
		} else {
			$this->setLicomlicId($v->getId());
		}


		$this->aLicomlic = $v;
	}


	
	public function getLicomlic($con = null)
	{
		if ($this->aLicomlic === null && ($this->licomlic_id !== null)) {
						include_once 'lib/model/om/BaseLicomlicPeer.php';

			$this->aLicomlic = LicomlicPeer::retrieveByPK($this->licomlic_id, $con);

			
		}
		return $this->aLicomlic;
	}

} 