<?php


abstract class BaseOcprovee extends BaseObject  implements Persistent {


	
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


	
	protected $fecinscir;


	
	protected $numinscir;


	
	protected $nacpro;


	
	protected $codord;


	
	protected $codpercon;


	
	protected $codtiprec;


	
	protected $codram;


	
	protected $nrocei;


	
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
	
	public function getCodram()
	{

		return $this->codram; 		
	}
	
	public function getNrocei()
	{

		return $this->nrocei; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodpro($v)
	{

		if ($this->codpro !== $v) {
			$this->codpro = $v;
			$this->modifiedColumns[] = OcproveePeer::CODPRO;
		}

	} 
	
	public function setNompro($v)
	{

		if ($this->nompro !== $v) {
			$this->nompro = $v;
			$this->modifiedColumns[] = OcproveePeer::NOMPRO;
		}

	} 
	
	public function setRifpro($v)
	{

		if ($this->rifpro !== $v) {
			$this->rifpro = $v;
			$this->modifiedColumns[] = OcproveePeer::RIFPRO;
		}

	} 
	
	public function setNitpro($v)
	{

		if ($this->nitpro !== $v) {
			$this->nitpro = $v;
			$this->modifiedColumns[] = OcproveePeer::NITPRO;
		}

	} 
	
	public function setDirpro($v)
	{

		if ($this->dirpro !== $v) {
			$this->dirpro = $v;
			$this->modifiedColumns[] = OcproveePeer::DIRPRO;
		}

	} 
	
	public function setTelpro($v)
	{

		if ($this->telpro !== $v) {
			$this->telpro = $v;
			$this->modifiedColumns[] = OcproveePeer::TELPRO;
		}

	} 
	
	public function setFaxpro($v)
	{

		if ($this->faxpro !== $v) {
			$this->faxpro = $v;
			$this->modifiedColumns[] = OcproveePeer::FAXPRO;
		}

	} 
	
	public function setEmail($v)
	{

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = OcproveePeer::EMAIL;
		}

	} 
	
	public function setLimcre($v)
	{

		if ($this->limcre !== $v) {
			$this->limcre = $v;
			$this->modifiedColumns[] = OcproveePeer::LIMCRE;
		}

	} 
	
	public function setCodcta($v)
	{

		if ($this->codcta !== $v) {
			$this->codcta = $v;
			$this->modifiedColumns[] = OcproveePeer::CODCTA;
		}

	} 
	
	public function setRegmer($v)
	{

		if ($this->regmer !== $v) {
			$this->regmer = $v;
			$this->modifiedColumns[] = OcproveePeer::REGMER;
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
			$this->modifiedColumns[] = OcproveePeer::FECREG;
		}

	} 
	
	public function setTomreg($v)
	{

		if ($this->tomreg !== $v) {
			$this->tomreg = $v;
			$this->modifiedColumns[] = OcproveePeer::TOMREG;
		}

	} 
	
	public function setFolreg($v)
	{

		if ($this->folreg !== $v) {
			$this->folreg = $v;
			$this->modifiedColumns[] = OcproveePeer::FOLREG;
		}

	} 
	
	public function setCapsus($v)
	{

		if ($this->capsus !== $v) {
			$this->capsus = $v;
			$this->modifiedColumns[] = OcproveePeer::CAPSUS;
		}

	} 
	
	public function setCappag($v)
	{

		if ($this->cappag !== $v) {
			$this->cappag = $v;
			$this->modifiedColumns[] = OcproveePeer::CAPPAG;
		}

	} 
	
	public function setRifrepleg($v)
	{

		if ($this->rifrepleg !== $v) {
			$this->rifrepleg = $v;
			$this->modifiedColumns[] = OcproveePeer::RIFREPLEG;
		}

	} 
	
	public function setNomrepleg($v)
	{

		if ($this->nomrepleg !== $v) {
			$this->nomrepleg = $v;
			$this->modifiedColumns[] = OcproveePeer::NOMREPLEG;
		}

	} 
	
	public function setDirrepleg($v)
	{

		if ($this->dirrepleg !== $v) {
			$this->dirrepleg = $v;
			$this->modifiedColumns[] = OcproveePeer::DIRREPLEG;
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
			$this->modifiedColumns[] = OcproveePeer::FECINSCIR;
		}

	} 
	
