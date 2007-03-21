<?php


abstract class BaseRemovajuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'removaju';

	
	const CLASS_DEFAULT = 'lib.model.Removaju';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFAJU = 'removaju.REFAJU';

	
	const CODPRE = 'removaju.CODPRE';

	
	const MONAJU = 'removaju.MONAJU';

	
	const STAMOV = 'removaju.STAMOV';

	
	const REFPRC = 'removaju.REFPRC';

	
	const REFCOM = 'removaju.REFCOM';

	
	const REFCAU = 'removaju.REFCAU';

	
	const REFPAG = 'removaju.REFPAG';

	
	const ID = 'removaju.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju', 'Codpre', 'Monaju', 'Stamov', 'Refprc', 'Refcom', 'Refcau', 'Refpag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (RemovajuPeer::REFAJU, RemovajuPeer::CODPRE, RemovajuPeer::MONAJU, RemovajuPeer::STAMOV, RemovajuPeer::REFPRC, RemovajuPeer::REFCOM, RemovajuPeer::REFCAU, RemovajuPeer::REFPAG, RemovajuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju', 'codpre', 'monaju', 'stamov', 'refprc', 'refcom', 'refcau', 'refpag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refaju' => 0, 'Codpre' => 1, 'Monaju' => 2, 'Stamov' => 3, 'Refprc' => 4, 'Refcom' => 5, 'Refcau' => 6, 'Refpag' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (RemovajuPeer::REFAJU => 0, RemovajuPeer::CODPRE => 1, RemovajuPeer::MONAJU => 2, RemovajuPeer::STAMOV => 3, RemovajuPeer::REFPRC => 4, RemovajuPeer::REFCOM => 5, RemovajuPeer::REFCAU => 6, RemovajuPeer::REFPAG => 7, RemovajuPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('refaju' => 0, 'codpre' => 1, 'monaju' => 2, 'stamov' => 3, 'refprc' => 4, 'refcom' => 5, 'refcau' => 6, 'refpag' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/RemovajuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.RemovajuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = RemovajuPeer::getTableMap();
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
		return str_replace(RemovajuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(RemovajuPeer::REFAJU);

		$criteria->addSelectColumn(RemovajuPeer::CODPRE);

		$criteria->addSelectColumn(RemovajuPeer::MONAJU);

		$criteria->addSelectColumn(RemovajuPeer::STAMOV);

		$criteria->addSelectColumn(RemovajuPeer::REFPRC);

		$criteria->addSelectColumn(RemovajuPeer::REFCOM);

		$criteria->addSelectColumn(RemovajuPeer::REFCAU);

		$criteria->addSelectColumn(RemovajuPeer::REFPAG);

		$criteria->addSelectColumn(RemovajuPeer::ID);

	}

	const COUNT = 'COUNT(removaju.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT removaju.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(RemovajuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(RemovajuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = RemovajuPeer::doSelectRS($criteria, $con);
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
		$objects = RemovajuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return RemovajuPeer::populateObjects(RemovajuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			RemovajuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = RemovajuPeer::getOMClass();
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
		return RemovajuPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(RemovajuPeer::ID);
			$selectCriteria->add(RemovajuPeer::ID, $criteria->remove(RemovajuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(RemovajuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(RemovajuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Removaju) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(RemovajuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Removaju $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(RemovajuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(RemovajuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(RemovajuPeer::DATABASE_NAME, RemovajuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = RemovajuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(RemovajuPeer::DATABASE_NAME);

		$criteria->add(RemovajuPeer::ID, $pk);


		$v = RemovajuPeer::doSelect($criteria, $con);

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
			$criteria->add(RemovajuPeer::ID, $pks, Criteria::IN);
			$objs = RemovajuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseRemovajuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/RemovajuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.RemovajuMapBuilder');
}
