
<div >
  <h3>Available Sizes</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Size</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from sizes";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["size_name"]?></td>   
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-danger" style="height:40px" onclick="sizeDelete('<?=$row['size_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px; background-color:#23806E" data-toggle="modal" data-target="#myModal">
    Add Size
  </button>
  <button type="button" class="btn btn-secondary" name="product_xml.php"  style="height:40px; width: 100px;  background-color: #207E6C;">  <a style="text-decoration: none ; color: #FFFFFF" href="size_xml.php">XML</a></button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Size Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="size">Size Number:</label>
              <input type="text" class="form-control" id = "c_size" required>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="addSize()" style="height:60px; width: 140px;;  background-color: #E87C8C;;;  background-color: #E87C8C;">Add Size</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px; color:#fff;background-color:#63A14D">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   