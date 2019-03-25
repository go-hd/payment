@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">請求金額詳細 - {{ $payment->customer }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-borderless">
                            <tr>
                                <th>伝票番号</th>
                                <td>{{ $payment->order_no }}</td>
                            </tr>
                            <tr>
                                <th>顧客名</th>
                                <td>{{ $payment->customer }}</td>
                            </tr>
                            <tr>
                                <th>金額</th>
                                <td>&yen;{{ $payment->price }}</td>
                            </tr>
                            <tr>
                                <th>発行日</th>
                                <td>{{ $payment->issue_date }}</td>
                            </tr>
                            <tr>
                                <th>支払い方法</th>
                                <td>{{ $payment->method }}</td>
                            </tr>
                            <tr>
                                <th>発行者</th>
                                <td>{{ $payment->user->name }}</td>
                            </tr>
                            <tr>
                                <th>対象店舗</th>
                                <td>{{ $payment->shop->name }}</td>
                            </tr>
                            <tr>
                                <th>備考</th>
                                <td>{{ $payment->note }}</td>
                            </tr>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
