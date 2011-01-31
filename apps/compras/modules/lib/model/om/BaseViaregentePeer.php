<?php


abstract class BaseViaregentePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viaregente';

	
	const CLASS_DEFAULT = 'lib.model.Viaregente';

	
	const NUM_COLUMNS = 10;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CEDRIF = 'viaregente.CEDRIF';

	
	const DESENTE = 'viaregente.DESENTE';

	
	const NACENT = 'viaregente.NACENT';

	
	const TIPENT = 'viaregente.TIPENT';

	
	const ACTPRO = 'viaregente.ACTPRO';

	
	const DIRENTE = 'viaregente.DIRENTE';

	
	const TELENTE = 'viaregente.TELENTE';

	
	const CORENTE = 'viaregente.CORENTE';

	
	const ACTECOENTE = 'viaregente.ACTECOENTE';

	
	const ID = 'viaregente.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrif', 'Desente', 'Nacent', 'Tipent', 'Actpro', 'Dirente', 'Telente', 'Corente', 'Actecoente', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViaregentePeer::CEDRIF, ViaregentePeer::DESENTE, ViaregentePeer::NACENT, ViaregentePeer::TIPENT, ViaregentePeer::ACTPRO, ViaregentePeer::DIRENTE, ViaregentePeer::TELENTE, ViaregentePeer::CORENTE, ViaregentePeer::ACTECOENTE, ViaregentePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrif', 'desente', 'nacent', 'tipent', 'actpro', 'dirente', 'telente', 'corente', 'actecoente', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Cedrif' => 0, 'Desente' => 1, 'Nacent' => 2, 'Tipent' => 3, 'Actpro' => 4, 'Dirente' => 5, 'Telente' => 6, 'Corente' => 7, 'Actecoente' => 8, 'Id' => 9, ),
		BasePeer::TYPE_COLNAME => array (ViaregentePeer::CEDRIF => 0, ViaregentePeer::DESENTE => 1, ViaregentePeer::NACENT => 2, ViaregentePeer::TIPENT => 3, ViaregentePeer::ACTPRO => 4, ViaregentePeer::DIRENTE => 5, ViaregentePeer::TELENTE => 6, ViaregentePeer::CORENTE => 7, ViaregentePeer::ACTECOENTE => 8, ViaregentePeer::ID => 9, ),
		BasePeer::TYPE_FIELDNAME => array ('cedrif' => 0, 'desente' => 1, 'nacent' => 2, 'tipent' => 3, 'actpro' => 4, 'dirente' => 5, 'telente' => 6, 'corente' => 7, 'actecoente' => 8, 'id' => 9, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViaregenteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViaregenteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViaregentePeer::getTableMap();
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
		return str_replace(ViaregentePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViaregentePeer::CEDRIF);

		$criteria->addSelectColumn(ViaregentePeer::DESENTE);

		$criteria->addSelectColumn(ViaregentePeer::NACENT);

		$criteria->addSelectColumn(ViaregentePeer::TIPENT);

		$criteria->addSelectColumn(ViaregentePeer::ACTPRO);

		$criteria->addSelectColumn(ViaregentePeer::DIRENTE);

		$criteria->addSelectColumn(ViaregentePeer::TELENTE);

		$criteria->addSelectColumn(ViaregentePeer::CORENTE);

		$criteria->addSelectColumn(ViaregentePeer::ACTECOENTE);

		$criteria->addSelectColumn(ViaregentePeer::ID);

	}

	const COUNT = 'COUNT(viaregente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viaregente.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViaregentePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViaregentePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViaregentePeer::doSelectRS($criteria, $con);
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
		$objects = ViaregentePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViaregentePeer::populateObjects(ViaregentePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViaregentePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViaregentePeer::getOMClass();
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
		return ViaregentePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViaregentePeer::ID); 

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
			$comparison = $criteria->getComparison(ViaregentePeer::ID);
			$selectCriteria->add(ViaregentePeer::ID, $criteria->remove(ViaregentePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViaregentePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViaregentePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viaregente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViaregentePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viaregente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViaregentePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViaregentePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViaregentePeer::DATABASE_NAME, ViaregentePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViaregentePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViaregentePeer::DATABASE_NAME);

		$criteria->add(ViaregentePeer::ID, $pk);


		$v = ViaregentePeer::doSelect($criteria, $con);

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
			$criteria->add(ViaregentePeer::ID, $pks, Criteria::IN);
			$objs = ViaregentePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViaregentePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViaregenteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViaregenteMapBuilder');
}
