<?php


abstract class BaseNpforcaremp extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codcat;


	
	protected $codcar;


	
	protected $suebas;


	
	protected $suplen;


	
	protected $priant;


	
	protected $hediur;


	
	protected $pordiu;


	
	protected $henoct;


	
	protected $pornoc1;


	
	protected $pornoc2;


	
	protected $bonvac;


	
	protected $clau74;


	
	protected $otrcom;


	
	protected $priefi;


	
	protected $pritra;


	
	protected $aguinal;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getCodcat()
	{

		return $this->codcat; 		
	}
	
	public function getCodcar()
	{

		return $this->codcar; 		
	}
	
	public function getSuebas()
	{

		return number_format($this->suebas,2,',','.');
		
	}
	
	public function getSuplen()
	{

		return number_format($this->suplen,2,',','.');
		
	}
	
	public function getPriant()
	{

		return number_format($this->priant,2,',','.');
		
	}
	
	public function getHediur()
	{

		return number_format($this->hediur,2,',','.');
		
	}
	
	public function getPordiu()
	{

		return number_format($this->pordiu,2,',','.');
		
	}
	
	public function getHenoct()
	{

		return number_format($this->henoct,2,',','.');
		
	}
	
	public function getPornoc1()
	{

		return number_format($this->pornoc1,2,',','.');
		
	}
	
	public function getPornoc2()
	{

		return number_format($this->pornoc2,2,',','.');
		
	}
	
	public function getBonvac()
	{

		return number_format($this->bonvac,2,',','.');
		
	}
	
	public function getClau74()
	{

		return number_format($this->clau74,2,',','.');
		
	}
	
	public function getOtrcom()
	{

		return number_format($this->otrcom,2,',','.');
		
	}
	
	public function getPriefi()
	{

		return number_format($this->priefi,2,',','.');
		
	}
	
	public function getPritra()
	{

		return number_format($this->pritra,2,',','.');
		
	}
	
	public function getAguinal()
	{

		return number_format($this->aguinal,2,',','.');
		
	}
	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function setCodcat($v)
	{

		if ($this->codcat !== $v) {
			$this->codcat = $v;
			$this->modifiedColumns[] = NpforcarempPeer::CODCAT;
		}

	} 
	
	public function setCodcar($v)
	{

		if ($this->codcar !== $v) {
			$this->codcar = $v;
			$this->modifiedColumns[] = NpforcarempPeer::CODCAR;
		}

	} 
	
	public function setSuebas($v)
	{

		if ($this->suebas !== $v) {
			$this->suebas = $v;
			$this->modifiedColumns[] = NpforcarempPeer::SUEBAS;
		}

	} 
	
	public function setSuplen($v)
	{

		if ($this->suplen !== $v) {
			$this->suplen = $v;
			$this->modifiedColumns[] = NpforcarempPeer::SUPLEN;
		}

	} 
	
	public function setPriant($v)
	{

		if ($this->priant !== $v) {
			$this->priant = $v;
			$this->modifiedColumns[] = NpforcarempPeer::PRIANT;
		}

	} 
	
	public function setHediur($v)
	{

		if ($this->hediur !== $v) {
			$this->hediur = $v;
			$this->modifiedColumns[] = NpforcarempPeer::HEDIUR;
		}

	} 
	
	public function setPordiu($v)
	{

		if ($this->pordiu !== $v) {
			$this->pordiu = $v;
			$this->modifiedColumns[] = NpforcarempPeer::PORDIU;
		}

	} 
	
	public function setHenoct($v)
	{

		if ($this->henoct !== $v) {
			$this->henoct = $v;
			$this->modifiedColumns[] = NpforcarempPeer::HENOCT;
		}

	} 
	
	public function setPornoc1($v)
	{

		if ($this->pornoc1 !== $v) {
			$this->pornoc1 = $v;
			$this->modifiedColumns[] = NpforcarempPeer::PORNOC1;
		}

	} 
	
	public function setPornoc2($v)
	{

		if ($this->pornoc2 !== $v) {
			$this->pornoc2 = $v;
			$this->modifiedColumns[] = NpforcarempPeer::PORNOC2;
		}

	} 
	
	public function setBonvac($v)
	{

		if ($this->bonvac !== $v) {
			$this->bonvac = $v;
			$this->modifiedColumns[] = NpforcarempPeer::BONVAC;
		}

	} 
	
	public function setClau74($v)
	{

		if ($this->clau74 !== $v) {
			$this->clau74 = $v;
			$this->modifiedColumns[] = NpforcarempPeer::CLAU74;
		}

	} 
	
	public function setOtrcom($v)
	{

		if ($this->otrcom !== $v) {
			$this->otrcom = $v;
			$this->modifiedColumns[] = NpforcarempPeer::OTRCOM;
		}

	} 
	
	public function setPriefi($v)
	{

		if ($this->priefi !== $v) {
			$this->priefi = $v;
			$this->modifiedColumns[] = NpforcarempPeer::PRIEFI;
		}

	} 
	
	public function setPritra($v)
	{

		if ($this->pritra !== $v) {
			$this->pritra = $v;
			$this->modifiedColumns[] = NpforcarempPeer::PRITRA;
		}

	} 
	
	public function setAguinal($v)
	{

		if ($this->aguinal !== $v) {
			$this->aguinal = $v;
			$this->modifiedColumns[] = NpforcarempPeer::AGUINAL;
		}

	} 
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NpforcarempPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->codcat = $rs->getString($startcol + 0);

			$this->codcar = $rs->getString($startcol + 1);

			$this->suebas = $rs->getFloat($startcol + 2);

			$this->suplen = $rs->getFloat($startcol + 3);

			$this->priant = $rs->getFloat($startcol + 4);

			$this->hediur = $rs->getFloat($startcol + 5);

			$this->pordiu = $rs->getFloat($startcol + 6);

			$this->henoct = $rs->getFloat($startcol + 7);

			$this->pornoc1 = $rs->getFloat($startcol + 8);

			$this->pornoc2 = $rs->getFloat($startcol + 9);

			$this->bonvac = $rs->getFloat($startcol + 10);

			$this->clau74 = $rs->getFloat($startcol + 11);

			$this->otrcom = $rs->getFloat($startcol + 12);

			$this->priefi = $rs->getFloat($startcol + 13);

			$this->pritra = $rs->getFloat($startcol + 14);

			$this->aguinal = $rs->getFloat($startcol + 15);

			$this->id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Npforcaremp object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NpforcarempPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpforcarempPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpforcarempPeer::DATABASE_NAME);
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
					$pk = NpforcarempPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += NpforcarempPeer::doUpdate($this, $con);
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


			if (($retval = NpforcarempPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpforcarempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodcat();
				break;
			case 1:
				return $this->getCodcar();
				break;
			case 2:
				return $this->getSuebas();
				break;
			case 3:
				return $this->getSuplen();
				break;
			case 4:
				return $this->getPriant();
				break;
			case 5:
				return $this->getHediur();
				break;
			case 6:
				return $this->getPordiu();
				break;
			case 7:
				return $this->getHenoct();
				break;
			case 8:
				return $this->getPornoc1();
				break;
			case 9:
				return $this->getPornoc2();
				break;
			case 10:
				return $this->getBonvac();
				break;
			case 11:
				return $this->getClau74();
				break;
			case 12:
				return $this->getOtrcom();
				break;
			case 13:
				return $this->getPriefi();
				break;
			case 14:
				return $this->getPritra();
				break;
			case 15:
				return $this->getAguinal();
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
		$keys = NpforcarempPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodcat(),
			$keys[1] => $this->getCodcar(),
			$keys[2] => $this->getSuebas(),
			$keys[3] => $this->getSuplen(),
			$keys[4] => $this->getPriant(),
			$keys[5] => $this->getHediur(),
			$keys[6] => $this->getPordiu(),
			$keys[7] => $this->getHenoct(),
			$keys[8] => $this->getPornoc1(),
			$keys[9] => $this->getPornoc2(),
			$keys[10] => $this->getBonvac(),
			$keys[11] => $this->getClau74(),
			$keys[12] => $this->getOtrcom(),
			$keys[13] => $this->getPriefi(),
			$keys[14] => $this->getPritra(),
			$keys[15] => $this->getAguinal(),
			$keys[16] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpforcarempPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodcat($value);
				break;
			case 1:
				$this->setCodcar($value);
				break;
			case 2:
				$this->setSuebas($value);
				break;
			case 3:
				$this->setSuplen($value);
				break;
			case 4:
				$this->setPriant($value);
				break;
			case 5:
				$this->setHediur($value);
				break;
			case 6:
				$this->setPordiu($value);
				break;
			case 7:
				$this->setHenoct($value);
				break;
			case 8:
				$this->setPornoc1($value);
				break;
			case 9:
				$this->setPornoc2($value);
				break;
			case 10:
				$this->setBonvac($value);
				break;
			case 11:
				$this->setClau74($value);
				break;
			case 12:
				$this->setOtrcom($value);
				break;
			case 13:
				$this->setPriefi($value);
				break;
			case 14:
				$this->setPritra($value);
				break;
			case 15:
				$this->setAguinal($value);
				break;
			case 16:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpforcarempPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodcat($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCodcar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSuebas($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSuplen($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPriant($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setHediur($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPordiu($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setHenoct($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPornoc1($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPornoc2($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setBonvac($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setClau74($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setOtrcom($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setPriefi($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setPritra($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setAguinal($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpforcarempPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpforcarempPeer::CODCAT)) $criteria->add(NpforcarempPeer::CODCAT, $this->codcat);
		if ($this->isColumnModified(NpforcarempPeer::CODCAR)) $criteria->add(NpforcarempPeer::CODCAR, $this->codcar);
		if ($this->isColumnModified(NpforcarempPeer::SUEBAS)) $criteria->add(NpforcarempPeer::SUEBAS, $this->suebas);
		if ($this->isColumnModified(NpforcarempPeer::SUPLEN)) $criteria->add(NpforcarempPeer::SUPLEN, $this->suplen);
		if ($this->isColumnModified(NpforcarempPeer::PRIANT)) $criteria->add(NpforcarempPeer::PRIANT, $this->priant);
		if ($this->isColumnModified(NpforcarempPeer::HEDIUR)) $criteria->add(NpforcarempPeer::HEDIUR, $this->hediur);
		if ($this->isColumnModified(NpforcarempPeer::PORDIU)) $criteria->add(NpforcarempPeer::PORDIU, $this->pordiu);
		if ($this->isColumnModified(NpforcarempPeer::HENOCT)) $criteria->add(NpforcarempPeer::HENOCT, $this->henoct);
		if ($this->isColumnModified(NpforcarempPeer::PORNOC1)) $criteria->add(NpforcarempPeer::PORNOC1, $this->pornoc1);
		if ($this->isColumnModified(NpforcarempPeer::PORNOC2)) $criteria->add(NpforcarempPeer::PORNOC2, $this->pornoc2);
		if ($this->isColumnModified(NpforcarempPeer::BONVAC)) $criteria->add(NpforcarempPeer::BONVAC, $this->bonvac);
		if ($this->isColumnModified(NpforcarempPeer::CLAU74)) $criteria->add(NpforcarempPeer::CLAU74, $this->clau74);
		if ($this->isColumnModified(NpforcarempPeer::OTRCOM)) $criteria->add(NpforcarempPeer::OTRCOM, $this->otrcom);
		if ($this->isColumnModified(NpforcarempPeer::PRIEFI)) $criteria->add(NpforcarempPeer::PRIEFI, $this->priefi);
		if ($this->isColumnModified(NpforcarempPeer::PRITRA)) $criteria->add(NpforcarempPeer::PRITRA, $this->pritra);
		if ($this->isColumnModified(NpforcarempPeer::AGUINAL)) $criteria->add(NpforcarempPeer::AGUINAL, $this->aguinal);
		if ($this->isColumnModified(NpforcarempPeer::ID)) $criteria->add(NpforcarempPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpforcarempPeer::DATABASE_NAME);

		$criteria->add(NpforcarempPeer::ID, $this->id);

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

		$copyObj->setCodcat($this->codcat);

		$copyObj->setCodcar($this->codcar);

		$copyObj->setSuebas($this->suebas);

		$copyObj->setSuplen($this->suplen);

		$copyObj->setPriant($this->priant);

		$copyObj->setHediur($this->hediur);

		$copyObj->setPordiu($this->pordiu);

		$copyObj->setHenoct($this->henoct);

		$copyObj->setPornoc1($this->pornoc1);

		$copyObj->setPornoc2($this->pornoc2);

		$copyObj->setBonvac($this->bonvac);

		$copyObj->setClau74($this->clau74);

		$copyObj->setOtrcom($this->otrcom);

		$copyObj->setPriefi($this->priefi);

		$copyObj->setPritra($this->pritra);

		$copyObj->setAguinal($this->aguinal);


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
			self::$peer = new NpforcarempPeer();
		}
		return self::$peer;
	}

} 