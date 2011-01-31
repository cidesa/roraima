<?php


abstract class BaseForregart extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codart;


	
	protected $desart;


	
	protected $codcta;


	
	protected $codpar;


	
	protected $ramart;


	
	protected $cosult;


	
	protected $cospro;


	
	protected $exitot;


	
	protected $unimed;


	
	protected $unialt;


	
	protected $relart;


	
	protected $fecult;


	
	protected $invini;


	
	protected $codmar;


	
	protected $codref;


	
	protected $costot;


	
	protected $sigecof;


	
	protected $codclaart;


	
	protected $lotuni;


	
	protected $ctavta;


	
	protected $ctacos;


	
	protected $ctapro;


	
	protected $preart;


	
	protected $distot;


	
	protected $tipo;


	
	protected $tip0;


	
	protected $coding;


	
	protected $mercon;


	
	protected $codartsnc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodart()
  {

    return trim($this->codart);

  }
  
  public function getDesart()
  {

    return trim($this->desart);

  }
  
  public function getCodcta()
  {

    return trim($this->codcta);

  }
  
  public function getCodpar()
  {

    return trim($this->codpar);

  }
  
  public function getRamart()
  {

    return trim($this->ramart);

  }
  
  public function getCosult($val=false)
  {

    if($val) return number_format($this->cosult,2,',','.');
    else return $this->cosult;

  }
  
  public function getCospro($val=false)
  {

    if($val) return number_format($this->cospro,2,',','.');
    else return $this->cospro;

  }
  
  public function getExitot($val=false)
  {

    if($val) return number_format($this->exitot,2,',','.');
    else return $this->exitot;

  }
  
  public function getUnimed()
  {

    return trim($this->unimed);

  }
  
  public function getUnialt()
  {

    return trim($this->unialt);

  }
  
  public function getRelart()
  {

    return trim($this->relart);

  }
  
  public function getFecult($format = 'Y-m-d')
  {

    if ($this->fecult === null || $this->fecult === '') {
      return null;
    } elseif (!is_int($this->fecult)) {
            $ts = adodb_strtotime($this->fecult);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecult] as date/time value: " . var_export($this->fecult, true));
      }
    } else {
      $ts = $this->fecult;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getInvini($val=false)
  {

    if($val) return number_format($this->invini,2,',','.');
    else return $this->invini;

  }
  
  public function getCodmar()
  {

    return trim($this->codmar);

  }
  
  public function getCodref()
  {

    return trim($this->codref);

  }
  
  public function getCostot($val=false)
  {

    if($val) return number_format($this->costot,2,',','.');
    else return $this->costot;

  }
  
  public function getSigecof()
  {

    return trim($this->sigecof);

  }
  
  public function getCodclaart($val=false)
  {

    if($val) return number_format($this->codclaart,2,',','.');
    else return $this->codclaart;

  }
  
  public function getLotuni()
  {

    return trim($this->lotuni);

  }
  
  public function getCtavta()
  {

    return trim($this->ctavta);

  }
  
  public function getCtacos()
  {

    return trim($this->ctacos);

  }
  
  public function getCtapro()
  {

    return trim($this->ctapro);

  }
  
  public function getPreart()
  {

    return trim($this->preart);

  }
  
  public function getDistot($val=false)
  {

    if($val) return number_format($this->distot,2,',','.');
    else return $this->distot;

  }
  
  public function getTipo()
  {

    return trim($this->tipo);

  }
  
  public function getTip0()
  {

    return trim($this->tip0);

  }
  
  public function getCoding()
  {

    return trim($this->coding);

  }
  
  public function getMercon()
  {

    return trim($this->mercon);

  }
  
  public function getCodartsnc()
  {

    return trim($this->codartsnc);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodart($v)
	{

    if ($this->codart !== $v) {
        $this->codart = $v;
        $this->modifiedColumns[] = ForregartPeer::CODART;
      }
  
	} 
	
	public function setDesart($v)
	{

    if ($this->desart !== $v) {
        $this->desart = $v;
        $this->modifiedColumns[] = ForregartPeer::DESART;
      }
  
	} 
	
	public function setCodcta($v)
	{

    if ($this->codcta !== $v) {
        $this->codcta = $v;
        $this->modifiedColumns[] = ForregartPeer::CODCTA;
      }
  
	} 
	
	public function setCodpar($v)
	{

    if ($this->codpar !== $v) {
        $this->codpar = $v;
        $this->modifiedColumns[] = ForregartPeer::CODPAR;
      }
  
	} 
	
	public function setRamart($v)
	{

    if ($this->ramart !== $v) {
        $this->ramart = $v;
        $this->modifiedColumns[] = ForregartPeer::RAMART;
      }
  
	} 
	
	public function setCosult($v)
	{

    if ($this->cosult !== $v) {
        $this->cosult = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::COSULT;
      }
  
	} 
	
	public function setCospro($v)
	{

    if ($this->cospro !== $v) {
        $this->cospro = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::COSPRO;
      }
  
	} 
	
	public function setExitot($v)
	{

    if ($this->exitot !== $v) {
        $this->exitot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::EXITOT;
      }
  
	} 
	
	public function setUnimed($v)
	{

    if ($this->unimed !== $v) {
        $this->unimed = $v;
        $this->modifiedColumns[] = ForregartPeer::UNIMED;
      }
  
	} 
	
	public function setUnialt($v)
	{

    if ($this->unialt !== $v) {
        $this->unialt = $v;
        $this->modifiedColumns[] = ForregartPeer::UNIALT;
      }
  
	} 
	
	public function setRelart($v)
	{

    if ($this->relart !== $v) {
        $this->relart = $v;
        $this->modifiedColumns[] = ForregartPeer::RELART;
      }
  
	} 
	
	public function setFecult($v)
	{

		if (is_array($v)){
        	$value_array = $v;
        	$v = (isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
		}

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecult] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecult !== $ts) {
      $this->fecult = $ts;
      $this->modifiedColumns[] = ForregartPeer::FECULT;
    }

	} 
	
	public function setInvini($v)
	{

    if ($this->invini !== $v) {
        $this->invini = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::INVINI;
      }
  
	} 
	
	public function setCodmar($v)
	{

    if ($this->codmar !== $v) {
        $this->codmar = $v;
        $this->modifiedColumns[] = ForregartPeer::CODMAR;
      }
  
	} 
	
	public function setCodref($v)
	{

    if ($this->codref !== $v) {
        $this->codref = $v;
        $this->modifiedColumns[] = ForregartPeer::CODREF;
      }
  
	} 
	
	public function setCostot($v)
	{

    if ($this->costot !== $v) {
        $this->costot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::COSTOT;
      }
  
	} 
	
	public function setSigecof($v)
	{

    if ($this->sigecof !== $v) {
        $this->sigecof = $v;
        $this->modifiedColumns[] = ForregartPeer::SIGECOF;
      }
  
	} 
	
	public function setCodclaart($v)
	{

    if ($this->codclaart !== $v) {
        $this->codclaart = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::CODCLAART;
      }
  
	} 
	
	public function setLotuni($v)
	{

    if ($this->lotuni !== $v) {
        $this->lotuni = $v;
        $this->modifiedColumns[] = ForregartPeer::LOTUNI;
      }
  
	} 
	
	public function setCtavta($v)
	{

    if ($this->ctavta !== $v) {
        $this->ctavta = $v;
        $this->modifiedColumns[] = ForregartPeer::CTAVTA;
      }
  
	} 
	
	public function setCtacos($v)
	{

    if ($this->ctacos !== $v) {
        $this->ctacos = $v;
        $this->modifiedColumns[] = ForregartPeer::CTACOS;
      }
  
	} 
	
	public function setCtapro($v)
	{

    if ($this->ctapro !== $v) {
        $this->ctapro = $v;
        $this->modifiedColumns[] = ForregartPeer::CTAPRO;
      }
  
	} 
	
	public function setPreart($v)
	{

    if ($this->preart !== $v) {
        $this->preart = $v;
        $this->modifiedColumns[] = ForregartPeer::PREART;
      }
  
	} 
	
	public function setDistot($v)
	{

    if ($this->distot !== $v) {
        $this->distot = Herramientas::toFloat($v);
        $this->modifiedColumns[] = ForregartPeer::DISTOT;
      }
  
	} 
	
	public function setTipo($v)
	{

    if ($this->tipo !== $v) {
        $this->tipo = $v;
        $this->modifiedColumns[] = ForregartPeer::TIPO;
      }
  
	} 
	
	public function setTip0($v)
	{

    if ($this->tip0 !== $v) {
        $this->tip0 = $v;
        $this->modifiedColumns[] = ForregartPeer::TIP0;
      }
  
	} 
	
	public function setCoding($v)
	{

    if ($this->coding !== $v) {
        $this->coding = $v;
        $this->modifiedColumns[] = ForregartPeer::CODING;
      }
  
	} 
	
	public function setMercon($v)
	{

    if ($this->mercon !== $v) {
        $this->mercon = $v;
        $this->modifiedColumns[] = ForregartPeer::MERCON;
      }
  
	} 
	
	public function setCodartsnc($v)
	{

    if ($this->codartsnc !== $v) {
        $this->codartsnc = $v;
        $this->modifiedColumns[] = ForregartPeer::CODARTSNC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = ForregartPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codart = $rs->getString($startcol + 0);

      $this->desart = $rs->getString($startcol + 1);

      $this->codcta = $rs->getString($startcol + 2);

      $this->codpar = $rs->getString($startcol + 3);

      $this->ramart = $rs->getString($startcol + 4);

      $this->cosult = $rs->getFloat($startcol + 5);

      $this->cospro = $rs->getFloat($startcol + 6);

      $this->exitot = $rs->getFloat($startcol + 7);

      $this->unimed = $rs->getString($startcol + 8);

      $this->unialt = $rs->getString($startcol + 9);

      $this->relart = $rs->getString($startcol + 10);

      $this->fecult = $rs->getDate($startcol + 11, null);

      $this->invini = $rs->getFloat($startcol + 12);

      $this->codmar = $rs->getString($startcol + 13);

      $this->codref = $rs->getString($startcol + 14);

      $this->costot = $rs->getFloat($startcol + 15);

      $this->sigecof = $rs->getString($startcol + 16);

      $this->codclaart = $rs->getFloat($startcol + 17);

      $this->lotuni = $rs->getString($startcol + 18);

      $this->ctavta = $rs->getString($startcol + 19);

      $this->ctacos = $rs->getString($startcol + 20);

      $this->ctapro = $rs->getString($startcol + 21);

      $this->preart = $rs->getString($startcol + 22);

      $this->distot = $rs->getFloat($startcol + 23);

      $this->tipo = $rs->getString($startcol + 24);

      $this->tip0 = $rs->getString($startcol + 25);

      $this->coding = $rs->getString($startcol + 26);

      $this->mercon = $rs->getString($startcol + 27);

      $this->codartsnc = $rs->getString($startcol + 28);

      $this->id = $rs->getInt($startcol + 29);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 30; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Forregart object", $e);
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
			$con = Propel::getConnection(ForregartPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ForregartPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ForregartPeer::DATABASE_NAME);
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
					$pk = ForregartPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ForregartPeer::doUpdate($this, $con);
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


			if (($retval = ForregartPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForregartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodart();
				break;
			case 1:
				return $this->getDesart();
				break;
			case 2:
				return $this->getCodcta();
				break;
			case 3:
				return $this->getCodpar();
				break;
			case 4:
				return $this->getRamart();
				break;
			case 5:
				return $this->getCosult();
				break;
			case 6:
				return $this->getCospro();
				break;
			case 7:
				return $this->getExitot();
				break;
			case 8:
				return $this->getUnimed();
				break;
			case 9:
				return $this->getUnialt();
				break;
			case 10:
				return $this->getRelart();
				break;
			case 11:
				return $this->getFecult();
				break;
			case 12:
				return $this->getInvini();
				break;
			case 13:
				return $this->getCodmar();
				break;
			case 14:
				return $this->getCodref();
				break;
			case 15:
				return $this->getCostot();
				break;
			case 16:
				return $this->getSigecof();
				break;
			case 17:
				return $this->getCodclaart();
				break;
			case 18:
				return $this->getLotuni();
				break;
			case 19:
				return $this->getCtavta();
				break;
			case 20:
				return $this->getCtacos();
				break;
			case 21:
				return $this->getCtapro();
				break;
			case 22:
				return $this->getPreart();
				break;
			case 23:
				return $this->getDistot();
				break;
			case 24:
				return $this->getTipo();
				break;
			case 25:
				return $this->getTip0();
				break;
			case 26:
				return $this->getCoding();
				break;
			case 27:
				return $this->getMercon();
				break;
			case 28:
				return $this->getCodartsnc();
				break;
			case 29:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForregartPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodart(),
			$keys[1] => $this->getDesart(),
			$keys[2] => $this->getCodcta(),
			$keys[3] => $this->getCodpar(),
			$keys[4] => $this->getRamart(),
			$keys[5] => $this->getCosult(),
			$keys[6] => $this->getCospro(),
			$keys[7] => $this->getExitot(),
			$keys[8] => $this->getUnimed(),
			$keys[9] => $this->getUnialt(),
			$keys[10] => $this->getRelart(),
			$keys[11] => $this->getFecult(),
			$keys[12] => $this->getInvini(),
			$keys[13] => $this->getCodmar(),
			$keys[14] => $this->getCodref(),
			$keys[15] => $this->getCostot(),
			$keys[16] => $this->getSigecof(),
			$keys[17] => $this->getCodclaart(),
			$keys[18] => $this->getLotuni(),
			$keys[19] => $this->getCtavta(),
			$keys[20] => $this->getCtacos(),
			$keys[21] => $this->getCtapro(),
			$keys[22] => $this->getPreart(),
			$keys[23] => $this->getDistot(),
			$keys[24] => $this->getTipo(),
			$keys[25] => $this->getTip0(),
			$keys[26] => $this->getCoding(),
			$keys[27] => $this->getMercon(),
			$keys[28] => $this->getCodartsnc(),
			$keys[29] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ForregartPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodart($value);
				break;
			case 1:
				$this->setDesart($value);
				break;
			case 2:
				$this->setCodcta($value);
				break;
			case 3:
				$this->setCodpar($value);
				break;
			case 4:
				$this->setRamart($value);
				break;
			case 5:
				$this->setCosult($value);
				break;
			case 6:
				$this->setCospro($value);
				break;
			case 7:
				$this->setExitot($value);
				break;
			case 8:
				$this->setUnimed($value);
				break;
			case 9:
				$this->setUnialt($value);
				break;
			case 10:
				$this->setRelart($value);
				break;
			case 11:
				$this->setFecult($value);
				break;
			case 12:
				$this->setInvini($value);
				break;
			case 13:
				$this->setCodmar($value);
				break;
			case 14:
				$this->setCodref($value);
				break;
			case 15:
				$this->setCostot($value);
				break;
			case 16:
				$this->setSigecof($value);
				break;
			case 17:
				$this->setCodclaart($value);
				break;
			case 18:
				$this->setLotuni($value);
				break;
			case 19:
				$this->setCtavta($value);
				break;
			case 20:
				$this->setCtacos($value);
				break;
			case 21:
				$this->setCtapro($value);
				break;
			case 22:
				$this->setPreart($value);
				break;
			case 23:
				$this->setDistot($value);
				break;
			case 24:
				$this->setTipo($value);
				break;
			case 25:
				$this->setTip0($value);
				break;
			case 26:
				$this->setCoding($value);
				break;
			case 27:
				$this->setMercon($value);
				break;
			case 28:
				$this->setCodartsnc($value);
				break;
			case 29:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ForregartPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodart($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesart($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodpar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setRamart($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCosult($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCospro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setExitot($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUnimed($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUnialt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRelart($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecult($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setInvini($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodmar($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodref($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCostot($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSigecof($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodclaart($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setLotuni($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setCtavta($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCtacos($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCtapro($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setPreart($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDistot($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setTipo($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setTip0($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCoding($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setMercon($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodartsnc($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setId($arr[$keys[29]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ForregartPeer::DATABASE_NAME);

		if ($this->isColumnModified(ForregartPeer::CODART)) $criteria->add(ForregartPeer::CODART, $this->codart);
		if ($this->isColumnModified(ForregartPeer::DESART)) $criteria->add(ForregartPeer::DESART, $this->desart);
		if ($this->isColumnModified(ForregartPeer::CODCTA)) $criteria->add(ForregartPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(ForregartPeer::CODPAR)) $criteria->add(ForregartPeer::CODPAR, $this->codpar);
		if ($this->isColumnModified(ForregartPeer::RAMART)) $criteria->add(ForregartPeer::RAMART, $this->ramart);
		if ($this->isColumnModified(ForregartPeer::COSULT)) $criteria->add(ForregartPeer::COSULT, $this->cosult);
		if ($this->isColumnModified(ForregartPeer::COSPRO)) $criteria->add(ForregartPeer::COSPRO, $this->cospro);
		if ($this->isColumnModified(ForregartPeer::EXITOT)) $criteria->add(ForregartPeer::EXITOT, $this->exitot);
		if ($this->isColumnModified(ForregartPeer::UNIMED)) $criteria->add(ForregartPeer::UNIMED, $this->unimed);
		if ($this->isColumnModified(ForregartPeer::UNIALT)) $criteria->add(ForregartPeer::UNIALT, $this->unialt);
		if ($this->isColumnModified(ForregartPeer::RELART)) $criteria->add(ForregartPeer::RELART, $this->relart);
		if ($this->isColumnModified(ForregartPeer::FECULT)) $criteria->add(ForregartPeer::FECULT, $this->fecult);
		if ($this->isColumnModified(ForregartPeer::INVINI)) $criteria->add(ForregartPeer::INVINI, $this->invini);
		if ($this->isColumnModified(ForregartPeer::CODMAR)) $criteria->add(ForregartPeer::CODMAR, $this->codmar);
		if ($this->isColumnModified(ForregartPeer::CODREF)) $criteria->add(ForregartPeer::CODREF, $this->codref);
		if ($this->isColumnModified(ForregartPeer::COSTOT)) $criteria->add(ForregartPeer::COSTOT, $this->costot);
		if ($this->isColumnModified(ForregartPeer::SIGECOF)) $criteria->add(ForregartPeer::SIGECOF, $this->sigecof);
		if ($this->isColumnModified(ForregartPeer::CODCLAART)) $criteria->add(ForregartPeer::CODCLAART, $this->codclaart);
		if ($this->isColumnModified(ForregartPeer::LOTUNI)) $criteria->add(ForregartPeer::LOTUNI, $this->lotuni);
		if ($this->isColumnModified(ForregartPeer::CTAVTA)) $criteria->add(ForregartPeer::CTAVTA, $this->ctavta);
		if ($this->isColumnModified(ForregartPeer::CTACOS)) $criteria->add(ForregartPeer::CTACOS, $this->ctacos);
		if ($this->isColumnModified(ForregartPeer::CTAPRO)) $criteria->add(ForregartPeer::CTAPRO, $this->ctapro);
		if ($this->isColumnModified(ForregartPeer::PREART)) $criteria->add(ForregartPeer::PREART, $this->preart);
		if ($this->isColumnModified(ForregartPeer::DISTOT)) $criteria->add(ForregartPeer::DISTOT, $this->distot);
		if ($this->isColumnModified(ForregartPeer::TIPO)) $criteria->add(ForregartPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(ForregartPeer::TIP0)) $criteria->add(ForregartPeer::TIP0, $this->tip0);
		if ($this->isColumnModified(ForregartPeer::CODING)) $criteria->add(ForregartPeer::CODING, $this->coding);
		if ($this->isColumnModified(ForregartPeer::MERCON)) $criteria->add(ForregartPeer::MERCON, $this->mercon);
		if ($this->isColumnModified(ForregartPeer::CODARTSNC)) $criteria->add(ForregartPeer::CODARTSNC, $this->codartsnc);
		if ($this->isColumnModified(ForregartPeer::ID)) $criteria->add(ForregartPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ForregartPeer::DATABASE_NAME);

		$criteria->add(ForregartPeer::ID, $this->id);

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

		$copyObj->setCodart($this->codart);

		$copyObj->setDesart($this->desart);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setCodpar($this->codpar);

		$copyObj->setRamart($this->ramart);

		$copyObj->setCosult($this->cosult);

		$copyObj->setCospro($this->cospro);

		$copyObj->setExitot($this->exitot);

		$copyObj->setUnimed($this->unimed);

		$copyObj->setUnialt($this->unialt);

		$copyObj->setRelart($this->relart);

		$copyObj->setFecult($this->fecult);

		$copyObj->setInvini($this->invini);

		$copyObj->setCodmar($this->codmar);

		$copyObj->setCodref($this->codref);

		$copyObj->setCostot($this->costot);

		$copyObj->setSigecof($this->sigecof);

		$copyObj->setCodclaart($this->codclaart);

		$copyObj->setLotuni($this->lotuni);

		$copyObj->setCtavta($this->ctavta);

		$copyObj->setCtacos($this->ctacos);

		$copyObj->setCtapro($this->ctapro);

		$copyObj->setPreart($this->preart);

		$copyObj->setDistot($this->distot);

		$copyObj->setTipo($this->tipo);

		$copyObj->setTip0($this->tip0);

		$copyObj->setCoding($this->coding);

		$copyObj->setMercon($this->mercon);

		$copyObj->setCodartsnc($this->codartsnc);


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
			self::$peer = new ForregartPeer();
		}
		return self::$peer;
	}

} 