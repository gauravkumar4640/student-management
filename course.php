<?php 
include('partialsuser/menu.php');
?>

    <h2>Educational General Information</h2>
    <br>
    <a href="add_course.php" target="main" class="btn-primary">Add Educational General Information</a><br><br>

    
       
<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']); 
}
 
if(isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']); 
}
 
?>


    <form action="" metho="POST">
    <table class="table table-success table-striped" style="width: 50rem; " >

    <thead>
    <td>S.No.</td>
    <td>Name</td>
    <td>Enrollment Number</td>
    <td>Degree</td>
    <td>Institute</td>
    <td>Branch</td>
    <td>Completion Year</td>
    <td>Update</td>
    
  </thead>


  
  <?php
$sql="SELECT * FROM course_details";
$res=mysqli_query($conn,$sql);

if($res==true){
    $count=mysqli_num_rows($res);
    $sn=1;
    if($count>0){
        while($row=mysqli_fetch_assoc($res)){
            $id=$row['id'];
            $name=$row['name'];
            $enrollment_no=$row['enrollment_no'];
            $degree=$row['degree'];
            $institute=$row['institute'];
            $branch=$row['branch'];
            $completion_year=$row['completion_year'];
          
            

            ?>
              <tr>
  <tbody>
    <tr>
    <td><?php echo $sn++;?> </td>
<td><?php echo $name;?></td>
<td><?php echo $enrollment_no;?></td>
<td><?php echo $degree;?> </td>
<td><?php echo $institute; ?></td>
<td><?php echo $branch;?></td>
<td><?php echo $completion_year;?> </td>

   



<td>

<a href="<?php echo SITEURL;?>update_course.php?id=<?php echo $id; ?>" target="main"  class="btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Update&nbsp;</a> 
</td>
</tr>
</tbody>
            
            <?php
         
        }
    }
}
?>

        
</table>
</form>
</body>
</html>