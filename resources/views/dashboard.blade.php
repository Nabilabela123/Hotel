<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
   @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      @include('admin.body')
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Tableau de bord - Réservation d'Hôtels</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Statistiques Chambres</h5>
                    <p class="card-text">Nombre total des chambres : <strong>{{ $nombrechambre }}</strong></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Réservations en Cours</h5>
                    <p class="card-text">Nombre de réservations : <strong>{{ $nombreReservation }}</strong></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Dernières Réservations
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($threeLastBookings as $booking)
                        <li class="list-group-item">Réservation #{{ $booking->id }}  - Date de debut {{ $booking->start_date }} - Date du fin {{ $booking->end_date }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>




        @include('admin.footer')
  </body>
</html>
