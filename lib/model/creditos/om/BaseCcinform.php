<?php


abstract class BaseCcinform extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $titulo;


	
	protected $conten;


	
	protected $fecrec;


	
	protected $fecent;


	
	protected $feccul;


	
	protected $puntuacion;


	
	protected $ccgerenc_id;


	
	protected $ccanalis_id;


	
	protected $ccclainf_id;


	
	protected $ccsolici_id;


	
	protected $ccresbar_id;

	
	protected $aCcgerencRelatedByCcgerencId;

	
	protected $aCcanalis;

	
	protected $aCcclainf;

	
	protected $aCcsolici;

	
	protected $aCcgerencRelatedByCcresbarId;

	
	protected $collCcbarinfs;

	
	protected $lastCcbarinfCriteria = null;

	
	protected $collCcrevisis;

	
	protected $lastCcrevisiCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getTitulo()
  {

    return trim($this->titulo);

  }
  
  public function getConten()
  {

    return trim($this->conten);

  }
  
  public function getFecrec($format = 'Y-m-d')
  {

    if ($this->fecrec === null || $this->fecrec === '') {
      return null;
    } elseif (!is_int($this->fecrec)) {
            $ts = adodb_strtotime($this->fecrec);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
      }
    } else {
      $ts = $this->fecrec;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFecent($format = 'Y-m-d')
  {

    if ($this->fecent === null || $this->fecent === '') {
      return null;
    } elseif (!is_int($this->fecent)) {
            $ts = adodb_strtotime($this->fecent);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecent] as date/time value: " . var_export($this->fecent, true));
      }
    } else {
      $ts = $this->fecent;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getFeccul($format = 'Y-m-d')
  {

    if ($this->feccul === null || $this->feccul === '') {
      return null;
    } elseif (!is_int($this->feccul)) {
            $ts = adodb_strtotime($this->feccul);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [feccul] as date/time value: " . var_export($this->feccul, true));
      }
    } else {
      $ts = $this->feccul;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getPuntuacion($val=false)
  {

    if($val) return number_format($this->puntuacion,2,',','.');
    else return $this->puntuacion;

  }
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
  
  public function getCcanalisId()
  {

    return $this->ccanalis_id;

  }
  
  public function getCcclainfId()
  {

    return $this->ccclainf_id;

  }
  
  public function getCcsoliciId()
  {

    return $this->ccsolici_id;

  }
  
  public function getCcresbarId()
  {

    return $this->ccresbar_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcinformPeer::ID;
      }
  
	} 
	
	public function setTitulo($v)
	{

    if ($this->titulo !== $v) {
        $this->titulo = $v;
        $this->modifiedColumns[] = CcinformPeer::TITULO;
      }
  
	} 
	
	public function setConten($v)
	{

    if ($this->conten !== $v) {
        $this->conten = $v;
        $this->modifiedColumns[] = CcinformPeer::CONTEN;
      }
  
	} 
	
	public function setFecrec($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecrec !== $ts) {
      $this->fecrec = $ts;
      $this->modifiedColumns[] = CcinformPeer::FECREC;
    }

	} 
	
	public function setFecent($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecent] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecent !== $ts) {
      $this->fecent = $ts;
      $this->modifiedColumns[] = CcinformPeer::FECENT;
    }

	} 
	
	public function setFeccul($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [feccul] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->feccul !== $ts) {
      $this->feccul = $ts;
      $this->modifiedColumns[] = CcinformPeer::FECCUL;
    }

	} 
	
	public function setPuntuacion($v)
	{

    if ($this->puntuacion !== $v) {
        $this->puntuacion = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcinformPeer::PUNTUACION;
      }
  
	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcinformPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerencRelatedByCcgerencId !== null && $this->aCcgerencRelatedByCcgerencId->getId() !== $v) {
			$this->aCcgerencRelatedByCcgerencId = null;
		}

	} 
	
	public function setCcanalisId($v)
	{

    if ($this->ccanalis_id !== $v) {
        $this->ccanalis_id = $v;
        $this->modifiedColumns[] = CcinformPeer::CCANALIS_ID;
      }
  
		if ($this->aCcanalis !== null && $this->aCcanalis->getId() !== $v) {
			$this->aCcanalis = null;
		}

	} 
	
	public function setCcclainfId($v)
	{

    if ($this->ccclainf_id !== $v) {
        $this->ccclainf_id = $v;
        $this->modifiedColumns[] = CcinformPeer::CCCLAINF_ID;
      }
  
		if ($this->aCcclainf !== null && $this->aCcclainf->getId() !== $v) {
			$this->aCcclainf = null;
		}

	} 
	
	public function setCcsoliciId($v)
	{

    if ($this->ccsolici_id !== $v) {
        $this->ccsolici_id = $v;
        $this->modifiedColumns[] = CcinformPeer::CCSOLICI_ID;
      }
  
		if ($this->aCcsolici !== null && $this->aCcsolici->getId() !== $v) {
			$this->aCcsolici = null;
		}

	} 
	
	public function setCcresbarId($v)
	{

    if ($this->ccresbar_id !== $v) {
        $this->ccresbar_id = $v;
        $this->modifiedColumns[] = CcinformPeer::CCRESBAR_ID;
      }
  
		if ($this->aCcgerencRelatedByCcresbarId !== null && $this->aCcgerencRelatedByCcresbarId->getId() !== $v) {
			$this->aCcgerencRelatedByCcresbarId = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->titulo = $rs->getString($startcol + 1);

      $this->conten = $rs->getString($startcol + 2);

      $this->fecrec = $rs->getDate($startcol + 3, null);

      $this->fecent = $rs->getDate($startcol + 4, null);

      $this->feccul = $rs->getDate($startcol + 5, null);

      $this->puntuacion = $rs->getFloat($startcol + 6);

      $this->ccgerenc_id = $rs->getInt($startcol + 7);

      $this->ccanalis_id = $rs->getInt($startcol + 8);

      $this->ccclainf_id = $rs->getInt($startcol + 9);

      $this->ccsolici_id = $rs->getInt($startcol + 10);

      $this->ccresbar_id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccinform object", $e);
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
			$con = Propel::getConnection(CcinformPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcinformPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcinformPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerencRelatedByCcgerencId !== null) {
				if ($this->aCcgerencRelatedByCcgerencId->isModified()) {
					$affectedRows += $this->aCcgerencRelatedByCcgerencId->save($con);
				}
				$this->setCcgerencRelatedByCcgerencId($this->aCcgerencRelatedByCcgerencId);
			}

			if ($this->aCcanalis !== null) {
				if ($this->aCcanalis->isModified()) {
					$affectedRows += $this->aCcanalis->save($con);
				}
				$this->setCcanalis($this->aCcanalis);
			}

			if ($this->aCcclainf !== null) {
				if ($this->aCcclainf->isModified()) {
					$affectedRows += $this->aCcclainf->save($con);
				}
				$this->setCcclainf($this->aCcclainf);
			}

			if ($this->aCcsolici !== null) {
				if ($this->aCcsolici->isModified()) {
					$affectedRows += $this->aCcsolici->save($con);
				}
				$this->setCcsolici($this->aCcsolici);
			}

			if ($this->aCcgerencRelatedByCcresbarId !== null) {
				if ($this->aCcgerencRelatedByCcresbarId->isModified()) {
					$affectedRows += $this->aCcgerencRelatedByCcresbarId->save($con);
				}
				$this->setCcgerencRelatedByCcresbarId($this->aCcgerencRelatedByCcresbarId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcinformPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcinformPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collCcbarinfs !== null) {
				foreach($this->collCcbarinfs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcrevisis !== null) {
				foreach($this->collCcrevisis as $referrerFK) {
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


												
			if ($this->aCcgerencRelatedByCcgerencId !== null) {
				if (!$this->aCcgerencRelatedByCcgerencId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerencRelatedByCcgerencId->getValidationFailures());
				}
			}

			if ($this->aCcanalis !== null) {
				if (!$this->aCcanalis->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcanalis->getValidationFailures());
				}
			}

			if ($this->aCcclainf !== null) {
				if (!$this->aCcclainf->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcclainf->getValidationFailures());
				}
			}

			if ($this->aCcsolici !== null) {
				if (!$this->aCcsolici->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcsolici->getValidationFailures());
				}
			}

			if ($this->aCcgerencRelatedByCcresbarId !== null) {
				if (!$this->aCcgerencRelatedByCcresbarId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerencRelatedByCcresbarId->getValidationFailures());
				}
			}


			if (($retval = CcinformPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcbarinfs !== null) {
					foreach($this->collCcbarinfs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcrevisis !== null) {
					foreach($this->collCcrevisis as $referrerFK) {
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
		$pos = CcinformPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitulo();
				break;
			case 2:
				return $this->getConten();
				break;
			case 3:
				return $this->getFecrec();
				break;
			case 4:
				return $this->getFecent();
				break;
			case 5:
				return $this->getFeccul();
				break;
			case 6:
				return $this->getPuntuacion();
				break;
			case 7:
				return $this->getCcgerencId();
				break;
			case 8:
				return $this->getCcanalisId();
				break;
			case 9:
				return $this->getCcclainfId();
				break;
			case 10:
				return $this->getCcsoliciId();
				break;
			case 11:
				return $this->getCcresbarId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcinformPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitulo(),
			$keys[2] => $this->getConten(),
			$keys[3] => $this->getFecrec(),
			$keys[4] => $this->getFecent(),
			$keys[5] => $this->getFeccul(),
			$keys[6] => $this->getPuntuacion(),
			$keys[7] => $this->getCcgerencId(),
			$keys[8] => $this->getCcanalisId(),
			$keys[9] => $this->getCcclainfId(),
			$keys[10] => $this->getCcsoliciId(),
			$keys[11] => $this->getCcresbarId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcinformPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitulo($value);
				break;
			case 2:
				$this->setConten($value);
				break;
			case 3:
				$this->setFecrec($value);
				break;
			case 4:
				$this->setFecent($value);
				break;
			case 5:
				$this->setFeccul($value);
				break;
			case 6:
				$this->setPuntuacion($value);
				break;
			case 7:
				$this->setCcgerencId($value);
				break;
			case 8:
				$this->setCcanalisId($value);
				break;
			case 9:
				$this->setCcclainfId($value);
				break;
			case 10:
				$this->setCcsoliciId($value);
				break;
			case 11:
				$this->setCcresbarId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcinformPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitulo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setConten($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFeccul($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPuntuacion($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCcgerencId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCcanalisId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCcclainfId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCcsoliciId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCcresbarId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcinformPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcinformPeer::ID)) $criteria->add(CcinformPeer::ID, $this->id);
		if ($this->isColumnModified(CcinformPeer::TITULO)) $criteria->add(CcinformPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(CcinformPeer::CONTEN)) $criteria->add(CcinformPeer::CONTEN, $this->conten);
		if ($this->isColumnModified(CcinformPeer::FECREC)) $criteria->add(CcinformPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(CcinformPeer::FECENT)) $criteria->add(CcinformPeer::FECENT, $this->fecent);
		if ($this->isColumnModified(CcinformPeer::FECCUL)) $criteria->add(CcinformPeer::FECCUL, $this->feccul);
		if ($this->isColumnModified(CcinformPeer::PUNTUACION)) $criteria->add(CcinformPeer::PUNTUACION, $this->puntuacion);
		if ($this->isColumnModified(CcinformPeer::CCGERENC_ID)) $criteria->add(CcinformPeer::CCGERENC_ID, $this->ccgerenc_id);
		if ($this->isColumnModified(CcinformPeer::CCANALIS_ID)) $criteria->add(CcinformPeer::CCANALIS_ID, $this->ccanalis_id);
		if ($this->isColumnModified(CcinformPeer::CCCLAINF_ID)) $criteria->add(CcinformPeer::CCCLAINF_ID, $this->ccclainf_id);
		if ($this->isColumnModified(CcinformPeer::CCSOLICI_ID)) $criteria->add(CcinformPeer::CCSOLICI_ID, $this->ccsolici_id);
		if ($this->isColumnModified(CcinformPeer::CCRESBAR_ID)) $criteria->add(CcinformPeer::CCRESBAR_ID, $this->ccresbar_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcinformPeer::DATABASE_NAME);

		$criteria->add(CcinformPeer::ID, $this->id);

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

		$copyObj->setTitulo($this->titulo);

		$copyObj->setConten($this->conten);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setFecent($this->fecent);

		$copyObj->setFeccul($this->feccul);

		$copyObj->setPuntuacion($this->puntuacion);

		$copyObj->setCcgerencId($this->ccgerenc_id);

		$copyObj->setCcanalisId($this->ccanalis_id);

		$copyObj->setCcclainfId($this->ccclainf_id);

		$copyObj->setCcsoliciId($this->ccsolici_id);

		$copyObj->setCcresbarId($this->ccresbar_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getCcbarinfs() as $relObj) {
				$copyObj->addCcbarinf($relObj->copy($deepCopy));
			}

			foreach($this->getCcrevisis() as $relObj) {
				$copyObj->addCcrevisi($relObj->copy($deepCopy));
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
			self::$peer = new CcinformPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerencRelatedByCcgerencId($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerencRelatedByCcgerencId = $v;
	}


	
	public function getCcgerencRelatedByCcgerencId($con = null)
	{
		if ($this->aCcgerencRelatedByCcgerencId === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerencRelatedByCcgerencId = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerencRelatedByCcgerencId;
	}

	
	public function setCcanalis($v)
	{


		if ($v === null) {
			$this->setCcanalisId(NULL);
		} else {
			$this->setCcanalisId($v->getId());
		}


		$this->aCcanalis = $v;
	}


	
	public function getCcanalis($con = null)
	{
		if ($this->aCcanalis === null && ($this->ccanalis_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcanalisPeer.php';

      $c = new Criteria();
      $c->add(CcanalisPeer::ID,$this->ccanalis_id);
      
			$this->aCcanalis = CcanalisPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcanalis;
	}

	
	public function setCcclainf($v)
	{


		if ($v === null) {
			$this->setCcclainfId(NULL);
		} else {
			$this->setCcclainfId($v->getId());
		}


		$this->aCcclainf = $v;
	}


	
	public function getCcclainf($con = null)
	{
		if ($this->aCcclainf === null && ($this->ccclainf_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcclainfPeer.php';

      $c = new Criteria();
      $c->add(CcclainfPeer::ID,$this->ccclainf_id);
      
			$this->aCcclainf = CcclainfPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcclainf;
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

	
	public function setCcgerencRelatedByCcresbarId($v)
	{


		if ($v === null) {
			$this->setCcresbarId(NULL);
		} else {
			$this->setCcresbarId($v->getId());
		}


		$this->aCcgerencRelatedByCcresbarId = $v;
	}


	
	public function getCcgerencRelatedByCcresbarId($con = null)
	{
		if ($this->aCcgerencRelatedByCcresbarId === null && ($this->ccresbar_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccresbar_id);
      
			$this->aCcgerencRelatedByCcresbarId = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerencRelatedByCcresbarId;
	}

	
	public function initCcbarinfs()
	{
		if ($this->collCcbarinfs === null) {
			$this->collCcbarinfs = array();
		}
	}

	
	public function getCcbarinfs($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbarinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbarinfs === null) {
			if ($this->isNew()) {
			   $this->collCcbarinfs = array();
			} else {

				$criteria->add(CcbarinfPeer::CCINFORM_ID, $this->getId());

				CcbarinfPeer::addSelectColumns($criteria);
				$this->collCcbarinfs = CcbarinfPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcbarinfPeer::CCINFORM_ID, $this->getId());

				CcbarinfPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcbarinfCriteria) || !$this->lastCcbarinfCriteria->equals($criteria)) {
					$this->collCcbarinfs = CcbarinfPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcbarinfCriteria = $criteria;
		return $this->collCcbarinfs;
	}

	
	public function countCcbarinfs($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbarinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcbarinfPeer::CCINFORM_ID, $this->getId());

		return CcbarinfPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcbarinf(Ccbarinf $l)
	{
		$this->collCcbarinfs[] = $l;
		$l->setCcinform($this);
	}


	
	public function getCcbarinfsJoinCctitulo($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcbarinfPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcbarinfs === null) {
			if ($this->isNew()) {
				$this->collCcbarinfs = array();
			} else {

				$criteria->add(CcbarinfPeer::CCINFORM_ID, $this->getId());

				$this->collCcbarinfs = CcbarinfPeer::doSelectJoinCctitulo($criteria, $con);
			}
		} else {
									
			$criteria->add(CcbarinfPeer::CCINFORM_ID, $this->getId());

			if (!isset($this->lastCcbarinfCriteria) || !$this->lastCcbarinfCriteria->equals($criteria)) {
				$this->collCcbarinfs = CcbarinfPeer::doSelectJoinCctitulo($criteria, $con);
			}
		}
		$this->lastCcbarinfCriteria = $criteria;

		return $this->collCcbarinfs;
	}

	
	public function initCcrevisis()
	{
		if ($this->collCcrevisis === null) {
			$this->collCcrevisis = array();
		}
	}

	
	public function getCcrevisis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrevisiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrevisis === null) {
			if ($this->isNew()) {
			   $this->collCcrevisis = array();
			} else {

				$criteria->add(CcrevisiPeer::CCINFORM_ID, $this->getId());

				CcrevisiPeer::addSelectColumns($criteria);
				$this->collCcrevisis = CcrevisiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CcrevisiPeer::CCINFORM_ID, $this->getId());

				CcrevisiPeer::addSelectColumns($criteria);
				if (!isset($this->lastCcrevisiCriteria) || !$this->lastCcrevisiCriteria->equals($criteria)) {
					$this->collCcrevisis = CcrevisiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCcrevisiCriteria = $criteria;
		return $this->collCcrevisis;
	}

	
	public function countCcrevisis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrevisiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(CcrevisiPeer::CCINFORM_ID, $this->getId());

		return CcrevisiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addCcrevisi(Ccrevisi $l)
	{
		$this->collCcrevisis[] = $l;
		$l->setCcinform($this);
	}


	
	public function getCcrevisisJoinCcanalis($criteria = null, $con = null)
	{
				include_once 'lib/model/creditos/om/BaseCcrevisiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCcrevisis === null) {
			if ($this->isNew()) {
				$this->collCcrevisis = array();
			} else {

				$criteria->add(CcrevisiPeer::CCINFORM_ID, $this->getId());

				$this->collCcrevisis = CcrevisiPeer::doSelectJoinCcanalis($criteria, $con);
			}
		} else {
									
			$criteria->add(CcrevisiPeer::CCINFORM_ID, $this->getId());

			if (!isset($this->lastCcrevisiCriteria) || !$this->lastCcrevisiCriteria->equals($criteria)) {
				$this->collCcrevisis = CcrevisiPeer::doSelectJoinCcanalis($criteria, $con);
			}
		}
		$this->lastCcrevisiCriteria = $criteria;

		return $this->collCcrevisis;
	}

} 