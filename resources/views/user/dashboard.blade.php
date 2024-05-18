@include("layout.layout")


<div class="container-fluid py-4 p-5 mt-5">
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <p class="mb-1 pt-2 text-bold">Welcome</p>
                  <h1 class="font-weight-bolder">{{ Auth::user()->name }}</h1>
                  <p class="mb-5"> your go-to provider for a wide array of top-tier services designed to meet the diverse needs of businesses and individuals alike. From technology solutions to consulting and beyond</p>
                </div>
              </div>
              <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                <div class="bg-gradient-primary border-radius-lg h-100">
                  <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                  <div class="position-relative d-flex align-items-center justify-content-center h-100">
                    <img class="w-100 position-relative z-index-2 pt-4" src="../assets/img/illustrations/rocket-white.png" alt="rocket">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card h-100 p-3">
          <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
            <span class="mask bg-gradient-dark"></span>
            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
              <h5 class="text-white font-weight-bolder mb-4 pt-2">Do you have a problem?</h5>
              <p class="text-white">We have a special and alot of services that will help you to slove or fix your problem in a specialy way</p>
              <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="{{ route("service1") }}">
                Explore More
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <h6>Your Requests to Support</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
          <div class="container" id="Request">
            <div class="row m-2 ">
                <?php $i = 0; ?>
                @foreach ($requests as $request)
                <?php $i++; ?>
                <div class="card col-lg-3 mt-5 col-12 me-5 card-background shadow-none card-background-mask-dark" id="sidenavCard">
                    <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpg')"></div>
                    <div class="card-body text-start p-3 w-90">
                      <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="fa-solid text-primary fa-circle-exclamation"></i>                     </div>
                      <div class="docs-info">
                        <h4 class="text-white up mb-0">{{ $request->name }}</h4>
                        <h5 class="text-xs text-white font-weight-bold">{{ $request->category->name }}</h5>
                        <h6 class="text-xs text-white font-weight-bold">{{ $request->service->name }}</h6>
                        <p class="text-xs font-weight-bold">{{ $request->desc }}</p>
                        <form method="post" style="display: inline" action="{{route('deleteRequest',$request->id)}}">
                          @method("delete")
                          @csrf
                          <button class="btn btn-info btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                          </form>
                                              </div>
                    </div>
                </div>               
            @endforeach
            </div>
            </div>      
        </div>
    </div>
    


    <footer class="footer pt-3 mt-5">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>2024,
              made with <i class="fa fa-heart" aria-hidden="true"></i> by
              <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">S O F Y</a>
              for a better web.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="{{ route("service1") }}" class="nav-link text-muted" >Service</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted">Your Requests</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>