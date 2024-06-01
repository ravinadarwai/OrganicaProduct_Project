@include('admin.nav')

<div class="dashboard-wrapper ">
    <div class="dashboard-ecommerce ">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color: green">{{ isset($vegetable) ? 'Edit Vegetable' : 'Add Vegetable' }}</h2>
               
                <form
    action="{{ isset($vegetable) ? route('vegetables.update', $vegetable->id) : route('vege') }}"
    method="post"
    class="ug"
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($vegetable))
        @method('PUT')
    @endif
    <a href="{{ route('vegelist') }}" style="    float: right;
    margin: -2rem;
    margin-right: 1rem;
" class="btn btn-primary">Back</a>

    

                    <div class="row">
                        <div class="col-lg-6">
                            <label for="vege_no" class="form-label">Vegetable No.</label>
                            <input
                                type="text"
                                class="form-control"
                                id="vege_no"
                                placeholder="Enter vegetable number"
                                name="vegeno"
                                value="{{ old('vegeno', isset($vegetable) ? $vegetable->vegeno : '') }}"
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
                                placeholder="Enter vegetable name"
                                value="{{ old('name', isset($vegetable) ? $vegetable->name : '') }}"
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
                                value="{{ old('date', isset($vegetable) ? $vegetable->date : '') }}"
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
                            value="{{ old('date', isset($vegetable) ? $vegetable->quant : '') }}"
                            >
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 ">
                            <label for="sprice" class="form-label">Selling price</label>
                            <input type="number" class="form-control" id="sprice" name="sprice" placeholder="Enter sellling price"
                            placeholder="Enter date"
                            value="{{ old('date', isset($vegetable) ? $vegetable->sprice : '') }}"
                            >
                        </div>
                        <div class="col-lg-6">
                            <label for="cprice" class="form-label">Cost price</label>
                            <input type="number" class="form-control" id="cprice" name="cprice" placeholder="Enter cost price" 
                            placeholder="Enter date"
                            value="{{ old('date', isset($vegetable) ? $vegetable->cprice : '') }}"
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
                                >{{ old('description', isset($vegetable) ? $vegetable->description : '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <!-- Visually hidden label for screen readers -->
                            @if ($vegetable->image)
            <img src="{{ asset('/' . $vegetable->image) }}" alt="image" class="mt-2 img-fluid " style="width:12rem; height:12rem;">
                        @else
                <p class="mt-2">No image available</p>
            @endif
            <input type="file" name="image" class="" value="" style="background-color:white;width:58rem">
        </div>
    </div>
    <button type="submit" class="btn btn-primary my-3" name="done">{{ isset($vegetable) ? 'Update' : 'Save' }}</button>
    <button type="submit" class="btn btn-danger" name="done">Cancel</button>
</form>
       </div>
        </div>
    </div>
</div>
</div>
@include('admin.footer')
