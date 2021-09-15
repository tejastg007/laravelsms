@extends('layouts.app')
@section('style')
    <style></style>
@endsection

@section('page-content')
    <div class="card text-capitalize">
        <div class="card-header">
            <p class="h5 m-0">notifications</p>
        </div>
        <div class="card-body">
            <div class="notification-container container" style="height: 500px; overflow-x:hidden; overflow-y:auto">
                <h5 class="text-danger">Course completed students</h5>
                @forelse ($pmsg as $msg)
                    <div class="notification border-bottom p-3">
                        <p class="my-1 h6"><strong>student course completed !</strong></p>
                        <p class="m-0">{!! $msg !!}
                        </p>
                    </div>
                @empty
                    <div class="notification border-bottom p-3">
                        <p>no messages here !</p>
                    </div>
                @endforelse

                <h5 class="my-3 text-danger">todays birthday bois and garls 🥳🥳</h5>
                @forelse ($bmsg as $msg)
                    <div class="notification border-bottom p-3 ">
                        <p class="my-1 h6"><strong>its a birthday! !</strong></p>
                        <p class="m-0">{{ $msg }}
                        </p>
                    </div>
                @empty
                    <div class="notification border-bottom p-3">
                        <p>no messages here !</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
