<?php


abstract class BaseUsuariosPeer {

	
	const DATABASE_NAME = 'sima_user';

	
	const TABLE_NAME = 'usuarios';

	
	const CLASS_DEFAULT = 'lib.model.Usuarios';

	
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
		BasePeer::TYPE_COLNAME => array (UsuariosPeer::LOGUSE, UsuariosPeer::NOMUSE, UsuariosPeer::APLUSE, UsuariosPeer::NUMEMP, UsuariosPeer::PASUSE, UsuariosPeer::DIREMP, UsuariosPeer::TELEMP, UsuariosPeer::CEDEMP, UsuariosPeer::NUMUNI, UsuariosPeer::CODCAT, UsuariosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('loguse', 'nomuse', 'apluse', 'numemp', 'pasuse', 'diremp', 'telemp', 'cedemp', 'numuni', 'codcat', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Loguse' => 0, 'Nomuse' => 1, 'Apluse' => 2, 'Numemp' => 3, 'Pasuse' => 4, 'Diremp' => 5, 'Telemp' => 6, 'Cedemp' => 7, 'Numuni' => 8, 'Codcat' => 9, 'Id' => 10, ),
		BasePeer::TYPE_COLNAME => array (UsuariosPeer::LOGUSE => 0, UsuariosPeer::NOMUSE => 1, UsuariosPeer::APLUSE => 2, UsuariosPeer::NUMEMP => 3, UsuariosPeer::PASUSE => 4, UsuariosPeer::DIREMP => 5, UsuariosPeer::TELEMP => 6, UsuariosPeer::CEDEMP => 7, UsuariosPeer::NUMUNI => 8, UsuariosPeer::CODCAT => 9, UsuariosPeer::ID => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('loguse' => 0, 'nomuse' => 1, 'apluse' => 2, 'numemp' => 3, 'pasuse' => 4, 'diremp' => 5, 'telemp' => 6, 'cedemp' => 7, 'numuni' => 8, 'codcat' => 9, 'id' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/UsuariosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.UsuariosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = UsuariosPeer::getTableMap();
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
		return str_replace(UsuariosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(UsuariosPeer::LOGUSE);

		$criteria->addSelectColumn(UsuariosPeer::NOMUSE);

		$criteria->addSelectColumn(UsuariosPeer::APLUSE);

		$criteria->addSelectColumn(UsuariosPeer::NUMEMP);

		$criteria->addSelectColumn(UsuariosPeer::PASUSE);

		$criteria->addSelectColumn(UsuariosPeer::DIREMP);

		$criteria->addSelectColumn(UsuariosPeer::TELEMP);

		$criteria->addSelectColumn(UsuariosPeer::CEDEMP);

		$criteria->addSelectColumn(UsuariosPeer::NUMUNI);

		$criteria->addSelectColumn(UsuariosPeer::CODCAT);

		$criteria->addSelectColumn(UsuariosPeer::ID);

	}

	const COUNT = 'COUNT(usuarios.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT usuarios.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(UsuariosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(UsuariosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = UsuariosPeer::doSelectRS($criteria, $con);
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
		$objects = UsuariosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return UsuariosPeer::populateObjects(UsuariosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			UsuariosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = UsuariosPeer::getOMClass();
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
		return UsuariosPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(UsuariosPeer::ID);
			$selectCriteria->add(UsuariosPeer::ID, $criteria->remove(UsuariosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(UsuariosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(UsuariosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Usuarios) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UsuariosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Usuarios $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UsuariosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UsuariosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(UsuariosPeer::DATABASE_NAME, UsuariosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = UsuariosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(UsuariosPeer::DATABASE_NAME);

		$criteria->add(UsuariosPeer::ID, $pk);


		$v = UsuariosPeer::doSelect($criteria, $con);

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
			$criteria->add(UsuariosPeer::ID, $pks, Criteria::IN);
			$objs = UsuariosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseUsuariosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/UsuariosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.UsuariosMapBuilder');
}
