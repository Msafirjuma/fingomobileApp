@extends('layouts.app')

@section('title', 'Dashboard Home')

@section('content')



<main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Member</h3>
              </div>
             
            </div>
          </div>
        </div>
       
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Member</h3>
                <a href="{{route('Addmember')}}?groupid={{$gid}}"><button style="margin-left:20px; margin-bottom:20px;" id="add_goal" type="button" class="btn btn-sm btn-primary mr-2">
                    <i class="bi bi-printer me-1" aria-hidden="true"></i>
                    Add Member
                  </button></a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 16rem">
                    <span class="input-group-text">
                      <i class="bi bi-search" aria-hidden="true"></i>
                    </span>
                    <input
                      id="table-filter"
                      type="search"
                      class="form-control"
                      placeholder="Filter rows…"
                      aria-label="Filter rows"
                    />
                  </div>
                </div>
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
        const map = { Complete: 'success', inProgress: 'info', Pending: 'secondary' };
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
            GroupId: '{{$value["group_id"]}}',
            Name: '{{$value["name"]}}',
            Role: '{{$value["role"]}}',
                     
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
            { title: '#', field: 'id', width: 60, headerSort: true,width: 150, },
            { title: 'Group Id', field: 'GroupId', headerFilter: 'input',width: 150,  },
            { title: 'Name ', field: 'Name', headerFilter: 'input',width: 150, },
            { title: 'Role', field: 'Role', headerFilter: 'input' ,width: 150, },
            
          
         {
            title: "Contribute", 
            formatter: function(cell, formatterParams, onRendered) {
                
                return "<button class='btn btn-warning btn-sm'>view contribution</button>";
            },
            cellClick: function(e, cell) {
                // 2. Get the row data for the exact row clicked
                var rowData = cell.getRow().getData();
                
                 window.location.href = "/viewcontribution?id=" +  rowData.id +"&groupid="+rowData.GroupId;
            },
            
            hozAlign: "center",
            headerSort: false,
            width: 150, // Disable sorting on the button column
        },
          ]
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


@endsection