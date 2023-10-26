@extends('admin.master')

@section('title')
    Create Role Type
@endsection

@section('style')

@endsection

@section('body')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('roletype.index') }}">Role Type</a></li>
                    <li class="breadcrumb-item active">Role Type Create</li>
                </ol>
            </div>
            <h4 class="page-title">Role Create</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Create Role Type</strong></div>
            <div class="card-body card-block">
                <form action="{{ route('roletype.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class=" form-control-label">Role Type</label>
                        <input type="text" id="name" name="name" placeholder="Enter your Role Type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status" class=" form-control-label">Status: </label>
                        <label ><input type="radio" name="status" value="1" checked > Published</label>
                        <label ><input type="radio" name="status" value="0" > UnPublished</label>
                    </div>
                    <div class="form-group">
                        <div class="from-group">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).on('change', '#userId', function(){
            var userId = $(this).val();
            console.log(userId);
            $.ajax({
                url: "{{ route('role.getuser') }}",
                method: "POST",
                dataType: "json",
                data: {
                    user_id: userId,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log(response);
                    var option = '';
                    option += '<option value="'+response.id+'">'+response.name+'</option>';
                    $('#userName').empty().append(option);
                }
            });
        });
    </script>
@endsection