<?php


abstract class BaseFcfuepre extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codfue;


	
	protected $nomfue;


	
	protected $nomabr;


	
	protected $frecob;


	
	protected $monmor;


	
	protected $permor;


	
	protected $propag;


	
	protected $perppg;


	
	protected $liqact;


	
	protected $deufec;


	
	protected $recfec;


	
	protected $fecufa;


	
	protected $ingrec;


	
	protected $fueing;


	
	protected $inieje;


	
	protected $fineje;


	
	protected $diavso;


	
	protected $codprei;


	
	protected $deufra;


	
	protected $autliq;


	
	protected $simpre;


	
	protected $feccie;


	
	protected $tipmul;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodfue()
	{

		return $this->codfue;
	}

	
	public function getNomfue()
	{

		return $this->nomfue;
	}

	
	public function getNomabr()
	{

		return $this->nomabr;
	}

	
	public function getFrecob()
	{

		return $this->frecob;
	}

	
	public function getMonmor()
	{

		return $this->monmor;
	}

	
	public function getPermor()
	{

		return $this->permor;
	}

	
	public function getPropag()
	{

		return $this->propag;
	}

	
	public function getPerppg()
	{

		return $this->perppg;
	}

	
	public function getLiqact()
	{

		return $this->liqact;
	}

	
	public function getDeufec()
	{

		return $this->deufec;
	}

	
	public function getRecfec()
	{

		return $this->recfec;
	}

	
	public function getFecufa($format = 'Y-m-d')
	{

		if ($this->fecufa === null || $this->fecufa === '') {
			return null;
		} elseif (!is_int($this->fecufa)) {
						$ts = strtotime($this->fecufa);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecufa] as date/time value: " . var_export($this->fecufa, true));
			}
		} else {
			$ts = $this->fecufa;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIngrec()
	{

		return $this->ingrec;
	}

	
	public function getFueing()
	{

		return $this->fueing;
	}

	
	public function getInieje($format = 'Y-m-d')
	{

		if ($this->inieje === null || $this->inieje === '') {
			return null;
		} elseif (!is_int($this->inieje)) {
						$ts = strtotime($this->inieje);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [inieje] as date/time value: " . var_export($this->inieje, true));
			}
		} else {
			$ts = $this->inieje;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFineje($format = 'Y-m-d')
	{

		if ($this->fineje === null || $this->fineje === '') {
			return null;
		} elseif (!is_int($this->fineje)) {
						$ts = strtotime($this->fineje);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fineje] as date/time value: " . var_export($this->fineje, true));
			}
		} else {
			$ts = $this->fineje;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDiavso()
	{

		return $this->diavso;
	}

	
	public function getCodprei()
	{

		return $this->codprei;
	}

	
	public function getDeufra()
	{

		return $this->deufra;
	}

	
	public function getAutliq()
	{

		return $this->autliq;
	}

	
	public function getSimpre()
	{

		return $this->simpre;
	}

	
	public function getFeccie($format = 'Y-m-d')
	{

		if ($this->feccie === null || $this->feccie === '') {
			return null;
		} elseif (!is_int($this->feccie)) {
						$ts = strtotime($this->feccie);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [feccie] as date/time value: " . var_export($this->feccie, true));
			}
		} else {
			$ts = $this->feccie;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTipmul()
	{

		return $this->tipmul;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodfue($v)
	{

		if ($this->codfue !== $v) {
			$this->codfue = $v;
			$this->modifiedColumns[] = FcfueprePeer::CODFUE;
		}

	} 
	
	public function setNomfue($v)
	{

		if ($this->nomfue !== $v) {
			$this->nomfue = $v;
			$this->modifiedColumns[] = FcfueprePeer::NOMFUE;
		}

	} 
	
	public function setNomabr($v)
	{

		if ($this->nomabr !== $v) {
			$this->nomabr = $v;
			$this->modifiedColumns[] = FcfueprePeer::NOMABR;
		}

	} 
	
	public function setFrecob($v)
	{

		if ($this->frecob !== $v) {
			$this->frecob = $v;
			$this->modifiedColumns[] = FcfueprePeer::FRECOB;
		}

	} 
	
	public function setMonmor($v)
	{

		if ($this->monmor !== $v) {
			$this->monmor = $v;
			$this->modifiedColumns[] = FcfueprePeer::MONMOR;
		}

	} 
	
	public function setPermor($v)
	{

		if ($this->permor !== $v) {
			$this->permor = $v;
			$this->modifiedColumns[] = FcfueprePeer::PERMOR;
		}

	} 
	
	public function setPropag($v)
	{

		if ($this->propag !== $v) {
			$this->propag = $v;
			$this->modifiedColumns[] = FcfueprePeer::PROPAG;
		}

	} 
	
	public function setPerppg($v)
	{

		if ($this->perppg !== $v) {
			$this->perppg = $v;
			$this->modifiedColumns[] = FcfueprePeer::PERPPG;
		}

	} 
	
	public function setLiqact($v)
	{

		if ($this->liqact !== $v) {
			$this->liqact = $v;
			$this->modifiedColumns[] = FcfueprePeer::LIQACT;
		}

	} 
	
	public function setDeufec($v)
	{

		if ($this->deufec !== $v) {
			$this->deufec = $v;
			$this->modifiedColumns[] = FcfueprePeer::DEUFEC;
		}

	} 
	
	public function setRecfec($v)
	{

		if ($this->recfec !== $v) {
			$this->recfec = $v;
			$this->modifiedColumns[] = FcfueprePeer::RECFEC;
		}

	} 
	
	public function setFecufa($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecufa] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecufa !== $ts) {
			$this->fecufa = $ts;
			$this->modifiedColumns[] = FcfueprePeer::FECUFA;
		}

	} 
	
	public function setIngrec($v)
	{

		if ($this->ingrec !== $v) {
			$this->ingrec = $v;
			$this->modifiedColumns[] = FcfueprePeer::INGREC;
		}

	} 
	
	public function setFueing($v)
	{

		if ($this->fueing !== $v) {
			$this->fueing = $v;
			$this->modifiedColumns[] = FcfueprePeer::FUEING;
		}

	} 
	
	public function setInieje($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [inieje] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->inieje !== $ts) {
			$this->inieje = $ts;
			$this->modifiedColumns[] = FcfueprePeer::INIEJE;
		}

	} 
	
	public function setFineje($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fineje] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fineje !== $ts) {
			$this->fineje = $ts;
			$this->modifiedColumns[] = FcfueprePeer::FINEJE;
		}

	} 
	
	public function setDiavso($v)
	{

		if ($this->diavso !== $v) {
			$this->diavso = $v;
			$this->modifiedColumns[] = FcfueprePeer::DIAVSO;
		}

	} 
	
	public function setCodprei($v)
	{

		if ($this->codprei !== $v) {
			$this->codprei = $v;
			$this->modifiedColumns[] = FcfueprePeer::CODPREI;
		}

	} 
	
	public function setDeufra($v)
	{

		if ($this->deufra !== $v) {
			$this->deufra = $v;
			$this->modifiedColumns[] = FcfueprePeer::DEUFRA;
		}

	} 
	
	public function setAutliq($v)
	{

		if ($this->autliq !== $v) {
			$this->autliq = $v;
			$this->modifiedColumns[] = FcfueprePeer::AUTLIQ;
		}

	} 
	
	public function setSimpre($v)
	{

		if ($this->simpre !== $v) {
			$this->simpre = $v;
			$this->modifiedColumns[] = FcfueprePeer::SIMPRE;
		}

	} 
	
	public function setFeccie($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [feccie] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->feccie !== $ts) {
			$this->feccie = $ts;
			$this->modifiedColumns[] = FcfueprePeer::FECCIE;
		}

	} 
	
	public function setTipmul($v)
	{

		if ($this->tipmul !== $v) {
			$this->tipmul = $v;
			$this->modifiedColumns[] = FcfueprePeer::TIPMUL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcfueprePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codfue = $rs->getString($startcol + 0);

			$this->nomfue = $rs->getString($startcol + 1);

			$this->nomabr = $rs->getString($startcol + 2);

			$this->frecob = $rs->getFloat($startcol + 3);

			$this->monmor = $rs->getFloat($startcol + 4);

			$this->permor = $rs->getFloat($startcol + 5);

			$this->propag = $rs->getFloat($startcol + 6);

			$this->perppg = $rs->getFloat($startcol + 7);

			$this->liqact = $rs->getFloat($startcol + 8);

			$this->deufec = $rs->getFloat($startcol + 9);

			$this->recfec = $rs->getFloat($startcol + 10);

			$this->fecufa = $rs->getDate($startcol + 11, null);

			$this->ingrec = $rs->getString($startcol + 12);

			$this->fueing = $rs->getString($startcol + 13);

			$this->inieje = $rs->getDate($startcol + 14, null);

			$this->fineje = $rs->getDate($startcol + 15, null);

			$this->diavso = $rs->getFloat($startcol + 16);

			$this->codprei = $rs->getString($startcol + 17);

			$this->deufra = $rs->getString($startcol + 18);

			$this->autliq = $rs->getString($startcol + 19);

			$this->simpre = $rs->getString($startcol + 20);

			$this->feccie = $rs->getDate($startcol + 21, null);

			$this->tipmul = $rs->getString($startcol + 22);

			$this->id = $rs->getInt($startcol + 23);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 24; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcfuepre object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcfueprePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcfueprePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcfueprePeer::DATABASE_NAME);
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
					$pk = FcfueprePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcfueprePeer::doUpdate($this, $con);
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


			if (($retval = FcfueprePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcfueprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodfue();
				break;
			case 1:
				return $this->getNomfue();
				break;
			case 2:
				return $this->getNomabr();
				break;
			case 3:
				return $this->getFrecob();
				break;
			case 4:
				return $this->getMonmor();
				break;
			case 5:
				return $this->getPermor();
				break;
			case 6:
				return $this->getPropag();
				break;
			case 7:
				return $this->getPerppg();
				break;
			case 8:
				return $this->getLiqact();
				break;
			case 9:
				return $this->getDeufec();
				break;
			case 10:
				return $this->getRecfec();
				break;
			case 11:
				return $this->getFecufa();
				break;
			case 12:
				return $this->getIngrec();
				break;
			case 13:
				return $this->getFueing();
				break;
			case 14:
				return $this->getInieje();
				break;
			case 15:
				return $this->getFineje();
				break;
			case 16:
				return $this->getDiavso();
				break;
			case 17:
				return $this->getCodprei();
				break;
			case 18:
				return $this->getDeufra();
				break;
			case 19:
				return $this->getAutliq();
				break;
			case 20:
				return $this->getSimpre();
				break;
			case 21:
				return $this->getFeccie();
				break;
			case 22:
				return $this->getTipmul();
				break;
			case 23:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcfueprePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodfue(),
			$keys[1] => $this->getNomfue(),
			$keys[2] => $this->getNomabr(),
			$keys[3] => $this->getFrecob(),
			$keys[4] => $this->getMonmor(),
			$keys[5] => $this->getPermor(),
			$keys[6] => $this->getPropag(),
			$keys[7] => $this->getPerppg(),
			$keys[8] => $this->getLiqact(),
			$keys[9] => $this->getDeufec(),
			$keys[10] => $this->getRecfec(),
			$keys[11] => $this->getFecufa(),
			$keys[12] => $this->getIngrec(),
			$keys[13] => $this->getFueing(),
			$keys[14] => $this->getInieje(),
			$keys[15] => $this->getFineje(),
			$keys[16] => $this->getDiavso(),
			$keys[17] => $this->getCodprei(),
			$keys[18] => $this->getDeufra(),
			$keys[19] => $this->getAutliq(),
			$keys[20] => $this->getSimpre(),
			$keys[21] => $this->getFeccie(),
			$keys[22] => $this->getTipmul(),
			$keys[23] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcfueprePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodfue($value);
				break;
			case 1:
				$this->setNomfue($value);
				break;
			case 2:
				$this->setNomabr($value);
				break;
			case 3:
				$this->setFrecob($value);
				break;
			case 4:
				$this->setMonmor($value);
				break;
			case 5:
				$this->setPermor($value);
				break;
			case 6:
				$this->setPropag($value);
				break;
			case 7:
				$this->setPerppg($value);
				break;
			case 8:
				$this->setLiqact($value);
				break;
			case 9:
				$this->setDeufec($value);
				break;
			case 10:
				$this->setRecfec($value);
				break;
			case 11:
				$this->setFecufa($value);
				break;
			case 12:
				$this->setIngrec($value);
				break;
			case 13:
				$this->setFueing($value);
				break;
			case 14:
				$this->setInieje($value);
				break;
			case 15:
				$this->setFineje($value);
				break;
			case 16:
				$this->setDiavso($value);
				break;
			case 17:
				$this->setCodprei($value);
				break;
			case 18:
				$this->setDeufra($value);
				break;
			case 19:
				$this->setAutliq($value);
				break;
			case 20:
				$this->setSimpre($value);
				break;
			case 21:
				$this->setFeccie($value);
				break;
			case 22:
				$this->setTipmul($value);
				break;
			case 23:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcfueprePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodfue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomfue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomabr($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFrecob($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonmor($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPermor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPropag($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPerppg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLiqact($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDeufec($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRecfec($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecufa($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIngrec($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFueing($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setInieje($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFineje($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDiavso($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCodprei($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDeufra($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAutliq($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setSimpre($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFeccie($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTipmul($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setId($arr[$keys[23]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcfueprePeer::DATABASE_NAME);

		if ($this->isColumnModified(FcfueprePeer::CODFUE)) $criteria->add(FcfueprePeer::CODFUE, $this->codfue);
		if ($this->isColumnModified(FcfueprePeer::NOMFUE)) $criteria->add(FcfueprePeer::NOMFUE, $this->nomfue);
		if ($this->isColumnModified(FcfueprePeer::NOMABR)) $criteria->add(FcfueprePeer::NOMABR, $this->nomabr);
		if ($this->isColumnModified(FcfueprePeer::FRECOB)) $criteria->add(FcfueprePeer::FRECOB, $this->frecob);
		if ($this->isColumnModified(FcfueprePeer::MONMOR)) $criteria->add(FcfueprePeer::MONMOR, $this->monmor);
		if ($this->isColumnModified(FcfueprePeer::PERMOR)) $criteria->add(FcfueprePeer::PERMOR, $this->permor);
		if ($this->isColumnModified(FcfueprePeer::PROPAG)) $criteria->add(FcfueprePeer::PROPAG, $this->propag);
		if ($this->isColumnModified(FcfueprePeer::PERPPG)) $criteria->add(FcfueprePeer::PERPPG, $this->perppg);
		if ($this->isColumnModified(FcfueprePeer::LIQACT)) $criteria->add(FcfueprePeer::LIQACT, $this->liqact);
		if ($this->isColumnModified(FcfueprePeer::DEUFEC)) $criteria->add(FcfueprePeer::DEUFEC, $this->deufec);
		if ($this->isColumnModified(FcfueprePeer::RECFEC)) $criteria->add(FcfueprePeer::RECFEC, $this->recfec);
		if ($this->isColumnModified(FcfueprePeer::FECUFA)) $criteria->add(FcfueprePeer::FECUFA, $this->fecufa);
		if ($this->isColumnModified(FcfueprePeer::INGREC)) $criteria->add(FcfueprePeer::INGREC, $this->ingrec);
		if ($this->isColumnModified(FcfueprePeer::FUEING)) $criteria->add(FcfueprePeer::FUEING, $this->fueing);
		if ($this->isColumnModified(FcfueprePeer::INIEJE)) $criteria->add(FcfueprePeer::INIEJE, $this->inieje);
		if ($this->isColumnModified(FcfueprePeer::FINEJE)) $criteria->add(FcfueprePeer::FINEJE, $this->fineje);
		if ($this->isColumnModified(FcfueprePeer::DIAVSO)) $criteria->add(FcfueprePeer::DIAVSO, $this->diavso);
		if ($this->isColumnModified(FcfueprePeer::CODPREI)) $criteria->add(FcfueprePeer::CODPREI, $this->codprei);
		if ($this->isColumnModified(FcfueprePeer::DEUFRA)) $criteria->add(FcfueprePeer::DEUFRA, $this->deufra);
		if ($this->isColumnModified(FcfueprePeer::AUTLIQ)) $criteria->add(FcfueprePeer::AUTLIQ, $this->autliq);
		if ($this->isColumnModified(FcfueprePeer::SIMPRE)) $criteria->add(FcfueprePeer::SIMPRE, $this->simpre);
		if ($this->isColumnModified(FcfueprePeer::FECCIE)) $criteria->add(FcfueprePeer::FECCIE, $this->feccie);
		if ($this->isColumnModified(FcfueprePeer::TIPMUL)) $criteria->add(FcfueprePeer::TIPMUL, $this->tipmul);
		if ($this->isColumnModified(FcfueprePeer::ID)) $criteria->add(FcfueprePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcfueprePeer::DATABASE_NAME);

		$criteria->add(FcfueprePeer::CODFUE, $this->codfue);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getCodfue();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setCodfue($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNomfue($this->nomfue);

		$copyObj->setNomabr($this->nomabr);

		$copyObj->setFrecob($this->frecob);

		$copyObj->setMonmor($this->monmor);

		$copyObj->setPermor($this->permor);

		$copyObj->setPropag($this->propag);

		$copyObj->setPerppg($this->perppg);

		$copyObj->setLiqact($this->liqact);

		$copyObj->setDeufec($this->deufec);

		$copyObj->setRecfec($this->recfec);

		$copyObj->setFecufa($this->fecufa);

		$copyObj->setIngrec($this->ingrec);

		$copyObj->setFueing($this->fueing);

		$copyObj->setInieje($this->inieje);

		$copyObj->setFineje($this->fineje);

		$copyObj->setDiavso($this->diavso);

		$copyObj->setCodprei($this->codprei);

		$copyObj->setDeufra($this->deufra);

		$copyObj->setAutliq($this->autliq);

		$copyObj->setSimpre($this->simpre);

		$copyObj->setFeccie($this->feccie);

		$copyObj->setTipmul($this->tipmul);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setCodfue(NULL); 
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
			self::$peer = new FcfueprePeer();
		}
		return self::$peer;
	}

} 