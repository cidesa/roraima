<?php


abstract class BaseLidefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $diremp;


	
	protected $telemp;


	
	protected $faxemp;


	
	protected $emaemp;


	
	protected $unitri;


	
	protected $ptocta;


	
	protected $prebas;


	
	protected $expdie;


	
	protected $numemo;


	
	protected $solegr;


	
	protected $comint;


	
	protected $pliego;


	
	protected $aclara;


	
	protected $oferta;


	
	protected $anaofe;


	
	protected $recome;


	
	protected $ptocuecon;


	
	protected $notifi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

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
  
  public function getFaxemp()
  {

    return trim($this->faxemp);

  }
  
  public function getEmaemp()
  {

    return trim($this->emaemp);

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getPtocta()
  {

    return $this->ptocta;

  }
  
  public function getPrebas()
  {

    return $this->prebas;

  }
  
  public function getExpdie()
  {

    return $this->expdie;

  }
  
  public function getNumemo()
  {

    return $this->numemo;

  }
  
  public function getSolegr()
  {

    return $this->solegr;

  }
  
  public function getComint()
  {

    return $this->comint;

  }
  
  public function getPliego()
  {

    return $this->pliego;

  }
  
  public function getAclara()
  {

    return $this->aclara;

  }
  
  public function getOferta()
  {

    return $this->oferta;

  }
  
  public function getAnaofe()
  {

    return $this->anaofe;

  }
  
  public function getRecome()
  {

    return $this->recome;

  }
  
  public function getPtocuecon()
  {

    return $this->ptocuecon;

  }
  
  public function getNotifi()
  {

    return $this->notifi;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = LidefempPeer::CODEMP;
      }
  
	} 
	
	public function setNomemp($v)
	{

    if ($this->nomemp !== $v) {
        $this->nomemp = $v;
        $this->modifiedColumns[] = LidefempPeer::NOMEMP;
      }
  
	} 
	
	public function setDiremp($v)
	{

    if ($this->diremp !== $v) {
        $this->diremp = $v;
        $this->modifiedColumns[] = LidefempPeer::DIREMP;
      }
  
	} 
	
	public function setTelemp($v)
	{

    if ($this->telemp !== $v) {
        $this->telemp = $v;
        $this->modifiedColumns[] = LidefempPeer::TELEMP;
      }
  
	} 
	
	public function setFaxemp($v)
	{

    if ($this->faxemp !== $v) {
        $this->faxemp = $v;
        $this->modifiedColumns[] = LidefempPeer::FAXEMP;
      }
  
	} 
	
	public function setEmaemp($v)
	{

    if ($this->emaemp !== $v) {
        $this->emaemp = $v;
        $this->modifiedColumns[] = LidefempPeer::EMAEMP;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = LidefempPeer::UNITRI;
      }
  
	} 
	
	public function setPtocta($v)
	{

    if ($this->ptocta !== $v) {
        $this->ptocta = $v;
        $this->modifiedColumns[] = LidefempPeer::PTOCTA;
      }
  
	} 
	
	public function setPrebas($v)
	{

    if ($this->prebas !== $v) {
        $this->prebas = $v;
        $this->modifiedColumns[] = LidefempPeer::PREBAS;
      }
  
	} 
	
	public function setExpdie($v)
	{

    if ($this->expdie !== $v) {
        $this->expdie = $v;
        $this->modifiedColumns[] = LidefempPeer::EXPDIE;
      }
  
	} 
	
	public function setNumemo($v)
	{

    if ($this->numemo !== $v) {
        $this->numemo = $v;
        $this->modifiedColumns[] = LidefempPeer::NUMEMO;
      }
  
	} 
	
	public function setSolegr($v)
	{

    if ($this->solegr !== $v) {
        $this->solegr = $v;
        $this->modifiedColumns[] = LidefempPeer::SOLEGR;
      }
  
	} 
	
	public function setComint($v)
	{

    if ($this->comint !== $v) {
        $this->comint = $v;
        $this->modifiedColumns[] = LidefempPeer::COMINT;
      }
  
	} 
	
	public function setPliego($v)
	{

    if ($this->pliego !== $v) {
        $this->pliego = $v;
        $this->modifiedColumns[] = LidefempPeer::PLIEGO;
      }
  
	} 
	
	public function setAclara($v)
	{

    if ($this->aclara !== $v) {
        $this->aclara = $v;
        $this->modifiedColumns[] = LidefempPeer::ACLARA;
      }
  
	} 
	
	public function setOferta($v)
	{

    if ($this->oferta !== $v) {
        $this->oferta = $v;
        $this->modifiedColumns[] = LidefempPeer::OFERTA;
      }
  
	} 
	
	public function setAnaofe($v)
	{

    if ($this->anaofe !== $v) {
        $this->anaofe = $v;
        $this->modifiedColumns[] = LidefempPeer::ANAOFE;
      }
  
	} 
	
	public function setRecome($v)
	{

    if ($this->recome !== $v) {
        $this->recome = $v;
        $this->modifiedColumns[] = LidefempPeer::RECOME;
      }
  
	} 
	
	public function setPtocuecon($v)
	{

    if ($this->ptocuecon !== $v) {
        $this->ptocuecon = $v;
        $this->modifiedColumns[] = LidefempPeer::PTOCUECON;
      }
  
	} 
	
	public function setNotifi($v)
	{

    if ($this->notifi !== $v) {
        $this->notifi = $v;
        $this->modifiedColumns[] = LidefempPeer::NOTIFI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = LidefempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->nomemp = $rs->getString($startcol + 1);

      $this->diremp = $rs->getString($startcol + 2);

      $this->telemp = $rs->getString($startcol + 3);

      $this->faxemp = $rs->getString($startcol + 4);

      $this->emaemp = $rs->getString($startcol + 5);

      $this->unitri = $rs->getFloat($startcol + 6);

      $this->ptocta = $rs->getInt($startcol + 7);

      $this->prebas = $rs->getInt($startcol + 8);

      $this->expdie = $rs->getInt($startcol + 9);

      $this->numemo = $rs->getInt($startcol + 10);

      $this->solegr = $rs->getInt($startcol + 11);

      $this->comint = $rs->getInt($startcol + 12);

      $this->pliego = $rs->getInt($startcol + 13);

      $this->aclara = $rs->getInt($startcol + 14);

      $this->oferta = $rs->getInt($startcol + 15);

      $this->anaofe = $rs->getInt($startcol + 16);

      $this->recome = $rs->getInt($startcol + 17);

      $this->ptocuecon = $rs->getInt($startcol + 18);

      $this->notifi = $rs->getInt($startcol + 19);

      $this->id = $rs->getInt($startcol + 20);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 21; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Lidefemp object", $e);
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
			$con = Propel::getConnection(LidefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LidefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LidefempPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LidefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LidefempPeer::doUpdate($this, $con);
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


			if (($retval = LidefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getNomemp();
				break;
			case 2:
				return $this->getDiremp();
				break;
			case 3:
				return $this->getTelemp();
				break;
			case 4:
				return $this->getFaxemp();
				break;
			case 5:
				return $this->getEmaemp();
				break;
			case 6:
				return $this->getUnitri();
				break;
			case 7:
				return $this->getPtocta();
				break;
			case 8:
				return $this->getPrebas();
				break;
			case 9:
				return $this->getExpdie();
				break;
			case 10:
				return $this->getNumemo();
				break;
			case 11:
				return $this->getSolegr();
				break;
			case 12:
				return $this->getComint();
				break;
			case 13:
				return $this->getPliego();
				break;
			case 14:
				return $this->getAclara();
				break;
			case 15:
				return $this->getOferta();
				break;
			case 16:
				return $this->getAnaofe();
				break;
			case 17:
				return $this->getRecome();
				break;
			case 18:
				return $this->getPtocuecon();
				break;
			case 19:
				return $this->getNotifi();
				break;
			case 20:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getNomemp(),
			$keys[2] => $this->getDiremp(),
			$keys[3] => $this->getTelemp(),
			$keys[4] => $this->getFaxemp(),
			$keys[5] => $this->getEmaemp(),
			$keys[6] => $this->getUnitri(),
			$keys[7] => $this->getPtocta(),
			$keys[8] => $this->getPrebas(),
			$keys[9] => $this->getExpdie(),
			$keys[10] => $this->getNumemo(),
			$keys[11] => $this->getSolegr(),
			$keys[12] => $this->getComint(),
			$keys[13] => $this->getPliego(),
			$keys[14] => $this->getAclara(),
			$keys[15] => $this->getOferta(),
			$keys[16] => $this->getAnaofe(),
			$keys[17] => $this->getRecome(),
			$keys[18] => $this->getPtocuecon(),
			$keys[19] => $this->getNotifi(),
			$keys[20] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LidefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setNomemp($value);
				break;
			case 2:
				$this->setDiremp($value);
				break;
			case 3:
				$this->setTelemp($value);
				break;
			case 4:
				$this->setFaxemp($value);
				break;
			case 5:
				$this->setEmaemp($value);
				break;
			case 6:
				$this->setUnitri($value);
				break;
			case 7:
				$this->setPtocta($value);
				break;
			case 8:
				$this->setPrebas($value);
				break;
			case 9:
				$this->setExpdie($value);
				break;
			case 10:
				$this->setNumemo($value);
				break;
			case 11:
				$this->setSolegr($value);
				break;
			case 12:
				$this->setComint($value);
				break;
			case 13:
				$this->setPliego($value);
				break;
			case 14:
				$this->setAclara($value);
				break;
			case 15:
				$this->setOferta($value);
				break;
			case 16:
				$this->setAnaofe($value);
				break;
			case 17:
				$this->setRecome($value);
				break;
			case 18:
				$this->setPtocuecon($value);
				break;
			case 19:
				$this->setNotifi($value);
				break;
			case 20:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LidefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomemp($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDiremp($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTelemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaxemp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setEmaemp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnitri($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPtocta($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPrebas($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setExpdie($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumemo($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSolegr($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setComint($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPliego($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAclara($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setOferta($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setAnaofe($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setRecome($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setPtocuecon($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNotifi($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setId($arr[$keys[20]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LidefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(LidefempPeer::CODEMP)) $criteria->add(LidefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(LidefempPeer::NOMEMP)) $criteria->add(LidefempPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(LidefempPeer::DIREMP)) $criteria->add(LidefempPeer::DIREMP, $this->diremp);
		if ($this->isColumnModified(LidefempPeer::TELEMP)) $criteria->add(LidefempPeer::TELEMP, $this->telemp);
		if ($this->isColumnModified(LidefempPeer::FAXEMP)) $criteria->add(LidefempPeer::FAXEMP, $this->faxemp);
		if ($this->isColumnModified(LidefempPeer::EMAEMP)) $criteria->add(LidefempPeer::EMAEMP, $this->emaemp);
		if ($this->isColumnModified(LidefempPeer::UNITRI)) $criteria->add(LidefempPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(LidefempPeer::PTOCTA)) $criteria->add(LidefempPeer::PTOCTA, $this->ptocta);
		if ($this->isColumnModified(LidefempPeer::PREBAS)) $criteria->add(LidefempPeer::PREBAS, $this->prebas);
		if ($this->isColumnModified(LidefempPeer::EXPDIE)) $criteria->add(LidefempPeer::EXPDIE, $this->expdie);
		if ($this->isColumnModified(LidefempPeer::NUMEMO)) $criteria->add(LidefempPeer::NUMEMO, $this->numemo);
		if ($this->isColumnModified(LidefempPeer::SOLEGR)) $criteria->add(LidefempPeer::SOLEGR, $this->solegr);
		if ($this->isColumnModified(LidefempPeer::COMINT)) $criteria->add(LidefempPeer::COMINT, $this->comint);
		if ($this->isColumnModified(LidefempPeer::PLIEGO)) $criteria->add(LidefempPeer::PLIEGO, $this->pliego);
		if ($this->isColumnModified(LidefempPeer::ACLARA)) $criteria->add(LidefempPeer::ACLARA, $this->aclara);
		if ($this->isColumnModified(LidefempPeer::OFERTA)) $criteria->add(LidefempPeer::OFERTA, $this->oferta);
		if ($this->isColumnModified(LidefempPeer::ANAOFE)) $criteria->add(LidefempPeer::ANAOFE, $this->anaofe);
		if ($this->isColumnModified(LidefempPeer::RECOME)) $criteria->add(LidefempPeer::RECOME, $this->recome);
		if ($this->isColumnModified(LidefempPeer::PTOCUECON)) $criteria->add(LidefempPeer::PTOCUECON, $this->ptocuecon);
		if ($this->isColumnModified(LidefempPeer::NOTIFI)) $criteria->add(LidefempPeer::NOTIFI, $this->notifi);
		if ($this->isColumnModified(LidefempPeer::ID)) $criteria->add(LidefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LidefempPeer::DATABASE_NAME);

		$criteria->add(LidefempPeer::ID, $this->id);

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

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setDiremp($this->diremp);

		$copyObj->setTelemp($this->telemp);

		$copyObj->setFaxemp($this->faxemp);

		$copyObj->setEmaemp($this->emaemp);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setPtocta($this->ptocta);

		$copyObj->setPrebas($this->prebas);

		$copyObj->setExpdie($this->expdie);

		$copyObj->setNumemo($this->numemo);

		$copyObj->setSolegr($this->solegr);

		$copyObj->setComint($this->comint);

		$copyObj->setPliego($this->pliego);

		$copyObj->setAclara($this->aclara);

		$copyObj->setOferta($this->oferta);

		$copyObj->setAnaofe($this->anaofe);

		$copyObj->setRecome($this->recome);

		$copyObj->setPtocuecon($this->ptocuecon);

		$copyObj->setNotifi($this->notifi);


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
			self::$peer = new LidefempPeer();
		}
		return self::$peer;
	}

} 