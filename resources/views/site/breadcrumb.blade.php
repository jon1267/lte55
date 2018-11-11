<!-- Section Title -->
<section class="section_title">
    <div class="overlay_title"></div>
    <div class="container">
        <div class="row">
            <!--breadcrumb-->
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="breadcrumb_section">
                    <a href="{{ route('index.home') }}">Home</a> <span>/</span> {{ $breadCrumb }}
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col-xs-8 col-sm-8 col-md-8">
                <h1>{{ $breadCrumb }}</h1>
            </div>

        </div>
    </div>
</section>
<!-- Section Title -->