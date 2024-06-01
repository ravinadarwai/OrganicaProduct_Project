@include('admin.nav')

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container mt-5">
            <div class="uh">
                <h2 style="color : green">Add fruits</h2>
                <form action="{{ route('fruitstore')}} " method="post" class="ug" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">

                            <label for="prono" class="form-label">product no</label>
                            <input type="text" class="form-control" id="prono" placeholder="Enter vege number" name="prono">
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-6 ">
                           
                            <label for="name" class="form-email">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter vege name">
                        </div>
                        <div class="col-lg-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="Route" name="date" placeholder="Enter date">
                        </div>

                    </div>

                    <div class="row">
                        

                        <div class="col-lg-6">
                            <label for="quant" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quant" name="quant">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6 ">
                            <label for="sprice" class="form-label">Selling price</label>
                            <input type="number" class="form-control" id="sprice" name="sprice" placeholder="Enter sellling price">
                        </div>
                        <div class="col-lg-6">
                            <label for="cprice" class="form-label">Cost price</label>
                            <input type="number" class="form-control" id="cprice" name="cprice" placeholder="Enter cost price">
                        </div>
                    </div>
                    <div class="row mt-4">

                        <div class="col-lg-12">
                            <div class="form-floating">
                                <label for="floatingTextarea2">Description</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"name="description" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mt-4">

<div class="col-lg-12">
    <div class="form-floating">
    <label for="file">Product image</label>
    <input type="file" name="image" class=" w-100" id="customFile" multiple />

    </div>
</div>
</div>


                    <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
                    <button type="submit" class="btn btn-primary my-3" name="done">Save</button> <button type="submit" class="btn btn-danger" name="done">Cancel</button>


            </div>
        </div>

        </form>
    </div>


</div>
</div>
@include('admin.footer')         