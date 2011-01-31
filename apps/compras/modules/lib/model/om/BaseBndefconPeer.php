<?php


abstract class BaseBndefconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndefcon';

	
	const CLASS_DEFAULT = 'lib.model.Bndefcon';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODACT = 'bndefcon.CODACT';

	
	const CODMUE = 'bndefcon.CODMUE';

	
	const CTADEPCAR = 'bndefcon.CTADEPCAR';

	
	const CTADEPABO = 'bndefcon.CTADEPABO';

	
	const CTAAJUCAR = 'bndefcon.CTAAJUCAR';

	
	const CTAAJUABO = 'bndefcon.CTAAJUABO';

	
	const CTAREVCAR = 'bndefcon.CTAREVCAR';

	
	const CTAREVABO = 'bndefcon.CTAREVABO';

	
	const STACTA = 'bndefcon.STACTA';

	
	const CTAPERCAR = 'bndefcon.CTAPERCAR';

	
	const CTAPERABO = 'bndefcon.CTAPERABO';

	
	const ID = 'bndefcon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codact', 'Codmue', 'Ctadepcar', 'Ctadepabo', 'Ctaajucar', 'Ctaajuabo', 'Ctarevcar', 'Ctarevabo', 'Stacta', 'Ctapercar', 'Ctaperabo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndefconPeer::CODACT, BndefconPeer::CODMUE, BndefconPeer::CTADEPCAR, BndefconPeer::CTADEPABO, BndefconPeer::CTAAJUCAR, BndefconPeer::CTAAJUABO, BndefconPeer::CTAREVCAR, BndefconPeer::CTAREVABO, BndefconPeer::STACTA, BndefconPeer::CTAPERCAR, BndefconPeer::CTAPERABO, BndefconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codact', 'codmue', 'ctadepcar', 'ctadepabo', 'ctaajucar', 'ctaajuabo', 'ctarevcar', 'ctarevabo', 'stacta', 'ctapercar', 'ctaperabo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codact' => 0, 'Codmue' => 1, 'Ctadepcar' => 2, 'Ctadepabo' => 3, 'Ctaajucar' => 4, 'Ctaajuabo' => 5, 'Ctarevcar' => 6, 'Ctarevabo' => 7, 'Stacta' => 8, 'Ctapercar' => 9, 'Ctaperabo' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (BndefconPeer::CODACT => 0, BndefconPeer::CODMUE => 1, BndefconPeer::CTADEPCAR => 2, BndefconPeer::CTADEPABO => 3, BndefconPeer::CTAAJUCAR => 4, BndefconPeer::CTAAJUABO => 5, BndefconPeer::CTAREVCAR => 6, BndefconPeer::CTAREVABO => 7, BndefconPeer::STACTA => 8, BndefconPeer::CTAPERCAR => 9, BndefconPeer::CTAPERABO => 10, BndefconPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codact' => 0, 'codmue' => 1, 'ctadepcar' => 2, 'ctadepabo' => 3, 'ctaajucar' => 4, 'ctaajuabo' => 5, 'ctarevcar' => 6, 'ctarevabo' => 7, 'stacta' => 8, 'ctapercar' => 9, 'ctaperabo' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndefconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndefconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndefconPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(BndefconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndefconPeer::CODACT);

		$criteria->addSelectColumn(BndefconPeer::CODMUE);

		$criteria->addSelectColumn(BndefconPeer::CTADEPCAR);

		$criteria->addSelectColumn(BndefconPeer::CTADEPABO);

		$criteria->addSelectColumn(BndefconPeer::CTAAJUCAR);

		$criteria->addSelectColumn(BndefconPeer::CTAAJUABO);

		$criteria->addSelectColumn(BndefconPeer::CTAREVCAR);

		$criteria->addSelectColumn(BndefconPeer::CTAREVABO);

		$criteria->addSelectColumn(BndefconPeer::STACTA);

		$criteria->addSelectColumn(BndefconPeer::CTAPERCAR);

		$criteria->addSelectColumn(BndefconPeer::CTAPERABO);

		$criteria->addSelectColumn(BndefconPeer::ID);

	}

	const COUNT = 'COUNT(bndefcon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndefcon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndefconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndefconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndefconPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = BndefconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndefconPeer::populateObjects(BndefconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndefconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndefconPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return BndefconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(BndefconPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(BndefconPeer::ID);
			$selectCriteria->add(BndefconPeer::ID, $criteria->remove(BndefconPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(BndefconPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(BndefconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndefcon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndefconPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Bndefcon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndefconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndefconPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(BndefconPeer::DATABASE_NAME, BndefconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndefconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(BndefconPeer::DATABASE_NAME);

		$criteria->add(BndefconPeer::ID, $pk);


		$v = BndefconPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(BndefconPeer::ID, $pks, Criteria::IN);
			$objs = BndefconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndefconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndefconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndefconMapBuilder');
}
