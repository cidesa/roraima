/*_TOPICS_
@0:Initialization
@1:Add/delete
@2:Action handling
@3:Private
@4:Item control
@5:Private
06:Select specific
*/


		/**  
          *     @desc: toolbar object
		  *     @param: htmlObject - parent html object or id of parent html object
          *     @param: width - object width
          *     @param: height - object height
          *     @param: name - toolbar display name
          *     @param: vMode - if eq 1 => vertical toolbar
          *     @type: public
          *     @topic: 0
          */ 		
	function dhtmlXToolbarObject(htmlObject,width,height,name,vMode){
		this.width=width;		this.height=height;
		if (typeof(htmlObject)!="object") 
			this.parentObject=document.getElementById(htmlObject);
		else
			this.parentObject=htmlObject;
		
		this.xmlDoc=0;
		this.topNod=0;	this.dividerCell=0;		this.firstCell=0;	this.nameCell=0;	this.crossCell=0;
		this.items=new Array();		this.itemsCount=0;
		this.defaultAction=0;
		this.extraMode=convertStringToBoolean(vMode);
		this.onShow=0;		this.onHide=0;		
		this.oldMouseMove=0;
		this.tname=name;
		
		this.gecko=(document.all?0:1);
		
		this.tableCSS="toolbarTable";
		this.titleCSS="toolbarName";
		
		if (!this.extraMode)
			this._create_self();
		else
			{ 
			this._create_self_vertical();
			this.addItem=this._addItem_vertical;
			};
			
		if (this._extendedInit) this._extendedInit();
		this.xmlUnit=new dtmlXMLLoaderObject(this._parseXMLTree,this);				
		return this;
		
		};
		
		dhtmlXToolbarObject.prototype = new dhtmlXProtobarObject;

		
		
		/**  
          *     @desc: add item to toolbar
          *     @param: item - dhtmlXButton object
          *     @param: position  - item position [not supported in current version]
          *     @type: public
          *     @topic: 1  
          */ 	
		  
		dhtmlXToolbarObject.prototype.addItem=function(item,position){
			this.items[this.itemsCount]=item;
			this.firstCell.parentNode.insertBefore(item.getTopNode(),this.firstCell);
			item.parentNod=this;
			if (this.defaultAction) item.setAction(this.defaultAction);
			this.itemsCount++;
		}
		
		/**  
          *     @desc: add item to vertical toolbar
          *     @param: item - item object
          *     @param: position  - item position [not supported in current version]
          *     @type: private
          *     @topic: 1  
          */ 			
		dhtmlXToolbarObject.prototype._addItem_vertical=function(item,position){
			this.items[this.itemsCount]=item;
			var tr=document.createElement("tr");
			tr.style.verticalAlign="top";
			tr.appendChild(item.getTopNode());
			this.firstCell.parentNode.parentNode.insertBefore(tr,this.firstCell.parentNode);
			item.parentNod=this;
			if (this.defaultAction) item.setAction(this.defaultAction);
			this.itemsCount++;
		}
		

		
		/**  
          *     @desc: return item index in collection by position
          *     @type: private
		  *     @param: position - item position
		  *     @topic: 3
          */		
		dhtmlXToolbarObject.prototype._getItemIndexByPosition=function(position){
			var j=0;
			for (var i=0; i<this.itemsCount; i++)
			{
				if (this.items[i].hide!=1) j++;
				if (j==position) return i;
			};		
			return -1;		
		};


		
		/**  
          *     @desc: return item object by position
          *     @type: public
		  *     @param: position - item position
		  *     @topic: 4
          */
		dhtmlXToolbarObject.prototype.getItemByPosition=function(position){
			var z=this._getItemIndexByPosition(position);
			if (z>=0) return this.items[z];
		};		
		/**  
          *     @desc: remove item
          *     @type: public
		  *     @param: itemId - item id
	      *     @topic: 1
          */			
		dhtmlXToolbarObject.prototype.removeItemById=function(itemId){
			var z=this._getItemIndex(itemId);
			if (z>=0) {
			if (this.items[z].removeItem) this.items[z].removeItem();
			this.firstCell.parentNode.removeChild(this.items[z].getTopNode());						
			this.items[z]=0;
			this.itemsCount--;
			for (var i=z; i<this.itemsCount; i++){
				this.items[i]=this.items[i+1];
				}
			}
		}
		/**  
          *     @desc: remove item
          *     @type: public
		  *     @param: position - item position		  
	      *     @topic: 1
          */			
		dhtmlXToolbarObject.prototype.removeItemByPosition=function(position){
			var z=this._getItemIndexByPosition(position);
			if (z) {
			if (this.items[z].removeItem) this.items[z].removeItem();	
			this.firstCell.parentNode.removeChild(this.items[z].getTopNode());			
			this.items[z]=0;
			this.itemsCount--;
			for (var i=z; i<this.itemsCount; i++){
				this.items[i]=this.items[i+1];
				}				
			}
			
		}

		/**  
          *     @desc: hide toolbar button
          *     @type: public
		  *     @param: position - item position		  
	      *     @topic: 4
          */						
		dhtmlXToolbarObject.prototype.hideItemByPosition=function(position){
			var z=this.getItemByPosition(position);
			if (z) { z.getTopNode().style.display="none";  z.hide=1; }
		}

		

		
		/**  
          *     @desc: parse xml
          *     @type: private
		  *     @param: that - toolbar object
		  *     @param: node - top xml node
	      *     @topic: 0  
          */
		  
	dhtmlXToolbarObject.prototype._parseXMLTree=function(that,node){	
		if (!node) node=that.xmlUnit.getXMLTopNode("toolbar");
			 
		var toolbarAlign=node.getAttribute("toolbarAlign");		 
		if (toolbarAlign) that.setBarAlign(toolbarAlign);
		
		var absolutePosition=node.getAttribute("absolutePosition");		 
		if (absolutePosition=="yes"){
		 	that.topNod.style.position="absolute";
		 	that.topNod.style.top=node.getAttribute("left")||0;
		 	that.topNod.style.left=node.getAttribute("top")||0;
									};
 		if ((absolutePosition!="auto")&&(absolutePosition!="yes"))  that.dividerCell.style.display="none";
		var name=node.getAttribute("name"); 		if(name) that.setTitleText(name);
		var width=node.getAttribute("width");		var height=node.getAttribute("height");
		
		that.setBarSize(width,height);
		
		var globalTextCss=node.getAttribute("globalTextCss");
		var globalCss=node.getAttribute("globalCss");
		
		for(var i=0; i<node.childNodes.length; i++)
		{
			var localItem=node.childNodes[i];
	  		if (localItem.nodeType==1)
			{
					if ((!localItem.getAttribute("className"))&&(globalCss))
						localItem.setAttribute("className",globalCss);
						
					if ((!localItem.getAttribute("textClassName"))&&(globalTextCss))
						localItem.setAttribute("textClassName",globalTextCss);						
						
						
					var z=eval("window.dhtmlX"+localItem.tagName+"Object"); 
					if (z)
						var TempNode= new z(localItem);
					else	
						var TempNode=null;
			
					if (localItem.tagName=="divider")
						{
					  	var imid=localItem.getAttribute("id");
						if (that.extraMode) 
							that.addItem(new dhtmlXToolbarDividerYObject(imid));				
						else 				
							that.addItem(new dhtmlXToolbarDividerXObject(imid));
						}
						else
							if (TempNode) 	
							{
							that.addItem(TempNode);
							if (that._extendedParse) that._extendedParse(that,TempNode,localItem);
							}
			}
		}
	};

		/**  
          *     @desc: set toolbar classes
          *     @type: public
		  *     @param: table - css class for toolbar container
  		  *     @param: title - css class for toolbar title
	      *     @topic: 0
          */
		dhtmlXToolbarObject.prototype.setToolbarCSS=function(table,title){
			this.tableCSS=table;
			this.titleCSS=title;
			this.topNod.className=this.tableCSS;
			this.preNameCell.className=this.titleCSS;
			this.nameCell.className=this.titleCSS;
			
		}
		
		/**  
          *     @desc: create object HTML representation
          *     @type: private
	      *     @topic: 0
          */
		dhtmlXToolbarObject.prototype._create_self=function()
		{
			if(!this.width) this.width=1; 		
			if(!this.height) this.height=1;
			
		var div=document.createElement("div");
			div.innerHTML='<table cellpadding="0" cellspacing="1" class="'+this.tableCSS+'" style="display:none" width="'+this.width+'" height="'+this.height+'"><tbody>' +
							'<tr>'+
							'<td width="'+(this.gecko?5:3)+'px"><div class="toolbarHandle">&nbsp;</div></td>'+
							'<td class="'+this.titleCSS+'" style="display:none">'+this.name+'</td>'+
							'<td></td>'+
							'<td align="right" width="100%" class="'+this.titleCSS+'" style="display:none">'+this.name+'</td>'+							
							'<td></td>'+
							'</tr></tbody></table>';
			var table=div.childNodes[0];
			table.setAttribute("UNSELECTABLE","on");
			table.onselectstart=this.badDummy;			
		this.topNod=table; 
		this.dividerCell=table.childNodes[0].childNodes[0].childNodes[0];
		this.dividerCell.toolbar=this;
		this.preNameCell=this.dividerCell.nextSibling;
		this.firstCell=this.preNameCell.nextSibling;
		this.nameCell=this.firstCell.nextSibling;							
		this.crossCell=this.nameCell.nextSibling;							
		
		this.parentObject.appendChild(table);
		};
		
		/**  
          *     @desc: create object HTML ( for vertical toolbar )
          *     @type: private
	      *     @topic: 0
          */
		dhtmlXToolbarObject.prototype._create_self_vertical=function()
		{	
			if(!this.width) this.width=1; 		
			if(!this.height) this.height=1;
			
		var div=document.createElement("div");
			div.innerHTML='<table cellpadding="0" cellspacing="1" class="'+this.tableCSS+'" style="display:none" width="'+this.width+'" height="'+this.height+'"><tbody>' +
							'<tr><td heigth="'+(this.gecko?5:3)+'px"><div class="vtoolbarHandle" style="height: 3px; width:100%; overflow:hidden"></div></td></tr>'+
							'<tr><td height="100%" class="'+this.titleCSS+'" style="display:none">'+this.name+'</td></tr>'+
							'<tr><td></td></tr>'+
							'<tr><td align="right" height="100%" class="'+this.titleCSS+'" style="display:none">'+this.name+'</td></tr>'+							
							'<tr><td></td></tr>'+
							'</tbody></table>';

		var table=div.childNodes[0];					
		table.onselectstart=this.badDummy;		
		table.setAttribute("UNSELECTABLE","on");
		
		this.topNod=table;
		this.dividerCell=table.childNodes[0].childNodes[0].childNodes[0];
		this.dividerCell.toolbar=this;
		this.preNameCell=table.childNodes[0].childNodes[1].childNodes[0];
		this.firstCell=table.childNodes[0].childNodes[2].childNodes[0];
		this.nameCell=table.childNodes[0].childNodes[3].childNodes[0];
		this.crossCell=table.childNodes[0].childNodes[4].childNodes[0];
		
		this.parentObject.appendChild(table);
			};
		
		
		

		
		/**  
          *     @desc: image button 
          *     @param: src - image href 		
          *     @param: text - button text 		    
          *     @param: width - object width
          *     @param: height - object height
          *     @param: action - default action		  
          *     @param: id - identificator 
          *     @param: tooltip - image tooltip
          *     @param: className - toolbar button css class	  
          *     @type: public
          *     @topic: 0  
          */ 		
	function dhtmlXImageButtonObject(src,width,height,action,id,tooltip,className,disableImage){
		// when created from xml, src - xml node
		if (src.tagName=="ImageButton")
		{
			width=src.getAttribute("width");
			height=src.getAttribute("height");
			id=src.getAttribute("id");
			action=src.getAttribute("imaction");
			tooltip=src.getAttribute("tooltip");
			className=src.getAttribute("className");
			disableImage=src.getAttribute("disableImage");
			src=src.getAttribute("src");
		}
		
		this.topNod=0;		this.action=0;			this.persAction=0;		this.id=id||0;
		this.className=className||"defaultButton";		
		this.src=src;	this.disableImage=disableImage;	
		this.tooltip=tooltip||"";		
		
		td=document.createElement("td");		
			this.topNod=td;
		td.height=height; td.width=width; td.align="center";
		td.innerHTML="<img src='"+src+"' border='0' alt='"+this.tooltip+"' style='padding-left:2px; padding-right:2px;'>";
		td.className=this.className;
		td.objectNode=this;
			this.imageTag=td.childNodes[0];
			this.enable();
		};

	
	dhtmlXImageButtonObject.prototype = new dhtmlXButtonPrototypeObject;
	
	
	
