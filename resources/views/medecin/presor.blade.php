<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ordonnance</title>
    <style>
        /* Styles pour la mise en page */
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .info {
            margin-bottom: 20px;
            
        }
        .info p {
            margin: 0;
            font-size: 16px;
        }
       
       
       
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th {
            background-color: #e3e3e3;
            padding: 8px;
            text-align: left;
        }
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .total {
            text-align: right;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Ordonnance</h1>
    </div>
 
        <table>
            <tr>
                <td>
    <div class="info">
        <p><strong>Nom du patient :</strong>  {{ $patient->prenom }} {{ $patient->nom }}</p>
        <p><strong>Adresse :</strong> {{ $patient->adresse }}</p>
        <p><strong>Date :</strong> {{ $date }}</p>
    </div>
    </td>
    <td>    <div class="info1">
        <p><strong>Hopital :</strong>SJD-Medical</p>
        <p><strong>Adresse:</strong> Thiès-Nguinth Sérère</p>
        <p><strong>Médecin :</strong>{{ $medecin->prenom }} {{ $medecin->nom }} </p>
    </div>
    </td>

    
    </tr>
    </table><br>
    <table>
        <thead>
            <tr>
                <th>Médicament</th>
                <th>Quantité</th>
                
            </tr>
        </thead>
        <tbody>
          
            @foreach($medicament as $med)
                <tr>
                    <td>{{ $med->libelle }}</td>
                    <td>{{ $med->quantite }}</td>
                    
                </tr>
               
            @endforeach
        </tbody>
       
    </table>
</body>
</html>