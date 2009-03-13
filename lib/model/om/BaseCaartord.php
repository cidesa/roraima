<?php


abstract class BaseCaartord extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcom;


	
	protected $codart;


	
	protected $codcat;


	
	protected $canord;


	
	protected $canaju;


	
	protected $canrec;


	
	protected $cantot;


	
	protected $preart;


	
	protected $dtoart;


	
	protected $codrgo;


	
	protected $cerart;


	
	protected $rgoart;


	
	protected $totart;


	
	protected $fecent;


	
	protected $desart;


	
	protected $relart;


	
	protected $unimed;


	
	protected $codpar;


	
	protected $partida;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getOrdcom()
  {

    return trim($this->ordcom);

  }
  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getCanord($val=false)
  {

    if($val) return number_format($this->canord,2,',','.');
    else return $this->canord;

  }
  
  public function getCanaju($val=false)
  {

    if($val) return number_format($this->canaju,2,',','.');
    else return $this->canaju;

  }
  
  public function getCanrec($val=false)
  {

    if($val) return number_format($this->canrec,2,',','.');
    else return $this->canrec;

  }
  
  public function getCantot($val=false)
  {

    if($val) return number_format($this->cantot,2,',','.');
    else return $this->cantot;

  }
  
  public function getPreart($val=false)
  {

    if($val) return number_format($this->preart,2,',','.');
    else return $this->preart;

  }
  
  public function getDtoart($val=false)
  {

    if($val) return number_format($this->dtoart,2,',','.');
    else return $this->dtoart;

  }
  
  public function getCodrgo()
  {

    return trim($this->codrgo);

  }
  
  public function getCerart()
  {

    return trim($this->cerart);

  }
  
  public function getRgoart($val=false)
  {

    if($val) return number_format($this->rgoart,2,',','.');
    else return $this->rgoart;

  }
  
  public function getTotart($val=false)
  {

    if($val) return number_format($this->totart,2,',','.');
    else return $this->totart;

  }
  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getRelart($val=false)
  {

    if($val) return number_format($this->relart,2,',','.');
    else return $this->relart;

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getPartida()
  {

    return trim($this->partida);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setOrdcom($v)
	{

    if ($this->ordcom !== $v) {
        $this->ordcom = $v;
        $this->modifiedColumns[] = CaartordPeer::ORDCOM;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = CaartordPeer::CODART;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CaartordPeer::CODCAT;
      }
  
	} 
	
	public function setCanord($v)
	{

    if ($this->canord !== $v) {
        $this->canord = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::CANORD;
      }
  
	} 
	
	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::CANAJU;
      }
  
	} 
	
	public function setCanrec($v)
	{

    if ($this->canrec !== $v) {
        $this->canrec = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::CANREC;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::CANTOT;
      }
  
	} 
	
	public function setPreart($v)
	{

    if ($this->preart !== $v) {
        $this->preart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::PREART;
      }
  
	} 
	
	public function setDtoart($v)
	{

    if ($this->dtoart !== $v) {
        $this->dtoart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::DTOART;
      }
  
	} 
	
	public function setCodrgo($v)
	{

    if ($this->codrgo !== $v) {
        $this->codrgo = $v;
        $this->modifiedColumns[] = CaartordPeer::CODRGO;
      }
  
	} 
	
	public function setCerart($v)
	{

    if ($this->cerart !== $v) {
        $this->cerart = $v;
        $this->modifiedColumns[] = CaartordPeer::CERART;
      }
  
	} 
	
	public function setRgoart($v)
	{

    if ($this->rgoart !== $v) {
        $this->rgoart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::RGOART;
      }
  
	} 
	
	public function setTotart($v)
	{

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::TOTART;
      }
  
	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = CaartordPeer::FECENT;
    }

	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = CaartordPeer::DESART;
      }
  
	} 
	
	public function setRelart($v)
	{

    if ($this->relart !== $v) {
        $this->relart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CaartordPeer::RELART;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = CaartordPeer::UNIMED;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = CaartordPeer::CODPAR;
      }
  
	} 
	
	public function setPartida($v)
	{

    if ($this->partida !== $v) {
        $this->partida = $v;
        $this->modifiedColumns[] = CaartordPeer::PARTIDA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CaartordPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->ordcom = $rs->getString($startcol + 0);

      $this->codart = $rs->getString($startcol + 1);

      $this->codcat = $rs->getString($startcol + 2);

      $this->canord = $rs->getFloat($startcol + 3);

      $this->canaju = $rs->getFloat($startcol + 4);

      $this->canrec = $rs->getFloat($startcol + 5);

      $this->cantot = $rs->getFloat($startcol + 6);

      $this->preart = $rs->getFloat($startcol + 7);

      $this->dtoart = $rs->getFloat($startcol + 8);

      $this->codrgo = $rs->getString($startcol + 9);

      $this->cerart = $rs->getString($startcol + 10);

      $this->rgoart = $rs->getFloat($startcol + 11);

      $this->totart = $rs->getFloat($startcol + 12);

      $this->fecent = $rs->getDate($startcol + 13, null);

      $this->desart = $rs->getString($startcol + 14);

      $this->relart = $rs->getFloat($startcol + 15);

      $this->unimed = $rs->getString($startcol + 16);

      $this->codpar = $rs->getString($startcol + 17);

      $this->partida = $rs->getString($startcol + 18);

      $this->id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Caartord object", $e);
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
			$con = Propel::getConnection(CaartordPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaartordPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaartordPeer::DATABASE_NAME);
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
					$pk = CaartordPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CaartordPeer::doUpdate($this, $con);
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


			if (($retval = CaartordPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcom();
				break;
			case 1:
				return $this->getCodart();
				break;
			case 2:
				return $this->getCodcat();
				break;
			case 3:
				return $this->getCanord();
				break;
			case 4:
				return $this->getCanaju();
				break;
			case 5:
				return $this->getCanrec();
				break;
			case 6:
				return $this->getCantot();
				break;
			case 7:
				return $this->getPreart();
				break;
			case 8:
				return $this->getDtoart();
				break;
			case 9:
				return $this->getCodrgo();
				break;
			case 10:
				return $this->getCerart();
				break;
			case 11:
				return $this->getRgoart();
				break;
			case 12:
				return $this->getTotart();
				break;
			case 13:
				return $this->getFecent();
				break;
			case 14:
				return $this->getDesart();
				break;
			case 15:
				return $this->getRelart();
				break;
			case 16:
				return $this->getUnimed();
				break;
			case 17:
				return $this->getCodpar();
				break;
			case 18:
				return $this->getPartida();
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
		$keys = CaartordPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcom(),
			$keys[1] => $this->getCodart(),
			$keys[2] => $this->getCodcat(),
			$keys[3] => $this->getCanord(),
			$keys[4] => $this->getCanaju(),
			$keys[5] => $this->getCanrec(),
			$keys[6] => $this->getCantot(),
			$keys[7] => $this->getPreart(),
			$keys[8] => $this->getDtoart(),
			$keys[9] => $this->getCodrgo(),
			$keys[10] => $this->getCerart(),
			$keys[11] => $this->getRgoart(),
			$keys[12] => $this->getTotart(),
			$keys[13] => $this->getFecent(),
			$keys[14] => $this->getDesart(),
			$keys[15] => $this->getRelart(),
			$keys[16] => $this->getUnimed(),
			$keys[17] => $this->getCodpar(),
			$keys[18] => $this->getPartida(),
			$keys[19] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaartordPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcom($value);
				break;
			case 1:
				$this->setCodart($value);
				break;
			case 2:
				$this->setCodcat($value);
				break;
			case 3:
				$this->setCanord($value);
				break;
			case 4:
				$this->setCanaju($value);
				break;
			case 5:
				$this->setCanrec($value);
				break;
			case 6:
				$this->setCantot($value);
				break;
			case 7:
				$this->setPreart($value);
				break;
			case 8:
				$this->setDtoart($value);
				break;
			case 9:
				$this->setCodrgo($value);
				break;
			case 10:
				$this->setCerart($value);
				break;
			case 11:
				$this->setRgoart($value);
				break;
			case 12:
				$this->setTotart($value);
				break;
			case 13:
				$this->setFecent($value);
				break;
			case 14:
				$this->setDesart($value);
				break;
			case 15:
				$this->setRelart($value);
				break;
			case 16:
				$this->setUnimed($value);
				break;
			case 17:
				$this->setCodpar($value);
				break;
			case 18:
				$this->setPartida($value);
				break;
			case 19:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaartordPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCanaju($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCanrec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCantot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPreart($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDtoart($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodrgo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCerart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRgoart($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTotart($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecent($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDesart($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setRelart($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUnimed($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodpar($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPartida($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaartordPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaartordPeer::ORDCOM)) $criteria->add(CaartordPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CaartordPeer::CODART)) $criteria->add(CaartordPeer::CODART, $this->codart);
		if ($this->isColumnModified(CaartordPeer::CODCAT)) $criteria->add(CaartordPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CaartordPeer::CANORD)) $criteria->add(CaartordPeer::CANORD, $this->canord);
		if ($this->isColumnModified(CaartordPeer::CANAJU)) $criteria->add(CaartordPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(CaartordPeer::CANREC)) $criteria->add(CaartordPeer::CANREC, $this->canrec);
		if ($this->isColumnModified(CaartordPeer::CANTOT)) $criteria->add(CaartordPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(CaartordPeer::PREART)) $criteria->add(CaartordPeer::PREART, $this->preart);
		if ($this->isColumnModified(CaartordPeer::DTOART)) $criteria->add(CaartordPeer::DTOART, $this->dtoart);
		if ($this->isColumnModified(CaartordPeer::CODRGO)) $criteria->add(CaartordPeer::CODRGO, $this->codrgo);
		if ($this->isColumnModified(CaartordPeer::CERART)) $criteria->add(CaartordPeer::CERART, $this->cerart);
		if ($this->isColumnModified(CaartordPeer::RGOART)) $criteria->add(CaartordPeer::RGOART, $this->rgoart);
		if ($this->isColumnModified(CaartordPeer::TOTART)) $criteria->add(CaartordPeer::TOTART, $this->totart);
		if ($this->isColumnModified(CaartordPeer::FECENT)) $criteria->add(CaartordPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(CaartordPeer::DESART)) $criteria->add(CaartordPeer::DESART, $this->desart);
		if ($this->isColumnModified(CaartordPeer::RELART)) $criteria->add(CaartordPeer::RELART, $this->relart);
		if ($this->isColumnModified(CaartordPeer::UNIMED)) $criteria->add(CaartordPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(CaartordPeer::CODPAR)) $criteria->add(CaartordPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(CaartordPeer::PARTIDA)) $criteria->add(CaartordPeer::PARTIDA, $this->partida);
		if ($this->isColumnModified(CaartordPeer::ID)) $criteria->add(CaartordPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaartordPeer::DATABASE_NAME);

		$criteria->add(CaartordPeer::ID, $this->id);

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

		$copyObj->setOrdcom($this->ordcom);

		$copyObj->setCodart($this->codart);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCanord($this->canord);

		$copyObj->setCanaju($this->canaju);

		$copyObj->setCanrec($this->canrec);

		$copyObj->setCantot($this->cantot);

		$copyObj->setPreart($this->preart);

		$copyObj->setDtoart($this->dtoart);

		$copyObj->setCodrgo($this->codrgo);

		$copyObj->setCerart($this->cerart);

		$copyObj->setRgoart($this->rgoart);

		$copyObj->setTotart($this->totart);

		$copyObj->setFecent($this->fecent);

		$copyObj->setDesart($this->desart);

		$copyObj->setRelart($this->relart);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setPartida($this->partida);


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
			self::$peer = new CaartordPeer();
		}
		return self::$peer;
	}

} 