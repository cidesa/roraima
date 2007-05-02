<?php


abstract class BaseFcvalinm1 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $coduso;


	
	protected $valini;


	
	protected $valfin;


	
	protected $aliinm;


	
	protected $anovig;


	
	protected $deduc;


	
	protected $codref;


	
	protected $zoni;


	
	protected $manz;


	
	protected $parmts;


	
	protected $valor;


	
	protected $tipedi;


	
	protected $desedi;


	
	protected $nivel;


	
	protected $tipo;


	
	protected $monto;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCoduso()
	{

		return $this->coduso;
	}

	
	public function getValini()
	{

		return $this->valini;
	}

	
	public function getValfin()
	{

		return $this->valfin;
	}

	
	public function getAliinm()
	{

		return $this->aliinm;
	}

	
	public function getAnovig()
	{

		return $this->anovig;
	}

	
	public function getDeduc()
	{

		return $this->deduc;
	}

	
	public function getCodref()
	{

		return $this->codref;
	}

	
	public function getZoni()
	{

		return $this->zoni;
	}

	
	public function getManz()
	{

		return $this->manz;
	}

	
	public function getParmts()
	{

		return $this->parmts;
	}

	
	public function getValor()
	{

		return $this->valor;
	}

	
	public function getTipedi()
	{

		return $this->tipedi;
	}

	
	public function getDesedi()
	{

		return $this->desedi;
	}

	
	public function getNivel()
	{

		return $this->nivel;
	}

	
	public function getTipo()
	{

		return $this->tipo;
	}

	
	public function getMonto()
	{

		return $this->monto;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setCoduso($v)
	{

		if ($this->coduso !== $v) {
			$this->coduso = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::CODUSO;
		}

	} 
	
	public function setValini($v)
	{

		if ($this->valini !== $v) {
			$this->valini = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::VALINI;
		}

	} 
	
	public function setValfin($v)
	{

		if ($this->valfin !== $v) {
			$this->valfin = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::VALFIN;
		}

	} 
	
	public function setAliinm($v)
	{

		if ($this->aliinm !== $v) {
			$this->aliinm = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::ALIINM;
		}

	} 
	
	public function setAnovig($v)
	{

		if ($this->anovig !== $v) {
			$this->anovig = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::ANOVIG;
		}

	} 
	
	public function setDeduc($v)
	{

		if ($this->deduc !== $v) {
			$this->deduc = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::DEDUC;
		}

	} 
	
	public function setCodref($v)
	{

		if ($this->codref !== $v) {
			$this->codref = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::CODREF;
		}

	} 
	
	public function setZoni($v)
	{

		if ($this->zoni !== $v) {
			$this->zoni = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::ZONI;
		}

	} 
	
	public function setManz($v)
	{

		if ($this->manz !== $v) {
			$this->manz = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::MANZ;
		}

	} 
	
	public function setParmts($v)
	{

		if ($this->parmts !== $v) {
			$this->parmts = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::PARMTS;
		}

	} 
	
	public function setValor($v)
	{

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::VALOR;
		}

	} 
	
	public function setTipedi($v)
	{

		if ($this->tipedi !== $v) {
			$this->tipedi = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::TIPEDI;
		}

	} 
	
	public function setDesedi($v)
	{

		if ($this->desedi !== $v) {
			$this->desedi = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::DESEDI;
		}

	} 
	
	public function setNivel($v)
	{

		if ($this->nivel !== $v) {
			$this->nivel = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::NIVEL;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::TIPO;
		}

	} 
	
	public function setMonto($v)
	{

		if ($this->monto !== $v) {
			$this->monto = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::MONTO;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Fcvalinm1Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->coduso = $rs->getString($startcol + 0);

			$this->valini = $rs->getFloat($startcol + 1);

			$this->valfin = $rs->getFloat($startcol + 2);

			$this->aliinm = $rs->getFloat($startcol + 3);

			$this->anovig = $rs->getString($startcol + 4);

			$this->deduc = $rs->getFloat($startcol + 5);

			$this->codref = $rs->getString($startcol + 6);

			$this->zoni = $rs->getString($startcol + 7);

			$this->manz = $rs->getString($startcol + 8);

			$this->parmts = $rs->getString($startcol + 9);

			$this->valor = $rs->getFloat($startcol + 10);

			$this->tipedi = $rs->getString($startcol + 11);

			$this->desedi = $rs->getString($startcol + 12);

			$this->nivel = $rs->getString($startcol + 13);

			$this->tipo = $rs->getString($startcol + 14);

			$this->monto = $rs->getFloat($startcol + 15);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcvalinm1 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcvalinm1Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcvalinm1Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcvalinm1Peer::DATABASE_NAME);
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
					$pk = Fcvalinm1Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Fcvalinm1Peer::doUpdate($this, $con);
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


			if (($retval = Fcvalinm1Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcvalinm1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCoduso();
				break;
			case 1:
				return $this->getValini();
				break;
			case 2:
				return $this->getValfin();
				break;
			case 3:
				return $this->getAliinm();
				break;
			case 4:
				return $this->getAnovig();
				break;
			case 5:
				return $this->getDeduc();
				break;
			case 6:
				return $this->getCodref();
				break;
			case 7:
				return $this->getZoni();
				break;
			case 8:
				return $this->getManz();
				break;
			case 9:
				return $this->getParmts();
				break;
			case 10:
				return $this->getValor();
				break;
			case 11:
				return $this->getTipedi();
				break;
			case 12:
				return $this->getDesedi();
				break;
			case 13:
				return $this->getNivel();
				break;
			case 14:
				return $this->getTipo();
				break;
			case 15:
				return $this->getMonto();
				break;
			case 16:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcvalinm1Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCoduso(),
			$keys[1] => $this->getValini(),
			$keys[2] => $this->getValfin(),
			$keys[3] => $this->getAliinm(),
			$keys[4] => $this->getAnovig(),
			$keys[5] => $this->getDeduc(),
			$keys[6] => $this->getCodref(),
			$keys[7] => $this->getZoni(),
			$keys[8] => $this->getManz(),
			$keys[9] => $this->getParmts(),
			$keys[10] => $this->getValor(),
			$keys[11] => $this->getTipedi(),
			$keys[12] => $this->getDesedi(),
			$keys[13] => $this->getNivel(),
			$keys[14] => $this->getTipo(),
			$keys[15] => $this->getMonto(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcvalinm1Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCoduso($value);
				break;
			case 1:
				$this->setValini($value);
				break;
			case 2:
				$this->setValfin($value);
				break;
			case 3:
				$this->setAliinm($value);
				break;
			case 4:
				$this->setAnovig($value);
				break;
			case 5:
				$this->setDeduc($value);
				break;
			case 6:
				$this->setCodref($value);
				break;
			case 7:
				$this->setZoni($value);
				break;
			case 8:
				$this->setManz($value);
				break;
			case 9:
				$this->setParmts($value);
				break;
			case 10:
				$this->setValor($value);
				break;
			case 11:
				$this->setTipedi($value);
				break;
			case 12:
				$this->setDesedi($value);
				break;
			case 13:
				$this->setNivel($value);
				break;
			case 14:
				$this->setTipo($value);
				break;
			case 15:
				$this->setMonto($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcvalinm1Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCoduso($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setValini($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValfin($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAliinm($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnovig($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDeduc($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCodref($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setZoni($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setManz($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setParmts($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setValor($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipedi($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDesedi($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNivel($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setTipo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMonto($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcvalinm1Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcvalinm1Peer::CODUSO)) $criteria->add(Fcvalinm1Peer::CODUSO, $this->coduso);
		if ($this->isColumnModified(Fcvalinm1Peer::VALINI)) $criteria->add(Fcvalinm1Peer::VALINI, $this->valini);
		if ($this->isColumnModified(Fcvalinm1Peer::VALFIN)) $criteria->add(Fcvalinm1Peer::VALFIN, $this->valfin);
		if ($this->isColumnModified(Fcvalinm1Peer::ALIINM)) $criteria->add(Fcvalinm1Peer::ALIINM, $this->aliinm);
		if ($this->isColumnModified(Fcvalinm1Peer::ANOVIG)) $criteria->add(Fcvalinm1Peer::ANOVIG, $this->anovig);
		if ($this->isColumnModified(Fcvalinm1Peer::DEDUC)) $criteria->add(Fcvalinm1Peer::DEDUC, $this->deduc);
		if ($this->isColumnModified(Fcvalinm1Peer::CODREF)) $criteria->add(Fcvalinm1Peer::CODREF, $this->codref);
		if ($this->isColumnModified(Fcvalinm1Peer::ZONI)) $criteria->add(Fcvalinm1Peer::ZONI, $this->zoni);
		if ($this->isColumnModified(Fcvalinm1Peer::MANZ)) $criteria->add(Fcvalinm1Peer::MANZ, $this->manz);
		if ($this->isColumnModified(Fcvalinm1Peer::PARMTS)) $criteria->add(Fcvalinm1Peer::PARMTS, $this->parmts);
		if ($this->isColumnModified(Fcvalinm1Peer::VALOR)) $criteria->add(Fcvalinm1Peer::VALOR, $this->valor);
		if ($this->isColumnModified(Fcvalinm1Peer::TIPEDI)) $criteria->add(Fcvalinm1Peer::TIPEDI, $this->tipedi);
		if ($this->isColumnModified(Fcvalinm1Peer::DESEDI)) $criteria->add(Fcvalinm1Peer::DESEDI, $this->desedi);
		if ($this->isColumnModified(Fcvalinm1Peer::NIVEL)) $criteria->add(Fcvalinm1Peer::NIVEL, $this->nivel);
		if ($this->isColumnModified(Fcvalinm1Peer::TIPO)) $criteria->add(Fcvalinm1Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Fcvalinm1Peer::MONTO)) $criteria->add(Fcvalinm1Peer::MONTO, $this->monto);
		if ($this->isColumnModified(Fcvalinm1Peer::ID)) $criteria->add(Fcvalinm1Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcvalinm1Peer::DATABASE_NAME);

		$criteria->add(Fcvalinm1Peer::ID, $this->id);

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

		$copyObj->setCoduso($this->coduso);

		$copyObj->setValini($this->valini);

		$copyObj->setValfin($this->valfin);

		$copyObj->setAliinm($this->aliinm);

		$copyObj->setAnovig($this->anovig);

		$copyObj->setDeduc($this->deduc);

		$copyObj->setCodref($this->codref);

		$copyObj->setZoni($this->zoni);

		$copyObj->setManz($this->manz);

		$copyObj->setParmts($this->parmts);

		$copyObj->setValor($this->valor);

		$copyObj->setTipedi($this->tipedi);

		$copyObj->setDesedi($this->desedi);

		$copyObj->setNivel($this->nivel);

		$copyObj->setTipo($this->tipo);

		$copyObj->setMonto($this->monto);


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
			self::$peer = new Fcvalinm1Peer();
		}
		return self::$peer;
	}

} 