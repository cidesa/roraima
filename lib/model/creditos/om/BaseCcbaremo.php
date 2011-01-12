<?php


abstract class BaseCcbaremo extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nombar;


	
	protected $orden;


	
	protected $puntua;


	
	protected $ponder;


	
	protected $result;


	
	protected $ccgerenc_id;


	
	protected $cctitulo_id;

	
	protected $aCcgerenc;

	
	protected $aCctitulo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getId()
  {

    return $this->id;

  }
  
  public function getNombar()
  {

    return trim($this->nombar);

  }
  
  public function getOrden()
  {

    return $this->orden;

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
  
  public function getCcgerencId()
  {

    return $this->ccgerenc_id;

  }
  
  public function getCctituloId()
  {

    return $this->cctitulo_id;

  }
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = CcbaremoPeer::ID;
      }
  
	} 
	
	public function setNombar($v)
	{

    if ($this->nombar !== $v) {
        $this->nombar = $v;
        $this->modifiedColumns[] = CcbaremoPeer::NOMBAR;
      }
  
	} 
	
	public function setOrden($v)
	{

    if ($this->orden !== $v) {
        $this->orden = $v;
        $this->modifiedColumns[] = CcbaremoPeer::ORDEN;
      }
  
	} 
	
	public function setPuntua($v)
	{

    if ($this->puntua !== $v) {
        $this->puntua = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbaremoPeer::PUNTUA;
      }
  
	} 
	
	public function setPonder($v)
	{

    if ($this->ponder !== $v) {
        $this->ponder = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbaremoPeer::PONDER;
      }
  
	} 
	
	public function setResult($v)
	{

    if ($this->result !== $v) {
        $this->result = Herramientas::toFloat($v);
        $this->modifiedColumns[] = CcbaremoPeer::RESULT;
      }
  
	} 
	
	public function setCcgerencId($v)
	{

    if ($this->ccgerenc_id !== $v) {
        $this->ccgerenc_id = $v;
        $this->modifiedColumns[] = CcbaremoPeer::CCGERENC_ID;
      }
  
		if ($this->aCcgerenc !== null && $this->aCcgerenc->getId() !== $v) {
			$this->aCcgerenc = null;
		}

	} 
	
	public function setCctituloId($v)
	{

    if ($this->cctitulo_id !== $v) {
        $this->cctitulo_id = $v;
        $this->modifiedColumns[] = CcbaremoPeer::CCTITULO_ID;
      }
  
		if ($this->aCctitulo !== null && $this->aCctitulo->getId() !== $v) {
			$this->aCctitulo = null;
		}

	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->id = $rs->getInt($startcol + 0);

      $this->nombar = $rs->getString($startcol + 1);

      $this->orden = $rs->getInt($startcol + 2);

      $this->puntua = $rs->getFloat($startcol + 3);

      $this->ponder = $rs->getFloat($startcol + 4);

      $this->result = $rs->getFloat($startcol + 5);

      $this->ccgerenc_id = $rs->getInt($startcol + 6);

      $this->cctitulo_id = $rs->getInt($startcol + 7);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 8; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Ccbaremo object", $e);
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
			$con = Propel::getConnection(CcbaremoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			CcbaremoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CcbaremoPeer::DATABASE_NAME);
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


												
			if ($this->aCcgerenc !== null) {
				if ($this->aCcgerenc->isModified()) {
					$affectedRows += $this->aCcgerenc->save($con);
				}
				$this->setCcgerenc($this->aCcgerenc);
			}

			if ($this->aCctitulo !== null) {
				if ($this->aCctitulo->isModified()) {
					$affectedRows += $this->aCctitulo->save($con);
				}
				$this->setCctitulo($this->aCctitulo);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CcbaremoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CcbaremoPeer::doUpdate($this, $con);
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


												
			if ($this->aCcgerenc !== null) {
				if (!$this->aCcgerenc->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCcgerenc->getValidationFailures());
				}
			}

			if ($this->aCctitulo !== null) {
				if (!$this->aCctitulo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCctitulo->getValidationFailures());
				}
			}


			if (($retval = CcbaremoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbaremoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombar();
				break;
			case 2:
				return $this->getOrden();
				break;
			case 3:
				return $this->getPuntua();
				break;
			case 4:
				return $this->getPonder();
				break;
			case 5:
				return $this->getResult();
				break;
			case 6:
				return $this->getCcgerencId();
				break;
			case 7:
				return $this->getCctituloId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbaremoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombar(),
			$keys[2] => $this->getOrden(),
			$keys[3] => $this->getPuntua(),
			$keys[4] => $this->getPonder(),
			$keys[5] => $this->getResult(),
			$keys[6] => $this->getCcgerencId(),
			$keys[7] => $this->getCctituloId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcbaremoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombar($value);
				break;
			case 2:
				$this->setOrden($value);
				break;
			case 3:
				$this->setPuntua($value);
				break;
			case 4:
				$this->setPonder($value);
				break;
			case 5:
				$this->setResult($value);
				break;
			case 6:
				$this->setCcgerencId($value);
				break;
			case 7:
				$this->setCctituloId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcbaremoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setOrden($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPuntua($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPonder($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setResult($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCcgerencId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCctituloId($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CcbaremoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcbaremoPeer::ID)) $criteria->add(CcbaremoPeer::ID, $this->id);
		if ($this->isColumnModified(CcbaremoPeer::NOMBAR)) $criteria->add(CcbaremoPeer::NOMBAR, $this->nombar);
		if ($this->isColumnModified(CcbaremoPeer::ORDEN)) $criteria->add(CcbaremoPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(CcbaremoPeer::PUNTUA)) $criteria->add(CcbaremoPeer::PUNTUA, $this->puntua);
		if ($this->isColumnModified(CcbaremoPeer::PONDER)) $criteria->add(CcbaremoPeer::PONDER, $this->ponder);
		if ($this->isColumnModified(CcbaremoPeer::RESULT)) $criteria->add(CcbaremoPeer::RESULT, $this->result);
		if ($this->isColumnModified(CcbaremoPeer::CCGERENC_ID)) $criteria->add(CcbaremoPeer::CCGERENC_ID, $this->ccgerenc_id);
		if ($this->isColumnModified(CcbaremoPeer::CCTITULO_ID)) $criteria->add(CcbaremoPeer::CCTITULO_ID, $this->cctitulo_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcbaremoPeer::DATABASE_NAME);

		$criteria->add(CcbaremoPeer::ID, $this->id);

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

		$copyObj->setNombar($this->nombar);

		$copyObj->setOrden($this->orden);

		$copyObj->setPuntua($this->puntua);

		$copyObj->setPonder($this->ponder);

		$copyObj->setResult($this->result);

		$copyObj->setCcgerencId($this->ccgerenc_id);

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
			self::$peer = new CcbaremoPeer();
		}
		return self::$peer;
	}

	
	public function setCcgerenc($v)
	{


		if ($v === null) {
			$this->setCcgerencId(NULL);
		} else {
			$this->setCcgerencId($v->getId());
		}


		$this->aCcgerenc = $v;
	}


	
	public function getCcgerenc($con = null)
	{
		if ($this->aCcgerenc === null && ($this->ccgerenc_id !== null)) {
						include_once 'lib/model/creditos/om/BaseCcgerencPeer.php';

      $c = new Criteria();
      $c->add(CcgerencPeer::ID,$this->ccgerenc_id);
      
			$this->aCcgerenc = CcgerencPeer::doSelectOne($c, $con);

			
		}
		return $this->aCcgerenc;
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