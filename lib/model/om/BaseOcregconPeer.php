<?php


abstract class BaseOcregconPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'ocregcon';

	
	const CLASS_DEFAULT = 'lib.model.Ocregcon';

	
	const NUM_COLUMNS = 34;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODCON = 'ocregcon.CODCON';

	
	const CODOBR = 'ocregcon.CODOBR';

	
	const CODPRO = 'ocregcon.CODPRO';

	
	const DESCON = 'ocregcon.DESCON';

	
	const TIPCON = 'ocregcon.TIPCON';

	
	const MONCON = 'ocregcon.MONCON';

	
	const MONEXT = 'ocregcon.MONEXT';

	
	const MONMUL = 'ocregcon.MONMUL';

	
	const MONMOD = 'ocregcon.MONMOD';

	
	const FECLIC = 'ocregcon.FECLIC';

	
	const FECBUEPRO = 'ocregcon.FECBUEPRO';

	
	const FECCON = 'ocregcon.FECCON';

	
	const FECINI = 'ocregcon.FECINI';

	
	const FECPROINI = 'ocregcon.FECPROINI';

	
	const FECPAR = 'ocregcon.FECPAR';

	
	const FECREI = 'ocregcon.FECREI';

	
	const FECPRO = 'ocregcon.FECPRO';

	
	const FECFIN = 'ocregcon.FECFIN';

	
	const FECRECPROV = 'ocregcon.FECRECPROV';

	
	const FECRECDEF = 'ocregcon.FECRECDEF';

	
	const PORIVA = 'ocregcon.PORIVA';

	
	const MONIVA = 'ocregcon.MONIVA';

	
	const TIEEJECON = 'ocregcon.TIEEJECON';

	
	const STACON = 'ocregcon.STACON';

	
	const PLATIE = 'ocregcon.PLATIE';

	
	const FECFINMOD = 'ocregcon.FECFINMOD';

	
	const GASREE = 'ocregcon.GASREE';

	
	const SUBTOT = 'ocregcon.SUBTOT';

	
	const MONFUL = 'ocregcon.MONFUL';

	
	const CODPRE = 'ocregcon.CODPRE';

	
	const DESPRE = 'ocregcon.DESPRE';

	
	const REFCOM = 'ocregcon.REFCOM';

	
	const TIPO = 'ocregcon.TIPO';

	
	const ID = 'ocregcon.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codcon', 'Codobr', 'Codpro', 'Descon', 'Tipcon', 'Moncon', 'Monext', 'Monmul', 'Monmod', 'Feclic', 'Fecbuepro', 'Feccon', 'Fecini', 'Fecproini', 'Fecpar', 'Fecrei', 'Fecpro', 'Fecfin', 'Fecrecprov', 'Fecrecdef', 'Poriva', 'Moniva', 'Tieejecon', 'Stacon', 'Platie', 'Fecfinmod', 'Gasree', 'Subtot', 'Monful', 'Codpre', 'Despre', 'Refcom', 'Tipo', 'Id', ),
		BasePeer::TYPE_COLNAME => array (OcregconPeer::CODCON, OcregconPeer::CODOBR, OcregconPeer::CODPRO, OcregconPeer::DESCON, OcregconPeer::TIPCON, OcregconPeer::MONCON, OcregconPeer::MONEXT, OcregconPeer::MONMUL, OcregconPeer::MONMOD, OcregconPeer::FECLIC, OcregconPeer::FECBUEPRO, OcregconPeer::FECCON, OcregconPeer::FECINI, OcregconPeer::FECPROINI, OcregconPeer::FECPAR, OcregconPeer::FECREI, OcregconPeer::FECPRO, OcregconPeer::FECFIN, OcregconPeer::FECRECPROV, OcregconPeer::FECRECDEF, OcregconPeer::PORIVA, OcregconPeer::MONIVA, OcregconPeer::TIEEJECON, OcregconPeer::STACON, OcregconPeer::PLATIE, OcregconPeer::FECFINMOD, OcregconPeer::GASREE, OcregconPeer::SUBTOT, OcregconPeer::MONFUL, OcregconPeer::CODPRE, OcregconPeer::DESPRE, OcregconPeer::REFCOM, OcregconPeer::TIPO, OcregconPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codcon', 'codobr', 'codpro', 'descon', 'tipcon', 'moncon', 'monext', 'monmul', 'monmod', 'feclic', 'fecbuepro', 'feccon', 'fecini', 'fecproini', 'fecpar', 'fecrei', 'fecpro', 'fecfin', 'fecrecprov', 'fecrecdef', 'poriva', 'moniva', 'tieejecon', 'stacon', 'platie', 'fecfinmod', 'gasree', 'subtot', 'monful', 'codpre', 'despre', 'refcom', 'tipo', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codcon' => 0, 'Codobr' => 1, 'Codpro' => 2, 'Descon' => 3, 'Tipcon' => 4, 'Moncon' => 5, 'Monext' => 6, 'Monmul' => 7, 'Monmod' => 8, 'Feclic' => 9, 'Fecbuepro' => 10, 'Feccon' => 11, 'Fecini' => 12, 'Fecproini' => 13, 'Fecpar' => 14, 'Fecrei' => 15, 'Fecpro' => 16, 'Fecfin' => 17, 'Fecrecprov' => 18, 'Fecrecdef' => 19, 'Poriva' => 20, 'Moniva' => 21, 'Tieejecon' => 22, 'Stacon' => 23, 'Platie' => 24, 'Fecfinmod' => 25, 'Gasree' => 26, 'Subtot' => 27, 'Monful' => 28, 'Codpre' => 29, 'Despre' => 30, 'Refcom' => 31, 'Tipo' => 32, 'Id' => 33, ),
		BasePeer::TYPE_COLNAME => array (OcregconPeer::CODCON => 0, OcregconPeer::CODOBR => 1, OcregconPeer::CODPRO => 2, OcregconPeer::DESCON => 3, OcregconPeer::TIPCON => 4, OcregconPeer::MONCON => 5, OcregconPeer::MONEXT => 6, OcregconPeer::MONMUL => 7, OcregconPeer::MONMOD => 8, OcregconPeer::FECLIC => 9, OcregconPeer::FECBUEPRO => 10, OcregconPeer::FECCON => 11, OcregconPeer::FECINI => 12, OcregconPeer::FECPROINI => 13, OcregconPeer::FECPAR => 14, OcregconPeer::FECREI => 15, OcregconPeer::FECPRO => 16, OcregconPeer::FECFIN => 17, OcregconPeer::FECRECPROV => 18, OcregconPeer::FECRECDEF => 19, OcregconPeer::PORIVA => 20, OcregconPeer::MONIVA => 21, OcregconPeer::TIEEJECON => 22, OcregconPeer::STACON => 23, OcregconPeer::PLATIE => 24, OcregconPeer::FECFINMOD => 25, OcregconPeer::GASREE => 26, OcregconPeer::SUBTOT => 27, OcregconPeer::MONFUL => 28, OcregconPeer::CODPRE => 29, OcregconPeer::DESPRE => 30, OcregconPeer::REFCOM => 31, OcregconPeer::TIPO => 32, OcregconPeer::ID => 33, ),
		BasePeer::TYPE_FIELDNAME => array ('codcon' => 0, 'codobr' => 1, 'codpro' => 2, 'descon' => 3, 'tipcon' => 4, 'moncon' => 5, 'monext' => 6, 'monmul' => 7, 'monmod' => 8, 'feclic' => 9, 'fecbuepro' => 10, 'feccon' => 11, 'fecini' => 12, 'fecproini' => 13, 'fecpar' => 14, 'fecrei' => 15, 'fecpro' => 16, 'fecfin' => 17, 'fecrecprov' => 18, 'fecrecdef' => 19, 'poriva' => 20, 'moniva' => 21, 'tieejecon' => 22, 'stacon' => 23, 'platie' => 24, 'fecfinmod' => 25, 'gasree' => 26, 'subtot' => 27, 'monful' => 28, 'codpre' => 29, 'despre' => 30, 'refcom' => 31, 'tipo' => 32, 'id' => 33, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/OcregconMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.OcregconMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = OcregconPeer::getTableMap();
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
		return str_replace(OcregconPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(OcregconPeer::CODCON);

		$criteria->addSelectColumn(OcregconPeer::CODOBR);

		$criteria->addSelectColumn(OcregconPeer::CODPRO);

		$criteria->addSelectColumn(OcregconPeer::DESCON);

		$criteria->addSelectColumn(OcregconPeer::TIPCON);

		$criteria->addSelectColumn(OcregconPeer::MONCON);

		$criteria->addSelectColumn(OcregconPeer::MONEXT);

		$criteria->addSelectColumn(OcregconPeer::MONMUL);

		$criteria->addSelectColumn(OcregconPeer::MONMOD);

		$criteria->addSelectColumn(OcregconPeer::FECLIC);

		$criteria->addSelectColumn(OcregconPeer::FECBUEPRO);

		$criteria->addSelectColumn(OcregconPeer::FECCON);

		$criteria->addSelectColumn(OcregconPeer::FECINI);

		$criteria->addSelectColumn(OcregconPeer::FECPROINI);

		$criteria->addSelectColumn(OcregconPeer::FECPAR);

		$criteria->addSelectColumn(OcregconPeer::FECREI);

		$criteria->addSelectColumn(OcregconPeer::FECPRO);

		$criteria->addSelectColumn(OcregconPeer::FECFIN);

		$criteria->addSelectColumn(OcregconPeer::FECRECPROV);

		$criteria->addSelectColumn(OcregconPeer::FECRECDEF);

		$criteria->addSelectColumn(OcregconPeer::PORIVA);

		$criteria->addSelectColumn(OcregconPeer::MONIVA);

		$criteria->addSelectColumn(OcregconPeer::TIEEJECON);

		$criteria->addSelectColumn(OcregconPeer::STACON);

		$criteria->addSelectColumn(OcregconPeer::PLATIE);

		$criteria->addSelectColumn(OcregconPeer::FECFINMOD);

		$criteria->addSelectColumn(OcregconPeer::GASREE);

		$criteria->addSelectColumn(OcregconPeer::SUBTOT);

		$criteria->addSelectColumn(OcregconPeer::MONFUL);

		$criteria->addSelectColumn(OcregconPeer::CODPRE);

		$criteria->addSelectColumn(OcregconPeer::DESPRE);

		$criteria->addSelectColumn(OcregconPeer::REFCOM);

		$criteria->addSelectColumn(OcregconPeer::TIPO);

		$criteria->addSelectColumn(OcregconPeer::ID);

	}

	const COUNT = 'COUNT(ocregcon.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT ocregcon.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(OcregconPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(OcregconPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = OcregconPeer::doSelectRS($criteria, $con);
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
		$objects = OcregconPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return OcregconPeer::populateObjects(OcregconPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			OcregconPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = OcregconPeer::getOMClass();
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
		return OcregconPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(OcregconPeer::ID);
			$selectCriteria->add(OcregconPeer::ID, $criteria->remove(OcregconPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(OcregconPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(OcregconPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Ocregcon) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(OcregconPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Ocregcon $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(OcregconPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(OcregconPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(OcregconPeer::DATABASE_NAME, OcregconPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = OcregconPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(OcregconPeer::DATABASE_NAME);

		$criteria->add(OcregconPeer::ID, $pk);


		$v = OcregconPeer::doSelect($criteria, $con);

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
			$criteria->add(OcregconPeer::ID, $pks, Criteria::IN);
			$objs = OcregconPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseOcregconPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/OcregconMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.OcregconMapBuilder');
}
