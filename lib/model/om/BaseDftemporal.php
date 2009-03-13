<?php


abstract class BaseDftemporal extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codigo;


	
	protected $fecha;


	
	protected $monto;


	
	protected $abr;


	
	protected $ben;


	
	protected $fecharec;


	
	protected $estad;


	
	protected $nomtab;


	
	protected $uni;


	
	protected $unidad;


	
	protected $unidadori;


	
	protected $vida;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodigo()
  {

    return trim($this->codigo);

  }
  
  public function getFecha($format = 'Y-m-d')
  {

    if ($this->fecha === null || $this->fecha === '') {
      return null;
    } elseif (!is_int($this->fecha)) {
            $ts = adodb_strtotime($this->fecha);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecha] as date/time value: " . var_export($this->fecha, true));
      }
    } else {
      $ts = $this->fecha;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getMonto($val=false)
  {

    if($val) return number_format($this->monto,2,',','.');
    else return $this->monto;

  }
  
  public function getAbr()
  {

    return trim($this->abr);

  }
  
  public function getBen()
  {

    return trim($this->ben);

  }
  
  public function getFecharec($format = 'Y-m-d')
  {

    if ($this->fecharec === null || $this->fecharec === '') {
      return null;
    } elseif (!is_int($this->fecharec)) {
            $ts = adodb_strtotime($this->fecharec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecharec] as date/time value: " . var_export($this->fecharec, true));
      }
    } else {
      $ts = $this->fecharec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getEstad()
  {

    return trim($this->estad);

  }
  
  public function getNomtab()
  {

    return trim($this->nomtab);

  }
  
  public function getUni()
  {

    return trim($this->uni);

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getUnidadori()
  {

    return trim($this->unidadori);

  }
  
  public function getVida()
  {

    return trim($this->vida);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodigo($v)
	{

    if ($this->codigo !== $v) {
        $this->codigo = $v;
        $this->modifiedColumns[] = DftemporalPeer::CODIGO;
      }
  
	} 
	
	public function setFecha($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecha] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecha !== $ts) {
      $this->fecha = $ts;
      $this->modifiedColumns[] = DftemporalPeer::FECHA;
    }

	} 
	
	public function setMonto($v)
	{

    if ($this->monto !== $v) {
        $this->monto = Herramientas::toFloat($v);
        $this->modifiedColumns[] = DftemporalPeer::MONTO;
      }
  
	} 
	
	public function setAbr($v)
	{

    if ($this->abr !== $v) {
        $this->abr = $v;
        $this->modifiedColumns[] = DftemporalPeer::ABR;
      }
  
	} 
	
	public function setBen($v)
	{

    if ($this->ben !== $v) {
        $this->ben = $v;
        $this->modifiedColumns[] = DftemporalPeer::BEN;
      }
  
	} 
	
	public function setFecharec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecharec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecharec !== $ts) {
      $this->fecharec = $ts;
      $this->modifiedColumns[] = DftemporalPeer::FECHAREC;
    }

	} 
	
	public function setEstad($v)
	{

    if ($this->estad !== $v) {
        $this->estad = $v;
        $this->modifiedColumns[] = DftemporalPeer::ESTAD;
      }
  
	} 
	
	public function setNomtab($v)
	{

    if ($this->nomtab !== $v) {
        $this->nomtab = $v;
        $this->modifiedColumns[] = DftemporalPeer::NOMTAB;
      }
  
	} 
	
	public function setUni($v)
	{

    if ($this->uni !== $v) {
        $this->uni = $v;
        $this->modifiedColumns[] = DftemporalPeer::UNI;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = DftemporalPeer::UNIDAD;
      }
  
	} 
	
	public function setUnidadori($v)
	{

    if ($this->unidadori !== $v) {
        $this->unidadori = $v;
        $this->modifiedColumns[] = DftemporalPeer::UNIDADORI;
      }
  
	} 
	
	public function setVida($v)
	{

    if ($this->vida !== $v) {
        $this->vida = $v;
        $this->modifiedColumns[] = DftemporalPeer::VIDA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DftemporalPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codigo = $rs->getString($startcol + 0);

      $this->fecha = $rs->getDate($startcol + 1, null);

      $this->monto = $rs->getFloat($startcol + 2);

      $this->abr = $rs->getString($startcol + 3);

      $this->ben = $rs->getString($startcol + 4);

      $this->fecharec = $rs->getDate($startcol + 5, null);

      $this->estad = $rs->getString($startcol + 6);

      $this->nomtab = $rs->getString($startcol + 7);

      $this->uni = $rs->getString($startcol + 8);

      $this->unidad = $rs->getString($startcol + 9);

      $this->unidadori = $rs->getString($startcol + 10);

      $this->vida = $rs->getString($startcol + 11);

      $this->id = $rs->getInt($startcol + 12);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 13; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dftemporal object", $e);
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
			$con = Propel::getConnection(DftemporalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DftemporalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DftemporalPeer::DATABASE_NAME);
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
					$pk = DftemporalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DftemporalPeer::doUpdate($this, $con);
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


			if (($retval = DftemporalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftemporalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodigo();
				break;
			case 1:
				return $this->getFecha();
				break;
			case 2:
				return $this->getMonto();
				break;
			case 3:
				return $this->getAbr();
				break;
			case 4:
				return $this->getBen();
				break;
			case 5:
				return $this->getFecharec();
				break;
			case 6:
				return $this->getEstad();
				break;
			case 7:
				return $this->getNomtab();
				break;
			case 8:
				return $this->getUni();
				break;
			case 9:
				return $this->getUnidad();
				break;
			case 10:
				return $this->getUnidadori();
				break;
			case 11:
				return $this->getVida();
				break;
			case 12:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftemporalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodigo(),
			$keys[1] => $this->getFecha(),
			$keys[2] => $this->getMonto(),
			$keys[3] => $this->getAbr(),
			$keys[4] => $this->getBen(),
			$keys[5] => $this->getFecharec(),
			$keys[6] => $this->getEstad(),
			$keys[7] => $this->getNomtab(),
			$keys[8] => $this->getUni(),
			$keys[9] => $this->getUnidad(),
			$keys[10] => $this->getUnidadori(),
			$keys[11] => $this->getVida(),
			$keys[12] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DftemporalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodigo($value);
				break;
			case 1:
				$this->setFecha($value);
				break;
			case 2:
				$this->setMonto($value);
				break;
			case 3:
				$this->setAbr($value);
				break;
			case 4:
				$this->setBen($value);
				break;
			case 5:
				$this->setFecharec($value);
				break;
			case 6:
				$this->setEstad($value);
				break;
			case 7:
				$this->setNomtab($value);
				break;
			case 8:
				$this->setUni($value);
				break;
			case 9:
				$this->setUnidad($value);
				break;
			case 10:
				$this->setUnidadori($value);
				break;
			case 11:
				$this->setVida($value);
				break;
			case 12:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DftemporalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodigo($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecha($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAbr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBen($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecharec($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEstad($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomtab($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUni($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnidad($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUnidadori($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setVida($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DftemporalPeer::DATABASE_NAME);

		if ($this->isColumnModified(DftemporalPeer::CODIGO)) $criteria->add(DftemporalPeer::CODIGO, $this->codigo);
		if ($this->isColumnModified(DftemporalPeer::FECHA)) $criteria->add(DftemporalPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(DftemporalPeer::MONTO)) $criteria->add(DftemporalPeer::MONTO, $this->monto);
		if ($this->isColumnModified(DftemporalPeer::ABR)) $criteria->add(DftemporalPeer::ABR, $this->abr);
		if ($this->isColumnModified(DftemporalPeer::BEN)) $criteria->add(DftemporalPeer::BEN, $this->ben);
		if ($this->isColumnModified(DftemporalPeer::FECHAREC)) $criteria->add(DftemporalPeer::FECHAREC, $this->fecharec);
		if ($this->isColumnModified(DftemporalPeer::ESTAD)) $criteria->add(DftemporalPeer::ESTAD, $this->estad);
		if ($this->isColumnModified(DftemporalPeer::NOMTAB)) $criteria->add(DftemporalPeer::NOMTAB, $this->nomtab);
		if ($this->isColumnModified(DftemporalPeer::UNI)) $criteria->add(DftemporalPeer::UNI, $this->uni);
		if ($this->isColumnModified(DftemporalPeer::UNIDAD)) $criteria->add(DftemporalPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(DftemporalPeer::UNIDADORI)) $criteria->add(DftemporalPeer::UNIDADORI, $this->unidadori);
		if ($this->isColumnModified(DftemporalPeer::VIDA)) $criteria->add(DftemporalPeer::VIDA, $this->vida);
		if ($this->isColumnModified(DftemporalPeer::ID)) $criteria->add(DftemporalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DftemporalPeer::DATABASE_NAME);

		$criteria->add(DftemporalPeer::ID, $this->id);

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

		$copyObj->setCodigo($this->codigo);

		$copyObj->setFecha($this->fecha);

		$copyObj->setMonto($this->monto);

		$copyObj->setAbr($this->abr);

		$copyObj->setBen($this->ben);

		$copyObj->setFecharec($this->fecharec);

		$copyObj->setEstad($this->estad);

		$copyObj->setNomtab($this->nomtab);

		$copyObj->setUni($this->uni);

		$copyObj->setUnidad($this->unidad);

		$copyObj->setUnidadori($this->unidadori);

		$copyObj->setVida($this->vida);


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
			self::$peer = new DftemporalPeer();
		}
		return self::$peer;
	}

} 