<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px;
        }
        .div_deg{
            padding-top: 30px;
        }
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .page-header {
    box-shadow: 0 0 3px rgba(0, 0, 0, 0.3); /* Ombre de boîte avec une légère transparence */
    width: 60%; /* Largeur de 90% */
    margin:20px auto; /* Centre horizontalement */

    padding: 20px; /* Ajout de marge intérieure pour un meilleur espacement */
    background-color: #ffffff; /* Couleur de fond */
}

    </style>
  </head>
  <body>
   @include('admin.header')
    @include('admin.sidebar')
    <div  class="page-content">
    <div class="page-header">
        <div class="container">
            <div class="text-center">
                <h1 class="display-4">Update Room</h1>
            </div>

            <form action="{{ url('edit_room', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Room Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->room_title }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $data->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}">
                </div>
                <div class="form-group">
                    <label for="type">Room Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="{{ $data->room_type }}" selected>{{ $data->room_type }}</option>
                        <option value="regular">Regular</option>
                        <option value="premium">Premium</option>
                        <option value="deluxe">Deluxe</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wifi">Free Wifi</label>
                    <select class="form-control" id="wifi" name="wifi">
                        <option value="{{ $data->wifi }}" selected>{{ $data->wifi }}</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="current_image">Current Image</label>
                    <div>
                        <img src="/room/{{ $data->image }}" alt="Current Image" class="img-thumbnail" style="max-width: 100px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Upload New Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update Room</button>
                
                <!-- Cancel button -->
                <a href="javascript:history.back()" class="btn btn-secondary">Cancel</a>
                <!-- This will go back to the previous page in the browser history -->
            </form>
        </div>
    </div>
</div>



    @include('admin.footer')
  </body>
</html>
