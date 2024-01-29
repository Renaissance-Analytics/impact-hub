@section('title', 'Oops: 404')

@section('code', '404')
@section('message', 'Page Not Found')
<x-uc-layout :type="404">
    <h1 class="mb-5 text-5xl font-bold">
        An ERROR has occurred
    </h1>
    <p class="mb-5">
        The request you were requesting could not be requested. The End. Please check back later, maybe it might matter.
    </p>
    <div class="flex justify-center">
        <a href="{{ route('home') }}" class="btn btn-primary">Go Home</a>
    </div>

</x-uc-layout>


