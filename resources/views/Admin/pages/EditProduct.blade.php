@extends('layouts.AdminLayout')
@section('content')


<style>
    .ck-content{
        height: 300px !important;
    }
</style>
<div class="card ">
    <div class="card-body">
        <form action="{{url('admin/store_product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-3 col-sm-6 pe-4">
                        <div class="input-group input-group-dynamic">
                            <label for="projectName" class="form-label">Product Name</label>
                            <input value="{{$product->product_name}}" type="text" name="product_name" class="form-control mt-4" id="projectName" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>

                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <label class="form-label">Select Tag</label>
                       @php
                           $tagsString = $product->tags;
                           $tagsArray = explode(',', $tagsString);
                           print_r($tagsString)
                       @endphp

                        <select class="js-example-basic-multiple " style="width: 620px"  name="tags[]" multiple="multiple">
{{--                            <option selected="{{}}" ></option>--}}
                            @foreach($tags as $tag)
                                <option  value="{{$tag->tag_name}}">{{$tag->tag_name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <div class="input-group input-group-dynamic">
                            <label for="projectName" class="form-label">Product Price</label>
                            <input type="number" name="product_price" class="form-control mt-4" id="projectName" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>

                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <label class="form-label">Select Size</label>
                        <select class="js-example-basic-multiple " style="width: 620px" name="size[]" multiple="multiple">
                            @foreach($sizes as $size)
                                <option value="{{$size->size}}">{{$size->size}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12  mb-3  pe-4">
                        <label class="form-label">Description</label>
                        <input   class="p-3" id="editor">This is some sample content.</input>
                    </div>

                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <label class="form-label">Brands</label>
                        <select class="js-example-basic-multiple " style="width: 620px" name="brands[]" multiple="multiple">
                            @foreach($brands as $brand)
                                <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <label class="form-label">Select Category</label>
                        <select class="js-example-basic-multiple " style="width: 620px" name="category[]" multiple="multiple">
                            @foreach($categories as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <div class="input-group input-group-dynamic">
                            <label for="projectName" class="form-label">Product Quantity</label>
                            <input type="number" name="quantity" class="form-control mt-4" id="projectName" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                    </div>


                    <div class="col-12  mb-3 col-sm-6 pe-4">
                        <label class="form-label">In a stock</label>
                        <select class="js-example-basic-multiple " style="width: 620px" name="in_a_stock" multiple="multiple">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="col-12  mb-3 col-sm-12 pe-4 mt-4">
                        <div class="w-100 border align-items-center text-center rounded">
                            <label for="fileInput"  class="py-4 cursor-pointer">Select An image</label>
                            <input style="display: none" multiple type="file" name="file" id="fileInput">
                            <div class="w-100 h-auto" id="imageContainer">

                            </div>
                        </div>

                    </div>
                    <input type="hidden" name="description" id="hiddenDescription">
                    <input type="hidden" name="images[]" id="img">

                </div>

            </div>
            <div class="float-end mt-4">
                <button type="submit" class="btn me-4 btn-instagram">Save</button>
            </div>
        </form>
    </div>
</div>


<script>


    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    })

    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
            document.querySelector('#hiddenDescription').value = editor.getData();
            editor.model.document.on('change:data', () => {
                document.querySelector('#hiddenDescription').value = editor.getData();
            });
        })
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        let fileInput = $('#fileInput');
        let imageUrls = [];  // Array to store image URLs
        let hiddenInput = $('#img');

        fileInput.on('change', function () {
            let files = fileInput[0].files;
            if (files.length === 0) {
                alert('Please select a file.');
                return;
            }
            $.each(files, function (index, file) {
                uploadFile(file);
            });
        });

        function uploadFile(file) {
            let chunkSize = 1024 * 1024;
            let chunks = Math.ceil(file.size / chunkSize);
            let currentChunk = 0;
            let fileReader = new FileReader();

            fileReader.onload = function (e) {
                let formData = new FormData();
                formData.append('file', file);
                formData.append('chunk', e.target.result);
                formData.append('chunks', chunks);
                formData.append('name', file.name);
                $.ajax({
                    url: '/admin/upload-chunk',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        // Store the image URL in the array
                        imageUrls.push(response.url);

                        // Update the value of the hidden input
                        hiddenInput.val(imageUrls.join(','));

                        // Display the images in the container
                        displayImages();

                        currentChunk++;

                        if (currentChunk < chunks) {
                            readNextChunk();
                        } else {
                            // All chunks uploaded
                        }
                    },
                    error: function (error) {
                        console.error('Error uploading chunk:', error);
                    }
                });
            };

            function readNextChunk() {
                let start = currentChunk * chunkSize;
                let end = Math.min(start + chunkSize, file.size);
                let chunk = file.slice(start, end);
                fileReader.readAsBinaryString(chunk);
            }

            function displayImages() {
                let container = document.getElementById('imageContainer');
                container.innerHTML = ''; // Clear the container

                // Append each image to the container
                imageUrls.forEach(function (url) {
                    let image = document.createElement('img');
                    image.src = url;
                    image.alt = 'Alternative Text';
                    image.className = 'rounded ms-4 w-25 h-25 mt-5';
                    container.appendChild(image);
                });
            }

            readNextChunk();
        }
    });




</script>
@endsection
