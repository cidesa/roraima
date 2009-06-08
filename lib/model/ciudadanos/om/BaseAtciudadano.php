<?php


abstract class BaseAtciudadano extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedciu;


	
	protected $nomciu;


	
	protected $apeciu;


	
	protected $nacciu;


	
	protected $pais;


	
	protected $conext;


	
	protected $lugnac;


	
	protected $tipo;


	
	protected $sexo;


	
	protected $fecnac;


	
	protected $dirnac;


	
	protected $estciv;


	
	protected $telhab;


	
	protected $teladihab;


	
	protected $prociu;


	
	protected $atestados_id;


	
	protected $atmunicipios_id;


	
	protected $atparroquias_id;


	
	protected $ciudad;


	
	protected $caserio;


	
	protected $dirhab;


	
	protected $dirtra;


	
	protected $concomciu;


	
	protected $carconcomciu;


	
	protected $nota;


	
	protected $grains;


	
	protected $traciu;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $attiping_id;


	
	protected $moning;


	
	protected $atinsrefier_id;


	
	protected $ayusolant;


	
	protected $insayuant;


	
	protected $segpri;


	
	protected $attipproviv_id;


	
	protected $attipviv_id;


	
	protected $id;

	
	protected $aAtestados;

	
	protected $aAtmunicipios;

	
	protected $aAtparroquias;

	
	protected $aAttiping;

	
	protected $aAtinsrefier;

	
	protected $aAttipproviv;

	
	protected $aAttipviv;

	
	protected $collAtestsocecos;

	
	protected $lastAtestsocecoCriteria = null;

	
	protected $collAtgrufams;

	
	protected $lastAtgrufamCriteria = null;

	
	protected $collAtayudassRelatedByAtsolici;

	
	protected $lastAtayudasRelatedByAtsoliciCriteria = null;

	
	protected $collAtayudassRelatedByAtbenefi;

	
	protected $lastAtayudasRelatedByAtbenefiCriteria = null;

	
	protected $collAtaudienciass;

	
	protected $lastAtaudienciasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedciu()
  {

    return trim($this->cedciu);

  }
  
  public function getNomciu()
  {

    return trim($this->nomciu);

  }
  
  public function getApeciu()
  {

    return trim($this->apeciu);

  }
  
  public function getNacciu()
  {

    return trim($this->nacciu);

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
  
  public function getProciu()
  {

    return trim($this->prociu);

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
  
  public function getConcomciu()
  {

    return trim($this->concomciu);

  }
  
  public function getCarconcomciu()
  {

    return trim($this->carconcomciu);

  }
  
  public function getNota()
  {

    return trim($this->nota);

  }
  
  public function getGrains()
  {

    return trim($this->grains);

  }
  
  public function getTraciu()
  {

    return $this->traciu;

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
  
  public function getAttipingId()
  {

    return $this->attiping_id;

  }
  
  public function getMoning($val=false)
  {

    if($val) return number_format($this->moning,2,',','.');
    else return $this->moning;

  }
  
  public function getAtinsrefierId()
  {

    return $this->atinsrefier_id;

  }
  
  public function getAyusolant()
  {

    return trim($this->ayusolant);

  }
  
  public function getInsayuant()
  {

    return trim($this->insayuant);

  }
  
  public function getSegpri()
  {

    return $this->segpri;

  }
  
  public function getAttipprovivId()
  {

    return $this->attipproviv_id;

  }
  
  public function getAttipvivId()
  {

    return $this->attipviv_id;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedciu($v)
	{

    if ($this->cedciu !== $v) {
        $this->cedciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::CEDCIU;
      }
  
	} 
	
	public function setNomciu($v)
	{

    if ($this->nomciu !== $v) {
        $this->nomciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::NOMCIU;
      }
  
	} 
	
	public function setApeciu($v)
	{

    if ($this->apeciu !== $v) {
        $this->apeciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::APECIU;
      }
  
	} 
	
	public function setNacciu($v)
	{

    if ($this->nacciu !== $v) {
        $this->nacciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::NACCIU;
      }
  
	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::PAIS;
      }
  
	} 
	
	public function setConext($v)
	{

    if ($this->conext !== $v) {
        $this->conext = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::CONEXT;
      }
  
	} 
	
	public function setLugnac($v)
	{

    if ($this->lugnac !== $v) {
        $this->lugnac = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::LUGNAC;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::TIPO;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::SEXO;
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
      $this->modifiedColumns[] = AtciudadanoPeer::FECNAC;
    }

	} 
	
	public function setDirnac($v)
	{

    if ($this->dirnac !== $v) {
        $this->dirnac = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::DIRNAC;
      }
  
	} 
	
	public function setEstciv($v)
	{

    if ($this->estciv !== $v) {
        $this->estciv = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ESTCIV;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::TELHAB;
      }
  
	} 
	
	public function setTeladihab($v)
	{

    if ($this->teladihab !== $v) {
        $this->teladihab = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::TELADIHAB;
      }
  
	} 
	
	public function setProciu($v)
	{

    if ($this->prociu !== $v) {
        $this->prociu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::PROCIU;
      }
  
	} 
	
	public function setAtestadosId($v)
	{

    if ($this->atestados_id !== $v) {
        $this->atestados_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATESTADOS_ID;
      }
  
		if ($this->aAtestados !== null && $this->aAtestados->getId() !== $v) {
			$this->aAtestados = null;
		}

	} 
	
	public function setAtmunicipiosId($v)
	{

    if ($this->atmunicipios_id !== $v) {
        $this->atmunicipios_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATMUNICIPIOS_ID;
      }
  
		if ($this->aAtmunicipios !== null && $this->aAtmunicipios->getId() !== $v) {
			$this->aAtmunicipios = null;
		}

	} 
	
	public function setAtparroquiasId($v)
	{

    if ($this->atparroquias_id !== $v) {
        $this->atparroquias_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATPARROQUIAS_ID;
      }
  
		if ($this->aAtparroquias !== null && $this->aAtparroquias->getId() !== $v) {
			$this->aAtparroquias = null;
		}

	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::CIUDAD;
      }
  
	} 
	
	public function setCaserio($v)
	{

    if ($this->caserio !== $v) {
        $this->caserio = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::CASERIO;
      }
  
	} 
	
	public function setDirhab($v)
	{

    if ($this->dirhab !== $v) {
        $this->dirhab = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::DIRHAB;
      }
  
	} 
	
	public function setDirtra($v)
	{

    if ($this->dirtra !== $v) {
        $this->dirtra = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::DIRTRA;
      }
  
	} 
	
	public function setConcomciu($v)
	{

    if ($this->concomciu !== $v) {
        $this->concomciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::CONCOMCIU;
      }
  
	} 
	
	public function setCarconcomciu($v)
	{

    if ($this->carconcomciu !== $v) {
        $this->carconcomciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::CARCONCOMCIU;
      }
  
	} 
	
	public function setNota($v)
	{

    if ($this->nota !== $v) {
        $this->nota = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::NOTA;
      }
  
	} 
	
	public function setGrains($v)
	{

    if ($this->grains !== $v) {
        $this->grains = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::GRAINS;
      }
  
	} 
	
	public function setTraciu($v)
	{

    if ($this->traciu !== $v) {
        $this->traciu = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::TRACIU;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::TELEMP;
      }
  
	} 
	
	public function setAttipingId($v)
	{

    if ($this->attiping_id !== $v) {
        $this->attiping_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATTIPING_ID;
      }
  
		if ($this->aAttiping !== null && $this->aAttiping->getId() !== $v) {
			$this->aAttiping = null;
		}

	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtciudadanoPeer::MONING;
      }
  
	} 
	
	public function setAtinsrefierId($v)
	{

    if ($this->atinsrefier_id !== $v) {
        $this->atinsrefier_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATINSREFIER_ID;
      }
  
		if ($this->aAtinsrefier !== null && $this->aAtinsrefier->getId() !== $v) {
			$this->aAtinsrefier = null;
		}

	} 
	
	public function setAyusolant($v)
	{

    if ($this->ayusolant !== $v) {
        $this->ayusolant = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::AYUSOLANT;
      }
  
	} 
	
	public function setInsayuant($v)
	{

    if ($this->insayuant !== $v) {
        $this->insayuant = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::INSAYUANT;
      }
  
	} 
	
	public function setSegpri($v)
	{

    if ($this->segpri !== $v) {
        $this->segpri = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::SEGPRI;
      }
  
	} 
	
	public function setAttipprovivId($v)
	{

    if ($this->attipproviv_id !== $v) {
        $this->attipproviv_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATTIPPROVIV_ID;
      }
  
		if ($this->aAttipproviv !== null && $this->aAttipproviv->getId() !== $v) {
			$this->aAttipproviv = null;
		}

	} 
	
	public function setAttipvivId($v)
	{

    if ($this->attipviv_id !== $v) {
        $this->attipviv_id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ATTIPVIV_ID;
      }
  
		if ($this->aAttipviv !== null && $this->aAttipviv->getId() !== $v) {
			$this->aAttipviv = null;
		}

	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtciudadanoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedciu = $rs->getString($startcol + 0);

      $this->nomciu = $rs->getString($startcol + 1);

      $this->apeciu = $rs->getString($startcol + 2);

      $this->nacciu = $rs->getString($startcol + 3);

      $this->pais = $rs->getString($startcol + 4);

      $this->conext = $rs->getString($startcol + 5);

      $this->lugnac = $rs->getString($startcol + 6);

      $this->tipo = $rs->getString($startcol + 7);

      $this->sexo = $rs->getString($startcol + 8);

      $this->fecnac = $rs->getDate($startcol + 9, null);

      $this->dirnac = $rs->getString($startcol + 10);

      $this->estciv = $rs->getString($startcol + 11);

      $this->telhab = $rs->getString($startcol + 12);

      $this->teladihab = $rs->getString($startcol + 13);

      $this->prociu = $rs->getString($startcol + 14);

      $this->atestados_id = $rs->getInt($startcol + 15);

      $this->atmunicipios_id = $rs->getInt($startcol + 16);

      $this->atparroquias_id = $rs->getInt($startcol + 17);

      $this->ciudad = $rs->getString($startcol + 18);

      $this->caserio = $rs->getString($startcol + 19);

      $this->dirhab = $rs->getString($startcol + 20);

      $this->dirtra = $rs->getString($startcol + 21);

      $this->concomciu = $rs->getString($startcol + 22);

      $this->carconcomciu = $rs->getString($startcol + 23);

      $this->nota = $rs->getString($startcol + 24);

      $this->grains = $rs->getString($startcol + 25);

      $this->traciu = $rs->getBoolean($startcol + 26);

      $this->nomemp = $rs->getString($startcol + 27);

      $this->diremp = $rs->getString($startcol + 28);

      $this->telemp = $rs->getString($startcol + 29);

      $this->attiping_id = $rs->getInt($startcol + 30);

      $this->moning = $rs->getFloat($startcol + 31);

      $this->atinsrefier_id = $rs->getInt($startcol + 32);

      $this->ayusolant = $rs->getString($startcol + 33);

      $this->insayuant = $rs->getString($startcol + 34);

      $this->segpri = $rs->getBoolean($startcol + 35);

      $this->attipproviv_id = $rs->getInt($startcol + 36);

      $this->attipviv_id = $rs->getInt($startcol + 37);

      $this->id = $rs->getInt($startcol + 38);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 39; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atciudadano object", $e);
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
			$con = Propel::getConnection(AtciudadanoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtciudadanoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtciudadanoPeer::DATABASE_NAME);
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

			if ($this->aAttiping !== null) {
				if ($this->aAttiping->isModified()) {
					$affectedRows += $this->aAttiping->save($con);
				}
				$this->setAttiping($this->aAttiping);
			}

			if ($this->aAtinsrefier !== null) {
				if ($this->aAtinsrefier->isModified()) {
					$affectedRows += $this->aAtinsrefier->save($con);
				}
				$this->setAtinsrefier($this->aAtinsrefier);
			}

			if ($this->aAttipproviv !== null) {
				if ($this->aAttipproviv->isModified()) {
					$affectedRows += $this->aAttipproviv->save($con);
				}
				$this->setAttipproviv($this->aAttipproviv);
			}

			if ($this->aAttipviv !== null) {
				if ($this->aAttipviv->isModified()) {
					$affectedRows += $this->aAttipviv->save($con);
				}
				$this->setAttipviv($this->aAttipviv);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtciudadanoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtciudadanoPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtestsocecos !== null) {
				foreach($this->collAtestsocecos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtgrufams !== null) {
				foreach($this->collAtgrufams as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtayudassRelatedByAtsolici !== null) {
				foreach($this->collAtayudassRelatedByAtsolici as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtayudassRelatedByAtbenefi !== null) {
				foreach($this->collAtayudassRelatedByAtbenefi as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAtaudienciass !== null) {
				foreach($this->collAtaudienciass as $referrerFK) {
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

			if ($this->aAttiping !== null) {
				if (!$this->aAttiping->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttiping->getValidationFailures());
				}
			}

			if ($this->aAtinsrefier !== null) {
				if (!$this->aAtinsrefier->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtinsrefier->getValidationFailures());
				}
			}

			if ($this->aAttipproviv !== null) {
				if (!$this->aAttipproviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipproviv->getValidationFailures());
				}
			}

			if ($this->aAttipviv !== null) {
				if (!$this->aAttipviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipviv->getValidationFailures());
				}
			}


			if (($retval = AtciudadanoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtestsocecos !== null) {
					foreach($this->collAtestsocecos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtgrufams !== null) {
					foreach($this->collAtgrufams as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtayudassRelatedByAtsolici !== null) {
					foreach($this->collAtayudassRelatedByAtsolici as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtayudassRelatedByAtbenefi !== null) {
					foreach($this->collAtayudassRelatedByAtbenefi as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAtaudienciass !== null) {
					foreach($this->collAtaudienciass as $referrerFK) {
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
		$pos = AtciudadanoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedciu();
				break;
			case 1:
				return $this->getNomciu();
				break;
			case 2:
				return $this->getApeciu();
				break;
			case 3:
				return $this->getNacciu();
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
				return $this->getFecnac();
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
				return $this->getProciu();
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
				return $this->getConcomciu();
				break;
			case 23:
				return $this->getCarconcomciu();
				break;
			case 24:
				return $this->getNota();
				break;
			case 25:
				return $this->getGrains();
				break;
			case 26:
				return $this->getTraciu();
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
				return $this->getAttipingId();
				break;
			case 31:
				return $this->getMoning();
				break;
			case 32:
				return $this->getAtinsrefierId();
				break;
			case 33:
				return $this->getAyusolant();
				break;
			case 34:
				return $this->getInsayuant();
				break;
			case 35:
				return $this->getSegpri();
				break;
			case 36:
				return $this->getAttipprovivId();
				break;
			case 37:
				return $this->getAttipvivId();
				break;
			case 38:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtciudadanoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedciu(),
			$keys[1] => $this->getNomciu(),
			$keys[2] => $this->getApeciu(),
			$keys[3] => $this->getNacciu(),
			$keys[4] => $this->getPais(),
			$keys[5] => $this->getConext(),
			$keys[6] => $this->getLugnac(),
			$keys[7] => $this->getTipo(),
			$keys[8] => $this->getSexo(),
			$keys[9] => $this->getFecnac(),
			$keys[10] => $this->getDirnac(),
			$keys[11] => $this->getEstciv(),
			$keys[12] => $this->getTelhab(),
			$keys[13] => $this->getTeladihab(),
			$keys[14] => $this->getProciu(),
			$keys[15] => $this->getAtestadosId(),
			$keys[16] => $this->getAtmunicipiosId(),
			$keys[17] => $this->getAtparroquiasId(),
			$keys[18] => $this->getCiudad(),
			$keys[19] => $this->getCaserio(),
			$keys[20] => $this->getDirhab(),
			$keys[21] => $this->getDirtra(),
			$keys[22] => $this->getConcomciu(),
			$keys[23] => $this->getCarconcomciu(),
			$keys[24] => $this->getNota(),
			$keys[25] => $this->getGrains(),
			$keys[26] => $this->getTraciu(),
			$keys[27] => $this->getNomemp(),
			$keys[28] => $this->getDiremp(),
			$keys[29] => $this->getTelemp(),
			$keys[30] => $this->getAttipingId(),
			$keys[31] => $this->getMoning(),
			$keys[32] => $this->getAtinsrefierId(),
			$keys[33] => $this->getAyusolant(),
			$keys[34] => $this->getInsayuant(),
			$keys[35] => $this->getSegpri(),
			$keys[36] => $this->getAttipprovivId(),
			$keys[37] => $this->getAttipvivId(),
			$keys[38] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtciudadanoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedciu($value);
				break;
			case 1:
				$this->setNomciu($value);
				break;
			case 2:
				$this->setApeciu($value);
				break;
			case 3:
				$this->setNacciu($value);
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
				$this->setFecnac($value);
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
				$this->setProciu($value);
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
				$this->setConcomciu($value);
				break;
			case 23:
				$this->setCarconcomciu($value);
				break;
			case 24:
				$this->setNota($value);
				break;
			case 25:
				$this->setGrains($value);
				break;
			case 26:
				$this->setTraciu($value);
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
				$this->setAttipingId($value);
				break;
			case 31:
				$this->setMoning($value);
				break;
			case 32:
				$this->setAtinsrefierId($value);
				break;
			case 33:
				$this->setAyusolant($value);
				break;
			case 34:
				$this->setInsayuant($value);
				break;
			case 35:
				$this->setSegpri($value);
				break;
			case 36:
				$this->setAttipprovivId($value);
				break;
			case 37:
				$this->setAttipvivId($value);
				break;
			case 38:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtciudadanoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedciu($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomciu($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApeciu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNacciu($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPais($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setConext($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLugnac($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSexo($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFecnac($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirnac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEstciv($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelhab($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTeladihab($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setProciu($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAtestadosId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAtmunicipiosId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAtparroquiasId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCiudad($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCaserio($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDirhab($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDirtra($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setConcomciu($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCarconcomciu($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNota($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setGrains($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTraciu($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNomemp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDiremp($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTelemp($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setAttipingId($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setMoning($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setAtinsrefierId($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setAyusolant($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setInsayuant($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setSegpri($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setAttipprovivId($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setAttipvivId($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setId($arr[$keys[38]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtciudadanoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtciudadanoPeer::CEDCIU)) $criteria->add(AtciudadanoPeer::CEDCIU, $this->cedciu);
		if ($this->isColumnModified(AtciudadanoPeer::NOMCIU)) $criteria->add(AtciudadanoPeer::NOMCIU, $this->nomciu);
		if ($this->isColumnModified(AtciudadanoPeer::APECIU)) $criteria->add(AtciudadanoPeer::APECIU, $this->apeciu);
		if ($this->isColumnModified(AtciudadanoPeer::NACCIU)) $criteria->add(AtciudadanoPeer::NACCIU, $this->nacciu);
		if ($this->isColumnModified(AtciudadanoPeer::PAIS)) $criteria->add(AtciudadanoPeer::PAIS, $this->pais);
		if ($this->isColumnModified(AtciudadanoPeer::CONEXT)) $criteria->add(AtciudadanoPeer::CONEXT, $this->conext);
		if ($this->isColumnModified(AtciudadanoPeer::LUGNAC)) $criteria->add(AtciudadanoPeer::LUGNAC, $this->lugnac);
		if ($this->isColumnModified(AtciudadanoPeer::TIPO)) $criteria->add(AtciudadanoPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(AtciudadanoPeer::SEXO)) $criteria->add(AtciudadanoPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(AtciudadanoPeer::FECNAC)) $criteria->add(AtciudadanoPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(AtciudadanoPeer::DIRNAC)) $criteria->add(AtciudadanoPeer::DIRNAC, $this->dirnac);
		if ($this->isColumnModified(AtciudadanoPeer::ESTCIV)) $criteria->add(AtciudadanoPeer::ESTCIV, $this->estciv);
		if ($this->isColumnModified(AtciudadanoPeer::TELHAB)) $criteria->add(AtciudadanoPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(AtciudadanoPeer::TELADIHAB)) $criteria->add(AtciudadanoPeer::TELADIHAB, $this->teladihab);
		if ($this->isColumnModified(AtciudadanoPeer::PROCIU)) $criteria->add(AtciudadanoPeer::PROCIU, $this->prociu);
		if ($this->isColumnModified(AtciudadanoPeer::ATESTADOS_ID)) $criteria->add(AtciudadanoPeer::ATESTADOS_ID, $this->atestados_id);
		if ($this->isColumnModified(AtciudadanoPeer::ATMUNICIPIOS_ID)) $criteria->add(AtciudadanoPeer::ATMUNICIPIOS_ID, $this->atmunicipios_id);
		if ($this->isColumnModified(AtciudadanoPeer::ATPARROQUIAS_ID)) $criteria->add(AtciudadanoPeer::ATPARROQUIAS_ID, $this->atparroquias_id);
		if ($this->isColumnModified(AtciudadanoPeer::CIUDAD)) $criteria->add(AtciudadanoPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(AtciudadanoPeer::CASERIO)) $criteria->add(AtciudadanoPeer::CASERIO, $this->caserio);
		if ($this->isColumnModified(AtciudadanoPeer::DIRHAB)) $criteria->add(AtciudadanoPeer::DIRHAB, $this->dirhab);
		if ($this->isColumnModified(AtciudadanoPeer::DIRTRA)) $criteria->add(AtciudadanoPeer::DIRTRA, $this->dirtra);
		if ($this->isColumnModified(AtciudadanoPeer::CONCOMCIU)) $criteria->add(AtciudadanoPeer::CONCOMCIU, $this->concomciu);
		if ($this->isColumnModified(AtciudadanoPeer::CARCONCOMCIU)) $criteria->add(AtciudadanoPeer::CARCONCOMCIU, $this->carconcomciu);
		if ($this->isColumnModified(AtciudadanoPeer::NOTA)) $criteria->add(AtciudadanoPeer::NOTA, $this->nota);
		if ($this->isColumnModified(AtciudadanoPeer::GRAINS)) $criteria->add(AtciudadanoPeer::GRAINS, $this->grains);
		if ($this->isColumnModified(AtciudadanoPeer::TRACIU)) $criteria->add(AtciudadanoPeer::TRACIU, $this->traciu);
		if ($this->isColumnModified(AtciudadanoPeer::NOMEMP)) $criteria->add(AtciudadanoPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(AtciudadanoPeer::DIREMP)) $criteria->add(AtciudadanoPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(AtciudadanoPeer::TELEMP)) $criteria->add(AtciudadanoPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(AtciudadanoPeer::ATTIPING_ID)) $criteria->add(AtciudadanoPeer::ATTIPING_ID, $this->attiping_id);
		if ($this->isColumnModified(AtciudadanoPeer::MONING)) $criteria->add(AtciudadanoPeer::MONING, $this->moning);
		if ($this->isColumnModified(AtciudadanoPeer::ATINSREFIER_ID)) $criteria->add(AtciudadanoPeer::ATINSREFIER_ID, $this->atinsrefier_id);
		if ($this->isColumnModified(AtciudadanoPeer::AYUSOLANT)) $criteria->add(AtciudadanoPeer::AYUSOLANT, $this->ayusolant);
		if ($this->isColumnModified(AtciudadanoPeer::INSAYUANT)) $criteria->add(AtciudadanoPeer::INSAYUANT, $this->insayuant);
		if ($this->isColumnModified(AtciudadanoPeer::SEGPRI)) $criteria->add(AtciudadanoPeer::SEGPRI, $this->segpri);
		if ($this->isColumnModified(AtciudadanoPeer::ATTIPPROVIV_ID)) $criteria->add(AtciudadanoPeer::ATTIPPROVIV_ID, $this->attipproviv_id);
		if ($this->isColumnModified(AtciudadanoPeer::ATTIPVIV_ID)) $criteria->add(AtciudadanoPeer::ATTIPVIV_ID, $this->attipviv_id);
		if ($this->isColumnModified(AtciudadanoPeer::ID)) $criteria->add(AtciudadanoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtciudadanoPeer::DATABASE_NAME);

		$criteria->add(AtciudadanoPeer::ID, $this->id);

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

		$copyObj->setCedciu($this->cedciu);

		$copyObj->setNomciu($this->nomciu);

		$copyObj->setApeciu($this->apeciu);

		$copyObj->setNacciu($this->nacciu);

		$copyObj->setPais($this->pais);

		$copyObj->setConext($this->conext);

		$copyObj->setLugnac($this->lugnac);

		$copyObj->setTipo($this->tipo);

		$copyObj->setSexo($this->sexo);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setDirnac($this->dirnac);

		$copyObj->setEstciv($this->estciv);

		$copyObj->setTelhab($this->telhab);

		$copyObj->setTeladihab($this->teladihab);

		$copyObj->setProciu($this->prociu);

		$copyObj->setAtestadosId($this->atestados_id);

		$copyObj->setAtmunicipiosId($this->atmunicipios_id);

		$copyObj->setAtparroquiasId($this->atparroquias_id);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCaserio($this->caserio);

		$copyObj->setDirhab($this->dirhab);

		$copyObj->setDirtra($this->dirtra);

		$copyObj->setConcomciu($this->concomciu);

		$copyObj->setCarconcomciu($this->carconcomciu);

		$copyObj->setNota($this->nota);

		$copyObj->setGrains($this->grains);

		$copyObj->setTraciu($this->traciu);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setAttipingId($this->attiping_id);

		$copyObj->setMoning($this->moning);

		$copyObj->setAtinsrefierId($this->atinsrefier_id);

		$copyObj->setAyusolant($this->ayusolant);

		$copyObj->setInsayuant($this->insayuant);

		$copyObj->setSegpri($this->segpri);

		$copyObj->setAttipprovivId($this->attipproviv_id);

		$copyObj->setAttipvivId($this->attipviv_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtestsocecos() as $relObj) {
				$copyObj->addAtestsoceco($relObj->copy($deepCopy));
			}

			foreach($this->getAtgrufams() as $relObj) {
				$copyObj->addAtgrufam($relObj->copy($deepCopy));
			}

			foreach($this->getAtayudassRelatedByAtsolici() as $relObj) {
				$copyObj->addAtayudasRelatedByAtsolici($relObj->copy($deepCopy));
			}

			foreach($this->getAtayudassRelatedByAtbenefi() as $relObj) {
				$copyObj->addAtayudasRelatedByAtbenefi($relObj->copy($deepCopy));
			}

			foreach($this->getAtaudienciass() as $relObj) {
				$copyObj->addAtaudiencias($relObj->copy($deepCopy));
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
			self::$peer = new AtciudadanoPeer();
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
						include_once 'lib/model/ciudadanos/om/BaseAtestadosPeer.php';

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
						include_once 'lib/model/ciudadanos/om/BaseAtmunicipiosPeer.php';

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
						include_once 'lib/model/ciudadanos/om/BaseAtparroquiasPeer.php';

			$this->aAtparroquias = AtparroquiasPeer::retrieveByPK($this->atparroquias_id, $con);

			
		}
		return $this->aAtparroquias;
	}

	
	public function setAttiping($v)
	{


		if ($v === null) {
			$this->setAttipingId(NULL);
		} else {
			$this->setAttipingId($v->getId());
		}


		$this->aAttiping = $v;
	}


	
	public function getAttiping($con = null)
	{
		if ($this->aAttiping === null && ($this->attiping_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAttipingPeer.php';

			$this->aAttiping = AttipingPeer::retrieveByPK($this->attiping_id, $con);

			
		}
		return $this->aAttiping;
	}

	
	public function setAtinsrefier($v)
	{


		if ($v === null) {
			$this->setAtinsrefierId(NULL);
		} else {
			$this->setAtinsrefierId($v->getId());
		}


		$this->aAtinsrefier = $v;
	}


	
	public function getAtinsrefier($con = null)
	{
		if ($this->aAtinsrefier === null && ($this->atinsrefier_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtinsrefierPeer.php';

			$this->aAtinsrefier = AtinsrefierPeer::retrieveByPK($this->atinsrefier_id, $con);

			
		}
		return $this->aAtinsrefier;
	}

	
	public function setAttipproviv($v)
	{


		if ($v === null) {
			$this->setAttipprovivId(NULL);
		} else {
			$this->setAttipprovivId($v->getId());
		}


		$this->aAttipproviv = $v;
	}


	
	public function getAttipproviv($con = null)
	{
		if ($this->aAttipproviv === null && ($this->attipproviv_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAttipprovivPeer.php';

			$this->aAttipproviv = AttipprovivPeer::retrieveByPK($this->attipproviv_id, $con);

			
		}
		return $this->aAttipproviv;
	}

	
	public function setAttipviv($v)
	{


		if ($v === null) {
			$this->setAttipvivId(NULL);
		} else {
			$this->setAttipvivId($v->getId());
		}


		$this->aAttipviv = $v;
	}


	
	public function getAttipviv($con = null)
	{
		if ($this->aAttipviv === null && ($this->attipviv_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAttipvivPeer.php';

			$this->aAttipviv = AttipvivPeer::retrieveByPK($this->attipviv_id, $con);

			
		}
		return $this->aAttipviv;
	}

	
	public function initAtestsocecos()
	{
		if ($this->collAtestsocecos === null) {
			$this->collAtestsocecos = array();
		}
	}

	
	public function getAtestsocecos($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
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

				$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

				AtestsocecoPeer::addSelectColumns($criteria);
				$this->collAtestsocecos = AtestsocecoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

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
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

		return AtestsocecoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtestsoceco(Atestsoceco $l)
	{
		$this->collAtestsocecos[] = $l;
		$l->setAtciudadano($this);
	}


	
	public function getAtestsocecosJoinAtayudas($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
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

				$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAtayudas($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}


	
	public function getAtestsocecosJoinAttipviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
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

				$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipviv($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}


	
	public function getAtestsocecosJoinAttipproviv($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtestsocecoPeer.php';
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

				$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		} else {
									
			$criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->getId());

			if (!isset($this->lastAtestsocecoCriteria) || !$this->lastAtestsocecoCriteria->equals($criteria)) {
				$this->collAtestsocecos = AtestsocecoPeer::doSelectJoinAttipproviv($criteria, $con);
			}
		}
		$this->lastAtestsocecoCriteria = $criteria;

		return $this->collAtestsocecos;
	}

	
	public function initAtgrufams()
	{
		if ($this->collAtgrufams === null) {
			$this->collAtgrufams = array();
		}
	}

	
	public function getAtgrufams($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtgrufamPeer.php';
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

				$criteria->add(AtgrufamPeer::ATCIUDADANO_ID, $this->getId());

				AtgrufamPeer::addSelectColumns($criteria);
				$this->collAtgrufams = AtgrufamPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtgrufamPeer::ATCIUDADANO_ID, $this->getId());

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
				include_once 'lib/model/ciudadanos/om/BaseAtgrufamPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtgrufamPeer::ATCIUDADANO_ID, $this->getId());

		return AtgrufamPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtgrufam(Atgrufam $l)
	{
		$this->collAtgrufams[] = $l;
		$l->setAtciudadano($this);
	}

	
	public function initAtayudassRelatedByAtsolici()
	{
		if ($this->collAtayudassRelatedByAtsolici === null) {
			$this->collAtayudassRelatedByAtsolici = array();
		}
	}

	
	public function getAtayudassRelatedByAtsolici($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
			   $this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
					$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;
		return $this->collAtayudassRelatedByAtsolici;
	}

	
	public function countAtayudassRelatedByAtsolici($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudasRelatedByAtsolici(Atayudas $l)
	{
		$this->collAtayudassRelatedByAtsolici[] = $l;
		$l->setAtciudadanoRelatedByAtsolici($this);
	}


	
	public function getAtayudassRelatedByAtsoliciJoinCaordcom($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAtpriayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAtrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAttrasoc($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAtprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}


	
	public function getAtayudassRelatedByAtsoliciJoinAtmedico($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtsolici === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtsolici = array();
			} else {

				$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtsoliciCriteria) || !$this->lastAtayudasRelatedByAtsoliciCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtsolici = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtsoliciCriteria = $criteria;

		return $this->collAtayudassRelatedByAtsolici;
	}

	
	public function initAtayudassRelatedByAtbenefi()
	{
		if ($this->collAtayudassRelatedByAtbenefi === null) {
			$this->collAtayudassRelatedByAtbenefi = array();
		}
	}

	
	public function getAtayudassRelatedByAtbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
			   $this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
					$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;
		return $this->collAtayudassRelatedByAtbenefi;
	}

	
	public function countAtayudassRelatedByAtbenefi($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudasRelatedByAtbenefi(Atayudas $l)
	{
		$this->collAtayudassRelatedByAtbenefi[] = $l;
		$l->setAtciudadanoRelatedByAtbenefi($this);
	}


	
	public function getAtayudassRelatedByAtbenefiJoinCaordcom($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinCaordcom($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAtpriayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtpriayu($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAttipayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAtrubros($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtrubros($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAtestayu($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAttrasoc($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAtprovee($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtprovee($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}


	
	public function getAtayudassRelatedByAtbenefiJoinAtmedico($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtayudassRelatedByAtbenefi === null) {
			if ($this->isNew()) {
				$this->collAtayudassRelatedByAtbenefi = array();
			} else {

				$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATBENEFI, $this->getId());

			if (!isset($this->lastAtayudasRelatedByAtbenefiCriteria) || !$this->lastAtayudasRelatedByAtbenefiCriteria->equals($criteria)) {
				$this->collAtayudassRelatedByAtbenefi = AtayudasPeer::doSelectJoinAtmedico($criteria, $con);
			}
		}
		$this->lastAtayudasRelatedByAtbenefiCriteria = $criteria;

		return $this->collAtayudassRelatedByAtbenefi;
	}

	
	public function initAtaudienciass()
	{
		if ($this->collAtaudienciass === null) {
			$this->collAtaudienciass = array();
		}
	}

	
	public function getAtaudienciass($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtaudienciass === null) {
			if ($this->isNew()) {
			   $this->collAtaudienciass = array();
			} else {

				$criteria->add(AtaudienciasPeer::ATCIUDADANO_ID, $this->getId());

				AtaudienciasPeer::addSelectColumns($criteria);
				$this->collAtaudienciass = AtaudienciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtaudienciasPeer::ATCIUDADANO_ID, $this->getId());

				AtaudienciasPeer::addSelectColumns($criteria);
				if (!isset($this->lastAtaudienciasCriteria) || !$this->lastAtaudienciasCriteria->equals($criteria)) {
					$this->collAtaudienciass = AtaudienciasPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAtaudienciasCriteria = $criteria;
		return $this->collAtaudienciass;
	}

	
	public function countAtaudienciass($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtaudienciasPeer::ATCIUDADANO_ID, $this->getId());

		return AtaudienciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtaudiencias(Ataudiencias $l)
	{
		$this->collAtaudienciass[] = $l;
		$l->setAtciudadano($this);
	}


	
	public function getAtaudienciassJoinAtunidades($criteria = null, $con = null)
	{
				include_once 'lib/model/ciudadanos/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAtaudienciass === null) {
			if ($this->isNew()) {
				$this->collAtaudienciass = array();
			} else {

				$criteria->add(AtaudienciasPeer::ATCIUDADANO_ID, $this->getId());

				$this->collAtaudienciass = AtaudienciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		} else {
									
			$criteria->add(AtaudienciasPeer::ATCIUDADANO_ID, $this->getId());

			if (!isset($this->lastAtaudienciasCriteria) || !$this->lastAtaudienciasCriteria->equals($criteria)) {
				$this->collAtaudienciass = AtaudienciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		}
		$this->lastAtaudienciasCriteria = $criteria;

		return $this->collAtaudienciass;
	}

} 