/*------------------------------------------------------------------------------
								VDivider object
--------------------------------------------------------------------------------*/
		/**  
          *     @desc: vertical divider object
          *     @param: id - identificator
          *     @type: public
          *     @topic: 0  
          */
	function dhtmlXToolbarDividerYObject(id){
		this.topNod=0;
		if (id) this.id=id;	else this.id=0;
		td=document.createElement("td");		
		this.topNod=td; td.align="center"; td.style.paddingRight="2"; td.style.paddingLeft="2";
		td.innerHTML="<div class='toolbarDividerY'>&nbsp;</div>";
				if (!document.all) td.childNodes[0].style.height="0px";
		return this;
	};
	dhtmlXToolbarDividerYObject.prototype = new dhtmlXButtonPrototypeObject;
	
/*------------------------------------------------------------------------------
								End of vDivider object
--------------------------------------------------------------------------------*/	

/*------------------------------------------------------------------------------
								HDivider object
--------------------------------------------------------------------------------*/
		/**  
          *     @desc: horisontal divider object
          *     @param: id - identificator
          *     @type: public
          *     @topic: 0  
          */ 		
	function dhtmlXToolbarDividerXObject(id){
		this.topNod=0;
		if (id) this.id=id;	else this.id=0;
		td=document.createElement("td");		
		this.topNod=td; td.align="center"; td.style.paddingRight="2"; td.style.paddingLeft="2"; td.width="4px";
		td.innerHTML="<div class='toolbarDivider'></div	>";
		if (!document.all) {  td.childNodes[0].style.width="0px";  td.style.padding="0 0 0 0"; td.style.margin="0 0 0 0";	} 
		return this;
	};
	dhtmlXToolbarDividerXObject.prototype = new dhtmlXButtonPrototypeObject;
