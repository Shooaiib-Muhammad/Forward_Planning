
      <?php
      $this->load->view('header');
    ?>
    <script>

 function loadDate(TID,RDate){
   //alert("Called")
   split_date = RDate.split("/");
   //2020-09-28
   let date_make = split_date[2] + "-" + split_date[1] + "-" +split_date[0];
   //alert(date_make);
var Type = TID
  var date1 = date_make
    var date2 =date_make
  //alert(date1);
            url = "<?php echo base_url("index.php/kitsReceived/getData/") ?>" + date1 + "/" + date2 + "/" + Type
//alert(url);
 $.get(url, function(data) {
 alert("Selected Kits is Isseud Successfully")
     $("#Data").html(data)
 });
        }

  $(".updatebtn").click(function(e) {
     let id= this.id;
     let split_value = id.split(".");
 
     var RIDValue = $(`#RID${split_value[1]}`).val()
     var RStatus = $(`#customSwitch${split_value[1]}`).val()
     var IssueDte = $(`#iDate${split_value[1]}`).val()
    var RDate = $(`#RDate${split_value[1]}`).val()
      var TID = $(`#TID${split_value[1]}`).val()
      //alert(RDate)
     
console.log("RIDValue",RIDValue)
console.log("RStatus",RStatus)
console.log("IssueDte",IssueDte)
 url = "<?php echo base_url('index.php/kitsReceived/updateRecord/') ?>"+ RIDValue + "/" + RStatus + "/" + IssueDte
  
// alert(url);
   $.get(url, function(data){
            
             loadDate(TID,RDate)
            })

     });
   
     </script>
    <div class="table-responsive-lg" id="Data">
        <table class="table table-striped table-hover table-sm" id="tableExport">
                                                        <thead style="background-color:black; color:white;">
                                                           
                                                                <th>MP No</th>
                                                                <th>Line Name</th>
                                                                  <th>Plane Date</th>
                                                                <th>Quantity</th>
                                                                <th>Status</th> 
                                                               </thead>
                                                       <tbody >
                                                        <?php
foreach ($getMPData as $keys){
//  $Status=$keys['IssueStatus'];
//  $RecID=$keys['RecID'];
 ?> 

 <tr>    
   
                                                            <td><?php Echo $keys['MPID'];?> </td>
                                                                <td><?php Echo $keys['LineName'];?> </td>
                                                                    <td><?php Echo $keys['PlanDate'];?> </td>
                                                                        <td><?php Echo $keys['Qty'];?> </td>
                                                                        <td><button class="btn btn-primary btn-sm">undo </button></td>
                                                             
                                                               
                                                                                              
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


                                   
                                