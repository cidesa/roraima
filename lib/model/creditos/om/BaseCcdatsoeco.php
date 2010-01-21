<?php


abstract class BaseCcdatsoeco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $esptipvi;


	
	protected $dormit;


	
	protected $banos;


	
	protected $sala;


	
	protected $cocina;


	
	protected $lavade;


	
	protected $closet;


	
	protected $jardin;


	
	protected $estacio;


	
	protected $expliestruc;


	
	protected $techos;


	
	protected $paredes;


	
	protected $piso;


	
	protected $revest;


	
	protected $conser;


	
	protected $edad;


	
	protected $zona;


	
	protected $dist;


	
	protected $acceso;


	
	protected $observ;


	
	protected $linnorte;


	
	protected $linsur;


	
	protected $lineste;


	
	protected $linoeste;


	
	protected $superfi;


	
	protected $trasoc;


	
	protected $analisis;


	
	protected $recomen;


	
	protected $respon;


	
	protected $asigna;


	
	protected $deducc;


	
	protected $asigcon;


	
	protected $deducon;


	
	protected $gasfam;


	
	protected $cappago;


	
	protected $ccorimatpri_id;


	
	protected $ccacteco_id;


	
	protected $ccestruc_id;


	
	protected $ccriezona_id;


	
	protected $ccsolici_id;

	
	protected $aCcorimatpri;

	
	protected $aCcacteco;

	
	protected $aCcestruc;

	
	protected $aCcriezona;

	
	protected $aCcsolici;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getEsptipvi()
  {

    return trim($this->esptipvi);

  }
  
  public function getDormit()
  {

    return trim($this->dormit);

  }
  
  public function getBanos()
  {

    return trim($this->banos);

  }
  
  public function getSala()
  {

    return trim($this->sala);

  }
  
  public function getCocina()
  {

    return trim($this->cocina);

  }
  
  public function getLavade()
  {

    return trim($this->lavade);

  }
  
  public function getCloset()
  {

    return trim($this->closet);

  }
  
  public function getJardin()
  {

    return trim($this->jardin);

  }
  
  public function getEstacio()
  {

    return trim($this->estacio);

  }
  
  public function getExpliestruc()
  {

    return trim($this->expliestruc);

  }
  
  public function getTechos()
  {

    return trim($this->techos);

  }
  
  public function getParedes()
  {

    return trim($this->paredes);

  }
  
  public function getPiso()
  {

    return trim($this->piso);

  }
  
  public function getRevest()
  {

    return trim($this->revest);

  }
  
  public function getConser()
  {

    return trim($this->conser);

  }
  
  public function getEdad()
  {

    return trim($this->edad);

  }
  
  public function getZona()
  {

    return trim($this->zona);

  }
  
  public function getDist()
  {

    return trim($this->dist);

  }
  
  public function getAcceso()
  {

    return trim($this->acceso);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getLinnorte()
  {

    return trim($this->linnorte);

  }
  
  public function getLinsur()
  {

    return trim($this->linsur);

  }
  
  public function getLineste()
  {

    return trim($this->lineste);

  }
  
  public function getLinoeste()
  {

    return trim($this->linoeste);

  }
  
  public function getSuperfi()
  {

    return trim($this->superfi);

  }
  
  public function getTrasoc()
  {

    return trim($this->trasoc);

  }
  
  public function getAnalisis()
  {

    return trim($this->analisis);

  }
  
  public function getRecomen()
  {

    return trim($this->recomen);

  }
  
  public function getRespon()
  {

    return trim($this->respon);

  }
  
  public function getAsigna($val=false)
  {

    if($val) return number_format($this->asigna,2,',','.');
    else return $this->asigna;

  }
  
  public function getDeducc($val=false)
  {

    if($val) return number_format($this->deducc,2,',','.');
    else return $this->deducc;

  }
  
  public function getAsigcon($val=false)
  {

    if($val) return number_format($this->asigcon,2,',','.');
    else return $this->asigcon;

  }
  
  public function getDeducon($val=false)
  {

    if($val) return number_format($this->deducon,2,',','.');
    else return $this->deducon;

  }
  
  public function getGasfam($val=false)
  {

    if($val) return number_format($this->gasfam,2,',','.');
    else return $this->gasfam;

  }
  
  public function getCappago($val=false)
  {

    if($val) return number_format($this->cappago,2,',','.');
    else return $this->cappago;

  }
  
  public function getCcorimatpriId()
  {

    return $this->ccorimatpri_id;

  }
  
  public function getCcactecoId()
  {

    return $this->ccacteco_id;

  }
  
  public function getCcestrucId()
  {

    return $this->ccestruc_id;

  }
  
  public function getCcriezonaId()
  {

    return $this->ccriezona_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::ID;
      }
  
	} 
	
	public function setEsptipvi($v)
	{

    if ($this->esptipvi !== $v) {
        $this->esptipvi = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::ESPTIPVI;
      }
  
	} 
	
	public function setDormit($v)
	{

    if ($this->dormit !== $v) {
        $this->dormit = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::DORMIT;
      }
  
	} 
	
	public function setBanos($v)
	{

    if ($this->banos !== $v) {
        $this->banos = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::BANOS;
      }
  
	} 
	
	public function setSala($v)
	{

    if ($this->sala !== $v) {
        $this->sala = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::SALA;
      }
  
	} 
	
	public function setCocina($v)
	{

    if ($this->cocina !== $v) {
        $this->cocina = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::COCINA;
      }
  
	} 
	
	public function setLavade($v)
	{

    if ($this->lavade !== $v) {
        $this->lavade = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::LAVADE;
      }
  
	} 
	
	public function setCloset($v)
	{

    if ($this->closet !== $v) {
        $this->closet = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CLOSET;
      }
  
	} 
	
	public function setJardin($v)
	{

    if ($this->jardin !== $v) {
        $this->jardin = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::JARDIN;
      }
  
	} 
	
	public function setEstacio($v)
	{

    if ($this->estacio !== $v) {
        $this->estacio = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::ESTACIO;
      }
  
	} 
	
	public function setExpliestruc($v)
	{

    if ($this->expliestruc !== $v) {
        $this->expliestruc = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::EXPLIESTRUC;
      }
  
	} 
	
	public function setTechos($v)
	{

    if ($this->techos !== $v) {
        $this->techos = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::TECHOS;
      }
  
	} 
	
	public function setParedes($v)
	{

    if ($this->paredes !== $v) {
        $this->paredes = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::PAREDES;
      }
  
	} 
	
	public function setPiso($v)
	{

    if ($this->piso !== $v) {
        $this->piso = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::PISO;
      }
  
	} 
	
	public function setRevest($v)
	{

    if ($this->revest !== $v) {
        $this->revest = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::REVEST;
      }
  
	} 
	
	public function setConser($v)
	{

    if ($this->conser !== $v) {
        $this->conser = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CONSER;
      }
  
	} 
	
	public function setEdad($v)
	{

    if ($this->edad !== $v) {
        $this->edad = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::EDAD;
      }
  
	} 
	
	public function setZona($v)
	{

    if ($this->zona !== $v) {
        $this->zona = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::ZONA;
      }
  
	} 
	
	public function setDist($v)
	{

    if ($this->dist !== $v) {
        $this->dist = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::DIST;
      }
  
	} 
	
	public function setAcceso($v)
	{

    if ($this->acceso !== $v) {
        $this->acceso = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::ACCESO;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::OBSERV;
      }
  
	} 
	
	public function setLinnorte($v)
	{

    if ($this->linnorte !== $v) {
        $this->linnorte = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::LINNORTE;
      }
  
	} 
	
	public function setLinsur($v)
	{

    if ($this->linsur !== $v) {
        $this->linsur = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::LINSUR;
      }
  
	} 
	
	public function setLineste($v)
	{

    if ($this->lineste !== $v) {
        $this->lineste = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::LINESTE;
      }
  
	} 
	
	public function setLinoeste($v)
	{

    if ($this->linoeste !== $v) {
        $this->linoeste = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::LINOESTE;
      }
  
	} 
	
	public function setSuperfi($v)
	{

    if ($this->superfi !== $v) {
        $this->superfi = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::SUPERFI;
      }
  
	} 
	
	public function setTrasoc($v)
	{

    if ($this->trasoc !== $v) {
        $this->trasoc = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::TRASOC;
      }
  
	} 
	
	public function setAnalisis($v)
	{

    if ($this->analisis !== $v) {
        $this->analisis = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::ANALISIS;
      }
  
	} 
	
	public function setRecomen($v)
	{

    if ($this->recomen !== $v) {
        $this->recomen = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::RECOMEN;
      }
  
	} 
	
	public function setRespon($v)
	{

    if ($this->respon !== $v) {
        $this->respon = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::RESPON;
      }
  
	} 
	
	public function setAsigna($v)
	{

    if ($this->asigna !== $v) {
        $this->asigna = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdatsoecoPeer::ASIGNA;
      }
  
	} 
	
	public function setDeducc($v)
	{

    if ($this->deducc !== $v) {
        $this->deducc = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdatsoecoPeer::DEDUCC;
      }
  
	} 
	
	public function setAsigcon($v)
	{

    if ($this->asigcon !== $v) {
        $this->asigcon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdatsoecoPeer::ASIGCON;
      }
  
	} 
	
	public function setDeducon($v)
	{

    if ($this->deducon !== $v) {
        $this->deducon = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdatsoecoPeer::DEDUCON;
      }
  
	} 
	
	public function setGasfam($v)
	{

    if ($this->gasfam !== $v) {
        $this->gasfam = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdatsoecoPeer::GASFAM;
      }
  
	} 
	
	public function setCappago($v)
	{

    if ($this->cappago !== $v) {
        $this->cappago = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcdatsoecoPeer::CAPPAGO;
      }
  
	} 
	
	public function setCcorimatpriId($v)
	{

    if ($this->ccorimatpri_id !== $v) {
        $this->ccorimatpri_id = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CCORIMATPRI_ID;
      }
  
		if ($this->aCcorimatpri !== null && $this->aCcorimatpri->getId() !== $v) {
			$this->aCcorimatpri = null;
		}

	} 
	
	public function setCcactecoId($v)
	{

    if ($this->ccacteco_id !== $v) {
        $this->ccacteco_id = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CCACTECO_ID;
      }
  
		if ($this->aCcacteco !== null && $this->aCcacteco->getId() !== $v) {
			$this->aCcacteco = null;
		}

	} 
	
	public function setCcestrucId($v)
	{

    if ($this->ccestruc_id !== $v) {
        $this->ccestruc_id = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CCESTRUC_ID;
      }
  
		if ($this->aCcestruc !== null && $this->aCcestruc->getId() !== $v) {
			$this->aCcestruc = null;
		}

	} 
	
	public function setCcriezonaId($v)
	{

    if ($this->ccriezona_id !== $v) {
        $this->ccriezona_id = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CCRIEZONA_ID;
      }
  
		if ($this->aCcriezona !== null && $this->aCcriezona->getId() !== $v) {
			$this->aCcriezona = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcdatsoecoPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->esptipvi = $rs->getString($startcol + 1);

      $this->dormit = $rs->getString($startcol + 2);

      $this->banos = $rs->getString($startcol + 3);

      $this->sala = $rs->getString($startcol + 4);

      $this->cocina = $rs->getString($startcol + 5);

      $this->lavade = $rs->getString($startcol + 6);

      $this->closet = $rs->getString($startcol + 7);

      $this->jardin = $rs->getString($startcol + 8);

      $this->estacio = $rs->getString($startcol + 9);

      $this->expliestruc = $rs->getString($startcol + 10);

      $this->techos = $rs->getString($startcol + 11);

      $this->paredes = $rs->getString($startcol + 12);

      $this->piso = $rs->getString($startcol + 13);

      $this->revest = $rs->getString($startcol + 14);

      $this->conser = $rs->getString($startcol + 15);

      $this->edad = $rs->getString($startcol + 16);

      $this->zona = $rs->getString($startcol + 17);

      $this->dist = $rs->getString($startcol + 18);

      $this->acceso = $rs->getString($startcol + 19);

      $this->observ = $rs->getString($startcol + 20);

      $this->linnorte = $rs->getString($startcol + 21);

      $this->linsur = $rs->getString($startcol + 22);

      $this->lineste = $rs->getString($startcol + 23);

      $this->linoeste = $rs->getString($startcol + 24);

      $this->superfi = $rs->getString($startcol + 25);

      $this->trasoc = $rs->getString($startcol + 26);

      $this->analisis = $rs->getString($startcol + 27);

      $this->recomen = $rs->getString($startcol + 28);

      $this->respon = $rs->getString($startcol + 29);

      $this->asigna = $rs->getFloat($startcol + 30);

      $this->deducc = $rs->getFloat($startcol + 31);

      $this->asigcon = $rs->getFloat($startcol + 32);

      $this->deducon = $rs->getFloat($startcol + 33);

      $this->gasfam = $rs->getFloat($startcol + 34);

      $this->cappago = $rs->getFloat($startcol + 35);

      $this->ccorimatpri_id = $rs->getInt($startcol + 36);

      $this->ccacteco_id = $rs->getInt($startcol + 37);

      $this->ccestruc_id = $rs->getInt($startcol + 38);

      $this->ccriezona_id = $rs->getInt($startcol + 39);

      $this->ccsolici_id = $rs->getInt($startcol + 40);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 41; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccdatsoeco object", $e);
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
			$con = Propel::getConnection(CcdatsoecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcdatsoecoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcdatsoecoPeer::DATABASE_NAME);
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


												
			if ($this->aCcorimatpri !== null) {
				if ($this->aCcorimatpri->isModified()) {
					$affectedRows += $this->aCcorimatpri->save($con);
				}
				$this->setCcorimatpri($this->aCcorimatpri);
			}

			if ($this->aCcacteco !== null) {
				if ($this->aCcacteco->isModified()) {
					$affectedRows += $this->aCcacteco->save($con);
				}
				$this->setCcacteco($this->aCcacteco);
			}

			if ($this->aCcestruc !== null) {
				if ($this->aCcestruc->isModified()) {
					$affectedRows += $this->aCcestruc->save($con);
				}
				$this->setCcestruc($this->aCcestruc);
			}

			if ($this->aCcriezona !== null) {
				if ($this->aCcriezona->isModified()) {
					$affectedRows += $this->aCcriezona->save($con);
				}
				$this->setCcriezona($this->aCcriezona);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcdatsoecoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcdatsoecoPeer::doUpdate($this, $con);
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


												
			if ($this->aCcorimatpri !== null) {
				if (!$this->aCcorimatpri->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcorimatpri->getValidationFailures());
				}
			}

			if ($this->aCcacteco !== null) {
				if (!$this->aCcacteco->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcacteco->getValidationFailures());
				}
			}

			if ($this->aCcestruc !== null) {
				if (!$this->aCcestruc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcestruc->getValidationFailures());
				}
			}

			if ($this->aCcriezona !== null) {
				if (!$this->aCcriezona->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcriezona->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}


			if (($retval = CcdatsoecoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdatsoecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getEsptipvi();
				break;
			case 2:
				return $this->getDormit();
				break;
			case 3:
				return $this->getBanos();
				break;
			case 4:
				return $this->getSala();
				break;
			case 5:
				return $this->getCocina();
				break;
			case 6:
				return $this->getLavade();
				break;
			case 7:
				return $this->getCloset();
				break;
			case 8:
				return $this->getJardin();
				break;
			case 9:
				return $this->getEstacio();
				break;
			case 10:
				return $this->getExpliestruc();
				break;
			case 11:
				return $this->getTechos();
				break;
			case 12:
				return $this->getParedes();
				break;
			case 13:
				return $this->getPiso();
				break;
			case 14:
				return $this->getRevest();
				break;
			case 15:
				return $this->getConser();
				break;
			case 16:
				return $this->getEdad();
				break;
			case 17:
				return $this->getZona();
				break;
			case 18:
				return $this->getDist();
				break;
			case 19:
				return $this->getAcceso();
				break;
			case 20:
				return $this->getObserv();
				break;
			case 21:
				return $this->getLinnorte();
				break;
			case 22:
				return $this->getLinsur();
				break;
			case 23:
				return $this->getLineste();
				break;
			case 24:
				return $this->getLinoeste();
				break;
			case 25:
				return $this->getSuperfi();
				break;
			case 26:
				return $this->getTrasoc();
				break;
			case 27:
				return $this->getAnalisis();
				break;
			case 28:
				return $this->getRecomen();
				break;
			case 29:
				return $this->getRespon();
				break;
			case 30:
				return $this->getAsigna();
				break;
			case 31:
				return $this->getDeducc();
				break;
			case 32:
				return $this->getAsigcon();
				break;
			case 33:
				return $this->getDeducon();
				break;
			case 34:
				return $this->getGasfam();
				break;
			case 35:
				return $this->getCappago();
				break;
			case 36:
				return $this->getCcorimatpriId();
				break;
			case 37:
				return $this->getCcactecoId();
				break;
			case 38:
				return $this->getCcestrucId();
				break;
			case 39:
				return $this->getCcriezonaId();
				break;
			case 40:
				return $this->getCcsoliciId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdatsoecoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEsptipvi(),
			$keys[2] => $this->getDormit(),
			$keys[3] => $this->getBanos(),
			$keys[4] => $this->getSala(),
			$keys[5] => $this->getCocina(),
			$keys[6] => $this->getLavade(),
			$keys[7] => $this->getCloset(),
			$keys[8] => $this->getJardin(),
			$keys[9] => $this->getEstacio(),
			$keys[10] => $this->getExpliestruc(),
			$keys[11] => $this->getTechos(),
			$keys[12] => $this->getParedes(),
			$keys[13] => $this->getPiso(),
			$keys[14] => $this->getRevest(),
			$keys[15] => $this->getConser(),
			$keys[16] => $this->getEdad(),
			$keys[17] => $this->getZona(),
			$keys[18] => $this->getDist(),
			$keys[19] => $this->getAcceso(),
			$keys[20] => $this->getObserv(),
			$keys[21] => $this->getLinnorte(),
			$keys[22] => $this->getLinsur(),
			$keys[23] => $this->getLineste(),
			$keys[24] => $this->getLinoeste(),
			$keys[25] => $this->getSuperfi(),
			$keys[26] => $this->getTrasoc(),
			$keys[27] => $this->getAnalisis(),
			$keys[28] => $this->getRecomen(),
			$keys[29] => $this->getRespon(),
			$keys[30] => $this->getAsigna(),
			$keys[31] => $this->getDeducc(),
			$keys[32] => $this->getAsigcon(),
			$keys[33] => $this->getDeducon(),
			$keys[34] => $this->getGasfam(),
			$keys[35] => $this->getCappago(),
			$keys[36] => $this->getCcorimatpriId(),
			$keys[37] => $this->getCcactecoId(),
			$keys[38] => $this->getCcestrucId(),
			$keys[39] => $this->getCcriezonaId(),
			$keys[40] => $this->getCcsoliciId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcdatsoecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setEsptipvi($value);
				break;
			case 2:
				$this->setDormit($value);
				break;
			case 3:
				$this->setBanos($value);
				break;
			case 4:
				$this->setSala($value);
				break;
			case 5:
				$this->setCocina($value);
				break;
			case 6:
				$this->setLavade($value);
				break;
			case 7:
				$this->setCloset($value);
				break;
			case 8:
				$this->setJardin($value);
				break;
			case 9:
				$this->setEstacio($value);
				break;
			case 10:
				$this->setExpliestruc($value);
				break;
			case 11:
				$this->setTechos($value);
				break;
			case 12:
				$this->setParedes($value);
				break;
			case 13:
				$this->setPiso($value);
				break;
			case 14:
				$this->setRevest($value);
				break;
			case 15:
				$this->setConser($value);
				break;
			case 16:
				$this->setEdad($value);
				break;
			case 17:
				$this->setZona($value);
				break;
			case 18:
				$this->setDist($value);
				break;
			case 19:
				$this->setAcceso($value);
				break;
			case 20:
				$this->setObserv($value);
				break;
			case 21:
				$this->setLinnorte($value);
				break;
			case 22:
				$this->setLinsur($value);
				break;
			case 23:
				$this->setLineste($value);
				break;
			case 24:
				$this->setLinoeste($value);
				break;
			case 25:
				$this->setSuperfi($value);
				break;
			case 26:
				$this->setTrasoc($value);
				break;
			case 27:
				$this->setAnalisis($value);
				break;
			case 28:
				$this->setRecomen($value);
				break;
			case 29:
				$this->setRespon($value);
				break;
			case 30:
				$this->setAsigna($value);
				break;
			case 31:
				$this->setDeducc($value);
				break;
			case 32:
				$this->setAsigcon($value);
				break;
			case 33:
				$this->setDeducon($value);
				break;
			case 34:
				$this->setGasfam($value);
				break;
			case 35:
				$this->setCappago($value);
				break;
			case 36:
				$this->setCcorimatpriId($value);
				break;
			case 37:
				$this->setCcactecoId($value);
				break;
			case 38:
				$this->setCcestrucId($value);
				break;
			case 39:
				$this->setCcriezonaId($value);
				break;
			case 40:
				$this->setCcsoliciId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcdatsoecoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEsptipvi($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDormit($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setBanos($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSala($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCocina($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLavade($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCloset($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setJardin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEstacio($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setExpliestruc($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTechos($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setParedes($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPiso($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setRevest($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setConser($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEdad($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setZona($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDist($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAcceso($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setObserv($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setLinnorte($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setLinsur($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setLineste($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setLinoeste($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setSuperfi($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTrasoc($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setAnalisis($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setRecomen($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setRespon($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setAsigna($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setDeducc($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setAsigcon($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setDeducon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setGasfam($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCappago($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setCcorimatpriId($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCcactecoId($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCcestrucId($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setCcriezonaId($arr[$keys[39]]);
		if (array_key_exists($keys[40], $arr)) $this->setCcsoliciId($arr[$keys[40]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcdatsoecoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcdatsoecoPeer::ID)) $criteria->add(CcdatsoecoPeer::ID, $this->id);
		if ($this->isColumnModified(CcdatsoecoPeer::ESPTIPVI)) $criteria->add(CcdatsoecoPeer::ESPTIPVI, $this->esptipvi);
		if ($this->isColumnModified(CcdatsoecoPeer::DORMIT)) $criteria->add(CcdatsoecoPeer::DORMIT, $this->dormit);
		if ($this->isColumnModified(CcdatsoecoPeer::BANOS)) $criteria->add(CcdatsoecoPeer::BANOS, $this->banos);
		if ($this->isColumnModified(CcdatsoecoPeer::SALA)) $criteria->add(CcdatsoecoPeer::SALA, $this->sala);
		if ($this->isColumnModified(CcdatsoecoPeer::COCINA)) $criteria->add(CcdatsoecoPeer::COCINA, $this->cocina);
		if ($this->isColumnModified(CcdatsoecoPeer::LAVADE)) $criteria->add(CcdatsoecoPeer::LAVADE, $this->lavade);
		if ($this->isColumnModified(CcdatsoecoPeer::CLOSET)) $criteria->add(CcdatsoecoPeer::CLOSET, $this->closet);
		if ($this->isColumnModified(CcdatsoecoPeer::JARDIN)) $criteria->add(CcdatsoecoPeer::JARDIN, $this->jardin);
		if ($this->isColumnModified(CcdatsoecoPeer::ESTACIO)) $criteria->add(CcdatsoecoPeer::ESTACIO, $this->estacio);
		if ($this->isColumnModified(CcdatsoecoPeer::EXPLIESTRUC)) $criteria->add(CcdatsoecoPeer::EXPLIESTRUC, $this->expliestruc);
		if ($this->isColumnModified(CcdatsoecoPeer::TECHOS)) $criteria->add(CcdatsoecoPeer::TECHOS, $this->techos);
		if ($this->isColumnModified(CcdatsoecoPeer::PAREDES)) $criteria->add(CcdatsoecoPeer::PAREDES, $this->paredes);
		if ($this->isColumnModified(CcdatsoecoPeer::PISO)) $criteria->add(CcdatsoecoPeer::PISO, $this->piso);
		if ($this->isColumnModified(CcdatsoecoPeer::REVEST)) $criteria->add(CcdatsoecoPeer::REVEST, $this->revest);
		if ($this->isColumnModified(CcdatsoecoPeer::CONSER)) $criteria->add(CcdatsoecoPeer::CONSER, $this->conser);
		if ($this->isColumnModified(CcdatsoecoPeer::EDAD)) $criteria->add(CcdatsoecoPeer::EDAD, $this->edad);
		if ($this->isColumnModified(CcdatsoecoPeer::ZONA)) $criteria->add(CcdatsoecoPeer::ZONA, $this->zona);
		if ($this->isColumnModified(CcdatsoecoPeer::DIST)) $criteria->add(CcdatsoecoPeer::DIST, $this->dist);
		if ($this->isColumnModified(CcdatsoecoPeer::ACCESO)) $criteria->add(CcdatsoecoPeer::ACCESO, $this->acceso);
		if ($this->isColumnModified(CcdatsoecoPeer::OBSERV)) $criteria->add(CcdatsoecoPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcdatsoecoPeer::LINNORTE)) $criteria->add(CcdatsoecoPeer::LINNORTE, $this->linnorte);
		if ($this->isColumnModified(CcdatsoecoPeer::LINSUR)) $criteria->add(CcdatsoecoPeer::LINSUR, $this->linsur);
		if ($this->isColumnModified(CcdatsoecoPeer::LINESTE)) $criteria->add(CcdatsoecoPeer::LINESTE, $this->lineste);
		if ($this->isColumnModified(CcdatsoecoPeer::LINOESTE)) $criteria->add(CcdatsoecoPeer::LINOESTE, $this->linoeste);
		if ($this->isColumnModified(CcdatsoecoPeer::SUPERFI)) $criteria->add(CcdatsoecoPeer::SUPERFI, $this->superfi);
		if ($this->isColumnModified(CcdatsoecoPeer::TRASOC)) $criteria->add(CcdatsoecoPeer::TRASOC, $this->trasoc);
		if ($this->isColumnModified(CcdatsoecoPeer::ANALISIS)) $criteria->add(CcdatsoecoPeer::ANALISIS, $this->analisis);
		if ($this->isColumnModified(CcdatsoecoPeer::RECOMEN)) $criteria->add(CcdatsoecoPeer::RECOMEN, $this->recomen);
		if ($this->isColumnModified(CcdatsoecoPeer::RESPON)) $criteria->add(CcdatsoecoPeer::RESPON, $this->respon);
		if ($this->isColumnModified(CcdatsoecoPeer::ASIGNA)) $criteria->add(CcdatsoecoPeer::ASIGNA, $this->asigna);
		if ($this->isColumnModified(CcdatsoecoPeer::DEDUCC)) $criteria->add(CcdatsoecoPeer::DEDUCC, $this->deducc);
		if ($this->isColumnModified(CcdatsoecoPeer::ASIGCON)) $criteria->add(CcdatsoecoPeer::ASIGCON, $this->asigcon);
		if ($this->isColumnModified(CcdatsoecoPeer::DEDUCON)) $criteria->add(CcdatsoecoPeer::DEDUCON, $this->deducon);
		if ($this->isColumnModified(CcdatsoecoPeer::GASFAM)) $criteria->add(CcdatsoecoPeer::GASFAM, $this->gasfam);
		if ($this->isColumnModified(CcdatsoecoPeer::CAPPAGO)) $criteria->add(CcdatsoecoPeer::CAPPAGO, $this->cappago);
		if ($this->isColumnModified(CcdatsoecoPeer::CCORIMATPRI_ID)) $criteria->add(CcdatsoecoPeer::CCORIMATPRI_ID, $this->ccorimatpri_id);
		if ($this->isColumnModified(CcdatsoecoPeer::CCACTECO_ID)) $criteria->add(CcdatsoecoPeer::CCACTECO_ID, $this->ccacteco_id);
		if ($this->isColumnModified(CcdatsoecoPeer::CCESTRUC_ID)) $criteria->add(CcdatsoecoPeer::CCESTRUC_ID, $this->ccestruc_id);
		if ($this->isColumnModified(CcdatsoecoPeer::CCRIEZONA_ID)) $criteria->add(CcdatsoecoPeer::CCRIEZONA_ID, $this->ccriezona_id);
		if ($this->isColumnModified(CcdatsoecoPeer::CCSOLICI_ID)) $criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->ccsolici_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcdatsoecoPeer::DATABASE_NAME);

		$criteria->add(CcdatsoecoPeer::ID, $this->id);

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

		$copyObj->setEsptipvi($this->esptipvi);

		$copyObj->setDormit($this->dormit);

		$copyObj->setBanos($this->banos);

		$copyObj->setSala($this->sala);

		$copyObj->setCocina($this->cocina);

		$copyObj->setLavade($this->lavade);

		$copyObj->setCloset($this->closet);

		$copyObj->setJardin($this->jardin);

		$copyObj->setEstacio($this->estacio);

		$copyObj->setExpliestruc($this->expliestruc);

		$copyObj->setTechos($this->techos);

		$copyObj->setParedes($this->paredes);

		$copyObj->setPiso($this->piso);

		$copyObj->setRevest($this->revest);

		$copyObj->setConser($this->conser);

		$copyObj->setEdad($this->edad);

		$copyObj->setZona($this->zona);

		$copyObj->setDist($this->dist);

		$copyObj->setAcceso($this->acceso);

		$copyObj->setObserv($this->observ);

		$copyObj->setLinnorte($this->linnorte);

		$copyObj->setLinsur($this->linsur);

		$copyObj->setLineste($this->lineste);

		$copyObj->setLinoeste($this->linoeste);

		$copyObj->setSuperfi($this->superfi);

		$copyObj->setTrasoc($this->trasoc);

		$copyObj->setAnalisis($this->analisis);

		$copyObj->setRecomen($this->recomen);

		$copyObj->setRespon($this->respon);

		$copyObj->setAsigna($this->asigna);

		$copyObj->setDeducc($this->deducc);

		$copyObj->setAsigcon($this->asigcon);

		$copyObj->setDeducon($this->deducon);

		$copyObj->setGasfam($this->gasfam);

		$copyObj->setCappago($this->cappago);

		$copyObj->setCcorimatpriId($this->ccorimatpri_id);

		$copyObj->setCcactecoId($this->ccacteco_id);

		$copyObj->setCcestrucId($this->ccestruc_id);

		$copyObj->setCcriezonaId($this->ccriezona_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);


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
			self::$peer = new CcdatsoecoPeer();
		}
		return self::$peer;
	}

	
	public function setCcorimatpri($v)
	{


		if ($v === null) {
			$this->setCcorimatpriId(NULL);
		} else {
			$this->setCcorimatpriId($v->getId());
		}


		$this->aCcorimatpri = $v;
	}


	
	public function getCcorimatpri($con = null)
	{
		if ($this->aCcorimatpri === null && ($this->ccorimatpri_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcorimatpriPeer.php';

      $c = new Criteria();
      $c->add(CcorimatpriPeer::ID,$this->ccorimatpri_id);
      
			$this->aCcorimatpri = CcorimatpriPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcorimatpri;
	}

	
	public function setCcacteco($v)
	{


		if ($v === null) {
			$this->setCcactecoId(NULL);
		} else {
			$this->setCcactecoId($v->getId());
		}


		$this->aCcacteco = $v;
	}


	
	public function getCcacteco($con = null)
	{
		if ($this->aCcacteco === null && ($this->ccacteco_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcactecoPeer.php';

      $c = new Criteria();
      $c->add(CcactecoPeer::ID,$this->ccacteco_id);
      
			$this->aCcacteco = CcactecoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcacteco;
	}

	
	public function setCcestruc($v)
	{


		if ($v === null) {
			$this->setCcestrucId(NULL);
		} else {
			$this->setCcestrucId($v->getId());
		}


		$this->aCcestruc = $v;
	}


	
	public function getCcestruc($con = null)
	{
		if ($this->aCcestruc === null && ($this->ccestruc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcestrucPeer.php';

      $c = new Criteria();
      $c->add(CcestrucPeer::ID,$this->ccestruc_id);
      
			$this->aCcestruc = CcestrucPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcestruc;
	}

	
	public function setCcriezona($v)
	{


		if ($v === null) {
			$this->setCcriezonaId(NULL);
		} else {
			$this->setCcriezonaId($v->getId());
		}


		$this->aCcriezona = $v;
	}


	
	public function getCcriezona($con = null)
	{
		if ($this->aCcriezona === null && ($this->ccriezona_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcriezonaPeer.php';

      $c = new Criteria();
      $c->add(CcriezonaPeer::ID,$this->ccriezona_id);
      
			$this->aCcriezona = CcriezonaPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcriezona;
	}

	
	public function setCcsolici($v)
	{


		if ($v === null) {
			$this->setCcsoliciId(NULL);
		} else {
			$this->setCcsoliciId($v->getId());
		}


		$this->aCcsolici = $v;
	}


	
	public function getCcsolici($con = null)
	{
		if ($this->aCcsolici === null && ($this->ccsolici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcsoliciPeer.php';

      $c = new Criteria();
      $c->add(CcsoliciPeer::ID,$this->ccsolici_id);
      
			$this->aCcsolici = CcsoliciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcsolici;
	}

} 