/*------------------------------------------------------------------------------
								End of hDivider object
--------------------------------------------------------------------------------*/		


/*------------------------------------------------------------------------------
						Image button with text object
--------------------------------------------------------------------------------*/	
		/**  
          *     @desc: image button with text object
          *     @param: src - image href 		
          *     @param: text - button text 		    
          *     @param: width - object width
          *     @param: height - object height
          *     @param: action - default action		  
          *     @param: id - identificator 
          *     @param: tooltip - image tooltip
          *     @param: className - css class for button (button use 3 css classes - [className],[className]Over,[className]Down)
          *     @param: textClassName - css class for text
          *     @param: disableImage - alter image for disable mode [optional]	  		  		  
          *     @type: public
          *     @topic: 0  
          */ 		
	function dhtmlXImageTextButtonObject(src,text,width,height,action,id,tooltip,className,textClassName,disableImage){
		if (src.tagName=="ImageTextButton")
		{
			width=src.getAttribute("width");
			height=src.getAttribute("height");
			id=src.getAttribute("id");
			action=src.getAttribute("imaction");
			tooltip=src.getAttribute("tooltip");
			className=src.getAttribute("className");
			disableImage=src.getAttribute("disableImage");
			textClassName=src.getAttribute("textClassName");
			if (src.childNodes[0])
				text=src.childNodes[0].data;
			else
				text="";
			src=src.getAttribute("src");
		}
		this.topNod=0;
		this.action=0;	this.persAction=0;
		this.className=className||"defaultButton";		
		this.textClassName=textClassName||"defaultButtonText";				
		this.src=src;	this.disableImage=disableImage;	
		this.tooltip=tooltip||"";		this.id=id||0;

					
		td=document.createElement("td");	
		this.topNod=td; 
		td.height=height;
		td.width=width; td.align="center"; 
				td.noWrap=true;
		td.innerHTML="<table width='100%' height='100%' cellpadding='0' cellspacing='0'><tr><td valign='middle'><img src='"+src+"' border='0'  alt='"+this.tooltip+"' style='padding-left:2px; padding-right:2px;'></td><td width='100%' style='padding-left:5px' align='left' class='"+this.textClassName+"'>"+text+"</td></tr></table>";
		td.className=this.className;
		td.objectNode=this;
		this.imageTag=td.childNodes[0].childNodes[0].childNodes[0].childNodes[0].childNodes[0];
		this.textTag=td.childNodes[0].childNodes[0].childNodes[0].childNodes[1];
		this.enable();		
//		td.childNodes[0].onmouseout=this._onmouseoutY;
//		td.childNodes[0].onmouseover=this._onmouseoverY;		

		return this;
	};
	
	dhtmlXImageTextButtonObject.prototype = new dhtmlXButtonPrototypeObject;
		/**  
          *     @desc: set button text
		  *		@param: newText - new text [ HTML allowed ]
          *     @type: public
          *     @topic: 4  
          */				
	dhtmlXImageTextButtonObject.prototype.setText = function(newText){
			this.textTag.innerHTML=newText;		
		};	

