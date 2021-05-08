@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Berita</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Beranda</a></div>
            <div class="breadcrumb-item">Berita</div>
        </div>
    </div>


    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Daftar Berita</h4>
                @if(Auth::user()->role_id == 1)
                <div class="card-header-action">
                    <a href="{{route('admin.post.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Berita</a>
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Slug</th>
                                <th>Konten</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($post as $key => $subject)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>
                                    <img src="{{url('images/'. $subject->image)}}" style="height:70px;;width:70px;;">
                                </td>
                                <td>{{ $subject->title }}</td>
                                <td>{{ $subject->slug }}</td>
                                <td>{!! $subject->content !!}</td>
                                <td class="text-center">
                                    <div class="d-flex d-inline justify-content-center">
                                @if(Auth::user()->role_id == 1)
                                    <a href="{{route('admin.post.edit', $subject->id)}}" class="btn btn-sm btn-success ml-1"
                                    ><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('admin.post.detail', $subject->id)}}" class="btn btn-sm btn-primary ml-1"
                                    ><i class="fas fa-eye"></i></a>
                                    <form action="{{route('admin.post.delete', $subject->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Apa Anda yakin ?');"><i class="fas fa-trash"></i></button>
                                    </form>
                                @else
                                <a href="{{route('user.post.detail', $subject->id)}}" class="btn btn-sm btn-primary ml-1"
                                    ><i class="fas fa-eye"></i></a>
                                @endif
                                    
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $('#editSubject').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var caption = $(e.relatedTarget).data('caption');

        $('#editSubject').find('input[name="id"]').val(id);
        $('#editSubject').find('input[name="caption"]').val(caption);
    });
</script>
@endpush