<?php


abstract class BaseOpdefemp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codemp;


	
	protected $ctapag;


	
	protected $ctades;


	
	protected $numini;


	
	protected $ordnom;


	
	protected $ordobr;


	
	protected $unitri;


	
	protected $vercomret;


	
	protected $genctaord;


	
	protected $forubi;


	
	protected $tipaju;


	
	protected $tipeje;


	
	protected $numaut;


	
	protected $tipmov;


	
	protected $coriva;


	
	protected $ctabono;


	
	protected $ctavaca;


	
	protected $gencaubon;


	
	protected $gencomadi;


	
	protected $unidad;


	
	protected $ordliq;


	
	protected $ordfid;


	
	protected $ordval;


	
	protected $genordret;


	
	protected $emichepag;


	
	protected $cuecajchi;


	
	protected $tipcajchi;


	
	protected $monapecajchi;


	
	protected $porrepcajchi;


	
	protected $tiprencajchi;


	
	protected $numinicajchi;


	
	protected $cedrifcajchi;


	
	protected $codcatcajchi;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodemp()
  {

    return trim($this->codemp);

  }
  
  public function getCtapag()
  {

    return trim($this->ctapag);

  }
  
  public function getCtades()
  {

    return trim($this->ctades);

  }
  
  public function getNumini()
  {

    return trim($this->numini);

  }
  
  public function getOrdnom()
  {

    return trim($this->ordnom);

  }
  
  public function getOrdobr()
  {

    return trim($this->ordobr);

  }
  
  public function getUnitri($val=false)
  {

    if($val) return number_format($this->unitri,2,',','.');
    else return $this->unitri;

  }
  
  public function getVercomret()
  {

    return trim($this->vercomret);

  }
  
  public function getGenctaord()
  {

    return trim($this->genctaord);

  }
  
  public function getForubi()
  {

    return trim($this->forubi);

  }
  
  public function getTipaju()
  {

    return trim($this->tipaju);

  }
  
  public function getTipeje()
  {

    return trim($this->tipeje);

  }
  
  public function getNumaut()
  {

    return trim($this->numaut);

  }
  
  public function getTipmov()
  {

    return trim($this->tipmov);

  }
  
  public function getCoriva($val=false)
  {

    if($val) return number_format($this->coriva,2,',','.');
    else return $this->coriva;

  }
  
  public function getCtabono()
  {

    return trim($this->ctabono);

  }
  
  public function getCtavaca()
  {

    return trim($this->ctavaca);

  }
  
  public function getGencaubon()
  {

    return trim($this->gencaubon);

  }
  
  public function getGencomadi()
  {

    return trim($this->gencomadi);

  }
  
  public function getUnidad()
  {

    return trim($this->unidad);

  }
  
  public function getOrdliq()
  {

    return trim($this->ordliq);

  }
  
  public function getOrdfid()
  {

    return trim($this->ordfid);

  }
  
  public function getOrdval()
  {

    return trim($this->ordval);

  }
  
  public function getGenordret()
  {

    return trim($this->genordret);

  }
  
  public function getEmichepag()
  {

    return trim($this->emichepag);

  }
  
  public function getCuecajchi()
  {

    return trim($this->cuecajchi);

  }
  
  public function getTipcajchi()
  {

    return trim($this->tipcajchi);

  }
  
  public function getMonapecajchi($val=false)
  {

    if($val) return number_format($this->monapecajchi,2,',','.');
    else return $this->monapecajchi;

  }
  
  public function getPorrepcajchi($val=false)
  {

    if($val) return number_format($this->porrepcajchi,2,',','.');
    else return $this->porrepcajchi;

  }
  
  public function getTiprencajchi()
  {

    return trim($this->tiprencajchi);

  }
  
  public function getNuminicajchi()
  {

    return trim($this->numinicajchi);

  }
  
  public function getCedrifcajchi()
  {

    return trim($this->cedrifcajchi);

  }
  
  public function getCodcatcajchi()
  {

    return trim($this->codcatcajchi);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodemp($v)
	{

    if ($this->codemp !== $v) {
        $this->codemp = $v;
        $this->modifiedColumns[] = OpdefempPeer::CODEMP;
      }
  
	} 
	
	public function setCtapag($v)
	{

    if ($this->ctapag !== $v) {
        $this->ctapag = $v;
        $this->modifiedColumns[] = OpdefempPeer::CTAPAG;
      }
  
	} 
	
	public function setCtades($v)
	{

    if ($this->ctades !== $v) {
        $this->ctades = $v;
        $this->modifiedColumns[] = OpdefempPeer::CTADES;
      }
  
	} 
	
	public function setNumini($v)
	{

    if ($this->numini !== $v) {
        $this->numini = $v;
        $this->modifiedColumns[] = OpdefempPeer::NUMINI;
      }
  
	} 
	
	public function setOrdnom($v)
	{

    if ($this->ordnom !== $v) {
        $this->ordnom = $v;
        $this->modifiedColumns[] = OpdefempPeer::ORDNOM;
      }
  
	} 
	
	public function setOrdobr($v)
	{

    if ($this->ordobr !== $v) {
        $this->ordobr = $v;
        $this->modifiedColumns[] = OpdefempPeer::ORDOBR;
      }
  
	} 
	
	public function setUnitri($v)
	{

    if ($this->unitri !== $v) {
        $this->unitri = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdefempPeer::UNITRI;
      }
  
	} 
	
	public function setVercomret($v)
	{

    if ($this->vercomret !== $v) {
        $this->vercomret = $v;
        $this->modifiedColumns[] = OpdefempPeer::VERCOMRET;
      }
  
	} 
	
	public function setGenctaord($v)
	{

    if ($this->genctaord !== $v) {
        $this->genctaord = $v;
        $this->modifiedColumns[] = OpdefempPeer::GENCTAORD;
      }
  
	} 
	
	public function setForubi($v)
	{

    if ($this->forubi !== $v) {
        $this->forubi = $v;
        $this->modifiedColumns[] = OpdefempPeer::FORUBI;
      }
  
	} 
	
	public function setTipaju($v)
	{

    if ($this->tipaju !== $v) {
        $this->tipaju = $v;
        $this->modifiedColumns[] = OpdefempPeer::TIPAJU;
      }
  
	} 
	
	public function setTipeje($v)
	{

    if ($this->tipeje !== $v) {
        $this->tipeje = $v;
        $this->modifiedColumns[] = OpdefempPeer::TIPEJE;
      }
  
	} 
	
	public function setNumaut($v)
	{

    if ($this->numaut !== $v) {
        $this->numaut = $v;
        $this->modifiedColumns[] = OpdefempPeer::NUMAUT;
      }
  
	} 
	
	public function setTipmov($v)
	{

    if ($this->tipmov !== $v) {
        $this->tipmov = $v;
        $this->modifiedColumns[] = OpdefempPeer::TIPMOV;
      }
  
	} 
	
	public function setCoriva($v)
	{

    if ($this->coriva !== $v) {
        $this->coriva = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdefempPeer::CORIVA;
      }
  
	} 
	
	public function setCtabono($v)
	{

    if ($this->ctabono !== $v) {
        $this->ctabono = $v;
        $this->modifiedColumns[] = OpdefempPeer::CTABONO;
      }
  
	} 
	
	public function setCtavaca($v)
	{

    if ($this->ctavaca !== $v) {
        $this->ctavaca = $v;
        $this->modifiedColumns[] = OpdefempPeer::CTAVACA;
      }
  
	} 
	
	public function setGencaubon($v)
	{

    if ($this->gencaubon !== $v) {
        $this->gencaubon = $v;
        $this->modifiedColumns[] = OpdefempPeer::GENCAUBON;
      }
  
	} 
	
	public function setGencomadi($v)
	{

    if ($this->gencomadi !== $v) {
        $this->gencomadi = $v;
        $this->modifiedColumns[] = OpdefempPeer::GENCOMADI;
      }
  
	} 
	
	public function setUnidad($v)
	{

    if ($this->unidad !== $v) {
        $this->unidad = $v;
        $this->modifiedColumns[] = OpdefempPeer::UNIDAD;
      }
  
	} 
	
	public function setOrdliq($v)
	{

    if ($this->ordliq !== $v) {
        $this->ordliq = $v;
        $this->modifiedColumns[] = OpdefempPeer::ORDLIQ;
      }
  
	} 
	
	public function setOrdfid($v)
	{

    if ($this->ordfid !== $v) {
        $this->ordfid = $v;
        $this->modifiedColumns[] = OpdefempPeer::ORDFID;
      }
  
	} 
	
	public function setOrdval($v)
	{

    if ($this->ordval !== $v) {
        $this->ordval = $v;
        $this->modifiedColumns[] = OpdefempPeer::ORDVAL;
      }
  
	} 
	
	public function setGenordret($v)
	{

    if ($this->genordret !== $v) {
        $this->genordret = $v;
        $this->modifiedColumns[] = OpdefempPeer::GENORDRET;
      }
  
	} 
	
	public function setEmichepag($v)
	{

    if ($this->emichepag !== $v) {
        $this->emichepag = $v;
        $this->modifiedColumns[] = OpdefempPeer::EMICHEPAG;
      }
  
	} 
	
	public function setCuecajchi($v)
	{

    if ($this->cuecajchi !== $v) {
        $this->cuecajchi = $v;
        $this->modifiedColumns[] = OpdefempPeer::CUECAJCHI;
      }
  
	} 
	
	public function setTipcajchi($v)
	{

    if ($this->tipcajchi !== $v) {
        $this->tipcajchi = $v;
        $this->modifiedColumns[] = OpdefempPeer::TIPCAJCHI;
      }
  
	} 
	
	public function setMonapecajchi($v)
	{

    if ($this->monapecajchi !== $v) {
        $this->monapecajchi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdefempPeer::MONAPECAJCHI;
      }
  
	} 
	
	public function setPorrepcajchi($v)
	{

    if ($this->porrepcajchi !== $v) {
        $this->porrepcajchi = Herramientas::toFloat($v);
        $this->modifiedColumns[] = OpdefempPeer::PORREPCAJCHI;
      }
  
	} 
	
	public function setTiprencajchi($v)
	{

    if ($this->tiprencajchi !== $v) {
        $this->tiprencajchi = $v;
        $this->modifiedColumns[] = OpdefempPeer::TIPRENCAJCHI;
      }
  
	} 
	
	public function setNuminicajchi($v)
	{

    if ($this->numinicajchi !== $v) {
        $this->numinicajchi = $v;
        $this->modifiedColumns[] = OpdefempPeer::NUMINICAJCHI;
      }
  
	} 
	
	public function setCedrifcajchi($v)
	{

    if ($this->cedrifcajchi !== $v) {
        $this->cedrifcajchi = $v;
        $this->modifiedColumns[] = OpdefempPeer::CEDRIFCAJCHI;
      }
  
	} 
	
	public function setCodcatcajchi($v)
	{

    if ($this->codcatcajchi !== $v) {
        $this->codcatcajchi = $v;
        $this->modifiedColumns[] = OpdefempPeer::CODCATCAJCHI;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = OpdefempPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codemp = $rs->getString($startcol + 0);

      $this->ctapag = $rs->getString($startcol + 1);

      $this->ctades = $rs->getString($startcol + 2);

      $this->numini = $rs->getString($startcol + 3);

      $this->ordnom = $rs->getString($startcol + 4);

      $this->ordobr = $rs->getString($startcol + 5);

      $this->unitri = $rs->getFloat($startcol + 6);

      $this->vercomret = $rs->getString($startcol + 7);

      $this->genctaord = $rs->getString($startcol + 8);

      $this->forubi = $rs->getString($startcol + 9);

      $this->tipaju = $rs->getString($startcol + 10);

      $this->tipeje = $rs->getString($startcol + 11);

      $this->numaut = $rs->getString($startcol + 12);

      $this->tipmov = $rs->getString($startcol + 13);

      $this->coriva = $rs->getFloat($startcol + 14);

      $this->ctabono = $rs->getString($startcol + 15);

      $this->ctavaca = $rs->getString($startcol + 16);

      $this->gencaubon = $rs->getString($startcol + 17);

      $this->gencomadi = $rs->getString($startcol + 18);

      $this->unidad = $rs->getString($startcol + 19);

      $this->ordliq = $rs->getString($startcol + 20);

      $this->ordfid = $rs->getString($startcol + 21);

      $this->ordval = $rs->getString($startcol + 22);

      $this->genordret = $rs->getString($startcol + 23);

      $this->emichepag = $rs->getString($startcol + 24);

      $this->cuecajchi = $rs->getString($startcol + 25);

      $this->tipcajchi = $rs->getString($startcol + 26);

      $this->monapecajchi = $rs->getFloat($startcol + 27);

      $this->porrepcajchi = $rs->getFloat($startcol + 28);

      $this->tiprencajchi = $rs->getString($startcol + 29);

      $this->numinicajchi = $rs->getString($startcol + 30);

      $this->cedrifcajchi = $rs->getString($startcol + 31);

      $this->codcatcajchi = $rs->getString($startcol + 32);

      $this->id = $rs->getInt($startcol + 33);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 34; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Opdefemp object", $e);
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
			$con = Propel::getConnection(OpdefempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OpdefempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OpdefempPeer::DATABASE_NAME);
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
					$pk = OpdefempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += OpdefempPeer::doUpdate($this, $con);
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


			if (($retval = OpdefempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodemp();
				break;
			case 1:
				return $this->getCtapag();
				break;
			case 2:
				return $this->getCtades();
				break;
			case 3:
				return $this->getNumini();
				break;
			case 4:
				return $this->getOrdnom();
				break;
			case 5:
				return $this->getOrdobr();
				break;
			case 6:
				return $this->getUnitri();
				break;
			case 7:
				return $this->getVercomret();
				break;
			case 8:
				return $this->getGenctaord();
				break;
			case 9:
				return $this->getForubi();
				break;
			case 10:
				return $this->getTipaju();
				break;
			case 11:
				return $this->getTipeje();
				break;
			case 12:
				return $this->getNumaut();
				break;
			case 13:
				return $this->getTipmov();
				break;
			case 14:
				return $this->getCoriva();
				break;
			case 15:
				return $this->getCtabono();
				break;
			case 16:
				return $this->getCtavaca();
				break;
			case 17:
				return $this->getGencaubon();
				break;
			case 18:
				return $this->getGencomadi();
				break;
			case 19:
				return $this->getUnidad();
				break;
			case 20:
				return $this->getOrdliq();
				break;
			case 21:
				return $this->getOrdfid();
				break;
			case 22:
				return $this->getOrdval();
				break;
			case 23:
				return $this->getGenordret();
				break;
			case 24:
				return $this->getEmichepag();
				break;
			case 25:
				return $this->getCuecajchi();
				break;
			case 26:
				return $this->getTipcajchi();
				break;
			case 27:
				return $this->getMonapecajchi();
				break;
			case 28:
				return $this->getPorrepcajchi();
				break;
			case 29:
				return $this->getTiprencajchi();
				break;
			case 30:
				return $this->getNuminicajchi();
				break;
			case 31:
				return $this->getCedrifcajchi();
				break;
			case 32:
				return $this->getCodcatcajchi();
				break;
			case 33:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdefempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodemp(),
			$keys[1] => $this->getCtapag(),
			$keys[2] => $this->getCtades(),
			$keys[3] => $this->getNumini(),
			$keys[4] => $this->getOrdnom(),
			$keys[5] => $this->getOrdobr(),
			$keys[6] => $this->getUnitri(),
			$keys[7] => $this->getVercomret(),
			$keys[8] => $this->getGenctaord(),
			$keys[9] => $this->getForubi(),
			$keys[10] => $this->getTipaju(),
			$keys[11] => $this->getTipeje(),
			$keys[12] => $this->getNumaut(),
			$keys[13] => $this->getTipmov(),
			$keys[14] => $this->getCoriva(),
			$keys[15] => $this->getCtabono(),
			$keys[16] => $this->getCtavaca(),
			$keys[17] => $this->getGencaubon(),
			$keys[18] => $this->getGencomadi(),
			$keys[19] => $this->getUnidad(),
			$keys[20] => $this->getOrdliq(),
			$keys[21] => $this->getOrdfid(),
			$keys[22] => $this->getOrdval(),
			$keys[23] => $this->getGenordret(),
			$keys[24] => $this->getEmichepag(),
			$keys[25] => $this->getCuecajchi(),
			$keys[26] => $this->getTipcajchi(),
			$keys[27] => $this->getMonapecajchi(),
			$keys[28] => $this->getPorrepcajchi(),
			$keys[29] => $this->getTiprencajchi(),
			$keys[30] => $this->getNuminicajchi(),
			$keys[31] => $this->getCedrifcajchi(),
			$keys[32] => $this->getCodcatcajchi(),
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OpdefempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodemp($value);
				break;
			case 1:
				$this->setCtapag($value);
				break;
			case 2:
				$this->setCtades($value);
				break;
			case 3:
				$this->setNumini($value);
				break;
			case 4:
				$this->setOrdnom($value);
				break;
			case 5:
				$this->setOrdobr($value);
				break;
			case 6:
				$this->setUnitri($value);
				break;
			case 7:
				$this->setVercomret($value);
				break;
			case 8:
				$this->setGenctaord($value);
				break;
			case 9:
				$this->setForubi($value);
				break;
			case 10:
				$this->setTipaju($value);
				break;
			case 11:
				$this->setTipeje($value);
				break;
			case 12:
				$this->setNumaut($value);
				break;
			case 13:
				$this->setTipmov($value);
				break;
			case 14:
				$this->setCoriva($value);
				break;
			case 15:
				$this->setCtabono($value);
				break;
			case 16:
				$this->setCtavaca($value);
				break;
			case 17:
				$this->setGencaubon($value);
				break;
			case 18:
				$this->setGencomadi($value);
				break;
			case 19:
				$this->setUnidad($value);
				break;
			case 20:
				$this->setOrdliq($value);
				break;
			case 21:
				$this->setOrdfid($value);
				break;
			case 22:
				$this->setOrdval($value);
				break;
			case 23:
				$this->setGenordret($value);
				break;
			case 24:
				$this->setEmichepag($value);
				break;
			case 25:
				$this->setCuecajchi($value);
				break;
			case 26:
				$this->setTipcajchi($value);
				break;
			case 27:
				$this->setMonapecajchi($value);
				break;
			case 28:
				$this->setPorrepcajchi($value);
				break;
			case 29:
				$this->setTiprencajchi($value);
				break;
			case 30:
				$this->setNuminicajchi($value);
				break;
			case 31:
				$this->setCedrifcajchi($value);
				break;
			case 32:
				$this->setCodcatcajchi($value);
				break;
			case 33:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OpdefempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodemp($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCtapag($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCtades($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNumini($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOrdnom($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrdobr($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUnitri($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setVercomret($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGenctaord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setForubi($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setTipaju($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipeje($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setNumaut($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setTipmov($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCoriva($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCtabono($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCtavaca($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setGencaubon($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setGencomadi($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setUnidad($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setOrdliq($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setOrdfid($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setOrdval($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setGenordret($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setEmichepag($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCuecajchi($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTipcajchi($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setMonapecajchi($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setPorrepcajchi($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTiprencajchi($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setNuminicajchi($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCedrifcajchi($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodcatcajchi($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OpdefempPeer::DATABASE_NAME);

		if ($this->isColumnModified(OpdefempPeer::CODEMP)) $criteria->add(OpdefempPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(OpdefempPeer::CTAPAG)) $criteria->add(OpdefempPeer::CTAPAG, $this->ctapag);
		if ($this->isColumnModified(OpdefempPeer::CTADES)) $criteria->add(OpdefempPeer::CTADES, $this->ctades);
		if ($this->isColumnModified(OpdefempPeer::NUMINI)) $criteria->add(OpdefempPeer::NUMINI, $this->numini);
		if ($this->isColumnModified(OpdefempPeer::ORDNOM)) $criteria->add(OpdefempPeer::ORDNOM, $this->ordnom);
		if ($this->isColumnModified(OpdefempPeer::ORDOBR)) $criteria->add(OpdefempPeer::ORDOBR, $this->ordobr);
		if ($this->isColumnModified(OpdefempPeer::UNITRI)) $criteria->add(OpdefempPeer::UNITRI, $this->unitri);
		if ($this->isColumnModified(OpdefempPeer::VERCOMRET)) $criteria->add(OpdefempPeer::VERCOMRET, $this->vercomret);
		if ($this->isColumnModified(OpdefempPeer::GENCTAORD)) $criteria->add(OpdefempPeer::GENCTAORD, $this->genctaord);
		if ($this->isColumnModified(OpdefempPeer::FORUBI)) $criteria->add(OpdefempPeer::FORUBI, $this->forubi);
		if ($this->isColumnModified(OpdefempPeer::TIPAJU)) $criteria->add(OpdefempPeer::TIPAJU, $this->tipaju);
		if ($this->isColumnModified(OpdefempPeer::TIPEJE)) $criteria->add(OpdefempPeer::TIPEJE, $this->tipeje);
		if ($this->isColumnModified(OpdefempPeer::NUMAUT)) $criteria->add(OpdefempPeer::NUMAUT, $this->numaut);
		if ($this->isColumnModified(OpdefempPeer::TIPMOV)) $criteria->add(OpdefempPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(OpdefempPeer::CORIVA)) $criteria->add(OpdefempPeer::CORIVA, $this->coriva);
		if ($this->isColumnModified(OpdefempPeer::CTABONO)) $criteria->add(OpdefempPeer::CTABONO, $this->ctabono);
		if ($this->isColumnModified(OpdefempPeer::CTAVACA)) $criteria->add(OpdefempPeer::CTAVACA, $this->ctavaca);
		if ($this->isColumnModified(OpdefempPeer::GENCAUBON)) $criteria->add(OpdefempPeer::GENCAUBON, $this->gencaubon);
		if ($this->isColumnModified(OpdefempPeer::GENCOMADI)) $criteria->add(OpdefempPeer::GENCOMADI, $this->gencomadi);
		if ($this->isColumnModified(OpdefempPeer::UNIDAD)) $criteria->add(OpdefempPeer::UNIDAD, $this->unidad);
		if ($this->isColumnModified(OpdefempPeer::ORDLIQ)) $criteria->add(OpdefempPeer::ORDLIQ, $this->ordliq);
		if ($this->isColumnModified(OpdefempPeer::ORDFID)) $criteria->add(OpdefempPeer::ORDFID, $this->ordfid);
		if ($this->isColumnModified(OpdefempPeer::ORDVAL)) $criteria->add(OpdefempPeer::ORDVAL, $this->ordval);
		if ($this->isColumnModified(OpdefempPeer::GENORDRET)) $criteria->add(OpdefempPeer::GENORDRET, $this->genordret);
		if ($this->isColumnModified(OpdefempPeer::EMICHEPAG)) $criteria->add(OpdefempPeer::EMICHEPAG, $this->emichepag);
		if ($this->isColumnModified(OpdefempPeer::CUECAJCHI)) $criteria->add(OpdefempPeer::CUECAJCHI, $this->cuecajchi);
		if ($this->isColumnModified(OpdefempPeer::TIPCAJCHI)) $criteria->add(OpdefempPeer::TIPCAJCHI, $this->tipcajchi);
		if ($this->isColumnModified(OpdefempPeer::MONAPECAJCHI)) $criteria->add(OpdefempPeer::MONAPECAJCHI, $this->monapecajchi);
		if ($this->isColumnModified(OpdefempPeer::PORREPCAJCHI)) $criteria->add(OpdefempPeer::PORREPCAJCHI, $this->porrepcajchi);
		if ($this->isColumnModified(OpdefempPeer::TIPRENCAJCHI)) $criteria->add(OpdefempPeer::TIPRENCAJCHI, $this->tiprencajchi);
		if ($this->isColumnModified(OpdefempPeer::NUMINICAJCHI)) $criteria->add(OpdefempPeer::NUMINICAJCHI, $this->numinicajchi);
		if ($this->isColumnModified(OpdefempPeer::CEDRIFCAJCHI)) $criteria->add(OpdefempPeer::CEDRIFCAJCHI, $this->cedrifcajchi);
		if ($this->isColumnModified(OpdefempPeer::CODCATCAJCHI)) $criteria->add(OpdefempPeer::CODCATCAJCHI, $this->codcatcajchi);
		if ($this->isColumnModified(OpdefempPeer::ID)) $criteria->add(OpdefempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OpdefempPeer::DATABASE_NAME);

		$criteria->add(OpdefempPeer::ID, $this->id);

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

		$copyObj->setCtapag($this->ctapag);

		$copyObj->setCtades($this->ctades);

		$copyObj->setNumini($this->numini);

		$copyObj->setOrdnom($this->ordnom);

		$copyObj->setOrdobr($this->ordobr);

		$copyObj->setUnitri($this->unitri);

		$copyObj->setVercomret($this->vercomret);

		$copyObj->setGenctaord($this->genctaord);

		$copyObj->setForubi($this->forubi);

		$copyObj->setTipaju($this->tipaju);

		$copyObj->setTipeje($this->tipeje);

		$copyObj->setNumaut($this->numaut);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setCoriva($this->coriva);

		$copyObj->setCtabono($this->ctabono);

		$copyObj->setCtavaca($this->ctavaca);

		$copyObj->setGencaubon($this->gencaubon);

		$copyObj->setGencomadi($this->gencomadi);

		$copyObj->setUnidad($this->unidad);

		$copyObj->setOrdliq($this->ordliq);

		$copyObj->setOrdfid($this->ordfid);

		$copyObj->setOrdval($this->ordval);

		$copyObj->setGenordret($this->genordret);

		$copyObj->setEmichepag($this->emichepag);

		$copyObj->setCuecajchi($this->cuecajchi);

		$copyObj->setTipcajchi($this->tipcajchi);

		$copyObj->setMonapecajchi($this->monapecajchi);

		$copyObj->setPorrepcajchi($this->porrepcajchi);

		$copyObj->setTiprencajchi($this->tiprencajchi);

		$copyObj->setNuminicajchi($this->numinicajchi);

		$copyObj->setCedrifcajchi($this->cedrifcajchi);

		$copyObj->setCodcatcajchi($this->codcatcajchi);


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
			self::$peer = new OpdefempPeer();
		}
		return self::$peer;
	}

} 