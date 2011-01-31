<?php


abstract class BaseTsanticiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tsantici';

	
	const CLASS_DEFAULT = 'lib.model.Tsantici';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFANT = 'tsantici.REFANT';

	
	const DESANT = 'tsantici.DESANT';

	
	const CEDRIF = 'tsantici.CEDRIF';

	
	const REFCOM = 'tsantici.REFCOM';

	
	const FECANT = 'tsantici.FECANT';

	
	const MONTO = 'tsantici.MONTO';

	
	const SALDO = 'tsantici.SALDO';

	
	const NUMCOM = 'tsantici.NUMCOM';

	
	const ID = 'tsantici.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refant', 'Desant', 'Cedrif', 'Refcom', 'Fecant', 'Monto', 'Saldo', 'Numcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (TsanticiPeer::REFANT, TsanticiPeer::DESANT, TsanticiPeer::CEDRIF, TsanticiPeer::REFCOM, TsanticiPeer::FECANT, TsanticiPeer::MONTO, TsanticiPeer::SALDO, TsanticiPeer::NUMCOM, TsanticiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refant', 'desant', 'cedrif', 'refcom', 'fecant', 'monto', 'saldo', 'numcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refant' => 0, 'Desant' => 1, 'Cedrif' => 2, 'Refcom' => 3, 'Fecant' => 4, 'Monto' => 5, 'Saldo' => 6, 'Numcom' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (TsanticiPeer::REFANT => 0, TsanticiPeer::DESANT => 1, TsanticiPeer::CEDRIF => 2, TsanticiPeer::REFCOM => 3, TsanticiPeer::FECANT => 4, TsanticiPeer::MONTO => 5, TsanticiPeer::SALDO => 6, TsanticiPeer::NUMCOM => 7, TsanticiPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refant' => 0, 'desant' => 1, 'cedrif' => 2, 'refcom' => 3, 'fecant' => 4, 'monto' => 5, 'saldo' => 6, 'numcom' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/TsanticiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.TsanticiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = TsanticiPeer::getTableMap();
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
		return str_replace(TsanticiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(TsanticiPeer::REFANT);

		$criteria->addSelectColumn(TsanticiPeer::DESANT);

		$criteria->addSelectColumn(TsanticiPeer::CEDRIF);

		$criteria->addSelectColumn(TsanticiPeer::REFCOM);

		$criteria->addSelectColumn(TsanticiPeer::FECANT);

		$criteria->addSelectColumn(TsanticiPeer::MONTO);

		$criteria->addSelectColumn(TsanticiPeer::SALDO);

		$criteria->addSelectColumn(TsanticiPeer::NUMCOM);

		$criteria->addSelectColumn(TsanticiPeer::ID);

	}

	const COUNT = 'COUNT(tsantici.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tsantici.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(TsanticiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(TsanticiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = TsanticiPeer::doSelectRS($criteria, $con);
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
		$objects = TsanticiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return TsanticiPeer::populateObjects(TsanticiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			TsanticiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = TsanticiPeer::getOMClass();
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
		return TsanticiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(TsanticiPeer::ID); 

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
			$comparison = $criteria->getComparison(TsanticiPeer::ID);
			$selectCriteria->add(TsanticiPeer::ID, $criteria->remove(TsanticiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(TsanticiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(TsanticiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tsantici) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(TsanticiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tsantici $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(TsanticiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(TsanticiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(TsanticiPeer::DATABASE_NAME, TsanticiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = TsanticiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(TsanticiPeer::DATABASE_NAME);

		$criteria->add(TsanticiPeer::ID, $pk);


		$v = TsanticiPeer::doSelect($criteria, $con);

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
			$criteria->add(TsanticiPeer::ID, $pks, Criteria::IN);
			$objs = TsanticiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTsanticiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/TsanticiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.TsanticiMapBuilder');
}
