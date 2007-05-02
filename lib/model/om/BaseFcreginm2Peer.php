<?php


abstract class BaseFcreginm2Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcreginm2';

	
	const CLASS_DEFAULT = 'lib.model.Fcreginm2';

	
	const NUM_COLUMNS = 38;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROINM = 'fcreginm2.NROINM';

	
	const CODCATFIS = 'fcreginm2.CODCATFIS';

	
	const CODUSO = 'fcreginm2.CODUSO';

	
	const CODCARINM = 'fcreginm2.CODCARINM';

	
	const CODSITINM = 'fcreginm2.CODSITINM';

	
	const RIFCON = 'fcreginm2.RIFCON';

	
	const FECPAG = 'fcreginm2.FECPAG';

	
	const FECCAL = 'fcreginm2.FECCAL';

	
	const FECREG = 'fcreginm2.FECREG';

	
	const DIRINM = 'fcreginm2.DIRINM';

	
	const LINNOR = 'fcreginm2.LINNOR';

	
	const LINSUR = 'fcreginm2.LINSUR';

	
	const LINEST = 'fcreginm2.LINEST';

	
	const LINOES = 'fcreginm2.LINOES';

	
	const MTRTER = 'fcreginm2.MTRTER';

	
	const MTRCON = 'fcreginm2.MTRCON';

	
	const BSTER = 'fcreginm2.BSTER';

	
	const BSCON = 'fcreginm2.BSCON';

	
	const DOCPRO = 'fcreginm2.DOCPRO';

	
	const RIFREP = 'fcreginm2.RIFREP';

	
	const FUNREC = 'fcreginm2.FUNREC';

	
	const FECREC = 'fcreginm2.FECREC';

	
	const ESTINM = 'fcreginm2.ESTINM';

	
	const ESTDEC = 'fcreginm2.ESTDEC';

	
	const CODCATINM = 'fcreginm2.CODCATINM';

	
	const NOMCON = 'fcreginm2.NOMCON';

	
	const DIRCON = 'fcreginm2.DIRCON';

	
	const CLACON = 'fcreginm2.CLACON';

	
	const FECADQ = 'fcreginm2.FECADQ';

	
	const VALINM = 'fcreginm2.VALINM';

	
	const CODMAN = 'fcreginm2.CODMAN';

	
	const CODSEC = 'fcreginm2.CODSEC';

	
	const CODPAR = 'fcreginm2.CODPAR';

	
	const NROINMANT = 'fcreginm2.NROINMANT';

	
	const TOTTER = 'fcreginm2.TOTTER';

	
	const TOTCON = 'fcreginm2.TOTCON';

	
	const TOTAL = 'fcreginm2.TOTAL';

	
	const ID = 'fcreginm2.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm', 'Codcatfis', 'Coduso', 'Codcarinm', 'Codsitinm', 'Rifcon', 'Fecpag', 'Feccal', 'Fecreg', 'Dirinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Mtrter', 'Mtrcon', 'Bster', 'Bscon', 'Docpro', 'Rifrep', 'Funrec', 'Fecrec', 'Estinm', 'Estdec', 'Codcatinm', 'Nomcon', 'Dircon', 'Clacon', 'Fecadq', 'Valinm', 'Codman', 'Codsec', 'Codpar', 'Nroinmant', 'Totter', 'Totcon', 'Total', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcreginm2Peer::NROINM, Fcreginm2Peer::CODCATFIS, Fcreginm2Peer::CODUSO, Fcreginm2Peer::CODCARINM, Fcreginm2Peer::CODSITINM, Fcreginm2Peer::RIFCON, Fcreginm2Peer::FECPAG, Fcreginm2Peer::FECCAL, Fcreginm2Peer::FECREG, Fcreginm2Peer::DIRINM, Fcreginm2Peer::LINNOR, Fcreginm2Peer::LINSUR, Fcreginm2Peer::LINEST, Fcreginm2Peer::LINOES, Fcreginm2Peer::MTRTER, Fcreginm2Peer::MTRCON, Fcreginm2Peer::BSTER, Fcreginm2Peer::BSCON, Fcreginm2Peer::DOCPRO, Fcreginm2Peer::RIFREP, Fcreginm2Peer::FUNREC, Fcreginm2Peer::FECREC, Fcreginm2Peer::ESTINM, Fcreginm2Peer::ESTDEC, Fcreginm2Peer::CODCATINM, Fcreginm2Peer::NOMCON, Fcreginm2Peer::DIRCON, Fcreginm2Peer::CLACON, Fcreginm2Peer::FECADQ, Fcreginm2Peer::VALINM, Fcreginm2Peer::CODMAN, Fcreginm2Peer::CODSEC, Fcreginm2Peer::CODPAR, Fcreginm2Peer::NROINMANT, Fcreginm2Peer::TOTTER, Fcreginm2Peer::TOTCON, Fcreginm2Peer::TOTAL, Fcreginm2Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm', 'codcatfis', 'coduso', 'codcarinm', 'codsitinm', 'rifcon', 'fecpag', 'feccal', 'fecreg', 'dirinm', 'linnor', 'linsur', 'linest', 'linoes', 'mtrter', 'mtrcon', 'bster', 'bscon', 'docpro', 'rifrep', 'funrec', 'fecrec', 'estinm', 'estdec', 'codcatinm', 'nomcon', 'dircon', 'clacon', 'fecadq', 'valinm', 'codman', 'codsec', 'codpar', 'nroinmant', 'totter', 'totcon', 'total', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm' => 0, 'Codcatfis' => 1, 'Coduso' => 2, 'Codcarinm' => 3, 'Codsitinm' => 4, 'Rifcon' => 5, 'Fecpag' => 6, 'Feccal' => 7, 'Fecreg' => 8, 'Dirinm' => 9, 'Linnor' => 10, 'Linsur' => 11, 'Linest' => 12, 'Linoes' => 13, 'Mtrter' => 14, 'Mtrcon' => 15, 'Bster' => 16, 'Bscon' => 17, 'Docpro' => 18, 'Rifrep' => 19, 'Funrec' => 20, 'Fecrec' => 21, 'Estinm' => 22, 'Estdec' => 23, 'Codcatinm' => 24, 'Nomcon' => 25, 'Dircon' => 26, 'Clacon' => 27, 'Fecadq' => 28, 'Valinm' => 29, 'Codman' => 30, 'Codsec' => 31, 'Codpar' => 32, 'Nroinmant' => 33, 'Totter' => 34, 'Totcon' => 35, 'Total' => 36, 'Id' => 37, ),
		BasePeer::TYPE_COLNAME => array (Fcreginm2Peer::NROINM => 0, Fcreginm2Peer::CODCATFIS => 1, Fcreginm2Peer::CODUSO => 2, Fcreginm2Peer::CODCARINM => 3, Fcreginm2Peer::CODSITINM => 4, Fcreginm2Peer::RIFCON => 5, Fcreginm2Peer::FECPAG => 6, Fcreginm2Peer::FECCAL => 7, Fcreginm2Peer::FECREG => 8, Fcreginm2Peer::DIRINM => 9, Fcreginm2Peer::LINNOR => 10, Fcreginm2Peer::LINSUR => 11, Fcreginm2Peer::LINEST => 12, Fcreginm2Peer::LINOES => 13, Fcreginm2Peer::MTRTER => 14, Fcreginm2Peer::MTRCON => 15, Fcreginm2Peer::BSTER => 16, Fcreginm2Peer::BSCON => 17, Fcreginm2Peer::DOCPRO => 18, Fcreginm2Peer::RIFREP => 19, Fcreginm2Peer::FUNREC => 20, Fcreginm2Peer::FECREC => 21, Fcreginm2Peer::ESTINM => 22, Fcreginm2Peer::ESTDEC => 23, Fcreginm2Peer::CODCATINM => 24, Fcreginm2Peer::NOMCON => 25, Fcreginm2Peer::DIRCON => 26, Fcreginm2Peer::CLACON => 27, Fcreginm2Peer::FECADQ => 28, Fcreginm2Peer::VALINM => 29, Fcreginm2Peer::CODMAN => 30, Fcreginm2Peer::CODSEC => 31, Fcreginm2Peer::CODPAR => 32, Fcreginm2Peer::NROINMANT => 33, Fcreginm2Peer::TOTTER => 34, Fcreginm2Peer::TOTCON => 35, Fcreginm2Peer::TOTAL => 36, Fcreginm2Peer::ID => 37, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm' => 0, 'codcatfis' => 1, 'coduso' => 2, 'codcarinm' => 3, 'codsitinm' => 4, 'rifcon' => 5, 'fecpag' => 6, 'feccal' => 7, 'fecreg' => 8, 'dirinm' => 9, 'linnor' => 10, 'linsur' => 11, 'linest' => 12, 'linoes' => 13, 'mtrter' => 14, 'mtrcon' => 15, 'bster' => 16, 'bscon' => 17, 'docpro' => 18, 'rifrep' => 19, 'funrec' => 20, 'fecrec' => 21, 'estinm' => 22, 'estdec' => 23, 'codcatinm' => 24, 'nomcon' => 25, 'dircon' => 26, 'clacon' => 27, 'fecadq' => 28, 'valinm' => 29, 'codman' => 30, 'codsec' => 31, 'codpar' => 32, 'nroinmant' => 33, 'totter' => 34, 'totcon' => 35, 'total' => 36, 'id' => 37, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcreginm2MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcreginm2MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcreginm2Peer::getTableMap();
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
		return str_replace(Fcreginm2Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcreginm2Peer::NROINM);

		$criteria->addSelectColumn(Fcreginm2Peer::CODCATFIS);

		$criteria->addSelectColumn(Fcreginm2Peer::CODUSO);

		$criteria->addSelectColumn(Fcreginm2Peer::CODCARINM);

		$criteria->addSelectColumn(Fcreginm2Peer::CODSITINM);

		$criteria->addSelectColumn(Fcreginm2Peer::RIFCON);

		$criteria->addSelectColumn(Fcreginm2Peer::FECPAG);

		$criteria->addSelectColumn(Fcreginm2Peer::FECCAL);

		$criteria->addSelectColumn(Fcreginm2Peer::FECREG);

		$criteria->addSelectColumn(Fcreginm2Peer::DIRINM);

		$criteria->addSelectColumn(Fcreginm2Peer::LINNOR);

		$criteria->addSelectColumn(Fcreginm2Peer::LINSUR);

		$criteria->addSelectColumn(Fcreginm2Peer::LINEST);

		$criteria->addSelectColumn(Fcreginm2Peer::LINOES);

		$criteria->addSelectColumn(Fcreginm2Peer::MTRTER);

		$criteria->addSelectColumn(Fcreginm2Peer::MTRCON);

		$criteria->addSelectColumn(Fcreginm2Peer::BSTER);

		$criteria->addSelectColumn(Fcreginm2Peer::BSCON);

		$criteria->addSelectColumn(Fcreginm2Peer::DOCPRO);

		$criteria->addSelectColumn(Fcreginm2Peer::RIFREP);

		$criteria->addSelectColumn(Fcreginm2Peer::FUNREC);

		$criteria->addSelectColumn(Fcreginm2Peer::FECREC);

		$criteria->addSelectColumn(Fcreginm2Peer::ESTINM);

		$criteria->addSelectColumn(Fcreginm2Peer::ESTDEC);

		$criteria->addSelectColumn(Fcreginm2Peer::CODCATINM);

		$criteria->addSelectColumn(Fcreginm2Peer::NOMCON);

		$criteria->addSelectColumn(Fcreginm2Peer::DIRCON);

		$criteria->addSelectColumn(Fcreginm2Peer::CLACON);

		$criteria->addSelectColumn(Fcreginm2Peer::FECADQ);

		$criteria->addSelectColumn(Fcreginm2Peer::VALINM);

		$criteria->addSelectColumn(Fcreginm2Peer::CODMAN);

		$criteria->addSelectColumn(Fcreginm2Peer::CODSEC);

		$criteria->addSelectColumn(Fcreginm2Peer::CODPAR);

		$criteria->addSelectColumn(Fcreginm2Peer::NROINMANT);

		$criteria->addSelectColumn(Fcreginm2Peer::TOTTER);

		$criteria->addSelectColumn(Fcreginm2Peer::TOTCON);

		$criteria->addSelectColumn(Fcreginm2Peer::TOTAL);

		$criteria->addSelectColumn(Fcreginm2Peer::ID);

	}

	const COUNT = 'COUNT(fcreginm2.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcreginm2.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcreginm2Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcreginm2Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcreginm2Peer::doSelectRS($criteria, $con);
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
		$objects = Fcreginm2Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcreginm2Peer::populateObjects(Fcreginm2Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcreginm2Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcreginm2Peer::getOMClass();
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
		return Fcreginm2Peer::CLASS_DEFAULT;
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
			$comparison = $criteria->getComparison(Fcreginm2Peer::ID);
			$selectCriteria->add(Fcreginm2Peer::ID, $criteria->remove(Fcreginm2Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcreginm2Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcreginm2Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcreginm2) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcreginm2Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcreginm2 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcreginm2Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcreginm2Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcreginm2Peer::DATABASE_NAME, Fcreginm2Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcreginm2Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcreginm2Peer::DATABASE_NAME);

		$criteria->add(Fcreginm2Peer::ID, $pk);


		$v = Fcreginm2Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcreginm2Peer::ID, $pks, Criteria::IN);
			$objs = Fcreginm2Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcreginm2Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcreginm2MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcreginm2MapBuilder');
}
