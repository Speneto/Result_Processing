// validate text
function validateText(value){
id = value.id;
value = value.value;	
var format =  /^[A-Za-z ]{1,}$/;	
if(value == "" || value == null){
return true;
}else if(value.match(format)){
return true;
}else{
alert("Please Enter Only Text Values e.g Today, Come  E.T.C");
document.getElementById(id).value = "";
return false;
}
}


// validate Numbers
function validateNumbers(value){
id = value.id;
value = value.value;
var format =  /^[0-9]{1,}$/;//
if(value == "" || value == null){
return true;
}else if(value.match(format)){
return true;
}else{
alert("Please Enter Only Numric values e.g 10000, 50000  E.T.C");
document.getElementById(id).value = "";
return false;
}
}
