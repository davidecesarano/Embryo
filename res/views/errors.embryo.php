@include('layout/header', [
    'title' => 'Error',
    'css'   => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
])

    <div class="d-flex flex-column justify-content-center h-100 text-center">
        <h1 class="display-1">{{ $title }}</h1>
    </div>

@include('layout/footer', [
    'js' => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'
])