<?php


abstract class BaseNpnominaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npnomina';

	
	const CLASS_DEFAULT = 'lib.model.Npnomina';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npnomina.CODNOM';

	
	const NOMNOM = 'npnomina.NOMNOM';

	
	const FRECAL = 'npnomina.FRECAL';

	
	const ULTFEC = 'npnomina.ULTFEC';

	
	const PROFEC = 'npnomina.PROFEC';

	
	const NUMSEM = 'npnomina.NUMSEM';

	
	const ORDPAG = 'npnomina.ORDPAG';

	
	const TIPCAU = 'npnomina.TIPCAU';

	
	const REFCAU = 'npnomina.REFCAU';

	
	const TIPPRC = 'npnomina.TIPPRC';

	
	const REFPRC = 'npnomina.REFPRC';

	
	const TIPCOM = 'npnomina.TIPCOM';

	
	const REFCOM = 'npnomina.REFCOM';

	
	const ID = 'npnomina.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Nomnom', 'Frecal', 'Ultfec', 'Profec', 'Numsem', 'Ordpag', 'Tipcau', 'Refcau', 'Tipprc', 'Refprc', 'Tipcom', 'Refcom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpnominaPeer::CODNOM, NpnominaPeer::NOMNOM, NpnominaPeer::FRECAL, NpnominaPeer::ULTFEC, NpnominaPeer::PROFEC, NpnominaPeer::NUMSEM, NpnominaPeer::ORDPAG, NpnominaPeer::TIPCAU, NpnominaPeer::REFCAU, NpnominaPeer::TIPPRC, NpnominaPeer::REFPRC, NpnominaPeer::TIPCOM, NpnominaPeer::REFCOM, NpnominaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'nomnom', 'frecal', 'ultfec', 'profec', 'numsem', 'ordpag', 'tipcau', 'refcau', 'tipprc', 'refprc', 'tipcom', 'refcom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Nomnom' => 1, 'Frecal' => 2, 'Ultfec' => 3, 'Profec' => 4, 'Numsem' => 5, 'Ordpag' => 6, 'Tipcau' => 7, 'Refcau' => 8, 'Tipprc' => 9, 'Refprc' => 10, 'Tipcom' => 11, 'Refcom' => 12, 'Id' => 13, ),
		BasePeer::TYPE_COLNAME => array (NpnominaPeer::CODNOM => 0, NpnominaPeer::NOMNOM => 1, NpnominaPeer::FRECAL => 2, NpnominaPeer::ULTFEC => 3, NpnominaPeer::PROFEC => 4, NpnominaPeer::NUMSEM => 5, NpnominaPeer::ORDPAG => 6, NpnominaPeer::TIPCAU => 7, NpnominaPeer::REFCAU => 8, NpnominaPeer::TIPPRC => 9, NpnominaPeer::REFPRC => 10, NpnominaPeer::TIPCOM => 11, NpnominaPeer::REFCOM => 12, NpnominaPeer::ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'nomnom' => 1, 'frecal' => 2, 'ultfec' => 3, 'profec' => 4, 'numsem' => 5, 'ordpag' => 6, 'tipcau' => 7, 'refcau' => 8, 'tipprc' => 9, 'refprc' => 10, 'tipcom' => 11, 'refcom' => 12, 'id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpnominaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpnominaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpnominaPeer::getTableMap();
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
		return str_replace(NpnominaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpnominaPeer::CODNOM);

		$criteria->addSelectColumn(NpnominaPeer::NOMNOM);

		$criteria->addSelectColumn(NpnominaPeer::FRECAL);

		$criteria->addSelectColumn(NpnominaPeer::ULTFEC);

		$criteria->addSelectColumn(NpnominaPeer::PROFEC);

		$criteria->addSelectColumn(NpnominaPeer::NUMSEM);

		$criteria->addSelectColumn(NpnominaPeer::ORDPAG);

		$criteria->addSelectColumn(NpnominaPeer::TIPCAU);

		$criteria->addSelectColumn(NpnominaPeer::REFCAU);

		$criteria->addSelectColumn(NpnominaPeer::TIPPRC);

		$criteria->addSelectColumn(NpnominaPeer::REFPRC);

		$criteria->addSelectColumn(NpnominaPeer::TIPCOM);

		$criteria->addSelectColumn(NpnominaPeer::REFCOM);

		$criteria->addSelectColumn(NpnominaPeer::ID);

	}

	const COUNT = 'COUNT(npnomina.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npnomina.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpnominaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpnominaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpnominaPeer::doSelectRS($criteria, $con);
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
		$objects = NpnominaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpnominaPeer::populateObjects(NpnominaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpnominaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpnominaPeer::getOMClass();
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
		return NpnominaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpnominaPeer::ID); 

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
			$comparison = $criteria->getComparison(NpnominaPeer::ID);
			$selectCriteria->add(NpnominaPeer::ID, $criteria->remove(NpnominaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpnominaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpnominaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npnomina) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpnominaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npnomina $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpnominaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpnominaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpnominaPeer::DATABASE_NAME, NpnominaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpnominaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpnominaPeer::DATABASE_NAME);

		$criteria->add(NpnominaPeer::ID, $pk);


		$v = NpnominaPeer::doSelect($criteria, $con);

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
			$criteria->add(NpnominaPeer::ID, $pks, Criteria::IN);
			$objs = NpnominaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpnominaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpnominaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpnominaMapBuilder');
}
