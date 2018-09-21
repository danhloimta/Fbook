@extends('layout.app')

@section('header')
    @parent
    <!-- breadcrumbs-area-start -->
    <div class="breadcrumbs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs-menu">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#" class="active">Add Your Book</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs-area-end -->
@endsection

@section('content')
<!-- user-login-area-start -->
<div class="user-login-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="login-title text-center mb-30">
                    <h2>Add Your Book</h2>
                    <p>doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo<br>inventore veritatis et quasi architecto beat</p>
                </div>
            </div>
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
                <div class="billing-fields">
                    <div class="single-register">
                        <form action="#">
                            <label>Title<span>*</span></label>
                            <input type="text"/>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                <form action="#">
                                    <label>Author<span>*</span></label>
                                    <input type="text"/>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                <form action="#">
                                    <label>Category<span>*</span></label>
                                    <select class="chosen-select" tabindex="1" style="width:100%;" data-placeholder="Default Sorting">
                                        <option value="country">Select a category</option>
                                        <option value="Islands">Novel</option>
                                        <option value="Afghanistan">BL</option>
                                        <option value="Albania">Economic</option>
                                        <option value="Samoa">Technology</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                <form action="#">
                                    <label>SKU Code<span>*</span></label>
                                    <input type="text"/>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="single-register">
                                <form action="#">
                                    <label>Publish date<span>*</span></label>
                                    <input type="date"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="single-register">
                        <form action="#">
                            <label>Description<span>*</span></label>
                            <textarea name="description" placeholder="Description"  style="width:100%;" rows="4"></textarea>
                        </form>
                    </div>
                    <div class="single-register">
                        <a href="#">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- user-login-area-end -->
@endsection

@section('footer')
    @parent
@endsection
