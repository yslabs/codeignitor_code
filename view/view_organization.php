<!--Page Wrapper-->
<div id="page-wrapper">
    
    <!--Bread-Crumb Section-->
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/admin/dashboard">Home</a></li>
        <li class="active">View Organization</li>
    </ol>
    
    <!--Main Panel To View Organization Details -->
    <div class="panel panel-default">
        
            <!--Panel Heading Section-->
            <div class="row panel-heading">
                <!--Title-->
                <div class="col-md-6" >
                    Organizations List
                </div>
                
                <div class="col-md-3">
                </div>
                
                <!--Search Tool-bar-->
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_org"  placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
                
            </div> 
            <!--End of Panel Heading Section-->
        
            <!--Tabular View of Data-->
            <table class="table">
                
                <!--Table Header-->
                <thead>
                    <tr>
                        <th><input type="checkbox" value=""></th>
                        <th>#</th>
                        <th>Name of Organization</th>
                        <th>Owner</th>
                        <th>Phone Number</th>
                        <th>Fax Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <!--End of Table Header-->
                
                <!--Table Body-->
                <tbody>
                    <?php if($org_list){foreach($org_list as $row ) { ?>
                    <tr>
                        <th><input type="checkbox" value=""></th>
                        <th scope="row"><?php echo $row['id'];?></th>
                        <td><?php echo $row['org_name'];?></td>
                        <td><?php echo $row['primary_email'];?></td>
                        <td><?php echo $row['org_phone'];?></td>
                        <td><?php echo $row['fax_number'];?></td>
                        <td>
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Actions</a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a tabindex="-1" href="#">View Details</a></li>
                                    <li><a tabindex="-1" href="#">Block</a></li>
                                    <li><a tabindex="-1" href="#">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php }} ?>
                </tbody>
                <!--End of Table Body-->
                
            </table>
            <!--End of Table-->
            
            <!--Pagination Section-->
            <center>
                <ul class="pagination">
                    <?php foreach ($links as $link) { echo "<li>". $link."</li>"; } ?>
                </ul>
            </center>
            <!--End of Pagination Section-->
            
        </div>
        <!--End of Main Panel-->
</div>
<!--End of Page Wrapper-->

<!--End of Document-->