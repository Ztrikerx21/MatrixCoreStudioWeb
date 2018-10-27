<?php
class card{
  public $id = "";
  public $name = "";
  public $cost = "";
  public $description = "";

   public function  __construct($id, $name, $cost, $description){
    $this->id = $id;
    $this->name = $name;
    $this->cost = $cost;
    $this->description = $description;
  }

}
$file = fopen("resources/zombiePool.txt","r") or die("can't open file");
$titles = fgets($file);
$i=0;
while(!feof($file)){
  $fcontent = fgets($file);
  $id = strtok($fcontent, "\t");
  $name = strtok("\t");
  $cost = strtok("\t");
  $description = strtok("\t");
$zombiePool[] = new card($id, $name, $cost, $description);
}
fclose($file);
shuffle($zombiePool);


?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        //Asignar el array de PHP a JS
        var zombiePool = <?php echo json_encode($zombiePool); ?>;
        var i=0;
        var j = zombiePool.length;
        reprintCard();

        function reprintCard(card) {
          $("#cost1").html(zombiePool[i].cost);
          $("#name1").html(zombiePool[i].name);
          $("#id1").html(zombiePool[i].id);
          $("#description1").html(zombiePool[i].description);
          i++;
          $("#cost2").html(zombiePool[i].cost);
          $("#name2").html(zombiePool[i].name);
          $("#id2").html(zombiePool[i].id);
          $("#description2").html(zombiePool[i].description);
          i++;
          $("#cost3").html(zombiePool[i].cost);
          $("#name3").html(zombiePool[i].name);
          $("#id3").html(zombiePool[i].id);
          $("#description3").html(zombiePool[i].description);
          i++;
          $("#cost4").html(zombiePool[i].cost);
          $("#name4").html(zombiePool[i].name);
          $("#id4").html(zombiePool[i].id);
          $("#description4").html(zombiePool[i].description);
          i++;
        };

        $(".pool").click(function(){
            $(this).hide();

        });
        $("#poolNext4").click(function(){
          $(".pool").show();
          reprintCard();
          $("#poolPlaceholder").html("cards left:" + (j-i));
        });


    });
  </script>

  </head>
  <body>
    <main>
      <div id="zombiePoolHolder">
        <div id="poolButtonHolder">
          <div class="poolButtons" id="poolNext4">Next 4</div>
          <div class="poolButtons" id="poolPlaceholder">Full deck</div>
        </div>

        <div class="pool" id="pool1" class="more_info">
          <div class="cost" id="cost1">No name</div> <div class="name" id="name1">No name</div> [<div class="id" id="id1">No name</div>]
          <div class="description" id="description1">No description</div>
        </div>
        <div class="pool" id="pool2" class="more_info">
          <div class="cost" id="cost2">No name</div> <div class="name" id="name2">No name</div>  [<div class="id" id="id2">No name</div>]
          <div class="description" id="description2">No description</div>
        </div>
        <div class="pool" id="pool3" class="more_info">
          <div class="cost" id="cost3">No name</div> <div class="name" id="name3">No name</div> [<div class="id" id="id3">No name</div>]
          <div class="description" id="description3">No description</div>
        </div>
        <div class="pool" id="pool4" class="more_info">
          <div class="cost" id="cost4">No name</div> <div class="name" id="name4">No name</div> [<div class="id" id="id4">No name</div>]
          <div class="description" id="description4">No description</div>
        </div>


      </div>
    </main>
  </body>


</html>
