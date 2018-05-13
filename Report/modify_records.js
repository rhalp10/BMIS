function savemona(){
	  var n=document.getElementById("mayor").value;
	  var q=document.getElementById("quarter").value;
	  if(n!="" && q!=""){
		   var a = confirm("Are you sure you want to save?");
		  if(a===true){
		
	$.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{  insert_go:'insert_go', n:n, q:q
  },
  success:function(response) {
   if(response!="")
   {
    var id=response;
    alert(''+id+'');
	window.location = "view.php?id=12";
   }
  }
 });
	 }
		  
	  }else{
		  
	  }
	  
	 
 }

function insert_row()
{
		
 var b16=document.getElementById("barangaychairman1").value;
 var b1=document.getElementById("barangaychairman2").value;
 var b2=document.getElementById("barangaychairman3").value;
 var b3=document.getElementById("barangaychairman4").value;
 var b4=document.getElementById("barangaychairman5").value;
 var b5=document.getElementById("barangaychairman6").value;

if(b1==""){
	b1="N/A";
}
if(b4==""){
	b4="N/A";
}
if(b5==""){
	b5="N/A";
}
if(b2==""){
	b2="0";
}
if(b3==""){
	b3="0";
}
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   insert_row:'insert_row',
   b1:b1, b2:b2, b3:b3, b4:b4, b5:b5
  },
  success:function(response) {
   if(response!="")
   {
    var id=response;
    var table=document.getElementById("attendance_table");
    var table_len=(table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr><td>"+b16+"</td><td>"+b1+"</td><td>"+b2+"</td> <td>"+b3+"</td>  <td>"+b4+"</td> <td>"+b5+"</td>    <td></td></tr>";
document.getElementById("emengheader").style.display = "none";
document.getElementById("buttonmoto").style.display = "block";
   document.getElementById("barangaychairman2").value = "";
   document.getElementById("barangaychairman3").value = "";
   document.getElementById("barangaychairman4").value = "";
   document.getElementById("barangaychairman5").value = "";
   document.getElementById("barangaychairman6").value = "";
   }
  }
 });
}