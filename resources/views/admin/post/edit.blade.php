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
                <h4>Ubah Berita</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.post.index')}}" class="btn btn-primary" > Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.post.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$post->id}}">
                <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" id="title" name="title" value="{{$post->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{$post->slug}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Konten</label>
                    <textarea id="content" name="content">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="custom-select" required>
                        <option value="">~ Pilih ~</option>
                        @foreach($category as $ct)
                            @if($ct->id == $post->category_id)
                            <option value="{{$ct->id}}" selected>{{$ct->name}}</option>
                            @else
                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" id="image" name="photo" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection


@push('script')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
        CKEDITOR.replace( 'content' );
</script>
<script>
    $('#editSubject').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var caption = $(e.relatedTarget).data('caption');

        $('#editSubject').find('input[name="id"]').val(id);
        $('#editSubject').find('input[name="caption"]').val(caption);
    });
</script>
@endpush