/*------------------------------------------------------------------------------
								End of Image button with text object
--------------------------------------------------------------------------------*/	



/*------------------------------------------------------------------------------
								Dropdown object
--------------------------------------------------------------------------------*/
		/**  
          *     @desc: dropdown object
          *     @param: id - identificator 
          *     @param: valueList - list of values 
          *     @param: displayList - list of display values
          *     @param: action - default action
          *     @param: width - object width
          *     @param: height - object height
          *     @param: className - css class
          *     @type: public
          *     @topic: 0  
          */
	function dhtmlXSelectButtonObject(id,valueList,displayList,action,width,height,className)
		{
		if (id.tagName=="SelectButton")
			{
			width=id.getAttribute("width");
			height=id.getAttribute("height");
			className=id.getAttribute("className");			
			action=id.getAttribute("imaction");
			valueList="";
			displayList="";
				for (var j=0; j<id.childNodes.length; j++)
				{
					var z=id.childNodes[j];
					if ((z.nodeType==1)&&(z.tagName == "option"))
					{
						if (valueList) valueList+=","+z.getAttribute("value");
						else valueList=z.getAttribute("value");
						if (z.childNodes[0])
							{
						if (displayList) displayList+=","+z.childNodes[0].data;
						else displayList=z.childNodes[0].data;
							}
						else displayList+=",";
					};
				};
			id=id.getAttribute("id");
			}
		this.topNod=0;
		this.action=0;
		this.persAction=0;
		this.selElement=0;
		if (id) this.id=id;	else this.id=0;
		
		
			

		td=document.createElement("td");		
		this.topNod=td;  td.align="center"; 
		td.width=width;
		var sel=document.createElement("select");
		this.selElement=sel;
		sel.onchange=this._onclickX;
		sel.objectNode=this;
		if (className) sel.className=className;
		if (width)  sel.style.width="100%";
		//if (height) sel.style.height=height;				
		//if (action) sel.style.height=height;
		var temp1=valueList.split(",");
		
		if (displayList)	var temp2=displayList.split(",");	
		else	var temp2=valueList.split(",");	
		for (var i=0; i<temp1.length; i++)
		{
			sel.options[sel.options.length]=new Option(temp2[i],temp1[i]);
		};
		td.appendChild(sel);
		
		td.className="toolbarNormalButton";
		td.objectNode=this;
	
		return this;
	};
	
	
		dhtmlXSelectButtonObject.prototype = new dhtmlXButtonPrototypeObject;
		/**  
          *     @desc: disable object
          *     @type: public
          *     @topic: 4  
          */		
		dhtmlXSelectButtonObject.prototype.disable=function(){
			this.selElement.disabled=true;
		};
		
		/**  
          *     @desc: enable object
          *     @type: public
          *     @topic: 4  
          */		
		dhtmlXSelectButtonObject.prototype.enable=function(){
			this.selElement.disabled=false;
		};	
		

		/**  
          *     @desc: inner onSelect handler
          *     @type: private
          *     @topic: 3  
          */					
		dhtmlXSelectButtonObject.prototype._onclickX=function(){
			if ((!this.objectNode.persAction)||(this.objectNode.persAction(this.objectNode.selElement.value)))
				if (this.objectNode.action) { this.objectNode.action(this.objectNode.id,this.objectNode.selElement.value); }
		};

		/**  
          *     @desc: add option to dropdown
		  *		@param: value - string value (sended to action function)
		  *		@param: display - displayed string
          *     @type: public
          *     @topic: 6  
          */					
		dhtmlXSelectButtonObject.prototype.addOption=function(value,display){
			this.selElement.options[this.selElement.options.length]=new Option(display,value);
		};
		/**  
          *     @desc: remove string from dropdown
		  *		@param: value - string value 
          *     @type: public
          *     @topic: 6  
          */			
		dhtmlXSelectButtonObject.prototype.removeOption=function(value){
			var z=getIndexByValue(value);
			if (z>=0) this.selElement.removeChild(this.selElement.options[i]);
		};
		/**  
          *     @desc: change string value
		  *		@param: oldValue - old string value 
		  *		@param: newValue - new string value 
          *     @type: public
          *     @topic: 6 
          */					
		dhtmlXSelectButtonObject.prototype.setOptionValue=function(oldValue,newValue){
			var z=getIndexByValue(oldValue);
			if (z>=0) this.selElement.options[i].value=newValue;		
		};
		/**  
          *     @desc: change option text
		  *		@param: value - option value
		  *		@param: newText - new option text 
          *     @type: public
          *     @topic: 6  
          */			
		dhtmlXSelectButtonObject.prototype.setOptionText=function(value,newText){
			var z=getIndexByValue(value);
			if (z>=0) this.selElement.options[i].text=newText;		
		};
		/**  
          *     @desc: select string by value
		  *		@param: value - string value 
          *     @type: public
          *     @topic: 6 
          */	
		dhtmlXSelectButtonObject.prototype.setSelected=function(value){
			var z=getIndexByValue(value);
			if (z>=0) this.selElement.options[i].selected=true;
		};
		/**  
          *     @desc: return string index in dropdown by value (return -1 if string with given value not found)
		  *		@param: value - string value 
          *     @type: public
          *     @topic: 0  
          */			
		dhtmlXSelectButtonObject.prototype.getIndexByValue=function(value){
			for (var i=0; i<this.selElement.options.lenght; i++)
				{
					if (this.selElement.options[i].value==value) 
						return i;
				};			
			return -1;
		};
	
