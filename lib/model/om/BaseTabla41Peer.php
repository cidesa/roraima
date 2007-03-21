<?php


abstract class BaseTabla41Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla41';

	
	const CLASS_DEFAULT = 'lib.model.Tabla41';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMCUE = 'tabla41.NUMCUE';

	
	const REFLIB = 'tabla41.REFLIB';

	
	const FECLIB = 'tabla41.FECLIB';

	
	const TIPMOV = 'tabla41.TIPMOV';

	
	const DESLIB = 'tabla41.DESLIB';

	
	const MONMOV = 'tabla41.MONMOV';

	
	const CODCTA = 'tabla41.CODCTA';

	
	const NUMCOM = 'tabla41.NUMCOM';

	
	const FECCOM = 'tabla41.FECCOM';

	
	const STATUS = 'tabla41.STATUS';

	
	const STACON = 'tabla41.STACON';

	
	const FECING = 'tabla41.FECING';

	
	const FECANU = 'tabla41.FECANU';

	
	const TIPMOVPAD = 'tabla41.TIPMOVPAD';

	
	const REFLIBPAD = 'tabla41.REFLIBPAD';

	
	const TRANSITO = 'tabla41.TRANSITO';

	
	const NUMCOMADI = 'tabla41.NUMCOMADI';

	
	const FECCOMADI = 'tabla41.FECCOMADI';

	
	const NOMBENSUS = 'tabla41.NOMBENSUS';

	
	const ORDEN = 'tabla41.ORDEN';

	
	const HORING = 'tabla41.HORING';

	
	const STACON1 = 'tabla41.STACON1';

	
	const MOTANU = 'tabla41.MOTANU';

	
	const ID = 'tabla41.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue', 'Reflib', 'Feclib', 'Tipmov', 'Deslib', 'Monmov', 'Codcta', 'Numcom', 'Feccom', 'Status', 'Stacon', 'Fecing', 'Fecanu', 'Tipmovpad', 'Reflibpad', 'Transito', 'Numcomadi', 'Feccomadi', 'Nombensus', 'Orden', 'Horing', 'Stacon1', 'Motanu', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla41Peer::NUMCUE, Tabla41Peer::REFLIB, Tabla41Peer::FECLIB, Tabla41Peer::TIPMOV, Tabla41Peer::DESLIB, Tabla41Peer::MONMOV, Tabla41Peer::CODCTA, Tabla41Peer::NUMCOM, Tabla41Peer::FECCOM, Tabla41Peer::STATUS, Tabla41Peer::STACON, Tabla41Peer::FECING, Tabla41Peer::FECANU, Tabla41Peer::TIPMOVPAD, Tabla41Peer::REFLIBPAD, Tabla41Peer::TRANSITO, Tabla41Peer::NUMCOMADI, Tabla41Peer::FECCOMADI, Tabla41Peer::NOMBENSUS, Tabla41Peer::ORDEN, Tabla41Peer::HORING, Tabla41Peer::STACON1, Tabla41Peer::MOTANU, Tabla41Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue', 'reflib', 'feclib', 'tipmov', 'deslib', 'monmov', 'codcta', 'numcom', 'feccom', 'status', 'stacon', 'fecing', 'fecanu', 'tipmovpad', 'reflibpad', 'transito', 'numcomadi', 'feccomadi', 'nombensus', 'orden', 'horing', 'stacon1', 'motanu', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numcue' => 0, 'Reflib' => 1, 'Feclib' => 2, 'Tipmov' => 3, 'Deslib' => 4, 'Monmov' => 5, 'Codcta' => 6, 'Numcom' => 7, 'Feccom' => 8, 'Status' => 9, 'Stacon' => 10, 'Fecing' => 11, 'Fecanu' => 12, 'Tipmovpad' => 13, 'Reflibpad' => 14, 'Transito' => 15, 'Numcomadi' => 16, 'Feccomadi' => 17, 'Nombensus' => 18, 'Orden' => 19, 'Horing' => 20, 'Stacon1' => 21, 'Motanu' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (Tabla41Peer::NUMCUE => 0, Tabla41Peer::REFLIB => 1, Tabla41Peer::FECLIB => 2, Tabla41Peer::TIPMOV => 3, Tabla41Peer::DESLIB => 4, Tabla41Peer::MONMOV => 5, Tabla41Peer::CODCTA => 6, Tabla41Peer::NUMCOM => 7, Tabla41Peer::FECCOM => 8, Tabla41Peer::STATUS => 9, Tabla41Peer::STACON => 10, Tabla41Peer::FECING => 11, Tabla41Peer::FECANU => 12, Tabla41Peer::TIPMOVPAD => 13, Tabla41Peer::REFLIBPAD => 14, Tabla41Peer::TRANSITO => 15, Tabla41Peer::NUMCOMADI => 16, Tabla41Peer::FECCOMADI => 17, Tabla41Peer::NOMBENSUS => 18, Tabla41Peer::ORDEN => 19, Tabla41Peer::HORING => 20, Tabla41Peer::STACON1 => 21, Tabla41Peer::MOTANU => 22, Tabla41Peer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('numcue' => 0, 'reflib' => 1, 'feclib' => 2, 'tipmov' => 3, 'deslib' => 4, 'monmov' => 5, 'codcta' => 6, 'numcom' => 7, 'feccom' => 8, 'status' => 9, 'stacon' => 10, 'fecing' => 11, 'fecanu' => 12, 'tipmovpad' => 13, 'reflibpad' => 14, 'transito' => 15, 'numcomadi' => 16, 'feccomadi' => 17, 'nombensus' => 18, 'orden' => 19, 'horing' => 20, 'stacon1' => 21, 'motanu' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla41MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla41MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla41Peer::getTableMap();
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
		return str_replace(Tabla41Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla41Peer::NUMCUE);

		$criteria->addSelectColumn(Tabla41Peer::REFLIB);

		$criteria->addSelectColumn(Tabla41Peer::FECLIB);

		$criteria->addSelectColumn(Tabla41Peer::TIPMOV);

		$criteria->addSelectColumn(Tabla41Peer::DESLIB);

		$criteria->addSelectColumn(Tabla41Peer::MONMOV);

		$criteria->addSelectColumn(Tabla41Peer::CODCTA);

		$criteria->addSelectColumn(Tabla41Peer::NUMCOM);

		$criteria->addSelectColumn(Tabla41Peer::FECCOM);

		$criteria->addSelectColumn(Tabla41Peer::STATUS);

		$criteria->addSelectColumn(Tabla41Peer::STACON);

		$criteria->addSelectColumn(Tabla41Peer::FECING);

		$criteria->addSelectColumn(Tabla41Peer::FECANU);

		$criteria->addSelectColumn(Tabla41Peer::TIPMOVPAD);

		$criteria->addSelectColumn(Tabla41Peer::REFLIBPAD);

		$criteria->addSelectColumn(Tabla41Peer::TRANSITO);

		$criteria->addSelectColumn(Tabla41Peer::NUMCOMADI);

		$criteria->addSelectColumn(Tabla41Peer::FECCOMADI);

		$criteria->addSelectColumn(Tabla41Peer::NOMBENSUS);

		$criteria->addSelectColumn(Tabla41Peer::ORDEN);

		$criteria->addSelectColumn(Tabla41Peer::HORING);

		$criteria->addSelectColumn(Tabla41Peer::STACON1);

		$criteria->addSelectColumn(Tabla41Peer::MOTANU);

		$criteria->addSelectColumn(Tabla41Peer::ID);

	}

	const COUNT = 'COUNT(tabla41.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla41.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla41Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla41Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla41Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla41Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla41Peer::populateObjects(Tabla41Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla41Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla41Peer::getOMClass();
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
		return Tabla41Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Tabla41Peer::ID);
			$selectCriteria->add(Tabla41Peer::ID, $criteria->remove(Tabla41Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla41Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla41Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla41) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla41Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla41 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla41Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla41Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla41Peer::DATABASE_NAME, Tabla41Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla41Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla41Peer::DATABASE_NAME);

		$criteria->add(Tabla41Peer::ID, $pk);


		$v = Tabla41Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla41Peer::ID, $pks, Criteria::IN);
			$objs = Tabla41Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla41Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla41MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla41MapBuilder');
}
