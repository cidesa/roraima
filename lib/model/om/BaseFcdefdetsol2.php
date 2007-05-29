<?php


abstract class BaseFcdefdetsol2 extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codsol;


	
	protected $tipo;


	
	protected $cuantos;


	
	protected $propie;


	
	protected $imprim;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodsol()
	{

		return $this->codsol; 		
	}
	
	public function getTipo()
	{

		return $this->tipo; 		
	}
	
	public function getCuantos()
	{

		return $this->cuantos; 		
	}
	
	public function getPropie()
	{

		return $this->propie; 		
	}
	
	public function getImprim()
	{

		return $this->imprim; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodsol($v)
	{

		if ($this->codsol !== $v) {
			$this->codsol = $v;
			$this->modifiedColumns[] = Fcdefdetsol2Peer::CODSOL;
		}

	} 
	
	public function setTipo($v)
	{

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = Fcdefdetsol2Peer::TIPO;
		}

	} 
	
	public function setCuantos($v)
	{

		if ($this->cuantos !== $v) {
			$this->cuantos = $v;
			$this->modifiedColumns[] = Fcdefdetsol2Peer::CUANTOS;
		}

	} 
	
	public function setPropie($v)
	{

		if ($this->propie !== $v) {
			$this->propie = $v;
			$this->modifiedColumns[] = Fcdefdetsol2Peer::PROPIE;
		}

	} 
	
	public function setImprim($v)
	{

		if ($this->imprim !== $v) {
			$this->imprim = $v;
			$this->modifiedColumns[] = Fcdefdetsol2Peer::IMPRIM;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = Fcdefdetsol2Peer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codsol = $rs->getString($startcol + 0);

			$this->tipo = $rs->getString($startcol + 1);

			$this->cuantos = $rs->getString($startcol + 2);

			$this->propie = $rs->getString($startcol + 3);

			$this->imprim = $rs->getString($startcol + 4);

			$this->id = $rs->getInt($startcol + 5);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Fcdefdetsol2 object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Fcdefdetsol2Peer::DATABASE_NAME);
		}

		try {
			$con->begin();
			Fcdefdetsol2Peer::doDelete($this, $con);
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
			$con = Propel::getConnection(Fcdefdetsol2Peer::DATABASE_NAME);
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
					$pk = Fcdefdetsol2Peer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += Fcdefdetsol2Peer::doUpdate($this, $con);
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


			if (($retval = Fcdefdetsol2Peer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcdefdetsol2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodsol();
				break;
			case 1:
				return $this->getTipo();
				break;
			case 2:
				return $this->getCuantos();
				break;
			case 3:
				return $this->getPropie();
				break;
			case 4:
				return $this->getImprim();
				break;
			case 5:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcdefdetsol2Peer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodsol(),
			$keys[1] => $this->getTipo(),
			$keys[2] => $this->getCuantos(),
			$keys[3] => $this->getPropie(),
			$keys[4] => $this->getImprim(),
			$keys[5] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Fcdefdetsol2Peer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodsol($value);
				break;
			case 1:
				$this->setTipo($value);
				break;
			case 2:
				$this->setCuantos($value);
				break;
			case 3:
				$this->setPropie($value);
				break;
			case 4:
				$this->setImprim($value);
				break;
			case 5:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Fcdefdetsol2Peer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodsol($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTipo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCuantos($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPropie($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setImprim($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(Fcdefdetsol2Peer::DATABASE_NAME);

		if ($this->isColumnModified(Fcdefdetsol2Peer::CODSOL)) $criteria->add(Fcdefdetsol2Peer::CODSOL, $this->codsol);
		if ($this->isColumnModified(Fcdefdetsol2Peer::TIPO)) $criteria->add(Fcdefdetsol2Peer::TIPO, $this->tipo);
		if ($this->isColumnModified(Fcdefdetsol2Peer::CUANTOS)) $criteria->add(Fcdefdetsol2Peer::CUANTOS, $this->cuantos);
		if ($this->isColumnModified(Fcdefdetsol2Peer::PROPIE)) $criteria->add(Fcdefdetsol2Peer::PROPIE, $this->propie);
		if ($this->isColumnModified(Fcdefdetsol2Peer::IMPRIM)) $criteria->add(Fcdefdetsol2Peer::IMPRIM, $this->imprim);
		if ($this->isColumnModified(Fcdefdetsol2Peer::ID)) $criteria->add(Fcdefdetsol2Peer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Fcdefdetsol2Peer::DATABASE_NAME);

		$criteria->add(Fcdefdetsol2Peer::ID, $this->id);

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

		$copyObj->setCodsol($this->codsol);

		$copyObj->setTipo($this->tipo);

		$copyObj->setCuantos($this->cuantos);

		$copyObj->setPropie($this->propie);

		$copyObj->setImprim($this->imprim);


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
			self::$peer = new Fcdefdetsol2Peer();
		}
		return self::$peer;
	}

} 