/*------------------------------------------------------------------------------
								End of Dropdown object
--------------------------------------------------------------------------------*/

 
		/**  
          *     @desc: two state button
          *     @param: id - identificator 		  
          *     @param: src - image href 		
          *     @param: text - button text 		    
          *     @param: width - object width
          *     @param: height - object height
          *     @param: action - default action		  
          *     @param: tooltip - image tooltip
          *     @param: className - css class for button (button use 3 css classes - [className],[className]Over,[className]Down)
          *     @param: textClassName - css class for text
          *     @param: disableImage - alter image for disable mode [optional]	  		  		  
          *     @type: public
          *     @topic: 0  
          */ 
function dhtmlXTwoStateButtonObject(id,src,text,width,height,action,tooltip,className,textClassName,disableImage,pressedState){
 if(id.tagName=="TwoStateButton")
{
 width=id.getAttribute("width")||1;
 height=id.getAttribute("height")||1;
 action=id.getAttribute("imaction");
 tooltip=id.getAttribute("tooltip");
 className=id.getAttribute("className");
 disableImage=id.getAttribute("disableImage");
 textClassName=id.getAttribute("textClassName");
 pressedState=id.getAttribute("pressedState"); 
 
 if(id.childNodes[0])
 	text=id.childNodes[0].data;
 else
	 text="";
 src=id.getAttribute("src");
 id=id.getAttribute("id");
}
 this.state=0;
 this.topNod=0;
 this.action=0;this.persAction=0;
 this.className=className||"defaultButton";
 this.textClassName=textClassName||"defaultButtonText";

 this.disableImage=disableImage;
 this.tooltip=tooltip||"";this.id=id||0;
 if (text) this.textP=text.split(','); else this.textP=",".split(',');
 if (src) this.srcA=src.split(','); else this.srcA=",".split(',');
 this.src=this.srcA[0];
 td=document.createElement("td");
 this.topNod=td;
 td.height=height;
 td.width=width;
 td.align="center";
 td.noWrap=true;

 td.innerHTML="<table width='100%' height='100%' cellpadding='0' cellspacing='0'><tr><td valign='middle'><img src='"+this.srcA[0]+"' border='0' alt='"+this.tooltip+"' style='padding-left:2px;padding-right:2px;'></td><td width='100%' style='padding-left:5px' align='left' class='"+this.textClassName+"'>"+this.textP[0]+"</td></tr></table>";
 td.className=this.className;
 td.objectNode=this;
 this.imageTag=td.childNodes[0].childNodes[0].childNodes[0].childNodes[0].childNodes[0];
 this.textTag=td.childNodes[0].childNodes[0].childNodes[0].childNodes[1];
 
 if (!text) this.textTag.style.display="none";
 if (!src) this.imageTag.style.display="none";
 
 this.enable();
  if (convertStringToBoolean(pressedState))
 {
  	this.state=1; 	this.topNod.className=this.className+"down";
	if (this.textP[1])		this.textTag.innerHTML=this.textP[1];
	if (this.srcA[1])		this.imageTag.src=this.srcA[1];
 }
 return this;
};

