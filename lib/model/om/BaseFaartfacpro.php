<?php


abstract class BaseFaartfacpro extends BaseObject  implements Persistent {


	
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


	
	protected $candes;


	
	protected $nronot;


	
	protected $orddespacho;


	
	protected $guia;


	
	protected $contenedores;


	
	protected $billleading;


	
	protected $numtransp;


	
	protected $placa;


	
	protected $chofer;


	
	protected $fecsal;


	
	protected $feclleg;


	
	protected $prod;


	
	protected $kg;


	
	protected $cajas;


	
	protected $estatus;


	
	protected $observaciones;


	
	protected $tm;


	
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
  
  public function getCandes($val=false)
  {

    if($val) return number_format($this->candes,2,',','.');
    else return $this->candes;

  }
  
  public function getNronot()
  {

    return trim($this->nronot);

  }
  
  public function getOrddespacho()
  {

    return trim($this->orddespacho);

  }
  
  public function getGuia()
  {

    return trim($this->guia);

  }
  
  public function getContenedores()
  {

    return trim($this->contenedores);

  }
  
  public function getBillleading()
  {

    return trim($this->billleading);

  }
  
  public function getNumtransp()
  {

    return trim($this->numtransp);

  }
  
  public function getPlaca()
  {

    return trim($this->placa);

  }
  
  public function getChofer()
  {

    return trim($this->chofer);

  }
  
