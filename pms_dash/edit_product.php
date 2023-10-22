
<?php
require_once 'inc/layout.php';
require 'fun/function.php';

//function alertMassage(){
//    if (isset( $_SESSION['status'])){
//        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
//            <h6>'.$_SESSION['status'].'</h6>
//  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//</div>';
//        unset( $_SESSION['status']);
//
//    }
//}

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
                            <form class="needs-validation" action="" method="POST" >
                                <?php
                                $paramValue =checkParamId('id');
                                if (!is_numeric($paramValue)){
                                    echo '<h5>'.$paramValue. '</h5>';
                                    return false;
                                }
                                $product =getById('categories',$paramValue);
                                if ($product){
                                    if ($product['status']==200)
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
                                                    <input name="name" type="text" value="<?= $product['data']['name']; ?>" class="form-control" id="validationCustom01" placeholder="Enter a name product"  >
                                                    <div class="invalid-feedback">
                                                        Please enter a productName.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">image
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">

                                                    <input name="image" type="file" class="form-control" id="validationCustom01" placeholder="Enter a name 	image" required="">
                                                    <img src="<?=$product['data']['image']; ?>" alt="img">
                                                    <div class="invalid-feedback">
                                                        Please enter a 	image.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">stock
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="stock" type="text"  value="<?=$product['data']['stock']; ?>" class="form-control" id="validationCustom01" placeholder="stock" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter a stock.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom01">status
                                                    <span class="text-danger">*</span> (UnChecked=Visible , Checked =Hidden)
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="status" class="form-check-input" type="checkbox"value="<?= $product['data']['status'] == true ? 'checked':''; ?> id="validationCustom12" >                                                <div class="invalid-feedback">
                                                        Please enter a 	status.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom04">description <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">

                                                    <textarea name="description" <?=$product['data']['description']; ?>  class="form-control h-50" id="validationCustom04" rows="5" placeholder="What would you like to see?" required=""></textarea>
                                                    <div class="invalid-feedback">
                                                        Please enter a description.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom05"> category
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="category_id"   value="<?=$product['data']['category_id']; ?>"   class="form-control"" type="text" value="" id="validationCustom12" >

                                                    <!--                                                <select name="category_id" class="default-select wide form-control" id="validationCustom05">-->
                                                    <!--                                                    <option value=""> select Category</option>-->
                                                    <!--                                                    --><?php
                                                    //                                                    $categories = getAll('categories');
                                                    //                                                    if ($categories){
                                                    //                                                        if (mysqli_num_rows($categories)> 0){
                                                    //                                                            foreach ($categories as $category){
                                                    //                                                                echo '<option value="'.$category['id'].'">'.$category['']. '</option>';
                                                    //
                                                    //                                                            }
                                                    //
                                                    //
                                                    //                                                        }else{
                                                    //                                                            echo '<option value="">No categories found</option> ';
                                                    //                                                        }
                                                    //                                                    }else{
                                                    //                                                        echo '<option value="">Not found</option> ';
                                                    //
                                                    //                                                    }
                                                    //
                                                    //                                                    ?>
                                                    <!---->
                                                    <!--                                                </select>-->

                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom06">price
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="price" type="text"  value="<?=$product['data']['price']; ?>" class="form-control" id="validationCustom06" placeholder="$21.60" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter a price.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom07">discount
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="discount" type="text"   value="<?=$product['data']['discount']; ?>" class="form-control" id="validationCustom07" placeholder="discount   " required="">
                                                    <div class="invalid-feedback">
                                                        Please enter a discount.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="validationCustom09">price after discount <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input name="price_after_discount"  value="<?=$product['data']['price_after_discount']; ?>" type="text" class="form-control" id="validationCustom09" placeholder="price after discount" required="">
                                                    <div class="invalid-feedback">
                                                        Please enter a price after discount
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="col-lg-8 ms-auto">
                                                    <button type="submit" name="save_product" class="btn btn-primary">Submit</button>
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
                                    echo '<h5>'.$product['message']. '</h5>';
                                }
                                }else{
                                    echo '<h5>something went wrong</h5>';
                                    return false;
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
