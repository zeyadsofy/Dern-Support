@include("layout.layout")


<div class="row p-5 mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        @foreach ($catigories as $category )
        <div class="card">
            <div class="card-header pb-0">
              <h6> {{ $category->name }} Services</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="container">
                <div class="row m-2 " id="{{ $category->id }}">
                    @foreach (\App\Models\Service::where("category_id","=", $category->id)->get() as $comp)
                <div class="card col-lg-3 mt-5 col-12 me-5 card-background shadow-none card-background-mask-dark" id="sidenavCard">
                    <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
                    <div class="card-body text-start p-3 w-90">
                      <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="fa-solid  text-primary fa-server"></i>
                    </div>
                      <div class="docs-info">
                        <h6 class="text-white up mb-0">{{ $comp->name }}</h6>
                        <p class="text-xs font-weight-bold"> {{ $comp->desc }}</p>
                        <a href="{{ route("addRequest",$comp->id) }}" class="btn btn-white btn-sm w-100 mb-0">Send Request</a>
                      </div>
                    </div>
                </div>
                @endforeach
                </div>
                </div>        
          </div>
        @endforeach

    </div>
</div>