  public function getFecsal($format = 'Y-m-d H:i:s')
  {

    if ($this->fecsal === null || $this->fecsal === '') {
      return null;
    } elseif (!is_int($this->fecsal)) {
            $ts = strtotime($this->fecsal);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsal] as date/time value: " . var_export($this->fecsal, true));
      }
    } else {
      $ts = $this->fecsal;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getFeclleg($format = 'Y-m-d H:i:s')
  {

    if ($this->feclleg === null || $this->feclleg === '') {
      return null;
    } elseif (!is_int($this->feclleg)) {
            $ts = strtotime($this->feclleg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feclleg] as date/time value: " . var_export($this->feclleg, true));
      }
    } else {
      $ts = $this->feclleg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getProd()
  {

    return trim($this->prod);

  }
  
  public function getKg($val=false)
  {

    if($val) return number_format($this->kg,2,',','.');
    else return $this->kg;

  }
  
  public function getCajas($val=false)
  {

    if($val) return number_format($this->cajas,2,',','.');
    else return $this->cajas;

  }
  
  public function getEstatus()
  {

    return trim($this->estatus);

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getTm($val=false)
  {

    if($val) return number_format($this->tm,2,',','.');
    else return $this->tm;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setReffac($v)
	{

    if ($this->reffac !== $v) {
        $this->reffac = $v;
        $this->modifiedColumns[] = FaartfacproPeer::REFFAC;
      }
  
	} 
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = FaartfacproPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = FaartfacproPeer::DESART;
      }
  
	} 
	
	public function setCodref($v)
	{

    if ($this->codref !== $v) {
        $this->codref = $v;
        $this->modifiedColumns[] = FaartfacproPeer::CODREF;
      }
  
	} 
	
	public function setCantot($v)
	{

    if ($this->cantot !== $v) {
        $this->cantot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::CANTOT;
      }
  
	} 
	
	public function setPrecio($v)
	{

    if ($this->precio !== $v) {
        $this->precio = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::PRECIO;
      }
  
	} 
	
	public function setMonrgo($v)
	{

    if ($this->monrgo !== $v) {
        $this->monrgo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::MONRGO;
      }
  
	} 
	
	public function setMondes($v)
	{

    if ($this->mondes !== $v) {
        $this->mondes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::MONDES;
      }
  
	} 
	
	public function setTotart($v)
	{

    if ($this->totart !== $v) {
        $this->totart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::TOTART;
      }
  
	} 
	
	public function setCanaju($v)
	{

    if ($this->canaju !== $v) {
        $this->canaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::CANAJU;
      }
  
	} 
	
	public function setCandes($v)
	{

    if ($this->candes !== $v) {
        $this->candes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::CANDES;
      }
  
	} 
	
	public function setNronot($v)
	{

    if ($this->nronot !== $v) {
        $this->nronot = $v;
        $this->modifiedColumns[] = FaartfacproPeer::NRONOT;
      }
  
	} 
	
	public function setOrddespacho($v)
	{

    if ($this->orddespacho !== $v) {
        $this->orddespacho = $v;
        $this->modifiedColumns[] = FaartfacproPeer::ORDDESPACHO;
      }
  
	} 
	
	public function setGuia($v)
	{

    if ($this->guia !== $v) {
        $this->guia = $v;
        $this->modifiedColumns[] = FaartfacproPeer::GUIA;
      }
  
	} 
	
	public function setContenedores($v)
	{

    if ($this->contenedores !== $v) {
        $this->contenedores = $v;
        $this->modifiedColumns[] = FaartfacproPeer::CONTENEDORES;
      }
  
	} 
	
	public function setBillleading($v)
	{

    if ($this->billleading !== $v) {
        $this->billleading = $v;
        $this->modifiedColumns[] = FaartfacproPeer::BILLLEADING;
      }
  
	} 
	
	public function setNumtransp($v)
	{

    if ($this->numtransp !== $v) {
        $this->numtransp = $v;
        $this->modifiedColumns[] = FaartfacproPeer::NUMTRANSP;
      }
  
	} 
	
	public function setPlaca($v)
	{

    if ($this->placa !== $v) {
        $this->placa = $v;
        $this->modifiedColumns[] = FaartfacproPeer::PLACA;
      }
  
	} 
	
	public function setChofer($v)
	{

    if ($this->chofer !== $v) {
        $this->chofer = $v;
        $this->modifiedColumns[] = FaartfacproPeer::CHOFER;
      }
  
	} 
	
	public function setFecsal($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsal] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsal !== $ts) {
      $this->fecsal = $ts;
      $this->modifiedColumns[] = FaartfacproPeer::FECSAL;
    }

	} 
	
	public function setFeclleg($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feclleg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feclleg !== $ts) {
      $this->feclleg = $ts;
      $this->modifiedColumns[] = FaartfacproPeer::FECLLEG;
    }

	} 
	
	public function setProd($v)
	{

    if ($this->prod !== $v) {
        $this->prod = $v;
        $this->modifiedColumns[] = FaartfacproPeer::PROD;
      }
  
	} 
	
	public function setKg($v)
	{

    if ($this->kg !== $v) {
        $this->kg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::KG;
      }
  
	} 
	
	public function setCajas($v)
	{

    if ($this->cajas !== $v) {
        $this->cajas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::CAJAS;
      }
  
	} 
	
	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = FaartfacproPeer::ESTATUS;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = FaartfacproPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setTm($v)
	{

    if ($this->tm !== $v) {
        $this->tm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacproPeer::TM;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FaartfacproPeer::ID;
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

      $this->candes = $rs->getFloat($startcol + 10);

      $this->nronot = $rs->getString($startcol + 11);

      $this->orddespacho = $rs->getString($startcol + 12);

      $this->guia = $rs->getString($startcol + 13);

      $this->contenedores = $rs->getString($startcol + 14);

      $this->billleading = $rs->getString($startcol + 15);

      $this->numtransp = $rs->getString($startcol + 16);

      $this->placa = $rs->getString($startcol + 17);

      $this->chofer = $rs->getString($startcol + 18);

      $this->fecsal = $rs->getTimestamp($startcol + 19, null);

      $this->feclleg = $rs->getTimestamp($startcol + 20, null);

      $this->prod = $rs->getString($startcol + 21);

      $this->kg = $rs->getFloat($startcol + 22);

      $this->cajas = $rs->getFloat($startcol + 23);

      $this->estatus = $rs->getString($startcol + 24);

      $this->observaciones = $rs->getString($startcol + 25);

      $this->tm = $rs->getFloat($startcol + 26);

      $this->id = $rs->getInt($startcol + 27);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 28; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Faartfacpro object", $e);
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
			$con = Propel::getConnection(FaartfacproPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FaartfacproPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FaartfacproPeer::DATABASE_NAME);
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
					$pk = FaartfacproPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FaartfacproPeer::doUpdate($this, $con);
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


			if (($retval = FaartfacproPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartfacproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCandes();
				break;
			case 11:
				return $this->getNronot();
				break;
			case 12:
				return $this->getOrddespacho();
				break;
			case 13:
				return $this->getGuia();
				break;
			case 14:
				return $this->getContenedores();
				break;
			case 15:
				return $this->getBillleading();
				break;
			case 16:
				return $this->getNumtransp();
				break;
			case 17:
				return $this->getPlaca();
				break;
			case 18:
				return $this->getChofer();
				break;
			case 19:
				return $this->getFecsal();
				break;
			case 20:
				return $this->getFeclleg();
				break;
			case 21:
				return $this->getProd();
				break;
			case 22:
				return $this->getKg();
				break;
			case 23:
				return $this->getCajas();
				break;
			case 24:
				return $this->getEstatus();
				break;
			case 25:
				return $this->getObservaciones();
				break;
			case 26:
				return $this->getTm();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartfacproPeer::getFieldNames($keyType);
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
			$keys[10] => $this->getCandes(),
			$keys[11] => $this->getNronot(),
			$keys[12] => $this->getOrddespacho(),
			$keys[13] => $this->getGuia(),
			$keys[14] => $this->getContenedores(),
			$keys[15] => $this->getBillleading(),
			$keys[16] => $this->getNumtransp(),
			$keys[17] => $this->getPlaca(),
			$keys[18] => $this->getChofer(),
			$keys[19] => $this->getFecsal(),
			$keys[20] => $this->getFeclleg(),
			$keys[21] => $this->getProd(),
			$keys[22] => $this->getKg(),
			$keys[23] => $this->getCajas(),
			$keys[24] => $this->getEstatus(),
			$keys[25] => $this->getObservaciones(),
			$keys[26] => $this->getTm(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FaartfacproPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCandes($value);
				break;
			case 11:
				$this->setNronot($value);
				break;
			case 12:
				$this->setOrddespacho($value);
				break;
			case 13:
				$this->setGuia($value);
				break;
			case 14:
				$this->setContenedores($value);
				break;
			case 15:
				$this->setBillleading($value);
				break;
			case 16:
				$this->setNumtransp($value);
				break;
			case 17:
				$this->setPlaca($value);
				break;
			case 18:
				$this->setChofer($value);
				break;
			case 19:
				$this->setFecsal($value);
				break;
			case 20:
				$this->setFeclleg($value);
				break;
			case 21:
				$this->setProd($value);
				break;
			case 22:
				$this->setKg($value);
				break;
			case 23:
				$this->setCajas($value);
				break;
			case 24:
				$this->setEstatus($value);
				break;
			case 25:
				$this->setObservaciones($value);
				break;
			case 26:
				$this->setTm($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FaartfacproPeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[10], $arr)) $this->setCandes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNronot($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setOrddespacho($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGuia($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setContenedores($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setBillleading($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNumtransp($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setPlaca($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setChofer($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecsal($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFeclleg($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setProd($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setKg($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCajas($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setEstatus($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setObservaciones($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTm($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FaartfacproPeer::DATABASE_NAME);

		if ($this->isColumnModified(FaartfacproPeer::REFFAC)) $criteria->add(FaartfacproPeer::REFFAC, $this->reffac);
		if ($this->isColumnModified(FaartfacproPeer::CODART)) $criteria->add(FaartfacproPeer::CODART, $this->codart);
		if ($this->isColumnModified(FaartfacproPeer::DESART)) $criteria->add(FaartfacproPeer::DESART, $this->desart);
		if ($this->isColumnModified(FaartfacproPeer::CODREF)) $criteria->add(FaartfacproPeer::CODREF, $this->codref);
		if ($this->isColumnModified(FaartfacproPeer::CANTOT)) $criteria->add(FaartfacproPeer::CANTOT, $this->cantot);
		if ($this->isColumnModified(FaartfacproPeer::PRECIO)) $criteria->add(FaartfacproPeer::PRECIO, $this->precio);
		if ($this->isColumnModified(FaartfacproPeer::MONRGO)) $criteria->add(FaartfacproPeer::MONRGO, $this->monrgo);
		if ($this->isColumnModified(FaartfacproPeer::MONDES)) $criteria->add(FaartfacproPeer::MONDES, $this->mondes);
		if ($this->isColumnModified(FaartfacproPeer::TOTART)) $criteria->add(FaartfacproPeer::TOTART, $this->totart);
		if ($this->isColumnModified(FaartfacproPeer::CANAJU)) $criteria->add(FaartfacproPeer::CANAJU, $this->canaju);
		if ($this->isColumnModified(FaartfacproPeer::CANDES)) $criteria->add(FaartfacproPeer::CANDES, $this->candes);
		if ($this->isColumnModified(FaartfacproPeer::NRONOT)) $criteria->add(FaartfacproPeer::NRONOT, $this->nronot);
		if ($this->isColumnModified(FaartfacproPeer::ORDDESPACHO)) $criteria->add(FaartfacproPeer::ORDDESPACHO, $this->orddespacho);
		if ($this->isColumnModified(FaartfacproPeer::GUIA)) $criteria->add(FaartfacproPeer::GUIA, $this->guia);
		if ($this->isColumnModified(FaartfacproPeer::CONTENEDORES)) $criteria->add(FaartfacproPeer::CONTENEDORES, $this->contenedores);
		if ($this->isColumnModified(FaartfacproPeer::BILLLEADING)) $criteria->add(FaartfacproPeer::BILLLEADING, $this->billleading);
		if ($this->isColumnModified(FaartfacproPeer::NUMTRANSP)) $criteria->add(FaartfacproPeer::NUMTRANSP, $this->numtransp);
		if ($this->isColumnModified(FaartfacproPeer::PLACA)) $criteria->add(FaartfacproPeer::PLACA, $this->placa);
		if ($this->isColumnModified(FaartfacproPeer::CHOFER)) $criteria->add(FaartfacproPeer::CHOFER, $this->chofer);
		if ($this->isColumnModified(FaartfacproPeer::FECSAL)) $criteria->add(FaartfacproPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(FaartfacproPeer::FECLLEG)) $criteria->add(FaartfacproPeer::FECLLEG, $this->feclleg);
		if ($this->isColumnModified(FaartfacproPeer::PROD)) $criteria->add(FaartfacproPeer::PROD, $this->prod);
		if ($this->isColumnModified(FaartfacproPeer::KG)) $criteria->add(FaartfacproPeer::KG, $this->kg);
		if ($this->isColumnModified(FaartfacproPeer::CAJAS)) $criteria->add(FaartfacproPeer::CAJAS, $this->cajas);
		if ($this->isColumnModified(FaartfacproPeer::ESTATUS)) $criteria->add(FaartfacproPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(FaartfacproPeer::OBSERVACIONES)) $criteria->add(FaartfacproPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(FaartfacproPeer::TM)) $criteria->add(FaartfacproPeer::TM, $this->tm);
		if ($this->isColumnModified(FaartfacproPeer::ID)) $criteria->add(FaartfacproPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FaartfacproPeer::DATABASE_NAME);

		$criteria->add(FaartfacproPeer::ID, $this->id);

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

		$copyObj->setCandes($this->candes);

		$copyObj->setNronot($this->nronot);

		$copyObj->setOrddespacho($this->orddespacho);

		$copyObj->setGuia($this->guia);

		$copyObj->setContenedores($this->contenedores);

		$copyObj->setBillleading($this->billleading);

		$copyObj->setNumtransp($this->numtransp);

		$copyObj->setPlaca($this->placa);

		$copyObj->setChofer($this->chofer);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setFeclleg($this->feclleg);

		$copyObj->setProd($this->prod);

		$copyObj->setKg($this->kg);

		$copyObj->setCajas($this->cajas);

		$copyObj->setEstatus($this->estatus);

		$copyObj->setObservaciones($this->observaciones);

		$copyObj->setTm($this->tm);


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
			self::$peer = new FaartfacproPeer();
		}
		return self::$peer;
	}

} 