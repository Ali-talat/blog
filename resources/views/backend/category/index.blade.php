<x-admin-home>
    <div class="container p-5">
    @include('backend.inc.success')

    <div class="text-center">
      <a href="{{route('admin.add.category')}}" class="btn btn-primary ">add categpry</a>
    </div>
    <br>
    <br>
    <table class="table m-10">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">slug</th>
            <th scope="col">description</th>
            <th scope="col">photo</th>
            <th scope="col">status</th>
            <th scope="col">Action</th>
     
          </tr>
        </thead>
        <tbody>
        @foreach ($cats as $cat)
                
          <tr>
            <td>{{$cat->name}}</td>
            <td>{{$cat->slug}}</td>
            <td>{{$cat->description}}</td>
            <td><img src="{{$cat->photo}}" width="50" height="50" alt=""></td>
            <td>{{$cat->getStatus()}}</td>
            <td>
              <a class="btn btn-primary" href="{{route('admin.category.edit',$cat->id)}}">edit</a>
              <a class="btn btn-primary" href="{{route('admin.category.delete',$cat->id)}}">delete</a>
            </td>
      
          </tr>
        @endforeach
        
        </tbody>
      </table>
    </div>

</x-admin-home>
    