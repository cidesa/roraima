<?php


abstract class BaseNpdefvar extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $codvar;


	
	protected $desvar;


	
	protected $codnom;


	
	protected $valor1;


	
	protected $valor2;


	
	protected $valor3;


	
	protected $valor4;


	
	protected $valor5;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getCodvar()
  {

    return trim($this->codvar);

  }
  
  public function getDesvar()
  {

    return trim($this->desvar);

  }
  
  public function getCodnom()
  {

    return trim($this->codnom);

  }
  
  public function getValor1($val=false)
  {

    if($val) return number_format($this->valor1,2,',','.');
    else return $this->valor1;

  }
  
  public function getValor2($val=false)
  {

    if($val) return number_format($this->valor2,2,',','.');
    else return $this->valor2;

  }
  
  public function getValor3($val=false)
  {

    if($val) return number_format($this->valor3,2,',','.');
    else return $this->valor3;

  }
  
  public function getValor4($val=false)
  {

    if($val) return number_format($this->valor4,2,',','.');
    else return $this->valor4;

  }
  
  public function getValor5($val=false)
  {

    if($val) return number_format($this->valor5,2,',','.');
    else return $this->valor5;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setCodvar($v)
	{

    if ($this->codvar !== $v) {
        $this->codvar = $v;
        $this->modifiedColumns[] = NpdefvarPeer::CODVAR;
      }
  
	} 
	
	public function setDesvar($v)
	{

    if ($this->desvar !== $v) {
        $this->desvar = $v;
        $this->modifiedColumns[] = NpdefvarPeer::DESVAR;
      }
  
	} 
	
	public function setCodnom($v)
	{

    if ($this->codnom !== $v) {
        $this->codnom = $v;
        $this->modifiedColumns[] = NpdefvarPeer::CODNOM;
      }
  
	} 
	
	public function setValor1($v)
	{

    if ($this->valor1 !== $v) {
        $this->valor1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefvarPeer::VALOR1;
      }
  
	} 
	
	public function setValor2($v)
	{

    if ($this->valor2 !== $v) {
        $this->valor2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefvarPeer::VALOR2;
      }
  
	} 
	
	public function setValor3($v)
	{

    if ($this->valor3 !== $v) {
        $this->valor3 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefvarPeer::VALOR3;
      }
  
	} 
	
	public function setValor4($v)
	{

    if ($this->valor4 !== $v) {
        $this->valor4 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefvarPeer::VALOR4;
      }
  
	} 
	
	public function setValor5($v)
	{

    if ($this->valor5 !== $v) {
        $this->valor5 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = NpdefvarPeer::VALOR5;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = NpdefvarPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->codvar = $rs->getString($startcol + 0);

      $this->desvar = $rs->getString($startcol + 1);

      $this->codnom = $rs->getString($startcol + 2);

      $this->valor1 = $rs->getFloat($startcol + 3);

      $this->valor2 = $rs->getFloat($startcol + 4);

      $this->valor3 = $rs->getFloat($startcol + 5);

      $this->valor4 = $rs->getFloat($startcol + 6);

      $this->valor5 = $rs->getFloat($startcol + 7);

      $this->id = $rs->getInt($startcol + 8);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 9; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Npdefvar object", $e);
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
			$con = Propel::getConnection(NpdefvarPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NpdefvarPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NpdefvarPeer::DATABASE_NAME);
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
					$pk = NpdefvarPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NpdefvarPeer::doUpdate($this, $con);
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


			if (($retval = NpdefvarPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefvarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getCodvar();
				break;
			case 1:
				return $this->getDesvar();
				break;
			case 2:
				return $this->getCodnom();
				break;
			case 3:
				return $this->getValor1();
				break;
			case 4:
				return $this->getValor2();
				break;
			case 5:
				return $this->getValor3();
				break;
			case 6:
				return $this->getValor4();
				break;
			case 7:
				return $this->getValor5();
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
		$keys = NpdefvarPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCodvar(),
			$keys[1] => $this->getDesvar(),
			$keys[2] => $this->getCodnom(),
			$keys[3] => $this->getValor1(),
			$keys[4] => $this->getValor2(),
			$keys[5] => $this->getValor3(),
			$keys[6] => $this->getValor4(),
			$keys[7] => $this->getValor5(),
			$keys[8] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NpdefvarPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setCodvar($value);
				break;
			case 1:
				$this->setDesvar($value);
				break;
			case 2:
				$this->setCodnom($value);
				break;
			case 3:
				$this->setValor1($value);
				break;
			case 4:
				$this->setValor2($value);
				break;
			case 5:
				$this->setValor3($value);
				break;
			case 6:
				$this->setValor4($value);
				break;
			case 7:
				$this->setValor5($value);
				break;
			case 8:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NpdefvarPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCodvar($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDesvar($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCodnom($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setValor1($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setValor2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setValor3($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setValor4($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setValor5($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setId($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NpdefvarPeer::DATABASE_NAME);

		if ($this->isColumnModified(NpdefvarPeer::CODVAR)) $criteria->add(NpdefvarPeer::CODVAR, $this->codvar);
		if ($this->isColumnModified(NpdefvarPeer::DESVAR)) $criteria->add(NpdefvarPeer::DESVAR, $this->desvar);
		if ($this->isColumnModified(NpdefvarPeer::CODNOM)) $criteria->add(NpdefvarPeer::CODNOM, $this->codnom);
		if ($this->isColumnModified(NpdefvarPeer::VALOR1)) $criteria->add(NpdefvarPeer::VALOR1, $this->valor1);
		if ($this->isColumnModified(NpdefvarPeer::VALOR2)) $criteria->add(NpdefvarPeer::VALOR2, $this->valor2);
		if ($this->isColumnModified(NpdefvarPeer::VALOR3)) $criteria->add(NpdefvarPeer::VALOR3, $this->valor3);
		if ($this->isColumnModified(NpdefvarPeer::VALOR4)) $criteria->add(NpdefvarPeer::VALOR4, $this->valor4);
		if ($this->isColumnModified(NpdefvarPeer::VALOR5)) $criteria->add(NpdefvarPeer::VALOR5, $this->valor5);
		if ($this->isColumnModified(NpdefvarPeer::ID)) $criteria->add(NpdefvarPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NpdefvarPeer::DATABASE_NAME);

		$criteria->add(NpdefvarPeer::ID, $this->id);

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

		$copyObj->setCodvar($this->codvar);

		$copyObj->setDesvar($this->desvar);

		$copyObj->setCodnom($this->codnom);

		$copyObj->setValor1($this->valor1);

		$copyObj->setValor2($this->valor2);

		$copyObj->setValor3($this->valor3);

		$copyObj->setValor4($this->valor4);

		$copyObj->setValor5($this->valor5);


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
			self::$peer = new NpdefvarPeer();
		}
		return self::$peer;
	}

} 