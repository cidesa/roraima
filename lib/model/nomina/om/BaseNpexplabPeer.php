<?php


abstract class BaseNpexplabPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npexplab';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npexplab';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODEMP = 'npexplab.CODEMP';

	
	const NOMEMP = 'npexplab.NOMEMP';

	
	const CODCAR = 'npexplab.CODCAR';

	
	const DESCAR = 'npexplab.DESCAR';

	
	const FECINI = 'npexplab.FECINI';

	
	const FECTER = 'npexplab.FECTER';

	
	const SUEOBT = 'npexplab.SUEOBT';

	
	const STACAR = 'npexplab.STACAR';

	
	const COMPOBT = 'npexplab.COMPOBT';

	
	const DUREXP = 'npexplab.DUREXP';

	
	const TIPORG = 'npexplab.TIPORG';

	
	const ID = 'npexplab.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp', 'Nomemp', 'Codcar', 'Descar', 'Fecini', 'Fecter', 'Sueobt', 'Stacar', 'Compobt', 'Durexp', 'Tiporg', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpexplabPeer::CODEMP, NpexplabPeer::NOMEMP, NpexplabPeer::CODCAR, NpexplabPeer::DESCAR, NpexplabPeer::FECINI, NpexplabPeer::FECTER, NpexplabPeer::SUEOBT, NpexplabPeer::STACAR, NpexplabPeer::COMPOBT, NpexplabPeer::DUREXP, NpexplabPeer::TIPORG, NpexplabPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp', 'nomemp', 'codcar', 'descar', 'fecini', 'fecter', 'sueobt', 'stacar', 'compobt', 'durexp', 'tiporg', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codemp' => 0, 'Nomemp' => 1, 'Codcar' => 2, 'Descar' => 3, 'Fecini' => 4, 'Fecter' => 5, 'Sueobt' => 6, 'Stacar' => 7, 'Compobt' => 8, 'Durexp' => 9, 'Tiporg' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (NpexplabPeer::CODEMP => 0, NpexplabPeer::NOMEMP => 1, NpexplabPeer::CODCAR => 2, NpexplabPeer::DESCAR => 3, NpexplabPeer::FECINI => 4, NpexplabPeer::FECTER => 5, NpexplabPeer::SUEOBT => 6, NpexplabPeer::STACAR => 7, NpexplabPeer::COMPOBT => 8, NpexplabPeer::DUREXP => 9, NpexplabPeer::TIPORG => 10, NpexplabPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('codemp' => 0, 'nomemp' => 1, 'codcar' => 2, 'descar' => 3, 'fecini' => 4, 'fecter' => 5, 'sueobt' => 6, 'stacar' => 7, 'compobt' => 8, 'durexp' => 9, 'tiporg' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpexplabMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpexplabMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpexplabPeer::getTableMap();
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
		return str_replace(NpexplabPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpexplabPeer::CODEMP);

		$criteria->addSelectColumn(NpexplabPeer::NOMEMP);

		$criteria->addSelectColumn(NpexplabPeer::CODCAR);

		$criteria->addSelectColumn(NpexplabPeer::DESCAR);

		$criteria->addSelectColumn(NpexplabPeer::FECINI);

		$criteria->addSelectColumn(NpexplabPeer::FECTER);

		$criteria->addSelectColumn(NpexplabPeer::SUEOBT);

		$criteria->addSelectColumn(NpexplabPeer::STACAR);

		$criteria->addSelectColumn(NpexplabPeer::COMPOBT);

		$criteria->addSelectColumn(NpexplabPeer::DUREXP);

		$criteria->addSelectColumn(NpexplabPeer::TIPORG);

		$criteria->addSelectColumn(NpexplabPeer::ID);

	}

	const COUNT = 'COUNT(npexplab.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npexplab.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpexplabPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpexplabPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpexplabPeer::doSelectRS($criteria, $con);
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
		$objects = NpexplabPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpexplabPeer::populateObjects(NpexplabPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpexplabPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpexplabPeer::getOMClass();
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
		return NpexplabPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpexplabPeer::ID); 

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
			$comparison = $criteria->getComparison(NpexplabPeer::ID);
			$selectCriteria->add(NpexplabPeer::ID, $criteria->remove(NpexplabPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpexplabPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpexplabPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npexplab) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpexplabPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npexplab $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpexplabPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpexplabPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpexplabPeer::DATABASE_NAME, NpexplabPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpexplabPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpexplabPeer::DATABASE_NAME);

		$criteria->add(NpexplabPeer::ID, $pk);


		$v = NpexplabPeer::doSelect($criteria, $con);

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
			$criteria->add(NpexplabPeer::ID, $pks, Criteria::IN);
			$objs = NpexplabPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpexplabPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpexplabMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpexplabMapBuilder');
}
