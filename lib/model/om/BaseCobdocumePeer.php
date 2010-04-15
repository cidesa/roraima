<?php


abstract class BaseCobdocumePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'cobdocume';

	
	const CLASS_DEFAULT = 'lib.model.Cobdocume';

	
	const NUM_COLUMNS = 19;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFDOC = 'cobdocume.REFDOC';

	
	const CODCLI = 'cobdocume.CODCLI';

	
	const FECEMI = 'cobdocume.FECEMI';

	
	const FECVEN = 'cobdocume.FECVEN';

	
	const ORIDOC = 'cobdocume.ORIDOC';

	
	const DESDOC = 'cobdocume.DESDOC';

	
	const MONDOC = 'cobdocume.MONDOC';

	
	const RECDOC = 'cobdocume.RECDOC';

	
	const DSCDOC = 'cobdocume.DSCDOC';

	
	const ABODOC = 'cobdocume.ABODOC';

	
	const SALDOC = 'cobdocume.SALDOC';

	
	const DESANU = 'cobdocume.DESANU';

	
	const FECANU = 'cobdocume.FECANU';

	
	const STADOC = 'cobdocume.STADOC';

	
	const NUMCOM = 'cobdocume.NUMCOM';

	
	const FECCOM = 'cobdocume.FECCOM';

	
	const REFFAC = 'cobdocume.REFFAC';

	
	const FATIPMOV_ID = 'cobdocume.FATIPMOV_ID';

	
	const ID = 'cobdocume.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refdoc', 'Codcli', 'Fecemi', 'Fecven', 'Oridoc', 'Desdoc', 'Mondoc', 'Recdoc', 'Dscdoc', 'Abodoc', 'Saldoc', 'Desanu', 'Fecanu', 'Stadoc', 'Numcom', 'Feccom', 'Reffac', 'FatipmovId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (CobdocumePeer::REFDOC, CobdocumePeer::CODCLI, CobdocumePeer::FECEMI, CobdocumePeer::FECVEN, CobdocumePeer::ORIDOC, CobdocumePeer::DESDOC, CobdocumePeer::MONDOC, CobdocumePeer::RECDOC, CobdocumePeer::DSCDOC, CobdocumePeer::ABODOC, CobdocumePeer::SALDOC, CobdocumePeer::DESANU, CobdocumePeer::FECANU, CobdocumePeer::STADOC, CobdocumePeer::NUMCOM, CobdocumePeer::FECCOM, CobdocumePeer::REFFAC, CobdocumePeer::FATIPMOV_ID, CobdocumePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refdoc', 'codcli', 'fecemi', 'fecven', 'oridoc', 'desdoc', 'mondoc', 'recdoc', 'dscdoc', 'abodoc', 'saldoc', 'desanu', 'fecanu', 'stadoc', 'numcom', 'feccom', 'reffac', 'fatipmov_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refdoc' => 0, 'Codcli' => 1, 'Fecemi' => 2, 'Fecven' => 3, 'Oridoc' => 4, 'Desdoc' => 5, 'Mondoc' => 6, 'Recdoc' => 7, 'Dscdoc' => 8, 'Abodoc' => 9, 'Saldoc' => 10, 'Desanu' => 11, 'Fecanu' => 12, 'Stadoc' => 13, 'Numcom' => 14, 'Feccom' => 15, 'Reffac' => 16, 'FatipmovId' => 17, 'Id' => 18, ),
		BasePeer::TYPE_COLNAME => array (CobdocumePeer::REFDOC => 0, CobdocumePeer::CODCLI => 1, CobdocumePeer::FECEMI => 2, CobdocumePeer::FECVEN => 3, CobdocumePeer::ORIDOC => 4, CobdocumePeer::DESDOC => 5, CobdocumePeer::MONDOC => 6, CobdocumePeer::RECDOC => 7, CobdocumePeer::DSCDOC => 8, CobdocumePeer::ABODOC => 9, CobdocumePeer::SALDOC => 10, CobdocumePeer::DESANU => 11, CobdocumePeer::FECANU => 12, CobdocumePeer::STADOC => 13, CobdocumePeer::NUMCOM => 14, CobdocumePeer::FECCOM => 15, CobdocumePeer::REFFAC => 16, CobdocumePeer::FATIPMOV_ID => 17, CobdocumePeer::ID => 18, ),
		BasePeer::TYPE_FIELDNAME => array ('refdoc' => 0, 'codcli' => 1, 'fecemi' => 2, 'fecven' => 3, 'oridoc' => 4, 'desdoc' => 5, 'mondoc' => 6, 'recdoc' => 7, 'dscdoc' => 8, 'abodoc' => 9, 'saldoc' => 10, 'desanu' => 11, 'fecanu' => 12, 'stadoc' => 13, 'numcom' => 14, 'feccom' => 15, 'reffac' => 16, 'fatipmov_id' => 17, 'id' => 18, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/CobdocumeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.CobdocumeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = CobdocumePeer::getTableMap();
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
		return str_replace(CobdocumePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(CobdocumePeer::REFDOC);

		$criteria->addSelectColumn(CobdocumePeer::CODCLI);

		$criteria->addSelectColumn(CobdocumePeer::FECEMI);

		$criteria->addSelectColumn(CobdocumePeer::FECVEN);

		$criteria->addSelectColumn(CobdocumePeer::ORIDOC);

		$criteria->addSelectColumn(CobdocumePeer::DESDOC);

		$criteria->addSelectColumn(CobdocumePeer::MONDOC);

		$criteria->addSelectColumn(CobdocumePeer::RECDOC);

		$criteria->addSelectColumn(CobdocumePeer::DSCDOC);

		$criteria->addSelectColumn(CobdocumePeer::ABODOC);

		$criteria->addSelectColumn(CobdocumePeer::SALDOC);

		$criteria->addSelectColumn(CobdocumePeer::DESANU);

		$criteria->addSelectColumn(CobdocumePeer::FECANU);

		$criteria->addSelectColumn(CobdocumePeer::STADOC);

		$criteria->addSelectColumn(CobdocumePeer::NUMCOM);

		$criteria->addSelectColumn(CobdocumePeer::FECCOM);

		$criteria->addSelectColumn(CobdocumePeer::REFFAC);

		$criteria->addSelectColumn(CobdocumePeer::FATIPMOV_ID);

		$criteria->addSelectColumn(CobdocumePeer::ID);

	}

	const COUNT = 'COUNT(cobdocume.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT cobdocume.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobdocumePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobdocumePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = CobdocumePeer::doSelectRS($criteria, $con);
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
		$objects = CobdocumePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return CobdocumePeer::populateObjects(CobdocumePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			CobdocumePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = CobdocumePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFatipmov(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobdocumePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobdocumePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CobdocumePeer::FATIPMOV_ID, FatipmovPeer::ID);

		$rs = CobdocumePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFatipmov(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobdocumePeer::addSelectColumns($c);
		$startcol = (CobdocumePeer::NUM_COLUMNS - CobdocumePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FatipmovPeer::addSelectColumns($c);

		$c->addJoin(CobdocumePeer::FATIPMOV_ID, FatipmovPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobdocumePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FatipmovPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFatipmov(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addCobdocume($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initCobdocumes();
				$obj2->addCobdocume($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(CobdocumePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(CobdocumePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(CobdocumePeer::FATIPMOV_ID, FatipmovPeer::ID);

		$rs = CobdocumePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		CobdocumePeer::addSelectColumns($c);
		$startcol2 = (CobdocumePeer::NUM_COLUMNS - CobdocumePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		FatipmovPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + FatipmovPeer::NUM_COLUMNS;

		$c->addJoin(CobdocumePeer::FATIPMOV_ID, FatipmovPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = CobdocumePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = FatipmovPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getFatipmov(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addCobdocume($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initCobdocumes();
				$obj2->addCobdocume($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return CobdocumePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(CobdocumePeer::ID); 

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
			$comparison = $criteria->getComparison(CobdocumePeer::ID);
			$selectCriteria->add(CobdocumePeer::ID, $criteria->remove(CobdocumePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(CobdocumePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(CobdocumePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Cobdocume) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CobdocumePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Cobdocume $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CobdocumePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CobdocumePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(CobdocumePeer::DATABASE_NAME, CobdocumePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = CobdocumePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(CobdocumePeer::DATABASE_NAME);

		$criteria->add(CobdocumePeer::ID, $pk);


		$v = CobdocumePeer::doSelect($criteria, $con);

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
			$criteria->add(CobdocumePeer::ID, $pks, Criteria::IN);
			$objs = CobdocumePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseCobdocumePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/CobdocumeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.CobdocumeMapBuilder');
}
