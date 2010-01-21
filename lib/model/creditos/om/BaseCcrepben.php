<?php


abstract class BaseCcrepben extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomrepben;


	
	protected $cedrifben;


	
	protected $fecnac;


	
	protected $ocupa;


	
	protected $dirnomurb;


	
	protected $dirnumcal;


	
	protected $dirnumcasedi;


	
	protected $dirnumpis;


	
	protected $dirnumapt;


	
	protected $dirpunref;


	
	protected $numtel;


	
	protected $numcel;


	
	protected $numfax;


	
	protected $codaretel;


	
	protected $codarecel;


	
	protected $codarefax;


	
	protected $corele;


	
	protected $sexrepben;


	
	protected $parloccas;


	
	protected $ccperpre_id;


	
	protected $ccbenefi_id;


	
	protected $ccparroq_id;


	
	protected $ccparent_id;

	
	protected $aCcperpre;

	
	protected $aCcbenefi;

	
	protected $aCcparroq;

	
	protected $aCcparent;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomrepben()
  {

    return trim($this->nomrepben);

  }
  
  public function getCedrifben()
  {

    return trim($this->cedrifben);

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

  
  public function getOcupa()
  {

    return trim($this->ocupa);

  }
  
  public function getDirnomurb()
  {

    return trim($this->dirnomurb);

  }
  
  public function getDirnumcal()
  {

    return trim($this->dirnumcal);

  }
  
  public function getDirnumcasedi()
  {

    return trim($this->dirnumcasedi);

  }
  
  public function getDirnumpis()
  {

    return trim($this->dirnumpis);

  }
  
  public function getDirnumapt()
  {

    return trim($this->dirnumapt);

  }
  
  public function getDirpunref()
  {

    return trim($this->dirpunref);

  }
  
  public function getNumtel()
  {

    return trim($this->numtel);

  }
  
  public function getNumcel()
  {

    return trim($this->numcel);

  }
  
  public function getNumfax()
  {

    return trim($this->numfax);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getCodarefax()
  {

    return trim($this->codarefax);

  }
  
  public function getCorele()
  {

    return trim($this->corele);

  }
  
  public function getSexrepben()
  {

    return $this->sexrepben;

  }
  
  public function getParloccas()
  {

    return trim($this->parloccas);

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCcbenefiId()
  {

    return $this->ccbenefi_id;

  }
  
  public function getCcparroqId()
  {

    return $this->ccparroq_id;

  }
  
  public function getCcparentId()
  {

    return $this->ccparent_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcrepbenPeer::ID;
      }
  
	} 
	
	public function setNomrepben($v)
	{

    if ($this->nomrepben !== $v) {
        $this->nomrepben = $v;
        $this->modifiedColumns[] = CcrepbenPeer::NOMREPBEN;
      }
  
	} 
	
	public function setCedrifben($v)
	{

    if ($this->cedrifben !== $v) {
        $this->cedrifben = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CEDRIFBEN;
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
      $this->modifiedColumns[] = CcrepbenPeer::FECNAC;
    }

	} 
	
	public function setOcupa($v)
	{

    if ($this->ocupa !== $v) {
        $this->ocupa = $v;
        $this->modifiedColumns[] = CcrepbenPeer::OCUPA;
      }
  
	} 
	
	public function setDirnomurb($v)
	{

    if ($this->dirnomurb !== $v) {
        $this->dirnomurb = $v;
        $this->modifiedColumns[] = CcrepbenPeer::DIRNOMURB;
      }
  
	} 
	
	public function setDirnumcal($v)
	{

    if ($this->dirnumcal !== $v) {
        $this->dirnumcal = $v;
        $this->modifiedColumns[] = CcrepbenPeer::DIRNUMCAL;
      }
  
	} 
	
	public function setDirnumcasedi($v)
	{

    if ($this->dirnumcasedi !== $v) {
        $this->dirnumcasedi = $v;
        $this->modifiedColumns[] = CcrepbenPeer::DIRNUMCASEDI;
      }
  
	} 
	
	public function setDirnumpis($v)
	{

    if ($this->dirnumpis !== $v) {
        $this->dirnumpis = $v;
        $this->modifiedColumns[] = CcrepbenPeer::DIRNUMPIS;
      }
  
	} 
	
	public function setDirnumapt($v)
	{

    if ($this->dirnumapt !== $v) {
        $this->dirnumapt = $v;
        $this->modifiedColumns[] = CcrepbenPeer::DIRNUMAPT;
      }
  
	} 
	
	public function setDirpunref($v)
	{

    if ($this->dirpunref !== $v) {
        $this->dirpunref = $v;
        $this->modifiedColumns[] = CcrepbenPeer::DIRPUNREF;
      }
  
	} 
	
	public function setNumtel($v)
	{

    if ($this->numtel !== $v) {
        $this->numtel = $v;
        $this->modifiedColumns[] = CcrepbenPeer::NUMTEL;
      }
  
	} 
	
	public function setNumcel($v)
	{

    if ($this->numcel !== $v) {
        $this->numcel = $v;
        $this->modifiedColumns[] = CcrepbenPeer::NUMCEL;
      }
  
	} 
	
	public function setNumfax($v)
	{

    if ($this->numfax !== $v) {
        $this->numfax = $v;
        $this->modifiedColumns[] = CcrepbenPeer::NUMFAX;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CODARETEL;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CODARECEL;
      }
  
	} 
	
	public function setCodarefax($v)
	{

    if ($this->codarefax !== $v) {
        $this->codarefax = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CODAREFAX;
      }
  
	} 
	
	public function setCorele($v)
	{

    if ($this->corele !== $v) {
        $this->corele = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CORELE;
      }
  
	} 
	
	public function setSexrepben($v)
	{

    if ($this->sexrepben !== $v) {
        $this->sexrepben = $v;
        $this->modifiedColumns[] = CcrepbenPeer::SEXREPBEN;
      }
  
	} 
	
	public function setParloccas($v)
	{

    if ($this->parloccas !== $v) {
        $this->parloccas = $v;
        $this->modifiedColumns[] = CcrepbenPeer::PARLOCCAS;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCcbenefiId($v)
	{

    if ($this->ccbenefi_id !== $v) {
        $this->ccbenefi_id = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CCBENEFI_ID;
      }
  
		if ($this->aCcbenefi !== null && $this->aCcbenefi->getId() !== $v) {
			$this->aCcbenefi = null;
		}

	} 
	
	public function setCcparroqId($v)
	{

    if ($this->ccparroq_id !== $v) {
        $this->ccparroq_id = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CCPARROQ_ID;
      }
  
		if ($this->aCcparroq !== null && $this->aCcparroq->getId() !== $v) {
			$this->aCcparroq = null;
		}

	} 
	
	public function setCcparentId($v)
	{

    if ($this->ccparent_id !== $v) {
        $this->ccparent_id = $v;
        $this->modifiedColumns[] = CcrepbenPeer::CCPARENT_ID;
      }
  
		if ($this->aCcparent !== null && $this->aCcparent->getId() !== $v) {
			$this->aCcparent = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomrepben = $rs->getString($startcol + 1);

      $this->cedrifben = $rs->getString($startcol + 2);

      $this->fecnac = $rs->getDate($startcol + 3, null);

      $this->ocupa = $rs->getString($startcol + 4);

      $this->dirnomurb = $rs->getString($startcol + 5);

      $this->dirnumcal = $rs->getString($startcol + 6);

      $this->dirnumcasedi = $rs->getString($startcol + 7);

      $this->dirnumpis = $rs->getString($startcol + 8);

      $this->dirnumapt = $rs->getString($startcol + 9);

      $this->dirpunref = $rs->getString($startcol + 10);

      $this->numtel = $rs->getString($startcol + 11);

      $this->numcel = $rs->getString($startcol + 12);

      $this->numfax = $rs->getString($startcol + 13);

      $this->codaretel = $rs->getString($startcol + 14);

      $this->codarecel = $rs->getString($startcol + 15);

      $this->codarefax = $rs->getString($startcol + 16);

      $this->corele = $rs->getString($startcol + 17);

      $this->sexrepben = $rs->getString($startcol + 18);

      $this->parloccas = $rs->getString($startcol + 19);

      $this->ccperpre_id = $rs->getInt($startcol + 20);

      $this->ccbenefi_id = $rs->getInt($startcol + 21);

      $this->ccparroq_id = $rs->getInt($startcol + 22);

      $this->ccparent_id = $rs->getInt($startcol + 23);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 24; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccrepben object", $e);
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
			$con = Propel::getConnection(CcrepbenPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcrepbenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcrepbenPeer::DATABASE_NAME);
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


												
			if ($this->aCcperpre !== null) {
				if ($this->aCcperpre->isModified()) {
					$affectedRows += $this->aCcperpre->save($con);
				}
				$this->setCcperpre($this->aCcperpre);
			}

			if ($this->aCcbenefi !== null) {
				if ($this->aCcbenefi->isModified()) {
					$affectedRows += $this->aCcbenefi->save($con);
				}
				$this->setCcbenefi($this->aCcbenefi);
			}

			if ($this->aCcparroq !== null) {
				if ($this->aCcparroq->isModified()) {
					$affectedRows += $this->aCcparroq->save($con);
				}
				$this->setCcparroq($this->aCcparroq);
			}

			if ($this->aCcparent !== null) {
				if ($this->aCcparent->isModified()) {
					$affectedRows += $this->aCcparent->save($con);
				}
				$this->setCcparent($this->aCcparent);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcrepbenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcrepbenPeer::doUpdate($this, $con);
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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCcbenefi !== null) {
				if (!$this->aCcbenefi->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcbenefi->getValidationFailures());
				}
			}

			if ($this->aCcparroq !== null) {
				if (!$this->aCcparroq->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparroq->getValidationFailures());
				}
			}

			if ($this->aCcparent !== null) {
				if (!$this->aCcparent->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcparent->getValidationFailures());
				}
			}


			if (($retval = CcrepbenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrepbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomrepben();
				break;
			case 2:
				return $this->getCedrifben();
				break;
			case 3:
				return $this->getFecnac();
				break;
			case 4:
				return $this->getOcupa();
				break;
			case 5:
				return $this->getDirnomurb();
				break;
			case 6:
				return $this->getDirnumcal();
				break;
			case 7:
				return $this->getDirnumcasedi();
				break;
			case 8:
				return $this->getDirnumpis();
				break;
			case 9:
				return $this->getDirnumapt();
				break;
			case 10:
				return $this->getDirpunref();
				break;
			case 11:
				return $this->getNumtel();
				break;
			case 12:
				return $this->getNumcel();
				break;
			case 13:
				return $this->getNumfax();
				break;
			case 14:
				return $this->getCodaretel();
				break;
			case 15:
				return $this->getCodarecel();
				break;
			case 16:
				return $this->getCodarefax();
				break;
			case 17:
				return $this->getCorele();
				break;
			case 18:
				return $this->getSexrepben();
				break;
			case 19:
				return $this->getParloccas();
				break;
			case 20:
				return $this->getCcperpreId();
				break;
			case 21:
				return $this->getCcbenefiId();
				break;
			case 22:
				return $this->getCcparroqId();
				break;
			case 23:
				return $this->getCcparentId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrepbenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomrepben(),
			$keys[2] => $this->getCedrifben(),
			$keys[3] => $this->getFecnac(),
			$keys[4] => $this->getOcupa(),
			$keys[5] => $this->getDirnomurb(),
			$keys[6] => $this->getDirnumcal(),
			$keys[7] => $this->getDirnumcasedi(),
			$keys[8] => $this->getDirnumpis(),
			$keys[9] => $this->getDirnumapt(),
			$keys[10] => $this->getDirpunref(),
			$keys[11] => $this->getNumtel(),
			$keys[12] => $this->getNumcel(),
			$keys[13] => $this->getNumfax(),
			$keys[14] => $this->getCodaretel(),
			$keys[15] => $this->getCodarecel(),
			$keys[16] => $this->getCodarefax(),
			$keys[17] => $this->getCorele(),
			$keys[18] => $this->getSexrepben(),
			$keys[19] => $this->getParloccas(),
			$keys[20] => $this->getCcperpreId(),
			$keys[21] => $this->getCcbenefiId(),
			$keys[22] => $this->getCcparroqId(),
			$keys[23] => $this->getCcparentId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcrepbenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomrepben($value);
				break;
			case 2:
				$this->setCedrifben($value);
				break;
			case 3:
				$this->setFecnac($value);
				break;
			case 4:
				$this->setOcupa($value);
				break;
			case 5:
				$this->setDirnomurb($value);
				break;
			case 6:
				$this->setDirnumcal($value);
				break;
			case 7:
				$this->setDirnumcasedi($value);
				break;
			case 8:
				$this->setDirnumpis($value);
				break;
			case 9:
				$this->setDirnumapt($value);
				break;
			case 10:
				$this->setDirpunref($value);
				break;
			case 11:
				$this->setNumtel($value);
				break;
			case 12:
				$this->setNumcel($value);
				break;
			case 13:
				$this->setNumfax($value);
				break;
			case 14:
				$this->setCodaretel($value);
				break;
			case 15:
				$this->setCodarecel($value);
				break;
			case 16:
				$this->setCodarefax($value);
				break;
			case 17:
				$this->setCorele($value);
				break;
			case 18:
				$this->setSexrepben($value);
				break;
			case 19:
				$this->setParloccas($value);
				break;
			case 20:
				$this->setCcperpreId($value);
				break;
			case 21:
				$this->setCcbenefiId($value);
				break;
			case 22:
				$this->setCcparroqId($value);
				break;
			case 23:
				$this->setCcparentId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcrepbenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomrepben($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedrifben($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecnac($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOcupa($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDirnomurb($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDirnumcal($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDirnumcasedi($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDirnumpis($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDirnumapt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirpunref($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setNumtel($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumcel($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNumfax($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodaretel($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCodarecel($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodarefax($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCorele($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setSexrepben($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setParloccas($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCcperpreId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCcbenefiId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCcparroqId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCcparentId($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcrepbenPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcrepbenPeer::ID)) $criteria->add(CcrepbenPeer::ID, $this->id);
		if ($this->isColumnModified(CcrepbenPeer::NOMREPBEN)) $criteria->add(CcrepbenPeer::NOMREPBEN, $this->nomrepben);
		if ($this->isColumnModified(CcrepbenPeer::CEDRIFBEN)) $criteria->add(CcrepbenPeer::CEDRIFBEN, $this->cedrifben);
		if ($this->isColumnModified(CcrepbenPeer::FECNAC)) $criteria->add(CcrepbenPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(CcrepbenPeer::OCUPA)) $criteria->add(CcrepbenPeer::OCUPA, $this->ocupa);
		if ($this->isColumnModified(CcrepbenPeer::DIRNOMURB)) $criteria->add(CcrepbenPeer::DIRNOMURB, $this->dirnomurb);
		if ($this->isColumnModified(CcrepbenPeer::DIRNUMCAL)) $criteria->add(CcrepbenPeer::DIRNUMCAL, $this->dirnumcal);
		if ($this->isColumnModified(CcrepbenPeer::DIRNUMCASEDI)) $criteria->add(CcrepbenPeer::DIRNUMCASEDI, $this->dirnumcasedi);
		if ($this->isColumnModified(CcrepbenPeer::DIRNUMPIS)) $criteria->add(CcrepbenPeer::DIRNUMPIS, $this->dirnumpis);
		if ($this->isColumnModified(CcrepbenPeer::DIRNUMAPT)) $criteria->add(CcrepbenPeer::DIRNUMAPT, $this->dirnumapt);
		if ($this->isColumnModified(CcrepbenPeer::DIRPUNREF)) $criteria->add(CcrepbenPeer::DIRPUNREF, $this->dirpunref);
		if ($this->isColumnModified(CcrepbenPeer::NUMTEL)) $criteria->add(CcrepbenPeer::NUMTEL, $this->numtel);
		if ($this->isColumnModified(CcrepbenPeer::NUMCEL)) $criteria->add(CcrepbenPeer::NUMCEL, $this->numcel);
		if ($this->isColumnModified(CcrepbenPeer::NUMFAX)) $criteria->add(CcrepbenPeer::NUMFAX, $this->numfax);
		if ($this->isColumnModified(CcrepbenPeer::CODARETEL)) $criteria->add(CcrepbenPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcrepbenPeer::CODARECEL)) $criteria->add(CcrepbenPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcrepbenPeer::CODAREFAX)) $criteria->add(CcrepbenPeer::CODAREFAX, $this->codarefax);
		if ($this->isColumnModified(CcrepbenPeer::CORELE)) $criteria->add(CcrepbenPeer::CORELE, $this->corele);
		if ($this->isColumnModified(CcrepbenPeer::SEXREPBEN)) $criteria->add(CcrepbenPeer::SEXREPBEN, $this->sexrepben);
		if ($this->isColumnModified(CcrepbenPeer::PARLOCCAS)) $criteria->add(CcrepbenPeer::PARLOCCAS, $this->parloccas);
		if ($this->isColumnModified(CcrepbenPeer::CCPERPRE_ID)) $criteria->add(CcrepbenPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcrepbenPeer::CCBENEFI_ID)) $criteria->add(CcrepbenPeer::CCBENEFI_ID, $this->ccbenefi_id);
		if ($this->isColumnModified(CcrepbenPeer::CCPARROQ_ID)) $criteria->add(CcrepbenPeer::CCPARROQ_ID, $this->ccparroq_id);
		if ($this->isColumnModified(CcrepbenPeer::CCPARENT_ID)) $criteria->add(CcrepbenPeer::CCPARENT_ID, $this->ccparent_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcrepbenPeer::DATABASE_NAME);

		$criteria->add(CcrepbenPeer::ID, $this->id);

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

		$copyObj->setNomrepben($this->nomrepben);

		$copyObj->setCedrifben($this->cedrifben);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setOcupa($this->ocupa);

		$copyObj->setDirnomurb($this->dirnomurb);

		$copyObj->setDirnumcal($this->dirnumcal);

		$copyObj->setDirnumcasedi($this->dirnumcasedi);

		$copyObj->setDirnumpis($this->dirnumpis);

		$copyObj->setDirnumapt($this->dirnumapt);

		$copyObj->setDirpunref($this->dirpunref);

		$copyObj->setNumtel($this->numtel);

		$copyObj->setNumcel($this->numcel);

		$copyObj->setNumfax($this->numfax);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setCodarefax($this->codarefax);

		$copyObj->setCorele($this->corele);

		$copyObj->setSexrepben($this->sexrepben);

		$copyObj->setParloccas($this->parloccas);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCcbenefiId($this->ccbenefi_id);

		$copyObj->setCcparroqId($this->ccparroq_id);

		$copyObj->setCcparentId($this->ccparent_id);


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
			self::$peer = new CcrepbenPeer();
		}
		return self::$peer;
	}

	
	public function setCcperpre($v)
	{


		if ($v === null) {
			$this->setCcperpreId(NULL);
		} else {
			$this->setCcperpreId($v->getId());
		}


		$this->aCcperpre = $v;
	}


	
	public function getCcperpre($con = null)
	{
		if ($this->aCcperpre === null && ($this->ccperpre_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcperprePeer.php';

      $c = new Criteria();
      $c->add(CcperprePeer::ID,$this->ccperpre_id);
      
			$this->aCcperpre = CcperprePeer::doSelectOne($c, $con);

			
		}
		return $this->aCcperpre;
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

	
	public function setCcparroq($v)
	{


		if ($v === null) {
			$this->setCcparroqId(NULL);
		} else {
			$this->setCcparroqId($v->getId());
		}


		$this->aCcparroq = $v;
	}


	
	public function getCcparroq($con = null)
	{
		if ($this->aCcparroq === null && ($this->ccparroq_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparroqPeer.php';

      $c = new Criteria();
      $c->add(CcparroqPeer::ID,$this->ccparroq_id);
      
			$this->aCcparroq = CcparroqPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparroq;
	}

	
	public function setCcparent($v)
	{


		if ($v === null) {
			$this->setCcparentId(NULL);
		} else {
			$this->setCcparentId($v->getId());
		}


		$this->aCcparent = $v;
	}


	
	public function getCcparent($con = null)
	{
		if ($this->aCcparent === null && ($this->ccparent_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcparentPeer.php';

      $c = new Criteria();
      $c->add(CcparentPeer::ID,$this->ccparent_id);
      
			$this->aCcparent = CcparentPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcparent;
	}

} 