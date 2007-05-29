<?php


abstract class BaseFcregveh extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $plaveh;


	
	protected $rifcon;


	
	protected $anoveh;


	
	protected $fecreg;


	
	protected $sermot;


	
	protected $sercar;


	
	protected $marveh;


	
	protected $colveh;


	
	protected $coduso;


	
	protected $impveh;


	
	protected $salact;


	
	protected $salant;


	
	protected $valori;


	
	protected $aboveh;


	
	protected $morveh;


	
	protected $desveh;


	
	protected $estveh;


	
	protected $funrec;


	
	protected $obsveh;


	
	protected $rifrep;


	
	protected $modveh;


	
	protected $fecrec;


	
	protected $dueant;


	
	protected $dirant;


	
	protected $plaant;


	
	protected $estdec;


	
	protected $nomcon;


	
	protected $dircon;


	
	protected $clacon;


	
	protected $capveh;


	
	protected $pesveh;


	
	protected $tipveh;


	
	protected $fecact;


	
	protected $marcod;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getPlaveh()
	{

		return $this->plaveh; 		
	}
	
	public function getRifcon()
	{

		return $this->rifcon; 		
	}
	
	public function getAnoveh()
	{

		return number_format($this->anoveh,2,',','.');
		
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

	
	public function getSermot()
	{

		return $this->sermot; 		
	}
	
	public function getSercar()
	{

		return $this->sercar; 		
	}
	
	public function getMarveh()
	{

		return $this->marveh; 		
	}
	
	public function getColveh()
	{

		return $this->colveh; 		
	}
	
	public function getCoduso()
	{

		return $this->coduso; 		
	}
	
	public function getImpveh()
	{

		return number_format($this->impveh,2,',','.');
		
	}
	
	public function getSalact()
	{

		return number_format($this->salact,2,',','.');
		
	}
	
	public function getSalant()
	{

		return number_format($this->salant,2,',','.');
		
	}
	
	public function getValori()
	{

		return number_format($this->valori,2,',','.');
		
	}
	
	public function getAboveh()
	{

		return number_format($this->aboveh,2,',','.');
		
	}
	
	public function getMorveh()
	{

		return number_format($this->morveh,2,',','.');
		
	}
	
	public function getDesveh()
	{

		return number_format($this->desveh,2,',','.');
		
	}
	
	public function getEstveh()
	{

		return $this->estveh; 		
	}
	
	public function getFunrec()
	{

		return $this->funrec; 		
	}
	
	public function getObsveh()
	{

		return $this->obsveh; 		
	}
	
	public function getRifrep()
	{

		return $this->rifrep; 		
	}
	
	public function getModveh()
	{

		return $this->modveh; 		
	}
	
	public function getFecrec($format = 'Y-m-d')
	{

		if ($this->fecrec === null || $this->fecrec === '') {
			return null;
		} elseif (!is_int($this->fecrec)) {
						$ts = strtotime($this->fecrec);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecrec] as date/time value: " . var_export($this->fecrec, true));
			}
		} else {
			$ts = $this->fecrec;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getDueant()
	{

		return $this->dueant; 		
	}
	
	public function getDirant()
	{

		return $this->dirant; 		
	}
	
	public function getPlaant()
	{

		return $this->plaant; 		
	}
	
	public function getEstdec()
	{

		return $this->estdec; 		
	}
	
	public function getNomcon()
	{

		return $this->nomcon; 		
	}
	
	public function getDircon()
	{

		return $this->dircon; 		
	}
	
	public function getClacon()
	{

		return $this->clacon; 		
	}
	
	public function getCapveh()
	{

		return number_format($this->capveh,2,',','.');
		
	}
	
	public function getPesveh()
	{

		return number_format($this->pesveh,2,',','.');
		
	}
	
	public function getTipveh()
	{

		return number_format($this->tipveh,2,',','.');
		
	}
	
	public function getFecact($format = 'Y-m-d')
	{

		if ($this->fecact === null || $this->fecact === '') {
			return null;
		} elseif (!is_int($this->fecact)) {
						$ts = strtotime($this->fecact);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecact] as date/time value: " . var_export($this->fecact, true));
			}
		} else {
			$ts = $this->fecact;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMarcod()
	{

		return $this->marcod; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setPlaveh($v)
	{

		if ($this->plaveh !== $v) {
			$this->plaveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::PLAVEH;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = FcregvehPeer::RIFCON;
		}

	} 
	
	public function setAnoveh($v)
	{

		if ($this->anoveh !== $v) {
			$this->anoveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::ANOVEH;
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
			$this->modifiedColumns[] = FcregvehPeer::FECREG;
		}

	} 
	
	public function setSermot($v)
	{

		if ($this->sermot !== $v) {
			$this->sermot = $v;
			$this->modifiedColumns[] = FcregvehPeer::SERMOT;
		}

	} 
	
	public function setSercar($v)
	{

		if ($this->sercar !== $v) {
			$this->sercar = $v;
			$this->modifiedColumns[] = FcregvehPeer::SERCAR;
		}

	} 
	
	public function setMarveh($v)
	{

		if ($this->marveh !== $v) {
			$this->marveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::MARVEH;
		}

	} 
	
	public function setColveh($v)
	{

		if ($this->colveh !== $v) {
			$this->colveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::COLVEH;
		}

	} 
	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = FcregvehPeer::CODUSO;
		}

	} 
	
	public function setImpveh($v)
	{

		if ($this->impveh !== $v) {
			$this->impveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::IMPVEH;
		}

	} 
	
	public function setSalact($v)
	{

		if ($this->salact !== $v) {
			$this->salact = $v;
			$this->modifiedColumns[] = FcregvehPeer::SALACT;
		}

	} 
	
	public function setSalant($v)
	{

		if ($this->salant !== $v) {
			$this->salant = $v;
			$this->modifiedColumns[] = FcregvehPeer::SALANT;
		}

	} 
	
	public function setValori($v)
	{

		if ($this->valori !== $v) {
			$this->valori = $v;
			$this->modifiedColumns[] = FcregvehPeer::VALORI;
		}

	} 
	
	public function setAboveh($v)
	{

		if ($this->aboveh !== $v) {
			$this->aboveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::ABOVEH;
		}

	} 
	
	public function setMorveh($v)
	{

		if ($this->morveh !== $v) {
			$this->morveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::MORVEH;
		}

	} 
	
	public function setDesveh($v)
	{

		if ($this->desveh !== $v) {
			$this->desveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::DESVEH;
		}

	} 
	
	public function setEstveh($v)
	{

		if ($this->estveh !== $v) {
			$this->estveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::ESTVEH;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = FcregvehPeer::FUNREC;
		}

	} 
	
	public function setObsveh($v)
	{

		if ($this->obsveh !== $v) {
			$this->obsveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::OBSVEH;
		}

	} 
	
	public function setRifrep($v)
	{

		if ($this->rifrep !== $v) {
			$this->rifrep = $v;
			$this->modifiedColumns[] = FcregvehPeer::RIFREP;
		}

	} 
	
	public function setModveh($v)
	{

		if ($this->modveh !== $v) {
			$this->modveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::MODVEH;
		}

	} 
	
	public function setFecrec($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecrec] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecrec !== $ts) {
			$this->fecrec = $ts;
			$this->modifiedColumns[] = FcregvehPeer::FECREC;
		}

	} 
	
	public function setDueant($v)
	{

		if ($this->dueant !== $v) {
			$this->dueant = $v;
			$this->modifiedColumns[] = FcregvehPeer::DUEANT;
		}

	} 
	
	public function setDirant($v)
	{

		if ($this->dirant !== $v) {
			$this->dirant = $v;
			$this->modifiedColumns[] = FcregvehPeer::DIRANT;
		}

	} 
	
	public function setPlaant($v)
	{

		if ($this->plaant !== $v) {
			$this->plaant = $v;
			$this->modifiedColumns[] = FcregvehPeer::PLAANT;
		}

	} 
	
	public function setEstdec($v)
	{

		if ($this->estdec !== $v) {
			$this->estdec = $v;
			$this->modifiedColumns[] = FcregvehPeer::ESTDEC;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = FcregvehPeer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = FcregvehPeer::DIRCON;
		}

	} 
	
	public function setClacon($v)
	{

		if ($this->clacon !== $v) {
			$this->clacon = $v;
			$this->modifiedColumns[] = FcregvehPeer::CLACON;
		}

	} 
	
	public function setCapveh($v)
	{

		if ($this->capveh !== $v) {
			$this->capveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::CAPVEH;
		}

	} 
	
	public function setPesveh($v)
	{

		if ($this->pesveh !== $v) {
			$this->pesveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::PESVEH;
		}

	} 
	
	public function setTipveh($v)
	{

		if ($this->tipveh !== $v) {
			$this->tipveh = $v;
			$this->modifiedColumns[] = FcregvehPeer::TIPVEH;
		}

	} 
	
	public function setFecact($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecact] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecact !== $ts) {
			$this->fecact = $ts;
			$this->modifiedColumns[] = FcregvehPeer::FECACT;
		}

	} 
	
	public function setMarcod($v)
	{

		if ($this->marcod !== $v) {
			$this->marcod = $v;
			$this->modifiedColumns[] = FcregvehPeer::MARCOD;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FcregvehPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->plaveh = $rs->getString($startcol + 0);

			$this->rifcon = $rs->getString($startcol + 1);

			$this->anoveh = $rs->getFloat($startcol + 2);

			$this->fecreg = $rs->getDate($startcol + 3, null);

			$this->sermot = $rs->getString($startcol + 4);

			$this->sercar = $rs->getString($startcol + 5);

			$this->marveh = $rs->getString($startcol + 6);

			$this->colveh = $rs->getString($startcol + 7);

			$this->coduso = $rs->getString($startcol + 8);

			$this->impveh = $rs->getFloat($startcol + 9);

			$this->salact = $rs->getFloat($startcol + 10);

			$this->salant = $rs->getFloat($startcol + 11);

			$this->valori = $rs->getFloat($startcol + 12);

			$this->aboveh = $rs->getFloat($startcol + 13);

			$this->morveh = $rs->getFloat($startcol + 14);

			$this->desveh = $rs->getFloat($startcol + 15);

			$this->estveh = $rs->getString($startcol + 16);

			$this->funrec = $rs->getString($startcol + 17);

			$this->obsveh = $rs->getString($startcol + 18);

			$this->rifrep = $rs->getString($startcol + 19);

			$this->modveh = $rs->getString($startcol + 20);

			$this->fecrec = $rs->getDate($startcol + 21, null);

			$this->dueant = $rs->getString($startcol + 22);

			$this->dirant = $rs->getString($startcol + 23);

			$this->plaant = $rs->getString($startcol + 24);

			$this->estdec = $rs->getString($startcol + 25);

			$this->nomcon = $rs->getString($startcol + 26);

			$this->dircon = $rs->getString($startcol + 27);

			$this->clacon = $rs->getString($startcol + 28);

			$this->capveh = $rs->getFloat($startcol + 29);

			$this->pesveh = $rs->getFloat($startcol + 30);

			$this->tipveh = $rs->getFloat($startcol + 31);

			$this->fecact = $rs->getDate($startcol + 32, null);

			$this->marcod = $rs->getString($startcol + 33);

			$this->id = $rs->getInt($startcol + 34);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 35; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcregveh object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FcregvehPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FcregvehPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(FcregvehPeer::DATABASE_NAME);
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
					$pk = FcregvehPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += FcregvehPeer::doUpdate($this, $con);
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


			if (($retval = FcregvehPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcregvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getPlaveh();
				break;
			case 1:
				return $this->getRifcon();
				break;
			case 2:
				return $this->getAnoveh();
				break;
			case 3:
				return $this->getFecreg();
				break;
			case 4:
				return $this->getSermot();
				break;
			case 5:
				return $this->getSercar();
				break;
			case 6:
				return $this->getMarveh();
				break;
			case 7:
				return $this->getColveh();
				break;
			case 8:
				return $this->getCoduso();
				break;
			case 9:
				return $this->getImpveh();
				break;
			case 10:
				return $this->getSalact();
				break;
			case 11:
				return $this->getSalant();
				break;
			case 12:
				return $this->getValori();
				break;
			case 13:
				return $this->getAboveh();
				break;
			case 14:
				return $this->getMorveh();
				break;
			case 15:
				return $this->getDesveh();
				break;
			case 16:
				return $this->getEstveh();
				break;
			case 17:
				return $this->getFunrec();
				break;
			case 18:
				return $this->getObsveh();
				break;
			case 19:
				return $this->getRifrep();
				break;
			case 20:
				return $this->getModveh();
				break;
			case 21:
				return $this->getFecrec();
				break;
			case 22:
				return $this->getDueant();
				break;
			case 23:
				return $this->getDirant();
				break;
			case 24:
				return $this->getPlaant();
				break;
			case 25:
				return $this->getEstdec();
				break;
			case 26:
				return $this->getNomcon();
				break;
			case 27:
				return $this->getDircon();
				break;
			case 28:
				return $this->getClacon();
				break;
			case 29:
				return $this->getCapveh();
				break;
			case 30:
				return $this->getPesveh();
				break;
			case 31:
				return $this->getTipveh();
				break;
			case 32:
				return $this->getFecact();
				break;
			case 33:
				return $this->getMarcod();
				break;
			case 34:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcregvehPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getPlaveh(),
			$keys[1] => $this->getRifcon(),
			$keys[2] => $this->getAnoveh(),
			$keys[3] => $this->getFecreg(),
			$keys[4] => $this->getSermot(),
			$keys[5] => $this->getSercar(),
			$keys[6] => $this->getMarveh(),
			$keys[7] => $this->getColveh(),
			$keys[8] => $this->getCoduso(),
			$keys[9] => $this->getImpveh(),
			$keys[10] => $this->getSalact(),
			$keys[11] => $this->getSalant(),
			$keys[12] => $this->getValori(),
			$keys[13] => $this->getAboveh(),
			$keys[14] => $this->getMorveh(),
			$keys[15] => $this->getDesveh(),
			$keys[16] => $this->getEstveh(),
			$keys[17] => $this->getFunrec(),
			$keys[18] => $this->getObsveh(),
			$keys[19] => $this->getRifrep(),
			$keys[20] => $this->getModveh(),
			$keys[21] => $this->getFecrec(),
			$keys[22] => $this->getDueant(),
			$keys[23] => $this->getDirant(),
			$keys[24] => $this->getPlaant(),
			$keys[25] => $this->getEstdec(),
			$keys[26] => $this->getNomcon(),
			$keys[27] => $this->getDircon(),
			$keys[28] => $this->getClacon(),
			$keys[29] => $this->getCapveh(),
			$keys[30] => $this->getPesveh(),
			$keys[31] => $this->getTipveh(),
			$keys[32] => $this->getFecact(),
			$keys[33] => $this->getMarcod(),
			$keys[34] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FcregvehPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setPlaveh($value);
				break;
			case 1:
				$this->setRifcon($value);
				break;
			case 2:
				$this->setAnoveh($value);
				break;
			case 3:
				$this->setFecreg($value);
				break;
			case 4:
				$this->setSermot($value);
				break;
			case 5:
				$this->setSercar($value);
				break;
			case 6:
				$this->setMarveh($value);
				break;
			case 7:
				$this->setColveh($value);
				break;
			case 8:
				$this->setCoduso($value);
				break;
			case 9:
				$this->setImpveh($value);
				break;
			case 10:
				$this->setSalact($value);
				break;
			case 11:
				$this->setSalant($value);
				break;
			case 12:
				$this->setValori($value);
				break;
			case 13:
				$this->setAboveh($value);
				break;
			case 14:
				$this->setMorveh($value);
				break;
			case 15:
				$this->setDesveh($value);
				break;
			case 16:
				$this->setEstveh($value);
				break;
			case 17:
				$this->setFunrec($value);
				break;
			case 18:
				$this->setObsveh($value);
				break;
			case 19:
				$this->setRifrep($value);
				break;
			case 20:
				$this->setModveh($value);
				break;
			case 21:
				$this->setFecrec($value);
				break;
			case 22:
				$this->setDueant($value);
				break;
			case 23:
				$this->setDirant($value);
				break;
			case 24:
				$this->setPlaant($value);
				break;
			case 25:
				$this->setEstdec($value);
				break;
			case 26:
				$this->setNomcon($value);
				break;
			case 27:
				$this->setDircon($value);
				break;
			case 28:
				$this->setClacon($value);
				break;
			case 29:
				$this->setCapveh($value);
				break;
			case 30:
				$this->setPesveh($value);
				break;
			case 31:
				$this->setTipveh($value);
				break;
			case 32:
				$this->setFecact($value);
				break;
			case 33:
				$this->setMarcod($value);
				break;
			case 34:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FcregvehPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setPlaveh($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRifcon($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnoveh($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFecreg($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setSermot($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSercar($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMarveh($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setColveh($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCoduso($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setImpveh($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSalact($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSalant($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setValori($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setAboveh($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setMorveh($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDesveh($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEstveh($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setFunrec($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setObsveh($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setRifrep($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setModveh($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecrec($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDueant($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDirant($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPlaant($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setEstdec($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setNomcon($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setDircon($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setClacon($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setCapveh($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setPesveh($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setTipveh($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setFecact($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setMarcod($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setId($arr[$keys[34]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FcregvehPeer::DATABASE_NAME);

		if ($this->isColumnModified(FcregvehPeer::PLAVEH)) $criteria->add(FcregvehPeer::PLAVEH, $this->plaveh);
		if ($this->isColumnModified(FcregvehPeer::RIFCON)) $criteria->add(FcregvehPeer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(FcregvehPeer::ANOVEH)) $criteria->add(FcregvehPeer::ANOVEH, $this->anoveh);
		if ($this->isColumnModified(FcregvehPeer::FECREG)) $criteria->add(FcregvehPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(FcregvehPeer::SERMOT)) $criteria->add(FcregvehPeer::SERMOT, $this->sermot);
		if ($this->isColumnModified(FcregvehPeer::SERCAR)) $criteria->add(FcregvehPeer::SERCAR, $this->sercar);
		if ($this->isColumnModified(FcregvehPeer::MARVEH)) $criteria->add(FcregvehPeer::MARVEH, $this->marveh);
		if ($this->isColumnModified(FcregvehPeer::COLVEH)) $criteria->add(FcregvehPeer::COLVEH, $this->colveh);
		if ($this->isColumnModified(FcregvehPeer::CODUSO)) $criteria->add(FcregvehPeer::CODUSO, $this->coduso);
		if ($this->isColumnModified(FcregvehPeer::IMPVEH)) $criteria->add(FcregvehPeer::IMPVEH, $this->impveh);
		if ($this->isColumnModified(FcregvehPeer::SALACT)) $criteria->add(FcregvehPeer::SALACT, $this->salact);
		if ($this->isColumnModified(FcregvehPeer::SALANT)) $criteria->add(FcregvehPeer::SALANT, $this->salant);
		if ($this->isColumnModified(FcregvehPeer::VALORI)) $criteria->add(FcregvehPeer::VALORI, $this->valori);
		if ($this->isColumnModified(FcregvehPeer::ABOVEH)) $criteria->add(FcregvehPeer::ABOVEH, $this->aboveh);
		if ($this->isColumnModified(FcregvehPeer::MORVEH)) $criteria->add(FcregvehPeer::MORVEH, $this->morveh);
		if ($this->isColumnModified(FcregvehPeer::DESVEH)) $criteria->add(FcregvehPeer::DESVEH, $this->desveh);
		if ($this->isColumnModified(FcregvehPeer::ESTVEH)) $criteria->add(FcregvehPeer::ESTVEH, $this->estveh);
		if ($this->isColumnModified(FcregvehPeer::FUNREC)) $criteria->add(FcregvehPeer::FUNREC, $this->funrec);
		if ($this->isColumnModified(FcregvehPeer::OBSVEH)) $criteria->add(FcregvehPeer::OBSVEH, $this->obsveh);
		if ($this->isColumnModified(FcregvehPeer::RIFREP)) $criteria->add(FcregvehPeer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(FcregvehPeer::MODVEH)) $criteria->add(FcregvehPeer::MODVEH, $this->modveh);
		if ($this->isColumnModified(FcregvehPeer::FECREC)) $criteria->add(FcregvehPeer::FECREC, $this->fecrec);
		if ($this->isColumnModified(FcregvehPeer::DUEANT)) $criteria->add(FcregvehPeer::DUEANT, $this->dueant);
		if ($this->isColumnModified(FcregvehPeer::DIRANT)) $criteria->add(FcregvehPeer::DIRANT, $this->dirant);
		if ($this->isColumnModified(FcregvehPeer::PLAANT)) $criteria->add(FcregvehPeer::PLAANT, $this->plaant);
		if ($this->isColumnModified(FcregvehPeer::ESTDEC)) $criteria->add(FcregvehPeer::ESTDEC, $this->estdec);
		if ($this->isColumnModified(FcregvehPeer::NOMCON)) $criteria->add(FcregvehPeer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(FcregvehPeer::DIRCON)) $criteria->add(FcregvehPeer::DIRCON, $this->dircon);
		if ($this->isColumnModified(FcregvehPeer::CLACON)) $criteria->add(FcregvehPeer::CLACON, $this->clacon);
		if ($this->isColumnModified(FcregvehPeer::CAPVEH)) $criteria->add(FcregvehPeer::CAPVEH, $this->capveh);
		if ($this->isColumnModified(FcregvehPeer::PESVEH)) $criteria->add(FcregvehPeer::PESVEH, $this->pesveh);
		if ($this->isColumnModified(FcregvehPeer::TIPVEH)) $criteria->add(FcregvehPeer::TIPVEH, $this->tipveh);
		if ($this->isColumnModified(FcregvehPeer::FECACT)) $criteria->add(FcregvehPeer::FECACT, $this->fecact);
		if ($this->isColumnModified(FcregvehPeer::MARCOD)) $criteria->add(FcregvehPeer::MARCOD, $this->marcod);
		if ($this->isColumnModified(FcregvehPeer::ID)) $criteria->add(FcregvehPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FcregvehPeer::DATABASE_NAME);

		$criteria->add(FcregvehPeer::ID, $this->id);

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

		$copyObj->setPlaveh($this->plaveh);

		$copyObj->setRifcon($this->rifcon);

		$copyObj->setAnoveh($this->anoveh);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setSermot($this->sermot);

		$copyObj->setSercar($this->sercar);

		$copyObj->setMarveh($this->marveh);

		$copyObj->setColveh($this->colveh);

		$copyObj->setCoduso($this->coduso);

		$copyObj->setImpveh($this->impveh);

		$copyObj->setSalact($this->salact);

		$copyObj->setSalant($this->salant);

		$copyObj->setValori($this->valori);

		$copyObj->setAboveh($this->aboveh);

		$copyObj->setMorveh($this->morveh);

		$copyObj->setDesveh($this->desveh);

		$copyObj->setEstveh($this->estveh);

		$copyObj->setFunrec($this->funrec);

		$copyObj->setObsveh($this->obsveh);

		$copyObj->setRifrep($this->rifrep);

		$copyObj->setModveh($this->modveh);

		$copyObj->setFecrec($this->fecrec);

		$copyObj->setDueant($this->dueant);

		$copyObj->setDirant($this->dirant);

		$copyObj->setPlaant($this->plaant);

		$copyObj->setEstdec($this->estdec);

		$copyObj->setNomcon($this->nomcon);

		$copyObj->setDircon($this->dircon);

		$copyObj->setClacon($this->clacon);

		$copyObj->setCapveh($this->capveh);

		$copyObj->setPesveh($this->pesveh);

		$copyObj->setTipveh($this->tipveh);

		$copyObj->setFecact($this->fecact);

		$copyObj->setMarcod($this->marcod);


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
			self::$peer = new FcregvehPeer();
		}
		return self::$peer;
	}

} 