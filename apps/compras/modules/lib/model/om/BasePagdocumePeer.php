<?php


abstract class BasePagdocumePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pagdocume';

	
	const CLASS_DEFAULT = 'lib.model.Pagdocume';

	
	const NUM_COLUMNS = 18;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const REFDOC = 'pagdocume.REFDOC';

	
	const CODPRO = 'pagdocume.CODPRO';

	
	const CODMOV = 'pagdocume.CODMOV';

	
	const FECEMI = 'pagdocume.FECEMI';

	
	const FECVEN = 'pagdocume.FECVEN';

	
	const ORIDOC = 'pagdocume.ORIDOC';

	
	const DESDOC = 'pagdocume.DESDOC';

	
	const MONDOC = 'pagdocume.MONDOC';

	
	const RECDOC = 'pagdocume.RECDOC';

	
	const DSCDOC = 'pagdocume.DSCDOC';

	
	const ABODOC = 'pagdocume.ABODOC';

	
	const SALDOC = 'pagdocume.SALDOC';

	
	const FECANU = 'pagdocume.FECANU';

	
	const DESANU = 'pagdocume.DESANU';

	
	const STADOC = 'pagdocume.STADOC';

	
	const NUMCOM = 'pagdocume.NUMCOM';

	
	const FECCOM = 'pagdocume.FECCOM';

	
	const ID = 'pagdocume.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Refdoc', 'Codpro', 'Codmov', 'Fecemi', 'Fecven', 'Oridoc', 'Desdoc', 'Mondoc', 'Recdoc', 'Dscdoc', 'Abodoc', 'Saldoc', 'Fecanu', 'Desanu', 'Stadoc', 'Numcom', 'Feccom', 'Id', ),
		BasePeer::TYPE_COLNAME => array (PagdocumePeer::REFDOC, PagdocumePeer::CODPRO, PagdocumePeer::CODMOV, PagdocumePeer::FECEMI, PagdocumePeer::FECVEN, PagdocumePeer::ORIDOC, PagdocumePeer::DESDOC, PagdocumePeer::MONDOC, PagdocumePeer::RECDOC, PagdocumePeer::DSCDOC, PagdocumePeer::ABODOC, PagdocumePeer::SALDOC, PagdocumePeer::FECANU, PagdocumePeer::DESANU, PagdocumePeer::STADOC, PagdocumePeer::NUMCOM, PagdocumePeer::FECCOM, PagdocumePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('refdoc', 'codpro', 'codmov', 'fecemi', 'fecven', 'oridoc', 'desdoc', 'mondoc', 'recdoc', 'dscdoc', 'abodoc', 'saldoc', 'fecanu', 'desanu', 'stadoc', 'numcom', 'feccom', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Refdoc' => 0, 'Codpro' => 1, 'Codmov' => 2, 'Fecemi' => 3, 'Fecven' => 4, 'Oridoc' => 5, 'Desdoc' => 6, 'Mondoc' => 7, 'Recdoc' => 8, 'Dscdoc' => 9, 'Abodoc' => 10, 'Saldoc' => 11, 'Fecanu' => 12, 'Desanu' => 13, 'Stadoc' => 14, 'Numcom' => 15, 'Feccom' => 16, 'Id' => 17, ),
		BasePeer::TYPE_COLNAME => array (PagdocumePeer::REFDOC => 0, PagdocumePeer::CODPRO => 1, PagdocumePeer::CODMOV => 2, PagdocumePeer::FECEMI => 3, PagdocumePeer::FECVEN => 4, PagdocumePeer::ORIDOC => 5, PagdocumePeer::DESDOC => 6, PagdocumePeer::MONDOC => 7, PagdocumePeer::RECDOC => 8, PagdocumePeer::DSCDOC => 9, PagdocumePeer::ABODOC => 10, PagdocumePeer::SALDOC => 11, PagdocumePeer::FECANU => 12, PagdocumePeer::DESANU => 13, PagdocumePeer::STADOC => 14, PagdocumePeer::NUMCOM => 15, PagdocumePeer::FECCOM => 16, PagdocumePeer::ID => 17, ),
		BasePeer::TYPE_FIELDNAME => array ('refdoc' => 0, 'codpro' => 1, 'codmov' => 2, 'fecemi' => 3, 'fecven' => 4, 'oridoc' => 5, 'desdoc' => 6, 'mondoc' => 7, 'recdoc' => 8, 'dscdoc' => 9, 'abodoc' => 10, 'saldoc' => 11, 'fecanu' => 12, 'desanu' => 13, 'stadoc' => 14, 'numcom' => 15, 'feccom' => 16, 'id' => 17, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PagdocumeMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PagdocumeMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PagdocumePeer::getTableMap();
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
		return str_replace(PagdocumePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PagdocumePeer::REFDOC);

		$criteria->addSelectColumn(PagdocumePeer::CODPRO);

		$criteria->addSelectColumn(PagdocumePeer::CODMOV);

		$criteria->addSelectColumn(PagdocumePeer::FECEMI);

		$criteria->addSelectColumn(PagdocumePeer::FECVEN);

		$criteria->addSelectColumn(PagdocumePeer::ORIDOC);

		$criteria->addSelectColumn(PagdocumePeer::DESDOC);

		$criteria->addSelectColumn(PagdocumePeer::MONDOC);

		$criteria->addSelectColumn(PagdocumePeer::RECDOC);

		$criteria->addSelectColumn(PagdocumePeer::DSCDOC);

		$criteria->addSelectColumn(PagdocumePeer::ABODOC);

		$criteria->addSelectColumn(PagdocumePeer::SALDOC);

		$criteria->addSelectColumn(PagdocumePeer::FECANU);

		$criteria->addSelectColumn(PagdocumePeer::DESANU);

		$criteria->addSelectColumn(PagdocumePeer::STADOC);

		$criteria->addSelectColumn(PagdocumePeer::NUMCOM);

		$criteria->addSelectColumn(PagdocumePeer::FECCOM);

		$criteria->addSelectColumn(PagdocumePeer::ID);

	}

	const COUNT = 'COUNT(pagdocume.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pagdocume.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PagdocumePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PagdocumePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PagdocumePeer::doSelectRS($criteria, $con);
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
		$objects = PagdocumePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PagdocumePeer::populateObjects(PagdocumePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PagdocumePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PagdocumePeer::getOMClass();
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
		return PagdocumePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PagdocumePeer::ID); 

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
			$comparison = $criteria->getComparison(PagdocumePeer::ID);
			$selectCriteria->add(PagdocumePeer::ID, $criteria->remove(PagdocumePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PagdocumePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PagdocumePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Pagdocume) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PagdocumePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Pagdocume $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PagdocumePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PagdocumePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PagdocumePeer::DATABASE_NAME, PagdocumePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PagdocumePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PagdocumePeer::DATABASE_NAME);

		$criteria->add(PagdocumePeer::ID, $pk);


		$v = PagdocumePeer::doSelect($criteria, $con);

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
			$criteria->add(PagdocumePeer::ID, $pks, Criteria::IN);
			$objs = PagdocumePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePagdocumePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PagdocumeMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PagdocumeMapBuilder');
}
