@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">フィルター</div>
                <div class="card-body">
                    <form action="{{ route('users.index') }}" method="get">
                        <div class="form-group mb-3">
                            <label for="nameInput">名前</label>
                            <input type="text" class="form-control" id="nameInput" name="name" value="{{ old('name') }}">
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
                <div class="card-header">ユーザー一覧（{{ $users->count() }}件）</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>名前</th>
                                    <th>メールアドレス</th>
                                    <th>登録日</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="delete">
                                            <button
                                                type="submit"
                                                class="btn btn-danger"
                                                @if($user->id === Auth::user()->id) disabled @endif
                                            >削除</button>
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
