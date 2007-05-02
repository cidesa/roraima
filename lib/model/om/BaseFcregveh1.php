<?php


abstract class BaseFcregveh1 extends BaseObject  implements Persistent {


	
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

		return $this->anoveh;
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

		return $this->impveh;
	}

	
	public function getSalact()
	{

		return $this->salact;
	}

	
	public function getSalant()
	{

		return $this->salant;
	}

	
	public function getValori()
	{

		return $this->valori;
	}

	
	public function getAboveh()
	{

		return $this->aboveh;
	}

	
	public function getMorveh()
	{

		return $this->morveh;
	}

	
	public function getDesveh()
	{

		return $this->desveh;
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

		return $this->capveh;
	}

	
	public function getPesveh()
	{

		return $this->pesveh;
	}

	
	public function getTipveh()
	{

		return $this->tipveh;
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

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setPlaveh($v)
	{

		if ($this->plaveh !== $v) {
			$this->plaveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::PLAVEH;
		}

	} 
	
	public function setRifcon($v)
	{

		if ($this->rifcon !== $v) {
			$this->rifcon = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::RIFCON;
		}

	} 
	
	public function setAnoveh($v)
	{

		if ($this->anoveh !== $v) {
			$this->anoveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::ANOVEH;
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
			$this->modifiedColumns[] = Fcregveh1Peer::FECREG;
		}

	} 
	
	public function setSermot($v)
	{

		if ($this->sermot !== $v) {
			$this->sermot = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::SERMOT;
		}

	} 
	
	public function setSercar($v)
	{

		if ($this->sercar !== $v) {
			$this->sercar = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::SERCAR;
		}

	} 
	
	public function setMarveh($v)
	{

		if ($this->marveh !== $v) {
			$this->marveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::MARVEH;
		}

	} 
	
	public function setColveh($v)
	{

		if ($this->colveh !== $v) {
			$this->colveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::COLVEH;
		}

	} 
	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::CODUSO;
		}

	} 
	
	public function setImpveh($v)
	{

		if ($this->impveh !== $v) {
			$this->impveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::IMPVEH;
		}

	} 
	
	public function setSalact($v)
	{

		if ($this->salact !== $v) {
			$this->salact = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::SALACT;
		}

	} 
	
	public function setSalant($v)
	{

		if ($this->salant !== $v) {
			$this->salant = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::SALANT;
		}

	} 
	
	public function setValori($v)
	{

		if ($this->valori !== $v) {
			$this->valori = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::VALORI;
		}

	} 
	
	public function setAboveh($v)
	{

		if ($this->aboveh !== $v) {
			$this->aboveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::ABOVEH;
		}

	} 
	
	public function setMorveh($v)
	{

		if ($this->morveh !== $v) {
			$this->morveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::MORVEH;
		}

	} 
	
	public function setDesveh($v)
	{

		if ($this->desveh !== $v) {
			$this->desveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::DESVEH;
		}

	} 
	
	public function setEstveh($v)
	{

		if ($this->estveh !== $v) {
			$this->estveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::ESTVEH;
		}

	} 
	
	public function setFunrec($v)
	{

		if ($this->funrec !== $v) {
			$this->funrec = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::FUNREC;
		}

	} 
	
	public function setObsveh($v)
	{

		if ($this->obsveh !== $v) {
			$this->obsveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::OBSVEH;
		}

	} 
	
	public function setRifrep($v)
	{

		if ($this->rifrep !== $v) {
			$this->rifrep = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::RIFREP;
		}

	} 
	
	public function setModveh($v)
	{

		if ($this->modveh !== $v) {
			$this->modveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::MODVEH;
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
			$this->modifiedColumns[] = Fcregveh1Peer::FECREC;
		}

	} 
	
	public function setDueant($v)
	{

		if ($this->dueant !== $v) {
			$this->dueant = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::DUEANT;
		}

	} 
	
	public function setDirant($v)
	{

		if ($this->dirant !== $v) {
			$this->dirant = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::DIRANT;
		}

	} 
	
	public function setPlaant($v)
	{

		if ($this->plaant !== $v) {
			$this->plaant = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::PLAANT;
		}

	} 
	
	public function setEstdec($v)
	{

		if ($this->estdec !== $v) {
			$this->estdec = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::ESTDEC;
		}

	} 
	
	public function setNomcon($v)
	{

		if ($this->nomcon !== $v) {
			$this->nomcon = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::NOMCON;
		}

	} 
	
	public function setDircon($v)
	{

		if ($this->dircon !== $v) {
			$this->dircon = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::DIRCON;
		}

	} 
	
	public function setClacon($v)
	{

		if ($this->clacon !== $v) {
			$this->clacon = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::CLACON;
		}

	} 
	
	public function setCapveh($v)
	{

		if ($this->capveh !== $v) {
			$this->capveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::CAPVEH;
		}

	} 
	
	public function setPesveh($v)
	{

		if ($this->pesveh !== $v) {
			$this->pesveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::PESVEH;
		}

	} 
	
	public function setTipveh($v)
	{

		if ($this->tipveh !== $v) {
			$this->tipveh = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::TIPVEH;
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
			$this->modifiedColumns[] = Fcregveh1Peer::FECACT;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Fcregveh1Peer::ID;
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

			$this->id = $rs->getInt($startcol + 33);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 34; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcregveh1 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcregveh1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcregveh1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcregveh1Peer::DATABASE_NAME);
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
					$pk = Fcregveh1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Fcregveh1Peer::doUpdate($this, $con);
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


			if (($retval = Fcregveh1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcregveh1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcregveh1Peer::getFieldNames($keyType);
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
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcregveh1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcregveh1Peer::getFieldNames($keyType);

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
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcregveh1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcregveh1Peer::PLAVEH)) $criteria->add(Fcregveh1Peer::PLAVEH, $this->plaveh);
		if ($this->isColumnModified(Fcregveh1Peer::RIFCON)) $criteria->add(Fcregveh1Peer::RIFCON, $this->rifcon);
		if ($this->isColumnModified(Fcregveh1Peer::ANOVEH)) $criteria->add(Fcregveh1Peer::ANOVEH, $this->anoveh);
		if ($this->isColumnModified(Fcregveh1Peer::FECREG)) $criteria->add(Fcregveh1Peer::FECREG, $this->fecreg);
		if ($this->isColumnModified(Fcregveh1Peer::SERMOT)) $criteria->add(Fcregveh1Peer::SERMOT, $this->sermot);
		if ($this->isColumnModified(Fcregveh1Peer::SERCAR)) $criteria->add(Fcregveh1Peer::SERCAR, $this->sercar);
		if ($this->isColumnModified(Fcregveh1Peer::MARVEH)) $criteria->add(Fcregveh1Peer::MARVEH, $this->marveh);
		if ($this->isColumnModified(Fcregveh1Peer::COLVEH)) $criteria->add(Fcregveh1Peer::COLVEH, $this->colveh);
		if ($this->isColumnModified(Fcregveh1Peer::CODUSO)) $criteria->add(Fcregveh1Peer::CODUSO, $this->coduso);
		if ($this->isColumnModified(Fcregveh1Peer::IMPVEH)) $criteria->add(Fcregveh1Peer::IMPVEH, $this->impveh);
		if ($this->isColumnModified(Fcregveh1Peer::SALACT)) $criteria->add(Fcregveh1Peer::SALACT, $this->salact);
		if ($this->isColumnModified(Fcregveh1Peer::SALANT)) $criteria->add(Fcregveh1Peer::SALANT, $this->salant);
		if ($this->isColumnModified(Fcregveh1Peer::VALORI)) $criteria->add(Fcregveh1Peer::VALORI, $this->valori);
		if ($this->isColumnModified(Fcregveh1Peer::ABOVEH)) $criteria->add(Fcregveh1Peer::ABOVEH, $this->aboveh);
		if ($this->isColumnModified(Fcregveh1Peer::MORVEH)) $criteria->add(Fcregveh1Peer::MORVEH, $this->morveh);
		if ($this->isColumnModified(Fcregveh1Peer::DESVEH)) $criteria->add(Fcregveh1Peer::DESVEH, $this->desveh);
		if ($this->isColumnModified(Fcregveh1Peer::ESTVEH)) $criteria->add(Fcregveh1Peer::ESTVEH, $this->estveh);
		if ($this->isColumnModified(Fcregveh1Peer::FUNREC)) $criteria->add(Fcregveh1Peer::FUNREC, $this->funrec);
		if ($this->isColumnModified(Fcregveh1Peer::OBSVEH)) $criteria->add(Fcregveh1Peer::OBSVEH, $this->obsveh);
		if ($this->isColumnModified(Fcregveh1Peer::RIFREP)) $criteria->add(Fcregveh1Peer::RIFREP, $this->rifrep);
		if ($this->isColumnModified(Fcregveh1Peer::MODVEH)) $criteria->add(Fcregveh1Peer::MODVEH, $this->modveh);
		if ($this->isColumnModified(Fcregveh1Peer::FECREC)) $criteria->add(Fcregveh1Peer::FECREC, $this->fecrec);
		if ($this->isColumnModified(Fcregveh1Peer::DUEANT)) $criteria->add(Fcregveh1Peer::DUEANT, $this->dueant);
		if ($this->isColumnModified(Fcregveh1Peer::DIRANT)) $criteria->add(Fcregveh1Peer::DIRANT, $this->dirant);
		if ($this->isColumnModified(Fcregveh1Peer::PLAANT)) $criteria->add(Fcregveh1Peer::PLAANT, $this->plaant);
		if ($this->isColumnModified(Fcregveh1Peer::ESTDEC)) $criteria->add(Fcregveh1Peer::ESTDEC, $this->estdec);
		if ($this->isColumnModified(Fcregveh1Peer::NOMCON)) $criteria->add(Fcregveh1Peer::NOMCON, $this->nomcon);
		if ($this->isColumnModified(Fcregveh1Peer::DIRCON)) $criteria->add(Fcregveh1Peer::DIRCON, $this->dircon);
		if ($this->isColumnModified(Fcregveh1Peer::CLACON)) $criteria->add(Fcregveh1Peer::CLACON, $this->clacon);
		if ($this->isColumnModified(Fcregveh1Peer::CAPVEH)) $criteria->add(Fcregveh1Peer::CAPVEH, $this->capveh);
		if ($this->isColumnModified(Fcregveh1Peer::PESVEH)) $criteria->add(Fcregveh1Peer::PESVEH, $this->pesveh);
		if ($this->isColumnModified(Fcregveh1Peer::TIPVEH)) $criteria->add(Fcregveh1Peer::TIPVEH, $this->tipveh);
		if ($this->isColumnModified(Fcregveh1Peer::FECACT)) $criteria->add(Fcregveh1Peer::FECACT, $this->fecact);
		if ($this->isColumnModified(Fcregveh1Peer::ID)) $criteria->add(Fcregveh1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcregveh1Peer::DATABASE_NAME);

		$criteria->add(Fcregveh1Peer::ID, $this->id);

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
			self::$peer = new Fcregveh1Peer();
		}
		return self::$peer;
	}

} 