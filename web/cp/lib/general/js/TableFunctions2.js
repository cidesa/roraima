//--------------------------------------------------------------------------------------------------
// All material contained within this and associated downloaded pages is the property of 4thorder(TM) 
// Copyright © 2005.  All rights reserved.
//
// Author: Michael Falatine || Authors email: 4thorder@4thorder.us
//
// USAGE: You may use this script for commercial or personal use, however, the copyright is retained-
// by 4thorder (TM).
//
// For other free Scripts visit: http://www.4thorder.us/Scripts/
//---------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------
//-  Not necessary but left in for future context menu control options -
//----------------------------------------------------------------------
function setState(){stateMode=1} // cursor is OVER editable DIV
//function removeState(){stateMode=0} // cursor is OFF editable DIV

//--------------------------------
//-  Dimension Global variables: -
//--------------------------------
	var ElementID=""
	var ElementTagName=""
	var ElementROWID=""
	var ElementROWIndex=0
	var ElementTABLEID=""
	var NumberofColumns=0
	var NumberofRows=0
	var ElementColumnIndex=0
	var HighlightID=""

//---------------------------------------------------------------------------------
//- Set ID's for each table(id=t?) , row(id=t?r?) , cell(id=t?r?c?) ,in document: -
//---------------------------------------------------------------------------------
function idTablesRowsCells()
{
// Necessary to accommodate error due to control selection moves
REMOVEidTablesRowsCells();

// TableCollection is established within DIV container to make sure that only
// tables within the DIV are assigned ID's.
//asigClass();
var TableCollection="";
TableCollection=iView.getElementsByTagName("TABLE");

if (TableCollection!=null)
	{
	for (t=0; t<TableCollection.length; t++)
		{
		TableCollection[t].setAttribute("id","t" + t);
		for (i=0; i < eval("TableCollection.t"+t+".rows.length"); i++)
			{eval("TableCollection.t"+t+".rows(i)").setAttribute("id","t"+t+"r"+i)
			for (j=0; j < eval("TableCollection.t"+t+".rows(i).cells.length"); j++)
				{
				 eval("TableCollection.t"+t+".rows(i).cells(j)").setAttribute("id","t"+t+"r"+i+"c"+j)
				}
			}
		}
		
	}
}

//-----------------------------------------------------------------
//- Necessary to accommodate error due to control selection moves -
//-----------------------------------------------------------------
function REMOVEidTablesRowsCells()
{
var TableCollection="";
var TRCollection="";
var TDCollection="";

TableCollection=iView.getElementsByTagName("TABLE");
TRCollection=iView.getElementsByTagName("TR");
TDCollection=iView.getElementsByTagName("TD");

if (TableCollection!=null)
	{
	for (t=0; t<TableCollection.length; t++)
		{TableCollection[t].removeAttribute("id");}
	}

if (TRCollection!=null)
	{
	for (t=0; t<TRCollection.length; t++)
		{TRCollection[t].removeAttribute("id");}
	}		

if (TDCollection!=null)
	{
	for (t=0; t<TDCollection.length; t++)
		{TDCollection[t].removeAttribute("id");}
	}
}

