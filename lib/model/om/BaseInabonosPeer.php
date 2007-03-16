<?php


abstract class BaseInabonosPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'inabonos';

	
	const CLASS_DEFAULT = 'lib.model.Inabonos';

	
	const NUM_COLUMNS = 16;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPAG = 'inabonos.NUMPAG';

	
	const NUMREF = 'inabonos.NUMREF';

	
	const FECPAG = 'inabonos.FECPAG';

	
	const RIFCON = 'inabonos.RIFCON';

	
	const MONPAG = 'inabonos.MONPAG';

	
	const SALPAG = 'inabonos.SALPAG';

	
	const MONEFE = 'inabonos.MONEFE';

	
	const FECREC = 'inabonos.FECREC';

	
	const DESPAG = 'inabonos.DESPAG';

	
	const FUNPAG = 'inabonos.FUNPAG';

	
	const STAPAG = 'inabonos.STAPAG';

	
	const FUEING = 'inabonos.FUEING';

	
	const MOTANU = 'inabonos.MOTANU';

	
	const FECANU = 'inabonos.FECANU';

	
	const EDOPAG = 'inabonos.EDOPAG';

	
	const ID = 'inabonos.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag', 'Numref', 'Fecpag', 'Rifcon', 'Monpag', 'Salpag', 'Monefe', 'Fecrec', 'Despag', 'Funpag', 'Stapag', 'Fueing', 'Motanu', 'Fecanu', 'Edopag', 'Id', ),
		BasePeer::TYPE_COLNAME => array (InabonosPeer::NUMPAG, InabonosPeer::NUMREF, InabonosPeer::FECPAG, InabonosPeer::RIFCON, InabonosPeer::MONPAG, InabonosPeer::SALPAG, InabonosPeer::MONEFE, InabonosPeer::FECREC, InabonosPeer::DESPAG, InabonosPeer::FUNPAG, InabonosPeer::STAPAG, InabonosPeer::FUEING, InabonosPeer::MOTANU, InabonosPeer::FECANU, InabonosPeer::EDOPAG, InabonosPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag', 'numref', 'fecpag', 'rifcon', 'monpag', 'salpag', 'monefe', 'fecrec', 'despag', 'funpag', 'stapag', 'fueing', 'motanu', 'fecanu', 'edopag', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numpag' => 0, 'Numref' => 1, 'Fecpag' => 2, 'Rifcon' => 3, 'Monpag' => 4, 'Salpag' => 5, 'Monefe' => 6, 'Fecrec' => 7, 'Despag' => 8, 'Funpag' => 9, 'Stapag' => 10, 'Fueing' => 11, 'Motanu' => 12, 'Fecanu' => 13, 'Edopag' => 14, 'Id' => 15, ),
		BasePeer::TYPE_COLNAME => array (InabonosPeer::NUMPAG => 0, InabonosPeer::NUMREF => 1, InabonosPeer::FECPAG => 2, InabonosPeer::RIFCON => 3, InabonosPeer::MONPAG => 4, InabonosPeer::SALPAG => 5, InabonosPeer::MONEFE => 6, InabonosPeer::FECREC => 7, InabonosPeer::DESPAG => 8, InabonosPeer::FUNPAG => 9, InabonosPeer::STAPAG => 10, InabonosPeer::FUEING => 11, InabonosPeer::MOTANU => 12, InabonosPeer::FECANU => 13, InabonosPeer::EDOPAG => 14, InabonosPeer::ID => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('numpag' => 0, 'numref' => 1, 'fecpag' => 2, 'rifcon' => 3, 'monpag' => 4, 'salpag' => 5, 'monefe' => 6, 'fecrec' => 7, 'despag' => 8, 'funpag' => 9, 'stapag' => 10, 'fueing' => 11, 'motanu' => 12, 'fecanu' => 13, 'edopag' => 14, 'id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/InabonosMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.InabonosMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = InabonosPeer::getTableMap();
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
		return str_replace(InabonosPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(InabonosPeer::NUMPAG);

		$criteria->addSelectColumn(InabonosPeer::NUMREF);

		$criteria->addSelectColumn(InabonosPeer::FECPAG);

		$criteria->addSelectColumn(InabonosPeer::RIFCON);

		$criteria->addSelectColumn(InabonosPeer::MONPAG);

		$criteria->addSelectColumn(InabonosPeer::SALPAG);

		$criteria->addSelectColumn(InabonosPeer::MONEFE);

		$criteria->addSelectColumn(InabonosPeer::FECREC);

		$criteria->addSelectColumn(InabonosPeer::DESPAG);

		$criteria->addSelectColumn(InabonosPeer::FUNPAG);

		$criteria->addSelectColumn(InabonosPeer::STAPAG);

		$criteria->addSelectColumn(InabonosPeer::FUEING);

		$criteria->addSelectColumn(InabonosPeer::MOTANU);

		$criteria->addSelectColumn(InabonosPeer::FECANU);

		$criteria->addSelectColumn(InabonosPeer::EDOPAG);

		$criteria->addSelectColumn(InabonosPeer::ID);

	}

	const COUNT = 'COUNT(inabonos.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT inabonos.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(InabonosPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(InabonosPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = InabonosPeer::doSelectRS($criteria, $con);
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
		$objects = InabonosPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return InabonosPeer::populateObjects(InabonosPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			InabonosPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = InabonosPeer::getOMClass();
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
		return InabonosPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(InabonosPeer::ID);
			$selectCriteria->add(InabonosPeer::ID, $criteria->remove(InabonosPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(InabonosPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(InabonosPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Inabonos) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(InabonosPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Inabonos $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(InabonosPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(InabonosPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(InabonosPeer::DATABASE_NAME, InabonosPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = InabonosPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(InabonosPeer::DATABASE_NAME);

		$criteria->add(InabonosPeer::ID, $pk);


		$v = InabonosPeer::doSelect($criteria, $con);

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
			$criteria->add(InabonosPeer::ID, $pks, Criteria::IN);
			$objs = InabonosPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseInabonosPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/InabonosMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.InabonosMapBuilder');
}
