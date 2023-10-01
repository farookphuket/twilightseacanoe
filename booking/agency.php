<?php
require_once("./auth_user.php");
// get the visitor
require_once("../api/visitor.php");
$visitorCountAll = $getVisitorAll();

$agency_api = $_SERVER["DOCUMENT_ROOT"] . "/api/agency_api.php";
require_once($agency_api);


// js script and css script link variable 
$booking_env = $_SERVER["DOCUMENT_ROOT"] . "/booking/booking_env.php";
require_once($booking_env);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="<?php echo $google_font; ?>" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">

  <link rel="manifest" href="../site.webmanifest">
  <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">

  <meta name="msapplication-TileColor" content="#00aba9">
  <meta name="theme-color" content="#3b7977">

  <!-- Primary Meta Tags -->
  <title>Manage Agency</title>
  <meta name="title" content="admin Dashboard">
  <meta name="description" content="admin Dashboard">


  <link rel="stylesheet" href="<?php echo $font_awesome; ?>" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="<?php echo $tailwind_css; ?>" rel=" stylesheet">
  <!--Replace with your tailwind.css once created-->
  <link href="<?php echo $emoji_css; ?>" rel="stylesheet">

  <!--Totally optional :) -->
  <script src="<?php echo $chart_js; ?>" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

</head>


<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

  <!--Nav-->
  <nav class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

    <?php
    require_once("./components/navbar.php");
    ?>

  </nav>


  <div class="flex flex-col md:flex-row">

    <div class="bg-gray-800 shadow-xl h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

      <?php
      require_once("./components/sidebar.php");
      ?>

    </div>

    <div class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">

      <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
          <h3 class="font-bold pl-2">Manage Agency</h3>
        </div>
      </div>

      <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
          <!--Metric Card-->
          <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                <div class="rounded-full p-5 bg-green-600"><i class="fa fa-plane-arrival fa-2x fa-inverse"></i></div>
              </div>
              <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-600">All visitor</h5>
                <h3 class="font-bold text-3xl"><?php echo $visitorCountAll; ?> <span class="text-green-500"><i class="fas fa-caret-up"></i></span></h3>
              </div>
            </div>
          </div>
          <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
          <!--Metric Card-->

          <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
              </div>
              <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                <h3 class="font-bold text-3xl">249 <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></h3>
              </div>
            </div>
          </div>

          <!--/Metric Card-->
        </div>

        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
          <!--Metric Card-->

          <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
              </div>
              <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-600">All Users</h5>
                <h3 class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></h3>
              </div>
            </div>
          </div>

          <!--/Metric Card-->
        </div>

        <?php
        $getAgency = $getAgency();
        ?>
        <div class="w-full  p-6">
          <!--Metric Card-->
          <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
              </div>
              <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold uppercase text-gray-600">Agency</h5>
                <h3 class="font-bold text-3xl">
                  <?php echo $getAgency["agency"]->num_rows; ?></h3>
              </div>
            </div>
          </div>
          <!--/Metric Card-->
        </div>


        <div class="flex flex-row flex-wrap flex-grow mt-2">



          <div class="w-full p-6">
            <!--Table Card-->

            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">Form Agency</h5>
              </div>
              <div class="p-5">

                <?php
                $agency_form = "components/agency_form.php";
                require_once($agency_form);
                ?>

              </div>
            </div>

            <!--/table Card-->

          </div>




          <div class="w-full  p-6">
            <!--Advert Card-->
            <div class="bg-white border-transparent rounded-lg shadow-xl">
              <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                <h5 class="font-bold uppercase text-gray-600">รายการ Agency</h5>
              </div>
              <div class="p-5 text-center">

                <table class="w-full p-5 text-gray-700">

                  <thead>
                    <tr>
                      <th class="text-left text-blue-900">Company บริษัท</th>
                      <th class="text-left text-blue-900">Agency ชื่อเอเจ้น</th>
                      <th class="text-left text-blue-900">Tel เบอร์โทร</th>
                      <th class="text-left text-blue-900">Date</th>
                      <th class="text-left text-blue-900">Manage</th>

                    </tr>
                  </thead>
                  <?php while ($row = $getAgency["agency"]->fetch_array()) : ?>


                    <tbody>
                      <tr>
                        <td class="text-left"><?php echo $row["agency_name"]; ?></td>
                        <td class="text-left"><?php echo $row["name"]; ?></td>
                        <td class="text-left"><?php echo $row["tel"]; ?></td>
                        <td class="text-left"><?php echo $row["created_at"]; ?></td>
                        <td class="text-left" width="20%"> 
                          <div class="flex justify-end">
                            <button class="ml-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline " onclick="getUrl('<?php echo "/booking/agency.php?edit_id=".$row["id"];?>')">
                              แก้ไข (<?php echo $row["name"];?>) 
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  <?php endwhile; ?>
                </table>


              </div>
            </div>
            <!--/Advert Card-->
          </div>


        </div>
      </div>
    </div>

  </div>






  <script src="/booking/components/topnav_script.js">
  </script>

    <script> 
    function getUrl(url){
      //alert(`url is ${url}`)
      location.href = url
    }
    </script>
</body>

</html>
