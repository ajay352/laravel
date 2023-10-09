<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data Table</title>
    <!-- Include Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Add Bootstrap JS and jQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
 
</head>
<style>
    #chart-container {
    width: 400px;
    height: 400px;
    
}

</style>
<body class="bg-gray-100 p-6">
    <div class=" mx-auto bg-white p-10 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">Student Data Table</h1>
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">Name</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">Mobile</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">Email</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">Gender</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">DOB</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">Address</th>
                    <th class="py-2 px-4 bg-gray-200 text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($student_bio as $data)
                <tr>
                    <td class="py-2 px-4">{{$data->name}}</td>
                    <td class="py-2 px-4">{{$data->mobile}}</td>
                    <td class="py-2 px-4">{{$data->email}}</td>
                    <td class="py-2 px-4">{{$data->gender}}</td>
                    <td class="py-2 px-4">{{$data->dob}}</td>
                    <td class="py-2 px-4">{{$data->address}}</td>
                    <td class="py-2 px-4">
                        <a href="#" id="view-button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-3 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 my-button" data-student-id="{{ $data->id }}" data-toggle="modal" data-target="#myModal">View</a>
                        <a href="{{ route('students.update', ['id' => $data->id]) }}" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-3 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                        <a href="{{ route('students.delete', ['id' => $data->id]) }}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-3 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</a>

                    </td>
                </tr>
            @endforeach
                
            </tbody>
        </table>

    </div>
    <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
                       <div class="modal-header">
                <h4 class="modal-title">Academic Chart</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="chart-container" style="display:none;  ">
                      <canvas id="pieChart"></canvas>
        
                  </div>

                
            </div>

            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="my_div"   class="btn btn-primary " >Edit</button>
            </div>
        </div>
    </div>
</div>



<script>
        
        document.querySelectorAll(".my-button").forEach(function(element) {
          element.addEventListener("click", function() {
              var studentId = element.getAttribute("data-student-id");
              fetchStudentMarks(studentId);
              console.log(studentId);
              
           });
       });



    function fetchStudentMarks(studentId) {
        $.ajax({
            url: "/get-student-marks",
            type: "GET",
            data: { 
            
              student_id: studentId,
              _token: '{{ csrf_token() }}',
           },
           success: function(data) {
               
               displayPieChart(data);
            },
            error: function() {
                 alert("Failed to fetch student marks.");
           }
       });
   }


function displayPieChart(marks) {
    const chartContainer = document.getElementById("chart-container");
    chartContainer.style.display = "block";

    const pieChartCanvas = document.getElementById("pieChart");

    // Check if there's an existing chart on the canvas and destroy it
    if (window.myPieChart) {
        window.myPieChart.destroy();
    }

    // Create the new chart
    window.myPieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: {
            labels: Object.keys(marks),
            datasets: [{
                data: Object.values(marks),
                backgroundColor: ['blue', 'green', 'red', 'orange', 'purple', 'pink'],
            }],
        },
    });
}


document.querySelectorAll(".my-button").forEach(function(element) {
          element.addEventListener("click", function() {
              var studentId = element.getAttribute("data-student-id");
              
              var myDiv=document.getElementById("my_div");
              myDiv.addEventListener("click", function() {
                window.location.href = "getchart/"+studentId;
               
            });

              
           });
       });

</script>

</body>
</html>
