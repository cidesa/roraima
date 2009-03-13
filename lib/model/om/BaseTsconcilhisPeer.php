<?php


abstract class BaseTsconcilhisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsconcilhis';

	
	const CLASS_DEFAULT = 'lib.model.Tsconcilhis';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tsconcilhis.NUMCUE';

	
	const MESCON = 'tsconcilhis.MESCON';

	
	const ANOCON = 'tsconcilhis.ANOCON';

	
	const REFERE = 'tsconcilhis.REFERE';

	
	const MOVLIB = 'tsconcilhis.MOVLIB';

	
	const MOVBAN = 'tsconcilhis.MOVBAN';

	
	const FECLIB = 'tsconcilhis.FECLIB';

	
	const FECBAN = 'tsconcilhis.FECBAN';

	
	const DESREF = 'tsconcilhis.DESREF';

	
	const MONLIB = 'tsconcilhis.MONLIB';

	
	const MONBAN = 'tsconcilhis.MONBAN';

	
	const RESULT = 'tsconcilhis.RESULT';

	
	const ID = 'tsconcilhis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Mescon', 'Anocon', 'Refere', 'Movlib', 'Movban', 'Feclib', 'Fecban', 'Desref', 'Monlib', 'Monban', 'Result', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsconcilhisPeer::NUMCUE, TsconcilhisPeer::MESCON, TsconcilhisPeer::ANOCON, TsconcilhisPeer::REFERE, TsconcilhisPeer::MOVLIB, TsconcilhisPeer::MOVBAN, TsconcilhisPeer::FECLIB, TsconcilhisPeer::FECBAN, TsconcilhisPeer::DESREF, TsconcilhisPeer::MONLIB, TsconcilhisPeer::MONBAN, TsconcilhisPeer::RESULT, TsconcilhisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'mescon', 'anocon', 'refere', 'movlib', 'movban', 'feclib', 'fecban', 'desref', 'monlib', 'monban', 'result', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Mescon' => 1, 'Anocon' => 2, 'Refere' => 3, 'Movlib' => 4, 'Movban' => 5, 'Feclib' => 6, 'Fecban' => 7, 'Desref' => 8, 'Monlib' => 9, 'Monban' => 10, 'Result' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (TsconcilhisPeer::NUMCUE => 0, TsconcilhisPeer::MESCON => 1, TsconcilhisPeer::ANOCON => 2, TsconcilhisPeer::REFERE => 3, TsconcilhisPeer::MOVLIB => 4, TsconcilhisPeer::MOVBAN => 5, TsconcilhisPeer::FECLIB => 6, TsconcilhisPeer::FECBAN => 7, TsconcilhisPeer::DESREF => 8, TsconcilhisPeer::MONLIB => 9, TsconcilhisPeer::MONBAN => 10, TsconcilhisPeer::RESULT => 11, TsconcilhisPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'mescon' => 1, 'anocon' => 2, 'refere' => 3, 'movlib' => 4, 'movban' => 5, 'feclib' => 6, 'fecban' => 7, 'desref' => 8, 'monlib' => 9, 'monban' => 10, 'result' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsconcilhisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsconcilhisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsconcilhisPeer::getTableMap();
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
		return str_replace(TsconcilhisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsconcilhisPeer::NUMCUE);

		$criteria->addSelectColumn(TsconcilhisPeer::MESCON);

		$criteria->addSelectColumn(TsconcilhisPeer::ANOCON);

		$criteria->addSelectColumn(TsconcilhisPeer::REFERE);

		$criteria->addSelectColumn(TsconcilhisPeer::MOVLIB);

		$criteria->addSelectColumn(TsconcilhisPeer::MOVBAN);

		$criteria->addSelectColumn(TsconcilhisPeer::FECLIB);

		$criteria->addSelectColumn(TsconcilhisPeer::FECBAN);

		$criteria->addSelectColumn(TsconcilhisPeer::DESREF);

		$criteria->addSelectColumn(TsconcilhisPeer::MONLIB);

		$criteria->addSelectColumn(TsconcilhisPeer::MONBAN);

		$criteria->addSelectColumn(TsconcilhisPeer::RESULT);

		$criteria->addSelectColumn(TsconcilhisPeer::ID);

	}

	const COUNT = 'COUNT(tsconcilhis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsconcilhis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsconcilhisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsconcilhisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsconcilhisPeer::doSelectRS($criteria, $con);
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
		$objects = TsconcilhisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsconcilhisPeer::populateObjects(TsconcilhisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsconcilhisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsconcilhisPeer::getOMClass();
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
		return TsconcilhisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsconcilhisPeer::ID); 

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
			$comparison = $criteria->getComparison(TsconcilhisPeer::ID);
			$selectCriteria->add(TsconcilhisPeer::ID, $criteria->remove(TsconcilhisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsconcilhisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsconcilhisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsconcilhis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsconcilhisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsconcilhis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsconcilhisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsconcilhisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsconcilhisPeer::DATABASE_NAME, TsconcilhisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsconcilhisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsconcilhisPeer::DATABASE_NAME);

		$criteria->add(TsconcilhisPeer::ID, $pk);


		$v = TsconcilhisPeer::doSelect($criteria, $con);

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
			$criteria->add(TsconcilhisPeer::ID, $pks, Criteria::IN);
			$objs = TsconcilhisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsconcilhisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsconcilhisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsconcilhisMapBuilder');
}
