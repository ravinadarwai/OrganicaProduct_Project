@include('admin.nav') <!-- Include your layout file here if you have one -->

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color: green">{{ isset($fruit) ? 'Edit Metadata' : 'Add Metadata' }}</h2>
                <form action="{{ isset($fruit) ? route('meta.update', $fruit->id) : route('meta.store') }}" method="POST" class="ug" enctype="multipart/form-data">
    @csrf
    @if(isset($fruit))
        @method('PUT')
    @endif


                    <a href="{{ route('metalist') }}" style="float: right; margin: -2rem; margin-right: 1rem;" class="btn btn-primary">Back</a>

                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Description</label>
                                <textarea
                                    class="form-control"
                                    name="description"
                                    placeholder="Leave a comment here"
                                    id="floatingTextarea2"
                                    style="height: 100px"
                                >{{ old('description', isset($fruit) ? $fruit->description : '') }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <label for="keyword" class="form-label">Keyword</label>
                            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword" value="{{ old('keyword', isset($fruit)? $fruit->keyword : '') }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title', isset($fruit) ? $fruit->title : '') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" value="{{ old('url', isset($fruit) ? $fruit->url : '') }}">
                        </div>
                    </div>


                    <!-- Add more fields as needed -->

                 
    <button type="submit" class="btn btn-primary my-3" name="done">{{ isset($fruit) ? 'Update' : 'Save' }}</button>
</form>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
