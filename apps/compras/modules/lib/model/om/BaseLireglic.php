<?php


abstract class BaseLireglic extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codlic;


	
	protected $deslic;


	
	protected $litiplic_id;


	
	protected $lisicact_id;


	
	protected $fecreg;


	
	protected $fecedi;


	
	protected $liregsol_id;


	
	protected $plamodifi;


	
	protected $plaaclara;


	
	protected $plaprorro;


	
	protected $fecdisdes;


	
	protected $fecdishas;


	
	protected $costo;


	
	protected $forpag;


	
	protected $decretos;


	
	protected $dirret;


	
	protected $percontac;


	
	protected $horaret;


	
	protected $periodico;


	
	protected $fecpub;


	
	protected $pagina;


	
	protected $cuerpo;


	
	protected $mes;


	
	protected $codpaiefec;


	
	protected $codpairecep;


	
	protected $codfin;


	
	protected $fecofer;


	
	protected $horaofer;


	
	protected $dirofer;


	
	protected $percontacofer;


	
	protected $codclacomp;


	
	protected $observaciones;


	
	protected $id;

	
	protected $aLitiplic;

	
	protected $aLisicact;

	
	protected $aLiregsol;

	
	protected $collLiemppars;

	
	protected $lastLiempparCriteria = null;

	
	protected $collLiempofes;

	
	protected $lastLiempofeCriteria = null;

	
	protected $collLioferpres;

	
	protected $lastLioferpreCriteria = null;

	
	protected $collLiasplegcrievas;

	
	protected $lastLiasplegcrievaCriteria = null;

	
	protected $collLiasptecanaliss;

	
	protected $lastLiasptecanalisCriteria = null;

	
	protected $collLiaspfinanaliss;

	
	protected $lastLiaspfinanalisCriteria = null;

	
	protected $collLicalvans;

	
	protected $lastLicalvanCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodlic()
  {

    return trim($this->codlic);

  }
  
  public function getDeslic()
  {

    return trim($this->deslic);

  }
  
  public function getLitiplicId()
  {

    return $this->litiplic_id;

  }
  
  public function getLisicactId()
  {

    return $this->lisicact_id;

  }
  
  public function getFecreg($format = 'Y-m-d')
  {

    if ($this->fecreg === null || $this->fecreg === '') {
      return null;
    } elseif (!is_int($this->fecreg)) {
            $ts = adodb_strtotime($this->fecreg);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
      }
    } else {
      $ts = $this->fecreg;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecedi($format = 'Y-m-d')
  {

    if ($this->fecedi === null || $this->fecedi === '') {
      return null;
    } elseif (!is_int($this->fecedi)) {
            $ts = adodb_strtotime($this->fecedi);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecedi] as date/time value: " . var_export($this->fecedi, true));
      }
    } else {
      $ts = $this->fecedi;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getLiregsolId()
  {

    return $this->liregsol_id;

  }
  
  public function getPlamodifi()
  {

    return $this->plamodifi;

  }
  
  public function getPlaaclara()
  {

    return $this->plaaclara;

  }
  
  public function getPlaprorro()
  {

    return $this->plaprorro;

  }
  
  public function getFecdisdes($format = 'Y-m-d')
  {

    if ($this->fecdisdes === null || $this->fecdisdes === '') {
      return null;
    } elseif (!is_int($this->fecdisdes)) {
            $ts = adodb_strtotime($this->fecdisdes);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdisdes] as date/time value: " . var_export($this->fecdisdes, true));
      }
    } else {
      $ts = $this->fecdisdes;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecdishas($format = 'Y-m-d')
  {

    if ($this->fecdishas === null || $this->fecdishas === '') {
      return null;
    } elseif (!is_int($this->fecdishas)) {
            $ts = adodb_strtotime($this->fecdishas);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdishas] as date/time value: " . var_export($this->fecdishas, true));
      }
    } else {
      $ts = $this->fecdishas;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCosto($val=false)
  {

    if($val) return number_format($this->costo,2,',','.');
    else return $this->costo;

  }
  
  public function getForpag()
  {

    return trim($this->forpag);

  }
  
  public function getDecretos()
  {

    return trim($this->decretos);

  }
  
  public function getDirret()
  {

    return trim($this->dirret);

  }
  
  public function getPercontac()
  {

    return trim($this->percontac);

  }
  
  public function getHoraret()
  {

    return trim($this->horaret);

  }
  
  public function getPeriodico()
  {

    return trim($this->periodico);

  }
  
  public function getFecpub($format = 'Y-m-d')
  {

    if ($this->fecpub === null || $this->fecpub === '') {
      return null;
    } elseif (!is_int($this->fecpub)) {
            $ts = adodb_strtotime($this->fecpub);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecpub] as date/time value: " . var_export($this->fecpub, true));
      }
    } else {
      $ts = $this->fecpub;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPagina()
  {

    return trim($this->pagina);

  }
  
  public function getCuerpo()
  {

    return trim($this->cuerpo);

  }
  
  public function getMes()
  {

    return trim($this->mes);

  }
  
  public function getCodpaiefec()
  {

    return trim($this->codpaiefec);

  }
  
  public function getCodpairecep()
  {

    return trim($this->codpairecep);

  }
  
  public function getCodfin()
  {

    return trim($this->codfin);

  }
  
  public function getFecofer($format = 'Y-m-d')
  {

    if ($this->fecofer === null || $this->fecofer === '') {
      return null;
    } elseif (!is_int($this->fecofer)) {
            $ts = adodb_strtotime($this->fecofer);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecofer] as date/time value: " . var_export($this->fecofer, true));
      }
    } else {
      $ts = $this->fecofer;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getHoraofer()
  {

    return trim($this->horaofer);

  }
  
  public function getDirofer()
  {

    return trim($this->dirofer);

  }
  
  public function getPercontacofer()
  {

    return trim($this->percontacofer);

  }
  
  public function getCodclacomp()
  {

    return trim($this->codclacomp);

  }
  
  public function getObservaciones()
  {

    return trim($this->observaciones);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodlic($v)
	{

    if ($this->codlic !== $v) {
        $this->codlic = $v;
        $this->modifiedColumns[] = LireglicPeer::CODLIC;
      }
  
	} 
	
	public function setDeslic($v)
	{

    if ($this->deslic !== $v) {
        $this->deslic = $v;
        $this->modifiedColumns[] = LireglicPeer::DESLIC;
      }
  
	} 
	
	public function setLitiplicId($v)
	{

    if ($this->litiplic_id !== $v) {
        $this->litiplic_id = $v;
        $this->modifiedColumns[] = LireglicPeer::LITIPLIC_ID;
      }
  
		if ($this->aLitiplic !== null && $this->aLitiplic->getId() !== $v) {
			$this->aLitiplic = null;
		}

	} 
	
	public function setLisicactId($v)
	{

    if ($this->lisicact_id !== $v) {
        $this->lisicact_id = $v;
        $this->modifiedColumns[] = LireglicPeer::LISICACT_ID;
      }
  
		if ($this->aLisicact !== null && $this->aLisicact->getId() !== $v) {
			$this->aLisicact = null;
		}

	} 
	
	public function setFecreg($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecreg !== $ts) {
      $this->fecreg = $ts;
      $this->modifiedColumns[] = LireglicPeer::FECREG;
    }

	} 
	
	public function setFecedi($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecedi] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecedi !== $ts) {
      $this->fecedi = $ts;
      $this->modifiedColumns[] = LireglicPeer::FECEDI;
    }

	} 
	
	public function setLiregsolId($v)
	{

    if ($this->liregsol_id !== $v) {
        $this->liregsol_id = $v;
        $this->modifiedColumns[] = LireglicPeer::LIREGSOL_ID;
      }
  
		if ($this->aLiregsol !== null && $this->aLiregsol->getId() !== $v) {
			$this->aLiregsol = null;
		}

	} 
	
	public function setPlamodifi($v)
	{

    if ($this->plamodifi !== $v) {
        $this->plamodifi = $v;
        $this->modifiedColumns[] = LireglicPeer::PLAMODIFI;
      }
  
	} 
	
	public function setPlaaclara($v)
	{

    if ($this->plaaclara !== $v) {
        $this->plaaclara = $v;
        $this->modifiedColumns[] = LireglicPeer::PLAACLARA;
      }
  
	} 
	
	public function setPlaprorro($v)
	{

    if ($this->plaprorro !== $v) {
        $this->plaprorro = $v;
        $this->modifiedColumns[] = LireglicPeer::PLAPRORRO;
      }
  
	} 
	
	public function setFecdisdes($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdisdes] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdisdes !== $ts) {
      $this->fecdisdes = $ts;
      $this->modifiedColumns[] = LireglicPeer::FECDISDES;
    }

	} 
	
	public function setFecdishas($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdishas] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdishas !== $ts) {
      $this->fecdishas = $ts;
      $this->modifiedColumns[] = LireglicPeer::FECDISHAS;
    }

	} 
	
	public function setCosto($v)
	{

    if ($this->costo !== $v) {
        $this->costo = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LireglicPeer::COSTO;
      }
  
	} 
	
	public function setForpag($v)
	{

    if ($this->forpag !== $v) {
        $this->forpag = $v;
        $this->modifiedColumns[] = LireglicPeer::FORPAG;
      }
  
	} 
	
	public function setDecretos($v)
	{

    if ($this->decretos !== $v) {
        $this->decretos = $v;
        $this->modifiedColumns[] = LireglicPeer::DECRETOS;
      }
  
	} 
	
	public function setDirret($v)
	{

    if ($this->dirret !== $v) {
        $this->dirret = $v;
        $this->modifiedColumns[] = LireglicPeer::DIRRET;
      }
  
	} 
	
	public function setPercontac($v)
	{

    if ($this->percontac !== $v) {
        $this->percontac = $v;
        $this->modifiedColumns[] = LireglicPeer::PERCONTAC;
      }
  
	} 
	
	public function setHoraret($v)
	{

    if ($this->horaret !== $v) {
        $this->horaret = $v;
        $this->modifiedColumns[] = LireglicPeer::HORARET;
      }
  
	} 
	
	public function setPeriodico($v)
	{

    if ($this->periodico !== $v) {
        $this->periodico = $v;
        $this->modifiedColumns[] = LireglicPeer::PERIODICO;
      }
  
	} 
	
	public function setFecpub($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecpub] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecpub !== $ts) {
      $this->fecpub = $ts;
      $this->modifiedColumns[] = LireglicPeer::FECPUB;
    }

	} 
	
	public function setPagina($v)
	{

    if ($this->pagina !== $v) {
        $this->pagina = $v;
        $this->modifiedColumns[] = LireglicPeer::PAGINA;
      }
  
	} 
	
	public function setCuerpo($v)
	{

    if ($this->cuerpo !== $v) {
        $this->cuerpo = $v;
        $this->modifiedColumns[] = LireglicPeer::CUERPO;
      }
  
	} 
	
	public function setMes($v)
	{

    if ($this->mes !== $v) {
        $this->mes = $v;
        $this->modifiedColumns[] = LireglicPeer::MES;
      }
  
	} 
	
	public function setCodpaiefec($v)
	{

    if ($this->codpaiefec !== $v) {
        $this->codpaiefec = $v;
        $this->modifiedColumns[] = LireglicPeer::CODPAIEFEC;
      }
  
	} 
	
	public function setCodpairecep($v)
	{

    if ($this->codpairecep !== $v) {
        $this->codpairecep = $v;
        $this->modifiedColumns[] = LireglicPeer::CODPAIRECEP;
      }
  
	} 
	
	public function setCodfin($v)
	{

    if ($this->codfin !== $v) {
        $this->codfin = $v;
        $this->modifiedColumns[] = LireglicPeer::CODFIN;
      }
  
	} 
	
	public function setFecofer($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecofer] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecofer !== $ts) {
      $this->fecofer = $ts;
      $this->modifiedColumns[] = LireglicPeer::FECOFER;
    }

	} 
	
	public function setHoraofer($v)
	{

    if ($this->horaofer !== $v) {
        $this->horaofer = $v;
        $this->modifiedColumns[] = LireglicPeer::HORAOFER;
      }
  
	} 
	
	public function setDirofer($v)
	{

    if ($this->dirofer !== $v) {
        $this->dirofer = $v;
        $this->modifiedColumns[] = LireglicPeer::DIROFER;
      }
  
	} 
	
	public function setPercontacofer($v)
	{

    if ($this->percontacofer !== $v) {
        $this->percontacofer = $v;
        $this->modifiedColumns[] = LireglicPeer::PERCONTACOFER;
      }
  
	} 
	
	public function setCodclacomp($v)
	{

    if ($this->codclacomp !== $v) {
        $this->codclacomp = $v;
        $this->modifiedColumns[] = LireglicPeer::CODCLACOMP;
      }
  
	} 
	
	public function setObservaciones($v)
	{

    if ($this->observaciones !== $v) {
        $this->observaciones = $v;
        $this->modifiedColumns[] = LireglicPeer::OBSERVACIONES;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LireglicPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codlic = $rs->getString($startcol + 0);

      $this->deslic = $rs->getString($startcol + 1);

      $this->litiplic_id = $rs->getInt($startcol + 2);

      $this->lisicact_id = $rs->getInt($startcol + 3);

      $this->fecreg = $rs->getDate($startcol + 4, null);

      $this->fecedi = $rs->getDate($startcol + 5, null);

      $this->liregsol_id = $rs->getInt($startcol + 6);

      $this->plamodifi = $rs->getInt($startcol + 7);

      $this->plaaclara = $rs->getInt($startcol + 8);

      $this->plaprorro = $rs->getInt($startcol + 9);

      $this->fecdisdes = $rs->getDate($startcol + 10, null);

      $this->fecdishas = $rs->getDate($startcol + 11, null);

      $this->costo = $rs->getFloat($startcol + 12);

      $this->forpag = $rs->getString($startcol + 13);

      $this->decretos = $rs->getString($startcol + 14);

      $this->dirret = $rs->getString($startcol + 15);

      $this->percontac = $rs->getString($startcol + 16);

      $this->horaret = $rs->getString($startcol + 17);

      $this->periodico = $rs->getString($startcol + 18);

      $this->fecpub = $rs->getDate($startcol + 19, null);

      $this->pagina = $rs->getString($startcol + 20);

      $this->cuerpo = $rs->getString($startcol + 21);

      $this->mes = $rs->getString($startcol + 22);

      $this->codpaiefec = $rs->getString($startcol + 23);

      $this->codpairecep = $rs->getString($startcol + 24);

      $this->codfin = $rs->getString($startcol + 25);

      $this->fecofer = $rs->getDate($startcol + 26, null);

      $this->horaofer = $rs->getString($startcol + 27);

      $this->dirofer = $rs->getString($startcol + 28);

      $this->percontacofer = $rs->getString($startcol + 29);

      $this->codclacomp = $rs->getString($startcol + 30);

      $this->observaciones = $rs->getString($startcol + 31);

      $this->id = $rs->getInt($startcol + 32);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 33; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lireglic object", $e);
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
			$con = Propel::getConnection(LireglicPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LireglicPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LireglicPeer::DATABASE_NAME);
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


												
			if ($this->aLitiplic !== null) {
				if ($this->aLitiplic->isModified()) {
					$affectedRows += $this->aLitiplic->save($con);
				}
				$this->setLitiplic($this->aLitiplic);
			}

			if ($this->aLisicact !== null) {
				if ($this->aLisicact->isModified()) {
					$affectedRows += $this->aLisicact->save($con);
				}
				$this->setLisicact($this->aLisicact);
			}

			if ($this->aLiregsol !== null) {
				if ($this->aLiregsol->isModified()) {
					$affectedRows += $this->aLiregsol->save($con);
				}
				$this->setLiregsol($this->aLiregsol);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LireglicPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LireglicPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collLiemppars !== null) {
				foreach($this->collLiemppars as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiempofes !== null) {
				foreach($this->collLiempofes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLioferpres !== null) {
				foreach($this->collLioferpres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiasplegcrievas !== null) {
				foreach($this->collLiasplegcrievas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiasptecanaliss !== null) {
				foreach($this->collLiasptecanaliss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLiaspfinanaliss !== null) {
				foreach($this->collLiaspfinanaliss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLicalvans !== null) {
				foreach($this->collLicalvans as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aLitiplic !== null) {
				if (!$this->aLitiplic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLitiplic->getValidationFailures());
				}
			}

			if ($this->aLisicact !== null) {
				if (!$this->aLisicact->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLisicact->getValidationFailures());
				}
			}

			if ($this->aLiregsol !== null) {
				if (!$this->aLiregsol->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLiregsol->getValidationFailures());
				}
			}


			if (($retval = LireglicPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLiemppars !== null) {
					foreach($this->collLiemppars as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiempofes !== null) {
					foreach($this->collLiempofes as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLioferpres !== null) {
					foreach($this->collLioferpres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiasplegcrievas !== null) {
					foreach($this->collLiasplegcrievas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiasptecanaliss !== null) {
					foreach($this->collLiasptecanaliss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLiaspfinanaliss !== null) {
					foreach($this->collLiaspfinanaliss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLicalvans !== null) {
					foreach($this->collLicalvans as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LireglicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodlic();
				break;
			case 1:
				return $this->getDeslic();
				break;
			case 2:
				return $this->getLitiplicId();
				break;
			case 3:
				return $this->getLisicactId();
				break;
			case 4:
				return $this->getFecreg();
				break;
			case 5:
				return $this->getFecedi();
				break;
			case 6:
				return $this->getLiregsolId();
				break;
			case 7:
				return $this->getPlamodifi();
				break;
			case 8:
				return $this->getPlaaclara();
				break;
			case 9:
				return $this->getPlaprorro();
				break;
			case 10:
				return $this->getFecdisdes();
				break;
			case 11:
				return $this->getFecdishas();
				break;
			case 12:
				return $this->getCosto();
				break;
			case 13:
				return $this->getForpag();
				break;
			case 14:
				return $this->getDecretos();
				break;
			case 15:
				return $this->getDirret();
				break;
			case 16:
				return $this->getPercontac();
				break;
			case 17:
				return $this->getHoraret();
				break;
			case 18:
				return $this->getPeriodico();
				break;
			case 19:
				return $this->getFecpub();
				break;
			case 20:
				return $this->getPagina();
				break;
			case 21:
				return $this->getCuerpo();
				break;
			case 22:
				return $this->getMes();
				break;
			case 23:
				return $this->getCodpaiefec();
				break;
			case 24:
				return $this->getCodpairecep();
				break;
			case 25:
				return $this->getCodfin();
				break;
			case 26:
				return $this->getFecofer();
				break;
			case 27:
				return $this->getHoraofer();
				break;
			case 28:
				return $this->getDirofer();
				break;
			case 29:
				return $this->getPercontacofer();
				break;
			case 30:
				return $this->getCodclacomp();
				break;
			case 31:
				return $this->getObservaciones();
				break;
			case 32:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LireglicPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodlic(),
			$keys[1] => $this->getDeslic(),
			$keys[2] => $this->getLitiplicId(),
			$keys[3] => $this->getLisicactId(),
			$keys[4] => $this->getFecreg(),
			$keys[5] => $this->getFecedi(),
			$keys[6] => $this->getLiregsolId(),
			$keys[7] => $this->getPlamodifi(),
			$keys[8] => $this->getPlaaclara(),
			$keys[9] => $this->getPlaprorro(),
			$keys[10] => $this->getFecdisdes(),
			$keys[11] => $this->getFecdishas(),
			$keys[12] => $this->getCosto(),
			$keys[13] => $this->getForpag(),
			$keys[14] => $this->getDecretos(),
			$keys[15] => $this->getDirret(),
			$keys[16] => $this->getPercontac(),
			$keys[17] => $this->getHoraret(),
			$keys[18] => $this->getPeriodico(),
			$keys[19] => $this->getFecpub(),
			$keys[20] => $this->getPagina(),
			$keys[21] => $this->getCuerpo(),
			$keys[22] => $this->getMes(),
			$keys[23] => $this->getCodpaiefec(),
			$keys[24] => $this->getCodpairecep(),
			$keys[25] => $this->getCodfin(),
			$keys[26] => $this->getFecofer(),
			$keys[27] => $this->getHoraofer(),
			$keys[28] => $this->getDirofer(),
			$keys[29] => $this->getPercontacofer(),
			$keys[30] => $this->getCodclacomp(),
			$keys[31] => $this->getObservaciones(),
			$keys[32] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LireglicPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodlic($value);
				break;
			case 1:
				$this->setDeslic($value);
				break;
			case 2:
				$this->setLitiplicId($value);
				break;
			case 3:
				$this->setLisicactId($value);
				break;
			case 4:
				$this->setFecreg($value);
				break;
			case 5:
				$this->setFecedi($value);
				break;
			case 6:
				$this->setLiregsolId($value);
				break;
			case 7:
				$this->setPlamodifi($value);
				break;
			case 8:
				$this->setPlaaclara($value);
				break;
			case 9:
				$this->setPlaprorro($value);
				break;
			case 10:
				$this->setFecdisdes($value);
				break;
			case 11:
				$this->setFecdishas($value);
				break;
			case 12:
				$this->setCosto($value);
				break;
			case 13:
				$this->setForpag($value);
				break;
			case 14:
				$this->setDecretos($value);
				break;
			case 15:
				$this->setDirret($value);
				break;
			case 16:
				$this->setPercontac($value);
				break;
			case 17:
				$this->setHoraret($value);
				break;
			case 18:
				$this->setPeriodico($value);
				break;
			case 19:
				$this->setFecpub($value);
				break;
			case 20:
				$this->setPagina($value);
				break;
			case 21:
				$this->setCuerpo($value);
				break;
			case 22:
				$this->setMes($value);
				break;
			case 23:
				$this->setCodpaiefec($value);
				break;
			case 24:
				$this->setCodpairecep($value);
				break;
			case 25:
				$this->setCodfin($value);
				break;
			case 26:
				$this->setFecofer($value);
				break;
			case 27:
				$this->setHoraofer($value);
				break;
			case 28:
				$this->setDirofer($value);
				break;
			case 29:
				$this->setPercontacofer($value);
				break;
			case 30:
				$this->setCodclacomp($value);
				break;
			case 31:
				$this->setObservaciones($value);
				break;
			case 32:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LireglicPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodlic($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDeslic($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLitiplicId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLisicactId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecedi($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLiregsolId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPlamodifi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPlaaclara($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPlaprorro($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecdisdes($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecdishas($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCosto($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setForpag($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDecretos($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDirret($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setPercontac($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setHoraret($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPeriodico($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecpub($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setPagina($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCuerpo($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setMes($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodpaiefec($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodpairecep($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodfin($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFecofer($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setHoraofer($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDirofer($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setPercontacofer($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodclacomp($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setObservaciones($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setId($arr[$keys[32]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LireglicPeer::DATABASE_NAME);

		if ($this->isColumnModified(LireglicPeer::CODLIC)) $criteria->add(LireglicPeer::CODLIC, $this->codlic);
		if ($this->isColumnModified(LireglicPeer::DESLIC)) $criteria->add(LireglicPeer::DESLIC, $this->deslic);
		if ($this->isColumnModified(LireglicPeer::LITIPLIC_ID)) $criteria->add(LireglicPeer::LITIPLIC_ID, $this->litiplic_id);
		if ($this->isColumnModified(LireglicPeer::LISICACT_ID)) $criteria->add(LireglicPeer::LISICACT_ID, $this->lisicact_id);
		if ($this->isColumnModified(LireglicPeer::FECREG)) $criteria->add(LireglicPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(LireglicPeer::FECEDI)) $criteria->add(LireglicPeer::FECEDI, $this->fecedi);
		if ($this->isColumnModified(LireglicPeer::LIREGSOL_ID)) $criteria->add(LireglicPeer::LIREGSOL_ID, $this->liregsol_id);
		if ($this->isColumnModified(LireglicPeer::PLAMODIFI)) $criteria->add(LireglicPeer::PLAMODIFI, $this->plamodifi);
		if ($this->isColumnModified(LireglicPeer::PLAACLARA)) $criteria->add(LireglicPeer::PLAACLARA, $this->plaaclara);
		if ($this->isColumnModified(LireglicPeer::PLAPRORRO)) $criteria->add(LireglicPeer::PLAPRORRO, $this->plaprorro);
		if ($this->isColumnModified(LireglicPeer::FECDISDES)) $criteria->add(LireglicPeer::FECDISDES, $this->fecdisdes);
		if ($this->isColumnModified(LireglicPeer::FECDISHAS)) $criteria->add(LireglicPeer::FECDISHAS, $this->fecdishas);
		if ($this->isColumnModified(LireglicPeer::COSTO)) $criteria->add(LireglicPeer::COSTO, $this->costo);
		if ($this->isColumnModified(LireglicPeer::FORPAG)) $criteria->add(LireglicPeer::FORPAG, $this->forpag);
		if ($this->isColumnModified(LireglicPeer::DECRETOS)) $criteria->add(LireglicPeer::DECRETOS, $this->decretos);
		if ($this->isColumnModified(LireglicPeer::DIRRET)) $criteria->add(LireglicPeer::DIRRET, $this->dirret);
		if ($this->isColumnModified(LireglicPeer::PERCONTAC)) $criteria->add(LireglicPeer::PERCONTAC, $this->percontac);
		if ($this->isColumnModified(LireglicPeer::HORARET)) $criteria->add(LireglicPeer::HORARET, $this->horaret);
		if ($this->isColumnModified(LireglicPeer::PERIODICO)) $criteria->add(LireglicPeer::PERIODICO, $this->periodico);
		if ($this->isColumnModified(LireglicPeer::FECPUB)) $criteria->add(LireglicPeer::FECPUB, $this->fecpub);
		if ($this->isColumnModified(LireglicPeer::PAGINA)) $criteria->add(LireglicPeer::PAGINA, $this->pagina);
		if ($this->isColumnModified(LireglicPeer::CUERPO)) $criteria->add(LireglicPeer::CUERPO, $this->cuerpo);
		if ($this->isColumnModified(LireglicPeer::MES)) $criteria->add(LireglicPeer::MES, $this->mes);
		if ($this->isColumnModified(LireglicPeer::CODPAIEFEC)) $criteria->add(LireglicPeer::CODPAIEFEC, $this->codpaiefec);
		if ($this->isColumnModified(LireglicPeer::CODPAIRECEP)) $criteria->add(LireglicPeer::CODPAIRECEP, $this->codpairecep);
		if ($this->isColumnModified(LireglicPeer::CODFIN)) $criteria->add(LireglicPeer::CODFIN, $this->codfin);
		if ($this->isColumnModified(LireglicPeer::FECOFER)) $criteria->add(LireglicPeer::FECOFER, $this->fecofer);
		if ($this->isColumnModified(LireglicPeer::HORAOFER)) $criteria->add(LireglicPeer::HORAOFER, $this->horaofer);
		if ($this->isColumnModified(LireglicPeer::DIROFER)) $criteria->add(LireglicPeer::DIROFER, $this->dirofer);
		if ($this->isColumnModified(LireglicPeer::PERCONTACOFER)) $criteria->add(LireglicPeer::PERCONTACOFER, $this->percontacofer);
		if ($this->isColumnModified(LireglicPeer::CODCLACOMP)) $criteria->add(LireglicPeer::CODCLACOMP, $this->codclacomp);
		if ($this->isColumnModified(LireglicPeer::OBSERVACIONES)) $criteria->add(LireglicPeer::OBSERVACIONES, $this->observaciones);
		if ($this->isColumnModified(LireglicPeer::ID)) $criteria->add(LireglicPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LireglicPeer::DATABASE_NAME);

		$criteria->add(LireglicPeer::ID, $this->id);

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

		$copyObj->setCodlic($this->codlic);

		$copyObj->setDeslic($this->deslic);

		$copyObj->setLitiplicId($this->litiplic_id);

		$copyObj->setLisicactId($this->lisicact_id);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFecedi($this->fecedi);

		$copyObj->setLiregsolId($this->liregsol_id);

		$copyObj->setPlamodifi($this->plamodifi);

		$copyObj->setPlaaclara($this->plaaclara);

		$copyObj->setPlaprorro($this->plaprorro);

		$copyObj->setFecdisdes($this->fecdisdes);

		$copyObj->setFecdishas($this->fecdishas);

		$copyObj->setCosto($this->costo);

		$copyObj->setForpag($this->forpag);

		$copyObj->setDecretos($this->decretos);

		$copyObj->setDirret($this->dirret);

		$copyObj->setPercontac($this->percontac);

		$copyObj->setHoraret($this->horaret);

		$copyObj->setPeriodico($this->periodico);

		$copyObj->setFecpub($this->fecpub);

		$copyObj->setPagina($this->pagina);

		$copyObj->setCuerpo($this->cuerpo);

		$copyObj->setMes($this->mes);

		$copyObj->setCodpaiefec($this->codpaiefec);

		$copyObj->setCodpairecep($this->codpairecep);

		$copyObj->setCodfin($this->codfin);

		$copyObj->setFecofer($this->fecofer);

		$copyObj->setHoraofer($this->horaofer);

		$copyObj->setDirofer($this->dirofer);

		$copyObj->setPercontacofer($this->percontacofer);

		$copyObj->setCodclacomp($this->codclacomp);

		$copyObj->setObservaciones($this->observaciones);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getLiemppars() as $relObj) {
				$copyObj->addLiemppar($relObj->copy($deepCopy));
			}

			foreach($this->getLiempofes() as $relObj) {
				$copyObj->addLiempofe($relObj->copy($deepCopy));
			}

			foreach($this->getLioferpres() as $relObj) {
				$copyObj->addLioferpre($relObj->copy($deepCopy));
			}

			foreach($this->getLiasplegcrievas() as $relObj) {
				$copyObj->addLiasplegcrieva($relObj->copy($deepCopy));
			}

			foreach($this->getLiasptecanaliss() as $relObj) {
				$copyObj->addLiasptecanalis($relObj->copy($deepCopy));
			}

			foreach($this->getLiaspfinanaliss() as $relObj) {
				$copyObj->addLiaspfinanalis($relObj->copy($deepCopy));
			}

			foreach($this->getLicalvans() as $relObj) {
				$copyObj->addLicalvan($relObj->copy($deepCopy));
			}

		} 

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
			self::$peer = new LireglicPeer();
		}
		return self::$peer;
	}

	
	public function setLitiplic($v)
	{


		if ($v === null) {
			$this->setLitiplicId(NULL);
		} else {
			$this->setLitiplicId($v->getId());
		}


		$this->aLitiplic = $v;
	}


	
	public function getLitiplic($con = null)
	{
		if ($this->aLitiplic === null && ($this->litiplic_id !== null)) {
						include_once 'lib/model/om/BaseLitiplicPeer.php';

			$this->aLitiplic = LitiplicPeer::retrieveByPK($this->litiplic_id, $con);

			
		}
		return $this->aLitiplic;
	}

	
	public function setLisicact($v)
	{


		if ($v === null) {
			$this->setLisicactId(NULL);
		} else {
			$this->setLisicactId($v->getId());
		}


		$this->aLisicact = $v;
	}


	
	public function getLisicact($con = null)
	{
		if ($this->aLisicact === null && ($this->lisicact_id !== null)) {
						include_once 'lib/model/om/BaseLisicactPeer.php';

			$this->aLisicact = LisicactPeer::retrieveByPK($this->lisicact_id, $con);

			
		}
		return $this->aLisicact;
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

	
	public function initLiemppars()
	{
		if ($this->collLiemppars === null) {
			$this->collLiemppars = array();
		}
	}

	
	public function getLiemppars($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiempparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiemppars === null) {
			if ($this->isNew()) {
			   $this->collLiemppars = array();
			} else {

				$criteria->add(LiempparPeer::LIREGLIC_ID, $this->getId());

				LiempparPeer::addSelectColumns($criteria);
				$this->collLiemppars = LiempparPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiempparPeer::LIREGLIC_ID, $this->getId());

				LiempparPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiempparCriteria) || !$this->lastLiempparCriteria->equals($criteria)) {
					$this->collLiemppars = LiempparPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiempparCriteria = $criteria;
		return $this->collLiemppars;
	}

	
	public function countLiemppars($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiempparPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiempparPeer::LIREGLIC_ID, $this->getId());

		return LiempparPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiemppar(Liemppar $l)
	{
		$this->collLiemppars[] = $l;
		$l->setLireglic($this);
	}

	
	public function initLiempofes()
	{
		if ($this->collLiempofes === null) {
			$this->collLiempofes = array();
		}
	}

	
	public function getLiempofes($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiempofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiempofes === null) {
			if ($this->isNew()) {
			   $this->collLiempofes = array();
			} else {

				$criteria->add(LiempofePeer::LIREGLIC_ID, $this->getId());

				LiempofePeer::addSelectColumns($criteria);
				$this->collLiempofes = LiempofePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiempofePeer::LIREGLIC_ID, $this->getId());

				LiempofePeer::addSelectColumns($criteria);
				if (!isset($this->lastLiempofeCriteria) || !$this->lastLiempofeCriteria->equals($criteria)) {
					$this->collLiempofes = LiempofePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiempofeCriteria = $criteria;
		return $this->collLiempofes;
	}

	
	public function countLiempofes($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiempofePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiempofePeer::LIREGLIC_ID, $this->getId());

		return LiempofePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiempofe(Liempofe $l)
	{
		$this->collLiempofes[] = $l;
		$l->setLireglic($this);
	}

	
	public function initLioferpres()
	{
		if ($this->collLioferpres === null) {
			$this->collLioferpres = array();
		}
	}

	
	public function getLioferpres($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLioferprePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLioferpres === null) {
			if ($this->isNew()) {
			   $this->collLioferpres = array();
			} else {

				$criteria->add(LioferprePeer::LIREGLIC_ID, $this->getId());

				LioferprePeer::addSelectColumns($criteria);
				$this->collLioferpres = LioferprePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LioferprePeer::LIREGLIC_ID, $this->getId());

				LioferprePeer::addSelectColumns($criteria);
				if (!isset($this->lastLioferpreCriteria) || !$this->lastLioferpreCriteria->equals($criteria)) {
					$this->collLioferpres = LioferprePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLioferpreCriteria = $criteria;
		return $this->collLioferpres;
	}

	
	public function countLioferpres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLioferprePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LioferprePeer::LIREGLIC_ID, $this->getId());

		return LioferprePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLioferpre(Lioferpre $l)
	{
		$this->collLioferpres[] = $l;
		$l->setLireglic($this);
	}

	
	public function initLiasplegcrievas()
	{
		if ($this->collLiasplegcrievas === null) {
			$this->collLiasplegcrievas = array();
		}
	}

	
	public function getLiasplegcrievas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasplegcrievaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasplegcrievas === null) {
			if ($this->isNew()) {
			   $this->collLiasplegcrievas = array();
			} else {

				$criteria->add(LiasplegcrievaPeer::LIREGLIC_ID, $this->getId());

				LiasplegcrievaPeer::addSelectColumns($criteria);
				$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiasplegcrievaPeer::LIREGLIC_ID, $this->getId());

				LiasplegcrievaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiasplegcrievaCriteria) || !$this->lastLiasplegcrievaCriteria->equals($criteria)) {
					$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiasplegcrievaCriteria = $criteria;
		return $this->collLiasplegcrievas;
	}

	
	public function countLiasplegcrievas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiasplegcrievaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiasplegcrievaPeer::LIREGLIC_ID, $this->getId());

		return LiasplegcrievaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiasplegcrieva(Liasplegcrieva $l)
	{
		$this->collLiasplegcrievas[] = $l;
		$l->setLireglic($this);
	}


	
	public function getLiasplegcrievasJoinLirecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasplegcrievaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasplegcrievas === null) {
			if ($this->isNew()) {
				$this->collLiasplegcrievas = array();
			} else {

				$criteria->add(LiasplegcrievaPeer::LIREGLIC_ID, $this->getId());

				$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelectJoinLirecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(LiasplegcrievaPeer::LIREGLIC_ID, $this->getId());

			if (!isset($this->lastLiasplegcrievaCriteria) || !$this->lastLiasplegcrievaCriteria->equals($criteria)) {
				$this->collLiasplegcrievas = LiasplegcrievaPeer::doSelectJoinLirecaud($criteria, $con);
			}
		}
		$this->lastLiasplegcrievaCriteria = $criteria;

		return $this->collLiasplegcrievas;
	}

	
	public function initLiasptecanaliss()
	{
		if ($this->collLiasptecanaliss === null) {
			$this->collLiasptecanaliss = array();
		}
	}

	
	public function getLiasptecanaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasptecanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasptecanaliss === null) {
			if ($this->isNew()) {
			   $this->collLiasptecanaliss = array();
			} else {

				$criteria->add(LiasptecanalisPeer::LIREGLIC_ID, $this->getId());

				LiasptecanalisPeer::addSelectColumns($criteria);
				$this->collLiasptecanaliss = LiasptecanalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiasptecanalisPeer::LIREGLIC_ID, $this->getId());

				LiasptecanalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiasptecanalisCriteria) || !$this->lastLiasptecanalisCriteria->equals($criteria)) {
					$this->collLiasptecanaliss = LiasptecanalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiasptecanalisCriteria = $criteria;
		return $this->collLiasptecanaliss;
	}

	
	public function countLiasptecanaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiasptecanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiasptecanalisPeer::LIREGLIC_ID, $this->getId());

		return LiasptecanalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiasptecanalis(Liasptecanalis $l)
	{
		$this->collLiasptecanaliss[] = $l;
		$l->setLireglic($this);
	}


	
	public function getLiasptecanalissJoinLiaspteccrieva($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiasptecanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiasptecanaliss === null) {
			if ($this->isNew()) {
				$this->collLiasptecanaliss = array();
			} else {

				$criteria->add(LiasptecanalisPeer::LIREGLIC_ID, $this->getId());

				$this->collLiasptecanaliss = LiasptecanalisPeer::doSelectJoinLiaspteccrieva($criteria, $con);
			}
		} else {
									
			$criteria->add(LiasptecanalisPeer::LIREGLIC_ID, $this->getId());

			if (!isset($this->lastLiasptecanalisCriteria) || !$this->lastLiasptecanalisCriteria->equals($criteria)) {
				$this->collLiasptecanaliss = LiasptecanalisPeer::doSelectJoinLiaspteccrieva($criteria, $con);
			}
		}
		$this->lastLiasptecanalisCriteria = $criteria;

		return $this->collLiasptecanaliss;
	}

	
	public function initLiaspfinanaliss()
	{
		if ($this->collLiaspfinanaliss === null) {
			$this->collLiaspfinanaliss = array();
		}
	}

	
	public function getLiaspfinanaliss($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiaspfinanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaspfinanaliss === null) {
			if ($this->isNew()) {
			   $this->collLiaspfinanaliss = array();
			} else {

				$criteria->add(LiaspfinanalisPeer::LIREGLIC_ID, $this->getId());

				LiaspfinanalisPeer::addSelectColumns($criteria);
				$this->collLiaspfinanaliss = LiaspfinanalisPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LiaspfinanalisPeer::LIREGLIC_ID, $this->getId());

				LiaspfinanalisPeer::addSelectColumns($criteria);
				if (!isset($this->lastLiaspfinanalisCriteria) || !$this->lastLiaspfinanalisCriteria->equals($criteria)) {
					$this->collLiaspfinanaliss = LiaspfinanalisPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLiaspfinanalisCriteria = $criteria;
		return $this->collLiaspfinanaliss;
	}

	
	public function countLiaspfinanaliss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLiaspfinanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LiaspfinanalisPeer::LIREGLIC_ID, $this->getId());

		return LiaspfinanalisPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLiaspfinanalis(Liaspfinanalis $l)
	{
		$this->collLiaspfinanaliss[] = $l;
		$l->setLireglic($this);
	}


	
	public function getLiaspfinanalissJoinLiaspfincrieva($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLiaspfinanalisPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLiaspfinanaliss === null) {
			if ($this->isNew()) {
				$this->collLiaspfinanaliss = array();
			} else {

				$criteria->add(LiaspfinanalisPeer::LIREGLIC_ID, $this->getId());

				$this->collLiaspfinanaliss = LiaspfinanalisPeer::doSelectJoinLiaspfincrieva($criteria, $con);
			}
		} else {
									
			$criteria->add(LiaspfinanalisPeer::LIREGLIC_ID, $this->getId());

			if (!isset($this->lastLiaspfinanalisCriteria) || !$this->lastLiaspfinanalisCriteria->equals($criteria)) {
				$this->collLiaspfinanaliss = LiaspfinanalisPeer::doSelectJoinLiaspfincrieva($criteria, $con);
			}
		}
		$this->lastLiaspfinanalisCriteria = $criteria;

		return $this->collLiaspfinanaliss;
	}

	
	public function initLicalvans()
	{
		if ($this->collLicalvans === null) {
			$this->collLicalvans = array();
		}
	}

	
	public function getLicalvans($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLicalvanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLicalvans === null) {
			if ($this->isNew()) {
			   $this->collLicalvans = array();
			} else {

				$criteria->add(LicalvanPeer::LIREGLIC_ID, $this->getId());

				LicalvanPeer::addSelectColumns($criteria);
				$this->collLicalvans = LicalvanPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LicalvanPeer::LIREGLIC_ID, $this->getId());

				LicalvanPeer::addSelectColumns($criteria);
				if (!isset($this->lastLicalvanCriteria) || !$this->lastLicalvanCriteria->equals($criteria)) {
					$this->collLicalvans = LicalvanPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLicalvanCriteria = $criteria;
		return $this->collLicalvans;
	}

	
	public function countLicalvans($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLicalvanPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LicalvanPeer::LIREGLIC_ID, $this->getId());

		return LicalvanPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLicalvan(Licalvan $l)
	{
		$this->collLicalvans[] = $l;
		$l->setLireglic($this);
	}

} 