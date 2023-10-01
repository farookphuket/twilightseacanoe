<?php
include_once("./auth_user.php");
include_once("../api/user.php");


// load the env for this file
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
  <title>Manage User</title>
  <meta name="title" content="manage user">
  <meta name="description" content="manage user">

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
          <h3 class="font-bold pl-2">Manage user</h3>
        </div>
      </div>

      <div class="flex flex-row flex-wrap flex-grow mt-2">


        <!--<div class="w-full md:w-1/2 xl:w-1/3 p-6"> -->
        <div class="w-full  p-6">
          <!--Graph Card-->
          <?php
          $roles = $getRoles();
          ?>

          <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
              <h5 class="font-bold uppercase text-gray-600">Form</h5>
            </div>
            <div class="p-5">
              <div class="w-full ">

                <form action="./_addUser.php" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                  <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Name</label>
                    <input id="" type="text" name="name" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  </div>

                  <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Email</label>
                    <input id="" type="email" name="email" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  </div>
                  <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Password</label>
                    <input id="" type="password" name="password" class="w-full appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                  </div>
                  <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Role</label>
                    <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                      <option selected>Choose a role</option>
                      <?php
                      while ($row = $roles->fetch_array()) :
                      ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["role_name"]; ?></option>
                      <?php
                      endwhile;
                      ?>
                    </select>

                  </div>
                  <div class=" mt-4 ">

                    <div class=" flex items-center justify-between">
                      <span>&nbsp;</span>
                      <div>

                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                          Cancel
                        </button>
                        <button class="ml-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                          Create User
                        </button>
                      </div>


                    </div>
                  </div>


                </form>
              </div>

            </div>
          </div>

          <!--/Graph Card-->
        </div>


        <!--<div class="w-full md:w-1/2 xl:w-1/3 p-6"> -->
        <div class="w-full  p-6">
          <!--Table Card-->

          <div class="bg-white border-transparent rounded-lg shadow-xl">
            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
              <h5 class="font-bold uppercase text-gray-600">User List</h5>
            </div>
            <div class="p-5">
              <table class="w-full p-5 text-gray-700">
                <thead>
                  <tr>
                    <th class="text-left text-blue-900">Name</th>
                    <th class="text-left text-blue-900">Role</th>
                    <th class="text-left text-blue-900">email</th>
                  </tr>
                </thead>

                <tbody>

                  <?php
                  $xU = $getUserAll();
                  while ($row = $xU->fetch_array()) :
                  ?>

                    <tr>
                      <td>
                        <?php echo $row["name"]; ?>
                      </td>
                      <td>
                        <?php echo $row["role_name"]; ?>
                      </td>
                      <td>
                        <?php echo $row["email"]; ?>
                      </td>
                    </tr>
                  <?php
                  endwhile;

                  ?>
                </tbody>
              </table>

              <p class="py-2"><a href="#">See More issues...</a></p>

            </div>
          </div>

          <!--/table Card-->

        </div>
      </div>




    </div>

  </div>





  <?php
  $nav_script = "/booking/components/topnav_script.js";
  //require_once($js_script);
  ?>
  <script src="<?php echo $nav_script; ?>"></script>


</body>

</html>
