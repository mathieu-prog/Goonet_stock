<script type="text/javascript">
var tablescroll=document.getElementById("tablebody");
var popup=document.getElementById("popForm");
 var table=document.getElementById("table");
 var form=document.getElementById("form");
  var reapro=document.getElementById("reaproForm");
 var confirmationform=document.getElementById("confirmationform");
 var btDelete=document.getElementById("btDelete1");
 var titleparagraph=document.getElementById("titlepara");
 var paraicon=document.getElementById("paraicon");
 var btNon=document.getElementById("btNon");
function closeForm(argument) {
	popup.style.display="none";
}
function openForm(argument) {
	popup.style.display="block";
	form.style.display="block";
	confirmationform.style.display="none";
  reapro.style.display="none";
	var title=document.getElementById("title");
    var txtNom=document.getElementById("txtNom");
    var txtPrice=document.getElementById("txtPrice");
    var btAdd=document.getElementById("btAdd");
    txtNom.value="";
    txtPrice.value="";
 	title.innerHTML="Nouveau article";
    btAdd.innerHTML="Ajouter";
}

//for delete button
function showConfirm(btn,isapproved) {
  
	popup.style.display="block";
	confirmationform.style.display="block";
	form.style.display="none";
  reapro.style.display="none";
	btDelete1.value=btn.value;
  if(isapproved=='true'){
    titleparagraph.textContent="Voulez-vous vraiment approuver le paiement de cet article?";
    btNon.value="payé";
  }else{
titleparagraph.textContent="Voulez-vous vraiment désapprouver le paiement de cet article?";
btNon.value="non payé";
  }

}

//for table modify button
$(document).on('click','.reaprodiv button', function(event) {
   
   
   var rowindex=$(this).closest('tr').index()+1;
    var title=document.getElementById("title2");
    var qte=document.getElementById("lbQte");
    var txtQte=document.getElementById("txtNewQte");
    var txtPA=document.getElementById("txtNewPA");
    var txtObs=document.getElementById("txtNewObs");
    var btReapro=document.getElementById("btReapro");
    txtPA.value=table.rows[rowindex].cells[4].innerHTML;
     txtObs.value=table.rows[rowindex].cells[8].innerHTML;
     btReapro.value=table.rows[rowindex].cells[0].innerHTML;
 	title.innerHTML="Réaprovisionnement de "+table.rows[rowindex].cells[2].innerHTML;
  qte.innerHTML="Quantité actuelle: "+table.rows[rowindex].cells[3].innerHTML;
   popup.style.display="block";
	reapro.style.display="block";
	confirmationform.style.display="none";
  form.style.display="none";

});

//for scroll
function scrollToTop() {
	tablescroll.scrollTo(0,0);
}
function scrollToBottom(){
	tablescroll.scrollTo({ left: 0, top: tablescroll.scrollHeight, behavior: "smooth" });
}

 popup.style.display="none";



 //popup options events


 var comboProv = document.getElementById('comboProv');
 var comboDest = document.getElementById('comboDest');
 var provClientDiv = document.getElementById('divClientsProv');
 var provFrssrDiv = document.getElementById('divFournisseursProv');
 var destClientDiv = document.getElementById('divClientsDest');
 var destFrssrDiv = document.getElementById('divFournisseursDest');

 function importValues(){
 	var optionsProv = comboProv.innerHTML;
var selectedValue= comboProv.options[comboProv.selectedIndex];
var id=comboProv.value;
clearSelect();
 var optionsDest= comboDest.innerHTML+ optionsProv;
comboDest.innerHTML = optionsDest;
comboDest.remove(comboProv.selectedIndex);
verifyId(id,'prov');
destEvent();
 }

function destEvent() {
	var id=comboDest.value;
	verifyId(id,'dest');
}

 function clearSelect(){
 	var length = comboDest.options.length;
for (i = length-1; i >= 0; i--) {
  comboDest.options[i] = null;
}
 }

function verifyId(id,select){
if (select=='prov') {

if (id==2) {
provClientDiv.style.display="block";	
provFrssrDiv.style.display="none";	
}else if (id==4) {
provFrssrDiv.style.display="block";	
provClientDiv.style.display="none";	
}else{
provClientDiv.style.display="none";	
provFrssrDiv.style.display="none";		
}

}else{

if (id==2) {
destClientDiv.style.display="block";	
destFrssrDiv.style.display="none";	
}else if (id==4) {
destFrssrDiv.style.display="block";
destClientDiv.style.display="none";		
}else{
destClientDiv.style.display="none";	
destFrssrDiv.style.display="none";		
}

}
}


 importValues();
var comboArtPick=document.getElementById('comboArtPick');

 document.getElementById('datePicker').valueAsDate = new Date();


	
</script>