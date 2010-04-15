<?php


abstract class BaseDfatendocdet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id_dfatendoc;


	
	protected $id_usuario;


	
	protected $desate;


	
	protected $fecrec;


	
	protected $fecate;


	
	protected $id_acunidad_ori;


	
	protected $id_acunidad_des;


	
	protected $id_dfrutadoc;


	
	protected $id_dfmedtra;


	
	protected $diaent;


	
	protected $totdia;


	
	protected $id;

	
	protected $aDfatendoc;

	
	protected $aAcunidadRelatedByIdAcunidadOri;

	
	protected $aAcunidadRelatedByIdAcunidadDes;

	
	protected $aDfrutadoc;

	
	protected $aDfmedtra;

	
	protected $collDfatendocobss;

	
	protected $lastDfatendocobsCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getIdDfatendoc()
  {

    return $this->id_dfatendoc;

  }
  
  public function getIdUsuario()
  {

    return $this->id_usuario;

  }
  
  public function getDesate()
  {

    return trim($this->desate);

  }
  
  public function getFecrec($format = 'Y-m-d H:i:s')
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

  
  public function getFecate($format = 'Y-m-d H:i:s')
  {

    if ($this->fecate === null || $this->fecate === '') {
      return null;
    } elseif (!is_int($this->fecate)) {
            $ts = adodb_strtotime($this->fecate);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecate] as date/time value: " . var_export($this->fecate, true));
      }
    } else {
      $ts = $this->fecate;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getIdAcunidadOri()
  {

    return $this->id_acunidad_ori;

  }
  
  public function getIdAcunidadDes()
  {

    return $this->id_acunidad_des;

  }
  
  public function getIdDfrutadoc()
  {

    return $this->id_dfrutadoc;

  }
  
  public function getIdDfmedtra()
  {

    return trim($this->id_dfmedtra);

  }
  
  public function getDiaent()
  {

    return $this->diaent;

  }
  
  public function getTotdia()
  {

    return $this->totdia;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setIdDfatendoc($v)
	{

    if ($this->id_dfatendoc !== $v) {
        $this->id_dfatendoc = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID_DFATENDOC;
      }
  
		if ($this->aDfatendoc !== null && $this->aDfatendoc->getId() !== $v) {
			$this->aDfatendoc = null;
		}

	} 
	
	public function setIdUsuario($v)
	{

    if ($this->id_usuario !== $v) {
        $this->id_usuario = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID_USUARIO;
      }
  
	} 
	
	public function setDesate($v)
	{

    if ($this->desate !== $v) {
        $this->desate = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::DESATE;
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
      $this->modifiedColumns[] = DfatendocdetPeer::FECREC;
    }

	} 
	
	public function setFecate($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecate] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecate !== $ts) {
      $this->fecate = $ts;
      $this->modifiedColumns[] = DfatendocdetPeer::FECATE;
    }

	} 
	
	public function setIdAcunidadOri($v)
	{

    if ($this->id_acunidad_ori !== $v) {
        $this->id_acunidad_ori = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID_ACUNIDAD_ORI;
      }
  
		if ($this->aAcunidadRelatedByIdAcunidadOri !== null && $this->aAcunidadRelatedByIdAcunidadOri->getId() !== $v) {
			$this->aAcunidadRelatedByIdAcunidadOri = null;
		}

	} 
	
	public function setIdAcunidadDes($v)
	{

    if ($this->id_acunidad_des !== $v) {
        $this->id_acunidad_des = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID_ACUNIDAD_DES;
      }
  
		if ($this->aAcunidadRelatedByIdAcunidadDes !== null && $this->aAcunidadRelatedByIdAcunidadDes->getId() !== $v) {
			$this->aAcunidadRelatedByIdAcunidadDes = null;
		}

	} 
	
	public function setIdDfrutadoc($v)
	{

    if ($this->id_dfrutadoc !== $v) {
        $this->id_dfrutadoc = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID_DFRUTADOC;
      }
  
		if ($this->aDfrutadoc !== null && $this->aDfrutadoc->getId() !== $v) {
			$this->aDfrutadoc = null;
		}

	} 
	
	public function setIdDfmedtra($v)
	{

    if ($this->id_dfmedtra !== $v) {
        $this->id_dfmedtra = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID_DFMEDTRA;
      }
  
		if ($this->aDfmedtra !== null && $this->aDfmedtra->getId() !== $v) {
			$this->aDfmedtra = null;
		}

	} 
	
	public function setDiaent($v)
	{

    if ($this->diaent !== $v) {
        $this->diaent = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::DIAENT;
      }
  
	} 
	
	public function setTotdia($v)
	{

    if ($this->totdia !== $v) {
        $this->totdia = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::TOTDIA;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = DfatendocdetPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id_dfatendoc = $rs->getInt($startcol + 0);

      $this->id_usuario = $rs->getInt($startcol + 1);

      $this->desate = $rs->getString($startcol + 2);

      $this->fecrec = $rs->getTimestamp($startcol + 3, null);

      $this->fecate = $rs->getTimestamp($startcol + 4, null);

      $this->id_acunidad_ori = $rs->getInt($startcol + 5);

      $this->id_acunidad_des = $rs->getInt($startcol + 6);

      $this->id_dfrutadoc = $rs->getInt($startcol + 7);

      $this->id_dfmedtra = $rs->getString($startcol + 8);

      $this->diaent = $rs->getInt($startcol + 9);

      $this->totdia = $rs->getInt($startcol + 10);

      $this->id = $rs->getInt($startcol + 11);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 12; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Dfatendocdet object", $e);
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
			$con = Propel::getConnection(DfatendocdetPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DfatendocdetPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DfatendocdetPeer::DATABASE_NAME);
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


												
			if ($this->aDfatendoc !== null) {
				if ($this->aDfatendoc->isModified()) {
					$affectedRows += $this->aDfatendoc->save($con);
				}
				$this->setDfatendoc($this->aDfatendoc);
			}

			if ($this->aTableError !== null) {
				if ($this->aTableError->isModified()) {
					$affectedRows += $this->aTableError->save($con);
				}
				$this->setTableError($this->aTableError);
			}

			if ($this->aAcunidadRelatedByIdAcunidadOri !== null) {
				if ($this->aAcunidadRelatedByIdAcunidadOri->isModified()) {
					$affectedRows += $this->aAcunidadRelatedByIdAcunidadOri->save($con);
				}
				$this->setAcunidadRelatedByIdAcunidadOri($this->aAcunidadRelatedByIdAcunidadOri);
			}

			if ($this->aAcunidadRelatedByIdAcunidadDes !== null) {
				if ($this->aAcunidadRelatedByIdAcunidadDes->isModified()) {
					$affectedRows += $this->aAcunidadRelatedByIdAcunidadDes->save($con);
				}
				$this->setAcunidadRelatedByIdAcunidadDes($this->aAcunidadRelatedByIdAcunidadDes);
			}

			if ($this->aDfrutadoc !== null) {
				if ($this->aDfrutadoc->isModified()) {
					$affectedRows += $this->aDfrutadoc->save($con);
				}
				$this->setDfrutadoc($this->aDfrutadoc);
			}

			if ($this->aDfmedtra !== null) {
				if ($this->aDfmedtra->isModified()) {
					$affectedRows += $this->aDfmedtra->save($con);
				}
				$this->setDfmedtra($this->aDfmedtra);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DfatendocdetPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DfatendocdetPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDfatendocobss !== null) {
				foreach($this->collDfatendocobss as $referrerFK) {
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


												
			if ($this->aDfatendoc !== null) {
				if (!$this->aDfatendoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDfatendoc->getValidationFailures());
				}
			}

			if ($this->aTableError !== null) {
				if (!$this->aTableError->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTableError->getValidationFailures());
				}
			}

			if ($this->aAcunidadRelatedByIdAcunidadOri !== null) {
				if (!$this->aAcunidadRelatedByIdAcunidadOri->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAcunidadRelatedByIdAcunidadOri->getValidationFailures());
				}
			}

			if ($this->aAcunidadRelatedByIdAcunidadDes !== null) {
				if (!$this->aAcunidadRelatedByIdAcunidadDes->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAcunidadRelatedByIdAcunidadDes->getValidationFailures());
				}
			}

			if ($this->aDfrutadoc !== null) {
				if (!$this->aDfrutadoc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDfrutadoc->getValidationFailures());
				}
			}

			if ($this->aDfmedtra !== null) {
				if (!$this->aDfmedtra->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDfmedtra->getValidationFailures());
				}
			}


			if (($retval = DfatendocdetPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDfatendocobss !== null) {
					foreach($this->collDfatendocobss as $referrerFK) {
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
		$pos = DfatendocdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdDfatendoc();
				break;
			case 1:
				return $this->getIdUsuario();
				break;
			case 2:
				return $this->getDesate();
				break;
			case 3:
				return $this->getFecrec();
				break;
			case 4:
				return $this->getFecate();
				break;
			case 5:
				return $this->getIdAcunidadOri();
				break;
			case 6:
				return $this->getIdAcunidadDes();
				break;
			case 7:
				return $this->getIdDfrutadoc();
				break;
			case 8:
				return $this->getIdDfmedtra();
				break;
			case 9:
				return $this->getDiaent();
				break;
			case 10:
				return $this->getTotdia();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocdetPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdDfatendoc(),
			$keys[1] => $this->getIdUsuario(),
			$keys[2] => $this->getDesate(),
			$keys[3] => $this->getFecrec(),
			$keys[4] => $this->getFecate(),
			$keys[5] => $this->getIdAcunidadOri(),
			$keys[6] => $this->getIdAcunidadDes(),
			$keys[7] => $this->getIdDfrutadoc(),
			$keys[8] => $this->getIdDfmedtra(),
			$keys[9] => $this->getDiaent(),
			$keys[10] => $this->getTotdia(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DfatendocdetPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdDfatendoc($value);
				break;
			case 1:
				$this->setIdUsuario($value);
				break;
			case 2:
				$this->setDesate($value);
				break;
			case 3:
				$this->setFecrec($value);
				break;
			case 4:
				$this->setFecate($value);
				break;
			case 5:
				$this->setIdAcunidadOri($value);
				break;
			case 6:
				$this->setIdAcunidadDes($value);
				break;
			case 7:
				$this->setIdDfrutadoc($value);
				break;
			case 8:
				$this->setIdDfmedtra($value);
				break;
			case 9:
				$this->setDiaent($value);
				break;
			case 10:
				$this->setTotdia($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DfatendocdetPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdDfatendoc($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdUsuario($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDesate($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecrec($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecate($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIdAcunidadOri($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIdAcunidadDes($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIdDfrutadoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIdDfmedtra($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDiaent($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTotdia($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DfatendocdetPeer::DATABASE_NAME);

		if ($this->isColumnModified(DfatendocdetPeer::ID_DFATENDOC)) $criteria->add(DfatendocdetPeer::ID_DFATENDOC, $this->id_dfatendoc);
		if ($this->isColumnModified(DfatendocdetPeer::ID_USUARIO)) $criteria->add(DfatendocdetPeer::ID_USUARIO, $this->id_usuario);
		if ($this->isColumnModified(DfatendocdetPeer::DESATE)) $criteria->add(DfatendocdetPeer::DESATE, $this->desate);
		if ($this->isColumnModified(DfatendocdetPeer::FECREC)) $criteria->add(DfatendocdetPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(DfatendocdetPeer::FECATE)) $criteria->add(DfatendocdetPeer::FECATE, $this->fecate);
		if ($this->isColumnModified(DfatendocdetPeer::ID_ACUNIDAD_ORI)) $criteria->add(DfatendocdetPeer::ID_ACUNIDAD_ORI, $this->id_acunidad_ori);
		if ($this->isColumnModified(DfatendocdetPeer::ID_ACUNIDAD_DES)) $criteria->add(DfatendocdetPeer::ID_ACUNIDAD_DES, $this->id_acunidad_des);
		if ($this->isColumnModified(DfatendocdetPeer::ID_DFRUTADOC)) $criteria->add(DfatendocdetPeer::ID_DFRUTADOC, $this->id_dfrutadoc);
		if ($this->isColumnModified(DfatendocdetPeer::ID_DFMEDTRA)) $criteria->add(DfatendocdetPeer::ID_DFMEDTRA, $this->id_dfmedtra);
		if ($this->isColumnModified(DfatendocdetPeer::DIAENT)) $criteria->add(DfatendocdetPeer::DIAENT, $this->diaent);
		if ($this->isColumnModified(DfatendocdetPeer::TOTDIA)) $criteria->add(DfatendocdetPeer::TOTDIA, $this->totdia);
		if ($this->isColumnModified(DfatendocdetPeer::ID)) $criteria->add(DfatendocdetPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DfatendocdetPeer::DATABASE_NAME);

		$criteria->add(DfatendocdetPeer::ID, $this->id);

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

		$copyObj->setIdDfatendoc($this->id_dfatendoc);

		$copyObj->setIdUsuario($this->id_usuario);

		$copyObj->setDesate($this->desate);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setFecate($this->fecate);

		$copyObj->setIdAcunidadOri($this->id_acunidad_ori);

		$copyObj->setIdAcunidadDes($this->id_acunidad_des);

		$copyObj->setIdDfrutadoc($this->id_dfrutadoc);

		$copyObj->setIdDfmedtra($this->id_dfmedtra);

		$copyObj->setDiaent($this->diaent);

		$copyObj->setTotdia($this->totdia);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDfatendocobss() as $relObj) {
				$copyObj->addDfatendocobs($relObj->copy($deepCopy));
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
			self::$peer = new DfatendocdetPeer();
		}
		return self::$peer;
	}

	
	public function setDfatendoc($v)
	{


		if ($v === null) {
			$this->setIdDfatendoc(NULL);
		} else {
			$this->setIdDfatendoc($v->getId());
		}


		$this->aDfatendoc = $v;
	}


	
	public function getDfatendoc($con = null)
	{
		if ($this->aDfatendoc === null && ($this->id_dfatendoc !== null)) {
						include_once 'lib/model/documentos/om/BaseDfatendocPeer.php';

			$this->aDfatendoc = DfatendocPeer::retrieveByPK($this->id_dfatendoc, $con);

			
		}
		return $this->aDfatendoc;
	}

	
	public function setAcunidadRelatedByIdAcunidadOri($v)
	{


		if ($v === null) {
			$this->setIdAcunidadOri(NULL);
		} else {
			$this->setIdAcunidadOri($v->getId());
		}


		$this->aAcunidadRelatedByIdAcunidadOri = $v;
	}


	
	public function getAcunidadRelatedByIdAcunidadOri($con = null)
	{
		if ($this->aAcunidadRelatedByIdAcunidadOri === null && ($this->id_acunidad_ori !== null)) {
						include_once 'lib/model/om/BaseAcunidadPeer.php';

			$this->aAcunidadRelatedByIdAcunidadOri = AcunidadPeer::retrieveByPK($this->id_acunidad_ori, $con);

			
		}
		return $this->aAcunidadRelatedByIdAcunidadOri;
	}

	
	public function setAcunidadRelatedByIdAcunidadDes($v)
	{


		if ($v === null) {
			$this->setIdAcunidadDes(NULL);
		} else {
			$this->setIdAcunidadDes($v->getId());
		}


		$this->aAcunidadRelatedByIdAcunidadDes = $v;
	}


	
	public function getAcunidadRelatedByIdAcunidadDes($con = null)
	{
		if ($this->aAcunidadRelatedByIdAcunidadDes === null && ($this->id_acunidad_des !== null)) {
						include_once 'lib/model/om/BaseAcunidadPeer.php';

			$this->aAcunidadRelatedByIdAcunidadDes = AcunidadPeer::retrieveByPK($this->id_acunidad_des, $con);

			
		}
		return $this->aAcunidadRelatedByIdAcunidadDes;
	}

	
	public function setDfrutadoc($v)
	{


		if ($v === null) {
			$this->setIdDfrutadoc(NULL);
		} else {
			$this->setIdDfrutadoc($v->getId());
		}


		$this->aDfrutadoc = $v;
	}


	
	public function getDfrutadoc($con = null)
	{
		if ($this->aDfrutadoc === null && ($this->id_dfrutadoc !== null)) {
						include_once 'lib/model/documentos/om/BaseDfrutadocPeer.php';

			$this->aDfrutadoc = DfrutadocPeer::retrieveByPK($this->id_dfrutadoc, $con);

			
		}
		return $this->aDfrutadoc;
	}

	
	public function setDfmedtra($v)
	{


		if ($v === null) {
			$this->setIdDfmedtra(NULL);
		} else {
			$this->setIdDfmedtra($v->getId());
		}


		$this->aDfmedtra = $v;
	}


	
	public function getDfmedtra($con = null)
	{
		if ($this->aDfmedtra === null && (($this->id_dfmedtra !== "" && $this->id_dfmedtra !== null))) {
						include_once 'lib/model/documentos/om/BaseDfmedtraPeer.php';

			$this->aDfmedtra = DfmedtraPeer::retrieveByPK($this->id_dfmedtra, $con);

			
		}
		return $this->aDfmedtra;
	}

	
	public function initDfatendocobss()
	{
		if ($this->collDfatendocobss === null) {
			$this->collDfatendocobss = array();
		}
	}

	
	public function getDfatendocobss($criteria = null, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocobsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDfatendocobss === null) {
			if ($this->isNew()) {
			   $this->collDfatendocobss = array();
			} else {

				$criteria->add(DfatendocobsPeer::ID_DFATENDOCDET, $this->getId());

				DfatendocobsPeer::addSelectColumns($criteria);
				$this->collDfatendocobss = DfatendocobsPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DfatendocobsPeer::ID_DFATENDOCDET, $this->getId());

				DfatendocobsPeer::addSelectColumns($criteria);
				if (!isset($this->lastDfatendocobsCriteria) || !$this->lastDfatendocobsCriteria->equals($criteria)) {
					$this->collDfatendocobss = DfatendocobsPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDfatendocobsCriteria = $criteria;
		return $this->collDfatendocobss;
	}

	
	public function countDfatendocobss($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/documentos/om/BaseDfatendocobsPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DfatendocobsPeer::ID_DFATENDOCDET, $this->getId());

		return DfatendocobsPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDfatendocobs(Dfatendocobs $l)
	{
		$this->collDfatendocobss[] = $l;
		$l->setDfatendocdet($this);
	}

} 