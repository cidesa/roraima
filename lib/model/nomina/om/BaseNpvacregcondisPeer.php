<?php


abstract class BaseNpvacregcondisPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npvacregcondis';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npvacregcondis';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npvacregcondis.CODEMP';

	
	const CODNOM = 'npvacregcondis.CODNOM';

	
	const FECHASALIDA = 'npvacregcondis.FECHASALIDA';

	
	const FECHAENTRADA = 'npvacregcondis.FECHAENTRADA';

	
	const FECHANOMINA = 'npvacregcondis.FECHANOMINA';

	
	const DIADIS = 'npvacregcondis.DIADIS';

	
	const ID = 'npvacregcondis.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Codnom', 'Fechasalida', 'Fechaentrada', 'Fechanomina', 'Diadis', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpvacregcondisPeer::CODEMP, NpvacregcondisPeer::CODNOM, NpvacregcondisPeer::FECHASALIDA, NpvacregcondisPeer::FECHAENTRADA, NpvacregcondisPeer::FECHANOMINA, NpvacregcondisPeer::DIADIS, NpvacregcondisPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'codnom', 'fechasalida', 'fechaentrada', 'fechanomina', 'diadis', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Codnom' => 1, 'Fechasalida' => 2, 'Fechaentrada' => 3, 'Fechanomina' => 4, 'Diadis' => 5, 'Id' => 6, ),
		BasePeer::TYPE_COLNAME => array (NpvacregcondisPeer::CODEMP => 0, NpvacregcondisPeer::CODNOM => 1, NpvacregcondisPeer::FECHASALIDA => 2, NpvacregcondisPeer::FECHAENTRADA => 3, NpvacregcondisPeer::FECHANOMINA => 4, NpvacregcondisPeer::DIADIS => 5, NpvacregcondisPeer::ID => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'codnom' => 1, 'fechasalida' => 2, 'fechaentrada' => 3, 'fechanomina' => 4, 'diadis' => 5, 'id' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpvacregcondisMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpvacregcondisMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpvacregcondisPeer::getTableMap();
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
		return str_replace(NpvacregcondisPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpvacregcondisPeer::CODEMP);

		$criteria->addSelectColumn(NpvacregcondisPeer::CODNOM);

		$criteria->addSelectColumn(NpvacregcondisPeer::FECHASALIDA);

		$criteria->addSelectColumn(NpvacregcondisPeer::FECHAENTRADA);

		$criteria->addSelectColumn(NpvacregcondisPeer::FECHANOMINA);

		$criteria->addSelectColumn(NpvacregcondisPeer::DIADIS);

		$criteria->addSelectColumn(NpvacregcondisPeer::ID);

	}

	const COUNT = 'COUNT(npvacregcondis.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npvacregcondis.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpvacregcondisPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpvacregcondisPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpvacregcondisPeer::doSelectRS($criteria, $con);
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
		$objects = NpvacregcondisPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpvacregcondisPeer::populateObjects(NpvacregcondisPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpvacregcondisPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpvacregcondisPeer::getOMClass();
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
		return NpvacregcondisPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpvacregcondisPeer::ID); 

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
			$comparison = $criteria->getComparison(NpvacregcondisPeer::ID);
			$selectCriteria->add(NpvacregcondisPeer::ID, $criteria->remove(NpvacregcondisPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpvacregcondisPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpvacregcondisPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npvacregcondis) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpvacregcondisPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npvacregcondis $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpvacregcondisPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpvacregcondisPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpvacregcondisPeer::DATABASE_NAME, NpvacregcondisPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpvacregcondisPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpvacregcondisPeer::DATABASE_NAME);

		$criteria->add(NpvacregcondisPeer::ID, $pk);


		$v = NpvacregcondisPeer::doSelect($criteria, $con);

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
			$criteria->add(NpvacregcondisPeer::ID, $pks, Criteria::IN);
			$objs = NpvacregcondisPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpvacregcondisPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpvacregcondisMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpvacregcondisMapBuilder');
}
