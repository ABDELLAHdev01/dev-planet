function getData(id, title, text, category) {
  document.getElementById("containernewForm").innerHTML = "";

  document.getElementById("addmorebtn").style.display = "none";

  document.getElementById("edbtn").style.display = "block";
  document.getElementById("addbtn").style.display = "none";
  document.getElementById("id").value = id;
  document.getElementById("edittitle").value = title;
  document.getElementById("edittext").value = text;
  document.getElementById("editcategory").value = category;
}


document.getElementById("showbtn").addEventListener("click", () => {
  document.getElementById("delbt").style.display = "none";
  document.getElementById("addbt").style.display = "block";
  document.getElementById("categoryedit").value = "";
  document.getElementById("idcat").value = "";
});
function hideEditbtn() {
  document.getElementById("containernewForm").innerHTML = "";

  document.getElementById("addmorebtn").style.display = "block";

  document.getElementById("edbtn").style.display = "none";
  document.getElementById("addbtn").style.display = "block";
  document.getElementById("edittitle").value = "";
  document.getElementById("edittext").value = "";
  document.getElementById("editcategory").value = "999";
}

function getctdata(id, category) {
  document.getElementById("container-cat").innerHTML ='';

  document.getElementById("btnaddmorecategory").style.display = "none";

  document.getElementById("delbt").style.display = "block";
  document.getElementById("addbt").style.display = "none";

  document.getElementById("categoryedit").value = category;
  document.getElementById("idcat").value = id;
}

function addNewArticle(categorys) {
  let x = "`" + ` ${categorys} ` + "`";
  document.getElementById("containernewForm").innerHTML +=
    ` <div class='' >
    <input type="hidden" id="id" name="id">
    <input name="title[]" id="edittitle" type="text" class="form-control mb-3"
    placeholder="The title" required="" autofocus="" />
    <input name="picture[]" type="file" class="mb-2" accept="image/png, image/jpeg">
    <textarea name="text[]" id="edittext" id="" class="form-control mb-3 text-left "
    placeholder="The article text" style="height: 20rem; "></textarea>
    <select class="form-select mb-3 text-left " id="editcategory" name="idCat[]" >
    <option hidden selected>Select Category</option>
    ` +
    categorys +
    `
                                        </select>
    
    <button type="button" class="btn btn-primary  mb-4 py-2" onclick="addNewArticle(` +
    x +
    `)">ADD MORE</button>
    <button type="button" onclick="deletepar(this)" class="btn btn-danger mb-4 py-2">Delete</button> 
    </div>
    `
    ;
}

function addNewCat() {
  document.getElementById("container-cat").innerHTML += `<div class="d-flex">
    <input id="categoryedit" name="thecategory2[]" type="text" class="form-control mb-3 me-2"
    placeholder="Category name" required="" autofocus="" /> <button  type="button" onclick="addNewCat()" class="btn btn-primary h-50 w-50">Add More </button> <button onclick="deletecatg(this)" class="btn btn-danger ms-1 h-50 w-50"> Delete </button>
</div> `;
}

function getDataView(title, text, category, thumbnail) {
  document.getElementById("exampleModalLabel").innerText = title;
  document.getElementById("thumbnaill").src = thumbnail;
  document.getElementById("thetext").innerText = text;
  document.getElementById("thecatrgory").innerText = "Category / " + category;
}

function hideTheCatbtnadd() {
  document.getElementById("container-cat").innerHTML ='';

  document.getElementById("btnaddmorecategory").style.display = "block";
}


function deletepar(item){
item.parentNode.remove();

}
function deletecatg(item){
item.parentNode.remove();

}