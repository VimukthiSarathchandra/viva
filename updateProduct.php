<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product | New Tech</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/New Tech-1.png" />

</head>

<body class="home">

    <div class="container-fluid">
        <div class="row gy-3">

            <?php
            require "connection.php";
            include "header.php";
            ?>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12">
                <label class="form-label fs-1 fw-bolder mt-3 offset-1">Update Product</label>
            </div>

            <div class="col-12 pt-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb offset-1">
                        <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Product</li>
                    </ol>
                </nav>
            </div>


            <div class="col-12 col-lg-10">
                <div class="offset-lg-2">

                    <div class="row">


                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 col-lg-4 card">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <select class="form-select border-0 text-center" disabled>
                                                <option value="0">Select Category</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 card">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center border-0" disabled>
                                                <option value="0">Select Brand</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 card">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                        </div>

                                        <div class="col-12">
                                            <select class="form-select text-center border-0" disabled>
                                                <option value="0">Select Model</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12 card mt-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold card-body" style="font-size: 20px;">
                                                Add a Title to your Product
                                            </label>
                                        </div>
                                        <div class="offset-0 offset-lg-2 mb-3 col-12 col-lg-8">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-4 card mt-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-check form-check-inline mx-5">
                                                        <input class="form-check-input" type="radio" name="c" checked disabled />
                                                        <label class="form-check-label fw-bold">Brand New</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="c" disabled />
                                                        <label class="form-check-label fw-bold">Used</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 card mt-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                                </div>
                                                <div class="col-12">

                                                    <select class="form-select ">
                                                        <option value="0">Select Colour</option>



                                                    </select>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-group mt-2 mb-2">
                                                        <input type="text" class="form-control" placeholder="Add new Colour" />
                                                        <button class="btn btn-outline-primary" type="button">+ Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 card mt-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="number" class="form-control" value="0" min="0" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 card mt-1">
                                    <div class="row">

                                        <div class="col-6 border-end border-success">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                </div>
                                                <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                    <div class="input-group mb-2 mt-2">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" />
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6  mt-1">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-2 pm pm1"></div>
                                                        <div class="col-2 pm pm2"></div>
                                                        <div class="col-2 pm pm3"></div>
                                                        <div class="col-2 pm pm4"></div>
                                                        <div class="col-2 pm pm6"></div>
                                                        <div class="col-2 pm pm5"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-12 card mt-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                        </div>
                                        <div class="col-12 offset-lg-2 col-lg-8">
                                            <div class="input-group mb-2 mt-2">
                                                <span class="input-group-text">Rs.</span>
                                                <input type="text" class="form-control" value="250" disabled />
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>



                                <div class="col-12 card mt-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea cols="30" rows="15" class="form-control border-0"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6">
                                            <div class="row">
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/product_images/add-icon.png" class="img-fluid" style="height: 200px;" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/product_images/add-icon.png" class="img-fluid" style="height: 200px;" />
                                                </div>
                                                <div class="col-4 border border-primary rounded">
                                                    <img src="resource/product_images/add-icon.png" class="img-fluid" style="height: 200px;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                            <input type="file" class="d-none" id="imageuploader" multiple />
                                            <label for="imageuploader" class="col-12 btn btn-primary">Upload Images</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr class="border-success" />
                                </div>

                                <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                    <button class="btn btn-success">Save Product</button>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>