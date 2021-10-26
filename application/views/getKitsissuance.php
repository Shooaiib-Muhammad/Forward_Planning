
      <?php
      $this->load->view('header');
    ?>
   <script>



 $(".deletebtn").click(function(e) {
        let id= this.id;
     let split_value = id.split(".");
     var RID =split_value[1];
     var Datee =$(`#Datee${split_value[1]}`).val();
     let text;
     let person = prompt("Are Your Want to Delete Printed", "");
  if (person == null) {
    text = "User cancelled the prompt.";
  } else {
    text = "Deleted Successfully";
      url = "<?php echo base_url('index.php/Kitsissuance/Delete/') ?>"+ RID
  
   $.get(url, function(data){
     alert(" Printed Delete Successfully");
    location.reload();
             
            });
  }
    document.getElementById("demo").innerHTML = text;
       });
  $(".updatebtn").click(function(e) {
       //alert("heloo");
     let id= this.id;
    //alert(id);
     let split_value = id.split(".");
     //console.log(split_value);
     var RID =split_value[1];
     //alert(`#issueDate.${split_value[1]}`);
      //alert(split_value[1]);
//   let RID =split_value[1]);
     var iDate = $(`#issueDate${split_value[1]}`).val();
      var Receivedby =$(`#Receivedby${split_value[1]}`).val();
      var Datee =$(`#Datee${split_value[1]}`).val();
      //let split_Datee = Datee.split("/");
 
      //text = Receivedby.replace("%20", "");
    //   $(`select#Receivedby.${split_value[1]} option`).filter(":selected").val();
      //console.log(Receivedby);
    //   alert(id);
      //alert(iDate);
      // alert(Receivedby);

// console.log("RIDValue",RIDValue)
// console.log("RStatus",RStatus)
// console.log("IssueDte",IssueDte)
 url = "<?php echo base_url('index.php/Kitsissuance/updateRecord/') ?>"+ Receivedby + "/" + iDate + "/" + RID
  
//alert(url);
   $.get(url, function(data){
            alert("PO Issed Done Successfully");
             loadData(Datee);
            });

            function loadData(Datee){
          //alert('Heloo');
           split_date = Datee.split("/");
   //2020-09-28
   let date_make = split_date[2] + "-" + split_date[1] + "-" +split_date[0];
          var date1 =  date_make
    var date2 = date_make
            url = "<?php echo base_url("index.php/Kitsissuance/getkitsissuance/") ?>" + date1 + "/" + date2 
           //alert(url);
 $.get(url, function(data) {
     $("#Data").html(data)
 });
      }
     });
   
     </script>
    <div class="table-responsive-lg" id="Data">
     <p id="demo" ></p>
      
        <table class="table table-striped table-hover table-sm" id="tableExport">
                                                        <thead>
                                                            <tr>
                                                               <th>PO Code</th>
                                                                <th>Kit Name</th>
                                                                <th>Quantity</th>
                                                                <th>Print Date</th>
                                                                 <th>Westage</th>
                                                                  <th>Printed By</th>
                                                                  <th>Print Status</th>
                                                                
                                                                    <th>Issue Date</th>
                                                                     <th>Issued To</th>
                                                                      <th>Action</th>
                                                                      <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                       <tbody >
                                                        <?php
foreach ($getkitsissuance as $keys){
 $POCode=$keys['POCode'];
 $SerialNo=$keys['SerialNo'];
  $KitQty=$keys['KitQty'];
   $IssuanceDate=$keys['IssuanceDate'];
    $Wastage=$keys['Wastage'];
     $Type=$keys['Type'];
      $Issuedby=$keys['Issuedby'];
       $Receivedby=$keys['Receivedby'];
       $IssueDate=$keys['IssueDate'];
    $TID=$keys['TID'];

 ?> 

 <tr>   
  <td><?php Echo $POCode;?></td>
  <td><?php Echo $SerialNo;?></td>
  <td><?php Echo $KitQty;?></td>
  <td><?php Echo $IssuanceDate;?></td>
  <td><?php Echo $Wastage;?></td> 
  <td><?php Echo $Issuedby;?></td> 
   <td>
   
                                                     
   <?php
   if($Type=='normal'){
    ?>
   <button type="button" class="btn btn-xs btn-outline-success">Normal</button>
    <?php
   }else{
    ?>
 <button type="button" class="btn btn-xs btn-outline-info">Reprint</button>
    <?php
   }
   ?>
  
 
 </td> 

   <td>
       
     <?php
   if(!Empty($IssueDate)){
?><?php Echo $IssueDate;?>
<?php
    
   }else{
           $Month=date('m');
$Year=date('Y');
$Day=date('d');
$CurrentDate=$Year.'-'.$Month.'-'.$Day;
    ?>
     <input type="Date" value="<?php echo $CurrentDate;?>"class="form-control"  id="issueDate<?php echo $TID;?>" >
    <?php
    
   }
   ?>
   
<input type="text" class="form-control" value="<?php echo $IssuanceDate;?>" id="Datee<?php echo $TID;?>" hidden></td> 
    <td>
        <?php
   if(!Empty($Receivedby)){
?><?php Echo $Receivedby;?>
<?php
    
   }else{
    ?>
                            <select class="form-control kitsSelectbox" name="duration" id="Receivedby<?php echo $TID;?>">
                                
                             <option value="658 Ashfaq Ahmed">658 / Ashfaq Ahmed</option>
                             <option value="4636 Asad Ali">4636 / Asad Ali</option>
                             <option value="1611 Abid Ali">1611 / Abid Ali</option>
                                 <option value="211 Rizwan Akbar">211 / Rizwan Akbar</option>
                            </select>
                            <?php
                            }
                            ?>
                        </td> 
                        <td>
                            <?php
                            if(!Empty($IssueDate)){
?>
 <button class="btn btn-success btn-xs updatebtn" id="btn.<?php echo $TID;?>" disabled >issued</button>
<?php
                            }else{
                                ?>
                                <button class="btn btn-warning btn-xs updatebtn" id="btn.<?php echo $TID;?>" >issued</button>
                                <?php
                            }
?>
                        </td>
                        <td> 
                             <?php
                            if(!Empty($IssueDate)){
?>  
                        <button class="btn btn-primary btn-xs" >Saved</button>
                      
                         <?php
                            }else{
                              ?>
                               <button class="btn btn-danger btn-xs deletebtn" id="btn.<?php echo $TID;?>" >Delete</button>
                              <?php
                            }
                        ?>
                        </td>
                     
 
</tr>
                                                                                    
 <?php
}
?>
                                    </tbody>
                                    
                                </table>
                            </div>
                                                                        
                                  <?php
        $this->load->view('Foter');
       ?>                      


                                   
                                