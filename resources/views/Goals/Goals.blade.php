@extends('layouts.app')

@section('title', 'Dashboard Home')

@section('content')



  <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Goals</h3>
              </div>
              
            </div>
          </div>
        </div>
            <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Goals</h3>
                <a href="{{route('Addgoal')}}"><button style="margin-left:20px; margin-bottom:20px" id="add_goal" type="button" class="btn btn-sm btn-primary mr-2">
                    <i class="bi bi-printer me-1" aria-hidden="true"></i>
                    Add Goal
                  </button></a>
               
              </div>
              <div class="card-body">
                <div class="d-flex gap-2 mb-3">
                  <button id="export-csv" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>
                    Export CSV
                  </button>
                  <button id="export-json" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-filetype-json me-1" aria-hidden="true"></i>
                    Export JSON
                  </button>
                  <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-printer me-1" aria-hidden="true"></i>
                    Print
                  </button>

                  

                </div>
                <div id="users-table"></div>
              </div>
              
            </div>
      </main>


     

      <script>
      const statusBadge = (cell) => {
        const value = cell.getValue();
        const map = { Completed: 'success', inProgress: 'info', Pending: 'secondary' };
        const color = map[value] || 'secondary';
        return `<span class="badge text-bg-${color}">${value}</span>`;
      };
      

      document.addEventListener('DOMContentLoaded', () => {
        const data = [
         
<?php
$numb = 1;
foreach ($result as $value ) {


        ?>
           {
            id: '{{$value["id"]}}',
            Goal: '{{$value["goal"]}}',
            Amount: '{{$value["account_amount"]}}',
            GoalAmount: '{{$value["Initial_Ammount"]}}',
            Remaining : '{{$value["Initial_Ammount"]-$value["account_amount"]<0 ? '0':$value["Initial_Ammount"]-$value["account_amount"]}}',
            fromdate: '{{date('Y-m-d',strtotime($value["created_at"]))}}',
            todate: '{{$value["Enddate"]}}',
            Status: '{{$value["Initial_Ammount"]-$value["account_amount"]<=0 ? "Completed":"inProgress"}}',
            addamount: '<button>add Amount</button>',
            delete: '',

             },

             <?php
          }
          ?>

         

         
          
        ];

        const table = new Tabulator('#users-table', {
          data: data,
          layout: 'fitColumns',
          pagination: true,
          paginationSize: 10,
          paginationSizeSelector: [10, 25, 50, 100],
          movableColumns: true,
          columns: [
            { title: '#', field: 'id', width: 60, headerSort: true },
            { title: 'Goal ', field: 'Goal', headerFilter: 'input', width: 150, },
            { title: 'Amount', field: 'Amount', headerFilter: 'input' , width: 150,},
            { title: 'Goal Amount', field: 'GoalAmount', headerFilter: 'input',width: 150, },
            { title: 'Remaining', field: 'Remaining', headerFilter: 'input',width: 150, },
            {
              title: 'from date',
              field: 'fromdate',
              headerFilter: 'list',
              width: 150,
            },
            {
              title: 'to date',
              field: 'todate',
              headerFilter: 'list',
              width: 130,
              hozAlign: 'center',
            },

            {
              title: 'Status',
              field: 'Status',
              formatter: statusBadge,
              headerFilter: 'list',
              headerFilterParams: { values: ['', 'Pending', '', 'inProgress', 'Completed'] },
              width: 130,
              hozAlign: 'center',
            },
            {
            title: "Add Amount", 
            formatter: function(cell, formatterParams, onRendered) {
                
                return "<button class='btn btn-primary btn-sm'>add Amount</button>";
            },
            cellClick: function(e, cell) {
                // 2. Get the row data for the exact row clicked
                var rowData = cell.getRow().getData();
                
                 window.location.href = "/addgoalamount?id=" +  rowData.id;
            },
            width: 120,
            hozAlign: "center",
            headerSort: false // Disable sorting on the button column
        },
           {
            title: "Delete", 
            formatter: function(cell, formatterParams, onRendered) {
                
                return "<button class='btn btn-danger btn-sm'><i class='bi bi bin'>delete<i></button>";
            },
            cellClick: function(e, cell) {
                // 2. Get the row data for the exact row clicked
                var rowData = cell.getRow().getData();
                
                 window.location.href = "/deletegoals?id=" +  rowData.id;
            },
            width: 120,
            hozAlign: "center",
            headerSort: false // Disable sorting on the button column
        },
          ],
        });

        document.getElementById('table-filter').addEventListener('input', (e) => {
          const value = e.target.value;
          if (value) {
            table.setFilter([
              [
                { field: 'name', type: 'like', value: value },
                { field: 'email', type: 'like', value: value },
              ],
            ]);
          } else {
            table.clearFilter();
          }
        });

        document
          .getElementById('export-csv')
          .addEventListener('click', () => table.download('csv', 'users.csv'));
        document
          .getElementById('export-json')
          .addEventListener('click', () => table.download('json', 'users.json'));
        document
          .getElementById('print-table')
          .addEventListener('click', () => table.print(false, true));
      });
    </script>

    <?php
if(isset($saved)){
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
            const message = "deleted";
            const type = "danger";
            showCustomToast(message, type); 
    });
</script>
<?php
}
?>

@endsection