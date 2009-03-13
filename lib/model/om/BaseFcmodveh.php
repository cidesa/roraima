<?php


abstract class BaseFcmodveh extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $refmod;


	
	protected $plaveh;


	
	protected $fecmod;


	
	protected $coduso;


	
	protected $anoveh;


	
	protected $sermot;


	
	protected $sercar;


	
	protected $marveh;


	
	protected $colveh;


	
	protected $valori;


	
	protected $modveh;


	
	protected $dueant;


	
	protected $dirant;


	
	protected $plaant;


	
	protected $codusoant;


	
	protected $anovehant;


	
	protected $sermotant;


	
	protected $sercarant;


	
	protected $marvehant;


	
	protected $colvehant;


	
	protected $valoriant;


	
	protected $modvehant;


	
	protected $dueantant;


	
	protected $dirantant;


	
	protected $plaantant;


	
	protected $funrec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getRefmod()
  {

    return trim($this->refmod);

  }
  
  public function getPlaveh()
  {

    return trim($this->plaveh);

  }
  
  public function getFecmod($format = 'Y-m-d')
  {

    if ($this->fecmod === null || $this->fecmod === '') {
      return null;
    } elseif (!is_int($this->fecmod)) {
            $ts = adodb_strtotime($this->fecmod);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse value of [fecmod] as date/time value: " . var_export($this->fecmod, true));
      }
    } else {
      $ts = $this->fecmod;
    }
    if ($format === null) {
      return $ts;
    } elseif (strpos($format, '%') !== false) {
      return adodb_strftime($format, $ts);
    } else {
      return @adodb_date($format, $ts);
    }
  }

  
  public function getCoduso()
  {

    return trim($this->coduso);

  }
  
  public function getAnoveh($val=false)
  {

    if($val) return number_format($this->anoveh,2,',','.');
    else return $this->anoveh;

  }
  
  public function getSermot()
  {

    return trim($this->sermot);

  }
  
  public function getSercar()
  {

    return trim($this->sercar);

  }
  
  public function getMarveh()
  {

    return trim($this->marveh);

  }
  
  public function getColveh()
  {

    return trim($this->colveh);

  }
  
  public function getValori($val=false)
  {

    if($val) return number_format($this->valori,2,',','.');
    else return $this->valori;

  }
  
  public function getModveh()
  {

    return trim($this->modveh);

  }
  
  public function getDueant()
  {

    return trim($this->dueant);

  }
  
  public function getDirant()
  {

    return trim($this->dirant);

  }
  
  public function getPlaant()
  {

    return trim($this->plaant);

  }
  
  public function getCodusoant()
  {

    return trim($this->codusoant);

  }
  
  public function getAnovehant($val=false)
  {

    if($val) return number_format($this->anovehant,2,',','.');
    else return $this->anovehant;

  }
  
  public function getSermotant()
  {

    return trim($this->sermotant);

  }
  
  public function getSercarant()
  {

    return trim($this->sercarant);

  }
  
  public function getMarvehant()
  {

    return trim($this->marvehant);

  }
  
  public function getColvehant()
  {

    return trim($this->colvehant);

  }
  
  public function getValoriant($val=false)
  {

    if($val) return number_format($this->valoriant,2,',','.');
    else return $this->valoriant;

  }
  
  public function getModvehant()
  {

    return trim($this->modvehant);

  }
  
  public function getDueantant()
  {

    return trim($this->dueantant);

  }
  
  public function getDirantant()
  {

    return trim($this->dirantant);

  }
  
  public function getPlaantant()
  {

    return trim($this->plaantant);

  }
  
  public function getFunrec()
  {

    return trim($this->funrec);

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setRefmod($v)
	{

    if ($this->refmod !== $v) {
        $this->refmod = $v;
        $this->modifiedColumns[] = FcmodvehPeer::REFMOD;
      }
  
	} 
	
	public function setPlaveh($v)
	{

    if ($this->plaveh !== $v) {
        $this->plaveh = $v;
        $this->modifiedColumns[] = FcmodvehPeer::PLAVEH;
      }
  
	} 
	
	public function setFecmod($v)
	{

    if ($v !== null && !is_int($v)) {
      $ts = adodb_strtotime($v);
      if ($ts === -1 || $ts === false) {         throw new PropelException("Unable to parse date/time value for [fecmod] from input: " . var_export($v, true));
      }
    } else {
      $ts = $v;
    }
    if ($this->fecmod !== $ts) {
      $this->fecmod = $ts;
      $this->modifiedColumns[] = FcmodvehPeer::FECMOD;
    }

	} 
	
	public function setCoduso($v)
	{

    if ($this->coduso !== $v) {
        $this->coduso = $v;
        $this->modifiedColumns[] = FcmodvehPeer::CODUSO;
      }
  
	} 
	
	public function setAnoveh($v)
	{

    if ($this->anoveh !== $v) {
        $this->anoveh = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodvehPeer::ANOVEH;
      }
  
	} 
	
	public function setSermot($v)
	{

    if ($this->sermot !== $v) {
        $this->sermot = $v;
        $this->modifiedColumns[] = FcmodvehPeer::SERMOT;
      }
  
	} 
	
	public function setSercar($v)
	{

    if ($this->sercar !== $v) {
        $this->sercar = $v;
        $this->modifiedColumns[] = FcmodvehPeer::SERCAR;
      }
  
	} 
	
	public function setMarveh($v)
	{

    if ($this->marveh !== $v) {
        $this->marveh = $v;
        $this->modifiedColumns[] = FcmodvehPeer::MARVEH;
      }
  
	} 
	
	public function setColveh($v)
	{

    if ($this->colveh !== $v) {
        $this->colveh = $v;
        $this->modifiedColumns[] = FcmodvehPeer::COLVEH;
      }
  
	} 
	
	public function setValori($v)
	{

    if ($this->valori !== $v) {
        $this->valori = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodvehPeer::VALORI;
      }
  
	} 
	
	public function setModveh($v)
	{

    if ($this->modveh !== $v) {
        $this->modveh = $v;
        $this->modifiedColumns[] = FcmodvehPeer::MODVEH;
      }
  
	} 
	
	public function setDueant($v)
	{

    if ($this->dueant !== $v) {
        $this->dueant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::DUEANT;
      }
  
	} 
	
	public function setDirant($v)
	{

    if ($this->dirant !== $v) {
        $this->dirant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::DIRANT;
      }
  
	} 
	
	public function setPlaant($v)
	{

    if ($this->plaant !== $v) {
        $this->plaant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::PLAANT;
      }
  
	} 
	
	public function setCodusoant($v)
	{

    if ($this->codusoant !== $v) {
        $this->codusoant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::CODUSOANT;
      }
  
	} 
	
	public function setAnovehant($v)
	{

    if ($this->anovehant !== $v) {
        $this->anovehant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodvehPeer::ANOVEHANT;
      }
  
	} 
	
	public function setSermotant($v)
	{

    if ($this->sermotant !== $v) {
        $this->sermotant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::SERMOTANT;
      }
  
	} 
	
	public function setSercarant($v)
	{

    if ($this->sercarant !== $v) {
        $this->sercarant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::SERCARANT;
      }
  
	} 
	
	public function setMarvehant($v)
	{

    if ($this->marvehant !== $v) {
        $this->marvehant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::MARVEHANT;
      }
  
	} 
	
	public function setColvehant($v)
	{

    if ($this->colvehant !== $v) {
        $this->colvehant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::COLVEHANT;
      }
  
	} 
	
	public function setValoriant($v)
	{

    if ($this->valoriant !== $v) {
        $this->valoriant = Herramientas::toFloat($v);
        $this->modifiedColumns[] = FcmodvehPeer::VALORIANT;
      }
  
	} 
	
	public function setModvehant($v)
	{

    if ($this->modvehant !== $v) {
        $this->modvehant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::MODVEHANT;
      }
  
	} 
	
	public function setDueantant($v)
	{

    if ($this->dueantant !== $v) {
        $this->dueantant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::DUEANTANT;
      }
  
	} 
	
	public function setDirantant($v)
	{

    if ($this->dirantant !== $v) {
        $this->dirantant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::DIRANTANT;
      }
  
	} 
	
	public function setPlaantant($v)
	{

    if ($this->plaantant !== $v) {
        $this->plaantant = $v;
        $this->modifiedColumns[] = FcmodvehPeer::PLAANTANT;
      }
  
	} 
	
	public function setFunrec($v)
	{

    if ($this->funrec !== $v) {
        $this->funrec = $v;
        $this->modifiedColumns[] = FcmodvehPeer::FUNREC;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = FcmodvehPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->refmod = $rs->getString($startcol + 0);

      $this->plaveh = $rs->getString($startcol + 1);

      $this->fecmod = $rs->getDate($startcol + 2, null);

      $this->coduso = $rs->getString($startcol + 3);

      $this->anoveh = $rs->getFloat($startcol + 4);

      $this->sermot = $rs->getString($startcol + 5);

      $this->sercar = $rs->getString($startcol + 6);

      $this->marveh = $rs->getString($startcol + 7);

      $this->colveh = $rs->getString($startcol + 8);

      $this->valori = $rs->getFloat($startcol + 9);

      $this->modveh = $rs->getString($startcol + 10);

      $this->dueant = $rs->getString($startcol + 11);

      $this->dirant = $rs->getString($startcol + 12);

      $this->plaant = $rs->getString($startcol + 13);

      $this->codusoant = $rs->getString($startcol + 14);

      $this->anovehant = $rs->getFloat($startcol + 15);

      $this->sermotant = $rs->getString($startcol + 16);

      $this->sercarant = $rs->getString($startcol + 17);

      $this->marvehant = $rs->getString($startcol + 18);

      $this->colvehant = $rs->getString($startcol + 19);

      $this->valoriant = $rs->getFloat($startcol + 20);

      $this->modvehant = $rs->getString($startcol + 21);

      $this->dueantant = $rs->getString($startcol + 22);

      $this->dirantant = $rs->getString($startcol + 23);

      $this->plaantant = $rs->getString($startcol + 24);

      $this->funrec = $rs->getString($startcol + 25);

      $this->id = $rs->getInt($startcol + 26);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 27; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Fcmodveh object", $e);
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
			$con = Propel::getConnection(FcmodvehPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcmodvehPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcmodvehPeer::DATABASE_NAME);
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
					$pk = FcmodvehPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FcmodvehPeer::doUpdate($this, $con);
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


			if (($retval = FcmodvehPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getRefmod();
				break;
			case 1:
				return $this->getPlaveh();
				break;
			case 2:
				return $this->getFecmod();
				break;
			case 3:
				return $this->getCoduso();
				break;
			case 4:
				return $this->getAnoveh();
				break;
			case 5:
				return $this->getSermot();
				break;
			case 6:
				return $this->getSercar();
				break;
			case 7:
				return $this->getMarveh();
				break;
			case 8:
				return $this->getColveh();
				break;
			case 9:
				return $this->getValori();
				break;
			case 10:
				return $this->getModveh();
				break;
			case 11:
				return $this->getDueant();
				break;
			case 12:
				return $this->getDirant();
				break;
			case 13:
				return $this->getPlaant();
				break;
			case 14:
				return $this->getCodusoant();
				break;
			case 15:
				return $this->getAnovehant();
				break;
			case 16:
				return $this->getSermotant();
				break;
			case 17:
				return $this->getSercarant();
				break;
			case 18:
				return $this->getMarvehant();
				break;
			case 19:
				return $this->getColvehant();
				break;
			case 20:
				return $this->getValoriant();
				break;
			case 21:
				return $this->getModvehant();
				break;
			case 22:
				return $this->getDueantant();
				break;
			case 23:
				return $this->getDirantant();
				break;
			case 24:
				return $this->getPlaantant();
				break;
			case 25:
				return $this->getFunrec();
				break;
			case 26:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodvehPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getRefmod(),
			$keys[1] => $this->getPlaveh(),
			$keys[2] => $this->getFecmod(),
			$keys[3] => $this->getCoduso(),
			$keys[4] => $this->getAnoveh(),
			$keys[5] => $this->getSermot(),
			$keys[6] => $this->getSercar(),
			$keys[7] => $this->getMarveh(),
			$keys[8] => $this->getColveh(),
			$keys[9] => $this->getValori(),
			$keys[10] => $this->getModveh(),
			$keys[11] => $this->getDueant(),
			$keys[12] => $this->getDirant(),
			$keys[13] => $this->getPlaant(),
			$keys[14] => $this->getCodusoant(),
			$keys[15] => $this->getAnovehant(),
			$keys[16] => $this->getSermotant(),
			$keys[17] => $this->getSercarant(),
			$keys[18] => $this->getMarvehant(),
			$keys[19] => $this->getColvehant(),
			$keys[20] => $this->getValoriant(),
			$keys[21] => $this->getModvehant(),
			$keys[22] => $this->getDueantant(),
			$keys[23] => $this->getDirantant(),
			$keys[24] => $this->getPlaantant(),
			$keys[25] => $this->getFunrec(),
			$keys[26] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcmodvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setRefmod($value);
				break;
			case 1:
				$this->setPlaveh($value);
				break;
			case 2:
				$this->setFecmod($value);
				break;
			case 3:
				$this->setCoduso($value);
				break;
			case 4:
				$this->setAnoveh($value);
				break;
			case 5:
				$this->setSermot($value);
				break;
			case 6:
				$this->setSercar($value);
				break;
			case 7:
				$this->setMarveh($value);
				break;
			case 8:
				$this->setColveh($value);
				break;
			case 9:
				$this->setValori($value);
				break;
			case 10:
				$this->setModveh($value);
				break;
			case 11:
				$this->setDueant($value);
				break;
			case 12:
				$this->setDirant($value);
				break;
			case 13:
				$this->setPlaant($value);
				break;
			case 14:
				$this->setCodusoant($value);
				break;
			case 15:
				$this->setAnovehant($value);
				break;
			case 16:
				$this->setSermotant($value);
				break;
			case 17:
				$this->setSercarant($value);
				break;
			case 18:
				$this->setMarvehant($value);
				break;
			case 19:
				$this->setColvehant($value);
				break;
			case 20:
				$this->setValoriant($value);
				break;
			case 21:
				$this->setModvehant($value);
				break;
			case 22:
				$this->setDueantant($value);
				break;
			case 23:
				$this->setDirantant($value);
				break;
			case 24:
				$this->setPlaantant($value);
				break;
			case 25:
				$this->setFunrec($value);
				break;
			case 26:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcmodvehPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setRefmod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPlaveh($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFecmod($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCoduso($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnoveh($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSermot($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSercar($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMarveh($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setColveh($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setValori($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setModveh($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDueant($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDirant($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPlaant($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodusoant($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAnovehant($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSermotant($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSercarant($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setMarvehant($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setColvehant($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setValoriant($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setModvehant($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDueantant($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDirantant($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPlaantant($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setFunrec($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setId($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcmodvehPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcmodvehPeer::REFMOD)) $criteria->add(FcmodvehPeer::REFMOD, $this->refmod);
		if ($this->isColumnModified(FcmodvehPeer::PLAVEH)) $criteria->add(FcmodvehPeer::PLAVEH, $this->plaveh);
		if ($this->isColumnModified(FcmodvehPeer::FECMOD)) $criteria->add(FcmodvehPeer::FECMOD, $this->fecmod);
		if ($this->isColumnModified(FcmodvehPeer::CODUSO)) $criteria->add(FcmodvehPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcmodvehPeer::ANOVEH)) $criteria->add(FcmodvehPeer::ANOVEH, $this->anoveh);
		if ($this->isColumnModified(FcmodvehPeer::SERMOT)) $criteria->add(FcmodvehPeer::SERMOT, $this->sermot);
		if ($this->isColumnModified(FcmodvehPeer::SERCAR)) $criteria->add(FcmodvehPeer::SERCAR, $this->sercar);
		if ($this->isColumnModified(FcmodvehPeer::MARVEH)) $criteria->add(FcmodvehPeer::MARVEH, $this->marveh);
		if ($this->isColumnModified(FcmodvehPeer::COLVEH)) $criteria->add(FcmodvehPeer::COLVEH, $this->colveh);
		if ($this->isColumnModified(FcmodvehPeer::VALORI)) $criteria->add(FcmodvehPeer::VALORI, $this->valori);
		if ($this->isColumnModified(FcmodvehPeer::MODVEH)) $criteria->add(FcmodvehPeer::MODVEH, $this->modveh);
		if ($this->isColumnModified(FcmodvehPeer::DUEANT)) $criteria->add(FcmodvehPeer::DUEANT, $this->dueant);
		if ($this->isColumnModified(FcmodvehPeer::DIRANT)) $criteria->add(FcmodvehPeer::DIRANT, $this->dirant);
		if ($this->isColumnModified(FcmodvehPeer::PLAANT)) $criteria->add(FcmodvehPeer::PLAANT, $this->plaant);
		if ($this->isColumnModified(FcmodvehPeer::CODUSOANT)) $criteria->add(FcmodvehPeer::CODUSOANT, $this->codusoant);
		if ($this->isColumnModified(FcmodvehPeer::ANOVEHANT)) $criteria->add(FcmodvehPeer::ANOVEHANT, $this->anovehant);
		if ($this->isColumnModified(FcmodvehPeer::SERMOTANT)) $criteria->add(FcmodvehPeer::SERMOTANT, $this->sermotant);
		if ($this->isColumnModified(FcmodvehPeer::SERCARANT)) $criteria->add(FcmodvehPeer::SERCARANT, $this->sercarant);
		if ($this->isColumnModified(FcmodvehPeer::MARVEHANT)) $criteria->add(FcmodvehPeer::MARVEHANT, $this->marvehant);
		if ($this->isColumnModified(FcmodvehPeer::COLVEHANT)) $criteria->add(FcmodvehPeer::COLVEHANT, $this->colvehant);
		if ($this->isColumnModified(FcmodvehPeer::VALORIANT)) $criteria->add(FcmodvehPeer::VALORIANT, $this->valoriant);
		if ($this->isColumnModified(FcmodvehPeer::MODVEHANT)) $criteria->add(FcmodvehPeer::MODVEHANT, $this->modvehant);
		if ($this->isColumnModified(FcmodvehPeer::DUEANTANT)) $criteria->add(FcmodvehPeer::DUEANTANT, $this->dueantant);
		if ($this->isColumnModified(FcmodvehPeer::DIRANTANT)) $criteria->add(FcmodvehPeer::DIRANTANT, $this->dirantant);
		if ($this->isColumnModified(FcmodvehPeer::PLAANTANT)) $criteria->add(FcmodvehPeer::PLAANTANT, $this->plaantant);
		if ($this->isColumnModified(FcmodvehPeer::FUNREC)) $criteria->add(FcmodvehPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcmodvehPeer::ID)) $criteria->add(FcmodvehPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcmodvehPeer::DATABASE_NAME);

		$criteria->add(FcmodvehPeer::ID, $this->id);

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

		$copyObj->setRefmod($this->refmod);

		$copyObj->setPlaveh($this->plaveh);

		$copyObj->setFecmod($this->fecmod);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setAnoveh($this->anoveh);

		$copyObj->setSermot($this->sermot);

		$copyObj->setSercar($this->sercar);

		$copyObj->setMarveh($this->marveh);

		$copyObj->setColveh($this->colveh);

		$copyObj->setValori($this->valori);

		$copyObj->setModveh($this->modveh);

		$copyObj->setDueant($this->dueant);

		$copyObj->setDirant($this->dirant);

		$copyObj->setPlaant($this->plaant);

		$copyObj->setCodusoant($this->codusoant);

		$copyObj->setAnovehant($this->anovehant);

		$copyObj->setSermotant($this->sermotant);

		$copyObj->setSercarant($this->sercarant);

		$copyObj->setMarvehant($this->marvehant);

		$copyObj->setColvehant($this->colvehant);

		$copyObj->setValoriant($this->valoriant);

		$copyObj->setModvehant($this->modvehant);

		$copyObj->setDueantant($this->dueantant);

		$copyObj->setDirantant($this->dirantant);

		$copyObj->setPlaantant($this->plaantant);

		$copyObj->setFunrec($this->funrec);


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
			self::$peer = new FcmodvehPeer();
		}
		return self::$peer;
	}

} 