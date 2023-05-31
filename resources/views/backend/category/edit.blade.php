<x-admin-home>


    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4>add category</h4>
            </div>
    
            <div class="card-body">
                <form action="{{route('admin.category.update',$cat->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="id" value="{{$cat ->id}}" type="hidden">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger text-center">{{$error}}</div>
                    @endforeach
                @endif
                <br>
                <div class="md-3">
                    <label for="">Category name</label>
                    <input type="text" value="{{$cat->name}}" name="name" class="form-control">
                </div>
                
                <div class="md-3">
                    <label for="">slug</label>
                    <input type="text" value="{{$cat->slug}}" name="slug" class="form-control">
                </div>
                
                <div class="md-3">
                    <label for="">description</label>
                    <textarea rows="5"  name="description" class="form-control">{{$cat->description}}</textarea>
                </div>
                <div class="md-3">
                    <label for="">image</label>
                    <input type="file" name="photo" class="form-control">
                </div>
                <div class="text-center mt-5">
                    <img  src="{{$cat->photo}}" width="100" height="100" alt="">
                </div>
                <br>
                <div class="md-3 " >
                    <label for="">status</label>
                    <input type="checkbox" name="status" 
                    @if ($cat->status == 1)
                        checked
                    @endif
                    >
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="submit">save</button>
                </div>
                </form>
            </div>
    
        </div>
    
    </div>


</x-admin-home>