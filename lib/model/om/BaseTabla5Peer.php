<?php


abstract class BaseTabla5Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla5';

	
	const CLASS_DEFAULT = 'lib.model.Tabla5';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPAG = 'tabla5.REFPAG';

	
	const CODPRE = 'tabla5.CODPRE';

	
	const MONIMP = 'tabla5.MONIMP';

	
	const MONAJU = 'tabla5.MONAJU';

	
	const STAIMP = 'tabla5.STAIMP';

	
	const REFERE = 'tabla5.REFERE';

	
	const REFPRC = 'tabla5.REFPRC';

	
	const REFCOM = 'tabla5.REFCOM';

	
	const ID = 'tabla5.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag', 'Codpre', 'Monimp', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla5Peer::REFPAG, Tabla5Peer::CODPRE, Tabla5Peer::MONIMP, Tabla5Peer::MONAJU, Tabla5Peer::STAIMP, Tabla5Peer::REFERE, Tabla5Peer::REFPRC, Tabla5Peer::REFCOM, Tabla5Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag', 'codpre', 'monimp', 'monaju', 'staimp', 'refere', 'refprc', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monaju' => 3, 'Staimp' => 4, 'Refere' => 5, 'Refprc' => 6, 'Refcom' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla5Peer::REFPAG => 0, Tabla5Peer::CODPRE => 1, Tabla5Peer::MONIMP => 2, Tabla5Peer::MONAJU => 3, Tabla5Peer::STAIMP => 4, Tabla5Peer::REFERE => 5, Tabla5Peer::REFPRC => 6, Tabla5Peer::REFCOM => 7, Tabla5Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag' => 0, 'codpre' => 1, 'monimp' => 2, 'monaju' => 3, 'staimp' => 4, 'refere' => 5, 'refprc' => 6, 'refcom' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla5MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla5MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla5Peer::getTableMap();
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
		return str_replace(Tabla5Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla5Peer::REFPAG);

		$criteria->addSelectColumn(Tabla5Peer::CODPRE);

		$criteria->addSelectColumn(Tabla5Peer::MONIMP);

		$criteria->addSelectColumn(Tabla5Peer::MONAJU);

		$criteria->addSelectColumn(Tabla5Peer::STAIMP);

		$criteria->addSelectColumn(Tabla5Peer::REFERE);

		$criteria->addSelectColumn(Tabla5Peer::REFPRC);

		$criteria->addSelectColumn(Tabla5Peer::REFCOM);

		$criteria->addSelectColumn(Tabla5Peer::ID);

	}

	const COUNT = 'COUNT(tabla5.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla5.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla5Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla5Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla5Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla5Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla5Peer::populateObjects(Tabla5Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla5Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla5Peer::getOMClass();
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
		return Tabla5Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla5Peer::ID);
			$selectCriteria->add(Tabla5Peer::ID, $criteria->remove(Tabla5Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla5Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla5Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla5) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla5Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla5 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla5Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla5Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla5Peer::DATABASE_NAME, Tabla5Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla5Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla5Peer::DATABASE_NAME);

		$criteria->add(Tabla5Peer::ID, $pk);


		$v = Tabla5Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla5Peer::ID, $pks, Criteria::IN);
			$objs = Tabla5Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla5Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla5MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla5MapBuilder');
}
