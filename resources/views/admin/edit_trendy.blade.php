@include('admin.nav')

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color: green">{{ isset($trendy) ? 'Edit trendy' : 'Add trendy' }}</h2>
                <form
    action="{{ isset($trendy) ? route('trendy.update', $trendy->id) : route('trendy') }}"
    method="post"
    class="ug"
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($trendy))
        @method('PUT')
    @endif
    <a href="{{ route('trendylist') }}" style="    float: right;
    margin: -2rem;
    margin-right: 1rem;
" class="btn btn-primary">Back</a>


                    <div class="row">
                        <div class="col-lg-6">
                            <label for="vege_no" class="form-label">trendy No.</label>
                            <input
                                type="text"
                                class="form-control"
                                id="vege_no"
                                placeholder="Enter trendy number"
                                name="vegeno"
                                value="{{ old('vegeno', isset($trendy) ? $trendy->prodno : '') }}"
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
                                placeholder="Enter trendy name"
                                value="{{ old('name', isset($trendy) ? $trendy->name : '') }}"
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
                                value="{{ old('date', isset($trendy) ? $trendy->date : '') }}"
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
                            value="{{ old('date', isset($trendy) ? $trendy->quant : '') }}"
                            >
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 ">
                            <label for="sprice" class="form-label">Selling price</label>
                            <input type="number" class="form-control" id="sprice" name="sprice" placeholder="Enter sellling price"
                            placeholder="Enter date"
                            value="{{ old('date', isset($trendy) ? $trendy->sprice : '') }}"
                            >
                        </div>
                        <div class="col-lg-6">
                            <label for="cprice" class="form-label">Cost price</label>
                            <input type="number" class="form-control" id="cprice" name="cprice" placeholder="Enter cost price" 
                            placeholder="Enter date"
                            value="{{ old('date', isset($trendy) ? $trendy->cprice : '') }}"
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
                                >{{ old('description', isset($trendy) ? $trendy->description : '') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <!-- Visually hidden label for screen readers -->
                            @if ($trendy->image)
            <img src="{{ asset('/' . $trendy->image) }}" alt="image" class="mt-2 img-fluid " style="width:12rem; height:12rem;">
                        @else
                <p class="mt-2">No image available</p>
            @endif
            <input type="file" name="image" class="" value="" style="background-color:white;width:58rem">
        </div>
    </div>
    <button type="submit" class="btn btn-primary my-3" name="done">{{ isset($trendy) ? 'Update' : 'Save' }}</button>
    <button type="submit" class="btn btn-danger" name="done">Cancel</button>
</form>
       </div>
        </div>
    </div>
</div>
</div>
@include('admin.footer')
