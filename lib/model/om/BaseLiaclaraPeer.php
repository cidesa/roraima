<?php


abstract class BaseLiaclaraPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'liaclara';

	
	const CLASS_DEFAULT = 'lib.model.Liaclara';

	
	const NUM_COLUMNS = 21;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMPLIE = 'liaclara.NUMPLIE';

	
	const NUMEXP = 'liaclara.NUMEXP';

	
	const NUMACLA = 'liaclara.NUMACLA';

	
	const CODEMPADM = 'liaclara.CODEMPADM';

	
	const CODUNIADM = 'liaclara.CODUNIADM';

	
	const CODEMPEJE = 'liaclara.CODEMPEJE';

	
	const CODUNISTE = 'liaclara.CODUNISTE';

	
	const FECREG = 'liaclara.FECREG';

	
	const DIAS = 'liaclara.DIAS';

	
	const FECVEN = 'liaclara.FECVEN';

	
	const DETPRE = 'liaclara.DETPRE';

	
	const FECPRE = 'liaclara.FECPRE';

	
	const DETRES = 'liaclara.DETRES';

	
	const FECRES = 'liaclara.FECRES';

	
	const DOCANE1 = 'liaclara.DOCANE1';

	
	const DOCANE2 = 'liaclara.DOCANE2';

	
	const DOCANE3 = 'liaclara.DOCANE3';

	
	const PREPOR = 'liaclara.PREPOR';

	
	const CARGOPRE = 'liaclara.CARGOPRE';

	
	const CODPRO = 'liaclara.CODPRO';

	
	const ID = 'liaclara.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie', 'Numexp', 'Numacla', 'Codempadm', 'Coduniadm', 'Codempeje', 'Coduniste', 'Fecreg', 'Dias', 'Fecven', 'Detpre', 'Fecpre', 'Detres', 'Fecres', 'Docane1', 'Docane2', 'Docane3', 'Prepor', 'Cargopre', 'Codpro', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LiaclaraPeer::NUMPLIE, LiaclaraPeer::NUMEXP, LiaclaraPeer::NUMACLA, LiaclaraPeer::CODEMPADM, LiaclaraPeer::CODUNIADM, LiaclaraPeer::CODEMPEJE, LiaclaraPeer::CODUNISTE, LiaclaraPeer::FECREG, LiaclaraPeer::DIAS, LiaclaraPeer::FECVEN, LiaclaraPeer::DETPRE, LiaclaraPeer::FECPRE, LiaclaraPeer::DETRES, LiaclaraPeer::FECRES, LiaclaraPeer::DOCANE1, LiaclaraPeer::DOCANE2, LiaclaraPeer::DOCANE3, LiaclaraPeer::PREPOR, LiaclaraPeer::CARGOPRE, LiaclaraPeer::CODPRO, LiaclaraPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie', 'numexp', 'numacla', 'codempadm', 'coduniadm', 'codempeje', 'coduniste', 'fecreg', 'dias', 'fecven', 'detpre', 'fecpre', 'detres', 'fecres', 'docane1', 'docane2', 'docane3', 'prepor', 'cargopre', 'codpro', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numplie' => 0, 'Numexp' => 1, 'Numacla' => 2, 'Codempadm' => 3, 'Coduniadm' => 4, 'Codempeje' => 5, 'Coduniste' => 6, 'Fecreg' => 7, 'Dias' => 8, 'Fecven' => 9, 'Detpre' => 10, 'Fecpre' => 11, 'Detres' => 12, 'Fecres' => 13, 'Docane1' => 14, 'Docane2' => 15, 'Docane3' => 16, 'Prepor' => 17, 'Cargopre' => 18, 'Codpro' => 19, 'Id' => 20, ),
		BasePeer::TYPE_COLNAME => array (LiaclaraPeer::NUMPLIE => 0, LiaclaraPeer::NUMEXP => 1, LiaclaraPeer::NUMACLA => 2, LiaclaraPeer::CODEMPADM => 3, LiaclaraPeer::CODUNIADM => 4, LiaclaraPeer::CODEMPEJE => 5, LiaclaraPeer::CODUNISTE => 6, LiaclaraPeer::FECREG => 7, LiaclaraPeer::DIAS => 8, LiaclaraPeer::FECVEN => 9, LiaclaraPeer::DETPRE => 10, LiaclaraPeer::FECPRE => 11, LiaclaraPeer::DETRES => 12, LiaclaraPeer::FECRES => 13, LiaclaraPeer::DOCANE1 => 14, LiaclaraPeer::DOCANE2 => 15, LiaclaraPeer::DOCANE3 => 16, LiaclaraPeer::PREPOR => 17, LiaclaraPeer::CARGOPRE => 18, LiaclaraPeer::CODPRO => 19, LiaclaraPeer::ID => 20, ),
		BasePeer::TYPE_FIELDNAME => array ('numplie' => 0, 'numexp' => 1, 'numacla' => 2, 'codempadm' => 3, 'coduniadm' => 4, 'codempeje' => 5, 'coduniste' => 6, 'fecreg' => 7, 'dias' => 8, 'fecven' => 9, 'detpre' => 10, 'fecpre' => 11, 'detres' => 12, 'fecres' => 13, 'docane1' => 14, 'docane2' => 15, 'docane3' => 16, 'prepor' => 17, 'cargopre' => 18, 'codpro' => 19, 'id' => 20, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LiaclaraMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LiaclaraMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LiaclaraPeer::getTableMap();
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
		return str_replace(LiaclaraPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LiaclaraPeer::NUMPLIE);

		$criteria->addSelectColumn(LiaclaraPeer::NUMEXP);

		$criteria->addSelectColumn(LiaclaraPeer::NUMACLA);

		$criteria->addSelectColumn(LiaclaraPeer::CODEMPADM);

		$criteria->addSelectColumn(LiaclaraPeer::CODUNIADM);

		$criteria->addSelectColumn(LiaclaraPeer::CODEMPEJE);

		$criteria->addSelectColumn(LiaclaraPeer::CODUNISTE);

		$criteria->addSelectColumn(LiaclaraPeer::FECREG);

		$criteria->addSelectColumn(LiaclaraPeer::DIAS);

		$criteria->addSelectColumn(LiaclaraPeer::FECVEN);

		$criteria->addSelectColumn(LiaclaraPeer::DETPRE);

		$criteria->addSelectColumn(LiaclaraPeer::FECPRE);

		$criteria->addSelectColumn(LiaclaraPeer::DETRES);

		$criteria->addSelectColumn(LiaclaraPeer::FECRES);

		$criteria->addSelectColumn(LiaclaraPeer::DOCANE1);

		$criteria->addSelectColumn(LiaclaraPeer::DOCANE2);

		$criteria->addSelectColumn(LiaclaraPeer::DOCANE3);

		$criteria->addSelectColumn(LiaclaraPeer::PREPOR);

		$criteria->addSelectColumn(LiaclaraPeer::CARGOPRE);

		$criteria->addSelectColumn(LiaclaraPeer::CODPRO);

		$criteria->addSelectColumn(LiaclaraPeer::ID);

	}

	const COUNT = 'COUNT(liaclara.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT liaclara.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LiaclaraPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LiaclaraPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LiaclaraPeer::doSelectRS($criteria, $con);
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
		$objects = LiaclaraPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LiaclaraPeer::populateObjects(LiaclaraPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LiaclaraPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LiaclaraPeer::getOMClass();
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
		return LiaclaraPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(LiaclaraPeer::ID); 

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
			$comparison = $criteria->getComparison(LiaclaraPeer::ID);
			$selectCriteria->add(LiaclaraPeer::ID, $criteria->remove(LiaclaraPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(LiaclaraPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LiaclaraPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Liaclara) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LiaclaraPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Liaclara $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LiaclaraPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LiaclaraPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LiaclaraPeer::DATABASE_NAME, LiaclaraPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LiaclaraPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LiaclaraPeer::DATABASE_NAME);

		$criteria->add(LiaclaraPeer::ID, $pk);


		$v = LiaclaraPeer::doSelect($criteria, $con);

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
			$criteria->add(LiaclaraPeer::ID, $pks, Criteria::IN);
			$objs = LiaclaraPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLiaclaraPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LiaclaraMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LiaclaraMapBuilder');
}
