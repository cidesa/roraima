<?php


abstract class BaseFcsollic1Peer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'fcsollic1';

	
	const CLASS_DEFAULT = 'lib.model.Fcsollic1';

	
	const NUM_COLUMNS = 49;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const NUMSOL = 'fcsollic1.NUMSOL';

	
	const NUMLIC = 'fcsollic1.NUMLIC';

	
	const FECSOL = 'fcsollic1.FECSOL';

	
	const FECLIC = 'fcsollic1.FECLIC';

	
	const RIFCON = 'fcsollic1.RIFCON';

	
	const CATCON = 'fcsollic1.CATCON';

	
	const RIFREP = 'fcsollic1.RIFREP';

	
	const NOMNEG = 'fcsollic1.NOMNEG';

	
	const TIPINM = 'fcsollic1.TIPINM';

	
	const TIPEST = 'fcsollic1.TIPEST';

	
	const DIRPRI = 'fcsollic1.DIRPRI';

	
	const CODRUT = 'fcsollic1.CODRUT';

	
	const CAPSOC = 'fcsollic1.CAPSOC';

	
	const HORINI = 'fcsollic1.HORINI';

	
	const HORCIE = 'fcsollic1.HORCIE';

	
	const FECINI = 'fcsollic1.FECINI';

	
	const FECFIN = 'fcsollic1.FECFIN';

	
	const DISCLI = 'fcsollic1.DISCLI';

	
	const DISBAR = 'fcsollic1.DISBAR';

	
	const DISDIS = 'fcsollic1.DISDIS';

	
	const DISINS = 'fcsollic1.DISINS';

	
	const DISFUN = 'fcsollic1.DISFUN';

	
	const DISEST = 'fcsollic1.DISEST';

	
	const FUNRES = 'fcsollic1.FUNRES';

	
	const FUNREL = 'fcsollic1.FUNREL';

	
	const FECRES = 'fcsollic1.FECRES';

	
	const FECAPR = 'fcsollic1.FECAPR';

	
	const FECVEN = 'fcsollic1.FECVEN';

	
	const TOMO = 'fcsollic1.TOMO';

	
	const FOLIO = 'fcsollic1.FOLIO';

	
	const NUMERO = 'fcsollic1.NUMERO';

	
	const TASLIC = 'fcsollic1.TASLIC';

	
	const DEUANL = 'fcsollic1.DEUANL';

	
	const DEUACL = 'fcsollic1.DEUACL';

	
	const IMPLIC = 'fcsollic1.IMPLIC';

	
	const DEUANP = 'fcsollic1.DEUANP';

	
	const DEUACP = 'fcsollic1.DEUACP';

	
	const STASOL = 'fcsollic1.STASOL';

	
	const STALIC = 'fcsollic1.STALIC';

	
	const STADEC = 'fcsollic1.STADEC';

	
	const STALIQ = 'fcsollic1.STALIQ';

	
	const NOMCON = 'fcsollic1.NOMCON';

	
	const DIRCON = 'fcsollic1.DIRCON';

	
	const TIPO = 'fcsollic1.TIPO';

	
	const ESTSER = 'fcsollic1.ESTSER';

	
	const TELNEG = 'fcsollic1.TELNEG';

	
	const CLACON = 'fcsollic1.CLACON';

	
	const CAPACT = 'fcsollic1.CAPACT';

	
	const ID = 'fcsollic1.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol', 'Numlic', 'Fecsol', 'Feclic', 'Rifcon', 'Catcon', 'Rifrep', 'Nomneg', 'Tipinm', 'Tipest', 'Dirpri', 'Codrut', 'Capsoc', 'Horini', 'Horcie', 'Fecini', 'Fecfin', 'Discli', 'Disbar', 'Disdis', 'Disins', 'Disfun', 'Disest', 'Funres', 'Funrel', 'Fecres', 'Fecapr', 'Fecven', 'Tomo', 'Folio', 'Numero', 'Taslic', 'Deuanl', 'Deuacl', 'Implic', 'Deuanp', 'Deuacp', 'Stasol', 'Stalic', 'Stadec', 'Staliq', 'Nomcon', 'Dircon', 'Tipo', 'Estser', 'Telneg', 'Clacon', 'Capact', 'Id', ),
		BasePeer::TYPE_COLNAME => array (Fcsollic1Peer::NUMSOL, Fcsollic1Peer::NUMLIC, Fcsollic1Peer::FECSOL, Fcsollic1Peer::FECLIC, Fcsollic1Peer::RIFCON, Fcsollic1Peer::CATCON, Fcsollic1Peer::RIFREP, Fcsollic1Peer::NOMNEG, Fcsollic1Peer::TIPINM, Fcsollic1Peer::TIPEST, Fcsollic1Peer::DIRPRI, Fcsollic1Peer::CODRUT, Fcsollic1Peer::CAPSOC, Fcsollic1Peer::HORINI, Fcsollic1Peer::HORCIE, Fcsollic1Peer::FECINI, Fcsollic1Peer::FECFIN, Fcsollic1Peer::DISCLI, Fcsollic1Peer::DISBAR, Fcsollic1Peer::DISDIS, Fcsollic1Peer::DISINS, Fcsollic1Peer::DISFUN, Fcsollic1Peer::DISEST, Fcsollic1Peer::FUNRES, Fcsollic1Peer::FUNREL, Fcsollic1Peer::FECRES, Fcsollic1Peer::FECAPR, Fcsollic1Peer::FECVEN, Fcsollic1Peer::TOMO, Fcsollic1Peer::FOLIO, Fcsollic1Peer::NUMERO, Fcsollic1Peer::TASLIC, Fcsollic1Peer::DEUANL, Fcsollic1Peer::DEUACL, Fcsollic1Peer::IMPLIC, Fcsollic1Peer::DEUANP, Fcsollic1Peer::DEUACP, Fcsollic1Peer::STASOL, Fcsollic1Peer::STALIC, Fcsollic1Peer::STADEC, Fcsollic1Peer::STALIQ, Fcsollic1Peer::NOMCON, Fcsollic1Peer::DIRCON, Fcsollic1Peer::TIPO, Fcsollic1Peer::ESTSER, Fcsollic1Peer::TELNEG, Fcsollic1Peer::CLACON, Fcsollic1Peer::CAPACT, Fcsollic1Peer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol', 'numlic', 'fecsol', 'feclic', 'rifcon', 'catcon', 'rifrep', 'nomneg', 'tipinm', 'tipest', 'dirpri', 'codrut', 'capsoc', 'horini', 'horcie', 'fecini', 'fecfin', 'discli', 'disbar', 'disdis', 'disins', 'disfun', 'disest', 'funres', 'funrel', 'fecres', 'fecapr', 'fecven', 'tomo', 'folio', 'numero', 'taslic', 'deuanl', 'deuacl', 'implic', 'deuanp', 'deuacp', 'stasol', 'stalic', 'stadec', 'staliq', 'nomcon', 'dircon', 'tipo', 'estser', 'telneg', 'clacon', 'capact', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Numsol' => 0, 'Numlic' => 1, 'Fecsol' => 2, 'Feclic' => 3, 'Rifcon' => 4, 'Catcon' => 5, 'Rifrep' => 6, 'Nomneg' => 7, 'Tipinm' => 8, 'Tipest' => 9, 'Dirpri' => 10, 'Codrut' => 11, 'Capsoc' => 12, 'Horini' => 13, 'Horcie' => 14, 'Fecini' => 15, 'Fecfin' => 16, 'Discli' => 17, 'Disbar' => 18, 'Disdis' => 19, 'Disins' => 20, 'Disfun' => 21, 'Disest' => 22, 'Funres' => 23, 'Funrel' => 24, 'Fecres' => 25, 'Fecapr' => 26, 'Fecven' => 27, 'Tomo' => 28, 'Folio' => 29, 'Numero' => 30, 'Taslic' => 31, 'Deuanl' => 32, 'Deuacl' => 33, 'Implic' => 34, 'Deuanp' => 35, 'Deuacp' => 36, 'Stasol' => 37, 'Stalic' => 38, 'Stadec' => 39, 'Staliq' => 40, 'Nomcon' => 41, 'Dircon' => 42, 'Tipo' => 43, 'Estser' => 44, 'Telneg' => 45, 'Clacon' => 46, 'Capact' => 47, 'Id' => 48, ),
		BasePeer::TYPE_COLNAME => array (Fcsollic1Peer::NUMSOL => 0, Fcsollic1Peer::NUMLIC => 1, Fcsollic1Peer::FECSOL => 2, Fcsollic1Peer::FECLIC => 3, Fcsollic1Peer::RIFCON => 4, Fcsollic1Peer::CATCON => 5, Fcsollic1Peer::RIFREP => 6, Fcsollic1Peer::NOMNEG => 7, Fcsollic1Peer::TIPINM => 8, Fcsollic1Peer::TIPEST => 9, Fcsollic1Peer::DIRPRI => 10, Fcsollic1Peer::CODRUT => 11, Fcsollic1Peer::CAPSOC => 12, Fcsollic1Peer::HORINI => 13, Fcsollic1Peer::HORCIE => 14, Fcsollic1Peer::FECINI => 15, Fcsollic1Peer::FECFIN => 16, Fcsollic1Peer::DISCLI => 17, Fcsollic1Peer::DISBAR => 18, Fcsollic1Peer::DISDIS => 19, Fcsollic1Peer::DISINS => 20, Fcsollic1Peer::DISFUN => 21, Fcsollic1Peer::DISEST => 22, Fcsollic1Peer::FUNRES => 23, Fcsollic1Peer::FUNREL => 24, Fcsollic1Peer::FECRES => 25, Fcsollic1Peer::FECAPR => 26, Fcsollic1Peer::FECVEN => 27, Fcsollic1Peer::TOMO => 28, Fcsollic1Peer::FOLIO => 29, Fcsollic1Peer::NUMERO => 30, Fcsollic1Peer::TASLIC => 31, Fcsollic1Peer::DEUANL => 32, Fcsollic1Peer::DEUACL => 33, Fcsollic1Peer::IMPLIC => 34, Fcsollic1Peer::DEUANP => 35, Fcsollic1Peer::DEUACP => 36, Fcsollic1Peer::STASOL => 37, Fcsollic1Peer::STALIC => 38, Fcsollic1Peer::STADEC => 39, Fcsollic1Peer::STALIQ => 40, Fcsollic1Peer::NOMCON => 41, Fcsollic1Peer::DIRCON => 42, Fcsollic1Peer::TIPO => 43, Fcsollic1Peer::ESTSER => 44, Fcsollic1Peer::TELNEG => 45, Fcsollic1Peer::CLACON => 46, Fcsollic1Peer::CAPACT => 47, Fcsollic1Peer::ID => 48, ),
		BasePeer::TYPE_FIELDNAME => array ('numsol' => 0, 'numlic' => 1, 'fecsol' => 2, 'feclic' => 3, 'rifcon' => 4, 'catcon' => 5, 'rifrep' => 6, 'nomneg' => 7, 'tipinm' => 8, 'tipest' => 9, 'dirpri' => 10, 'codrut' => 11, 'capsoc' => 12, 'horini' => 13, 'horcie' => 14, 'fecini' => 15, 'fecfin' => 16, 'discli' => 17, 'disbar' => 18, 'disdis' => 19, 'disins' => 20, 'disfun' => 21, 'disest' => 22, 'funres' => 23, 'funrel' => 24, 'fecres' => 25, 'fecapr' => 26, 'fecven' => 27, 'tomo' => 28, 'folio' => 29, 'numero' => 30, 'taslic' => 31, 'deuanl' => 32, 'deuacl' => 33, 'implic' => 34, 'deuanp' => 35, 'deuacp' => 36, 'stasol' => 37, 'stalic' => 38, 'stadec' => 39, 'staliq' => 40, 'nomcon' => 41, 'dircon' => 42, 'tipo' => 43, 'estser' => 44, 'telneg' => 45, 'clacon' => 46, 'capact' => 47, 'id' => 48, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/Fcsollic1MapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.Fcsollic1MapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = Fcsollic1Peer::getTableMap();
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
		return str_replace(Fcsollic1Peer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(Fcsollic1Peer::NUMSOL);

		$criteria->addSelectColumn(Fcsollic1Peer::NUMLIC);

		$criteria->addSelectColumn(Fcsollic1Peer::FECSOL);

		$criteria->addSelectColumn(Fcsollic1Peer::FECLIC);

		$criteria->addSelectColumn(Fcsollic1Peer::RIFCON);

		$criteria->addSelectColumn(Fcsollic1Peer::CATCON);

		$criteria->addSelectColumn(Fcsollic1Peer::RIFREP);

		$criteria->addSelectColumn(Fcsollic1Peer::NOMNEG);

		$criteria->addSelectColumn(Fcsollic1Peer::TIPINM);

		$criteria->addSelectColumn(Fcsollic1Peer::TIPEST);

		$criteria->addSelectColumn(Fcsollic1Peer::DIRPRI);

		$criteria->addSelectColumn(Fcsollic1Peer::CODRUT);

		$criteria->addSelectColumn(Fcsollic1Peer::CAPSOC);

		$criteria->addSelectColumn(Fcsollic1Peer::HORINI);

		$criteria->addSelectColumn(Fcsollic1Peer::HORCIE);

		$criteria->addSelectColumn(Fcsollic1Peer::FECINI);

		$criteria->addSelectColumn(Fcsollic1Peer::FECFIN);

		$criteria->addSelectColumn(Fcsollic1Peer::DISCLI);

		$criteria->addSelectColumn(Fcsollic1Peer::DISBAR);

		$criteria->addSelectColumn(Fcsollic1Peer::DISDIS);

		$criteria->addSelectColumn(Fcsollic1Peer::DISINS);

		$criteria->addSelectColumn(Fcsollic1Peer::DISFUN);

		$criteria->addSelectColumn(Fcsollic1Peer::DISEST);

		$criteria->addSelectColumn(Fcsollic1Peer::FUNRES);

		$criteria->addSelectColumn(Fcsollic1Peer::FUNREL);

		$criteria->addSelectColumn(Fcsollic1Peer::FECRES);

		$criteria->addSelectColumn(Fcsollic1Peer::FECAPR);

		$criteria->addSelectColumn(Fcsollic1Peer::FECVEN);

		$criteria->addSelectColumn(Fcsollic1Peer::TOMO);

		$criteria->addSelectColumn(Fcsollic1Peer::FOLIO);

		$criteria->addSelectColumn(Fcsollic1Peer::NUMERO);

		$criteria->addSelectColumn(Fcsollic1Peer::TASLIC);

		$criteria->addSelectColumn(Fcsollic1Peer::DEUANL);

		$criteria->addSelectColumn(Fcsollic1Peer::DEUACL);

		$criteria->addSelectColumn(Fcsollic1Peer::IMPLIC);

		$criteria->addSelectColumn(Fcsollic1Peer::DEUANP);

		$criteria->addSelectColumn(Fcsollic1Peer::DEUACP);

		$criteria->addSelectColumn(Fcsollic1Peer::STASOL);

		$criteria->addSelectColumn(Fcsollic1Peer::STALIC);

		$criteria->addSelectColumn(Fcsollic1Peer::STADEC);

		$criteria->addSelectColumn(Fcsollic1Peer::STALIQ);

		$criteria->addSelectColumn(Fcsollic1Peer::NOMCON);

		$criteria->addSelectColumn(Fcsollic1Peer::DIRCON);

		$criteria->addSelectColumn(Fcsollic1Peer::TIPO);

		$criteria->addSelectColumn(Fcsollic1Peer::ESTSER);

		$criteria->addSelectColumn(Fcsollic1Peer::TELNEG);

		$criteria->addSelectColumn(Fcsollic1Peer::CLACON);

		$criteria->addSelectColumn(Fcsollic1Peer::CAPACT);

		$criteria->addSelectColumn(Fcsollic1Peer::ID);

	}

	const COUNT = 'COUNT(fcsollic1.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT fcsollic1.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(Fcsollic1Peer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(Fcsollic1Peer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = Fcsollic1Peer::doSelectRS($criteria, $con);
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
		$objects = Fcsollic1Peer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return Fcsollic1Peer::populateObjects(Fcsollic1Peer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			Fcsollic1Peer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = Fcsollic1Peer::getOMClass();
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
		return Fcsollic1Peer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(Fcsollic1Peer::ID); 

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
			$comparison = $criteria->getComparison(Fcsollic1Peer::ID);
			$selectCriteria->add(Fcsollic1Peer::ID, $criteria->remove(Fcsollic1Peer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(Fcsollic1Peer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(Fcsollic1Peer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Fcsollic1) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(Fcsollic1Peer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Fcsollic1 $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Fcsollic1Peer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Fcsollic1Peer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(Fcsollic1Peer::DATABASE_NAME, Fcsollic1Peer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = Fcsollic1Peer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(Fcsollic1Peer::DATABASE_NAME);

		$criteria->add(Fcsollic1Peer::ID, $pk);


		$v = Fcsollic1Peer::doSelect($criteria, $con);

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
			$criteria->add(Fcsollic1Peer::ID, $pks, Criteria::IN);
			$objs = Fcsollic1Peer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFcsollic1Peer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/Fcsollic1MapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.Fcsollic1MapBuilder');
}
