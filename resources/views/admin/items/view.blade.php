@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/items/home">Home</a></li>
<li class="breadcrumb-item"><a href="/admin/items/index">items</a></li>
<li class="breadcrumb-item active" aria-current="page">View</li>
@endsection
@section('contents')
<div class="row">

  <div class="col col-8">
    <fieldset class="mt-4 ms-0 mb-0  shadow-sm">
      <legend>Product Details &nbsp; &nbsp;

      </legend>

      <div class="row">

        <div class="col-lg-8 col-sm-8">
          <div class="bulk border-dark p-0 m-1">
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-5 text-end fw-bold"> Barcode: </div>
              <div class="col col-7  ">{{ $product->barcode }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1 ">
              <div class="col col-5 text-end fw-bold"> Product Name: </div>
              <div class="col col-7 ">{{ $product->name }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Category: </div>
              <div class="col col-7 ">{{ $product->parent_cat->parent->name }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Sub Category: </div>
              <div class="col col-7 "> {{ $product->parent_cat->name }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Unit: </div>
              <div class="col col-7 ">
                @if ($product->units_name)
                {{ $product->units_name->name }}
                @else
                N/A
                @endif
              </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end fw-bold"> serial: </div>
              <div class="col col-7 ">{{ $product->serial }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> breif: </div>
              <div class="col col-7 ">{{ $product->breif }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Created By: </div>
              <div class="col col-7 "> {{ $product->creator->userName }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Date Created At: </div>
              <div class="col col-7 ">{{ $product->created_at }}</div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Edited By: </div>
              <div class="col col-7 ">{{ $product->editor->userName }} </div>
            </div>
            <div class="row m-0 mb-1  border-bottom border-dark-50 pb-1">
              <div class="col col-5 text-end  fw-bold"> Date Modified: </div>
              <div class="col col-7 ">{{ $product->updated_at }}</div>
            </div>
          </div>
        </div>

      </div>
  </div>
  </fieldset>
</div>
@endsection"