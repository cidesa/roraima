/*
 * Ext JS Library 1.1
 * Copyright(c) 2006-2007, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://www.extjs.com/license
 */

//Ext.onReady(function() {

        var configGrid = Class.create();
        configGrid.prototype = {
          initialize: function(f, c) {
            this.fields = f;
            this.columns = c;
          }
        } 
                
        // create the grid
//        var grid = new Ext.grid.TableGrid("the-table",configGrid);
//        grid.render();
//});

/**
 * @class Ext.grid.TableGrid
 * @extends Ext.grid.Grid
 * A Grid which creates itself from an existing HTML table element.
 * @constructor
 * @param {String/HTMLElement/Ext.Element} table The table element from which this grid will be created - 
 * The table MUST have some type of size defined for the grid to fill. The container will be 
 * automatically set to position relative if it isn't already.
 * @param {Object} config A config object that sets properties on this grid and has two additional (optional)
 * properties: fields and columns which allow for customizing data fields and columns for this grid.
 * @history
 * 2007-03-01 Original version by Nige "Animal" White
 * 2007-03-10 jvs Slightly refactored to reuse existing classes
 */
Ext.grid.TableGrid = function(table,columns) {
	var config;
    config = config || {};
    var cf = config.fields || [], ch = config.columns || [];
    table = Ext.get(table);

    var ct = table.insertSibling();

    var fields = [], cols = [];
    var headers = table.query("thead th");
	for (var i = 0, h; h = headers[i]; i++) {
		var text = h.innerHTML;
		var name = 'tcol-'+i;

        fields.push(Ext.applyIf(cf[i] || {}, {
            name: name,
            mapping: 'td:nth('+(i+1)+')/@innerHTML'
        }));

		cols.push(Ext.applyIf(ch[i] || {}, {
			'header': text,
			'dataIndex': name,
			'width': 100,
			'tooltip': h.title,
            'sortable': true
        }));
	}

    var ds  = new Ext.data.Store({
        reader: new Ext.data.XmlReader({
            record:'tbody tr'
        }, fields)
    });

	ds.loadData(table.dom);

    var cm = new Ext.grid.ColumnModel([],[{header: 'Cod. Artículo',dataIndex: 'tcol-0',width: 400,editor: new Ext.grid.GridEditor(new Ext.form.TextField({
allowBlank: false
 }))},{width: 50,editor: new Ext.grid.GridEditor(new Ext.Button({
 cls: 'x-btn-text-icon',
 iconCls: 'http://siga/herramientas_dev.php/generales/catalogo/clase/caregart/frame/sf_admin_edit_form/obj1/ax_0_1/campo1/Codart/obj2/ax_0_2/campo2/desart',
 text: '...',
 scope: clickCatalogo,
 handler: clickCatalogo
 }))},{header: 'Descripción',dataIndex: 'tcol-1',width: 400,editor: new Ext.grid.GridEditor(new Ext.form.TextField({
 allowBlank: false
 }))},{header: 'Categoría',dataIndex: 'tcol-2',width: 400,editor: new Ext.grid.GridEditor(new Ext.form.TextField({
 allowBlank: false
 }))},{header: 'Cant. Ajustada',dataIndex: 'tcol-3',width: 70,align: 'right',renderer: 'usMoney',editor: new Ext.grid.GridEditor(new Ext.form.NumberField({
 allowBlank: false,
 decimalSeparator : ',',
 value : '0,00'
 }))},{header: 'Cant. Ordenada',dataIndex: 'tcol-4',width: 70,align: 'right',renderer: 'usMoney',editor: new Ext.grid.GridEditor(new Ext.form.NumberField({
 allowBlank: false,
 decimalSeparator : ',',
 value : '0,00'
 }))},{header: 'Unidad de Medida',dataIndex: 'tcol-5',width: 400,editor: new Ext.grid.GridEditor(new Ext.form.TextField({
 allowBlank: false
 }))},{header: 'Costo',dataIndex: 'tcol-6',width: 70,align: 'right',renderer: 'usMoney',editor: new Ext.grid.GridEditor(new Ext.form.NumberField({
 allowBlank: false,
 decimalSeparator : ',',
 value : '0,00'
 }))},{header: 'Monto Ajuste',dataIndex: 'tcol-7',width: 70,align: 'right',renderer: 'usMoney',editor: new Ext.grid.GridEditor(new Ext.form.NumberField({
 allowBlank: false,
 decimalSeparator : ',',
 value : '0,00'
 }))},{header: 'Monto Recargo',dataIndex: 'tcol-8',width: 70,align: 'right',renderer: 'usMoney',editor: new Ext.grid.GridEditor(new Ext.form.NumberField({
 allowBlank: false,
 decimalSeparator : ',',
 value : '0,00'
 }))},{header: 'Monto Total',dataIndex: 'tcol-9',width: 70,align: 'right',renderer: 'usMoney',editor: new Ext.grid.GridEditor(new Ext.form.NumberField({
 allowBlank: false,
 decimalSeparator : ',',
 value : '0,00'
 }))}]);;

    if(config.width || config.height){
        ct.setSize(config.width || 'auto', config.height || 'auto');
    }
    if(config.remove !== false){
        table.remove();
    }

    Ext.grid.TableGrid.superclass.constructor.call(this, ct,
        Ext.applyIf(config, {
            'ds': ds,
            'cm': cm,
//            'sm': new Ext.grid.RowSelectionModel(),
//            autoHeight:true,
//            autoWidth:true,
            enableColLock:false
        }
    ));
};

Ext.extend(Ext.grid.TableGrid, Ext.grid.EditorGrid);


function formatBoolean(value){
	return value ? 'Sí' : 'No';  
};
    
function formatDate(value){
	return value ? value.dateFormat('d M, Y') : '';
};


var clickCatalogo = function(btn, e) {
	var w=window.open(btn.iconCls,'true','menubar=no,toolbar=no,scrollbars=yes,width=490,height=490,resizable=yes,left=500,top=80');w.focus();return;
}

