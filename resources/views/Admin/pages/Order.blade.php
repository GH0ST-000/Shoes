@extends('layouts.AdminLayout')

@section('content')

    <div class="card">
        <div class="card-header pb-0">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0">All Orders</h5>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pb-0">
            <div class="table-responsive">
                <table class="table table-flush" id="products-list">
                    <thead class="thead-light">
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="form-check my-auto">
                                    <input class="form-check-input" type="checkbox" id="customCheck1" >
                                </div>
                                <img class="w-10 ms-3" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/adidas-hoodie.jpg" alt="hoodie">
                                <h6 class="ms-3 my-auto">BKLGO Full Zip Hoodie</h6>
                            </div>
                        </td>
                        <td class="text-sm">Clothing</td>
                        <td class="text-sm">$1,321</td>
                        <td class="text-sm">243598234</td>
                        <td class="text-sm">0</td>
                        <td>
                            <span class="badge badge-danger badge-sm">Out of Stock</span>
                        </td>
                        <td class="text-sm">
                            <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                            </a>
                            <a href="javascript:;" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                            </a>
                            <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                <i class="material-icons text-secondary position-relative text-lg">delete</i>
                            </a>
                        </td>
                    </tr>



                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>SKU</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>




@endsection
