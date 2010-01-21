<?php


abstract class BaseCcbarinf extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $puntua;


	
	protected $ponder;


	
	protected $result;


	
	protected $ccinform_id;


	
	protected $cctitulo_id;

	
	protected $aCcinform;

	
	protected $aCctitulo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getPuntua($val=false)
  {

    if($val) return number_format($this->puntua,2,',','.');
    else return $this->puntua;

  }
  
  public function getPonder($val=false)
  {

    if($val) return number_format($this->ponder,2,',','.');
    else return $this->ponder;

  }
  
  public function getResult($val=false)
  {

    if($val) return number_format($this->result,2,',','.');
    else return $this->result;

  }
  
  public function getCcinformId()
  {

    return $this->ccinform_id;

  }
  
  public function getCctituloId()
  {

    return $this->cctitulo_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbarinfPeer::ID;
      }
  
	} 
	
	public function setPuntua($v)
	{

    if ($this->puntua !== $v) {
        $this->puntua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbarinfPeer::PUNTUA;
      }
  
	} 
	
	public function setPonder($v)
	{

    if ($this->ponder !== $v) {
        $this->ponder = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbarinfPeer::PONDER;
      }
  
	} 
	
	public function setResult($v)
	{

    if ($this->result !== $v) {
        $this->result = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbarinfPeer::RESULT;
      }
  
	} 
	
	public function setCcinformId($v)
	{

    if ($this->ccinform_id !== $v) {
        $this->ccinform_id = $v;
        $this->modifiedColumns[] = CcbarinfPeer::CCINFORM_ID;
      }
  
		if ($this->aCcinform !== null && $this->aCcinform->getId() !== $v) {
			$this->aCcinform = null;
		}

	} 
	
	public function setCctituloId($v)
	{

    if ($this->cctitulo_id !== $v) {
        $this->cctitulo_id = $v;
        $this->modifiedColumns[] = CcbarinfPeer::CCTITULO_ID;
      }
  
		if ($this->aCctitulo !== null && $this->aCctitulo->getId() !== $v) {
			$this->aCctitulo = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->puntua = $rs->getFloat($startcol + 1);

      $this->ponder = $rs->getFloat($startcol + 2);

      $this->result = $rs->getFloat($startcol + 3);

      $this->ccinform_id = $rs->getInt($startcol + 4);

      $this->cctitulo_id = $rs->getInt($startcol + 5);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 6; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbarinf object", $e);
    }
  }


  protected function afterHydrate()
  {

  }
    
  
  public function __call($m, $a)
    {
      $prefijo = substr($m,0,3);
    $metodo = strtolower(substr($m,3));
        if($prefijo=='get'){
      if(isset($this->$metodo)) return $this->$metodo;
      else return '';
    }elseif($prefijo=='set'){
      if(isset($this->$metodo)) $this->$metodo = $a[0];
    }else call_user_func_array($m, $a);

    }

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcbarinfPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbarinfPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbarinfPeer::DATABASE_NAME);
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


												
			if ($this->aCcinform !== null) {
				if ($this->aCcinform->isModified()) {
					$affectedRows += $this->aCcinform->save($con);
				}
				$this->setCcinform($this->aCcinform);
			}

			if ($this->aCctitulo !== null) {
				if ($this->aCctitulo->isModified()) {
					$affectedRows += $this->aCctitulo->save($con);
				}
				$this->setCctitulo($this->aCctitulo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbarinfPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbarinfPeer::doUpdate($this, $con);
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


												
			if ($this->aCcinform !== null) {
				if (!$this->aCcinform->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcinform->getValidationFailures());
				}
			}

			if ($this->aCctitulo !== null) {
				if (!$this->aCctitulo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctitulo->getValidationFailures());
				}
			}


			if (($retval = CcbarinfPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbarinfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getPuntua();
				break;
			case 2:
				return $this->getPonder();
				break;
			case 3:
				return $this->getResult();
				break;
			case 4:
				return $this->getCcinformId();
				break;
			case 5:
				return $this->getCctituloId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbarinfPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPuntua(),
			$keys[2] => $this->getPonder(),
			$keys[3] => $this->getResult(),
			$keys[4] => $this->getCcinformId(),
			$keys[5] => $this->getCctituloId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbarinfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setPuntua($value);
				break;
			case 2:
				$this->setPonder($value);
				break;
			case 3:
				$this->setResult($value);
				break;
			case 4:
				$this->setCcinformId($value);
				break;
			case 5:
				$this->setCctituloId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbarinfPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPuntua($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPonder($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setResult($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCcinformId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCctituloId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbarinfPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbarinfPeer::ID)) $criteria->add(CcbarinfPeer::ID, $this->id);
		if ($this->isColumnModified(CcbarinfPeer::PUNTUA)) $criteria->add(CcbarinfPeer::PUNTUA, $this->puntua);
		if ($this->isColumnModified(CcbarinfPeer::PONDER)) $criteria->add(CcbarinfPeer::PONDER, $this->ponder);
		if ($this->isColumnModified(CcbarinfPeer::RESULT)) $criteria->add(CcbarinfPeer::RESULT, $this->result);
		if ($this->isColumnModified(CcbarinfPeer::CCINFORM_ID)) $criteria->add(CcbarinfPeer::CCINFORM_ID, $this->ccinform_id);
		if ($this->isColumnModified(CcbarinfPeer::CCTITULO_ID)) $criteria->add(CcbarinfPeer::CCTITULO_ID, $this->cctitulo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbarinfPeer::DATABASE_NAME);

		$criteria->add(CcbarinfPeer::ID, $this->id);

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

		$copyObj->setPuntua($this->puntua);

		$copyObj->setPonder($this->ponder);

		$copyObj->setResult($this->result);

		$copyObj->setCcinformId($this->ccinform_id);

		$copyObj->setCctituloId($this->cctitulo_id);


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
			self::$peer = new CcbarinfPeer();
		}
		return self::$peer;
	}

	
	public function setCcinform($v)
	{


		if ($v === null) {
			$this->setCcinformId(NULL);
		} else {
			$this->setCcinformId($v->getId());
		}


		$this->aCcinform = $v;
	}


	
	public function getCcinform($con = null)
	{
		if ($this->aCcinform === null && ($this->ccinform_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcinformPeer.php';

      $c = new Criteria();
      $c->add(CcinformPeer::ID,$this->ccinform_id);
      
			$this->aCcinform = CcinformPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcinform;
	}

	
	public function setCctitulo($v)
	{


		if ($v === null) {
			$this->setCctituloId(NULL);
		} else {
			$this->setCctituloId($v->getId());
		}


		$this->aCctitulo = $v;
	}


	
	public function getCctitulo($con = null)
	{
		if ($this->aCctitulo === null && ($this->cctitulo_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCctituloPeer.php';

      $c = new Criteria();
      $c->add(CctituloPeer::ID,$this->cctitulo_id);
      
			$this->aCctitulo = CctituloPeer::doSelectOne($c, $con);

			
		}
		return $this->aCctitulo;
	}

} 