<form method="post" action="{{ url('testUpload') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="file" name="file">

    <button type="submit">Upload</button>
</form>