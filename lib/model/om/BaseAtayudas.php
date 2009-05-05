<?php


abstract class BaseAtayudas extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nroexp;


	
	protected $refdoc;


	
	protected $priayu;


	
	protected $atsolici;


	
	protected $atbenefi;


	
	protected $attipayu_id;


	
	protected $atrubros_id;


	
	protected $atestayu_id;


	
	protected $attrasoc_id;


	
	protected $caprovee_id;


	
	protected $proayu;


	
	protected $nroofi;


	
	protected $desayu;


	
	protected $motayu;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $usucre;


	
	protected $usumod;


	
	protected $codpre;


	
	protected $detayu;


	
	protected $monayu;


	
	protected $monapr;


	
	protected $atmedico_id;


	
	protected $respat;


	
	protected $infmed;


	
	protected $obsmed;


	
	protected $fecdiasoc;


	
	protected $usudiasoc;


	
	protected $resdiasoc;


	
	protected $fecvisdoc;


	
	protected $usuvisdoc;


	
	protected $resvisdoc;


	
	protected $fecsol;


	
	protected $id;

	
	protected $aCaordcom;

	
	protected $aAtciudadanoRelatedByAtsolici;

	
	protected $aAtciudadanoRelatedByAtbenefi;

	
	protected $aAttipayu;

	
	protected $aAtrubros;

	
	protected $aAtestayu;

	
	protected $aAttrasoc;

	
	protected $aCaprovee;

	
	protected $aAtmedico;

	
	protected $collAtestsocecos;

	
	protected $lastAtestsocecoCriteria = null;

	
	protected $collAtdetrecayus;

	
	protected $lastAtdetrecayuCriteria = null;

	
	protected $collAtdetayus;

	
	protected $lastAtdetayuCriteria = null;

	
	protected $collAtfacturass;

	
	protected $lastAtfacturasCriteria = null;

	
	protected $collAtdocayus;

	
	protected $lastAtdocayuCriteria = null;

	
	protected $collAtpresupuestos;

	
	protected $lastAtpresupuestoCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNroexp()
  {

    return trim($this->nroexp);

  }
  
  public function getRefdoc()
  {

    return $this->refdoc;

  }
  
  public function getPriayu()
  {

    return $this->priayu;

  }
  
  public function getAtsolici()
  {

    return $this->atsolici;

  }
  
  public function getAtbenefi()
  {

    return $this->atbenefi;

  }
  
  public function getAttipayuId()
  {

    return $this->attipayu_id;

  }
  
  public function getAtrubrosId()
  {

    return $this->atrubros_id;

  }
  
  public function getAtestayuId()
  {

    return $this->atestayu_id;

  }
  
  public function getAttrasocId()
  {

    return $this->attrasoc_id;

  }
  
  public function getCaproveeId()
  {

    return $this->caprovee_id;

  }
  
  public function getProayu()
  {

    return trim($this->proayu);

  }
  
  public function getNroofi()
  {

    return trim($this->nroofi);

  }
  
  public function getDesayu()
  {

    return trim($this->desayu);

  }
  
  public function getMotayu()
  {

    return trim($this->motayu);

  }
  
  public function getCreatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->created_at === null || $this->created_at === '') {
      return null;
    } elseif (!is_int($this->created_at)) {
            $ts = adodb_strtotime($this->created_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
      }
    } else {
      $ts = $this->created_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUpdatedAt($format = 'Y-m-d H:i:s')
  {

    if ($this->updated_at === null || $this->updated_at === '') {
      return null;
    } elseif (!is_int($this->updated_at)) {
            $ts = adodb_strtotime($this->updated_at);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
      }
    } else {
      $ts = $this->updated_at;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsucre()
  {

    return trim($this->usucre);

  }
  
  public function getUsumod()
  {

    return trim($this->usumod);

  }
  
  public function getCodpre()
  {

    return trim($this->codpre);

  }
  
  public function getDetayu()
  {

    return trim($this->detayu);

  }
  
  public function getMonayu($val=false)
  {

    if($val) return number_format($this->monayu,2,',','.');
    else return $this->monayu;

  }
  
  public function getMonapr($val=false)
  {

    if($val) return number_format($this->monapr,2,',','.');
    else return $this->monapr;

  }
  
  public function getAtmedicoId()
  {

    return $this->atmedico_id;

  }
  
  public function getRespat()
  {

    return trim($this->respat);

  }
  
  public function getInfmed()
  {

    return trim($this->infmed);

  }
  
  public function getObsmed()
  {

    return trim($this->obsmed);

  }
  
  public function getFecdiasoc($format = 'Y-m-d')
  {

    if ($this->fecdiasoc === null || $this->fecdiasoc === '') {
      return null;
    } elseif (!is_int($this->fecdiasoc)) {
            $ts = adodb_strtotime($this->fecdiasoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecdiasoc] as date/time value: " . var_export($this->fecdiasoc, true));
      }
    } else {
      $ts = $this->fecdiasoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsudiasoc()
  {

    return trim($this->usudiasoc);

  }
  
  public function getResdiasoc()
  {

    return trim($this->resdiasoc);

  }
  
  public function getFecvisdoc($format = 'Y-m-d')
  {

    if ($this->fecvisdoc === null || $this->fecvisdoc === '') {
      return null;
    } elseif (!is_int($this->fecvisdoc)) {
            $ts = adodb_strtotime($this->fecvisdoc);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvisdoc] as date/time value: " . var_export($this->fecvisdoc, true));
      }
    } else {
      $ts = $this->fecvisdoc;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getUsuvisdoc()
  {

    return trim($this->usuvisdoc);

  }
  
  public function getResvisdoc()
  {

    return trim($this->resvisdoc);

  }
  
  public function getFecsol($format = 'Y-m-d')
  {

    if ($this->fecsol === null || $this->fecsol === '') {
      return null;
    } elseif (!is_int($this->fecsol)) {
            $ts = adodb_strtotime($this->fecsol);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecsol] as date/time value: " . var_export($this->fecsol, true));
      }
    } else {
      $ts = $this->fecsol;
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
	
	public function setNroexp($v)
	{

    if ($this->nroexp !== $v) {
        $this->nroexp = $v;
        $this->modifiedColumns[] = AtayudasPeer::NROEXP;
      }
  
	} 
	
	public function setRefdoc($v)
	{

    if ($this->refdoc !== $v) {
        $this->refdoc = $v;
        $this->modifiedColumns[] = AtayudasPeer::REFDOC;
      }
  
		if ($this->aCaordcom !== null && $this->aCaordcom->getId() !== $v) {
			$this->aCaordcom = null;
		}

	} 
	
	public function setPriayu($v)
	{

    if ($this->priayu !== $v) {
        $this->priayu = $v;
        $this->modifiedColumns[] = AtayudasPeer::PRIAYU;
      }
  
	} 
	
	public function setAtsolici($v)
	{

    if ($this->atsolici !== $v) {
        $this->atsolici = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATSOLICI;
      }
  
		if ($this->aAtciudadanoRelatedByAtsolici !== null && $this->aAtciudadanoRelatedByAtsolici->getId() !== $v) {
			$this->aAtciudadanoRelatedByAtsolici = null;
		}

	} 
	
	public function setAtbenefi($v)
	{

    if ($this->atbenefi !== $v) {
        $this->atbenefi = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATBENEFI;
      }
  
		if ($this->aAtciudadanoRelatedByAtbenefi !== null && $this->aAtciudadanoRelatedByAtbenefi->getId() !== $v) {
			$this->aAtciudadanoRelatedByAtbenefi = null;
		}

	} 
	
	public function setAttipayuId($v)
	{

    if ($this->attipayu_id !== $v) {
        $this->attipayu_id = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATTIPAYU_ID;
      }
  
		if ($this->aAttipayu !== null && $this->aAttipayu->getId() !== $v) {
			$this->aAttipayu = null;
		}

	} 
	
	public function setAtrubrosId($v)
	{

    if ($this->atrubros_id !== $v) {
        $this->atrubros_id = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATRUBROS_ID;
      }
  
		if ($this->aAtrubros !== null && $this->aAtrubros->getId() !== $v) {
			$this->aAtrubros = null;
		}

	} 
	
	public function setAtestayuId($v)
	{

    if ($this->atestayu_id !== $v) {
        $this->atestayu_id = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATESTAYU_ID;
      }
  
		if ($this->aAtestayu !== null && $this->aAtestayu->getId() !== $v) {
			$this->aAtestayu = null;
		}

	} 
	
	public function setAttrasocId($v)
	{

    if ($this->attrasoc_id !== $v) {
        $this->attrasoc_id = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATTRASOC_ID;
      }
  
		if ($this->aAttrasoc !== null && $this->aAttrasoc->getId() !== $v) {
			$this->aAttrasoc = null;
		}

	} 
	
	public function setCaproveeId($v)
	{

    if ($this->caprovee_id !== $v) {
        $this->caprovee_id = $v;
        $this->modifiedColumns[] = AtayudasPeer::CAPROVEE_ID;
      }
  
		if ($this->aCaprovee !== null && $this->aCaprovee->getId() !== $v) {
			$this->aCaprovee = null;
		}

	} 
	
	public function setProayu($v)
	{

    if ($this->proayu !== $v) {
        $this->proayu = $v;
        $this->modifiedColumns[] = AtayudasPeer::PROAYU;
      }
  
	} 
	
	public function setNroofi($v)
	{

    if ($this->nroofi !== $v) {
        $this->nroofi = $v;
        $this->modifiedColumns[] = AtayudasPeer::NROOFI;
      }
  
	} 
	
	public function setDesayu($v)
	{

    if ($this->desayu !== $v) {
        $this->desayu = $v;
        $this->modifiedColumns[] = AtayudasPeer::DESAYU;
      }
  
	} 
	
	public function setMotayu($v)
	{

    if ($this->motayu !== $v) {
        $this->motayu = $v;
        $this->modifiedColumns[] = AtayudasPeer::MOTAYU;
      }
  
	} 
	
	public function setCreatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->created_at !== $ts) {
      $this->created_at = $ts;
      $this->modifiedColumns[] = AtayudasPeer::CREATED_AT;
    }

	} 
	
	public function setUpdatedAt($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->updated_at !== $ts) {
      $this->updated_at = $ts;
      $this->modifiedColumns[] = AtayudasPeer::UPDATED_AT;
    }

	} 
	
	public function setUsucre($v)
	{

    if ($this->usucre !== $v) {
        $this->usucre = $v;
        $this->modifiedColumns[] = AtayudasPeer::USUCRE;
      }
  
	} 
	
	public function setUsumod($v)
	{

    if ($this->usumod !== $v) {
        $this->usumod = $v;
        $this->modifiedColumns[] = AtayudasPeer::USUMOD;
      }
  
	} 
	
	public function setCodpre($v)
	{

    if ($this->codpre !== $v) {
        $this->codpre = $v;
        $this->modifiedColumns[] = AtayudasPeer::CODPRE;
      }
  
	} 
	
	public function setDetayu($v)
	{

    if ($this->detayu !== $v) {
        $this->detayu = $v;
        $this->modifiedColumns[] = AtayudasPeer::DETAYU;
      }
  
	} 
	
	public function setMonayu($v)
	{

    if ($this->monayu !== $v) {
        $this->monayu = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtayudasPeer::MONAYU;
      }
  
	} 
	
	public function setMonapr($v)
	{

    if ($this->monapr !== $v) {
        $this->monapr = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtayudasPeer::MONAPR;
      }
  
	} 
	
	public function setAtmedicoId($v)
	{

    if ($this->atmedico_id !== $v) {
        $this->atmedico_id = $v;
        $this->modifiedColumns[] = AtayudasPeer::ATMEDICO_ID;
      }
  
		if ($this->aAtmedico !== null && $this->aAtmedico->getId() !== $v) {
			$this->aAtmedico = null;
		}

	} 
	
	public function setRespat($v)
	{

    if ($this->respat !== $v) {
        $this->respat = $v;
        $this->modifiedColumns[] = AtayudasPeer::RESPAT;
      }
  
	} 
	
	public function setInfmed($v)
	{

    if ($this->infmed !== $v) {
        $this->infmed = $v;
        $this->modifiedColumns[] = AtayudasPeer::INFMED;
      }
  
	} 
	
	public function setObsmed($v)
	{

    if ($this->obsmed !== $v) {
        $this->obsmed = $v;
        $this->modifiedColumns[] = AtayudasPeer::OBSMED;
      }
  
	} 
	
	public function setFecdiasoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecdiasoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecdiasoc !== $ts) {
      $this->fecdiasoc = $ts;
      $this->modifiedColumns[] = AtayudasPeer::FECDIASOC;
    }

	} 
	
	public function setUsudiasoc($v)
	{

    if ($this->usudiasoc !== $v) {
        $this->usudiasoc = $v;
        $this->modifiedColumns[] = AtayudasPeer::USUDIASOC;
      }
  
	} 
	
	public function setResdiasoc($v)
	{

    if ($this->resdiasoc !== $v) {
        $this->resdiasoc = $v;
        $this->modifiedColumns[] = AtayudasPeer::RESDIASOC;
      }
  
	} 
	
	public function setFecvisdoc($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvisdoc] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvisdoc !== $ts) {
      $this->fecvisdoc = $ts;
      $this->modifiedColumns[] = AtayudasPeer::FECVISDOC;
    }

	} 
	
	public function setUsuvisdoc($v)
	{

    if ($this->usuvisdoc !== $v) {
        $this->usuvisdoc = $v;
        $this->modifiedColumns[] = AtayudasPeer::USUVISDOC;
      }
  
	} 
	
	public function setResvisdoc($v)
	{

    if ($this->resvisdoc !== $v) {
        $this->resvisdoc = $v;
        $this->modifiedColumns[] = AtayudasPeer::RESVISDOC;
      }
  
	} 
	
	public function setFecsol($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecsol] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecsol !== $ts) {
      $this->fecsol = $ts;
      $this->modifiedColumns[] = AtayudasPeer::FECSOL;
    }

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtayudasPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->nroexp = $rs->getString($startcol + 0);

      $this->refdoc = $rs->getInt($startcol + 1);

      $this->priayu = $rs->getInt($startcol + 2);

      $this->atsolici = $rs->getInt($startcol + 3);

      $this->atbenefi = $rs->getInt($startcol + 4);

      $this->attipayu_id = $rs->getInt($startcol + 5);

      $this->atrubros_id = $rs->getInt($startcol + 6);

      $this->atestayu_id = $rs->getInt($startcol + 7);

      $this->attrasoc_id = $rs->getInt($startcol + 8);

      $this->caprovee_id = $rs->getInt($startcol + 9);

      $this->proayu = $rs->getString($startcol + 10);

      $this->nroofi = $rs->getString($startcol + 11);

      $this->desayu = $rs->getString($startcol + 12);

      $this->motayu = $rs->getString($startcol + 13);

      $this->created_at = $rs->getTimestamp($startcol + 14, null);

      $this->updated_at = $rs->getTimestamp($startcol + 15, null);

      $this->usucre = $rs->getString($startcol + 16);

      $this->usumod = $rs->getString($startcol + 17);

      $this->codpre = $rs->getString($startcol + 18);

      $this->detayu = $rs->getString($startcol + 19);

      $this->monayu = $rs->getFloat($startcol + 20);

      $this->monapr = $rs->getFloat($startcol + 21);

      $this->atmedico_id = $rs->getInt($startcol + 22);

      $this->respat = $rs->getString($startcol + 23);

      $this->infmed = $rs->getString($startcol + 24);

      $this->obsmed = $rs->getString($startcol + 25);

      $this->fecdiasoc = $rs->getDate($startcol + 26, null);

      $this->usudiasoc = $rs->getString($startcol + 27);

      $this->resdiasoc = $rs->getString($startcol + 28);

      $this->fecvisdoc = $rs->getDate($startcol + 29, null);

      $this->usuvisdoc = $rs->getString($startcol + 30);

      $this->resvisdoc = $rs->getString($startcol + 31);

      $this->fecsol = $rs->getDate($startcol + 32, null);

      $this->id = $rs->getInt($startcol + 33);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 34; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atayudas object", $e);
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
			$con = Propel::getConnection(AtayudasPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtayudasPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AtayudasPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AtayudasPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AtayudasPeer::DATABASE_NAME);
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


												
			if ($this->aCaordcom !== null) {
				if ($this->aCaordcom->isModified()) {
					$affectedRows += $this->aCaordcom->save($con);
				}
				$this->setCaordcom($this->aCaordcom);
			}

			if ($this->aAtciudadanoRelatedByAtsolici !== null) {
				if ($this->aAtciudadanoRelatedByAtsolici->isModified()) {
					$affectedRows += $this->aAtciudadanoRelatedByAtsolici->save($con);
				}
				$this->setAtciudadanoRelatedByAtsolici($this->aAtciudadanoRelatedByAtsolici);
			}

			if ($this->aAtciudadanoRelatedByAtbenefi !== null) {
				if ($this->aAtciudadanoRelatedByAtbenefi->isModified()) {
					$affectedRows += $this->aAtciudadanoRelatedByAtbenefi->save($con);
				}
				$this->setAtciudadanoRelatedByAtbenefi($this->aAtciudadanoRelatedByAtbenefi);
			}

			if ($this->aAttipayu !== null) {
				if ($this->aAttipayu->isModified()) {
					$affectedRows += $this->aAttipayu->save($con);
				}
				$this->setAttipayu($this->aAttipayu);
			}

			if ($this->aAtrubros !== null) {
				if ($this->aAtrubros->isModified()) {
					$affectedRows += $this->aAtrubros->save($con);
				}
				$this->setAtrubros($this->aAtrubros);
			}

			if ($this->aAtestayu !== null) {
				if ($this->aAtestayu->isModified()) {
					$affectedRows += $this->aAtestayu->save($con);
				}
				$this->setAtestayu($this->aAtestayu);
			}

			if ($this->aAttrasoc !== null) {
				if ($this->aAttrasoc->isModified()) {
					$affectedRows += $this->aAttrasoc->save($con);
				}
				$this->setAttrasoc($this->aAttrasoc);
			}

			if ($this->aCaprovee !== null) {
				if ($this->aCaprovee->isModified()) {
					$affectedRows += $this->aCaprovee->save($con);
				}
				$this->setCaprovee($this->aCaprovee);
			}

			if ($this->aAtmedico !== null) {
				if ($this->aAtmedico->isModified()) {
					$affectedRows += $this->aAtmedico->save($con);
				}
				$this->setAtmedico($this->aAtmedico);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtayudasPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtayudasPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtestsocecos !== null) {
				foreach($this->collAtestsocecos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdetrecayus !== null) {
				foreach($this->collAtdetrecayus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdetayus !== null) {
				foreach($this->collAtdetayus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtfacturass !== null) {
				foreach($this->collAtfacturass as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtdocayus !== null) {
				foreach($this->collAtdocayus as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtpresupuestos !== null) {
				foreach($this->collAtpresupuestos as $referrerFK) {
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


												
			if ($this->aCaordcom !== null) {
				if (!$this->aCaordcom->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaordcom->getValidationFailures());
				}
			}

			if ($this->aAtciudadanoRelatedByAtsolici !== null) {
				if (!$this->aAtciudadanoRelatedByAtsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadanoRelatedByAtsolici->getValidationFailures());
				}
			}

			if ($this->aAtciudadanoRelatedByAtbenefi !== null) {
				if (!$this->aAtciudadanoRelatedByAtbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadanoRelatedByAtbenefi->getValidationFailures());
				}
			}

			if ($this->aAttipayu !== null) {
				if (!$this->aAttipayu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipayu->getValidationFailures());
				}
			}

			if ($this->aAtrubros !== null) {
				if (!$this->aAtrubros->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtrubros->getValidationFailures());
				}
			}

			if ($this->aAtestayu !== null) {
				if (!$this->aAtestayu->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtestayu->getValidationFailures());
				}
			}

			if ($this->aAttrasoc !== null) {
				if (!$this->aAttrasoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttrasoc->getValidationFailures());
				}
			}

			if ($this->aCaprovee !== null) {
				if (!$this->aCaprovee->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCaprovee->getValidationFailures());
				}
			}

			if ($this->aAtmedico !== null) {
				if (!$this->aAtmedico->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtmedico->getValidationFailures());
				}
			}


			if (($retval = AtayudasPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtestsocecos !== null) {
					foreach($this->collAtestsocecos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdetrecayus !== null) {
					foreach($this->collAtdetrecayus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdetayus !== null) {
					foreach($this->collAtdetayus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtfacturass !== null) {
					foreach($this->collAtfacturass as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtdocayus !== null) {
					foreach($this->collAtdocayus as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtpresupuestos !== null) {
					foreach($this->collAtpresupuestos as $referrerFK) {
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
		$pos = AtayudasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNroexp();
				break;
			case 1:
				return $this->getRefdoc();
				break;
			case 2:
				return $this->getPriayu();
				break;
			case 3:
				return $this->getAtsolici();
				break;
			case 4:
				return $this->getAtbenefi();
				break;
			case 5:
				return $this->getAttipayuId();
				break;
			case 6:
				return $this->getAtrubrosId();
				break;
			case 7:
				return $this->getAtestayuId();
				break;
			case 8:
				return $this->getAttrasocId();
				break;
			case 9:
				return $this->getCaproveeId();
				break;
			case 10:
				return $this->getProayu();
				break;
			case 11:
				return $this->getNroofi();
				break;
			case 12:
				return $this->getDesayu();
				break;
			case 13:
				return $this->getMotayu();
				break;
			case 14:
				return $this->getCreatedAt();
				break;
			case 15:
				return $this->getUpdatedAt();
				break;
			case 16:
				return $this->getUsucre();
				break;
			case 17:
				return $this->getUsumod();
				break;
			case 18:
				return $this->getCodpre();
				break;
			case 19:
				return $this->getDetayu();
				break;
			case 20:
				return $this->getMonayu();
				break;
			case 21:
				return $this->getMonapr();
				break;
			case 22:
				return $this->getAtmedicoId();
				break;
			case 23:
				return $this->getRespat();
				break;
			case 24:
				return $this->getInfmed();
				break;
			case 25:
				return $this->getObsmed();
				break;
			case 26:
				return $this->getFecdiasoc();
				break;
			case 27:
				return $this->getUsudiasoc();
				break;
			case 28:
				return $this->getResdiasoc();
				break;
			case 29:
				return $this->getFecvisdoc();
				break;
			case 30:
				return $this->getUsuvisdoc();
				break;
			case 31:
				return $this->getResvisdoc();
				break;
			case 32:
				return $this->getFecsol();
				break;
			case 33:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtayudasPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNroexp(),
			$keys[1] => $this->getRefdoc(),
			$keys[2] => $this->getPriayu(),
			$keys[3] => $this->getAtsolici(),
			$keys[4] => $this->getAtbenefi(),
			$keys[5] => $this->getAttipayuId(),
			$keys[6] => $this->getAtrubrosId(),
			$keys[7] => $this->getAtestayuId(),
			$keys[8] => $this->getAttrasocId(),
			$keys[9] => $this->getCaproveeId(),
			$keys[10] => $this->getProayu(),
			$keys[11] => $this->getNroofi(),
			$keys[12] => $this->getDesayu(),
			$keys[13] => $this->getMotayu(),
			$keys[14] => $this->getCreatedAt(),
			$keys[15] => $this->getUpdatedAt(),
			$keys[16] => $this->getUsucre(),
			$keys[17] => $this->getUsumod(),
			$keys[18] => $this->getCodpre(),
			$keys[19] => $this->getDetayu(),
			$keys[20] => $this->getMonayu(),
			$keys[21] => $this->getMonapr(),
			$keys[22] => $this->getAtmedicoId(),
			$keys[23] => $this->getRespat(),
			$keys[24] => $this->getInfmed(),
			$keys[25] => $this->getObsmed(),
			$keys[26] => $this->getFecdiasoc(),
			$keys[27] => $this->getUsudiasoc(),
			$keys[28] => $this->getResdiasoc(),
			$keys[29] => $this->getFecvisdoc(),
			$keys[30] => $this->getUsuvisdoc(),
			$keys[31] => $this->getResvisdoc(),
			$keys[32] => $this->getFecsol(),
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtayudasPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNroexp($value);
				break;
			case 1:
				$this->setRefdoc($value);
				break;
			case 2:
				$this->setPriayu($value);
				break;
			case 3:
				$this->setAtsolici($value);
				break;
			case 4:
				$this->setAtbenefi($value);
				break;
			case 5:
				$this->setAttipayuId($value);
				break;
			case 6:
				$this->setAtrubrosId($value);
				break;
			case 7:
				$this->setAtestayuId($value);
				break;
			case 8:
				$this->setAttrasocId($value);
				break;
			case 9:
				$this->setCaproveeId($value);
				break;
			case 10:
				$this->setProayu($value);
				break;
			case 11:
				$this->setNroofi($value);
				break;
			case 12:
				$this->setDesayu($value);
				break;
			case 13:
				$this->setMotayu($value);
				break;
			case 14:
				$this->setCreatedAt($value);
				break;
			case 15:
				$this->setUpdatedAt($value);
				break;
			case 16:
				$this->setUsucre($value);
				break;
			case 17:
				$this->setUsumod($value);
				break;
			case 18:
				$this->setCodpre($value);
				break;
			case 19:
				$this->setDetayu($value);
				break;
			case 20:
				$this->setMonayu($value);
				break;
			case 21:
				$this->setMonapr($value);
				break;
			case 22:
				$this->setAtmedicoId($value);
				break;
			case 23:
				$this->setRespat($value);
				break;
			case 24:
				$this->setInfmed($value);
				break;
			case 25:
				$this->setObsmed($value);
				break;
			case 26:
				$this->setFecdiasoc($value);
				break;
			case 27:
				$this->setUsudiasoc($value);
				break;
			case 28:
				$this->setResdiasoc($value);
				break;
			case 29:
				$this->setFecvisdoc($value);
				break;
			case 30:
				$this->setUsuvisdoc($value);
				break;
			case 31:
				$this->setResvisdoc($value);
				break;
			case 32:
				$this->setFecsol($value);
				break;
			case 33:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtayudasPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNroexp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRefdoc($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPriayu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAtsolici($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAtbenefi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAttipayuId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAtrubrosId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAtestayuId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setAttrasocId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCaproveeId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setProayu($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNroofi($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDesayu($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMotayu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCreatedAt($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setUsucre($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setUsumod($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodpre($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setDetayu($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMonayu($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMonapr($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAtmedicoId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setRespat($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setInfmed($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setObsmed($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setFecdiasoc($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setUsudiasoc($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setResdiasoc($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setFecvisdoc($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setUsuvisdoc($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setResvisdoc($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFecsol($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtayudasPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtayudasPeer::NROEXP)) $criteria->add(AtayudasPeer::NROEXP, $this->nroexp);
		if ($this->isColumnModified(AtayudasPeer::REFDOC)) $criteria->add(AtayudasPeer::REFDOC, $this->refdoc);
		if ($this->isColumnModified(AtayudasPeer::PRIAYU)) $criteria->add(AtayudasPeer::PRIAYU, $this->priayu);
		if ($this->isColumnModified(AtayudasPeer::ATSOLICI)) $criteria->add(AtayudasPeer::ATSOLICI, $this->atsolici);
		if ($this->isColumnModified(AtayudasPeer::ATBENEFI)) $criteria->add(AtayudasPeer::ATBENEFI, $this->atbenefi);
		if ($this->isColumnModified(AtayudasPeer::ATTIPAYU_ID)) $criteria->add(AtayudasPeer::ATTIPAYU_ID, $this->attipayu_id);
		if ($this->isColumnModified(AtayudasPeer::ATRUBROS_ID)) $criteria->add(AtayudasPeer::ATRUBROS_ID, $this->atrubros_id);
		if ($this->isColumnModified(AtayudasPeer::ATESTAYU_ID)) $criteria->add(AtayudasPeer::ATESTAYU_ID, $this->atestayu_id);
		if ($this->isColumnModified(AtayudasPeer::ATTRASOC_ID)) $criteria->add(AtayudasPeer::ATTRASOC_ID, $this->attrasoc_id);
		if ($this->isColumnModified(AtayudasPeer::CAPROVEE_ID)) $criteria->add(AtayudasPeer::CAPROVEE_ID, $this->caprovee_id);
		if ($this->isColumnModified(AtayudasPeer::PROAYU)) $criteria->add(AtayudasPeer::PROAYU, $this->proayu);
		if ($this->isColumnModified(AtayudasPeer::NROOFI)) $criteria->add(AtayudasPeer::NROOFI, $this->nroofi);
		if ($this->isColumnModified(AtayudasPeer::DESAYU)) $criteria->add(AtayudasPeer::DESAYU, $this->desayu);
		if ($this->isColumnModified(AtayudasPeer::MOTAYU)) $criteria->add(AtayudasPeer::MOTAYU, $this->motayu);
		if ($this->isColumnModified(AtayudasPeer::CREATED_AT)) $criteria->add(AtayudasPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AtayudasPeer::UPDATED_AT)) $criteria->add(AtayudasPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(AtayudasPeer::USUCRE)) $criteria->add(AtayudasPeer::USUCRE, $this->usucre);
		if ($this->isColumnModified(AtayudasPeer::USUMOD)) $criteria->add(AtayudasPeer::USUMOD, $this->usumod);
		if ($this->isColumnModified(AtayudasPeer::CODPRE)) $criteria->add(AtayudasPeer::CODPRE, $this->codpre);
		if ($this->isColumnModified(AtayudasPeer::DETAYU)) $criteria->add(AtayudasPeer::DETAYU, $this->detayu);
		if ($this->isColumnModified(AtayudasPeer::MONAYU)) $criteria->add(AtayudasPeer::MONAYU, $this->monayu);
		if ($this->isColumnModified(AtayudasPeer::MONAPR)) $criteria->add(AtayudasPeer::MONAPR, $this->monapr);
		if ($this->isColumnModified(AtayudasPeer::ATMEDICO_ID)) $criteria->add(AtayudasPeer::ATMEDICO_ID, $this->atmedico_id);
		if ($this->isColumnModified(AtayudasPeer::RESPAT)) $criteria->add(AtayudasPeer::RESPAT, $this->respat);
		if ($this->isColumnModified(AtayudasPeer::INFMED)) $criteria->add(AtayudasPeer::INFMED, $this->infmed);
		if ($this->isColumnModified(AtayudasPeer::OBSMED)) $criteria->add(AtayudasPeer::OBSMED, $this->obsmed);
		if ($this->isColumnModified(AtayudasPeer::FECDIASOC)) $criteria->add(AtayudasPeer::FECDIASOC, $this->fecdiasoc);
		if ($this->isColumnModified(AtayudasPeer::USUDIASOC)) $criteria->add(AtayudasPeer::USUDIASOC, $this->usudiasoc);
		if ($this->isColumnModified(AtayudasPeer::RESDIASOC)) $criteria->add(AtayudasPeer::RESDIASOC, $this->resdiasoc);
		if ($this->isColumnModified(AtayudasPeer::FECVISDOC)) $criteria->add(AtayudasPeer::FECVISDOC, $this->fecvisdoc);
		if ($this->isColumnModified(AtayudasPeer::USUVISDOC)) $criteria->add(AtayudasPeer::USUVISDOC, $this->usuvisdoc);
		if ($this->isColumnModified(AtayudasPeer::RESVISDOC)) $criteria->add(AtayudasPeer::RESVISDOC, $this->resvisdoc);
		if ($this->isColumnModified(AtayudasPeer::FECSOL)) $criteria->add(AtayudasPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(AtayudasPeer::ID)) $criteria->add(AtayudasPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtayudasPeer::DATABASE_NAME);

		$criteria->add(AtayudasPeer::ID, $this->id);

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

		$copyObj->setNroexp($this->nroexp);

		$copyObj->setRefdoc($this->refdoc);

		$copyObj->setPriayu($this->priayu);

		$copyObj->setAtsolici($this->atsolici);

		$copyObj->setAtbenefi($this->atbenefi);

		$copyObj->setAttipayuId($this->attipayu_id);

		$copyObj->setAtrubrosId($this->atrubros_id);

		$copyObj->setAtestayuId($this->atestayu_id);

		$copyObj->setAttrasocId($this->attrasoc_id);

		$copyObj->setCaproveeId($this->caprovee_id);

		$copyObj->setProayu($this->proayu);

		$copyObj->setNroofi($this->nroofi);

		$copyObj->setDesayu($this->desayu);

		$copyObj->setMotayu($this->motayu);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUsucre($this->usucre);

		$copyObj->setUsumod($this->usumod);

		$copyObj->setCodpre($this->codpre);

		$copyObj->setDetayu($this->detayu);

		$copyObj->setMonayu($this->monayu);

		$copyObj->setMonapr($this->monapr);

		$copyObj->setAtmedicoId($this->atmedico_id);

		$copyObj->setRespat($this->respat);

		$copyObj->setInfmed($this->infmed);

		$copyObj->setObsmed($this->obsmed);

		$copyObj->setFecdiasoc($this->fecdiasoc);

		$copyObj->setUsudiasoc($this->usudiasoc);

		$copyObj->setResdiasoc($this->resdiasoc);

		$copyObj->setFecvisdoc($this->fecvisdoc);

		$copyObj->setUsuvisdoc($this->usuvisdoc);

		$copyObj->setResvisdoc($this->resvisdoc);

		$copyObj->setFecsol($this->fecsol);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtestsocecos() as $relObj) {
				$copyObj->addAtestsoceco($relObj->copy($deepCopy));
			}

			foreach($this->getAtdetrecayus() as $relObj) {
				$copyObj->addAtdetrecayu($relObj->copy($deepCopy));
			}

			foreach($this->getAtdetayus() as $relObj) {
				$copyObj->addAtdetayu($relObj->copy($deepCopy));
			}

			foreach($this->getAtfacturass() as $relObj) {
				$copyObj->addAtfacturas($relObj->copy($deepCopy));
			}

			foreach($this->getAtdocayus() as $relObj) {
				$copyObj->addAtdocayu($relObj->copy($deepCopy));
			}

			foreach($this->getAtpresupuestos() as $relObj) {
				$copyObj->addAtpresupuesto($relObj->copy($deepCopy));
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
			self::$peer = new AtayudasPeer();
		}
		return self::$peer;
	}

	
	public function setCaordcom($v)
	{


		if ($v === null) {
			$this->setRefdoc(NULL);
		} else {
			$this->setRefdoc($v->getId());
		}


		$this->aCaordcom = $v;
	}


	
	public function getCaordcom($con = null)
	{
		if ($this->aCaordcom === null && ($this->refdoc !== null)) {
						include_once 'lib/model/om/BaseCaordcomPeer.php';

			$this->aCaordcom = CaordcomPeer::retrieveByPK($this->refdoc, $con);

			
		}
		return $this->aCaordcom;
	}

	
	public function setAtciudadanoRelatedByAtsolici($v)
	{


		if ($v === null) {
			$this->setAtsolici(NULL);
		} else {
			$this->setAtsolici($v->getId());
		}


		$this->aAtciudadanoRelatedByAtsolici = $v;
	}


	
	public function getAtciudadanoRelatedByAtsolici($con = null)
	{
		if ($this->aAtciudadanoRelatedByAtsolici === null && ($this->atsolici !== null)) {
						include_once 'lib/model/om/BaseAtciudadanoPeer.php';

			$this->aAtciudadanoRelatedByAtsolici = AtciudadanoPeer::retrieveByPK($this->atsolici, $con);

			
		}
		return $this->aAtciudadanoRelatedByAtsolici;
	}

	
	public function setAtciudadanoRelatedByAtbenefi($v)
	{


		if ($v === null) {
			$this->setAtbenefi(NULL);
		} else {
			$this->setAtbenefi($v->getId());
		}


		$this->aAtciudadanoRelatedByAtbenefi = $v;
	}


	
	public function getAtciudadanoRelatedByAtbenefi($con = null)
	{
		if ($this->aAtciudadanoRelatedByAtbenefi === null && ($this->atbenefi !== null)) {
						include_once 'lib/model/om/BaseAtciudadanoPeer.php';

			$this->aAtciudadanoRelatedByAtbenefi = AtciudadanoPeer::retrieveByPK($this->atbenefi, $con);

			
		}
		return $this->aAtciudadanoRelatedByAtbenefi;
	}

	
	public function setAttipayu($v)
	{


		if ($v === null) {
			$this->setAttipayuId(NULL);
		} else {
			$this->setAttipayuId($v->getId());
		}


		$this->aAttipayu = $v;
	}


	
	public function getAttipayu($con = null)
	{
		if ($this->aAttipayu === null && ($this->attipayu_id !== null)) {
						include_once 'lib/model/om/BaseAttipayuPeer.php';

			$this->aAttipayu = AttipayuPeer::retrieveByPK($this->attipayu_id, $con);

			
		}
		return $this->aAttipayu;
	}

	
	public function setAtrubros($v)
	{


		if ($v === null) {
			$this->setAtrubrosId(NULL);
		} else {
			$this->setAtrubrosId($v->getId());
		}


		$this->aAtrubros = $v;
	}


	
	public function getAtrubros($con = null)
	{
		if ($this->aAtrubros === null && ($this->atrubros_id !== null)) {
						include_once 'lib/model/om/BaseAtrubrosPeer.php';

			$this->aAtrubros = AtrubrosPeer::retrieveByPK($this->atrubros_id, $con);

			
		}
		return $this->aAtrubros;
	}

	
	public function setAtestayu($v)
	{


		if ($v === null) {
			$this->setAtestayuId(NULL);
		} else {
			$this->setAtestayuId($v->getId());
		}


		$this->aAtestayu = $v;
	}


	
	public function getAtestayu($con = null)
	{
		if ($this->aAtestayu === null && ($this->atestayu_id !== null)) {
						include_once 'lib/model/om/BaseAtestayuPeer.php';

			$this->aAtestayu = AtestayuPeer::retrieveByPK($this->atestayu_id, $con);

			
		}
		return $this->aAtestayu;
	}

	
	public function setAttrasoc($v)
	{


		if ($v === null) {
			$this->setAttrasocId(NULL);
		} else {
			$this->setAttrasocId($v->getId());
		}


		$this->aAttrasoc = $v;
	}


	
	public function getAttrasoc($con = null)
	{
		if ($this->aAttrasoc === null && ($this->attrasoc_id !== null)) {
						include_once 'lib/model/om/BaseAttrasocPeer.php';

			$this->aAttrasoc = AttrasocPeer::retrieveByPK($this->attrasoc_id, $con);

			
		}
		return $this->aAttrasoc;
	}

	
	public function setCaprovee($v)
	{


		if ($v === null) {
			$this->setCaproveeId(NULL);
		} else {
			$this->setCaproveeId($v->getId());
		}


		$this->aCaprovee = $v;
	}


	
	public function getCaprovee($con = null)
	{
		if ($this->aCaprovee === null && ($this->caprovee_id !== null)) {
						include_once 'lib/model/om/BaseCaproveePeer.php';

			$this->aCaprovee = CaproveePeer::retrieveByPK($this->caprovee_id, $con);

			
		}
		return $this->aCaprovee;
	}

	
	public function setAtmedico($v)
	{


		if ($v === null) {
			$this->setAtmedicoId(NULL);
		} else {
			$this->setAtmedicoId($v->getId());
		}


		$this->aAtmedico = $v;
	}


	
	public function getAtmedico($con = null)
	{
		if ($this->aAtmedico === null && ($this->atmedico_id !== null)) {
						include_once 'lib/model/om/BaseAtmedicoPeer.php';

			$this->aAtmedico = AtmedicoPeer::retrieveByPK($this->atmedico_id, $con);

			
		}
		return $this->aAtmedico;
	}

	
	public function initAtestsocecos()
	{
		if ($this->collAtestsocecos === null) {
			$this->collAtestsocecos = array();
		}
	}

	
	public function getAtestsocecos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
			   $this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

				AtestsocecoPeer::addSelectColumns($criteria);
				$this->collAtestsocecos = AtestsocecoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

				AtestsocecoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
					$this->collAtestsocecos = AtestsocecoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;
		return $this->collAtestsocecos;
	}

	
	public function countAtestsocecos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

		return AtestsocecoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtestsoceco(Atestsoceco $l)
	{
		$this->collAtestsocecos[] = $l;
		$l->setAtayudas($this);
	}


	
	public function getAtestsocecosJoinAtciudadano($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
				$this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtciudadano($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}


	
	public function getAtestsocecosJoinAttipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
				$this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}


	
	public function getAtestsocecosJoinAttipproviv($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtestsocecos === null) {
			if ($this->isNew()) {
				$this->collAtestsocecos = array();
			} else {

				$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}

	
	public function initAtdetrecayus()
	{
		if ($this->collAtdetrecayus === null) {
			$this->collAtdetrecayus = array();
		}
	}

	
	public function getAtdetrecayus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetrecayus === null) {
			if ($this->isNew()) {
			   $this->collAtdetrecayus = array();
			} else {

				$criteria->add(AtdetrecayuPeer::ATAYUDAS_ID, $this->getId());

				AtdetrecayuPeer::addSelectColumns($criteria);
				$this->collAtdetrecayus = AtdetrecayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetrecayuPeer::ATAYUDAS_ID, $this->getId());

				AtdetrecayuPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetrecayuCriteria) || !$this->lastAtdetrecayuCriteria->equals($criteria)) {
					$this->collAtdetrecayus = AtdetrecayuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetrecayuCriteria = $criteria;
		return $this->collAtdetrecayus;
	}

	
	public function countAtdetrecayus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetrecayuPeer::ATAYUDAS_ID, $this->getId());

		return AtdetrecayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetrecayu(Atdetrecayu $l)
	{
		$this->collAtdetrecayus[] = $l;
		$l->setAtayudas($this);
	}


	
	public function getAtdetrecayusJoinAtrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetrecayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetrecayus === null) {
			if ($this->isNew()) {
				$this->collAtdetrecayus = array();
			} else {

				$criteria->add(AtdetrecayuPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtdetrecayus = AtdetrecayuPeer::doSelectJoinAtrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetrecayuPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtdetrecayuCriteria) || !$this->lastAtdetrecayuCriteria->equals($criteria)) {
				$this->collAtdetrecayus = AtdetrecayuPeer::doSelectJoinAtrecaud($criteria, $con);
			}
		}
		$this->lastAtdetrecayuCriteria = $criteria;

		return $this->collAtdetrecayus;
	}

	
	public function initAtdetayus()
	{
		if ($this->collAtdetayus === null) {
			$this->collAtdetayus = array();
		}
	}

	
	public function getAtdetayus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetayus === null) {
			if ($this->isNew()) {
			   $this->collAtdetayus = array();
			} else {

				$criteria->add(AtdetayuPeer::ATAYUDAS_ID, $this->getId());

				AtdetayuPeer::addSelectColumns($criteria);
				$this->collAtdetayus = AtdetayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdetayuPeer::ATAYUDAS_ID, $this->getId());

				AtdetayuPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdetayuCriteria) || !$this->lastAtdetayuCriteria->equals($criteria)) {
					$this->collAtdetayus = AtdetayuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdetayuCriteria = $criteria;
		return $this->collAtdetayus;
	}

	
	public function countAtdetayus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdetayuPeer::ATAYUDAS_ID, $this->getId());

		return AtdetayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdetayu(Atdetayu $l)
	{
		$this->collAtdetayus[] = $l;
		$l->setAtayudas($this);
	}


	
	public function getAtdetayusJoinAtdonaciones($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdetayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdetayus === null) {
			if ($this->isNew()) {
				$this->collAtdetayus = array();
			} else {

				$criteria->add(AtdetayuPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtdetayus = AtdetayuPeer::doSelectJoinAtdonaciones($criteria, $con);
			}
		} else {
									
			$criteria->add(AtdetayuPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtdetayuCriteria) || !$this->lastAtdetayuCriteria->equals($criteria)) {
				$this->collAtdetayus = AtdetayuPeer::doSelectJoinAtdonaciones($criteria, $con);
			}
		}
		$this->lastAtdetayuCriteria = $criteria;

		return $this->collAtdetayus;
	}

	
	public function initAtfacturass()
	{
		if ($this->collAtfacturass === null) {
			$this->collAtfacturass = array();
		}
	}

	
	public function getAtfacturass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtfacturasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtfacturass === null) {
			if ($this->isNew()) {
			   $this->collAtfacturass = array();
			} else {

				$criteria->add(AtfacturasPeer::ATAYUDAS_ID, $this->getId());

				AtfacturasPeer::addSelectColumns($criteria);
				$this->collAtfacturass = AtfacturasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtfacturasPeer::ATAYUDAS_ID, $this->getId());

				AtfacturasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtfacturasCriteria) || !$this->lastAtfacturasCriteria->equals($criteria)) {
					$this->collAtfacturass = AtfacturasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtfacturasCriteria = $criteria;
		return $this->collAtfacturass;
	}

	
	public function countAtfacturass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtfacturasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtfacturasPeer::ATAYUDAS_ID, $this->getId());

		return AtfacturasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtfacturas(Atfacturas $l)
	{
		$this->collAtfacturass[] = $l;
		$l->setAtayudas($this);
	}

	
	public function initAtdocayus()
	{
		if ($this->collAtdocayus === null) {
			$this->collAtdocayus = array();
		}
	}

	
	public function getAtdocayus($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtdocayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtdocayus === null) {
			if ($this->isNew()) {
			   $this->collAtdocayus = array();
			} else {

				$criteria->add(AtdocayuPeer::ATAYUDAS_ID, $this->getId());

				AtdocayuPeer::addSelectColumns($criteria);
				$this->collAtdocayus = AtdocayuPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtdocayuPeer::ATAYUDAS_ID, $this->getId());

				AtdocayuPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtdocayuCriteria) || !$this->lastAtdocayuCriteria->equals($criteria)) {
					$this->collAtdocayus = AtdocayuPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtdocayuCriteria = $criteria;
		return $this->collAtdocayus;
	}

	
	public function countAtdocayus($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtdocayuPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtdocayuPeer::ATAYUDAS_ID, $this->getId());

		return AtdocayuPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtdocayu(Atdocayu $l)
	{
		$this->collAtdocayus[] = $l;
		$l->setAtayudas($this);
	}

	
	public function initAtpresupuestos()
	{
		if ($this->collAtpresupuestos === null) {
			$this->collAtpresupuestos = array();
		}
	}

	
	public function getAtpresupuestos($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
			   $this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				AtpresupuestoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
					$this->collAtpresupuestos = AtpresupuestoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;
		return $this->collAtpresupuestos;
	}

	
	public function countAtpresupuestos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

		return AtpresupuestoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtpresupuesto(Atpresupuesto $l)
	{
		$this->collAtpresupuestos[] = $l;
		$l->setAtayudas($this);
	}


	
	public function getAtpresupuestosJoinAtproveeRelatedByAtprovee1($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee1($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee1($criteria, $con);
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;

		return $this->collAtpresupuestos;
	}


	
	public function getAtpresupuestosJoinAtproveeRelatedByAtprovee2($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee2($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee2($criteria, $con);
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;

		return $this->collAtpresupuestos;
	}


	
	public function getAtpresupuestosJoinAtproveeRelatedByAtprovee3($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee3($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee3($criteria, $con);
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;

		return $this->collAtpresupuestos;
	}


	
	public function getAtpresupuestosJoinAtproveeRelatedByAtprovee4($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee4($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee4($criteria, $con);
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;

		return $this->collAtpresupuestos;
	}


	
	public function getAtpresupuestosJoinAtproveeRelatedByAtprovee5($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee5($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee5($criteria, $con);
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;

		return $this->collAtpresupuestos;
	}


	
	public function getAtpresupuestosJoinAtproveeRelatedByAtprovee6($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtpresupuestoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtpresupuestos === null) {
			if ($this->isNew()) {
				$this->collAtpresupuestos = array();
			} else {

				$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee6($criteria, $con);
			}
		} else {
									
			$criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->getId());

			if (!isset($this->lastAtpresupuestoCriteria) || !$this->lastAtpresupuestoCriteria->equals($criteria)) {
				$this->collAtpresupuestos = AtpresupuestoPeer::doSelectJoinAtproveeRelatedByAtprovee6($criteria, $con);
			}
		}
		$this->lastAtpresupuestoCriteria = $criteria;

		return $this->collAtpresupuestos;
	}

} 