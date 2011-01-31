<?php


abstract class BaseTscormestxtPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tscormestxt';

	
	const CLASS_DEFAULT = 'lib.model.Tscormestxt';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tscormestxt.NUMCUE';

	
	const MES1 = 'tscormestxt.MES1';

	
	const CORMES1 = 'tscormestxt.CORMES1';

	
	const MES2 = 'tscormestxt.MES2';

	
	const CORMES2 = 'tscormestxt.CORMES2';

	
	const MES3 = 'tscormestxt.MES3';

	
	const CORMES3 = 'tscormestxt.CORMES3';

	
	const MES4 = 'tscormestxt.MES4';

	
	const CORMES4 = 'tscormestxt.CORMES4';

	
	const MES5 = 'tscormestxt.MES5';

	
	const CORMES5 = 'tscormestxt.CORMES5';

	
	const MES6 = 'tscormestxt.MES6';

	
	const CORMES6 = 'tscormestxt.CORMES6';

	
	const MES7 = 'tscormestxt.MES7';

	
	const CORMES7 = 'tscormestxt.CORMES7';

	
	const MES8 = 'tscormestxt.MES8';

	
	const CORMES8 = 'tscormestxt.CORMES8';

	
	const MES9 = 'tscormestxt.MES9';

	
	const CORMES9 = 'tscormestxt.CORMES9';

	
	const MES10 = 'tscormestxt.MES10';

	
	const CORMES10 = 'tscormestxt.CORMES10';

	
	const MES11 = 'tscormestxt.MES11';

	
	const CORMES11 = 'tscormestxt.CORMES11';

	
	const MES12 = 'tscormestxt.MES12';

	
	const CORMES12 = 'tscormestxt.CORMES12';

	
	const ID = 'tscormestxt.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Mes1', 'Cormes1', 'Mes2', 'Cormes2', 'Mes3', 'Cormes3', 'Mes4', 'Cormes4', 'Mes5', 'Cormes5', 'Mes6', 'Cormes6', 'Mes7', 'Cormes7', 'Mes8', 'Cormes8', 'Mes9', 'Cormes9', 'Mes10', 'Cormes10', 'Mes11', 'Cormes11', 'Mes12', 'Cormes12', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TscormestxtPeer::NUMCUE, TscormestxtPeer::MES1, TscormestxtPeer::CORMES1, TscormestxtPeer::MES2, TscormestxtPeer::CORMES2, TscormestxtPeer::MES3, TscormestxtPeer::CORMES3, TscormestxtPeer::MES4, TscormestxtPeer::CORMES4, TscormestxtPeer::MES5, TscormestxtPeer::CORMES5, TscormestxtPeer::MES6, TscormestxtPeer::CORMES6, TscormestxtPeer::MES7, TscormestxtPeer::CORMES7, TscormestxtPeer::MES8, TscormestxtPeer::CORMES8, TscormestxtPeer::MES9, TscormestxtPeer::CORMES9, TscormestxtPeer::MES10, TscormestxtPeer::CORMES10, TscormestxtPeer::MES11, TscormestxtPeer::CORMES11, TscormestxtPeer::MES12, TscormestxtPeer::CORMES12, TscormestxtPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'mes1', 'cormes1', 'mes2', 'cormes2', 'mes3', 'cormes3', 'mes4', 'cormes4', 'mes5', 'cormes5', 'mes6', 'cormes6', 'mes7', 'cormes7', 'mes8', 'cormes8', 'mes9', 'cormes9', 'mes10', 'cormes10', 'mes11', 'cormes11', 'mes12', 'cormes12', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Mes1' => 1, 'Cormes1' => 2, 'Mes2' => 3, 'Cormes2' => 4, 'Mes3' => 5, 'Cormes3' => 6, 'Mes4' => 7, 'Cormes4' => 8, 'Mes5' => 9, 'Cormes5' => 10, 'Mes6' => 11, 'Cormes6' => 12, 'Mes7' => 13, 'Cormes7' => 14, 'Mes8' => 15, 'Cormes8' => 16, 'Mes9' => 17, 'Cormes9' => 18, 'Mes10' => 19, 'Cormes10' => 20, 'Mes11' => 21, 'Cormes11' => 22, 'Mes12' => 23, 'Cormes12' => 24, 'Id' => 25, ),
		BasePeer::TYPE_COLNAME => array (TscormestxtPeer::NUMCUE => 0, TscormestxtPeer::MES1 => 1, TscormestxtPeer::CORMES1 => 2, TscormestxtPeer::MES2 => 3, TscormestxtPeer::CORMES2 => 4, TscormestxtPeer::MES3 => 5, TscormestxtPeer::CORMES3 => 6, TscormestxtPeer::MES4 => 7, TscormestxtPeer::CORMES4 => 8, TscormestxtPeer::MES5 => 9, TscormestxtPeer::CORMES5 => 10, TscormestxtPeer::MES6 => 11, TscormestxtPeer::CORMES6 => 12, TscormestxtPeer::MES7 => 13, TscormestxtPeer::CORMES7 => 14, TscormestxtPeer::MES8 => 15, TscormestxtPeer::CORMES8 => 16, TscormestxtPeer::MES9 => 17, TscormestxtPeer::CORMES9 => 18, TscormestxtPeer::MES10 => 19, TscormestxtPeer::CORMES10 => 20, TscormestxtPeer::MES11 => 21, TscormestxtPeer::CORMES11 => 22, TscormestxtPeer::MES12 => 23, TscormestxtPeer::CORMES12 => 24, TscormestxtPeer::ID => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'mes1' => 1, 'cormes1' => 2, 'mes2' => 3, 'cormes2' => 4, 'mes3' => 5, 'cormes3' => 6, 'mes4' => 7, 'cormes4' => 8, 'mes5' => 9, 'cormes5' => 10, 'mes6' => 11, 'cormes6' => 12, 'mes7' => 13, 'cormes7' => 14, 'mes8' => 15, 'cormes8' => 16, 'mes9' => 17, 'cormes9' => 18, 'mes10' => 19, 'cormes10' => 20, 'mes11' => 21, 'cormes11' => 22, 'mes12' => 23, 'cormes12' => 24, 'id' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TscormestxtMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TscormestxtMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TscormestxtPeer::getTableMap();
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
		return str_replace(TscormestxtPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TscormestxtPeer::NUMCUE);

		$criteria->addSelectColumn(TscormestxtPeer::MES1);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES1);

		$criteria->addSelectColumn(TscormestxtPeer::MES2);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES2);

		$criteria->addSelectColumn(TscormestxtPeer::MES3);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES3);

		$criteria->addSelectColumn(TscormestxtPeer::MES4);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES4);

		$criteria->addSelectColumn(TscormestxtPeer::MES5);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES5);

		$criteria->addSelectColumn(TscormestxtPeer::MES6);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES6);

		$criteria->addSelectColumn(TscormestxtPeer::MES7);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES7);

		$criteria->addSelectColumn(TscormestxtPeer::MES8);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES8);

		$criteria->addSelectColumn(TscormestxtPeer::MES9);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES9);

		$criteria->addSelectColumn(TscormestxtPeer::MES10);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES10);

		$criteria->addSelectColumn(TscormestxtPeer::MES11);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES11);

		$criteria->addSelectColumn(TscormestxtPeer::MES12);

		$criteria->addSelectColumn(TscormestxtPeer::CORMES12);

		$criteria->addSelectColumn(TscormestxtPeer::ID);

	}

	const COUNT = 'COUNT(tscormestxt.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tscormestxt.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TscormestxtPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TscormestxtPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TscormestxtPeer::doSelectRS($criteria, $con);
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
		$objects = TscormestxtPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TscormestxtPeer::populateObjects(TscormestxtPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TscormestxtPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TscormestxtPeer::getOMClass();
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
		return TscormestxtPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TscormestxtPeer::ID); 

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
			$comparison = $criteria->getComparison(TscormestxtPeer::ID);
			$selectCriteria->add(TscormestxtPeer::ID, $criteria->remove(TscormestxtPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TscormestxtPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TscormestxtPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tscormestxt) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TscormestxtPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tscormestxt $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TscormestxtPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TscormestxtPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TscormestxtPeer::DATABASE_NAME, TscormestxtPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TscormestxtPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TscormestxtPeer::DATABASE_NAME);

		$criteria->add(TscormestxtPeer::ID, $pk);


		$v = TscormestxtPeer::doSelect($criteria, $con);

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
			$criteria->add(TscormestxtPeer::ID, $pks, Criteria::IN);
			$objs = TscormestxtPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTscormestxtPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TscormestxtMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TscormestxtMapBuilder');
}
