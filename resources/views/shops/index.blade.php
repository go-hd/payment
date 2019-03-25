@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">フィルター</div>
                <div class="card-body">
                    <form action="{{ route('shops.index') }}" method="get">
                        <div class="form-group mb-3">
                            <label for="nameInput">名前</label>
                            <input type="text" class="form-control" id="nameInput" name="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="zipCodeInput">郵便番号</label>
                            <input type="text" class="form-control" id="zipCodeInput" name="zip_code" value="{{ old('zip_code') }}">
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
                <div class="card-header">ショップ一覧（{{ $shops->count() }}件）</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>社印</th>
                                    <th>ショップ名</th>
                                    <th>郵便番号</th>
                                    <th>住所</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>
                                        <img width="50px" src="{{ $shop->company_seal }}" alt="{{ $shop->name }}">
                                    </td>
                                    <td>{{ $shop->name }}</td>
                                    <td>{{ $shop->zip_code }}</td>
                                    <td>{{ $shop->address1 }} {{ $shop->address2 }}</td>
                                    <td>
                                        <form action="{{ route('shops.destroy', ['id' => $shop->id]) }}" method="post">
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
