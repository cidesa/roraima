<?php


abstract class BaseFordefaccpoa extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsubacc;


	
	protected $dessubacc;


	
	protected $metsubacc;


	
	protected $locsubacc;


	
	protected $indgessubacc;


	
	protected $codunimed;


	
	protected $medversubacc;


	
	protected $supsubacc;


	
	protected $metpritri;


	
	protected $metsegtri;


	
	protected $mettertri;


	
	protected $metcuatri;


	
	protected $mettot;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodsubacc()
  {

    return trim($this->codsubacc);

  }
  
  public function getDessubacc()
  {

    return trim($this->dessubacc);

  }
  
  public function getMetsubacc()
  {

    return trim($this->metsubacc);

  }
  
  public function getLocsubacc()
  {

    return trim($this->locsubacc);

  }
  
  public function getIndgessubacc()
  {

    return trim($this->indgessubacc);

  }
  
  public function getCodunimed()
  {

    return trim($this->codunimed);

  }
  
  public function getMedversubacc()
  {

    return trim($this->medversubacc);

  }
  
  public function getSupsubacc()
  {

    return trim($this->supsubacc);

  }
  
  public function getMetpritri($val=false)
  {

    if($val) return number_format($this->metpritri,2,',','.');
    else return $this->metpritri;

  }
  
  public function getMetsegtri($val=false)
  {

    if($val) return number_format($this->metsegtri,2,',','.');
    else return $this->metsegtri;

  }
  
  public function getMettertri($val=false)
  {

    if($val) return number_format($this->mettertri,2,',','.');
    else return $this->mettertri;

  }
  
  public function getMetcuatri($val=false)
  {

    if($val) return number_format($this->metcuatri,2,',','.');
    else return $this->metcuatri;

  }
  
  public function getMettot($val=false)
  {

    if($val) return number_format($this->mettot,2,',','.');
    else return $this->mettot;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodsubacc($v)
	{

    if ($this->codsubacc !== $v) {
        $this->codsubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::CODSUBACC;
      }
  
	} 
	
	public function setDessubacc($v)
	{

    if ($this->dessubacc !== $v) {
        $this->dessubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::DESSUBACC;
      }
  
	} 
	
	public function setMetsubacc($v)
	{

    if ($this->metsubacc !== $v) {
        $this->metsubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::METSUBACC;
      }
  
	} 
	
	public function setLocsubacc($v)
	{

    if ($this->locsubacc !== $v) {
        $this->locsubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::LOCSUBACC;
      }
  
	} 
	
	public function setIndgessubacc($v)
	{

    if ($this->indgessubacc !== $v) {
        $this->indgessubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::INDGESSUBACC;
      }
  
	} 
	
	public function setCodunimed($v)
	{

    if ($this->codunimed !== $v) {
        $this->codunimed = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::CODUNIMED;
      }
  
	} 
	
	public function setMedversubacc($v)
	{

    if ($this->medversubacc !== $v) {
        $this->medversubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::MEDVERSUBACC;
      }
  
	} 
	
	public function setSupsubacc($v)
	{

    if ($this->supsubacc !== $v) {
        $this->supsubacc = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::SUPSUBACC;
      }
  
	} 
	
	public function setMetpritri($v)
	{

    if ($this->metpritri !== $v) {
        $this->metpritri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefaccpoaPeer::METPRITRI;
      }
  
	} 
	
	public function setMetsegtri($v)
	{

    if ($this->metsegtri !== $v) {
        $this->metsegtri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefaccpoaPeer::METSEGTRI;
      }
  
	} 
	
	public function setMettertri($v)
	{

    if ($this->mettertri !== $v) {
        $this->mettertri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefaccpoaPeer::METTERTRI;
      }
  
	} 
	
	public function setMetcuatri($v)
	{

    if ($this->metcuatri !== $v) {
        $this->metcuatri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefaccpoaPeer::METCUATRI;
      }
  
	} 
	
	public function setMettot($v)
	{

    if ($this->mettot !== $v) {
        $this->mettot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FordefaccpoaPeer::METTOT;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FordefaccpoaPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codsubacc = $rs->getString($startcol + 0);

      $this->dessubacc = $rs->getString($startcol + 1);

      $this->metsubacc = $rs->getString($startcol + 2);

      $this->locsubacc = $rs->getString($startcol + 3);

      $this->indgessubacc = $rs->getString($startcol + 4);

      $this->codunimed = $rs->getString($startcol + 5);

      $this->medversubacc = $rs->getString($startcol + 6);

      $this->supsubacc = $rs->getString($startcol + 7);

      $this->metpritri = $rs->getFloat($startcol + 8);

      $this->metsegtri = $rs->getFloat($startcol + 9);

      $this->mettertri = $rs->getFloat($startcol + 10);

      $this->metcuatri = $rs->getFloat($startcol + 11);

      $this->mettot = $rs->getFloat($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fordefaccpoa object", $e);
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
			$con = Propel::getConnection(FordefaccpoaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FordefaccpoaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FordefaccpoaPeer::DATABASE_NAME);
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
					$pk = FordefaccpoaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FordefaccpoaPeer::doUpdate($this, $con);
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


			if (($retval = FordefaccpoaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefaccpoaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsubacc();
				break;
			case 1:
				return $this->getDessubacc();
				break;
			case 2:
				return $this->getMetsubacc();
				break;
			case 3:
				return $this->getLocsubacc();
				break;
			case 4:
				return $this->getIndgessubacc();
				break;
			case 5:
				return $this->getCodunimed();
				break;
			case 6:
				return $this->getMedversubacc();
				break;
			case 7:
				return $this->getSupsubacc();
				break;
			case 8:
				return $this->getMetpritri();
				break;
			case 9:
				return $this->getMetsegtri();
				break;
			case 10:
				return $this->getMettertri();
				break;
			case 11:
				return $this->getMetcuatri();
				break;
			case 12:
				return $this->getMettot();
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
		$keys = FordefaccpoaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsubacc(),
			$keys[1] => $this->getDessubacc(),
			$keys[2] => $this->getMetsubacc(),
			$keys[3] => $this->getLocsubacc(),
			$keys[4] => $this->getIndgessubacc(),
			$keys[5] => $this->getCodunimed(),
			$keys[6] => $this->getMedversubacc(),
			$keys[7] => $this->getSupsubacc(),
			$keys[8] => $this->getMetpritri(),
			$keys[9] => $this->getMetsegtri(),
			$keys[10] => $this->getMettertri(),
			$keys[11] => $this->getMetcuatri(),
			$keys[12] => $this->getMettot(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FordefaccpoaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsubacc($value);
				break;
			case 1:
				$this->setDessubacc($value);
				break;
			case 2:
				$this->setMetsubacc($value);
				break;
			case 3:
				$this->setLocsubacc($value);
				break;
			case 4:
				$this->setIndgessubacc($value);
				break;
			case 5:
				$this->setCodunimed($value);
				break;
			case 6:
				$this->setMedversubacc($value);
				break;
			case 7:
				$this->setSupsubacc($value);
				break;
			case 8:
				$this->setMetpritri($value);
				break;
			case 9:
				$this->setMetsegtri($value);
				break;
			case 10:
				$this->setMettertri($value);
				break;
			case 11:
				$this->setMetcuatri($value);
				break;
			case 12:
				$this->setMettot($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FordefaccpoaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsubacc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDessubacc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMetsubacc($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLocsubacc($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIndgessubacc($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodunimed($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMedversubacc($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setSupsubacc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMetpritri($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMetsegtri($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMettertri($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMetcuatri($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMettot($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FordefaccpoaPeer::DATABASE_NAME);

		if ($this->isColumnModified(FordefaccpoaPeer::CODSUBACC)) $criteria->add(FordefaccpoaPeer::CODSUBACC, $this->codsubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::DESSUBACC)) $criteria->add(FordefaccpoaPeer::DESSUBACC, $this->dessubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::METSUBACC)) $criteria->add(FordefaccpoaPeer::METSUBACC, $this->metsubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::LOCSUBACC)) $criteria->add(FordefaccpoaPeer::LOCSUBACC, $this->locsubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::INDGESSUBACC)) $criteria->add(FordefaccpoaPeer::INDGESSUBACC, $this->indgessubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::CODUNIMED)) $criteria->add(FordefaccpoaPeer::CODUNIMED, $this->codunimed);
		if ($this->isColumnModified(FordefaccpoaPeer::MEDVERSUBACC)) $criteria->add(FordefaccpoaPeer::MEDVERSUBACC, $this->medversubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::SUPSUBACC)) $criteria->add(FordefaccpoaPeer::SUPSUBACC, $this->supsubacc);
		if ($this->isColumnModified(FordefaccpoaPeer::METPRITRI)) $criteria->add(FordefaccpoaPeer::METPRITRI, $this->metpritri);
		if ($this->isColumnModified(FordefaccpoaPeer::METSEGTRI)) $criteria->add(FordefaccpoaPeer::METSEGTRI, $this->metsegtri);
		if ($this->isColumnModified(FordefaccpoaPeer::METTERTRI)) $criteria->add(FordefaccpoaPeer::METTERTRI, $this->mettertri);
		if ($this->isColumnModified(FordefaccpoaPeer::METCUATRI)) $criteria->add(FordefaccpoaPeer::METCUATRI, $this->metcuatri);
		if ($this->isColumnModified(FordefaccpoaPeer::METTOT)) $criteria->add(FordefaccpoaPeer::METTOT, $this->mettot);
		if ($this->isColumnModified(FordefaccpoaPeer::ID)) $criteria->add(FordefaccpoaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FordefaccpoaPeer::DATABASE_NAME);

		$criteria->add(FordefaccpoaPeer::ID, $this->id);

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

		$copyObj->setCodsubacc($this->codsubacc);

		$copyObj->setDessubacc($this->dessubacc);

		$copyObj->setMetsubacc($this->metsubacc);

		$copyObj->setLocsubacc($this->locsubacc);

		$copyObj->setIndgessubacc($this->indgessubacc);

		$copyObj->setCodunimed($this->codunimed);

		$copyObj->setMedversubacc($this->medversubacc);

		$copyObj->setSupsubacc($this->supsubacc);

		$copyObj->setMetpritri($this->metpritri);

		$copyObj->setMetsegtri($this->metsegtri);

		$copyObj->setMettertri($this->mettertri);

		$copyObj->setMetcuatri($this->metcuatri);

		$copyObj->setMettot($this->mettot);


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
			self::$peer = new FordefaccpoaPeer();
		}
		return self::$peer;
	}

} 