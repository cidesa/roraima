<?php


abstract class BaseNptipconOldPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nptipcon_old';

	
	const CLASS_DEFAULT = 'lib.model.nomina.NptipconOld';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTIPCON = 'nptipcon_old.CODTIPCON';

	
	const DESTIPCON = 'nptipcon_old.DESTIPCON';

	
	const FREPAGCON = 'nptipcon_old.FREPAGCON';

	
	const ALICUOCON = 'nptipcon_old.ALICUOCON';

	
	const DIABONFINANO = 'nptipcon_old.DIABONFINANO';

	
	const DIABONVAC = 'nptipcon_old.DIABONVAC';

	
	const FECINIREG = 'nptipcon_old.FECINIREG';

	
	const ART146 = 'nptipcon_old.ART146';

	
	const DIAANO = 'nptipcon_old.DIAANO';

	
	const ID = 'nptipcon_old.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon', 'Destipcon', 'Frepagcon', 'Alicuocon', 'Diabonfinano', 'Diabonvac', 'Fecinireg', 'Art146', 'Diaano', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NptipconOldPeer::CODTIPCON, NptipconOldPeer::DESTIPCON, NptipconOldPeer::FREPAGCON, NptipconOldPeer::ALICUOCON, NptipconOldPeer::DIABONFINANO, NptipconOldPeer::DIABONVAC, NptipconOldPeer::FECINIREG, NptipconOldPeer::ART146, NptipconOldPeer::DIAANO, NptipconOldPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon', 'destipcon', 'frepagcon', 'alicuocon', 'diabonfinano', 'diabonvac', 'fecinireg', 'art146', 'diaano', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon' => 0, 'Destipcon' => 1, 'Frepagcon' => 2, 'Alicuocon' => 3, 'Diabonfinano' => 4, 'Diabonvac' => 5, 'Fecinireg' => 6, 'Art146' => 7, 'Diaano' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (NptipconOldPeer::CODTIPCON => 0, NptipconOldPeer::DESTIPCON => 1, NptipconOldPeer::FREPAGCON => 2, NptipconOldPeer::ALICUOCON => 3, NptipconOldPeer::DIABONFINANO => 4, NptipconOldPeer::DIABONVAC => 5, NptipconOldPeer::FECINIREG => 6, NptipconOldPeer::ART146 => 7, NptipconOldPeer::DIAANO => 8, NptipconOldPeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon' => 0, 'destipcon' => 1, 'frepagcon' => 2, 'alicuocon' => 3, 'diabonfinano' => 4, 'diabonvac' => 5, 'fecinireg' => 6, 'art146' => 7, 'diaano' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NptipconOldMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NptipconOldMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NptipconOldPeer::getTableMap();
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
		return str_replace(NptipconOldPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NptipconOldPeer::CODTIPCON);

		$criteria->addSelectColumn(NptipconOldPeer::DESTIPCON);

		$criteria->addSelectColumn(NptipconOldPeer::FREPAGCON);

		$criteria->addSelectColumn(NptipconOldPeer::ALICUOCON);

		$criteria->addSelectColumn(NptipconOldPeer::DIABONFINANO);

		$criteria->addSelectColumn(NptipconOldPeer::DIABONVAC);

		$criteria->addSelectColumn(NptipconOldPeer::FECINIREG);

		$criteria->addSelectColumn(NptipconOldPeer::ART146);

		$criteria->addSelectColumn(NptipconOldPeer::DIAANO);

		$criteria->addSelectColumn(NptipconOldPeer::ID);

	}

	const COUNT = 'COUNT(nptipcon_old.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nptipcon_old.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NptipconOldPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NptipconOldPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NptipconOldPeer::doSelectRS($criteria, $con);
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
		$objects = NptipconOldPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NptipconOldPeer::populateObjects(NptipconOldPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NptipconOldPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NptipconOldPeer::getOMClass();
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
		return NptipconOldPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NptipconOldPeer::ID); 

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
			$comparison = $criteria->getComparison(NptipconOldPeer::ID);
			$selectCriteria->add(NptipconOldPeer::ID, $criteria->remove(NptipconOldPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NptipconOldPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NptipconOldPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NptipconOld) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NptipconOldPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NptipconOld $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NptipconOldPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NptipconOldPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NptipconOldPeer::DATABASE_NAME, NptipconOldPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NptipconOldPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NptipconOldPeer::DATABASE_NAME);

		$criteria->add(NptipconOldPeer::ID, $pk);


		$v = NptipconOldPeer::doSelect($criteria, $con);

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
			$criteria->add(NptipconOldPeer::ID, $pks, Criteria::IN);
			$objs = NptipconOldPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNptipconOldPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NptipconOldMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NptipconOldMapBuilder');
}
