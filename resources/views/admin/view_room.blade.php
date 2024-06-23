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
        /* Additional style for search input */
        .search-container {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <!-- Search input -->
                <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search for room title...">
                <button class="btn btn-primary" onclick="filterTable()">Search</button>
            </div>

                <!-- Table -->
                <table class="table_deg" id="roomTable">
                    <tr>
                        <th class="th_deg">Room Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Prix</th>
                        <th class="th_deg">Wifi</th>
                        <th class="th_deg">Room Type</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg" colspan="3">Actions</th>
                    </tr>
                    @foreach($data as $room)
                    <tr>
                        <td>{{$room->room_title}}</td>
                        <td>{!! Str::limit($room->description, 150) !!}</td>
                        <td>{{$room->price}}$</td>
                        <td>{{$room->wifi}}</td>
                        <td>{{$room->room_type}}</td>
                        <td>
                            <img width="100" src="room/{{$room->image}}" alt="{{$room->room_title}}">
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure ?')" class="btn btn-danger" href="{{url('room_delete', $room->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{url('room_update', $room->id)}}">Update</a>
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
            table = document.getElementById("roomTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 1; i < tr.length; i++) { // start from 1 to skip the header row
                td = tr[i].getElementsByTagName("td")[0]; // column index where to search (Room Title)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
