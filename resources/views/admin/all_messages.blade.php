<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <style type="text/css">
        .table_deg {
            border: 2px solid white;
            margin: auto;
            width: 80%;
            text-align: center;
            margin-top: 40px;
        }
        .th_deg {
            background-color: skyblue;
            padding: 10px;
        }
        tr {
            border: 3px solid white;
        }
        td {
            padding: 10px;
        }
        .search-container {
            text-align: right;
            margin-bottom: 20px;
        }
        .search-container input[type=text] {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .search-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <!-- Search input and button -->
                <div class="search-container">
                    <input type="text" id="searchInput" onkeyup="filterTable()" placeholder="Search by name or email...">
                    <button onclick="filterTable()">Rechercher</button>
                </div>

                <!-- Table -->
                <table class="table_deg" id="contactTable">
                    <tr>
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Message</th>
                        <th class="th_deg">Send Email</th>
                    </tr>
                    @foreach($data as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->message}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('send_mail', $contact->id)}}">Send Mail</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('admin.footer')

    <!-- JavaScript for filtering table rows -->
    <script>
        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("contactTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) { // start from 1 to skip the header row
                var found = false;
                // Loop through all columns in current row
                for (var j = 0; j < tr[i].cells.length - 1; j++) { // -1 to skip last column (actions)
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            found = true;
                            break; // Break the inner loop, we found a match
                        }
                    }
                }
                // Set display style based on search result
                if (found) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
