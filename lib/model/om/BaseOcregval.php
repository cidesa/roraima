<?php


abstract class BaseOcregval extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $monval;


	
	protected $salliq;


	
	protected $retacu;


	
	protected $moniva;


	
	protected $amoant;


	
	protected $staval;


	
	protected $poriva;


	
	protected $porant;


	
	protected $monpag;


	
	protected $salant;


	
	protected $gasree;


	
	protected $subtot;


	
	protected $monful;


	
	protected $monfia;


	
	protected $monant;


	
	protected $monperiva;


	
	protected $codcon;


	
	protected $numval;


	
	protected $codtipval;


	
	protected $fecini;


	
	protected $fecfin;


	
	protected $fecreg;


	
	protected $aumobr;


	
	protected $disobr;


	
	protected $obrext;


	
	protected $monper;


	
	protected $totded;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMonval()
	{

		return number_format($this->monval,2,',','.');
		
	}
	
	public function getSalliq()
	{

		return number_format($this->salliq,2,',','.');
		
	}
	
	public function getRetacu()
	{

		return number_format($this->retacu,2,',','.');
		
	}
	
	public function getMoniva()
	{

		return number_format($this->moniva,2,',','.');
		
	}
	
	public function getAmoant()
	{

		return number_format($this->amoant,2,',','.');
		
	}
	
	public function getStaval()
	{

		return $this->staval; 		
	}
	
	public function getPoriva()
	{

		return number_format($this->poriva,2,',','.');
		
	}
	
	public function getPorant()
	{

		return number_format($this->porant,2,',','.');
		
	}
	
	public function getMonpag()
	{

		return number_format($this->monpag,2,',','.');
		
	}
	
	public function getSalant()
	{

		return number_format($this->salant,2,',','.');
		
	}
	
	public function getGasree()
	{

		return number_format($this->gasree,2,',','.');
		
	}
	
	public function getSubtot()
	{

		return number_format($this->subtot,2,',','.');
		
	}
	
	public function getMonful()
	{

		return number_format($this->monful,2,',','.');
		
	}
	
	public function getMonfia()
	{

		return number_format($this->monfia,2,',','.');
		
	}
	
	public function getMonant()
	{

		return number_format($this->monant,2,',','.');
		
	}
	
	public function getMonperiva()
	{

		return number_format($this->monperiva,2,',','.');
		
	}
	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getNumval()
	{

		return $this->numval; 		
	}
	
	public function getCodtipval()
	{

		return $this->codtipval; 		
	}
	
	public function getFecini($format = 'Y-m-d')
	{

		if ($this->fecini === null || $this->fecini === '') {
			return null;
		} elseif (!is_int($this->fecini)) {
						$ts = strtotime($this->fecini);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecini] as date/time value: " . var_export($this->fecini, true));
			}
		} else {
			$ts = $this->fecini;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecfin($format = 'Y-m-d')
	{

		if ($this->fecfin === null || $this->fecfin === '') {
			return null;
		} elseif (!is_int($this->fecfin)) {
						$ts = strtotime($this->fecfin);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecfin] as date/time value: " . var_export($this->fecfin, true));
			}
		} else {
			$ts = $this->fecfin;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecreg($format = 'Y-m-d')
	{

		if ($this->fecreg === null || $this->fecreg === '') {
			return null;
		} elseif (!is_int($this->fecreg)) {
						$ts = strtotime($this->fecreg);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecreg] as date/time value: " . var_export($this->fecreg, true));
			}
		} else {
			$ts = $this->fecreg;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAumobr()
	{

		return number_format($this->aumobr,2,',','.');
		
	}
	
	public function getDisobr()
	{

		return number_format($this->disobr,2,',','.');
		
	}
	
	public function getObrext()
	{

		return number_format($this->obrext,2,',','.');
		
	}
	
	public function getMonper()
	{

		return number_format($this->monper,2,',','.');
		
	}
	
	public function getTotded()
	{

		return number_format($this->totded,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setMonval($v)
	{

		if ($this->monval !== $v) {
			$this->monval = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONVAL;
		}

	} 
	
	public function setSalliq($v)
	{

		if ($this->salliq !== $v) {
			$this->salliq = $v;
			$this->modifiedColumns[] = OcregvalPeer::SALLIQ;
		}

	} 
	
	public function setRetacu($v)
	{

		if ($this->retacu !== $v) {
			$this->retacu = $v;
			$this->modifiedColumns[] = OcregvalPeer::RETACU;
		}

	} 
	
	public function setMoniva($v)
	{

		if ($this->moniva !== $v) {
			$this->moniva = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONIVA;
		}

	} 
	
	public function setAmoant($v)
	{

		if ($this->amoant !== $v) {
			$this->amoant = $v;
			$this->modifiedColumns[] = OcregvalPeer::AMOANT;
		}

	} 
	
	public function setStaval($v)
	{

		if ($this->staval !== $v) {
			$this->staval = $v;
			$this->modifiedColumns[] = OcregvalPeer::STAVAL;
		}

	} 
	
	public function setPoriva($v)
	{

		if ($this->poriva !== $v) {
			$this->poriva = $v;
			$this->modifiedColumns[] = OcregvalPeer::PORIVA;
		}

	} 
	
	public function setPorant($v)
	{

		if ($this->porant !== $v) {
			$this->porant = $v;
			$this->modifiedColumns[] = OcregvalPeer::PORANT;
		}

	} 
	
	public function setMonpag($v)
	{

		if ($this->monpag !== $v) {
			$this->monpag = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONPAG;
		}

	} 
	
	public function setSalant($v)
	{

		if ($this->salant !== $v) {
			$this->salant = $v;
			$this->modifiedColumns[] = OcregvalPeer::SALANT;
		}

	} 
	
	public function setGasree($v)
	{

		if ($this->gasree !== $v) {
			$this->gasree = $v;
			$this->modifiedColumns[] = OcregvalPeer::GASREE;
		}

	} 
	
	public function setSubtot($v)
	{

		if ($this->subtot !== $v) {
			$this->subtot = $v;
			$this->modifiedColumns[] = OcregvalPeer::SUBTOT;
		}

	} 
	
	public function setMonful($v)
	{

		if ($this->monful !== $v) {
			$this->monful = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONFUL;
		}

	} 
	
	public function setMonfia($v)
	{

		if ($this->monfia !== $v) {
			$this->monfia = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONFIA;
		}

	} 
	
	public function setMonant($v)
	{

		if ($this->monant !== $v) {
			$this->monant = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONANT;
		}

	} 
	
	public function setMonperiva($v)
	{

		if ($this->monperiva !== $v) {
			$this->monperiva = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONPERIVA;
		}

	} 
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = OcregvalPeer::CODCON;
		}

	} 
	
	public function setNumval($v)
	{

		if ($this->numval !== $v) {
			$this->numval = $v;
			$this->modifiedColumns[] = OcregvalPeer::NUMVAL;
		}

	} 
	
	public function setCodtipval($v)
	{

		if ($this->codtipval !== $v) {
			$this->codtipval = $v;
			$this->modifiedColumns[] = OcregvalPeer::CODTIPVAL;
		}

	} 
	
	public function setFecini($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecini] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecini !== $ts) {
			$this->fecini = $ts;
			$this->modifiedColumns[] = OcregvalPeer::FECINI;
		}

	} 
	
	public function setFecfin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecfin] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecfin !== $ts) {
			$this->fecfin = $ts;
			$this->modifiedColumns[] = OcregvalPeer::FECFIN;
		}

	} 
	
	public function setFecreg($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecreg] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecreg !== $ts) {
			$this->fecreg = $ts;
			$this->modifiedColumns[] = OcregvalPeer::FECREG;
		}

	} 
	
	public function setAumobr($v)
	{

		if ($this->aumobr !== $v) {
			$this->aumobr = $v;
			$this->modifiedColumns[] = OcregvalPeer::AUMOBR;
		}

	} 
	
	public function setDisobr($v)
	{

		if ($this->disobr !== $v) {
			$this->disobr = $v;
			$this->modifiedColumns[] = OcregvalPeer::DISOBR;
		}

	} 
	
	public function setObrext($v)
	{

		if ($this->obrext !== $v) {
			$this->obrext = $v;
			$this->modifiedColumns[] = OcregvalPeer::OBREXT;
		}

	} 
	
	public function setMonper($v)
	{

		if ($this->monper !== $v) {
			$this->monper = $v;
			$this->modifiedColumns[] = OcregvalPeer::MONPER;
		}

	} 
	
	public function setTotded($v)
	{

		if ($this->totded !== $v) {
			$this->totded = $v;
			$this->modifiedColumns[] = OcregvalPeer::TOTDED;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcregvalPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->monval = $rs->getFloat($startcol + 0);

			$this->salliq = $rs->getFloat($startcol + 1);

			$this->retacu = $rs->getFloat($startcol + 2);

			$this->moniva = $rs->getFloat($startcol + 3);

			$this->amoant = $rs->getFloat($startcol + 4);

			$this->staval = $rs->getString($startcol + 5);

			$this->poriva = $rs->getFloat($startcol + 6);

			$this->porant = $rs->getFloat($startcol + 7);

			$this->monpag = $rs->getFloat($startcol + 8);

			$this->salant = $rs->getFloat($startcol + 9);

			$this->gasree = $rs->getFloat($startcol + 10);

			$this->subtot = $rs->getFloat($startcol + 11);

			$this->monful = $rs->getFloat($startcol + 12);

			$this->monfia = $rs->getFloat($startcol + 13);

			$this->monant = $rs->getFloat($startcol + 14);

			$this->monperiva = $rs->getFloat($startcol + 15);

			$this->codcon = $rs->getString($startcol + 16);

			$this->numval = $rs->getString($startcol + 17);

			$this->codtipval = $rs->getString($startcol + 18);

			$this->fecini = $rs->getDate($startcol + 19, null);

			$this->fecfin = $rs->getDate($startcol + 20, null);

			$this->fecreg = $rs->getDate($startcol + 21, null);

			$this->aumobr = $rs->getFloat($startcol + 22);

			$this->disobr = $rs->getFloat($startcol + 23);

			$this->obrext = $rs->getFloat($startcol + 24);

			$this->monper = $rs->getFloat($startcol + 25);

			$this->totded = $rs->getFloat($startcol + 26);

			$this->id = $rs->getInt($startcol + 27);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 28; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocregval object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcregvalPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcregvalPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcregvalPeer::DATABASE_NAME);
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
					$pk = OcregvalPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcregvalPeer::doUpdate($this, $con);
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


			if (($retval = OcregvalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMonval();
				break;
			case 1:
				return $this->getSalliq();
				break;
			case 2:
				return $this->getRetacu();
				break;
			case 3:
				return $this->getMoniva();
				break;
			case 4:
				return $this->getAmoant();
				break;
			case 5:
				return $this->getStaval();
				break;
			case 6:
				return $this->getPoriva();
				break;
			case 7:
				return $this->getPorant();
				break;
			case 8:
				return $this->getMonpag();
				break;
			case 9:
				return $this->getSalant();
				break;
			case 10:
				return $this->getGasree();
				break;
			case 11:
				return $this->getSubtot();
				break;
			case 12:
				return $this->getMonful();
				break;
			case 13:
				return $this->getMonfia();
				break;
			case 14:
				return $this->getMonant();
				break;
			case 15:
				return $this->getMonperiva();
				break;
			case 16:
				return $this->getCodcon();
				break;
			case 17:
				return $this->getNumval();
				break;
			case 18:
				return $this->getCodtipval();
				break;
			case 19:
				return $this->getFecini();
				break;
			case 20:
				return $this->getFecfin();
				break;
			case 21:
				return $this->getFecreg();
				break;
			case 22:
				return $this->getAumobr();
				break;
			case 23:
				return $this->getDisobr();
				break;
			case 24:
				return $this->getObrext();
				break;
			case 25:
				return $this->getMonper();
				break;
			case 26:
				return $this->getTotded();
				break;
			case 27:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregvalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMonval(),
			$keys[1] => $this->getSalliq(),
			$keys[2] => $this->getRetacu(),
			$keys[3] => $this->getMoniva(),
			$keys[4] => $this->getAmoant(),
			$keys[5] => $this->getStaval(),
			$keys[6] => $this->getPoriva(),
			$keys[7] => $this->getPorant(),
			$keys[8] => $this->getMonpag(),
			$keys[9] => $this->getSalant(),
			$keys[10] => $this->getGasree(),
			$keys[11] => $this->getSubtot(),
			$keys[12] => $this->getMonful(),
			$keys[13] => $this->getMonfia(),
			$keys[14] => $this->getMonant(),
			$keys[15] => $this->getMonperiva(),
			$keys[16] => $this->getCodcon(),
			$keys[17] => $this->getNumval(),
			$keys[18] => $this->getCodtipval(),
			$keys[19] => $this->getFecini(),
			$keys[20] => $this->getFecfin(),
			$keys[21] => $this->getFecreg(),
			$keys[22] => $this->getAumobr(),
			$keys[23] => $this->getDisobr(),
			$keys[24] => $this->getObrext(),
			$keys[25] => $this->getMonper(),
			$keys[26] => $this->getTotded(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcregvalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMonval($value);
				break;
			case 1:
				$this->setSalliq($value);
				break;
			case 2:
				$this->setRetacu($value);
				break;
			case 3:
				$this->setMoniva($value);
				break;
			case 4:
				$this->setAmoant($value);
				break;
			case 5:
				$this->setStaval($value);
				break;
			case 6:
				$this->setPoriva($value);
				break;
			case 7:
				$this->setPorant($value);
				break;
			case 8:
				$this->setMonpag($value);
				break;
			case 9:
				$this->setSalant($value);
				break;
			case 10:
				$this->setGasree($value);
				break;
			case 11:
				$this->setSubtot($value);
				break;
			case 12:
				$this->setMonful($value);
				break;
			case 13:
				$this->setMonfia($value);
				break;
			case 14:
				$this->setMonant($value);
				break;
			case 15:
				$this->setMonperiva($value);
				break;
			case 16:
				$this->setCodcon($value);
				break;
			case 17:
				$this->setNumval($value);
				break;
			case 18:
				$this->setCodtipval($value);
				break;
			case 19:
				$this->setFecini($value);
				break;
			case 20:
				$this->setFecfin($value);
				break;
			case 21:
				$this->setFecreg($value);
				break;
			case 22:
				$this->setAumobr($value);
				break;
			case 23:
				$this->setDisobr($value);
				break;
			case 24:
				$this->setObrext($value);
				break;
			case 25:
				$this->setMonper($value);
				break;
			case 26:
				$this->setTotded($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcregvalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMonval($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSalliq($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRetacu($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMoniva($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAmoant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStaval($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPoriva($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPorant($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonpag($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSalant($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setGasree($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSubtot($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonful($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMonfia($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMonant($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMonperiva($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodcon($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNumval($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCodtipval($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setFecini($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecfin($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecreg($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setAumobr($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDisobr($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setObrext($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setMonper($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTotded($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcregvalPeer::DATABASE_NAME);

		if ($this->isColumnModified(OcregvalPeer::MONVAL)) $criteria->add(OcregvalPeer::MONVAL, $this->monval);
		if ($this->isColumnModified(OcregvalPeer::SALLIQ)) $criteria->add(OcregvalPeer::SALLIQ, $this->salliq);
		if ($this->isColumnModified(OcregvalPeer::RETACU)) $criteria->add(OcregvalPeer::RETACU, $this->retacu);
		if ($this->isColumnModified(OcregvalPeer::MONIVA)) $criteria->add(OcregvalPeer::MONIVA, $this->moniva);
		if ($this->isColumnModified(OcregvalPeer::AMOANT)) $criteria->add(OcregvalPeer::AMOANT, $this->amoant);
		if ($this->isColumnModified(OcregvalPeer::STAVAL)) $criteria->add(OcregvalPeer::STAVAL, $this->staval);
		if ($this->isColumnModified(OcregvalPeer::PORIVA)) $criteria->add(OcregvalPeer::PORIVA, $this->poriva);
		if ($this->isColumnModified(OcregvalPeer::PORANT)) $criteria->add(OcregvalPeer::PORANT, $this->porant);
		if ($this->isColumnModified(OcregvalPeer::MONPAG)) $criteria->add(OcregvalPeer::MONPAG, $this->monpag);
		if ($this->isColumnModified(OcregvalPeer::SALANT)) $criteria->add(OcregvalPeer::SALANT, $this->salant);
		if ($this->isColumnModified(OcregvalPeer::GASREE)) $criteria->add(OcregvalPeer::GASREE, $this->gasree);
		if ($this->isColumnModified(OcregvalPeer::SUBTOT)) $criteria->add(OcregvalPeer::SUBTOT, $this->subtot);
		if ($this->isColumnModified(OcregvalPeer::MONFUL)) $criteria->add(OcregvalPeer::MONFUL, $this->monful);
		if ($this->isColumnModified(OcregvalPeer::MONFIA)) $criteria->add(OcregvalPeer::MONFIA, $this->monfia);
		if ($this->isColumnModified(OcregvalPeer::MONANT)) $criteria->add(OcregvalPeer::MONANT, $this->monant);
		if ($this->isColumnModified(OcregvalPeer::MONPERIVA)) $criteria->add(OcregvalPeer::MONPERIVA, $this->monperiva);
		if ($this->isColumnModified(OcregvalPeer::CODCON)) $criteria->add(OcregvalPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(OcregvalPeer::NUMVAL)) $criteria->add(OcregvalPeer::NUMVAL, $this->numval);
		if ($this->isColumnModified(OcregvalPeer::CODTIPVAL)) $criteria->add(OcregvalPeer::CODTIPVAL, $this->codtipval);
		if ($this->isColumnModified(OcregvalPeer::FECINI)) $criteria->add(OcregvalPeer::FECINI, $this->fecini);
		if ($this->isColumnModified(OcregvalPeer::FECFIN)) $criteria->add(OcregvalPeer::FECFIN, $this->fecfin);
		if ($this->isColumnModified(OcregvalPeer::FECREG)) $criteria->add(OcregvalPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(OcregvalPeer::AUMOBR)) $criteria->add(OcregvalPeer::AUMOBR, $this->aumobr);
		if ($this->isColumnModified(OcregvalPeer::DISOBR)) $criteria->add(OcregvalPeer::DISOBR, $this->disobr);
		if ($this->isColumnModified(OcregvalPeer::OBREXT)) $criteria->add(OcregvalPeer::OBREXT, $this->obrext);
		if ($this->isColumnModified(OcregvalPeer::MONPER)) $criteria->add(OcregvalPeer::MONPER, $this->monper);
		if ($this->isColumnModified(OcregvalPeer::TOTDED)) $criteria->add(OcregvalPeer::TOTDED, $this->totded);
		if ($this->isColumnModified(OcregvalPeer::ID)) $criteria->add(OcregvalPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcregvalPeer::DATABASE_NAME);

		$criteria->add(OcregvalPeer::ID, $this->id);

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

		$copyObj->setMonval($this->monval);

		$copyObj->setSalliq($this->salliq);

		$copyObj->setRetacu($this->retacu);

		$copyObj->setMoniva($this->moniva);

		$copyObj->setAmoant($this->amoant);

		$copyObj->setStaval($this->staval);

		$copyObj->setPoriva($this->poriva);

		$copyObj->setPorant($this->porant);

		$copyObj->setMonpag($this->monpag);

		$copyObj->setSalant($this->salant);

		$copyObj->setGasree($this->gasree);

		$copyObj->setSubtot($this->subtot);

		$copyObj->setMonful($this->monful);

		$copyObj->setMonfia($this->monfia);

		$copyObj->setMonant($this->monant);

		$copyObj->setMonperiva($this->monperiva);

		$copyObj->setCodcon($this->codcon);

		$copyObj->setNumval($this->numval);

		$copyObj->setCodtipval($this->codtipval);

		$copyObj->setFecini($this->fecini);

		$copyObj->setFecfin($this->fecfin);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setAumobr($this->aumobr);

		$copyObj->setDisobr($this->disobr);

		$copyObj->setObrext($this->obrext);

		$copyObj->setMonper($this->monper);

		$copyObj->setTotded($this->totded);


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
			self::$peer = new OcregvalPeer();
		}
		return self::$peer;
	}

} 