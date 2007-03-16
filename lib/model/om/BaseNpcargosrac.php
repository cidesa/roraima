<?php


abstract class BaseNpcargosrac extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $nomcar;


	
	protected $suecar;


	
	protected $stacar;


	
	protected $codcat;


	
	protected $codocp;


	
	protected $punmin;


	
	protected $graocp;


	
	protected $comcar;


	
	protected $pasocp;


	
	protected $codtip;


	
	protected $tipper;


	
	protected $feccar;


	
	protected $codemp;


	
	protected $nomemp;


	
	protected $nronom;


	
	protected $estorg;


	
	protected $anorac;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcar()
	{

		return $this->codcar;
	}

	
	public function getNomcar()
	{

		return $this->nomcar;
	}

	
	public function getSuecar()
	{

		return $this->suecar;
	}

	
	public function getStacar()
	{

		return $this->stacar;
	}

	
	public function getCodcat()
	{

		return $this->codcat;
	}

	
	public function getCodocp()
	{

		return $this->codocp;
	}

	
	public function getPunmin()
	{

		return $this->punmin;
	}

	
	public function getGraocp()
	{

		return $this->graocp;
	}

	
	public function getComcar()
	{

		return $this->comcar;
	}

	
	public function getPasocp()
	{

		return $this->pasocp;
	}

	
	public function getCodtip()
	{

		return $this->codtip;
	}

	
	public function getTipper()
	{

		return $this->tipper;
	}

	
	public function getFeccar()
	{

		return $this->feccar;
	}

	
	public function getCodemp()
	{

		return $this->codemp;
	}

	
	public function getNomemp()
	{

		return $this->nomemp;
	}

	
	public function getNronom()
	{

		return $this->nronom;
	}

	
	public function getEstorg()
	{

		return $this->estorg;
	}

	
	public function getAnorac()
	{

		return $this->anorac;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpcargosracPeer::CODCAR;
		}

	} 
	
	public function setNomcar($v)
	{

		if ($this->nomcar !== $v) {
			$this->nomcar = $v;
			$this->modifiedColumns[] = NpcargosracPeer::NOMCAR;
		}

	} 
	
	public function setSuecar($v)
	{

		if ($this->suecar !== $v) {
			$this->suecar = $v;
			$this->modifiedColumns[] = NpcargosracPeer::SUECAR;
		}

	} 
	
	public function setStacar($v)
	{

		if ($this->stacar !== $v) {
			$this->stacar = $v;
			$this->modifiedColumns[] = NpcargosracPeer::STACAR;
		}

	} 
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = NpcargosracPeer::CODCAT;
		}

	} 
	
	public function setCodocp($v)
	{

		if ($this->codocp !== $v) {
			$this->codocp = $v;
			$this->modifiedColumns[] = NpcargosracPeer::CODOCP;
		}

	} 
	
	public function setPunmin($v)
	{

		if ($this->punmin !== $v) {
			$this->punmin = $v;
			$this->modifiedColumns[] = NpcargosracPeer::PUNMIN;
		}

	} 
	
	public function setGraocp($v)
	{

		if ($this->graocp !== $v) {
			$this->graocp = $v;
			$this->modifiedColumns[] = NpcargosracPeer::GRAOCP;
		}

	} 
	
	public function setComcar($v)
	{

		if ($this->comcar !== $v) {
			$this->comcar = $v;
			$this->modifiedColumns[] = NpcargosracPeer::COMCAR;
		}

	} 
	
	public function setPasocp($v)
	{

		if ($this->pasocp !== $v) {
			$this->pasocp = $v;
			$this->modifiedColumns[] = NpcargosracPeer::PASOCP;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = NpcargosracPeer::CODTIP;
		}

	} 
	
	public function setTipper($v)
	{

		if ($this->tipper !== $v) {
			$this->tipper = $v;
			$this->modifiedColumns[] = NpcargosracPeer::TIPPER;
		}

	} 
	
	public function setFeccar($v)
	{

		if ($this->feccar !== $v) {
			$this->feccar = $v;
			$this->modifiedColumns[] = NpcargosracPeer::FECCAR;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = NpcargosracPeer::CODEMP;
		}

	} 
	
	public function setNomemp($v)
	{

		if ($this->nomemp !== $v) {
			$this->nomemp = $v;
			$this->modifiedColumns[] = NpcargosracPeer::NOMEMP;
		}

	} 
	
	public function setNronom($v)
	{

		if ($this->nronom !== $v) {
			$this->nronom = $v;
			$this->modifiedColumns[] = NpcargosracPeer::NRONOM;
		}

	} 
	
	public function setEstorg($v)
	{

		if ($this->estorg !== $v) {
			$this->estorg = $v;
			$this->modifiedColumns[] = NpcargosracPeer::ESTORG;
		}

	} 
	
	public function setAnorac($v)
	{

		if ($this->anorac !== $v) {
			$this->anorac = $v;
			$this->modifiedColumns[] = NpcargosracPeer::ANORAC;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcargosracPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcar = $rs->getString($startcol + 0);

			$this->nomcar = $rs->getString($startcol + 1);

			$this->suecar = $rs->getFloat($startcol + 2);

			$this->stacar = $rs->getString($startcol + 3);

			$this->codcat = $rs->getString($startcol + 4);

			$this->codocp = $rs->getString($startcol + 5);

			$this->punmin = $rs->getFloat($startcol + 6);

			$this->graocp = $rs->getString($startcol + 7);

			$this->comcar = $rs->getFloat($startcol + 8);

			$this->pasocp = $rs->getString($startcol + 9);

			$this->codtip = $rs->getString($startcol + 10);

			$this->tipper = $rs->getString($startcol + 11);

			$this->feccar = $rs->getString($startcol + 12);

			$this->codemp = $rs->getString($startcol + 13);

			$this->nomemp = $rs->getString($startcol + 14);

			$this->nronom = $rs->getString($startcol + 15);

			$this->estorg = $rs->getString($startcol + 16);

			$this->anorac = $rs->getString($startcol + 17);

			$this->id = $rs->getInt($startcol + 18);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 19; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcargosrac object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcargosracPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcargosracPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcargosracPeer::DATABASE_NAME);
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
					$pk = NpcargosracPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcargosracPeer::doUpdate($this, $con);
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


			if (($retval = NpcargosracPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargosracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcar();
				break;
			case 1:
				return $this->getNomcar();
				break;
			case 2:
				return $this->getSuecar();
				break;
			case 3:
				return $this->getStacar();
				break;
			case 4:
				return $this->getCodcat();
				break;
			case 5:
				return $this->getCodocp();
				break;
			case 6:
				return $this->getPunmin();
				break;
			case 7:
				return $this->getGraocp();
				break;
			case 8:
				return $this->getComcar();
				break;
			case 9:
				return $this->getPasocp();
				break;
			case 10:
				return $this->getCodtip();
				break;
			case 11:
				return $this->getTipper();
				break;
			case 12:
				return $this->getFeccar();
				break;
			case 13:
				return $this->getCodemp();
				break;
			case 14:
				return $this->getNomemp();
				break;
			case 15:
				return $this->getNronom();
				break;
			case 16:
				return $this->getEstorg();
				break;
			case 17:
				return $this->getAnorac();
				break;
			case 18:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargosracPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getNomcar(),
			$keys[2] => $this->getSuecar(),
			$keys[3] => $this->getStacar(),
			$keys[4] => $this->getCodcat(),
			$keys[5] => $this->getCodocp(),
			$keys[6] => $this->getPunmin(),
			$keys[7] => $this->getGraocp(),
			$keys[8] => $this->getComcar(),
			$keys[9] => $this->getPasocp(),
			$keys[10] => $this->getCodtip(),
			$keys[11] => $this->getTipper(),
			$keys[12] => $this->getFeccar(),
			$keys[13] => $this->getCodemp(),
			$keys[14] => $this->getNomemp(),
			$keys[15] => $this->getNronom(),
			$keys[16] => $this->getEstorg(),
			$keys[17] => $this->getAnorac(),
			$keys[18] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargosracPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcar($value);
				break;
			case 1:
				$this->setNomcar($value);
				break;
			case 2:
				$this->setSuecar($value);
				break;
			case 3:
				$this->setStacar($value);
				break;
			case 4:
				$this->setCodcat($value);
				break;
			case 5:
				$this->setCodocp($value);
				break;
			case 6:
				$this->setPunmin($value);
				break;
			case 7:
				$this->setGraocp($value);
				break;
			case 8:
				$this->setComcar($value);
				break;
			case 9:
				$this->setPasocp($value);
				break;
			case 10:
				$this->setCodtip($value);
				break;
			case 11:
				$this->setTipper($value);
				break;
			case 12:
				$this->setFeccar($value);
				break;
			case 13:
				$this->setCodemp($value);
				break;
			case 14:
				$this->setNomemp($value);
				break;
			case 15:
				$this->setNronom($value);
				break;
			case 16:
				$this->setEstorg($value);
				break;
			case 17:
				$this->setAnorac($value);
				break;
			case 18:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargosracPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSuecar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStacar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodcat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCodocp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPunmin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setGraocp($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setComcar($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPasocp($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodtip($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipper($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFeccar($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCodemp($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNomemp($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setNronom($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEstorg($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAnorac($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setId($arr[$keys[18]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcargosracPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcargosracPeer::CODCAR)) $criteria->add(NpcargosracPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpcargosracPeer::NOMCAR)) $criteria->add(NpcargosracPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NpcargosracPeer::SUECAR)) $criteria->add(NpcargosracPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(NpcargosracPeer::STACAR)) $criteria->add(NpcargosracPeer::STACAR, $this->stacar);
		if ($this->isColumnModified(NpcargosracPeer::CODCAT)) $criteria->add(NpcargosracPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpcargosracPeer::CODOCP)) $criteria->add(NpcargosracPeer::CODOCP, $this->codocp);
		if ($this->isColumnModified(NpcargosracPeer::PUNMIN)) $criteria->add(NpcargosracPeer::PUNMIN, $this->punmin);
		if ($this->isColumnModified(NpcargosracPeer::GRAOCP)) $criteria->add(NpcargosracPeer::GRAOCP, $this->graocp);
		if ($this->isColumnModified(NpcargosracPeer::COMCAR)) $criteria->add(NpcargosracPeer::COMCAR, $this->comcar);
		if ($this->isColumnModified(NpcargosracPeer::PASOCP)) $criteria->add(NpcargosracPeer::PASOCP, $this->pasocp);
		if ($this->isColumnModified(NpcargosracPeer::CODTIP)) $criteria->add(NpcargosracPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(NpcargosracPeer::TIPPER)) $criteria->add(NpcargosracPeer::TIPPER, $this->tipper);
		if ($this->isColumnModified(NpcargosracPeer::FECCAR)) $criteria->add(NpcargosracPeer::FECCAR, $this->feccar);
		if ($this->isColumnModified(NpcargosracPeer::CODEMP)) $criteria->add(NpcargosracPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(NpcargosracPeer::NOMEMP)) $criteria->add(NpcargosracPeer::NOMEMP, $this->nomemp);
		if ($this->isColumnModified(NpcargosracPeer::NRONOM)) $criteria->add(NpcargosracPeer::NRONOM, $this->nronom);
		if ($this->isColumnModified(NpcargosracPeer::ESTORG)) $criteria->add(NpcargosracPeer::ESTORG, $this->estorg);
		if ($this->isColumnModified(NpcargosracPeer::ANORAC)) $criteria->add(NpcargosracPeer::ANORAC, $this->anorac);
		if ($this->isColumnModified(NpcargosracPeer::ID)) $criteria->add(NpcargosracPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcargosracPeer::DATABASE_NAME);

		$criteria->add(NpcargosracPeer::ID, $this->id);

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

		$copyObj->setCodcar($this->codcar);

		$copyObj->setNomcar($this->nomcar);

		$copyObj->setSuecar($this->suecar);

		$copyObj->setStacar($this->stacar);

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodocp($this->codocp);

		$copyObj->setPunmin($this->punmin);

		$copyObj->setGraocp($this->graocp);

		$copyObj->setComcar($this->comcar);

		$copyObj->setPasocp($this->pasocp);

		$copyObj->setCodtip($this->codtip);

		$copyObj->setTipper($this->tipper);

		$copyObj->setFeccar($this->feccar);

		$copyObj->setCodemp($this->codemp);

		$copyObj->setNomemp($this->nomemp);

		$copyObj->setNronom($this->nronom);

		$copyObj->setEstorg($this->estorg);

		$copyObj->setAnorac($this->anorac);


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
			self::$peer = new NpcargosracPeer();
		}
		return self::$peer;
	}

} 