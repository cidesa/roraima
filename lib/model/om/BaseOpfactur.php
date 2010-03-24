<?php


abstract class BaseOpfactur extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numord;


	
	protected $fecfac;


	
	protected $numfac;


	
	protected $numctr;


	
	protected $tiptra;


	
	protected $totfac;


	
	protected $exeiva;


	
	protected $basimp;


	
	protected $poriva;


	
	protected $moniva;


	
	protected $monret;


	
	protected $basltf;


	
	protected $porltf;


	
	protected $monltf;


	
	protected $basislr;


	
	protected $porislr;


	
	protected $monislr;


	
	protected $codislr;


	
	protected $rifalt;


	
	protected $facafe;


	
	protected $observacion;


	
	protected $basirs;


	
	protected $porirs;


	
	protected $monirs;


	
	protected $codirs;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumord()
  {

    return trim($this->numord);

  }
  
  public function getFecfac($format = 'Y-m-d')
  {

    if ($this->fecfac === null || $this->fecfac === '') {
      return null;
    } elseif (!is_int($this->fecfac)) {
            $ts = adodb_strtotime($this->fecfac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecfac] as date/time value: " . var_export($this->fecfac, true));
      }
    } else {
      $ts = $this->fecfac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNumfac()
  {

    return trim($this->numfac);

  }
  
  public function getNumctr()
  {

    return trim($this->numctr);

  }
  
  public function getTiptra()
  {

    return trim($this->tiptra);

  }
  
  public function getTotfac($val=false)
  {

    if($val) return number_format($this->totfac,2,',','.');
    else return $this->totfac;

  }
  
  public function getExeiva($val=false)
  {

    if($val) return number_format($this->exeiva,2,',','.');
    else return $this->exeiva;

  }
  
  public function getBasimp($val=false)
  {

    if($val) return number_format($this->basimp,2,',','.');
    else return $this->basimp;

  }
  
  public function getPoriva($val=false)
  {

    if($val) return number_format($this->poriva,2,',','.');
    else return $this->poriva;

  }
  
  public function getMoniva($val=false)
  {

    if($val) return number_format($this->moniva,2,',','.');
    else return $this->moniva;

  }
  
  public function getMonret($val=false)
  {

    if($val) return number_format($this->monret,2,',','.');
    else return $this->monret;

  }
  
  public function getBasltf($val=false)
  {

    if($val) return number_format($this->basltf,2,',','.');
    else return $this->basltf;

  }
  
  public function getPorltf($val=false)
  {

    if($val) return number_format($this->porltf,2,',','.');
    else return $this->porltf;

  }
  
  public function getMonltf($val=false)
  {

    if($val) return number_format($this->monltf,2,',','.');
    else return $this->monltf;

  }
  
  public function getBasislr($val=false)
  {

    if($val) return number_format($this->basislr,2,',','.');
    else return $this->basislr;

  }
  
  public function getPorislr($val=false)
  {

    if($val) return number_format($this->porislr,2,',','.');
    else return $this->porislr;

  }
  
  public function getMonislr($val=false)
  {

    if($val) return number_format($this->monislr,2,',','.');
    else return $this->monislr;

  }
  
  public function getCodislr()
  {

    return trim($this->codislr);

  }
  
  public function getRifalt()
  {

    return trim($this->rifalt);

  }
  
  public function getFacafe()
  {

    return trim($this->facafe);

  }
  
  public function getObservacion()
  {

    return trim($this->observacion);

  }
  
  public function getBasirs($val=false)
  {

    if($val) return number_format($this->basirs,2,',','.');
    else return $this->basirs;

  }
  
  public function getPorirs($val=false)
  {

    if($val) return number_format($this->porirs,2,',','.');
    else return $this->porirs;

  }
  
  public function getMonirs($val=false)
  {

    if($val) return number_format($this->monirs,2,',','.');
    else return $this->monirs;

  }
  
  public function getCodirs()
  {

    return trim($this->codirs);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumord($v)
	{

    if ($this->numord !== $v) {
        $this->numord = $v;
        $this->modifiedColumns[] = OpfacturPeer::NUMORD;
      }
  
	} 
	
	public function setFecfac($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecfac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecfac !== $ts) {
      $this->fecfac = $ts;
      $this->modifiedColumns[] = OpfacturPeer::FECFAC;
    }

	} 
	
	public function setNumfac($v)
	{

    if ($this->numfac !== $v) {
        $this->numfac = $v;
        $this->modifiedColumns[] = OpfacturPeer::NUMFAC;
      }
  
	} 
	
	public function setNumctr($v)
	{

    if ($this->numctr !== $v) {
        $this->numctr = $v;
        $this->modifiedColumns[] = OpfacturPeer::NUMCTR;
      }
  
	} 
	
	public function setTiptra($v)
	{

    if ($this->tiptra !== $v) {
        $this->tiptra = $v;
        $this->modifiedColumns[] = OpfacturPeer::TIPTRA;
      }
  
	} 
	
	public function setTotfac($v)
	{

    if ($this->totfac !== $v) {
        $this->totfac = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::TOTFAC;
      }
  
	} 
	
	public function setExeiva($v)
	{

    if ($this->exeiva !== $v) {
        $this->exeiva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::EXEIVA;
      }
  
	} 
	
	public function setBasimp($v)
	{

    if ($this->basimp !== $v) {
        $this->basimp = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::BASIMP;
      }
  
	} 
	
	public function setPoriva($v)
	{

    if ($this->poriva !== $v) {
        $this->poriva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::PORIVA;
      }
  
	} 
	
	public function setMoniva($v)
	{

    if ($this->moniva !== $v) {
        $this->moniva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::MONIVA;
      }
  
	} 
	
	public function setMonret($v)
	{

    if ($this->monret !== $v) {
        $this->monret = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::MONRET;
      }
  
	} 
	
	public function setBasltf($v)
	{

    if ($this->basltf !== $v) {
        $this->basltf = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::BASLTF;
      }
  
	} 
	
	public function setPorltf($v)
	{

    if ($this->porltf !== $v) {
        $this->porltf = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::PORLTF;
      }
  
	} 
	
	public function setMonltf($v)
	{

    if ($this->monltf !== $v) {
        $this->monltf = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::MONLTF;
      }
  
	} 
	
	public function setBasislr($v)
	{

    if ($this->basislr !== $v) {
        $this->basislr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::BASISLR;
      }
  
	} 
	
	public function setPorislr($v)
	{

    if ($this->porislr !== $v) {
        $this->porislr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::PORISLR;
      }
  
	} 
	
	public function setMonislr($v)
	{

    if ($this->monislr !== $v) {
        $this->monislr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::MONISLR;
      }
  
	} 
	
	public function setCodislr($v)
	{

    if ($this->codislr !== $v) {
        $this->codislr = $v;
        $this->modifiedColumns[] = OpfacturPeer::CODISLR;
      }
  
	} 
	
	public function setRifalt($v)
	{

    if ($this->rifalt !== $v) {
        $this->rifalt = $v;
        $this->modifiedColumns[] = OpfacturPeer::RIFALT;
      }
  
	} 
	
	public function setFacafe($v)
	{

    if ($this->facafe !== $v) {
        $this->facafe = $v;
        $this->modifiedColumns[] = OpfacturPeer::FACAFE;
      }
  
	} 
	
	public function setObservacion($v)
	{

    if ($this->observacion !== $v) {
        $this->observacion = $v;
        $this->modifiedColumns[] = OpfacturPeer::OBSERVACION;
      }
  
	} 
	
	public function setBasirs($v)
	{

    if ($this->basirs !== $v) {
        $this->basirs = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::BASIRS;
      }
  
	} 
	
	public function setPorirs($v)
	{

    if ($this->porirs !== $v) {
        $this->porirs = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::PORIRS;
      }
  
	} 
	
	public function setMonirs($v)
	{

    if ($this->monirs !== $v) {
        $this->monirs = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpfacturPeer::MONIRS;
      }
  
	} 
	
	public function setCodirs($v)
	{

    if ($this->codirs !== $v) {
        $this->codirs = $v;
        $this->modifiedColumns[] = OpfacturPeer::CODIRS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpfacturPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numord = $rs->getString($startcol + 0);

      $this->fecfac = $rs->getDate($startcol + 1, null);

      $this->numfac = $rs->getString($startcol + 2);

      $this->numctr = $rs->getString($startcol + 3);

      $this->tiptra = $rs->getString($startcol + 4);

      $this->totfac = $rs->getFloat($startcol + 5);

      $this->exeiva = $rs->getFloat($startcol + 6);

      $this->basimp = $rs->getFloat($startcol + 7);

      $this->poriva = $rs->getFloat($startcol + 8);

      $this->moniva = $rs->getFloat($startcol + 9);

      $this->monret = $rs->getFloat($startcol + 10);

      $this->basltf = $rs->getFloat($startcol + 11);

      $this->porltf = $rs->getFloat($startcol + 12);

      $this->monltf = $rs->getFloat($startcol + 13);

      $this->basislr = $rs->getFloat($startcol + 14);

      $this->porislr = $rs->getFloat($startcol + 15);

      $this->monislr = $rs->getFloat($startcol + 16);

      $this->codislr = $rs->getString($startcol + 17);

      $this->rifalt = $rs->getString($startcol + 18);

      $this->facafe = $rs->getString($startcol + 19);

      $this->observacion = $rs->getString($startcol + 20);

      $this->basirs = $rs->getFloat($startcol + 21);

      $this->porirs = $rs->getFloat($startcol + 22);

      $this->monirs = $rs->getFloat($startcol + 23);

      $this->codirs = $rs->getString($startcol + 24);

      $this->id = $rs->getInt($startcol + 25);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 26; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opfactur object", $e);
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
			$con = Propel::getConnection(OpfacturPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpfacturPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpfacturPeer::DATABASE_NAME);
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
					$pk = OpfacturPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpfacturPeer::doUpdate($this, $con);
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


			if (($retval = OpfacturPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpfacturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumord();
				break;
			case 1:
				return $this->getFecfac();
				break;
			case 2:
				return $this->getNumfac();
				break;
			case 3:
				return $this->getNumctr();
				break;
			case 4:
				return $this->getTiptra();
				break;
			case 5:
				return $this->getTotfac();
				break;
			case 6:
				return $this->getExeiva();
				break;
			case 7:
				return $this->getBasimp();
				break;
			case 8:
				return $this->getPoriva();
				break;
			case 9:
				return $this->getMoniva();
				break;
			case 10:
				return $this->getMonret();
				break;
			case 11:
				return $this->getBasltf();
				break;
			case 12:
				return $this->getPorltf();
				break;
			case 13:
				return $this->getMonltf();
				break;
			case 14:
				return $this->getBasislr();
				break;
			case 15:
				return $this->getPorislr();
				break;
			case 16:
				return $this->getMonislr();
				break;
			case 17:
				return $this->getCodislr();
				break;
			case 18:
				return $this->getRifalt();
				break;
			case 19:
				return $this->getFacafe();
				break;
			case 20:
				return $this->getObservacion();
				break;
			case 21:
				return $this->getBasirs();
				break;
			case 22:
				return $this->getPorirs();
				break;
			case 23:
				return $this->getMonirs();
				break;
			case 24:
				return $this->getCodirs();
				break;
			case 25:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpfacturPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumord(),
			$keys[1] => $this->getFecfac(),
			$keys[2] => $this->getNumfac(),
			$keys[3] => $this->getNumctr(),
			$keys[4] => $this->getTiptra(),
			$keys[5] => $this->getTotfac(),
			$keys[6] => $this->getExeiva(),
			$keys[7] => $this->getBasimp(),
			$keys[8] => $this->getPoriva(),
			$keys[9] => $this->getMoniva(),
			$keys[10] => $this->getMonret(),
			$keys[11] => $this->getBasltf(),
			$keys[12] => $this->getPorltf(),
			$keys[13] => $this->getMonltf(),
			$keys[14] => $this->getBasislr(),
			$keys[15] => $this->getPorislr(),
			$keys[16] => $this->getMonislr(),
			$keys[17] => $this->getCodislr(),
			$keys[18] => $this->getRifalt(),
			$keys[19] => $this->getFacafe(),
			$keys[20] => $this->getObservacion(),
			$keys[21] => $this->getBasirs(),
			$keys[22] => $this->getPorirs(),
			$keys[23] => $this->getMonirs(),
			$keys[24] => $this->getCodirs(),
			$keys[25] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpfacturPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumord($value);
				break;
			case 1:
				$this->setFecfac($value);
				break;
			case 2:
				$this->setNumfac($value);
				break;
			case 3:
				$this->setNumctr($value);
				break;
			case 4:
				$this->setTiptra($value);
				break;
			case 5:
				$this->setTotfac($value);
				break;
			case 6:
				$this->setExeiva($value);
				break;
			case 7:
				$this->setBasimp($value);
				break;
			case 8:
				$this->setPoriva($value);
				break;
			case 9:
				$this->setMoniva($value);
				break;
			case 10:
				$this->setMonret($value);
				break;
			case 11:
				$this->setBasltf($value);
				break;
			case 12:
				$this->setPorltf($value);
				break;
			case 13:
				$this->setMonltf($value);
				break;
			case 14:
				$this->setBasislr($value);
				break;
			case 15:
				$this->setPorislr($value);
				break;
			case 16:
				$this->setMonislr($value);
				break;
			case 17:
				$this->setCodislr($value);
				break;
			case 18:
				$this->setRifalt($value);
				break;
			case 19:
				$this->setFacafe($value);
				break;
			case 20:
				$this->setObservacion($value);
				break;
			case 21:
				$this->setBasirs($value);
				break;
			case 22:
				$this->setPorirs($value);
				break;
			case 23:
				$this->setMonirs($value);
				break;
			case 24:
				$this->setCodirs($value);
				break;
			case 25:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpfacturPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumord($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecfac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumfac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumctr($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTiptra($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTotfac($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setExeiva($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setBasimp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPoriva($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMoniva($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonret($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setBasltf($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPorltf($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonltf($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setBasislr($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPorislr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setMonislr($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodislr($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setRifalt($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFacafe($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setObservacion($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setBasirs($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPorirs($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMonirs($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodirs($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setId($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpfacturPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpfacturPeer::NUMORD)) $criteria->add(OpfacturPeer::NUMORD, $this->numord);
		if ($this->isColumnModified(OpfacturPeer::FECFAC)) $criteria->add(OpfacturPeer::FECFAC, $this->fecfac);
		if ($this->isColumnModified(OpfacturPeer::NUMFAC)) $criteria->add(OpfacturPeer::NUMFAC, $this->numfac);
		if ($this->isColumnModified(OpfacturPeer::NUMCTR)) $criteria->add(OpfacturPeer::NUMCTR, $this->numctr);
		if ($this->isColumnModified(OpfacturPeer::TIPTRA)) $criteria->add(OpfacturPeer::TIPTRA, $this->tiptra);
		if ($this->isColumnModified(OpfacturPeer::TOTFAC)) $criteria->add(OpfacturPeer::TOTFAC, $this->totfac);
		if ($this->isColumnModified(OpfacturPeer::EXEIVA)) $criteria->add(OpfacturPeer::EXEIVA, $this->exeiva);
		if ($this->isColumnModified(OpfacturPeer::BASIMP)) $criteria->add(OpfacturPeer::BASIMP, $this->basimp);
		if ($this->isColumnModified(OpfacturPeer::PORIVA)) $criteria->add(OpfacturPeer::PORIVA, $this->poriva);
		if ($this->isColumnModified(OpfacturPeer::MONIVA)) $criteria->add(OpfacturPeer::MONIVA, $this->moniva);
		if ($this->isColumnModified(OpfacturPeer::MONRET)) $criteria->add(OpfacturPeer::MONRET, $this->monret);
		if ($this->isColumnModified(OpfacturPeer::BASLTF)) $criteria->add(OpfacturPeer::BASLTF, $this->basltf);
		if ($this->isColumnModified(OpfacturPeer::PORLTF)) $criteria->add(OpfacturPeer::PORLTF, $this->porltf);
		if ($this->isColumnModified(OpfacturPeer::MONLTF)) $criteria->add(OpfacturPeer::MONLTF, $this->monltf);
		if ($this->isColumnModified(OpfacturPeer::BASISLR)) $criteria->add(OpfacturPeer::BASISLR, $this->basislr);
		if ($this->isColumnModified(OpfacturPeer::PORISLR)) $criteria->add(OpfacturPeer::PORISLR, $this->porislr);
		if ($this->isColumnModified(OpfacturPeer::MONISLR)) $criteria->add(OpfacturPeer::MONISLR, $this->monislr);
		if ($this->isColumnModified(OpfacturPeer::CODISLR)) $criteria->add(OpfacturPeer::CODISLR, $this->codislr);
		if ($this->isColumnModified(OpfacturPeer::RIFALT)) $criteria->add(OpfacturPeer::RIFALT, $this->rifalt);
		if ($this->isColumnModified(OpfacturPeer::FACAFE)) $criteria->add(OpfacturPeer::FACAFE, $this->facafe);
		if ($this->isColumnModified(OpfacturPeer::OBSERVACION)) $criteria->add(OpfacturPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(OpfacturPeer::BASIRS)) $criteria->add(OpfacturPeer::BASIRS, $this->basirs);
		if ($this->isColumnModified(OpfacturPeer::PORIRS)) $criteria->add(OpfacturPeer::PORIRS, $this->porirs);
		if ($this->isColumnModified(OpfacturPeer::MONIRS)) $criteria->add(OpfacturPeer::MONIRS, $this->monirs);
		if ($this->isColumnModified(OpfacturPeer::CODIRS)) $criteria->add(OpfacturPeer::CODIRS, $this->codirs);
		if ($this->isColumnModified(OpfacturPeer::ID)) $criteria->add(OpfacturPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpfacturPeer::DATABASE_NAME);

		$criteria->add(OpfacturPeer::ID, $this->id);

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

		$copyObj->setNumord($this->numord);

		$copyObj->setFecfac($this->fecfac);

		$copyObj->setNumfac($this->numfac);

		$copyObj->setNumctr($this->numctr);

		$copyObj->setTiptra($this->tiptra);

		$copyObj->setTotfac($this->totfac);

		$copyObj->setExeiva($this->exeiva);

		$copyObj->setBasimp($this->basimp);

		$copyObj->setPoriva($this->poriva);

		$copyObj->setMoniva($this->moniva);

		$copyObj->setMonret($this->monret);

		$copyObj->setBasltf($this->basltf);

		$copyObj->setPorltf($this->porltf);

		$copyObj->setMonltf($this->monltf);

		$copyObj->setBasislr($this->basislr);

		$copyObj->setPorislr($this->porislr);

		$copyObj->setMonislr($this->monislr);

		$copyObj->setCodislr($this->codislr);

		$copyObj->setRifalt($this->rifalt);

		$copyObj->setFacafe($this->facafe);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setBasirs($this->basirs);

		$copyObj->setPorirs($this->porirs);

		$copyObj->setMonirs($this->monirs);

		$copyObj->setCodirs($this->codirs);


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
			self::$peer = new OpfacturPeer();
		}
		return self::$peer;
	}

} 