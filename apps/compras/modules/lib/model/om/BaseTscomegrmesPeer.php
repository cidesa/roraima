<?php


abstract class BaseTscomegrmesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tscomegrmes';

	
	const CLASS_DEFAULT = 'lib.model.Tscomegrmes';

	
	const NUM_COLUMNS = 25;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MES1 = 'tscomegrmes.MES1';

	
	const CORMES1 = 'tscomegrmes.CORMES1';

	
	const MES2 = 'tscomegrmes.MES2';

	
	const CORMES2 = 'tscomegrmes.CORMES2';

	
	const MES3 = 'tscomegrmes.MES3';

	
	const CORMES3 = 'tscomegrmes.CORMES3';

	
	const MES4 = 'tscomegrmes.MES4';

	
	const CORMES4 = 'tscomegrmes.CORMES4';

	
	const MES5 = 'tscomegrmes.MES5';

	
	const CORMES5 = 'tscomegrmes.CORMES5';

	
	const MES6 = 'tscomegrmes.MES6';

	
	const CORMES6 = 'tscomegrmes.CORMES6';

	
	const MES7 = 'tscomegrmes.MES7';

	
	const CORMES7 = 'tscomegrmes.CORMES7';

	
	const MES8 = 'tscomegrmes.MES8';

	
	const CORMES8 = 'tscomegrmes.CORMES8';

	
	const MES9 = 'tscomegrmes.MES9';

	
	const CORMES9 = 'tscomegrmes.CORMES9';

	
	const MES10 = 'tscomegrmes.MES10';

	
	const CORMES10 = 'tscomegrmes.CORMES10';

	
	const MES11 = 'tscomegrmes.MES11';

	
	const CORMES11 = 'tscomegrmes.CORMES11';

	
	const MES12 = 'tscomegrmes.MES12';

	
	const CORMES12 = 'tscomegrmes.CORMES12';

	
	const ID = 'tscomegrmes.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Mes1', 'Cormes1', 'Mes2', 'Cormes2', 'Mes3', 'Cormes3', 'Mes4', 'Cormes4', 'Mes5', 'Cormes5', 'Mes6', 'Cormes6', 'Mes7', 'Cormes7', 'Mes8', 'Cormes8', 'Mes9', 'Cormes9', 'Mes10', 'Cormes10', 'Mes11', 'Cormes11', 'Mes12', 'Cormes12', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TscomegrmesPeer::MES1, TscomegrmesPeer::CORMES1, TscomegrmesPeer::MES2, TscomegrmesPeer::CORMES2, TscomegrmesPeer::MES3, TscomegrmesPeer::CORMES3, TscomegrmesPeer::MES4, TscomegrmesPeer::CORMES4, TscomegrmesPeer::MES5, TscomegrmesPeer::CORMES5, TscomegrmesPeer::MES6, TscomegrmesPeer::CORMES6, TscomegrmesPeer::MES7, TscomegrmesPeer::CORMES7, TscomegrmesPeer::MES8, TscomegrmesPeer::CORMES8, TscomegrmesPeer::MES9, TscomegrmesPeer::CORMES9, TscomegrmesPeer::MES10, TscomegrmesPeer::CORMES10, TscomegrmesPeer::MES11, TscomegrmesPeer::CORMES11, TscomegrmesPeer::MES12, TscomegrmesPeer::CORMES12, TscomegrmesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('mes1', 'cormes1', 'mes2', 'cormes2', 'mes3', 'cormes3', 'mes4', 'cormes4', 'mes5', 'cormes5', 'mes6', 'cormes6', 'mes7', 'cormes7', 'mes8', 'cormes8', 'mes9', 'cormes9', 'mes10', 'cormes10', 'mes11', 'cormes11', 'mes12', 'cormes12', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Mes1' => 0, 'Cormes1' => 1, 'Mes2' => 2, 'Cormes2' => 3, 'Mes3' => 4, 'Cormes3' => 5, 'Mes4' => 6, 'Cormes4' => 7, 'Mes5' => 8, 'Cormes5' => 9, 'Mes6' => 10, 'Cormes6' => 11, 'Mes7' => 12, 'Cormes7' => 13, 'Mes8' => 14, 'Cormes8' => 15, 'Mes9' => 16, 'Cormes9' => 17, 'Mes10' => 18, 'Cormes10' => 19, 'Mes11' => 20, 'Cormes11' => 21, 'Mes12' => 22, 'Cormes12' => 23, 'Id' => 24, ),
		BasePeer::TYPE_COLNAME => array (TscomegrmesPeer::MES1 => 0, TscomegrmesPeer::CORMES1 => 1, TscomegrmesPeer::MES2 => 2, TscomegrmesPeer::CORMES2 => 3, TscomegrmesPeer::MES3 => 4, TscomegrmesPeer::CORMES3 => 5, TscomegrmesPeer::MES4 => 6, TscomegrmesPeer::CORMES4 => 7, TscomegrmesPeer::MES5 => 8, TscomegrmesPeer::CORMES5 => 9, TscomegrmesPeer::MES6 => 10, TscomegrmesPeer::CORMES6 => 11, TscomegrmesPeer::MES7 => 12, TscomegrmesPeer::CORMES7 => 13, TscomegrmesPeer::MES8 => 14, TscomegrmesPeer::CORMES8 => 15, TscomegrmesPeer::MES9 => 16, TscomegrmesPeer::CORMES9 => 17, TscomegrmesPeer::MES10 => 18, TscomegrmesPeer::CORMES10 => 19, TscomegrmesPeer::MES11 => 20, TscomegrmesPeer::CORMES11 => 21, TscomegrmesPeer::MES12 => 22, TscomegrmesPeer::CORMES12 => 23, TscomegrmesPeer::ID => 24, ),
		BasePeer::TYPE_FIELDNAME => array ('mes1' => 0, 'cormes1' => 1, 'mes2' => 2, 'cormes2' => 3, 'mes3' => 4, 'cormes3' => 5, 'mes4' => 6, 'cormes4' => 7, 'mes5' => 8, 'cormes5' => 9, 'mes6' => 10, 'cormes6' => 11, 'mes7' => 12, 'cormes7' => 13, 'mes8' => 14, 'cormes8' => 15, 'mes9' => 16, 'cormes9' => 17, 'mes10' => 18, 'cormes10' => 19, 'mes11' => 20, 'cormes11' => 21, 'mes12' => 22, 'cormes12' => 23, 'id' => 24, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TscomegrmesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TscomegrmesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TscomegrmesPeer::getTableMap();
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
		return str_replace(TscomegrmesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TscomegrmesPeer::MES1);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES1);

		$criteria->addSelectColumn(TscomegrmesPeer::MES2);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES2);

		$criteria->addSelectColumn(TscomegrmesPeer::MES3);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES3);

		$criteria->addSelectColumn(TscomegrmesPeer::MES4);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES4);

		$criteria->addSelectColumn(TscomegrmesPeer::MES5);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES5);

		$criteria->addSelectColumn(TscomegrmesPeer::MES6);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES6);

		$criteria->addSelectColumn(TscomegrmesPeer::MES7);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES7);

		$criteria->addSelectColumn(TscomegrmesPeer::MES8);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES8);

		$criteria->addSelectColumn(TscomegrmesPeer::MES9);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES9);

		$criteria->addSelectColumn(TscomegrmesPeer::MES10);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES10);

		$criteria->addSelectColumn(TscomegrmesPeer::MES11);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES11);

		$criteria->addSelectColumn(TscomegrmesPeer::MES12);

		$criteria->addSelectColumn(TscomegrmesPeer::CORMES12);

		$criteria->addSelectColumn(TscomegrmesPeer::ID);

	}

	const COUNT = 'COUNT(tscomegrmes.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tscomegrmes.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TscomegrmesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TscomegrmesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TscomegrmesPeer::doSelectRS($criteria, $con);
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
		$objects = TscomegrmesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TscomegrmesPeer::populateObjects(TscomegrmesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TscomegrmesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TscomegrmesPeer::getOMClass();
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
		return TscomegrmesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TscomegrmesPeer::ID); 

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
			$comparison = $criteria->getComparison(TscomegrmesPeer::ID);
			$selectCriteria->add(TscomegrmesPeer::ID, $criteria->remove(TscomegrmesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TscomegrmesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TscomegrmesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tscomegrmes) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TscomegrmesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tscomegrmes $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TscomegrmesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TscomegrmesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TscomegrmesPeer::DATABASE_NAME, TscomegrmesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TscomegrmesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TscomegrmesPeer::DATABASE_NAME);

		$criteria->add(TscomegrmesPeer::ID, $pk);


		$v = TscomegrmesPeer::doSelect($criteria, $con);

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
			$criteria->add(TscomegrmesPeer::ID, $pks, Criteria::IN);
			$objs = TscomegrmesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTscomegrmesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TscomegrmesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TscomegrmesMapBuilder');
}
