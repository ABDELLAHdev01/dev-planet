function getData(id, title, text, category) {
    document.getElementById('addmorebtn').style.display = 'none';

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
    document.getElementById('addmorebtn').style.display = 'block';

  document.getElementById("edbtn").style.display = "none";
  document.getElementById("addbtn").style.display = "block";
  document.getElementById("edittitle").value = "";
  document.getElementById("edittext").value = "";
//   document.getElementById("editcategory").value = "";
}

function getctdata(id, category) {
  document.getElementById("delbt").style.display = "block";
  document.getElementById("addbt").style.display = "none";

  document.getElementById("categoryedit").value = category;
  document.getElementById("idcat").value = id;
}

function addNewArticle() {

  document.getElementById(
    "containernewForm"
  ).innerHTML += `<input type="hidden" id="id" name="id">
    <input name="title[]" id="edittitle" type="text" class="form-control mb-3"
    placeholder="The title" required="" autofocus="" />
    <input name="picture[]" type="file" class="mb-2" accept="image/png, image/jpeg">
    <textarea name="text[]" id="edittext" id="" class="form-control mb-3 text-left "
    placeholder="The article text" style="height: 20rem; "></textarea>
    <select class="form-control mb-3 text-left " id="editcategory" name="idCat[]" >
    <option hidden selected>Select Category</option>
                                        <?php ShowCategoryOnFormController(); ?>
                                        </select>

    <button type="button" class="btn btn-primary w-100 mb-4" onclick="addNewArticle()">ADD MORE</button>`;

    
}
