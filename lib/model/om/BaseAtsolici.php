<?php


abstract class BaseAtsolici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $cedsol;


	
	protected $nomsol;


	
	protected $apesol;


	
	protected $nacsol;


	
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


	
	protected $prosol;


	
	protected $atestados_id;


	
	protected $atmunicipios_id;


	
	protected $atparroquias_id;


	
	protected $ciudad;


	
	protected $caserio;


	
	protected $dirhab;


	
	protected $dirtra;


	
	protected $concomsol;


	
	protected $carconcomsol;


	
	protected $nota;


	
	protected $grains;


	
	protected $trasol;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $tiping;


	
	protected $moning;


	
	protected $id;

	
	protected $aAtestados;

	
	protected $aAtmunicipios;

	
	protected $aAtparroquias;

	
	protected $collAtayudass;

	
	protected $lastAtayudasCriteria = null;

	
	protected $collAtaudienciass;

	
	protected $lastAtaudienciasCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCedsol()
  {

    return trim($this->cedsol);

  }
  
  public function getNomsol()
  {

    return trim($this->nomsol);

  }
  
  public function getApesol()
  {

    return trim($this->apesol);

  }
  
  public function getNacsol()
  {

    return trim($this->nacsol);

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
  
  public function getProsol()
  {

    return trim($this->prosol);

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
  
  public function getConcomsol()
  {

    return trim($this->concomsol);

  }
  
  public function getCarconcomsol()
  {

    return trim($this->carconcomsol);

  }
  
  public function getNota()
  {

    return trim($this->nota);

  }
  
  public function getGrains()
  {

    return trim($this->grains);

  }
  
  public function getTrasol()
  {

    return $this->trasol;

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
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCedsol($v)
	{

    if ($this->cedsol !== $v) {
        $this->cedsol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::CEDSOL;
      }
  
	} 
	
	public function setNomsol($v)
	{

    if ($this->nomsol !== $v) {
        $this->nomsol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::NOMSOL;
      }
  
	} 
	
	public function setApesol($v)
	{

    if ($this->apesol !== $v) {
        $this->apesol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::APESOL;
      }
  
	} 
	
	public function setNacsol($v)
	{

    if ($this->nacsol !== $v) {
        $this->nacsol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::NACSOL;
      }
  
	} 
	
	public function setPais($v)
	{

    if ($this->pais !== $v) {
        $this->pais = $v;
        $this->modifiedColumns[] = AtsoliciPeer::PAIS;
      }
  
	} 
	
	public function setConext($v)
	{

    if ($this->conext !== $v) {
        $this->conext = $v;
        $this->modifiedColumns[] = AtsoliciPeer::CONEXT;
      }
  
	} 
	
	public function setLugnac($v)
	{

    if ($this->lugnac !== $v) {
        $this->lugnac = $v;
        $this->modifiedColumns[] = AtsoliciPeer::LUGNAC;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = AtsoliciPeer::TIPO;
      }
  
	} 
	
	public function setSexo($v)
	{

    if ($this->sexo !== $v) {
        $this->sexo = $v;
        $this->modifiedColumns[] = AtsoliciPeer::SEXO;
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
      $this->modifiedColumns[] = AtsoliciPeer::FECNAC;
    }

	} 
	
	public function setDirnac($v)
	{

    if ($this->dirnac !== $v) {
        $this->dirnac = $v;
        $this->modifiedColumns[] = AtsoliciPeer::DIRNAC;
      }
  
	} 
	
	public function setEstciv($v)
	{

    if ($this->estciv !== $v) {
        $this->estciv = $v;
        $this->modifiedColumns[] = AtsoliciPeer::ESTCIV;
      }
  
	} 
	
	public function setTelhab($v)
	{

    if ($this->telhab !== $v) {
        $this->telhab = $v;
        $this->modifiedColumns[] = AtsoliciPeer::TELHAB;
      }
  
	} 
	
	public function setTeladihab($v)
	{

    if ($this->teladihab !== $v) {
        $this->teladihab = $v;
        $this->modifiedColumns[] = AtsoliciPeer::TELADIHAB;
      }
  
	} 
	
	public function setProsol($v)
	{

    if ($this->prosol !== $v) {
        $this->prosol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::PROSOL;
      }
  
	} 
	
	public function setAtestadosId($v)
	{

    if ($this->atestados_id !== $v) {
        $this->atestados_id = $v;
        $this->modifiedColumns[] = AtsoliciPeer::ATESTADOS_ID;
      }
  
		if ($this->aAtestados !== null && $this->aAtestados->getId() !== $v) {
			$this->aAtestados = null;
		}

	} 
	
	public function setAtmunicipiosId($v)
	{

    if ($this->atmunicipios_id !== $v) {
        $this->atmunicipios_id = $v;
        $this->modifiedColumns[] = AtsoliciPeer::ATMUNICIPIOS_ID;
      }
  
		if ($this->aAtmunicipios !== null && $this->aAtmunicipios->getId() !== $v) {
			$this->aAtmunicipios = null;
		}

	} 
	
	public function setAtparroquiasId($v)
	{

    if ($this->atparroquias_id !== $v) {
        $this->atparroquias_id = $v;
        $this->modifiedColumns[] = AtsoliciPeer::ATPARROQUIAS_ID;
      }
  
		if ($this->aAtparroquias !== null && $this->aAtparroquias->getId() !== $v) {
			$this->aAtparroquias = null;
		}

	} 
	
	public function setCiudad($v)
	{

    if ($this->ciudad !== $v) {
        $this->ciudad = $v;
        $this->modifiedColumns[] = AtsoliciPeer::CIUDAD;
      }
  
	} 
	
	public function setCaserio($v)
	{

    if ($this->caserio !== $v) {
        $this->caserio = $v;
        $this->modifiedColumns[] = AtsoliciPeer::CASERIO;
      }
  
	} 
	
	public function setDirhab($v)
	{

    if ($this->dirhab !== $v) {
        $this->dirhab = $v;
        $this->modifiedColumns[] = AtsoliciPeer::DIRHAB;
      }
  
	} 
	
	public function setDirtra($v)
	{

    if ($this->dirtra !== $v) {
        $this->dirtra = $v;
        $this->modifiedColumns[] = AtsoliciPeer::DIRTRA;
      }
  
	} 
	
	public function setConcomsol($v)
	{

    if ($this->concomsol !== $v) {
        $this->concomsol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::CONCOMSOL;
      }
  
	} 
	
	public function setCarconcomsol($v)
	{

    if ($this->carconcomsol !== $v) {
        $this->carconcomsol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::CARCONCOMSOL;
      }
  
	} 
	
	public function setNota($v)
	{

    if ($this->nota !== $v) {
        $this->nota = $v;
        $this->modifiedColumns[] = AtsoliciPeer::NOTA;
      }
  
	} 
	
	public function setGrains($v)
	{

    if ($this->grains !== $v) {
        $this->grains = $v;
        $this->modifiedColumns[] = AtsoliciPeer::GRAINS;
      }
  
	} 
	
	public function setTrasol($v)
	{

    if ($this->trasol !== $v) {
        $this->trasol = $v;
        $this->modifiedColumns[] = AtsoliciPeer::TRASOL;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = AtsoliciPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = AtsoliciPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = AtsoliciPeer::TELEMP;
      }
  
	} 
	
	public function setTiping($v)
	{

    if ($this->tiping !== $v) {
        $this->tiping = $v;
        $this->modifiedColumns[] = AtsoliciPeer::TIPING;
      }
  
	} 
	
	public function setMoning($v)
	{

    if ($this->moning !== $v) {
        $this->moning = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtsoliciPeer::MONING;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtsoliciPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->cedsol = $rs->getString($startcol + 0);

      $this->nomsol = $rs->getString($startcol + 1);

      $this->apesol = $rs->getString($startcol + 2);

      $this->nacsol = $rs->getString($startcol + 3);

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

      $this->prosol = $rs->getString($startcol + 14);

      $this->atestados_id = $rs->getInt($startcol + 15);

      $this->atmunicipios_id = $rs->getInt($startcol + 16);

      $this->atparroquias_id = $rs->getInt($startcol + 17);

      $this->ciudad = $rs->getString($startcol + 18);

      $this->caserio = $rs->getString($startcol + 19);

      $this->dirhab = $rs->getString($startcol + 20);

      $this->dirtra = $rs->getString($startcol + 21);

      $this->concomsol = $rs->getString($startcol + 22);

      $this->carconcomsol = $rs->getString($startcol + 23);

      $this->nota = $rs->getString($startcol + 24);

      $this->grains = $rs->getString($startcol + 25);

      $this->trasol = $rs->getBoolean($startcol + 26);

      $this->nomemp = $rs->getString($startcol + 27);

      $this->diremp = $rs->getString($startcol + 28);

      $this->telemp = $rs->getString($startcol + 29);

      $this->tiping = $rs->getInt($startcol + 30);

      $this->moning = $rs->getFloat($startcol + 31);

      $this->id = $rs->getInt($startcol + 32);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 33; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atsolici object", $e);
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
			$con = Propel::getConnection(AtsoliciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtsoliciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtsoliciPeer::DATABASE_NAME);
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
					$pk = AtsoliciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtsoliciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAtayudass !== null) {
				foreach($this->collAtayudass as $referrerFK) {
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


			if (($retval = AtsoliciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAtayudass !== null) {
					foreach($this->collAtayudass as $referrerFK) {
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
		$pos = AtsoliciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCedsol();
				break;
			case 1:
				return $this->getNomsol();
				break;
			case 2:
				return $this->getApesol();
				break;
			case 3:
				return $this->getNacsol();
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
				return $this->getProsol();
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
				return $this->getConcomsol();
				break;
			case 23:
				return $this->getCarconcomsol();
				break;
			case 24:
				return $this->getNota();
				break;
			case 25:
				return $this->getGrains();
				break;
			case 26:
				return $this->getTrasol();
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
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtsoliciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCedsol(),
			$keys[1] => $this->getNomsol(),
			$keys[2] => $this->getApesol(),
			$keys[3] => $this->getNacsol(),
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
			$keys[14] => $this->getProsol(),
			$keys[15] => $this->getAtestadosId(),
			$keys[16] => $this->getAtmunicipiosId(),
			$keys[17] => $this->getAtparroquiasId(),
			$keys[18] => $this->getCiudad(),
			$keys[19] => $this->getCaserio(),
			$keys[20] => $this->getDirhab(),
			$keys[21] => $this->getDirtra(),
			$keys[22] => $this->getConcomsol(),
			$keys[23] => $this->getCarconcomsol(),
			$keys[24] => $this->getNota(),
			$keys[25] => $this->getGrains(),
			$keys[26] => $this->getTrasol(),
			$keys[27] => $this->getNomemp(),
			$keys[28] => $this->getDiremp(),
			$keys[29] => $this->getTelemp(),
			$keys[30] => $this->getTiping(),
			$keys[31] => $this->getMoning(),
			$keys[32] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtsoliciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCedsol($value);
				break;
			case 1:
				$this->setNomsol($value);
				break;
			case 2:
				$this->setApesol($value);
				break;
			case 3:
				$this->setNacsol($value);
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
				$this->setProsol($value);
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
				$this->setConcomsol($value);
				break;
			case 23:
				$this->setCarconcomsol($value);
				break;
			case 24:
				$this->setNota($value);
				break;
			case 25:
				$this->setGrains($value);
				break;
			case 26:
				$this->setTrasol($value);
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
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtsoliciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCedsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setApesol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNacsol($arr[$keys[3]]);
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
		if (array_key_exists($keys[14], $arr)) $this->setProsol($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAtestadosId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAtmunicipiosId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAtparroquiasId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCiudad($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCaserio($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDirhab($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setDirtra($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setConcomsol($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCarconcomsol($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setNota($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setGrains($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTrasol($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNomemp($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setDiremp($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTelemp($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setTiping($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setMoning($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setId($arr[$keys[32]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtsoliciPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtsoliciPeer::CEDSOL)) $criteria->add(AtsoliciPeer::CEDSOL, $this->cedsol);
		if ($this->isColumnModified(AtsoliciPeer::NOMSOL)) $criteria->add(AtsoliciPeer::NOMSOL, $this->nomsol);
		if ($this->isColumnModified(AtsoliciPeer::APESOL)) $criteria->add(AtsoliciPeer::APESOL, $this->apesol);
		if ($this->isColumnModified(AtsoliciPeer::NACSOL)) $criteria->add(AtsoliciPeer::NACSOL, $this->nacsol);
		if ($this->isColumnModified(AtsoliciPeer::PAIS)) $criteria->add(AtsoliciPeer::PAIS, $this->pais);
		if ($this->isColumnModified(AtsoliciPeer::CONEXT)) $criteria->add(AtsoliciPeer::CONEXT, $this->conext);
		if ($this->isColumnModified(AtsoliciPeer::LUGNAC)) $criteria->add(AtsoliciPeer::LUGNAC, $this->lugnac);
		if ($this->isColumnModified(AtsoliciPeer::TIPO)) $criteria->add(AtsoliciPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(AtsoliciPeer::SEXO)) $criteria->add(AtsoliciPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(AtsoliciPeer::FECNAC)) $criteria->add(AtsoliciPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(AtsoliciPeer::DIRNAC)) $criteria->add(AtsoliciPeer::DIRNAC, $this->dirnac);
		if ($this->isColumnModified(AtsoliciPeer::ESTCIV)) $criteria->add(AtsoliciPeer::ESTCIV, $this->estciv);
		if ($this->isColumnModified(AtsoliciPeer::TELHAB)) $criteria->add(AtsoliciPeer::TELHAB, $this->telhab);
		if ($this->isColumnModified(AtsoliciPeer::TELADIHAB)) $criteria->add(AtsoliciPeer::TELADIHAB, $this->teladihab);
		if ($this->isColumnModified(AtsoliciPeer::PROSOL)) $criteria->add(AtsoliciPeer::PROSOL, $this->prosol);
		if ($this->isColumnModified(AtsoliciPeer::ATESTADOS_ID)) $criteria->add(AtsoliciPeer::ATESTADOS_ID, $this->atestados_id);
		if ($this->isColumnModified(AtsoliciPeer::ATMUNICIPIOS_ID)) $criteria->add(AtsoliciPeer::ATMUNICIPIOS_ID, $this->atmunicipios_id);
		if ($this->isColumnModified(AtsoliciPeer::ATPARROQUIAS_ID)) $criteria->add(AtsoliciPeer::ATPARROQUIAS_ID, $this->atparroquias_id);
		if ($this->isColumnModified(AtsoliciPeer::CIUDAD)) $criteria->add(AtsoliciPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(AtsoliciPeer::CASERIO)) $criteria->add(AtsoliciPeer::CASERIO, $this->caserio);
		if ($this->isColumnModified(AtsoliciPeer::DIRHAB)) $criteria->add(AtsoliciPeer::DIRHAB, $this->dirhab);
		if ($this->isColumnModified(AtsoliciPeer::DIRTRA)) $criteria->add(AtsoliciPeer::DIRTRA, $this->dirtra);
		if ($this->isColumnModified(AtsoliciPeer::CONCOMSOL)) $criteria->add(AtsoliciPeer::CONCOMSOL, $this->concomsol);
		if ($this->isColumnModified(AtsoliciPeer::CARCONCOMSOL)) $criteria->add(AtsoliciPeer::CARCONCOMSOL, $this->carconcomsol);
		if ($this->isColumnModified(AtsoliciPeer::NOTA)) $criteria->add(AtsoliciPeer::NOTA, $this->nota);
		if ($this->isColumnModified(AtsoliciPeer::GRAINS)) $criteria->add(AtsoliciPeer::GRAINS, $this->grains);
		if ($this->isColumnModified(AtsoliciPeer::TRASOL)) $criteria->add(AtsoliciPeer::TRASOL, $this->trasol);
		if ($this->isColumnModified(AtsoliciPeer::NOMEMP)) $criteria->add(AtsoliciPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(AtsoliciPeer::DIREMP)) $criteria->add(AtsoliciPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(AtsoliciPeer::TELEMP)) $criteria->add(AtsoliciPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(AtsoliciPeer::TIPING)) $criteria->add(AtsoliciPeer::TIPING, $this->tiping);
		if ($this->isColumnModified(AtsoliciPeer::MONING)) $criteria->add(AtsoliciPeer::MONING, $this->moning);
		if ($this->isColumnModified(AtsoliciPeer::ID)) $criteria->add(AtsoliciPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtsoliciPeer::DATABASE_NAME);

		$criteria->add(AtsoliciPeer::ID, $this->id);

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

		$copyObj->setCedsol($this->cedsol);

		$copyObj->setNomsol($this->nomsol);

		$copyObj->setApesol($this->apesol);

		$copyObj->setNacsol($this->nacsol);

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

		$copyObj->setProsol($this->prosol);

		$copyObj->setAtestadosId($this->atestados_id);

		$copyObj->setAtmunicipiosId($this->atmunicipios_id);

		$copyObj->setAtparroquiasId($this->atparroquias_id);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCaserio($this->caserio);

		$copyObj->setDirhab($this->dirhab);

		$copyObj->setDirtra($this->dirtra);

		$copyObj->setConcomsol($this->concomsol);

		$copyObj->setCarconcomsol($this->carconcomsol);

		$copyObj->setNota($this->nota);

		$copyObj->setGrains($this->grains);

		$copyObj->setTrasol($this->trasol);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setTiping($this->tiping);

		$copyObj->setMoning($this->moning);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAtayudass() as $relObj) {
				$copyObj->addAtayudas($relObj->copy($deepCopy));
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
			self::$peer = new AtsoliciPeer();
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

				$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

				AtayudasPeer::addSelectColumns($criteria);
				$this->collAtayudass = AtayudasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

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

		$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

		return AtayudasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtayudas(Atayudas $l)
	{
		$this->collAtayudass[] = $l;
		$l->setAtsolici($this);
	}


	
	public function getAtayudassJoinAtbenefi($criteria = null, $con = null)
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

				$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAtbenefi($criteria, $con);
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

				$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttipayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAtestayu($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

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

				$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		} else {
									
			$criteria->add(AtayudasPeer::ATSOLICI_ID, $this->getId());

			if (!isset($this->lastAtayudasCriteria) || !$this->lastAtayudasCriteria->equals($criteria)) {
				$this->collAtayudass = AtayudasPeer::doSelectJoinAttrasoc($criteria, $con);
			}
		}
		$this->lastAtayudasCriteria = $criteria;

		return $this->collAtayudass;
	}

	
	public function initAtaudienciass()
	{
		if ($this->collAtaudienciass === null) {
			$this->collAtaudienciass = array();
		}
	}

	
	public function getAtaudienciass($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtaudienciasPeer.php';
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

				$criteria->add(AtaudienciasPeer::ATSOLICI_ID, $this->getId());

				AtaudienciasPeer::addSelectColumns($criteria);
				$this->collAtaudienciass = AtaudienciasPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AtaudienciasPeer::ATSOLICI_ID, $this->getId());

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
				include_once 'lib/model/om/BaseAtaudienciasPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AtaudienciasPeer::ATSOLICI_ID, $this->getId());

		return AtaudienciasPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAtaudiencias(Ataudiencias $l)
	{
		$this->collAtaudienciass[] = $l;
		$l->setAtsolici($this);
	}


	
	public function getAtaudienciassJoinAtunidades($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAtaudienciasPeer.php';
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

				$criteria->add(AtaudienciasPeer::ATSOLICI_ID, $this->getId());

				$this->collAtaudienciass = AtaudienciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		} else {
									
			$criteria->add(AtaudienciasPeer::ATSOLICI_ID, $this->getId());

			if (!isset($this->lastAtaudienciasCriteria) || !$this->lastAtaudienciasCriteria->equals($criteria)) {
				$this->collAtaudienciass = AtaudienciasPeer::doSelectJoinAtunidades($criteria, $con);
			}
		}
		$this->lastAtaudienciasCriteria = $criteria;

		return $this->collAtaudienciass;
	}

} 