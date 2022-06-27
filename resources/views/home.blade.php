@extends('layouts.app')

@section('content')
<div class="container">
    <input class="form-control col-3" id="myInput" type="text" placeholder="Search by name">
    <br>
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Type</th>
          <th>Phone #</th>
          <th>See Details</th>
        </tr>
      </thead>
      <tbody id="myTable">
    @forelse ($breweries as $brew )
    <tr>
        <td>{{$brew['name']}}</td>
        <td>{{$brew['brewery_type']}}</td>
        <td>{{$brew['phone']}}</td>
        <td><button class="border-0 bg-transparent openModal "  data-id={{$brew['id']}} type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="View Details"></i></button></td>


      </tr>
    @empty

    @endforelse

      </tbody>
    </table>
      <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Street</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Postal Code</th>
                    <th>Country</th>
                    <th>Website Url</th>

                  </tr>
                </thead>
                <tbody id="myTable">

              <tr>
                  <td>{{$brew['street']}}</td>
                  <td>{{$brew['address_2']}}</td>
                  <td>{{$brew['city']}}</td>
                  <td>{{$brew['state']}}</td>
                  <td>{{$brew['postal_code']}}</td>
                  <td>{{$brew['country']}}</td>
                  <td><a href="{{$brew['website_url']}}">{{$brew['website_url']}}</a></td>



                </tr>


                </tbody>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

</div>


<script>

$(document).on("click", ".openModal", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );


});
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@endsection
