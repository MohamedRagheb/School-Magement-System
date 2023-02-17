
<?php
  session_start();
  if (!isset($_SESSION["username"])){
    header('Location:index.php');
  };
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="tools/css/all.min.css" rel="stylesheet" >
    <link href="tools/css/all.css" rel="stylesheet" >
    <link href="tools/css/bootstrap.min.css" rel="stylesheet" >
    <link href="tools/css/bootstrap.min.css.map" rel="stylesheet" >
    
    <title>School Mangement System</title>
    <style>
        /* nav{
          display: fixed;
          height:150px;
          width:100%;
          color:black;
        } */
        a{
           
             color: black;
              text-decoration: none;
        
        }
        .conti{
          padding:13px 20px 0px;
          width:75%;
          position: relative;
          left:12.5%;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid justify-content-center">
    <a class="navbar-brand"><b>Hi ,<?= $_SESSION['username']?></b></a>
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
     <a href="logout.php" style="color:white" class="btn btn-danger mx-3 ">Logout</a>
    </form>
  </div>
</nav>
<div class="conti" id="conti">
<div class="row" id="row">
 
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<script src="tools/js/all.min.js"></script>
<script src="tools/js/bootstrap.bundle.min.js"></script>
<script src="tools/js/bootstrap.bundle.min.js.map"></script>
<script>
  var mainDiv = document.getElementById("row");
  var pr = '<?php echo $_SESSION['pr']?>';
  var t_id = '<?php echo $_SESSION['teacherid']?>';
  console.log(pr);
    const pageContent = [
        {name:`Student Grades`,Content:`Know Your Students Grades Through Semester`,summery:`Grades`,herf:`stdgrades.php?id=${t_id}`},
        {name:`Your Time Table `,Content:`Know Your Time and Next Class`,summery:`Table`,herf:`timeTable.php?id=${t_id}`},
        {name:`Add New  Course `,Content:`Add New Course`,summery:`Mange Courses`,herf:`courseMange.php?id=${t_id}`},
        {name:`Edit Your Info `,Content:`Edit Your Information`,summery:`Info`,herf:`info.php?id=${t_id}`},
    ];
if(pr > 2 && pr < 5){
    pageContent.push({name:`Teachers control`,Content:`Show  Teachers `,summery:`Show`,herf:`.php?id=${t_id}`});
}
  
    for(let i=0;i<pageContent.length;i++){
        mainDiv.innerHTML +=
        `
          <div class="col-sm-6">
          <div class="card mb-3 mt-3">
            <div class="card-body">
              <h5 class="card-title">${pageContent[i].name}</h5>
              <p class="card-text">${pageContent[i].Content}.</p>
              <a href="${pageContent[i].herf}" class="btn btn-primary">${pageContent[i].summery}</a>

            </div>
          </div>
        </div>
          `        
      }

</script>
</body>
</html>