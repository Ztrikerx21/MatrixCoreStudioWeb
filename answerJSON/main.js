function getInfo(){

  for(var i = 0; i <= contador; i++){
    dialogos[i] = document.getElementById("dialog"+i).value;
  }

  var o = {
    id : document.getElementById("id").value,
    name: document.getElementById("name").value,
    imageName: document.getElementById("imageName").value,
    font: document.getElementById("font").value,
    dialogue :dialogos
  }
  console.log(o.name);
  console.log(o.imageName);
  console.log(o.font);
  console.log(o.dialog);

  var myJSON = JSON.stringify(o);
  document.getElementById("jsonHolder").value = myJSON;
}

function newDialog(){
  dialogos[contador] = document.getElementById("dialog"+contador).value;
  contador++;
  var div = document.getElementById("dialogBoxHolder");
  div.innerHTML += '<br><textarea id = "dialog' + contador + '" maxlength="150" rows="4" cols = "50" required="required"></textarea>';


  for(var i = 0; i < contador; i++){
    document.getElementById("dialog"+i).value = dialogos[i];
  }
}
function deleteDialog(){
  dialogos.pop();
  contador--;
  var div = document.getElementById("dialogBoxHolder");
  div.innerHTML = '  Dialog (150 chars):<br><textarea id = "dialog0" maxlength="150" rows="4" cols = "50" required="required"></textarea>'
  div.innerHTML += '<span class="dialogButtonHolder"> <button onclick=newDialog()>+</button><button onclick=deleteDialog()>-</button> </span>'

  for(var i = 1; i < contador; i++){
    div.innerHTML += '<br><textarea id = "dialog' + contador + '" maxlength="150" rows="4" cols = "50" required="required"></textarea>';
  }
  for(var i = 0; i < contador; i++){
    document.getElementById("dialog"+i).value = dialogos[i];
  }
}

window.onload = function(){
   contador = 0;
   dialogos = [];
}
