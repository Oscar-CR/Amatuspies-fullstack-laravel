@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Solicitudes Recibidas'])
<div class="container-fluid">
<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Solicitudes</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
            @if (session('message'))
                <div class="alert alert-success m-4" style="color:#FFFFFF;">
                    {{ session('message') }}
                </div>
                <br>
            @endif

                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nombre</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> Motivo</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 30%;">
                                    Mas detalles</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Fecha</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medical_appointments as $medical_appointment )
                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                        </div>
                                    </div>
                                </td>
                               
                                <td class="align-middle text-left text-sm">
                                    <p class="text-sm font-weight-bold mb-0">{{ $medical_appointment->name }}</p>
                                </td>

                                <td class="align-middle text-left text-sm">
                                    <p class="text-sm font-weight-bold mb-0">{{ $medical_appointment->email }}</p>
                                </td>

                                <td class="align-middle text-left text-sm">
                                    <p class="text-sm font-weight-bold mb-0 text-break">{{ $medical_appointment->motive }}</p>
                                </td>

                                
                                <td class="align-middle text-left text-sm" style="width:200px !important;">
                                    <p class="text-sm font-weight-bold mb-0">{{ $medical_appointment->more_details }}</p>
                                </td>

                                <td class="align-middle text-left text-sm">
                                    <p class="text-sm font-weight-bold mb-0">{{ $medical_appointment->created_at }}</p>
                                </td>

                                <td class="align-middle text-end">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <form class="form-delete"
                                            action="{{ route('admin.delete-medical-appointment', ['id' => $medical_appointment->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                              class="btn btn-danger btn-sm mt-1">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
          
                </div>
                <div class="page-navigator mt-4 mb-4 d-flex flex-row-reverse bd-highlight">
                    <div class="page-links">
                    {{ $medical_appointments->links() }}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {


        $('.form-delete').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡El registro se eliminará permanentemente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    });
    </script>
@endpush