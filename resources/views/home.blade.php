@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

                <div class="row">
                    <div class="col-md-12">
                        @if(Session::has('catmessage'))
                            <div class="alert alert-success">
                                {{Session::get('catmessage')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="form-group">
                            <h2>Categories</h2>
                            <ul>
                                @foreach($categories as $category)
                                    <li>{{$category->categoryname}}
                                        <span>
                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editCatModal{{$category->id}}">Edit</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteCategoryModal{{$category->id}}"> X </button>
                                        </span>
                                    </li>
                                    <!-- Delete Category Modal -->
                                    <div class="modal fade" id="deleteCategoryModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{route('category.delete')}}" method="post" enctype="multipart/form-data">@csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">DELETE - Are you sure?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="category_id" value="{{$category->id}}">
                                                        Do you want to delete the category <strong>{{$category->categoryname}}</strong>?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">NO</button>
                                                        <button type="submit" class="btn btn-danger btn-sm">YES</button> </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Edit Category -->
                                    <div class="modal fade" id="editCatModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('category.update', [$category->id])}}" method="post" enctype="multipart/form-data">@csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category Name</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="propname">Category Name</label>
                                                            <input type="text" name="categoryname" class="form-control @error('categoryname') is-invalid @enderror" value="{{ $category->categoryname }}">
                                                            @error('propname')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-dark btn-sm">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                            <form action="{{route('category.add')}}" method="post" enctype="multipart/form-data">@csrf
                            <label for="name">Add category</label>
                            <input type="text" name="categoryname" id="name" class="form-control @error('height') is-invalid @enderror" value="{{ old('categoryname') }}">
                            @error('height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                                <input type="submit" value="Add Category" class="btn btn-dark">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>

        </div>
        <div class="col-md-8">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($message = Session::get('success'))
                <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        x
                    </button>
                    <strong>{{$message}}</strong>
                </div>
            @endif
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewArtwork">
                Add New Artwork
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addNewArtwork" tabindex="-1" role="dialog" aria-labelledby="addNewArtworkTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ url('home') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewArtworkLongTitle">Add New Artwork</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <label for="artwork">Artwork</label>
                                <input type="file" id="artwork" name="file" class="image form-control">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">
                                <label for="title">Size</label>
                                <input type="text" name="size" class="form-control">
                                <label for="title">Price</label>
                                <input type="text" name="price" class="form-control">
                                <label for="category">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Please select</option>
                                    @foreach(App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->categoryname}}</option>
                                    @endforeach
                                </select>
                                <label for="artistNotes">Notes</label>
                                <textarea name="artistNotes" class="form-control" id="" cols="30" rows="10">
                                </textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Dashboard</div>
                <table class="table table-hover">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Size</th>
                        <th scope="col">Category</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Artwork</th>
                        <th scope="col">Actions</th>
                    </tr>

                @foreach($artworks as $artwork)
                    <tr>
                        <td>{{$artwork->id}}</td>
                        <td>{{$artwork->title}}</td>
                        <td>{{$artwork->size}}</td>
                        <td>{{$artwork->category}}</td>
                        <td>{{$artwork->artistNotes}}</td>
                        <td>
                            <a data-fancybox="gallery" href="/images/gallery/{{$artwork->file}}">
                                <img src="/images/gallery/{{$artwork->file}}" width="100" alt="">
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editArtModal{{$artwork->id}}">
                                Edit
                            </button>
                        </td>
                    </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editArtModal{{$artwork->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$artwork->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">@csrf
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" name="title" value="{{$artwork->title}}">
                                            <label for="title">Size</label>
                                            <input type="text" class="form-control" name="size" value="{{$artwork->size}}">
                                            <label for="title">Category</label>
                                            <select name="category" id="">
                                                <option value="">Please select</option>
                                                @foreach(App\Category::all() as $cat)
                                                    <option value="{{$cat->id}}"{{$artwork->category_id==$cat->id?'selected':''}}>{{$cat->categoryname}}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control" name="title" value="{{$artwork->title}}">
                                            <label for="title">Notes</label>
                                            <textarea name="artistNotes" id="" cols="30" rows="10">{{$artwork->artistNotes}}</textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
                </table>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                {{ $artworks->links() }}
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
