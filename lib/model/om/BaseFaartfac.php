<?php


abstract class BaseFaartfac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $reffac;


	
	protected $codart;


	
	protected $desart;


	
	protected $codref;


	
	protected $cantot;


	
	protected $precio;


	
	protected $monrgo;


	
	protected $mondes;


	
	protected $totart;


	
	protected $canaju;


	protected $nronot;


	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getReffac()
  {

    return trim($this->reffac);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getCodref()
  {

    return trim($this->codref);

  }
  
  public function getCantot($val=false)
  {

    if($val) return number_format($this->cantot,2,',','.');
    else return $this->cantot;

  }
  
  public function getPrecio($val=false)
  {

    if($val) return number_format($this->precio,2,',','.');
    else return $this->precio;

  }
  
  public function getMonrgo($val=false)
  {

    if($val) return number_format($this->monrgo,2,',','.');
    else return $this->monrgo;

  }
  
  public function getMondes($val=false)
  {

    if($val) return number_format($this->mondes,2,',','.');
    else return $this->mondes;

  }
  
  public function getTotart($val=false)
  {

    if($val) return number_format($this->totart,2,',','.');
    else return $this->totart;

  }
  
  public function getCanaju($val=false)
  {

    if($val) return number_format($this->canaju,2,',','.');
    else return $this->canaju;

  }
  
  public function getNronot()
  {

    return trim($this->nronot);

  }

  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FaartfacPeer::REFFAC;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartfacPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = FaartfacPeer::DESART;
      }
  
	} 
	
	public function setCodref($v)
	{

    if ($this->codref !== $v) {
        $this->codref = $v;
        $this->modifiedColumns[] = FaartfacPeer::CODREF;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::CANTOT;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::PRECIO;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::MONRGO;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::MONDES;
      }
  
	} 
	
	public function setTotart($v)
	{

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::TOTART;
      }
  
	} 
	
	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::CANAJU;
      }
  
	} 
	
	public function setNronot($v)
	{

    if ($this->nronot !== $v) {
        $this->nronot = $v;
        $this->modifiedColumns[] = FaartfacPeer::NRONOT;
      }
  
	} 

	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartfacPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->reffac = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->desart = $rs->getString($startcol + 2);

      $this->codref = $rs->getString($startcol + 3);

      $this->cantot = $rs->getFloat($startcol + 4);

      $this->precio = $rs->getFloat($startcol + 5);

      $this->monrgo = $rs->getFloat($startcol + 6);

      $this->mondes = $rs->getFloat($startcol + 7);

      $this->totart = $rs->getFloat($startcol + 8);

      $this->canaju = $rs->getFloat($startcol + 9);

      $this->nronot = $rs->getString($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartfac object", $e);
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
			$con = Propel::getConnection(FaartfacPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartfacPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartfacPeer::DATABASE_NAME);
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
					$pk = FaartfacPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartfacPeer::doUpdate($this, $con);
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


			if (($retval = FaartfacPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartfacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getReffac();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getDesart();
				break;
			case 3:
				return $this->getCodref();
				break;
			case 4:
				return $this->getCantot();
				break;
			case 5:
				return $this->getPrecio();
				break;
			case 6:
				return $this->getMonrgo();
				break;
			case 7:
				return $this->getMondes();
				break;
			case 8:
				return $this->getTotart();
				break;
			case 9:
				return $this->getCanaju();
				break;
			case 10:
				return $this->getNronot();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartfacPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getReffac(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getDesart(),
			$keys[3] => $this->getCodref(),
			$keys[4] => $this->getCantot(),
			$keys[5] => $this->getPrecio(),
			$keys[6] => $this->getMonrgo(),
			$keys[7] => $this->getMondes(),
			$keys[8] => $this->getTotart(),
			$keys[9] => $this->getCanaju(),
			$keys[10] => $this->getNronot(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartfacPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setReffac($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setDesart($value);
				break;
			case 3:
				$this->setCodref($value);
				break;
			case 4:
				$this->setCantot($value);
				break;
			case 5:
				$this->setPrecio($value);
				break;
			case 6:
				$this->setMonrgo($value);
				break;
			case 7:
				$this->setMondes($value);
				break;
			case 8:
				$this->setTotart($value);
				break;
			case 9:
				$this->setCanaju($value);
				break;
			case 10:
				$this->setNronot($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartfacPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setReffac($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesart($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodref($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCantot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPrecio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonrgo($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMondes($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTotart($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCanaju($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNronot($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartfacPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartfacPeer::REFFAC)) $criteria->add(FaartfacPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FaartfacPeer::CODART)) $criteria->add(FaartfacPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartfacPeer::DESART)) $criteria->add(FaartfacPeer::DESART, $this->desart);
		if ($this->isColumnModified(FaartfacPeer::CODREF)) $criteria->add(FaartfacPeer::CODREF, $this->codref);
		if ($this->isColumnModified(FaartfacPeer::CANTOT)) $criteria->add(FaartfacPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(FaartfacPeer::PRECIO)) $criteria->add(FaartfacPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(FaartfacPeer::MONRGO)) $criteria->add(FaartfacPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FaartfacPeer::MONDES)) $criteria->add(FaartfacPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(FaartfacPeer::TOTART)) $criteria->add(FaartfacPeer::TOTART, $this->totart);
		if ($this->isColumnModified(FaartfacPeer::CANAJU)) $criteria->add(FaartfacPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(FaartfacPeer::NRONOT)) $criteria->add(FaartfacPeer::NRONOT, $this->nronot);
		if ($this->isColumnModified(FaartfacPeer::ID)) $criteria->add(FaartfacPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartfacPeer::DATABASE_NAME);

		$criteria->add(FaartfacPeer::ID, $this->id);

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

		$copyObj->setReffac($this->reffac);

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setCodref($this->codref);

		$copyObj->setCantot($this->cantot);

		$copyObj->setPrecio($this->precio);

		$copyObj->setMonrgo($this->monrgo);

		$copyObj->setMondes($this->mondes);

		$copyObj->setTotart($this->totart);

		$copyObj->setCanaju($this->canaju);


		$copyObj->setNronot($this->nronot);


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
			self::$peer = new FaartfacPeer();
		}
		return self::$peer;
	}

} 