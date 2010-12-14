<?php


abstract class BaseViasolviatraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'viasolviatra';

	
	const CLASS_DEFAULT = 'lib.model.Viasolviatra';

	
	const NUM_COLUMNS = 22;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'viasolviatra.NUMSOL';

	
	const FECSOL = 'viasolviatra.FECSOL';

	
	const TIPVIA = 'viasolviatra.TIPVIA';

	
	const CODEMP = 'viasolviatra.CODEMP';

	
	const CODCAT = 'viasolviatra.CODCAT';

	
	const CODNIV = 'viasolviatra.CODNIV';

	
	const CODEMPACO = 'viasolviatra.CODEMPACO';

	
	const CODNIVACO = 'viasolviatra.CODNIVACO';

	
	const DESSOL = 'viasolviatra.DESSOL';

	
	const CODCIU = 'viasolviatra.CODCIU';

	
	const CODNIVAPR = 'viasolviatra.CODNIVAPR';

	
	const CODPROCED = 'viasolviatra.CODPROCED';

	
	const STATUS = 'viasolviatra.STATUS';

	
	const FECDES = 'viasolviatra.FECDES';

	
	const FECHAS = 'viasolviatra.FECHAS';

	
	const NUMDIA = 'viasolviatra.NUMDIA';

	
	const CODFORTRA = 'viasolviatra.CODFORTRA';

	
	const CODEMPAUT = 'viasolviatra.CODEMPAUT';

	
	const CODCEN = 'viasolviatra.CODCEN';

	
	const CODUBI = 'viasolviatra.CODUBI';

	
	const NOMEMPE = 'viasolviatra.NOMEMPE';

	
	const ID = 'viasolviatra.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Fecsol', 'Tipvia', 'Codemp', 'Codcat', 'Codniv', 'Codempaco', 'Codnivaco', 'Dessol', 'Codciu', 'Codnivapr', 'Codproced', 'Status', 'Fecdes', 'Fechas', 'Numdia', 'Codfortra', 'Codempaut', 'Codcen', 'Codubi', 'Nomempe', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ViasolviatraPeer::NUMSOL, ViasolviatraPeer::FECSOL, ViasolviatraPeer::TIPVIA, ViasolviatraPeer::CODEMP, ViasolviatraPeer::CODCAT, ViasolviatraPeer::CODNIV, ViasolviatraPeer::CODEMPACO, ViasolviatraPeer::CODNIVACO, ViasolviatraPeer::DESSOL, ViasolviatraPeer::CODCIU, ViasolviatraPeer::CODNIVAPR, ViasolviatraPeer::CODPROCED, ViasolviatraPeer::STATUS, ViasolviatraPeer::FECDES, ViasolviatraPeer::FECHAS, ViasolviatraPeer::NUMDIA, ViasolviatraPeer::CODFORTRA, ViasolviatraPeer::CODEMPAUT, ViasolviatraPeer::CODCEN, ViasolviatraPeer::CODUBI, ViasolviatraPeer::NOMEMPE, ViasolviatraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'fecsol', 'tipvia', 'codemp', 'codcat', 'codniv', 'codempaco', 'codnivaco', 'dessol', 'codciu', 'codnivapr', 'codproced', 'status', 'fecdes', 'fechas', 'numdia', 'codfortra', 'codempaut', 'codcen', 'codubi', 'nomempe', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Fecsol' => 1, 'Tipvia' => 2, 'Codemp' => 3, 'Codcat' => 4, 'Codniv' => 5, 'Codempaco' => 6, 'Codnivaco' => 7, 'Dessol' => 8, 'Codciu' => 9, 'Codnivapr' => 10, 'Codproced' => 11, 'Status' => 12, 'Fecdes' => 13, 'Fechas' => 14, 'Numdia' => 15, 'Codfortra' => 16, 'Codempaut' => 17, 'Codcen' => 18, 'Codubi' => 19, 'Nomempe' => 20, 'Id' => 21, ),
		BasePeer::TYPE_COLNAME => array (ViasolviatraPeer::NUMSOL => 0, ViasolviatraPeer::FECSOL => 1, ViasolviatraPeer::TIPVIA => 2, ViasolviatraPeer::CODEMP => 3, ViasolviatraPeer::CODCAT => 4, ViasolviatraPeer::CODNIV => 5, ViasolviatraPeer::CODEMPACO => 6, ViasolviatraPeer::CODNIVACO => 7, ViasolviatraPeer::DESSOL => 8, ViasolviatraPeer::CODCIU => 9, ViasolviatraPeer::CODNIVAPR => 10, ViasolviatraPeer::CODPROCED => 11, ViasolviatraPeer::STATUS => 12, ViasolviatraPeer::FECDES => 13, ViasolviatraPeer::FECHAS => 14, ViasolviatraPeer::NUMDIA => 15, ViasolviatraPeer::CODFORTRA => 16, ViasolviatraPeer::CODEMPAUT => 17, ViasolviatraPeer::CODCEN => 18, ViasolviatraPeer::CODUBI => 19, ViasolviatraPeer::NOMEMPE => 20, ViasolviatraPeer::ID => 21, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'fecsol' => 1, 'tipvia' => 2, 'codemp' => 3, 'codcat' => 4, 'codniv' => 5, 'codempaco' => 6, 'codnivaco' => 7, 'dessol' => 8, 'codciu' => 9, 'codnivapr' => 10, 'codproced' => 11, 'status' => 12, 'fecdes' => 13, 'fechas' => 14, 'numdia' => 15, 'codfortra' => 16, 'codempaut' => 17, 'codcen' => 18, 'codubi' => 19, 'nomempe' => 20, 'id' => 21, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ViasolviatraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ViasolviatraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ViasolviatraPeer::getTableMap();
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
		return str_replace(ViasolviatraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ViasolviatraPeer::NUMSOL);

		$criteria->addSelectColumn(ViasolviatraPeer::FECSOL);

		$criteria->addSelectColumn(ViasolviatraPeer::TIPVIA);

		$criteria->addSelectColumn(ViasolviatraPeer::CODEMP);

		$criteria->addSelectColumn(ViasolviatraPeer::CODCAT);

		$criteria->addSelectColumn(ViasolviatraPeer::CODNIV);

		$criteria->addSelectColumn(ViasolviatraPeer::CODEMPACO);

		$criteria->addSelectColumn(ViasolviatraPeer::CODNIVACO);

		$criteria->addSelectColumn(ViasolviatraPeer::DESSOL);

		$criteria->addSelectColumn(ViasolviatraPeer::CODCIU);

		$criteria->addSelectColumn(ViasolviatraPeer::CODNIVAPR);

		$criteria->addSelectColumn(ViasolviatraPeer::CODPROCED);

		$criteria->addSelectColumn(ViasolviatraPeer::STATUS);

		$criteria->addSelectColumn(ViasolviatraPeer::FECDES);

		$criteria->addSelectColumn(ViasolviatraPeer::FECHAS);

		$criteria->addSelectColumn(ViasolviatraPeer::NUMDIA);

		$criteria->addSelectColumn(ViasolviatraPeer::CODFORTRA);

		$criteria->addSelectColumn(ViasolviatraPeer::CODEMPAUT);

		$criteria->addSelectColumn(ViasolviatraPeer::CODCEN);

		$criteria->addSelectColumn(ViasolviatraPeer::CODUBI);

		$criteria->addSelectColumn(ViasolviatraPeer::NOMEMPE);

		$criteria->addSelectColumn(ViasolviatraPeer::ID);

	}

	const COUNT = 'COUNT(viasolviatra.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT viasolviatra.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ViasolviatraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ViasolviatraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ViasolviatraPeer::doSelectRS($criteria, $con);
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
		$objects = ViasolviatraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ViasolviatraPeer::populateObjects(ViasolviatraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ViasolviatraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ViasolviatraPeer::getOMClass();
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
		return ViasolviatraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ViasolviatraPeer::ID); 

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
			$comparison = $criteria->getComparison(ViasolviatraPeer::ID);
			$selectCriteria->add(ViasolviatraPeer::ID, $criteria->remove(ViasolviatraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(ViasolviatraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ViasolviatraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Viasolviatra) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ViasolviatraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Viasolviatra $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ViasolviatraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ViasolviatraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ViasolviatraPeer::DATABASE_NAME, ViasolviatraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ViasolviatraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ViasolviatraPeer::DATABASE_NAME);

		$criteria->add(ViasolviatraPeer::ID, $pk);


		$v = ViasolviatraPeer::doSelect($criteria, $con);

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
			$criteria->add(ViasolviatraPeer::ID, $pks, Criteria::IN);
			$objs = ViasolviatraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseViasolviatraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ViasolviatraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ViasolviatraMapBuilder');
}
