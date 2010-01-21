<?php


abstract class BaseCcsolici extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $numsol;


	
	protected $monsol;


	
	protected $fecsol;


	
	protected $obsbie;


	
	protected $fecrev;


	
	protected $nomrev;


	
	protected $carrev;


	
	protected $observ;


	
	protected $actapr;


	
	protected $fecapr;


	
	protected $nomcor;


	
	protected $existeaval;


	
	protected $estatu;


	
	protected $ccbenefi_id;


	
	protected $ccusuario_id;


	
	protected $ccciudad_id;


	
	protected $ccmunici_id;


	
	protected $cccircuito_id;


	
	protected $cccondic_id;

	
	protected $aCcbenefi;

	
	protected $aCcusuario;

	
	protected $aCcciudad;

	
	protected $aCcmunici;

	
	protected $aCccircuito;

	
	protected $aCccondic;

	
	protected $collCcasiganas;

	
	protected $lastCcasiganaCriteria = null;

	
	protected $collCcbalgers;

	
	protected $lastCcbalgerCriteria = null;

	
	protected $collCcbieadqs;

	
	protected $lastCcbieadqCriteria = null;

	
	protected $collCccredits;

	
	protected $lastCccreditCriteria = null;

	
	protected $collCcdatsoecos;

	
	protected $lastCcdatsoecoCriteria = null;

	
	protected $collCcestcreds;

	
	protected $lastCcestcredCriteria = null;

	
	protected $collCcgarsols;

	
	protected $lastCcgarsolCriteria = null;

	
	protected $collCcinforms;

	
	protected $lastCcinformCriteria = null;

	
	protected $collCcparsols;

	
	protected $lastCcparsolCriteria = null;

	
	protected $collCcprosols;

	
	protected $lastCcprosolCriteria = null;

	
	protected $collCcproyecs;

	
	protected $lastCcproyecCriteria = null;

	
	protected $collCcrecsols;

	
	protected $lastCcrecsolCriteria = null;

	
	protected $collCcsolsess;

	
	protected $lastCcsolsesCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNumsol()
  {

    return trim($this->numsol);

  }
  
  public function getMonsol($val=false)
  {

    if($val) return number_format($this->monsol,2,',','.');
    else return $this->monsol;

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

  
  public function getObsbie()
  {

    return trim($this->obsbie);

  }
  
  public function getFecrev($format = 'Y-m-d')
  {

    if ($this->fecrev === null || $this->fecrev === '') {
      return null;
    } elseif (!is_int($this->fecrev)) {
            $ts = adodb_strtotime($this->fecrev);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrev] as date/time value: " . var_export($this->fecrev, true));
      }
    } else {
      $ts = $this->fecrev;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomrev()
  {

    return trim($this->nomrev);

  }
  
  public function getCarrev()
  {

    return trim($this->carrev);

  }
  
  public function getObserv()
  {

    return trim($this->observ);

  }
  
  public function getActapr()
  {

    return $this->actapr;

  }
  
  public function getFecapr($format = 'Y-m-d')
  {

    if ($this->fecapr === null || $this->fecapr === '') {
      return null;
    } elseif (!is_int($this->fecapr)) {
            $ts = adodb_strtotime($this->fecapr);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecapr] as date/time value: " . var_export($this->fecapr, true));
      }
    } else {
      $ts = $this->fecapr;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getNomcor()
  {

    return trim($this->nomcor);

  }
  
  public function getExisteaval()
  {

    return $this->existeaval;

  }
  
  public function getEstatu()
  {

    return trim($this->estatu);

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCcusuarioId()
  {

    return $this->ccusuario_id;

  }
  
  public function getCcciudadId()
  {

    return $this->ccciudad_id;

  }
  
  public function getCcmuniciId()
  {

    return $this->ccmunici_id;

  }
  
  public function getCccircuitoId()
  {

    return $this->cccircuito_id;

  }
  
  public function getCccondicId()
  {

    return $this->cccondic_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::ID;
      }
  
	} 
	
	public function setNumsol($v)
	{

    if ($this->numsol !== $v) {
        $this->numsol = $v;
        $this->modifiedColumns[] = CcsoliciPeer::NUMSOL;
      }
  
	} 
	
	public function setMonsol($v)
	{

    if ($this->monsol !== $v) {
        $this->monsol = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcsoliciPeer::MONSOL;
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
      $this->modifiedColumns[] = CcsoliciPeer::FECSOL;
    }

	} 
	
	public function setObsbie($v)
	{

    if ($this->obsbie !== $v) {
        $this->obsbie = $v;
        $this->modifiedColumns[] = CcsoliciPeer::OBSBIE;
      }
  
	} 
	
	public function setFecrev($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrev] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrev !== $ts) {
      $this->fecrev = $ts;
      $this->modifiedColumns[] = CcsoliciPeer::FECREV;
    }

	} 
	
	public function setNomrev($v)
	{

    if ($this->nomrev !== $v) {
        $this->nomrev = $v;
        $this->modifiedColumns[] = CcsoliciPeer::NOMREV;
      }
  
	} 
	
	public function setCarrev($v)
	{

    if ($this->carrev !== $v) {
        $this->carrev = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CARREV;
      }
  
	} 
	
	public function setObserv($v)
	{

    if ($this->observ !== $v) {
        $this->observ = $v;
        $this->modifiedColumns[] = CcsoliciPeer::OBSERV;
      }
  
	} 
	
	public function setActapr($v)
	{

    if ($this->actapr !== $v) {
        $this->actapr = $v;
        $this->modifiedColumns[] = CcsoliciPeer::ACTAPR;
      }
  
	} 
	
	public function setFecapr($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecapr] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecapr !== $ts) {
      $this->fecapr = $ts;
      $this->modifiedColumns[] = CcsoliciPeer::FECAPR;
    }

	} 
	
	public function setNomcor($v)
	{

    if ($this->nomcor !== $v) {
        $this->nomcor = $v;
        $this->modifiedColumns[] = CcsoliciPeer::NOMCOR;
      }
  
	} 
	
	public function setExisteaval($v)
	{

    if ($this->existeaval !== $v) {
        $this->existeaval = $v;
        $this->modifiedColumns[] = CcsoliciPeer::EXISTEAVAL;
      }
  
	} 
	
	public function setEstatu($v)
	{

    if ($this->estatu !== $v) {
        $this->estatu = $v;
        $this->modifiedColumns[] = CcsoliciPeer::ESTATU;
      }
  
	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCcusuarioId($v)
	{

    if ($this->ccusuario_id !== $v) {
        $this->ccusuario_id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CCUSUARIO_ID;
      }
  
		if ($this->aCcusuario !== null && $this->aCcusuario->getId() !== $v) {
			$this->aCcusuario = null;
		}

	} 
	
	public function setCcciudadId($v)
	{

    if ($this->ccciudad_id !== $v) {
        $this->ccciudad_id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CCCIUDAD_ID;
      }
  
		if ($this->aCcciudad !== null && $this->aCcciudad->getId() !== $v) {
			$this->aCcciudad = null;
		}

	} 
	
	public function setCcmuniciId($v)
	{

    if ($this->ccmunici_id !== $v) {
        $this->ccmunici_id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CCMUNICI_ID;
      }
  
		if ($this->aCcmunici !== null && $this->aCcmunici->getId() !== $v) {
			$this->aCcmunici = null;
		}

	} 
	
	public function setCccircuitoId($v)
	{

    if ($this->cccircuito_id !== $v) {
        $this->cccircuito_id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CCCIRCUITO_ID;
      }
  
		if ($this->aCccircuito !== null && $this->aCccircuito->getId() !== $v) {
			$this->aCccircuito = null;
		}

	} 
	
	public function setCccondicId($v)
	{

    if ($this->cccondic_id !== $v) {
        $this->cccondic_id = $v;
        $this->modifiedColumns[] = CcsoliciPeer::CCCONDIC_ID;
      }
  
		if ($this->aCccondic !== null && $this->aCccondic->getId() !== $v) {
			$this->aCccondic = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->numsol = $rs->getString($startcol + 1);

      $this->monsol = $rs->getFloat($startcol + 2);

      $this->fecsol = $rs->getDate($startcol + 3, null);

      $this->obsbie = $rs->getString($startcol + 4);

      $this->fecrev = $rs->getDate($startcol + 5, null);

      $this->nomrev = $rs->getString($startcol + 6);

      $this->carrev = $rs->getString($startcol + 7);

      $this->observ = $rs->getString($startcol + 8);

      $this->actapr = $rs->getInt($startcol + 9);

      $this->fecapr = $rs->getDate($startcol + 10, null);

      $this->nomcor = $rs->getString($startcol + 11);

      $this->existeaval = $rs->getBoolean($startcol + 12);

      $this->estatu = $rs->getString($startcol + 13);

      $this->ccbenefi_id = $rs->getInt($startcol + 14);

      $this->ccusuario_id = $rs->getInt($startcol + 15);

      $this->ccciudad_id = $rs->getInt($startcol + 16);

      $this->ccmunici_id = $rs->getInt($startcol + 17);

      $this->cccircuito_id = $rs->getInt($startcol + 18);

      $this->cccondic_id = $rs->getInt($startcol + 19);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 20; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccsolici object", $e);
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
			$con = Propel::getConnection(CcsoliciPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcsoliciPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcsoliciPeer::DATABASE_NAME);
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


												
			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}

			if ($this->aCcusuario !== null) {
				if ($this->aCcusuario->isModified()) {
					$affectedRows += $this->aCcusuario->save($con);
				}
				$this->setCcusuario($this->aCcusuario);
			}

			if ($this->aCcciudad !== null) {
				if ($this->aCcciudad->isModified()) {
					$affectedRows += $this->aCcciudad->save($con);
				}
				$this->setCcciudad($this->aCcciudad);
			}

			if ($this->aCcmunici !== null) {
				if ($this->aCcmunici->isModified()) {
					$affectedRows += $this->aCcmunici->save($con);
				}
				$this->setCcmunici($this->aCcmunici);
			}

			if ($this->aCccircuito !== null) {
				if ($this->aCccircuito->isModified()) {
					$affectedRows += $this->aCccircuito->save($con);
				}
				$this->setCccircuito($this->aCccircuito);
			}

			if ($this->aCccondic !== null) {
				if ($this->aCccondic->isModified()) {
					$affectedRows += $this->aCccondic->save($con);
				}
				$this->setCccondic($this->aCccondic);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcsoliciPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcsoliciPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcasiganas !== null) {
				foreach($this->collCcasiganas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbalgers !== null) {
				foreach($this->collCcbalgers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcbieadqs !== null) {
				foreach($this->collCcbieadqs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccredits !== null) {
				foreach($this->collCccredits as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdatsoecos !== null) {
				foreach($this->collCcdatsoecos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcestcreds !== null) {
				foreach($this->collCcestcreds as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcgarsols !== null) {
				foreach($this->collCcgarsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcinforms !== null) {
				foreach($this->collCcinforms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparsols !== null) {
				foreach($this->collCcparsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcprosols !== null) {
				foreach($this->collCcprosols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcproyecs !== null) {
				foreach($this->collCcproyecs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecsols !== null) {
				foreach($this->collCcrecsols as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcsolsess !== null) {
				foreach($this->collCcsolsess as $referrerFK) {
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


												
			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}

			if ($this->aCcusuario !== null) {
				if (!$this->aCcusuario->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcusuario->getValidationFailures());
				}
			}

			if ($this->aCcciudad !== null) {
				if (!$this->aCcciudad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcciudad->getValidationFailures());
				}
			}

			if ($this->aCcmunici !== null) {
				if (!$this->aCcmunici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcmunici->getValidationFailures());
				}
			}

			if ($this->aCccircuito !== null) {
				if (!$this->aCccircuito->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccircuito->getValidationFailures());
				}
			}

			if ($this->aCccondic !== null) {
				if (!$this->aCccondic->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCccondic->getValidationFailures());
				}
			}


			if (($retval = CcsoliciPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcasiganas !== null) {
					foreach($this->collCcasiganas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbalgers !== null) {
					foreach($this->collCcbalgers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcbieadqs !== null) {
					foreach($this->collCcbieadqs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccredits !== null) {
					foreach($this->collCccredits as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdatsoecos !== null) {
					foreach($this->collCcdatsoecos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcestcreds !== null) {
					foreach($this->collCcestcreds as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcgarsols !== null) {
					foreach($this->collCcgarsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcinforms !== null) {
					foreach($this->collCcinforms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparsols !== null) {
					foreach($this->collCcparsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcprosols !== null) {
					foreach($this->collCcprosols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcproyecs !== null) {
					foreach($this->collCcproyecs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecsols !== null) {
					foreach($this->collCcrecsols as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcsolsess !== null) {
					foreach($this->collCcsolsess as $referrerFK) {
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
		$pos = CcsoliciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNumsol();
				break;
			case 2:
				return $this->getMonsol();
				break;
			case 3:
				return $this->getFecsol();
				break;
			case 4:
				return $this->getObsbie();
				break;
			case 5:
				return $this->getFecrev();
				break;
			case 6:
				return $this->getNomrev();
				break;
			case 7:
				return $this->getCarrev();
				break;
			case 8:
				return $this->getObserv();
				break;
			case 9:
				return $this->getActapr();
				break;
			case 10:
				return $this->getFecapr();
				break;
			case 11:
				return $this->getNomcor();
				break;
			case 12:
				return $this->getExisteaval();
				break;
			case 13:
				return $this->getEstatu();
				break;
			case 14:
				return $this->getCcbenefiId();
				break;
			case 15:
				return $this->getCcusuarioId();
				break;
			case 16:
				return $this->getCcciudadId();
				break;
			case 17:
				return $this->getCcmuniciId();
				break;
			case 18:
				return $this->getCccircuitoId();
				break;
			case 19:
				return $this->getCccondicId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsoliciPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumsol(),
			$keys[2] => $this->getMonsol(),
			$keys[3] => $this->getFecsol(),
			$keys[4] => $this->getObsbie(),
			$keys[5] => $this->getFecrev(),
			$keys[6] => $this->getNomrev(),
			$keys[7] => $this->getCarrev(),
			$keys[8] => $this->getObserv(),
			$keys[9] => $this->getActapr(),
			$keys[10] => $this->getFecapr(),
			$keys[11] => $this->getNomcor(),
			$keys[12] => $this->getExisteaval(),
			$keys[13] => $this->getEstatu(),
			$keys[14] => $this->getCcbenefiId(),
			$keys[15] => $this->getCcusuarioId(),
			$keys[16] => $this->getCcciudadId(),
			$keys[17] => $this->getCcmuniciId(),
			$keys[18] => $this->getCccircuitoId(),
			$keys[19] => $this->getCccondicId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcsoliciPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNumsol($value);
				break;
			case 2:
				$this->setMonsol($value);
				break;
			case 3:
				$this->setFecsol($value);
				break;
			case 4:
				$this->setObsbie($value);
				break;
			case 5:
				$this->setFecrev($value);
				break;
			case 6:
				$this->setNomrev($value);
				break;
			case 7:
				$this->setCarrev($value);
				break;
			case 8:
				$this->setObserv($value);
				break;
			case 9:
				$this->setActapr($value);
				break;
			case 10:
				$this->setFecapr($value);
				break;
			case 11:
				$this->setNomcor($value);
				break;
			case 12:
				$this->setExisteaval($value);
				break;
			case 13:
				$this->setEstatu($value);
				break;
			case 14:
				$this->setCcbenefiId($value);
				break;
			case 15:
				$this->setCcusuarioId($value);
				break;
			case 16:
				$this->setCcciudadId($value);
				break;
			case 17:
				$this->setCcmuniciId($value);
				break;
			case 18:
				$this->setCccircuitoId($value);
				break;
			case 19:
				$this->setCccondicId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcsoliciPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumsol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonsol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecsol($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setObsbie($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecrev($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomrev($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCarrev($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObserv($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setActapr($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecapr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNomcor($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setExisteaval($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEstatu($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCcbenefiId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCcusuarioId($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcciudadId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCcmuniciId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCccircuitoId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCccondicId($arr[$keys[19]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcsoliciPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcsoliciPeer::ID)) $criteria->add(CcsoliciPeer::ID, $this->id);
		if ($this->isColumnModified(CcsoliciPeer::NUMSOL)) $criteria->add(CcsoliciPeer::NUMSOL, $this->numsol);
		if ($this->isColumnModified(CcsoliciPeer::MONSOL)) $criteria->add(CcsoliciPeer::MONSOL, $this->monsol);
		if ($this->isColumnModified(CcsoliciPeer::FECSOL)) $criteria->add(CcsoliciPeer::FECSOL, $this->fecsol);
		if ($this->isColumnModified(CcsoliciPeer::OBSBIE)) $criteria->add(CcsoliciPeer::OBSBIE, $this->obsbie);
		if ($this->isColumnModified(CcsoliciPeer::FECREV)) $criteria->add(CcsoliciPeer::FECREV, $this->fecrev);
		if ($this->isColumnModified(CcsoliciPeer::NOMREV)) $criteria->add(CcsoliciPeer::NOMREV, $this->nomrev);
		if ($this->isColumnModified(CcsoliciPeer::CARREV)) $criteria->add(CcsoliciPeer::CARREV, $this->carrev);
		if ($this->isColumnModified(CcsoliciPeer::OBSERV)) $criteria->add(CcsoliciPeer::OBSERV, $this->observ);
		if ($this->isColumnModified(CcsoliciPeer::ACTAPR)) $criteria->add(CcsoliciPeer::ACTAPR, $this->actapr);
		if ($this->isColumnModified(CcsoliciPeer::FECAPR)) $criteria->add(CcsoliciPeer::FECAPR, $this->fecapr);
		if ($this->isColumnModified(CcsoliciPeer::NOMCOR)) $criteria->add(CcsoliciPeer::NOMCOR, $this->nomcor);
		if ($this->isColumnModified(CcsoliciPeer::EXISTEAVAL)) $criteria->add(CcsoliciPeer::EXISTEAVAL, $this->existeaval);
		if ($this->isColumnModified(CcsoliciPeer::ESTATU)) $criteria->add(CcsoliciPeer::ESTATU, $this->estatu);
		if ($this->isColumnModified(CcsoliciPeer::CCBENEFI_ID)) $criteria->add(CcsoliciPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CcsoliciPeer::CCUSUARIO_ID)) $criteria->add(CcsoliciPeer::CCUSUARIO_ID, $this->ccusuario_id);
		if ($this->isColumnModified(CcsoliciPeer::CCCIUDAD_ID)) $criteria->add(CcsoliciPeer::CCCIUDAD_ID, $this->ccciudad_id);
		if ($this->isColumnModified(CcsoliciPeer::CCMUNICI_ID)) $criteria->add(CcsoliciPeer::CCMUNICI_ID, $this->ccmunici_id);
		if ($this->isColumnModified(CcsoliciPeer::CCCIRCUITO_ID)) $criteria->add(CcsoliciPeer::CCCIRCUITO_ID, $this->cccircuito_id);
		if ($this->isColumnModified(CcsoliciPeer::CCCONDIC_ID)) $criteria->add(CcsoliciPeer::CCCONDIC_ID, $this->cccondic_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcsoliciPeer::DATABASE_NAME);

		$criteria->add(CcsoliciPeer::ID, $this->id);

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

		$copyObj->setNumsol($this->numsol);

		$copyObj->setMonsol($this->monsol);

		$copyObj->setFecsol($this->fecsol);

		$copyObj->setObsbie($this->obsbie);

		$copyObj->setFecrev($this->fecrev);

		$copyObj->setNomrev($this->nomrev);

		$copyObj->setCarrev($this->carrev);

		$copyObj->setObserv($this->observ);

		$copyObj->setActapr($this->actapr);

		$copyObj->setFecapr($this->fecapr);

		$copyObj->setNomcor($this->nomcor);

		$copyObj->setExisteaval($this->existeaval);

		$copyObj->setEstatu($this->estatu);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

		$copyObj->setCcusuarioId($this->ccusuario_id);

		$copyObj->setCcciudadId($this->ccciudad_id);

		$copyObj->setCcmuniciId($this->ccmunici_id);

		$copyObj->setCccircuitoId($this->cccircuito_id);

		$copyObj->setCccondicId($this->cccondic_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcasiganas() as $relObj) {
				$copyObj->addCcasigana($relObj->copy($deepCopy));
			}

			foreach($this->getCcbalgers() as $relObj) {
				$copyObj->addCcbalger($relObj->copy($deepCopy));
			}

			foreach($this->getCcbieadqs() as $relObj) {
				$copyObj->addCcbieadq($relObj->copy($deepCopy));
			}

			foreach($this->getCccredits() as $relObj) {
				$copyObj->addCccredit($relObj->copy($deepCopy));
			}

			foreach($this->getCcdatsoecos() as $relObj) {
				$copyObj->addCcdatsoeco($relObj->copy($deepCopy));
			}

			foreach($this->getCcestcreds() as $relObj) {
				$copyObj->addCcestcred($relObj->copy($deepCopy));
			}

			foreach($this->getCcgarsols() as $relObj) {
				$copyObj->addCcgarsol($relObj->copy($deepCopy));
			}

			foreach($this->getCcinforms() as $relObj) {
				$copyObj->addCcinform($relObj->copy($deepCopy));
			}

			foreach($this->getCcparsols() as $relObj) {
				$copyObj->addCcparsol($relObj->copy($deepCopy));
			}

			foreach($this->getCcprosols() as $relObj) {
				$copyObj->addCcprosol($relObj->copy($deepCopy));
			}

			foreach($this->getCcproyecs() as $relObj) {
				$copyObj->addCcproyec($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecsols() as $relObj) {
				$copyObj->addCcrecsol($relObj->copy($deepCopy));
			}

			foreach($this->getCcsolsess() as $relObj) {
				$copyObj->addCcsolses($relObj->copy($deepCopy));
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
			self::$peer = new CcsoliciPeer();
		}
		return self::$peer;
	}

	
	public function setCcbenefi($v)
	{


		if ($v === null) {
			$this->setCcbenefiId(NULL);
		} else {
			$this->setCcbenefiId($v->getId());
		}


		$this->aCcbenefi = $v;
	}


	
	public function getCcbenefi($con = null)
	{
		if ($this->aCcbenefi === null && ($this->ccbenefi_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcbenefiPeer.php';

      $c = new Criteria();
      $c->add(CcbenefiPeer::ID,$this->ccbenefi_id);
      
			$this->aCcbenefi = CcbenefiPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcbenefi;
	}

	
	public function setCcusuario($v)
	{


		if ($v === null) {
			$this->setCcusuarioId(NULL);
		} else {
			$this->setCcusuarioId($v->getId());
		}


		$this->aCcusuario = $v;
	}


	
	public function getCcusuario($con = null)
	{
		if ($this->aCcusuario === null && ($this->ccusuario_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcusuarioPeer.php';

      $c = new Criteria();
      $c->add(CcusuarioPeer::ID,$this->ccusuario_id);
      
			$this->aCcusuario = CcusuarioPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcusuario;
	}

	
	public function setCcciudad($v)
	{


		if ($v === null) {
			$this->setCcciudadId(NULL);
		} else {
			$this->setCcciudadId($v->getId());
		}


		$this->aCcciudad = $v;
	}


	
	public function getCcciudad($con = null)
	{
		if ($this->aCcciudad === null && ($this->ccciudad_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcciudadPeer.php';

      $c = new Criteria();
      $c->add(CcciudadPeer::ID,$this->ccciudad_id);
      
			$this->aCcciudad = CcciudadPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcciudad;
	}

	
	public function setCcmunici($v)
	{


		if ($v === null) {
			$this->setCcmuniciId(NULL);
		} else {
			$this->setCcmuniciId($v->getId());
		}


		$this->aCcmunici = $v;
	}


	
	public function getCcmunici($con = null)
	{
		if ($this->aCcmunici === null && ($this->ccmunici_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcmuniciPeer.php';

      $c = new Criteria();
      $c->add(CcmuniciPeer::ID,$this->ccmunici_id);
      
			$this->aCcmunici = CcmuniciPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcmunici;
	}

	
	public function setCccircuito($v)
	{


		if ($v === null) {
			$this->setCccircuitoId(NULL);
		} else {
			$this->setCccircuitoId($v->getId());
		}


		$this->aCccircuito = $v;
	}


	
	public function getCccircuito($con = null)
	{
		if ($this->aCccircuito === null && ($this->cccircuito_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccircuitoPeer.php';

      $c = new Criteria();
      $c->add(CccircuitoPeer::ID,$this->cccircuito_id);
      
			$this->aCccircuito = CccircuitoPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccircuito;
	}

	
	public function setCccondic($v)
	{


		if ($v === null) {
			$this->setCccondicId(NULL);
		} else {
			$this->setCccondicId($v->getId());
		}


		$this->aCccondic = $v;
	}


	
	public function getCccondic($con = null)
	{
		if ($this->aCccondic === null && ($this->cccondic_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCccondicPeer.php';

      $c = new Criteria();
      $c->add(CccondicPeer::ID,$this->cccondic_id);
      
			$this->aCccondic = CccondicPeer::doSelectOne($c, $con);

			
		}
		return $this->aCccondic;
	}

	
	public function initCcasiganas()
	{
		if ($this->collCcasiganas === null) {
			$this->collCcasiganas = array();
		}
	}

	
	public function getCcasiganas($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
			   $this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

				CcasiganaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
					$this->collCcasiganas = CcasiganaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcasiganaCriteria = $criteria;
		return $this->collCcasiganas;
	}

	
	public function countCcasiganas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

		return CcasiganaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcasigana(Ccasigana $l)
	{
		$this->collCcasiganas[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcasiganasJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}


	
	public function getCcasiganasJoinCcgerenc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcasiganaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcasiganas === null) {
			if ($this->isNew()) {
				$this->collCcasiganas = array();
			} else {

				$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcasiganaPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcasiganaCriteria) || !$this->lastCcasiganaCriteria->equals($criteria)) {
				$this->collCcasiganas = CcasiganaPeer::doSelectJoinCcgerenc($criteria, $con);
			}
		}
		$this->lastCcasiganaCriteria = $criteria;

		return $this->collCcasiganas;
	}

	
	public function initCcbalgers()
	{
		if ($this->collCcbalgers === null) {
			$this->collCcbalgers = array();
		}
	}

	
	public function getCcbalgers($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
			   $this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

				CcbalgerPeer::addSelectColumns($criteria);
				$this->collCcbalgers = CcbalgerPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

				CcbalgerPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
					$this->collCcbalgers = CcbalgerPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbalgerCriteria = $criteria;
		return $this->collCcbalgers;
	}

	
	public function countCcbalgers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

		return CcbalgerPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbalger(Ccbalger $l)
	{
		$this->collCcbalgers[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcbalgersJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
				$this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCcbalgerCriteria = $criteria;

		return $this->collCcbalgers;
	}


	
	public function getCcbalgersJoinCcusuario($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbalgerPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbalgers === null) {
			if ($this->isNew()) {
				$this->collCcbalgers = array();
			} else {

				$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcusuario($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbalgerPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcbalgerCriteria) || !$this->lastCcbalgerCriteria->equals($criteria)) {
				$this->collCcbalgers = CcbalgerPeer::doSelectJoinCcusuario($criteria, $con);
			}
		}
		$this->lastCcbalgerCriteria = $criteria;

		return $this->collCcbalgers;
	}

	
	public function initCcbieadqs()
	{
		if ($this->collCcbieadqs === null) {
			$this->collCcbieadqs = array();
		}
	}

	
	public function getCcbieadqs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
			   $this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

				CcbieadqPeer::addSelectColumns($criteria);
				$this->collCcbieadqs = CcbieadqPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

				CcbieadqPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
					$this->collCcbieadqs = CcbieadqPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbieadqCriteria = $criteria;
		return $this->collCcbieadqs;
	}

	
	public function countCcbieadqs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

		return CcbieadqPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbieadq(Ccbieadq $l)
	{
		$this->collCcbieadqs[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcbieadqsJoinCcclabie($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcclabie($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcclabie($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}


	
	public function getCcbieadqsJoinCctipprobie($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCctipprobie($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCctipprobie($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}


	
	public function getCcbieadqsJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbieadqPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbieadqs === null) {
			if ($this->isNew()) {
				$this->collCcbieadqs = array();
			} else {

				$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbieadqPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcbieadqCriteria) || !$this->lastCcbieadqCriteria->equals($criteria)) {
				$this->collCcbieadqs = CcbieadqPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcbieadqCriteria = $criteria;

		return $this->collCcbieadqs;
	}

	
	public function initCccredits()
	{
		if ($this->collCccredits === null) {
			$this->collCccredits = array();
		}
	}

	
	public function getCccredits($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
			   $this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				CccreditPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
					$this->collCccredits = CccreditPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccreditCriteria = $criteria;
		return $this->collCccredits;
	}

	
	public function countCccredits($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

		return CccreditPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccredit(Cccredit $l)
	{
		$this->collCccredits[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCccreditsJoinCcbenefi($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbenefi($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcfuefin($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcfuefin($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipcar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipcar($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipmon($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipmon($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcbanco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcbanco($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcagenci($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcagenci($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCcprioridad($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCcprioridad($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCccondic($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCccondic($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}


	
	public function getCccreditsJoinCpcompro($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccreditPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccredits === null) {
			if ($this->isNew()) {
				$this->collCccredits = array();
			} else {

				$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		} else {
									
			$criteria->add(CccreditPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCccreditCriteria) || !$this->lastCccreditCriteria->equals($criteria)) {
				$this->collCccredits = CccreditPeer::doSelectJoinCpcompro($criteria, $con);
			}
		}
		$this->lastCccreditCriteria = $criteria;

		return $this->collCccredits;
	}

	
	public function initCcdatsoecos()
	{
		if ($this->collCcdatsoecos === null) {
			$this->collCcdatsoecos = array();
		}
	}

	
	public function getCcdatsoecos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
			   $this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

				CcdatsoecoPeer::addSelectColumns($criteria);
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

				CcdatsoecoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
					$this->collCcdatsoecos = CcdatsoecoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;
		return $this->collCcdatsoecos;
	}

	
	public function countCcdatsoecos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

		return CcdatsoecoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdatsoeco(Ccdatsoeco $l)
	{
		$this->collCcdatsoecos[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcdatsoecosJoinCcorimatpri($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcorimatpri($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcestruc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcestruc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcestruc($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}


	
	public function getCcdatsoecosJoinCcriezona($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdatsoecoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdatsoecos === null) {
			if ($this->isNew()) {
				$this->collCcdatsoecos = array();
			} else {

				$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcriezona($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdatsoecoPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcdatsoecoCriteria) || !$this->lastCcdatsoecoCriteria->equals($criteria)) {
				$this->collCcdatsoecos = CcdatsoecoPeer::doSelectJoinCcriezona($criteria, $con);
			}
		}
		$this->lastCcdatsoecoCriteria = $criteria;

		return $this->collCcdatsoecos;
	}

	
	public function initCcestcreds()
	{
		if ($this->collCcestcreds === null) {
			$this->collCcestcreds = array();
		}
	}

	
	public function getCcestcreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
			   $this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				$this->collCcestcreds = CcestcredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				CcestcredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
					$this->collCcestcreds = CcestcredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcestcredCriteria = $criteria;
		return $this->collCcestcreds;
	}

	
	public function countCcestcreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

		return CcestcredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcestcred(Ccestcred $l)
	{
		$this->collCcestcreds[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcestcredsJoinCcestatuRelatedByCcestatuId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestatuId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcusuint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcusuint($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcgerencRelatedByCcgerencoriId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencoriId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcgerencRelatedByCcgerencdesId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcgerencRelatedByCcgerencdesId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}


	
	public function getCcestcredsJoinCcestatuRelatedByCcestsigId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcestcredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcestcreds === null) {
			if ($this->isNew()) {
				$this->collCcestcreds = array();
			} else {

				$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcestcredPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcestcredCriteria) || !$this->lastCcestcredCriteria->equals($criteria)) {
				$this->collCcestcreds = CcestcredPeer::doSelectJoinCcestatuRelatedByCcestsigId($criteria, $con);
			}
		}
		$this->lastCcestcredCriteria = $criteria;

		return $this->collCcestcreds;
	}

	
	public function initCcgarsols()
	{
		if ($this->collCcgarsols === null) {
			$this->collCcgarsols = array();
		}
	}

	
	public function getCcgarsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
			   $this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

				CcgarsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
					$this->collCcgarsols = CcgarsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcgarsolCriteria = $criteria;
		return $this->collCcgarsols;
	}

	
	public function countCcgarsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

		return CcgarsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcgarsol(Ccgarsol $l)
	{
		$this->collCcgarsols[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcgarsolsJoinCctipgar($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCctipgar($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCctipgar($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCcparroq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcparroq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCcparroq($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}


	
	public function getCcgarsolsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcgarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcgarsols === null) {
			if ($this->isNew()) {
				$this->collCcgarsols = array();
			} else {

				$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcgarsolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcgarsolCriteria) || !$this->lastCcgarsolCriteria->equals($criteria)) {
				$this->collCcgarsols = CcgarsolPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcgarsolCriteria = $criteria;

		return $this->collCcgarsols;
	}

	
	public function initCcinforms()
	{
		if ($this->collCcinforms === null) {
			$this->collCcinforms = array();
		}
	}

	
	public function getCcinforms($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
			   $this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				$this->collCcinforms = CcinformPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

				CcinformPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
					$this->collCcinforms = CcinformPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcinformCriteria = $criteria;
		return $this->collCcinforms;
	}

	
	public function countCcinforms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

		return CcinformPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcinform(Ccinform $l)
	{
		$this->collCcinforms[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcinformsJoinCcgerencRelatedByCcgerencId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcgerencId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcgerencId($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcclainf($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcclainf($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}


	
	public function getCcinformsJoinCcgerencRelatedByCcresbarId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcinformPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcinforms === null) {
			if ($this->isNew()) {
				$this->collCcinforms = array();
			} else {

				$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcresbarId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcinformPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcinformCriteria) || !$this->lastCcinformCriteria->equals($criteria)) {
				$this->collCcinforms = CcinformPeer::doSelectJoinCcgerencRelatedByCcresbarId($criteria, $con);
			}
		}
		$this->lastCcinformCriteria = $criteria;

		return $this->collCcinforms;
	}

	
	public function initCcparsols()
	{
		if ($this->collCcparsols === null) {
			$this->collCcparsols = array();
		}
	}

	
	public function getCcparsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparsols === null) {
			if ($this->isNew()) {
			   $this->collCcparsols = array();
			} else {

				$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

				CcparsolPeer::addSelectColumns($criteria);
				$this->collCcparsols = CcparsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

				CcparsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
					$this->collCcparsols = CcparsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparsolCriteria = $criteria;
		return $this->collCcparsols;
	}

	
	public function countCcparsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

		return CcparsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparsol(Ccparsol $l)
	{
		$this->collCcparsols[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcparsolsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparsols === null) {
			if ($this->isNew()) {
				$this->collCcparsols = array();
			} else {

				$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcparsols = CcparsolPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
				$this->collCcparsols = CcparsolPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparsolCriteria = $criteria;

		return $this->collCcparsols;
	}


	
	public function getCcparsolsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparsols === null) {
			if ($this->isNew()) {
				$this->collCcparsols = array();
			} else {

				$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcparsols = CcparsolPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparsolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcparsolCriteria) || !$this->lastCcparsolCriteria->equals($criteria)) {
				$this->collCcparsols = CcparsolPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcparsolCriteria = $criteria;

		return $this->collCcparsols;
	}

	
	public function initCcprosols()
	{
		if ($this->collCcprosols === null) {
			$this->collCcprosols = array();
		}
	}

	
	public function getCcprosols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprosolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprosols === null) {
			if ($this->isNew()) {
			   $this->collCcprosols = array();
			} else {

				$criteria->add(CcprosolPeer::CCSOLICI_ID, $this->getId());

				CcprosolPeer::addSelectColumns($criteria);
				$this->collCcprosols = CcprosolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcprosolPeer::CCSOLICI_ID, $this->getId());

				CcprosolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcprosolCriteria) || !$this->lastCcprosolCriteria->equals($criteria)) {
					$this->collCcprosols = CcprosolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcprosolCriteria = $criteria;
		return $this->collCcprosols;
	}

	
	public function countCcprosols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprosolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcprosolPeer::CCSOLICI_ID, $this->getId());

		return CcprosolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcprosol(Ccprosol $l)
	{
		$this->collCcprosols[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcprosolsJoinCcprogra($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprosolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprosols === null) {
			if ($this->isNew()) {
				$this->collCcprosols = array();
			} else {

				$criteria->add(CcprosolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcprosols = CcprosolPeer::doSelectJoinCcprogra($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprosolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcprosolCriteria) || !$this->lastCcprosolCriteria->equals($criteria)) {
				$this->collCcprosols = CcprosolPeer::doSelectJoinCcprogra($criteria, $con);
			}
		}
		$this->lastCcprosolCriteria = $criteria;

		return $this->collCcprosols;
	}

	
	public function initCcproyecs()
	{
		if ($this->collCcproyecs === null) {
			$this->collCcproyecs = array();
		}
	}

	
	public function getCcproyecs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcproyecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcproyecs === null) {
			if ($this->isNew()) {
			   $this->collCcproyecs = array();
			} else {

				$criteria->add(CcproyecPeer::CCSOLICI_ID, $this->getId());

				CcproyecPeer::addSelectColumns($criteria);
				$this->collCcproyecs = CcproyecPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcproyecPeer::CCSOLICI_ID, $this->getId());

				CcproyecPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcproyecCriteria) || !$this->lastCcproyecCriteria->equals($criteria)) {
					$this->collCcproyecs = CcproyecPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcproyecCriteria = $criteria;
		return $this->collCcproyecs;
	}

	
	public function countCcproyecs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcproyecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcproyecPeer::CCSOLICI_ID, $this->getId());

		return CcproyecPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcproyec(Ccproyec $l)
	{
		$this->collCcproyecs[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcproyecsJoinCcacteco($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcproyecPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcproyecs === null) {
			if ($this->isNew()) {
				$this->collCcproyecs = array();
			} else {

				$criteria->add(CcproyecPeer::CCSOLICI_ID, $this->getId());

				$this->collCcproyecs = CcproyecPeer::doSelectJoinCcacteco($criteria, $con);
			}
		} else {
									
			$criteria->add(CcproyecPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcproyecCriteria) || !$this->lastCcproyecCriteria->equals($criteria)) {
				$this->collCcproyecs = CcproyecPeer::doSelectJoinCcacteco($criteria, $con);
			}
		}
		$this->lastCcproyecCriteria = $criteria;

		return $this->collCcproyecs;
	}

	
	public function initCcrecsols()
	{
		if ($this->collCcrecsols === null) {
			$this->collCcrecsols = array();
		}
	}

	
	public function getCcrecsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecsols === null) {
			if ($this->isNew()) {
			   $this->collCcrecsols = array();
			} else {

				$criteria->add(CcrecsolPeer::CCSOLICI_ID, $this->getId());

				CcrecsolPeer::addSelectColumns($criteria);
				$this->collCcrecsols = CcrecsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecsolPeer::CCSOLICI_ID, $this->getId());

				CcrecsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecsolCriteria) || !$this->lastCcrecsolCriteria->equals($criteria)) {
					$this->collCcrecsols = CcrecsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecsolCriteria = $criteria;
		return $this->collCcrecsols;
	}

	
	public function countCcrecsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecsolPeer::CCSOLICI_ID, $this->getId());

		return CcrecsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecsol(Ccrecsol $l)
	{
		$this->collCcrecsols[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcrecsolsJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecsols === null) {
			if ($this->isNew()) {
				$this->collCcrecsols = array();
			} else {

				$criteria->add(CcrecsolPeer::CCSOLICI_ID, $this->getId());

				$this->collCcrecsols = CcrecsolPeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecsolPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcrecsolCriteria) || !$this->lastCcrecsolCriteria->equals($criteria)) {
				$this->collCcrecsols = CcrecsolPeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcrecsolCriteria = $criteria;

		return $this->collCcrecsols;
	}

	
	public function initCcsolsess()
	{
		if ($this->collCcsolsess === null) {
			$this->collCcsolsess = array();
		}
	}

	
	public function getCcsolsess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolsesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolsess === null) {
			if ($this->isNew()) {
			   $this->collCcsolsess = array();
			} else {

				$criteria->add(CcsolsesPeer::CCSOLICI_ID, $this->getId());

				CcsolsesPeer::addSelectColumns($criteria);
				$this->collCcsolsess = CcsolsesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcsolsesPeer::CCSOLICI_ID, $this->getId());

				CcsolsesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcsolsesCriteria) || !$this->lastCcsolsesCriteria->equals($criteria)) {
					$this->collCcsolsess = CcsolsesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcsolsesCriteria = $criteria;
		return $this->collCcsolsess;
	}

	
	public function countCcsolsess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolsesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcsolsesPeer::CCSOLICI_ID, $this->getId());

		return CcsolsesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcsolses(Ccsolses $l)
	{
		$this->collCcsolsess[] = $l;
		$l->setCcsolici($this);
	}


	
	public function getCcsolsessJoinCcsesion($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcsolsesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcsolsess === null) {
			if ($this->isNew()) {
				$this->collCcsolsess = array();
			} else {

				$criteria->add(CcsolsesPeer::CCSOLICI_ID, $this->getId());

				$this->collCcsolsess = CcsolsesPeer::doSelectJoinCcsesion($criteria, $con);
			}
		} else {
									
			$criteria->add(CcsolsesPeer::CCSOLICI_ID, $this->getId());

			if (!isset($this->lastCcsolsesCriteria) || !$this->lastCcsolsesCriteria->equals($criteria)) {
				$this->collCcsolsess = CcsolsesPeer::doSelectJoinCcsesion($criteria, $con);
			}
		}
		$this->lastCcsolsesCriteria = $criteria;

		return $this->collCcsolsess;
	}

} 