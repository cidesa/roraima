<?php


abstract class BaseFcconpagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcconpag';

	
	const CLASS_DEFAULT = 'lib.model.hacienda.Fcconpag';

	
	const NUM_COLUMNS = 24;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFCON = 'fcconpag.REFCON';

	
	const FECCON = 'fcconpag.FECCON';

	
	const MONCON = 'fcconpag.MONCON';

	
	const ESTCON = 'fcconpag.ESTCON';

	
	const RIFCON = 'fcconpag.RIFCON';

	
	const OBSCON = 'fcconpag.OBSCON';

	
	const FUNREC = 'fcconpag.FUNREC';

	
	const FECREC = 'fcconpag.FECREC';

	
	const NUMCUO = 'fcconpag.NUMCUO';

	
	const MONCUO = 'fcconpag.MONCUO';

	
	const TOTCUO = 'fcconpag.TOTCUO';

	
	const PORINI = 'fcconpag.PORINI';

	
	const MONINI = 'fcconpag.MONINI';

	
	const PORFIN = 'fcconpag.PORFIN';

	
	const MONFIN = 'fcconpag.MONFIN';

	
	const DATCED = 'fcconpag.DATCED';

	
	const DATNAC = 'fcconpag.DATNAC';

	
	const DATNOM = 'fcconpag.DATNOM';

	
	const DATDIR = 'fcconpag.DATDIR';

	
	const DATTEL = 'fcconpag.DATTEL';

	
	const DATCAR = 'fcconpag.DATCAR';

	
	const DATREG = 'fcconpag.DATREG';

	
	const DATCON = 'fcconpag.DATCON';

	
	const ID = 'fcconpag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refcon', 'Feccon', 'Moncon', 'Estcon', 'Rifcon', 'Obscon', 'Funrec', 'Fecrec', 'Numcuo', 'Moncuo', 'Totcuo', 'Porini', 'Monini', 'Porfin', 'Monfin', 'Datced', 'Datnac', 'Datnom', 'Datdir', 'Dattel', 'Datcar', 'Datreg', 'Datcon', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcconpagPeer::REFCON, FcconpagPeer::FECCON, FcconpagPeer::MONCON, FcconpagPeer::ESTCON, FcconpagPeer::RIFCON, FcconpagPeer::OBSCON, FcconpagPeer::FUNREC, FcconpagPeer::FECREC, FcconpagPeer::NUMCUO, FcconpagPeer::MONCUO, FcconpagPeer::TOTCUO, FcconpagPeer::PORINI, FcconpagPeer::MONINI, FcconpagPeer::PORFIN, FcconpagPeer::MONFIN, FcconpagPeer::DATCED, FcconpagPeer::DATNAC, FcconpagPeer::DATNOM, FcconpagPeer::DATDIR, FcconpagPeer::DATTEL, FcconpagPeer::DATCAR, FcconpagPeer::DATREG, FcconpagPeer::DATCON, FcconpagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refcon', 'feccon', 'moncon', 'estcon', 'rifcon', 'obscon', 'funrec', 'fecrec', 'numcuo', 'moncuo', 'totcuo', 'porini', 'monini', 'porfin', 'monfin', 'datced', 'datnac', 'datnom', 'datdir', 'dattel', 'datcar', 'datreg', 'datcon', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refcon' => 0, 'Feccon' => 1, 'Moncon' => 2, 'Estcon' => 3, 'Rifcon' => 4, 'Obscon' => 5, 'Funrec' => 6, 'Fecrec' => 7, 'Numcuo' => 8, 'Moncuo' => 9, 'Totcuo' => 10, 'Porini' => 11, 'Monini' => 12, 'Porfin' => 13, 'Monfin' => 14, 'Datced' => 15, 'Datnac' => 16, 'Datnom' => 17, 'Datdir' => 18, 'Dattel' => 19, 'Datcar' => 20, 'Datreg' => 21, 'Datcon' => 22, 'Id' => 23, ),
		BasePeer::TYPE_COLNAME => array (FcconpagPeer::REFCON => 0, FcconpagPeer::FECCON => 1, FcconpagPeer::MONCON => 2, FcconpagPeer::ESTCON => 3, FcconpagPeer::RIFCON => 4, FcconpagPeer::OBSCON => 5, FcconpagPeer::FUNREC => 6, FcconpagPeer::FECREC => 7, FcconpagPeer::NUMCUO => 8, FcconpagPeer::MONCUO => 9, FcconpagPeer::TOTCUO => 10, FcconpagPeer::PORINI => 11, FcconpagPeer::MONINI => 12, FcconpagPeer::PORFIN => 13, FcconpagPeer::MONFIN => 14, FcconpagPeer::DATCED => 15, FcconpagPeer::DATNAC => 16, FcconpagPeer::DATNOM => 17, FcconpagPeer::DATDIR => 18, FcconpagPeer::DATTEL => 19, FcconpagPeer::DATCAR => 20, FcconpagPeer::DATREG => 21, FcconpagPeer::DATCON => 22, FcconpagPeer::ID => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('refcon' => 0, 'feccon' => 1, 'moncon' => 2, 'estcon' => 3, 'rifcon' => 4, 'obscon' => 5, 'funrec' => 6, 'fecrec' => 7, 'numcuo' => 8, 'moncuo' => 9, 'totcuo' => 10, 'porini' => 11, 'monini' => 12, 'porfin' => 13, 'monfin' => 14, 'datced' => 15, 'datnac' => 16, 'datnom' => 17, 'datdir' => 18, 'dattel' => 19, 'datcar' => 20, 'datreg' => 21, 'datcon' => 22, 'id' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/hacienda/map/FcconpagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.hacienda.map.FcconpagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcconpagPeer::getTableMap();
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
		return str_replace(FcconpagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcconpagPeer::REFCON);

		$criteria->addSelectColumn(FcconpagPeer::FECCON);

		$criteria->addSelectColumn(FcconpagPeer::MONCON);

		$criteria->addSelectColumn(FcconpagPeer::ESTCON);

		$criteria->addSelectColumn(FcconpagPeer::RIFCON);

		$criteria->addSelectColumn(FcconpagPeer::OBSCON);

		$criteria->addSelectColumn(FcconpagPeer::FUNREC);

		$criteria->addSelectColumn(FcconpagPeer::FECREC);

		$criteria->addSelectColumn(FcconpagPeer::NUMCUO);

		$criteria->addSelectColumn(FcconpagPeer::MONCUO);

		$criteria->addSelectColumn(FcconpagPeer::TOTCUO);

		$criteria->addSelectColumn(FcconpagPeer::PORINI);

		$criteria->addSelectColumn(FcconpagPeer::MONINI);

		$criteria->addSelectColumn(FcconpagPeer::PORFIN);

		$criteria->addSelectColumn(FcconpagPeer::MONFIN);

		$criteria->addSelectColumn(FcconpagPeer::DATCED);

		$criteria->addSelectColumn(FcconpagPeer::DATNAC);

		$criteria->addSelectColumn(FcconpagPeer::DATNOM);

		$criteria->addSelectColumn(FcconpagPeer::DATDIR);

		$criteria->addSelectColumn(FcconpagPeer::DATTEL);

		$criteria->addSelectColumn(FcconpagPeer::DATCAR);

		$criteria->addSelectColumn(FcconpagPeer::DATREG);

		$criteria->addSelectColumn(FcconpagPeer::DATCON);

		$criteria->addSelectColumn(FcconpagPeer::ID);

	}

	const COUNT = 'COUNT(fcconpag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcconpag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcconpagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcconpagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcconpagPeer::doSelectRS($criteria, $con);
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
		$objects = FcconpagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcconpagPeer::populateObjects(FcconpagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcconpagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcconpagPeer::getOMClass();
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
		return FcconpagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcconpagPeer::ID); 

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
			$comparison = $criteria->getComparison(FcconpagPeer::ID);
			$selectCriteria->add(FcconpagPeer::ID, $criteria->remove(FcconpagPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcconpagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcconpagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcconpag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcconpagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcconpag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcconpagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcconpagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcconpagPeer::DATABASE_NAME, FcconpagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcconpagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcconpagPeer::DATABASE_NAME);

		$criteria->add(FcconpagPeer::ID, $pk);


		$v = FcconpagPeer::doSelect($criteria, $con);

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
			$criteria->add(FcconpagPeer::ID, $pks, Criteria::IN);
			$objs = FcconpagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcconpagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/hacienda/map/FcconpagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.hacienda.map.FcconpagMapBuilder');
}
