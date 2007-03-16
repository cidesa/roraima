<?php


abstract class BaseBndisbiePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'bndisbie';

	
	const CLASS_DEFAULT = 'lib.model.Bndisbie';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODDIS = 'bndisbie.CODDIS';

	
	const DESDIS = 'bndisbie.DESDIS';

	
	const AFECON = 'bndisbie.AFECON';

	
	const STADIS = 'bndisbie.STADIS';

	
	const DESINC = 'bndisbie.DESINC';

	
	const ADIMEJ = 'bndisbie.ADIMEJ';

	
	const VIDUTI = 'bndisbie.VIDUTI';

	
	const ID = 'bndisbie.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Coddis', 'Desdis', 'Afecon', 'Stadis', 'Desinc', 'Adimej', 'Viduti', 'Id', ),
		BasePeer::TYPE_COLNAME => array (BndisbiePeer::CODDIS, BndisbiePeer::DESDIS, BndisbiePeer::AFECON, BndisbiePeer::STADIS, BndisbiePeer::DESINC, BndisbiePeer::ADIMEJ, BndisbiePeer::VIDUTI, BndisbiePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('coddis', 'desdis', 'afecon', 'stadis', 'desinc', 'adimej', 'viduti', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Coddis' => 0, 'Desdis' => 1, 'Afecon' => 2, 'Stadis' => 3, 'Desinc' => 4, 'Adimej' => 5, 'Viduti' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (BndisbiePeer::CODDIS => 0, BndisbiePeer::DESDIS => 1, BndisbiePeer::AFECON => 2, BndisbiePeer::STADIS => 3, BndisbiePeer::DESINC => 4, BndisbiePeer::ADIMEJ => 5, BndisbiePeer::VIDUTI => 6, BndisbiePeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('coddis' => 0, 'desdis' => 1, 'afecon' => 2, 'stadis' => 3, 'desinc' => 4, 'adimej' => 5, 'viduti' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/BndisbieMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.BndisbieMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = BndisbiePeer::getTableMap();
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
		return str_replace(BndisbiePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(BndisbiePeer::CODDIS);

		$criteria->addSelectColumn(BndisbiePeer::DESDIS);

		$criteria->addSelectColumn(BndisbiePeer::AFECON);

		$criteria->addSelectColumn(BndisbiePeer::STADIS);

		$criteria->addSelectColumn(BndisbiePeer::DESINC);

		$criteria->addSelectColumn(BndisbiePeer::ADIMEJ);

		$criteria->addSelectColumn(BndisbiePeer::VIDUTI);

		$criteria->addSelectColumn(BndisbiePeer::ID);

	}

	const COUNT = 'COUNT(bndisbie.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT bndisbie.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(BndisbiePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(BndisbiePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = BndisbiePeer::doSelectRS($criteria, $con);
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
		$objects = BndisbiePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return BndisbiePeer::populateObjects(BndisbiePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			BndisbiePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = BndisbiePeer::getOMClass();
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
		return BndisbiePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(BndisbiePeer::ID);
			$selectCriteria->add(BndisbiePeer::ID, $criteria->remove(BndisbiePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(BndisbiePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(BndisbiePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Bndisbie) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(BndisbiePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Bndisbie $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(BndisbiePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(BndisbiePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(BndisbiePeer::DATABASE_NAME, BndisbiePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = BndisbiePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(BndisbiePeer::DATABASE_NAME);

		$criteria->add(BndisbiePeer::ID, $pk);


		$v = BndisbiePeer::doSelect($criteria, $con);

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
			$criteria->add(BndisbiePeer::ID, $pks, Criteria::IN);
			$objs = BndisbiePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseBndisbiePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/BndisbieMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.BndisbieMapBuilder');
}
