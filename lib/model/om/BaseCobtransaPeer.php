<?php


abstract class BaseCobtransaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cobtransa';

	
	const CLASS_DEFAULT = 'lib.model.Cobtransa';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMTRA = 'cobtransa.NUMTRA';

	
	const FECTRA = 'cobtransa.FECTRA';

	
	const CODCLI = 'cobtransa.CODCLI';

	
	const CODMOV = 'cobtransa.CODMOV';

	
	const DESTRA = 'cobtransa.DESTRA';

	
	const MONTRA = 'cobtransa.MONTRA';

	
	const TOTDSC = 'cobtransa.TOTDSC';

	
	const TOTREC = 'cobtransa.TOTREC';

	
	const TOTTRA = 'cobtransa.TOTTRA';

	
	const STATUS = 'cobtransa.STATUS';

	
	const NUMCOM = 'cobtransa.NUMCOM';

	
	const FECCOM = 'cobtransa.FECCOM';

	
	const ID = 'cobtransa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra', 'Fectra', 'Codcli', 'Codmov', 'Destra', 'Montra', 'Totdsc', 'Totrec', 'Tottra', 'Status', 'Numcom', 'Feccom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CobtransaPeer::NUMTRA, CobtransaPeer::FECTRA, CobtransaPeer::CODCLI, CobtransaPeer::CODMOV, CobtransaPeer::DESTRA, CobtransaPeer::MONTRA, CobtransaPeer::TOTDSC, CobtransaPeer::TOTREC, CobtransaPeer::TOTTRA, CobtransaPeer::STATUS, CobtransaPeer::NUMCOM, CobtransaPeer::FECCOM, CobtransaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra', 'fectra', 'codcli', 'codmov', 'destra', 'montra', 'totdsc', 'totrec', 'tottra', 'status', 'numcom', 'feccom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra' => 0, 'Fectra' => 1, 'Codcli' => 2, 'Codmov' => 3, 'Destra' => 4, 'Montra' => 5, 'Totdsc' => 6, 'Totrec' => 7, 'Tottra' => 8, 'Status' => 9, 'Numcom' => 10, 'Feccom' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CobtransaPeer::NUMTRA => 0, CobtransaPeer::FECTRA => 1, CobtransaPeer::CODCLI => 2, CobtransaPeer::CODMOV => 3, CobtransaPeer::DESTRA => 4, CobtransaPeer::MONTRA => 5, CobtransaPeer::TOTDSC => 6, CobtransaPeer::TOTREC => 7, CobtransaPeer::TOTTRA => 8, CobtransaPeer::STATUS => 9, CobtransaPeer::NUMCOM => 10, CobtransaPeer::FECCOM => 11, CobtransaPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra' => 0, 'fectra' => 1, 'codcli' => 2, 'codmov' => 3, 'destra' => 4, 'montra' => 5, 'totdsc' => 6, 'totrec' => 7, 'tottra' => 8, 'status' => 9, 'numcom' => 10, 'feccom' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CobtransaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CobtransaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CobtransaPeer::getTableMap();
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
		return str_replace(CobtransaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CobtransaPeer::NUMTRA);

		$criteria->addSelectColumn(CobtransaPeer::FECTRA);

		$criteria->addSelectColumn(CobtransaPeer::CODCLI);

		$criteria->addSelectColumn(CobtransaPeer::CODMOV);

		$criteria->addSelectColumn(CobtransaPeer::DESTRA);

		$criteria->addSelectColumn(CobtransaPeer::MONTRA);

		$criteria->addSelectColumn(CobtransaPeer::TOTDSC);

		$criteria->addSelectColumn(CobtransaPeer::TOTREC);

		$criteria->addSelectColumn(CobtransaPeer::TOTTRA);

		$criteria->addSelectColumn(CobtransaPeer::STATUS);

		$criteria->addSelectColumn(CobtransaPeer::NUMCOM);

		$criteria->addSelectColumn(CobtransaPeer::FECCOM);

		$criteria->addSelectColumn(CobtransaPeer::ID);

	}

	const COUNT = 'COUNT(cobtransa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cobtransa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobtransaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobtransaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CobtransaPeer::doSelectRS($criteria, $con);
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
		$objects = CobtransaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CobtransaPeer::populateObjects(CobtransaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CobtransaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CobtransaPeer::getOMClass();
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
		return CobtransaPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CobtransaPeer::ID);
			$selectCriteria->add(CobtransaPeer::ID, $criteria->remove(CobtransaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CobtransaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CobtransaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cobtransa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CobtransaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cobtransa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CobtransaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CobtransaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CobtransaPeer::DATABASE_NAME, CobtransaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CobtransaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CobtransaPeer::DATABASE_NAME);

		$criteria->add(CobtransaPeer::ID, $pk);


		$v = CobtransaPeer::doSelect($criteria, $con);

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
			$criteria->add(CobtransaPeer::ID, $pks, Criteria::IN);
			$objs = CobtransaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCobtransaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CobtransaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CobtransaMapBuilder');
}
