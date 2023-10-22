
<?php
require_once 'inc/layout.php';

require 'fun/function.php';
?>

<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" action="Controllers/categoryController.php" method="POST" >
                             <?php alertMassage();
                             $parmValue =checkParamId('id');
                             if (!is_numeric($parmValue)){
                                 echo '<h5>'.$parmValue. '</h5>';
                                 return false;
                             }
                             $category =getById('categories',$parmValue);
                             if ($category['status']==200)
                             {

                             ?>
                                 <input value="<?= $category['data']['id'];?>" name="categoryId" type="text">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="validationCustom01">name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input name="name" type="text" value="<?= $category['data']['name']; ?>" class="form-control" id="validationCustom01" placeholder="Enter a name product"  >
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
                                                <input name="status" class="form-check-input" type="checkbox"value="<?= $category['data']['status'] == true ? 'checked':''; ?> id="validationCustom12" >                                                <div class="invalid-feedback">
                                                    Please enter a 	status.
                                                </div>
                                            </div>
                                        </div>

                                    </div>




                                        <div class="mb-3 row">
                                            <div class="col-lg-8 ms-auto">
                                                <button name="update Category" type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                               } else{
                                 echo '<h5>'.$category['message']. '</h5>';
                                }
                             ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
