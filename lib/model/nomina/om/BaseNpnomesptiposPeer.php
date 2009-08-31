<?php


abstract class BaseNpnomesptiposPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'npnomesptipos';

	
	const CLASS_DEFAULT = 'lib.model.nomina.Npnomesptipos';

	
	const NUM_COLUMNS = 6;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODNOMESP = 'npnomesptipos.CODNOMESP';

	
	const DESNOMESP = 'npnomesptipos.DESNOMESP';

	
	const FECNOMDES = 'npnomesptipos.FECNOMDES';

	
	const FECNOMHAS = 'npnomesptipos.FECNOMHAS';

	
	const NOMINTPRE = 'npnomesptipos.NOMINTPRE';

	
	const ID = 'npnomesptipos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codnomesp', 'Desnomesp', 'Fecnomdes', 'Fecnomhas', 'Nomintpre', 'Id', ),
		BasePeer::TYPE_COLNAME => array (NpnomesptiposPeer::CODNOMESP, NpnomesptiposPeer::DESNOMESP, NpnomesptiposPeer::FECNOMDES, NpnomesptiposPeer::FECNOMHAS, NpnomesptiposPeer::NOMINTPRE, NpnomesptiposPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codnomesp', 'desnomesp', 'fecnomdes', 'fecnomhas', 'nomintpre', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codnomesp' => 0, 'Desnomesp' => 1, 'Fecnomdes' => 2, 'Fecnomhas' => 3, 'Nomintpre' => 4, 'Id' => 5, ),
		BasePeer::TYPE_COLNAME => array (NpnomesptiposPeer::CODNOMESP => 0, NpnomesptiposPeer::DESNOMESP => 1, NpnomesptiposPeer::FECNOMDES => 2, NpnomesptiposPeer::FECNOMHAS => 3, NpnomesptiposPeer::NOMINTPRE => 4, NpnomesptiposPeer::ID => 5, ),
		BasePeer::TYPE_FIELDNAME => array ('codnomesp' => 0, 'desnomesp' => 1, 'fecnomdes' => 2, 'fecnomhas' => 3, 'nomintpre' => 4, 'id' => 5, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/nomina/map/NpnomesptiposMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.nomina.map.NpnomesptiposMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NpnomesptiposPeer::getTableMap();
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
		return str_replace(NpnomesptiposPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NpnomesptiposPeer::CODNOMESP);

		$criteria->addSelectColumn(NpnomesptiposPeer::DESNOMESP);

		$criteria->addSelectColumn(NpnomesptiposPeer::FECNOMDES);

		$criteria->addSelectColumn(NpnomesptiposPeer::FECNOMHAS);

		$criteria->addSelectColumn(NpnomesptiposPeer::NOMINTPRE);

		$criteria->addSelectColumn(NpnomesptiposPeer::ID);

	}

	const COUNT = 'COUNT(npnomesptipos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT npnomesptipos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NpnomesptiposPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NpnomesptiposPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NpnomesptiposPeer::doSelectRS($criteria, $con);
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
		$objects = NpnomesptiposPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NpnomesptiposPeer::populateObjects(NpnomesptiposPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NpnomesptiposPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NpnomesptiposPeer::getOMClass();
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
		return NpnomesptiposPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(NpnomesptiposPeer::ID); 

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
			$comparison = $criteria->getComparison(NpnomesptiposPeer::ID);
			$selectCriteria->add(NpnomesptiposPeer::ID, $criteria->remove(NpnomesptiposPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(NpnomesptiposPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NpnomesptiposPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Npnomesptipos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NpnomesptiposPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Npnomesptipos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NpnomesptiposPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NpnomesptiposPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NpnomesptiposPeer::DATABASE_NAME, NpnomesptiposPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NpnomesptiposPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NpnomesptiposPeer::DATABASE_NAME);

		$criteria->add(NpnomesptiposPeer::ID, $pk);


		$v = NpnomesptiposPeer::doSelect($criteria, $con);

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
			$criteria->add(NpnomesptiposPeer::ID, $pks, Criteria::IN);
			$objs = NpnomesptiposPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNpnomesptiposPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/nomina/map/NpnomesptiposMapBuilder.php';
	Propel::registerMapBuilder('lib.model.nomina.map.NpnomesptiposMapBuilder');
}
