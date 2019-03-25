@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">フィルター</div>
                <div class="card-body">
                    <form action="{{ route('home') }}" method="get">
                        <div class="form-group mb-3">
                            <label for="customerInput">名前</label>
                            <input type="text" class="form-control" id="customerInput" name="customer" value="{{ old('customer') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="orderNoInput">伝票番号</label>
                            <input type="text" class="form-control" id="orderNoInput" name="order_no" value="{{ old('order_no') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="priceInput">金額</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">&yen;</span>
                                </div>
                                <input type="number" class="form-control" id="priceInput" name="price" placeholder="0" value="{{ old('price') }}">
                                <select class="custom-select" id="priceOperatorSelect" name="price_operator">
                                    @php $price_operator = old('price_operator', '>=') @endphp
                                    <option value="=" @if($price_operator === '=') selected @endif>と等しい</option>
                                    <option value=">" @if($price_operator === '>') selected @endif>より上</option>
                                    <option value="<" @if($price_operator === '<') selected @endif>より下</option>
                                    <option value=">=" @if($price_operator === '>=') selected @endif>以上</option>
                                    <option value="<=" @if($price_operator === '<=') selected @endif>以下</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                name="self_issued_payments"
                                type="checkbox"
                                value="1"
                                id="selfIssuedPaymentsCheckbox"
                                @if(old('self_issued_payments', 0) == 1) checked @endif
                            >
                            <label class="form-check-label" for="selfIssuedPaymentsCheckbox">
                                自分が発行した伝票のみ表示する
                            </label>
                        </div>
                        <button class="btn btn-primary">検索</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">支払い一覧（{{ $payments->count() }}件）</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>伝票番号</th>
                                    <th>名前</th>
                                    <th>金額</th>
                                    <th>発行者</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        <a href="{{ route('detail', ['id' => $payment->id]) }}">
                                            {{ $payment->order_no }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('detail', ['id' => $payment->id]) }}">
                                            {{ $payment->customer }}
                                        </a>
                                    </td>
                                    <td>&yen;{{ $payment->price }}</td>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>
                                        <form action="{{ route('delete', ['id' => $payment->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <button class="btn btn-danger">削除</button>
                                        </form>
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
@endsection
