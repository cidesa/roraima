<?php


abstract class BaseTabla12Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla12';

	
	const CLASS_DEFAULT = 'lib.model.Tabla12';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCAU = 'tabla12.REFCAU';

	
	const TIPCAU = 'tabla12.TIPCAU';

	
	const FECCAU = 'tabla12.FECCAU';

	
	const ANOCAU = 'tabla12.ANOCAU';

	
	const REFCOM = 'tabla12.REFCOM';

	
	const TIPCOM = 'tabla12.TIPCOM';

	
	const DESCAU = 'tabla12.DESCAU';

	
	const DESANU = 'tabla12.DESANU';

	
	const MONCAU = 'tabla12.MONCAU';

	
	const SALPAG = 'tabla12.SALPAG';

	
	const SALAJU = 'tabla12.SALAJU';

	
	const STACAU = 'tabla12.STACAU';

	
	const FECANU = 'tabla12.FECANU';

	
	const CEDRIF = 'tabla12.CEDRIF';

	
	const ID = 'tabla12.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau', 'Tipcau', 'Feccau', 'Anocau', 'Refcom', 'Tipcom', 'Descau', 'Desanu', 'Moncau', 'Salpag', 'Salaju', 'Stacau', 'Fecanu', 'Cedrif', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla12Peer::REFCAU, Tabla12Peer::TIPCAU, Tabla12Peer::FECCAU, Tabla12Peer::ANOCAU, Tabla12Peer::REFCOM, Tabla12Peer::TIPCOM, Tabla12Peer::DESCAU, Tabla12Peer::DESANU, Tabla12Peer::MONCAU, Tabla12Peer::SALPAG, Tabla12Peer::SALAJU, Tabla12Peer::STACAU, Tabla12Peer::FECANU, Tabla12Peer::CEDRIF, Tabla12Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau', 'tipcau', 'feccau', 'anocau', 'refcom', 'tipcom', 'descau', 'desanu', 'moncau', 'salpag', 'salaju', 'stacau', 'fecanu', 'cedrif', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcau' => 0, 'Tipcau' => 1, 'Feccau' => 2, 'Anocau' => 3, 'Refcom' => 4, 'Tipcom' => 5, 'Descau' => 6, 'Desanu' => 7, 'Moncau' => 8, 'Salpag' => 9, 'Salaju' => 10, 'Stacau' => 11, 'Fecanu' => 12, 'Cedrif' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (Tabla12Peer::REFCAU => 0, Tabla12Peer::TIPCAU => 1, Tabla12Peer::FECCAU => 2, Tabla12Peer::ANOCAU => 3, Tabla12Peer::REFCOM => 4, Tabla12Peer::TIPCOM => 5, Tabla12Peer::DESCAU => 6, Tabla12Peer::DESANU => 7, Tabla12Peer::MONCAU => 8, Tabla12Peer::SALPAG => 9, Tabla12Peer::SALAJU => 10, Tabla12Peer::STACAU => 11, Tabla12Peer::FECANU => 12, Tabla12Peer::CEDRIF => 13, Tabla12Peer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('refcau' => 0, 'tipcau' => 1, 'feccau' => 2, 'anocau' => 3, 'refcom' => 4, 'tipcom' => 5, 'descau' => 6, 'desanu' => 7, 'moncau' => 8, 'salpag' => 9, 'salaju' => 10, 'stacau' => 11, 'fecanu' => 12, 'cedrif' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla12MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla12MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla12Peer::getTableMap();
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
		return str_replace(Tabla12Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla12Peer::REFCAU);

		$criteria->addSelectColumn(Tabla12Peer::TIPCAU);

		$criteria->addSelectColumn(Tabla12Peer::FECCAU);

		$criteria->addSelectColumn(Tabla12Peer::ANOCAU);

		$criteria->addSelectColumn(Tabla12Peer::REFCOM);

		$criteria->addSelectColumn(Tabla12Peer::TIPCOM);

		$criteria->addSelectColumn(Tabla12Peer::DESCAU);

		$criteria->addSelectColumn(Tabla12Peer::DESANU);

		$criteria->addSelectColumn(Tabla12Peer::MONCAU);

		$criteria->addSelectColumn(Tabla12Peer::SALPAG);

		$criteria->addSelectColumn(Tabla12Peer::SALAJU);

		$criteria->addSelectColumn(Tabla12Peer::STACAU);

		$criteria->addSelectColumn(Tabla12Peer::FECANU);

		$criteria->addSelectColumn(Tabla12Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla12Peer::ID);

	}

	const COUNT = 'COUNT(tabla12.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla12.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla12Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla12Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla12Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla12Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla12Peer::populateObjects(Tabla12Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla12Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla12Peer::getOMClass();
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
		return Tabla12Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla12Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla12Peer::ID);
			$selectCriteria->add(Tabla12Peer::ID, $criteria->remove(Tabla12Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla12Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla12Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla12) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla12Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla12 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla12Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla12Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla12Peer::DATABASE_NAME, Tabla12Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla12Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla12Peer::DATABASE_NAME);

		$criteria->add(Tabla12Peer::ID, $pk);


		$v = Tabla12Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla12Peer::ID, $pks, Criteria::IN);
			$objs = Tabla12Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla12Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla12MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla12MapBuilder');
}
