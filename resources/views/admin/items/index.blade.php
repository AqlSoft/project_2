@extends('layouts.admin')
@section('header-links')
    <li class="breadcrumb-item"><a href="/admin/items/home">Items</a></li>
    <li class="breadcrumb-item active" aria-current="page">Home</li>
@endsection
@section('contents')
    <h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Items Home
        <a class="fw-bold" href="/admin/items/home" class="link-item">
            <i class="fa fa-home fa-2x"></i>
            <span class="">All Products</span>
        </a>

    </h1>

    <!--  start Add New Category -->
    <div class="row">
        <div class="col col-12 collapse" id="addItemCategoryForm">
            <div class="card card-body">
                <form action="/admin/items/categories/store" method="POST">
                    @csrf
                    <div class="input-group">
                        <label class="input-group-text" for="parent_cat">Parent Category</label>
                        <select class="form-select" name="parent" id="parent_cat">
                            <option value="1">Root</option>
                            @foreach ($cats as $cat)
                                @if ($cat->id === 1)
                                    @continue
                                @endif
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @foreach ($cat->children as $cc)
                                    <option value="{{ $cc->id }}">{{ $cat->name }} - {{ $cc->name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <label class="input-group-text" for="cat_name">Name</label>
                        <input type="text" class="form-control" name="name" id="cat_name">
                    </div>

                    <div class="input-group  mt-2">
                        <label class="input-group-text" for="brief">Description</label>
                        <input type="text" class="form-control" name="brief" id="brief">
                    </div>

                    <div class="input-group mt-2">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" name="status" type="checkbox" value="1"
                                aria-label="Checkbox for following text input">
                        </div>
                        <button type="button" class="input-group-text text-start">Active</button>
                        <button type="submit" class="form-control btn btn-outline-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- start Add New item -->
    <div class="row">
        <div class="col col-12 collapse" id="addItemForm">
            <div class=" card card-body">

                <form action="{{ route('store-new-product') }}" method="POST" accept="[]" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <label class="input-group-text" for="categorey">Parent Category</label>
                        <select class="form-select" name="category_id" id="categorey">
                            <option hidden placeholder="Parent Select Category"> </option>
                            @foreach ($centrals as $cat)
                                @foreach ($cat->children as $child)
                                    <option value="{{ $child->id }}">{{ $cat->parent->name }} -{{ $cat->name }} -
                                        {{ $child->name }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                        <label class="input-group-text" for="barcode">Barcode</label>
                        <input type="text" class="form-control" name="barcode" id="barcode">
                    </div>
                    <div class="input-group  mt-2">
                        <label class="input-group-text" for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">

                        <input type="file" class="form-control" name="image" id="image">

                    </div>
                    <div class="input-group  mt-2">
                        <label class="input-group-text" for="breif">Description</label>
                        <input type="text" class="form-control" name="breif" id="breif">
                    </div>
                    <div class="input-group mt-2">
                        <label class="input-group-text" for="unit">Unit</label>
                        <select class="form-select" name="unit" id="unit">
                            <option value="1"></option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="form-control btn btn-outline-primary">Save Item</button>
                    </div>


                </form>


            </div>
        </div>

    </div>

    <!-- end -->
    <div class="row">
        <div class="col col-4">
            <fieldset class="mt-4 mx-0 mb-0">
                <legend>Root &nbsp; &nbsp;
                    <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm"
                        aria-expanded="false" aria-controls="addItemCategoryForm"><i data-bs-toggle="tooltip"
                            title="Add New Category" class="fa fa-plus"></i></a>
                </legend>
                <ol id="tree" class="mt-0">
                    @foreach ($cats as $item)
                        <li>
                            <input type="checkbox" id="item_{{ $item->id }}" checked />
                            <label for="item_{{ $item->id }}" class="my-0">{{ $item->name }}</label>
                            @if ($item->children)
                                <ol>
                                    @foreach ($item->children as $child)
                                        <li id="cats" data-ajax-url="{{ route('product.filter') }}"
                                            data-ajax-token="{{ csrf_token() }}">
                                            <input type="checkbox" id="item_{{ $child->id }}" checked />
                                            <label class="category-item" data-element-id="0"
                                                for="item_{{ $child->id }}">{{ $child->name }}</label>
                                            @if ($child->children)
                                                <ol>
                                                    @foreach ($child->children as $grandChild)
                                                        <li data-element-id="item_{{ $child->id }}"
                                                            class="category-item">
                                                            <label>
                                                                <a
                                                                    href="{{ route('display-product-list-filtered', 'id=' . $grandChild->id) }}">{{ $grandChild->name }}</a>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                            @endif
                                        </li>
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </fieldset>
        </div>
        <div class="col col-8">
            <fieldset class="mt-4 mx-0 mb-0">
                <legend>Display Product List &nbsp; &nbsp;
                    <a class=" ms-3" data-bs-toggle="collapse" data-bs-target="#addItemForm" aria-expanded="false"
                        aria-controls="addItemForm"><i data-bs-toggle="tooltip" title="Add New Item"
                            class="fa fa-plus"></i></a>
                </legend>

                <div id="cat">
                    <div class="row ">
                        @foreach ($products as $product)
                            <div class="col-lg-6 col-sm-6 mb-1  ">
                                <a href="{{ route('display-product', [$product->id]) }}">
                                    <div class="productlist">
                                        <div class="productlistimg">
                                            <img src="{{ asset('assets/admin/uploads/images/product/' . $product->image) }}"
                                                alt="img">

                                        </div>
                                        <div class="productlistcontent">
                                            <h5 class=" mb-1">
                                                @if ($product->parent_cat && $product->parent_cat->parent)
                                                    {{ $product->parent_cat->parent->name }} &gt;
                                                    {{ $product->parent_cat->name }}
                                                @else
                                                    {{ $product->name }}
                                                @endif
                                            </h5>
                                            <h4 class="mb-3">{{ $product->name }}</h4>

                                        </div>

                                        <div>
                                            <p>{{ $product->breif }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
        </div>
        </fieldset>
    </div>


    <ul id="contextMenu" style="display: none;">
        {{-- <li><a data-bs-toggle="collapse" data-bs-target="#addItemCategoryForm" aria-expanded="false"
                aria-controls="addItemCategoryForm">Add Sub Category</a></li> --}}
        <li><a href="/admin/items/categories/edit/__id">Edit Category</a></li>
        <li><a href="/admin/items/categories/delete/__id">Delete Category</a></li>
    </ul>
    <script>
        $(document).ready(function() {
            $('.category-item').on('contextmenu', function(e) {
                e.preventDefault();
                $('#contextMenu').css({
                    position: 'absolute',
                    top: e.pageY + 'px',
                    left: e.pageX + 'px',
                    display: 'block',

                }).fadeIn(300);
            });

            $(document).click(function() {
                $('#contextMenu').fadeOut(200);
            });

        });



        $(document).ready(function() {
            $('#addItemForm').on('show.bs.collapse', function() {
                $('#addItemCategoryForm').collapse('hide');
            });

            $('#addItemCategoryForm').on('show.bs.collapse', function() {
                $('#addItemForm').collapse('hide');
            });
        });

        $(document).on('click', '.category-item', function() {
            // vars
            const currEl = $(this)
            const __url = $('#cats').attr('data-ajax-url')
            const __token = $('#cats').attr('data-ajax-token')
            const __id = currEl.attr('data-element-id')

            // connection
            jQuery.ajax({
                type: 'POST',
                url: __url,
                dataType: 'html',
                data: {
                    "_token": __token,
                    "id": __id
                },
                cash: false,
                success: function(data) {
                    $('#cat').html(data);
                },
                error: function() {

                }
            })
        })
    </script>
@endsection
