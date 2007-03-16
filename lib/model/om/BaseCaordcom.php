<?php


abstract class BaseCaordcom extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $ordcom;


	
	protected $fecord;


	
	protected $codpro;


	
	protected $desord;


	
	protected $crecon;


	
	protected $plaent;


	
	protected $tiecan;


	
	protected $monord;


	
	protected $dtoord;


	
	protected $refcom;


	
	protected $staord;


	
	protected $afepre;


	
	protected $conpag;


	
	protected $forent;


	
	protected $fecanu;


	
	protected $tipmon;


	
	protected $valmon;


	
	protected $tipcom;


	
	protected $tipord;


	
	protected $tipo;


	
	protected $coduni;


	
	protected $codemp;


	
	protected $notord;


	
	protected $tipdoc;


	
	protected $tippro;


	
	protected $afepro;


	
	protected $doccom;


	
	protected $refsol;


	
	protected $tipfin;


	
	protected $justif;


	
	protected $refprc;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getOrdcom()
	{

		return $this->ordcom;
	}

	
	public function getFecord($format = 'Y-m-d')
	{

		if ($this->fecord === null || $this->fecord === '') {
			return null;
		} elseif (!is_int($this->fecord)) {
						$ts = strtotime($this->fecord);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecord] as date/time value: " . var_export($this->fecord, true));
			}
		} else {
			$ts = $this->fecord;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getDesord()
	{

		return $this->desord;
	}

	
	public function getCrecon()
	{

		return $this->crecon;
	}

	
	public function getPlaent()
	{

		return $this->plaent;
	}

	
	public function getTiecan()
	{

		return $this->tiecan;
	}

	
	public function getMonord()
	{

		return $this->monord;
	}

	
	public function getDtoord()
	{

		return $this->dtoord;
	}

	
	public function getRefcom()
	{

		return $this->refcom;
	}

	
	public function getStaord()
	{

		return $this->staord;
	}

	
	public function getAfepre()
	{

		return $this->afepre;
	}

	
	public function getConpag()
	{

		return $this->conpag;
	}

	
	public function getForent()
	{

		return $this->forent;
	}

	
	public function getFecanu($format = 'Y-m-d')
	{

		if ($this->fecanu === null || $this->fecanu === '') {
			return null;
		} elseif (!is_int($this->fecanu)) {
						$ts = strtotime($this->fecanu);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecanu] as date/time value: " . var_export($this->fecanu, true));
			}
		} else {
			$ts = $this->fecanu;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTipmon()
	{

		return $this->tipmon;
	}

	
	public function getValmon()
	{

		return $this->valmon;
	}

	
	public function getTipcom()
	{

		return $this->tipcom;
	}

	
	public function getTipord()
	{

		return $this->tipord;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getCoduni()
	{

		return $this->coduni;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getNotord()
	{

		return $this->notord;
	}

	
	public function getTipdoc()
	{

		return $this->tipdoc;
	}

	
	public function getTippro()
	{

		return $this->tippro;
	}

	
	public function getAfepro()
	{

		return $this->afepro;
	}

	
	public function getDoccom()
	{

		return $this->doccom;
	}

	
	public function getRefsol()
	{

		return $this->refsol;
	}

	
	public function getTipfin()
	{

		return $this->tipfin;
	}

	
	public function getJustif()
	{

		return $this->justif;
	}

	
	public function getRefprc()
	{

		return $this->refprc;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setOrdcom($v)
	{

		if ($this->ordcom !== $v) {
			$this->ordcom = $v;
			$this->modifiedColumns[] = CaordcomPeer::ORDCOM;
		}

	} 
	
	public function setFecord($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecord] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecord !== $ts) {
			$this->fecord = $ts;
			$this->modifiedColumns[] = CaordcomPeer::FECORD;
		}

	} 
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CaordcomPeer::CODPRO;
		}

	} 
	
	public function setDesord($v)
	{

		if ($this->desord !== $v) {
			$this->desord = $v;
			$this->modifiedColumns[] = CaordcomPeer::DESORD;
		}

	} 
	
	public function setCrecon($v)
	{

		if ($this->crecon !== $v) {
			$this->crecon = $v;
			$this->modifiedColumns[] = CaordcomPeer::CRECON;
		}

	} 
	
	public function setPlaent($v)
	{

		if ($this->plaent !== $v) {
			$this->plaent = $v;
			$this->modifiedColumns[] = CaordcomPeer::PLAENT;
		}

	} 
	
	public function setTiecan($v)
	{

		if ($this->tiecan !== $v) {
			$this->tiecan = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIECAN;
		}

	} 
	
	public function setMonord($v)
	{

		if ($this->monord !== $v) {
			$this->monord = $v;
			$this->modifiedColumns[] = CaordcomPeer::MONORD;
		}

	} 
	
	public function setDtoord($v)
	{

		if ($this->dtoord !== $v) {
			$this->dtoord = $v;
			$this->modifiedColumns[] = CaordcomPeer::DTOORD;
		}

	} 
	
	public function setRefcom($v)
	{

		if ($this->refcom !== $v) {
			$this->refcom = $v;
			$this->modifiedColumns[] = CaordcomPeer::REFCOM;
		}

	} 
	
	public function setStaord($v)
	{

		if ($this->staord !== $v) {
			$this->staord = $v;
			$this->modifiedColumns[] = CaordcomPeer::STAORD;
		}

	} 
	
	public function setAfepre($v)
	{

		if ($this->afepre !== $v) {
			$this->afepre = $v;
			$this->modifiedColumns[] = CaordcomPeer::AFEPRE;
		}

	} 
	
	public function setConpag($v)
	{

		if ($this->conpag !== $v) {
			$this->conpag = $v;
			$this->modifiedColumns[] = CaordcomPeer::CONPAG;
		}

	} 
	
	public function setForent($v)
	{

		if ($this->forent !== $v) {
			$this->forent = $v;
			$this->modifiedColumns[] = CaordcomPeer::FORENT;
		}

	} 
	
	public function setFecanu($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecanu] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecanu !== $ts) {
			$this->fecanu = $ts;
			$this->modifiedColumns[] = CaordcomPeer::FECANU;
		}

	} 
	
	public function setTipmon($v)
	{

		if ($this->tipmon !== $v) {
			$this->tipmon = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPMON;
		}

	} 
	
	public function setValmon($v)
	{

		if ($this->valmon !== $v) {
			$this->valmon = $v;
			$this->modifiedColumns[] = CaordcomPeer::VALMON;
		}

	} 
	
	public function setTipcom($v)
	{

		if ($this->tipcom !== $v) {
			$this->tipcom = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPCOM;
		}

	} 
	
	public function setTipord($v)
	{

		if ($this->tipord !== $v) {
			$this->tipord = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPORD;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPO;
		}

	} 
	
	public function setCoduni($v)
	{

		if ($this->coduni !== $v) {
			$this->coduni = $v;
			$this->modifiedColumns[] = CaordcomPeer::CODUNI;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = CaordcomPeer::CODEMP;
		}

	} 
	
	public function setNotord($v)
	{

		if ($this->notord !== $v) {
			$this->notord = $v;
			$this->modifiedColumns[] = CaordcomPeer::NOTORD;
		}

	} 
	
	public function setTipdoc($v)
	{

		if ($this->tipdoc !== $v) {
			$this->tipdoc = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPDOC;
		}

	} 
	
	public function setTippro($v)
	{

		if ($this->tippro !== $v) {
			$this->tippro = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPPRO;
		}

	} 
	
	public function setAfepro($v)
	{

		if ($this->afepro !== $v) {
			$this->afepro = $v;
			$this->modifiedColumns[] = CaordcomPeer::AFEPRO;
		}

	} 
	
	public function setDoccom($v)
	{

		if ($this->doccom !== $v) {
			$this->doccom = $v;
			$this->modifiedColumns[] = CaordcomPeer::DOCCOM;
		}

	} 
	
	public function setRefsol($v)
	{

		if ($this->refsol !== $v) {
			$this->refsol = $v;
			$this->modifiedColumns[] = CaordcomPeer::REFSOL;
		}

	} 
	
	public function setTipfin($v)
	{

		if ($this->tipfin !== $v) {
			$this->tipfin = $v;
			$this->modifiedColumns[] = CaordcomPeer::TIPFIN;
		}

	} 
	
	public function setJustif($v)
	{

		if ($this->justif !== $v) {
			$this->justif = $v;
			$this->modifiedColumns[] = CaordcomPeer::JUSTIF;
		}

	} 
	
	public function setRefprc($v)
	{

		if ($this->refprc !== $v) {
			$this->refprc = $v;
			$this->modifiedColumns[] = CaordcomPeer::REFPRC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaordcomPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->ordcom = $rs->getString($startcol + 0);

			$this->fecord = $rs->getDate($startcol + 1, null);

			$this->codpro = $rs->getString($startcol + 2);

			$this->desord = $rs->getString($startcol + 3);

			$this->crecon = $rs->getString($startcol + 4);

			$this->plaent = $rs->getString($startcol + 5);

			$this->tiecan = $rs->getString($startcol + 6);

			$this->monord = $rs->getFloat($startcol + 7);

			$this->dtoord = $rs->getFloat($startcol + 8);

			$this->refcom = $rs->getString($startcol + 9);

			$this->staord = $rs->getString($startcol + 10);

			$this->afepre = $rs->getString($startcol + 11);

			$this->conpag = $rs->getString($startcol + 12);

			$this->forent = $rs->getString($startcol + 13);

			$this->fecanu = $rs->getDate($startcol + 14, null);

			$this->tipmon = $rs->getString($startcol + 15);

			$this->valmon = $rs->getFloat($startcol + 16);

			$this->tipcom = $rs->getString($startcol + 17);

			$this->tipord = $rs->getString($startcol + 18);

			$this->tipo = $rs->getString($startcol + 19);

			$this->coduni = $rs->getString($startcol + 20);

			$this->codemp = $rs->getString($startcol + 21);

			$this->notord = $rs->getString($startcol + 22);

			$this->tipdoc = $rs->getString($startcol + 23);

			$this->tippro = $rs->getString($startcol + 24);

			$this->afepro = $rs->getString($startcol + 25);

			$this->doccom = $rs->getString($startcol + 26);

			$this->refsol = $rs->getString($startcol + 27);

			$this->tipfin = $rs->getString($startcol + 28);

			$this->justif = $rs->getString($startcol + 29);

			$this->refprc = $rs->getString($startcol + 30);

			$this->id = $rs->getInt($startcol + 31);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 32; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caordcom object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaordcomPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaordcomPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaordcomPeer::DATABASE_NAME);
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
					$pk = CaordcomPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaordcomPeer::doUpdate($this, $con);
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


			if (($retval = CaordcomPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getOrdcom();
				break;
			case 1:
				return $this->getFecord();
				break;
			case 2:
				return $this->getCodpro();
				break;
			case 3:
				return $this->getDesord();
				break;
			case 4:
				return $this->getCrecon();
				break;
			case 5:
				return $this->getPlaent();
				break;
			case 6:
				return $this->getTiecan();
				break;
			case 7:
				return $this->getMonord();
				break;
			case 8:
				return $this->getDtoord();
				break;
			case 9:
				return $this->getRefcom();
				break;
			case 10:
				return $this->getStaord();
				break;
			case 11:
				return $this->getAfepre();
				break;
			case 12:
				return $this->getConpag();
				break;
			case 13:
				return $this->getForent();
				break;
			case 14:
				return $this->getFecanu();
				break;
			case 15:
				return $this->getTipmon();
				break;
			case 16:
				return $this->getValmon();
				break;
			case 17:
				return $this->getTipcom();
				break;
			case 18:
				return $this->getTipord();
				break;
			case 19:
				return $this->getTipo();
				break;
			case 20:
				return $this->getCoduni();
				break;
			case 21:
				return $this->getCodemp();
				break;
			case 22:
				return $this->getNotord();
				break;
			case 23:
				return $this->getTipdoc();
				break;
			case 24:
				return $this->getTippro();
				break;
			case 25:
				return $this->getAfepro();
				break;
			case 26:
				return $this->getDoccom();
				break;
			case 27:
				return $this->getRefsol();
				break;
			case 28:
				return $this->getTipfin();
				break;
			case 29:
				return $this->getJustif();
				break;
			case 30:
				return $this->getRefprc();
				break;
			case 31:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaordcomPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getOrdcom(),
			$keys[1] => $this->getFecord(),
			$keys[2] => $this->getCodpro(),
			$keys[3] => $this->getDesord(),
			$keys[4] => $this->getCrecon(),
			$keys[5] => $this->getPlaent(),
			$keys[6] => $this->getTiecan(),
			$keys[7] => $this->getMonord(),
			$keys[8] => $this->getDtoord(),
			$keys[9] => $this->getRefcom(),
			$keys[10] => $this->getStaord(),
			$keys[11] => $this->getAfepre(),
			$keys[12] => $this->getConpag(),
			$keys[13] => $this->getForent(),
			$keys[14] => $this->getFecanu(),
			$keys[15] => $this->getTipmon(),
			$keys[16] => $this->getValmon(),
			$keys[17] => $this->getTipcom(),
			$keys[18] => $this->getTipord(),
			$keys[19] => $this->getTipo(),
			$keys[20] => $this->getCoduni(),
			$keys[21] => $this->getCodemp(),
			$keys[22] => $this->getNotord(),
			$keys[23] => $this->getTipdoc(),
			$keys[24] => $this->getTippro(),
			$keys[25] => $this->getAfepro(),
			$keys[26] => $this->getDoccom(),
			$keys[27] => $this->getRefsol(),
			$keys[28] => $this->getTipfin(),
			$keys[29] => $this->getJustif(),
			$keys[30] => $this->getRefprc(),
			$keys[31] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaordcomPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setOrdcom($value);
				break;
			case 1:
				$this->setFecord($value);
				break;
			case 2:
				$this->setCodpro($value);
				break;
			case 3:
				$this->setDesord($value);
				break;
			case 4:
				$this->setCrecon($value);
				break;
			case 5:
				$this->setPlaent($value);
				break;
			case 6:
				$this->setTiecan($value);
				break;
			case 7:
				$this->setMonord($value);
				break;
			case 8:
				$this->setDtoord($value);
				break;
			case 9:
				$this->setRefcom($value);
				break;
			case 10:
				$this->setStaord($value);
				break;
			case 11:
				$this->setAfepre($value);
				break;
			case 12:
				$this->setConpag($value);
				break;
			case 13:
				$this->setForent($value);
				break;
			case 14:
				$this->setFecanu($value);
				break;
			case 15:
				$this->setTipmon($value);
				break;
			case 16:
				$this->setValmon($value);
				break;
			case 17:
				$this->setTipcom($value);
				break;
			case 18:
				$this->setTipord($value);
				break;
			case 19:
				$this->setTipo($value);
				break;
			case 20:
				$this->setCoduni($value);
				break;
			case 21:
				$this->setCodemp($value);
				break;
			case 22:
				$this->setNotord($value);
				break;
			case 23:
				$this->setTipdoc($value);
				break;
			case 24:
				$this->setTippro($value);
				break;
			case 25:
				$this->setAfepro($value);
				break;
			case 26:
				$this->setDoccom($value);
				break;
			case 27:
				$this->setRefsol($value);
				break;
			case 28:
				$this->setTipfin($value);
				break;
			case 29:
				$this->setJustif($value);
				break;
			case 30:
				$this->setRefprc($value);
				break;
			case 31:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaordcomPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setOrdcom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFecord($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDesord($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCrecon($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPlaent($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTiecan($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMonord($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDtoord($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRefcom($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStaord($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAfepre($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setConpag($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setForent($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setFecanu($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setTipmon($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setValmon($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTipcom($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTipord($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTipo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCoduni($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCodemp($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNotord($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setTipdoc($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setTippro($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setAfepro($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setDoccom($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setRefsol($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTipfin($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setJustif($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setRefprc($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setId($arr[$keys[31]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaordcomPeer::DATABASE_NAME);

		if ($this->isColumnModified(CaordcomPeer::ORDCOM)) $criteria->add(CaordcomPeer::ORDCOM, $this->ordcom);
		if ($this->isColumnModified(CaordcomPeer::FECORD)) $criteria->add(CaordcomPeer::FECORD, $this->fecord);
		if ($this->isColumnModified(CaordcomPeer::CODPRO)) $criteria->add(CaordcomPeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaordcomPeer::DESORD)) $criteria->add(CaordcomPeer::DESORD, $this->desord);
		if ($this->isColumnModified(CaordcomPeer::CRECON)) $criteria->add(CaordcomPeer::CRECON, $this->crecon);
		if ($this->isColumnModified(CaordcomPeer::PLAENT)) $criteria->add(CaordcomPeer::PLAENT, $this->plaent);
		if ($this->isColumnModified(CaordcomPeer::TIECAN)) $criteria->add(CaordcomPeer::TIECAN, $this->tiecan);
		if ($this->isColumnModified(CaordcomPeer::MONORD)) $criteria->add(CaordcomPeer::MONORD, $this->monord);
		if ($this->isColumnModified(CaordcomPeer::DTOORD)) $criteria->add(CaordcomPeer::DTOORD, $this->dtoord);
		if ($this->isColumnModified(CaordcomPeer::REFCOM)) $criteria->add(CaordcomPeer::REFCOM, $this->refcom);
		if ($this->isColumnModified(CaordcomPeer::STAORD)) $criteria->add(CaordcomPeer::STAORD, $this->staord);
		if ($this->isColumnModified(CaordcomPeer::AFEPRE)) $criteria->add(CaordcomPeer::AFEPRE, $this->afepre);
		if ($this->isColumnModified(CaordcomPeer::CONPAG)) $criteria->add(CaordcomPeer::CONPAG, $this->conpag);
		if ($this->isColumnModified(CaordcomPeer::FORENT)) $criteria->add(CaordcomPeer::FORENT, $this->forent);
		if ($this->isColumnModified(CaordcomPeer::FECANU)) $criteria->add(CaordcomPeer::FECANU, $this->fecanu);
		if ($this->isColumnModified(CaordcomPeer::TIPMON)) $criteria->add(CaordcomPeer::TIPMON, $this->tipmon);
		if ($this->isColumnModified(CaordcomPeer::VALMON)) $criteria->add(CaordcomPeer::VALMON, $this->valmon);
		if ($this->isColumnModified(CaordcomPeer::TIPCOM)) $criteria->add(CaordcomPeer::TIPCOM, $this->tipcom);
		if ($this->isColumnModified(CaordcomPeer::TIPORD)) $criteria->add(CaordcomPeer::TIPORD, $this->tipord);
		if ($this->isColumnModified(CaordcomPeer::TIPO)) $criteria->add(CaordcomPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CaordcomPeer::CODUNI)) $criteria->add(CaordcomPeer::CODUNI, $this->coduni);
		if ($this->isColumnModified(CaordcomPeer::CODEMP)) $criteria->add(CaordcomPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CaordcomPeer::NOTORD)) $criteria->add(CaordcomPeer::NOTORD, $this->notord);
		if ($this->isColumnModified(CaordcomPeer::TIPDOC)) $criteria->add(CaordcomPeer::TIPDOC, $this->tipdoc);
		if ($this->isColumnModified(CaordcomPeer::TIPPRO)) $criteria->add(CaordcomPeer::TIPPRO, $this->tippro);
		if ($this->isColumnModified(CaordcomPeer::AFEPRO)) $criteria->add(CaordcomPeer::AFEPRO, $this->afepro);
		if ($this->isColumnModified(CaordcomPeer::DOCCOM)) $criteria->add(CaordcomPeer::DOCCOM, $this->doccom);
		if ($this->isColumnModified(CaordcomPeer::REFSOL)) $criteria->add(CaordcomPeer::REFSOL, $this->refsol);
		if ($this->isColumnModified(CaordcomPeer::TIPFIN)) $criteria->add(CaordcomPeer::TIPFIN, $this->tipfin);
		if ($this->isColumnModified(CaordcomPeer::JUSTIF)) $criteria->add(CaordcomPeer::JUSTIF, $this->justif);
		if ($this->isColumnModified(CaordcomPeer::REFPRC)) $criteria->add(CaordcomPeer::REFPRC, $this->refprc);
		if ($this->isColumnModified(CaordcomPeer::ID)) $criteria->add(CaordcomPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaordcomPeer::DATABASE_NAME);

		$criteria->add(CaordcomPeer::ORDCOM, $this->ordcom);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getOrdcom();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setOrdcom($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFecord($this->fecord);

		$copyObj->setCodpro($this->codpro);

		$copyObj->setDesord($this->desord);

		$copyObj->setCrecon($this->crecon);

		$copyObj->setPlaent($this->plaent);

		$copyObj->setTiecan($this->tiecan);

		$copyObj->setMonord($this->monord);

		$copyObj->setDtoord($this->dtoord);

		$copyObj->setRefcom($this->refcom);

		$copyObj->setStaord($this->staord);

		$copyObj->setAfepre($this->afepre);

		$copyObj->setConpag($this->conpag);

		$copyObj->setForent($this->forent);

		$copyObj->setFecanu($this->fecanu);

		$copyObj->setTipmon($this->tipmon);

		$copyObj->setValmon($this->valmon);

		$copyObj->setTipcom($this->tipcom);

		$copyObj->setTipord($this->tipord);

		$copyObj->setTipo($this->tipo);

		$copyObj->setCoduni($this->coduni);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNotord($this->notord);

		$copyObj->setTipdoc($this->tipdoc);

		$copyObj->setTippro($this->tippro);

		$copyObj->setAfepro($this->afepro);

		$copyObj->setDoccom($this->doccom);

		$copyObj->setRefsol($this->refsol);

		$copyObj->setTipfin($this->tipfin);

		$copyObj->setJustif($this->justif);

		$copyObj->setRefprc($this->refprc);

		$copyObj->setId($this->id);


		$copyObj->setNew(true);

		$copyObj->setOrdcom(NULL); 
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
			self::$peer = new CaordcomPeer();
		}
		return self::$peer;
	}

} 