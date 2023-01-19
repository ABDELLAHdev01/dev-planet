function getData(id,title,text,category){    
    document.getElementById('edbtn').style.display = 'block';
    document.getElementById('addbtn').style.display = 'none';
    document.getElementById('id').value= id;
    document.getElementById('edittitle').value= title;
    document.getElementById('edittext').value= text;
    document.getElementById('editcategory').value= category;    
}



document.getElementById('showbtn').addEventListener('click', ()=>{
    document.getElementById('delbt').style.display = 'none';
    document.getElementById('addbt').style.display = 'block';
})
function hideEditbtn(){
    document.getElementById('edbtn').style.display = 'none';
    document.getElementById('addbtn').style.display = 'block';



}

function getctdata(id,category){

    document.getElementById('delbt').style.display = 'block';
    document.getElementById('addbt').style.display = 'none';

    
    document.getElementById('categoryedit').value = category;
    document.getElementById('idcat').value = id;


}