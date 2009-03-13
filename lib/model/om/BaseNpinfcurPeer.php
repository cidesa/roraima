<?php


abstract class BaseNpinfcurPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinfcur';

	
	const CLASS_DEFAULT = 'lib.model.Npinfcur';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npinfcur.CODEMP';

	
	const NOMTIT = 'npinfcur.NOMTIT';

	
	const DESCUR = 'npinfcur.DESCUR';

	
	const INSTIT = 'npinfcur.INSTIT';

	
	const DURCUR = 'npinfcur.DURCUR';

	
	const ANOCUL = 'npinfcur.ANOCUL';

	
	const CODPROFES = 'npinfcur.CODPROFES';

	
	const ACTIVO = 'npinfcur.ACTIVO';

	
	const ID = 'npinfcur.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomtit', 'Descur', 'Instit', 'Durcur', 'Anocul', 'Codprofes', 'Activo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinfcurPeer::CODEMP, NpinfcurPeer::NOMTIT, NpinfcurPeer::DESCUR, NpinfcurPeer::INSTIT, NpinfcurPeer::DURCUR, NpinfcurPeer::ANOCUL, NpinfcurPeer::CODPROFES, NpinfcurPeer::ACTIVO, NpinfcurPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomtit', 'descur', 'instit', 'durcur', 'anocul', 'codprofes', 'activo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomtit' => 1, 'Descur' => 2, 'Instit' => 3, 'Durcur' => 4, 'Anocul' => 5, 'Codprofes' => 6, 'Activo' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpinfcurPeer::CODEMP => 0, NpinfcurPeer::NOMTIT => 1, NpinfcurPeer::DESCUR => 2, NpinfcurPeer::INSTIT => 3, NpinfcurPeer::DURCUR => 4, NpinfcurPeer::ANOCUL => 5, NpinfcurPeer::CODPROFES => 6, NpinfcurPeer::ACTIVO => 7, NpinfcurPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomtit' => 1, 'descur' => 2, 'instit' => 3, 'durcur' => 4, 'anocul' => 5, 'codprofes' => 6, 'activo' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpinfcurMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpinfcurMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinfcurPeer::getTableMap();
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
		return str_replace(NpinfcurPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinfcurPeer::CODEMP);

		$criteria->addSelectColumn(NpinfcurPeer::NOMTIT);

		$criteria->addSelectColumn(NpinfcurPeer::DESCUR);

		$criteria->addSelectColumn(NpinfcurPeer::INSTIT);

		$criteria->addSelectColumn(NpinfcurPeer::DURCUR);

		$criteria->addSelectColumn(NpinfcurPeer::ANOCUL);

		$criteria->addSelectColumn(NpinfcurPeer::CODPROFES);

		$criteria->addSelectColumn(NpinfcurPeer::ACTIVO);

		$criteria->addSelectColumn(NpinfcurPeer::ID);

	}

	const COUNT = 'COUNT(npinfcur.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinfcur.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinfcurPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinfcurPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinfcurPeer::doSelectRS($criteria, $con);
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
		$objects = NpinfcurPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinfcurPeer::populateObjects(NpinfcurPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinfcurPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinfcurPeer::getOMClass();
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
		return NpinfcurPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinfcurPeer::ID); 

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
			$comparison = $criteria->getComparison(NpinfcurPeer::ID);
			$selectCriteria->add(NpinfcurPeer::ID, $criteria->remove(NpinfcurPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinfcurPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinfcurPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinfcur) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinfcurPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npinfcur $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinfcurPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinfcurPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinfcurPeer::DATABASE_NAME, NpinfcurPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinfcurPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinfcurPeer::DATABASE_NAME);

		$criteria->add(NpinfcurPeer::ID, $pk);


		$v = NpinfcurPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinfcurPeer::ID, $pks, Criteria::IN);
			$objs = NpinfcurPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinfcurPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpinfcurMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpinfcurMapBuilder');
}
