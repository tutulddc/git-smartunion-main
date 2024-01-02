@extends('layouts.admin')

@section('content')
<input type="radio" name="dataEntry" id="showDataEntryForm"> Show Data Entry Form
<div id="dataEntryForm" style="display:none;">
    <!-- Your data entry form fields go here -->
    <input type="text" name="field1" placeholder="Field 1">
    <input type="text" name="field2" placeholder="Field 2">
    <button id="submitData">Submit</button>
 </div>
 <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
    $(document).ready(function() {
       $("#showDataEntryForm").on("click", function() {
          // Show the data entry form when the radio button is clicked
          $("#dataEntryForm").show();

          // You can perform additional actions or validations here if needed
       });

       // Handle form submission
       $("#submitData").on("click", function() {
          // Get the form data and perform the necessary actions
          var field1Value = $("input[name='field1']").val();
          var field2Value = $("input[name='field2']").val();

          // Perform AJAX request or any other actions as needed

          // Close the form (in this case, hide it)
          $("#dataEntryForm").hide();
       });
    });
 </script>


@endsection
