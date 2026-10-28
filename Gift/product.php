<?php
include("header.php"); 
include("connect.php");
?>




<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h2>PRODUCTS</h2>
         </div> 
    </div> 
    <div class="row mt-5">
        <div class="col-md-3">
            <h2>CATEGORY</h2>
            <ul>
                <?php 
                $res1=mysqli_query($con,"select * from product_category");
                while($r1=mysqli_fetch_array($res1))
                {
                    ?>
                    <li><h3><a href="product.php?cid=<?php echo $r1[0]; ?>"><?php echo $r1[1];?></a></h3></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">
                <?php
                    if(isset($_REQUEST['cid']))
                    {
                        $cid=$_REQUEST['cid'];
                        $query = "select * from product_detail where category_id='$cid'";
                    }
                    else
                    {
                        $query = "select * from product_detail";
                    }
                    
                    $res2= mysqli_query($con,$query);
                    if(mysqli_num_rows($res2)>0)
                    {
                        while($r2=mysqli_fetch_array($res2))
                        {
                            ?>
                            <div class="col-md-6 mt-3">
                                <div class="card" style="width: 100%;">
                                    <img class="card-img-top" src="<?php echo $r2[5]; ?>" style="width:400px; height:400px;" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $r2[1]; ?></h5>
                                        <p class="card-text">Price.: &#8377; <?php echo $r2[4]; ?> /-</p>
                                        <a href="product_detail.php?pid=<?php echo $r2[0];?>" class="btn btn-primary" style="background-color: #18ffff;">ADD TO CART</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } 
                    else
                    {
                        echo "<h2>No Fruit Detail Found<h2>";
                    }
                ?>
            </div>
         </div> 
    </div> 
</div>



<?php
include("footer.php"); 
?>