@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Citas Médicas'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
    
            <div class="card mb-4">
                <div class="card-header pb-0">

                <div class="d-flex justify-content-between">
                    <h6>CITAS</h6>

                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <i class="fa fa-plus me-3" aria-hidden="true"></i>

                    Agendar nueva cita
                    </button>
                </div>
                    
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
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">#</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Cliente</th>
                                    <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Motivo</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Tratamiento</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Detalles adicionales</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Fecha</th>
                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medical_dates as $medical_date )
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $loop->iteration }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $medical_date->client_name }} </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-sm font-weight-bold mb-0">{{ $medical_date->motive_date }} </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $medical_date->treatment_type }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $medical_date->more_details }}</p>
                                    </td>

                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0">{{ $medical_date->date }}</p>
                                    </td>

                                    <td class="align-middle">
                                        <div class="d-flex flex-column align-items-center">
                                            <button  style="width:120px; margin-bottom: 4px;" type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{$medical_date->id}}">
                                                Editar
                                            </button>

                                            <form class="form-delete"
                                                action="{{ route('admin.delete-date', ['id' => $medical_date->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button style="width:120px;" type="submit"
                                                class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Editar -->
                                <div class="modal fade" id="modal{{$medical_date->id}}" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form class="form-edit"
                                        action="{{ route('admin.update-date') }}"
                                        method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar cita de {{ $medical_date->client_name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text"  maxlength="200" class="form-control" placeholder="Ingrese el nombre del cliente" name="id" hidden value="{{ $medical_date->id }}">

                                                <label>Nombre de cliente</label>
                                                <input type="text"  maxlength="200" class="form-control" placeholder="Ingrese el nombre del cliente" name="client_name" value="{{ $medical_date->client_name }}">
                                                <br>
                                                <label>Motivo</label>
                                                <input type="text" maxlength="200" class="form-control" placeholder="Ingrese el motivo de la cita" name="motive_date" value="{{ $medical_date->motive_date }}">
                                                <br>
                                                <label>Tratamiento</label>
                                                <input type="text" maxlength="200" class="form-control" placeholder="Ingrese el nombre del tratamiento" name="treatment_type" value="{{ $medical_date->treatment_type }}">
                                                <br>
                                                <label>Fecha y hora</label>
                                                <input type="datetime-local"  class="form-control" placeholder="Ingrese la fecha y hora de la cita" name="date" value="{{ $medical_date->date }}">
                                                <br>
                                                <label>Notas o detalles adicionales</label>
                                                <input type="textarea"  maxlength="200" class="form-control" placeholder="Ingrese notas o detalles adicionales" name="more_details" value="{{ $medical_date->more_details }}"> 
                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar cita</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                </div>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalCreate" tabindex="-2" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form class="form-create"
                            action="{{ route('admin.create-date') }}"
                            method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agenda de Citas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label>Nombre de cliente</label>
                                    <input type="text"  maxlength="200" class="form-control" placeholder="Ingrese el nombre del cliente" name="client_name">
                                    <br>
                                    <label>Motivo</label>
                                    <input type="text" maxlength="200" class="form-control" placeholder="Ingrese el motivo de la cita" name="motive_date">
                                    <br>
                                    <label>Tratamiento</label>
                                    <input type="text" maxlength="200" class="form-control" placeholder="Ingrese el nombre del tratamiento" name="treatment_type">
                                    <br>
                                    <label>Fecha y hora</label>
                                    <input type="datetime-local"  class="form-control" placeholder="Ingrese la fecha y hora de la cita" name="date">
                                    <br>
                                    <label>Notas o detalles adicionales</label>
                                    <input type="textarea"  maxlength="200" class="form-control" placeholder="Ingrese notas o detalles adicionales" name="more_details"> 
            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Crear cita</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
