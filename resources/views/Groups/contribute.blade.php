@extends('layouts.app')

@section('title', 'Dashboard Home')

@section('content')

   <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Add Contribution</h3>
              </div>
              <div class="col-sm-6">
                
              </div>
            </div>
          </div>
        </div>
          <div class="col-md-6">
                <div class="card card-secondary card-outline mb-4">
                  <div class="card-header">
                    <a href="{{route('groups')}}" class="btn btn-primary" role="button">Back to Groups</a>
                  </div>
                  
                  
                   @if ($errors->any())
                    <div class="alert alert-danger p-2 small">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li><i class="fas fa-exclamation-circle me-1"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  <div class="card-body">
                    <form  method="post" action="{{route('contribute_save')}}">
                        <input name='id' type="hidden" value='{{$id}}'>
                        @csrf
                    <div class="form-floating mb-3">
                      <input
                        type="text"
                        class="form-control"
                        name="amount"
                        placeholder="Amount"
                        required
                      />
                      <label for="floatingEmail">Amount</label>
                    </div>
                    
                     <div class="col-4">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
                  </div>
              </form>
                </div>
              </div>


</main>


<?php
if(isset($saved)){
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
            const message = "saved";
            const type = "success";
            showCustomToast(message, type); 
    });
</script>
<?php
}
?>

@endsection