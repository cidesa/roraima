<?php


abstract class BaseTsdefban extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $nomcue;


	
	protected $tipcue;


	
	protected $codcta;


	
	protected $fecreg;


	
	protected $fecven;


	
	protected $fecper;


	
	protected $renaut;


	
	protected $porint;


	
	protected $tipint;


	
	protected $numche;


	
	protected $antban;


	
	protected $debban;


	
	protected $creban;


	
	protected $antlib;


	
	protected $deblib;


	
	protected $crelib;


	
	protected $valche;


	
	protected $concil;


	
	protected $plazo;


	
	protected $fecape;


	
	protected $usocue;


	
	protected $tipren;


	
	protected $desenl;


	
	protected $porsalmin;


	
	protected $monsalmin;


	
	protected $codctaprecoo;


	
	protected $codctapreord;


	
	protected $trasitoria;


	
	protected $salact;


	
	protected $fecaper;


	
	protected $temnumcue;


	
	protected $cantdig;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNumcue()
	{

		return $this->numcue; 		
	}
	
	public function getNomcue()
	{

		return $this->nomcue; 		
	}
	
	public function getTipcue()
	{

		return $this->tipcue; 		
	}
	
	public function getCodcta()
	{

		return $this->codcta; 		
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

	
	public function getFecven($format = 'Y-m-d')
	{

		if ($this->fecven === null || $this->fecven === '') {
			return null;
		} elseif (!is_int($this->fecven)) {
						$ts = strtotime($this->fecven);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecven] as date/time value: " . var_export($this->fecven, true));
			}
		} else {
			$ts = $this->fecven;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getFecper($format = 'Y-m-d')
	{

		if ($this->fecper === null || $this->fecper === '') {
			return null;
		} elseif (!is_int($this->fecper)) {
						$ts = strtotime($this->fecper);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecper] as date/time value: " . var_export($this->fecper, true));
			}
		} else {
			$ts = $this->fecper;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getRenaut()
	{

		return $this->renaut; 		
	}
	
	public function getPorint()
	{

		return number_format($this->porint,2,',','.');
		
	}
	
	public function getTipint()
	{

		return $this->tipint; 		
	}
	
	public function getNumche()
	{

		return $this->numche; 		
	}
	
	public function getAntban()
	{

		return number_format($this->antban,2,',','.');
		
	}
	
	public function getDebban()
	{

		return number_format($this->debban,2,',','.');
		
	}
	
	public function getCreban()
	{

		return number_format($this->creban,2,',','.');
		
	}
	
	public function getAntlib()
	{

		return number_format($this->antlib,2,',','.');
		
	}
	
	public function getDeblib()
	{

		return number_format($this->deblib,2,',','.');
		
	}
	
	public function getCrelib()
	{

		return number_format($this->crelib,2,',','.');
		
	}
	
	public function getValche()
	{

		return number_format($this->valche,2,',','.');
		
	}
	
	public function getConcil()
	{

		return $this->concil; 		
	}
	
	public function getPlazo()
	{

		return number_format($this->plazo,2,',','.');
		
	}
	
	public function getFecape($format = 'Y-m-d')
	{

		if ($this->fecape === null || $this->fecape === '') {
			return null;
		} elseif (!is_int($this->fecape)) {
						$ts = strtotime($this->fecape);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecape] as date/time value: " . var_export($this->fecape, true));
			}
		} else {
			$ts = $this->fecape;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUsocue()
	{

		return $this->usocue; 		
	}
	
	public function getTipren()
	{

		return $this->tipren; 		
	}
	
	public function getDesenl()
	{

		return $this->desenl; 		
	}
	
	public function getPorsalmin()
	{

		return number_format($this->porsalmin,2,',','.');
		
	}
	
	public function getMonsalmin()
	{

		return number_format($this->monsalmin,2,',','.');
		
	}
	
	public function getCodctaprecoo()
	{

		return $this->codctaprecoo; 		
	}
	
	public function getCodctapreord()
	{

		return $this->codctapreord; 		
	}
	
	public function getTrasitoria()
	{

		return $this->trasitoria; 		
	}
	
	public function getSalact()
	{

		return number_format($this->salact,2,',','.');
		
	}
	
	public function getFecaper($format = 'Y-m-d')
	{

		if ($this->fecaper === null || $this->fecaper === '') {
			return null;
		} elseif (!is_int($this->fecaper)) {
						$ts = strtotime($this->fecaper);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecaper] as date/time value: " . var_export($this->fecaper, true));
			}
		} else {
			$ts = $this->fecaper;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTemnumcue()
	{

		return $this->temnumcue; 		
	}
	
	public function getCantdig()
	{

		return number_format($this->cantdig,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setNumcue($v)
	{

		if ($this->numcue !== $v) {
			$this->numcue = $v;
			$this->modifiedColumns[] = TsdefbanPeer::NUMCUE;
		}

	} 
	
	public function setNomcue($v)
	{

		if ($this->nomcue !== $v) {
			$this->nomcue = $v;
			$this->modifiedColumns[] = TsdefbanPeer::NOMCUE;
		}

	} 
	
	public function setTipcue($v)
	{

		if ($this->tipcue !== $v) {
			$this->tipcue = $v;
			$this->modifiedColumns[] = TsdefbanPeer::TIPCUE;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CODCTA;
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
			$this->modifiedColumns[] = TsdefbanPeer::FECREG;
		}

	} 
	
	public function setFecven($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecven] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecven !== $ts) {
			$this->fecven = $ts;
			$this->modifiedColumns[] = TsdefbanPeer::FECVEN;
		}

	} 
	
	public function setFecper($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecper] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecper !== $ts) {
			$this->fecper = $ts;
			$this->modifiedColumns[] = TsdefbanPeer::FECPER;
		}

	} 
	
	public function setRenaut($v)
	{

		if ($this->renaut !== $v) {
			$this->renaut = $v;
			$this->modifiedColumns[] = TsdefbanPeer::RENAUT;
		}

	} 
	
	public function setPorint($v)
	{

		if ($this->porint !== $v) {
			$this->porint = $v;
			$this->modifiedColumns[] = TsdefbanPeer::PORINT;
		}

	} 
	
	public function setTipint($v)
	{

		if ($this->tipint !== $v) {
			$this->tipint = $v;
			$this->modifiedColumns[] = TsdefbanPeer::TIPINT;
		}

	} 
	
	public function setNumche($v)
	{

		if ($this->numche !== $v) {
			$this->numche = $v;
			$this->modifiedColumns[] = TsdefbanPeer::NUMCHE;
		}

	} 
	
	public function setAntban($v)
	{

		if ($this->antban !== $v) {
			$this->antban = $v;
			$this->modifiedColumns[] = TsdefbanPeer::ANTBAN;
		}

	} 
	
	public function setDebban($v)
	{

		if ($this->debban !== $v) {
			$this->debban = $v;
			$this->modifiedColumns[] = TsdefbanPeer::DEBBAN;
		}

	} 
	
	public function setCreban($v)
	{

		if ($this->creban !== $v) {
			$this->creban = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CREBAN;
		}

	} 
	
	public function setAntlib($v)
	{

		if ($this->antlib !== $v) {
			$this->antlib = $v;
			$this->modifiedColumns[] = TsdefbanPeer::ANTLIB;
		}

	} 
	
	public function setDeblib($v)
	{

		if ($this->deblib !== $v) {
			$this->deblib = $v;
			$this->modifiedColumns[] = TsdefbanPeer::DEBLIB;
		}

	} 
	
	public function setCrelib($v)
	{

		if ($this->crelib !== $v) {
			$this->crelib = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CRELIB;
		}

	} 
	
	public function setValche($v)
	{

		if ($this->valche !== $v) {
			$this->valche = $v;
			$this->modifiedColumns[] = TsdefbanPeer::VALCHE;
		}

	} 
	
	public function setConcil($v)
	{

		if ($this->concil !== $v) {
			$this->concil = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CONCIL;
		}

	} 
	
	public function setPlazo($v)
	{

		if ($this->plazo !== $v) {
			$this->plazo = $v;
			$this->modifiedColumns[] = TsdefbanPeer::PLAZO;
		}

	} 
	
	public function setFecape($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecape] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecape !== $ts) {
			$this->fecape = $ts;
			$this->modifiedColumns[] = TsdefbanPeer::FECAPE;
		}

	} 
	
	public function setUsocue($v)
	{

		if ($this->usocue !== $v) {
			$this->usocue = $v;
			$this->modifiedColumns[] = TsdefbanPeer::USOCUE;
		}

	} 
	
	public function setTipren($v)
	{

		if ($this->tipren !== $v) {
			$this->tipren = $v;
			$this->modifiedColumns[] = TsdefbanPeer::TIPREN;
		}

	} 
	
	public function setDesenl($v)
	{

		if ($this->desenl !== $v) {
			$this->desenl = $v;
			$this->modifiedColumns[] = TsdefbanPeer::DESENL;
		}

	} 
	
	public function setPorsalmin($v)
	{

		if ($this->porsalmin !== $v) {
			$this->porsalmin = $v;
			$this->modifiedColumns[] = TsdefbanPeer::PORSALMIN;
		}

	} 
	
	public function setMonsalmin($v)
	{

		if ($this->monsalmin !== $v) {
			$this->monsalmin = $v;
			$this->modifiedColumns[] = TsdefbanPeer::MONSALMIN;
		}

	} 
	
	public function setCodctaprecoo($v)
	{

		if ($this->codctaprecoo !== $v) {
			$this->codctaprecoo = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CODCTAPRECOO;
		}

	} 
	
	public function setCodctapreord($v)
	{

		if ($this->codctapreord !== $v) {
			$this->codctapreord = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CODCTAPREORD;
		}

	} 
	
	public function setTrasitoria($v)
	{

		if ($this->trasitoria !== $v) {
			$this->trasitoria = $v;
			$this->modifiedColumns[] = TsdefbanPeer::TRASITORIA;
		}

	} 
	
	public function setSalact($v)
	{

		if ($this->salact !== $v) {
			$this->salact = $v;
			$this->modifiedColumns[] = TsdefbanPeer::SALACT;
		}

	} 
	
	public function setFecaper($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecaper] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecaper !== $ts) {
			$this->fecaper = $ts;
			$this->modifiedColumns[] = TsdefbanPeer::FECAPER;
		}

	} 
	
	public function setTemnumcue($v)
	{

		if ($this->temnumcue !== $v) {
			$this->temnumcue = $v;
			$this->modifiedColumns[] = TsdefbanPeer::TEMNUMCUE;
		}

	} 
	
	public function setCantdig($v)
	{

		if ($this->cantdig !== $v) {
			$this->cantdig = $v;
			$this->modifiedColumns[] = TsdefbanPeer::CANTDIG;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TsdefbanPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->numcue = $rs->getString($startcol + 0);

			$this->nomcue = $rs->getString($startcol + 1);

			$this->tipcue = $rs->getString($startcol + 2);

			$this->codcta = $rs->getString($startcol + 3);

			$this->fecreg = $rs->getDate($startcol + 4, null);

			$this->fecven = $rs->getDate($startcol + 5, null);

			$this->fecper = $rs->getDate($startcol + 6, null);

			$this->renaut = $rs->getString($startcol + 7);

			$this->porint = $rs->getFloat($startcol + 8);

			$this->tipint = $rs->getString($startcol + 9);

			$this->numche = $rs->getString($startcol + 10);

			$this->antban = $rs->getFloat($startcol + 11);

			$this->debban = $rs->getFloat($startcol + 12);

			$this->creban = $rs->getFloat($startcol + 13);

			$this->antlib = $rs->getFloat($startcol + 14);

			$this->deblib = $rs->getFloat($startcol + 15);

			$this->crelib = $rs->getFloat($startcol + 16);

			$this->valche = $rs->getFloat($startcol + 17);

			$this->concil = $rs->getString($startcol + 18);

			$this->plazo = $rs->getFloat($startcol + 19);

			$this->fecape = $rs->getDate($startcol + 20, null);

			$this->usocue = $rs->getString($startcol + 21);

			$this->tipren = $rs->getString($startcol + 22);

			$this->desenl = $rs->getString($startcol + 23);

			$this->porsalmin = $rs->getFloat($startcol + 24);

			$this->monsalmin = $rs->getFloat($startcol + 25);

			$this->codctaprecoo = $rs->getString($startcol + 26);

			$this->codctapreord = $rs->getString($startcol + 27);

			$this->trasitoria = $rs->getString($startcol + 28);

			$this->salact = $rs->getFloat($startcol + 29);

			$this->fecaper = $rs->getDate($startcol + 30, null);

			$this->temnumcue = $rs->getString($startcol + 31);

			$this->cantdig = $rs->getFloat($startcol + 32);

			$this->id = $rs->getInt($startcol + 33);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 34; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Tsdefban object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TsdefbanPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TsdefbanPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TsdefbanPeer::DATABASE_NAME);
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
					$pk = TsdefbanPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += TsdefbanPeer::doUpdate($this, $con);
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


			if (($retval = TsdefbanPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getNomcue();
				break;
			case 2:
				return $this->getTipcue();
				break;
			case 3:
				return $this->getCodcta();
				break;
			case 4:
				return $this->getFecreg();
				break;
			case 5:
				return $this->getFecven();
				break;
			case 6:
				return $this->getFecper();
				break;
			case 7:
				return $this->getRenaut();
				break;
			case 8:
				return $this->getPorint();
				break;
			case 9:
				return $this->getTipint();
				break;
			case 10:
				return $this->getNumche();
				break;
			case 11:
				return $this->getAntban();
				break;
			case 12:
				return $this->getDebban();
				break;
			case 13:
				return $this->getCreban();
				break;
			case 14:
				return $this->getAntlib();
				break;
			case 15:
				return $this->getDeblib();
				break;
			case 16:
				return $this->getCrelib();
				break;
			case 17:
				return $this->getValche();
				break;
			case 18:
				return $this->getConcil();
				break;
			case 19:
				return $this->getPlazo();
				break;
			case 20:
				return $this->getFecape();
				break;
			case 21:
				return $this->getUsocue();
				break;
			case 22:
				return $this->getTipren();
				break;
			case 23:
				return $this->getDesenl();
				break;
			case 24:
				return $this->getPorsalmin();
				break;
			case 25:
				return $this->getMonsalmin();
				break;
			case 26:
				return $this->getCodctaprecoo();
				break;
			case 27:
				return $this->getCodctapreord();
				break;
			case 28:
				return $this->getTrasitoria();
				break;
			case 29:
				return $this->getSalact();
				break;
			case 30:
				return $this->getFecaper();
				break;
			case 31:
				return $this->getTemnumcue();
				break;
			case 32:
				return $this->getCantdig();
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
		$keys = TsdefbanPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getNomcue(),
			$keys[2] => $this->getTipcue(),
			$keys[3] => $this->getCodcta(),
			$keys[4] => $this->getFecreg(),
			$keys[5] => $this->getFecven(),
			$keys[6] => $this->getFecper(),
			$keys[7] => $this->getRenaut(),
			$keys[8] => $this->getPorint(),
			$keys[9] => $this->getTipint(),
			$keys[10] => $this->getNumche(),
			$keys[11] => $this->getAntban(),
			$keys[12] => $this->getDebban(),
			$keys[13] => $this->getCreban(),
			$keys[14] => $this->getAntlib(),
			$keys[15] => $this->getDeblib(),
			$keys[16] => $this->getCrelib(),
			$keys[17] => $this->getValche(),
			$keys[18] => $this->getConcil(),
			$keys[19] => $this->getPlazo(),
			$keys[20] => $this->getFecape(),
			$keys[21] => $this->getUsocue(),
			$keys[22] => $this->getTipren(),
			$keys[23] => $this->getDesenl(),
			$keys[24] => $this->getPorsalmin(),
			$keys[25] => $this->getMonsalmin(),
			$keys[26] => $this->getCodctaprecoo(),
			$keys[27] => $this->getCodctapreord(),
			$keys[28] => $this->getTrasitoria(),
			$keys[29] => $this->getSalact(),
			$keys[30] => $this->getFecaper(),
			$keys[31] => $this->getTemnumcue(),
			$keys[32] => $this->getCantdig(),
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TsdefbanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setNomcue($value);
				break;
			case 2:
				$this->setTipcue($value);
				break;
			case 3:
				$this->setCodcta($value);
				break;
			case 4:
				$this->setFecreg($value);
				break;
			case 5:
				$this->setFecven($value);
				break;
			case 6:
				$this->setFecper($value);
				break;
			case 7:
				$this->setRenaut($value);
				break;
			case 8:
				$this->setPorint($value);
				break;
			case 9:
				$this->setTipint($value);
				break;
			case 10:
				$this->setNumche($value);
				break;
			case 11:
				$this->setAntban($value);
				break;
			case 12:
				$this->setDebban($value);
				break;
			case 13:
				$this->setCreban($value);
				break;
			case 14:
				$this->setAntlib($value);
				break;
			case 15:
				$this->setDeblib($value);
				break;
			case 16:
				$this->setCrelib($value);
				break;
			case 17:
				$this->setValche($value);
				break;
			case 18:
				$this->setConcil($value);
				break;
			case 19:
				$this->setPlazo($value);
				break;
			case 20:
				$this->setFecape($value);
				break;
			case 21:
				$this->setUsocue($value);
				break;
			case 22:
				$this->setTipren($value);
				break;
			case 23:
				$this->setDesenl($value);
				break;
			case 24:
				$this->setPorsalmin($value);
				break;
			case 25:
				$this->setMonsalmin($value);
				break;
			case 26:
				$this->setCodctaprecoo($value);
				break;
			case 27:
				$this->setCodctapreord($value);
				break;
			case 28:
				$this->setTrasitoria($value);
				break;
			case 29:
				$this->setSalact($value);
				break;
			case 30:
				$this->setFecaper($value);
				break;
			case 31:
				$this->setTemnumcue($value);
				break;
			case 32:
				$this->setCantdig($value);
				break;
			case 33:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TsdefbanPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcue($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTipcue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCodcta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecreg($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFecven($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecper($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRenaut($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPorint($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipint($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumche($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAntban($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDebban($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreban($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAntlib($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDeblib($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCrelib($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setValche($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setConcil($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setPlazo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFecape($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setUsocue($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setTipren($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDesenl($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPorsalmin($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setMonsalmin($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodctaprecoo($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodctapreord($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTrasitoria($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setSalact($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecaper($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTemnumcue($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCantdig($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TsdefbanPeer::DATABASE_NAME);

		if ($this->isColumnModified(TsdefbanPeer::NUMCUE)) $criteria->add(TsdefbanPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TsdefbanPeer::NOMCUE)) $criteria->add(TsdefbanPeer::NOMCUE, $this->nomcue);
		if ($this->isColumnModified(TsdefbanPeer::TIPCUE)) $criteria->add(TsdefbanPeer::TIPCUE, $this->tipcue);
		if ($this->isColumnModified(TsdefbanPeer::CODCTA)) $criteria->add(TsdefbanPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(TsdefbanPeer::FECREG)) $criteria->add(TsdefbanPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(TsdefbanPeer::FECVEN)) $criteria->add(TsdefbanPeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(TsdefbanPeer::FECPER)) $criteria->add(TsdefbanPeer::FECPER, $this->fecper);
		if ($this->isColumnModified(TsdefbanPeer::RENAUT)) $criteria->add(TsdefbanPeer::RENAUT, $this->renaut);
		if ($this->isColumnModified(TsdefbanPeer::PORINT)) $criteria->add(TsdefbanPeer::PORINT, $this->porint);
		if ($this->isColumnModified(TsdefbanPeer::TIPINT)) $criteria->add(TsdefbanPeer::TIPINT, $this->tipint);
		if ($this->isColumnModified(TsdefbanPeer::NUMCHE)) $criteria->add(TsdefbanPeer::NUMCHE, $this->numche);
		if ($this->isColumnModified(TsdefbanPeer::ANTBAN)) $criteria->add(TsdefbanPeer::ANTBAN, $this->antban);
		if ($this->isColumnModified(TsdefbanPeer::DEBBAN)) $criteria->add(TsdefbanPeer::DEBBAN, $this->debban);
		if ($this->isColumnModified(TsdefbanPeer::CREBAN)) $criteria->add(TsdefbanPeer::CREBAN, $this->creban);
		if ($this->isColumnModified(TsdefbanPeer::ANTLIB)) $criteria->add(TsdefbanPeer::ANTLIB, $this->antlib);
		if ($this->isColumnModified(TsdefbanPeer::DEBLIB)) $criteria->add(TsdefbanPeer::DEBLIB, $this->deblib);
		if ($this->isColumnModified(TsdefbanPeer::CRELIB)) $criteria->add(TsdefbanPeer::CRELIB, $this->crelib);
		if ($this->isColumnModified(TsdefbanPeer::VALCHE)) $criteria->add(TsdefbanPeer::VALCHE, $this->valche);
		if ($this->isColumnModified(TsdefbanPeer::CONCIL)) $criteria->add(TsdefbanPeer::CONCIL, $this->concil);
		if ($this->isColumnModified(TsdefbanPeer::PLAZO)) $criteria->add(TsdefbanPeer::PLAZO, $this->plazo);
		if ($this->isColumnModified(TsdefbanPeer::FECAPE)) $criteria->add(TsdefbanPeer::FECAPE, $this->fecape);
		if ($this->isColumnModified(TsdefbanPeer::USOCUE)) $criteria->add(TsdefbanPeer::USOCUE, $this->usocue);
		if ($this->isColumnModified(TsdefbanPeer::TIPREN)) $criteria->add(TsdefbanPeer::TIPREN, $this->tipren);
		if ($this->isColumnModified(TsdefbanPeer::DESENL)) $criteria->add(TsdefbanPeer::DESENL, $this->desenl);
		if ($this->isColumnModified(TsdefbanPeer::PORSALMIN)) $criteria->add(TsdefbanPeer::PORSALMIN, $this->porsalmin);
		if ($this->isColumnModified(TsdefbanPeer::MONSALMIN)) $criteria->add(TsdefbanPeer::MONSALMIN, $this->monsalmin);
		if ($this->isColumnModified(TsdefbanPeer::CODCTAPRECOO)) $criteria->add(TsdefbanPeer::CODCTAPRECOO, $this->codctaprecoo);
		if ($this->isColumnModified(TsdefbanPeer::CODCTAPREORD)) $criteria->add(TsdefbanPeer::CODCTAPREORD, $this->codctapreord);
		if ($this->isColumnModified(TsdefbanPeer::TRASITORIA)) $criteria->add(TsdefbanPeer::TRASITORIA, $this->trasitoria);
		if ($this->isColumnModified(TsdefbanPeer::SALACT)) $criteria->add(TsdefbanPeer::SALACT, $this->salact);
		if ($this->isColumnModified(TsdefbanPeer::FECAPER)) $criteria->add(TsdefbanPeer::FECAPER, $this->fecaper);
		if ($this->isColumnModified(TsdefbanPeer::TEMNUMCUE)) $criteria->add(TsdefbanPeer::TEMNUMCUE, $this->temnumcue);
		if ($this->isColumnModified(TsdefbanPeer::CANTDIG)) $criteria->add(TsdefbanPeer::CANTDIG, $this->cantdig);
		if ($this->isColumnModified(TsdefbanPeer::ID)) $criteria->add(TsdefbanPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TsdefbanPeer::DATABASE_NAME);

		$criteria->add(TsdefbanPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setNomcue($this->nomcue);

		$copyObj->setTipcue($this->tipcue);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setFecven($this->fecven);

		$copyObj->setFecper($this->fecper);

		$copyObj->setRenaut($this->renaut);

		$copyObj->setPorint($this->porint);

		$copyObj->setTipint($this->tipint);

		$copyObj->setNumche($this->numche);

		$copyObj->setAntban($this->antban);

		$copyObj->setDebban($this->debban);

		$copyObj->setCreban($this->creban);

		$copyObj->setAntlib($this->antlib);

		$copyObj->setDeblib($this->deblib);

		$copyObj->setCrelib($this->crelib);

		$copyObj->setValche($this->valche);

		$copyObj->setConcil($this->concil);

		$copyObj->setPlazo($this->plazo);

		$copyObj->setFecape($this->fecape);

		$copyObj->setUsocue($this->usocue);

		$copyObj->setTipren($this->tipren);

		$copyObj->setDesenl($this->desenl);

		$copyObj->setPorsalmin($this->porsalmin);

		$copyObj->setMonsalmin($this->monsalmin);

		$copyObj->setCodctaprecoo($this->codctaprecoo);

		$copyObj->setCodctapreord($this->codctapreord);

		$copyObj->setTrasitoria($this->trasitoria);

		$copyObj->setSalact($this->salact);

		$copyObj->setFecaper($this->fecaper);

		$copyObj->setTemnumcue($this->temnumcue);

		$copyObj->setCantdig($this->cantdig);


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
			self::$peer = new TsdefbanPeer();
		}
		return self::$peer;
	}

} 