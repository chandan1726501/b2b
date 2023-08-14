@extends('layout.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h4 class="page-title">Users Student</h4>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Manage Users</li>
                            <li class="breadcrumb-item active" aria-current="page">User Add</li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-8 col-12">
                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Add New User</h4>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                            <!-- <div class="col-md-6"> -->
                                    <div class="form-group">
                                        <label class="form-label">Grade</label>
                                        <select class="form-control" name="grade_ids[]" style="width: 100%;"
                                            id="grade_ids" multiple="multiple">
                                            <option value="">Select Grade</option>
                                            @foreach ($grades as $grade)
                                                @php $gradeIds = old('grade_ids'); @endphp
                                                <option value="{{ $grade->id }}"
                                                    {{ !empty($gradeIds) && in_array($grade->id, $gradeIds) ? 'selected' : '' }}>
                                                    {{ $grade->class_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('grade_ids')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
<!-- </div> -->
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="hidden" name="school" value="{{ $schoolid }}">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>

        </div>
    </section>
    <!-- /.content -->
@endsection
