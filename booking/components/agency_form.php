<?php

$agency_name = "";
$agency_email = "";
$agency_id = 0;
$tel = "";
$company_name = "";
$btn_label = "เพิ่ม Agent ใหม่";

$edit_id = 0;

$form_action = "/booking/_saveAgency.php";

if (isset($_GET["edit_id"]) && $_GET["edit_id"] != 0) :
  $edit_id = $_GET["edit_id"];
  $get_Agency = $editAgency($_GET["edit_id"]);

  while ($row = $get_Agency->fetch_array()) :
    $agency_name = $row["name"];
    $company_name = $row["agency_name"];
    $agency_email = $row["email"];
    $tel = $row["tel"];
    $agency_id = $row["agency_id"];
    $edit_id = $agency_id;
  endwhile;

  $btn_label = "Update $agency_name";
//var_dump($getAgency);

endif;
?>

<form action="<?php echo $form_action; ?>" method="post">

  <div class="flex justify-between">


    <div class="grow">
      <input type="hidden" name="agency_id" id="agency_id" value="<?php echo $agency_id; ?>">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="">Company Name</label>
      <input id="" type="text" name="company_name" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $company_name; ?>">
    </div>
    <div class="grid justify-items-stretch">


      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Agency Name</label>
        <input id="" type="text" name="agency_name" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $agency_name; ?>">
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Password</label>
        <input id="" type="password" name="password" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
      </div>
    </div>

    <div class="grid justify-items-stretch">


      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Email</label>
        <input id="" type="email" name="email" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="<?php echo $agency_email; ?>" <?php echo ($edit_id == 0) ? "" : "disabled"; ?> />
      </div>

      <div>
        <label class="block text-gray-700 text-sm font-bold mb-2" for="">Tel.</label>
        <input id="" type="number" name="tel" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
      </div>
    </div>



  </div>

  <div class="flex grow justify-end mt-6">

<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="backTo('<?php echo "/booking/agency.php";?>')">
      Cancel
    </button>
    <button class="ml-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
      <?php echo $btn_label; ?>
    </button>
  </div>

</form>
<script> 
function backTo(url){
  location.href=url
}
</script>