// ------------------------------------------------			
// - Set Global variables:                        -
// - ElementID                                    -
// - ElementTagName                               -
// - ElementROWID - same as ElementID if a row    -
// - ElementROWIndex                              -
// - ElementTABLEID                               -
// - NumberofColumns                              -
// - NumberofRows                                 -
// - ElementColumnIndex                           -
//-------------------------------------------------
function setGlobalVariables()
{
// used to determine control selection
if(navigator.userAgent.indexOf("Firefox")!=-1){
var obj=window.getSelection() 
var userRange=obj.toString();
}
else{
var userRange=document.selection.type
}
// Becuase the DIV containing tables is editable "control selections" are possible.
// Control Selections allow users to select a table or image for example to resize.
// Only allow variables to be set if user selection is NOT a "control" type.
if(userRange!="Control")
	{
	if(HighlightID!="")
		{eval(HighlightID+".style.backgroundColor =''");}
	
	resetGlobalVariables();
	setState();
	//must be over Editable DIV for Event to fire
	if (stateMode==1)
		{
		// call routine to autoassign ID's to all table elements
		idTablesRowsCells();
		cellElement=findCell(window.event.srcElement);
		if(cellElement!=null)
			{
			// grab the id of that element
			 ElementID=cellElement.id;
			//grab the tag name of that element
			 ElementTagName=cellElement.tagName;
			//create string using newly established element	(used below to strip id's)		 
			 myString = new String(ElementID); 
			// strip id string for ROW ID
			 stripATcharacter=ElementID.indexOf('c');
			 ElementROWID=myString.substring(0,stripATcharacter);
			// Establish value for Interger value for Column Index (what column curosor is in)
			 ElementColumnIndex=parseInt(myString.substring(stripATcharacter+1,myString.length));
			 //alert(ElementColumnIndex);
			// strip id string for TABLE ID	 
			 stripATcharacter=ElementID.indexOf('r');
			 ElementTABLEID=myString.substring(0,stripATcharacter);	
			// Determine Number of Columns
  			 NumberofRows=eval(ElementTABLEID+".rows.length")
			 NumberofCells=eval(ElementTABLEID+".cells.length")
			 NumberofColumns=NumberofCells/NumberofRows
			// set rowIndex number
			 ElementROWIndex=eval(ElementROWID+".rowIndex")		
			}
		else{return (false);}
		}
	}
}

function resetGlobalVariables()
{	ElementID="";
	ElementTagName="";
	ElementROWID="";
	ElementROWIndex=0;
	ElementTABLEID="";
	NumberofColumns=0;
	NumberofRows=0;
	ElementColumnIndex=0;
	HighlightID="";}

function findCell(e)
{  if (e.tagName == "TD")
  	{return e;}
  else if
  	(e.tagName == "DIV")
  	{return null;}
  else
  {return findCell(e.parentElement);}}

function asigClass()
{
	var tdCollection="";
	tdCollection=iView.getElementsByTagName("TD");
	if(tdCollection!=null)
	{
		for(t=0;t<tdCollection.length;t++)
		{
			tdCollection[t].setAttribute("class",'grid_line01_br');
		}
	}

}
//---------------------------------------------------
//-  Cursor Functions                               -
//- 	Highlight User Activated Cell for reference -
//---------------------------------------------------
function resetCursor()
{	HighlightID=ElementID
	idTablesRowsCells();
	setTempHighlight();}

function setTempHighlight()
{	// used to determine control selection
	if(navigator.userAgent.indexOf("Firefox")!=-1){
		var obj=window.getSelection() 
		var userRange=obj.toString();
	}
	else{
		var userRange=document.selection.type
	}

	if(HighlightID!="" && userRange!="Control")
		{	HID=document.getElementById(HighlightID)
			HID.style.backgroundColor ='E0DFE3';}}

//-----------------------------------
//-  Table Insert/Delete Functions  -
//-----------------------------------
function tomarValor(where)
{
var userRange=document.selection.type

if(ElementTABLEID!="" &&  userRange!="Control")
	{	if(where=="b")
			{
				if (ElementROWIndex!=0)
				{
				   ElementROWIndex=ElementROWIndex-1
    			   var txt=ElementROWIndex.toString()+ElementColumnIndex.toString()
			
					 if (ElementROWIndex>=1)
					 {
					 	obj= document.getElementById(txt); 
						//var o=obj.value;
						//alert(o);
					 }  
				 }
			}
    }
}

