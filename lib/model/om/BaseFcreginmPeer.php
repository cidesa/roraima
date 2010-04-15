<?php


abstract class BaseFcreginmPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcreginm';

	
	const CLASS_DEFAULT = 'lib.model.Fcreginm';

	
	const NUM_COLUMNS = 44;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NROINM = 'fcreginm.NROINM';

	
	const CODCATFIS = 'fcreginm.CODCATFIS';

	
	const CODUSO = 'fcreginm.CODUSO';

	
	const CODCARINM = 'fcreginm.CODCARINM';

	
	const CODSITINM = 'fcreginm.CODSITINM';

	
	const RIFCON = 'fcreginm.RIFCON';

	
	const FECPAG = 'fcreginm.FECPAG';

	
	const FECCAL = 'fcreginm.FECCAL';

	
	const FECREG = 'fcreginm.FECREG';

	
	const DIRINM = 'fcreginm.DIRINM';

	
	const LINNOR = 'fcreginm.LINNOR';

	
	const LINSUR = 'fcreginm.LINSUR';

	
	const LINEST = 'fcreginm.LINEST';

	
	const LINOES = 'fcreginm.LINOES';

	
	const MTRTER = 'fcreginm.MTRTER';

	
	const MTRCON = 'fcreginm.MTRCON';

	
	const BSTER = 'fcreginm.BSTER';

	
	const BSCON = 'fcreginm.BSCON';

	
	const RIFREP = 'fcreginm.RIFREP';

	
	const FUNREC = 'fcreginm.FUNREC';

	
	const FECREC = 'fcreginm.FECREC';

	
	const ESTINM = 'fcreginm.ESTINM';

	
	const ESTDEC = 'fcreginm.ESTDEC';

	
	const CODCATINM = 'fcreginm.CODCATINM';

	
	const NOMCON = 'fcreginm.NOMCON';

	
	const DIRCON = 'fcreginm.DIRCON';

	
	const VALINM = 'fcreginm.VALINM';

	
	const FOLIO = 'fcreginm.FOLIO';

	
	const TOMO = 'fcreginm.TOMO';

	
	const NUMDOC = 'fcreginm.NUMDOC';

	
	const FECDOC = 'fcreginm.FECDOC';

	
	const USOINM = 'fcreginm.USOINM';

	
	const AVEINM = 'fcreginm.AVEINM';

	
	const NROCIV = 'fcreginm.NROCIV';

	
	const URBINM = 'fcreginm.URBINM';

	
	const TIPOPE = 'fcreginm.TIPOPE';

	
	const PRODOC = 'fcreginm.PRODOC';

	
	const TRIDOC = 'fcreginm.TRIDOC';

	
	const AREDOC = 'fcreginm.AREDOC';

	
	const LINNORDOC = 'fcreginm.LINNORDOC';

	
	const LINSURDOC = 'fcreginm.LINSURDOC';

	
	const LINESTDOC = 'fcreginm.LINESTDOC';

	
	const LINOESDOC = 'fcreginm.LINOESDOC';

	
	const ID = 'fcreginm.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm', 'Codcatfis', 'Coduso', 'Codcarinm', 'Codsitinm', 'Rifcon', 'Fecpag', 'Feccal', 'Fecreg', 'Dirinm', 'Linnor', 'Linsur', 'Linest', 'Linoes', 'Mtrter', 'Mtrcon', 'Bster', 'Bscon', 'Rifrep', 'Funrec', 'Fecrec', 'Estinm', 'Estdec', 'Codcatinm', 'Nomcon', 'Dircon', 'Valinm', 'Folio', 'Tomo', 'Numdoc', 'Fecdoc', 'Usoinm', 'Aveinm', 'Nrociv', 'Urbinm', 'Tipope', 'Prodoc', 'Tridoc', 'Aredoc', 'Linnordoc', 'Linsurdoc', 'Linestdoc', 'Linoesdoc', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FcreginmPeer::NROINM, FcreginmPeer::CODCATFIS, FcreginmPeer::CODUSO, FcreginmPeer::CODCARINM, FcreginmPeer::CODSITINM, FcreginmPeer::RIFCON, FcreginmPeer::FECPAG, FcreginmPeer::FECCAL, FcreginmPeer::FECREG, FcreginmPeer::DIRINM, FcreginmPeer::LINNOR, FcreginmPeer::LINSUR, FcreginmPeer::LINEST, FcreginmPeer::LINOES, FcreginmPeer::MTRTER, FcreginmPeer::MTRCON, FcreginmPeer::BSTER, FcreginmPeer::BSCON, FcreginmPeer::RIFREP, FcreginmPeer::FUNREC, FcreginmPeer::FECREC, FcreginmPeer::ESTINM, FcreginmPeer::ESTDEC, FcreginmPeer::CODCATINM, FcreginmPeer::NOMCON, FcreginmPeer::DIRCON, FcreginmPeer::VALINM, FcreginmPeer::FOLIO, FcreginmPeer::TOMO, FcreginmPeer::NUMDOC, FcreginmPeer::FECDOC, FcreginmPeer::USOINM, FcreginmPeer::AVEINM, FcreginmPeer::NROCIV, FcreginmPeer::URBINM, FcreginmPeer::TIPOPE, FcreginmPeer::PRODOC, FcreginmPeer::TRIDOC, FcreginmPeer::AREDOC, FcreginmPeer::LINNORDOC, FcreginmPeer::LINSURDOC, FcreginmPeer::LINESTDOC, FcreginmPeer::LINOESDOC, FcreginmPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm', 'codcatfis', 'coduso', 'codcarinm', 'codsitinm', 'rifcon', 'fecpag', 'feccal', 'fecreg', 'dirinm', 'linnor', 'linsur', 'linest', 'linoes', 'mtrter', 'mtrcon', 'bster', 'bscon', 'rifrep', 'funrec', 'fecrec', 'estinm', 'estdec', 'codcatinm', 'nomcon', 'dircon', 'valinm', 'folio', 'tomo', 'numdoc', 'fecdoc', 'usoinm', 'aveinm', 'nrociv', 'urbinm', 'tipope', 'prodoc', 'tridoc', 'aredoc', 'linnordoc', 'linsurdoc', 'linestdoc', 'linoesdoc', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Nroinm' => 0, 'Codcatfis' => 1, 'Coduso' => 2, 'Codcarinm' => 3, 'Codsitinm' => 4, 'Rifcon' => 5, 'Fecpag' => 6, 'Feccal' => 7, 'Fecreg' => 8, 'Dirinm' => 9, 'Linnor' => 10, 'Linsur' => 11, 'Linest' => 12, 'Linoes' => 13, 'Mtrter' => 14, 'Mtrcon' => 15, 'Bster' => 16, 'Bscon' => 17, 'Rifrep' => 18, 'Funrec' => 19, 'Fecrec' => 20, 'Estinm' => 21, 'Estdec' => 22, 'Codcatinm' => 23, 'Nomcon' => 24, 'Dircon' => 25, 'Valinm' => 26, 'Folio' => 27, 'Tomo' => 28, 'Numdoc' => 29, 'Fecdoc' => 30, 'Usoinm' => 31, 'Aveinm' => 32, 'Nrociv' => 33, 'Urbinm' => 34, 'Tipope' => 35, 'Prodoc' => 36, 'Tridoc' => 37, 'Aredoc' => 38, 'Linnordoc' => 39, 'Linsurdoc' => 40, 'Linestdoc' => 41, 'Linoesdoc' => 42, 'Id' => 43, ),
		BasePeer::TYPE_COLNAME => array (FcreginmPeer::NROINM => 0, FcreginmPeer::CODCATFIS => 1, FcreginmPeer::CODUSO => 2, FcreginmPeer::CODCARINM => 3, FcreginmPeer::CODSITINM => 4, FcreginmPeer::RIFCON => 5, FcreginmPeer::FECPAG => 6, FcreginmPeer::FECCAL => 7, FcreginmPeer::FECREG => 8, FcreginmPeer::DIRINM => 9, FcreginmPeer::LINNOR => 10, FcreginmPeer::LINSUR => 11, FcreginmPeer::LINEST => 12, FcreginmPeer::LINOES => 13, FcreginmPeer::MTRTER => 14, FcreginmPeer::MTRCON => 15, FcreginmPeer::BSTER => 16, FcreginmPeer::BSCON => 17, FcreginmPeer::RIFREP => 18, FcreginmPeer::FUNREC => 19, FcreginmPeer::FECREC => 20, FcreginmPeer::ESTINM => 21, FcreginmPeer::ESTDEC => 22, FcreginmPeer::CODCATINM => 23, FcreginmPeer::NOMCON => 24, FcreginmPeer::DIRCON => 25, FcreginmPeer::VALINM => 26, FcreginmPeer::FOLIO => 27, FcreginmPeer::TOMO => 28, FcreginmPeer::NUMDOC => 29, FcreginmPeer::FECDOC => 30, FcreginmPeer::USOINM => 31, FcreginmPeer::AVEINM => 32, FcreginmPeer::NROCIV => 33, FcreginmPeer::URBINM => 34, FcreginmPeer::TIPOPE => 35, FcreginmPeer::PRODOC => 36, FcreginmPeer::TRIDOC => 37, FcreginmPeer::AREDOC => 38, FcreginmPeer::LINNORDOC => 39, FcreginmPeer::LINSURDOC => 40, FcreginmPeer::LINESTDOC => 41, FcreginmPeer::LINOESDOC => 42, FcreginmPeer::ID => 43, ),
		BasePeer::TYPE_FIELDNAME => array ('nroinm' => 0, 'codcatfis' => 1, 'coduso' => 2, 'codcarinm' => 3, 'codsitinm' => 4, 'rifcon' => 5, 'fecpag' => 6, 'feccal' => 7, 'fecreg' => 8, 'dirinm' => 9, 'linnor' => 10, 'linsur' => 11, 'linest' => 12, 'linoes' => 13, 'mtrter' => 14, 'mtrcon' => 15, 'bster' => 16, 'bscon' => 17, 'rifrep' => 18, 'funrec' => 19, 'fecrec' => 20, 'estinm' => 21, 'estdec' => 22, 'codcatinm' => 23, 'nomcon' => 24, 'dircon' => 25, 'valinm' => 26, 'folio' => 27, 'tomo' => 28, 'numdoc' => 29, 'fecdoc' => 30, 'usoinm' => 31, 'aveinm' => 32, 'nrociv' => 33, 'urbinm' => 34, 'tipope' => 35, 'prodoc' => 36, 'tridoc' => 37, 'aredoc' => 38, 'linnordoc' => 39, 'linsurdoc' => 40, 'linestdoc' => 41, 'linoesdoc' => 42, 'id' => 43, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FcreginmMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FcreginmMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FcreginmPeer::getTableMap();
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
		return str_replace(FcreginmPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FcreginmPeer::NROINM);

		$criteria->addSelectColumn(FcreginmPeer::CODCATFIS);

		$criteria->addSelectColumn(FcreginmPeer::CODUSO);

		$criteria->addSelectColumn(FcreginmPeer::CODCARINM);

		$criteria->addSelectColumn(FcreginmPeer::CODSITINM);

		$criteria->addSelectColumn(FcreginmPeer::RIFCON);

		$criteria->addSelectColumn(FcreginmPeer::FECPAG);

		$criteria->addSelectColumn(FcreginmPeer::FECCAL);

		$criteria->addSelectColumn(FcreginmPeer::FECREG);

		$criteria->addSelectColumn(FcreginmPeer::DIRINM);

		$criteria->addSelectColumn(FcreginmPeer::LINNOR);

		$criteria->addSelectColumn(FcreginmPeer::LINSUR);

		$criteria->addSelectColumn(FcreginmPeer::LINEST);

		$criteria->addSelectColumn(FcreginmPeer::LINOES);

		$criteria->addSelectColumn(FcreginmPeer::MTRTER);

		$criteria->addSelectColumn(FcreginmPeer::MTRCON);

		$criteria->addSelectColumn(FcreginmPeer::BSTER);

		$criteria->addSelectColumn(FcreginmPeer::BSCON);

		$criteria->addSelectColumn(FcreginmPeer::RIFREP);

		$criteria->addSelectColumn(FcreginmPeer::FUNREC);

		$criteria->addSelectColumn(FcreginmPeer::FECREC);

		$criteria->addSelectColumn(FcreginmPeer::ESTINM);

		$criteria->addSelectColumn(FcreginmPeer::ESTDEC);

		$criteria->addSelectColumn(FcreginmPeer::CODCATINM);

		$criteria->addSelectColumn(FcreginmPeer::NOMCON);

		$criteria->addSelectColumn(FcreginmPeer::DIRCON);

		$criteria->addSelectColumn(FcreginmPeer::VALINM);

		$criteria->addSelectColumn(FcreginmPeer::FOLIO);

		$criteria->addSelectColumn(FcreginmPeer::TOMO);

		$criteria->addSelectColumn(FcreginmPeer::NUMDOC);

		$criteria->addSelectColumn(FcreginmPeer::FECDOC);

		$criteria->addSelectColumn(FcreginmPeer::USOINM);

		$criteria->addSelectColumn(FcreginmPeer::AVEINM);

		$criteria->addSelectColumn(FcreginmPeer::NROCIV);

		$criteria->addSelectColumn(FcreginmPeer::URBINM);

		$criteria->addSelectColumn(FcreginmPeer::TIPOPE);

		$criteria->addSelectColumn(FcreginmPeer::PRODOC);

		$criteria->addSelectColumn(FcreginmPeer::TRIDOC);

		$criteria->addSelectColumn(FcreginmPeer::AREDOC);

		$criteria->addSelectColumn(FcreginmPeer::LINNORDOC);

		$criteria->addSelectColumn(FcreginmPeer::LINSURDOC);

		$criteria->addSelectColumn(FcreginmPeer::LINESTDOC);

		$criteria->addSelectColumn(FcreginmPeer::LINOESDOC);

		$criteria->addSelectColumn(FcreginmPeer::ID);

	}

	const COUNT = 'COUNT(fcreginm.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcreginm.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FcreginmPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FcreginmPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FcreginmPeer::doSelectRS($criteria, $con);
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
		$objects = FcreginmPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FcreginmPeer::populateObjects(FcreginmPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FcreginmPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FcreginmPeer::getOMClass();
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
		return FcreginmPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FcreginmPeer::ID); 

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
			$comparison = $criteria->getComparison(FcreginmPeer::ID);
			$selectCriteria->add(FcreginmPeer::ID, $criteria->remove(FcreginmPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FcreginmPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FcreginmPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcreginm) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FcreginmPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcreginm $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FcreginmPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FcreginmPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FcreginmPeer::DATABASE_NAME, FcreginmPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FcreginmPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FcreginmPeer::DATABASE_NAME);

		$criteria->add(FcreginmPeer::ID, $pk);


		$v = FcreginmPeer::doSelect($criteria, $con);

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
			$criteria->add(FcreginmPeer::ID, $pks, Criteria::IN);
			$objs = FcreginmPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcreginmPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FcreginmMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FcreginmMapBuilder');
}
