<?php


abstract class BaseFaclientePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'facliente';

	
	const CLASS_DEFAULT = 'lib.model.Facliente';

	
	const NUM_COLUMNS = 52;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const CODPRO = 'facliente.CODPRO';

	
	const NOMPRO = 'facliente.NOMPRO';

	
	const RIFPRO = 'facliente.RIFPRO';

	
	const NITPRO = 'facliente.NITPRO';

	
	const DIRPRO = 'facliente.DIRPRO';

	
	const TELPRO = 'facliente.TELPRO';

	
	const FAXPRO = 'facliente.FAXPRO';

	
	const EMAIL = 'facliente.EMAIL';

	
	const LIMCRE = 'facliente.LIMCRE';

	
	const CODCTA = 'facliente.CODCTA';

	
	const REGMER = 'facliente.REGMER';

	
	const FECREG = 'facliente.FECREG';

	
	const TOMREG = 'facliente.TOMREG';

	
	const FOLREG = 'facliente.FOLREG';

	
	const CAPSUS = 'facliente.CAPSUS';

	
	const CAPPAG = 'facliente.CAPPAG';

	
	const RIFREPLEG = 'facliente.RIFREPLEG';

	
	const NOMREPLEG = 'facliente.NOMREPLEG';

	
	const DIRREPLEG = 'facliente.DIRREPLEG';

	
	const NROCEI = 'facliente.NROCEI';

	
	const CODRAM = 'facliente.CODRAM';

	
	const FECINSCIR = 'facliente.FECINSCIR';

	
	const NUMINSCIR = 'facliente.NUMINSCIR';

	
	const NACPRO = 'facliente.NACPRO';

	
	const CODORD = 'facliente.CODORD';

	
	const CODPERCON = 'facliente.CODPERCON';

	
	const CODTIPREC = 'facliente.CODTIPREC';

	
	const CODORDADI = 'facliente.CODORDADI';

	
	const CODPERCONADI = 'facliente.CODPERCONADI';

	
	const TIPO = 'facliente.TIPO';

	
	const FECVEN = 'facliente.FECVEN';

	
	const CIUDAD = 'facliente.CIUDAD';

	
	const CODORDMERCON = 'facliente.CODORDMERCON';

	
	const CODPERMERCON = 'facliente.CODPERMERCON';

	
	const CODORDCONTRA = 'facliente.CODORDCONTRA';

	
	const CODPERCONTRA = 'facliente.CODPERCONTRA';

	
	const TEMCODPRO = 'facliente.TEMCODPRO';

	
	const TEMRIFPRO = 'facliente.TEMRIFPRO';

	
	const CODCTASEC = 'facliente.CODCTASEC';

	
	const CODTIPEMP = 'facliente.CODTIPEMP';

	
	const TIPPER = 'facliente.TIPPER';

	
	const PAGWEB = 'facliente.PAGWEB';

	
	const TELREPLEG = 'facliente.TELREPLEG';

	
	const CORREPLEG = 'facliente.CORREPLEG';

	
	const RIFPERCON = 'facliente.RIFPERCON';

	
	const NOMPERCON = 'facliente.NOMPERCON';

	
	const DIRPERCON = 'facliente.DIRPERCON';

	
	const TELPERCON = 'facliente.TELPERCON';

	
	const CORPERCON = 'facliente.CORPERCON';

	
	const ESCONTRIB = 'facliente.ESCONTRIB';

	
	const FATIPCTE_ID = 'facliente.FATIPCTE_ID';

	
	const ID = 'facliente.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro', 'Nompro', 'Rifpro', 'Nitpro', 'Dirpro', 'Telpro', 'Faxpro', 'Email', 'Limcre', 'Codcta', 'Regmer', 'Fecreg', 'Tomreg', 'Folreg', 'Capsus', 'Cappag', 'Rifrepleg', 'Nomrepleg', 'Dirrepleg', 'Nrocei', 'Codram', 'Fecinscir', 'Numinscir', 'Nacpro', 'Codord', 'Codpercon', 'Codtiprec', 'Codordadi', 'Codperconadi', 'Tipo', 'Fecven', 'Ciudad', 'Codordmercon', 'Codpermercon', 'Codordcontra', 'Codpercontra', 'Temcodpro', 'Temrifpro', 'Codctasec', 'Codtipemp', 'Tipper', 'Pagweb', 'Telrepleg', 'Correpleg', 'Rifpercon', 'Nompercon', 'Dirpercon', 'Telpercon', 'Corpercon', 'Escontrib', 'FatipcteId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (FaclientePeer::CODPRO, FaclientePeer::NOMPRO, FaclientePeer::RIFPRO, FaclientePeer::NITPRO, FaclientePeer::DIRPRO, FaclientePeer::TELPRO, FaclientePeer::FAXPRO, FaclientePeer::EMAIL, FaclientePeer::LIMCRE, FaclientePeer::CODCTA, FaclientePeer::REGMER, FaclientePeer::FECREG, FaclientePeer::TOMREG, FaclientePeer::FOLREG, FaclientePeer::CAPSUS, FaclientePeer::CAPPAG, FaclientePeer::RIFREPLEG, FaclientePeer::NOMREPLEG, FaclientePeer::DIRREPLEG, FaclientePeer::NROCEI, FaclientePeer::CODRAM, FaclientePeer::FECINSCIR, FaclientePeer::NUMINSCIR, FaclientePeer::NACPRO, FaclientePeer::CODORD, FaclientePeer::CODPERCON, FaclientePeer::CODTIPREC, FaclientePeer::CODORDADI, FaclientePeer::CODPERCONADI, FaclientePeer::TIPO, FaclientePeer::FECVEN, FaclientePeer::CIUDAD, FaclientePeer::CODORDMERCON, FaclientePeer::CODPERMERCON, FaclientePeer::CODORDCONTRA, FaclientePeer::CODPERCONTRA, FaclientePeer::TEMCODPRO, FaclientePeer::TEMRIFPRO, FaclientePeer::CODCTASEC, FaclientePeer::CODTIPEMP, FaclientePeer::TIPPER, FaclientePeer::PAGWEB, FaclientePeer::TELREPLEG, FaclientePeer::CORREPLEG, FaclientePeer::RIFPERCON, FaclientePeer::NOMPERCON, FaclientePeer::DIRPERCON, FaclientePeer::TELPERCON, FaclientePeer::CORPERCON, FaclientePeer::ESCONTRIB, FaclientePeer::FATIPCTE_ID, FaclientePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro', 'nompro', 'rifpro', 'nitpro', 'dirpro', 'telpro', 'faxpro', 'email', 'limcre', 'codcta', 'regmer', 'fecreg', 'tomreg', 'folreg', 'capsus', 'cappag', 'rifrepleg', 'nomrepleg', 'dirrepleg', 'nrocei', 'codram', 'fecinscir', 'numinscir', 'nacpro', 'codord', 'codpercon', 'codtiprec', 'codordadi', 'codperconadi', 'tipo', 'fecven', 'ciudad', 'codordmercon', 'codpermercon', 'codordcontra', 'codpercontra', 'temcodpro', 'temrifpro', 'codctasec', 'codtipemp', 'tipper', 'pagweb', 'telrepleg', 'correpleg', 'rifpercon', 'nompercon', 'dirpercon', 'telpercon', 'corpercon', 'escontrib', 'fatipcte_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Codpro' => 0, 'Nompro' => 1, 'Rifpro' => 2, 'Nitpro' => 3, 'Dirpro' => 4, 'Telpro' => 5, 'Faxpro' => 6, 'Email' => 7, 'Limcre' => 8, 'Codcta' => 9, 'Regmer' => 10, 'Fecreg' => 11, 'Tomreg' => 12, 'Folreg' => 13, 'Capsus' => 14, 'Cappag' => 15, 'Rifrepleg' => 16, 'Nomrepleg' => 17, 'Dirrepleg' => 18, 'Nrocei' => 19, 'Codram' => 20, 'Fecinscir' => 21, 'Numinscir' => 22, 'Nacpro' => 23, 'Codord' => 24, 'Codpercon' => 25, 'Codtiprec' => 26, 'Codordadi' => 27, 'Codperconadi' => 28, 'Tipo' => 29, 'Fecven' => 30, 'Ciudad' => 31, 'Codordmercon' => 32, 'Codpermercon' => 33, 'Codordcontra' => 34, 'Codpercontra' => 35, 'Temcodpro' => 36, 'Temrifpro' => 37, 'Codctasec' => 38, 'Codtipemp' => 39, 'Tipper' => 40, 'Pagweb' => 41, 'Telrepleg' => 42, 'Correpleg' => 43, 'Rifpercon' => 44, 'Nompercon' => 45, 'Dirpercon' => 46, 'Telpercon' => 47, 'Corpercon' => 48, 'Escontrib' => 49, 'FatipcteId' => 50, 'Id' => 51, ),
		BasePeer::TYPE_COLNAME => array (FaclientePeer::CODPRO => 0, FaclientePeer::NOMPRO => 1, FaclientePeer::RIFPRO => 2, FaclientePeer::NITPRO => 3, FaclientePeer::DIRPRO => 4, FaclientePeer::TELPRO => 5, FaclientePeer::FAXPRO => 6, FaclientePeer::EMAIL => 7, FaclientePeer::LIMCRE => 8, FaclientePeer::CODCTA => 9, FaclientePeer::REGMER => 10, FaclientePeer::FECREG => 11, FaclientePeer::TOMREG => 12, FaclientePeer::FOLREG => 13, FaclientePeer::CAPSUS => 14, FaclientePeer::CAPPAG => 15, FaclientePeer::RIFREPLEG => 16, FaclientePeer::NOMREPLEG => 17, FaclientePeer::DIRREPLEG => 18, FaclientePeer::NROCEI => 19, FaclientePeer::CODRAM => 20, FaclientePeer::FECINSCIR => 21, FaclientePeer::NUMINSCIR => 22, FaclientePeer::NACPRO => 23, FaclientePeer::CODORD => 24, FaclientePeer::CODPERCON => 25, FaclientePeer::CODTIPREC => 26, FaclientePeer::CODORDADI => 27, FaclientePeer::CODPERCONADI => 28, FaclientePeer::TIPO => 29, FaclientePeer::FECVEN => 30, FaclientePeer::CIUDAD => 31, FaclientePeer::CODORDMERCON => 32, FaclientePeer::CODPERMERCON => 33, FaclientePeer::CODORDCONTRA => 34, FaclientePeer::CODPERCONTRA => 35, FaclientePeer::TEMCODPRO => 36, FaclientePeer::TEMRIFPRO => 37, FaclientePeer::CODCTASEC => 38, FaclientePeer::CODTIPEMP => 39, FaclientePeer::TIPPER => 40, FaclientePeer::PAGWEB => 41, FaclientePeer::TELREPLEG => 42, FaclientePeer::CORREPLEG => 43, FaclientePeer::RIFPERCON => 44, FaclientePeer::NOMPERCON => 45, FaclientePeer::DIRPERCON => 46, FaclientePeer::TELPERCON => 47, FaclientePeer::CORPERCON => 48, FaclientePeer::ESCONTRIB => 49, FaclientePeer::FATIPCTE_ID => 50, FaclientePeer::ID => 51, ),
		BasePeer::TYPE_FIELDNAME => array ('codpro' => 0, 'nompro' => 1, 'rifpro' => 2, 'nitpro' => 3, 'dirpro' => 4, 'telpro' => 5, 'faxpro' => 6, 'email' => 7, 'limcre' => 8, 'codcta' => 9, 'regmer' => 10, 'fecreg' => 11, 'tomreg' => 12, 'folreg' => 13, 'capsus' => 14, 'cappag' => 15, 'rifrepleg' => 16, 'nomrepleg' => 17, 'dirrepleg' => 18, 'nrocei' => 19, 'codram' => 20, 'fecinscir' => 21, 'numinscir' => 22, 'nacpro' => 23, 'codord' => 24, 'codpercon' => 25, 'codtiprec' => 26, 'codordadi' => 27, 'codperconadi' => 28, 'tipo' => 29, 'fecven' => 30, 'ciudad' => 31, 'codordmercon' => 32, 'codpermercon' => 33, 'codordcontra' => 34, 'codpercontra' => 35, 'temcodpro' => 36, 'temrifpro' => 37, 'codctasec' => 38, 'codtipemp' => 39, 'tipper' => 40, 'pagweb' => 41, 'telrepleg' => 42, 'correpleg' => 43, 'rifpercon' => 44, 'nompercon' => 45, 'dirpercon' => 46, 'telpercon' => 47, 'corpercon' => 48, 'escontrib' => 49, 'fatipcte_id' => 50, 'id' => 51, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/FaclienteMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.FaclienteMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = FaclientePeer::getTableMap();
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
		return str_replace(FaclientePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(FaclientePeer::CODPRO);

		$criteria->addSelectColumn(FaclientePeer::NOMPRO);

		$criteria->addSelectColumn(FaclientePeer::RIFPRO);

		$criteria->addSelectColumn(FaclientePeer::NITPRO);

		$criteria->addSelectColumn(FaclientePeer::DIRPRO);

		$criteria->addSelectColumn(FaclientePeer::TELPRO);

		$criteria->addSelectColumn(FaclientePeer::FAXPRO);

		$criteria->addSelectColumn(FaclientePeer::EMAIL);

		$criteria->addSelectColumn(FaclientePeer::LIMCRE);

		$criteria->addSelectColumn(FaclientePeer::CODCTA);

		$criteria->addSelectColumn(FaclientePeer::REGMER);

		$criteria->addSelectColumn(FaclientePeer::FECREG);

		$criteria->addSelectColumn(FaclientePeer::TOMREG);

		$criteria->addSelectColumn(FaclientePeer::FOLREG);

		$criteria->addSelectColumn(FaclientePeer::CAPSUS);

		$criteria->addSelectColumn(FaclientePeer::CAPPAG);

		$criteria->addSelectColumn(FaclientePeer::RIFREPLEG);

		$criteria->addSelectColumn(FaclientePeer::NOMREPLEG);

		$criteria->addSelectColumn(FaclientePeer::DIRREPLEG);

		$criteria->addSelectColumn(FaclientePeer::NROCEI);

		$criteria->addSelectColumn(FaclientePeer::CODRAM);

		$criteria->addSelectColumn(FaclientePeer::FECINSCIR);

		$criteria->addSelectColumn(FaclientePeer::NUMINSCIR);

		$criteria->addSelectColumn(FaclientePeer::NACPRO);

		$criteria->addSelectColumn(FaclientePeer::CODORD);

		$criteria->addSelectColumn(FaclientePeer::CODPERCON);

		$criteria->addSelectColumn(FaclientePeer::CODTIPREC);

		$criteria->addSelectColumn(FaclientePeer::CODORDADI);

		$criteria->addSelectColumn(FaclientePeer::CODPERCONADI);

		$criteria->addSelectColumn(FaclientePeer::TIPO);

		$criteria->addSelectColumn(FaclientePeer::FECVEN);

		$criteria->addSelectColumn(FaclientePeer::CIUDAD);

		$criteria->addSelectColumn(FaclientePeer::CODORDMERCON);

		$criteria->addSelectColumn(FaclientePeer::CODPERMERCON);

		$criteria->addSelectColumn(FaclientePeer::CODORDCONTRA);

		$criteria->addSelectColumn(FaclientePeer::CODPERCONTRA);

		$criteria->addSelectColumn(FaclientePeer::TEMCODPRO);

		$criteria->addSelectColumn(FaclientePeer::TEMRIFPRO);

		$criteria->addSelectColumn(FaclientePeer::CODCTASEC);

		$criteria->addSelectColumn(FaclientePeer::CODTIPEMP);

		$criteria->addSelectColumn(FaclientePeer::TIPPER);

		$criteria->addSelectColumn(FaclientePeer::PAGWEB);

		$criteria->addSelectColumn(FaclientePeer::TELREPLEG);

		$criteria->addSelectColumn(FaclientePeer::CORREPLEG);

		$criteria->addSelectColumn(FaclientePeer::RIFPERCON);

		$criteria->addSelectColumn(FaclientePeer::NOMPERCON);

		$criteria->addSelectColumn(FaclientePeer::DIRPERCON);

		$criteria->addSelectColumn(FaclientePeer::TELPERCON);

		$criteria->addSelectColumn(FaclientePeer::CORPERCON);

		$criteria->addSelectColumn(FaclientePeer::ESCONTRIB);

		$criteria->addSelectColumn(FaclientePeer::FATIPCTE_ID);

		$criteria->addSelectColumn(FaclientePeer::ID);

	}

	const COUNT = 'COUNT(facliente.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT facliente.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaclientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaclientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = FaclientePeer::doSelectRS($criteria, $con);
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
		$objects = FaclientePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return FaclientePeer::populateObjects(FaclientePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			FaclientePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = FaclientePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinFatipcte(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaclientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaclientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(FaclientePeer::FATIPCTE_ID, FatipctePeer::ID);

		$rs = FaclientePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinFatipcte(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		FaclientePeer::addSelectColumns($c);
		$startcol = (FaclientePeer::NUM_COLUMNS - FaclientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		FatipctePeer::addSelectColumns($c);

		$c->addJoin(FaclientePeer::FATIPCTE_ID, FatipctePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaclientePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = FatipctePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getFatipcte(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addFacliente($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initFaclientes();
				$obj2->addFacliente($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(FaclientePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(FaclientePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

			$criteria->addJoin(FaclientePeer::FATIPCTE_ID, FatipctePeer::ID);
	
		$rs = FaclientePeer::doSelectRS($criteria, $con);
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

		FaclientePeer::addSelectColumns($c);
		$startcol2 = (FaclientePeer::NUM_COLUMNS - FaclientePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

			FatipctePeer::addSelectColumns($c);
			$startcol3 = $startcol2 + FatipctePeer::NUM_COLUMNS;
	
			$c->addJoin(FaclientePeer::FATIPCTE_ID, FatipctePeer::ID);
	
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = FaclientePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


							
				$omClass = FatipctePeer::getOMClass();
	

				$cls = Propel::import($omClass);
				$obj2 = new $cls();
				$obj2->hydrate($rs, $startcol2);

				$newObject = true;
				for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
					$temp_obj1 = $results[$j];
					$temp_obj2 = $temp_obj1->getFatipcte(); 					if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
						$newObject = false;
						$temp_obj2->addFacliente($obj1); 						break;
					}
				}

				if ($newObject) {
					$obj2->initFaclientes();
					$obj2->addFacliente($obj1);
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
		return FaclientePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(FaclientePeer::ID); 

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
			$comparison = $criteria->getComparison(FaclientePeer::ID);
			$selectCriteria->add(FaclientePeer::ID, $criteria->remove(FaclientePeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(FaclientePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(FaclientePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Facliente) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(FaclientePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Facliente $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(FaclientePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(FaclientePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(FaclientePeer::DATABASE_NAME, FaclientePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = FaclientePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(FaclientePeer::DATABASE_NAME);

		$criteria->add(FaclientePeer::ID, $pk);


		$v = FaclientePeer::doSelect($criteria, $con);

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
			$criteria->add(FaclientePeer::ID, $pks, Criteria::IN);
			$objs = FaclientePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseFaclientePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/FaclienteMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.FaclienteMapBuilder');
}
