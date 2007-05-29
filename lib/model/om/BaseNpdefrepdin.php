<?php


abstract class BaseNpdefrepdin extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codrep;


	
	protected $codcol;


	
	protected $nomcol;


	
	protected $valdes;


	
	protected $valhas;


	
	protected $orden;


	
	protected $tipcol;


	
	protected $loncol;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodrep()
	{

		return $this->codrep; 		
	}
	
	public function getCodcol()
	{

		return $this->codcol; 		
	}
	
	public function getNomcol()
	{

		return $this->nomcol; 		
	}
	
	public function getValdes()
	{

		return $this->valdes; 		
	}
	
	public function getValhas()
	{

		return $this->valhas; 		
	}
	
	public function getOrden()
	{

		return $this->orden; 		
	}
	
	public function getTipcol()
	{

		return $this->tipcol; 		
	}
	
	public function getLoncol()
	{

		return number_format($this->loncol,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodrep($v)
	{

		if ($this->codrep !== $v) {
			$this->codrep = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::CODREP;
		}

	} 
	
	public function setCodcol($v)
	{

		if ($this->codcol !== $v) {
			$this->codcol = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::CODCOL;
		}

	} 
	
	public function setNomcol($v)
	{

		if ($this->nomcol !== $v) {
			$this->nomcol = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::NOMCOL;
		}

	} 
	
	public function setValdes($v)
	{

		if ($this->valdes !== $v) {
			$this->valdes = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::VALDES;
		}

	} 
	
	public function setValhas($v)
	{

		if ($this->valhas !== $v) {
			$this->valhas = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::VALHAS;
		}

	} 
	
	public function setOrden($v)
	{

		if ($this->orden !== $v) {
			$this->orden = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::ORDEN;
		}

	} 
	
	public function setTipcol($v)
	{

		if ($this->tipcol !== $v) {
			$this->tipcol = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::TIPCOL;
		}

	} 
	
	public function setLoncol($v)
	{

		if ($this->loncol !== $v) {
			$this->loncol = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::LONCOL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpdefrepdinPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codrep = $rs->getString($startcol + 0);

			$this->codcol = $rs->getString($startcol + 1);

			$this->nomcol = $rs->getString($startcol + 2);

			$this->valdes = $rs->getString($startcol + 3);

			$this->valhas = $rs->getString($startcol + 4);

			$this->orden = $rs->getString($startcol + 5);

			$this->tipcol = $rs->getString($startcol + 6);

			$this->loncol = $rs->getFloat($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npdefrepdin object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpdefrepdinPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefrepdinPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefrepdinPeer::DATABASE_NAME);
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
					$pk = NpdefrepdinPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpdefrepdinPeer::doUpdate($this, $con);
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


			if (($retval = NpdefrepdinPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefrepdinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodrep();
				break;
			case 1:
				return $this->getCodcol();
				break;
			case 2:
				return $this->getNomcol();
				break;
			case 3:
				return $this->getValdes();
				break;
			case 4:
				return $this->getValhas();
				break;
			case 5:
				return $this->getOrden();
				break;
			case 6:
				return $this->getTipcol();
				break;
			case 7:
				return $this->getLoncol();
				break;
			case 8:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefrepdinPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodrep(),
			$keys[1] => $this->getCodcol(),
			$keys[2] => $this->getNomcol(),
			$keys[3] => $this->getValdes(),
			$keys[4] => $this->getValhas(),
			$keys[5] => $this->getOrden(),
			$keys[6] => $this->getTipcol(),
			$keys[7] => $this->getLoncol(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefrepdinPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodrep($value);
				break;
			case 1:
				$this->setCodcol($value);
				break;
			case 2:
				$this->setNomcol($value);
				break;
			case 3:
				$this->setValdes($value);
				break;
			case 4:
				$this->setValhas($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
			case 6:
				$this->setTipcol($value);
				break;
			case 7:
				$this->setLoncol($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefrepdinPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodrep($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcol($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNomcol($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValdes($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValhas($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTipcol($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLoncol($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefrepdinPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefrepdinPeer::CODREP)) $criteria->add(NpdefrepdinPeer::CODREP, $this->codrep);
		if ($this->isColumnModified(NpdefrepdinPeer::CODCOL)) $criteria->add(NpdefrepdinPeer::CODCOL, $this->codcol);
		if ($this->isColumnModified(NpdefrepdinPeer::NOMCOL)) $criteria->add(NpdefrepdinPeer::NOMCOL, $this->nomcol);
		if ($this->isColumnModified(NpdefrepdinPeer::VALDES)) $criteria->add(NpdefrepdinPeer::VALDES, $this->valdes);
		if ($this->isColumnModified(NpdefrepdinPeer::VALHAS)) $criteria->add(NpdefrepdinPeer::VALHAS, $this->valhas);
		if ($this->isColumnModified(NpdefrepdinPeer::ORDEN)) $criteria->add(NpdefrepdinPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(NpdefrepdinPeer::TIPCOL)) $criteria->add(NpdefrepdinPeer::TIPCOL, $this->tipcol);
		if ($this->isColumnModified(NpdefrepdinPeer::LONCOL)) $criteria->add(NpdefrepdinPeer::LONCOL, $this->loncol);
		if ($this->isColumnModified(NpdefrepdinPeer::ID)) $criteria->add(NpdefrepdinPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefrepdinPeer::DATABASE_NAME);

		$criteria->add(NpdefrepdinPeer::ID, $this->id);

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

		$copyObj->setCodrep($this->codrep);

		$copyObj->setCodcol($this->codcol);

		$copyObj->setNomcol($this->nomcol);

		$copyObj->setValdes($this->valdes);

		$copyObj->setValhas($this->valhas);

		$copyObj->setOrden($this->orden);

		$copyObj->setTipcol($this->tipcol);

		$copyObj->setLoncol($this->loncol);


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
			self::$peer = new NpdefrepdinPeer();
		}
		return self::$peer;
	}

} 