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



	protected $candes;



	protected $nronot;



	protected $orddespacho;



	protected $guia;



	protected $contenedores;



	protected $billleading;



	protected $placa;



	protected $rifpro;



	protected $fecsal;



	protected $horsal;



	protected $feclleg;



	protected $horlleg;



	protected $codprod;



	protected $kg;



	protected $cajas;



	protected $estatus;



	protected $observaciones;



	protected $tm;



	protected $preaju;



	protected $cedrif;


	
	protected $notentdig;


	
	protected $tipov;


	
	protected $fecllca;


	
	protected $horllca;


	
	protected $fecdesc;


	
	protected $hordesc;


	
	protected $kgent;


	
	protected $difkg;


	
	protected $cajasent;


	
	protected $difcaj;


	
	protected $tment;


	
	protected $difton;


	
	protected $ier;


	
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

  public function getPlaca()
  {

    return trim($this->placa);

  }

  public function getRifpro()
  {

    return trim($this->rifpro);

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


  public function getHorsal()
  {

    return trim($this->horsal);

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


  public function getHorlleg()
  {

    return trim($this->horlleg);

  }

  public function getCodprod()
  {

    return trim($this->codprod);

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

  public function getPreaju($val=false)
  {

    if($val) return number_format($this->preaju,2,',','.');
    else return $this->preaju;

  }

  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getNotentdig()
  {

    return trim($this->notentdig);

  }
  
  public function getTipov()
  {

    return trim($this->tipov);

  }
  
  public function getFecllca($format = 'Y-m-d H:i:s')
  {

    if ($this->fecllca === null || $this->fecllca === '') {
      return null;
    } elseif (!is_int($this->fecllca)) {
            $ts = strtotime($this->fecllca);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecllca] as date/time value: " . var_export($this->fecllca, true));
      }
    } else {
      $ts = $this->fecllca;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getHorllca()
  {

    return trim($this->horllca);

  }
  
  public function getFecdesc($format = 'Y-m-d H:i:s')
  {

    if ($this->fecdesc === null || $this->fecdesc === '') {
      return null;
    } elseif (!is_int($this->fecdesc)) {
            $ts = strtotime($this->fecdesc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdesc] as date/time value: " . var_export($this->fecdesc, true));
      }
    } else {
      $ts = $this->fecdesc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return strftime($format, $ts);
    } else {
      return date($format, $ts);
    }
  }

  
  public function getHordesc()
  {

    return trim($this->hordesc);

  }
  
  public function getKgent($val=false)
  {

    if($val) return number_format($this->kgent,2,',','.');
    else return $this->kgent;

  }
  
  public function getDifkg($val=false)
  {

    if($val) return number_format($this->difkg,2,',','.');
    else return $this->difkg;

  }
  
  public function getCajasent($val=false)
  {

    if($val) return number_format($this->cajasent,2,',','.');
    else return $this->cajasent;

  }
  
  public function getDifcaj($val=false)
  {

    if($val) return number_format($this->difcaj,2,',','.');
    else return $this->difcaj;

  }
  
  public function getTment($val=false)
  {

    if($val) return number_format($this->tment,2,',','.');
    else return $this->tment;

  }
  
  public function getDifton($val=false)
  {

    if($val) return number_format($this->difton,2,',','.');
    else return $this->difton;

  }
  
  public function getIer()
  {

    return trim($this->ier);

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

	public function setCandes($v)
	{

    if ($this->candes !== $v) {
        $this->candes = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::CANDES;
      }

	}

	public function setNronot($v)
	{

    if ($this->nronot !== $v) {
        $this->nronot = $v;
        $this->modifiedColumns[] = FaartfacPeer::NRONOT;
      }

	}

	public function setOrddespacho($v)
	{

    if ($this->orddespacho !== $v) {
        $this->orddespacho = $v;
        $this->modifiedColumns[] = FaartfacPeer::ORDDESPACHO;
      }

	}

	public function setGuia($v)
	{

    if ($this->guia !== $v) {
        $this->guia = $v;
        $this->modifiedColumns[] = FaartfacPeer::GUIA;
      }

	}

	public function setContenedores($v)
	{

    if ($this->contenedores !== $v) {
        $this->contenedores = $v;
        $this->modifiedColumns[] = FaartfacPeer::CONTENEDORES;
      }

	}

	public function setBillleading($v)
	{

    if ($this->billleading !== $v) {
        $this->billleading = $v;
        $this->modifiedColumns[] = FaartfacPeer::BILLLEADING;
      }

	}

	public function setPlaca($v)
	{

    if ($this->placa !== $v) {
        $this->placa = $v;
        $this->modifiedColumns[] = FaartfacPeer::PLACA;
      }

	}

	public function setRifpro($v)
	{

    if ($this->rifpro !== $v) {
        $this->rifpro = $v;
        $this->modifiedColumns[] = FaartfacPeer::RIFPRO;
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
      $this->modifiedColumns[] = FaartfacPeer::FECSAL;
    }

	}

	public function setHorsal($v)
	{

    if ($this->horsal !== $v) {
        $this->horsal = $v;
        $this->modifiedColumns[] = FaartfacPeer::HORSAL;
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
      $this->modifiedColumns[] = FaartfacPeer::FECLLEG;
    }

	}

	public function setHorlleg($v)
	{

    if ($this->horlleg !== $v) {
        $this->horlleg = $v;
        $this->modifiedColumns[] = FaartfacPeer::HORLLEG;
      }

	}

	public function setCodprod($v)
	{

    if ($this->codprod !== $v) {
        $this->codprod = $v;
        $this->modifiedColumns[] = FaartfacPeer::CODPROD;
      }

	}

	public function setKg($v)
	{

    if ($this->kg !== $v) {
        $this->kg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::KG;
      }

	}

	public function setCajas($v)
	{

    if ($this->cajas !== $v) {
        $this->cajas = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::CAJAS;
      }

	}

	public function setEstatus($v)
	{

    if ($this->estatus !== $v) {
        $this->estatus = $v;
        $this->modifiedColumns[] = FaartfacPeer::ESTATUS;
      }

	}

	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = FaartfacPeer::OBSERVACIONES;
      }

	}

	public function setTm($v)
	{

    if ($this->tm !== $v) {
        $this->tm = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::TM;
      }

	}

	public function setPreaju($v)
	{

    if ($this->preaju !== $v) {
        $this->preaju = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::PREAJU;
      }

	}

	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = FaartfacPeer::CEDRIF;
      }
  
	} 
	
	public function setNotentdig($v)
	{

    if ($this->notentdig !== $v) {
        $this->notentdig = $v;
        $this->modifiedColumns[] = FaartfacPeer::NOTENTDIG;
      }
  
	} 
	
	public function setTipov($v)
	{

    if ($this->tipov !== $v) {
        $this->tipov = $v;
        $this->modifiedColumns[] = FaartfacPeer::TIPOV;
      }
  
	} 
	
	public function setFecllca($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecllca] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecllca !== $ts) {
      $this->fecllca = $ts;
      $this->modifiedColumns[] = FaartfacPeer::FECLLCA;
    }

	} 
	
	public function setHorllca($v)
	{

    if ($this->horllca !== $v) {
        $this->horllca = $v;
        $this->modifiedColumns[] = FaartfacPeer::HORLLCA;
      }
  
	} 
	
	public function setFecdesc($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdesc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdesc !== $ts) {
      $this->fecdesc = $ts;
      $this->modifiedColumns[] = FaartfacPeer::FECDESC;
    }

	} 
	
	public function setHordesc($v)
	{

    if ($this->hordesc !== $v) {
        $this->hordesc = $v;
        $this->modifiedColumns[] = FaartfacPeer::HORDESC;
      }
  
	} 
	
	public function setKgent($v)
	{

    if ($this->kgent !== $v) {
        $this->kgent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::KGENT;
      }
  
	} 
	
	public function setDifkg($v)
	{

    if ($this->difkg !== $v) {
        $this->difkg = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::DIFKG;
      }
  
	} 
	
	public function setCajasent($v)
	{

    if ($this->cajasent !== $v) {
        $this->cajasent = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::CAJASENT;
      }
  
	} 
	
	public function setDifcaj($v)
	{

    if ($this->difcaj !== $v) {
        $this->difcaj = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::DIFCAJ;
      }
  
	} 
	
	public function setTment($v)
	{

    if ($this->tment !== $v) {
        $this->tment = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::TMENT;
      }
  
	} 
	
	public function setDifton($v)
	{

    if ($this->difton !== $v) {
        $this->difton = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FaartfacPeer::DIFTON;
      }
  
	} 
	
	public function setIer($v)
	{

    if ($this->ier !== $v) {
        $this->ier = $v;
        $this->modifiedColumns[] = FaartfacPeer::IER;
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

      $this->candes = $rs->getFloat($startcol + 10);

      $this->nronot = $rs->getString($startcol + 11);

      $this->orddespacho = $rs->getString($startcol + 12);

      $this->guia = $rs->getString($startcol + 13);

      $this->contenedores = $rs->getString($startcol + 14);

      $this->billleading = $rs->getString($startcol + 15);

      $this->placa = $rs->getString($startcol + 16);

      $this->rifpro = $rs->getString($startcol + 17);

      $this->fecsal = $rs->getTimestamp($startcol + 18, null);

      $this->horsal = $rs->getString($startcol + 19);

      $this->feclleg = $rs->getTimestamp($startcol + 20, null);

      $this->horlleg = $rs->getString($startcol + 21);

      $this->codprod = $rs->getString($startcol + 22);

      $this->kg = $rs->getFloat($startcol + 23);

      $this->cajas = $rs->getFloat($startcol + 24);

      $this->estatus = $rs->getString($startcol + 25);

      $this->observaciones = $rs->getString($startcol + 26);

      $this->tm = $rs->getFloat($startcol + 27);

      $this->preaju = $rs->getFloat($startcol + 28);

      $this->cedrif = $rs->getString($startcol + 29);

      $this->notentdig = $rs->getString($startcol + 30);

      $this->tipov = $rs->getString($startcol + 31);

      $this->fecllca = $rs->getTimestamp($startcol + 32, null);

      $this->horllca = $rs->getString($startcol + 33);

      $this->fecdesc = $rs->getTimestamp($startcol + 34, null);

      $this->hordesc = $rs->getString($startcol + 35);

      $this->kgent = $rs->getFloat($startcol + 36);

      $this->difkg = $rs->getFloat($startcol + 37);

      $this->cajasent = $rs->getFloat($startcol + 38);

      $this->difcaj = $rs->getFloat($startcol + 39);

      $this->tment = $rs->getFloat($startcol + 40);

      $this->difton = $rs->getFloat($startcol + 41);

      $this->ier = $rs->getString($startcol + 42);

      $this->id = $rs->getInt($startcol + 43);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 44; 
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
				return $this->getPlaca();
				break;
			case 17:
				return $this->getRifpro();
				break;
			case 18:
				return $this->getFecsal();
				break;
			case 19:
				return $this->getHorsal();
				break;
			case 20:
				return $this->getFeclleg();
				break;
			case 21:
				return $this->getHorlleg();
				break;
			case 22:
				return $this->getCodprod();
				break;
			case 23:
				return $this->getKg();
				break;
			case 24:
				return $this->getCajas();
				break;
			case 25:
				return $this->getEstatus();
				break;
			case 26:
				return $this->getObservaciones();
				break;
			case 27:
				return $this->getTm();
				break;
			case 28:
				return $this->getPreaju();
				break;
			case 29:
				return $this->getCedrif();
				break;
			case 30:
				return $this->getNotentdig();
				break;
			case 31:
				return $this->getTipov();
				break;
			case 32:
				return $this->getFecllca();
				break;
			case 33:
				return $this->getHorllca();
				break;
			case 34:
				return $this->getFecdesc();
				break;
			case 35:
				return $this->getHordesc();
				break;
			case 36:
				return $this->getKgent();
				break;
			case 37:
				return $this->getDifkg();
				break;
			case 38:
				return $this->getCajasent();
				break;
			case 39:
				return $this->getDifcaj();
				break;
			case 40:
				return $this->getTment();
				break;
			case 41:
				return $this->getDifton();
				break;
			case 42:
				return $this->getIer();
				break;
			case 43:
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
			$keys[10] => $this->getCandes(),
			$keys[11] => $this->getNronot(),
			$keys[12] => $this->getOrddespacho(),
			$keys[13] => $this->getGuia(),
			$keys[14] => $this->getContenedores(),
			$keys[15] => $this->getBillleading(),
			$keys[16] => $this->getPlaca(),
			$keys[17] => $this->getRifpro(),
			$keys[18] => $this->getFecsal(),
			$keys[19] => $this->getHorsal(),
			$keys[20] => $this->getFeclleg(),
			$keys[21] => $this->getHorlleg(),
			$keys[22] => $this->getCodprod(),
			$keys[23] => $this->getKg(),
			$keys[24] => $this->getCajas(),
			$keys[25] => $this->getEstatus(),
			$keys[26] => $this->getObservaciones(),
			$keys[27] => $this->getTm(),
			$keys[28] => $this->getPreaju(),
			$keys[29] => $this->getCedrif(),
			$keys[30] => $this->getNotentdig(),
			$keys[31] => $this->getTipov(),
			$keys[32] => $this->getFecllca(),
			$keys[33] => $this->getHorllca(),
			$keys[34] => $this->getFecdesc(),
			$keys[35] => $this->getHordesc(),
			$keys[36] => $this->getKgent(),
			$keys[37] => $this->getDifkg(),
			$keys[38] => $this->getCajasent(),
			$keys[39] => $this->getDifcaj(),
			$keys[40] => $this->getTment(),
			$keys[41] => $this->getDifton(),
			$keys[42] => $this->getIer(),
			$keys[43] => $this->getId(),
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
				$this->setPlaca($value);
				break;
			case 17:
				$this->setRifpro($value);
				break;
			case 18:
				$this->setFecsal($value);
				break;
			case 19:
				$this->setHorsal($value);
				break;
			case 20:
				$this->setFeclleg($value);
				break;
			case 21:
				$this->setHorlleg($value);
				break;
			case 22:
				$this->setCodprod($value);
				break;
			case 23:
				$this->setKg($value);
				break;
			case 24:
				$this->setCajas($value);
				break;
			case 25:
				$this->setEstatus($value);
				break;
			case 26:
				$this->setObservaciones($value);
				break;
			case 27:
				$this->setTm($value);
				break;
			case 28:
				$this->setPreaju($value);
				break;
			case 29:
				$this->setCedrif($value);
				break;
			case 30:
				$this->setNotentdig($value);
				break;
			case 31:
				$this->setTipov($value);
				break;
			case 32:
				$this->setFecllca($value);
				break;
			case 33:
				$this->setHorllca($value);
				break;
			case 34:
				$this->setFecdesc($value);
				break;
			case 35:
				$this->setHordesc($value);
				break;
			case 36:
				$this->setKgent($value);
				break;
			case 37:
				$this->setDifkg($value);
				break;
			case 38:
				$this->setCajasent($value);
				break;
			case 39:
				$this->setDifcaj($value);
				break;
			case 40:
				$this->setTment($value);
				break;
			case 41:
				$this->setDifton($value);
				break;
			case 42:
				$this->setIer($value);
				break;
			case 43:
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
		if (array_key_exists($keys[10], $arr)) $this->setCandes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNronot($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setOrddespacho($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGuia($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setContenedores($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setBillleading($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPlaca($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRifpro($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFecsal($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setHorsal($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFeclleg($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setHorlleg($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodprod($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setKg($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCajas($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setEstatus($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setObservaciones($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setTm($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setPreaju($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCedrif($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNotentdig($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTipov($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFecllca($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setHorllca($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setFecdesc($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setHordesc($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setKgent($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setDifkg($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCajasent($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setDifcaj($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setTment($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setDifton($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setIer($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setId($arr[$keys[43]]);
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
		if ($this->isColumnModified(FaartfacPeer::CANDES)) $criteria->add(FaartfacPeer::CANDES, $this->candes);
		if ($this->isColumnModified(FaartfacPeer::NRONOT)) $criteria->add(FaartfacPeer::NRONOT, $this->nronot);
		if ($this->isColumnModified(FaartfacPeer::ORDDESPACHO)) $criteria->add(FaartfacPeer::ORDDESPACHO, $this->orddespacho);
		if ($this->isColumnModified(FaartfacPeer::GUIA)) $criteria->add(FaartfacPeer::GUIA, $this->guia);
		if ($this->isColumnModified(FaartfacPeer::CONTENEDORES)) $criteria->add(FaartfacPeer::CONTENEDORES, $this->contenedores);
		if ($this->isColumnModified(FaartfacPeer::BILLLEADING)) $criteria->add(FaartfacPeer::BILLLEADING, $this->billleading);
		if ($this->isColumnModified(FaartfacPeer::PLACA)) $criteria->add(FaartfacPeer::PLACA, $this->placa);
		if ($this->isColumnModified(FaartfacPeer::RIFPRO)) $criteria->add(FaartfacPeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(FaartfacPeer::FECSAL)) $criteria->add(FaartfacPeer::FECSAL, $this->fecsal);
		if ($this->isColumnModified(FaartfacPeer::HORSAL)) $criteria->add(FaartfacPeer::HORSAL, $this->horsal);
		if ($this->isColumnModified(FaartfacPeer::FECLLEG)) $criteria->add(FaartfacPeer::FECLLEG, $this->feclleg);
		if ($this->isColumnModified(FaartfacPeer::HORLLEG)) $criteria->add(FaartfacPeer::HORLLEG, $this->horlleg);
		if ($this->isColumnModified(FaartfacPeer::CODPROD)) $criteria->add(FaartfacPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(FaartfacPeer::KG)) $criteria->add(FaartfacPeer::KG, $this->kg);
		if ($this->isColumnModified(FaartfacPeer::CAJAS)) $criteria->add(FaartfacPeer::CAJAS, $this->cajas);
		if ($this->isColumnModified(FaartfacPeer::ESTATUS)) $criteria->add(FaartfacPeer::ESTATUS, $this->estatus);
		if ($this->isColumnModified(FaartfacPeer::OBSERVACIONES)) $criteria->add(FaartfacPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(FaartfacPeer::TM)) $criteria->add(FaartfacPeer::TM, $this->tm);
		if ($this->isColumnModified(FaartfacPeer::PREAJU)) $criteria->add(FaartfacPeer::PREAJU, $this->preaju);
		if ($this->isColumnModified(FaartfacPeer::CEDRIF)) $criteria->add(FaartfacPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(FaartfacPeer::NOTENTDIG)) $criteria->add(FaartfacPeer::NOTENTDIG, $this->notentdig);
		if ($this->isColumnModified(FaartfacPeer::TIPOV)) $criteria->add(FaartfacPeer::TIPOV, $this->tipov);
		if ($this->isColumnModified(FaartfacPeer::FECLLCA)) $criteria->add(FaartfacPeer::FECLLCA, $this->fecllca);
		if ($this->isColumnModified(FaartfacPeer::HORLLCA)) $criteria->add(FaartfacPeer::HORLLCA, $this->horllca);
		if ($this->isColumnModified(FaartfacPeer::FECDESC)) $criteria->add(FaartfacPeer::FECDESC, $this->fecdesc);
		if ($this->isColumnModified(FaartfacPeer::HORDESC)) $criteria->add(FaartfacPeer::HORDESC, $this->hordesc);
		if ($this->isColumnModified(FaartfacPeer::KGENT)) $criteria->add(FaartfacPeer::KGENT, $this->kgent);
		if ($this->isColumnModified(FaartfacPeer::DIFKG)) $criteria->add(FaartfacPeer::DIFKG, $this->difkg);
		if ($this->isColumnModified(FaartfacPeer::CAJASENT)) $criteria->add(FaartfacPeer::CAJASENT, $this->cajasent);
		if ($this->isColumnModified(FaartfacPeer::DIFCAJ)) $criteria->add(FaartfacPeer::DIFCAJ, $this->difcaj);
		if ($this->isColumnModified(FaartfacPeer::TMENT)) $criteria->add(FaartfacPeer::TMENT, $this->tment);
		if ($this->isColumnModified(FaartfacPeer::DIFTON)) $criteria->add(FaartfacPeer::DIFTON, $this->difton);
		if ($this->isColumnModified(FaartfacPeer::IER)) $criteria->add(FaartfacPeer::IER, $this->ier);
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

		$copyObj->setCandes($this->candes);

		$copyObj->setNronot($this->nronot);

		$copyObj->setOrddespacho($this->orddespacho);

		$copyObj->setGuia($this->guia);

		$copyObj->setContenedores($this->contenedores);

		$copyObj->setBillleading($this->billleading);

		$copyObj->setPlaca($this->placa);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setFecsal($this->fecsal);

		$copyObj->setHorsal($this->horsal);

		$copyObj->setFeclleg($this->feclleg);

		$copyObj->setHorlleg($this->horlleg);

		$copyObj->setCodprod($this->codprod);

		$copyObj->setKg($this->kg);

		$copyObj->setCajas($this->cajas);

		$copyObj->setEstatus($this->estatus);

		$copyObj->setObservaciones($this->observaciones);

		$copyObj->setTm($this->tm);

		$copyObj->setPreaju($this->preaju);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setNotentdig($this->notentdig);

		$copyObj->setTipov($this->tipov);

		$copyObj->setFecllca($this->fecllca);

		$copyObj->setHorllca($this->horllca);

		$copyObj->setFecdesc($this->fecdesc);

		$copyObj->setHordesc($this->hordesc);

		$copyObj->setKgent($this->kgent);

		$copyObj->setDifkg($this->difkg);

		$copyObj->setCajasent($this->cajasent);

		$copyObj->setDifcaj($this->difcaj);

		$copyObj->setTment($this->tment);

		$copyObj->setDifton($this->difton);

		$copyObj->setIer($this->ier);


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
