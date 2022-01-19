@extends('layouts.app')
@section('title', 'Edit Product')

@section('navbar')
    @parent
@endsection

@section('slidebar')
    @parent
@endsection
@section('script')
@parent
@endsection
@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <p class="card-description">
                    Change current product
                </p>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Product Name">
                    </div>
                    <div class="row">
                <div class="col-md-6">
                    <div class="form-group row" >
                            <label>Image</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary btn-md" style="padding-top: 8px;padding-bottom: 10px;" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                </div>
                <div class="col-md-2">
                <div class="form-group row">
                    <img src="../../images/faces/face6.jpg" alt="image product"/>
                </div>
                </div>
            </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="10" style="height:100px;"></textarea>
                    </div>
                    <div class=" grid-margin stretch-card">
                        <div class=" card">
                                <div class="card-body">
                                    <h4 class="card-title">Select option</h4>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect">Brands</label>
                                        <select class="form-control" id="exampleFormControlSelect">
                                            <option>Macbook</option>
                                            <option>Dell</option>
                                            <option>Lenovo</option>
                                            <option>Asus</option>
                                            <option>MSI</option>
                                            <option>HP</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">RAM</label>
                                        <select class="form-control" id="exampleFormControlSelect2">
                                            <option>4GB</option>
                                            <option>8GB</option>
                                            <option>16GB</option>
                                            <option>32GB</option>
                                            <option>64GB</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect3">Disk Type</label>
                                        <select class="form-control" id="exampleFormControlSelect3">
                                            <option>SSD</option>
                                            <option>HDD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" card">
                            <div class="card-body">
                                <h4 class="card-title">Input Option</h4>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" class="form-control form-control-sm" placeholder="Price" aria-label="Price">
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control form-control-sm" placeholder="Amount" aria-label="Amount">
                                </div>
                                <div class="form-group">
                                    <label>Color code</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Color code" aria-label="ColorCode">
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="form-check form-check-primary">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" checked>
                                Sell
                            </label>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection