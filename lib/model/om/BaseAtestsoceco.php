<?php


abstract class BaseAtestsoceco extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $atciudadano_id;


	
	protected $attipviv_id;


	
	protected $attipproviv_id;


	
	protected $carvivsal;


	
	protected $carvivcom;


	
	protected $carvivhab;


	
	protected $carvivcoc;


	
	protected $carvivban;


	
	protected $carvivpat;


	
	protected $carvivarever;


	
	protected $carvivpis;


	
	protected $carvivpar;


	
	protected $carvivtec;


	
	protected $anasoceco;


	
	protected $anafam;


	
	protected $otros;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $aAtciudadano;

	
	protected $aAttipviv;

	
	protected $aAttipproviv;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getAtciudadanoId()
  {

    return $this->atciudadano_id;

  }
  
  public function getAttipvivId()
  {

    return $this->attipviv_id;

  }
  
  public function getAttipprovivId()
  {

    return $this->attipproviv_id;

  }
  
  public function getCarvivsal()
  {

    return $this->carvivsal;

  }
  
  public function getCarvivcom()
  {

    return $this->carvivcom;

  }
  
  public function getCarvivhab()
  {

    return $this->carvivhab;

  }
  
  public function getCarvivcoc()
  {

    return $this->carvivcoc;

  }
  
  public function getCarvivban()
  {

    return $this->carvivban;

  }
  
  public function getCarvivpat()
  {

    return $this->carvivpat;

  }
  
  public function getCarvivarever()
  {

    return $this->carvivarever;

  }
  
  public function getCarvivpis()
  {

    return $this->carvivpis;

  }
  
  public function getCarvivpar()
  {

    return $this->carvivpar;

  }
  
  public function getCarvivtec()
  {

    return $this->carvivtec;

  }
  
  public function getAnasoceco()
  {

    return trim($this->anasoceco);

  }
  
  public function getAnafam()
  {

    return trim($this->anafam);

  }
  
  public function getOtros()
  {

    return trim($this->otros);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setAtciudadanoId($v)
	{

    if ($this->atciudadano_id !== $v) {
        $this->atciudadano_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATCIUDADANO_ID;
      }
  
		if ($this->aAtciudadano !== null && $this->aAtciudadano->getId() !== $v) {
			$this->aAtciudadano = null;
		}

	} 
	
	public function setAttipvivId($v)
	{

    if ($this->attipviv_id !== $v) {
        $this->attipviv_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATTIPVIV_ID;
      }
  
		if ($this->aAttipviv !== null && $this->aAttipviv->getId() !== $v) {
			$this->aAttipviv = null;
		}

	} 
	
	public function setAttipprovivId($v)
	{

    if ($this->attipproviv_id !== $v) {
        $this->attipproviv_id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ATTIPPROVIV_ID;
      }
  
		if ($this->aAttipproviv !== null && $this->aAttipproviv->getId() !== $v) {
			$this->aAttipproviv = null;
		}

	} 
	
	public function setCarvivsal($v)
	{

    if ($this->carvivsal !== $v) {
        $this->carvivsal = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVSAL;
      }
  
	} 
	
	public function setCarvivcom($v)
	{

    if ($this->carvivcom !== $v) {
        $this->carvivcom = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVCOM;
      }
  
	} 
	
	public function setCarvivhab($v)
	{

    if ($this->carvivhab !== $v) {
        $this->carvivhab = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVHAB;
      }
  
	} 
	
	public function setCarvivcoc($v)
	{

    if ($this->carvivcoc !== $v) {
        $this->carvivcoc = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVCOC;
      }
  
	} 
	
	public function setCarvivban($v)
	{

    if ($this->carvivban !== $v) {
        $this->carvivban = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVBAN;
      }
  
	} 
	
	public function setCarvivpat($v)
	{

    if ($this->carvivpat !== $v) {
        $this->carvivpat = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVPAT;
      }
  
	} 
	
	public function setCarvivarever($v)
	{

    if ($this->carvivarever !== $v) {
        $this->carvivarever = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVAREVER;
      }
  
	} 
	
	public function setCarvivpis($v)
	{

    if ($this->carvivpis !== $v) {
        $this->carvivpis = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVPIS;
      }
  
	} 
	
	public function setCarvivpar($v)
	{

    if ($this->carvivpar !== $v) {
        $this->carvivpar = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVPAR;
      }
  
	} 
	
	public function setCarvivtec($v)
	{

    if ($this->carvivtec !== $v) {
        $this->carvivtec = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::CARVIVTEC;
      }
  
	} 
	
	public function setAnasoceco($v)
	{

    if ($this->anasoceco !== $v) {
        $this->anasoceco = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ANASOCECO;
      }
  
	} 
	
	public function setAnafam($v)
	{

    if ($this->anafam !== $v) {
        $this->anafam = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ANAFAM;
      }
  
	} 
	
	public function setOtros($v)
	{

    if ($this->otros !== $v) {
        $this->otros = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::OTROS;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtestsocecoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->atciudadano_id = $rs->getInt($startcol + 1);

      $this->attipviv_id = $rs->getInt($startcol + 2);

      $this->attipproviv_id = $rs->getInt($startcol + 3);

      $this->carvivsal = $rs->getBoolean($startcol + 4);

      $this->carvivcom = $rs->getBoolean($startcol + 5);

      $this->carvivhab = $rs->getBoolean($startcol + 6);

      $this->carvivcoc = $rs->getBoolean($startcol + 7);

      $this->carvivban = $rs->getBoolean($startcol + 8);

      $this->carvivpat = $rs->getBoolean($startcol + 9);

      $this->carvivarever = $rs->getBoolean($startcol + 10);

      $this->carvivpis = $rs->getBoolean($startcol + 11);

      $this->carvivpar = $rs->getBoolean($startcol + 12);

      $this->carvivtec = $rs->getBoolean($startcol + 13);

      $this->anasoceco = $rs->getString($startcol + 14);

      $this->anafam = $rs->getString($startcol + 15);

      $this->otros = $rs->getString($startcol + 16);

      $this->id = $rs->getInt($startcol + 17);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 18; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atestsoceco object", $e);
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
			$con = Propel::getConnection(AtestsocecoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtestsocecoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtestsocecoPeer::DATABASE_NAME);
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


												
			if ($this->aAtayudas !== null) {
				if ($this->aAtayudas->isModified()) {
					$affectedRows += $this->aAtayudas->save($con);
				}
				$this->setAtayudas($this->aAtayudas);
			}

			if ($this->aAtciudadano !== null) {
				if ($this->aAtciudadano->isModified()) {
					$affectedRows += $this->aAtciudadano->save($con);
				}
				$this->setAtciudadano($this->aAtciudadano);
			}

			if ($this->aAttipviv !== null) {
				if ($this->aAttipviv->isModified()) {
					$affectedRows += $this->aAttipviv->save($con);
				}
				$this->setAttipviv($this->aAttipviv);
			}

			if ($this->aAttipproviv !== null) {
				if ($this->aAttipproviv->isModified()) {
					$affectedRows += $this->aAttipproviv->save($con);
				}
				$this->setAttipproviv($this->aAttipproviv);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtestsocecoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtestsocecoPeer::doUpdate($this, $con);
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


												
			if ($this->aAtayudas !== null) {
				if (!$this->aAtayudas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtayudas->getValidationFailures());
				}
			}

			if ($this->aAtciudadano !== null) {
				if (!$this->aAtciudadano->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtciudadano->getValidationFailures());
				}
			}

			if ($this->aAttipviv !== null) {
				if (!$this->aAttipviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipviv->getValidationFailures());
				}
			}

			if ($this->aAttipproviv !== null) {
				if (!$this->aAttipproviv->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAttipproviv->getValidationFailures());
				}
			}


			if (($retval = AtestsocecoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtestsocecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getAtciudadanoId();
				break;
			case 2:
				return $this->getAttipvivId();
				break;
			case 3:
				return $this->getAttipprovivId();
				break;
			case 4:
				return $this->getCarvivsal();
				break;
			case 5:
				return $this->getCarvivcom();
				break;
			case 6:
				return $this->getCarvivhab();
				break;
			case 7:
				return $this->getCarvivcoc();
				break;
			case 8:
				return $this->getCarvivban();
				break;
			case 9:
				return $this->getCarvivpat();
				break;
			case 10:
				return $this->getCarvivarever();
				break;
			case 11:
				return $this->getCarvivpis();
				break;
			case 12:
				return $this->getCarvivpar();
				break;
			case 13:
				return $this->getCarvivtec();
				break;
			case 14:
				return $this->getAnasoceco();
				break;
			case 15:
				return $this->getAnafam();
				break;
			case 16:
				return $this->getOtros();
				break;
			case 17:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestsocecoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getAtciudadanoId(),
			$keys[2] => $this->getAttipvivId(),
			$keys[3] => $this->getAttipprovivId(),
			$keys[4] => $this->getCarvivsal(),
			$keys[5] => $this->getCarvivcom(),
			$keys[6] => $this->getCarvivhab(),
			$keys[7] => $this->getCarvivcoc(),
			$keys[8] => $this->getCarvivban(),
			$keys[9] => $this->getCarvivpat(),
			$keys[10] => $this->getCarvivarever(),
			$keys[11] => $this->getCarvivpis(),
			$keys[12] => $this->getCarvivpar(),
			$keys[13] => $this->getCarvivtec(),
			$keys[14] => $this->getAnasoceco(),
			$keys[15] => $this->getAnafam(),
			$keys[16] => $this->getOtros(),
			$keys[17] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtestsocecoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setAtciudadanoId($value);
				break;
			case 2:
				$this->setAttipvivId($value);
				break;
			case 3:
				$this->setAttipprovivId($value);
				break;
			case 4:
				$this->setCarvivsal($value);
				break;
			case 5:
				$this->setCarvivcom($value);
				break;
			case 6:
				$this->setCarvivhab($value);
				break;
			case 7:
				$this->setCarvivcoc($value);
				break;
			case 8:
				$this->setCarvivban($value);
				break;
			case 9:
				$this->setCarvivpat($value);
				break;
			case 10:
				$this->setCarvivarever($value);
				break;
			case 11:
				$this->setCarvivpis($value);
				break;
			case 12:
				$this->setCarvivpar($value);
				break;
			case 13:
				$this->setCarvivtec($value);
				break;
			case 14:
				$this->setAnasoceco($value);
				break;
			case 15:
				$this->setAnafam($value);
				break;
			case 16:
				$this->setOtros($value);
				break;
			case 17:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtestsocecoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtciudadanoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAttipvivId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAttipprovivId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCarvivsal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCarvivcom($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCarvivhab($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCarvivcoc($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCarvivban($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCarvivpat($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCarvivarever($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCarvivpis($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCarvivpar($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCarvivtec($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAnasoceco($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAnafam($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setOtros($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setId($arr[$keys[17]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtestsocecoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtestsocecoPeer::ATAYUDAS_ID)) $criteria->add(AtestsocecoPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtestsocecoPeer::ATCIUDADANO_ID)) $criteria->add(AtestsocecoPeer::ATCIUDADANO_ID, $this->atciudadano_id);
		if ($this->isColumnModified(AtestsocecoPeer::ATTIPVIV_ID)) $criteria->add(AtestsocecoPeer::ATTIPVIV_ID, $this->attipviv_id);
		if ($this->isColumnModified(AtestsocecoPeer::ATTIPPROVIV_ID)) $criteria->add(AtestsocecoPeer::ATTIPPROVIV_ID, $this->attipproviv_id);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVSAL)) $criteria->add(AtestsocecoPeer::CARVIVSAL, $this->carvivsal);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVCOM)) $criteria->add(AtestsocecoPeer::CARVIVCOM, $this->carvivcom);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVHAB)) $criteria->add(AtestsocecoPeer::CARVIVHAB, $this->carvivhab);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVCOC)) $criteria->add(AtestsocecoPeer::CARVIVCOC, $this->carvivcoc);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVBAN)) $criteria->add(AtestsocecoPeer::CARVIVBAN, $this->carvivban);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVPAT)) $criteria->add(AtestsocecoPeer::CARVIVPAT, $this->carvivpat);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVAREVER)) $criteria->add(AtestsocecoPeer::CARVIVAREVER, $this->carvivarever);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVPIS)) $criteria->add(AtestsocecoPeer::CARVIVPIS, $this->carvivpis);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVPAR)) $criteria->add(AtestsocecoPeer::CARVIVPAR, $this->carvivpar);
		if ($this->isColumnModified(AtestsocecoPeer::CARVIVTEC)) $criteria->add(AtestsocecoPeer::CARVIVTEC, $this->carvivtec);
		if ($this->isColumnModified(AtestsocecoPeer::ANASOCECO)) $criteria->add(AtestsocecoPeer::ANASOCECO, $this->anasoceco);
		if ($this->isColumnModified(AtestsocecoPeer::ANAFAM)) $criteria->add(AtestsocecoPeer::ANAFAM, $this->anafam);
		if ($this->isColumnModified(AtestsocecoPeer::OTROS)) $criteria->add(AtestsocecoPeer::OTROS, $this->otros);
		if ($this->isColumnModified(AtestsocecoPeer::ID)) $criteria->add(AtestsocecoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtestsocecoPeer::DATABASE_NAME);

		$criteria->add(AtestsocecoPeer::ID, $this->id);

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

		$copyObj->setAtayudasId($this->atayudas_id);

		$copyObj->setAtciudadanoId($this->atciudadano_id);

		$copyObj->setAttipvivId($this->attipviv_id);

		$copyObj->setAttipprovivId($this->attipproviv_id);

		$copyObj->setCarvivsal($this->carvivsal);

		$copyObj->setCarvivcom($this->carvivcom);

		$copyObj->setCarvivhab($this->carvivhab);

		$copyObj->setCarvivcoc($this->carvivcoc);

		$copyObj->setCarvivban($this->carvivban);

		$copyObj->setCarvivpat($this->carvivpat);

		$copyObj->setCarvivarever($this->carvivarever);

		$copyObj->setCarvivpis($this->carvivpis);

		$copyObj->setCarvivpar($this->carvivpar);

		$copyObj->setCarvivtec($this->carvivtec);

		$copyObj->setAnasoceco($this->anasoceco);

		$copyObj->setAnafam($this->anafam);

		$copyObj->setOtros($this->otros);


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
			self::$peer = new AtestsocecoPeer();
		}
		return self::$peer;
	}

	
	public function setAtayudas($v)
	{


		if ($v === null) {
			$this->setAtayudasId(NULL);
		} else {
			$this->setAtayudasId($v->getId());
		}


		$this->aAtayudas = $v;
	}


	
	public function getAtayudas($con = null)
	{
		if ($this->aAtayudas === null && ($this->atayudas_id !== null)) {
						include_once 'lib/model/om/BaseAtayudasPeer.php';

			$this->aAtayudas = AtayudasPeer::retrieveByPK($this->atayudas_id, $con);

			
		}
		return $this->aAtayudas;
	}

	
	public function setAtciudadano($v)
	{


		if ($v === null) {
			$this->setAtciudadanoId(NULL);
		} else {
			$this->setAtciudadanoId($v->getId());
		}


		$this->aAtciudadano = $v;
	}


	
	public function getAtciudadano($con = null)
	{
		if ($this->aAtciudadano === null && ($this->atciudadano_id !== null)) {
						include_once 'lib/model/om/BaseAtciudadanoPeer.php';

			$this->aAtciudadano = AtciudadanoPeer::retrieveByPK($this->atciudadano_id, $con);

			
		}
		return $this->aAtciudadano;
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
						include_once 'lib/model/om/BaseAttipvivPeer.php';

			$this->aAttipviv = AttipvivPeer::retrieveByPK($this->attipviv_id, $con);

			
		}
		return $this->aAttipviv;
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
						include_once 'lib/model/om/BaseAttipprovivPeer.php';

			$this->aAttipproviv = AttipprovivPeer::retrieveByPK($this->attipproviv_id, $con);

			
		}
		return $this->aAttipproviv;
	}

} 