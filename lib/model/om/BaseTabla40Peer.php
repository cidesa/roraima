<?php


abstract class BaseTabla40Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'tabla40';

	
	const CLASS_DEFAULT = 'lib.model.Tabla40';

	
	const NUM_COLUMNS = 49;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMORD = 'tabla40.NUMORD';

	
	const TIPCAU = 'tabla40.TIPCAU';

	
	const FECEMI = 'tabla40.FECEMI';

	
	const CEDRIF = 'tabla40.CEDRIF';

	
	const NOMBEN = 'tabla40.NOMBEN';

	
	const MONORD = 'tabla40.MONORD';

	
	const DESORD = 'tabla40.DESORD';

	
	const MONDES = 'tabla40.MONDES';

	
	const MONRET = 'tabla40.MONRET';

	
	const NUMCHE = 'tabla40.NUMCHE';

	
	const CTABAN = 'tabla40.CTABAN';

	
	const CTAPAG = 'tabla40.CTAPAG';

	
	const NUMCOM = 'tabla40.NUMCOM';

	
	const STATUS = 'tabla40.STATUS';

	
	const CODUNI = 'tabla40.CODUNI';

	
	const FECENVCON = 'tabla40.FECENVCON';

	
	const FECENVFIN = 'tabla40.FECENVFIN';

	
	const CTAPAGFIN = 'tabla40.CTAPAGFIN';

	
	const OBSORD = 'tabla40.OBSORD';

	
	const FECVEN = 'tabla40.FECVEN';

	
	const FECANU = 'tabla40.FECANU';

	
	const DESANU = 'tabla40.DESANU';

	
	const MONPAG = 'tabla40.MONPAG';

	
	const APROBA = 'tabla40.APROBA';

	
	const NOMBENSUS = 'tabla40.NOMBENSUS';

	
	const FECRECFIN = 'tabla40.FECRECFIN';

	
	const ANOPRE = 'tabla40.ANOPRE';

	
	const FECPAG = 'tabla40.FECPAG';

	
	const NUMTIQ = 'tabla40.NUMTIQ';

	
	const PERAUT = 'tabla40.PERAUT';

	
	const CEDAUT = 'tabla40.CEDAUT';

	
	const NOMPER2 = 'tabla40.NOMPER2';

	
	const NOMPER1 = 'tabla40.NOMPER1';

	
	const HORCON = 'tabla40.HORCON';

	
	const FECCON = 'tabla40.FECCON';

	
	const NOMCAT = 'tabla40.NOMCAT';

	
	const NUMFAC = 'tabla40.NUMFAC';

	
	const NUMCONFAC = 'tabla40.NUMCONFAC';

	
	const NUMCORFAC = 'tabla40.NUMCORFAC';

	
	const FECHAFAC = 'tabla40.FECHAFAC';

	
	const FECFAC = 'tabla40.FECFAC';

	
	const TIPFIN = 'tabla40.TIPFIN';

	
	const COMRET = 'tabla40.COMRET';

	
	const FECCOMRET = 'tabla40.FECCOMRET';

	
	const COMRETISLR = 'tabla40.COMRETISLR';

	
	const FECCOMRETISLR = 'tabla40.FECCOMRETISLR';

	
	const COMRETLTF = 'tabla40.COMRETLTF';

	
	const FECCOMRETLTF = 'tabla40.FECCOMRETLTF';

	
	const ID = 'tabla40.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numord', 'Tipcau', 'Fecemi', 'Cedrif', 'Nomben', 'Monord', 'Desord', 'Mondes', 'Monret', 'Numche', 'Ctaban', 'Ctapag', 'Numcom', 'Status', 'Coduni', 'Fecenvcon', 'Fecenvfin', 'Ctapagfin', 'Obsord', 'Fecven', 'Fecanu', 'Desanu', 'Monpag', 'Aproba', 'Nombensus', 'Fecrecfin', 'Anopre', 'Fecpag', 'Numtiq', 'Peraut', 'Cedaut', 'Nomper2', 'Nomper1', 'Horcon', 'Feccon', 'Nomcat', 'Numfac', 'Numconfac', 'Numcorfac', 'Fechafac', 'Fecfac', 'Tipfin', 'Comret', 'Feccomret', 'Comretislr', 'Feccomretislr', 'Comretltf', 'Feccomretltf', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Tabla40Peer::NUMORD, Tabla40Peer::TIPCAU, Tabla40Peer::FECEMI, Tabla40Peer::CEDRIF, Tabla40Peer::NOMBEN, Tabla40Peer::MONORD, Tabla40Peer::DESORD, Tabla40Peer::MONDES, Tabla40Peer::MONRET, Tabla40Peer::NUMCHE, Tabla40Peer::CTABAN, Tabla40Peer::CTAPAG, Tabla40Peer::NUMCOM, Tabla40Peer::STATUS, Tabla40Peer::CODUNI, Tabla40Peer::FECENVCON, Tabla40Peer::FECENVFIN, Tabla40Peer::CTAPAGFIN, Tabla40Peer::OBSORD, Tabla40Peer::FECVEN, Tabla40Peer::FECANU, Tabla40Peer::DESANU, Tabla40Peer::MONPAG, Tabla40Peer::APROBA, Tabla40Peer::NOMBENSUS, Tabla40Peer::FECRECFIN, Tabla40Peer::ANOPRE, Tabla40Peer::FECPAG, Tabla40Peer::NUMTIQ, Tabla40Peer::PERAUT, Tabla40Peer::CEDAUT, Tabla40Peer::NOMPER2, Tabla40Peer::NOMPER1, Tabla40Peer::HORCON, Tabla40Peer::FECCON, Tabla40Peer::NOMCAT, Tabla40Peer::NUMFAC, Tabla40Peer::NUMCONFAC, Tabla40Peer::NUMCORFAC, Tabla40Peer::FECHAFAC, Tabla40Peer::FECFAC, Tabla40Peer::TIPFIN, Tabla40Peer::COMRET, Tabla40Peer::FECCOMRET, Tabla40Peer::COMRETISLR, Tabla40Peer::FECCOMRETISLR, Tabla40Peer::COMRETLTF, Tabla40Peer::FECCOMRETLTF, Tabla40Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numord', 'tipcau', 'fecemi', 'cedrif', 'nomben', 'monord', 'desord', 'mondes', 'monret', 'numche', 'ctaban', 'ctapag', 'numcom', 'status', 'coduni', 'fecenvcon', 'fecenvfin', 'ctapagfin', 'obsord', 'fecven', 'fecanu', 'desanu', 'monpag', 'aproba', 'nombensus', 'fecrecfin', 'anopre', 'fecpag', 'numtiq', 'peraut', 'cedaut', 'nomper2', 'nomper1', 'horcon', 'feccon', 'nomcat', 'numfac', 'numconfac', 'numcorfac', 'fechafac', 'fecfac', 'tipfin', 'comret', 'feccomret', 'comretislr', 'feccomretislr', 'comretltf', 'feccomretltf', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numord' => 0, 'Tipcau' => 1, 'Fecemi' => 2, 'Cedrif' => 3, 'Nomben' => 4, 'Monord' => 5, 'Desord' => 6, 'Mondes' => 7, 'Monret' => 8, 'Numche' => 9, 'Ctaban' => 10, 'Ctapag' => 11, 'Numcom' => 12, 'Status' => 13, 'Coduni' => 14, 'Fecenvcon' => 15, 'Fecenvfin' => 16, 'Ctapagfin' => 17, 'Obsord' => 18, 'Fecven' => 19, 'Fecanu' => 20, 'Desanu' => 21, 'Monpag' => 22, 'Aproba' => 23, 'Nombensus' => 24, 'Fecrecfin' => 25, 'Anopre' => 26, 'Fecpag' => 27, 'Numtiq' => 28, 'Peraut' => 29, 'Cedaut' => 30, 'Nomper2' => 31, 'Nomper1' => 32, 'Horcon' => 33, 'Feccon' => 34, 'Nomcat' => 35, 'Numfac' => 36, 'Numconfac' => 37, 'Numcorfac' => 38, 'Fechafac' => 39, 'Fecfac' => 40, 'Tipfin' => 41, 'Comret' => 42, 'Feccomret' => 43, 'Comretislr' => 44, 'Feccomretislr' => 45, 'Comretltf' => 46, 'Feccomretltf' => 47, 'Id' => 48, ),
		BasePeer::TYPE_COLNAME => array (Tabla40Peer::NUMORD => 0, Tabla40Peer::TIPCAU => 1, Tabla40Peer::FECEMI => 2, Tabla40Peer::CEDRIF => 3, Tabla40Peer::NOMBEN => 4, Tabla40Peer::MONORD => 5, Tabla40Peer::DESORD => 6, Tabla40Peer::MONDES => 7, Tabla40Peer::MONRET => 8, Tabla40Peer::NUMCHE => 9, Tabla40Peer::CTABAN => 10, Tabla40Peer::CTAPAG => 11, Tabla40Peer::NUMCOM => 12, Tabla40Peer::STATUS => 13, Tabla40Peer::CODUNI => 14, Tabla40Peer::FECENVCON => 15, Tabla40Peer::FECENVFIN => 16, Tabla40Peer::CTAPAGFIN => 17, Tabla40Peer::OBSORD => 18, Tabla40Peer::FECVEN => 19, Tabla40Peer::FECANU => 20, Tabla40Peer::DESANU => 21, Tabla40Peer::MONPAG => 22, Tabla40Peer::APROBA => 23, Tabla40Peer::NOMBENSUS => 24, Tabla40Peer::FECRECFIN => 25, Tabla40Peer::ANOPRE => 26, Tabla40Peer::FECPAG => 27, Tabla40Peer::NUMTIQ => 28, Tabla40Peer::PERAUT => 29, Tabla40Peer::CEDAUT => 30, Tabla40Peer::NOMPER2 => 31, Tabla40Peer::NOMPER1 => 32, Tabla40Peer::HORCON => 33, Tabla40Peer::FECCON => 34, Tabla40Peer::NOMCAT => 35, Tabla40Peer::NUMFAC => 36, Tabla40Peer::NUMCONFAC => 37, Tabla40Peer::NUMCORFAC => 38, Tabla40Peer::FECHAFAC => 39, Tabla40Peer::FECFAC => 40, Tabla40Peer::TIPFIN => 41, Tabla40Peer::COMRET => 42, Tabla40Peer::FECCOMRET => 43, Tabla40Peer::COMRETISLR => 44, Tabla40Peer::FECCOMRETISLR => 45, Tabla40Peer::COMRETLTF => 46, Tabla40Peer::FECCOMRETLTF => 47, Tabla40Peer::ID => 48, ),
		BasePeer::TYPE_FIELDNAME => array ('numord' => 0, 'tipcau' => 1, 'fecemi' => 2, 'cedrif' => 3, 'nomben' => 4, 'monord' => 5, 'desord' => 6, 'mondes' => 7, 'monret' => 8, 'numche' => 9, 'ctaban' => 10, 'ctapag' => 11, 'numcom' => 12, 'status' => 13, 'coduni' => 14, 'fecenvcon' => 15, 'fecenvfin' => 16, 'ctapagfin' => 17, 'obsord' => 18, 'fecven' => 19, 'fecanu' => 20, 'desanu' => 21, 'monpag' => 22, 'aproba' => 23, 'nombensus' => 24, 'fecrecfin' => 25, 'anopre' => 26, 'fecpag' => 27, 'numtiq' => 28, 'peraut' => 29, 'cedaut' => 30, 'nomper2' => 31, 'nomper1' => 32, 'horcon' => 33, 'feccon' => 34, 'nomcat' => 35, 'numfac' => 36, 'numconfac' => 37, 'numcorfac' => 38, 'fechafac' => 39, 'fecfac' => 40, 'tipfin' => 41, 'comret' => 42, 'feccomret' => 43, 'comretislr' => 44, 'feccomretislr' => 45, 'comretltf' => 46, 'feccomretltf' => 47, 'id' => 48, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Tabla40MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Tabla40MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Tabla40Peer::getTableMap();
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
		return str_replace(Tabla40Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Tabla40Peer::NUMORD);

		$criteria->addSelectColumn(Tabla40Peer::TIPCAU);

		$criteria->addSelectColumn(Tabla40Peer::FECEMI);

		$criteria->addSelectColumn(Tabla40Peer::CEDRIF);

		$criteria->addSelectColumn(Tabla40Peer::NOMBEN);

		$criteria->addSelectColumn(Tabla40Peer::MONORD);

		$criteria->addSelectColumn(Tabla40Peer::DESORD);

		$criteria->addSelectColumn(Tabla40Peer::MONDES);

		$criteria->addSelectColumn(Tabla40Peer::MONRET);

		$criteria->addSelectColumn(Tabla40Peer::NUMCHE);

		$criteria->addSelectColumn(Tabla40Peer::CTABAN);

		$criteria->addSelectColumn(Tabla40Peer::CTAPAG);

		$criteria->addSelectColumn(Tabla40Peer::NUMCOM);

		$criteria->addSelectColumn(Tabla40Peer::STATUS);

		$criteria->addSelectColumn(Tabla40Peer::CODUNI);

		$criteria->addSelectColumn(Tabla40Peer::FECENVCON);

		$criteria->addSelectColumn(Tabla40Peer::FECENVFIN);

		$criteria->addSelectColumn(Tabla40Peer::CTAPAGFIN);

		$criteria->addSelectColumn(Tabla40Peer::OBSORD);

		$criteria->addSelectColumn(Tabla40Peer::FECVEN);

		$criteria->addSelectColumn(Tabla40Peer::FECANU);

		$criteria->addSelectColumn(Tabla40Peer::DESANU);

		$criteria->addSelectColumn(Tabla40Peer::MONPAG);

		$criteria->addSelectColumn(Tabla40Peer::APROBA);

		$criteria->addSelectColumn(Tabla40Peer::NOMBENSUS);

		$criteria->addSelectColumn(Tabla40Peer::FECRECFIN);

		$criteria->addSelectColumn(Tabla40Peer::ANOPRE);

		$criteria->addSelectColumn(Tabla40Peer::FECPAG);

		$criteria->addSelectColumn(Tabla40Peer::NUMTIQ);

		$criteria->addSelectColumn(Tabla40Peer::PERAUT);

		$criteria->addSelectColumn(Tabla40Peer::CEDAUT);

		$criteria->addSelectColumn(Tabla40Peer::NOMPER2);

		$criteria->addSelectColumn(Tabla40Peer::NOMPER1);

		$criteria->addSelectColumn(Tabla40Peer::HORCON);

		$criteria->addSelectColumn(Tabla40Peer::FECCON);

		$criteria->addSelectColumn(Tabla40Peer::NOMCAT);

		$criteria->addSelectColumn(Tabla40Peer::NUMFAC);

		$criteria->addSelectColumn(Tabla40Peer::NUMCONFAC);

		$criteria->addSelectColumn(Tabla40Peer::NUMCORFAC);

		$criteria->addSelectColumn(Tabla40Peer::FECHAFAC);

		$criteria->addSelectColumn(Tabla40Peer::FECFAC);

		$criteria->addSelectColumn(Tabla40Peer::TIPFIN);

		$criteria->addSelectColumn(Tabla40Peer::COMRET);

		$criteria->addSelectColumn(Tabla40Peer::FECCOMRET);

		$criteria->addSelectColumn(Tabla40Peer::COMRETISLR);

		$criteria->addSelectColumn(Tabla40Peer::FECCOMRETISLR);

		$criteria->addSelectColumn(Tabla40Peer::COMRETLTF);

		$criteria->addSelectColumn(Tabla40Peer::FECCOMRETLTF);

		$criteria->addSelectColumn(Tabla40Peer::ID);

	}

	const COUNT = 'COUNT(tabla40.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT tabla40.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Tabla40Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Tabla40Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Tabla40Peer::doSelectRS($criteria, $con);
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
		$objects = Tabla40Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Tabla40Peer::populateObjects(Tabla40Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Tabla40Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Tabla40Peer::getOMClass();
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
		return Tabla40Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Tabla40Peer::ID); 

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
			$comparison = $criteria->getComparison(Tabla40Peer::ID);
			$selectCriteria->add(Tabla40Peer::ID, $criteria->remove(Tabla40Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Tabla40Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Tabla40Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Tabla40) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Tabla40Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Tabla40 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Tabla40Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Tabla40Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Tabla40Peer::DATABASE_NAME, Tabla40Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Tabla40Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Tabla40Peer::DATABASE_NAME);

		$criteria->add(Tabla40Peer::ID, $pk);


		$v = Tabla40Peer::doSelect($criteria, $con);

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
			$criteria->add(Tabla40Peer::ID, $pks, Criteria::IN);
			$objs = Tabla40Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseTabla40Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Tabla40MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Tabla40MapBuilder');
}
