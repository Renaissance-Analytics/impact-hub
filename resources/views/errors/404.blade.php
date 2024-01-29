@section('title', 'Oops: 404')

@section('code', '404')
@section('message', 'Page Not Found')
<x-uc-layout :type="404">
    <h1 class="mb-5 text-5xl font-bold">
        Under Construction
    </h1>
    <p class="mb-5">
        The page you are looking for does not exist....or does it?
    </p>
    <div class="flex justify-center">
        <a href="/" class="btn btn-primary">Go Home</a>
    </div>

</x-uc-layout>


