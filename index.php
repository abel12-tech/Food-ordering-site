<!DOCTYPE html>
<html>
<?php include ('db_connection/db_connection.php'); 


$sql = "SELECT * FROM foods ORDER BY id DESC ";
$result = mysqli_query($connect,  $sql);
$foods = mysqli_fetch_all($result, MYSQLI_ASSOC)


?>

<?php include ('templates/header.php') ?>
<?php include('templates/hero.php') ?>

    <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      

      <div class="filters-content">
        <div class="row grid">

        <?php foreach($foods as $food){ ?>

          <div class="col-sm-6 col-lg-4 all pizza">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="uploads/<?=$food['image_url']?>" alt="Food image">
                </div>
                <div class="detail-box">
                  <h5>
                  <?php echo htmlspecialchars($food['name']); ?>
                  </h5>
                  <p>
                  <?php echo htmlspecialchars($food['description']); ?>
                  </p>
                  <div class="options">
                    <h6>
                    <?php echo htmlspecialchars($food['price']); ?> Birr
                    </h6>
                  
                      <a href="#"
                         data-food_id = "<?php echo htmlspecialchars($food['id']);  ?>"
                      data-name="<?php echo htmlspecialchars($food['name']); ?>" 
                      data-price="<?php echo htmlspecialchars($food['price']); ?>" 
                      class="add-to-cart btn btn-primary"> <i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                  
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>


        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View More
        </a>
      </div>
    </div>
   </section>



   
   <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="show-cart table">
            
          </table>
          <div>Total price:<span class=" ml-1 mr-1 total-cart"></span> <em>Birr</em></div>
        </div>
       
        <div class="modal-footer">
          <button class="clear-cart btn btn-danger">Clear Cart</button>
          <a href="order.php"> <button type="button" class="btn btn-primary" >Order now</button></a>
         
        </div>
      </div>
    </div>
   </div> 
  

<?php include ('templates/footer.php') ?>


</html>