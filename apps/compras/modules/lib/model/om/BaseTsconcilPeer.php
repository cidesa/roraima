<?php


abstract class BaseTsconcilPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsconcil';

	
	const CLASS_DEFAULT = 'lib.model.Tsconcil';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tsconcil.NUMCUE';

	
	const MESCON = 'tsconcil.MESCON';

	
	const ANOCON = 'tsconcil.ANOCON';

	
	const REFERE = 'tsconcil.REFERE';

	
	const MOVLIB = 'tsconcil.MOVLIB';

	
	const MOVBAN = 'tsconcil.MOVBAN';

	
	const FECLIB = 'tsconcil.FECLIB';

	
	const FECBAN = 'tsconcil.FECBAN';

	
	const DESREF = 'tsconcil.DESREF';

	
	const MONLIB = 'tsconcil.MONLIB';

	
	const MONBAN = 'tsconcil.MONBAN';

	
	const RESULT = 'tsconcil.RESULT';

	
	const ID = 'tsconcil.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Mescon', 'Anocon', 'Refere', 'Movlib', 'Movban', 'Feclib', 'Fecban', 'Desref', 'Monlib', 'Monban', 'Result', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsconcilPeer::NUMCUE, TsconcilPeer::MESCON, TsconcilPeer::ANOCON, TsconcilPeer::REFERE, TsconcilPeer::MOVLIB, TsconcilPeer::MOVBAN, TsconcilPeer::FECLIB, TsconcilPeer::FECBAN, TsconcilPeer::DESREF, TsconcilPeer::MONLIB, TsconcilPeer::MONBAN, TsconcilPeer::RESULT, TsconcilPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'mescon', 'anocon', 'refere', 'movlib', 'movban', 'feclib', 'fecban', 'desref', 'monlib', 'monban', 'result', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Mescon' => 1, 'Anocon' => 2, 'Refere' => 3, 'Movlib' => 4, 'Movban' => 5, 'Feclib' => 6, 'Fecban' => 7, 'Desref' => 8, 'Monlib' => 9, 'Monban' => 10, 'Result' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (TsconcilPeer::NUMCUE => 0, TsconcilPeer::MESCON => 1, TsconcilPeer::ANOCON => 2, TsconcilPeer::REFERE => 3, TsconcilPeer::MOVLIB => 4, TsconcilPeer::MOVBAN => 5, TsconcilPeer::FECLIB => 6, TsconcilPeer::FECBAN => 7, TsconcilPeer::DESREF => 8, TsconcilPeer::MONLIB => 9, TsconcilPeer::MONBAN => 10, TsconcilPeer::RESULT => 11, TsconcilPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'mescon' => 1, 'anocon' => 2, 'refere' => 3, 'movlib' => 4, 'movban' => 5, 'feclib' => 6, 'fecban' => 7, 'desref' => 8, 'monlib' => 9, 'monban' => 10, 'result' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsconcilMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsconcilMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsconcilPeer::getTableMap();
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
		return str_replace(TsconcilPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsconcilPeer::NUMCUE);

		$criteria->addSelectColumn(TsconcilPeer::MESCON);

		$criteria->addSelectColumn(TsconcilPeer::ANOCON);

		$criteria->addSelectColumn(TsconcilPeer::REFERE);

		$criteria->addSelectColumn(TsconcilPeer::MOVLIB);

		$criteria->addSelectColumn(TsconcilPeer::MOVBAN);

		$criteria->addSelectColumn(TsconcilPeer::FECLIB);

		$criteria->addSelectColumn(TsconcilPeer::FECBAN);

		$criteria->addSelectColumn(TsconcilPeer::DESREF);

		$criteria->addSelectColumn(TsconcilPeer::MONLIB);

		$criteria->addSelectColumn(TsconcilPeer::MONBAN);

		$criteria->addSelectColumn(TsconcilPeer::RESULT);

		$criteria->addSelectColumn(TsconcilPeer::ID);

	}

	const COUNT = 'COUNT(tsconcil.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsconcil.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsconcilPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsconcilPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsconcilPeer::doSelectRS($criteria, $con);
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
		$objects = TsconcilPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsconcilPeer::populateObjects(TsconcilPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsconcilPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsconcilPeer::getOMClass();
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
		return TsconcilPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsconcilPeer::ID); 

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
			$comparison = $criteria->getComparison(TsconcilPeer::ID);
			$selectCriteria->add(TsconcilPeer::ID, $criteria->remove(TsconcilPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsconcilPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsconcilPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsconcil) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsconcilPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsconcil $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsconcilPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsconcilPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsconcilPeer::DATABASE_NAME, TsconcilPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsconcilPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsconcilPeer::DATABASE_NAME);

		$criteria->add(TsconcilPeer::ID, $pk);


		$v = TsconcilPeer::doSelect($criteria, $con);

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
			$criteria->add(TsconcilPeer::ID, $pks, Criteria::IN);
			$objs = TsconcilPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsconcilPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsconcilMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsconcilMapBuilder');
}
