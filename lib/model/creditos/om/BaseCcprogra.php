<?php


abstract class BaseCcprogra extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nompro;


	
	protected $monmax;


	
	protected $prepro;


	
	protected $fecvig;


	
	protected $fecven;


	
	protected $coduni;


	
	protected $codcat;


	
	protected $objeto;


	
	protected $destino;


	
	protected $monfin;


	
	protected $condic;


	
	protected $garant;


	
	protected $recaud;


	
	protected $plafin;


	
	protected $nomprocom;


	
	protected $ccperiod_id;


	
	protected $ccfuefin_id;


	
	protected $tipcom;

	
	protected $aCcperiod;

	
	protected $aCcfuefin;

	
	protected $aCpdoccom;

	
	protected $collCcamoacts;

	
	protected $lastCcamoactCriteria = null;

	
	protected $collCcamoactresps;

	
	protected $lastCcamoactrespCriteria = null;

	
	protected $collCcamopags;

	
	protected $lastCcamopagCriteria = null;

	
	protected $collCcconcres;

	
	protected $lastCcconcreCriteria = null;

	
	protected $collCccuadess;

	
	protected $lastCccuadesCriteria = null;

	
	protected $collCcdefamos;

	
	protected $lastCcdefamoCriteria = null;

	
	protected $collCcliquids;

	
	protected $lastCcliquidCriteria = null;

	
	protected $collCcparcres;

	
	protected $lastCcparcreCriteria = null;

	
	protected $collCcparpros;

	
	protected $lastCcparproCriteria = null;

	
	protected $collCcprocreds;

	
	protected $lastCcprocredCriteria = null;

	
	protected $collCcprosols;

	
	protected $lastCcprosolCriteria = null;

	
	protected $collCcrecpros;

	
	protected $lastCcrecproCriteria = null;

	
	protected $collCcrecprocres;

	
	protected $lastCcrecprocreCriteria = null;

	
	protected $collCctipupspros;

	
	protected $lastCctipupsproCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNompro()
  {

    return trim($this->nompro);

  }
  
  public function getMonmax($val=false)
  {

    if($val) return number_format($this->monmax,2,',','.');
    else return $this->monmax;

  }
  
  public function getPrepro()
  {

    return $this->prepro;

  }
  
  public function getFecvig($format = 'Y-m-d')
  {

    if ($this->fecvig === null || $this->fecvig === '') {
      return null;
    } elseif (!is_int($this->fecvig)) {
            $ts = adodb_strtotime($this->fecvig);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecvig] as date/time value: " . var_export($this->fecvig, true));
      }
    } else {
      $ts = $this->fecvig;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecven($format = 'Y-m-d')
  {

    if ($this->fecven === null || $this->fecven === '') {
      return null;
    } elseif (!is_int($this->fecven)) {
            $ts = adodb_strtotime($this->fecven);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
      }
    } else {
      $ts = $this->fecven;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoduni()
  {

    return trim($this->coduni);

  }
  
  public function getCodcat()
  {

    return trim($this->codcat);

  }
  
  public function getObjeto()
  {

    return trim($this->objeto);

  }
  
  public function getDestino()
  {

    return trim($this->destino);

  }
  
  public function getMonfin()
  {

    return trim($this->monfin);

  }
  
  public function getCondic()
  {

    return trim($this->condic);

  }
  
  public function getGarant()
  {

    return trim($this->garant);

  }
  
  public function getRecaud()
  {

    return trim($this->recaud);

  }
  
  public function getPlafin()
  {

    return trim($this->plafin);

  }
  
  public function getNomprocom()
  {

    return trim($this->nomprocom);

  }
  
  public function getCcperiodId()
  {

    return $this->ccperiod_id;

  }
  
  public function getCcfuefinId()
  {

    return $this->ccfuefin_id;

  }
  
  public function getTipcom()
  {

    return trim($this->tipcom);

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcprograPeer::ID;
      }
  
	} 
	
	public function setNompro($v)
	{

    if ($this->nompro !== $v) {
        $this->nompro = $v;
        $this->modifiedColumns[] = CcprograPeer::NOMPRO;
      }
  
	} 
	
	public function setMonmax($v)
	{

    if ($this->monmax !== $v) {
        $this->monmax = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcprograPeer::MONMAX;
      }
  
	} 
	
	public function setPrepro($v)
	{

    if ($this->prepro !== $v) {
        $this->prepro = $v;
        $this->modifiedColumns[] = CcprograPeer::PREPRO;
      }
  
	} 
	
	public function setFecvig($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecvig] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecvig !== $ts) {
      $this->fecvig = $ts;
      $this->modifiedColumns[] = CcprograPeer::FECVIG;
    }

	} 
	
	public function setFecven($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecven !== $ts) {
      $this->fecven = $ts;
      $this->modifiedColumns[] = CcprograPeer::FECVEN;
    }

	} 
	
	public function setCoduni($v)
	{

    if ($this->coduni !== $v) {
        $this->coduni = $v;
        $this->modifiedColumns[] = CcprograPeer::CODUNI;
      }
  
	} 
	
	public function setCodcat($v)
	{

    if ($this->codcat !== $v) {
        $this->codcat = $v;
        $this->modifiedColumns[] = CcprograPeer::CODCAT;
      }
  
	} 
	
	public function setObjeto($v)
	{

    if ($this->objeto !== $v) {
        $this->objeto = $v;
        $this->modifiedColumns[] = CcprograPeer::OBJETO;
      }
  
	} 
	
	public function setDestino($v)
	{

    if ($this->destino !== $v) {
        $this->destino = $v;
        $this->modifiedColumns[] = CcprograPeer::DESTINO;
      }
  
	} 
	
	public function setMonfin($v)
	{

    if ($this->monfin !== $v) {
        $this->monfin = $v;
        $this->modifiedColumns[] = CcprograPeer::MONFIN;
      }
  
	} 
	
	public function setCondic($v)
	{

    if ($this->condic !== $v) {
        $this->condic = $v;
        $this->modifiedColumns[] = CcprograPeer::CONDIC;
      }
  
	} 
	
	public function setGarant($v)
	{

    if ($this->garant !== $v) {
        $this->garant = $v;
        $this->modifiedColumns[] = CcprograPeer::GARANT;
      }
  
	} 
	
	public function setRecaud($v)
	{

    if ($this->recaud !== $v) {
        $this->recaud = $v;
        $this->modifiedColumns[] = CcprograPeer::RECAUD;
      }
  
	} 
	
	public function setPlafin($v)
	{

    if ($this->plafin !== $v) {
        $this->plafin = $v;
        $this->modifiedColumns[] = CcprograPeer::PLAFIN;
      }
  
	} 
	
	public function setNomprocom($v)
	{

    if ($this->nomprocom !== $v) {
        $this->nomprocom = $v;
        $this->modifiedColumns[] = CcprograPeer::NOMPROCOM;
      }
  
	} 
	
	public function setCcperiodId($v)
	{

    if ($this->ccperiod_id !== $v) {
        $this->ccperiod_id = $v;
        $this->modifiedColumns[] = CcprograPeer::CCPERIOD_ID;
      }
  
		if ($this->aCcperiod !== null && $this->aCcperiod->getId() !== $v) {
			$this->aCcperiod = null;
		}

	} 
	
	public function setCcfuefinId($v)
	{

    if ($this->ccfuefin_id !== $v) {
        $this->ccfuefin_id = $v;
        $this->modifiedColumns[] = CcprograPeer::CCFUEFIN_ID;
      }
  
		if ($this->aCcfuefin !== null && $this->aCcfuefin->getId() !== $v) {
			$this->aCcfuefin = null;
		}

	} 
	
	public function setTipcom($v)
	{

    if ($this->tipcom !== $v) {
        $this->tipcom = $v;
        $this->modifiedColumns[] = CcprograPeer::TIPCOM;
      }
  
		if ($this->aCpdoccom !== null && $this->aCpdoccom->getTipcom() !== $v) {
			$this->aCpdoccom = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nompro = $rs->getString($startcol + 1);

      $this->monmax = $rs->getFloat($startcol + 2);

      $this->prepro = $rs->getInt($startcol + 3);

      $this->fecvig = $rs->getDate($startcol + 4, null);

      $this->fecven = $rs->getDate($startcol + 5, null);

      $this->coduni = $rs->getString($startcol + 6);

      $this->codcat = $rs->getString($startcol + 7);

      $this->objeto = $rs->getString($startcol + 8);

      $this->destino = $rs->getString($startcol + 9);

      $this->monfin = $rs->getString($startcol + 10);

      $this->condic = $rs->getString($startcol + 11);

      $this->garant = $rs->getString($startcol + 12);

      $this->recaud = $rs->getString($startcol + 13);

      $this->plafin = $rs->getString($startcol + 14);

      $this->nomprocom = $rs->getString($startcol + 15);

      $this->ccperiod_id = $rs->getInt($startcol + 16);

      $this->ccfuefin_id = $rs->getInt($startcol + 17);

      $this->tipcom = $rs->getString($startcol + 18);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 19; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccprogra object", $e);
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
			$con = Propel::getConnection(CcprograPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcprograPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcprograPeer::DATABASE_NAME);
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


												
			if ($this->aCcperiod !== null) {
				if ($this->aCcperiod->isModified()) {
					$affectedRows += $this->aCcperiod->save($con);
				}
				$this->setCcperiod($this->aCcperiod);
			}

			if ($this->aCcfuefin !== null) {
				if ($this->aCcfuefin->isModified()) {
					$affectedRows += $this->aCcfuefin->save($con);
				}
				$this->setCcfuefin($this->aCcfuefin);
			}

			if ($this->aCpdoccom !== null) {
				if ($this->aCpdoccom->isModified()) {
					$affectedRows += $this->aCpdoccom->save($con);
				}
				$this->setCpdoccom($this->aCpdoccom);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcprograPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcprograPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcamoacts !== null) {
				foreach($this->collCcamoacts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamoactresps !== null) {
				foreach($this->collCcamoactresps as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcamopags !== null) {
				foreach($this->collCcamopags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcconcres !== null) {
				foreach($this->collCcconcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCccuadess !== null) {
				foreach($this->collCccuadess as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcdefamos !== null) {
				foreach($this->collCcdefamos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcliquids !== null) {
				foreach($this->collCcliquids as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparcres !== null) {
				foreach($this->collCcparcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcparpros !== null) {
				foreach($this->collCcparpros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcprocreds !== null) {
				foreach($this->collCcprocreds as $referrerFK) {
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

			if ($this->collCcrecpros !== null) {
				foreach($this->collCcrecpros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrecprocres !== null) {
				foreach($this->collCcrecprocres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCctipupspros !== null) {
				foreach($this->collCctipupspros as $referrerFK) {
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


												
			if ($this->aCcperiod !== null) {
				if (!$this->aCcperiod->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperiod->getValidationFailures());
				}
			}

			if ($this->aCcfuefin !== null) {
				if (!$this->aCcfuefin->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcfuefin->getValidationFailures());
				}
			}

			if ($this->aCpdoccom !== null) {
				if (!$this->aCpdoccom->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCpdoccom->getValidationFailures());
				}
			}


			if (($retval = CcprograPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcamoacts !== null) {
					foreach($this->collCcamoacts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamoactresps !== null) {
					foreach($this->collCcamoactresps as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcamopags !== null) {
					foreach($this->collCcamopags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcconcres !== null) {
					foreach($this->collCcconcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCccuadess !== null) {
					foreach($this->collCccuadess as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcdefamos !== null) {
					foreach($this->collCcdefamos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcliquids !== null) {
					foreach($this->collCcliquids as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparcres !== null) {
					foreach($this->collCcparcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcparpros !== null) {
					foreach($this->collCcparpros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcprocreds !== null) {
					foreach($this->collCcprocreds as $referrerFK) {
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

				if ($this->collCcrecpros !== null) {
					foreach($this->collCcrecpros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrecprocres !== null) {
					foreach($this->collCcrecprocres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCctipupspros !== null) {
					foreach($this->collCctipupspros as $referrerFK) {
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
		$pos = CcprograPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNompro();
				break;
			case 2:
				return $this->getMonmax();
				break;
			case 3:
				return $this->getPrepro();
				break;
			case 4:
				return $this->getFecvig();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getCoduni();
				break;
			case 7:
				return $this->getCodcat();
				break;
			case 8:
				return $this->getObjeto();
				break;
			case 9:
				return $this->getDestino();
				break;
			case 10:
				return $this->getMonfin();
				break;
			case 11:
				return $this->getCondic();
				break;
			case 12:
				return $this->getGarant();
				break;
			case 13:
				return $this->getRecaud();
				break;
			case 14:
				return $this->getPlafin();
				break;
			case 15:
				return $this->getNomprocom();
				break;
			case 16:
				return $this->getCcperiodId();
				break;
			case 17:
				return $this->getCcfuefinId();
				break;
			case 18:
				return $this->getTipcom();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcprograPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNompro(),
			$keys[2] => $this->getMonmax(),
			$keys[3] => $this->getPrepro(),
			$keys[4] => $this->getFecvig(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getCoduni(),
			$keys[7] => $this->getCodcat(),
			$keys[8] => $this->getObjeto(),
			$keys[9] => $this->getDestino(),
			$keys[10] => $this->getMonfin(),
			$keys[11] => $this->getCondic(),
			$keys[12] => $this->getGarant(),
			$keys[13] => $this->getRecaud(),
			$keys[14] => $this->getPlafin(),
			$keys[15] => $this->getNomprocom(),
			$keys[16] => $this->getCcperiodId(),
			$keys[17] => $this->getCcfuefinId(),
			$keys[18] => $this->getTipcom(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcprograPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNompro($value);
				break;
			case 2:
				$this->setMonmax($value);
				break;
			case 3:
				$this->setPrepro($value);
				break;
			case 4:
				$this->setFecvig($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setCoduni($value);
				break;
			case 7:
				$this->setCodcat($value);
				break;
			case 8:
				$this->setObjeto($value);
				break;
			case 9:
				$this->setDestino($value);
				break;
			case 10:
				$this->setMonfin($value);
				break;
			case 11:
				$this->setCondic($value);
				break;
			case 12:
				$this->setGarant($value);
				break;
			case 13:
				$this->setRecaud($value);
				break;
			case 14:
				$this->setPlafin($value);
				break;
			case 15:
				$this->setNomprocom($value);
				break;
			case 16:
				$this->setCcperiodId($value);
				break;
			case 17:
				$this->setCcfuefinId($value);
				break;
			case 18:
				$this->setTipcom($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcprograPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonmax($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPrepro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecvig($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCoduni($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCodcat($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObjeto($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDestino($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonfin($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCondic($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setGarant($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setRecaud($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPlafin($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNomprocom($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcperiodId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCcfuefinId($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipcom($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcprograPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcprograPeer::ID)) $criteria->add(CcprograPeer::ID, $this->id);
		if ($this->isColumnModified(CcprograPeer::NOMPRO)) $criteria->add(CcprograPeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(CcprograPeer::MONMAX)) $criteria->add(CcprograPeer::MONMAX, $this->monmax);
		if ($this->isColumnModified(CcprograPeer::PREPRO)) $criteria->add(CcprograPeer::PREPRO, $this->prepro);
		if ($this->isColumnModified(CcprograPeer::FECVIG)) $criteria->add(CcprograPeer::FECVIG, $this->fecvig);
		if ($this->isColumnModified(CcprograPeer::FECVEN)) $criteria->add(CcprograPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CcprograPeer::CODUNI)) $criteria->add(CcprograPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(CcprograPeer::CODCAT)) $criteria->add(CcprograPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(CcprograPeer::OBJETO)) $criteria->add(CcprograPeer::OBJETO, $this->objeto);
		if ($this->isColumnModified(CcprograPeer::DESTINO)) $criteria->add(CcprograPeer::DESTINO, $this->destino);
		if ($this->isColumnModified(CcprograPeer::MONFIN)) $criteria->add(CcprograPeer::MONFIN, $this->monfin);
		if ($this->isColumnModified(CcprograPeer::CONDIC)) $criteria->add(CcprograPeer::CONDIC, $this->condic);
		if ($this->isColumnModified(CcprograPeer::GARANT)) $criteria->add(CcprograPeer::GARANT, $this->garant);
		if ($this->isColumnModified(CcprograPeer::RECAUD)) $criteria->add(CcprograPeer::RECAUD, $this->recaud);
		if ($this->isColumnModified(CcprograPeer::PLAFIN)) $criteria->add(CcprograPeer::PLAFIN, $this->plafin);
		if ($this->isColumnModified(CcprograPeer::NOMPROCOM)) $criteria->add(CcprograPeer::NOMPROCOM, $this->nomprocom);
		if ($this->isColumnModified(CcprograPeer::CCPERIOD_ID)) $criteria->add(CcprograPeer::CCPERIOD_ID, $this->ccperiod_id);
		if ($this->isColumnModified(CcprograPeer::CCFUEFIN_ID)) $criteria->add(CcprograPeer::CCFUEFIN_ID, $this->ccfuefin_id);
		if ($this->isColumnModified(CcprograPeer::TIPCOM)) $criteria->add(CcprograPeer::TIPCOM, $this->tipcom);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcprograPeer::DATABASE_NAME);

		$criteria->add(CcprograPeer::ID, $this->id);

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

		$copyObj->setNompro($this->nompro);

		$copyObj->setMonmax($this->monmax);

		$copyObj->setPrepro($this->prepro);

		$copyObj->setFecvig($this->fecvig);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setObjeto($this->objeto);

		$copyObj->setDestino($this->destino);

		$copyObj->setMonfin($this->monfin);

		$copyObj->setCondic($this->condic);

		$copyObj->setGarant($this->garant);

		$copyObj->setRecaud($this->recaud);

		$copyObj->setPlafin($this->plafin);

		$copyObj->setNomprocom($this->nomprocom);

		$copyObj->setCcperiodId($this->ccperiod_id);

		$copyObj->setCcfuefinId($this->ccfuefin_id);

		$copyObj->setTipcom($this->tipcom);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcamoacts() as $relObj) {
				$copyObj->addCcamoact($relObj->copy($deepCopy));
			}

			foreach($this->getCcamoactresps() as $relObj) {
				$copyObj->addCcamoactresp($relObj->copy($deepCopy));
			}

			foreach($this->getCcamopags() as $relObj) {
				$copyObj->addCcamopag($relObj->copy($deepCopy));
			}

			foreach($this->getCcconcres() as $relObj) {
				$copyObj->addCcconcre($relObj->copy($deepCopy));
			}

			foreach($this->getCccuadess() as $relObj) {
				$copyObj->addCccuades($relObj->copy($deepCopy));
			}

			foreach($this->getCcdefamos() as $relObj) {
				$copyObj->addCcdefamo($relObj->copy($deepCopy));
			}

			foreach($this->getCcliquids() as $relObj) {
				$copyObj->addCcliquid($relObj->copy($deepCopy));
			}

			foreach($this->getCcparcres() as $relObj) {
				$copyObj->addCcparcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcparpros() as $relObj) {
				$copyObj->addCcparpro($relObj->copy($deepCopy));
			}

			foreach($this->getCcprocreds() as $relObj) {
				$copyObj->addCcprocred($relObj->copy($deepCopy));
			}

			foreach($this->getCcprosols() as $relObj) {
				$copyObj->addCcprosol($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecpros() as $relObj) {
				$copyObj->addCcrecpro($relObj->copy($deepCopy));
			}

			foreach($this->getCcrecprocres() as $relObj) {
				$copyObj->addCcrecprocre($relObj->copy($deepCopy));
			}

			foreach($this->getCctipupspros() as $relObj) {
				$copyObj->addCctipupspro($relObj->copy($deepCopy));
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
			self::$peer = new CcprograPeer();
		}
		return self::$peer;
	}

	
	public function setCcperiod($v)
	{


		if ($v === null) {
			$this->setCcperiodId(NULL);
		} else {
			$this->setCcperiodId($v->getId());
		}


		$this->aCcperiod = $v;
	}


	
	public function getCcperiod($con = null)
	{
		if ($this->aCcperiod === null && ($this->ccperiod_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperiodPeer.php';

      $c = new Criteria();
      $c->add(CcperiodPeer::ID,$this->ccperiod_id);
      
			$this->aCcperiod = CcperiodPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperiod;
	}

	
	public function setCcfuefin($v)
	{


		if ($v === null) {
			$this->setCcfuefinId(NULL);
		} else {
			$this->setCcfuefinId($v->getId());
		}


		$this->aCcfuefin = $v;
	}


	
	public function getCcfuefin($con = null)
	{
		if ($this->aCcfuefin === null && ($this->ccfuefin_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcfuefinPeer.php';

      $c = new Criteria();
      $c->add(CcfuefinPeer::ID,$this->ccfuefin_id);
      
			$this->aCcfuefin = CcfuefinPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcfuefin;
	}

	
	public function setCpdoccom($v)
	{


		if ($v === null) {
			$this->setTipcom(NULL);
		} else {
			$this->setTipcom($v->getTipcom());
		}


		$this->aCpdoccom = $v;
	}


	
	public function getCpdoccom($con = null)
	{
		if ($this->aCpdoccom === null && (($this->tipcom !== "" && $this->tipcom !== null))) {
						include_once 'lib/model/presupuesto/om/BaseCpdoccomPeer.php';

      $c = new Criteria();
      $c->add(CpdoccomPeer::TIPCOM,$this->tipcom);
      
			$this->aCpdoccom = CpdoccomPeer::doSelectOne($c, $con);

			
		}
		return $this->aCpdoccom;
	}

	
	public function initCcamoacts()
	{
		if ($this->collCcamoacts === null) {
			$this->collCcamoacts = array();
		}
	}

	
	public function getCcamoacts($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
			   $this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

				CcamoactPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
					$this->collCcamoacts = CcamoactPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoactCriteria = $criteria;
		return $this->collCcamoacts;
	}

	
	public function countCcamoacts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

		return CcamoactPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoact(Ccamoact $l)
	{
		$this->collCcamoacts[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcamoactsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}


	
	public function getCcamoactsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}


	
	public function getCcamoactsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoacts === null) {
			if ($this->isNew()) {
				$this->collCcamoacts = array();
			} else {

				$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamoactCriteria) || !$this->lastCcamoactCriteria->equals($criteria)) {
				$this->collCcamoacts = CcamoactPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamoactCriteria = $criteria;

		return $this->collCcamoacts;
	}

	
	public function initCcamoactresps()
	{
		if ($this->collCcamoactresps === null) {
			$this->collCcamoactresps = array();
		}
	}

	
	public function getCcamoactresps($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
			   $this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

				CcamoactrespPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
					$this->collCcamoactresps = CcamoactrespPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;
		return $this->collCcamoactresps;
	}

	
	public function countCcamoactresps($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

		return CcamoactrespPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamoactresp(Ccamoactresp $l)
	{
		$this->collCcamoactresps[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcamoactrespsJoinCcdefamo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcdefamo($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}


	
	public function getCcamoactrespsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}


	
	public function getCcamoactrespsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamoactrespPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamoactresps === null) {
			if ($this->isNew()) {
				$this->collCcamoactresps = array();
			} else {

				$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamoactrespPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamoactrespCriteria) || !$this->lastCcamoactrespCriteria->equals($criteria)) {
				$this->collCcamoactresps = CcamoactrespPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamoactrespCriteria = $criteria;

		return $this->collCcamoactresps;
	}

	
	public function initCcamopags()
	{
		if ($this->collCcamopags === null) {
			$this->collCcamopags = array();
		}
	}

	
	public function getCcamopags($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
			   $this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				CcamopagPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
					$this->collCcamopags = CcamopagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcamopagCriteria = $criteria;
		return $this->collCcamopags;
	}

	
	public function countCcamopags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

		return CcamopagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcamopag(Ccamopag $l)
	{
		$this->collCcamopags[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcamopagsJoinCcamoact($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcamoact($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpago($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpago($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcperpre($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcperpre($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}


	
	public function getCcamopagsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcamopagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcamopags === null) {
			if ($this->isNew()) {
				$this->collCcamopags = array();
			} else {

				$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcamopagPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcamopagCriteria) || !$this->lastCcamopagCriteria->equals($criteria)) {
				$this->collCcamopags = CcamopagPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcamopagCriteria = $criteria;

		return $this->collCcamopags;
	}

	
	public function initCcconcres()
	{
		if ($this->collCcconcres === null) {
			$this->collCcconcres = array();
		}
	}

	
	public function getCcconcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
			   $this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

				CcconcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
					$this->collCcconcres = CcconcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcconcreCriteria = $criteria;
		return $this->collCcconcres;
	}

	
	public function countCcconcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

		return CcconcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcconcre(Ccconcre $l)
	{
		$this->collCcconcres[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcconcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}


	
	public function getCcconcresJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcconcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcconcres === null) {
			if ($this->isNew()) {
				$this->collCcconcres = array();
			} else {

				$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcconcres = CcconcrePeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcconcrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcconcreCriteria) || !$this->lastCcconcreCriteria->equals($criteria)) {
				$this->collCcconcres = CcconcrePeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcconcreCriteria = $criteria;

		return $this->collCcconcres;
	}

	
	public function initCccuadess()
	{
		if ($this->collCccuadess === null) {
			$this->collCccuadess = array();
		}
	}

	
	public function getCccuadess($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
			   $this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

				CccuadesPeer::addSelectColumns($criteria);
				$this->collCccuadess = CccuadesPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

				CccuadesPeer::addSelectColumns($criteria);
				if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
					$this->collCccuadess = CccuadesPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCccuadesCriteria = $criteria;
		return $this->collCccuadess;
	}

	
	public function countCccuadess($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

		return CccuadesPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCccuades(Cccuades $l)
	{
		$this->collCccuadess[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCccuadessJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
				$this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

				$this->collCccuadess = CccuadesPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
				$this->collCccuadess = CccuadesPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCccuadesCriteria = $criteria;

		return $this->collCccuadess;
	}


	
	public function getCccuadessJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCccuadesPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCccuadess === null) {
			if ($this->isNew()) {
				$this->collCccuadess = array();
			} else {

				$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

				$this->collCccuadess = CccuadesPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CccuadesPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCccuadesCriteria) || !$this->lastCccuadesCriteria->equals($criteria)) {
				$this->collCccuadess = CccuadesPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCccuadesCriteria = $criteria;

		return $this->collCccuadess;
	}

	
	public function initCcdefamos()
	{
		if ($this->collCcdefamos === null) {
			$this->collCcdefamos = array();
		}
	}

	
	public function getCcdefamos($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
			   $this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				CcdefamoPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
					$this->collCcdefamos = CcdefamoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcdefamoCriteria = $criteria;
		return $this->collCcdefamos;
	}

	
	public function countCcdefamos($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

		return CcdefamoPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcdefamo(Ccdefamo $l)
	{
		$this->collCcdefamos[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcdefamosJoinCcperiodRelatedByCcperiodId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcperiodId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcperiodRelatedByCcpergravaId($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByCcpergravaId($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}


	
	public function getCcdefamosJoinCcperiodRelatedByFrecuoesp($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcdefamoPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcdefamos === null) {
			if ($this->isNew()) {
				$this->collCcdefamos = array();
			} else {

				$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		} else {
									
			$criteria->add(CcdefamoPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcdefamoCriteria) || !$this->lastCcdefamoCriteria->equals($criteria)) {
				$this->collCcdefamos = CcdefamoPeer::doSelectJoinCcperiodRelatedByFrecuoesp($criteria, $con);
			}
		}
		$this->lastCcdefamoCriteria = $criteria;

		return $this->collCcdefamos;
	}

	
	public function initCcliquids()
	{
		if ($this->collCcliquids === null) {
			$this->collCcliquids = array();
		}
	}

	
	public function getCcliquids($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
			   $this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				CcliquidPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
					$this->collCcliquids = CcliquidPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcliquidCriteria = $criteria;
		return $this->collCcliquids;
	}

	
	public function countCcliquids($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

		return CcliquidPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcliquid(Ccliquid $l)
	{
		$this->collCcliquids[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcliquidsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccuades($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccuades($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcsolliq($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcsolliq($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcconcep($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcconcep($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCcpagter($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCcpagter($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}


	
	public function getCcliquidsJoinCccueban($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcliquidPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcliquids === null) {
			if ($this->isNew()) {
				$this->collCcliquids = array();
			} else {

				$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		} else {
									
			$criteria->add(CcliquidPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcliquidCriteria) || !$this->lastCcliquidCriteria->equals($criteria)) {
				$this->collCcliquids = CcliquidPeer::doSelectJoinCccueban($criteria, $con);
			}
		}
		$this->lastCcliquidCriteria = $criteria;

		return $this->collCcliquids;
	}

	
	public function initCcparcres()
	{
		if ($this->collCcparcres === null) {
			$this->collCcparcres = array();
		}
	}

	
	public function getCcparcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
			   $this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

				CcparcrePeer::addSelectColumns($criteria);
				$this->collCcparcres = CcparcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

				CcparcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
					$this->collCcparcres = CcparcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparcreCriteria = $criteria;
		return $this->collCcparcres;
	}

	
	public function countCcparcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

		return CcparcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparcre(Ccparcre $l)
	{
		$this->collCcparcres[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcparcresJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
				$this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcparcres = CcparcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
				$this->collCcparcres = CcparcrePeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparcreCriteria = $criteria;

		return $this->collCcparcres;
	}


	
	public function getCcparcresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparcres === null) {
			if ($this->isNew()) {
				$this->collCcparcres = array();
			} else {

				$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcparcres = CcparcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparcrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparcreCriteria) || !$this->lastCcparcreCriteria->equals($criteria)) {
				$this->collCcparcres = CcparcrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcparcreCriteria = $criteria;

		return $this->collCcparcres;
	}

	
	public function initCcparpros()
	{
		if ($this->collCcparpros === null) {
			$this->collCcparpros = array();
		}
	}

	
	public function getCcparpros($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
			   $this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				CcparproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
					$this->collCcparpros = CcparproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcparproCriteria = $criteria;
		return $this->collCcparpros;
	}

	
	public function countCcparpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

		return CcparproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcparpro(Ccparpro $l)
	{
		$this->collCcparpros[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcparprosJoinContabb($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinContabb($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcpartid($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcpartid($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCctipint($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCctipint($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcdeducc($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcdeducc($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}


	
	public function getCcparprosJoinCcperiod($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcparproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcparpros === null) {
			if ($this->isNew()) {
				$this->collCcparpros = array();
			} else {

				$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		} else {
									
			$criteria->add(CcparproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcparproCriteria) || !$this->lastCcparproCriteria->equals($criteria)) {
				$this->collCcparpros = CcparproPeer::doSelectJoinCcperiod($criteria, $con);
			}
		}
		$this->lastCcparproCriteria = $criteria;

		return $this->collCcparpros;
	}

	
	public function initCcprocreds()
	{
		if ($this->collCcprocreds === null) {
			$this->collCcprocreds = array();
		}
	}

	
	public function getCcprocreds($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprocredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprocreds === null) {
			if ($this->isNew()) {
			   $this->collCcprocreds = array();
			} else {

				$criteria->add(CcprocredPeer::CCPROGRA_ID, $this->getId());

				CcprocredPeer::addSelectColumns($criteria);
				$this->collCcprocreds = CcprocredPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcprocredPeer::CCPROGRA_ID, $this->getId());

				CcprocredPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcprocredCriteria) || !$this->lastCcprocredCriteria->equals($criteria)) {
					$this->collCcprocreds = CcprocredPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcprocredCriteria = $criteria;
		return $this->collCcprocreds;
	}

	
	public function countCcprocreds($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprocredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcprocredPeer::CCPROGRA_ID, $this->getId());

		return CcprocredPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcprocred(Ccprocred $l)
	{
		$this->collCcprocreds[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcprocredsJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcprocredPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcprocreds === null) {
			if ($this->isNew()) {
				$this->collCcprocreds = array();
			} else {

				$criteria->add(CcprocredPeer::CCPROGRA_ID, $this->getId());

				$this->collCcprocreds = CcprocredPeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprocredPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcprocredCriteria) || !$this->lastCcprocredCriteria->equals($criteria)) {
				$this->collCcprocreds = CcprocredPeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcprocredCriteria = $criteria;

		return $this->collCcprocreds;
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

				$criteria->add(CcprosolPeer::CCPROGRA_ID, $this->getId());

				CcprosolPeer::addSelectColumns($criteria);
				$this->collCcprosols = CcprosolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcprosolPeer::CCPROGRA_ID, $this->getId());

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

		$criteria->add(CcprosolPeer::CCPROGRA_ID, $this->getId());

		return CcprosolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcprosol(Ccprosol $l)
	{
		$this->collCcprosols[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcprosolsJoinCcsolici($criteria = null, $con = null)
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

				$criteria->add(CcprosolPeer::CCPROGRA_ID, $this->getId());

				$this->collCcprosols = CcprosolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		} else {
									
			$criteria->add(CcprosolPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcprosolCriteria) || !$this->lastCcprosolCriteria->equals($criteria)) {
				$this->collCcprosols = CcprosolPeer::doSelectJoinCcsolici($criteria, $con);
			}
		}
		$this->lastCcprosolCriteria = $criteria;

		return $this->collCcprosols;
	}

	
	public function initCcrecpros()
	{
		if ($this->collCcrecpros === null) {
			$this->collCcrecpros = array();
		}
	}

	
	public function getCcrecpros($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecpros === null) {
			if ($this->isNew()) {
			   $this->collCcrecpros = array();
			} else {

				$criteria->add(CcrecproPeer::CCPROGRA_ID, $this->getId());

				CcrecproPeer::addSelectColumns($criteria);
				$this->collCcrecpros = CcrecproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecproPeer::CCPROGRA_ID, $this->getId());

				CcrecproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecproCriteria) || !$this->lastCcrecproCriteria->equals($criteria)) {
					$this->collCcrecpros = CcrecproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecproCriteria = $criteria;
		return $this->collCcrecpros;
	}

	
	public function countCcrecpros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecproPeer::CCPROGRA_ID, $this->getId());

		return CcrecproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecpro(Ccrecpro $l)
	{
		$this->collCcrecpros[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcrecprosJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecpros === null) {
			if ($this->isNew()) {
				$this->collCcrecpros = array();
			} else {

				$criteria->add(CcrecproPeer::CCPROGRA_ID, $this->getId());

				$this->collCcrecpros = CcrecproPeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcrecproCriteria) || !$this->lastCcrecproCriteria->equals($criteria)) {
				$this->collCcrecpros = CcrecproPeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcrecproCriteria = $criteria;

		return $this->collCcrecpros;
	}

	
	public function initCcrecprocres()
	{
		if ($this->collCcrecprocres === null) {
			$this->collCcrecprocres = array();
		}
	}

	
	public function getCcrecprocres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
			   $this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

				CcrecprocrePeer::addSelectColumns($criteria);
				$this->collCcrecprocres = CcrecprocrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

				CcrecprocrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
					$this->collCcrecprocres = CcrecprocrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;
		return $this->collCcrecprocres;
	}

	
	public function countCcrecprocres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

		return CcrecprocrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrecprocre(Ccrecprocre $l)
	{
		$this->collCcrecprocres[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCcrecprocresJoinCcrecaud($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
				$this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCcrecaud($criteria, $con);
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;

		return $this->collCcrecprocres;
	}


	
	public function getCcrecprocresJoinCccredit($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrecprocrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrecprocres === null) {
			if ($this->isNew()) {
				$this->collCcrecprocres = array();
			} else {

				$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCccredit($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrecprocrePeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCcrecprocreCriteria) || !$this->lastCcrecprocreCriteria->equals($criteria)) {
				$this->collCcrecprocres = CcrecprocrePeer::doSelectJoinCccredit($criteria, $con);
			}
		}
		$this->lastCcrecprocreCriteria = $criteria;

		return $this->collCcrecprocres;
	}

	
	public function initCctipupspros()
	{
		if ($this->collCctipupspros === null) {
			$this->collCctipupspros = array();
		}
	}

	
	public function getCctipupspros($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCctipupsproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCctipupspros === null) {
			if ($this->isNew()) {
			   $this->collCctipupspros = array();
			} else {

				$criteria->add(CctipupsproPeer::CCPROGRA_ID, $this->getId());

				CctipupsproPeer::addSelectColumns($criteria);
				$this->collCctipupspros = CctipupsproPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CctipupsproPeer::CCPROGRA_ID, $this->getId());

				CctipupsproPeer::addSelectColumns($criteria);
				if (!isset($this->lastCctipupsproCriteria) || !$this->lastCctipupsproCriteria->equals($criteria)) {
					$this->collCctipupspros = CctipupsproPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCctipupsproCriteria = $criteria;
		return $this->collCctipupspros;
	}

	
	public function countCctipupspros($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCctipupsproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CctipupsproPeer::CCPROGRA_ID, $this->getId());

		return CctipupsproPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCctipupspro(Cctipupspro $l)
	{
		$this->collCctipupspros[] = $l;
		$l->setCcprogra($this);
	}


	
	public function getCctipupsprosJoinCctipups($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCctipupsproPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCctipupspros === null) {
			if ($this->isNew()) {
				$this->collCctipupspros = array();
			} else {

				$criteria->add(CctipupsproPeer::CCPROGRA_ID, $this->getId());

				$this->collCctipupspros = CctipupsproPeer::doSelectJoinCctipups($criteria, $con);
			}
		} else {
									
			$criteria->add(CctipupsproPeer::CCPROGRA_ID, $this->getId());

			if (!isset($this->lastCctipupsproCriteria) || !$this->lastCctipupsproCriteria->equals($criteria)) {
				$this->collCctipupspros = CctipupsproPeer::doSelectJoinCctipups($criteria, $con);
			}
		}
		$this->lastCctipupsproCriteria = $criteria;

		return $this->collCctipupspros;
	}

} 