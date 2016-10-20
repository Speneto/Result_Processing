function openPreview(){
//document.getElementById("button").disabled = false;
var popWin = window.open('print_reciept.php',"","directories=no, status=no, menubar=no, scrollbars=no, resizable=no,width=480, height=480,top=0,left=900");
//var popquantity1 = popWin.document.getElementById("quantity1");
var date = document.getElementById("date_id").value;
var name = document.getElementById("student_name").value;
var first_payment = document.getElementById("first_payment").value;
var second_payment = document.getElementById("second_payment").value;
var third_payment = document.getElementById("third_payment").value;
var payment_for = document.getElementById("payment_for").value;
var cheque_no = document.getElementById("cheque_no").value;
var reciept_no = document.getElementById("reciept_no").value;
var amount_in_words = document.getElementById("amount_in_words").value;
var department = document.getElementById("department1").value;
var clas = document.getElementById("clas1").value;
var term = document.getElementById("term1").value;
var session = document.getElementById("session1").value;


var amount = 0;
if(first_payment != 0 && second_payment == 0 && third_payment == 0){
	  amount = first_payment;
	}else if(first_payment != 0 && second_payment != 0 && third_payment == 0){
		  amount = second_payment;
		}else if(first_payment != 0 && second_payment != 0 && third_payment != 0){
		  amount = third_payment;
		}

popWin.document.writeln('<div style="margin-left:80px; font-weight:bold; font-size:larger " >BRIGHT FUTURE HIGH SCHOOL</div><div style="margin-left:40px; font-weight:bold; font-size:larger " >P O. Box 224, Numan, Adamawa State, Nigeria</div><div style="margin-left:150px; font-weight:700">CASH RECIEPT</div></br>');

popWin.document.writeln('<div style="margin-left:300px; font-weight:bold"> Receipt-No : '+reciept_no+' </div></br> ');

popWin.document.writeln('<div> Date : '+date+' &nbsp; Department : '+department+' </div> </br>');

popWin.document.writeln('<div> Class : '+clas+' &nbsp; Term : '+term+' &nbsp; Session : '+session+' </div> </br>');


popWin.document.writeln('Received from : '+name+'</br></br>\
The Sum of : '+amount_in_words+'  </br></br>\
Being Payment for : '+payment_for+'</br></br>\
Cash/Cheque No : '+cheque_no+'</br></br>\
Amount : '+amount+' </br></br>\
Signature:.............................</br></br></br></br>');



popWin.document.writeln('<input type="button" value="Click to print" border="none" style="cursor:pointer; margin-left:150px; box-shadow:0; outline:none; " onclick="window.print()" />');

popWin.document.close();


}