	public function setNuminscir($v)
	{

		if ($this->numinscir !== $v) {
			$this->numinscir = $v;
			$this->modifiedColumns[] = OcproveePeer::NUMINSCIR;
		}

	} 
	
	public function setNacpro($v)
	{

		if ($this->nacpro !== $v) {
			$this->nacpro = $v;
			$this->modifiedColumns[] = OcproveePeer::NACPRO;
		}

	} 
	
	public function setCodord($v)
	{

		if ($this->codord !== $v) {
			$this->codord = $v;
			$this->modifiedColumns[] = OcproveePeer::CODORD;
		}

	} 
	
	public function setCodpercon($v)
	{

		if ($this->codpercon !== $v) {
			$this->codpercon = $v;
			$this->modifiedColumns[] = OcproveePeer::CODPERCON;
		}

	} 
	
	public function setCodtiprec($v)
	{

		if ($this->codtiprec !== $v) {
			$this->codtiprec = $v;
			$this->modifiedColumns[] = OcproveePeer::CODTIPREC;
		}

	} 
	
	public function setCodram($v)
	{

		if ($this->codram !== $v) {
			$this->codram = $v;
			$this->modifiedColumns[] = OcproveePeer::CODRAM;
		}

	} 
	
	public function setNrocei($v)
	{

		if ($this->nrocei !== $v) {
			$this->nrocei = $v;
			$this->modifiedColumns[] = OcproveePeer::NROCEI;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = OcproveePeer::ID;
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

			$this->fecinscir = $rs->getDate($startcol + 19, null);

			$this->numinscir = $rs->getString($startcol + 20);

			$this->nacpro = $rs->getString($startcol + 21);

			$this->codord = $rs->getString($startcol + 22);

			$this->codpercon = $rs->getString($startcol + 23);

			$this->codtiprec = $rs->getString($startcol + 24);

			$this->codram = $rs->getString($startcol + 25);

			$this->nrocei = $rs->getString($startcol + 26);

			$this->id = $rs->getInt($startcol + 27);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 28; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Ocprovee object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(OcproveePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			OcproveePeer::doDelete($this, $con);
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
			$con = Propel::getConnection(OcproveePeer::DATABASE_NAME);
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
					$pk = OcproveePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += OcproveePeer::doUpdate($this, $con);
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


			if (($retval = OcproveePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFecinscir();
				break;
			case 20:
				return $this->getNuminscir();
				break;
			case 21:
				return $this->getNacpro();
				break;
			case 22:
				return $this->getCodord();
				break;
			case 23:
				return $this->getCodpercon();
				break;
			case 24:
				return $this->getCodtiprec();
				break;
			case 25:
				return $this->getCodram();
				break;
			case 26:
				return $this->getNrocei();
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
		$keys = OcproveePeer::getFieldNames($keyType);
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
			$keys[19] => $this->getFecinscir(),
			$keys[20] => $this->getNuminscir(),
			$keys[21] => $this->getNacpro(),
			$keys[22] => $this->getCodord(),
			$keys[23] => $this->getCodpercon(),
			$keys[24] => $this->getCodtiprec(),
			$keys[25] => $this->getCodram(),
			$keys[26] => $this->getNrocei(),
			$keys[27] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = OcproveePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFecinscir($value);
				break;
			case 20:
				$this->setNuminscir($value);
				break;
			case 21:
				$this->setNacpro($value);
				break;
			case 22:
				$this->setCodord($value);
				break;
			case 23:
				$this->setCodpercon($value);
				break;
			case 24:
				$this->setCodtiprec($value);
				break;
			case 25:
				$this->setCodram($value);
				break;
			case 26:
				$this->setNrocei($value);
				break;
			case 27:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = OcproveePeer::getFieldNames($keyType);

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
		if (array_key_exists($keys[19], $arr)) $this->setFecinscir($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setNuminscir($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setNacpro($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodord($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setCodpercon($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodtiprec($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setCodram($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setNrocei($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setId($arr[$keys[27]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(OcproveePeer::DATABASE_NAME);

		if ($this->isColumnModified(OcproveePeer::CODPRO)) $criteria->add(OcproveePeer::CODPRO, $this->codpro);
		if ($this->isColumnModified(OcproveePeer::NOMPRO)) $criteria->add(OcproveePeer::NOMPRO, $this->nompro);
		if ($this->isColumnModified(OcproveePeer::RIFPRO)) $criteria->add(OcproveePeer::RIFPRO, $this->rifpro);
		if ($this->isColumnModified(OcproveePeer::NITPRO)) $criteria->add(OcproveePeer::NITPRO, $this->nitpro);
		if ($this->isColumnModified(OcproveePeer::DIRPRO)) $criteria->add(OcproveePeer::DIRPRO, $this->dirpro);
		if ($this->isColumnModified(OcproveePeer::TELPRO)) $criteria->add(OcproveePeer::TELPRO, $this->telpro);
		if ($this->isColumnModified(OcproveePeer::FAXPRO)) $criteria->add(OcproveePeer::FAXPRO, $this->faxpro);
		if ($this->isColumnModified(OcproveePeer::EMAIL)) $criteria->add(OcproveePeer::EMAIL, $this->email);
		if ($this->isColumnModified(OcproveePeer::LIMCRE)) $criteria->add(OcproveePeer::LIMCRE, $this->limcre);
		if ($this->isColumnModified(OcproveePeer::CODCTA)) $criteria->add(OcproveePeer::CODCTA, $this->codcta);
		if ($this->isColumnModified(OcproveePeer::REGMER)) $criteria->add(OcproveePeer::REGMER, $this->regmer);
		if ($this->isColumnModified(OcproveePeer::FECREG)) $criteria->add(OcproveePeer::FECREG, $this->fecreg);
		if ($this->isColumnModified(OcproveePeer::TOMREG)) $criteria->add(OcproveePeer::TOMREG, $this->tomreg);
		if ($this->isColumnModified(OcproveePeer::FOLREG)) $criteria->add(OcproveePeer::FOLREG, $this->folreg);
		if ($this->isColumnModified(OcproveePeer::CAPSUS)) $criteria->add(OcproveePeer::CAPSUS, $this->capsus);
		if ($this->isColumnModified(OcproveePeer::CAPPAG)) $criteria->add(OcproveePeer::CAPPAG, $this->cappag);
		if ($this->isColumnModified(OcproveePeer::RIFREPLEG)) $criteria->add(OcproveePeer::RIFREPLEG, $this->rifrepleg);
		if ($this->isColumnModified(OcproveePeer::NOMREPLEG)) $criteria->add(OcproveePeer::NOMREPLEG, $this->nomrepleg);
		if ($this->isColumnModified(OcproveePeer::DIRREPLEG)) $criteria->add(OcproveePeer::DIRREPLEG, $this->dirrepleg);
		if ($this->isColumnModified(OcproveePeer::FECINSCIR)) $criteria->add(OcproveePeer::FECINSCIR, $this->fecinscir);
		if ($this->isColumnModified(OcproveePeer::NUMINSCIR)) $criteria->add(OcproveePeer::NUMINSCIR, $this->numinscir);
		if ($this->isColumnModified(OcproveePeer::NACPRO)) $criteria->add(OcproveePeer::NACPRO, $this->nacpro);
		if ($this->isColumnModified(OcproveePeer::CODORD)) $criteria->add(OcproveePeer::CODORD, $this->codord);
		if ($this->isColumnModified(OcproveePeer::CODPERCON)) $criteria->add(OcproveePeer::CODPERCON, $this->codpercon);
		if ($this->isColumnModified(OcproveePeer::CODTIPREC)) $criteria->add(OcproveePeer::CODTIPREC, $this->codtiprec);
		if ($this->isColumnModified(OcproveePeer::CODRAM)) $criteria->add(OcproveePeer::CODRAM, $this->codram);
		if ($this->isColumnModified(OcproveePeer::NROCEI)) $criteria->add(OcproveePeer::NROCEI, $this->nrocei);
		if ($this->isColumnModified(OcproveePeer::ID)) $criteria->add(OcproveePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(OcproveePeer::DATABASE_NAME);

		$criteria->add(OcproveePeer::ID, $this->id);

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

		$copyObj->setFecinscir($this->fecinscir);

		$copyObj->setNuminscir($this->numinscir);

		$copyObj->setNacpro($this->nacpro);

		$copyObj->setCodord($this->codord);

		$copyObj->setCodpercon($this->codpercon);

		$copyObj->setCodtiprec($this->codtiprec);

		$copyObj->setCodram($this->codram);

		$copyObj->setNrocei($this->nrocei);


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
			self::$peer = new OcproveePeer();
		}
		return self::$peer;
	}

} 