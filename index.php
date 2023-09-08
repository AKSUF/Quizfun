<?php
session_start(); // Start the session

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['userId']) || !isset($_SESSION['user_role'])) {
    header("Location: http://localhost/Quiz/openpage.php?login"); // Replace with your login page URL
    exit(); 
    
    // Terminate script
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Css/home.css">
    <link rel="stylesheet" href="./Css/Features.css">
    <link rel="stylesheet" href="./Css/MCQ.css">
</head>
<style>
.login{
border: 6px;
border-color: red;
}

.circle-btn {
    border-radius: 100%;
    width: 60px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    border: none;
    cursor: pointer;
}
</style>
<body>

    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-custom"  style="border-bottom: 2px solid #A8171A;padding: 5px;background-color: #FFFFFF;">
  <div class="container-fluid">
    
   <img src="./image/DemoCreatorSnap_2023-09-03 23-32-41.png" alt="ggfhgf" style="height: 20%;width: 15%;">
   <a class="nav-link" href="index.php?home" style="color: #A8171A;"></a>
</img>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="index.php?home" style="color: #A8171A;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?features" style="color: #A8171A;">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?howworks" style="color: #A8171A;">How it works?</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?login" style="color: #A8171A;">SignIn</a>
        </li>


    
      </ul>
      
      <input type="text" id="search-input" placeholder="Search keyword..." class="">
      <button class="btn ml-6 shadow" id="search-btn">Search</button>

      <div class="user-info">
    <div class="dropdown">
        <button class="dropdown-toggle circle-btn" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span id="userName"></span>
        </button>
        <div class="dropdown-menu" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="index.php?login" id="logoutButton">Logout</a>
            <a class="dropdown-item" href="index.php?login">Login</a>
            <a class="dropdown-item profile" data-userid="<?php echo $userId; ?>">Profile</a>
        </div>
    </div>
</div>


    </div>
  </div>
</nav>


<div id="error-message" class="m-auto alert alert-danger d-none" role="alert">
</div>

<div id="success-message" class="m-auto alert alert-success d-none" role="alert">
</div>

<?php
include('./Common/Connection.php')

?>

<?php
if(isset($_GET['home'])){
    include('./Home.php');
}
if(isset($_GET['features'])){
    include('./Features.php');
}
if(isset($_GET['howworks'])){
    include('./Works.php');
}
if(isset($_GET['login'])){
  include('./Login.php');
}
if(isset($_GET['register'])){
  include('./Registration.php');
}

if(isset($_GET['aboutus'])){
    include('./AboutUs.php');
}
if(isset($_GET['adminpanel'])){
  include('./Authorizer/AdminPanel.php');
}

if(isset($_GET['mcq'])){
  include('./MCQ.php');
}


?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-tip/0.9.1/d3-tip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3-legend/2.25.6/d3-legend.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="./Js/index.js"></script>
    <script src="./Js/fetchfile.js"></script>
    <script src="./Js/mcqfile.js"></script>
    <script src="./Js/register.js"></script>
    <script src="./Js/calculationmarks.js"></script>

    <script src="./Js/authenticate.js"></script>

</body>
</html>