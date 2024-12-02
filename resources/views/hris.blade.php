@extends('layouts.header-sidebar')

@section('content1')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: none;
        color: #459fff!important;
        border-radius: 50%;
        border: 1px solid #ccc;
        transition: none!important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #459fff;
        color: white!important;
        border: 1px solid #ccc;
        border-radius: 50px;
        margin: 2px;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.previous,
    .dataTables_wrapper .dataTables_paginate .paginate_button.next {
        border-radius: 10px;
    }
    .dataTables_info,
    .dataTables_wrapper,
    .dataTables_paginate {
        margin-top: 10px;
        font-size: 15px;
    }
    .dataTables_length,
    .dataTables_length select,
    .dataTables_filter {
        margin-bottom: 10px;
        font-size: 15px;
    }
    .dataTables_length select,
    .dataTables_filter input {
        border-radius: 10px!important;
    }
    /* End dataTable Style */
    .modal {
        font-family: "Nunito", sans-serif;
    }
    .card-body {
    overflow-x: auto;
    }
    .text {
        display: none;
    }
    .dataTables_filter {
        margin-bottom: 10px;
    }
    #example1 {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
    }
    #example2 {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
    }
    #example3 {
        border-collapse: collapse;
        width: 100%;
        font-family: "Nunito", sans-serif;
    }
    th{
        color: #fff;
        background-color: #36a4c0;
    }
    th{
        border: 1px solid #b7b7b7;
        text-align: center;
        padding: 8px;
    }
    td{
        border: 1px solid #ddd;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .btn-margin {
        margin: 2px;
    }
    .bi{
        margin-right: 5px;
    }
    .card-title{
        padding: 10px 0 0 0;
        font-size: 20px;
    }
    .float-end{
        padding: 5px 5px 5px 0;
        font-size: 20px;
    }
    .button-container {
        display: block;
    }
    .filter {
        padding: 10px 0 0 0;
        display: none;
    }
    .btnaction{
        background-color: #36a4c0;
        color: #ffffff;
        border-style: none;
    }
    .btnaction:hover{
        background-color: #45b5d3;
        color: #ffffff;
        border-style: none;
    }
    #exportToExcel,
    #exportToPDF,
    #templateimport {
        margin: 2px;
    }
    .dropdown-item:hover{
        color: #ffffff;
    }


    @media (max-width: 767px) {
        .custom-button {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }
        .btn-margin {
            margin: 2px;
        }
        tr, th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        .card-title {
            font-size: 18px;
            padding: 0;
            margin-bottom: 0;
        }
        .table-responsive{
            font-size: 11px;
        }
        .button-container {
            display: none;
        }
        .filter {
            display: block;
        }
    }
    @media (min-width: 768px) and (max-width: 1199px) {
        .button-container {
            display: none;
        }
        .filter {
            display: block;
        }
    }


</style>
<div class="pagetitle">
    <h1>Human Resource Information System</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
        <li class="breadcrumb-item active">HRIS Application</li>
      </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>

    </script>
</section>
@endsection
