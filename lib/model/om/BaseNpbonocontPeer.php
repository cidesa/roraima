<?php


abstract class BaseNpbonocontPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npbonocont';

	
	const CLASS_DEFAULT = 'lib.model.Npbonocont';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODTIPCON = 'npbonocont.CODTIPCON';

	
	const ANOVIG = 'npbonocont.ANOVIG';

	
	const DESDE = 'npbonocont.DESDE';

	
	const HASTA = 'npbonocont.HASTA';

	
	const DIAUTI = 'npbonocont.DIAUTI';

	
	const DIAVAC = 'npbonocont.DIAVAC';

	
	const ANOVIGHAS = 'npbonocont.ANOVIGHAS';

	
	const CALINC = 'npbonocont.CALINC';

	
	const ANTAP = 'npbonocont.ANTAP';

	
	const ANTAPVAC = 'npbonocont.ANTAPVAC';

	
	const ID = 'npbonocont.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon', 'Anovig', 'Desde', 'Hasta', 'Diauti', 'Diavac', 'Anovighas', 'Calinc', 'Antap', 'Antapvac', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpbonocontPeer::CODTIPCON, NpbonocontPeer::ANOVIG, NpbonocontPeer::DESDE, NpbonocontPeer::HASTA, NpbonocontPeer::DIAUTI, NpbonocontPeer::DIAVAC, NpbonocontPeer::ANOVIGHAS, NpbonocontPeer::CALINC, NpbonocontPeer::ANTAP, NpbonocontPeer::ANTAPVAC, NpbonocontPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon', 'anovig', 'desde', 'hasta', 'diauti', 'diavac', 'anovighas', 'calinc', 'antap', 'antapvac', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codtipcon' => 0, 'Anovig' => 1, 'Desde' => 2, 'Hasta' => 3, 'Diauti' => 4, 'Diavac' => 5, 'Anovighas' => 6, 'Calinc' => 7, 'Antap' => 8, 'Antapvac' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (NpbonocontPeer::CODTIPCON => 0, NpbonocontPeer::ANOVIG => 1, NpbonocontPeer::DESDE => 2, NpbonocontPeer::HASTA => 3, NpbonocontPeer::DIAUTI => 4, NpbonocontPeer::DIAVAC => 5, NpbonocontPeer::ANOVIGHAS => 6, NpbonocontPeer::CALINC => 7, NpbonocontPeer::ANTAP => 8, NpbonocontPeer::ANTAPVAC => 9, NpbonocontPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('codtipcon' => 0, 'anovig' => 1, 'desde' => 2, 'hasta' => 3, 'diauti' => 4, 'diavac' => 5, 'anovighas' => 6, 'calinc' => 7, 'antap' => 8, 'antapvac' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpbonocontMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpbonocontMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpbonocontPeer::getTableMap();
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
		return str_replace(NpbonocontPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpbonocontPeer::CODTIPCON);

		$criteria->addSelectColumn(NpbonocontPeer::ANOVIG);

		$criteria->addSelectColumn(NpbonocontPeer::DESDE);

		$criteria->addSelectColumn(NpbonocontPeer::HASTA);

		$criteria->addSelectColumn(NpbonocontPeer::DIAUTI);

		$criteria->addSelectColumn(NpbonocontPeer::DIAVAC);

		$criteria->addSelectColumn(NpbonocontPeer::ANOVIGHAS);

		$criteria->addSelectColumn(NpbonocontPeer::CALINC);

		$criteria->addSelectColumn(NpbonocontPeer::ANTAP);

		$criteria->addSelectColumn(NpbonocontPeer::ANTAPVAC);

		$criteria->addSelectColumn(NpbonocontPeer::ID);

	}

	const COUNT = 'COUNT(npbonocont.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npbonocont.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpbonocontPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpbonocontPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpbonocontPeer::doSelectRS($criteria, $con);
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
		$objects = NpbonocontPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpbonocontPeer::populateObjects(NpbonocontPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpbonocontPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpbonocontPeer::getOMClass();
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
		return NpbonocontPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpbonocontPeer::ID); 

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
			$comparison = $criteria->getComparison(NpbonocontPeer::ID);
			$selectCriteria->add(NpbonocontPeer::ID, $criteria->remove(NpbonocontPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpbonocontPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpbonocontPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npbonocont) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpbonocontPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npbonocont $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpbonocontPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpbonocontPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpbonocontPeer::DATABASE_NAME, NpbonocontPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpbonocontPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpbonocontPeer::DATABASE_NAME);

		$criteria->add(NpbonocontPeer::ID, $pk);


		$v = NpbonocontPeer::doSelect($criteria, $con);

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
			$criteria->add(NpbonocontPeer::ID, $pks, Criteria::IN);
			$objs = NpbonocontPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpbonocontPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpbonocontMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpbonocontMapBuilder');
}
