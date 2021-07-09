<div class="container">
<h2>Upload Image</h2>
<form name="frm" action="{{ route('ImageUpload') }}" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
                <input type="file" name="img[]" multiple/>
                <br><br>
                <input type="submit" name="ok" value="Upload">
</form>
</div>
@if(\Illuminate\Support\Facades\Session::has('msg'))
    {{ \Illuminate\Support\Facades\Session::get('msg') }}
@endif
