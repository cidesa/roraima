<?php


abstract class BaseNpdefvarPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npdefvar';

	
	const CLASS_DEFAULT = 'lib.model.Npdefvar';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODVAR = 'npdefvar.CODVAR';

	
	const DESVAR = 'npdefvar.DESVAR';

	
	const CODNOM = 'npdefvar.CODNOM';

	
	const VALOR1 = 'npdefvar.VALOR1';

	
	const VALOR2 = 'npdefvar.VALOR2';

	
	const VALOR3 = 'npdefvar.VALOR3';

	
	const VALOR4 = 'npdefvar.VALOR4';

	
	const VALOR5 = 'npdefvar.VALOR5';

	
	const ID = 'npdefvar.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codvar', 'Desvar', 'Codnom', 'Valor1', 'Valor2', 'Valor3', 'Valor4', 'Valor5', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpdefvarPeer::CODVAR, NpdefvarPeer::DESVAR, NpdefvarPeer::CODNOM, NpdefvarPeer::VALOR1, NpdefvarPeer::VALOR2, NpdefvarPeer::VALOR3, NpdefvarPeer::VALOR4, NpdefvarPeer::VALOR5, NpdefvarPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codvar', 'desvar', 'codnom', 'valor1', 'valor2', 'valor3', 'valor4', 'valor5', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codvar' => 0, 'Desvar' => 1, 'Codnom' => 2, 'Valor1' => 3, 'Valor2' => 4, 'Valor3' => 5, 'Valor4' => 6, 'Valor5' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (NpdefvarPeer::CODVAR => 0, NpdefvarPeer::DESVAR => 1, NpdefvarPeer::CODNOM => 2, NpdefvarPeer::VALOR1 => 3, NpdefvarPeer::VALOR2 => 4, NpdefvarPeer::VALOR3 => 5, NpdefvarPeer::VALOR4 => 6, NpdefvarPeer::VALOR5 => 7, NpdefvarPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('codvar' => 0, 'desvar' => 1, 'codnom' => 2, 'valor1' => 3, 'valor2' => 4, 'valor3' => 5, 'valor4' => 6, 'valor5' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NpdefvarMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NpdefvarMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpdefvarPeer::getTableMap();
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
		return str_replace(NpdefvarPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpdefvarPeer::CODVAR);

		$criteria->addSelectColumn(NpdefvarPeer::DESVAR);

		$criteria->addSelectColumn(NpdefvarPeer::CODNOM);

		$criteria->addSelectColumn(NpdefvarPeer::VALOR1);

		$criteria->addSelectColumn(NpdefvarPeer::VALOR2);

		$criteria->addSelectColumn(NpdefvarPeer::VALOR3);

		$criteria->addSelectColumn(NpdefvarPeer::VALOR4);

		$criteria->addSelectColumn(NpdefvarPeer::VALOR5);

		$criteria->addSelectColumn(NpdefvarPeer::ID);

	}

	const COUNT = 'COUNT(npdefvar.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npdefvar.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpdefvarPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpdefvarPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpdefvarPeer::doSelectRS($criteria, $con);
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
		$objects = NpdefvarPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpdefvarPeer::populateObjects(NpdefvarPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpdefvarPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpdefvarPeer::getOMClass();
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
		return NpdefvarPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(NpdefvarPeer::ID);
			$selectCriteria->add(NpdefvarPeer::ID, $criteria->remove(NpdefvarPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpdefvarPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpdefvarPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npdefvar) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpdefvarPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npdefvar $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpdefvarPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpdefvarPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpdefvarPeer::DATABASE_NAME, NpdefvarPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpdefvarPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpdefvarPeer::DATABASE_NAME);

		$criteria->add(NpdefvarPeer::ID, $pk);


		$v = NpdefvarPeer::doSelect($criteria, $con);

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
			$criteria->add(NpdefvarPeer::ID, $pks, Criteria::IN);
			$objs = NpdefvarPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpdefvarPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NpdefvarMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NpdefvarMapBuilder');
}
