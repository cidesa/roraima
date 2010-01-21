<?php


abstract class BaseCcavalis extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nomava;


	
	protected $cedava;


	
	protected $corava;


	
	protected $codaretel;


	
	protected $numtelloc;


	
	protected $codarecel;


	
	protected $numcel;


	
	protected $codareotro;


	
	protected $numotrtel;


	
	protected $dirnomurb;


	
	protected $dirnumcal;


	
	protected $dirnumcasedif;


	
	protected $dirnumpis;


	
	protected $dirpunref;


	
	protected $dirnumapt;


	
	protected $ccperpre_id;


	
	protected $ccgarant_id;

	
	protected $aCcperpre;

	
	protected $aCcgarant;

	
	protected $collCcavagarcres;

	
	protected $lastCcavagarcreCriteria = null;

	
	protected $collCcavagarsols;

	
	protected $lastCcavagarsolCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNomava()
  {

    return trim($this->nomava);

  }
  
  public function getCedava()
  {

    return trim($this->cedava);

  }
  
  public function getCorava()
  {

    return trim($this->corava);

  }
  
  public function getCodaretel()
  {

    return trim($this->codaretel);

  }
  
  public function getNumtelloc()
  {

    return trim($this->numtelloc);

  }
  
  public function getCodarecel()
  {

    return trim($this->codarecel);

  }
  
  public function getNumcel()
  {

    return trim($this->numcel);

  }
  
  public function getCodareotro()
  {

    return trim($this->codareotro);

  }
  
  public function getNumotrtel()
  {

    return trim($this->numotrtel);

  }
  
  public function getDirnomurb()
  {

    return trim($this->dirnomurb);

  }
  
  public function getDirnumcal()
  {

    return trim($this->dirnumcal);

  }
  
  public function getDirnumcasedif()
  {

    return trim($this->dirnumcasedif);

  }
  
  public function getDirnumpis()
  {

    return trim($this->dirnumpis);

  }
  
  public function getDirpunref()
  {

    return trim($this->dirpunref);

  }
  
  public function getDirnumapt()
  {

    return trim($this->dirnumapt);

  }
  
  public function getCcperpreId()
  {

    return $this->ccperpre_id;

  }
  
  public function getCcgarantId()
  {

    return $this->ccgarant_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcavalisPeer::ID;
      }
  
	} 
	
	public function setNomava($v)
	{

    if ($this->nomava !== $v) {
        $this->nomava = $v;
        $this->modifiedColumns[] = CcavalisPeer::NOMAVA;
      }
  
	} 
	
	public function setCedava($v)
	{

    if ($this->cedava !== $v) {
        $this->cedava = $v;
        $this->modifiedColumns[] = CcavalisPeer::CEDAVA;
      }
  
	} 
	
	public function setCorava($v)
	{

    if ($this->corava !== $v) {
        $this->corava = $v;
        $this->modifiedColumns[] = CcavalisPeer::CORAVA;
      }
  
	} 
	
	public function setCodaretel($v)
	{

    if ($this->codaretel !== $v) {
        $this->codaretel = $v;
        $this->modifiedColumns[] = CcavalisPeer::CODARETEL;
      }
  
	} 
	
	public function setNumtelloc($v)
	{

    if ($this->numtelloc !== $v) {
        $this->numtelloc = $v;
        $this->modifiedColumns[] = CcavalisPeer::NUMTELLOC;
      }
  
	} 
	
	public function setCodarecel($v)
	{

    if ($this->codarecel !== $v) {
        $this->codarecel = $v;
        $this->modifiedColumns[] = CcavalisPeer::CODARECEL;
      }
  
	} 
	
	public function setNumcel($v)
	{

    if ($this->numcel !== $v) {
        $this->numcel = $v;
        $this->modifiedColumns[] = CcavalisPeer::NUMCEL;
      }
  
	} 
	
	public function setCodareotro($v)
	{

    if ($this->codareotro !== $v) {
        $this->codareotro = $v;
        $this->modifiedColumns[] = CcavalisPeer::CODAREOTRO;
      }
  
	} 
	
	public function setNumotrtel($v)
	{

    if ($this->numotrtel !== $v) {
        $this->numotrtel = $v;
        $this->modifiedColumns[] = CcavalisPeer::NUMOTRTEL;
      }
  
	} 
	
	public function setDirnomurb($v)
	{

    if ($this->dirnomurb !== $v) {
        $this->dirnomurb = $v;
        $this->modifiedColumns[] = CcavalisPeer::DIRNOMURB;
      }
  
	} 
	
	public function setDirnumcal($v)
	{

    if ($this->dirnumcal !== $v) {
        $this->dirnumcal = $v;
        $this->modifiedColumns[] = CcavalisPeer::DIRNUMCAL;
      }
  
	} 
	
	public function setDirnumcasedif($v)
	{

    if ($this->dirnumcasedif !== $v) {
        $this->dirnumcasedif = $v;
        $this->modifiedColumns[] = CcavalisPeer::DIRNUMCASEDIF;
      }
  
	} 
	
	public function setDirnumpis($v)
	{

    if ($this->dirnumpis !== $v) {
        $this->dirnumpis = $v;
        $this->modifiedColumns[] = CcavalisPeer::DIRNUMPIS;
      }
  
	} 
	
	public function setDirpunref($v)
	{

    if ($this->dirpunref !== $v) {
        $this->dirpunref = $v;
        $this->modifiedColumns[] = CcavalisPeer::DIRPUNREF;
      }
  
	} 
	
	public function setDirnumapt($v)
	{

    if ($this->dirnumapt !== $v) {
        $this->dirnumapt = $v;
        $this->modifiedColumns[] = CcavalisPeer::DIRNUMAPT;
      }
  
	} 
	
	public function setCcperpreId($v)
	{

    if ($this->ccperpre_id !== $v) {
        $this->ccperpre_id = $v;
        $this->modifiedColumns[] = CcavalisPeer::CCPERPRE_ID;
      }
  
		if ($this->aCcperpre !== null && $this->aCcperpre->getId() !== $v) {
			$this->aCcperpre = null;
		}

	} 
	
	public function setCcgarantId($v)
	{

    if ($this->ccgarant_id !== $v) {
        $this->ccgarant_id = $v;
        $this->modifiedColumns[] = CcavalisPeer::CCGARANT_ID;
      }
  
		if ($this->aCcgarant !== null && $this->aCcgarant->getId() !== $v) {
			$this->aCcgarant = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nomava = $rs->getString($startcol + 1);

      $this->cedava = $rs->getString($startcol + 2);

      $this->corava = $rs->getString($startcol + 3);

      $this->codaretel = $rs->getString($startcol + 4);

      $this->numtelloc = $rs->getString($startcol + 5);

      $this->codarecel = $rs->getString($startcol + 6);

      $this->numcel = $rs->getString($startcol + 7);

      $this->codareotro = $rs->getString($startcol + 8);

      $this->numotrtel = $rs->getString($startcol + 9);

      $this->dirnomurb = $rs->getString($startcol + 10);

      $this->dirnumcal = $rs->getString($startcol + 11);

      $this->dirnumcasedif = $rs->getString($startcol + 12);

      $this->dirnumpis = $rs->getString($startcol + 13);

      $this->dirpunref = $rs->getString($startcol + 14);

      $this->dirnumapt = $rs->getString($startcol + 15);

      $this->ccperpre_id = $rs->getInt($startcol + 16);

      $this->ccgarant_id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccavalis object", $e);
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
			$con = Propel::getConnection(CcavalisPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcavalisPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcavalisPeer::DATABASE_NAME);
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

			if ($this->aCcgarant !== null) {
				if ($this->aCcgarant->isModified()) {
					$affectedRows += $this->aCcgarant->save($con);
				}
				$this->setCcgarant($this->aCcgarant);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcavalisPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcavalisPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcavagarcres !== null) {
				foreach($this->collCcavagarcres as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcavagarsols !== null) {
				foreach($this->collCcavagarsols as $referrerFK) {
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


												
			if ($this->aCcperpre !== null) {
				if (!$this->aCcperpre->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcperpre->getValidationFailures());
				}
			}

			if ($this->aCcgarant !== null) {
				if (!$this->aCcgarant->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgarant->getValidationFailures());
				}
			}


			if (($retval = CcavalisPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcavagarcres !== null) {
					foreach($this->collCcavagarcres as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcavagarsols !== null) {
					foreach($this->collCcavagarsols as $referrerFK) {
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
		$pos = CcavalisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNomava();
				break;
			case 2:
				return $this->getCedava();
				break;
			case 3:
				return $this->getCorava();
				break;
			case 4:
				return $this->getCodaretel();
				break;
			case 5:
				return $this->getNumtelloc();
				break;
			case 6:
				return $this->getCodarecel();
				break;
			case 7:
				return $this->getNumcel();
				break;
			case 8:
				return $this->getCodareotro();
				break;
			case 9:
				return $this->getNumotrtel();
				break;
			case 10:
				return $this->getDirnomurb();
				break;
			case 11:
				return $this->getDirnumcal();
				break;
			case 12:
				return $this->getDirnumcasedif();
				break;
			case 13:
				return $this->getDirnumpis();
				break;
			case 14:
				return $this->getDirpunref();
				break;
			case 15:
				return $this->getDirnumapt();
				break;
			case 16:
				return $this->getCcperpreId();
				break;
			case 17:
				return $this->getCcgarantId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcavalisPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNomava(),
			$keys[2] => $this->getCedava(),
			$keys[3] => $this->getCorava(),
			$keys[4] => $this->getCodaretel(),
			$keys[5] => $this->getNumtelloc(),
			$keys[6] => $this->getCodarecel(),
			$keys[7] => $this->getNumcel(),
			$keys[8] => $this->getCodareotro(),
			$keys[9] => $this->getNumotrtel(),
			$keys[10] => $this->getDirnomurb(),
			$keys[11] => $this->getDirnumcal(),
			$keys[12] => $this->getDirnumcasedif(),
			$keys[13] => $this->getDirnumpis(),
			$keys[14] => $this->getDirpunref(),
			$keys[15] => $this->getDirnumapt(),
			$keys[16] => $this->getCcperpreId(),
			$keys[17] => $this->getCcgarantId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcavalisPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNomava($value);
				break;
			case 2:
				$this->setCedava($value);
				break;
			case 3:
				$this->setCorava($value);
				break;
			case 4:
				$this->setCodaretel($value);
				break;
			case 5:
				$this->setNumtelloc($value);
				break;
			case 6:
				$this->setCodarecel($value);
				break;
			case 7:
				$this->setNumcel($value);
				break;
			case 8:
				$this->setCodareotro($value);
				break;
			case 9:
				$this->setNumotrtel($value);
				break;
			case 10:
				$this->setDirnomurb($value);
				break;
			case 11:
				$this->setDirnumcal($value);
				break;
			case 12:
				$this->setDirnumcasedif($value);
				break;
			case 13:
				$this->setDirnumpis($value);
				break;
			case 14:
				$this->setDirpunref($value);
				break;
			case 15:
				$this->setDirnumapt($value);
				break;
			case 16:
				$this->setCcperpreId($value);
				break;
			case 17:
				$this->setCcgarantId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcavalisPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomava($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCedava($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCorava($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodaretel($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNumtelloc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodarecel($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNumcel($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCodareotro($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumotrtel($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDirnomurb($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDirnumcal($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDirnumcasedif($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDirnumpis($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDirpunref($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDirnumapt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCcperpreId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCcgarantId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcavalisPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcavalisPeer::ID)) $criteria->add(CcavalisPeer::ID, $this->id);
		if ($this->isColumnModified(CcavalisPeer::NOMAVA)) $criteria->add(CcavalisPeer::NOMAVA, $this->nomava);
		if ($this->isColumnModified(CcavalisPeer::CEDAVA)) $criteria->add(CcavalisPeer::CEDAVA, $this->cedava);
		if ($this->isColumnModified(CcavalisPeer::CORAVA)) $criteria->add(CcavalisPeer::CORAVA, $this->corava);
		if ($this->isColumnModified(CcavalisPeer::CODARETEL)) $criteria->add(CcavalisPeer::CODARETEL, $this->codaretel);
		if ($this->isColumnModified(CcavalisPeer::NUMTELLOC)) $criteria->add(CcavalisPeer::NUMTELLOC, $this->numtelloc);
		if ($this->isColumnModified(CcavalisPeer::CODARECEL)) $criteria->add(CcavalisPeer::CODARECEL, $this->codarecel);
		if ($this->isColumnModified(CcavalisPeer::NUMCEL)) $criteria->add(CcavalisPeer::NUMCEL, $this->numcel);
		if ($this->isColumnModified(CcavalisPeer::CODAREOTRO)) $criteria->add(CcavalisPeer::CODAREOTRO, $this->codareotro);
		if ($this->isColumnModified(CcavalisPeer::NUMOTRTEL)) $criteria->add(CcavalisPeer::NUMOTRTEL, $this->numotrtel);
		if ($this->isColumnModified(CcavalisPeer::DIRNOMURB)) $criteria->add(CcavalisPeer::DIRNOMURB, $this->dirnomurb);
		if ($this->isColumnModified(CcavalisPeer::DIRNUMCAL)) $criteria->add(CcavalisPeer::DIRNUMCAL, $this->dirnumcal);
		if ($this->isColumnModified(CcavalisPeer::DIRNUMCASEDIF)) $criteria->add(CcavalisPeer::DIRNUMCASEDIF, $this->dirnumcasedif);
		if ($this->isColumnModified(CcavalisPeer::DIRNUMPIS)) $criteria->add(CcavalisPeer::DIRNUMPIS, $this->dirnumpis);
		if ($this->isColumnModified(CcavalisPeer::DIRPUNREF)) $criteria->add(CcavalisPeer::DIRPUNREF, $this->dirpunref);
		if ($this->isColumnModified(CcavalisPeer::DIRNUMAPT)) $criteria->add(CcavalisPeer::DIRNUMAPT, $this->dirnumapt);
		if ($this->isColumnModified(CcavalisPeer::CCPERPRE_ID)) $criteria->add(CcavalisPeer::CCPERPRE_ID, $this->ccperpre_id);
		if ($this->isColumnModified(CcavalisPeer::CCGARANT_ID)) $criteria->add(CcavalisPeer::CCGARANT_ID, $this->ccgarant_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcavalisPeer::DATABASE_NAME);

		$criteria->add(CcavalisPeer::ID, $this->id);

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

		$copyObj->setNomava($this->nomava);

		$copyObj->setCedava($this->cedava);

		$copyObj->setCorava($this->corava);

		$copyObj->setCodaretel($this->codaretel);

		$copyObj->setNumtelloc($this->numtelloc);

		$copyObj->setCodarecel($this->codarecel);

		$copyObj->setNumcel($this->numcel);

		$copyObj->setCodareotro($this->codareotro);

		$copyObj->setNumotrtel($this->numotrtel);

		$copyObj->setDirnomurb($this->dirnomurb);

		$copyObj->setDirnumcal($this->dirnumcal);

		$copyObj->setDirnumcasedif($this->dirnumcasedif);

		$copyObj->setDirnumpis($this->dirnumpis);

		$copyObj->setDirpunref($this->dirpunref);

		$copyObj->setDirnumapt($this->dirnumapt);

		$copyObj->setCcperpreId($this->ccperpre_id);

		$copyObj->setCcgarantId($this->ccgarant_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcavagarcres() as $relObj) {
				$copyObj->addCcavagarcre($relObj->copy($deepCopy));
			}

			foreach($this->getCcavagarsols() as $relObj) {
				$copyObj->addCcavagarsol($relObj->copy($deepCopy));
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
			self::$peer = new CcavalisPeer();
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

	
	public function setCcgarant($v)
	{


		if ($v === null) {
			$this->setCcgarantId(NULL);
		} else {
			$this->setCcgarantId($v->getId());
		}


		$this->aCcgarant = $v;
	}


	
	public function getCcgarant($con = null)
	{
		if ($this->aCcgarant === null && ($this->ccgarant_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgarantPeer.php';

      $c = new Criteria();
      $c->add(CcgarantPeer::ID,$this->ccgarant_id);
      
			$this->aCcgarant = CcgarantPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgarant;
	}

	
	public function initCcavagarcres()
	{
		if ($this->collCcavagarcres === null) {
			$this->collCcavagarcres = array();
		}
	}

	
	public function getCcavagarcres($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavagarcres === null) {
			if ($this->isNew()) {
			   $this->collCcavagarcres = array();
			} else {

				$criteria->add(CcavagarcrePeer::CCAVALIS_ID, $this->getId());

				CcavagarcrePeer::addSelectColumns($criteria);
				$this->collCcavagarcres = CcavagarcrePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcavagarcrePeer::CCAVALIS_ID, $this->getId());

				CcavagarcrePeer::addSelectColumns($criteria);
				if (!isset($this->lastCcavagarcreCriteria) || !$this->lastCcavagarcreCriteria->equals($criteria)) {
					$this->collCcavagarcres = CcavagarcrePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcavagarcreCriteria = $criteria;
		return $this->collCcavagarcres;
	}

	
	public function countCcavagarcres($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcavagarcrePeer::CCAVALIS_ID, $this->getId());

		return CcavagarcrePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcavagarcre(Ccavagarcre $l)
	{
		$this->collCcavagarcres[] = $l;
		$l->setCcavalis($this);
	}


	
	public function getCcavagarcresJoinCcgarant($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarcrePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavagarcres === null) {
			if ($this->isNew()) {
				$this->collCcavagarcres = array();
			} else {

				$criteria->add(CcavagarcrePeer::CCAVALIS_ID, $this->getId());

				$this->collCcavagarcres = CcavagarcrePeer::doSelectJoinCcgarant($criteria, $con);
			}
		} else {
									
			$criteria->add(CcavagarcrePeer::CCAVALIS_ID, $this->getId());

			if (!isset($this->lastCcavagarcreCriteria) || !$this->lastCcavagarcreCriteria->equals($criteria)) {
				$this->collCcavagarcres = CcavagarcrePeer::doSelectJoinCcgarant($criteria, $con);
			}
		}
		$this->lastCcavagarcreCriteria = $criteria;

		return $this->collCcavagarcres;
	}

	
	public function initCcavagarsols()
	{
		if ($this->collCcavagarsols === null) {
			$this->collCcavagarsols = array();
		}
	}

	
	public function getCcavagarsols($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavagarsols === null) {
			if ($this->isNew()) {
			   $this->collCcavagarsols = array();
			} else {

				$criteria->add(CcavagarsolPeer::CCAVALIS_ID, $this->getId());

				CcavagarsolPeer::addSelectColumns($criteria);
				$this->collCcavagarsols = CcavagarsolPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcavagarsolPeer::CCAVALIS_ID, $this->getId());

				CcavagarsolPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcavagarsolCriteria) || !$this->lastCcavagarsolCriteria->equals($criteria)) {
					$this->collCcavagarsols = CcavagarsolPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcavagarsolCriteria = $criteria;
		return $this->collCcavagarsols;
	}

	
	public function countCcavagarsols($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcavagarsolPeer::CCAVALIS_ID, $this->getId());

		return CcavagarsolPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcavagarsol(Ccavagarsol $l)
	{
		$this->collCcavagarsols[] = $l;
		$l->setCcavalis($this);
	}


	
	public function getCcavagarsolsJoinCcgarsol($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcavagarsolPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcavagarsols === null) {
			if ($this->isNew()) {
				$this->collCcavagarsols = array();
			} else {

				$criteria->add(CcavagarsolPeer::CCAVALIS_ID, $this->getId());

				$this->collCcavagarsols = CcavagarsolPeer::doSelectJoinCcgarsol($criteria, $con);
			}
		} else {
									
			$criteria->add(CcavagarsolPeer::CCAVALIS_ID, $this->getId());

			if (!isset($this->lastCcavagarsolCriteria) || !$this->lastCcavagarsolCriteria->equals($criteria)) {
				$this->collCcavagarsols = CcavagarsolPeer::doSelectJoinCcgarsol($criteria, $con);
			}
		}
		$this->lastCcavagarsolCriteria = $criteria;

		return $this->collCcavagarsols;
	}

} 