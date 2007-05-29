<?php


abstract class BaseCobclient extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcli;


	
	protected $nomcli;


	
	protected $rifcli;


	
	protected $nitcli;


	
	protected $dircli;


	
	protected $telcli;


	
	protected $faxcli;


	
	protected $email;


	
	protected $tipper;


	
	protected $naccli;


	
	protected $limcre;


	
	protected $codcta;


	
	protected $regmer;


	
	protected $fecreg;


	
	protected $tomreg;


	
	protected $folreg;


	
	protected $capsus;


	
	protected $cappag;


	
	protected $cirepleg;


	
	protected $nomrepleg;


	
	protected $dirrepleg;


	
	protected $riffia;


	
	protected $nomfia;


	
	protected $dirfia;


	
	protected $telfia;


	
	protected $codciu;


	
	protected $codedo;


	
	protected $codpai;


	
	protected $fecnac;


	
	protected $tipcli;


	
	protected $codtiprec;


	
	protected $codordmercon;


	
	protected $codpermercon;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcli()
	{

		return $this->codcli; 		
	}
	
	public function getNomcli()
	{

		return $this->nomcli; 		
	}
	
	public function getRifcli()
	{

		return $this->rifcli; 		
	}
	
	public function getNitcli()
	{

		return $this->nitcli; 		
	}
	
	public function getDircli()
	{

		return $this->dircli; 		
	}
	
	public function getTelcli()
	{

		return $this->telcli; 		
	}
	
	public function getFaxcli()
	{

		return $this->faxcli; 		
	}
	
	public function getEmail()
	{

		return $this->email; 		
	}
	
	public function getTipper()
	{

		return $this->tipper; 		
	}
	
	public function getNaccli()
	{

		return $this->naccli; 		
	}
	
	public function getLimcre()
	{

		return number_format($this->limcre,2,',','.');
		
	}
	
	public function getCodcta()
	{

		return $this->codcta; 		
	}
	
	public function getRegmer()
	{

		return $this->regmer; 		
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

	
	public function getTomreg()
	{

		return $this->tomreg; 		
	}
	
	public function getFolreg()
	{

		return $this->folreg; 		
	}
	
	public function getCapsus()
	{

		return number_format($this->capsus,2,',','.');
		
	}
	
	public function getCappag()
	{

		return number_format($this->cappag,2,',','.');
		
	}
	
	public function getCirepleg()
	{

		return $this->cirepleg; 		
	}
	
	public function getNomrepleg()
	{

		return $this->nomrepleg; 		
	}
	
	public function getDirrepleg()
	{

		return $this->dirrepleg; 		
	}
	
	public function getRiffia()
	{

		return $this->riffia; 		
	}
	
	public function getNomfia()
	{

		return $this->nomfia; 		
	}
	
	public function getDirfia()
	{

		return $this->dirfia; 		
	}
	
	public function getTelfia()
	{

		return $this->telfia; 		
	}
	
	public function getCodciu()
	{

		return $this->codciu; 		
	}
	
	public function getCodedo()
	{

		return $this->codedo; 		
	}
	
	public function getCodpai()
	{

		return $this->codpai; 		
	}
	
	public function getFecnac($format = 'Y-m-d')
	{

		if ($this->fecnac === null || $this->fecnac === '') {
			return null;
		} elseif (!is_int($this->fecnac)) {
						$ts = strtotime($this->fecnac);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecnac] as date/time value: " . var_export($this->fecnac, true));
			}
		} else {
			$ts = $this->fecnac;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getTipcli()
	{

		return $this->tipcli; 		
	}
	
	public function getCodtiprec()
	{

		return $this->codtiprec; 		
	}
	
	public function getCodordmercon()
	{

		return $this->codordmercon; 		
	}
	
	public function getCodpermercon()
	{

		return $this->codpermercon; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcli($v)
	{

		if ($this->codcli !== $v) {
			$this->codcli = $v;
			$this->modifiedColumns[] = CobclientPeer::CODCLI;
		}

	} 
	
	public function setNomcli($v)
	{

		if ($this->nomcli !== $v) {
			$this->nomcli = $v;
			$this->modifiedColumns[] = CobclientPeer::NOMCLI;
		}

	} 
	
	public function setRifcli($v)
	{

		if ($this->rifcli !== $v) {
			$this->rifcli = $v;
			$this->modifiedColumns[] = CobclientPeer::RIFCLI;
		}

	} 
	
	public function setNitcli($v)
	{

		if ($this->nitcli !== $v) {
			$this->nitcli = $v;
			$this->modifiedColumns[] = CobclientPeer::NITCLI;
		}

	} 
	
	public function setDircli($v)
	{

		if ($this->dircli !== $v) {
			$this->dircli = $v;
			$this->modifiedColumns[] = CobclientPeer::DIRCLI;
		}

	} 
	
	public function setTelcli($v)
	{

		if ($this->telcli !== $v) {
			$this->telcli = $v;
			$this->modifiedColumns[] = CobclientPeer::TELCLI;
		}

	} 
	
	public function setFaxcli($v)
	{

		if ($this->faxcli !== $v) {
			$this->faxcli = $v;
			$this->modifiedColumns[] = CobclientPeer::FAXCLI;
		}

	} 
	
	public function setEmail($v)
	{

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = CobclientPeer::EMAIL;
		}

	} 
	
	public function setTipper($v)
	{

		if ($this->tipper !== $v) {
			$this->tipper = $v;
			$this->modifiedColumns[] = CobclientPeer::TIPPER;
		}

	} 
	
	public function setNaccli($v)
	{

		if ($this->naccli !== $v) {
			$this->naccli = $v;
			$this->modifiedColumns[] = CobclientPeer::NACCLI;
		}

	} 
	
	public function setLimcre($v)
	{

		if ($this->limcre !== $v) {
			$this->limcre = $v;
			$this->modifiedColumns[] = CobclientPeer::LIMCRE;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = CobclientPeer::CODCTA;
		}

	} 
	
	public function setRegmer($v)
	{

		if ($this->regmer !== $v) {
			$this->regmer = $v;
			$this->modifiedColumns[] = CobclientPeer::REGMER;
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
			$this->modifiedColumns[] = CobclientPeer::FECREG;
		}

	} 
	
	public function setTomreg($v)
	{

		if ($this->tomreg !== $v) {
			$this->tomreg = $v;
			$this->modifiedColumns[] = CobclientPeer::TOMREG;
		}

	} 
	
	public function setFolreg($v)
	{

		if ($this->folreg !== $v) {
			$this->folreg = $v;
			$this->modifiedColumns[] = CobclientPeer::FOLREG;
		}

	} 
	
	public function setCapsus($v)
	{

		if ($this->capsus !== $v) {
			$this->capsus = $v;
			$this->modifiedColumns[] = CobclientPeer::CAPSUS;
		}

	} 
	
	public function setCappag($v)
	{

		if ($this->cappag !== $v) {
			$this->cappag = $v;
			$this->modifiedColumns[] = CobclientPeer::CAPPAG;
		}

	} 
	
	public function setCirepleg($v)
	{

		if ($this->cirepleg !== $v) {
			$this->cirepleg = $v;
			$this->modifiedColumns[] = CobclientPeer::CIREPLEG;
		}

	} 
	
	public function setNomrepleg($v)
	{

		if ($this->nomrepleg !== $v) {
			$this->nomrepleg = $v;
			$this->modifiedColumns[] = CobclientPeer::NOMREPLEG;
		}

	} 
	
	public function setDirrepleg($v)
	{

		if ($this->dirrepleg !== $v) {
			$this->dirrepleg = $v;
			$this->modifiedColumns[] = CobclientPeer::DIRREPLEG;
		}

	} 
	
	public function setRiffia($v)
	{

		if ($this->riffia !== $v) {
			$this->riffia = $v;
			$this->modifiedColumns[] = CobclientPeer::RIFFIA;
		}

	} 
	
	public function setNomfia($v)
	{

		if ($this->nomfia !== $v) {
			$this->nomfia = $v;
			$this->modifiedColumns[] = CobclientPeer::NOMFIA;
		}

	} 
	
	public function setDirfia($v)
	{

		if ($this->dirfia !== $v) {
			$this->dirfia = $v;
			$this->modifiedColumns[] = CobclientPeer::DIRFIA;
		}

	} 
	
	public function setTelfia($v)
	{

		if ($this->telfia !== $v) {
			$this->telfia = $v;
			$this->modifiedColumns[] = CobclientPeer::TELFIA;
		}

	} 
	
	public function setCodciu($v)
	{

		if ($this->codciu !== $v) {
			$this->codciu = $v;
			$this->modifiedColumns[] = CobclientPeer::CODCIU;
		}

	} 
	
	public function setCodedo($v)
	{

		if ($this->codedo !== $v) {
			$this->codedo = $v;
			$this->modifiedColumns[] = CobclientPeer::CODEDO;
		}

	} 
	
	public function setCodpai($v)
	{

		if ($this->codpai !== $v) {
			$this->codpai = $v;
			$this->modifiedColumns[] = CobclientPeer::CODPAI;
		}

	} 
	
	public function setFecnac($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecnac] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecnac !== $ts) {
			$this->fecnac = $ts;
			$this->modifiedColumns[] = CobclientPeer::FECNAC;
		}

	} 
	
	public function setTipcli($v)
	{

		if ($this->tipcli !== $v) {
			$this->tipcli = $v;
			$this->modifiedColumns[] = CobclientPeer::TIPCLI;
		}

	} 
	
	public function setCodtiprec($v)
	{

		if ($this->codtiprec !== $v) {
			$this->codtiprec = $v;
			$this->modifiedColumns[] = CobclientPeer::CODTIPREC;
		}

	} 
	
	public function setCodordmercon($v)
	{

		if ($this->codordmercon !== $v) {
			$this->codordmercon = $v;
			$this->modifiedColumns[] = CobclientPeer::CODORDMERCON;
		}

	} 
	
	public function setCodpermercon($v)
	{

		if ($this->codpermercon !== $v) {
			$this->codpermercon = $v;
			$this->modifiedColumns[] = CobclientPeer::CODPERMERCON;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CobclientPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcli = $rs->getString($startcol + 0);

			$this->nomcli = $rs->getString($startcol + 1);

			$this->rifcli = $rs->getString($startcol + 2);

			$this->nitcli = $rs->getString($startcol + 3);

			$this->dircli = $rs->getString($startcol + 4);

			$this->telcli = $rs->getString($startcol + 5);

			$this->faxcli = $rs->getString($startcol + 6);

			$this->email = $rs->getString($startcol + 7);

			$this->tipper = $rs->getString($startcol + 8);

			$this->naccli = $rs->getString($startcol + 9);

			$this->limcre = $rs->getFloat($startcol + 10);

			$this->codcta = $rs->getString($startcol + 11);

			$this->regmer = $rs->getString($startcol + 12);

			$this->fecreg = $rs->getDate($startcol + 13, null);

			$this->tomreg = $rs->getString($startcol + 14);

			$this->folreg = $rs->getString($startcol + 15);

			$this->capsus = $rs->getFloat($startcol + 16);

			$this->cappag = $rs->getFloat($startcol + 17);

			$this->cirepleg = $rs->getString($startcol + 18);

			$this->nomrepleg = $rs->getString($startcol + 19);

			$this->dirrepleg = $rs->getString($startcol + 20);

			$this->riffia = $rs->getString($startcol + 21);

			$this->nomfia = $rs->getString($startcol + 22);

			$this->dirfia = $rs->getString($startcol + 23);

			$this->telfia = $rs->getString($startcol + 24);

			$this->codciu = $rs->getString($startcol + 25);

			$this->codedo = $rs->getString($startcol + 26);

			$this->codpai = $rs->getString($startcol + 27);

			$this->fecnac = $rs->getDate($startcol + 28, null);

			$this->tipcli = $rs->getString($startcol + 29);

			$this->codtiprec = $rs->getString($startcol + 30);

			$this->codordmercon = $rs->getString($startcol + 31);

			$this->codpermercon = $rs->getString($startcol + 32);

			$this->id = $rs->getInt($startcol + 33);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 34; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Cobclient object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CobclientPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CobclientPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CobclientPeer::DATABASE_NAME);
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
					$pk = CobclientPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CobclientPeer::doUpdate($this, $con);
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


			if (($retval = CobclientPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobclientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcli();
				break;
			case 1:
				return $this->getNomcli();
				break;
			case 2:
				return $this->getRifcli();
				break;
			case 3:
				return $this->getNitcli();
				break;
			case 4:
				return $this->getDircli();
				break;
			case 5:
				return $this->getTelcli();
				break;
			case 6:
				return $this->getFaxcli();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getTipper();
				break;
			case 9:
				return $this->getNaccli();
				break;
			case 10:
				return $this->getLimcre();
				break;
			case 11:
				return $this->getCodcta();
				break;
			case 12:
				return $this->getRegmer();
				break;
			case 13:
				return $this->getFecreg();
				break;
			case 14:
				return $this->getTomreg();
				break;
			case 15:
				return $this->getFolreg();
				break;
			case 16:
				return $this->getCapsus();
				break;
			case 17:
				return $this->getCappag();
				break;
			case 18:
				return $this->getCirepleg();
				break;
			case 19:
				return $this->getNomrepleg();
				break;
			case 20:
				return $this->getDirrepleg();
				break;
			case 21:
				return $this->getRiffia();
				break;
			case 22:
				return $this->getNomfia();
				break;
			case 23:
				return $this->getDirfia();
				break;
			case 24:
				return $this->getTelfia();
				break;
			case 25:
				return $this->getCodciu();
				break;
			case 26:
				return $this->getCodedo();
				break;
			case 27:
				return $this->getCodpai();
				break;
			case 28:
				return $this->getFecnac();
				break;
			case 29:
				return $this->getTipcli();
				break;
			case 30:
				return $this->getCodtiprec();
				break;
			case 31:
				return $this->getCodordmercon();
				break;
			case 32:
				return $this->getCodpermercon();
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
		$keys = CobclientPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcli(),
			$keys[1] => $this->getNomcli(),
			$keys[2] => $this->getRifcli(),
			$keys[3] => $this->getNitcli(),
			$keys[4] => $this->getDircli(),
			$keys[5] => $this->getTelcli(),
			$keys[6] => $this->getFaxcli(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getTipper(),
			$keys[9] => $this->getNaccli(),
			$keys[10] => $this->getLimcre(),
			$keys[11] => $this->getCodcta(),
			$keys[12] => $this->getRegmer(),
			$keys[13] => $this->getFecreg(),
			$keys[14] => $this->getTomreg(),
			$keys[15] => $this->getFolreg(),
			$keys[16] => $this->getCapsus(),
			$keys[17] => $this->getCappag(),
			$keys[18] => $this->getCirepleg(),
			$keys[19] => $this->getNomrepleg(),
			$keys[20] => $this->getDirrepleg(),
			$keys[21] => $this->getRiffia(),
			$keys[22] => $this->getNomfia(),
			$keys[23] => $this->getDirfia(),
			$keys[24] => $this->getTelfia(),
			$keys[25] => $this->getCodciu(),
			$keys[26] => $this->getCodedo(),
			$keys[27] => $this->getCodpai(),
			$keys[28] => $this->getFecnac(),
			$keys[29] => $this->getTipcli(),
			$keys[30] => $this->getCodtiprec(),
			$keys[31] => $this->getCodordmercon(),
			$keys[32] => $this->getCodpermercon(),
			$keys[33] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CobclientPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcli($value);
				break;
			case 1:
				$this->setNomcli($value);
				break;
			case 2:
				$this->setRifcli($value);
				break;
			case 3:
				$this->setNitcli($value);
				break;
			case 4:
				$this->setDircli($value);
				break;
			case 5:
				$this->setTelcli($value);
				break;
			case 6:
				$this->setFaxcli($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setTipper($value);
				break;
			case 9:
				$this->setNaccli($value);
				break;
			case 10:
				$this->setLimcre($value);
				break;
			case 11:
				$this->setCodcta($value);
				break;
			case 12:
				$this->setRegmer($value);
				break;
			case 13:
				$this->setFecreg($value);
				break;
			case 14:
				$this->setTomreg($value);
				break;
			case 15:
				$this->setFolreg($value);
				break;
			case 16:
				$this->setCapsus($value);
				break;
			case 17:
				$this->setCappag($value);
				break;
			case 18:
				$this->setCirepleg($value);
				break;
			case 19:
				$this->setNomrepleg($value);
				break;
			case 20:
				$this->setDirrepleg($value);
				break;
			case 21:
				$this->setRiffia($value);
				break;
			case 22:
				$this->setNomfia($value);
				break;
			case 23:
				$this->setDirfia($value);
				break;
			case 24:
				$this->setTelfia($value);
				break;
			case 25:
				$this->setCodciu($value);
				break;
			case 26:
				$this->setCodedo($value);
				break;
			case 27:
				$this->setCodpai($value);
				break;
			case 28:
				$this->setFecnac($value);
				break;
			case 29:
				$this->setTipcli($value);
				break;
			case 30:
				$this->setCodtiprec($value);
				break;
			case 31:
				$this->setCodordmercon($value);
				break;
			case 32:
				$this->setCodpermercon($value);
				break;
			case 33:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CobclientPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcli($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcli($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifcli($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNitcli($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDircli($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelcli($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFaxcli($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setTipper($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNaccli($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setLimcre($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCodcta($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRegmer($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFecreg($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTomreg($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFolreg($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCapsus($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setCappag($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCirepleg($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNomrepleg($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setDirrepleg($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setRiffia($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNomfia($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setDirfia($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setTelfia($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodciu($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodedo($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodpai($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setFecnac($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipcli($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCodtiprec($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCodordmercon($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodpermercon($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setId($arr[$keys[33]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CobclientPeer::DATABASE_NAME);

		if ($this->isColumnModified(CobclientPeer::CODCLI)) $criteria->add(CobclientPeer::CODCLI, $this->codcli);
		if ($this->isColumnModified(CobclientPeer::NOMCLI)) $criteria->add(CobclientPeer::NOMCLI, $this->nomcli);
		if ($this->isColumnModified(CobclientPeer::RIFCLI)) $criteria->add(CobclientPeer::RIFCLI, $this->rifcli);
		if ($this->isColumnModified(CobclientPeer::NITCLI)) $criteria->add(CobclientPeer::NITCLI, $this->nitcli);
		if ($this->isColumnModified(CobclientPeer::DIRCLI)) $criteria->add(CobclientPeer::DIRCLI, $this->dircli);
		if ($this->isColumnModified(CobclientPeer::TELCLI)) $criteria->add(CobclientPeer::TELCLI, $this->telcli);
		if ($this->isColumnModified(CobclientPeer::FAXCLI)) $criteria->add(CobclientPeer::FAXCLI, $this->faxcli);
		if ($this->isColumnModified(CobclientPeer::EMAIL)) $criteria->add(CobclientPeer::EMAIL, $this->email);
		if ($this->isColumnModified(CobclientPeer::TIPPER)) $criteria->add(CobclientPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(CobclientPeer::NACCLI)) $criteria->add(CobclientPeer::NACCLI, $this->naccli);
		if ($this->isColumnModified(CobclientPeer::LIMCRE)) $criteria->add(CobclientPeer::LIMCRE, $this->limcre);
		if ($this->isColumnModified(CobclientPeer::CODCTA)) $criteria->add(CobclientPeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CobclientPeer::REGMER)) $criteria->add(CobclientPeer::REGMER, $this->regmer);
		if ($this->isColumnModified(CobclientPeer::FECREG)) $criteria->add(CobclientPeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CobclientPeer::TOMREG)) $criteria->add(CobclientPeer::TOMREG, $this->tomreg);
		if ($this->isColumnModified(CobclientPeer::FOLREG)) $criteria->add(CobclientPeer::FOLREG, $this->folreg);
		if ($this->isColumnModified(CobclientPeer::CAPSUS)) $criteria->add(CobclientPeer::CAPSUS, $this->capsus);
		if ($this->isColumnModified(CobclientPeer::CAPPAG)) $criteria->add(CobclientPeer::CAPPAG, $this->cappag);
		if ($this->isColumnModified(CobclientPeer::CIREPLEG)) $criteria->add(CobclientPeer::CIREPLEG, $this->cirepleg);
		if ($this->isColumnModified(CobclientPeer::NOMREPLEG)) $criteria->add(CobclientPeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(CobclientPeer::DIRREPLEG)) $criteria->add(CobclientPeer::DIRREPLEG, $this->dirrepleg);
		if ($this->isColumnModified(CobclientPeer::RIFFIA)) $criteria->add(CobclientPeer::RIFFIA, $this->riffia);
		if ($this->isColumnModified(CobclientPeer::NOMFIA)) $criteria->add(CobclientPeer::NOMFIA, $this->nomfia);
		if ($this->isColumnModified(CobclientPeer::DIRFIA)) $criteria->add(CobclientPeer::DIRFIA, $this->dirfia);
		if ($this->isColumnModified(CobclientPeer::TELFIA)) $criteria->add(CobclientPeer::TELFIA, $this->telfia);
		if ($this->isColumnModified(CobclientPeer::CODCIU)) $criteria->add(CobclientPeer::CODCIU, $this->codciu);
		if ($this->isColumnModified(CobclientPeer::CODEDO)) $criteria->add(CobclientPeer::CODEDO, $this->codedo);
		if ($this->isColumnModified(CobclientPeer::CODPAI)) $criteria->add(CobclientPeer::CODPAI, $this->codpai);
		if ($this->isColumnModified(CobclientPeer::FECNAC)) $criteria->add(CobclientPeer::FECNAC, $this->fecnac);
		if ($this->isColumnModified(CobclientPeer::TIPCLI)) $criteria->add(CobclientPeer::TIPCLI, $this->tipcli);
		if ($this->isColumnModified(CobclientPeer::CODTIPREC)) $criteria->add(CobclientPeer::CODTIPREC, $this->codtiprec);
		if ($this->isColumnModified(CobclientPeer::CODORDMERCON)) $criteria->add(CobclientPeer::CODORDMERCON, $this->codordmercon);
		if ($this->isColumnModified(CobclientPeer::CODPERMERCON)) $criteria->add(CobclientPeer::CODPERMERCON, $this->codpermercon);
		if ($this->isColumnModified(CobclientPeer::ID)) $criteria->add(CobclientPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CobclientPeer::DATABASE_NAME);

		$criteria->add(CobclientPeer::ID, $this->id);

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

		$copyObj->setCodcli($this->codcli);

		$copyObj->setNomcli($this->nomcli);

		$copyObj->setRifcli($this->rifcli);

		$copyObj->setNitcli($this->nitcli);

		$copyObj->setDircli($this->dircli);

		$copyObj->setTelcli($this->telcli);

		$copyObj->setFaxcli($this->faxcli);

		$copyObj->setEmail($this->email);

		$copyObj->setTipper($this->tipper);

		$copyObj->setNaccli($this->naccli);

		$copyObj->setLimcre($this->limcre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setRegmer($this->regmer);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setTomreg($this->tomreg);

		$copyObj->setFolreg($this->folreg);

		$copyObj->setCapsus($this->capsus);

		$copyObj->setCappag($this->cappag);

		$copyObj->setCirepleg($this->cirepleg);

		$copyObj->setNomrepleg($this->nomrepleg);

		$copyObj->setDirrepleg($this->dirrepleg);

		$copyObj->setRiffia($this->riffia);

		$copyObj->setNomfia($this->nomfia);

		$copyObj->setDirfia($this->dirfia);

		$copyObj->setTelfia($this->telfia);

		$copyObj->setCodciu($this->codciu);

		$copyObj->setCodedo($this->codedo);

		$copyObj->setCodpai($this->codpai);

		$copyObj->setFecnac($this->fecnac);

		$copyObj->setTipcli($this->tipcli);

		$copyObj->setCodtiprec($this->codtiprec);

		$copyObj->setCodordmercon($this->codordmercon);

		$copyObj->setCodpermercon($this->codpermercon);


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
			self::$peer = new CobclientPeer();
		}
		return self::$peer;
	}

} 