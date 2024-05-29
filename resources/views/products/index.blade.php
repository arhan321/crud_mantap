@extends('main')
@section('section')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">{{ trans('panel.site_title') }}</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('products.create') }}" class="btn btn-md btn-custom btn-success mb-3">ADD PRODUCT</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">IMAGE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">DESCRIPTION</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">STOCK</th>
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $p)
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ asset('/storage/products/'.$p->image) }}" target="_blank">
                                            <img src="{{ asset('/storage/products/'.$p->image) }}" class="rounded" style="width: 150px">
                                        </a>
                                    </td>
                                    <td>{{ $p->title }}</td>
                                    <td>{!! $p->description !!}</td>
                                    <td>{{ "Rp " . number_format($p->price,2,',','.') }}</td>
                                    <td>{{ $p->stock }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $p->id) }}" method="POST">
                                            <a href="{{ route('products.show', $p->id) }}" class="btn btn-sm btn-custom btn-dark">SHOW</a>
                                            <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-custom btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-custom btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="alert alert-danger">
                                            Data Products belum Tersedia.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

@endsection
