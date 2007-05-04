<?php


abstract class BaseFcaliinmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcaliinm';

	
	const CLASS_DEFAULT = 'lib.model.Fcaliinm';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCATFIS = 'fcaliinm.CODCATFIS';

	
	const CODUSO = 'fcaliinm.CODUSO';

	
	const ANOVIG = 'fcaliinm.ANOVIG';

	
	const VALORM = 'fcaliinm.VALORM';

	
	const PORVF = 'fcaliinm.PORVF';

	
	const ALITER = 'fcaliinm.ALITER';

	
	const ALICON = 'fcaliinm.ALICON';

	
	const ID = 'fcaliinm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcatfis', 'Coduso', 'Anovig', 'Valorm', 'Porvf', 'Aliter', 'Alicon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcaliinmPeer::CODCATFIS, FcaliinmPeer::CODUSO, FcaliinmPeer::ANOVIG, FcaliinmPeer::VALORM, FcaliinmPeer::PORVF, FcaliinmPeer::ALITER, FcaliinmPeer::ALICON, FcaliinmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcatfis', 'coduso', 'anovig', 'valorm', 'porvf', 'aliter', 'alicon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcatfis' => 0, 'Coduso' => 1, 'Anovig' => 2, 'Valorm' => 3, 'Porvf' => 4, 'Aliter' => 5, 'Alicon' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (FcaliinmPeer::CODCATFIS => 0, FcaliinmPeer::CODUSO => 1, FcaliinmPeer::ANOVIG => 2, FcaliinmPeer::VALORM => 3, FcaliinmPeer::PORVF => 4, FcaliinmPeer::ALITER => 5, FcaliinmPeer::ALICON => 6, FcaliinmPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codcatfis' => 0, 'coduso' => 1, 'anovig' => 2, 'valorm' => 3, 'porvf' => 4, 'aliter' => 5, 'alicon' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcaliinmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcaliinmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcaliinmPeer::getTableMap();
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
		return str_replace(FcaliinmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcaliinmPeer::CODCATFIS);

		$criteria->addSelectColumn(FcaliinmPeer::CODUSO);

		$criteria->addSelectColumn(FcaliinmPeer::ANOVIG);

		$criteria->addSelectColumn(FcaliinmPeer::VALORM);

		$criteria->addSelectColumn(FcaliinmPeer::PORVF);

		$criteria->addSelectColumn(FcaliinmPeer::ALITER);

		$criteria->addSelectColumn(FcaliinmPeer::ALICON);

		$criteria->addSelectColumn(FcaliinmPeer::ID);

	}

	const COUNT = 'COUNT(fcaliinm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcaliinm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcaliinmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcaliinmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcaliinmPeer::doSelectRS($criteria, $con);
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
		$objects = FcaliinmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcaliinmPeer::populateObjects(FcaliinmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcaliinmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcaliinmPeer::getOMClass();
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
		return FcaliinmPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(FcaliinmPeer::ID);
			$selectCriteria->add(FcaliinmPeer::ID, $criteria->remove(FcaliinmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcaliinmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcaliinmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcaliinm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcaliinmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcaliinm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcaliinmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcaliinmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcaliinmPeer::DATABASE_NAME, FcaliinmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcaliinmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcaliinmPeer::DATABASE_NAME);

		$criteria->add(FcaliinmPeer::ID, $pk);


		$v = FcaliinmPeer::doSelect($criteria, $con);

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
			$criteria->add(FcaliinmPeer::ID, $pks, Criteria::IN);
			$objs = FcaliinmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcaliinmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcaliinmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcaliinmMapBuilder');
}
