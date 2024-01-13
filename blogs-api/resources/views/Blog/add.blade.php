@include('src/header')
@include('src/sidebar')
@include('src/navbar')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Form elements</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Add Blog</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- <div class="row">
                            <div class="col-lg-8">
                                <p class="mb-0">
                                    For custom form validation messages, you’ll need to add the novalidate boolean attribute to your <code>&lt;form&gt;</code>. This disables the browser default feedback tooltips, but still provides access to the form
                                    validation APIs in JavaScript.
                                    <br /><br />
                                    When attempting to submit, you’ll see the<code>:invalid</code> and <code>:valid</code> styles applied to your form controls.
                                </p>
                            </div>
                        </div>
                        <hr /> -->
                        <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{url('/blog/store')}}" method="POST">
                            <!-- {{csrf_field()}} -->
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="validationCustom01">Title</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="title" placeholder="Title" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Body</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="body" placeholder="Body" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="customFileLang" lang="en" accept="image/*">
                                        <label class="custom-file-label" for="customFileLang"></label>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        This field is required
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

    @include('src/footer')