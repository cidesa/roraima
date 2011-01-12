<?php


abstract class BaseCiregingPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cireging';

	
	const CLASS_DEFAULT = 'lib.model.ingresos.Cireging';

	
	const NUM_COLUMNS = 26;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFING = 'cireging.REFING';

	
	const FECING = 'cireging.FECING';

	
	const DESING = 'cireging.DESING';

	
	const CODTIP = 'cireging.CODTIP';

	
	const RIFCON = 'cireging.RIFCON';

	
	const MONING = 'cireging.MONING';

	
	const MONREC = 'cireging.MONREC';

	
	const MONDES = 'cireging.MONDES';

	
	const MONTOT = 'cireging.MONTOT';

	
	const DESANU = 'cireging.DESANU';

	
	const FECANU = 'cireging.FECANU';

	
	const STAING = 'cireging.STAING';

	
	const CTABAN = 'cireging.CTABAN';

	
	const TIPMOV = 'cireging.TIPMOV';

	
	const PREVIS = 'cireging.PREVIS';

	
	const ANOING = 'cireging.ANOING';

	
	const NUMDEP = 'cireging.NUMDEP';

	
	const NUMOFI = 'cireging.NUMOFI';

	
	const NUMCOM = 'cireging.NUMCOM';

	
	const REFLIB = 'cireging.REFLIB';

	
	const STALIQ = 'cireging.STALIQ';

	
	const FECLIQ = 'cireging.FECLIQ';

	
	const REFLIQ = 'cireging.REFLIQ';

	
	const DESLIQ = 'cireging.DESLIQ';

	const FECDEP = 'cireging.FECDEP';

	
	const ID = 'cireging.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refing', 'Fecing', 'Desing', 'Codtip', 'Rifcon', 'Moning', 'Monrec', 'Mondes', 'Montot', 'Desanu', 'Fecanu', 'Staing', 'Ctaban', 'Tipmov', 'Previs', 'Anoing', 'Numdep', 'Numofi', 'Numcom', 'Reflib', 'Staliq', 'Fecliq', 'Refliq', 'Desliq', 'Fecdep', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CiregingPeer::REFING, CiregingPeer::FECING, CiregingPeer::DESING, CiregingPeer::CODTIP, CiregingPeer::RIFCON, CiregingPeer::MONING, CiregingPeer::MONREC, CiregingPeer::MONDES, CiregingPeer::MONTOT, CiregingPeer::DESANU, CiregingPeer::FECANU, CiregingPeer::STAING, CiregingPeer::CTABAN, CiregingPeer::TIPMOV, CiregingPeer::PREVIS, CiregingPeer::ANOING, CiregingPeer::NUMDEP, CiregingPeer::NUMOFI, CiregingPeer::NUMCOM, CiregingPeer::REFLIB, CiregingPeer::STALIQ, CiregingPeer::FECLIQ, CiregingPeer::REFLIQ, CiregingPeer::DESLIQ, CiregingPeer::FECDEP, CiregingPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refing', 'fecing', 'desing', 'codtip', 'rifcon', 'moning', 'monrec', 'mondes', 'montot', 'desanu', 'fecanu', 'staing', 'ctaban', 'tipmov', 'previs', 'anoing', 'numdep', 'numofi', 'numcom', 'reflib', 'staliq', 'fecliq', 'refliq', 'desliq', 'fecdep', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refing' => 0, 'Fecing' => 1, 'Desing' => 2, 'Codtip' => 3, 'Rifcon' => 4, 'Moning' => 5, 'Monrec' => 6, 'Mondes' => 7, 'Montot' => 8, 'Desanu' => 9, 'Fecanu' => 10, 'Staing' => 11, 'Ctaban' => 12, 'Tipmov' => 13, 'Previs' => 14, 'Anoing' => 15, 'Numdep' => 16, 'Numofi' => 17, 'Numcom' => 18, 'Reflib' => 19, 'Staliq' => 20, 'Fecliq' => 21, 'Refliq' => 22, 'Desliq' => 23, 'Fecdep' => 24, 'Id' => 25, ),
		BasePeer::TYPE_COLNAME => array (CiregingPeer::REFING => 0, CiregingPeer::FECING => 1, CiregingPeer::DESING => 2, CiregingPeer::CODTIP => 3, CiregingPeer::RIFCON => 4, CiregingPeer::MONING => 5, CiregingPeer::MONREC => 6, CiregingPeer::MONDES => 7, CiregingPeer::MONTOT => 8, CiregingPeer::DESANU => 9, CiregingPeer::FECANU => 10, CiregingPeer::STAING => 11, CiregingPeer::CTABAN => 12, CiregingPeer::TIPMOV => 13, CiregingPeer::PREVIS => 14, CiregingPeer::ANOING => 15, CiregingPeer::NUMDEP => 16, CiregingPeer::NUMOFI => 17, CiregingPeer::NUMCOM => 18, CiregingPeer::REFLIB => 19, CiregingPeer::STALIQ => 20, CiregingPeer::FECLIQ => 21, CiregingPeer::REFLIQ => 22, CiregingPeer::DESLIQ => 23, CiregingPeer::FECDEP => 24, CiregingPeer::ID => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('refing' => 0, 'fecing' => 1, 'desing' => 2, 'codtip' => 3, 'rifcon' => 4, 'moning' => 5, 'monrec' => 6, 'mondes' => 7, 'montot' => 8, 'desanu' => 9, 'fecanu' => 10, 'staing' => 11, 'ctaban' => 12, 'tipmov' => 13, 'previs' => 14, 'anoing' => 15, 'numdep' => 16, 'numofi' => 17, 'numcom' => 18, 'reflib' => 19, 'staliq' => 20, 'fecliq' => 21, 'refliq' => 22, 'desliq' => 23, 'fecdep' => 24, 'id' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/ingresos/map/CiregingMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.ingresos.map.CiregingMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CiregingPeer::getTableMap();
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
		return str_replace(CiregingPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CiregingPeer::REFING);

		$criteria->addSelectColumn(CiregingPeer::FECING);

		$criteria->addSelectColumn(CiregingPeer::DESING);

		$criteria->addSelectColumn(CiregingPeer::CODTIP);

		$criteria->addSelectColumn(CiregingPeer::RIFCON);

		$criteria->addSelectColumn(CiregingPeer::MONING);

		$criteria->addSelectColumn(CiregingPeer::MONREC);

		$criteria->addSelectColumn(CiregingPeer::MONDES);

		$criteria->addSelectColumn(CiregingPeer::MONTOT);

		$criteria->addSelectColumn(CiregingPeer::DESANU);

		$criteria->addSelectColumn(CiregingPeer::FECANU);

		$criteria->addSelectColumn(CiregingPeer::STAING);

		$criteria->addSelectColumn(CiregingPeer::CTABAN);

		$criteria->addSelectColumn(CiregingPeer::TIPMOV);

		$criteria->addSelectColumn(CiregingPeer::PREVIS);

		$criteria->addSelectColumn(CiregingPeer::ANOING);

		$criteria->addSelectColumn(CiregingPeer::NUMDEP);

		$criteria->addSelectColumn(CiregingPeer::NUMOFI);

		$criteria->addSelectColumn(CiregingPeer::NUMCOM);

		$criteria->addSelectColumn(CiregingPeer::REFLIB);

		$criteria->addSelectColumn(CiregingPeer::STALIQ);

		$criteria->addSelectColumn(CiregingPeer::FECLIQ);

		$criteria->addSelectColumn(CiregingPeer::REFLIQ);

		$criteria->addSelectColumn(CiregingPeer::DESLIQ);

		$criteria->addSelectColumn(CiregingPeer::FECDEP);
				
		$criteria->addSelectColumn(CiregingPeer::ID);

	}

	const COUNT = 'COUNT(cireging.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cireging.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CiregingPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CiregingPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CiregingPeer::doSelectRS($criteria, $con);
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
		$objects = CiregingPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CiregingPeer::populateObjects(CiregingPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CiregingPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CiregingPeer::getOMClass();
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
		return CiregingPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CiregingPeer::ID); 

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
			$comparison = $criteria->getComparison(CiregingPeer::ID);
			$selectCriteria->add(CiregingPeer::ID, $criteria->remove(CiregingPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CiregingPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CiregingPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cireging) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CiregingPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cireging $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CiregingPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CiregingPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CiregingPeer::DATABASE_NAME, CiregingPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CiregingPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CiregingPeer::DATABASE_NAME);

		$criteria->add(CiregingPeer::ID, $pk);


		$v = CiregingPeer::doSelect($criteria, $con);

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
			$criteria->add(CiregingPeer::ID, $pks, Criteria::IN);
			$objs = CiregingPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCiregingPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/ingresos/map/CiregingMapBuilder.php';
	Propel::registerMapBuilder('lib.model.ingresos.map.CiregingMapBuilder');
}
