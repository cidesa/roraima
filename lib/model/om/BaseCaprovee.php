<?php


abstract class BaseCaprovee extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codpro;


	
	protected $nompro;


	
	protected $rifpro;


	
	protected $nitpro;


	
	protected $dirpro;


	
	protected $telpro;


	
	protected $faxpro;


	
	protected $email;


	
	protected $limcre;


	
	protected $codcta;


	
	protected $regmer;


	
	protected $fecreg;


	
	protected $tomreg;


	
	protected $folreg;


	
	protected $capsus;


	
	protected $cappag;


	
	protected $rifrepleg;


	
	protected $nomrepleg;


	
	protected $dirrepleg;


	
	protected $nrocei;


	
	protected $codram;


	
	protected $fecinscir;


	
	protected $numinscir;


	
	protected $nacpro;


	
	protected $codord;


	
	protected $codpercon;


	
	protected $codtiprec;


	
	protected $codordadi;


	
	protected $codperconadi;


	
	protected $tipo;


	
	protected $fecven;


	
	protected $ciudad;


	
	protected $codordmercon;


	
	protected $codpermercon;


	
	protected $codordcontra;


	
	protected $codpercontra;


	
	protected $temcodpro;


	
	protected $temrifpro;


	
	protected $codctasec;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodpro()
	{

		return $this->codpro;
	}

	
	public function getNompro()
	{

		return $this->nompro;
	}

	
	public function getRifpro()
	{

		return $this->rifpro;
	}

	
	public function getNitpro()
	{

		return $this->nitpro;
	}

	
	public function getDirpro()
	{

		return $this->dirpro;
	}

	
	public function getTelpro()
	{

		return $this->telpro;
	}

	
	public function getFaxpro()
	{

		return $this->faxpro;
	}

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getLimcre()
	{

		return $this->limcre;
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

		return $this->capsus;
	}

	
	public function getCappag()
	{

		return $this->cappag;
	}

	
	public function getRifrepleg()
	{

		return $this->rifrepleg;
	}

	
	public function getNomrepleg()
	{

		return $this->nomrepleg;
	}

	
	public function getDirrepleg()
	{

		return $this->dirrepleg;
	}

	
	public function getNrocei()
	{

		return $this->nrocei;
	}

	
	public function getCodram()
	{

		return $this->codram;
	}

	
	public function getFecinscir($format = 'Y-m-d')
	{

		if ($this->fecinscir === null || $this->fecinscir === '') {
			return null;
		} elseif (!is_int($this->fecinscir)) {
						$ts = strtotime($this->fecinscir);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecinscir] as date/time value: " . var_export($this->fecinscir, true));
			}
		} else {
			$ts = $this->fecinscir;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getNuminscir()
	{

		return $this->numinscir;
	}

	
	public function getNacpro()
	{

		return $this->nacpro;
	}

	
	public function getCodord()
	{

		return $this->codord;
	}

	
	public function getCodpercon()
	{

		return $this->codpercon;
	}

	
	public function getCodtiprec()
	{

		return $this->codtiprec;
	}

	
	public function getCodordadi()
	{

		return $this->codordadi;
	}

	
	public function getCodperconadi()
	{

		return $this->codperconadi;
	}

	
	public function getTipo()
	{

		return $this->tipo;
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

	
	public function getCiudad()
	{

		return $this->ciudad;
	}

	
	public function getCodordmercon()
	{

		return $this->codordmercon;
	}

	
	public function getCodpermercon()
	{

		return $this->codpermercon;
	}

	
	public function getCodordcontra()
	{

		return $this->codordcontra;
	}

	
	public function getCodpercontra()
	{

		return $this->codpercontra;
	}

	
	public function getTemcodpro()
	{

		return $this->temcodpro;
	}

	
	public function getTemrifpro()
	{

		return $this->temrifpro;
	}

	
	public function getCodctasec()
	{

		return $this->codctasec;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = CaproveePeer::CODPRO;
		}

	} 
	
	public function setNompro($v)
	{

		if ($this->nompro !== $v) {
			$this->nompro = $v;
			$this->modifiedColumns[] = CaproveePeer::NOMPRO;
		}

	} 
	
	public function setRifpro($v)
	{

		if ($this->rifpro !== $v) {
			$this->rifpro = $v;
			$this->modifiedColumns[] = CaproveePeer::RIFPRO;
		}

	} 
	
	public function setNitpro($v)
	{

		if ($this->nitpro !== $v) {
			$this->nitpro = $v;
			$this->modifiedColumns[] = CaproveePeer::NITPRO;
		}

	} 
	
	public function setDirpro($v)
	{

		if ($this->dirpro !== $v) {
			$this->dirpro = $v;
			$this->modifiedColumns[] = CaproveePeer::DIRPRO;
		}

	} 
	
	public function setTelpro($v)
	{

		if ($this->telpro !== $v) {
			$this->telpro = $v;
			$this->modifiedColumns[] = CaproveePeer::TELPRO;
		}

	} 
	
	public function setFaxpro($v)
	{

		if ($this->faxpro !== $v) {
			$this->faxpro = $v;
			$this->modifiedColumns[] = CaproveePeer::FAXPRO;
		}

	} 
	
	public function setEmail($v)
	{

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = CaproveePeer::EMAIL;
		}

	} 
	
	public function setLimcre($v)
	{

		if ($this->limcre !== $v) {
			$this->limcre = $v;
			$this->modifiedColumns[] = CaproveePeer::LIMCRE;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = CaproveePeer::CODCTA;
		}

	} 
	
	public function setRegmer($v)
	{

		if ($this->regmer !== $v) {
			$this->regmer = $v;
			$this->modifiedColumns[] = CaproveePeer::REGMER;
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
			$this->modifiedColumns[] = CaproveePeer::FECREG;
		}

	} 
	
	public function setTomreg($v)
	{

		if ($this->tomreg !== $v) {
			$this->tomreg = $v;
			$this->modifiedColumns[] = CaproveePeer::TOMREG;
		}

	} 
	
	public function setFolreg($v)
	{

		if ($this->folreg !== $v) {
			$this->folreg = $v;
			$this->modifiedColumns[] = CaproveePeer::FOLREG;
		}

	} 
	
	public function setCapsus($v)
	{

		if ($this->capsus !== $v) {
			$this->capsus = $v;
			$this->modifiedColumns[] = CaproveePeer::CAPSUS;
		}

	} 
	
	public function setCappag($v)
	{

		if ($this->cappag !== $v) {
			$this->cappag = $v;
			$this->modifiedColumns[] = CaproveePeer::CAPPAG;
		}

	} 
	
	public function setRifrepleg($v)
	{

		if ($this->rifrepleg !== $v) {
			$this->rifrepleg = $v;
			$this->modifiedColumns[] = CaproveePeer::RIFREPLEG;
		}

	} 
	
	public function setNomrepleg($v)
	{

		if ($this->nomrepleg !== $v) {
			$this->nomrepleg = $v;
			$this->modifiedColumns[] = CaproveePeer::NOMREPLEG;
		}

	} 
	
	public function setDirrepleg($v)
	{

		if ($this->dirrepleg !== $v) {
			$this->dirrepleg = $v;
			$this->modifiedColumns[] = CaproveePeer::DIRREPLEG;
		}

	} 
	
	public function setNrocei($v)
	{

		if ($this->nrocei !== $v) {
			$this->nrocei = $v;
			$this->modifiedColumns[] = CaproveePeer::NROCEI;
		}

	} 
	
	public function setCodram($v)
	{

		if ($this->codram !== $v) {
			$this->codram = $v;
			$this->modifiedColumns[] = CaproveePeer::CODRAM;
		}

	} 
	
	public function setFecinscir($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecinscir] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecinscir !== $ts) {
			$this->fecinscir = $ts;
			$this->modifiedColumns[] = CaproveePeer::FECINSCIR;
		}

	} 
	
	public function setNuminscir($v)
	{

		if ($this->numinscir !== $v) {
			$this->numinscir = $v;
			$this->modifiedColumns[] = CaproveePeer::NUMINSCIR;
		}

	} 
	
	public function setNacpro($v)
	{

		if ($this->nacpro !== $v) {
			$this->nacpro = $v;
			$this->modifiedColumns[] = CaproveePeer::NACPRO;
		}

	} 
	
	public function setCodord($v)
	{

		if ($this->codord !== $v) {
			$this->codord = $v;
			$this->modifiedColumns[] = CaproveePeer::CODORD;
		}

	} 
	
	public function setCodpercon($v)
	{

		if ($this->codpercon !== $v) {
			$this->codpercon = $v;
			$this->modifiedColumns[] = CaproveePeer::CODPERCON;
		}

	} 
	
	public function setCodtiprec($v)
	{

		if ($this->codtiprec !== $v) {
			$this->codtiprec = $v;
			$this->modifiedColumns[] = CaproveePeer::CODTIPREC;
		}

	} 
	
	public function setCodordadi($v)
	{

		if ($this->codordadi !== $v) {
			$this->codordadi = $v;
			$this->modifiedColumns[] = CaproveePeer::CODORDADI;
		}

	} 
	
	public function setCodperconadi($v)
	{

		if ($this->codperconadi !== $v) {
			$this->codperconadi = $v;
			$this->modifiedColumns[] = CaproveePeer::CODPERCONADI;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = CaproveePeer::TIPO;
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
			$this->modifiedColumns[] = CaproveePeer::FECVEN;
		}

	} 
	
	public function setCiudad($v)
	{

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = CaproveePeer::CIUDAD;
		}

	} 
	
	public function setCodordmercon($v)
	{

		if ($this->codordmercon !== $v) {
			$this->codordmercon = $v;
			$this->modifiedColumns[] = CaproveePeer::CODORDMERCON;
		}

	} 
	
	public function setCodpermercon($v)
	{

		if ($this->codpermercon !== $v) {
			$this->codpermercon = $v;
			$this->modifiedColumns[] = CaproveePeer::CODPERMERCON;
		}

	} 
	
	public function setCodordcontra($v)
	{

		if ($this->codordcontra !== $v) {
			$this->codordcontra = $v;
			$this->modifiedColumns[] = CaproveePeer::CODORDCONTRA;
		}

	} 
	
	public function setCodpercontra($v)
	{

		if ($this->codpercontra !== $v) {
			$this->codpercontra = $v;
			$this->modifiedColumns[] = CaproveePeer::CODPERCONTRA;
		}

	} 
	
	public function setTemcodpro($v)
	{

		if ($this->temcodpro !== $v) {
			$this->temcodpro = $v;
			$this->modifiedColumns[] = CaproveePeer::TEMCODPRO;
		}

	} 
	
	public function setTemrifpro($v)
	{

		if ($this->temrifpro !== $v) {
			$this->temrifpro = $v;
			$this->modifiedColumns[] = CaproveePeer::TEMRIFPRO;
		}

	} 
	
	public function setCodctasec($v)
	{

		if ($this->codctasec !== $v) {
			$this->codctasec = $v;
			$this->modifiedColumns[] = CaproveePeer::CODCTASEC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CaproveePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codpro = $rs->getString($startcol + 0);

			$this->nompro = $rs->getString($startcol + 1);

			$this->rifpro = $rs->getString($startcol + 2);

			$this->nitpro = $rs->getString($startcol + 3);

			$this->dirpro = $rs->getString($startcol + 4);

			$this->telpro = $rs->getString($startcol + 5);

			$this->faxpro = $rs->getString($startcol + 6);

			$this->email = $rs->getString($startcol + 7);

			$this->limcre = $rs->getFloat($startcol + 8);

			$this->codcta = $rs->getString($startcol + 9);

			$this->regmer = $rs->getString($startcol + 10);

			$this->fecreg = $rs->getDate($startcol + 11, null);

			$this->tomreg = $rs->getString($startcol + 12);

			$this->folreg = $rs->getString($startcol + 13);

			$this->capsus = $rs->getFloat($startcol + 14);

			$this->cappag = $rs->getFloat($startcol + 15);

			$this->rifrepleg = $rs->getString($startcol + 16);

			$this->nomrepleg = $rs->getString($startcol + 17);

			$this->dirrepleg = $rs->getString($startcol + 18);

			$this->nrocei = $rs->getString($startcol + 19);

			$this->codram = $rs->getString($startcol + 20);

			$this->fecinscir = $rs->getDate($startcol + 21, null);

			$this->numinscir = $rs->getString($startcol + 22);

			$this->nacpro = $rs->getString($startcol + 23);

			$this->codord = $rs->getString($startcol + 24);

			$this->codpercon = $rs->getString($startcol + 25);

			$this->codtiprec = $rs->getString($startcol + 26);

			$this->codordadi = $rs->getString($startcol + 27);

			$this->codperconadi = $rs->getString($startcol + 28);

			$this->tipo = $rs->getString($startcol + 29);

			$this->fecven = $rs->getDate($startcol + 30, null);

			$this->ciudad = $rs->getString($startcol + 31);

			$this->codordmercon = $rs->getString($startcol + 32);

			$this->codpermercon = $rs->getString($startcol + 33);

			$this->codordcontra = $rs->getString($startcol + 34);

			$this->codpercontra = $rs->getString($startcol + 35);

			$this->temcodpro = $rs->getString($startcol + 36);

			$this->temrifpro = $rs->getString($startcol + 37);

			$this->codctasec = $rs->getString($startcol + 38);

			$this->id = $rs->getInt($startcol + 39);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 40; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Caprovee object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CaproveePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CaproveePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CaproveePeer::DATABASE_NAME);
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
					$pk = CaproveePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CaproveePeer::doUpdate($this, $con);
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


			if (($retval = CaproveePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodpro();
				break;
			case 1:
				return $this->getNompro();
				break;
			case 2:
				return $this->getRifpro();
				break;
			case 3:
				return $this->getNitpro();
				break;
			case 4:
				return $this->getDirpro();
				break;
			case 5:
				return $this->getTelpro();
				break;
			case 6:
				return $this->getFaxpro();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getLimcre();
				break;
			case 9:
				return $this->getCodcta();
				break;
			case 10:
				return $this->getRegmer();
				break;
			case 11:
				return $this->getFecreg();
				break;
			case 12:
				return $this->getTomreg();
				break;
			case 13:
				return $this->getFolreg();
				break;
			case 14:
				return $this->getCapsus();
				break;
			case 15:
				return $this->getCappag();
				break;
			case 16:
				return $this->getRifrepleg();
				break;
			case 17:
				return $this->getNomrepleg();
				break;
			case 18:
				return $this->getDirrepleg();
				break;
			case 19:
				return $this->getNrocei();
				break;
			case 20:
				return $this->getCodram();
				break;
			case 21:
				return $this->getFecinscir();
				break;
			case 22:
				return $this->getNuminscir();
				break;
			case 23:
				return $this->getNacpro();
				break;
			case 24:
				return $this->getCodord();
				break;
			case 25:
				return $this->getCodpercon();
				break;
			case 26:
				return $this->getCodtiprec();
				break;
			case 27:
				return $this->getCodordadi();
				break;
			case 28:
				return $this->getCodperconadi();
				break;
			case 29:
				return $this->getTipo();
				break;
			case 30:
				return $this->getFecven();
				break;
			case 31:
				return $this->getCiudad();
				break;
			case 32:
				return $this->getCodordmercon();
				break;
			case 33:
				return $this->getCodpermercon();
				break;
			case 34:
				return $this->getCodordcontra();
				break;
			case 35:
				return $this->getCodpercontra();
				break;
			case 36:
				return $this->getTemcodpro();
				break;
			case 37:
				return $this->getTemrifpro();
				break;
			case 38:
				return $this->getCodctasec();
				break;
			case 39:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaproveePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodpro(),
			$keys[1] => $this->getNompro(),
			$keys[2] => $this->getRifpro(),
			$keys[3] => $this->getNitpro(),
			$keys[4] => $this->getDirpro(),
			$keys[5] => $this->getTelpro(),
			$keys[6] => $this->getFaxpro(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getLimcre(),
			$keys[9] => $this->getCodcta(),
			$keys[10] => $this->getRegmer(),
			$keys[11] => $this->getFecreg(),
			$keys[12] => $this->getTomreg(),
			$keys[13] => $this->getFolreg(),
			$keys[14] => $this->getCapsus(),
			$keys[15] => $this->getCappag(),
			$keys[16] => $this->getRifrepleg(),
			$keys[17] => $this->getNomrepleg(),
			$keys[18] => $this->getDirrepleg(),
			$keys[19] => $this->getNrocei(),
			$keys[20] => $this->getCodram(),
			$keys[21] => $this->getFecinscir(),
			$keys[22] => $this->getNuminscir(),
			$keys[23] => $this->getNacpro(),
			$keys[24] => $this->getCodord(),
			$keys[25] => $this->getCodpercon(),
			$keys[26] => $this->getCodtiprec(),
			$keys[27] => $this->getCodordadi(),
			$keys[28] => $this->getCodperconadi(),
			$keys[29] => $this->getTipo(),
			$keys[30] => $this->getFecven(),
			$keys[31] => $this->getCiudad(),
			$keys[32] => $this->getCodordmercon(),
			$keys[33] => $this->getCodpermercon(),
			$keys[34] => $this->getCodordcontra(),
			$keys[35] => $this->getCodpercontra(),
			$keys[36] => $this->getTemcodpro(),
			$keys[37] => $this->getTemrifpro(),
			$keys[38] => $this->getCodctasec(),
			$keys[39] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CaproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodpro($value);
				break;
			case 1:
				$this->setNompro($value);
				break;
			case 2:
				$this->setRifpro($value);
				break;
			case 3:
				$this->setNitpro($value);
				break;
			case 4:
				$this->setDirpro($value);
				break;
			case 5:
				$this->setTelpro($value);
				break;
			case 6:
				$this->setFaxpro($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setLimcre($value);
				break;
			case 9:
				$this->setCodcta($value);
				break;
			case 10:
				$this->setRegmer($value);
				break;
			case 11:
				$this->setFecreg($value);
				break;
			case 12:
				$this->setTomreg($value);
				break;
			case 13:
				$this->setFolreg($value);
				break;
			case 14:
				$this->setCapsus($value);
				break;
			case 15:
				$this->setCappag($value);
				break;
			case 16:
				$this->setRifrepleg($value);
				break;
			case 17:
				$this->setNomrepleg($value);
				break;
			case 18:
				$this->setDirrepleg($value);
				break;
			case 19:
				$this->setNrocei($value);
				break;
			case 20:
				$this->setCodram($value);
				break;
			case 21:
				$this->setFecinscir($value);
				break;
			case 22:
				$this->setNuminscir($value);
				break;
			case 23:
				$this->setNacpro($value);
				break;
			case 24:
				$this->setCodord($value);
				break;
			case 25:
				$this->setCodpercon($value);
				break;
			case 26:
				$this->setCodtiprec($value);
				break;
			case 27:
				$this->setCodordadi($value);
				break;
			case 28:
				$this->setCodperconadi($value);
				break;
			case 29:
				$this->setTipo($value);
				break;
			case 30:
				$this->setFecven($value);
				break;
			case 31:
				$this->setCiudad($value);
				break;
			case 32:
				$this->setCodordmercon($value);
				break;
			case 33:
				$this->setCodpermercon($value);
				break;
			case 34:
				$this->setCodordcontra($value);
				break;
			case 35:
				$this->setCodpercontra($value);
				break;
			case 36:
				$this->setTemcodpro($value);
				break;
			case 37:
				$this->setTemrifpro($value);
				break;
			case 38:
				$this->setCodctasec($value);
				break;
			case 39:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CaproveePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodpro($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNompro($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRifpro($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNitpro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDirpro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelpro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFaxpro($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLimcre($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodcta($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRegmer($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFecreg($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTomreg($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setFolreg($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCapsus($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCappag($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setRifrepleg($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNomrepleg($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDirrepleg($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setNrocei($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodram($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setFecinscir($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNuminscir($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNacpro($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodord($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodpercon($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setCodtiprec($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setCodordadi($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setCodperconadi($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTipo($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setFecven($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setCiudad($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setCodordmercon($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setCodpermercon($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setCodordcontra($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setCodpercontra($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setTemcodpro($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setTemrifpro($arr[$keys[37]]);
		if (array_key_exists($keys[38], $arr)) $this->setCodctasec($arr[$keys[38]]);
		if (array_key_exists($keys[39], $arr)) $this->setId($arr[$keys[39]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CaproveePeer::DATABASE_NAME);

		if ($this->isColumnModified(CaproveePeer::CODPRO)) $criteria->add(CaproveePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(CaproveePeer::NOMPRO)) $criteria->add(CaproveePeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(CaproveePeer::RIFPRO)) $criteria->add(CaproveePeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(CaproveePeer::NITPRO)) $criteria->add(CaproveePeer::NITPRO, $this->nitpro);
		if ($this->isColumnModified(CaproveePeer::DIRPRO)) $criteria->add(CaproveePeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(CaproveePeer::TELPRO)) $criteria->add(CaproveePeer::TELPRO, $this->telpro);
		if ($this->isColumnModified(CaproveePeer::FAXPRO)) $criteria->add(CaproveePeer::FAXPRO, $this->faxpro);
		if ($this->isColumnModified(CaproveePeer::EMAIL)) $criteria->add(CaproveePeer::EMAIL, $this->email);
		if ($this->isColumnModified(CaproveePeer::LIMCRE)) $criteria->add(CaproveePeer::LIMCRE, $this->limcre);
		if ($this->isColumnModified(CaproveePeer::CODCTA)) $criteria->add(CaproveePeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(CaproveePeer::REGMER)) $criteria->add(CaproveePeer::REGMER, $this->regmer);
		if ($this->isColumnModified(CaproveePeer::FECREG)) $criteria->add(CaproveePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(CaproveePeer::TOMREG)) $criteria->add(CaproveePeer::TOMREG, $this->tomreg);
		if ($this->isColumnModified(CaproveePeer::FOLREG)) $criteria->add(CaproveePeer::FOLREG, $this->folreg);
		if ($this->isColumnModified(CaproveePeer::CAPSUS)) $criteria->add(CaproveePeer::CAPSUS, $this->capsus);
		if ($this->isColumnModified(CaproveePeer::CAPPAG)) $criteria->add(CaproveePeer::CAPPAG, $this->cappag);
		if ($this->isColumnModified(CaproveePeer::RIFREPLEG)) $criteria->add(CaproveePeer::RIFREPLEG, $this->rifrepleg);
		if ($this->isColumnModified(CaproveePeer::NOMREPLEG)) $criteria->add(CaproveePeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(CaproveePeer::DIRREPLEG)) $criteria->add(CaproveePeer::DIRREPLEG, $this->dirrepleg);
		if ($this->isColumnModified(CaproveePeer::NROCEI)) $criteria->add(CaproveePeer::NROCEI, $this->nrocei);
		if ($this->isColumnModified(CaproveePeer::CODRAM)) $criteria->add(CaproveePeer::CODRAM, $this->codram);
		if ($this->isColumnModified(CaproveePeer::FECINSCIR)) $criteria->add(CaproveePeer::FECINSCIR, $this->fecinscir);
		if ($this->isColumnModified(CaproveePeer::NUMINSCIR)) $criteria->add(CaproveePeer::NUMINSCIR, $this->numinscir);
		if ($this->isColumnModified(CaproveePeer::NACPRO)) $criteria->add(CaproveePeer::NACPRO, $this->nacpro);
		if ($this->isColumnModified(CaproveePeer::CODORD)) $criteria->add(CaproveePeer::CODORD, $this->codord);
		if ($this->isColumnModified(CaproveePeer::CODPERCON)) $criteria->add(CaproveePeer::CODPERCON, $this->codpercon);
		if ($this->isColumnModified(CaproveePeer::CODTIPREC)) $criteria->add(CaproveePeer::CODTIPREC, $this->codtiprec);
		if ($this->isColumnModified(CaproveePeer::CODORDADI)) $criteria->add(CaproveePeer::CODORDADI, $this->codordadi);
		if ($this->isColumnModified(CaproveePeer::CODPERCONADI)) $criteria->add(CaproveePeer::CODPERCONADI, $this->codperconadi);
		if ($this->isColumnModified(CaproveePeer::TIPO)) $criteria->add(CaproveePeer::TIPO, $this->tipo);
		if ($this->isColumnModified(CaproveePeer::FECVEN)) $criteria->add(CaproveePeer::FECVEN, $this->fecven);
		if ($this->isColumnModified(CaproveePeer::CIUDAD)) $criteria->add(CaproveePeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(CaproveePeer::CODORDMERCON)) $criteria->add(CaproveePeer::CODORDMERCON, $this->codordmercon);
		if ($this->isColumnModified(CaproveePeer::CODPERMERCON)) $criteria->add(CaproveePeer::CODPERMERCON, $this->codpermercon);
		if ($this->isColumnModified(CaproveePeer::CODORDCONTRA)) $criteria->add(CaproveePeer::CODORDCONTRA, $this->codordcontra);
		if ($this->isColumnModified(CaproveePeer::CODPERCONTRA)) $criteria->add(CaproveePeer::CODPERCONTRA, $this->codpercontra);
		if ($this->isColumnModified(CaproveePeer::TEMCODPRO)) $criteria->add(CaproveePeer::TEMCODPRO, $this->temcodpro);
		if ($this->isColumnModified(CaproveePeer::TEMRIFPRO)) $criteria->add(CaproveePeer::TEMRIFPRO, $this->temrifpro);
		if ($this->isColumnModified(CaproveePeer::CODCTASEC)) $criteria->add(CaproveePeer::CODCTASEC, $this->codctasec);
		if ($this->isColumnModified(CaproveePeer::ID)) $criteria->add(CaproveePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CaproveePeer::DATABASE_NAME);

		$criteria->add(CaproveePeer::ID, $this->id);

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

		$copyObj->setCodpro($this->codpro);

		$copyObj->setNompro($this->nompro);

		$copyObj->setRifpro($this->rifpro);

		$copyObj->setNitpro($this->nitpro);

		$copyObj->setDirpro($this->dirpro);

		$copyObj->setTelpro($this->telpro);

		$copyObj->setFaxpro($this->faxpro);

		$copyObj->setEmail($this->email);

		$copyObj->setLimcre($this->limcre);

		$copyObj->setCodcta($this->codcta);

		$copyObj->setRegmer($this->regmer);

		$copyObj->setFecreg($this->fecreg);

		$copyObj->setTomreg($this->tomreg);

		$copyObj->setFolreg($this->folreg);

		$copyObj->setCapsus($this->capsus);

		$copyObj->setCappag($this->cappag);

		$copyObj->setRifrepleg($this->rifrepleg);

		$copyObj->setNomrepleg($this->nomrepleg);

		$copyObj->setDirrepleg($this->dirrepleg);

		$copyObj->setNrocei($this->nrocei);

		$copyObj->setCodram($this->codram);

		$copyObj->setFecinscir($this->fecinscir);

		$copyObj->setNuminscir($this->numinscir);

		$copyObj->setNacpro($this->nacpro);

		$copyObj->setCodord($this->codord);

		$copyObj->setCodpercon($this->codpercon);

		$copyObj->setCodtiprec($this->codtiprec);

		$copyObj->setCodordadi($this->codordadi);

		$copyObj->setCodperconadi($this->codperconadi);

		$copyObj->setTipo($this->tipo);

		$copyObj->setFecven($this->fecven);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodordmercon($this->codordmercon);

		$copyObj->setCodpermercon($this->codpermercon);

		$copyObj->setCodordcontra($this->codordcontra);

		$copyObj->setCodpercontra($this->codpercontra);

		$copyObj->setTemcodpro($this->temcodpro);

		$copyObj->setTemrifpro($this->temrifpro);

		$copyObj->setCodctasec($this->codctasec);


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
			self::$peer = new CaproveePeer();
		}
		return self::$peer;
	}

} 