<?php


abstract class BaseNpimppresoc1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npimppresoc1';

	
	const CLASS_DEFAULT = 'lib.model.Npimppresoc1';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npimppresoc1.CODEMP';

	
	const FECCOR = 'npimppresoc1.FECCOR';

	
	const FECINI = 'npimppresoc1.FECINI';

	
	const FECFIN = 'npimppresoc1.FECFIN';

	
	const TASINT = 'npimppresoc1.TASINT';

	
	const DIADIF = 'npimppresoc1.DIADIF';

	
	const CAPVIE = 'npimppresoc1.CAPVIE';

	
	const CAPCAP = 'npimppresoc1.CAPCAP';

	
	const INTDEV = 'npimppresoc1.INTDEV';

	
	const INTACUM = 'npimppresoc1.INTACUM';

	
	const ADEPRE = 'npimppresoc1.ADEPRE';

	
	const ID = 'npimppresoc1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Feccor', 'Fecini', 'Fecfin', 'Tasint', 'Diadif', 'Capvie', 'Capcap', 'Intdev', 'Intacum', 'Adepre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Npimppresoc1Peer::CODEMP, Npimppresoc1Peer::FECCOR, Npimppresoc1Peer::FECINI, Npimppresoc1Peer::FECFIN, Npimppresoc1Peer::TASINT, Npimppresoc1Peer::DIADIF, Npimppresoc1Peer::CAPVIE, Npimppresoc1Peer::CAPCAP, Npimppresoc1Peer::INTDEV, Npimppresoc1Peer::INTACUM, Npimppresoc1Peer::ADEPRE, Npimppresoc1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'feccor', 'fecini', 'fecfin', 'tasint', 'diadif', 'capvie', 'capcap', 'intdev', 'intacum', 'adepre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Feccor' => 1, 'Fecini' => 2, 'Fecfin' => 3, 'Tasint' => 4, 'Diadif' => 5, 'Capvie' => 6, 'Capcap' => 7, 'Intdev' => 8, 'Intacum' => 9, 'Adepre' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (Npimppresoc1Peer::CODEMP => 0, Npimppresoc1Peer::FECCOR => 1, Npimppresoc1Peer::FECINI => 2, Npimppresoc1Peer::FECFIN => 3, Npimppresoc1Peer::TASINT => 4, Npimppresoc1Peer::DIADIF => 5, Npimppresoc1Peer::CAPVIE => 6, Npimppresoc1Peer::CAPCAP => 7, Npimppresoc1Peer::INTDEV => 8, Npimppresoc1Peer::INTACUM => 9, Npimppresoc1Peer::ADEPRE => 10, Npimppresoc1Peer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'feccor' => 1, 'fecini' => 2, 'fecfin' => 3, 'tasint' => 4, 'diadif' => 5, 'capvie' => 6, 'capcap' => 7, 'intdev' => 8, 'intacum' => 9, 'adepre' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Npimppresoc1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Npimppresoc1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Npimppresoc1Peer::getTableMap();
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
		return str_replace(Npimppresoc1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Npimppresoc1Peer::CODEMP);

		$criteria->addSelectColumn(Npimppresoc1Peer::FECCOR);

		$criteria->addSelectColumn(Npimppresoc1Peer::FECINI);

		$criteria->addSelectColumn(Npimppresoc1Peer::FECFIN);

		$criteria->addSelectColumn(Npimppresoc1Peer::TASINT);

		$criteria->addSelectColumn(Npimppresoc1Peer::DIADIF);

		$criteria->addSelectColumn(Npimppresoc1Peer::CAPVIE);

		$criteria->addSelectColumn(Npimppresoc1Peer::CAPCAP);

		$criteria->addSelectColumn(Npimppresoc1Peer::INTDEV);

		$criteria->addSelectColumn(Npimppresoc1Peer::INTACUM);

		$criteria->addSelectColumn(Npimppresoc1Peer::ADEPRE);

		$criteria->addSelectColumn(Npimppresoc1Peer::ID);

	}

	const COUNT = 'COUNT(npimppresoc1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npimppresoc1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Npimppresoc1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Npimppresoc1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Npimppresoc1Peer::doSelectRS($criteria, $con);
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
		$objects = Npimppresoc1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Npimppresoc1Peer::populateObjects(Npimppresoc1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Npimppresoc1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Npimppresoc1Peer::getOMClass();
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
		return Npimppresoc1Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Npimppresoc1Peer::ID);
			$selectCriteria->add(Npimppresoc1Peer::ID, $criteria->remove(Npimppresoc1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Npimppresoc1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Npimppresoc1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npimppresoc1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Npimppresoc1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npimppresoc1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Npimppresoc1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Npimppresoc1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Npimppresoc1Peer::DATABASE_NAME, Npimppresoc1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Npimppresoc1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Npimppresoc1Peer::DATABASE_NAME);

		$criteria->add(Npimppresoc1Peer::ID, $pk);


		$v = Npimppresoc1Peer::doSelect($criteria, $con);

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
			$criteria->add(Npimppresoc1Peer::ID, $pks, Criteria::IN);
			$objs = Npimppresoc1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpimppresoc1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Npimppresoc1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Npimppresoc1MapBuilder');
}
