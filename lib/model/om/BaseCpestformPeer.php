<?php


abstract class BaseCpestformPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cpestform';

	
	const CLASS_DEFAULT = 'lib.model.Cpestform';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRE = 'cpestform.CODPRE';

	
	const NOMPRE = 'cpestform.NOMPRE';

	
	const ANOMES = 'cpestform.ANOMES';

	
	const ESTIMADO = 'cpestform.ESTIMADO';

	
	const REAL = 'cpestform.REAL';

	
	const DIFERENCIA = 'cpestform.DIFERENCIA';

	
	const PORC = 'cpestform.PORC';

	
	const ESTIMADO2 = 'cpestform.ESTIMADO2';

	
	const REAL2 = 'cpestform.REAL2';

	
	const DIFERENCIA2 = 'cpestform.DIFERENCIA2';

	
	const PORC2 = 'cpestform.PORC2';

	
	const PERPRE = 'cpestform.PERPRE';

	
	const ID = 'cpestform.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre', 'Nompre', 'Anomes', 'Estimado', 'Real', 'Diferencia', 'Porc', 'Estimado2', 'Real2', 'Diferencia2', 'Porc2', 'Perpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CpestformPeer::CODPRE, CpestformPeer::NOMPRE, CpestformPeer::ANOMES, CpestformPeer::ESTIMADO, CpestformPeer::REAL, CpestformPeer::DIFERENCIA, CpestformPeer::PORC, CpestformPeer::ESTIMADO2, CpestformPeer::REAL2, CpestformPeer::DIFERENCIA2, CpestformPeer::PORC2, CpestformPeer::PERPRE, CpestformPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre', 'nompre', 'anomes', 'estimado', 'real', 'diferencia', 'porc', 'estimado2', 'real2', 'diferencia2', 'porc2', 'perpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpre' => 0, 'Nompre' => 1, 'Anomes' => 2, 'Estimado' => 3, 'Real' => 4, 'Diferencia' => 5, 'Porc' => 6, 'Estimado2' => 7, 'Real2' => 8, 'Diferencia2' => 9, 'Porc2' => 10, 'Perpre' => 11, 'Id' => 12, ),
		BasePeer::TYPE_COLNAME => array (CpestformPeer::CODPRE => 0, CpestformPeer::NOMPRE => 1, CpestformPeer::ANOMES => 2, CpestformPeer::ESTIMADO => 3, CpestformPeer::REAL => 4, CpestformPeer::DIFERENCIA => 5, CpestformPeer::PORC => 6, CpestformPeer::ESTIMADO2 => 7, CpestformPeer::REAL2 => 8, CpestformPeer::DIFERENCIA2 => 9, CpestformPeer::PORC2 => 10, CpestformPeer::PERPRE => 11, CpestformPeer::ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('codpre' => 0, 'nompre' => 1, 'anomes' => 2, 'estimado' => 3, 'real' => 4, 'diferencia' => 5, 'porc' => 6, 'estimado2' => 7, 'real2' => 8, 'diferencia2' => 9, 'porc2' => 10, 'perpre' => 11, 'id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CpestformMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CpestformMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CpestformPeer::getTableMap();
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
		return str_replace(CpestformPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CpestformPeer::CODPRE);

		$criteria->addSelectColumn(CpestformPeer::NOMPRE);

		$criteria->addSelectColumn(CpestformPeer::ANOMES);

		$criteria->addSelectColumn(CpestformPeer::ESTIMADO);

		$criteria->addSelectColumn(CpestformPeer::REAL);

		$criteria->addSelectColumn(CpestformPeer::DIFERENCIA);

		$criteria->addSelectColumn(CpestformPeer::PORC);

		$criteria->addSelectColumn(CpestformPeer::ESTIMADO2);

		$criteria->addSelectColumn(CpestformPeer::REAL2);

		$criteria->addSelectColumn(CpestformPeer::DIFERENCIA2);

		$criteria->addSelectColumn(CpestformPeer::PORC2);

		$criteria->addSelectColumn(CpestformPeer::PERPRE);

		$criteria->addSelectColumn(CpestformPeer::ID);

	}

	const COUNT = 'COUNT(cpestform.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cpestform.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CpestformPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CpestformPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CpestformPeer::doSelectRS($criteria, $con);
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
		$objects = CpestformPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CpestformPeer::populateObjects(CpestformPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CpestformPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CpestformPeer::getOMClass();
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
		return CpestformPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CpestformPeer::ID);
			$selectCriteria->add(CpestformPeer::ID, $criteria->remove(CpestformPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CpestformPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CpestformPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cpestform) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CpestformPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cpestform $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CpestformPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CpestformPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CpestformPeer::DATABASE_NAME, CpestformPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CpestformPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CpestformPeer::DATABASE_NAME);

		$criteria->add(CpestformPeer::ID, $pk);


		$v = CpestformPeer::doSelect($criteria, $con);

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
			$criteria->add(CpestformPeer::ID, $pks, Criteria::IN);
			$objs = CpestformPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCpestformPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CpestformMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CpestformMapBuilder');
}
