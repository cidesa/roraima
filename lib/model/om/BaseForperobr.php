<?php


abstract class BaseForperobr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codobr;


	
	protected $codparegr;


	
	protected $perpre;


	
	protected $monper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodobr()
  {

    return trim($this->codobr);

  }
  
  public function getCodparegr()
  {

    return trim($this->codparegr);

  }
  
  public function getPerpre()
  {

    return trim($this->perpre);

  }
  
  public function getMonper($val=false)
  {

    if($val) return number_format($this->monper,2,',','.');
    else return $this->monper;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = ForperobrPeer::CODCAT;
      }
  
	} 
	
	public function setCodobr($v)
	{

    if ($this->codobr !== $v) {
        $this->codobr = $v;
        $this->modifiedColumns[] = ForperobrPeer::CODOBR;
      }
  
	} 
	
	public function setCodparegr($v)
	{

    if ($this->codparegr !== $v) {
        $this->codparegr = $v;
        $this->modifiedColumns[] = ForperobrPeer::CODPAREGR;
      }
  
	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = ForperobrPeer::PERPRE;
      }
  
	} 
	
	public function setMonper($v)
	{

    if ($this->monper !== $v) {
        $this->monper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForperobrPeer::MONPER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForperobrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codobr = $rs->getString($startcol + 1);

      $this->codparegr = $rs->getString($startcol + 2);

      $this->perpre = $rs->getString($startcol + 3);

      $this->monper = $rs->getFloat($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forperobr object", $e);
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
			$con = Propel::getConnection(ForperobrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForperobrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForperobrPeer::DATABASE_NAME);
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
					$pk = ForperobrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForperobrPeer::doUpdate($this, $con);
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


			if (($retval = ForperobrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForperobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodobr();
				break;
			case 2:
				return $this->getCodparegr();
				break;
			case 3:
				return $this->getPerpre();
				break;
			case 4:
				return $this->getMonper();
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
		$keys = ForperobrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodobr(),
			$keys[2] => $this->getCodparegr(),
			$keys[3] => $this->getPerpre(),
			$keys[4] => $this->getMonper(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForperobrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodobr($value);
				break;
			case 2:
				$this->setCodparegr($value);
				break;
			case 3:
				$this->setPerpre($value);
				break;
			case 4:
				$this->setMonper($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForperobrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodobr($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodparegr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPerpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonper($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForperobrPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForperobrPeer::CODCAT)) $criteria->add(ForperobrPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(ForperobrPeer::CODOBR)) $criteria->add(ForperobrPeer::CODOBR, $this->codobr);
		if ($this->isColumnModified(ForperobrPeer::CODPAREGR)) $criteria->add(ForperobrPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(ForperobrPeer::PERPRE)) $criteria->add(ForperobrPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(ForperobrPeer::MONPER)) $criteria->add(ForperobrPeer::MONPER, $this->monper);
		if ($this->isColumnModified(ForperobrPeer::ID)) $criteria->add(ForperobrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForperobrPeer::DATABASE_NAME);

		$criteria->add(ForperobrPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodobr($this->codobr);

		$copyObj->setCodparegr($this->codparegr);

		$copyObj->setPerpre($this->perpre);

		$copyObj->setMonper($this->monper);


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
			self::$peer = new ForperobrPeer();
		}
		return self::$peer;
	}

} 