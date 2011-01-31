<?php


abstract class BaseCsrecotrgasPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'csrecotrgas';

	
	const CLASS_DEFAULT = 'lib.model.Csrecotrgas';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPROD = 'csrecotrgas.CODPROD';

	
	const CODFAS = 'csrecotrgas.CODFAS';

	
	const CODGAS = 'csrecotrgas.CODGAS';

	
	const CANGAS = 'csrecotrgas.CANGAS';

	
	const COSTOT = 'csrecotrgas.COSTOT';

	
	const NROORD = 'csrecotrgas.NROORD';

	
	const COSGAS = 'csrecotrgas.COSGAS';

	
	const ID = 'csrecotrgas.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codprod', 'Codfas', 'Codgas', 'Cangas', 'Costot', 'Nroord', 'Cosgas', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CsrecotrgasPeer::CODPROD, CsrecotrgasPeer::CODFAS, CsrecotrgasPeer::CODGAS, CsrecotrgasPeer::CANGAS, CsrecotrgasPeer::COSTOT, CsrecotrgasPeer::NROORD, CsrecotrgasPeer::COSGAS, CsrecotrgasPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codprod', 'codfas', 'codgas', 'cangas', 'costot', 'nroord', 'cosgas', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codprod' => 0, 'Codfas' => 1, 'Codgas' => 2, 'Cangas' => 3, 'Costot' => 4, 'Nroord' => 5, 'Cosgas' => 6, 'Id' => 7, ),
		BasePeer::TYPE_COLNAME => array (CsrecotrgasPeer::CODPROD => 0, CsrecotrgasPeer::CODFAS => 1, CsrecotrgasPeer::CODGAS => 2, CsrecotrgasPeer::CANGAS => 3, CsrecotrgasPeer::COSTOT => 4, CsrecotrgasPeer::NROORD => 5, CsrecotrgasPeer::COSGAS => 6, CsrecotrgasPeer::ID => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('codprod' => 0, 'codfas' => 1, 'codgas' => 2, 'cangas' => 3, 'costot' => 4, 'nroord' => 5, 'cosgas' => 6, 'id' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CsrecotrgasMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CsrecotrgasMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CsrecotrgasPeer::getTableMap();
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
		return str_replace(CsrecotrgasPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CsrecotrgasPeer::CODPROD);

		$criteria->addSelectColumn(CsrecotrgasPeer::CODFAS);

		$criteria->addSelectColumn(CsrecotrgasPeer::CODGAS);

		$criteria->addSelectColumn(CsrecotrgasPeer::CANGAS);

		$criteria->addSelectColumn(CsrecotrgasPeer::COSTOT);

		$criteria->addSelectColumn(CsrecotrgasPeer::NROORD);

		$criteria->addSelectColumn(CsrecotrgasPeer::COSGAS);

		$criteria->addSelectColumn(CsrecotrgasPeer::ID);

	}

	const COUNT = 'COUNT(csrecotrgas.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT csrecotrgas.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CsrecotrgasPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CsrecotrgasPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CsrecotrgasPeer::doSelectRS($criteria, $con);
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
		$objects = CsrecotrgasPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CsrecotrgasPeer::populateObjects(CsrecotrgasPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CsrecotrgasPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CsrecotrgasPeer::getOMClass();
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
		return CsrecotrgasPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CsrecotrgasPeer::ID);
			$selectCriteria->add(CsrecotrgasPeer::ID, $criteria->remove(CsrecotrgasPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CsrecotrgasPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CsrecotrgasPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Csrecotrgas) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CsrecotrgasPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Csrecotrgas $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CsrecotrgasPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CsrecotrgasPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CsrecotrgasPeer::DATABASE_NAME, CsrecotrgasPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CsrecotrgasPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CsrecotrgasPeer::DATABASE_NAME);

		$criteria->add(CsrecotrgasPeer::ID, $pk);


		$v = CsrecotrgasPeer::doSelect($criteria, $con);

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
			$criteria->add(CsrecotrgasPeer::ID, $pks, Criteria::IN);
			$objs = CsrecotrgasPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCsrecotrgasPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CsrecotrgasMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CsrecotrgasMapBuilder');
}
