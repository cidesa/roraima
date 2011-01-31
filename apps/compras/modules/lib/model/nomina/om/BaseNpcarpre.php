<?php


abstract class BaseNpcarpre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codcar;


	
	protected $canpre;


	
	protected $canhpre;


	
	protected $canmpre;


	
	protected $canasi;


	
	protected $canhom;


	
	protected $canmuj;


	
	protected $canvac;


	
	protected $canhvac;


	
	protected $canmvac;


	
	protected $monpre;


	
	protected $monasi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCodcar()
  {

    return trim($this->codcar);

  }
  
  public function getCanpre($val=false)
  {

    if($val) return number_format($this->canpre,2,',','.');
    else return $this->canpre;

  }
  
  public function getCanhpre($val=false)
  {

    if($val) return number_format($this->canhpre,2,',','.');
    else return $this->canhpre;

  }
  
  public function getCanmpre($val=false)
  {

    if($val) return number_format($this->canmpre,2,',','.');
    else return $this->canmpre;

  }
  
  public function getCanasi($val=false)
  {

    if($val) return number_format($this->canasi,2,',','.');
    else return $this->canasi;

  }
  
  public function getCanhom($val=false)
  {

    if($val) return number_format($this->canhom,2,',','.');
    else return $this->canhom;

  }
  
  public function getCanmuj($val=false)
  {

    if($val) return number_format($this->canmuj,2,',','.');
    else return $this->canmuj;

  }
  
  public function getCanvac($val=false)
  {

    if($val) return number_format($this->canvac,2,',','.');
    else return $this->canvac;

  }
  
  public function getCanhvac($val=false)
  {

    if($val) return number_format($this->canhvac,2,',','.');
    else return $this->canhvac;

  }
  
  public function getCanmvac($val=false)
  {

    if($val) return number_format($this->canmvac,2,',','.');
    else return $this->canmvac;

  }
  
  public function getMonpre($val=false)
  {

    if($val) return number_format($this->monpre,2,',','.');
    else return $this->monpre;

  }
  
  public function getMonasi($val=false)
  {

    if($val) return number_format($this->monasi,2,',','.');
    else return $this->monasi;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = NpcarprePeer::CODCAT;
      }
  
	} 
	
	public function setCodcar($v)
	{

    if ($this->codcar !== $v) {
        $this->codcar = $v;
        $this->modifiedColumns[] = NpcarprePeer::CODCAR;
      }
  
	} 
	
	public function setCanpre($v)
	{

    if ($this->canpre !== $v) {
        $this->canpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANPRE;
      }
  
	} 
	
	public function setCanhpre($v)
	{

    if ($this->canhpre !== $v) {
        $this->canhpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANHPRE;
      }
  
	} 
	
	public function setCanmpre($v)
	{

    if ($this->canmpre !== $v) {
        $this->canmpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANMPRE;
      }
  
	} 
	
	public function setCanasi($v)
	{

    if ($this->canasi !== $v) {
        $this->canasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANASI;
      }
  
	} 
	
	public function setCanhom($v)
	{

    if ($this->canhom !== $v) {
        $this->canhom = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANHOM;
      }
  
	} 
	
	public function setCanmuj($v)
	{

    if ($this->canmuj !== $v) {
        $this->canmuj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANMUJ;
      }
  
	} 
	
	public function setCanvac($v)
	{

    if ($this->canvac !== $v) {
        $this->canvac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANVAC;
      }
  
	} 
	
	public function setCanhvac($v)
	{

    if ($this->canhvac !== $v) {
        $this->canhvac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANHVAC;
      }
  
	} 
	
	public function setCanmvac($v)
	{

    if ($this->canmvac !== $v) {
        $this->canmvac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::CANMVAC;
      }
  
	} 
	
	public function setMonpre($v)
	{

    if ($this->monpre !== $v) {
        $this->monpre = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::MONPRE;
      }
  
	} 
	
	public function setMonasi($v)
	{

    if ($this->monasi !== $v) {
        $this->monasi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpcarprePeer::MONASI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpcarprePeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codcat = $rs->getString($startcol + 0);

      $this->codcar = $rs->getString($startcol + 1);

      $this->canpre = $rs->getFloat($startcol + 2);

      $this->canhpre = $rs->getFloat($startcol + 3);

      $this->canmpre = $rs->getFloat($startcol + 4);

      $this->canasi = $rs->getFloat($startcol + 5);

      $this->canhom = $rs->getFloat($startcol + 6);

      $this->canmuj = $rs->getFloat($startcol + 7);

      $this->canvac = $rs->getFloat($startcol + 8);

      $this->canhvac = $rs->getFloat($startcol + 9);

      $this->canmvac = $rs->getFloat($startcol + 10);

      $this->monpre = $rs->getFloat($startcol + 11);

      $this->monasi = $rs->getFloat($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npcarpre object", $e);
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
			$con = Propel::getConnection(NpcarprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcarprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcarprePeer::DATABASE_NAME);
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
					$pk = NpcarprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpcarprePeer::doUpdate($this, $con);
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


			if (($retval = NpcarprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcarprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getCanpre();
				break;
			case 3:
				return $this->getCanhpre();
				break;
			case 4:
				return $this->getCanmpre();
				break;
			case 5:
				return $this->getCanasi();
				break;
			case 6:
				return $this->getCanhom();
				break;
			case 7:
				return $this->getCanmuj();
				break;
			case 8:
				return $this->getCanvac();
				break;
			case 9:
				return $this->getCanhvac();
				break;
			case 10:
				return $this->getCanmvac();
				break;
			case 11:
				return $this->getMonpre();
				break;
			case 12:
				return $this->getMonasi();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcarprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getCanpre(),
			$keys[3] => $this->getCanhpre(),
			$keys[4] => $this->getCanmpre(),
			$keys[5] => $this->getCanasi(),
			$keys[6] => $this->getCanhom(),
			$keys[7] => $this->getCanmuj(),
			$keys[8] => $this->getCanvac(),
			$keys[9] => $this->getCanhvac(),
			$keys[10] => $this->getCanmvac(),
			$keys[11] => $this->getMonpre(),
			$keys[12] => $this->getMonasi(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcarprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setCanpre($value);
				break;
			case 3:
				$this->setCanhpre($value);
				break;
			case 4:
				$this->setCanmpre($value);
				break;
			case 5:
				$this->setCanasi($value);
				break;
			case 6:
				$this->setCanhom($value);
				break;
			case 7:
				$this->setCanmuj($value);
				break;
			case 8:
				$this->setCanvac($value);
				break;
			case 9:
				$this->setCanhvac($value);
				break;
			case 10:
				$this->setCanmvac($value);
				break;
			case 11:
				$this->setMonpre($value);
				break;
			case 12:
				$this->setMonasi($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcarprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCanpre($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanhpre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanmpre($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanasi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCanhom($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCanmuj($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCanvac($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCanhvac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCanmvac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMonpre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonasi($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcarprePeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcarprePeer::CODCAT)) $criteria->add(NpcarprePeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpcarprePeer::CODCAR)) $criteria->add(NpcarprePeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpcarprePeer::CANPRE)) $criteria->add(NpcarprePeer::CANPRE, $this->canpre);
		if ($this->isColumnModified(NpcarprePeer::CANHPRE)) $criteria->add(NpcarprePeer::CANHPRE, $this->canhpre);
		if ($this->isColumnModified(NpcarprePeer::CANMPRE)) $criteria->add(NpcarprePeer::CANMPRE, $this->canmpre);
		if ($this->isColumnModified(NpcarprePeer::CANASI)) $criteria->add(NpcarprePeer::CANASI, $this->canasi);
		if ($this->isColumnModified(NpcarprePeer::CANHOM)) $criteria->add(NpcarprePeer::CANHOM, $this->canhom);
		if ($this->isColumnModified(NpcarprePeer::CANMUJ)) $criteria->add(NpcarprePeer::CANMUJ, $this->canmuj);
		if ($this->isColumnModified(NpcarprePeer::CANVAC)) $criteria->add(NpcarprePeer::CANVAC, $this->canvac);
		if ($this->isColumnModified(NpcarprePeer::CANHVAC)) $criteria->add(NpcarprePeer::CANHVAC, $this->canhvac);
		if ($this->isColumnModified(NpcarprePeer::CANMVAC)) $criteria->add(NpcarprePeer::CANMVAC, $this->canmvac);
		if ($this->isColumnModified(NpcarprePeer::MONPRE)) $criteria->add(NpcarprePeer::MONPRE, $this->monpre);
		if ($this->isColumnModified(NpcarprePeer::MONASI)) $criteria->add(NpcarprePeer::MONASI, $this->monasi);
		if ($this->isColumnModified(NpcarprePeer::ID)) $criteria->add(NpcarprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcarprePeer::DATABASE_NAME);

		$criteria->add(NpcarprePeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCanpre($this->canpre);

		$copyObj->setCanhpre($this->canhpre);

		$copyObj->setCanmpre($this->canmpre);

		$copyObj->setCanasi($this->canasi);

		$copyObj->setCanhom($this->canhom);

		$copyObj->setCanmuj($this->canmuj);

		$copyObj->setCanvac($this->canvac);

		$copyObj->setCanhvac($this->canhvac);

		$copyObj->setCanmvac($this->canmvac);

		$copyObj->setMonpre($this->monpre);

		$copyObj->setMonasi($this->monasi);


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
			self::$peer = new NpcarprePeer();
		}
		return self::$peer;
	}

} 
