<?php


abstract class BaseNpmovrac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $nronom;


	
	protected $perrac;


	
	protected $anorac;


	
	protected $tipmov;


	
	protected $fecmov;


	
	protected $status;


	
	protected $codcarapr;


	
	protected $nomcarapr;


	
	protected $suecarapr;


	
	protected $comcarapr;


	
	protected $codocpapr;


	
	protected $pasocpapr;


	
	protected $codempapr;


	
	protected $nomempapr;


	
	protected $codcatapr;


	
	protected $estorgapr;


	
	protected $codcarpro;


	
	protected $nomcarpro;


	
	protected $suecarpro;


	
	protected $comcarpro;


	
	protected $codocppro;


	
	protected $pasocppro;


	
	protected $codemppro;


	
	protected $nomemppro;


	
	protected $codcatpro;


	
	protected $estorgpro;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getNronom()
	{

		return $this->nronom;
	}

	
	public function getPerrac()
	{

		return $this->perrac;
	}

	
	public function getAnorac()
	{

		return $this->anorac;
	}

	
	public function getTipmov()
	{

		return $this->tipmov;
	}

	
	public function getFecmov($format = 'Y-m-d')
	{

		if ($this->fecmov === null || $this->fecmov === '') {
			return null;
		} elseif (!is_int($this->fecmov)) {
						$ts = strtotime($this->fecmov);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [fecmov] as date/time value: " . var_export($this->fecmov, true));
			}
		} else {
			$ts = $this->fecmov;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getStatus()
	{

		return $this->status;
	}

	
	public function getCodcarapr()
	{

		return $this->codcarapr;
	}

	
	public function getNomcarapr()
	{

		return $this->nomcarapr;
	}

	
	public function getSuecarapr()
	{

		return $this->suecarapr;
	}

	
	public function getComcarapr()
	{

		return $this->comcarapr;
	}

	
	public function getCodocpapr()
	{

		return $this->codocpapr;
	}

	
	public function getPasocpapr()
	{

		return $this->pasocpapr;
	}

	
	public function getCodempapr()
	{

		return $this->codempapr;
	}

	
	public function getNomempapr()
	{

		return $this->nomempapr;
	}

	
	public function getCodcatapr()
	{

		return $this->codcatapr;
	}

	
	public function getEstorgapr()
	{

		return $this->estorgapr;
	}

	
	public function getCodcarpro()
	{

		return $this->codcarpro;
	}

	
	public function getNomcarpro()
	{

		return $this->nomcarpro;
	}

	
	public function getSuecarpro()
	{

		return $this->suecarpro;
	}

	
	public function getComcarpro()
	{

		return $this->comcarpro;
	}

	
	public function getCodocppro()
	{

		return $this->codocppro;
	}

	
	public function getPasocppro()
	{

		return $this->pasocppro;
	}

	
	public function getCodemppro()
	{

		return $this->codemppro;
	}

	
	public function getNomemppro()
	{

		return $this->nomemppro;
	}

	
	public function getCodcatpro()
	{

		return $this->codcatpro;
	}

	
	public function getEstorgpro()
	{

		return $this->estorgpro;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setNronom($v)
	{

		if ($this->nronom !== $v) {
			$this->nronom = $v;
			$this->modifiedColumns[] = NpmovracPeer::NRONOM;
		}

	} 
	
	public function setPerrac($v)
	{

		if ($this->perrac !== $v) {
			$this->perrac = $v;
			$this->modifiedColumns[] = NpmovracPeer::PERRAC;
		}

	} 
	
	public function setAnorac($v)
	{

		if ($this->anorac !== $v) {
			$this->anorac = $v;
			$this->modifiedColumns[] = NpmovracPeer::ANORAC;
		}

	} 
	
	public function setTipmov($v)
	{

		if ($this->tipmov !== $v) {
			$this->tipmov = $v;
			$this->modifiedColumns[] = NpmovracPeer::TIPMOV;
		}

	} 
	
	public function setFecmov($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [fecmov] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->fecmov !== $ts) {
			$this->fecmov = $ts;
			$this->modifiedColumns[] = NpmovracPeer::FECMOV;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = NpmovracPeer::STATUS;
		}

	} 
	
	public function setCodcarapr($v)
	{

		if ($this->codcarapr !== $v) {
			$this->codcarapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODCARAPR;
		}

	} 
	
	public function setNomcarapr($v)
	{

		if ($this->nomcarapr !== $v) {
			$this->nomcarapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::NOMCARAPR;
		}

	} 
	
	public function setSuecarapr($v)
	{

		if ($this->suecarapr !== $v) {
			$this->suecarapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::SUECARAPR;
		}

	} 
	
	public function setComcarapr($v)
	{

		if ($this->comcarapr !== $v) {
			$this->comcarapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::COMCARAPR;
		}

	} 
	
	public function setCodocpapr($v)
	{

		if ($this->codocpapr !== $v) {
			$this->codocpapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODOCPAPR;
		}

	} 
	
	public function setPasocpapr($v)
	{

		if ($this->pasocpapr !== $v) {
			$this->pasocpapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::PASOCPAPR;
		}

	} 
	
	public function setCodempapr($v)
	{

		if ($this->codempapr !== $v) {
			$this->codempapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODEMPAPR;
		}

	} 
	
	public function setNomempapr($v)
	{

		if ($this->nomempapr !== $v) {
			$this->nomempapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::NOMEMPAPR;
		}

	} 
	
	public function setCodcatapr($v)
	{

		if ($this->codcatapr !== $v) {
			$this->codcatapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODCATAPR;
		}

	} 
	
	public function setEstorgapr($v)
	{

		if ($this->estorgapr !== $v) {
			$this->estorgapr = $v;
			$this->modifiedColumns[] = NpmovracPeer::ESTORGAPR;
		}

	} 
	
	public function setCodcarpro($v)
	{

		if ($this->codcarpro !== $v) {
			$this->codcarpro = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODCARPRO;
		}

	} 
	
	public function setNomcarpro($v)
	{

		if ($this->nomcarpro !== $v) {
			$this->nomcarpro = $v;
			$this->modifiedColumns[] = NpmovracPeer::NOMCARPRO;
		}

	} 
	
	public function setSuecarpro($v)
	{

		if ($this->suecarpro !== $v) {
			$this->suecarpro = $v;
			$this->modifiedColumns[] = NpmovracPeer::SUECARPRO;
		}

	} 
	
	public function setComcarpro($v)
	{

		if ($this->comcarpro !== $v) {
			$this->comcarpro = $v;
			$this->modifiedColumns[] = NpmovracPeer::COMCARPRO;
		}

	} 
	
	public function setCodocppro($v)
	{

		if ($this->codocppro !== $v) {
			$this->codocppro = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODOCPPRO;
		}

	} 
	
	public function setPasocppro($v)
	{

		if ($this->pasocppro !== $v) {
			$this->pasocppro = $v;
			$this->modifiedColumns[] = NpmovracPeer::PASOCPPRO;
		}

	} 
	
	public function setCodemppro($v)
	{

		if ($this->codemppro !== $v) {
			$this->codemppro = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODEMPPRO;
		}

	} 
	
	public function setNomemppro($v)
	{

		if ($this->nomemppro !== $v) {
			$this->nomemppro = $v;
			$this->modifiedColumns[] = NpmovracPeer::NOMEMPPRO;
		}

	} 
	
	public function setCodcatpro($v)
	{

		if ($this->codcatpro !== $v) {
			$this->codcatpro = $v;
			$this->modifiedColumns[] = NpmovracPeer::CODCATPRO;
		}

	} 
	
	public function setEstorgpro($v)
	{

		if ($this->estorgpro !== $v) {
			$this->estorgpro = $v;
			$this->modifiedColumns[] = NpmovracPeer::ESTORGPRO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpmovracPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->nronom = $rs->getString($startcol + 0);

			$this->perrac = $rs->getString($startcol + 1);

			$this->anorac = $rs->getString($startcol + 2);

			$this->tipmov = $rs->getString($startcol + 3);

			$this->fecmov = $rs->getDate($startcol + 4, null);

			$this->status = $rs->getString($startcol + 5);

			$this->codcarapr = $rs->getString($startcol + 6);

			$this->nomcarapr = $rs->getString($startcol + 7);

			$this->suecarapr = $rs->getFloat($startcol + 8);

			$this->comcarapr = $rs->getFloat($startcol + 9);

			$this->codocpapr = $rs->getString($startcol + 10);

			$this->pasocpapr = $rs->getString($startcol + 11);

			$this->codempapr = $rs->getString($startcol + 12);

			$this->nomempapr = $rs->getString($startcol + 13);

			$this->codcatapr = $rs->getString($startcol + 14);

			$this->estorgapr = $rs->getString($startcol + 15);

			$this->codcarpro = $rs->getString($startcol + 16);

			$this->nomcarpro = $rs->getString($startcol + 17);

			$this->suecarpro = $rs->getFloat($startcol + 18);

			$this->comcarpro = $rs->getFloat($startcol + 19);

			$this->codocppro = $rs->getString($startcol + 20);

			$this->pasocppro = $rs->getString($startcol + 21);

			$this->codemppro = $rs->getString($startcol + 22);

			$this->nomemppro = $rs->getString($startcol + 23);

			$this->codcatpro = $rs->getString($startcol + 24);

			$this->estorgpro = $rs->getString($startcol + 25);

			$this->id = $rs->getInt($startcol + 26);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 27; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npmovrac object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpmovracPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpmovracPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpmovracPeer::DATABASE_NAME);
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
					$pk = NpmovracPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpmovracPeer::doUpdate($this, $con);
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


			if (($retval = NpmovracPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmovracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNronom();
				break;
			case 1:
				return $this->getPerrac();
				break;
			case 2:
				return $this->getAnorac();
				break;
			case 3:
				return $this->getTipmov();
				break;
			case 4:
				return $this->getFecmov();
				break;
			case 5:
				return $this->getStatus();
				break;
			case 6:
				return $this->getCodcarapr();
				break;
			case 7:
				return $this->getNomcarapr();
				break;
			case 8:
				return $this->getSuecarapr();
				break;
			case 9:
				return $this->getComcarapr();
				break;
			case 10:
				return $this->getCodocpapr();
				break;
			case 11:
				return $this->getPasocpapr();
				break;
			case 12:
				return $this->getCodempapr();
				break;
			case 13:
				return $this->getNomempapr();
				break;
			case 14:
				return $this->getCodcatapr();
				break;
			case 15:
				return $this->getEstorgapr();
				break;
			case 16:
				return $this->getCodcarpro();
				break;
			case 17:
				return $this->getNomcarpro();
				break;
			case 18:
				return $this->getSuecarpro();
				break;
			case 19:
				return $this->getComcarpro();
				break;
			case 20:
				return $this->getCodocppro();
				break;
			case 21:
				return $this->getPasocppro();
				break;
			case 22:
				return $this->getCodemppro();
				break;
			case 23:
				return $this->getNomemppro();
				break;
			case 24:
				return $this->getCodcatpro();
				break;
			case 25:
				return $this->getEstorgpro();
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
		$keys = NpmovracPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNronom(),
			$keys[1] => $this->getPerrac(),
			$keys[2] => $this->getAnorac(),
			$keys[3] => $this->getTipmov(),
			$keys[4] => $this->getFecmov(),
			$keys[5] => $this->getStatus(),
			$keys[6] => $this->getCodcarapr(),
			$keys[7] => $this->getNomcarapr(),
			$keys[8] => $this->getSuecarapr(),
			$keys[9] => $this->getComcarapr(),
			$keys[10] => $this->getCodocpapr(),
			$keys[11] => $this->getPasocpapr(),
			$keys[12] => $this->getCodempapr(),
			$keys[13] => $this->getNomempapr(),
			$keys[14] => $this->getCodcatapr(),
			$keys[15] => $this->getEstorgapr(),
			$keys[16] => $this->getCodcarpro(),
			$keys[17] => $this->getNomcarpro(),
			$keys[18] => $this->getSuecarpro(),
			$keys[19] => $this->getComcarpro(),
			$keys[20] => $this->getCodocppro(),
			$keys[21] => $this->getPasocppro(),
			$keys[22] => $this->getCodemppro(),
			$keys[23] => $this->getNomemppro(),
			$keys[24] => $this->getCodcatpro(),
			$keys[25] => $this->getEstorgpro(),
			$keys[26] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpmovracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNronom($value);
				break;
			case 1:
				$this->setPerrac($value);
				break;
			case 2:
				$this->setAnorac($value);
				break;
			case 3:
				$this->setTipmov($value);
				break;
			case 4:
				$this->setFecmov($value);
				break;
			case 5:
				$this->setStatus($value);
				break;
			case 6:
				$this->setCodcarapr($value);
				break;
			case 7:
				$this->setNomcarapr($value);
				break;
			case 8:
				$this->setSuecarapr($value);
				break;
			case 9:
				$this->setComcarapr($value);
				break;
			case 10:
				$this->setCodocpapr($value);
				break;
			case 11:
				$this->setPasocpapr($value);
				break;
			case 12:
				$this->setCodempapr($value);
				break;
			case 13:
				$this->setNomempapr($value);
				break;
			case 14:
				$this->setCodcatapr($value);
				break;
			case 15:
				$this->setEstorgapr($value);
				break;
			case 16:
				$this->setCodcarpro($value);
				break;
			case 17:
				$this->setNomcarpro($value);
				break;
			case 18:
				$this->setSuecarpro($value);
				break;
			case 19:
				$this->setComcarpro($value);
				break;
			case 20:
				$this->setCodocppro($value);
				break;
			case 21:
				$this->setPasocppro($value);
				break;
			case 22:
				$this->setCodemppro($value);
				break;
			case 23:
				$this->setNomemppro($value);
				break;
			case 24:
				$this->setCodcatpro($value);
				break;
			case 25:
				$this->setEstorgpro($value);
				break;
			case 26:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpmovracPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNronom($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerrac($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAnorac($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTipmov($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFecmov($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStatus($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodcarapr($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomcarapr($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSuecarapr($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setComcarapr($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodocpapr($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setPasocpapr($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCodempapr($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNomempapr($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCodcatapr($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEstorgapr($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCodcarpro($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNomcarpro($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setSuecarpro($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setComcarpro($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCodocppro($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setPasocppro($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCodemppro($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setNomemppro($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCodcatpro($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setEstorgpro($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setId($arr[$keys[26]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpmovracPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpmovracPeer::NRONOM)) $criteria->add(NpmovracPeer::NRONOM, $this->nronom);
		if ($this->isColumnModified(NpmovracPeer::PERRAC)) $criteria->add(NpmovracPeer::PERRAC, $this->perrac);
		if ($this->isColumnModified(NpmovracPeer::ANORAC)) $criteria->add(NpmovracPeer::ANORAC, $this->anorac);
		if ($this->isColumnModified(NpmovracPeer::TIPMOV)) $criteria->add(NpmovracPeer::TIPMOV, $this->tipmov);
		if ($this->isColumnModified(NpmovracPeer::FECMOV)) $criteria->add(NpmovracPeer::FECMOV, $this->fecmov);
		if ($this->isColumnModified(NpmovracPeer::STATUS)) $criteria->add(NpmovracPeer::STATUS, $this->status);
		if ($this->isColumnModified(NpmovracPeer::CODCARAPR)) $criteria->add(NpmovracPeer::CODCARAPR, $this->codcarapr);
		if ($this->isColumnModified(NpmovracPeer::NOMCARAPR)) $criteria->add(NpmovracPeer::NOMCARAPR, $this->nomcarapr);
		if ($this->isColumnModified(NpmovracPeer::SUECARAPR)) $criteria->add(NpmovracPeer::SUECARAPR, $this->suecarapr);
		if ($this->isColumnModified(NpmovracPeer::COMCARAPR)) $criteria->add(NpmovracPeer::COMCARAPR, $this->comcarapr);
		if ($this->isColumnModified(NpmovracPeer::CODOCPAPR)) $criteria->add(NpmovracPeer::CODOCPAPR, $this->codocpapr);
		if ($this->isColumnModified(NpmovracPeer::PASOCPAPR)) $criteria->add(NpmovracPeer::PASOCPAPR, $this->pasocpapr);
		if ($this->isColumnModified(NpmovracPeer::CODEMPAPR)) $criteria->add(NpmovracPeer::CODEMPAPR, $this->codempapr);
		if ($this->isColumnModified(NpmovracPeer::NOMEMPAPR)) $criteria->add(NpmovracPeer::NOMEMPAPR, $this->nomempapr);
		if ($this->isColumnModified(NpmovracPeer::CODCATAPR)) $criteria->add(NpmovracPeer::CODCATAPR, $this->codcatapr);
		if ($this->isColumnModified(NpmovracPeer::ESTORGAPR)) $criteria->add(NpmovracPeer::ESTORGAPR, $this->estorgapr);
		if ($this->isColumnModified(NpmovracPeer::CODCARPRO)) $criteria->add(NpmovracPeer::CODCARPRO, $this->codcarpro);
		if ($this->isColumnModified(NpmovracPeer::NOMCARPRO)) $criteria->add(NpmovracPeer::NOMCARPRO, $this->nomcarpro);
		if ($this->isColumnModified(NpmovracPeer::SUECARPRO)) $criteria->add(NpmovracPeer::SUECARPRO, $this->suecarpro);
		if ($this->isColumnModified(NpmovracPeer::COMCARPRO)) $criteria->add(NpmovracPeer::COMCARPRO, $this->comcarpro);
		if ($this->isColumnModified(NpmovracPeer::CODOCPPRO)) $criteria->add(NpmovracPeer::CODOCPPRO, $this->codocppro);
		if ($this->isColumnModified(NpmovracPeer::PASOCPPRO)) $criteria->add(NpmovracPeer::PASOCPPRO, $this->pasocppro);
		if ($this->isColumnModified(NpmovracPeer::CODEMPPRO)) $criteria->add(NpmovracPeer::CODEMPPRO, $this->codemppro);
		if ($this->isColumnModified(NpmovracPeer::NOMEMPPRO)) $criteria->add(NpmovracPeer::NOMEMPPRO, $this->nomemppro);
		if ($this->isColumnModified(NpmovracPeer::CODCATPRO)) $criteria->add(NpmovracPeer::CODCATPRO, $this->codcatpro);
		if ($this->isColumnModified(NpmovracPeer::ESTORGPRO)) $criteria->add(NpmovracPeer::ESTORGPRO, $this->estorgpro);
		if ($this->isColumnModified(NpmovracPeer::ID)) $criteria->add(NpmovracPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpmovracPeer::DATABASE_NAME);

		$criteria->add(NpmovracPeer::ID, $this->id);

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

		$copyObj->setNronom($this->nronom);

		$copyObj->setPerrac($this->perrac);

		$copyObj->setAnorac($this->anorac);

		$copyObj->setTipmov($this->tipmov);

		$copyObj->setFecmov($this->fecmov);

		$copyObj->setStatus($this->status);

		$copyObj->setCodcarapr($this->codcarapr);

		$copyObj->setNomcarapr($this->nomcarapr);

		$copyObj->setSuecarapr($this->suecarapr);

		$copyObj->setComcarapr($this->comcarapr);

		$copyObj->setCodocpapr($this->codocpapr);

		$copyObj->setPasocpapr($this->pasocpapr);

		$copyObj->setCodempapr($this->codempapr);

		$copyObj->setNomempapr($this->nomempapr);

		$copyObj->setCodcatapr($this->codcatapr);

		$copyObj->setEstorgapr($this->estorgapr);

		$copyObj->setCodcarpro($this->codcarpro);

		$copyObj->setNomcarpro($this->nomcarpro);

		$copyObj->setSuecarpro($this->suecarpro);

		$copyObj->setComcarpro($this->comcarpro);

		$copyObj->setCodocppro($this->codocppro);

		$copyObj->setPasocppro($this->pasocppro);

		$copyObj->setCodemppro($this->codemppro);

		$copyObj->setNomemppro($this->nomemppro);

		$copyObj->setCodcatpro($this->codcatpro);

		$copyObj->setEstorgpro($this->estorgpro);


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
			self::$peer = new NpmovracPeer();
		}
		return self::$peer;
	}

} 