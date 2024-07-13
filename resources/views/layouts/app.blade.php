@extends('adminlte::page')

@section('content')
    <div id="dynamic-content">
        @yield('content_body')
    </div>
@stop

<!-- resources/views/welcome.blade.php -->
@push('js')
<script>
$(document).ready(function() {
    $('a.ajax-link').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var url = $(this).attr('href'); // Get the URL from the 
        

        // Remove the active-link class from all links
        $('a.ajax-link').removeClass('active');
        $('a.ajax-link-pat').removeClass('active');

        // Add the active-link class to the clicked link
        $(this).addClass('active');

          // Update the URL in the address bar without reloading the page
          history.pushState(null, '', url);

        $.get(url, function(data) {
            $('#dynamic-content').html($(data).find('#dynamic-content').html());
        });
        // Remove class of submenu display        
        $('.has-treeview').removeClass('menu-open menu-is-opening');
        $('.nav-treeview').css('display','none');

    });

    $('a.ajax-link-pat').click(function(e) {
        e.preventDefault(); // Prevent the default link behavior
        var url = $(this).attr('href'); // Get the URL from the 
        // Remove the active-link class from all links
        $('a.ajax-link-pat').removeClass('active');

        // Add the active-link class to the clicked link
        $(this).addClass('active');

          // Update the URL in the address bar without reloading the page
          history.pushState(null, '', url);

          $('a.ajax-link').blur();        
    });

});
</script>
@endpush
