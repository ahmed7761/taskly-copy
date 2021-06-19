@extends('layouts.admin')

@section('page-title') {{__('Invoices')}} @endsection
@section('content')
    @auth('web')
        @if($currentWorkspace->creater->id == Auth::user()->id)
            <section class="row my-5">
                <div class="col-12">
                    <form method="post" class="float-right">
                        @csrf
                        <div class="col-md-12">
                            <label for="issue_from">From</label>
                            <input type="date" name="issue_from" id="issue_from" class="custom-input">
                            <label for="issue_to">To</label>
                            <input type="date" name="issue_to" id="issue_to" class="custom-input">
                            <input type="text" name="project_name" id="custom_search" class="custom-input" placeholder="Enter Project Name">

                            <button type="submit" class="btn btn-xs btn-info" formaction="{{ route('invoice.report.search', $currentWorkspace->slug) }}">Search</button>
                        </div>
                        <div class="col-md-12">
                            <div class=" mb-3">
                                <button type="submit" class="btn btn-xs btn-success pdf-download-btn float-right" formaction="{{ route('invoice.report.print', $currentWorkspace->slug) }}" formtarget="_blank"><i class="fa fa-file"></i> {{ __('Download PDF') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        @endif
    @endauth
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-hover mb-0 animated" id="selection-datatable">
                                <thead>
                                <th>{{__('Invoice')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Issue Date')}}</th>
                                <th>{{__('Due Date')}}</th>
                                <th>{{__('Amount')}}</th>
                                <th>{{__('Status')}}</th>
                                </thead>
                                <tbody>
                                @foreach($invoices as $key => $invoice)
                                    <tr>
                                        <td class="Id sorting_1">
                                            <a href="@auth('web'){{ route('invoices.show',[$currentWorkspace->slug,$invoice->id]) }}@elseauth{{ route('client.invoices.show',[$currentWorkspace->slug,$invoice->id]) }}@endauth">
                                                {{Utility::invoiceNumberFormat($invoice->invoice_id)}}
                                            </a>
                                        </td>
                                        <td>{{$invoice->project->name}}</td>
                                        <td>{{Utility::dateFormat($invoice->issue_date)}}</td>
                                        <td>{{Utility::dateFormat($invoice->due_date)}}</td>
                                        <td>{{$currentWorkspace->priceFormat($invoice->getTotal())}}</td>
                                        <td>
                                            @if($invoice->status == 'sent')
                                                <span class="badge badge-warning">{{__('Sent')}}</span>
                                            @elseif($invoice->status == 'paid')
                                                <span class="badge badge-success">{{__('Paid')}}</span>
                                            @elseif($invoice->status == 'canceled')
                                                <span class="badge badge-danger">{{__('Canceled')}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
