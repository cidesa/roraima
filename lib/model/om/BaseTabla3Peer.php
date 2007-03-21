<?php


abstract class BaseTabla3Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla3';

	
	const CLASS_DEFAULT = 'lib.model.Tabla3';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCOM = 'tabla3.REFCOM';

	
	const CODPRE = 'tabla3.CODPRE';

	
	const MONIMP = 'tabla3.MONIMP';

	
	const MONCAU = 'tabla3.MONCAU';

	
	const MONPAG = 'tabla3.MONPAG';

	
	const MONAJU = 'tabla3.MONAJU';

	
	const STAIMP = 'tabla3.STAIMP';

	
	const REFERE = 'tabla3.REFERE';

	
	const ID = 'tabla3.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom', 'Codpre', 'Monimp', 'Moncau', 'Monpag', 'Monaju', 'Staimp', 'Refere', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla3Peer::REFCOM, Tabla3Peer::CODPRE, Tabla3Peer::MONIMP, Tabla3Peer::MONCAU, Tabla3Peer::MONPAG, Tabla3Peer::MONAJU, Tabla3Peer::STAIMP, Tabla3Peer::REFERE, Tabla3Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom', 'codpre', 'monimp', 'moncau', 'monpag', 'monaju', 'staimp', 'refere', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcom' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Moncau' => 3, 'Monpag' => 4, 'Monaju' => 5, 'Staimp' => 6, 'Refere' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla3Peer::REFCOM => 0, Tabla3Peer::CODPRE => 1, Tabla3Peer::MONIMP => 2, Tabla3Peer::MONCAU => 3, Tabla3Peer::MONPAG => 4, Tabla3Peer::MONAJU => 5, Tabla3Peer::STAIMP => 6, Tabla3Peer::REFERE => 7, Tabla3Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refcom' => 0, 'codpre' => 1, 'monimp' => 2, 'moncau' => 3, 'monpag' => 4, 'monaju' => 5, 'staimp' => 6, 'refere' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla3MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla3MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla3Peer::getTableMap();
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
		return str_replace(Tabla3Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla3Peer::REFCOM);

		$criteria->addSelectColumn(Tabla3Peer::CODPRE);

		$criteria->addSelectColumn(Tabla3Peer::MONIMP);

		$criteria->addSelectColumn(Tabla3Peer::MONCAU);

		$criteria->addSelectColumn(Tabla3Peer::MONPAG);

		$criteria->addSelectColumn(Tabla3Peer::MONAJU);

		$criteria->addSelectColumn(Tabla3Peer::STAIMP);

		$criteria->addSelectColumn(Tabla3Peer::REFERE);

		$criteria->addSelectColumn(Tabla3Peer::ID);

	}

	const COUNT = 'COUNT(tabla3.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla3.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla3Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla3Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla3Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla3Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla3Peer::populateObjects(Tabla3Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla3Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla3Peer::getOMClass();
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
		return Tabla3Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla3Peer::ID);
			$selectCriteria->add(Tabla3Peer::ID, $criteria->remove(Tabla3Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla3Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla3Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla3) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla3Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla3 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla3Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla3Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla3Peer::DATABASE_NAME, Tabla3Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla3Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla3Peer::DATABASE_NAME);

		$criteria->add(Tabla3Peer::ID, $pk);


		$v = Tabla3Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla3Peer::ID, $pks, Criteria::IN);
			$objs = Tabla3Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla3Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla3MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla3MapBuilder');
}
