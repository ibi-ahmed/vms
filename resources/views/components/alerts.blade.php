@if (session('success'))
    <div class="row">
        <div class="col-sm-8 offset-sm-2">           
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <div><i class="my-1" data-feather="info"></i><span class="px-2">{{ session('success') }}</span></div> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@elseif (session('error'))
    <div class="row">
        <div class="col-sm-8 offset-sm-2">           
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <div><i class="my-1" data-feather="alert-triangle"></i><span class="px-2">{{ session('error') }}</span></div> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if ($errors->any())
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="pt-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close mt-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif


