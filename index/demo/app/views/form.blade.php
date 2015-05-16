<!-- app/views/form.blade.php -->
<form action="{{ url('handle-form') }}" method="POST" enctype="multipart/form-data">
     <input type="file" name="book" />
     <input type="submit">
</form>