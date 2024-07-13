<!-- resources/views/welcome.blade.php -->
@extends('adminlte::page')

@section('content')
    @include('partials.content')
@endsection

@push('js')
<script>
$(document).ready(function() {
    $('a.ajax-link').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var url = $(this).attr('href'); // Get the URL from the link

        $.get(url, function(data) {
            $('#dynamic-content').html($(data).find('#dynamic-content').html());
        });
    });
});
</script>
@endpush
