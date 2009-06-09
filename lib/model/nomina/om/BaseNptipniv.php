<?php


abstract class BaseNptipniv extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codtipniv;


	
	protected $maxsue;


	
	protected $medsue;


	
	protected $minsue;


	
	protected $codtipcla;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodtipniv()
  {

    return trim($this->codtipniv);

  }
  
  public function getMaxsue($val=false)
  {

    if($val) return number_format($this->maxsue,2,',','.');
    else return $this->maxsue;

  }
  
  public function getMedsue($val=false)
  {

    if($val) return number_format($this->medsue,2,',','.');
    else return $this->medsue;

  }
  
  public function getMinsue($val=false)
  {

    if($val) return number_format($this->minsue,2,',','.');
    else return $this->minsue;

  }
  
  public function getCodtipcla()
  {

    return trim($this->codtipcla);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodtipniv($v)
	{

    if ($this->codtipniv !== $v) {
        $this->codtipniv = $v;
        $this->modifiedColumns[] = NptipnivPeer::CODTIPNIV;
      }
  
	} 
	
	public function setMaxsue($v)
	{

    if ($this->maxsue !== $v) {
        $this->maxsue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptipnivPeer::MAXSUE;
      }
  
	} 
	
	public function setMedsue($v)
	{

    if ($this->medsue !== $v) {
        $this->medsue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptipnivPeer::MEDSUE;
      }
  
	} 
	
	public function setMinsue($v)
	{

    if ($this->minsue !== $v) {
        $this->minsue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NptipnivPeer::MINSUE;
      }
  
	} 
	
	public function setCodtipcla($v)
	{

    if ($this->codtipcla !== $v) {
        $this->codtipcla = $v;
        $this->modifiedColumns[] = NptipnivPeer::CODTIPCLA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NptipnivPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codtipniv = $rs->getString($startcol + 0);

      $this->maxsue = $rs->getFloat($startcol + 1);

      $this->medsue = $rs->getFloat($startcol + 2);

      $this->minsue = $rs->getFloat($startcol + 3);

      $this->codtipcla = $rs->getString($startcol + 4);

      $this->id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Nptipniv object", $e);
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
			$con = Propel::getConnection(NptipnivPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NptipnivPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NptipnivPeer::DATABASE_NAME);
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
					$pk = NptipnivPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NptipnivPeer::doUpdate($this, $con);
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


			if (($retval = NptipnivPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodtipniv();
				break;
			case 1:
				return $this->getMaxsue();
				break;
			case 2:
				return $this->getMedsue();
				break;
			case 3:
				return $this->getMinsue();
				break;
			case 4:
				return $this->getCodtipcla();
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
		$keys = NptipnivPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodtipniv(),
			$keys[1] => $this->getMaxsue(),
			$keys[2] => $this->getMedsue(),
			$keys[3] => $this->getMinsue(),
			$keys[4] => $this->getCodtipcla(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NptipnivPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodtipniv($value);
				break;
			case 1:
				$this->setMaxsue($value);
				break;
			case 2:
				$this->setMedsue($value);
				break;
			case 3:
				$this->setMinsue($value);
				break;
			case 4:
				$this->setCodtipcla($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NptipnivPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodtipniv($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMaxsue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMedsue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMinsue($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodtipcla($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NptipnivPeer::DATABASE_NAME);

		if ($this->isColumnModified(NptipnivPeer::CODTIPNIV)) $criteria->add(NptipnivPeer::CODTIPNIV, $this->codtipniv);
		if ($this->isColumnModified(NptipnivPeer::MAXSUE)) $criteria->add(NptipnivPeer::MAXSUE, $this->maxsue);
		if ($this->isColumnModified(NptipnivPeer::MEDSUE)) $criteria->add(NptipnivPeer::MEDSUE, $this->medsue);
		if ($this->isColumnModified(NptipnivPeer::MINSUE)) $criteria->add(NptipnivPeer::MINSUE, $this->minsue);
		if ($this->isColumnModified(NptipnivPeer::CODTIPCLA)) $criteria->add(NptipnivPeer::CODTIPCLA, $this->codtipcla);
		if ($this->isColumnModified(NptipnivPeer::ID)) $criteria->add(NptipnivPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NptipnivPeer::DATABASE_NAME);

		$criteria->add(NptipnivPeer::ID, $this->id);

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

		$copyObj->setCodtipniv($this->codtipniv);

		$copyObj->setMaxsue($this->maxsue);

		$copyObj->setMedsue($this->medsue);

		$copyObj->setMinsue($this->minsue);

		$copyObj->setCodtipcla($this->codtipcla);


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
			self::$peer = new NptipnivPeer();
		}
		return self::$peer;
	}

} 