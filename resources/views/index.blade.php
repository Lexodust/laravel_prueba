<form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="archivos">Subir archivos PDF</label>
        <input type="file" name="archivos[]" class="form-control-file" multiple>
    </div>
    <button type="submit" class="btn btn-primary">Subir archivos</button>
</form>
