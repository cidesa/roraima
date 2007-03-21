<?php


abstract class BasePagtransaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pagtransa';

	
	const CLASS_DEFAULT = 'lib.model.Pagtransa';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMTRA = 'pagtransa.NUMTRA';

	
	const FECTRA = 'pagtransa.FECTRA';

	
	const CODPRO = 'pagtransa.CODPRO';

	
	const CODMOV = 'pagtransa.CODMOV';

	
	const DESTRA = 'pagtransa.DESTRA';

	
	const MONTRA = 'pagtransa.MONTRA';

	
	const TOTDSC = 'pagtransa.TOTDSC';

	
	const TOTREC = 'pagtransa.TOTREC';

	
	const TOTTRA = 'pagtransa.TOTTRA';

	
	const STAIMP = 'pagtransa.STAIMP';

	
	const NUMCHE = 'pagtransa.NUMCHE';

	
	const DESANU = 'pagtransa.DESANU';

	
	const FECANU = 'pagtransa.FECANU';

	
	const RIFPRO = 'pagtransa.RIFPRO';

	
	const NUMCOM = 'pagtransa.NUMCOM';

	
	const FECCOM = 'pagtransa.FECCOM';

	
	const ID = 'pagtransa.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra', 'Fectra', 'Codpro', 'Codmov', 'Destra', 'Montra', 'Totdsc', 'Totrec', 'Tottra', 'Staimp', 'Numche', 'Desanu', 'Fecanu', 'Rifpro', 'Numcom', 'Feccom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (PagtransaPeer::NUMTRA, PagtransaPeer::FECTRA, PagtransaPeer::CODPRO, PagtransaPeer::CODMOV, PagtransaPeer::DESTRA, PagtransaPeer::MONTRA, PagtransaPeer::TOTDSC, PagtransaPeer::TOTREC, PagtransaPeer::TOTTRA, PagtransaPeer::STAIMP, PagtransaPeer::NUMCHE, PagtransaPeer::DESANU, PagtransaPeer::FECANU, PagtransaPeer::RIFPRO, PagtransaPeer::NUMCOM, PagtransaPeer::FECCOM, PagtransaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra', 'fectra', 'codpro', 'codmov', 'destra', 'montra', 'totdsc', 'totrec', 'tottra', 'staimp', 'numche', 'desanu', 'fecanu', 'rifpro', 'numcom', 'feccom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numtra' => 0, 'Fectra' => 1, 'Codpro' => 2, 'Codmov' => 3, 'Destra' => 4, 'Montra' => 5, 'Totdsc' => 6, 'Totrec' => 7, 'Tottra' => 8, 'Staimp' => 9, 'Numche' => 10, 'Desanu' => 11, 'Fecanu' => 12, 'Rifpro' => 13, 'Numcom' => 14, 'Feccom' => 15, 'Id' => 16, ),
		BasePeer::TYPE_COLNAME => array (PagtransaPeer::NUMTRA => 0, PagtransaPeer::FECTRA => 1, PagtransaPeer::CODPRO => 2, PagtransaPeer::CODMOV => 3, PagtransaPeer::DESTRA => 4, PagtransaPeer::MONTRA => 5, PagtransaPeer::TOTDSC => 6, PagtransaPeer::TOTREC => 7, PagtransaPeer::TOTTRA => 8, PagtransaPeer::STAIMP => 9, PagtransaPeer::NUMCHE => 10, PagtransaPeer::DESANU => 11, PagtransaPeer::FECANU => 12, PagtransaPeer::RIFPRO => 13, PagtransaPeer::NUMCOM => 14, PagtransaPeer::FECCOM => 15, PagtransaPeer::ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('numtra' => 0, 'fectra' => 1, 'codpro' => 2, 'codmov' => 3, 'destra' => 4, 'montra' => 5, 'totdsc' => 6, 'totrec' => 7, 'tottra' => 8, 'staimp' => 9, 'numche' => 10, 'desanu' => 11, 'fecanu' => 12, 'rifpro' => 13, 'numcom' => 14, 'feccom' => 15, 'id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PagtransaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PagtransaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PagtransaPeer::getTableMap();
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
		return str_replace(PagtransaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PagtransaPeer::NUMTRA);

		$criteria->addSelectColumn(PagtransaPeer::FECTRA);

		$criteria->addSelectColumn(PagtransaPeer::CODPRO);

		$criteria->addSelectColumn(PagtransaPeer::CODMOV);

		$criteria->addSelectColumn(PagtransaPeer::DESTRA);

		$criteria->addSelectColumn(PagtransaPeer::MONTRA);

		$criteria->addSelectColumn(PagtransaPeer::TOTDSC);

		$criteria->addSelectColumn(PagtransaPeer::TOTREC);

		$criteria->addSelectColumn(PagtransaPeer::TOTTRA);

		$criteria->addSelectColumn(PagtransaPeer::STAIMP);

		$criteria->addSelectColumn(PagtransaPeer::NUMCHE);

		$criteria->addSelectColumn(PagtransaPeer::DESANU);

		$criteria->addSelectColumn(PagtransaPeer::FECANU);

		$criteria->addSelectColumn(PagtransaPeer::RIFPRO);

		$criteria->addSelectColumn(PagtransaPeer::NUMCOM);

		$criteria->addSelectColumn(PagtransaPeer::FECCOM);

		$criteria->addSelectColumn(PagtransaPeer::ID);

	}

	const COUNT = 'COUNT(pagtransa.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pagtransa.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PagtransaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PagtransaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PagtransaPeer::doSelectRS($criteria, $con);
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
		$objects = PagtransaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PagtransaPeer::populateObjects(PagtransaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PagtransaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PagtransaPeer::getOMClass();
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
		return PagtransaPeer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(PagtransaPeer::ID);
			$selectCriteria->add(PagtransaPeer::ID, $criteria->remove(PagtransaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PagtransaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PagtransaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Pagtransa) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PagtransaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Pagtransa $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PagtransaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PagtransaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PagtransaPeer::DATABASE_NAME, PagtransaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PagtransaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PagtransaPeer::DATABASE_NAME);

		$criteria->add(PagtransaPeer::ID, $pk);


		$v = PagtransaPeer::doSelect($criteria, $con);

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
			$criteria->add(PagtransaPeer::ID, $pks, Criteria::IN);
			$objs = PagtransaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePagtransaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PagtransaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PagtransaMapBuilder');
}
