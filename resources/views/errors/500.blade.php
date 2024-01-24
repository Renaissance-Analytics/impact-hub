@section('title', 'Oops: 404')

@section('code', '404')
@section('message', 'Page Not Found')
<x-layouts.uc :type="404">
    <h1 class="mb-5 text-5xl font-bold">
        An ERROR has occured
    </h1> 
    <p class="mb-5">
        The request you were requestinged could not be requested. the End. Please check back later, maybe it might matter.
    </p> 
    <div class="flex justify-center">
        <a href="/" class="btn btn-primary">Go Home</a>
    </div>
    
</x-layouts.uc>


