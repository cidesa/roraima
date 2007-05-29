<?php


abstract class BaseItems extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $amount;


	
	protected $price;


	
	protected $comments;


	
	protected $status;


	
	protected $order_id;


	
	protected $product_id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id; 		
	}
	
	public function getAmount()
	{

		return number_format($this->amount,2,',','.');
		
	}
	
	public function getPrice()
	{

		return number_format($this->price,2,',','.');
		
	}
	
	public function getComments()
	{

		return $this->comments; 		
	}
	
	public function getStatus()
	{

		return $this->status; 		
	}
	
	public function getOrderId()
	{

		return number_format($this->order_id,2,',','.');
		
	}
	
	public function getProductId()
	{

		return number_format($this->product_id,2,',','.');
		
	}
	
	public function setId($v)
	{

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ItemsPeer::ID;
		}

	} 
	
	public function setAmount($v)
	{

		if ($this->amount !== $v) {
			$this->amount = $v;
			$this->modifiedColumns[] = ItemsPeer::AMOUNT;
		}

	} 
	
	public function setPrice($v)
	{

		if ($this->price !== $v) {
			$this->price = $v;
			$this->modifiedColumns[] = ItemsPeer::PRICE;
		}

	} 
	
	public function setComments($v)
	{

		if ($this->comments !== $v) {
			$this->comments = $v;
			$this->modifiedColumns[] = ItemsPeer::COMMENTS;
		}

	} 
	
	public function setStatus($v)
	{

		if ($this->status !== $v) {
			$this->status = $v;
			$this->modifiedColumns[] = ItemsPeer::STATUS;
		}

	} 
	
	public function setOrderId($v)
	{

		if ($this->order_id !== $v) {
			$this->order_id = $v;
			$this->modifiedColumns[] = ItemsPeer::ORDER_ID;
		}

	} 
	
	public function setProductId($v)
	{

		if ($this->product_id !== $v) {
			$this->product_id = $v;
			$this->modifiedColumns[] = ItemsPeer::PRODUCT_ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->amount = $rs->getFloat($startcol + 1);

			$this->price = $rs->getFloat($startcol + 2);

			$this->comments = $rs->getString($startcol + 3);

			$this->status = $rs->getString($startcol + 4);

			$this->order_id = $rs->getFloat($startcol + 5);

			$this->product_id = $rs->getFloat($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Items object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ItemsPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ItemsPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ItemsPeer::DATABASE_NAME);
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
					$pk = ItemsPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += ItemsPeer::doUpdate($this, $con);
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


			if (($retval = ItemsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ItemsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getAmount();
				break;
			case 2:
				return $this->getPrice();
				break;
			case 3:
				return $this->getComments();
				break;
			case 4:
				return $this->getStatus();
				break;
			case 5:
				return $this->getOrderId();
				break;
			case 6:
				return $this->getProductId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAmount(),
			$keys[2] => $this->getPrice(),
			$keys[3] => $this->getComments(),
			$keys[4] => $this->getStatus(),
			$keys[5] => $this->getOrderId(),
			$keys[6] => $this->getProductId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ItemsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setAmount($value);
				break;
			case 2:
				$this->setPrice($value);
				break;
			case 3:
				$this->setComments($value);
				break;
			case 4:
				$this->setStatus($value);
				break;
			case 5:
				$this->setOrderId($value);
				break;
			case 6:
				$this->setProductId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ItemsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAmount($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrice($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComments($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setStatus($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrderId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setProductId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ItemsPeer::DATABASE_NAME);

		if ($this->isColumnModified(ItemsPeer::ID)) $criteria->add(ItemsPeer::ID, $this->id);
		if ($this->isColumnModified(ItemsPeer::AMOUNT)) $criteria->add(ItemsPeer::AMOUNT, $this->amount);
		if ($this->isColumnModified(ItemsPeer::PRICE)) $criteria->add(ItemsPeer::PRICE, $this->price);
		if ($this->isColumnModified(ItemsPeer::COMMENTS)) $criteria->add(ItemsPeer::COMMENTS, $this->comments);
		if ($this->isColumnModified(ItemsPeer::STATUS)) $criteria->add(ItemsPeer::STATUS, $this->status);
		if ($this->isColumnModified(ItemsPeer::ORDER_ID)) $criteria->add(ItemsPeer::ORDER_ID, $this->order_id);
		if ($this->isColumnModified(ItemsPeer::PRODUCT_ID)) $criteria->add(ItemsPeer::PRODUCT_ID, $this->product_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ItemsPeer::DATABASE_NAME);

		$criteria->add(ItemsPeer::ID, $this->id);

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

		$copyObj->setAmount($this->amount);

		$copyObj->setPrice($this->price);

		$copyObj->setComments($this->comments);

		$copyObj->setStatus($this->status);

		$copyObj->setOrderId($this->order_id);

		$copyObj->setProductId($this->product_id);


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
			self::$peer = new ItemsPeer();
		}
		return self::$peer;
	}

} 