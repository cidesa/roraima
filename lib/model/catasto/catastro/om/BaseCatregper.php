<?php


abstract class BaseCatregper extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $catbarurb_id;


	
	protected $catsec_id;


	
	protected $catpar_id;


	
	protected $catmun_id;


	
	protected $catdivgeo_id;


	
	protected $catest_id;


	
	protected $cattramofro_id;


	
	protected $cattramolat_id;


	
	protected $cattramolat2_id;


	
	protected $catcodpos_id;


	
	protected $cedrif;


	
	protected $fecper;


	
	protected $nomper;


	
	protected $prinom;


	
	protected $segnom;


	
	protected $priape;


	
	protected $segape;


	
	protected $relemp;


	
	protected $nacper;


	
	protected $tipper;


	
	protected $telper;


	
	protected $faxper;


	
	protected $apaposper;


	
	protected $emaper;


	
	protected $dirper;


	
	protected $edicas;


	
	protected $pishab;


	
	protected $numhab;


	
	protected $codofi;


	
	protected $staper;


	
	protected $id;

	
	protected $aCatbarurb;

	
	protected $aCatsec;

	
	protected $aCatpar;

	
	protected $aCatmun;

	
	protected $aCatdivgeo;

	
	protected $aCatest;

	
	protected $aCattramoRelatedByCattramofroId;

	
	protected $aCattramoRelatedByCattramolatId;

	
	protected $aCattramoRelatedByCattramolat2Id;

	
	protected $aCatcodpos;

	
	protected $collCatperinms;

	
	protected $lastCatperinmCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCatbarurbId()
  {

    return $this->catbarurb_id;

  }
  
  public function getCatsecId()
  {

    return $this->catsec_id;

  }
  
  public function getCatparId()
  {

    return $this->catpar_id;

  }
  
  public function getCatmunId()
  {

    return $this->catmun_id;

  }
  
  public function getCatdivgeoId()
  {

    return $this->catdivgeo_id;

  }
  
  public function getCatestId()
  {

    return $this->catest_id;

  }
  
  public function getCattramofroId()
  {

    return $this->cattramofro_id;

  }
  
  public function getCattramolatId()
  {

    return $this->cattramolat_id;

  }
  
  public function getCattramolat2Id()
  {

    return $this->cattramolat2_id;

  }
  
  public function getCatcodposId()
  {

    return $this->catcodpos_id;

  }
  
  public function getCedrif()
  {

    return trim($this->cedrif);

  }
  
  public function getFecper($format = 'Y-m-d')
  {

    if ($this->fecper === null || $this->fecper === '') {
      return null;
    } elseif (!is_int($this->fecper)) {
            $ts = adodb_strtotime($this->fecper);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecper] as date/time value: " . var_export($this->fecper, true));
      }
    } else {
      $ts = $this->fecper;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomper()
  {

    return trim($this->nomper);

  }
  
  public function getPrinom()
  {

    return trim($this->prinom);

  }
  
  public function getSegnom()
  {

    return trim($this->segnom);

  }
  
  public function getPriape()
  {

    return trim($this->priape);

  }
  
  public function getSegape()
  {

    return trim($this->segape);

  }
  
  public function getRelemp()
  {

    return trim($this->relemp);

  }
  
  public function getNacper()
  {

    return trim($this->nacper);

  }
  
  public function getTipper()
  {

    return trim($this->tipper);

  }
  
  public function getTelper()
  {

    return trim($this->telper);

  }
  
  public function getFaxper()
  {

    return trim($this->faxper);

  }
  
  public function getApaposper()
  {

    return trim($this->apaposper);

  }
  
  public function getEmaper()
  {

    return trim($this->emaper);

  }
  
  public function getDirper()
  {

    return trim($this->dirper);

  }
  
  public function getEdicas()
  {

    return trim($this->edicas);

  }
  
  public function getPishab()
  {

    return trim($this->pishab);

  }
  
  public function getNumhab()
  {

    return trim($this->numhab);

  }
  
  public function getCodofi()
  {

    return trim($this->codofi);

  }
  
  public function getStaper()
  {

    return trim($this->staper);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCatbarurbId($v)
	{

    if ($this->catbarurb_id !== $v) {
        $this->catbarurb_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATBARURB_ID;
      }
  
		if ($this->aCatbarurb !== null && $this->aCatbarurb->getId() !== $v) {
			$this->aCatbarurb = null;
		}

	} 
	
	public function setCatsecId($v)
	{

    if ($this->catsec_id !== $v) {
        $this->catsec_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATSEC_ID;
      }
  
		if ($this->aCatsec !== null && $this->aCatsec->getId() !== $v) {
			$this->aCatsec = null;
		}

	} 
	
	public function setCatparId($v)
	{

    if ($this->catpar_id !== $v) {
        $this->catpar_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATPAR_ID;
      }
  
		if ($this->aCatpar !== null && $this->aCatpar->getId() !== $v) {
			$this->aCatpar = null;
		}

	} 
	
	public function setCatmunId($v)
	{

    if ($this->catmun_id !== $v) {
        $this->catmun_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATMUN_ID;
      }
  
		if ($this->aCatmun !== null && $this->aCatmun->getId() !== $v) {
			$this->aCatmun = null;
		}

	} 
	
	public function setCatdivgeoId($v)
	{

    if ($this->catdivgeo_id !== $v) {
        $this->catdivgeo_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATDIVGEO_ID;
      }
  
		if ($this->aCatdivgeo !== null && $this->aCatdivgeo->getId() !== $v) {
			$this->aCatdivgeo = null;
		}

	} 
	
	public function setCatestId($v)
	{

    if ($this->catest_id !== $v) {
        $this->catest_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATEST_ID;
      }
  
		if ($this->aCatest !== null && $this->aCatest->getId() !== $v) {
			$this->aCatest = null;
		}

	} 
	
	public function setCattramofroId($v)
	{

    if ($this->cattramofro_id !== $v) {
        $this->cattramofro_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATTRAMOFRO_ID;
      }
  
		if ($this->aCattramoRelatedByCattramofroId !== null && $this->aCattramoRelatedByCattramofroId->getId() !== $v) {
			$this->aCattramoRelatedByCattramofroId = null;
		}

	} 
	
	public function setCattramolatId($v)
	{

    if ($this->cattramolat_id !== $v) {
        $this->cattramolat_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATTRAMOLAT_ID;
      }
  
		if ($this->aCattramoRelatedByCattramolatId !== null && $this->aCattramoRelatedByCattramolatId->getId() !== $v) {
			$this->aCattramoRelatedByCattramolatId = null;
		}

	} 
	
	public function setCattramolat2Id($v)
	{

    if ($this->cattramolat2_id !== $v) {
        $this->cattramolat2_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATTRAMOLAT2_ID;
      }
  
		if ($this->aCattramoRelatedByCattramolat2Id !== null && $this->aCattramoRelatedByCattramolat2Id->getId() !== $v) {
			$this->aCattramoRelatedByCattramolat2Id = null;
		}

	} 
	
	public function setCatcodposId($v)
	{

    if ($this->catcodpos_id !== $v) {
        $this->catcodpos_id = $v;
        $this->modifiedColumns[] = CatregperPeer::CATCODPOS_ID;
      }
  
		if ($this->aCatcodpos !== null && $this->aCatcodpos->getId() !== $v) {
			$this->aCatcodpos = null;
		}

	} 
	
	public function setCedrif($v)
	{

    if ($this->cedrif !== $v) {
        $this->cedrif = $v;
        $this->modifiedColumns[] = CatregperPeer::CEDRIF;
      }
  
	} 
	
	public function setFecper($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecper] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecper !== $ts) {
      $this->fecper = $ts;
      $this->modifiedColumns[] = CatregperPeer::FECPER;
    }

	} 
	
	public function setNomper($v)
	{

    if ($this->nomper !== $v) {
        $this->nomper = $v;
        $this->modifiedColumns[] = CatregperPeer::NOMPER;
      }
  
	} 
	
	public function setPrinom($v)
	{

    if ($this->prinom !== $v) {
        $this->prinom = $v;
        $this->modifiedColumns[] = CatregperPeer::PRINOM;
      }
  
	} 
	
	public function setSegnom($v)
	{

    if ($this->segnom !== $v) {
        $this->segnom = $v;
        $this->modifiedColumns[] = CatregperPeer::SEGNOM;
      }
  
	} 
	
	public function setPriape($v)
	{

    if ($this->priape !== $v) {
        $this->priape = $v;
        $this->modifiedColumns[] = CatregperPeer::PRIAPE;
      }
  
	} 
	
	public function setSegape($v)
	{

    if ($this->segape !== $v) {
        $this->segape = $v;
        $this->modifiedColumns[] = CatregperPeer::SEGAPE;
      }
  
	} 
	
	public function setRelemp($v)
	{

    if ($this->relemp !== $v) {
        $this->relemp = $v;
        $this->modifiedColumns[] = CatregperPeer::RELEMP;
      }
  
	} 
	
	public function setNacper($v)
	{

    if ($this->nacper !== $v) {
        $this->nacper = $v;
        $this->modifiedColumns[] = CatregperPeer::NACPER;
      }
  
	} 
	
	public function setTipper($v)
	{

    if ($this->tipper !== $v) {
        $this->tipper = $v;
        $this->modifiedColumns[] = CatregperPeer::TIPPER;
      }
  
	} 
	
	public function setTelper($v)
	{

    if ($this->telper !== $v) {
        $this->telper = $v;
        $this->modifiedColumns[] = CatregperPeer::TELPER;
      }
  
	} 
	
	public function setFaxper($v)
	{

    if ($this->faxper !== $v) {
        $this->faxper = $v;
        $this->modifiedColumns[] = CatregperPeer::FAXPER;
      }
  
	} 
	
	public function setApaposper($v)
	{

    if ($this->apaposper !== $v) {
        $this->apaposper = $v;
        $this->modifiedColumns[] = CatregperPeer::APAPOSPER;
      }
  
	} 
	
	public function setEmaper($v)
	{

    if ($this->emaper !== $v) {
        $this->emaper = $v;
        $this->modifiedColumns[] = CatregperPeer::EMAPER;
      }
  
	} 
	
	public function setDirper($v)
	{

    if ($this->dirper !== $v) {
        $this->dirper = $v;
        $this->modifiedColumns[] = CatregperPeer::DIRPER;
      }
  
	} 
	
	public function setEdicas($v)
	{

    if ($this->edicas !== $v) {
        $this->edicas = $v;
        $this->modifiedColumns[] = CatregperPeer::EDICAS;
      }
  
	} 
	
	public function setPishab($v)
	{

    if ($this->pishab !== $v) {
        $this->pishab = $v;
        $this->modifiedColumns[] = CatregperPeer::PISHAB;
      }
  
	} 
	
	public function setNumhab($v)
	{

    if ($this->numhab !== $v) {
        $this->numhab = $v;
        $this->modifiedColumns[] = CatregperPeer::NUMHAB;
      }
  
	} 
	
	public function setCodofi($v)
	{

    if ($this->codofi !== $v) {
        $this->codofi = $v;
        $this->modifiedColumns[] = CatregperPeer::CODOFI;
      }
  
	} 
	
	public function setStaper($v)
	{

    if ($this->staper !== $v) {
        $this->staper = $v;
        $this->modifiedColumns[] = CatregperPeer::STAPER;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CatregperPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->catbarurb_id = $rs->getInt($startcol + 0);

      $this->catsec_id = $rs->getInt($startcol + 1);

      $this->catpar_id = $rs->getInt($startcol + 2);

      $this->catmun_id = $rs->getInt($startcol + 3);

      $this->catdivgeo_id = $rs->getInt($startcol + 4);

      $this->catest_id = $rs->getInt($startcol + 5);

      $this->cattramofro_id = $rs->getInt($startcol + 6);

      $this->cattramolat_id = $rs->getInt($startcol + 7);

      $this->cattramolat2_id = $rs->getInt($startcol + 8);

      $this->catcodpos_id = $rs->getInt($startcol + 9);

      $this->cedrif = $rs->getString($startcol + 10);

      $this->fecper = $rs->getDate($startcol + 11, null);

      $this->nomper = $rs->getString($startcol + 12);

      $this->prinom = $rs->getString($startcol + 13);

      $this->segnom = $rs->getString($startcol + 14);

      $this->priape = $rs->getString($startcol + 15);

      $this->segape = $rs->getString($startcol + 16);

      $this->relemp = $rs->getString($startcol + 17);

      $this->nacper = $rs->getString($startcol + 18);

      $this->tipper = $rs->getString($startcol + 19);

      $this->telper = $rs->getString($startcol + 20);

      $this->faxper = $rs->getString($startcol + 21);

      $this->apaposper = $rs->getString($startcol + 22);

      $this->emaper = $rs->getString($startcol + 23);

      $this->dirper = $rs->getString($startcol + 24);

      $this->edicas = $rs->getString($startcol + 25);

      $this->pishab = $rs->getString($startcol + 26);

      $this->numhab = $rs->getString($startcol + 27);

      $this->codofi = $rs->getString($startcol + 28);

      $this->staper = $rs->getString($startcol + 29);

      $this->id = $rs->getInt($startcol + 30);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 31; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Catregper object", $e);
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
			$con = Propel::getConnection(CatregperPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CatregperPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CatregperPeer::DATABASE_NAME);
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


												
			if ($this->aCatbarurb !== null) {
				if ($this->aCatbarurb->isModified()) {
					$affectedRows += $this->aCatbarurb->save($con);
				}
				$this->setCatbarurb($this->aCatbarurb);
			}

			if ($this->aCatsec !== null) {
				if ($this->aCatsec->isModified()) {
					$affectedRows += $this->aCatsec->save($con);
				}
				$this->setCatsec($this->aCatsec);
			}

			if ($this->aCatpar !== null) {
				if ($this->aCatpar->isModified()) {
					$affectedRows += $this->aCatpar->save($con);
				}
				$this->setCatpar($this->aCatpar);
			}

			if ($this->aCatmun !== null) {
				if ($this->aCatmun->isModified()) {
					$affectedRows += $this->aCatmun->save($con);
				}
				$this->setCatmun($this->aCatmun);
			}

			if ($this->aCatdivgeo !== null) {
				if ($this->aCatdivgeo->isModified()) {
					$affectedRows += $this->aCatdivgeo->save($con);
				}
				$this->setCatdivgeo($this->aCatdivgeo);
			}

			if ($this->aCatest !== null) {
				if ($this->aCatest->isModified()) {
					$affectedRows += $this->aCatest->save($con);
				}
				$this->setCatest($this->aCatest);
			}

			if ($this->aCattramoRelatedByCattramofroId !== null) {
				if ($this->aCattramoRelatedByCattramofroId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramofroId->save($con);
				}
				$this->setCattramoRelatedByCattramofroId($this->aCattramoRelatedByCattramofroId);
			}

			if ($this->aCattramoRelatedByCattramolatId !== null) {
				if ($this->aCattramoRelatedByCattramolatId->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramolatId->save($con);
				}
				$this->setCattramoRelatedByCattramolatId($this->aCattramoRelatedByCattramolatId);
			}

			if ($this->aCattramoRelatedByCattramolat2Id !== null) {
				if ($this->aCattramoRelatedByCattramolat2Id->isModified()) {
					$affectedRows += $this->aCattramoRelatedByCattramolat2Id->save($con);
				}
				$this->setCattramoRelatedByCattramolat2Id($this->aCattramoRelatedByCattramolat2Id);
			}

			if ($this->aCatcodpos !== null) {
				if ($this->aCatcodpos->isModified()) {
					$affectedRows += $this->aCatcodpos->save($con);
				}
				$this->setCatcodpos($this->aCatcodpos);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CatregperPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CatregperPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCatperinms !== null) {
				foreach($this->collCatperinms as $referrerFK) {
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


												
			if ($this->aCatbarurb !== null) {
				if (!$this->aCatbarurb->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatbarurb->getValidationFailures());
				}
			}

			if ($this->aCatsec !== null) {
				if (!$this->aCatsec->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatsec->getValidationFailures());
				}
			}

			if ($this->aCatpar !== null) {
				if (!$this->aCatpar->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatpar->getValidationFailures());
				}
			}

			if ($this->aCatmun !== null) {
				if (!$this->aCatmun->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatmun->getValidationFailures());
				}
			}

			if ($this->aCatdivgeo !== null) {
				if (!$this->aCatdivgeo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatdivgeo->getValidationFailures());
				}
			}

			if ($this->aCatest !== null) {
				if (!$this->aCatest->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatest->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramofroId !== null) {
				if (!$this->aCattramoRelatedByCattramofroId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramofroId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramolatId !== null) {
				if (!$this->aCattramoRelatedByCattramolatId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramolatId->getValidationFailures());
				}
			}

			if ($this->aCattramoRelatedByCattramolat2Id !== null) {
				if (!$this->aCattramoRelatedByCattramolat2Id->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCattramoRelatedByCattramolat2Id->getValidationFailures());
				}
			}

			if ($this->aCatcodpos !== null) {
				if (!$this->aCatcodpos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCatcodpos->getValidationFailures());
				}
			}


			if (($retval = CatregperPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCatperinms !== null) {
					foreach($this->collCatperinms as $referrerFK) {
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
		$pos = CatregperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCatbarurbId();
				break;
			case 1:
				return $this->getCatsecId();
				break;
			case 2:
				return $this->getCatparId();
				break;
			case 3:
				return $this->getCatmunId();
				break;
			case 4:
				return $this->getCatdivgeoId();
				break;
			case 5:
				return $this->getCatestId();
				break;
			case 6:
				return $this->getCattramofroId();
				break;
			case 7:
				return $this->getCattramolatId();
				break;
			case 8:
				return $this->getCattramolat2Id();
				break;
			case 9:
				return $this->getCatcodposId();
				break;
			case 10:
				return $this->getCedrif();
				break;
			case 11:
				return $this->getFecper();
				break;
			case 12:
				return $this->getNomper();
				break;
			case 13:
				return $this->getPrinom();
				break;
			case 14:
				return $this->getSegnom();
				break;
			case 15:
				return $this->getPriape();
				break;
			case 16:
				return $this->getSegape();
				break;
			case 17:
				return $this->getRelemp();
				break;
			case 18:
				return $this->getNacper();
				break;
			case 19:
				return $this->getTipper();
				break;
			case 20:
				return $this->getTelper();
				break;
			case 21:
				return $this->getFaxper();
				break;
			case 22:
				return $this->getApaposper();
				break;
			case 23:
				return $this->getEmaper();
				break;
			case 24:
				return $this->getDirper();
				break;
			case 25:
				return $this->getEdicas();
				break;
			case 26:
				return $this->getPishab();
				break;
			case 27:
				return $this->getNumhab();
				break;
			case 28:
				return $this->getCodofi();
				break;
			case 29:
				return $this->getStaper();
				break;
			case 30:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatregperPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCatbarurbId(),
			$keys[1] => $this->getCatsecId(),
			$keys[2] => $this->getCatparId(),
			$keys[3] => $this->getCatmunId(),
			$keys[4] => $this->getCatdivgeoId(),
			$keys[5] => $this->getCatestId(),
			$keys[6] => $this->getCattramofroId(),
			$keys[7] => $this->getCattramolatId(),
			$keys[8] => $this->getCattramolat2Id(),
			$keys[9] => $this->getCatcodposId(),
			$keys[10] => $this->getCedrif(),
			$keys[11] => $this->getFecper(),
			$keys[12] => $this->getNomper(),
			$keys[13] => $this->getPrinom(),
			$keys[14] => $this->getSegnom(),
			$keys[15] => $this->getPriape(),
			$keys[16] => $this->getSegape(),
			$keys[17] => $this->getRelemp(),
			$keys[18] => $this->getNacper(),
			$keys[19] => $this->getTipper(),
			$keys[20] => $this->getTelper(),
			$keys[21] => $this->getFaxper(),
			$keys[22] => $this->getApaposper(),
			$keys[23] => $this->getEmaper(),
			$keys[24] => $this->getDirper(),
			$keys[25] => $this->getEdicas(),
			$keys[26] => $this->getPishab(),
			$keys[27] => $this->getNumhab(),
			$keys[28] => $this->getCodofi(),
			$keys[29] => $this->getStaper(),
			$keys[30] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CatregperPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCatbarurbId($value);
				break;
			case 1:
				$this->setCatsecId($value);
				break;
			case 2:
				$this->setCatparId($value);
				break;
			case 3:
				$this->setCatmunId($value);
				break;
			case 4:
				$this->setCatdivgeoId($value);
				break;
			case 5:
				$this->setCatestId($value);
				break;
			case 6:
				$this->setCattramofroId($value);
				break;
			case 7:
				$this->setCattramolatId($value);
				break;
			case 8:
				$this->setCattramolat2Id($value);
				break;
			case 9:
				$this->setCatcodposId($value);
				break;
			case 10:
				$this->setCedrif($value);
				break;
			case 11:
				$this->setFecper($value);
				break;
			case 12:
				$this->setNomper($value);
				break;
			case 13:
				$this->setPrinom($value);
				break;
			case 14:
				$this->setSegnom($value);
				break;
			case 15:
				$this->setPriape($value);
				break;
			case 16:
				$this->setSegape($value);
				break;
			case 17:
				$this->setRelemp($value);
				break;
			case 18:
				$this->setNacper($value);
				break;
			case 19:
				$this->setTipper($value);
				break;
			case 20:
				$this->setTelper($value);
				break;
			case 21:
				$this->setFaxper($value);
				break;
			case 22:
				$this->setApaposper($value);
				break;
			case 23:
				$this->setEmaper($value);
				break;
			case 24:
				$this->setDirper($value);
				break;
			case 25:
				$this->setEdicas($value);
				break;
			case 26:
				$this->setPishab($value);
				break;
			case 27:
				$this->setNumhab($value);
				break;
			case 28:
				$this->setCodofi($value);
				break;
			case 29:
				$this->setStaper($value);
				break;
			case 30:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CatregperPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCatbarurbId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCatsecId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCatparId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCatmunId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCatdivgeoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCatestId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCattramofroId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCattramolatId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCattramolat2Id($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCatcodposId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCedrif($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecper($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNomper($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPrinom($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSegnom($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPriape($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSegape($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRelemp($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setNacper($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTipper($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTelper($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFaxper($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setApaposper($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setEmaper($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setDirper($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setEdicas($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPishab($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNumhab($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodofi($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setStaper($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setId($arr[$keys[30]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CatregperPeer::DATABASE_NAME);

		if ($this->isColumnModified(CatregperPeer::CATBARURB_ID)) $criteria->add(CatregperPeer::CATBARURB_ID, $this->catbarurb_id);
		if ($this->isColumnModified(CatregperPeer::CATSEC_ID)) $criteria->add(CatregperPeer::CATSEC_ID, $this->catsec_id);
		if ($this->isColumnModified(CatregperPeer::CATPAR_ID)) $criteria->add(CatregperPeer::CATPAR_ID, $this->catpar_id);
		if ($this->isColumnModified(CatregperPeer::CATMUN_ID)) $criteria->add(CatregperPeer::CATMUN_ID, $this->catmun_id);
		if ($this->isColumnModified(CatregperPeer::CATDIVGEO_ID)) $criteria->add(CatregperPeer::CATDIVGEO_ID, $this->catdivgeo_id);
		if ($this->isColumnModified(CatregperPeer::CATEST_ID)) $criteria->add(CatregperPeer::CATEST_ID, $this->catest_id);
		if ($this->isColumnModified(CatregperPeer::CATTRAMOFRO_ID)) $criteria->add(CatregperPeer::CATTRAMOFRO_ID, $this->cattramofro_id);
		if ($this->isColumnModified(CatregperPeer::CATTRAMOLAT_ID)) $criteria->add(CatregperPeer::CATTRAMOLAT_ID, $this->cattramolat_id);
		if ($this->isColumnModified(CatregperPeer::CATTRAMOLAT2_ID)) $criteria->add(CatregperPeer::CATTRAMOLAT2_ID, $this->cattramolat2_id);
		if ($this->isColumnModified(CatregperPeer::CATCODPOS_ID)) $criteria->add(CatregperPeer::CATCODPOS_ID, $this->catcodpos_id);
		if ($this->isColumnModified(CatregperPeer::CEDRIF)) $criteria->add(CatregperPeer::CEDRIF, $this->cedrif);
		if ($this->isColumnModified(CatregperPeer::FECPER)) $criteria->add(CatregperPeer::FECPER, $this->fecper);
		if ($this->isColumnModified(CatregperPeer::NOMPER)) $criteria->add(CatregperPeer::NOMPER, $this->nomper);
		if ($this->isColumnModified(CatregperPeer::PRINOM)) $criteria->add(CatregperPeer::PRINOM, $this->prinom);
		if ($this->isColumnModified(CatregperPeer::SEGNOM)) $criteria->add(CatregperPeer::SEGNOM, $this->segnom);
		if ($this->isColumnModified(CatregperPeer::PRIAPE)) $criteria->add(CatregperPeer::PRIAPE, $this->priape);
		if ($this->isColumnModified(CatregperPeer::SEGAPE)) $criteria->add(CatregperPeer::SEGAPE, $this->segape);
		if ($this->isColumnModified(CatregperPeer::RELEMP)) $criteria->add(CatregperPeer::RELEMP, $this->relemp);
		if ($this->isColumnModified(CatregperPeer::NACPER)) $criteria->add(CatregperPeer::NACPER, $this->nacper);
		if ($this->isColumnModified(CatregperPeer::TIPPER)) $criteria->add(CatregperPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(CatregperPeer::TELPER)) $criteria->add(CatregperPeer::TELPER, $this->telper);
		if ($this->isColumnModified(CatregperPeer::FAXPER)) $criteria->add(CatregperPeer::FAXPER, $this->faxper);
		if ($this->isColumnModified(CatregperPeer::APAPOSPER)) $criteria->add(CatregperPeer::APAPOSPER, $this->apaposper);
		if ($this->isColumnModified(CatregperPeer::EMAPER)) $criteria->add(CatregperPeer::EMAPER, $this->emaper);
		if ($this->isColumnModified(CatregperPeer::DIRPER)) $criteria->add(CatregperPeer::DIRPER, $this->dirper);
		if ($this->isColumnModified(CatregperPeer::EDICAS)) $criteria->add(CatregperPeer::EDICAS, $this->edicas);
		if ($this->isColumnModified(CatregperPeer::PISHAB)) $criteria->add(CatregperPeer::PISHAB, $this->pishab);
		if ($this->isColumnModified(CatregperPeer::NUMHAB)) $criteria->add(CatregperPeer::NUMHAB, $this->numhab);
		if ($this->isColumnModified(CatregperPeer::CODOFI)) $criteria->add(CatregperPeer::CODOFI, $this->codofi);
		if ($this->isColumnModified(CatregperPeer::STAPER)) $criteria->add(CatregperPeer::STAPER, $this->staper);
		if ($this->isColumnModified(CatregperPeer::ID)) $criteria->add(CatregperPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CatregperPeer::DATABASE_NAME);

		$criteria->add(CatregperPeer::ID, $this->id);

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

		$copyObj->setCatbarurbId($this->catbarurb_id);

		$copyObj->setCatsecId($this->catsec_id);

		$copyObj->setCatparId($this->catpar_id);

		$copyObj->setCatmunId($this->catmun_id);

		$copyObj->setCatdivgeoId($this->catdivgeo_id);

		$copyObj->setCatestId($this->catest_id);

		$copyObj->setCattramofroId($this->cattramofro_id);

		$copyObj->setCattramolatId($this->cattramolat_id);

		$copyObj->setCattramolat2Id($this->cattramolat2_id);

		$copyObj->setCatcodposId($this->catcodpos_id);

		$copyObj->setCedrif($this->cedrif);

		$copyObj->setFecper($this->fecper);

		$copyObj->setNomper($this->nomper);

		$copyObj->setPrinom($this->prinom);

		$copyObj->setSegnom($this->segnom);

		$copyObj->setPriape($this->priape);

		$copyObj->setSegape($this->segape);

		$copyObj->setRelemp($this->relemp);

		$copyObj->setNacper($this->nacper);

		$copyObj->setTipper($this->tipper);

		$copyObj->setTelper($this->telper);

		$copyObj->setFaxper($this->faxper);

		$copyObj->setApaposper($this->apaposper);

		$copyObj->setEmaper($this->emaper);

		$copyObj->setDirper($this->dirper);

		$copyObj->setEdicas($this->edicas);

		$copyObj->setPishab($this->pishab);

		$copyObj->setNumhab($this->numhab);

		$copyObj->setCodofi($this->codofi);

		$copyObj->setStaper($this->staper);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCatperinms() as $relObj) {
				$copyObj->addCatperinm($relObj->copy($deepCopy));
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
			self::$peer = new CatregperPeer();
		}
		return self::$peer;
	}

	
	public function setCatbarurb($v)
	{


		if ($v === null) {
			$this->setCatbarurbId(NULL);
		} else {
			$this->setCatbarurbId($v->getId());
		}


		$this->aCatbarurb = $v;
	}


	
	public function getCatbarurb($con = null)
	{
		if ($this->aCatbarurb === null && ($this->catbarurb_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatbarurbPeer.php';

			$this->aCatbarurb = CatbarurbPeer::retrieveByPK($this->catbarurb_id, $con);

			
		}
		return $this->aCatbarurb;
	}

	
	public function setCatsec($v)
	{


		if ($v === null) {
			$this->setCatsecId(NULL);
		} else {
			$this->setCatsecId($v->getId());
		}


		$this->aCatsec = $v;
	}


	
	public function getCatsec($con = null)
	{
		if ($this->aCatsec === null && ($this->catsec_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatsecPeer.php';

			$this->aCatsec = CatsecPeer::retrieveByPK($this->catsec_id, $con);

			
		}
		return $this->aCatsec;
	}

	
	public function setCatpar($v)
	{


		if ($v === null) {
			$this->setCatparId(NULL);
		} else {
			$this->setCatparId($v->getId());
		}


		$this->aCatpar = $v;
	}


	
	public function getCatpar($con = null)
	{
		if ($this->aCatpar === null && ($this->catpar_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatparPeer.php';

			$this->aCatpar = CatparPeer::retrieveByPK($this->catpar_id, $con);

			
		}
		return $this->aCatpar;
	}

	
	public function setCatmun($v)
	{


		if ($v === null) {
			$this->setCatmunId(NULL);
		} else {
			$this->setCatmunId($v->getId());
		}


		$this->aCatmun = $v;
	}


	
	public function getCatmun($con = null)
	{
		if ($this->aCatmun === null && ($this->catmun_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatmunPeer.php';

			$this->aCatmun = CatmunPeer::retrieveByPK($this->catmun_id, $con);

			
		}
		return $this->aCatmun;
	}

	
	public function setCatdivgeo($v)
	{


		if ($v === null) {
			$this->setCatdivgeoId(NULL);
		} else {
			$this->setCatdivgeoId($v->getId());
		}


		$this->aCatdivgeo = $v;
	}


	
	public function getCatdivgeo($con = null)
	{
		if ($this->aCatdivgeo === null && ($this->catdivgeo_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatdivgeoPeer.php';

			$this->aCatdivgeo = CatdivgeoPeer::retrieveByPK($this->catdivgeo_id, $con);

			
		}
		return $this->aCatdivgeo;
	}

	
	public function setCatest($v)
	{


		if ($v === null) {
			$this->setCatestId(NULL);
		} else {
			$this->setCatestId($v->getId());
		}


		$this->aCatest = $v;
	}


	
	public function getCatest($con = null)
	{
		if ($this->aCatest === null && ($this->catest_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatestPeer.php';

			$this->aCatest = CatestPeer::retrieveByPK($this->catest_id, $con);

			
		}
		return $this->aCatest;
	}

	
	public function setCattramoRelatedByCattramofroId($v)
	{


		if ($v === null) {
			$this->setCattramofroId(NULL);
		} else {
			$this->setCattramofroId($v->getId());
		}


		$this->aCattramoRelatedByCattramofroId = $v;
	}


	
	public function getCattramoRelatedByCattramofroId($con = null)
	{
		if ($this->aCattramoRelatedByCattramofroId === null && ($this->cattramofro_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramofroId = CattramoPeer::retrieveByPK($this->cattramofro_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramofroId;
	}

	
	public function setCattramoRelatedByCattramolatId($v)
	{


		if ($v === null) {
			$this->setCattramolatId(NULL);
		} else {
			$this->setCattramolatId($v->getId());
		}


		$this->aCattramoRelatedByCattramolatId = $v;
	}


	
	public function getCattramoRelatedByCattramolatId($con = null)
	{
		if ($this->aCattramoRelatedByCattramolatId === null && ($this->cattramolat_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramolatId = CattramoPeer::retrieveByPK($this->cattramolat_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramolatId;
	}

	
	public function setCattramoRelatedByCattramolat2Id($v)
	{


		if ($v === null) {
			$this->setCattramolat2Id(NULL);
		} else {
			$this->setCattramolat2Id($v->getId());
		}


		$this->aCattramoRelatedByCattramolat2Id = $v;
	}


	
	public function getCattramoRelatedByCattramolat2Id($con = null)
	{
		if ($this->aCattramoRelatedByCattramolat2Id === null && ($this->cattramolat2_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCattramoPeer.php';

			$this->aCattramoRelatedByCattramolat2Id = CattramoPeer::retrieveByPK($this->cattramolat2_id, $con);

			
		}
		return $this->aCattramoRelatedByCattramolat2Id;
	}

	
	public function setCatcodpos($v)
	{


		if ($v === null) {
			$this->setCatcodposId(NULL);
		} else {
			$this->setCatcodposId($v->getId());
		}


		$this->aCatcodpos = $v;
	}


	
	public function getCatcodpos($con = null)
	{
		if ($this->aCatcodpos === null && ($this->catcodpos_id !== null)) {
						include_once 'lib/model/catastro/om/BaseCatcodposPeer.php';

			$this->aCatcodpos = CatcodposPeer::retrieveByPK($this->catcodpos_id, $con);

			
		}
		return $this->aCatcodpos;
	}

	
	public function initCatperinms()
	{
		if ($this->collCatperinms === null) {
			$this->collCatperinms = array();
		}
	}

	
	public function getCatperinms($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatperinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatperinms === null) {
			if ($this->isNew()) {
			   $this->collCatperinms = array();
			} else {

				$criteria->add(CatperinmPeer::CATREGPER_ID, $this->getId());

				CatperinmPeer::addSelectColumns($criteria);
				$this->collCatperinms = CatperinmPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CatperinmPeer::CATREGPER_ID, $this->getId());

				CatperinmPeer::addSelectColumns($criteria);
				if (!isset($this->lastCatperinmCriteria) || !$this->lastCatperinmCriteria->equals($criteria)) {
					$this->collCatperinms = CatperinmPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCatperinmCriteria = $criteria;
		return $this->collCatperinms;
	}

	
	public function countCatperinms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatperinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CatperinmPeer::CATREGPER_ID, $this->getId());

		return CatperinmPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCatperinm(Catperinm $l)
	{
		$this->collCatperinms[] = $l;
		$l->setCatregper($this);
	}


	
	public function getCatperinmsJoinCatreginm($criteria = null, $con = null)
	{
				include_once 'lib/model/catastro/om/BaseCatperinmPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCatperinms === null) {
			if ($this->isNew()) {
				$this->collCatperinms = array();
			} else {

				$criteria->add(CatperinmPeer::CATREGPER_ID, $this->getId());

				$this->collCatperinms = CatperinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		} else {
									
			$criteria->add(CatperinmPeer::CATREGPER_ID, $this->getId());

			if (!isset($this->lastCatperinmCriteria) || !$this->lastCatperinmCriteria->equals($criteria)) {
				$this->collCatperinms = CatperinmPeer::doSelectJoinCatreginm($criteria, $con);
			}
		}
		$this->lastCatperinmCriteria = $criteria;

		return $this->collCatperinms;
	}

} 