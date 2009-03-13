<?php


abstract class BaseAtbenefi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedben;


	
	protected $nomben;


	
	protected $apeben;


	
	protected $fecnac;


	
	protected $pais;


	
	protected $conext;


	
	protected $lugnac;


	
	protected $tipo;


	
	protected $sexo;


	
	protected $nacben;


	
	protected $dirnac;


	
	protected $estciv;


	
	protected $telhab;


	
	protected $teladihab;


	
	protected $proben;


	
	protected $atestados_id;


	
	protected $atmunicipios_id;


	
	protected $atparroquias_id;


	
	protected $ciudad;


	
	protected $caserio;


	
	protected $dirhab;


	
	protected $dirtra;


	
	protected $concomben;


	
	protected $carconcomben;


	
	protected $nota;


	
	protected $grains;


	
	protected $traben;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $tiping;


	
	protected $moning;


	
	protected $tipviv;


	
	protected $tenviv;


	
	protected $carvivsal;


	
	protected $carvivcom;


	
	protected $carvivhab;


	
	protected $carvivcoc;


	
	protected $carvivban;


	
	protected $carvivpat;


	
	protected $carvivarever;


	
	protected $carvivpis;


	
	protected $carvivpar;


	
	protected $carvivtec;


	
	protected $anasoceco;


	
	protected $anafam;


	
	protected $otros;


	
	protected $id;

	
	protected $aAtestados;

	
	protected $aAtmunicipios;

	
	protected $aAtparroquias;

	
	protected $collAtgrufams;

	
	protected $lastAtgrufamCriteria = null;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedben()
  {

    return trim($this->cedben);

  }
  
  public function getNomben()
  {

    return trim($this->nomben);

  }
  
  public function getApeben()
  {

    return trim($this->apeben);

  }
  
  public function getFecnac($format = 'Y-m-d')
  {

    if ($this->fecnac === null || $this->fecnac === '') {
      return null;
    } elseif (!is_int($this->fecnac)) {
            $ts = adodb_strtotime($this->fecnac);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
      }
    } else {
      $ts = $this->fecnac;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPais()
  {

    return trim($this->pais);

  }
  
  public function getConext()
  {

    return trim($this->conext);

  }
  
  public function getLugnac()
  {

    return trim($this->lugnac);

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getSexo()
  {

    return trim($this->sexo);

  }
  
  public function getNacben()
  {

    return trim($this->nacben);

  }
  
  public function getDirnac()
  {

    return trim($this->dirnac);

  }
  
  public function getEstciv()
  {

    return trim($this->estciv);

  }
  
  public function getTelhab()
  {

    return trim($this->telhab);

  }
  
  public function getTeladihab()
  {

    return trim($this->teladihab);

  }
  
  public function getProben()
  {

    return trim($this->proben);

  }
  
  public function getAtestadosId()
  {

    return $this->atestados_id;

  }
  
  public function getAtmunicipiosId()
  {

    return $this->atmunicipios_id;

  }
  
  public function getAtparroquiasId()
  {

    return $this->atparroquias_id;

  }
  
  public function getCiudad()
  {

    return trim($this->ciudad);

  }
  
  public function getCaserio()
  {

    return trim($this->caserio);

  }
  
  public function getDirhab()
  {

    return trim($this->dirhab);

  }
  
  public function getDirtra()
  {

    return trim($this->dirtra);

  }
  
  public function getConcomben()
  {

    return trim($this->concomben);

  }
  
  public function getCarconcomben()
  {

    return trim($this->carconcomben);

  }
  
  public function getNota()
  {

    return trim($this->nota);

  }
  
  public function getGrains()
  {

    return trim($this->grains);

  }
  
  public function getTraben()
  {

    return $this->traben;

  }
  
  public function getNomemp()
  {

    return trim($this->nomemp);

  }
  
  public function getDiremp()
  {

    return trim($this->diremp);

  }
  
  public function getTelemp()
  {

    return trim($this->telemp);

  }
  
  public function getTiping()
  {

    return $this->tiping;

  }
  
  public function getMoning($val=false)
  {

    if($val) return number_format($this->moning,2,',','.');
    else return $this->moning;

  }
  
  public function getTipviv()
  {

    return $this->tipviv;

  }
  
  public function getTenviv()
  {

    return $this->tenviv;

  }
  
  public function getCarvivsal()
  {

    return trim($this->carvivsal);

  }
  
  public function getCarvivcom()
  {

    return trim($this->carvivcom);

  }
  
  public function getCarvivhab()
  {

    return trim($this->carvivhab);

  }
  
  public function getCarvivcoc()
  {

    return trim($this->carvivcoc);

  }
  
  public function getCarvivban()
  {

    return trim($this->carvivban);

  }
  
  public function getCarvivpat()
  {

    return trim($this->carvivpat);

  }
  
  public function getCarvivarever()
  {

    return trim($this->carvivarever);

  }
  
  public function getCarvivpis()
  {

    return trim($this->carvivpis);

  }
  
  public function getCarvivpar()
  {

    return trim($this->carvivpar);

  }
  
  public function getCarvivtec()
  {

    return trim($this->carvivtec);

  }
  
  public function getAnasoceco()
  {

    return trim($this->anasoceco);

  }
  
  public function getAnafam()
  {

    return trim($this->anafam);

  }
  
  public function getOtros()
  {

    return trim($this->otros);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedben($v)
	{

    if ($this->cedben !== $v) {
        $this->cedben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CEDBEN;
      }
  
	} 
	
	public function setNomben($v)
	{

    if ($this->nomben !== $v) {
        $this->nomben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::NOMBEN;
      }
  
	} 
	
	public function setApeben($v)
	{

    if ($this->apeben !== $v) {
        $this->apeben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::APEBEN;
      }
  
	} 
	
	public function setFecnac($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecnac !== $ts) {
      $this->fecnac = $ts;
      $this->modifiedColumns[] = AtbenefiPeer::FECNAC;
    }

	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = AtbenefiPeer::PAIS;
      }
  
	} 
	
	public function setConext($v)
	{

    if ($this->conext !== $v) {
        $this->conext = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CONEXT;
      }
  
	} 
	
	public function setLugnac($v)
	{

    if ($this->lugnac !== $v) {
        $this->lugnac = $v;
        $this->modifiedColumns[] = AtbenefiPeer::LUGNAC;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TIPO;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = AtbenefiPeer::SEXO;
      }
  
	} 
	
	public function setNacben($v)
	{

    if ($this->nacben !== $v) {
        $this->nacben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::NACBEN;
      }
  
	} 
	
	public function setDirnac($v)
	{

    if ($this->dirnac !== $v) {
        $this->dirnac = $v;
        $this->modifiedColumns[] = AtbenefiPeer::DIRNAC;
      }
  
	} 
	
	public function setEstciv($v)
	{

    if ($this->estciv !== $v) {
        $this->estciv = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ESTCIV;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TELHAB;
      }
  
	} 
	
	public function setTeladihab($v)
	{

    if ($this->teladihab !== $v) {
        $this->teladihab = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TELADIHAB;
      }
  
	} 
	
	public function setProben($v)
	{

    if ($this->proben !== $v) {
        $this->proben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::PROBEN;
      }
  
	} 
	
	public function setAtestadosId($v)
	{

    if ($this->atestados_id !== $v) {
        $this->atestados_id = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ATESTADOS_ID;
      }
  
		if ($this->aAtestados !== null && $this->aAtestados->getId() !== $v) {
			$this->aAtestados = null;
		}

	} 
	
	public function setAtmunicipiosId($v)
	{

    if ($this->atmunicipios_id !== $v) {
        $this->atmunicipios_id = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ATMUNICIPIOS_ID;
      }
  
		if ($this->aAtmunicipios !== null && $this->aAtmunicipios->getId() !== $v) {
			$this->aAtmunicipios = null;
		}

	} 
	
	public function setAtparroquiasId($v)
	{

    if ($this->atparroquias_id !== $v) {
        $this->atparroquias_id = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ATPARROQUIAS_ID;
      }
  
		if ($this->aAtparroquias !== null && $this->aAtparroquias->getId() !== $v) {
			$this->aAtparroquias = null;
		}

	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CIUDAD;
      }
  
	} 
	
	public function setCaserio($v)
	{

    if ($this->caserio !== $v) {
        $this->caserio = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CASERIO;
      }
  
	} 
	
	public function setDirhab($v)
	{

    if ($this->dirhab !== $v) {
        $this->dirhab = $v;
        $this->modifiedColumns[] = AtbenefiPeer::DIRHAB;
      }
  
	} 
	
	public function setDirtra($v)
	{

    if ($this->dirtra !== $v) {
        $this->dirtra = $v;
        $this->modifiedColumns[] = AtbenefiPeer::DIRTRA;
      }
  
	} 
	
	public function setConcomben($v)
	{

    if ($this->concomben !== $v) {
        $this->concomben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CONCOMBEN;
      }
  
	} 
	
	public function setCarconcomben($v)
	{

    if ($this->carconcomben !== $v) {
        $this->carconcomben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARCONCOMBEN;
      }
  
	} 
	
	public function setNota($v)
	{

    if ($this->nota !== $v) {
        $this->nota = $v;
        $this->modifiedColumns[] = AtbenefiPeer::NOTA;
      }
  
	} 
	
	public function setGrains($v)
	{

    if ($this->grains !== $v) {
        $this->grains = $v;
        $this->modifiedColumns[] = AtbenefiPeer::GRAINS;
      }
  
	} 
	
	public function setTraben($v)
	{

    if ($this->traben !== $v) {
        $this->traben = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TRABEN;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = AtbenefiPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = AtbenefiPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TELEMP;
      }
  
	} 
	
	public function setTiping($v)
	{

    if ($this->tiping !== $v) {
        $this->tiping = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TIPING;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtbenefiPeer::MONING;
      }
  
	} 
	
	public function setTipviv($v)
	{

    if ($this->tipviv !== $v) {
        $this->tipviv = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TIPVIV;
      }
  
	} 
	
	public function setTenviv($v)
	{

    if ($this->tenviv !== $v) {
        $this->tenviv = $v;
        $this->modifiedColumns[] = AtbenefiPeer::TENVIV;
      }
  
	} 
	
	public function setCarvivsal($v)
	{

    if ($this->carvivsal !== $v) {
        $this->carvivsal = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVSAL;
      }
  
	} 
	
	public function setCarvivcom($v)
	{

    if ($this->carvivcom !== $v) {
        $this->carvivcom = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVCOM;
      }
  
	} 
	
	public function setCarvivhab($v)
	{

    if ($this->carvivhab !== $v) {
        $this->carvivhab = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVHAB;
      }
  
	} 
	
	public function setCarvivcoc($v)
	{

    if ($this->carvivcoc !== $v) {
        $this->carvivcoc = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVCOC;
      }
  
	} 
	
	public function setCarvivban($v)
	{

    if ($this->carvivban !== $v) {
        $this->carvivban = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVBAN;
      }
  
	} 
	
	public function setCarvivpat($v)
	{

    if ($this->carvivpat !== $v) {
        $this->carvivpat = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVPAT;
      }
  
	} 
	
	public function setCarvivarever($v)
	{

    if ($this->carvivarever !== $v) {
        $this->carvivarever = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVAREVER;
      }
  
	} 
	
	public function setCarvivpis($v)
	{

    if ($this->carvivpis !== $v) {
        $this->carvivpis = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVPIS;
      }
  
	} 
	
	public function setCarvivpar($v)
	{

    if ($this->carvivpar !== $v) {
        $this->carvivpar = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVPAR;
      }
  
	} 
	
	public function setCarvivtec($v)
	{

    if ($this->carvivtec !== $v) {
        $this->carvivtec = $v;
        $this->modifiedColumns[] = AtbenefiPeer::CARVIVTEC;
      }
  
	} 
	
	public function setAnasoceco($v)
	{

    if ($this->anasoceco !== $v) {
        $this->anasoceco = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ANASOCECO;
      }
  
	} 
	
	public function setAnafam($v)
	{

    if ($this->anafam !== $v) {
        $this->anafam = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ANAFAM;
      }
  
	} 
	
	public function setOtros($v)
	{

    if ($this->otros !== $v) {
        $this->otros = $v;
        $this->modifiedColumns[] = AtbenefiPeer::OTROS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtbenefiPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedben = $rs->getString($startcol + 0);

      $this->nomben = $rs->getString($startcol + 1);

      $this->apeben = $rs->getString($startcol + 2);

      $this->fecnac = $rs->getDate($startcol + 3, null);

      $this->pais = $rs->getString($startcol + 4);

      $this->conext = $rs->getString($startcol + 5);

      $this->lugnac = $rs->getString($startcol + 6);

      $this->tipo = $rs->getString($startcol + 7);

      $this->sexo = $rs->getString($startcol + 8);

      $this->nacben = $rs->getString($startcol + 9);

      $this->dirnac = $rs->getString($startcol + 10);

      $this->estciv = $rs->getString($startcol + 11);

      $this->telhab = $rs->getString($startcol + 12);

      $this->teladihab = $rs->getString($startcol + 13);

      $this->proben = $rs->getString($startcol + 14);

      $this->atestados_id = $rs->getInt($startcol + 15);

      $this->atmunicipios_id = $rs->getInt($startcol + 16);

      $this->atparroquias_id = $rs->getInt($startcol + 17);

      $this->ciudad = $rs->getString($startcol + 18);

      $this->caserio = $rs->getString($startcol + 19);

      $this->dirhab = $rs->getString($startcol + 20);

      $this->dirtra = $rs->getString($startcol + 21);

      $this->concomben = $rs->getString($startcol + 22);

      $this->carconcomben = $rs->getString($startcol + 23);

      $this->nota = $rs->getString($startcol + 24);

      $this->grains = $rs->getString($startcol + 25);

      $this->traben = $rs->getBoolean($startcol + 26);

      $this->nomemp = $rs->getString($startcol + 27);

      $this->diremp = $rs->getString($startcol + 28);

      $this->telemp = $rs->getString($startcol + 29);

      $this->tiping = $rs->getInt($startcol + 30);

      $this->moning = $rs->getFloat($startcol + 31);

      $this->tipviv = $rs->getInt($startcol + 32);

      $this->tenviv = $rs->getInt($startcol + 33);

      $this->carvivsal = $rs->getString($startcol + 34);

      $this->carvivcom = $rs->getString($startcol + 35);

      $this->carvivhab = $rs->getString($startcol + 36);

      $this->carvivcoc = $rs->getString($startcol + 37);

      $this->carvivban = $rs->getString($startcol + 38);

      $this->carvivpat = $rs->getString($startcol + 39);

      $this->carvivarever = $rs->getString($startcol + 40);

      $this->carvivpis = $rs->getString($startcol + 41);

      $this->carvivpar = $rs->getString($startcol + 42);

      $this->carvivtec = $rs->getString($startcol + 43);

      $this->anasoceco = $rs->getString($startcol + 44);

      $this->anafam = $rs->getString($startcol + 45);

      $this->otros = $rs->getString($startcol + 46);

      $this->id = $rs->getInt($startcol + 47);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 48; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atbenefi object", $e);
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
			$con = Propel::getConnection(AtbenefiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtbenefiPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtbenefiPeer::DATABASE_NAME);
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


												
			if ($this->aAtestados !== null) {
				if ($this->aAtestados->isModified()) {
					$affectedRows += $this->aAtestados->save($con);
				}
				$this->setAtestados($this->aAtestados);
			}

			if ($this->aAtmunicipios !== null) {
				if ($this->aAtmunicipios->isModified()) {
					$affectedRows += $this->aAtmunicipios->save($con);
				}
				$this->setAtmunicipios($this->aAtmunicipios);
			}

			if ($this->aAtparroquias !== null) {
				if ($this->aAtparroquias->isModified()) {
					$affectedRows += $this->aAtparroquias->save($con);
				}
				$this->setAtparroquias($this->aAtparroquias);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtbenefiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtbenefiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtgrufams !== null) {
				foreach($this->collAtgrufams as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
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


												
			if ($this->aAtestados !== null) {
				if (!$this->aAtestados->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtestados->getValidationFailures());
				}
			}

			if ($this->aAtmunicipios !== null) {
				if (!$this->aAtmunicipios->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtmunicipios->getValidationFailures());
				}
			}

			if ($this->aAtparroquias !== null) {
				if (!$this->aAtparroquias->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtparroquias->getValidationFailures());
				}
			}


			if (($retval = AtbenefiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtgrufams !== null) {
					foreach($this->collAtgrufams as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
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
		$pos = AtbenefiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedben();
				break;
			case 1:
				return $this->getNomben();
				break;
			case 2:
				return $this->getApeben();
				break;
			case 3:
				return $this->getFecnac();
				break;
			case 4:
				return $this->getPais();
				break;
			case 5:
				return $this->getConext();
				break;
			case 6:
				return $this->getLugnac();
				break;
			case 7:
				return $this->getTipo();
				break;
			case 8:
				return $this->getSexo();
				break;
			case 9:
				return $this->getNacben();
				break;
			case 10:
				return $this->getDirnac();
				break;
			case 11:
				return $this->getEstciv();
				break;
			case 12:
				return $this->getTelhab();
				break;
			case 13:
				return $this->getTeladihab();
				break;
			case 14:
				return $this->getProben();
				break;
			case 15:
				return $this->getAtestadosId();
				break;
			case 16:
				return $this->getAtmunicipiosId();
				break;
			case 17:
				return $this->getAtparroquiasId();
				break;
			case 18:
				return $this->getCiudad();
				break;
			case 19:
				return $this->getCaserio();
				break;
			case 20:
				return $this->getDirhab();
				break;
			case 21:
				return $this->getDirtra();
				break;
			case 22:
				return $this->getConcomben();
				break;
			case 23:
				return $this->getCarconcomben();
				break;
			case 24:
				return $this->getNota();
				break;
			case 25:
				return $this->getGrains();
				break;
			case 26:
				return $this->getTraben();
				break;
			case 27:
				return $this->getNomemp();
				break;
			case 28:
				return $this->getDiremp();
				break;
			case 29:
				return $this->getTelemp();
				break;
			case 30:
				return $this->getTiping();
				break;
			case 31:
				return $this->getMoning();
				break;
			case 32:
				return $this->getTipviv();
				break;
			case 33:
				return $this->getTenviv();
				break;
			case 34:
				return $this->getCarvivsal();
				break;
			case 35:
				return $this->getCarvivcom();
				break;
			case 36:
				return $this->getCarvivhab();
				break;
			case 37:
				return $this->getCarvivcoc();
				break;
			case 38:
				return $this->getCarvivban();
				break;
			case 39:
				return $this->getCarvivpat();
				break;
			case 40:
				return $this->getCarvivarever();
				break;
			case 41:
				return $this->getCarvivpis();
				break;
			case 42:
				return $this->getCarvivpar();
				break;
			case 43:
				return $this->getCarvivtec();
				break;
			case 44:
				return $this->getAnasoceco();
				break;
			case 45:
				return $this->getAnafam();
				break;
			case 46:
				return $this->getOtros();
				break;
			case 47:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtbenefiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedben(),
			$keys[1] => $this->getNomben(),
			$keys[2] => $this->getApeben(),
			$keys[3] => $this->getFecnac(),
			$keys[4] => $this->getPais(),
			$keys[5] => $this->getConext(),
			$keys[6] => $this->getLugnac(),
			$keys[7] => $this->getTipo(),
			$keys[8] => $this->getSexo(),
			$keys[9] => $this->getNacben(),
			$keys[10] => $this->getDirnac(),
			$keys[11] => $this->getEstciv(),
			$keys[12] => $this->getTelhab(),
			$keys[13] => $this->getTeladihab(),
			$keys[14] => $this->getProben(),
			$keys[15] => $this->getAtestadosId(),
			$keys[16] => $this->getAtmunicipiosId(),
			$keys[17] => $this->getAtparroquiasId(),
			$keys[18] => $this->getCiudad(),
			$keys[19] => $this->getCaserio(),
			$keys[20] => $this->getDirhab(),
			$keys[21] => $this->getDirtra(),
			$keys[22] => $this->getConcomben(),
			$keys[23] => $this->getCarconcomben(),
			$keys[24] => $this->getNota(),
			$keys[25] => $this->getGrains(),
			$keys[26] => $this->getTraben(),
			$keys[27] => $this->getNomemp(),
			$keys[28] => $this->getDiremp(),
			$keys[29] => $this->getTelemp(),
			$keys[30] => $this->getTiping(),
			$keys[31] => $this->getMoning(),
			$keys[32] => $this->getTipviv(),
			$keys[33] => $this->getTenviv(),
			$keys[34] => $this->getCarvivsal(),
			$keys[35] => $this->getCarvivcom(),
			$keys[36] => $this->getCarvivhab(),
			$keys[37] => $this->getCarvivcoc(),
			$keys[38] => $this->getCarvivban(),
			$keys[39] => $this->getCarvivpat(),
			$keys[40] => $this->getCarvivarever(),
			$keys[41] => $this->getCarvivpis(),
			$keys[42] => $this->getCarvivpar(),
			$keys[43] => $this->getCarvivtec(),
			$keys[44] => $this->getAnasoceco(),
			$keys[45] => $this->getAnafam(),
			$keys[46] => $this->getOtros(),
			$keys[47] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtbenefiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedben($value);
				break;
			case 1:
				$this->setNomben($value);
				break;
			case 2:
				$this->setApeben($value);
				break;
			case 3:
				$this->setFecnac($value);
				break;
			case 4:
				$this->setPais($value);
				break;
			case 5:
				$this->setConext($value);
				break;
			case 6:
				$this->setLugnac($value);
				break;
			case 7:
				$this->setTipo($value);
				break;
			case 8:
				$this->setSexo($value);
				break;
			case 9:
				$this->setNacben($value);
				break;
			case 10:
				$this->setDirnac($value);
				break;
			case 11:
				$this->setEstciv($value);
				break;
			case 12:
				$this->setTelhab($value);
				break;
			case 13:
				$this->setTeladihab($value);
				break;
			case 14:
				$this->setProben($value);
				break;
			case 15:
				$this->setAtestadosId($value);
				break;
			case 16:
				$this->setAtmunicipiosId($value);
				break;
			case 17:
				$this->setAtparroquiasId($value);
				break;
			case 18:
				$this->setCiudad($value);
				break;
			case 19:
				$this->setCaserio($value);
				break;
			case 20:
				$this->setDirhab($value);
				break;
			case 21:
				$this->setDirtra($value);
				break;
			case 22:
				$this->setConcomben($value);
				break;
			case 23:
				$this->setCarconcomben($value);
				break;
			case 24:
				$this->setNota($value);
				break;
			case 25:
				$this->setGrains($value);
				break;
			case 26:
				$this->setTraben($value);
				break;
			case 27:
				$this->setNomemp($value);
				break;
			case 28:
				$this->setDiremp($value);
				break;
			case 29:
				$this->setTelemp($value);
				break;
			case 30:
				$this->setTiping($value);
				break;
			case 31:
				$this->setMoning($value);
				break;
			case 32:
				$this->setTipviv($value);
				break;
			case 33:
				$this->setTenviv($value);
				break;
			case 34:
				$this->setCarvivsal($value);
				break;
			case 35:
				$this->setCarvivcom($value);
				break;
			case 36:
				$this->setCarvivhab($value);
				break;
			case 37:
				$this->setCarvivcoc($value);
				break;
			case 38:
				$this->setCarvivban($value);
				break;
			case 39:
				$this->setCarvivpat($value);
				break;
			case 40:
				$this->setCarvivarever($value);
				break;
			case 41:
				$this->setCarvivpis($value);
				break;
			case 42:
				$this->setCarvivpar($value);
				break;
			case 43:
				$this->setCarvivtec($value);
				break;
			case 44:
				$this->setAnasoceco($value);
				break;
			case 45:
				$this->setAnafam($value);
				break;
			case 46:
				$this->setOtros($value);
				break;
			case 47:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtbenefiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedben($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApeben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecnac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPais($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConext($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLugnac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSexo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNacben($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirnac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEstciv($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelhab($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTeladihab($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setProben($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAtestadosId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAtmunicipiosId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAtparroquiasId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCiudad($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCaserio($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDirhab($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDirtra($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setConcomben($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCarconcomben($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNota($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setGrains($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTraben($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNomemp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDiremp($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTelemp($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setTiping($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setMoning($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setTipviv($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setTenviv($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCarvivsal($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCarvivcom($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCarvivhab($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCarvivcoc($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCarvivban($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCarvivpat($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCarvivarever($arr[$keys[40]]);
		if (array_key_exists($keys[41], $arr)) $this->setCarvivpis($arr[$keys[41]]);
		if (array_key_exists($keys[42], $arr)) $this->setCarvivpar($arr[$keys[42]]);
		if (array_key_exists($keys[43], $arr)) $this->setCarvivtec($arr[$keys[43]]);
		if (array_key_exists($keys[44], $arr)) $this->setAnasoceco($arr[$keys[44]]);
		if (array_key_exists($keys[45], $arr)) $this->setAnafam($arr[$keys[45]]);
		if (array_key_exists($keys[46], $arr)) $this->setOtros($arr[$keys[46]]);
		if (array_key_exists($keys[47], $arr)) $this->setId($arr[$keys[47]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtbenefiPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtbenefiPeer::CEDBEN)) $criteria->add(AtbenefiPeer::CEDBEN, $this->cedben);
		if ($this->isColumnModified(AtbenefiPeer::NOMBEN)) $criteria->add(AtbenefiPeer::NOMBEN, $this->nomben);
		if ($this->isColumnModified(AtbenefiPeer::APEBEN)) $criteria->add(AtbenefiPeer::APEBEN, $this->apeben);
		if ($this->isColumnModified(AtbenefiPeer::FECNAC)) $criteria->add(AtbenefiPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(AtbenefiPeer::PAIS)) $criteria->add(AtbenefiPeer::PAIS, $this->pais);
		if ($this->isColumnModified(AtbenefiPeer::CONEXT)) $criteria->add(AtbenefiPeer::CONEXT, $this->conext);
		if ($this->isColumnModified(AtbenefiPeer::LUGNAC)) $criteria->add(AtbenefiPeer::LUGNAC, $this->lugnac);
		if ($this->isColumnModified(AtbenefiPeer::TIPO)) $criteria->add(AtbenefiPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(AtbenefiPeer::SEXO)) $criteria->add(AtbenefiPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(AtbenefiPeer::NACBEN)) $criteria->add(AtbenefiPeer::NACBEN, $this->nacben);
		if ($this->isColumnModified(AtbenefiPeer::DIRNAC)) $criteria->add(AtbenefiPeer::DIRNAC, $this->dirnac);
		if ($this->isColumnModified(AtbenefiPeer::ESTCIV)) $criteria->add(AtbenefiPeer::ESTCIV, $this->estciv);
		if ($this->isColumnModified(AtbenefiPeer::TELHAB)) $criteria->add(AtbenefiPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(AtbenefiPeer::TELADIHAB)) $criteria->add(AtbenefiPeer::TELADIHAB, $this->teladihab);
		if ($this->isColumnModified(AtbenefiPeer::PROBEN)) $criteria->add(AtbenefiPeer::PROBEN, $this->proben);
		if ($this->isColumnModified(AtbenefiPeer::ATESTADOS_ID)) $criteria->add(AtbenefiPeer::ATESTADOS_ID, $this->atestados_id);
		if ($this->isColumnModified(AtbenefiPeer::ATMUNICIPIOS_ID)) $criteria->add(AtbenefiPeer::ATMUNICIPIOS_ID, $this->atmunicipios_id);
		if ($this->isColumnModified(AtbenefiPeer::ATPARROQUIAS_ID)) $criteria->add(AtbenefiPeer::ATPARROQUIAS_ID, $this->atparroquias_id);
		if ($this->isColumnModified(AtbenefiPeer::CIUDAD)) $criteria->add(AtbenefiPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(AtbenefiPeer::CASERIO)) $criteria->add(AtbenefiPeer::CASERIO, $this->caserio);
		if ($this->isColumnModified(AtbenefiPeer::DIRHAB)) $criteria->add(AtbenefiPeer::DIRHAB, $this->dirhab);
		if ($this->isColumnModified(AtbenefiPeer::DIRTRA)) $criteria->add(AtbenefiPeer::DIRTRA, $this->dirtra);
		if ($this->isColumnModified(AtbenefiPeer::CONCOMBEN)) $criteria->add(AtbenefiPeer::CONCOMBEN, $this->concomben);
		if ($this->isColumnModified(AtbenefiPeer::CARCONCOMBEN)) $criteria->add(AtbenefiPeer::CARCONCOMBEN, $this->carconcomben);
		if ($this->isColumnModified(AtbenefiPeer::NOTA)) $criteria->add(AtbenefiPeer::NOTA, $this->nota);
		if ($this->isColumnModified(AtbenefiPeer::GRAINS)) $criteria->add(AtbenefiPeer::GRAINS, $this->grains);
		if ($this->isColumnModified(AtbenefiPeer::TRABEN)) $criteria->add(AtbenefiPeer::TRABEN, $this->traben);
		if ($this->isColumnModified(AtbenefiPeer::NOMEMP)) $criteria->add(AtbenefiPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(AtbenefiPeer::DIREMP)) $criteria->add(AtbenefiPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(AtbenefiPeer::TELEMP)) $criteria->add(AtbenefiPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(AtbenefiPeer::TIPING)) $criteria->add(AtbenefiPeer::TIPING, $this->tiping);
		if ($this->isColumnModified(AtbenefiPeer::MONING)) $criteria->add(AtbenefiPeer::MONING, $this->moning);
		if ($this->isColumnModified(AtbenefiPeer::TIPVIV)) $criteria->add(AtbenefiPeer::TIPVIV, $this->tipviv);
		if ($this->isColumnModified(AtbenefiPeer::TENVIV)) $criteria->add(AtbenefiPeer::TENVIV, $this->tenviv);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVSAL)) $criteria->add(AtbenefiPeer::CARVIVSAL, $this->carvivsal);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVCOM)) $criteria->add(AtbenefiPeer::CARVIVCOM, $this->carvivcom);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVHAB)) $criteria->add(AtbenefiPeer::CARVIVHAB, $this->carvivhab);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVCOC)) $criteria->add(AtbenefiPeer::CARVIVCOC, $this->carvivcoc);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVBAN)) $criteria->add(AtbenefiPeer::CARVIVBAN, $this->carvivban);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVPAT)) $criteria->add(AtbenefiPeer::CARVIVPAT, $this->carvivpat);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVAREVER)) $criteria->add(AtbenefiPeer::CARVIVAREVER, $this->carvivarever);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVPIS)) $criteria->add(AtbenefiPeer::CARVIVPIS, $this->carvivpis);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVPAR)) $criteria->add(AtbenefiPeer::CARVIVPAR, $this->carvivpar);
		if ($this->isColumnModified(AtbenefiPeer::CARVIVTEC)) $criteria->add(AtbenefiPeer::CARVIVTEC, $this->carvivtec);
		if ($this->isColumnModified(AtbenefiPeer::ANASOCECO)) $criteria->add(AtbenefiPeer::ANASOCECO, $this->anasoceco);
		if ($this->isColumnModified(AtbenefiPeer::ANAFAM)) $criteria->add(AtbenefiPeer::ANAFAM, $this->anafam);
		if ($this->isColumnModified(AtbenefiPeer::OTROS)) $criteria->add(AtbenefiPeer::OTROS, $this->otros);
		if ($this->isColumnModified(AtbenefiPeer::ID)) $criteria->add(AtbenefiPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtbenefiPeer::DATABASE_NAME);

		$criteria->add(AtbenefiPeer::ID, $this->id);

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

		$copyObj->setCedben($this->cedben);

		$copyObj->setNomben($this->nomben);

		$copyObj->setApeben($this->apeben);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setPais($this->pais);

		$copyObj->setConext($this->conext);

		$copyObj->setLugnac($this->lugnac);

		$copyObj->setTipo($this->tipo);

		$copyObj->setSexo($this->sexo);

		$copyObj->setNacben($this->nacben);

		$copyObj->setDirnac($this->dirnac);

		$copyObj->setEstciv($this->estciv);

		$copyObj->setTelhab($this->telhab);

		$copyObj->setTeladihab($this->teladihab);

		$copyObj->setProben($this->proben);

		$copyObj->setAtestadosId($this->atestados_id);

		$copyObj->setAtmunicipiosId($this->atmunicipios_id);

		$copyObj->setAtparroquiasId($this->atparroquias_id);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCaserio($this->caserio);

		$copyObj->setDirhab($this->dirhab);

		$copyObj->setDirtra($this->dirtra);

		$copyObj->setConcomben($this->concomben);

		$copyObj->setCarconcomben($this->carconcomben);

		$copyObj->setNota($this->nota);

		$copyObj->setGrains($this->grains);

		$copyObj->setTraben($this->traben);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setTiping($this->tiping);

		$copyObj->setMoning($this->moning);

		$copyObj->setTipviv($this->tipviv);

		$copyObj->setTenviv($this->tenviv);

		$copyObj->setCarvivsal($this->carvivsal);

		$copyObj->setCarvivcom($this->carvivcom);

		$copyObj->setCarvivhab($this->carvivhab);

		$copyObj->setCarvivcoc($this->carvivcoc);

		$copyObj->setCarvivban($this->carvivban);

		$copyObj->setCarvivpat($this->carvivpat);

		$copyObj->setCarvivarever($this->carvivarever);

		$copyObj->setCarvivpis($this->carvivpis);

		$copyObj->setCarvivpar($this->carvivpar);

		$copyObj->setCarvivtec($this->carvivtec);

		$copyObj->setAnasoceco($this->anasoceco);

		$copyObj->setAnafam($this->anafam);

		$copyObj->setOtros($this->otros);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtgrufams() as $relObj) {
				$copyObj->addAtgrufam($relObj->copy($deepCopy));
			}

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
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
			self::$peer = new AtbenefiPeer();
		}
		return self::$peer;
	}

	
	public function setAtestados($v)
	{


		if ($v === null) {
			$this->setAtestadosId(NULL);
		} else {
			$this->setAtestadosId($v->getId());
		}


		$this->aAtestados = $v;
	}


	
	public function getAtestados($con = null)
	{
		if ($this->aAtestados === null && ($this->atestados_id !== null)) {
						include_once 'lib/model/om/BaseAtestadosPeer.php';

			$this->aAtestados = AtestadosPeer::retrieveByPK($this->atestados_id, $con);

			
		}
		return $this->aAtestados;
	}

	
	public function setAtmunicipios($v)
	{


		if ($v === null) {
			$this->setAtmunicipiosId(NULL);
		} else {
			$this->setAtmunicipiosId($v->getId());
		}


		$this->aAtmunicipios = $v;
	}


	
	public function getAtmunicipios($con = null)
	{
		if ($this->aAtmunicipios === null && ($this->atmunicipios_id !== null)) {
						include_once 'lib/model/om/BaseAtmunicipiosPeer.php';

			$this->aAtmunicipios = AtmunicipiosPeer::retrieveByPK($this->atmunicipios_id, $con);

			
		}
		return $this->aAtmunicipios;
	}

	
	public function setAtparroquias($v)
	{


		if ($v === null) {
			$this->setAtparroquiasId(NULL);
		} else {
			$this->setAtparroquiasId($v->getId());
		}


		$this->aAtparroquias = $v;
	}


	
	public function getAtparroquias($con = null)
	{
		if ($this->aAtparroquias === null && ($this->atparroquias_id !== null)) {
						include_once 'lib/model/om/BaseAtparroquiasPeer.php';

			$this->aAtparroquias = AtparroquiasPeer::retrieveByPK($this->atparroquias_id, $con);

			
		}
		return $this->aAtparroquias;
	}

	
	public function initAtgrufams()
	{
		if ($this->collAtgrufams === null) {
			$this->collAtgrufams = array();
		}
	}

	
	public function getAtgrufams($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtgrufamPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtgrufams === null) {
			if ($this->isNew()) {
			   $this->collAtgrufams = array();
			} else {

				$criteria->add(AtgrufamPeer::ATBENEFI_ID, $this->getId());

				AtgrufamPeer::addSelectColumns($criteria);
				$this->collAtgrufams = AtgrufamPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtgrufamPeer::ATBENEFI_ID, $this->getId());

				AtgrufamPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtgrufamCriteria) || !$this->lastAtgrufamCriteria->equals($criteria)) {
					$this->collAtgrufams = AtgrufamPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtgrufamCriteria = $criteria;
		return $this->collAtgrufams;
	}

	
	public function countAtgrufams($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtgrufamPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtgrufamPeer::ATBENEFI_ID, $this->getId());

		return AtgrufamPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtgrufam(Atgrufam $l)
	{
		$this->collAtgrufams[] = $l;
		$l->setAtbenefi($this);
	}

	
	public function initAtayudass()
	{
		if ($this->collAtayudass === null) {
			$this->collAtayudass = array();
		}
	}

	
	public function getAtayudass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
			   $this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
					$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtayudasCriteria = $criteria;
		return $this->collAtayudass;
	}

	
	public function countAtayudass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtbenefi($this);
	}


	
	public function getAtayudassJoinAtsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtsolici($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}


	
	public function getAtayudassJoinAttrasoc($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudass === null) {
			if ($this->isNew()) {
				$this->collAtayudass = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}

} 