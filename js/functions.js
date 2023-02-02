var selectedCategories = new Array();

function confirmDeleteItem(type,id) {
	text = "Удалить товар?";
	if(type=='cdel'){
		text = " Удалить подгруппу товаров?";
	}
	var answer = confirm(text);
	if (answer){
		window.location = "/admin/catalogue.php?op="+type+"&id="+id;
	}
	else{
		return;
	}
}

function confirmDeleteArticle(type,id) {
	text = "Удалить статью?";
	dest = "/admin/articles.php";
	if(type=='ndel'){
		text = " Удалить новость?";
		dest= "/admin/news.php";
	}
	if(type=='bdel'){
		text = " Удалить запись?";
		dest= "/admin/blog.php";
	}
	if(type=='job'){
		text = "Удалить вакансию?";
		dest = "/admin/jobs.php";
	}
	var answer = confirm(text);
	if (answer){
		window.location =dest+"?op=del&id="+id;
	}
	else{
		return;
	}
}

function confirmDeleteUser(id) {
	var answer = confirm('Удалить пользователя?');
	if (answer){
		window.location ='/admin/users.php?op=del&id='+id;
	}
	else{
		return;
	}
}

function showPanel(show){
	if (show)
	{
		document.getElementById("lightbox").style.display = "block";
		document.getElementById("overlay").style.display="block";
	}
	else
	{
		document.getElementById("lightbox").style.display="none";
		document.getElementById("overlay").style.display="none";
	}
}

function saveSelectedCategories(outputId){
	var k=0;
	var sel = new Array();
	var text = '';
	var a = document.getElementsByTagName('label');
	for (var i=0; i<a.length; i++) {
		if (document.getElementById(a[i].htmlFor)!=null &&
			document.getElementById(a[i].htmlFor).checked==true &&
			a[i].htmlFor.toLowerCase().indexOf('chb_',-1) >= 0){
			sel[k] = document.getElementById(a[i].htmlFor).id;
			if(text!=''){
				text+="; ";
			}
			text+=a[i].innerHTML; 
			k=k+1;
		}
	}
	selectedCategories = [].concat(sel);
	document.getElementById('categories').value=text;
	
}
function restoreSelectedCategories(){

	var a = document.getElementsByTagName('label');
	for (var i=0; i<a.length; i++) {
		if (document.getElementById(a[i].htmlFor)!=null  && a[i].htmlFor.toLowerCase().indexOf('chb_',-1) >= 0){
				document.getElementById(a[i].htmlFor).checked = false;
		}
	}
	for(j=0;j<selectedCategories.length;j++){
		document.getElementById(selectedCategories[j]).checked = true;
	}
}

function printSelectedCategories(){
	
}

function promoCode(promo){
var dform = document.getElementById('promo_form');
var prINT = dform.percent.value;
var out = 0;

prINT = parseInt(prINT, 10);

	if( (0 < prINT) && (100 >= prINT) )
	{
		out = 1;
	}

	if(out === 1)
		{
			dform.submit();
		}
	else{
		alert("Неверное значение");
	}


}

