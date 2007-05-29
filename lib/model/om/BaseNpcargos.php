<?php


abstract class BaseNpcargos extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcar;


	
	protected $nomcar;


	
	protected $suecar;


	
	protected $stacar;


	
	protected $codocp;


	
	protected $punmin;


	
	protected $graocp;


	
	protected $comcar;


	
	protected $pasocp;


	
	protected $codtip;


	
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

		return number_format($this->suecar,2,',','.');
		
	}
	
	public function getStacar()
	{

		return $this->stacar; 		
	}
	
	public function getCodocp()
	{

		return $this->codocp; 		
	}
	
	public function getPunmin()
	{

		return number_format($this->punmin,2,',','.');
		
	}
	
	public function getGraocp()
	{

		return $this->graocp; 		
	}
	
	public function getComcar()
	{

		return number_format($this->comcar,2,',','.');
		
	}
	
	public function getPasocp()
	{

		return $this->pasocp; 		
	}
	
	public function getCodtip()
	{

		return $this->codtip; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpcargosPeer::CODCAR;
		}

	} 
	
	public function setNomcar($v)
	{

		if ($this->nomcar !== $v) {
			$this->nomcar = $v;
			$this->modifiedColumns[] = NpcargosPeer::NOMCAR;
		}

	} 
	
	public function setSuecar($v)
	{

		if ($this->suecar !== $v) {
			$this->suecar = $v;
			$this->modifiedColumns[] = NpcargosPeer::SUECAR;
		}

	} 
	
	public function setStacar($v)
	{

		if ($this->stacar !== $v) {
			$this->stacar = $v;
			$this->modifiedColumns[] = NpcargosPeer::STACAR;
		}

	} 
	
	public function setCodocp($v)
	{

		if ($this->codocp !== $v) {
			$this->codocp = $v;
			$this->modifiedColumns[] = NpcargosPeer::CODOCP;
		}

	} 
	
	public function setPunmin($v)
	{

		if ($this->punmin !== $v) {
			$this->punmin = $v;
			$this->modifiedColumns[] = NpcargosPeer::PUNMIN;
		}

	} 
	
	public function setGraocp($v)
	{

		if ($this->graocp !== $v) {
			$this->graocp = $v;
			$this->modifiedColumns[] = NpcargosPeer::GRAOCP;
		}

	} 
	
	public function setComcar($v)
	{

		if ($this->comcar !== $v) {
			$this->comcar = $v;
			$this->modifiedColumns[] = NpcargosPeer::COMCAR;
		}

	} 
	
	public function setPasocp($v)
	{

		if ($this->pasocp !== $v) {
			$this->pasocp = $v;
			$this->modifiedColumns[] = NpcargosPeer::PASOCP;
		}

	} 
	
	public function setCodtip($v)
	{

		if ($this->codtip !== $v) {
			$this->codtip = $v;
			$this->modifiedColumns[] = NpcargosPeer::CODTIP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcargosPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcar = $rs->getString($startcol + 0);

			$this->nomcar = $rs->getString($startcol + 1);

			$this->suecar = $rs->getFloat($startcol + 2);

			$this->stacar = $rs->getString($startcol + 3);

			$this->codocp = $rs->getString($startcol + 4);

			$this->punmin = $rs->getFloat($startcol + 5);

			$this->graocp = $rs->getString($startcol + 6);

			$this->comcar = $rs->getFloat($startcol + 7);

			$this->pasocp = $rs->getString($startcol + 8);

			$this->codtip = $rs->getString($startcol + 9);

			$this->id = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcargos object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcargosPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcargosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcargosPeer::DATABASE_NAME);
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
					$pk = NpcargosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcargosPeer::doUpdate($this, $con);
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


			if (($retval = NpcargosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCodocp();
				break;
			case 5:
				return $this->getPunmin();
				break;
			case 6:
				return $this->getGraocp();
				break;
			case 7:
				return $this->getComcar();
				break;
			case 8:
				return $this->getPasocp();
				break;
			case 9:
				return $this->getCodtip();
				break;
			case 10:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargosPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcar(),
			$keys[1] => $this->getNomcar(),
			$keys[2] => $this->getSuecar(),
			$keys[3] => $this->getStacar(),
			$keys[4] => $this->getCodocp(),
			$keys[5] => $this->getPunmin(),
			$keys[6] => $this->getGraocp(),
			$keys[7] => $this->getComcar(),
			$keys[8] => $this->getPasocp(),
			$keys[9] => $this->getCodtip(),
			$keys[10] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcargosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCodocp($value);
				break;
			case 5:
				$this->setPunmin($value);
				break;
			case 6:
				$this->setGraocp($value);
				break;
			case 7:
				$this->setComcar($value);
				break;
			case 8:
				$this->setPasocp($value);
				break;
			case 9:
				$this->setCodtip($value);
				break;
			case 10:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcargosPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNomcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSuecar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setStacar($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCodocp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPunmin($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setGraocp($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setComcar($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPasocp($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodtip($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setId($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcargosPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcargosPeer::CODCAR)) $criteria->add(NpcargosPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpcargosPeer::NOMCAR)) $criteria->add(NpcargosPeer::NOMCAR, $this->nomcar);
		if ($this->isColumnModified(NpcargosPeer::SUECAR)) $criteria->add(NpcargosPeer::SUECAR, $this->suecar);
		if ($this->isColumnModified(NpcargosPeer::STACAR)) $criteria->add(NpcargosPeer::STACAR, $this->stacar);
		if ($this->isColumnModified(NpcargosPeer::CODOCP)) $criteria->add(NpcargosPeer::CODOCP, $this->codocp);
		if ($this->isColumnModified(NpcargosPeer::PUNMIN)) $criteria->add(NpcargosPeer::PUNMIN, $this->punmin);
		if ($this->isColumnModified(NpcargosPeer::GRAOCP)) $criteria->add(NpcargosPeer::GRAOCP, $this->graocp);
		if ($this->isColumnModified(NpcargosPeer::COMCAR)) $criteria->add(NpcargosPeer::COMCAR, $this->comcar);
		if ($this->isColumnModified(NpcargosPeer::PASOCP)) $criteria->add(NpcargosPeer::PASOCP, $this->pasocp);
		if ($this->isColumnModified(NpcargosPeer::CODTIP)) $criteria->add(NpcargosPeer::CODTIP, $this->codtip);
		if ($this->isColumnModified(NpcargosPeer::ID)) $criteria->add(NpcargosPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcargosPeer::DATABASE_NAME);

		$criteria->add(NpcargosPeer::ID, $this->id);

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

		$copyObj->setCodocp($this->codocp);

		$copyObj->setPunmin($this->punmin);

		$copyObj->setGraocp($this->graocp);

		$copyObj->setComcar($this->comcar);

		$copyObj->setPasocp($this->pasocp);

		$copyObj->setCodtip($this->codtip);


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
			self::$peer = new NpcargosPeer();
		}
		return self::$peer;
	}

} 