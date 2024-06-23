<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        /* Styles généraux pour les labels et les div */
        label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .div_deg {
            margin-bottom: 20px;
        }
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        /* Styles pour les inputs */
        input[type=text],
        input[type=number],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        /* Styles pour les boutons */
        .btn-primary,
        .btn-secondary {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }
        /* Styles spécifiques au formulaire */
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="div_center">
                    <h1 style="font-size: 30px; font-weight: bold;">Add Rooms</h1>

                    <div class="form-container">
                        <form action="{{ url('add_room') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="div_deg">
                                <label>Titre Chambre</label>
                                <input type="text" name="title" required>
                            </div>
                            <div class="div_deg">
                                <label>Description</label>
                                <textarea name="description" rows="4" required></textarea>
                            </div>
                            <div class="div_deg">
                                <label>Prix</label>
                                <input type="number" name="price" required>
                            </div>
                            <div class="div_deg">
                                <label>Type Chambre</label>
                                <select name="type" required>
                                    <option selected disabled>choisir votre type</option>
                                    <option value="regular">Réguliaire</option>
                                    <option value="premium">Prime</option>
                                    <option value="deluxe">Deluxe</option>
                                </select>
                            </div>
                            <div class="div_deg">
                                <label>Wifi</label>
                                <select name="wifi" required>
                                    <option selected disabled>Séléctionner la disponibilité du wifi</option>
                                    <option value="yes">Oui</option>
                                    <option value="no">Non</option>
                                </select>
                            </div>
                            <div class="div_deg">
                                <label>Ajouter Image</label>
                                <input type="file" name="image">
                            </div>
                            <div class="div_deg">
                                <input class="btn btn-primary" type="submit" value="Add Room">
                                <a href="javascript:history.back()" class="btn btn-secondary">Annuler</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')
</body>
</html>
