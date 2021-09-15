@extends("layouts.app")
@section('style')
    <style></style>
@endsection

@section('page-content')
    <a href="{{ route('admin.add-batch') }}" class="btn btn-primary text-capitalize"> add new batch </a>
    <div class="card mt-3 text-capitalize">
        <div class="card-header">
            <p class="h5 m-0">all batches
                {{-- <span class="h6 text-danger"> -only currently learning students are displayed under batch section</span> --}}
            </p>
        </div>
        <div class="card-body">
            <table class="table border text-capitalize table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>sr</th>
                        <th>batch time</th>
                        <th>students learning</th>
                        <th>view</th>
                        <th>edit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $batch)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $batch->start_time . ' - ' . $batch->end_time }}
                            </td>
                            <td>{{ $batch->getstudents->where('status', 1)->count() }}</td>
                            <td><a href="{{ route('admin.batches.view-batch', ['batchid' => $batch->id]) }}"
                                    class="btn btn-primary btn-sm">view</a>
                            </td>
                            <td>
                                <a href="{{ route('admin.batches.edit', ['batchid' => $batch->id]) }}"
                                    class="btn btn-success btn-sm">edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">no data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
