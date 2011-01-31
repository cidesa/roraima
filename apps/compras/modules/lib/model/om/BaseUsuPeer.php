<?php


abstract class BaseUsuPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'usuarios';

	
	const CLASS_DEFAULT = 'lib.model.Usu';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LOGUSE = 'usuarios.LOGUSE';

	
	const NOMUSE = 'usuarios.NOMUSE';

	
	const APLUSE = 'usuarios.APLUSE';

	
	const NUMEMP = 'usuarios.NUMEMP';

	
	const PASUSE = 'usuarios.PASUSE';

	
	const DIREMP = 'usuarios.DIREMP';

	
	const TELEMP = 'usuarios.TELEMP';

	
	const CEDEMP = 'usuarios.CEDEMP';

	
	const NUMUNI = 'usuarios.NUMUNI';

	
	const CODCAT = 'usuarios.CODCAT';

	
	const ID = 'usuarios.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Loguse', 'Nomuse', 'Apluse', 'Numemp', 'Pasuse', 'Diremp', 'Telemp', 'Cedemp', 'Numuni', 'Codcat', 'Id', ),
		BasePeer::TYPE_COLNAME => array (UsuPeer::LOGUSE, UsuPeer::NOMUSE, UsuPeer::APLUSE, UsuPeer::NUMEMP, UsuPeer::PASUSE, UsuPeer::DIREMP, UsuPeer::TELEMP, UsuPeer::CEDEMP, UsuPeer::NUMUNI, UsuPeer::CODCAT, UsuPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('loguse', 'nomuse', 'apluse', 'numemp', 'pasuse', 'diremp', 'telemp', 'cedemp', 'numuni', 'codcat', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Loguse' => 0, 'Nomuse' => 1, 'Apluse' => 2, 'Numemp' => 3, 'Pasuse' => 4, 'Diremp' => 5, 'Telemp' => 6, 'Cedemp' => 7, 'Numuni' => 8, 'Codcat' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (UsuPeer::LOGUSE => 0, UsuPeer::NOMUSE => 1, UsuPeer::APLUSE => 2, UsuPeer::NUMEMP => 3, UsuPeer::PASUSE => 4, UsuPeer::DIREMP => 5, UsuPeer::TELEMP => 6, UsuPeer::CEDEMP => 7, UsuPeer::NUMUNI => 8, UsuPeer::CODCAT => 9, UsuPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('loguse' => 0, 'nomuse' => 1, 'apluse' => 2, 'numemp' => 3, 'pasuse' => 4, 'diremp' => 5, 'telemp' => 6, 'cedemp' => 7, 'numuni' => 8, 'codcat' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/UsuMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.UsuMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UsuPeer::getTableMap();
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
		return str_replace(UsuPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UsuPeer::LOGUSE);

		$criteria->addSelectColumn(UsuPeer::NOMUSE);

		$criteria->addSelectColumn(UsuPeer::APLUSE);

		$criteria->addSelectColumn(UsuPeer::NUMEMP);

		$criteria->addSelectColumn(UsuPeer::PASUSE);

		$criteria->addSelectColumn(UsuPeer::DIREMP);

		$criteria->addSelectColumn(UsuPeer::TELEMP);

		$criteria->addSelectColumn(UsuPeer::CEDEMP);

		$criteria->addSelectColumn(UsuPeer::NUMUNI);

		$criteria->addSelectColumn(UsuPeer::CODCAT);

		$criteria->addSelectColumn(UsuPeer::ID);

	}

	const COUNT = 'COUNT(usuarios.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT usuarios.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UsuPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UsuPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = UsuPeer::doSelectRS($criteria, $con);
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
		$objects = UsuPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UsuPeer::populateObjects(UsuPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			UsuPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = UsuPeer::getOMClass();
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
		return UsuPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(UsuPeer::ID);
			$selectCriteria->add(UsuPeer::ID, $criteria->remove(UsuPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(UsuPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(UsuPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Usu) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UsuPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Usu $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UsuPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UsuPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(UsuPeer::DATABASE_NAME, UsuPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UsuPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(UsuPeer::DATABASE_NAME);

		$criteria->add(UsuPeer::ID, $pk);


		$v = UsuPeer::doSelect($criteria, $con);

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
			$criteria->add(UsuPeer::ID, $pks, Criteria::IN);
			$objs = UsuPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseUsuPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/UsuMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.UsuMapBuilder');
}
