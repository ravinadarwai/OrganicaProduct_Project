@include('admin.nav')

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color: green">{{ isset($fish) ? 'Edit fish' : 'Add fish' }}</h2>
                <form
    action="{{ isset($fish) ? route('fish.update', $fish->id) : route('fish') }}"
    method="post"
    class="ug"
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($fish))
        @method('PUT')
    @endif

    <a href="{{ route('fishlist') }}" style="    float: right;
    margin: -2rem;
    margin-right: 1rem;
" class="btn btn-primary">Back</a>


                    <div class="row">
                        <div class="col-lg-6">
                            <label for="fish_no" class="form-label">fish No.</label>
                            <input
                                type="text"
                                class="form-control"
                                id="fish_no"
                                placeholder="Enter fish number"
                                name="fishno"
                                value="{{ old('fishno', isset($fish) ? $fish->prono : '') }}"
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name" class="form-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                id="name"
                                aria-describedby="emailHelp"
                                placeholder="Enter fish name"
                                value="{{ old('name', isset($fish) ? $fish->name : '') }}"
                            >
                        </div>
                        <div class="col-lg-6">
                            <label for="date" class="form-label">Date</label>
                            <input
                                type="date"
                                class="form-control"
                                id="Route"
                                name="date"
                                placeholder="Enter date"
                                value="{{ old('date', isset($fish) ? $fish->date : '') }}"
                            >
                        </div>
                    </div>

                    
                    <div class="row">
                     
                        <div class="col-lg-6">
                            <label for="quant" class="form-label">Quantity</label>
                            <input 
                            type="number" 
                            class="form-control" 
                            id="quant" 
                            name="quant"
                            placeholder="Enter date"
                            value="{{ old('date', isset($fish) ? $fish->quant : '') }}"
                            >
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 ">
                            <label for="sprice" class="form-label">Selling price</label>
                            <input type="number" class="form-control" id="sprice" name="sprice" placeholder="Enter sellling price"
                            placeholder="Enter date"
                            value="{{ old('date', isset($fish) ? $fish->sprice : '') }}"
                            >
                        </div>
                        <div class="col-lg-6">
                            <label for="cprice" class="form-label">Cost price</label>
                            <input type="number" class="form-control" id="cprice" name="cprice" placeholder="Enter cost price" 
                            placeholder="Enter date"
                            value="{{ old('date', isset($fish) ? $fish->cprice : '') }}"
                            >
                        </div>
                    </div>

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
                                >{{ old('description', isset($fish) ? $fish->description : '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <!-- Visually hidden label for screen readers -->
                            @if ($fish->image)
            <img src="{{ asset('/' . $fish->image) }}" alt="image" class="mt-2 img-fluid " style="width:12rem; height:12rem;">
                        @else
                <p class="mt-2">No image available</p>
            @endif
            <input type="file" name="image" class="" value="" style="background-color:white;width:58rem">
        </div>
    </div>
    <button type="submit" class="btn btn-primary my-3" name="done">{{ isset($fish) ? 'Update' : 'Save' }}</button>
    <button type="submit" class="btn btn-danger" name="done">Cancel</button>
</form>
       </div>
        </div>
    </div>
</div>
</div>
@include('admin.footer')
