<?php


abstract class BaseSegranapr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $randes;


	
	protected $ranhas;


	
	protected $codniv;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRandes($val=false)
  {

    if($val) return number_format($this->randes,2,',','.');
    else return $this->randes;

  }
  
  public function getRanhas($val=false)
  {

    if($val) return number_format($this->ranhas,2,',','.');
    else return $this->ranhas;

  }
  
  public function getCodniv()
  {

    return trim($this->codniv);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRandes($v)
	{

    if ($this->randes !== $v) {
        $this->randes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = SegranaprPeer::RANDES;
      }
  
	} 
	
	public function setRanhas($v)
	{

    if ($this->ranhas !== $v) {
        $this->ranhas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = SegranaprPeer::RANHAS;
      }
  
	} 
	
	public function setCodniv($v)
	{

    if ($this->codniv !== $v) {
        $this->codniv = $v;
        $this->modifiedColumns[] = SegranaprPeer::CODNIV;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = SegranaprPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->randes = $rs->getFloat($startcol + 0);

      $this->ranhas = $rs->getFloat($startcol + 1);

      $this->codniv = $rs->getString($startcol + 2);

      $this->id = $rs->getInt($startcol + 3);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 4; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Segranapr object", $e);
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
			$con = Propel::getConnection(SegranaprPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SegranaprPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SegranaprPeer::DATABASE_NAME);
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
					$pk = SegranaprPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SegranaprPeer::doUpdate($this, $con);
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


			if (($retval = SegranaprPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SegranaprPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRandes();
				break;
			case 1:
				return $this->getRanhas();
				break;
			case 2:
				return $this->getCodniv();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SegranaprPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRandes(),
			$keys[1] => $this->getRanhas(),
			$keys[2] => $this->getCodniv(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SegranaprPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRandes($value);
				break;
			case 1:
				$this->setRanhas($value);
				break;
			case 2:
				$this->setCodniv($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SegranaprPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRandes($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRanhas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodniv($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SegranaprPeer::DATABASE_NAME);

		if ($this->isColumnModified(SegranaprPeer::RANDES)) $criteria->add(SegranaprPeer::RANDES, $this->randes);
		if ($this->isColumnModified(SegranaprPeer::RANHAS)) $criteria->add(SegranaprPeer::RANHAS, $this->ranhas);
		if ($this->isColumnModified(SegranaprPeer::CODNIV)) $criteria->add(SegranaprPeer::CODNIV, $this->codniv);
		if ($this->isColumnModified(SegranaprPeer::ID)) $criteria->add(SegranaprPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SegranaprPeer::DATABASE_NAME);

		$criteria->add(SegranaprPeer::ID, $this->id);

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

		$copyObj->setRandes($this->randes);

		$copyObj->setRanhas($this->ranhas);

		$copyObj->setCodniv($this->codniv);


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
			self::$peer = new SegranaprPeer();
		}
		return self::$peer;
	}

} 