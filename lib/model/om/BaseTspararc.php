<?php


abstract class BaseTspararc extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $inicue;


	
	protected $fincue;


	
	protected $iniref;


	
	protected $finref;


	
	protected $digsigp;


	
	protected $digsign;


	
	protected $inifec;


	
	protected $finfec;


	
	protected $forfec;


	
	protected $initip;


	
	protected $fintip;


	
	protected $valdefp;


	
	protected $valdefn;


	
	protected $inides;


	
	protected $findes;


	
	protected $valdefd;


	
	protected $inimon;


	
	protected $finmon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getInicue($val=false)
  {

    if($val) return number_format($this->inicue,2,',','.');
    else return $this->inicue;

  }
  
  public function getFincue($val=false)
  {

    if($val) return number_format($this->fincue,2,',','.');
    else return $this->fincue;

  }
  
  public function getIniref($val=false)
  {

    if($val) return number_format($this->iniref,2,',','.');
    else return $this->iniref;

  }
  
  public function getFinref($val=false)
  {

    if($val) return number_format($this->finref,2,',','.');
    else return $this->finref;

  }
  
  public function getDigsigp()
  {

    return $this->digsigp;

  }
  
  public function getDigsign()
  {

    return $this->digsign;

  }
  
  public function getInifec($val=false)
  {

    if($val) return number_format($this->inifec,2,',','.');
    else return $this->inifec;

  }
  
  public function getFinfec($val=false)
  {

    if($val) return number_format($this->finfec,2,',','.');
    else return $this->finfec;

  }
  
  public function getForfec()
  {

    return trim($this->forfec);

  }
  
  public function getInitip($val=false)
  {

    if($val) return number_format($this->initip,2,',','.');
    else return $this->initip;

  }
  
  public function getFintip($val=false)
  {

    if($val) return number_format($this->fintip,2,',','.');
    else return $this->fintip;

  }
  
  public function getValdefp()
  {

    return trim($this->valdefp);

  }
  
  public function getValdefn()
  {

    return trim($this->valdefn);

  }
  
  public function getInides($val=false)
  {

    if($val) return number_format($this->inides,2,',','.');
    else return $this->inides;

  }
  
  public function getFindes($val=false)
  {

    if($val) return number_format($this->findes,2,',','.');
    else return $this->findes;

  }
  
  public function getValdefd()
  {

    return trim($this->valdefd);

  }
  
  public function getInimon($val=false)
  {

    if($val) return number_format($this->inimon,2,',','.');
    else return $this->inimon;

  }
  
  public function getFinmon($val=false)
  {

    if($val) return number_format($this->finmon,2,',','.');
    else return $this->finmon;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TspararcPeer::NUMCUE;
      }
  
	} 
	
	public function setInicue($v)
	{

    if ($this->inicue !== $v) {
        $this->inicue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::INICUE;
      }
  
	} 
	
	public function setFincue($v)
	{

    if ($this->fincue !== $v) {
        $this->fincue = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::FINCUE;
      }
  
	} 
	
	public function setIniref($v)
	{

    if ($this->iniref !== $v) {
        $this->iniref = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::INIREF;
      }
  
	} 
	
	public function setFinref($v)
	{

    if ($this->finref !== $v) {
        $this->finref = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::FINREF;
      }
  
	} 
	
	public function setDigsigp($v)
	{

    if ($this->digsigp !== $v) {
        $this->digsigp = $v;
        $this->modifiedColumns[] = TspararcPeer::DIGSIGP;
      }
  
	} 
	
	public function setDigsign($v)
	{

    if ($this->digsign !== $v) {
        $this->digsign = $v;
        $this->modifiedColumns[] = TspararcPeer::DIGSIGN;
      }
  
	} 
	
	public function setInifec($v)
	{

    if ($this->inifec !== $v) {
        $this->inifec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::INIFEC;
      }
  
	} 
	
	public function setFinfec($v)
	{

    if ($this->finfec !== $v) {
        $this->finfec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::FINFEC;
      }
  
	} 
	
	public function setForfec($v)
	{

    if ($this->forfec !== $v) {
        $this->forfec = $v;
        $this->modifiedColumns[] = TspararcPeer::FORFEC;
      }
  
	} 
	
	public function setInitip($v)
	{

    if ($this->initip !== $v) {
        $this->initip = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::INITIP;
      }
  
	} 
	
	public function setFintip($v)
	{

    if ($this->fintip !== $v) {
        $this->fintip = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::FINTIP;
      }
  
	} 
	
	public function setValdefp($v)
	{

    if ($this->valdefp !== $v) {
        $this->valdefp = $v;
        $this->modifiedColumns[] = TspararcPeer::VALDEFP;
      }
  
	} 
	
	public function setValdefn($v)
	{

    if ($this->valdefn !== $v) {
        $this->valdefn = $v;
        $this->modifiedColumns[] = TspararcPeer::VALDEFN;
      }
  
	} 
	
	public function setInides($v)
	{

    if ($this->inides !== $v) {
        $this->inides = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::INIDES;
      }
  
	} 
	
	public function setFindes($v)
	{

    if ($this->findes !== $v) {
        $this->findes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::FINDES;
      }
  
	} 
	
	public function setValdefd($v)
	{

    if ($this->valdefd !== $v) {
        $this->valdefd = $v;
        $this->modifiedColumns[] = TspararcPeer::VALDEFD;
      }
  
	} 
	
	public function setInimon($v)
	{

    if ($this->inimon !== $v) {
        $this->inimon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::INIMON;
      }
  
	} 
	
	public function setFinmon($v)
	{

    if ($this->finmon !== $v) {
        $this->finmon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TspararcPeer::FINMON;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TspararcPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->inicue = $rs->getFloat($startcol + 1);

      $this->fincue = $rs->getFloat($startcol + 2);

      $this->iniref = $rs->getFloat($startcol + 3);

      $this->finref = $rs->getFloat($startcol + 4);

      $this->digsigp = $rs->getInt($startcol + 5);

      $this->digsign = $rs->getInt($startcol + 6);

      $this->inifec = $rs->getFloat($startcol + 7);

      $this->finfec = $rs->getFloat($startcol + 8);

      $this->forfec = $rs->getString($startcol + 9);

      $this->initip = $rs->getFloat($startcol + 10);

      $this->fintip = $rs->getFloat($startcol + 11);

      $this->valdefp = $rs->getString($startcol + 12);

      $this->valdefn = $rs->getString($startcol + 13);

      $this->inides = $rs->getFloat($startcol + 14);

      $this->findes = $rs->getFloat($startcol + 15);

      $this->valdefd = $rs->getString($startcol + 16);

      $this->inimon = $rs->getFloat($startcol + 17);

      $this->finmon = $rs->getFloat($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tspararc object", $e);
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
			$con = Propel::getConnection(TspararcPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TspararcPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TspararcPeer::DATABASE_NAME);
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
					$pk = TspararcPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TspararcPeer::doUpdate($this, $con);
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


			if (($retval = TspararcPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TspararcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getInicue();
				break;
			case 2:
				return $this->getFincue();
				break;
			case 3:
				return $this->getIniref();
				break;
			case 4:
				return $this->getFinref();
				break;
			case 5:
				return $this->getDigsigp();
				break;
			case 6:
				return $this->getDigsign();
				break;
			case 7:
				return $this->getInifec();
				break;
			case 8:
				return $this->getFinfec();
				break;
			case 9:
				return $this->getForfec();
				break;
			case 10:
				return $this->getInitip();
				break;
			case 11:
				return $this->getFintip();
				break;
			case 12:
				return $this->getValdefp();
				break;
			case 13:
				return $this->getValdefn();
				break;
			case 14:
				return $this->getInides();
				break;
			case 15:
				return $this->getFindes();
				break;
			case 16:
				return $this->getValdefd();
				break;
			case 17:
				return $this->getInimon();
				break;
			case 18:
				return $this->getFinmon();
				break;
			case 19:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TspararcPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getInicue(),
			$keys[2] => $this->getFincue(),
			$keys[3] => $this->getIniref(),
			$keys[4] => $this->getFinref(),
			$keys[5] => $this->getDigsigp(),
			$keys[6] => $this->getDigsign(),
			$keys[7] => $this->getInifec(),
			$keys[8] => $this->getFinfec(),
			$keys[9] => $this->getForfec(),
			$keys[10] => $this->getInitip(),
			$keys[11] => $this->getFintip(),
			$keys[12] => $this->getValdefp(),
			$keys[13] => $this->getValdefn(),
			$keys[14] => $this->getInides(),
			$keys[15] => $this->getFindes(),
			$keys[16] => $this->getValdefd(),
			$keys[17] => $this->getInimon(),
			$keys[18] => $this->getFinmon(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TspararcPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setInicue($value);
				break;
			case 2:
				$this->setFincue($value);
				break;
			case 3:
				$this->setIniref($value);
				break;
			case 4:
				$this->setFinref($value);
				break;
			case 5:
				$this->setDigsigp($value);
				break;
			case 6:
				$this->setDigsign($value);
				break;
			case 7:
				$this->setInifec($value);
				break;
			case 8:
				$this->setFinfec($value);
				break;
			case 9:
				$this->setForfec($value);
				break;
			case 10:
				$this->setInitip($value);
				break;
			case 11:
				$this->setFintip($value);
				break;
			case 12:
				$this->setValdefp($value);
				break;
			case 13:
				$this->setValdefn($value);
				break;
			case 14:
				$this->setInides($value);
				break;
			case 15:
				$this->setFindes($value);
				break;
			case 16:
				$this->setValdefd($value);
				break;
			case 17:
				$this->setInimon($value);
				break;
			case 18:
				$this->setFinmon($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TspararcPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInicue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFincue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIniref($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFinref($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDigsigp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDigsign($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setInifec($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFinfec($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setForfec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setInitip($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFintip($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setValdefp($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setValdefn($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInides($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFindes($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setValdefd($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setInimon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFinmon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TspararcPeer::DATABASE_NAME);

		if ($this->isColumnModified(TspararcPeer::NUMCUE)) $criteria->add(TspararcPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TspararcPeer::INICUE)) $criteria->add(TspararcPeer::INICUE, $this->inicue);
		if ($this->isColumnModified(TspararcPeer::FINCUE)) $criteria->add(TspararcPeer::FINCUE, $this->fincue);
		if ($this->isColumnModified(TspararcPeer::INIREF)) $criteria->add(TspararcPeer::INIREF, $this->iniref);
		if ($this->isColumnModified(TspararcPeer::FINREF)) $criteria->add(TspararcPeer::FINREF, $this->finref);
		if ($this->isColumnModified(TspararcPeer::DIGSIGP)) $criteria->add(TspararcPeer::DIGSIGP, $this->digsigp);
		if ($this->isColumnModified(TspararcPeer::DIGSIGN)) $criteria->add(TspararcPeer::DIGSIGN, $this->digsign);
		if ($this->isColumnModified(TspararcPeer::INIFEC)) $criteria->add(TspararcPeer::INIFEC, $this->inifec);
		if ($this->isColumnModified(TspararcPeer::FINFEC)) $criteria->add(TspararcPeer::FINFEC, $this->finfec);
		if ($this->isColumnModified(TspararcPeer::FORFEC)) $criteria->add(TspararcPeer::FORFEC, $this->forfec);
		if ($this->isColumnModified(TspararcPeer::INITIP)) $criteria->add(TspararcPeer::INITIP, $this->initip);
		if ($this->isColumnModified(TspararcPeer::FINTIP)) $criteria->add(TspararcPeer::FINTIP, $this->fintip);
		if ($this->isColumnModified(TspararcPeer::VALDEFP)) $criteria->add(TspararcPeer::VALDEFP, $this->valdefp);
		if ($this->isColumnModified(TspararcPeer::VALDEFN)) $criteria->add(TspararcPeer::VALDEFN, $this->valdefn);
		if ($this->isColumnModified(TspararcPeer::INIDES)) $criteria->add(TspararcPeer::INIDES, $this->inides);
		if ($this->isColumnModified(TspararcPeer::FINDES)) $criteria->add(TspararcPeer::FINDES, $this->findes);
		if ($this->isColumnModified(TspararcPeer::VALDEFD)) $criteria->add(TspararcPeer::VALDEFD, $this->valdefd);
		if ($this->isColumnModified(TspararcPeer::INIMON)) $criteria->add(TspararcPeer::INIMON, $this->inimon);
		if ($this->isColumnModified(TspararcPeer::FINMON)) $criteria->add(TspararcPeer::FINMON, $this->finmon);
		if ($this->isColumnModified(TspararcPeer::ID)) $criteria->add(TspararcPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TspararcPeer::DATABASE_NAME);

		$criteria->add(TspararcPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setInicue($this->inicue);

		$copyObj->setFincue($this->fincue);

		$copyObj->setIniref($this->iniref);

		$copyObj->setFinref($this->finref);

		$copyObj->setDigsigp($this->digsigp);

		$copyObj->setDigsign($this->digsign);

		$copyObj->setInifec($this->inifec);

		$copyObj->setFinfec($this->finfec);

		$copyObj->setForfec($this->forfec);

		$copyObj->setInitip($this->initip);

		$copyObj->setFintip($this->fintip);

		$copyObj->setValdefp($this->valdefp);

		$copyObj->setValdefn($this->valdefn);

		$copyObj->setInides($this->inides);

		$copyObj->setFindes($this->findes);

		$copyObj->setValdefd($this->valdefd);

		$copyObj->setInimon($this->inimon);

		$copyObj->setFinmon($this->finmon);


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
			self::$peer = new TspararcPeer();
		}
		return self::$peer;
	}

} 
