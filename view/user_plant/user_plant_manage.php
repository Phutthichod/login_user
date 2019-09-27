
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="grid_item.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>Stellar Admin</title>
  <style>
    .card{
      cursor:pointer;
    } 
    h3{
        margin-left:10px;
    }
    .modal .modal-dialog .modal-content .modal-header {
        padding: 20px 26px;
    }
   
  </style>
  <!-- header -->
  <?php require('../public/header.php'); ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require('../public/navbar.php') ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require('../public/sidebar.php') ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="grid_item">

            <!-- <div class="card">
              <div class="card-body goto_plant">
                <div class="grid_card-body_item">
                  <div class="content">
                    <font class="text2" color="#FFD700">xxxxx</font>
                    <div class="text">ttttt</div>
                  </div>
                  <img src="./tomato/banana2.png">
                </div>
              </div>
            </div> -->

          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php require('../public/footer.php') ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog"  >
    <div class="modal-dialog" >
    
      <!-- Modal content *** style="background-color: #181824" -->
      <div class="modal-content"  >
        <div class="modal-header">
          <h3 class="modal-title">Option</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">

            <div class="card link"  link="character"style="width:445px" >
              <div class="card-body" >
                <div class="preview"> 
                <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                    <i class="icon-drop"  style="color:blue; "></i></button>
                    <!-- <p>123</p> -->
                <i href="http://localhost/user_plant/upload"  ></i>PHYNOTYPE</div>
              </div>
            </div>
            <br>
        

            <div class="card link" link="genome" style="width:445px">
              <div class="card-body">
                <div class="preview"> 
                <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon" >
                    <i class="icon-hourglass" style="color:green;"></i></button>
                <i href="http://localhost/user_plant/upload" ></i> GENOME</div>
              </div>
            </div>
            <br>
           

            <div class="card link"  link="location"style="width:445px">
              <div class="card-body">
                <div class="preview"> 
                <button type="button" class="btn btn-outline-secondary btn-rounded btn-icon">
                    <i class="icon-location-pin"  style="color:red;"></i></button>
                <i href="http://localhost/user_plant/upload"  type="text"value="  "></i>LOCATION</div>
              </div>
            </div>

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->
      </div>
    </div>
  </div>


  <script>
    loaddata();

    function loaddata() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          data = JSON.parse(this.responseText);
          let text = ""
          for (i in data) {
            text += ` <div class="card">
              <img data-toggle="modal" data-target="#myModal"  src="./tomato/${data[i].p_icon}">
              <div class="text-bottommiddle">${data[i].p_alias}</div>
            </div> `
          }
          $(".grid_item").append(text);
        }
      };
      xhttp.open("POST", "data.php", true);
      xhttp.send();
    }
  </script>

  <script>
    $(document).on({
      mouseenter: function() {
        //stuff to do on mouse enter
        $(this).addClass("shadow-image");
      },
      mouseleave: function() {
        //stuff to do on mouse leave
        $(this).removeClass("shadow-image");
      }
    }, "img");
    // $(document).onClick({
    //   $('#myModal').modal('show');
    // })
    
   
    $('.link').click(function(){
      let link = $(this).attr('link');
      console.log(link)
      sessionStorage.setItem("upload",link);
     console.log(sessionStorage.getItem('upload'));
      window.location.href='http://localhost/user_plant/upload';
     
    })

  </script>

</body>

</html>