<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $error="";
  print_r($_REQUEST);

  $dir_subida = "/var/www/html/omoline/Curs2020-2021/M07/Act03_OriolMoliné/img/";
  $fichero_subido = $dir_subida . basename($_FILES["myfile"]["name"]);

  if (move_uploaded_file($_FILES['myfile']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
  } else {
    echo "¡Posible ataque de subida de ficheros!\n";
  }
  if(empty($_REQUEST["mytext"]));{
    $error="Text Obligatori";
  }
  if(!isset($_REQUEST["myradio"]));{
    $error="Radio Obligatori";
  }
  if(!isset($_REQUEST["mycheckbox"]));{
    $error="CheckBox Obligatori";
  }
  if($_REQUEST["myselect"]==0);{
    $error="Select Obligatori";
  }
  if(empty($_REQUEST["mytextarea"]));{
    $error=" Textarea Obligatori";
  }

} else {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Exemple de formulari</title>
  </head>
<body>

  <div style="margin: 30px 10%;">
    <h3>My form</h3>
      <form method="post" id="myform" name="myform" enctype="multipart/form-data">

        <label>Text</label> <input type="text" value="" size="30" maxlength="100" name="mytext" id="" /><br /><br />

          <input type="radio" name="myradio" value="1" /> First radio
          <input type="radio" name="myradio" value="2" /> Second radio<br /><br />

          <input type="checkbox" name="mycheckbox[]" value="1" /> First checkbox
          <input type="checkbox" name="mycheckbox[]" value="2" /> Second checkbox<br /><br />

        <label>Select ... </label>
          <select name="myselect" id="">
            <optgroup label="group 1">
              <option value="1">item one</option>
            </optgroup>
            <optgroup label="group 2" >
              <option value="2">item two</option>
            </optgroup>
          </select><br /><br />

        <textarea name="mytextarea" id="" rows="3" cols="30">
        </textarea> <br /><br />

        <input type="file" name="myfile">

        <button id="mysubmit" type="submit">Submit</button><br /><br />
      </form>
    </div>
</body>
</html>

<?php
}
 ?>
