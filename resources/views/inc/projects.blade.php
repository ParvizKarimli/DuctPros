<!-- START PROJECTS -->
<div id="projects" class="bg-blue-light">
    <div class="container">
        <div class="row d-flex align-items-center">

            <div class="col-lg-12 d-flex text-center">
                <div class="section-start-col w-50">
                    <div class="float-left">
                        <h2 class="heading-icon">Recent Projects</h2>
                    </div>
                </div>
            </div>

            @foreach($projects as $project)
                <div class="col-lg-4">
                    <div class="hover-eff-warp">
                        <div>
                            <img src="/storage/images/projects/{{ $project->image }}" class="w-100" width="400" height="300" alt="project image" />
                        </div>
                        <div class="hover-eff-content hover-eff-bottom">
                            <h5>{{ $project->description }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- END PROJECTS -->
