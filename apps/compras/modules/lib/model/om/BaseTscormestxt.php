<?php


abstract class BaseTscormestxt extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $numcue;


	
	protected $mes1;


	
	protected $cormes1;


	
	protected $mes2;


	
	protected $cormes2;


	
	protected $mes3;


	
	protected $cormes3;


	
	protected $mes4;


	
	protected $cormes4;


	
	protected $mes5;


	
	protected $cormes5;


	
	protected $mes6;


	
	protected $cormes6;


	
	protected $mes7;


	
	protected $cormes7;


	
	protected $mes8;


	
	protected $cormes8;


	
	protected $mes9;


	
	protected $cormes9;


	
	protected $mes10;


	
	protected $cormes10;


	
	protected $mes11;


	
	protected $cormes11;


	
	protected $mes12;


	
	protected $cormes12;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getNumcue()
  {

    return trim($this->numcue);

  }
  
  public function getMes1()
  {

    return trim($this->mes1);

  }
  
  public function getCormes1()
  {

    return $this->cormes1;

  }
  
  public function getMes2()
  {

    return trim($this->mes2);

  }
  
  public function getCormes2()
  {

    return $this->cormes2;

  }
  
  public function getMes3()
  {

    return trim($this->mes3);

  }
  
  public function getCormes3()
  {

    return $this->cormes3;

  }
  
  public function getMes4()
  {

    return trim($this->mes4);

  }
  
  public function getCormes4()
  {

    return $this->cormes4;

  }
  
  public function getMes5()
  {

    return trim($this->mes5);

  }
  
  public function getCormes5()
  {

    return $this->cormes5;

  }
  
  public function getMes6()
  {

    return trim($this->mes6);

  }
  
  public function getCormes6()
  {

    return $this->cormes6;

  }
  
  public function getMes7()
  {

    return trim($this->mes7);

  }
  
  public function getCormes7()
  {

    return $this->cormes7;

  }
  
  public function getMes8()
  {

    return trim($this->mes8);

  }
  
  public function getCormes8()
  {

    return $this->cormes8;

  }
  
  public function getMes9()
  {

    return trim($this->mes9);

  }
  
  public function getCormes9()
  {

    return $this->cormes9;

  }
  
  public function getMes10()
  {

    return trim($this->mes10);

  }
  
  public function getCormes10()
  {

    return $this->cormes10;

  }
  
  public function getMes11()
  {

    return trim($this->mes11);

  }
  
  public function getCormes11()
  {

    return $this->cormes11;

  }
  
  public function getMes12()
  {

    return trim($this->mes12);

  }
  
  public function getCormes12()
  {

    return $this->cormes12;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setNumcue($v)
	{

    if ($this->numcue !== $v) {
        $this->numcue = $v;
        $this->modifiedColumns[] = TscormestxtPeer::NUMCUE;
      }
  
	} 
	
	public function setMes1($v)
	{

    if ($this->mes1 !== $v) {
        $this->mes1 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES1;
      }
  
	} 
	
	public function setCormes1($v)
	{

    if ($this->cormes1 !== $v) {
        $this->cormes1 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES1;
      }
  
	} 
	
	public function setMes2($v)
	{

    if ($this->mes2 !== $v) {
        $this->mes2 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES2;
      }
  
	} 
	
	public function setCormes2($v)
	{

    if ($this->cormes2 !== $v) {
        $this->cormes2 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES2;
      }
  
	} 
	
	public function setMes3($v)
	{

    if ($this->mes3 !== $v) {
        $this->mes3 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES3;
      }
  
	} 
	
	public function setCormes3($v)
	{

    if ($this->cormes3 !== $v) {
        $this->cormes3 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES3;
      }
  
	} 
	
	public function setMes4($v)
	{

    if ($this->mes4 !== $v) {
        $this->mes4 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES4;
      }
  
	} 
	
	public function setCormes4($v)
	{

    if ($this->cormes4 !== $v) {
        $this->cormes4 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES4;
      }
  
	} 
	
	public function setMes5($v)
	{

    if ($this->mes5 !== $v) {
        $this->mes5 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES5;
      }
  
	} 
	
	public function setCormes5($v)
	{

    if ($this->cormes5 !== $v) {
        $this->cormes5 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES5;
      }
  
	} 
	
	public function setMes6($v)
	{

    if ($this->mes6 !== $v) {
        $this->mes6 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES6;
      }
  
	} 
	
	public function setCormes6($v)
	{

    if ($this->cormes6 !== $v) {
        $this->cormes6 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES6;
      }
  
	} 
	
	public function setMes7($v)
	{

    if ($this->mes7 !== $v) {
        $this->mes7 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES7;
      }
  
	} 
	
	public function setCormes7($v)
	{

    if ($this->cormes7 !== $v) {
        $this->cormes7 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES7;
      }
  
	} 
	
	public function setMes8($v)
	{

    if ($this->mes8 !== $v) {
        $this->mes8 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES8;
      }
  
	} 
	
	public function setCormes8($v)
	{

    if ($this->cormes8 !== $v) {
        $this->cormes8 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES8;
      }
  
	} 
	
	public function setMes9($v)
	{

    if ($this->mes9 !== $v) {
        $this->mes9 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES9;
      }
  
	} 
	
	public function setCormes9($v)
	{

    if ($this->cormes9 !== $v) {
        $this->cormes9 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES9;
      }
  
	} 
	
	public function setMes10($v)
	{

    if ($this->mes10 !== $v) {
        $this->mes10 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES10;
      }
  
	} 
	
	public function setCormes10($v)
	{

    if ($this->cormes10 !== $v) {
        $this->cormes10 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES10;
      }
  
	} 
	
	public function setMes11($v)
	{

    if ($this->mes11 !== $v) {
        $this->mes11 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES11;
      }
  
	} 
	
	public function setCormes11($v)
	{

    if ($this->cormes11 !== $v) {
        $this->cormes11 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES11;
      }
  
	} 
	
	public function setMes12($v)
	{

    if ($this->mes12 !== $v) {
        $this->mes12 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::MES12;
      }
  
	} 
	
	public function setCormes12($v)
	{

    if ($this->cormes12 !== $v) {
        $this->cormes12 = $v;
        $this->modifiedColumns[] = TscormestxtPeer::CORMES12;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = TscormestxtPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->numcue = $rs->getString($startcol + 0);

      $this->mes1 = $rs->getString($startcol + 1);

      $this->cormes1 = $rs->getInt($startcol + 2);

      $this->mes2 = $rs->getString($startcol + 3);

      $this->cormes2 = $rs->getInt($startcol + 4);

      $this->mes3 = $rs->getString($startcol + 5);

      $this->cormes3 = $rs->getInt($startcol + 6);

      $this->mes4 = $rs->getString($startcol + 7);

      $this->cormes4 = $rs->getInt($startcol + 8);

      $this->mes5 = $rs->getString($startcol + 9);

      $this->cormes5 = $rs->getInt($startcol + 10);

      $this->mes6 = $rs->getString($startcol + 11);

      $this->cormes6 = $rs->getInt($startcol + 12);

      $this->mes7 = $rs->getString($startcol + 13);

      $this->cormes7 = $rs->getInt($startcol + 14);

      $this->mes8 = $rs->getString($startcol + 15);

      $this->cormes8 = $rs->getInt($startcol + 16);

      $this->mes9 = $rs->getString($startcol + 17);

      $this->cormes9 = $rs->getInt($startcol + 18);

      $this->mes10 = $rs->getString($startcol + 19);

      $this->cormes10 = $rs->getInt($startcol + 20);

      $this->mes11 = $rs->getString($startcol + 21);

      $this->cormes11 = $rs->getInt($startcol + 22);

      $this->mes12 = $rs->getString($startcol + 23);

      $this->cormes12 = $rs->getInt($startcol + 24);

      $this->id = $rs->getInt($startcol + 25);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 26; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Tscormestxt object", $e);
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
			$con = Propel::getConnection(TscormestxtPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TscormestxtPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(TscormestxtPeer::DATABASE_NAME);
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
					$pk = TscormestxtPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TscormestxtPeer::doUpdate($this, $con);
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


			if (($retval = TscormestxtPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscormestxtPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getNumcue();
				break;
			case 1:
				return $this->getMes1();
				break;
			case 2:
				return $this->getCormes1();
				break;
			case 3:
				return $this->getMes2();
				break;
			case 4:
				return $this->getCormes2();
				break;
			case 5:
				return $this->getMes3();
				break;
			case 6:
				return $this->getCormes3();
				break;
			case 7:
				return $this->getMes4();
				break;
			case 8:
				return $this->getCormes4();
				break;
			case 9:
				return $this->getMes5();
				break;
			case 10:
				return $this->getCormes5();
				break;
			case 11:
				return $this->getMes6();
				break;
			case 12:
				return $this->getCormes6();
				break;
			case 13:
				return $this->getMes7();
				break;
			case 14:
				return $this->getCormes7();
				break;
			case 15:
				return $this->getMes8();
				break;
			case 16:
				return $this->getCormes8();
				break;
			case 17:
				return $this->getMes9();
				break;
			case 18:
				return $this->getCormes9();
				break;
			case 19:
				return $this->getMes10();
				break;
			case 20:
				return $this->getCormes10();
				break;
			case 21:
				return $this->getMes11();
				break;
			case 22:
				return $this->getCormes11();
				break;
			case 23:
				return $this->getMes12();
				break;
			case 24:
				return $this->getCormes12();
				break;
			case 25:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscormestxtPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getNumcue(),
			$keys[1] => $this->getMes1(),
			$keys[2] => $this->getCormes1(),
			$keys[3] => $this->getMes2(),
			$keys[4] => $this->getCormes2(),
			$keys[5] => $this->getMes3(),
			$keys[6] => $this->getCormes3(),
			$keys[7] => $this->getMes4(),
			$keys[8] => $this->getCormes4(),
			$keys[9] => $this->getMes5(),
			$keys[10] => $this->getCormes5(),
			$keys[11] => $this->getMes6(),
			$keys[12] => $this->getCormes6(),
			$keys[13] => $this->getMes7(),
			$keys[14] => $this->getCormes7(),
			$keys[15] => $this->getMes8(),
			$keys[16] => $this->getCormes8(),
			$keys[17] => $this->getMes9(),
			$keys[18] => $this->getCormes9(),
			$keys[19] => $this->getMes10(),
			$keys[20] => $this->getCormes10(),
			$keys[21] => $this->getMes11(),
			$keys[22] => $this->getCormes11(),
			$keys[23] => $this->getMes12(),
			$keys[24] => $this->getCormes12(),
			$keys[25] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TscormestxtPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setNumcue($value);
				break;
			case 1:
				$this->setMes1($value);
				break;
			case 2:
				$this->setCormes1($value);
				break;
			case 3:
				$this->setMes2($value);
				break;
			case 4:
				$this->setCormes2($value);
				break;
			case 5:
				$this->setMes3($value);
				break;
			case 6:
				$this->setCormes3($value);
				break;
			case 7:
				$this->setMes4($value);
				break;
			case 8:
				$this->setCormes4($value);
				break;
			case 9:
				$this->setMes5($value);
				break;
			case 10:
				$this->setCormes5($value);
				break;
			case 11:
				$this->setMes6($value);
				break;
			case 12:
				$this->setCormes6($value);
				break;
			case 13:
				$this->setMes7($value);
				break;
			case 14:
				$this->setCormes7($value);
				break;
			case 15:
				$this->setMes8($value);
				break;
			case 16:
				$this->setCormes8($value);
				break;
			case 17:
				$this->setMes9($value);
				break;
			case 18:
				$this->setCormes9($value);
				break;
			case 19:
				$this->setMes10($value);
				break;
			case 20:
				$this->setCormes10($value);
				break;
			case 21:
				$this->setMes11($value);
				break;
			case 22:
				$this->setCormes11($value);
				break;
			case 23:
				$this->setMes12($value);
				break;
			case 24:
				$this->setCormes12($value);
				break;
			case 25:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = TscormestxtPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setNumcue($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMes1($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCormes1($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setMes2($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCormes2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMes3($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCormes3($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMes4($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCormes4($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setMes5($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCormes5($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setMes6($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCormes6($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMes7($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setCormes7($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setMes8($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setCormes8($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setMes9($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setCormes9($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setMes10($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setCormes10($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMes11($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setCormes11($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setMes12($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setCormes12($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setId($arr[$keys[25]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TscormestxtPeer::DATABASE_NAME);

		if ($this->isColumnModified(TscormestxtPeer::NUMCUE)) $criteria->add(TscormestxtPeer::NUMCUE, $this->numcue);
		if ($this->isColumnModified(TscormestxtPeer::MES1)) $criteria->add(TscormestxtPeer::MES1, $this->mes1);
		if ($this->isColumnModified(TscormestxtPeer::CORMES1)) $criteria->add(TscormestxtPeer::CORMES1, $this->cormes1);
		if ($this->isColumnModified(TscormestxtPeer::MES2)) $criteria->add(TscormestxtPeer::MES2, $this->mes2);
		if ($this->isColumnModified(TscormestxtPeer::CORMES2)) $criteria->add(TscormestxtPeer::CORMES2, $this->cormes2);
		if ($this->isColumnModified(TscormestxtPeer::MES3)) $criteria->add(TscormestxtPeer::MES3, $this->mes3);
		if ($this->isColumnModified(TscormestxtPeer::CORMES3)) $criteria->add(TscormestxtPeer::CORMES3, $this->cormes3);
		if ($this->isColumnModified(TscormestxtPeer::MES4)) $criteria->add(TscormestxtPeer::MES4, $this->mes4);
		if ($this->isColumnModified(TscormestxtPeer::CORMES4)) $criteria->add(TscormestxtPeer::CORMES4, $this->cormes4);
		if ($this->isColumnModified(TscormestxtPeer::MES5)) $criteria->add(TscormestxtPeer::MES5, $this->mes5);
		if ($this->isColumnModified(TscormestxtPeer::CORMES5)) $criteria->add(TscormestxtPeer::CORMES5, $this->cormes5);
		if ($this->isColumnModified(TscormestxtPeer::MES6)) $criteria->add(TscormestxtPeer::MES6, $this->mes6);
		if ($this->isColumnModified(TscormestxtPeer::CORMES6)) $criteria->add(TscormestxtPeer::CORMES6, $this->cormes6);
		if ($this->isColumnModified(TscormestxtPeer::MES7)) $criteria->add(TscormestxtPeer::MES7, $this->mes7);
		if ($this->isColumnModified(TscormestxtPeer::CORMES7)) $criteria->add(TscormestxtPeer::CORMES7, $this->cormes7);
		if ($this->isColumnModified(TscormestxtPeer::MES8)) $criteria->add(TscormestxtPeer::MES8, $this->mes8);
		if ($this->isColumnModified(TscormestxtPeer::CORMES8)) $criteria->add(TscormestxtPeer::CORMES8, $this->cormes8);
		if ($this->isColumnModified(TscormestxtPeer::MES9)) $criteria->add(TscormestxtPeer::MES9, $this->mes9);
		if ($this->isColumnModified(TscormestxtPeer::CORMES9)) $criteria->add(TscormestxtPeer::CORMES9, $this->cormes9);
		if ($this->isColumnModified(TscormestxtPeer::MES10)) $criteria->add(TscormestxtPeer::MES10, $this->mes10);
		if ($this->isColumnModified(TscormestxtPeer::CORMES10)) $criteria->add(TscormestxtPeer::CORMES10, $this->cormes10);
		if ($this->isColumnModified(TscormestxtPeer::MES11)) $criteria->add(TscormestxtPeer::MES11, $this->mes11);
		if ($this->isColumnModified(TscormestxtPeer::CORMES11)) $criteria->add(TscormestxtPeer::CORMES11, $this->cormes11);
		if ($this->isColumnModified(TscormestxtPeer::MES12)) $criteria->add(TscormestxtPeer::MES12, $this->mes12);
		if ($this->isColumnModified(TscormestxtPeer::CORMES12)) $criteria->add(TscormestxtPeer::CORMES12, $this->cormes12);
		if ($this->isColumnModified(TscormestxtPeer::ID)) $criteria->add(TscormestxtPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TscormestxtPeer::DATABASE_NAME);

		$criteria->add(TscormestxtPeer::ID, $this->id);

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

		$copyObj->setNumcue($this->numcue);

		$copyObj->setMes1($this->mes1);

		$copyObj->setCormes1($this->cormes1);

		$copyObj->setMes2($this->mes2);

		$copyObj->setCormes2($this->cormes2);

		$copyObj->setMes3($this->mes3);

		$copyObj->setCormes3($this->cormes3);

		$copyObj->setMes4($this->mes4);

		$copyObj->setCormes4($this->cormes4);

		$copyObj->setMes5($this->mes5);

		$copyObj->setCormes5($this->cormes5);

		$copyObj->setMes6($this->mes6);

		$copyObj->setCormes6($this->cormes6);

		$copyObj->setMes7($this->mes7);

		$copyObj->setCormes7($this->cormes7);

		$copyObj->setMes8($this->mes8);

		$copyObj->setCormes8($this->cormes8);

		$copyObj->setMes9($this->mes9);

		$copyObj->setCormes9($this->cormes9);

		$copyObj->setMes10($this->mes10);

		$copyObj->setCormes10($this->cormes10);

		$copyObj->setMes11($this->mes11);

		$copyObj->setCormes11($this->cormes11);

		$copyObj->setMes12($this->mes12);

		$copyObj->setCormes12($this->cormes12);


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
			self::$peer = new TscormestxtPeer();
		}
		return self::$peer;
	}

} 