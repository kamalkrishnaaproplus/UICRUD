<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Entry Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" />
    <link rel="stylesheet" href="styles/create.css" />
    <style>
        .formbold-btn {
            margin-bottom: 10px;
            /* Add margin to separate the button from the table */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Sales App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
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

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-dark text-white">
                Product Entry Form
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="invoice_number">Invoice Number</label>
                                <input type="text" name="invoice_number" id="invoice_number"
                                    placeholder="Invoice Number" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" name="customer_name" id="customer_name" placeholder="Customer Name"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- New section for entering product details -->
                        <div class="form-group col-md-3">
                            <label for="category">Category:</label>
                            <select name="category[]" id="category" class="form-control" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="category1">Category 1</option>
                                <option value="category2">Category 2</option>
                                <option value="category3">Category 3</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="product">Product:</label>
                            <select name="product[]" id="product" class="form-control" required>
                                <option value="" disabled selected>Select Product</option>
                                <option value="product1">Product 1</option>
                                <option value="product2">Product 2</option>
                                <option value="product3">Product 3</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity" required
                                min="1">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="price">Price:</label>
                            <input type="text" name="price[]" id="price" class="form-control price" required>
                        </div>

                        <div class="form-group col-md-1">
                            <label for="taxable">Taxable:</label>
                            <input type="text" name="taxable[]" id="taxable" class="form-control taxable" required>
                        </div>


                        <div class="form-group col-md-1">
                            <label for="taxPercentage">Tax %:</label>
                            <input type="text" name="taxPercentage[]" id="taxPercentage"
                                class="form-control gst-percentage" required>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="taxAmount">Tax Amount:</label>
                            <input type="text" name="taxAmount[]" id="taxAmount" class="form-control gst-amount"
                                required>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="totalAmount">Total Amount:</label>
                            <input type="text" name="totalAmount[]" id="totalAmount" class="form-control total-amount"
                                required>
                        </div>

                        <div class="form-group col-md-1 col-sm-12 d-flex align-items-center">
                            <div class="flex" style="padding-top: 25px;">
                                <button type="button" id="addRecordBtn" class="btn btn-unstyled">
                                    <img src="{{ asset('images/add.png') }}" alt="Add Product">
                                </button>
                            </div>
                        </div>
                        
                        
                    </div>


                    <!-- Table for displaying added products -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Taxable</th>
                                    <th>Tax %</th>
                                    <th>Tax Amount</th>
                                    <th>Total</th>
                                    <TH>Action</TH>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Rows for added products will be dynamically inserted here -->
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            // Add record to table body when add button is clicked
            $("#addRecordBtn").click(function () {
                // Fetch values from textboxes
                var productName = $("#product").val();
                var quantity = $("#quantity").val();
                var price = $("#price").val();
                var taxable = $("#taxable").val();
                var taxPercentage = $("#taxPercentage").val();
                var taxAmount = $("#taxAmount").val();
                var totalAmount = $("#totalAmount").val();
        
                // Check if any field is empty
                if (productName && quantity && price && taxable && taxPercentage && taxAmount && totalAmount) {
                    // Construct new row with fetched values
                    var newRow = "<tr><td contenteditable='true'>" + productName + "</td><td contenteditable='true'>" + quantity + "</td><td>" + price + "</td><td>" + taxable + "</td><td>" + taxPercentage + "</td><td>" + taxAmount + "</td><td>" + totalAmount + "</td><td><img src='{{ asset('images/delete.png') }}' alt='Delete Record' class='deleteRowBtn' style='cursor: pointer;' width='30' height='30'></td></tr>";
        
                    // Append new row to table body
                    $("#tableBody").append(newRow);
                } else {
                    alert("Please fill in all fields before adding a new record.");
                }
            });
        
            // Delete record when delete button is clicked
            $(document).on("click", ".deleteRowBtn", function () {
                // Code to delete the row
                $(this).closest("tr").remove(); // Removes the closest row to the clicked button
            });

            $("#addRecordBtn").click(function() {
            // Make AJAX request to fetch document number
            var documentType = 'Sales'; // Set your document type dynamically

                $.ajax({
                    url: '/load-docnum/' + documentType,
                    type: 'GET',
                    success: function(response) {
                       
                        document.getElementById("invoice_number").value = response.documentNumber;

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });


            });
        });
    </script>
</body>

</html>