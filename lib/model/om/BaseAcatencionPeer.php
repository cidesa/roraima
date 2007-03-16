<?php


abstract class BaseAcatencionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'acatencion';

	
	const CLASS_DEFAULT = 'lib.model.Acatencion';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const DOCATE = 'acatencion.DOCATE';

	
	const LOGUSE = 'acatencion.LOGUSE';

	
	const ESTADO = 'acatencion.ESTADO';

	
	const FECREC = 'acatencion.FECREC';

	
	const HORREC = 'acatencion.HORREC';

	
	const FECATE = 'acatencion.FECATE';

	
	const HORATE = 'acatencion.HORATE';

	
	const NUMUNI = 'acatencion.NUMUNI';

	
	const NUMUNIORI = 'acatencion.NUMUNIORI';

	
	const OBSDOC = 'acatencion.OBSDOC';

	
	const STAATE = 'acatencion.STAATE';

	
	const ID = 'acatencion.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Docate', 'Loguse', 'Estado', 'Fecrec', 'Horrec', 'Fecate', 'Horate', 'Numuni', 'Numuniori', 'Obsdoc', 'Staate', 'Id', ),
		BasePeer::TYPE_COLNAME => array (AcatencionPeer::DOCATE, AcatencionPeer::LOGUSE, AcatencionPeer::ESTADO, AcatencionPeer::FECREC, AcatencionPeer::HORREC, AcatencionPeer::FECATE, AcatencionPeer::HORATE, AcatencionPeer::NUMUNI, AcatencionPeer::NUMUNIORI, AcatencionPeer::OBSDOC, AcatencionPeer::STAATE, AcatencionPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('docate', 'loguse', 'estado', 'fecrec', 'horrec', 'fecate', 'horate', 'numuni', 'numuniori', 'obsdoc', 'staate', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Docate' => 0, 'Loguse' => 1, 'Estado' => 2, 'Fecrec' => 3, 'Horrec' => 4, 'Fecate' => 5, 'Horate' => 6, 'Numuni' => 7, 'Numuniori' => 8, 'Obsdoc' => 9, 'Staate' => 10, 'Id' => 11, ),
		BasePeer::TYPE_COLNAME => array (AcatencionPeer::DOCATE => 0, AcatencionPeer::LOGUSE => 1, AcatencionPeer::ESTADO => 2, AcatencionPeer::FECREC => 3, AcatencionPeer::HORREC => 4, AcatencionPeer::FECATE => 5, AcatencionPeer::HORATE => 6, AcatencionPeer::NUMUNI => 7, AcatencionPeer::NUMUNIORI => 8, AcatencionPeer::OBSDOC => 9, AcatencionPeer::STAATE => 10, AcatencionPeer::ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('docate' => 0, 'loguse' => 1, 'estado' => 2, 'fecrec' => 3, 'horrec' => 4, 'fecate' => 5, 'horate' => 6, 'numuni' => 7, 'numuniori' => 8, 'obsdoc' => 9, 'staate' => 10, 'id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AcatencionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AcatencionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AcatencionPeer::getTableMap();
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
		return str_replace(AcatencionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AcatencionPeer::DOCATE);

		$criteria->addSelectColumn(AcatencionPeer::LOGUSE);

		$criteria->addSelectColumn(AcatencionPeer::ESTADO);

		$criteria->addSelectColumn(AcatencionPeer::FECREC);

		$criteria->addSelectColumn(AcatencionPeer::HORREC);

		$criteria->addSelectColumn(AcatencionPeer::FECATE);

		$criteria->addSelectColumn(AcatencionPeer::HORATE);

		$criteria->addSelectColumn(AcatencionPeer::NUMUNI);

		$criteria->addSelectColumn(AcatencionPeer::NUMUNIORI);

		$criteria->addSelectColumn(AcatencionPeer::OBSDOC);

		$criteria->addSelectColumn(AcatencionPeer::STAATE);

		$criteria->addSelectColumn(AcatencionPeer::ID);

	}

	const COUNT = 'COUNT(acatencion.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT acatencion.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AcatencionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AcatencionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AcatencionPeer::doSelectRS($criteria, $con);
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
		$objects = AcatencionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AcatencionPeer::populateObjects(AcatencionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AcatencionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AcatencionPeer::getOMClass();
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
		return AcatencionPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(AcatencionPeer::ID);
			$selectCriteria->add(AcatencionPeer::ID, $criteria->remove(AcatencionPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AcatencionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AcatencionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Acatencion) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AcatencionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Acatencion $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AcatencionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AcatencionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AcatencionPeer::DATABASE_NAME, AcatencionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AcatencionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AcatencionPeer::DATABASE_NAME);

		$criteria->add(AcatencionPeer::ID, $pk);


		$v = AcatencionPeer::doSelect($criteria, $con);

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
			$criteria->add(AcatencionPeer::ID, $pks, Criteria::IN);
			$objs = AcatencionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAcatencionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AcatencionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AcatencionMapBuilder');
}