dhtmlXTwoStateButtonObject.prototype = new dhtmlXButtonPrototypeObject;

/**  
          *     @desc: onclick
		  *		@param: e - event
		  *		@param: that - button object
          *     @type: private
          *     @topic: 3  
          */	  
dhtmlXTwoStateButtonObject.prototype._onclickX = function(e,that){
 if(!that) that=this.objectNode;
 if(that.topNod.dstatus) return;
 	if (that.state==0) { that.state=1; 	this.className=that.className+"down"; }
	else  { that.state=0;  	this.className=that.className; } 
	
	if (that.textP[that.state])		that.textTag.innerHTML=that.textP[that.state];
	if (that.srcA[that.state])		that.imageTag.src=that.srcA[that.state];

	
 if((!that.persAction)||(that.persAction()))
 if(that.action){that.action(that.id,that.state);}

};
/**  
          *     @desc: mouseout
          *     @type: private
          *     @topic: 3 
          */	
 dhtmlXTwoStateButtonObject.prototype._onmouseoutX=function(e){
};
 /**  
          *     @desc: mouseover
          *     @type: private
          *     @topic: 3  
          */	
 dhtmlXTwoStateButtonObject.prototype._onmouseoverX=function(e){
};
/**  
          *     @desc: get button state
          *     @type: public
          *     @topic: 4  
          */	
 dhtmlXTwoStateButtonObject.prototype.getState=function(){
 	return this.state;
};
/**  
          *     @desc: set button state
		  *		@param: state - new state (1 or 0)
          *     @type: public
          *     @topic: 4 
          */	
 dhtmlXTwoStateButtonObject.prototype.setState=function(state){
 	this.state=state;
 	if (state==0) this.topNod.className=this.className; 
	else this.topNod.className=this.className+"down"; 

	if (this.textP[this.state])		this.textTag.innerHTML=this.textP[this.state];
	if (this.srcA[this.state])		this.imageTag.src=this.srcA[this.state];
};
  
 