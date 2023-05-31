<x-admin-home>

     
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>add category</h4>
        </div>

        <div class="card-body">
            <form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger text-center">{{$error}}</div>
                @endforeach
            @endif
            <br>
            <div class="md-3">
                <label for="">Category name</label>
                <input type="text" name="name" class="form-control">
            </div>
            
            <div class="md-3">
                <label for="">slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            
            <div class="md-3">
                <label for="">description</label>
                <textarea rows="5" name="description" class="form-control"></textarea>
            </div>
            <div class="md-3">
                <label for="">image</label>
                <input type="file" name="photo" class="form-control">
            </div>
            <br>
            <div class="md-3 " >
                <label for="">status</label>
                <input type="checkbox" name="status" >
            </div>
            <div class="text-center">
                <button class="btn btn-primary" type="submit">save</button>
            </div>
            </form>
        </div>

    </div>

</div>
     
    
   
</x-admin-home>