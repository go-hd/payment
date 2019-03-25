@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">請求金額一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-borderless">
                            @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        <a href="{{ route('detail', ['id' => $payment->id]) }}">
                                            {{ $payment->customer }}
                                        </a>
                                    </td>
                                    <td class="text-right">&yen;{{ $payment->price }}</td>
                                </tr>
                            @endforeach
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
