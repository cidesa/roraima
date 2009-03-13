<?php


abstract class BaseNpinfadiPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinfadi';

	
	const CLASS_DEFAULT = 'lib.model.Npinfadi';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npinfadi.CODEMP';

	
	const NOMTIT = 'npinfadi.NOMTIT';

	
	const DESCUR = 'npinfadi.DESCUR';

	
	const INSTIT = 'npinfadi.INSTIT';

	
	const DURCUR = 'npinfadi.DURCUR';

	
	const FECINI = 'npinfadi.FECINI';

	
	const FECFIN = 'npinfadi.FECFIN';

	
	const NIVEST = 'npinfadi.NIVEST';

	
	const DIAINI = 'npinfadi.DIAINI';

	
	const MESINI = 'npinfadi.MESINI';

	
	const ANOINI = 'npinfadi.ANOINI';

	
	const DIAFIN = 'npinfadi.DIAFIN';

	
	const MESFIN = 'npinfadi.MESFIN';

	
	const ANOFIN = 'npinfadi.ANOFIN';

	
	const ID = 'npinfadi.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomtit', 'Descur', 'Instit', 'Durcur', 'Fecini', 'Fecfin', 'Nivest', 'Diaini', 'Mesini', 'Anoini', 'Diafin', 'Mesfin', 'Anofin', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinfadiPeer::CODEMP, NpinfadiPeer::NOMTIT, NpinfadiPeer::DESCUR, NpinfadiPeer::INSTIT, NpinfadiPeer::DURCUR, NpinfadiPeer::FECINI, NpinfadiPeer::FECFIN, NpinfadiPeer::NIVEST, NpinfadiPeer::DIAINI, NpinfadiPeer::MESINI, NpinfadiPeer::ANOINI, NpinfadiPeer::DIAFIN, NpinfadiPeer::MESFIN, NpinfadiPeer::ANOFIN, NpinfadiPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomtit', 'descur', 'instit', 'durcur', 'fecini', 'fecfin', 'nivest', 'diaini', 'mesini', 'anoini', 'diafin', 'mesfin', 'anofin', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomtit' => 1, 'Descur' => 2, 'Instit' => 3, 'Durcur' => 4, 'Fecini' => 5, 'Fecfin' => 6, 'Nivest' => 7, 'Diaini' => 8, 'Mesini' => 9, 'Anoini' => 10, 'Diafin' => 11, 'Mesfin' => 12, 'Anofin' => 13, 'Id' => 14, ),
		BasePeer::TYPE_COLNAME => array (NpinfadiPeer::CODEMP => 0, NpinfadiPeer::NOMTIT => 1, NpinfadiPeer::DESCUR => 2, NpinfadiPeer::INSTIT => 3, NpinfadiPeer::DURCUR => 4, NpinfadiPeer::FECINI => 5, NpinfadiPeer::FECFIN => 6, NpinfadiPeer::NIVEST => 7, NpinfadiPeer::DIAINI => 8, NpinfadiPeer::MESINI => 9, NpinfadiPeer::ANOINI => 10, NpinfadiPeer::DIAFIN => 11, NpinfadiPeer::MESFIN => 12, NpinfadiPeer::ANOFIN => 13, NpinfadiPeer::ID => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomtit' => 1, 'descur' => 2, 'instit' => 3, 'durcur' => 4, 'fecini' => 5, 'fecfin' => 6, 'nivest' => 7, 'diaini' => 8, 'mesini' => 9, 'anoini' => 10, 'diafin' => 11, 'mesfin' => 12, 'anofin' => 13, 'id' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpinfadiMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpinfadiMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinfadiPeer::getTableMap();
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
		return str_replace(NpinfadiPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinfadiPeer::CODEMP);

		$criteria->addSelectColumn(NpinfadiPeer::NOMTIT);

		$criteria->addSelectColumn(NpinfadiPeer::DESCUR);

		$criteria->addSelectColumn(NpinfadiPeer::INSTIT);

		$criteria->addSelectColumn(NpinfadiPeer::DURCUR);

		$criteria->addSelectColumn(NpinfadiPeer::FECINI);

		$criteria->addSelectColumn(NpinfadiPeer::FECFIN);

		$criteria->addSelectColumn(NpinfadiPeer::NIVEST);

		$criteria->addSelectColumn(NpinfadiPeer::DIAINI);

		$criteria->addSelectColumn(NpinfadiPeer::MESINI);

		$criteria->addSelectColumn(NpinfadiPeer::ANOINI);

		$criteria->addSelectColumn(NpinfadiPeer::DIAFIN);

		$criteria->addSelectColumn(NpinfadiPeer::MESFIN);

		$criteria->addSelectColumn(NpinfadiPeer::ANOFIN);

		$criteria->addSelectColumn(NpinfadiPeer::ID);

	}

	const COUNT = 'COUNT(npinfadi.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinfadi.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinfadiPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinfadiPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinfadiPeer::doSelectRS($criteria, $con);
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
		$objects = NpinfadiPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinfadiPeer::populateObjects(NpinfadiPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinfadiPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinfadiPeer::getOMClass();
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
		return NpinfadiPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinfadiPeer::ID); 

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
			$comparison = $criteria->getComparison(NpinfadiPeer::ID);
			$selectCriteria->add(NpinfadiPeer::ID, $criteria->remove(NpinfadiPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinfadiPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinfadiPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinfadi) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinfadiPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npinfadi $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinfadiPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinfadiPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinfadiPeer::DATABASE_NAME, NpinfadiPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinfadiPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinfadiPeer::DATABASE_NAME);

		$criteria->add(NpinfadiPeer::ID, $pk);


		$v = NpinfadiPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinfadiPeer::ID, $pks, Criteria::IN);
			$objs = NpinfadiPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinfadiPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpinfadiMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpinfadiMapBuilder');
}
