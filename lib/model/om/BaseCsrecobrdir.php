<?php


abstract class BaseCsrecobrdir extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codprod;


	
	protected $codfas;


	
	protected $codcar;


	
	protected $canemp;


	
	protected $horemp;


	
	protected $tipcon;


	
	protected $costot;


	
	protected $jornada;


	
	protected $diavia;


	
	protected $nroord;


	
	protected $codemp;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodprod()
	{

		return $this->codprod; 		
	}
	
	public function getCodfas()
	{

		return $this->codfas; 		
	}
	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getCanemp()
	{

		return number_format($this->canemp,2,',','.');
		
	}
	
	public function getHoremp()
	{

		return number_format($this->horemp,2,',','.');
		
	}
	
	public function getTipcon()
	{

		return $this->tipcon; 		
	}
	
	public function getCostot()
	{

		return number_format($this->costot,2,',','.');
		
	}
	
	public function getJornada()
	{

		return $this->jornada; 		
	}
	
	public function getDiavia()
	{

		return number_format($this->diavia,2,',','.');
		
	}
	
	public function getNroord()
	{

		return $this->nroord; 		
	}
	
	public function getCodemp()
	{

		return $this->codemp; 		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodprod($v)
	{

		if ($this->codprod !== $v) {
			$this->codprod = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::CODPROD;
		}

	} 
	
	public function setCodfas($v)
	{

		if ($this->codfas !== $v) {
			$this->codfas = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::CODFAS;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::CODCAR;
		}

	} 
	
	public function setCanemp($v)
	{

		if ($this->canemp !== $v) {
			$this->canemp = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::CANEMP;
		}

	} 
	
	public function setHoremp($v)
	{

		if ($this->horemp !== $v) {
			$this->horemp = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::HOREMP;
		}

	} 
	
	public function setTipcon($v)
	{

		if ($this->tipcon !== $v) {
			$this->tipcon = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::TIPCON;
		}

	} 
	
	public function setCostot($v)
	{

		if ($this->costot !== $v) {
			$this->costot = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::COSTOT;
		}

	} 
	
	public function setJornada($v)
	{

		if ($this->jornada !== $v) {
			$this->jornada = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::JORNADA;
		}

	} 
	
	public function setDiavia($v)
	{

		if ($this->diavia !== $v) {
			$this->diavia = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::DIAVIA;
		}

	} 
	
	public function setNroord($v)
	{

		if ($this->nroord !== $v) {
			$this->nroord = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::NROORD;
		}

	} 
	
	public function setCodemp($v)
	{

		if ($this->codemp !== $v) {
			$this->codemp = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::CODEMP;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CsrecobrdirPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codprod = $rs->getString($startcol + 0);

			$this->codfas = $rs->getString($startcol + 1);

			$this->codcar = $rs->getString($startcol + 2);

			$this->canemp = $rs->getFloat($startcol + 3);

			$this->horemp = $rs->getFloat($startcol + 4);

			$this->tipcon = $rs->getString($startcol + 5);

			$this->costot = $rs->getFloat($startcol + 6);

			$this->jornada = $rs->getString($startcol + 7);

			$this->diavia = $rs->getFloat($startcol + 8);

			$this->nroord = $rs->getString($startcol + 9);

			$this->codemp = $rs->getString($startcol + 10);

			$this->id = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Csrecobrdir object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CsrecobrdirPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CsrecobrdirPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CsrecobrdirPeer::DATABASE_NAME);
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
					$pk = CsrecobrdirPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += CsrecobrdirPeer::doUpdate($this, $con);
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


			if (($retval = CsrecobrdirPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecobrdirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodprod();
				break;
			case 1:
				return $this->getCodfas();
				break;
			case 2:
				return $this->getCodcar();
				break;
			case 3:
				return $this->getCanemp();
				break;
			case 4:
				return $this->getHoremp();
				break;
			case 5:
				return $this->getTipcon();
				break;
			case 6:
				return $this->getCostot();
				break;
			case 7:
				return $this->getJornada();
				break;
			case 8:
				return $this->getDiavia();
				break;
			case 9:
				return $this->getNroord();
				break;
			case 10:
				return $this->getCodemp();
				break;
			case 11:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsrecobrdirPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodprod(),
			$keys[1] => $this->getCodfas(),
			$keys[2] => $this->getCodcar(),
			$keys[3] => $this->getCanemp(),
			$keys[4] => $this->getHoremp(),
			$keys[5] => $this->getTipcon(),
			$keys[6] => $this->getCostot(),
			$keys[7] => $this->getJornada(),
			$keys[8] => $this->getDiavia(),
			$keys[9] => $this->getNroord(),
			$keys[10] => $this->getCodemp(),
			$keys[11] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CsrecobrdirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodprod($value);
				break;
			case 1:
				$this->setCodfas($value);
				break;
			case 2:
				$this->setCodcar($value);
				break;
			case 3:
				$this->setCanemp($value);
				break;
			case 4:
				$this->setHoremp($value);
				break;
			case 5:
				$this->setTipcon($value);
				break;
			case 6:
				$this->setCostot($value);
				break;
			case 7:
				$this->setJornada($value);
				break;
			case 8:
				$this->setDiavia($value);
				break;
			case 9:
				$this->setNroord($value);
				break;
			case 10:
				$this->setCodemp($value);
				break;
			case 11:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CsrecobrdirPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodprod($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodfas($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodcar($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCanemp($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHoremp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipcon($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCostot($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setJornada($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDiavia($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNroord($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCodemp($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CsrecobrdirPeer::DATABASE_NAME);

		if ($this->isColumnModified(CsrecobrdirPeer::CODPROD)) $criteria->add(CsrecobrdirPeer::CODPROD, $this->codprod);
		if ($this->isColumnModified(CsrecobrdirPeer::CODFAS)) $criteria->add(CsrecobrdirPeer::CODFAS, $this->codfas);
		if ($this->isColumnModified(CsrecobrdirPeer::CODCAR)) $criteria->add(CsrecobrdirPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(CsrecobrdirPeer::CANEMP)) $criteria->add(CsrecobrdirPeer::CANEMP, $this->canemp);
		if ($this->isColumnModified(CsrecobrdirPeer::HOREMP)) $criteria->add(CsrecobrdirPeer::HOREMP, $this->horemp);
		if ($this->isColumnModified(CsrecobrdirPeer::TIPCON)) $criteria->add(CsrecobrdirPeer::TIPCON, $this->tipcon);
		if ($this->isColumnModified(CsrecobrdirPeer::COSTOT)) $criteria->add(CsrecobrdirPeer::COSTOT, $this->costot);
		if ($this->isColumnModified(CsrecobrdirPeer::JORNADA)) $criteria->add(CsrecobrdirPeer::JORNADA, $this->jornada);
		if ($this->isColumnModified(CsrecobrdirPeer::DIAVIA)) $criteria->add(CsrecobrdirPeer::DIAVIA, $this->diavia);
		if ($this->isColumnModified(CsrecobrdirPeer::NROORD)) $criteria->add(CsrecobrdirPeer::NROORD, $this->nroord);
		if ($this->isColumnModified(CsrecobrdirPeer::CODEMP)) $criteria->add(CsrecobrdirPeer::CODEMP, $this->codemp);
		if ($this->isColumnModified(CsrecobrdirPeer::ID)) $criteria->add(CsrecobrdirPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CsrecobrdirPeer::DATABASE_NAME);

		$criteria->add(CsrecobrdirPeer::ID, $this->id);

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

		$copyObj->setCodprod($this->codprod);

		$copyObj->setCodfas($this->codfas);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setCanemp($this->canemp);

		$copyObj->setHoremp($this->horemp);

		$copyObj->setTipcon($this->tipcon);

		$copyObj->setCostot($this->costot);

		$copyObj->setJornada($this->jornada);

		$copyObj->setDiavia($this->diavia);

		$copyObj->setNroord($this->nroord);

		$copyObj->setCodemp($this->codemp);


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
			self::$peer = new CsrecobrdirPeer();
		}
		return self::$peer;
	}

} 