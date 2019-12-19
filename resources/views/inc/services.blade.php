<!-- START SERVICES -->
<div id="services">
    <div class="container">
        <div class="row d-flex align-items-center">

            <div class="col-lg-12 d-flex text-center">
                <div class="section-start-col w-50">
                    <div class="float-left">
                        <h2 class="heading-icon">What We Offer</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="service-carousel row">

                    @foreach($services as $service)
                        <div>
                            <div class="service-item">
                                <div class="service-item-img">
                                    <img src="/storage/images/services/{{ $service->image }}" alt="service image" class="w-100" width="400" height="300" />
                                    <i class="mdi mdi-broom service-item-icon"></i>
                                </div>
                                <div class="card">
                                    <h5>{{ $service->title }}</h5>
                                    <p>
                                        {{ $service->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
<!-- END SERVICES -->
