
<?php session_start();
require_once 'inc/layout.php';

function alertMassage(){
    if (isset( $_SESSION['status'])){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h6>'.$_SESSION['status'].'</h6>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        unset( $_SESSION['status']);

    }
}

?>

<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ADD Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" action="Controllers/categoryController.php" method="POST" >
                             <?php alertMassage();?>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="name" type="text" class="form-control" id="validationCustom01" placeholder="Enter a name product"  required >
                                                <div class="invalid-feedback">
                                                    Please enter a productName.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">status
                                                <span class="text-danger">*</span> (UnChecked=Visible , Checked =Hidden)
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="status" class="form-check-input" type="checkbox" value="" id="validationCustom12" >                                                <div class="invalid-feedback">
                                                    Please enter a 	status.
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                        <div class="mb-3 row">
                                            <div class="col-lg-8 ms-auto">
                                                <button name="saveCategory" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
