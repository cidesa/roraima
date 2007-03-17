
var Compras = '/compras_dev.php/';
var Tesoreria= '/tesoreria_dev.php/';



var TREE_ITEMSPRE = [
	['SIGA', null,
		['Contabilidad Presupuestaria', null,					
			['Definiciones espec&iacute;ficas',null,
				['Niveles Presupuestarios','PreNivPre.php'],
				['T&iacute;tulos Presupuestarios','PreTitPre.php'],
				['Asignaci&oacute;n Inicial', 'PreAsiIni.php'],
				['Asignar Partidas', 'PreAsiPar.php'],
				['Documentos',null,
					['Precompromisos','PreDocPre.php'],
					['Compromisos','PreDocCom.php'],
					['Causados', 'PreDocCau.php'],
					['Pagos', 'PreDocPag.php'],
					['Ajustes', 'PreDocAju.php'], 
				],
            ],
			
			['Ejecuci&oacute;n Presupuestaria',null,
				['Ejecuci&oacute;n Global','PreEjeGlo.php'],
				['Precomprometer','PrePreCom.php'],
				['Comprometer', 'PreCompro.php'],
				['Causar', 'PreCausar.php'],
				['Pagar', 'PrePagar.php'],
				['Solicitud de Traslados', 'PreSolTrasla.php'],
				['Traslados', 'PreTrasla.php'],
				['Adiciones+Disminuciones', 'PreAdiDis.php'],
				['Ajustes Ejecuci&oacute;n', 'PreAjuste.php'],
            ],
			['Reportes',null,
				['Definiciones Especificas',null,
					['Cat&aacute;logo de Partidas', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCatPar.php'],
					['Documentos Precompromiso', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCatPrc.php'],
					['Documentos Compromiso', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCatCom.php'],
					['Documentos Causado', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCatCau.php'],
					['Documentos Pago', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCatPag.php'],
				],
				['Movimientos',null,
					['Precompromisos', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PrePrc.php'],
					['Compromisos', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCom.php'],
					['Causados', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreCau.php'],
					['Pagados', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PrePag.php'],
					['Traslados', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreTra.php'],
					['Ajustes', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreAju.php'],
					['Adiciones+Disminuciones', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreRAdiDis.php'],
				],
				['Ejecuci&oacute;n Presupuestaria',null,
					['Asignaci&oacute;n Inicial', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreRAsiIni.php'],
					['Asignaci&oacute;n Inicial por Partidas', 'http:++desarrollo01+vb-libre+reportes+presupuesto+prerasiinipar.php'],
					['Ejecuci&oacute;n Presupuestaria', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreDisPer.php'],
					['Ejecuci&oacute;n Presupuestaria Coordinada', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreDisPerCoo.php'],
					['Ejecuci&oacute;n Presupuestaria por Partida', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreDisPar.php'],
					['Disponibilidad Financiera', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreDisFin.php'],
					['Disponibilidad Negativa', 'http:++desarrollo01+vb-libre+reportes+presupuesto+PreDisNeg.php'],
					['Consolidado de Ejecuci&oacute;n', 'http:++desarrollo01+vb-libre+reportes+presupuesto+ConEje.php'],
				],
            ],
		],
	]
];

var TREE_ITEMSCON = [
	['SIGA', null,
		['Contabilidad Financiera', null,
			['Definiciones espec&iacute;ficas de la Instituci&oacute;n','ConFinIns.php'],
			['Tipos de Cuentas - Cuentas Contables','ConFinTipCueCon.php'],
			['Cat&aacute;logo de Cuentas', 'ConFinCue.php'],
			['Comprobantes', 'ConFinCom.php'],
			['Actualizar Comprobantes', 'ConFinActCom.php'],
		['Reportes', null,
			['Cat&aacute;logo de Cuentas', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConCatCue.php'],
			['Diario de Comprobantes', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConDiaCom.php'],
			['Resumen de Comprobantes', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConResCom.php'],
			['Resumen Diario', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConResDia.php'],
			['Balance de Comprobaci&oacute;n', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConBalCom.php'],
			['Balance General', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConBalGen.php'],
			['Estado de Resultados', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConEdoRes.php'],			
			['Mayor General', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConMayGen.php'],
			['Mayor Anal&iacute;tico', 'http:++desarrollo01+vb-libre+reportes+contabilidad+ConMayAna'],
			['Comprobante Individual', 'http:++desarrollo01+vb-libre+reportes+contabilidad+Comprobante'],
			['Flujo de Caja', 'http:++desarrollo01+vb-libre+reportes+contabilidad+conrflucaj.php'],
		],
      ],
	]
];



 var TREE_ITEMSCOM_ALM = [
	['SIGA', null,
		['Compras y Almacen', null,
			['Proveedores', null,
				['Definici&oacute;n de Grupos de Recaudos', Compras+'almtiprecpro'],
				['Definici&oacute;n de Recaudos', Compras+'almregrec'],
				['Registro de Proveedores', Compras+'almregpro'],
				['Definici&oacute;n de Condiciones de Pago', Compras+'almconpag.htm'],
				['Definici&oacute;n de Formas de Entrega', Compras+'almforent.htm'],
				['Registro de Proveedores', Compras+'almregpro'],
				['Definici&oacute;n de Condiciones de Pago', Compras+'almconpag'],
				['Definici&oacute;n de Formas de Entrega', Compras+'almforent'],
				['Definici&oacute;n de Razones de Compra', Compras+'almrazcom'],
				['Definici&oacute;n de Rangos de Cotizaciones', Compras+'almdefcot'],
				['Definici&oacute;n de Motivos de Faltantes', Compras+'almmotfal'],
				['Definici&oacute;n de Tipo de Entrada', Compras+'almtipent'],
				['Definici&oacute;n de Tipo de Salida', Compras+'almtipsal'],				
			],
			['Art&iacute;culos', null,
				['Definici&oacute;n de Art&iacute;culos', Compras+'almdefart'],
				['Definici&oacute;n de Ubicaciones', Compras+'almdefubi'],
				['Ramos de Art&iacute;culos', Compras+'almramart'],
				['Registro de Art&iacute;culos y+o Servicios', Compras+'almregart'],
				['Registro de Recargos', Compras+'almregrgo'],
				['Asociaci&oacute;n de Retenciones a Servicios', Compras+'almretser'],
				['Registro de Productos Terminados', Compras+'faexiart'],
				['Proyectos', Compras+'almtippro'],
			],
			['Compras', null,
				['Ordenes de Compra y+o Servicio', Compras+'almordCom'],
				['Registro de Contratos', Compras+'almcontrato'],
				['Ajuste a Ordenes de Compra', Compras+'almajuoc'],
				['Cotizaciones', Compras+'almcotiza'],
				['Asignaci&oacute;n de Prioridad a Cotizaciones', Compras+'almpriori'],
			],
			['Almacen',null,
				['Definiciones Generales', Compras+'almdefalm'],
				['Requisiciones', Compras+'AlmReq'],
				['Recepci&oacute;n de Productos Terminados', Compras+'almordrecter'],
				['Requisiciones de Servicios', Compras+'almreqser'],
				['Requisiciones por Departamento (Solicitud de Egresos)', Compras+'almsolegr'],
				['Despachos', Compras+'almdesp'],
				['Prestacion de Servicios', Compras+'almdespser'],								
				['Inventario F&iacute;sico', Compras+'alminvfis'],
				['Traspaso de Art&iacute;culos', Compras+'almtraalm'],
				['Recepcion de Ordenes de Compras', Compras+'almordrec'],
				['Salida de Almacen', Compras+'almsalalm'],
			],                                                                                               
			['Mantenimiento', null,
				['Clasificador de Partidas Presupuestarias', Compras+'nommanclapre'],
				['Traspaso de Inventario Fisico a L�gico', Compras+'almtrainv'],					
				['Importar Productos', Compras+'importarproductos'],					
				['Actualizar Precios y Existencias', Compras+'actualizarproductos'],					
			],
		],
	],
];

var TREE_ITEMS_TER = [
	['SIGA', null,
		['Tesorer&iacute;a', null,
			['Definiciones Espec&iacute;ficas', null,
				['Empresa', Tesoreria+'pagdefemp'],
				['Tipos de Cuentas Bancarias', Tesoreria+'tesdeftipcue'],
				['Tipos de Movimientos Bancarios', Tesoreria+'tesdeftipmov'],
				['Tipos de Rendimiento', Tesoreria+'tesdeftipren'],
				['Tipos de Monedas', Tesoreria+'tesdeftipmon'],
				['Tipos de Retenciones', Tesoreria+'pagtipret'],
				['Bancos', Tesoreria+'tesdefcueban'],
				['Tipos de Beneficiario', Tesoreria+'pagtipben'],
				['Beneficiarios', Tesoreria+'pagbenfic'],
				['Asociacion Conceptos+Tipos de Retenciones', Tesoreria+'pagretcon'],
				['Definici&iacute;n de Ubicaci&iacute;n', Tesoreria+'tesdesubi'],
			],

			['Ordenamiento de Pago', null,
				['Ordenes de Pago', Tesoreria+'pagemiord'],
				['Fondos a Terceros', Tesoreria+'pagemiret'],
				['Enterar Retenci�n de ISLR', Tesoreria+'tesretislr'],
			],
			['Bancos', null,
				['Emision de Cheques', Tesoreria+'tesmovemiche'],
				['Movimientos seg�n Libros', Tesoreria+'tesmovseglib'],
				['Movimientos seg�n Libros A�os Anteriores', Tesoreria+'tesmovseglib'],
				['Movimientos seg�n Bancos', Tesoreria+'tesmovsegbanant'],
				['Movimientos seg�n Bancos A�os Anteriores', Tesoreria+'tesmovsegbanant'],
				['Transferencias Bancarias', Tesoreria+'tesmovtraban'],
				['Conciliaci&oacute;n', Tesoreria+'tesmovconban'],
				['Cierre de Per&iacute;odo', Tesoreria+'tesmovcieban'],
			],
			['Caja', null,
				['Cheques en Custodia', Tesoreria+'teschecus'],
			],
			['Mantenimiento', null,
				['Eliminar Movimiento seg&uacute;n Libros Anulados', 'mantenimiento+man_01.htm'],
				['Definir Formato de Archivo de Bancos', Tesoreria+'pagmodret'],
			],
		],
	]
];

var TREE_ITEMSNOM = [
	['SIGA', null,		
		['Nomina', null,
			['Reportes', null,
				['Definiciones Espec&iacute;ficas',null,
					['Tipos N&oacute;minas', '#'],
					['Conceptos', '#'],
					['Conceptos por N&oacute;mina', '#'],
					['Niveles Organizacionales', '#'],
					['Cargos', '#'],
					['Bancos', '#'],
					['Categorias Presupuestarias', '#'],
					['Municipios', '#'],
				],
				['Personal',null,
					['Datos Personales', '#'],
					['Asignaci&oacute;n de Cargos', '#'],
				],
				['N&oacute;mina',null,
					['Listado de N&oacute;mina Definitiva por Categor&iacute;a', '#'],
					['Listado de N&oacute;mina Definitiva por Categor&iacute;a y Tipo de Gasto', '#'],
					['Listado de N&oacute;mina Definitiva por Nivel', '#'],
					['Listado de N&oacute;mina para la Firma por Categor&iacute;a', '#'],
					['Listado de N&oacute;mina para la Firma por Categor&iacute;a y Tipo de Gasto', '#'],
					['Listado de N&oacute;mina para la Firma por Nivel', '#'],
					['Recibos de Pago', '#'],
					['Relaci&oacute;n de Conceptos', '#'],
					['Relaci&oacute;n de N&oacute;mina+Presupuesto', '#'],
					['Relaci&oacute;n de N&oacute;mina+Presupuesto por Tipo de Gasto', '#'],
					['Disponibilidad Presupuestaria por N&oacute;mina', '#'],
					['Recibo Tipo A', '#'],
					['Relaci&oacute;n Dep&oacute;sito Banco', '#'],
					['Relaci&oacute;n Cuentas Bancarias N&oacute;mina', '#'],
					['Variaciones de N&oacute;minas por Per&iacute;odos', '#'],
					['Relaci&oacute;n Categor&iacute;as+Conceptos', '#'],
					['Desglose de N&oacute;mina', '#'],
					['Hist&oacute;rico de Conceptos', '#'],
					['Hist&oacute;rico de N&oacute;mina+Presupuesto', '#'],
					['C&aacute;lculo de Conceptos', '#'],
					['Listado Por Conceptos', '#'],
					['Listado Por Conceptos Historicos', '#'],
				],
				['Prestaciones', null,
					['Antiguedad Prestaciones Sociales Nuevo R&eacute;gimen', '#'],
					['Antiguedad Prestaciones Sociales Antiguo R&eacute;gimen', '#'],
					['Anticipos sobre Prestaciones Sociales', '#'],
					['Compensaci&oacute;n Bono Transferencia', '#'],
					['Intereses sobre Prestaciones Sociales Nuevo R&eacute;gimen', '#'],
					['Intereses sobre Prestaciones Sociales Viejo R&eacute;gimen', '#'],
					['Liquidaci&oacute;n de Cuentas', '#'],
				],
				['Vacaciones', null,
					['Solicitud de Vacaciones', '#'],
					['Hist&oacute;rico de Vacaciones Disfrutadas por Empleado', '#'],
					['Relaci&oacute;n de Vacaciones Disfrutadas por Empleado en Lote', '#'],
					['Relaci&oacute;n de Vacaciones Procesadas', '#'],
				],
			],
		],
	]
];


var TREE_ITEMS_MAIN = [
	['SIGA', null,
		['Compras Y Almacen', 'principal/menu/m/compras'],
		['Tesorer&iacute;a', 'principal/menu/m/tesoreria'],
      ]
	];

