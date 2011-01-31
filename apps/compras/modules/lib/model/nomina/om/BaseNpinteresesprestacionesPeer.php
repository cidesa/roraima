<?php


abstract class BaseNpinteresesprestacionesPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npinteresesprestaciones';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npinteresesprestaciones';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOM = 'npinteresesprestaciones.CODNOM';

	
	const CODEMP = 'npinteresesprestaciones.CODEMP';

	
	const FECPAGO = 'npinteresesprestaciones.FECPAGO';

	
	const FECCALCULO = 'npinteresesprestaciones.FECCALCULO';

	
	const ACUFONDOANTIGUEDAD = 'npinteresesprestaciones.ACUFONDOANTIGUEDAD';

	
	const ACUINTERES = 'npinteresesprestaciones.ACUINTERES';

	
	const ID = 'npinteresesprestaciones.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom', 'Codemp', 'Fecpago', 'Feccalculo', 'Acufondoantiguedad', 'Acuinteres', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpinteresesprestacionesPeer::CODNOM, NpinteresesprestacionesPeer::CODEMP, NpinteresesprestacionesPeer::FECPAGO, NpinteresesprestacionesPeer::FECCALCULO, NpinteresesprestacionesPeer::ACUFONDOANTIGUEDAD, NpinteresesprestacionesPeer::ACUINTERES, NpinteresesprestacionesPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom', 'codemp', 'fecpago', 'feccalculo', 'acufondoantiguedad', 'acuinteres', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnom' => 0, 'Codemp' => 1, 'Fecpago' => 2, 'Feccalculo' => 3, 'Acufondoantiguedad' => 4, 'Acuinteres' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (NpinteresesprestacionesPeer::CODNOM => 0, NpinteresesprestacionesPeer::CODEMP => 1, NpinteresesprestacionesPeer::FECPAGO => 2, NpinteresesprestacionesPeer::FECCALCULO => 3, NpinteresesprestacionesPeer::ACUFONDOANTIGUEDAD => 4, NpinteresesprestacionesPeer::ACUINTERES => 5, NpinteresesprestacionesPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codnom' => 0, 'codemp' => 1, 'fecpago' => 2, 'feccalculo' => 3, 'acufondoantiguedad' => 4, 'acuinteres' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpinteresesprestacionesMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpinteresesprestacionesMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpinteresesprestacionesPeer::getTableMap();
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
		return str_replace(NpinteresesprestacionesPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::CODNOM);

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::CODEMP);

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::FECPAGO);

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::FECCALCULO);

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::ACUFONDOANTIGUEDAD);

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::ACUINTERES);

		$criteria->addSelectColumn(NpinteresesprestacionesPeer::ID);

	}

	const COUNT = 'COUNT(npinteresesprestaciones.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npinteresesprestaciones.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpinteresesprestacionesPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpinteresesprestacionesPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpinteresesprestacionesPeer::doSelectRS($criteria, $con);
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
		$objects = NpinteresesprestacionesPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpinteresesprestacionesPeer::populateObjects(NpinteresesprestacionesPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpinteresesprestacionesPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpinteresesprestacionesPeer::getOMClass();
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
		return NpinteresesprestacionesPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpinteresesprestacionesPeer::ID); 

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
			$comparison = $criteria->getComparison(NpinteresesprestacionesPeer::ID);
			$selectCriteria->add(NpinteresesprestacionesPeer::ID, $criteria->remove(NpinteresesprestacionesPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpinteresesprestacionesPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpinteresesprestacionesPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npinteresesprestaciones) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpinteresesprestacionesPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npinteresesprestaciones $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpinteresesprestacionesPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpinteresesprestacionesPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpinteresesprestacionesPeer::DATABASE_NAME, NpinteresesprestacionesPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpinteresesprestacionesPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpinteresesprestacionesPeer::DATABASE_NAME);

		$criteria->add(NpinteresesprestacionesPeer::ID, $pk);


		$v = NpinteresesprestacionesPeer::doSelect($criteria, $con);

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
			$criteria->add(NpinteresesprestacionesPeer::ID, $pks, Criteria::IN);
			$objs = NpinteresesprestacionesPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpinteresesprestacionesPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpinteresesprestacionesMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpinteresesprestacionesMapBuilder');
}
