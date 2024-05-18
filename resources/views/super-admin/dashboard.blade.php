@include("layout.adminLayout")
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Services</p>
                <h5 class="font-weight-bolder mb-0">
                  {{\App\Models\Service::count()}}

                </h5>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                  <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route("service") }}"><span class="text-danger">      Show Details </span></a>
              </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa-solid fa-server"></i>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Categories</p>
                <h5 class="font-weight-bolder mb-0">
                  {{\App\Models\Category::count()}}
                </h5>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                  <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route("category") }}"><span class="text-danger">      Show Details </span></a>
              </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa-solid fa-list"></i>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Users</p>
                <h5 class="font-weight-bolder mb-0">
                  {{\App\Models\User::select("*")->where("role","=",0)->count()}}
                </h5>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                  <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route("superAdminUsers") }}"><span class="text-danger">      Show Details </span></a>
              </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa-solid fa-user"></i>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Requests</p>
                <h5 class="font-weight-bolder mb-0">
                  {{\App\Models\Requests::count()}}
                </h5>
                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                  <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route("request") }}"><span class="text-danger">      Show Details </span></a>
              </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fa-solid fa-circle-exclamation"></i>                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>




<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-header pb-0">
          <h6>Services Categories</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
      <div class="container">
        <div class="row m-2 ">
            <?php $i = 0; ?>

            @foreach ($catigories as $category)
            <?php $i++; ?>
            <div class="card col-lg-3 mt-5 col-12 me-5 card-background shadow-none card-background-mask-dark" id="sidenavCard">
                <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
                <div class="card-body text-start p-3 w-90">
                  <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                    <i class="fa-solid text-primary fa-list"></i>
                </div>
                  <div class="docs-info">
                    <h6 class="text-white up mb-0">{{ $category->name }}</h6>
                    <p class="text-xs font-weight-bold">{{ $category->desc }}</p>
                    <a href="#{{ $category->id }}" class="btn btn-white btn-sm w-100 mb-0">Show Services</a>
                  </div>
                </div>
            </div>               
        @endforeach
        </div>
        </div>      
    </div>
</div>
<div class="card-header pb-0">
    <h6>Services</h6>
</div>

<div class="row mt-4">
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
                <div class="card col-lg-3 mt-5 col-12 me-5 card-background shadow-none card-background-mask-white" id="sidenavCard">
                    <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
                    <div class="card-body text-start p-3 w-90">
                      <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="fa-solid  text-primary fa-server"></i>
                    </div>
                      <div class="docs-info">
                        <h6 class="text-white up mb-0">{{ $comp->name }}</h6>
                        <p class="text-xs font-weight-bold"> {{ $comp->desc }}</p>
                        {{-- <a href="{{ route("user_event1",$comp->id) }}" target="_blank" class="btn btn-white btn-sm w-100 mb-0">JOIN</a> --}}
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