function InsertRow()
{
// used to determine control selection
if(navigator.userAgent.indexOf("Firefox")!=-1){
	var obj=window.getSelection() 
	var userRange=obj.toString();
	}
else{
	var userRange=document.selection.type
	}

if(ElementTABLEID!="" &&  userRange!="Control")
	{
		var x=document.getElementById(ElementTABLEID).insertRow(ElementROWIndex+1);
		var p=document.getElementById(ElementTABLEID).innerHTML;
		//var nombTabla=document.getElementById(ElementROWID);
		alert(p);
				//adjust global variables
		resetCursor();
	
	for (i=0; i<NumberofColumns; i++)
		{
			var y=x.insertCell(i); 
			y.innerHTML="<input type=text class=grid_txt02  align=top id="+i+NumberofRows+">";
			asigClass();
		}
		NumberofRows=NumberofRows+1
		//nombTabla.setAttribute("class","grid_line01_tl");
	}
else{alert("Porfavor Seleccione una Celda de el Grid para Insertar una nueva Fila");}
}


function InsertColumn(where)
{	// used to determine control selection
	var userRange=document.selection.type

	if(ElementTABLEID!="" && ElementTagName=="TD" && userRange!="Control")
		{	for (i=0; i<NumberofRows; i++)
				{	var x=document.getElementById(ElementTABLEID).rows[i];
					if(where=="b")
						{var y=x.insertCell(ElementColumnIndex);}
					else
						{var y=x.insertCell(ElementColumnIndex+1);}
				y.innerHTML="&nbsp;"}
	
		NumberofColumns=NumberofColumns+1

		if(where=="b")
			{		
			//adjust global variables
			ElementColumnIndex=ElementColumnIndex+1
			ElementID=ElementTABLEID+"r"+ElementROWIndex+"c"+ElementColumnIndex
			resetCursor();
			}
		else
			{
			//adjust global variables
			resetCursor();
			}
		}		
	else{alert("Please select a [Single] table cell for inserting a TABLE COLUMN]");}
}

function deleteRow()
{
// used to determine control selection
	if(navigator.userAgent.indexOf("Firefox")!=-1){
		var obj=window.getSelection() 
		var userRange=obj.toString();
	}
	else{
		var userRange=document.selection.type
	}
if(ElementTABLEID!="" &&  userRange!="Control")
	{
	NumberofRows=eval(ElementTABLEID+".rows.length")
	if(NumberofRows==1)
		{document.getElementById(ElementTABLEID).outerHTML=""; resetGlobalVariables();}
	else
		{		
		document.getElementById(ElementTABLEID).deleteRow(ElementROWIndex)
		//adjust global variables
		NumberofRows=NumberofRows-1
		
		if(ElementROWIndex==NumberofRows)
			{
			ElementROWIndex=ElementROWIndex-1
			ElementID=ElementTABLEID+"r"+ElementROWIndex+"c"+ElementColumnIndex
			ElementROWID=ElementTABLEID+"r"+ElementROWIndex			
			}
		resetCursor();		
		}
	}
else{/*alert("Porfavor Seleccione una Celda de el Grid para Borrar una nueva Fila");*/}
}

function deleteColumn()
{
// used to determine control selection
var userRange=document.selection.type

if(ElementTABLEID!="" && userRange!="Control")
	{
	NumberofRows=eval(ElementTABLEID+".rows.length")
	if(NumberofColumns==1)
		{document.getElementById(ElementTABLEID).outerHTML=""; resetGlobalVariables();}
	else
		{		
		for (i=0; i<NumberofRows; i++)
			{
			var x=document.getElementById(ElementTABLEID).rows[i];
			var y=x.deleteCell(ElementColumnIndex);
			}
			NumberofColumns=NumberofColumns-1
			//adjust global variables
			if(ElementColumnIndex==NumberofColumns)
				{
				ElementColumnIndex=ElementColumnIndex-1
				ElementID=ElementTABLEID+"r"+ElementROWIndex+"c"+ElementColumnIndex
				}
			resetCursor();
		}
	}
else{alert("Please select a [Single] table cell to delete [TABLE COLUMN]");}
}
