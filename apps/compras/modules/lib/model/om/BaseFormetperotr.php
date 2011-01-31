<?php


abstract class BaseFormetperotr extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codmet;


	
	protected $codpro;


	
	protected $codact;


	
	protected $codparegr;


	
	protected $perpre;


	
	protected $monper;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodact()
  {

    return trim($this->codact);

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
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = FormetperotrPeer::CODMET;
      }
  
	} 
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FormetperotrPeer::CODPRO;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FormetperotrPeer::CODACT;
      }
  
	} 
	
	public function setCodparegr($v)
	{

    if ($this->codparegr !== $v) {
        $this->codparegr = $v;
        $this->modifiedColumns[] = FormetperotrPeer::CODPAREGR;
      }
  
	} 
	
	public function setPerpre($v)
	{

    if ($this->perpre !== $v) {
        $this->perpre = $v;
        $this->modifiedColumns[] = FormetperotrPeer::PERPRE;
      }
  
	} 
	
	public function setMonper($v)
	{

    if ($this->monper !== $v) {
        $this->monper = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FormetperotrPeer::MONPER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FormetperotrPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codmet = $rs->getString($startcol + 0);

      $this->codpro = $rs->getString($startcol + 1);

      $this->codact = $rs->getString($startcol + 2);

      $this->codparegr = $rs->getString($startcol + 3);

      $this->perpre = $rs->getString($startcol + 4);

      $this->monper = $rs->getFloat($startcol + 5);

      $this->id = $rs->getInt($startcol + 6);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 7; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Formetperotr object", $e);
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
			$con = Propel::getConnection(FormetperotrPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FormetperotrPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FormetperotrPeer::DATABASE_NAME);
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
					$pk = FormetperotrPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FormetperotrPeer::doUpdate($this, $con);
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


			if (($retval = FormetperotrPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormetperotrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodmet();
				break;
			case 1:
				return $this->getCodpro();
				break;
			case 2:
				return $this->getCodact();
				break;
			case 3:
				return $this->getCodparegr();
				break;
			case 4:
				return $this->getPerpre();
				break;
			case 5:
				return $this->getMonper();
				break;
			case 6:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormetperotrPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodmet(),
			$keys[1] => $this->getCodpro(),
			$keys[2] => $this->getCodact(),
			$keys[3] => $this->getCodparegr(),
			$keys[4] => $this->getPerpre(),
			$keys[5] => $this->getMonper(),
			$keys[6] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormetperotrPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodmet($value);
				break;
			case 1:
				$this->setCodpro($value);
				break;
			case 2:
				$this->setCodact($value);
				break;
			case 3:
				$this->setCodparegr($value);
				break;
			case 4:
				$this->setPerpre($value);
				break;
			case 5:
				$this->setMonper($value);
				break;
			case 6:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormetperotrPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodmet($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodpro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodact($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodparegr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPerpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonper($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FormetperotrPeer::DATABASE_NAME);

		if ($this->isColumnModified(FormetperotrPeer::CODMET)) $criteria->add(FormetperotrPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FormetperotrPeer::CODPRO)) $criteria->add(FormetperotrPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FormetperotrPeer::CODACT)) $criteria->add(FormetperotrPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FormetperotrPeer::CODPAREGR)) $criteria->add(FormetperotrPeer::CODPAREGR, $this->codparegr);
		if ($this->isColumnModified(FormetperotrPeer::PERPRE)) $criteria->add(FormetperotrPeer::PERPRE, $this->perpre);
		if ($this->isColumnModified(FormetperotrPeer::MONPER)) $criteria->add(FormetperotrPeer::MONPER, $this->monper);
		if ($this->isColumnModified(FormetperotrPeer::ID)) $criteria->add(FormetperotrPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FormetperotrPeer::DATABASE_NAME);

		$criteria->add(FormetperotrPeer::ID, $this->id);

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

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodact($this->codact);

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
			self::$peer = new FormetperotrPeer();
		}
		return self::$peer;
	}

} 
