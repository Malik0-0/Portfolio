<?php
include('Config.php');
if (isset($_POST['order'])) :
  $email = $_POST['email'];
  $username = $_POST['username'];
  $kontak = $_POST['kontak'];
  $service = $_POST['service'];
  $query = "INSERT INTO service_order VALUES ('$email', '$username', '$kontak', '$service','Menunggu','')";
  mysqli_query($conn, $query);
  header("Location: Details.php");
endif
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Order</title>
  <link rel="stylesheet" href="./assets/css/Form CSS.css">
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>

<body>

  <form action="" method="post">

    <h1>Service Order</h1>

    <fieldset>
      <legend><span class="number">1</span>Biodata</legend>

      <label for="mail">Email:</label>
      <input type="email" id="email" name="email" value="<?= $_SESSION['email'] ?>" readonly>

      <label for="name">Nama:</label>
      <input type="text" id="username" name="username" value="<?= $_SESSION['username'] ?>" readonly>

      <label for="pekerjaan">Kontak:</label>
      <input type="text" id="kontak" name="kontak">

      <legend><span class="number">2</span>Needs</legend>
      <label for="service">Service Detail:</label>
      <select id="service" name="service">
        <optgroup label="Desain UI/UX">
          <option value="UI_Mobile App_Design">UI Design for Mobile App</option>
          <option value="UI_Website_Design">UI Design for Website</option>
          <option value="Fullstack_UI_Design">Fullstack UI Design</option>
          <option value="UX_Mobile App_Research">UI Research for Mobile App</option>
          <option value="UX_Website_Research">UI Research for Website</option>
          <option value="Fullstack_UX_Research">Fullstack UX Research</option>
          <option value="Fullstack_UI/UX_Design">Fullstack UI/UX Design</option>
        </optgroup>
        <optgroup label="Desain Grafis">
          <option value="Desain_Poster">Desain Poster</option>
          <option value="Desain_Logo">Desain Logo</option>
          <option value="Desain_Banner">Desain Banner</option>
          <option value="Desain_Sosial_Media">Desain Sosial Media</option>
        </optgroup>
      </select>
    </fieldset>
    <button type="submit" name="order">Order</button>
  </form>
</body>