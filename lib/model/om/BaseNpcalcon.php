<?php


abstract class BaseNpcalcon extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcon;


	
	protected $codnom;


	
	protected $numcon;


	
	protected $campo;


	
	protected $operador;


	
	protected $valor;


	
	protected $confor;


	
	protected $tipcal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcon()
	{

		return $this->codcon; 		
	}
	
	public function getCodnom()
	{

		return $this->codnom; 		
	}
	
	public function getNumcon()
	{

		return $this->numcon; 		
	}
	
	public function getCampo()
	{

		return $this->campo; 		
	}
	
	public function getOperador()
	{

		return $this->operador; 		
	}
	
	public function getValor()
	{

		return $this->valor; 		
	}
	
	public function getConfor()
	{

		return $this->confor; 		
	}
	
	public function getTipcal()
	{

		return $this->tipcal; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcon($v)
	{

		if ($this->codcon !== $v) {
			$this->codcon = $v;
			$this->modifiedColumns[] = NpcalconPeer::CODCON;
		}

	} 
	
	public function setCodnom($v)
	{

		if ($this->codnom !== $v) {
			$this->codnom = $v;
			$this->modifiedColumns[] = NpcalconPeer::CODNOM;
		}

	} 
	
	public function setNumcon($v)
	{

		if ($this->numcon !== $v) {
			$this->numcon = $v;
			$this->modifiedColumns[] = NpcalconPeer::NUMCON;
		}

	} 
	
	public function setCampo($v)
	{

		if ($this->campo !== $v) {
			$this->campo = $v;
			$this->modifiedColumns[] = NpcalconPeer::CAMPO;
		}

	} 
	
	public function setOperador($v)
	{

		if ($this->operador !== $v) {
			$this->operador = $v;
			$this->modifiedColumns[] = NpcalconPeer::OPERADOR;
		}

	} 
	
	public function setValor($v)
	{

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = NpcalconPeer::VALOR;
		}

	} 
	
	public function setConfor($v)
	{

		if ($this->confor !== $v) {
			$this->confor = $v;
			$this->modifiedColumns[] = NpcalconPeer::CONFOR;
		}

	} 
	
	public function setTipcal($v)
	{

		if ($this->tipcal !== $v) {
			$this->tipcal = $v;
			$this->modifiedColumns[] = NpcalconPeer::TIPCAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpcalconPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcon = $rs->getString($startcol + 0);

			$this->codnom = $rs->getString($startcol + 1);

			$this->numcon = $rs->getString($startcol + 2);

			$this->campo = $rs->getString($startcol + 3);

			$this->operador = $rs->getString($startcol + 4);

			$this->valor = $rs->getString($startcol + 5);

			$this->confor = $rs->getString($startcol + 6);

			$this->tipcal = $rs->getString($startcol + 7);

			$this->id = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npcalcon object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpcalconPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpcalconPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpcalconPeer::DATABASE_NAME);
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
					$pk = NpcalconPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpcalconPeer::doUpdate($this, $con);
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


			if (($retval = NpcalconPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcon();
				break;
			case 1:
				return $this->getCodnom();
				break;
			case 2:
				return $this->getNumcon();
				break;
			case 3:
				return $this->getCampo();
				break;
			case 4:
				return $this->getOperador();
				break;
			case 5:
				return $this->getValor();
				break;
			case 6:
				return $this->getConfor();
				break;
			case 7:
				return $this->getTipcal();
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
		$keys = NpcalconPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcon(),
			$keys[1] => $this->getCodnom(),
			$keys[2] => $this->getNumcon(),
			$keys[3] => $this->getCampo(),
			$keys[4] => $this->getOperador(),
			$keys[5] => $this->getValor(),
			$keys[6] => $this->getConfor(),
			$keys[7] => $this->getTipcal(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpcalconPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcon($value);
				break;
			case 1:
				$this->setCodnom($value);
				break;
			case 2:
				$this->setNumcon($value);
				break;
			case 3:
				$this->setCampo($value);
				break;
			case 4:
				$this->setOperador($value);
				break;
			case 5:
				$this->setValor($value);
				break;
			case 6:
				$this->setConfor($value);
				break;
			case 7:
				$this->setTipcal($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpcalconPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcon($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodnom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumcon($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCampo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setOperador($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setValor($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setConfor($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setTipcal($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpcalconPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpcalconPeer::CODCON)) $criteria->add(NpcalconPeer::CODCON, $this->codcon);
		if ($this->isColumnModified(NpcalconPeer::CODNOM)) $criteria->add(NpcalconPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpcalconPeer::NUMCON)) $criteria->add(NpcalconPeer::NUMCON, $this->numcon);
		if ($this->isColumnModified(NpcalconPeer::CAMPO)) $criteria->add(NpcalconPeer::CAMPO, $this->campo);
		if ($this->isColumnModified(NpcalconPeer::OPERADOR)) $criteria->add(NpcalconPeer::OPERADOR, $this->operador);
		if ($this->isColumnModified(NpcalconPeer::VALOR)) $criteria->add(NpcalconPeer::VALOR, $this->valor);
		if ($this->isColumnModified(NpcalconPeer::CONFOR)) $criteria->add(NpcalconPeer::CONFOR, $this->confor);
		if ($this->isColumnModified(NpcalconPeer::TIPCAL)) $criteria->add(NpcalconPeer::TIPCAL, $this->tipcal);
		if ($this->isColumnModified(NpcalconPeer::ID)) $criteria->add(NpcalconPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpcalconPeer::DATABASE_NAME);

		$criteria->add(NpcalconPeer::ID, $this->id);

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

		$copyObj->setCodcon($this->codcon);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setNumcon($this->numcon);

		$copyObj->setCampo($this->campo);

		$copyObj->setOperador($this->operador);

		$copyObj->setValor($this->valor);

		$copyObj->setConfor($this->confor);

		$copyObj->setTipcal($this->tipcal);


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
			self::$peer = new NpcalconPeer();
		}
		return self::$peer;
	}

} 