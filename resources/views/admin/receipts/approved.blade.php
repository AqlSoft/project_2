@extends('admin.receipts.home')
@section('table')
    <table class="table table-striped table-bordered mt-1">
        <thead>
            <tr>
<<<<<<< HEAD:resources/views/admin/receipts/approved.blade.php
                <th><i class="fa fa-list"></i></th>
                <th><i class="fa fa-barcode"></i> Serial Number</th>
                <th><i class="fa fa-tags"></i> Reference Type</th>
                <th><i class="fa fa-calendar"></i> Date</th>
                <th><i class="fa fa-arrow-right"></i> Dir</th>
                <th><i class="fa fa-user"></i> Representative</th>
                <th><i class="fa fa-cogs"></i> Control</th>
=======
               <th> # <i  class="fa fa-sort px-2"></i></th>
                <th> Serial Number  <i  class="fa fa-sort px-4"></i></th>
                <th> Reference Type <i  class="fa fa-sort px-4"></i></th>
                <th> Date <i  class="fa fa-sort px-4"></i></th>
                <th> Dir <i  class="fa fa-sort px-4"></i></th>
                <th> Representative <i  class="fa fa-sort px-4"></i></th>
                <th> Control <i  class="fa fa-sort px-4"></i></th>
>>>>>>> 1158e4b7ea1a33b808b1e196107d5672072ff17f:resources/views/admin/receipts/approvedReceipts.blade.php
            </tr>
        </thead>
        <tbody>
            @php $i = 0 @endphp
            @if (count($receipts))
                @foreach ($receipts as $receipt)
                    @if ($receipt->status === 2 && $receipt->direction === 1?$receipt->direction === 1:$receipt->direction === 2)
                        @php $i++ @endphp
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $receipt->serial }}</td>
                            <td>{{ @$reference_type[$receipt->reference_type] }}</td>
                            
                            <td>{{ $receipt->reception_date }}</td>
<<<<<<< HEAD:resources/views/admin/receipts/approved.blade.php
                            <td>
                                @if ($receipt->direction === 1)
                                    <span class="badge bg-success">Input</span>
                                @else
                                    <span class="badge bg-danger">Output</span>
                                @endif
                            </td>
=======
                            <td>{{ $receipt->direction }}</td>
>>>>>>> 1158e4b7ea1a33b808b1e196107d5672072ff17f:resources/views/admin/receipts/approvedReceipts.blade.php
                            <td>{{ @$receipt->admin->userName }}</td>
                            <td>
                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="edit Receipt"
                                    href="{{ route('edit-receipt-info', [$receipt->id]) }}"><i
                                        class="fa fa-edit text-primary"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Enable Receipt Entries "
                                    href=""><i class="fa fa-ban text-primary"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="Q-Display Receipt"
                                    href=""><i class="fa fa-eye text-primary"></i></a>

                                <a class="btn btn-sm py-0 p-0" data-bs-toggle="tooltip" title="print Receipt"
                                    href=""><i class="fa fa-print text-secondary"></i></a>

                            </td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td colspan="7">No Receipts has been not added Receipt!!. </td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="mt-3" id="links">
        {{ $receipts->links() }}
    </div>
@endsection
