<?php


abstract class BaseCcrecsol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $ccstatus;


	
	protected $ccrecaud_id;


	
	protected $ccsolici_id;

	
	protected $aCcrecaud;

	
	protected $aCcsolici;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getCcstatus()
  {

    return $this->ccstatus;

  }
  
  public function getCcrecaudId()
  {

    return $this->ccrecaud_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrecsolPeer::ID;
      }
  
	} 
	
	public function setCcstatus($v)
	{

    if ($this->ccstatus !== $v) {
        $this->ccstatus = $v;
        $this->modifiedColumns[] = CcrecsolPeer::CCSTATUS;
      }
  
	} 
	
	public function setCcrecaudId($v)
	{

    if ($this->ccrecaud_id !== $v) {
        $this->ccrecaud_id = $v;
        $this->modifiedColumns[] = CcrecsolPeer::CCRECAUD_ID;
      }
  
		if ($this->aCcrecaud !== null && $this->aCcrecaud->getId() !== $v) {
			$this->aCcrecaud = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcrecsolPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->ccstatus = $rs->getInt($startcol + 1);

      $this->ccrecaud_id = $rs->getInt($startcol + 2);

      $this->ccsolici_id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrecsol object", $e);
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
			$con = Propel::getConnection(CcrecsolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrecsolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrecsolPeer::DATABASE_NAME);
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


												
			if ($this->aCcrecaud !== null) {
				if ($this->aCcrecaud->isModified()) {
					$affectedRows += $this->aCcrecaud->save($con);
				}
				$this->setCcrecaud($this->aCcrecaud);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrecsolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrecsolPeer::doUpdate($this, $con);
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


												
			if ($this->aCcrecaud !== null) {
				if (!$this->aCcrecaud->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcrecaud->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}


			if (($retval = CcrecsolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getCcstatus();
				break;
			case 2:
				return $this->getCcrecaudId();
				break;
			case 3:
				return $this->getCcsoliciId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecsolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCcstatus(),
			$keys[2] => $this->getCcrecaudId(),
			$keys[3] => $this->getCcsoliciId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrecsolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setCcstatus($value);
				break;
			case 2:
				$this->setCcrecaudId($value);
				break;
			case 3:
				$this->setCcsoliciId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrecsolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCcstatus($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCcrecaudId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCcsoliciId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrecsolPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrecsolPeer::ID)) $criteria->add(CcrecsolPeer::ID, $this->id);
		if ($this->isColumnModified(CcrecsolPeer::CCSTATUS)) $criteria->add(CcrecsolPeer::CCSTATUS, $this->ccstatus);
		if ($this->isColumnModified(CcrecsolPeer::CCRECAUD_ID)) $criteria->add(CcrecsolPeer::CCRECAUD_ID, $this->ccrecaud_id);
		if ($this->isColumnModified(CcrecsolPeer::CCSOLICI_ID)) $criteria->add(CcrecsolPeer::CCSOLICI_ID, $this->ccsolici_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrecsolPeer::DATABASE_NAME);

		$criteria->add(CcrecsolPeer::ID, $this->id);

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

		$copyObj->setCcstatus($this->ccstatus);

		$copyObj->setCcrecaudId($this->ccrecaud_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);


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
			self::$peer = new CcrecsolPeer();
		}
		return self::$peer;
	}

	
	public function setCcrecaud($v)
	{


		if ($v === null) {
			$this->setCcrecaudId(NULL);
		} else {
			$this->setCcrecaudId($v->getId());
		}


		$this->aCcrecaud = $v;
	}


	
	public function getCcrecaud($con = null)
	{
		if ($this->aCcrecaud === null && ($this->ccrecaud_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcrecaudPeer.php';

      $c = new Criteria();
      $c->add(CcrecaudPeer::ID,$this->ccrecaud_id);
      
			$this->aCcrecaud = CcrecaudPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcrecaud;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
	}

} 