<?php


abstract class BaseNpcestaticketsPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npcestatickets';

	
	const CLASS_DEFAULT = 'lib.model.Npcestatickets';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npcestatickets.CODNOM';

	
	const CODCON = 'npcestatickets.CODCON';

	
	const MONPOR = 'npcestatickets.MONPOR';

	
	const VALTIC = 'npcestatickets.VALTIC';

	
	const NUMTIC = 'npcestatickets.NUMTIC';

	
	const TIPPAG = 'npcestatickets.TIPPAG';

	
	const NUMDIA = 'npcestatickets.NUMDIA';

	
	const DIAHAB = 'npcestatickets.DIAHAB';

	
	const SABADO = 'npcestatickets.SABADO';

	
	const DOMING = 'npcestatickets.DOMING';

	
	const DIAFER = 'npcestatickets.DIAFER';

	
	const ID = 'npcestatickets.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codcon', 'Monpor', 'Valtic', 'Numtic', 'Tippag', 'Numdia', 'Diahab', 'Sabado', 'Doming', 'Diafer', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpcestaticketsPeer::CODNOM, NpcestaticketsPeer::CODCON, NpcestaticketsPeer::MONPOR, NpcestaticketsPeer::VALTIC, NpcestaticketsPeer::NUMTIC, NpcestaticketsPeer::TIPPAG, NpcestaticketsPeer::NUMDIA, NpcestaticketsPeer::DIAHAB, NpcestaticketsPeer::SABADO, NpcestaticketsPeer::DOMING, NpcestaticketsPeer::DIAFER, NpcestaticketsPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codcon', 'monpor', 'valtic', 'numtic', 'tippag', 'numdia', 'diahab', 'sabado', 'doming', 'diafer', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codcon' => 1, 'Monpor' => 2, 'Valtic' => 3, 'Numtic' => 4, 'Tippag' => 5, 'Numdia' => 6, 'Diahab' => 7, 'Sabado' => 8, 'Doming' => 9, 'Diafer' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (NpcestaticketsPeer::CODNOM => 0, NpcestaticketsPeer::CODCON => 1, NpcestaticketsPeer::MONPOR => 2, NpcestaticketsPeer::VALTIC => 3, NpcestaticketsPeer::NUMTIC => 4, NpcestaticketsPeer::TIPPAG => 5, NpcestaticketsPeer::NUMDIA => 6, NpcestaticketsPeer::DIAHAB => 7, NpcestaticketsPeer::SABADO => 8, NpcestaticketsPeer::DOMING => 9, NpcestaticketsPeer::DIAFER => 10, NpcestaticketsPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codcon' => 1, 'monpor' => 2, 'valtic' => 3, 'numtic' => 4, 'tippag' => 5, 'numdia' => 6, 'diahab' => 7, 'sabado' => 8, 'doming' => 9, 'diafer' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpcestaticketsMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpcestaticketsMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpcestaticketsPeer::getTableMap();
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
		return str_replace(NpcestaticketsPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpcestaticketsPeer::CODNOM);

		$criteria->addSelectColumn(NpcestaticketsPeer::CODCON);

		$criteria->addSelectColumn(NpcestaticketsPeer::MONPOR);

		$criteria->addSelectColumn(NpcestaticketsPeer::VALTIC);

		$criteria->addSelectColumn(NpcestaticketsPeer::NUMTIC);

		$criteria->addSelectColumn(NpcestaticketsPeer::TIPPAG);

		$criteria->addSelectColumn(NpcestaticketsPeer::NUMDIA);

		$criteria->addSelectColumn(NpcestaticketsPeer::DIAHAB);

		$criteria->addSelectColumn(NpcestaticketsPeer::SABADO);

		$criteria->addSelectColumn(NpcestaticketsPeer::DOMING);

		$criteria->addSelectColumn(NpcestaticketsPeer::DIAFER);

		$criteria->addSelectColumn(NpcestaticketsPeer::ID);

	}

	const COUNT = 'COUNT(npcestatickets.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npcestatickets.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpcestaticketsPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpcestaticketsPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpcestaticketsPeer::doSelectRS($criteria, $con);
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
		$objects = NpcestaticketsPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpcestaticketsPeer::populateObjects(NpcestaticketsPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpcestaticketsPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpcestaticketsPeer::getOMClass();
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
		return NpcestaticketsPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpcestaticketsPeer::ID); 

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
			$comparison = $criteria->getComparison(NpcestaticketsPeer::ID);
			$selectCriteria->add(NpcestaticketsPeer::ID, $criteria->remove(NpcestaticketsPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpcestaticketsPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpcestaticketsPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npcestatickets) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpcestaticketsPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npcestatickets $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpcestaticketsPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpcestaticketsPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpcestaticketsPeer::DATABASE_NAME, NpcestaticketsPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpcestaticketsPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpcestaticketsPeer::DATABASE_NAME);

		$criteria->add(NpcestaticketsPeer::ID, $pk);


		$v = NpcestaticketsPeer::doSelect($criteria, $con);

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
			$criteria->add(NpcestaticketsPeer::ID, $pks, Criteria::IN);
			$objs = NpcestaticketsPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpcestaticketsPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpcestaticketsMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpcestaticketsMapBuilder');
}
