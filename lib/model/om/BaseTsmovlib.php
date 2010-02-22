<?php


abstract class BaseTsmovlib extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $reflib;


	
	protected $feclib;


	
	protected $tipmov;


	
	protected $deslib;


	
	protected $monmov;


	
	protected $codcta;


	
	protected $numcom;


	
	protected $feccom;


	
	protected $status;


	
	protected $stacon;


	
	protected $fecing;


	
	protected $fecanu;


	
	protected $tipmovpad;


	
	protected $reflibpad;


	
	protected $transito;


	
	protected $numcomadi;


	
	protected $feccomadi;


	
	protected $nombensus;


	
	protected $orden;


	
	protected $horing;


	
	protected $stacon1;


	
	protected $motanu;


	
	protected $refpag;


	
	protected $id;

	
	protected $aTsdefban;

	
	protected $aTstipmov;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getReflib()
  {

    return trim($this->reflib);

  }
  
  public function getFeclib($format = 'Y-m-d')
  {

    if ($this->feclib === null || $this->feclib === '') {
      return null;
    } elseif (!is_int($this->feclib)) {
            $ts = adodb_strtotime($this->feclib);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feclib] as date/time value: " . var_export($this->feclib, true));
      }
    } else {
      $ts = $this->feclib;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getDeslib()
  {

    return trim($this->deslib);

  }
  
  public function getMonmov($val=false)
  {

    if($val) return number_format($this->monmov,2,',','.');
    else return $this->monmov;

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getNumcom()
  {

    return trim($this->numcom);

  }
  
  public function getFeccom($format = 'Y-m-d')
  {

    if ($this->feccom === null || $this->feccom === '') {
      return null;
    } elseif (!is_int($this->feccom)) {
            $ts = adodb_strtotime($this->feccom);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccom] as date/time value: " . var_export($this->feccom, true));
      }
    } else {
      $ts = $this->feccom;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getStatus()
  {

    return trim($this->status);

  }
  
  public function getStacon()
  {

    return trim($this->stacon);

  }
  
  public function getFecing($format = 'Y-m-d')
  {

    if ($this->fecing === null || $this->fecing === '') {
      return null;
    } elseif (!is_int($this->fecing)) {
            $ts = adodb_strtotime($this->fecing);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecing] as date/time value: " . var_export($this->fecing, true));
      }
    } else {
      $ts = $this->fecing;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecanu($format = 'Y-m-d')
  {

    if ($this->fecanu === null || $this->fecanu === '') {
      return null;
    } elseif (!is_int($this->fecanu)) {
            $ts = adodb_strtotime($this->fecanu);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
      }
    } else {
      $ts = $this->fecanu;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getTipmovpad()
  {

    return trim($this->tipmovpad);

  }
  
  public function getReflibpad()
  {

    return trim($this->reflibpad);

  }
  
  public function getTransito()
  {

    return trim($this->transito);

  }
  
  public function getNumcomadi()
  {

    return trim($this->numcomadi);

  }
  
  public function getFeccomadi($format = 'Y-m-d')
  {

    if ($this->feccomadi === null || $this->feccomadi === '') {
      return null;
    } elseif (!is_int($this->feccomadi)) {
            $ts = adodb_strtotime($this->feccomadi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccomadi] as date/time value: " . var_export($this->feccomadi, true));
      }
    } else {
      $ts = $this->feccomadi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNombensus()
  {

    return trim($this->nombensus);

  }
  
  public function getOrden($val=false)
  {

    if($val) return number_format($this->orden,2,',','.');
    else return $this->orden;

  }
  
  public function getHoring()
  {

    return trim($this->horing);

  }
  
  public function getStacon1()
  {

    return trim($this->stacon1);

  }
  
  public function getMotanu()
  {

    return trim($this->motanu);

  }
  
  public function getRefpag()
  {

    return trim($this->refpag);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TsmovlibPeer::NUMCUE;
      }
  
		if ($this->aTsdefban !== null && $this->aTsdefban->getNumcue() !== $v) {
			$this->aTsdefban = null;
		}

	} 
	
	public function setReflib($v)
	{

    if ($this->reflib !== $v) {
        $this->reflib = $v;
        $this->modifiedColumns[] = TsmovlibPeer::REFLIB;
      }
  
	} 
	
	public function setFeclib($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feclib] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feclib !== $ts) {
      $this->feclib = $ts;
      $this->modifiedColumns[] = TsmovlibPeer::FECLIB;
    }

	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = TsmovlibPeer::TIPMOV;
      }
  
		if ($this->aTstipmov !== null && $this->aTstipmov->getCodtip() !== $v) {
			$this->aTstipmov = null;
		}

	} 
	
	public function setDeslib($v)
	{

    if ($this->deslib !== $v) {
        $this->deslib = $v;
        $this->modifiedColumns[] = TsmovlibPeer::DESLIB;
      }
  
	} 
	
	public function setMonmov($v)
	{

    if ($this->monmov !== $v) {
        $this->monmov = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsmovlibPeer::MONMOV;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = TsmovlibPeer::CODCTA;
      }
  
	} 
	
	public function setNumcom($v)
	{

    if ($this->numcom !== $v) {
        $this->numcom = $v;
        $this->modifiedColumns[] = TsmovlibPeer::NUMCOM;
      }
  
	} 
	
	public function setFeccom($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccom] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccom !== $ts) {
      $this->feccom = $ts;
      $this->modifiedColumns[] = TsmovlibPeer::FECCOM;
    }

	} 
	
	public function setStatus($v)
	{

    if ($this->status !== $v) {
        $this->status = $v;
        $this->modifiedColumns[] = TsmovlibPeer::STATUS;
      }
  
	} 
	
	public function setStacon($v)
	{

    if ($this->stacon !== $v) {
        $this->stacon = $v;
        $this->modifiedColumns[] = TsmovlibPeer::STACON;
      }
  
	} 
	
	public function setFecing($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecing] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecing !== $ts) {
      $this->fecing = $ts;
      $this->modifiedColumns[] = TsmovlibPeer::FECING;
    }

	} 
	
	public function setFecanu($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecanu !== $ts) {
      $this->fecanu = $ts;
      $this->modifiedColumns[] = TsmovlibPeer::FECANU;
    }

	} 
	
	public function setTipmovpad($v)
	{

    if ($this->tipmovpad !== $v) {
        $this->tipmovpad = $v;
        $this->modifiedColumns[] = TsmovlibPeer::TIPMOVPAD;
      }
  
	} 
	
	public function setReflibpad($v)
	{

    if ($this->reflibpad !== $v) {
        $this->reflibpad = $v;
        $this->modifiedColumns[] = TsmovlibPeer::REFLIBPAD;
      }
  
	} 
	
	public function setTransito($v)
	{

    if ($this->transito !== $v) {
        $this->transito = $v;
        $this->modifiedColumns[] = TsmovlibPeer::TRANSITO;
      }
  
	} 
	
	public function setNumcomadi($v)
	{

    if ($this->numcomadi !== $v) {
        $this->numcomadi = $v;
        $this->modifiedColumns[] = TsmovlibPeer::NUMCOMADI;
      }
  
	} 
	
	public function setFeccomadi($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccomadi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccomadi !== $ts) {
      $this->feccomadi = $ts;
      $this->modifiedColumns[] = TsmovlibPeer::FECCOMADI;
    }

	} 
	
	public function setNombensus($v)
	{

    if ($this->nombensus !== $v) {
        $this->nombensus = $v;
        $this->modifiedColumns[] = TsmovlibPeer::NOMBENSUS;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = Herramientas::toFloat($v);
        $this->modifiedColumns[] = TsmovlibPeer::ORDEN;
      }
  
	} 
	
	public function setHoring($v)
	{

    if ($this->horing !== $v) {
        $this->horing = $v;
        $this->modifiedColumns[] = TsmovlibPeer::HORING;
      }
  
	} 
	
	public function setStacon1($v)
	{

    if ($this->stacon1 !== $v) {
        $this->stacon1 = $v;
        $this->modifiedColumns[] = TsmovlibPeer::STACON1;
      }
  
	} 
	
	public function setMotanu($v)
	{

    if ($this->motanu !== $v) {
        $this->motanu = $v;
        $this->modifiedColumns[] = TsmovlibPeer::MOTANU;
      }
  
	} 
	
	public function setRefpag($v)
	{

    if ($this->refpag !== $v) {
        $this->refpag = $v;
        $this->modifiedColumns[] = TsmovlibPeer::REFPAG;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TsmovlibPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->reflib = $rs->getString($startcol + 1);

      $this->feclib = $rs->getDate($startcol + 2, null);

      $this->tipmov = $rs->getString($startcol + 3);

      $this->deslib = $rs->getString($startcol + 4);

      $this->monmov = $rs->getFloat($startcol + 5);

      $this->codcta = $rs->getString($startcol + 6);

      $this->numcom = $rs->getString($startcol + 7);

      $this->feccom = $rs->getDate($startcol + 8, null);

      $this->status = $rs->getString($startcol + 9);

      $this->stacon = $rs->getString($startcol + 10);

      $this->fecing = $rs->getDate($startcol + 11, null);

      $this->fecanu = $rs->getDate($startcol + 12, null);

      $this->tipmovpad = $rs->getString($startcol + 13);

      $this->reflibpad = $rs->getString($startcol + 14);

      $this->transito = $rs->getString($startcol + 15);

      $this->numcomadi = $rs->getString($startcol + 16);

      $this->feccomadi = $rs->getDate($startcol + 17, null);

      $this->nombensus = $rs->getString($startcol + 18);

      $this->orden = $rs->getFloat($startcol + 19);

      $this->horing = $rs->getString($startcol + 20);

      $this->stacon1 = $rs->getString($startcol + 21);

      $this->motanu = $rs->getString($startcol + 22);

      $this->refpag = $rs->getString($startcol + 23);

      $this->id = $rs->getInt($startcol + 24);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 25; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tsmovlib object", $e);
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
			$con = Propel::getConnection(TsmovlibPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsmovlibPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsmovlibPeer::DATABASE_NAME);
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


												
			if ($this->aTsdefban !== null) {
				if ($this->aTsdefban->isModified()) {
					$affectedRows += $this->aTsdefban->save($con);
				}
				$this->setTsdefban($this->aTsdefban);
			}

			if ($this->aTstipmov !== null) {
				if ($this->aTstipmov->isModified()) {
					$affectedRows += $this->aTstipmov->save($con);
				}
				$this->setTstipmov($this->aTstipmov);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = TsmovlibPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TsmovlibPeer::doUpdate($this, $con);
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


												
			if ($this->aTsdefban !== null) {
				if (!$this->aTsdefban->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTsdefban->getValidationFailures());
				}
			}

			if ($this->aTstipmov !== null) {
				if (!$this->aTstipmov->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTstipmov->getValidationFailures());
				}
			}


			if (($retval = TsmovlibPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsmovlibPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getReflib();
				break;
			case 2:
				return $this->getFeclib();
				break;
			case 3:
				return $this->getTipmov();
				break;
			case 4:
				return $this->getDeslib();
				break;
			case 5:
				return $this->getMonmov();
				break;
			case 6:
				return $this->getCodcta();
				break;
			case 7:
				return $this->getNumcom();
				break;
			case 8:
				return $this->getFeccom();
				break;
			case 9:
				return $this->getStatus();
				break;
			case 10:
				return $this->getStacon();
				break;
			case 11:
				return $this->getFecing();
				break;
			case 12:
				return $this->getFecanu();
				break;
			case 13:
				return $this->getTipmovpad();
				break;
			case 14:
				return $this->getReflibpad();
				break;
			case 15:
				return $this->getTransito();
				break;
			case 16:
				return $this->getNumcomadi();
				break;
			case 17:
				return $this->getFeccomadi();
				break;
			case 18:
				return $this->getNombensus();
				break;
			case 19:
				return $this->getOrden();
				break;
			case 20:
				return $this->getHoring();
				break;
			case 21:
				return $this->getStacon1();
				break;
			case 22:
				return $this->getMotanu();
				break;
			case 23:
				return $this->getRefpag();
				break;
			case 24:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsmovlibPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getReflib(),
			$keys[2] => $this->getFeclib(),
			$keys[3] => $this->getTipmov(),
			$keys[4] => $this->getDeslib(),
			$keys[5] => $this->getMonmov(),
			$keys[6] => $this->getCodcta(),
			$keys[7] => $this->getNumcom(),
			$keys[8] => $this->getFeccom(),
			$keys[9] => $this->getStatus(),
			$keys[10] => $this->getStacon(),
			$keys[11] => $this->getFecing(),
			$keys[12] => $this->getFecanu(),
			$keys[13] => $this->getTipmovpad(),
			$keys[14] => $this->getReflibpad(),
			$keys[15] => $this->getTransito(),
			$keys[16] => $this->getNumcomadi(),
			$keys[17] => $this->getFeccomadi(),
			$keys[18] => $this->getNombensus(),
			$keys[19] => $this->getOrden(),
			$keys[20] => $this->getHoring(),
			$keys[21] => $this->getStacon1(),
			$keys[22] => $this->getMotanu(),
			$keys[23] => $this->getRefpag(),
			$keys[24] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsmovlibPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setReflib($value);
				break;
			case 2:
				$this->setFeclib($value);
				break;
			case 3:
				$this->setTipmov($value);
				break;
			case 4:
				$this->setDeslib($value);
				break;
			case 5:
				$this->setMonmov($value);
				break;
			case 6:
				$this->setCodcta($value);
				break;
			case 7:
				$this->setNumcom($value);
				break;
			case 8:
				$this->setFeccom($value);
				break;
			case 9:
				$this->setStatus($value);
				break;
			case 10:
				$this->setStacon($value);
				break;
			case 11:
				$this->setFecing($value);
				break;
			case 12:
				$this->setFecanu($value);
				break;
			case 13:
				$this->setTipmovpad($value);
				break;
			case 14:
				$this->setReflibpad($value);
				break;
			case 15:
				$this->setTransito($value);
				break;
			case 16:
				$this->setNumcomadi($value);
				break;
			case 17:
				$this->setFeccomadi($value);
				break;
			case 18:
				$this->setNombensus($value);
				break;
			case 19:
				$this->setOrden($value);
				break;
			case 20:
				$this->setHoring($value);
				break;
			case 21:
				$this->setStacon1($value);
				break;
			case 22:
				$this->setMotanu($value);
				break;
			case 23:
				$this->setRefpag($value);
				break;
			case 24:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsmovlibPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setReflib($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFeclib($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDeslib($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMonmov($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcta($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcom($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFeccom($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setStatus($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStacon($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecing($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFecanu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmovpad($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setReflibpad($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTransito($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumcomadi($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFeccomadi($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNombensus($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setOrden($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setHoring($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setStacon1($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setMotanu($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setRefpag($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setId($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsmovlibPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsmovlibPeer::NUMCUE)) $criteria->add(TsmovlibPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsmovlibPeer::REFLIB)) $criteria->add(TsmovlibPeer::REFLIB, $this->reflib);
		if ($this->isColumnModified(TsmovlibPeer::FECLIB)) $criteria->add(TsmovlibPeer::FECLIB, $this->feclib);
		if ($this->isColumnModified(TsmovlibPeer::TIPMOV)) $criteria->add(TsmovlibPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(TsmovlibPeer::DESLIB)) $criteria->add(TsmovlibPeer::DESLIB, $this->deslib);
		if ($this->isColumnModified(TsmovlibPeer::MONMOV)) $criteria->add(TsmovlibPeer::MONMOV, $this->monmov);
		if ($this->isColumnModified(TsmovlibPeer::CODCTA)) $criteria->add(TsmovlibPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(TsmovlibPeer::NUMCOM)) $criteria->add(TsmovlibPeer::NUMCOM, $this->numcom);
		if ($this->isColumnModified(TsmovlibPeer::FECCOM)) $criteria->add(TsmovlibPeer::FECCOM, $this->feccom);
		if ($this->isColumnModified(TsmovlibPeer::STATUS)) $criteria->add(TsmovlibPeer::STATUS, $this->status);
		if ($this->isColumnModified(TsmovlibPeer::STACON)) $criteria->add(TsmovlibPeer::STACON, $this->stacon);
		if ($this->isColumnModified(TsmovlibPeer::FECING)) $criteria->add(TsmovlibPeer::FECING, $this->fecing);
		if ($this->isColumnModified(TsmovlibPeer::FECANU)) $criteria->add(TsmovlibPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(TsmovlibPeer::TIPMOVPAD)) $criteria->add(TsmovlibPeer::TIPMOVPAD, $this->tipmovpad);
		if ($this->isColumnModified(TsmovlibPeer::REFLIBPAD)) $criteria->add(TsmovlibPeer::REFLIBPAD, $this->reflibpad);
		if ($this->isColumnModified(TsmovlibPeer::TRANSITO)) $criteria->add(TsmovlibPeer::TRANSITO, $this->transito);
		if ($this->isColumnModified(TsmovlibPeer::NUMCOMADI)) $criteria->add(TsmovlibPeer::NUMCOMADI, $this->numcomadi);
		if ($this->isColumnModified(TsmovlibPeer::FECCOMADI)) $criteria->add(TsmovlibPeer::FECCOMADI, $this->feccomadi);
		if ($this->isColumnModified(TsmovlibPeer::NOMBENSUS)) $criteria->add(TsmovlibPeer::NOMBENSUS, $this->nombensus);
		if ($this->isColumnModified(TsmovlibPeer::ORDEN)) $criteria->add(TsmovlibPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(TsmovlibPeer::HORING)) $criteria->add(TsmovlibPeer::HORING, $this->horing);
		if ($this->isColumnModified(TsmovlibPeer::STACON1)) $criteria->add(TsmovlibPeer::STACON1, $this->stacon1);
		if ($this->isColumnModified(TsmovlibPeer::MOTANU)) $criteria->add(TsmovlibPeer::MOTANU, $this->motanu);
		if ($this->isColumnModified(TsmovlibPeer::REFPAG)) $criteria->add(TsmovlibPeer::REFPAG, $this->refpag);
		if ($this->isColumnModified(TsmovlibPeer::ID)) $criteria->add(TsmovlibPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsmovlibPeer::DATABASE_NAME);

		$criteria->add(TsmovlibPeer::ID, $this->id);

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

		$copyObj->setReflib($this->reflib);

		$copyObj->setFeclib($this->feclib);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setDeslib($this->deslib);

		$copyObj->setMonmov($this->monmov);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setNumcom($this->numcom);

		$copyObj->setFeccom($this->feccom);

		$copyObj->setStatus($this->status);

		$copyObj->setStacon($this->stacon);

		$copyObj->setFecing($this->fecing);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setTipmovpad($this->tipmovpad);

		$copyObj->setReflibpad($this->reflibpad);

		$copyObj->setTransito($this->transito);

		$copyObj->setNumcomadi($this->numcomadi);

		$copyObj->setFeccomadi($this->feccomadi);

		$copyObj->setNombensus($this->nombensus);

		$copyObj->setOrden($this->orden);

		$copyObj->setHoring($this->horing);

		$copyObj->setStacon1($this->stacon1);

		$copyObj->setMotanu($this->motanu);

		$copyObj->setRefpag($this->refpag);


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
			self::$peer = new TsmovlibPeer();
		}
		return self::$peer;
	}

	
	public function setTsdefban($v)
	{


		if ($v === null) {
			$this->setNumcue(NULL);
		} else {
			$this->setNumcue($v->getNumcue());
		}


		$this->aTsdefban = $v;
	}


	
	public function getTsdefban($con = null)
	{
		if ($this->aTsdefban === null && (($this->numcue !== "" && $this->numcue !== null))) {
						include_once 'lib/model/om/BaseTsdefbanPeer.php';

			$this->aTsdefban = TsdefbanPeer::retrieveByPK($this->numcue, $con);

			
		}
		return $this->aTsdefban;
	}

	
	public function setTstipmov($v)
	{


		if ($v === null) {
			$this->setTipmov(NULL);
		} else {
			$this->setTipmov($v->getCodtip());
		}


		$this->aTstipmov = $v;
	}


	
	public function getTstipmov($con = null)
	{
		if ($this->aTstipmov === null && (($this->tipmov !== "" && $this->tipmov !== null))) {
						include_once 'lib/model/om/BaseTstipmovPeer.php';

			$this->aTstipmov = TstipmovPeer::retrieveByPK($this->tipmov, $con);

			
		}
		return $this->aTstipmov;
	}

} 