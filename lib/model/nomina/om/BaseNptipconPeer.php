<?php


abstract class BaseNptipconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'nptipcon';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Nptipcon';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTIPCON = 'nptipcon.CODTIPCON';

	
	const DESTIPCON = 'nptipcon.DESTIPCON';

	
	const FREPAGCON = 'nptipcon.FREPAGCON';

	
	const ALICUOCON = 'nptipcon.ALICUOCON';

	
	const DIABONFINANO = 'nptipcon.DIABONFINANO';

	
	const DIABONVAC = 'nptipcon.DIABONVAC';

	
	const FECINIREG = 'nptipcon.FECINIREG';

	
	const ART146 = 'nptipcon.ART146';

	
	const DIAANO = 'nptipcon.DIAANO';

	
	const FID = 'nptipcon.FID';

	
	const FECDES = 'nptipcon.FECDES';

	
	const CONDIA = 'nptipcon.CONDIA';

	
	const ID = 'nptipcon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon', 'Destipcon', 'Frepagcon', 'Alicuocon', 'Diabonfinano', 'Diabonvac', 'Fecinireg', 'Art146', 'Diaano', 'Fid', 'Fecdes', 'Condia', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NptipconPeer::CODTIPCON, NptipconPeer::DESTIPCON, NptipconPeer::FREPAGCON, NptipconPeer::ALICUOCON, NptipconPeer::DIABONFINANO, NptipconPeer::DIABONVAC, NptipconPeer::FECINIREG, NptipconPeer::ART146, NptipconPeer::DIAANO, NptipconPeer::FID, NptipconPeer::FECDES, NptipconPeer::CONDIA, NptipconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon', 'destipcon', 'frepagcon', 'alicuocon', 'diabonfinano', 'diabonvac', 'fecinireg', 'art146', 'diaano', 'fid', 'fecdes', 'condia', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon' => 0, 'Destipcon' => 1, 'Frepagcon' => 2, 'Alicuocon' => 3, 'Diabonfinano' => 4, 'Diabonvac' => 5, 'Fecinireg' => 6, 'Art146' => 7, 'Diaano' => 8, 'Fid' => 9, 'Fecdes' => 10, 'Condia' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (NptipconPeer::CODTIPCON => 0, NptipconPeer::DESTIPCON => 1, NptipconPeer::FREPAGCON => 2, NptipconPeer::ALICUOCON => 3, NptipconPeer::DIABONFINANO => 4, NptipconPeer::DIABONVAC => 5, NptipconPeer::FECINIREG => 6, NptipconPeer::ART146 => 7, NptipconPeer::DIAANO => 8, NptipconPeer::FID => 9, NptipconPeer::FECDES => 10, NptipconPeer::CONDIA => 11, NptipconPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon' => 0, 'destipcon' => 1, 'frepagcon' => 2, 'alicuocon' => 3, 'diabonfinano' => 4, 'diabonvac' => 5, 'fecinireg' => 6, 'art146' => 7, 'diaano' => 8, 'fid' => 9, 'fecdes' => 10, 'condia' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NptipconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NptipconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NptipconPeer::getTableMap();
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
		return str_replace(NptipconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NptipconPeer::CODTIPCON);

		$criteria->addSelectColumn(NptipconPeer::DESTIPCON);

		$criteria->addSelectColumn(NptipconPeer::FREPAGCON);

		$criteria->addSelectColumn(NptipconPeer::ALICUOCON);

		$criteria->addSelectColumn(NptipconPeer::DIABONFINANO);

		$criteria->addSelectColumn(NptipconPeer::DIABONVAC);

		$criteria->addSelectColumn(NptipconPeer::FECINIREG);

		$criteria->addSelectColumn(NptipconPeer::ART146);

		$criteria->addSelectColumn(NptipconPeer::DIAANO);

		$criteria->addSelectColumn(NptipconPeer::FID);

		$criteria->addSelectColumn(NptipconPeer::FECDES);

		$criteria->addSelectColumn(NptipconPeer::CONDIA);

		$criteria->addSelectColumn(NptipconPeer::ID);

	}

	const COUNT = 'COUNT(nptipcon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT nptipcon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NptipconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NptipconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NptipconPeer::doSelectRS($criteria, $con);
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
		$objects = NptipconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NptipconPeer::populateObjects(NptipconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NptipconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NptipconPeer::getOMClass();
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
		return NptipconPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NptipconPeer::ID); 

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
			$comparison = $criteria->getComparison(NptipconPeer::ID);
			$selectCriteria->add(NptipconPeer::ID, $criteria->remove(NptipconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NptipconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NptipconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Nptipcon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NptipconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Nptipcon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NptipconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NptipconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NptipconPeer::DATABASE_NAME, NptipconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NptipconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NptipconPeer::DATABASE_NAME);

		$criteria->add(NptipconPeer::ID, $pk);


		$v = NptipconPeer::doSelect($criteria, $con);

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
			$criteria->add(NptipconPeer::ID, $pks, Criteria::IN);
			$objs = NptipconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNptipconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NptipconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NptipconMapBuilder');
}
