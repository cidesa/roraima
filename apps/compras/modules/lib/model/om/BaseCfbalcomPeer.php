<?php


abstract class BaseCfbalcomPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cfbalcom';

	
	const CLASS_DEFAULT = 'lib.model.Cfbalcom';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ORDEN = 'cfbalcom.ORDEN';

	
	const TITULO = 'cfbalcom.TITULO';

	
	const CUENTA = 'cfbalcom.CUENTA';

	
	const NOMBRE = 'cfbalcom.NOMBRE';

	
	const DEBITO = 'cfbalcom.DEBITO';

	
	const CREDITO = 'cfbalcom.CREDITO';

	
	const SALDO = 'cfbalcom.SALDO';

	
	const CARGABLE = 'cfbalcom.CARGABLE';

	
	const ID = 'cfbalcom.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Orden', 'Titulo', 'Cuenta', 'Nombre', 'Debito', 'Credito', 'Saldo', 'Cargable', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CfbalcomPeer::ORDEN, CfbalcomPeer::TITULO, CfbalcomPeer::CUENTA, CfbalcomPeer::NOMBRE, CfbalcomPeer::DEBITO, CfbalcomPeer::CREDITO, CfbalcomPeer::SALDO, CfbalcomPeer::CARGABLE, CfbalcomPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('orden', 'titulo', 'cuenta', 'nombre', 'debito', 'credito', 'saldo', 'cargable', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Orden' => 0, 'Titulo' => 1, 'Cuenta' => 2, 'Nombre' => 3, 'Debito' => 4, 'Credito' => 5, 'Saldo' => 6, 'Cargable' => 7, 'Id' => 8, ),
		BasePeer::TYPE_COLNAME => array (CfbalcomPeer::ORDEN => 0, CfbalcomPeer::TITULO => 1, CfbalcomPeer::CUENTA => 2, CfbalcomPeer::NOMBRE => 3, CfbalcomPeer::DEBITO => 4, CfbalcomPeer::CREDITO => 5, CfbalcomPeer::SALDO => 6, CfbalcomPeer::CARGABLE => 7, CfbalcomPeer::ID => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('orden' => 0, 'titulo' => 1, 'cuenta' => 2, 'nombre' => 3, 'debito' => 4, 'credito' => 5, 'saldo' => 6, 'cargable' => 7, 'id' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CfbalcomMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CfbalcomMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CfbalcomPeer::getTableMap();
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
		return str_replace(CfbalcomPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CfbalcomPeer::ORDEN);

		$criteria->addSelectColumn(CfbalcomPeer::TITULO);

		$criteria->addSelectColumn(CfbalcomPeer::CUENTA);

		$criteria->addSelectColumn(CfbalcomPeer::NOMBRE);

		$criteria->addSelectColumn(CfbalcomPeer::DEBITO);

		$criteria->addSelectColumn(CfbalcomPeer::CREDITO);

		$criteria->addSelectColumn(CfbalcomPeer::SALDO);

		$criteria->addSelectColumn(CfbalcomPeer::CARGABLE);

		$criteria->addSelectColumn(CfbalcomPeer::ID);

	}

	const COUNT = 'COUNT(cfbalcom.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cfbalcom.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CfbalcomPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CfbalcomPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CfbalcomPeer::doSelectRS($criteria, $con);
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
		$objects = CfbalcomPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CfbalcomPeer::populateObjects(CfbalcomPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CfbalcomPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CfbalcomPeer::getOMClass();
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
		return CfbalcomPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(CfbalcomPeer::ID);
			$selectCriteria->add(CfbalcomPeer::ID, $criteria->remove(CfbalcomPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CfbalcomPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CfbalcomPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cfbalcom) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CfbalcomPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cfbalcom $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CfbalcomPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CfbalcomPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CfbalcomPeer::DATABASE_NAME, CfbalcomPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CfbalcomPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CfbalcomPeer::DATABASE_NAME);

		$criteria->add(CfbalcomPeer::ID, $pk);


		$v = CfbalcomPeer::doSelect($criteria, $con);

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
			$criteria->add(CfbalcomPeer::ID, $pks, Criteria::IN);
			$objs = CfbalcomPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCfbalcomPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CfbalcomMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CfbalcomMapBuilder');
}
