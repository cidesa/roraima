<?php


abstract class BaseLiressol extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $liregsol_id;


	
	protected $numsol;


	
	protected $numcor;


	
	protected $codempemi;


	
	protected $codempfir;


	
	protected $ubiarc;


	
	protected $fecres;


	
	protected $fecfir;


	
	protected $id;

	
	protected $aLiregsol;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getLiregsolId()
  {

    return $this->liregsol_id;

  }
  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getNumcor()
  {

    return trim($this->numcor);

  }
  
  public function getCodempemi()
  {

    return trim($this->codempemi);

  }
  
  public function getCodempfir()
  {

    return trim($this->codempfir);

  }
  
  public function getUbiarc()
  {

    return trim($this->ubiarc);

  }
  
  public function getFecres($format = 'Y-m-d')
  {

    if ($this->fecres === null || $this->fecres === '') {
      return null;
    } elseif (!is_int($this->fecres)) {
            $ts = adodb_strtotime($this->fecres);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecres] as date/time value: " . var_export($this->fecres, true));
      }
    } else {
      $ts = $this->fecres;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecfir($format = 'Y-m-d')
  {

    if ($this->fecfir === null || $this->fecfir === '') {
      return null;
    } elseif (!is_int($this->fecfir)) {
            $ts = adodb_strtotime($this->fecfir);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfir] as date/time value: " . var_export($this->fecfir, true));
      }
    } else {
      $ts = $this->fecfir;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getId()
  {

    return $this->id;

  }
	
	public function setLiregsolId($v)
	{

    if ($this->liregsol_id !== $v) {
        $this->liregsol_id = $v;
        $this->modifiedColumns[] = LiressolPeer::LIREGSOL_ID;
      }
  
		if ($this->aLiregsol !== null && $this->aLiregsol->getId() !== $v) {
			$this->aLiregsol = null;
		}

	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = LiressolPeer::NUMSOL;
      }
  
	} 
	
	public function setNumcor($v)
	{

    if ($this->numcor !== $v) {
        $this->numcor = $v;
        $this->modifiedColumns[] = LiressolPeer::NUMCOR;
      }
  
	} 
	
	public function setCodempemi($v)
	{

    if ($this->codempemi !== $v) {
        $this->codempemi = $v;
        $this->modifiedColumns[] = LiressolPeer::CODEMPEMI;
      }
  
	} 
	
	public function setCodempfir($v)
	{

    if ($this->codempfir !== $v) {
        $this->codempfir = $v;
        $this->modifiedColumns[] = LiressolPeer::CODEMPFIR;
      }
  
	} 
	
	public function setUbiarc($v)
	{

    if ($this->ubiarc !== $v) {
        $this->ubiarc = $v;
        $this->modifiedColumns[] = LiressolPeer::UBIARC;
      }
  
	} 
	
	public function setFecres($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecres] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecres !== $ts) {
      $this->fecres = $ts;
      $this->modifiedColumns[] = LiressolPeer::FECRES;
    }

	} 
	
	public function setFecfir($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfir] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfir !== $ts) {
      $this->fecfir = $ts;
      $this->modifiedColumns[] = LiressolPeer::FECFIR;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LiressolPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->liregsol_id = $rs->getInt($startcol + 0);

      $this->numsol = $rs->getString($startcol + 1);

      $this->numcor = $rs->getString($startcol + 2);

      $this->codempemi = $rs->getString($startcol + 3);

      $this->codempfir = $rs->getString($startcol + 4);

      $this->ubiarc = $rs->getString($startcol + 5);

      $this->fecres = $rs->getDate($startcol + 6, null);

      $this->fecfir = $rs->getDate($startcol + 7, null);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Liressol object", $e);
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
			$con = Propel::getConnection(LiressolPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LiressolPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LiressolPeer::DATABASE_NAME);
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


												
			if ($this->aLiregsol !== null) {
				if ($this->aLiregsol->isModified()) {
					$affectedRows += $this->aLiregsol->save($con);
				}
				$this->setLiregsol($this->aLiregsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LiressolPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LiressolPeer::doUpdate($this, $con);
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


												
			if ($this->aLiregsol !== null) {
				if (!$this->aLiregsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiregsol->getValidationFailures());
				}
			}


			if (($retval = LiressolPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiressolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLiregsolId();
				break;
			case 1:
				return $this->getNumsol();
				break;
			case 2:
				return $this->getNumcor();
				break;
			case 3:
				return $this->getCodempemi();
				break;
			case 4:
				return $this->getCodempfir();
				break;
			case 5:
				return $this->getUbiarc();
				break;
			case 6:
				return $this->getFecres();
				break;
			case 7:
				return $this->getFecfir();
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
		$keys = LiressolPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLiregsolId(),
			$keys[1] => $this->getNumsol(),
			$keys[2] => $this->getNumcor(),
			$keys[3] => $this->getCodempemi(),
			$keys[4] => $this->getCodempfir(),
			$keys[5] => $this->getUbiarc(),
			$keys[6] => $this->getFecres(),
			$keys[7] => $this->getFecfir(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LiressolPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLiregsolId($value);
				break;
			case 1:
				$this->setNumsol($value);
				break;
			case 2:
				$this->setNumcor($value);
				break;
			case 3:
				$this->setCodempemi($value);
				break;
			case 4:
				$this->setCodempfir($value);
				break;
			case 5:
				$this->setUbiarc($value);
				break;
			case 6:
				$this->setFecres($value);
				break;
			case 7:
				$this->setFecfir($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LiressolPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLiregsolId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodempemi($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodempfir($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUbiarc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecres($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecfir($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LiressolPeer::DATABASE_NAME);

		if ($this->isColumnModified(LiressolPeer::LIREGSOL_ID)) $criteria->add(LiressolPeer::LIREGSOL_ID, $this->liregsol_id);
		if ($this->isColumnModified(LiressolPeer::NUMSOL)) $criteria->add(LiressolPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(LiressolPeer::NUMCOR)) $criteria->add(LiressolPeer::NUMCOR, $this->numcor);
		if ($this->isColumnModified(LiressolPeer::CODEMPEMI)) $criteria->add(LiressolPeer::CODEMPEMI, $this->codempemi);
		if ($this->isColumnModified(LiressolPeer::CODEMPFIR)) $criteria->add(LiressolPeer::CODEMPFIR, $this->codempfir);
		if ($this->isColumnModified(LiressolPeer::UBIARC)) $criteria->add(LiressolPeer::UBIARC, $this->ubiarc);
		if ($this->isColumnModified(LiressolPeer::FECRES)) $criteria->add(LiressolPeer::FECRES, $this->fecres);
		if ($this->isColumnModified(LiressolPeer::FECFIR)) $criteria->add(LiressolPeer::FECFIR, $this->fecfir);
		if ($this->isColumnModified(LiressolPeer::ID)) $criteria->add(LiressolPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LiressolPeer::DATABASE_NAME);

		$criteria->add(LiressolPeer::ID, $this->id);

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

		$copyObj->setLiregsolId($this->liregsol_id);

		$copyObj->setNumsol($this->numsol);

		$copyObj->setNumcor($this->numcor);

		$copyObj->setCodempemi($this->codempemi);

		$copyObj->setCodempfir($this->codempfir);

		$copyObj->setUbiarc($this->ubiarc);

		$copyObj->setFecres($this->fecres);

		$copyObj->setFecfir($this->fecfir);


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
			self::$peer = new LiressolPeer();
		}
		return self::$peer;
	}

	
	public function setLiregsol($v)
	{


		if ($v === null) {
			$this->setLiregsolId(NULL);
		} else {
			$this->setLiregsolId($v->getId());
		}


		$this->aLiregsol = $v;
	}


	
	public function getLiregsol($con = null)
	{
		if ($this->aLiregsol === null && ($this->liregsol_id !== null)) {
						include_once 'lib/model/om/BaseLiregsolPeer.php';

			$this->aLiregsol = LiregsolPeer::retrieveByPK($this->liregsol_id, $con);

			
		}
		return $this->aLiregsol;
	}

} 