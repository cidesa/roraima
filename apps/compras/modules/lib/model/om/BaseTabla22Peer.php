<?php


abstract class BaseTabla22Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla22';

	
	const CLASS_DEFAULT = 'lib.model.Tabla22';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFPAG = 'tabla22.REFPAG';

	
	const CODPRE = 'tabla22.CODPRE';

	
	const MONIMP = 'tabla22.MONIMP';

	
	const MONAJU = 'tabla22.MONAJU';

	
	const STAIMP = 'tabla22.STAIMP';

	
	const REFERE = 'tabla22.REFERE';

	
	const REFPRC = 'tabla22.REFPRC';

	
	const REFCOM = 'tabla22.REFCOM';

	
	const ID = 'tabla22.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag', 'Codpre', 'Monimp', 'Monaju', 'Staimp', 'Refere', 'Refprc', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla22Peer::REFPAG, Tabla22Peer::CODPRE, Tabla22Peer::MONIMP, Tabla22Peer::MONAJU, Tabla22Peer::STAIMP, Tabla22Peer::REFERE, Tabla22Peer::REFPRC, Tabla22Peer::REFCOM, Tabla22Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag', 'codpre', 'monimp', 'monaju', 'staimp', 'refere', 'refprc', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refpag' => 0, 'Codpre' => 1, 'Monimp' => 2, 'Monaju' => 3, 'Staimp' => 4, 'Refere' => 5, 'Refprc' => 6, 'Refcom' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (Tabla22Peer::REFPAG => 0, Tabla22Peer::CODPRE => 1, Tabla22Peer::MONIMP => 2, Tabla22Peer::MONAJU => 3, Tabla22Peer::STAIMP => 4, Tabla22Peer::REFERE => 5, Tabla22Peer::REFPRC => 6, Tabla22Peer::REFCOM => 7, Tabla22Peer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refpag' => 0, 'codpre' => 1, 'monimp' => 2, 'monaju' => 3, 'staimp' => 4, 'refere' => 5, 'refprc' => 6, 'refcom' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla22MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla22MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla22Peer::getTableMap();
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
		return str_replace(Tabla22Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla22Peer::REFPAG);

		$criteria->addSelectColumn(Tabla22Peer::CODPRE);

		$criteria->addSelectColumn(Tabla22Peer::MONIMP);

		$criteria->addSelectColumn(Tabla22Peer::MONAJU);

		$criteria->addSelectColumn(Tabla22Peer::STAIMP);

		$criteria->addSelectColumn(Tabla22Peer::REFERE);

		$criteria->addSelectColumn(Tabla22Peer::REFPRC);

		$criteria->addSelectColumn(Tabla22Peer::REFCOM);

		$criteria->addSelectColumn(Tabla22Peer::ID);

	}

	const COUNT = 'COUNT(tabla22.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla22.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla22Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla22Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla22Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla22Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla22Peer::populateObjects(Tabla22Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla22Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla22Peer::getOMClass();
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
		return Tabla22Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla22Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla22Peer::ID);
			$selectCriteria->add(Tabla22Peer::ID, $criteria->remove(Tabla22Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla22Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla22Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla22) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla22Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla22 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla22Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla22Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla22Peer::DATABASE_NAME, Tabla22Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla22Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla22Peer::DATABASE_NAME);

		$criteria->add(Tabla22Peer::ID, $pk);


		$v = Tabla22Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla22Peer::ID, $pks, Criteria::IN);
			$objs = Tabla22Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla22Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla22MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla22MapBuilder');
}
