<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Entry Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
    <link rel="stylesheet" href="styles/create.css" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sales App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Create <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sales</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('create.product') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" name="product_name" id="product_name" placeholder="Product Name" class="form-control" />
                                <input type="hidden" name="product_id" id="product_id">
                            </div>

                            <div class="form-group">
                                <label for="Category">Category</label>
                                <select name="Category" id="Category" class="form-control">
                                    <option value="" disabled selected>Select Category</option>
                                  
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="input-file-now">Select Image</label>
                                <input type="file" name="input-file-now" id="input-file-now" class="dropify form-control" data-allowed-file-extensions="jpg jpeg png gif" data-show-remove="false" data-max-file-size="5M" data-msg-placeholder="Custom placeholder text here" />
                            </div>
                            <div class="form-group">
                                <label for="active_status">Active Status</label>
                                <select name="active_status" id="active_status" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mrp">MRP</label>
                            <input type="number" name="mrp" id="mrp" placeholder="MRP" class="form-control" min="1" />
                        </div>

                        <div class="form-group">
                            <label for="p_rate">Purchase Rate</label>
                            <input type="number" name="p_rate" id="p_rate" placeholder="Purchase Rate" class="form-control" min="1" />
                        </div>

                        <div class="form-group">
                            <label for="s_rate">Selling Rate</label>
                            <input type="number" name="s_rate" id="s_rate" placeholder="Selling Rate" class="form-control" min="1" />
                        </div>

                        <div class="form-group">
                            <label for="taxable">Taxable</label>
                            <select name="taxable" id="taxable" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tax_type">Tax Type</label>
                            <select name="tax_type" id="tax_type" class="form-control">
                                <option value="Included">Included</option>
                                <option value="Excluded">Excluded</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tax_percentage">Tax Percentage</label>
                            <input type="number" name="tax_percentage" id="tax_percentage" placeholder="Tax Percentage" class="form-control" min="1" />
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <br>
                                <button type="submit" id="btncreate" class="btn btn-primary">Create Product</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
        function loadCategories() {
            $.ajax({
                url: '{{ route("categories.index") }}',
                type: 'GET',
                success: function(response) {
                    var categorySelect = $('#Category');
                    categorySelect.empty();
                    categorySelect.append('<option value="" disabled selected>Select Category</option>');
                    $.each(response, function(index, category) {
                        categorySelect.append('<option value="' + category.CategoryID + '">' + category.CategoryName + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        // Call loadCategories function to load categories when the page loads
        loadCategories();
    });
</script>

</body>

</html>
