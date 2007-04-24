String.prototype.pad = function(l, s, t){
	      return s || (s = " "), (l -= this.length) > 0 ? (s = new Array(Math.ceil(l / s.length)
		+ 1).join(s)).substr(0, t = !t ? l : t == 1 ? 0 : Math.ceil(l / 2))
		+ this + s.substr(0, l - t) : this;
         };
         
function AjaxJSON(request, json)
{
  var nbElementsInResponse = json.length;
  for (var i = 0; i < nbElementsInResponse; i++)
  {
	//Completar con ceros la cantidad indicada a la izquierda
	 if (json[i][2]=="c")
		{
		valor=document.getElementById(json[i][0]).value;
		valor=valor.pad(json[i][1], "0",0);
		document.getElementById(json[i][0]).value=valor;
		}	  
	 else
	   {
	    document.getElementById(json[i][0]).value=json[i][1];  
	   } 
  }//for

}