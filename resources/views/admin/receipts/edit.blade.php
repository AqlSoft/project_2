@extends('layouts.admin')
@section('header-links')
<li class="breadcrumb-item"><a href="/admin/stores/home"> Stores </a></li>
<li class="breadcrumb-item"><a href="/admin/receipts/index"> Index </a></li>
<li class="breadcrumb-item active" aria-current="page">Edit Receipt</li>
@endsection
@section('contents')
<h1 class="mt-3 pb-2" style="border-bottom: 2px solid #dedede">Edit receipt Info</h1>
<div class="card card-body">
<form action="{{ route('update-receipt-info') }}" method="POST">
            <input type="hidden" name="id" value="{{ $receipt->id }}">
            @csrf
            <div class="input-group  mb-2">
              <label class="input-group-text" for="reference"><i  class="fa fa-tag  px-1"></i>Reference</label>
              <input type="text" class="form-control " name="reference" value="{{ $receipt->reference }}" />
              <label class="input-group-text" for="reference_type"><i  class="fa fa-tags  px-1"></i> Reference Type</label>
              <select class="form-select " name="reference_type" id="reference_type">
          @foreach ($reference_type as $key => $value)
          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
        <label class="input-group-text" for="status"><i  class="fa fa-receipt  px-1"></i> Receipt Status:</label>
              <select class="form-select " name="status" id="status">
          @foreach ($status as $key => $value)
          <option hidden value="{{ $key }}">{{ $value }}</option>
          <option value="{{ $key }}">{{ $value }}</option>
          @endforeach
        </select>
            </div>
            <div class="input-group  mt-2">
              <label class="input-group-text" for="admin_id"><i  class="fa fa-user  px-1"></i>Representative</label>
              <select class="form-select " name="admin_id" id="admin_id">
                @foreach ($admins as $admin)
                <option value="{{ $admin->id }}">{{ $admin->userName }}</option>
                @endforeach
              </select>
              <label class="input-group-text" for="store_id"> <i  class="fa fa-store  px-1"></i> Store</label>
              <select class="form-select " name="store_id" id="store_id">
            
                @foreach ($stores as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>
          
            </div>
            <div class="input-group  mt-2">
              <label class="input-group-text" for="brief"><i  class="fa fa-file-alt  px-1"></i>Description</label>
              <input type="text" class="form-control " name="brief" id="brief" value="{{ $receipt->brief }}">
            </div>
            <div class="input-group  mt-2">
              <label class="input-group-text" for="notes"><i  class="fa fa-sticky-note  px-1"></i>Notes</label>
              <input type="text" class="form-control" name="notes" id="notes" value="{{ $receipt->notes }}">
            </div>
            <div class="input-group sm mt-2">
            <button type="reset" class="form-control btn btn-outline-info py-0">Reset Form</button>
            <button type="submit" class="form-control btn btn-outline-primary py-0">Edit Receipt</button>
            </div>
          
            </div>
          </form>
</div>

@endsection

