<?php


abstract class BaseAtpresupuesto extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $atayudas_id;


	
	protected $atprovee1;


	
	protected $monto1;


	
	protected $atprovee2;


	
	protected $monto2;


	
	protected $atprovee3;


	
	protected $monto3;


	
	protected $atprovee4;


	
	protected $monto4;


	
	protected $atprovee5;


	
	protected $monto5;


	
	protected $atprovee6;


	
	protected $monto6;


	
	protected $id;

	
	protected $aAtayudas;

	
	protected $aAtproveeRelatedByAtprovee1;

	
	protected $aAtproveeRelatedByAtprovee2;

	
	protected $aAtproveeRelatedByAtprovee3;

	
	protected $aAtproveeRelatedByAtprovee4;

	
	protected $aAtproveeRelatedByAtprovee5;

	
	protected $aAtproveeRelatedByAtprovee6;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

  
  public function getAtayudasId()
  {

    return $this->atayudas_id;

  }
  
  public function getAtprovee1()
  {

    return $this->atprovee1;

  }
  
  public function getMonto1($val=false)
  {

    if($val) return number_format($this->monto1,2,',','.');
    else return $this->monto1;

  }
  
  public function getAtprovee2()
  {

    return $this->atprovee2;

  }
  
  public function getMonto2($val=false)
  {

    if($val) return number_format($this->monto2,2,',','.');
    else return $this->monto2;

  }
  
  public function getAtprovee3()
  {

    return $this->atprovee3;

  }
  
  public function getMonto3($val=false)
  {

    if($val) return number_format($this->monto3,2,',','.');
    else return $this->monto3;

  }
  
  public function getAtprovee4()
  {

    return $this->atprovee4;

  }
  
  public function getMonto4($val=false)
  {

    if($val) return number_format($this->monto4,2,',','.');
    else return $this->monto4;

  }
  
  public function getAtprovee5()
  {

    return $this->atprovee5;

  }
  
  public function getMonto5($val=false)
  {

    if($val) return number_format($this->monto5,2,',','.');
    else return $this->monto5;

  }
  
  public function getAtprovee6()
  {

    return $this->atprovee6;

  }
  
  public function getMonto6($val=false)
  {

    if($val) return number_format($this->monto6,2,',','.');
    else return $this->monto6;

  }
  
  public function getId()
  {

    return $this->id;

  }
	
	public function setAtayudasId($v)
	{

    if ($this->atayudas_id !== $v) {
        $this->atayudas_id = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATAYUDAS_ID;
      }
  
		if ($this->aAtayudas !== null && $this->aAtayudas->getId() !== $v) {
			$this->aAtayudas = null;
		}

	} 
	
	public function setAtprovee1($v)
	{

    if ($this->atprovee1 !== $v) {
        $this->atprovee1 = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATPROVEE1;
      }
  
		if ($this->aAtproveeRelatedByAtprovee1 !== null && $this->aAtproveeRelatedByAtprovee1->getId() !== $v) {
			$this->aAtproveeRelatedByAtprovee1 = null;
		}

	} 
	
	public function setMonto1($v)
	{

    if ($this->monto1 !== $v) {
        $this->monto1 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtpresupuestoPeer::MONTO1;
      }
  
	} 
	
	public function setAtprovee2($v)
	{

    if ($this->atprovee2 !== $v) {
        $this->atprovee2 = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATPROVEE2;
      }
  
		if ($this->aAtproveeRelatedByAtprovee2 !== null && $this->aAtproveeRelatedByAtprovee2->getId() !== $v) {
			$this->aAtproveeRelatedByAtprovee2 = null;
		}

	} 
	
	public function setMonto2($v)
	{

    if ($this->monto2 !== $v) {
        $this->monto2 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtpresupuestoPeer::MONTO2;
      }
  
	} 
	
	public function setAtprovee3($v)
	{

    if ($this->atprovee3 !== $v) {
        $this->atprovee3 = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATPROVEE3;
      }
  
		if ($this->aAtproveeRelatedByAtprovee3 !== null && $this->aAtproveeRelatedByAtprovee3->getId() !== $v) {
			$this->aAtproveeRelatedByAtprovee3 = null;
		}

	} 
	
	public function setMonto3($v)
	{

    if ($this->monto3 !== $v) {
        $this->monto3 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtpresupuestoPeer::MONTO3;
      }
  
	} 
	
	public function setAtprovee4($v)
	{

    if ($this->atprovee4 !== $v) {
        $this->atprovee4 = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATPROVEE4;
      }
  
		if ($this->aAtproveeRelatedByAtprovee4 !== null && $this->aAtproveeRelatedByAtprovee4->getId() !== $v) {
			$this->aAtproveeRelatedByAtprovee4 = null;
		}

	} 
	
	public function setMonto4($v)
	{

    if ($this->monto4 !== $v) {
        $this->monto4 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtpresupuestoPeer::MONTO4;
      }
  
	} 
	
	public function setAtprovee5($v)
	{

    if ($this->atprovee5 !== $v) {
        $this->atprovee5 = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATPROVEE5;
      }
  
		if ($this->aAtproveeRelatedByAtprovee5 !== null && $this->aAtproveeRelatedByAtprovee5->getId() !== $v) {
			$this->aAtproveeRelatedByAtprovee5 = null;
		}

	} 
	
	public function setMonto5($v)
	{

    if ($this->monto5 !== $v) {
        $this->monto5 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtpresupuestoPeer::MONTO5;
      }
  
	} 
	
	public function setAtprovee6($v)
	{

    if ($this->atprovee6 !== $v) {
        $this->atprovee6 = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ATPROVEE6;
      }
  
		if ($this->aAtproveeRelatedByAtprovee6 !== null && $this->aAtproveeRelatedByAtprovee6->getId() !== $v) {
			$this->aAtproveeRelatedByAtprovee6 = null;
		}

	} 
	
	public function setMonto6($v)
	{

    if ($this->monto6 !== $v) {
        $this->monto6 = Herramientas::toFloat($v);
        $this->modifiedColumns[] = AtpresupuestoPeer::MONTO6;
      }
  
	} 
	
	public function setId($v)
	{

    if ($this->id !== $v) {
        $this->id = $v;
        $this->modifiedColumns[] = AtpresupuestoPeer::ID;
      }
  
	} 
  
  public function hydrate(ResultSet $rs, $startcol = 1)
  {
    try {

      $this->atayudas_id = $rs->getInt($startcol + 0);

      $this->atprovee1 = $rs->getInt($startcol + 1);

      $this->monto1 = $rs->getFloat($startcol + 2);

      $this->atprovee2 = $rs->getInt($startcol + 3);

      $this->monto2 = $rs->getFloat($startcol + 4);

      $this->atprovee3 = $rs->getInt($startcol + 5);

      $this->monto3 = $rs->getFloat($startcol + 6);

      $this->atprovee4 = $rs->getInt($startcol + 7);

      $this->monto4 = $rs->getFloat($startcol + 8);

      $this->atprovee5 = $rs->getInt($startcol + 9);

      $this->monto5 = $rs->getFloat($startcol + 10);

      $this->atprovee6 = $rs->getInt($startcol + 11);

      $this->monto6 = $rs->getFloat($startcol + 12);

      $this->id = $rs->getInt($startcol + 13);

      $this->resetModified();

      $this->setNew(false);

      $this->afterHydrate();

            return $startcol + 14; 
    } catch (Exception $e) {
      throw new PropelException("Error populating Atpresupuesto object", $e);
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
			$con = Propel::getConnection(AtpresupuestoPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AtpresupuestoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AtpresupuestoPeer::DATABASE_NAME);
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


												
			if ($this->aAtayudas !== null) {
				if ($this->aAtayudas->isModified()) {
					$affectedRows += $this->aAtayudas->save($con);
				}
				$this->setAtayudas($this->aAtayudas);
			}

			if ($this->aAtproveeRelatedByAtprovee1 !== null) {
				if ($this->aAtproveeRelatedByAtprovee1->isModified()) {
					$affectedRows += $this->aAtproveeRelatedByAtprovee1->save($con);
				}
				$this->setAtproveeRelatedByAtprovee1($this->aAtproveeRelatedByAtprovee1);
			}

			if ($this->aAtproveeRelatedByAtprovee2 !== null) {
				if ($this->aAtproveeRelatedByAtprovee2->isModified()) {
					$affectedRows += $this->aAtproveeRelatedByAtprovee2->save($con);
				}
				$this->setAtproveeRelatedByAtprovee2($this->aAtproveeRelatedByAtprovee2);
			}

			if ($this->aAtproveeRelatedByAtprovee3 !== null) {
				if ($this->aAtproveeRelatedByAtprovee3->isModified()) {
					$affectedRows += $this->aAtproveeRelatedByAtprovee3->save($con);
				}
				$this->setAtproveeRelatedByAtprovee3($this->aAtproveeRelatedByAtprovee3);
			}

			if ($this->aAtproveeRelatedByAtprovee4 !== null) {
				if ($this->aAtproveeRelatedByAtprovee4->isModified()) {
					$affectedRows += $this->aAtproveeRelatedByAtprovee4->save($con);
				}
				$this->setAtproveeRelatedByAtprovee4($this->aAtproveeRelatedByAtprovee4);
			}

			if ($this->aAtproveeRelatedByAtprovee5 !== null) {
				if ($this->aAtproveeRelatedByAtprovee5->isModified()) {
					$affectedRows += $this->aAtproveeRelatedByAtprovee5->save($con);
				}
				$this->setAtproveeRelatedByAtprovee5($this->aAtproveeRelatedByAtprovee5);
			}

			if ($this->aAtproveeRelatedByAtprovee6 !== null) {
				if ($this->aAtproveeRelatedByAtprovee6->isModified()) {
					$affectedRows += $this->aAtproveeRelatedByAtprovee6->save($con);
				}
				$this->setAtproveeRelatedByAtprovee6($this->aAtproveeRelatedByAtprovee6);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AtpresupuestoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AtpresupuestoPeer::doUpdate($this, $con);
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


												
			if ($this->aAtayudas !== null) {
				if (!$this->aAtayudas->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtayudas->getValidationFailures());
				}
			}

			if ($this->aAtproveeRelatedByAtprovee1 !== null) {
				if (!$this->aAtproveeRelatedByAtprovee1->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtproveeRelatedByAtprovee1->getValidationFailures());
				}
			}

			if ($this->aAtproveeRelatedByAtprovee2 !== null) {
				if (!$this->aAtproveeRelatedByAtprovee2->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtproveeRelatedByAtprovee2->getValidationFailures());
				}
			}

			if ($this->aAtproveeRelatedByAtprovee3 !== null) {
				if (!$this->aAtproveeRelatedByAtprovee3->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtproveeRelatedByAtprovee3->getValidationFailures());
				}
			}

			if ($this->aAtproveeRelatedByAtprovee4 !== null) {
				if (!$this->aAtproveeRelatedByAtprovee4->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtproveeRelatedByAtprovee4->getValidationFailures());
				}
			}

			if ($this->aAtproveeRelatedByAtprovee5 !== null) {
				if (!$this->aAtproveeRelatedByAtprovee5->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtproveeRelatedByAtprovee5->getValidationFailures());
				}
			}

			if ($this->aAtproveeRelatedByAtprovee6 !== null) {
				if (!$this->aAtproveeRelatedByAtprovee6->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAtproveeRelatedByAtprovee6->getValidationFailures());
				}
			}


			if (($retval = AtpresupuestoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtpresupuestoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAtayudasId();
				break;
			case 1:
				return $this->getAtprovee1();
				break;
			case 2:
				return $this->getMonto1();
				break;
			case 3:
				return $this->getAtprovee2();
				break;
			case 4:
				return $this->getMonto2();
				break;
			case 5:
				return $this->getAtprovee3();
				break;
			case 6:
				return $this->getMonto3();
				break;
			case 7:
				return $this->getAtprovee4();
				break;
			case 8:
				return $this->getMonto4();
				break;
			case 9:
				return $this->getAtprovee5();
				break;
			case 10:
				return $this->getMonto5();
				break;
			case 11:
				return $this->getAtprovee6();
				break;
			case 12:
				return $this->getMonto6();
				break;
			case 13:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtpresupuestoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAtayudasId(),
			$keys[1] => $this->getAtprovee1(),
			$keys[2] => $this->getMonto1(),
			$keys[3] => $this->getAtprovee2(),
			$keys[4] => $this->getMonto2(),
			$keys[5] => $this->getAtprovee3(),
			$keys[6] => $this->getMonto3(),
			$keys[7] => $this->getAtprovee4(),
			$keys[8] => $this->getMonto4(),
			$keys[9] => $this->getAtprovee5(),
			$keys[10] => $this->getMonto5(),
			$keys[11] => $this->getAtprovee6(),
			$keys[12] => $this->getMonto6(),
			$keys[13] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AtpresupuestoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAtayudasId($value);
				break;
			case 1:
				$this->setAtprovee1($value);
				break;
			case 2:
				$this->setMonto1($value);
				break;
			case 3:
				$this->setAtprovee2($value);
				break;
			case 4:
				$this->setMonto2($value);
				break;
			case 5:
				$this->setAtprovee3($value);
				break;
			case 6:
				$this->setMonto3($value);
				break;
			case 7:
				$this->setAtprovee4($value);
				break;
			case 8:
				$this->setMonto4($value);
				break;
			case 9:
				$this->setAtprovee5($value);
				break;
			case 10:
				$this->setMonto5($value);
				break;
			case 11:
				$this->setAtprovee6($value);
				break;
			case 12:
				$this->setMonto6($value);
				break;
			case 13:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AtpresupuestoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAtayudasId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAtprovee1($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMonto1($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAtprovee2($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMonto2($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAtprovee3($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setMonto3($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAtprovee4($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMonto4($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAtprovee5($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setMonto5($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAtprovee6($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMonto6($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AtpresupuestoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AtpresupuestoPeer::ATAYUDAS_ID)) $criteria->add(AtpresupuestoPeer::ATAYUDAS_ID, $this->atayudas_id);
		if ($this->isColumnModified(AtpresupuestoPeer::ATPROVEE1)) $criteria->add(AtpresupuestoPeer::ATPROVEE1, $this->atprovee1);
		if ($this->isColumnModified(AtpresupuestoPeer::MONTO1)) $criteria->add(AtpresupuestoPeer::MONTO1, $this->monto1);
		if ($this->isColumnModified(AtpresupuestoPeer::ATPROVEE2)) $criteria->add(AtpresupuestoPeer::ATPROVEE2, $this->atprovee2);
		if ($this->isColumnModified(AtpresupuestoPeer::MONTO2)) $criteria->add(AtpresupuestoPeer::MONTO2, $this->monto2);
		if ($this->isColumnModified(AtpresupuestoPeer::ATPROVEE3)) $criteria->add(AtpresupuestoPeer::ATPROVEE3, $this->atprovee3);
		if ($this->isColumnModified(AtpresupuestoPeer::MONTO3)) $criteria->add(AtpresupuestoPeer::MONTO3, $this->monto3);
		if ($this->isColumnModified(AtpresupuestoPeer::ATPROVEE4)) $criteria->add(AtpresupuestoPeer::ATPROVEE4, $this->atprovee4);
		if ($this->isColumnModified(AtpresupuestoPeer::MONTO4)) $criteria->add(AtpresupuestoPeer::MONTO4, $this->monto4);
		if ($this->isColumnModified(AtpresupuestoPeer::ATPROVEE5)) $criteria->add(AtpresupuestoPeer::ATPROVEE5, $this->atprovee5);
		if ($this->isColumnModified(AtpresupuestoPeer::MONTO5)) $criteria->add(AtpresupuestoPeer::MONTO5, $this->monto5);
		if ($this->isColumnModified(AtpresupuestoPeer::ATPROVEE6)) $criteria->add(AtpresupuestoPeer::ATPROVEE6, $this->atprovee6);
		if ($this->isColumnModified(AtpresupuestoPeer::MONTO6)) $criteria->add(AtpresupuestoPeer::MONTO6, $this->monto6);
		if ($this->isColumnModified(AtpresupuestoPeer::ID)) $criteria->add(AtpresupuestoPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AtpresupuestoPeer::DATABASE_NAME);

		$criteria->add(AtpresupuestoPeer::ID, $this->id);

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

		$copyObj->setAtayudasId($this->atayudas_id);

		$copyObj->setAtprovee1($this->atprovee1);

		$copyObj->setMonto1($this->monto1);

		$copyObj->setAtprovee2($this->atprovee2);

		$copyObj->setMonto2($this->monto2);

		$copyObj->setAtprovee3($this->atprovee3);

		$copyObj->setMonto3($this->monto3);

		$copyObj->setAtprovee4($this->atprovee4);

		$copyObj->setMonto4($this->monto4);

		$copyObj->setAtprovee5($this->atprovee5);

		$copyObj->setMonto5($this->monto5);

		$copyObj->setAtprovee6($this->atprovee6);

		$copyObj->setMonto6($this->monto6);


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
			self::$peer = new AtpresupuestoPeer();
		}
		return self::$peer;
	}

	
	public function setAtayudas($v)
	{


		if ($v === null) {
			$this->setAtayudasId(NULL);
		} else {
			$this->setAtayudasId($v->getId());
		}


		$this->aAtayudas = $v;
	}


	
	public function getAtayudas($con = null)
	{
		if ($this->aAtayudas === null && ($this->atayudas_id !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtayudasPeer.php';

      $c = new Criteria();
      $c->add(AtayudasPeer::ID,$this->atayudas_id);
      
			$this->aAtayudas = AtayudasPeer::doSelectOne($c, $con);

			
		}
		return $this->aAtayudas;
	}

	
	public function setAtproveeRelatedByAtprovee1($v)
	{


		if ($v === null) {
			$this->setAtprovee1(NULL);
		} else {
			$this->setAtprovee1($v->getId());
		}


		$this->aAtproveeRelatedByAtprovee1 = $v;
	}


	
	public function getAtproveeRelatedByAtprovee1($con = null)
	{
		if ($this->aAtproveeRelatedByAtprovee1 === null && ($this->atprovee1 !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtproveePeer.php';

      $c = new Criteria();
      $c->add(AtproveePeer::ID,$this->atprovee1);
      
			$this->aAtproveeRelatedByAtprovee1 = AtproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aAtproveeRelatedByAtprovee1;
	}

	
	public function setAtproveeRelatedByAtprovee2($v)
	{


		if ($v === null) {
			$this->setAtprovee2(NULL);
		} else {
			$this->setAtprovee2($v->getId());
		}


		$this->aAtproveeRelatedByAtprovee2 = $v;
	}


	
	public function getAtproveeRelatedByAtprovee2($con = null)
	{
		if ($this->aAtproveeRelatedByAtprovee2 === null && ($this->atprovee2 !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtproveePeer.php';

      $c = new Criteria();
      $c->add(AtproveePeer::ID,$this->atprovee2);
      
			$this->aAtproveeRelatedByAtprovee2 = AtproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aAtproveeRelatedByAtprovee2;
	}

	
	public function setAtproveeRelatedByAtprovee3($v)
	{


		if ($v === null) {
			$this->setAtprovee3(NULL);
		} else {
			$this->setAtprovee3($v->getId());
		}


		$this->aAtproveeRelatedByAtprovee3 = $v;
	}


	
	public function getAtproveeRelatedByAtprovee3($con = null)
	{
		if ($this->aAtproveeRelatedByAtprovee3 === null && ($this->atprovee3 !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtproveePeer.php';

      $c = new Criteria();
      $c->add(AtproveePeer::ID,$this->atprovee3);
      
			$this->aAtproveeRelatedByAtprovee3 = AtproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aAtproveeRelatedByAtprovee3;
	}

	
	public function setAtproveeRelatedByAtprovee4($v)
	{


		if ($v === null) {
			$this->setAtprovee4(NULL);
		} else {
			$this->setAtprovee4($v->getId());
		}


		$this->aAtproveeRelatedByAtprovee4 = $v;
	}


	
	public function getAtproveeRelatedByAtprovee4($con = null)
	{
		if ($this->aAtproveeRelatedByAtprovee4 === null && ($this->atprovee4 !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtproveePeer.php';

      $c = new Criteria();
      $c->add(AtproveePeer::ID,$this->atprovee4);
      
			$this->aAtproveeRelatedByAtprovee4 = AtproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aAtproveeRelatedByAtprovee4;
	}

	
	public function setAtproveeRelatedByAtprovee5($v)
	{


		if ($v === null) {
			$this->setAtprovee5(NULL);
		} else {
			$this->setAtprovee5($v->getId());
		}


		$this->aAtproveeRelatedByAtprovee5 = $v;
	}


	
	public function getAtproveeRelatedByAtprovee5($con = null)
	{
		if ($this->aAtproveeRelatedByAtprovee5 === null && ($this->atprovee5 !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtproveePeer.php';

      $c = new Criteria();
      $c->add(AtproveePeer::ID,$this->atprovee5);
      
			$this->aAtproveeRelatedByAtprovee5 = AtproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aAtproveeRelatedByAtprovee5;
	}

	
	public function setAtproveeRelatedByAtprovee6($v)
	{


		if ($v === null) {
			$this->setAtprovee6(NULL);
		} else {
			$this->setAtprovee6($v->getId());
		}


		$this->aAtproveeRelatedByAtprovee6 = $v;
	}


	
	public function getAtproveeRelatedByAtprovee6($con = null)
	{
		if ($this->aAtproveeRelatedByAtprovee6 === null && ($this->atprovee6 !== null)) {
						include_once 'lib/model/ciudadanos/om/BaseAtproveePeer.php';

      $c = new Criteria();
      $c->add(AtproveePeer::ID,$this->atprovee6);
      
			$this->aAtproveeRelatedByAtprovee6 = AtproveePeer::doSelectOne($c, $con);

			
		}
		return $this->aAtproveeRelatedByAtprovee6;
	}

} 