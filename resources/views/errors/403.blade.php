
@section('title', 'Oops: 403')

@section('code', '403')
@section('message', 'Forbidden')
<x-layouts.uc:403>

        <div>
            <h1 class="mb-5 text-5xl font-bold">
                403 DENIED
            </h1>
            <p class="mb-5">
                Umm, what do you think you are doing? 
            </p>
            <a href="/" class="btn btn-primary glass">Get out of my room!</a> or <a href="/login" class="btn btn-secondary glass">Login</a>
        </div>
    
</x-layouts.uc:403>

