@extends('layouts.AdminLayout')
@section('content')

    <div class="card">
        <div class="card-header pb-0">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0">All Products</h5>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                    <div class="ms-auto my-auto">
                        <a href="{{url('admin/add_product')}}" class="btn bg-gradient-primary btn-sm mb-0" >+&nbsp; New Product</a>
                    </div>
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
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <div class="d-flex">
                                    <div class="form-check my-auto">
                                        <input class="form-check-input" type="checkbox" id="customCheck1" >
                                    </div>
                                    <img class="w-10 ms-3" src="{{explode(',',$product->image_url)[0]}}" alt="hoodie">
                                    <h6 class="ms-3 my-auto">{{$product->product_name}}</h6>
                                </div>
                            </td>
                            <td class="text-sm">{{$product->categories}}</td>
                            <td class="text-sm">{{$product->price}}</td>
                            <td class="text-sm">{{$product->sku}}</td>
                            <td class="text-sm">{{$product->quantity}}</td>
                            <td>
                                @if($product->in_a_stock == 'Yes')
                                    <span class="badge badge-success badge-sm">In a Stock</span>
                                @else
                                    <span class="badge badge-danger badge-sm">Out of Stock</span>
                                @endif

                            </td>
                            <td class="text-sm">
                                <a href="{{url('admin/edit_product/'.$product->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                                    <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                </a>
                                <a href="{{url('admin/delete_product/'.$product->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Delete product">
                                    <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach




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
