<?php


abstract class BaseFordisfuefinpryaccmet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $codaccesp;


	
	protected $codmet;


	
	protected $codpre;


	
	protected $codparing;


	
	protected $actfue;


	
	protected $monfin;


	
	protected $codact;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodpro()
  {

    return trim($this->codpro);

  }
  
  public function getCodaccesp()
  {

    return trim($this->codaccesp);

  }
  
  public function getCodmet()
  {

    return trim($this->codmet);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getCodparing()
  {

    return trim($this->codparing);

  }
  
  public function getActfue()
  {

    return trim($this->actfue);

  }
  
  public function getMonfin($val=false)
  {

    if($val) return number_format($this->monfin,2,',','.');
    else return $this->monfin;

  }
  
  public function getCodact()
  {

    return trim($this->codact);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodpro($v)
	{

    if ($this->codpro !== $v) {
        $this->codpro = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::CODPRO;
      }
  
	} 
	
	public function setCodaccesp($v)
	{

    if ($this->codaccesp !== $v) {
        $this->codaccesp = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::CODACCESP;
      }
  
	} 
	
	public function setCodmet($v)
	{

    if ($this->codmet !== $v) {
        $this->codmet = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::CODMET;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::CODPRE;
      }
  
	} 
	
	public function setCodparing($v)
	{

    if ($this->codparing !== $v) {
        $this->codparing = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::CODPARING;
      }
  
	} 
	
	public function setActfue($v)
	{

    if ($this->actfue !== $v) {
        $this->actfue = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::ACTFUE;
      }
  
	} 
	
	public function setMonfin($v)
	{

    if ($this->monfin !== $v) {
        $this->monfin = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::MONFIN;
      }
  
	} 
	
	public function setCodact($v)
	{

    if ($this->codact !== $v) {
        $this->codact = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::CODACT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordisfuefinpryaccmetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codpro = $rs->getString($startcol + 0);

      $this->codaccesp = $rs->getString($startcol + 1);

      $this->codmet = $rs->getString($startcol + 2);

      $this->codpre = $rs->getString($startcol + 3);

      $this->codparing = $rs->getString($startcol + 4);

      $this->actfue = $rs->getString($startcol + 5);

      $this->monfin = $rs->getFloat($startcol + 6);

      $this->codact = $rs->getString($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordisfuefinpryaccmet object", $e);
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
			$con = Propel::getConnection(FordisfuefinpryaccmetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordisfuefinpryaccmetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordisfuefinpryaccmetPeer::DATABASE_NAME);
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
					$pk = FordisfuefinpryaccmetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordisfuefinpryaccmetPeer::doUpdate($this, $con);
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


			if (($retval = FordisfuefinpryaccmetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordisfuefinpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getCodaccesp();
				break;
			case 2:
				return $this->getCodmet();
				break;
			case 3:
				return $this->getCodpre();
				break;
			case 4:
				return $this->getCodparing();
				break;
			case 5:
				return $this->getActfue();
				break;
			case 6:
				return $this->getMonfin();
				break;
			case 7:
				return $this->getCodact();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordisfuefinpryaccmetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getCodaccesp(),
			$keys[2] => $this->getCodmet(),
			$keys[3] => $this->getCodpre(),
			$keys[4] => $this->getCodparing(),
			$keys[5] => $this->getActfue(),
			$keys[6] => $this->getMonfin(),
			$keys[7] => $this->getCodact(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordisfuefinpryaccmetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setCodaccesp($value);
				break;
			case 2:
				$this->setCodmet($value);
				break;
			case 3:
				$this->setCodpre($value);
				break;
			case 4:
				$this->setCodparing($value);
				break;
			case 5:
				$this->setActfue($value);
				break;
			case 6:
				$this->setMonfin($value);
				break;
			case 7:
				$this->setCodact($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordisfuefinpryaccmetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodaccesp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodmet($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodparing($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setActfue($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonfin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodact($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordisfuefinpryaccmetPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::CODPRO)) $criteria->add(FordisfuefinpryaccmetPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::CODACCESP)) $criteria->add(FordisfuefinpryaccmetPeer::CODACCESP, $this->codaccesp);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::CODMET)) $criteria->add(FordisfuefinpryaccmetPeer::CODMET, $this->codmet);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::CODPRE)) $criteria->add(FordisfuefinpryaccmetPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::CODPARING)) $criteria->add(FordisfuefinpryaccmetPeer::CODPARING, $this->codparing);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::ACTFUE)) $criteria->add(FordisfuefinpryaccmetPeer::ACTFUE, $this->actfue);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::MONFIN)) $criteria->add(FordisfuefinpryaccmetPeer::MONFIN, $this->monfin);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::CODACT)) $criteria->add(FordisfuefinpryaccmetPeer::CODACT, $this->codact);
		if ($this->isColumnModified(FordisfuefinpryaccmetPeer::ID)) $criteria->add(FordisfuefinpryaccmetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordisfuefinpryaccmetPeer::DATABASE_NAME);

		$criteria->add(FordisfuefinpryaccmetPeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setCodaccesp($this->codaccesp);

		$copyObj->setCodmet($this->codmet);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setCodparing($this->codparing);

		$copyObj->setActfue($this->actfue);

		$copyObj->setMonfin($this->monfin);

		$copyObj->setCodact($this->codact);


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
			self::$peer = new FordisfuefinpryaccmetPeer();
		}
		return self::$peer;
	}

} 