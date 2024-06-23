<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
      @include('home.css')

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

      <style type="text/css">
         label {
            display: inline-block;
            width: 200px;
         }
         input {
            width: 100%;
         }
         .facture-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 50px auto;
         }
         .facture-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
         }
         .facture-logo {
            max-width: 150px;
            margin-bottom: 20px;
         }
         .facture-title {
            font-weight: bold;
            margin-bottom: 20px;
         }
         .facture-details {
            margin-bottom: 20px;
         }
         .facture-details p {
            margin: 0;
         }
         .facture-table th {
            background-color: #007bff;
            color: white;
         }
         .facture-table tfoot td {
            font-weight: bold;
         }
         .facture-footer {
            text-align: center;
            margin-top: 20px;
         }
      </style>
   </head>
   <body class="main-layout">
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <header>
         @include('home.header')
      </header>

      <div class="facture-container">
         <div class="facture-header">
            <img src="{{ asset('images/log.png') }}" alt="Logo" class="facture-logo">
            <div>
               <h2 id="date-facture">Date de facture :</h2>
               <h2>Facture #12345</h2>
            </div>
         </div>
         <div class="row facture-details">
            <div class="col-8">
               <div class="facture-recipient">
                  <p><strong>Destinataire :</strong></p>
                  <p>Nom : {{ Auth::user()->name }}</p>
                  <p>Email : {{ Auth::user()->email }}</p>
                  <p>Téléphone : {{ Auth::user()->phone }}</p>
                  <p>Adresse : 123 Rue Exemple, 75001 Bouznika, Maroc</p>
               </div>
            </div>
            <div class="col-4 text-end">
               <div class="facture-sender">
                  <p><strong>Émetteur :</strong></p>
                  <p>Hotel : ROYAL</p>
                  <p>456 Rue , 75002 Marrakech, Maroc</p>
                  <p>Email : royal@xyz.com</p>
                  <p>Téléphone : +212 732 334 223</p>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <table class="table table-bordered facture-table">
                  <thead>
                     <tr>
                        <th>Chambre</th>
                        <th>Nombre de jours</th>
                        <th>Prix d'une journée</th>
                        <th>Total</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($rooms as $room)
                     <tr>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->days }}</td>
                        <td>{{ $room->price_per_day }}€</td>
                        <td>{{ $room->total_price }}€</td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tfoot>
                     <tr>
                        <td colspan="3" class="text-end">Total</td>
                        <td>{{ collect($rooms)->sum('total_price') }}€</td>
                     </tr>
                  </tfoot>
               </table>
            </div>
         </div>
         <div class="facture-footer">
            <p>Merci pour votre achat!</p>
         </div>
        <button class="print btn btn-primary">
               Imprimer
        </button>
      </div>
      

      @include('home.footer')
   
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      <script>
         document.addEventListener("DOMContentLoaded", function() {
             const date = new Date();
             const options = { year: 'numeric', month: 'long', day: 'numeric' };
             const formattedDate = date.toLocaleDateString('fr-FR', options);
             document.getElementById("date-facture").textContent += ` ${formattedDate}`;

             const btn=document.querySelector('.print')
             btn.addEventListener('click',function(){
                  print()
             })
         });
      </script>

   </body>
</html>
